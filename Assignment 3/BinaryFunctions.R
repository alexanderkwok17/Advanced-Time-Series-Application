################################################################
# Function to find conditional mode of state given observations.
################################################################

GetModeBinary<-function(Y,SSModeltilde,Xbeta,thetatilde_init,
            maxiter=100,tol=1e-8, plot_iters=FALSE)
{
results<-NULL

iter<-0
nobs<-length(Y)
thetatilde<-thetatilde_init
diff<-10000
while(diff > tol & iter <=maxiter){
iter<-iter+1
pitilde<-1-1/(1+exp(Xbeta+thetatilde))
pitilde[is.na(pitilde)==TRUE]<-0.5
A<-1/(pitilde*(1-pitilde))

Ytilde<-thetatilde + A*(Y-pitilde)
SSModeltilde$y<-Ytilde
SSModeltilde$H<-array(A,c(1,1,nobs))
out<-KFS(SSModeltilde,smoothing=c('signal'))
diff<-sum(abs(thetatilde-out$muhat)/(abs(thetatilde)+0.1))/nobs 
thetatilde<-out$muhat
logL_g<-out$logLik
results<-rbind(results,c(logL_g,diff))
if(plot_iters==TRUE){if(iter==1) ts.plot(out$muhat, ylim=c(-5,5)) else lines(out$muhat)}
}
if (maxiter == iter-1) 
  warning("Maximum number of iterations reached, the linearization did not converge.")
colnames(results)<-c("logL_g","Accuracy")
list(logL_g=logL_g,iter=iter,model=SSModeltilde,
thetatilde=thetatilde, diff=diff,Ytilde=Ytilde,results=results, out=out)
}


####################################################################
# Function to get logL_g for ar(1) state equation
#####################################################################

likfnBinary<-function(pars,Y,X) {
r<-dim(X)[2]
beta<-pars[1:r]
phi<-artransform(pars[r+1])
sigma2	<-exp(pars[r+2])
nobs<-length(Y)
Xbeta<-X%*%beta
thetatilde<-rep(0,nobs)
pitilde<-1-1/(1+exp(Xbeta+thetatilde))
pitilde[is.na(pitilde)==TRUE]<-0.5
A<-1/(pitilde*(1-pitilde))


Ytilde<-thetatilde + A*(Y-pitilde)

model<-SSModel(Ytilde~-1+SSMarima(ar=phi, Q=sigma2), H=array(A,c(1,1,nobs)))

temp<-GetModeBinary(Y,model,Xbeta,thetatilde_init=rep(0,nobs))

return(temp$logL_g)
}


########################################################################
# Function to get logL_LAapprox for ar(1) state equation
#######################################################################

likfnLAapproxBinary<-function(pars,Y,X) {
r<-dim(X)[2]
beta<-pars[1:r]
phi<-artransform(pars[r+1])
sigma2<-exp(pars[r+2])
nobs<-length(Y)
Xbeta<-X%*%beta
thetatilde<-rep(0,nobs)
pitilde<-1-1/(1+exp(Xbeta+thetatilde))
pitilde[is.na(pitilde)==TRUE]<-0.5
A<-1/(pitilde*(1-pitilde))
Ytilde<-thetatilde + A*(Y-pitilde)
model<-SSModel(Ytilde~-1+SSMarima(ar=phi, Q=sigma2), H=array(A,c(1,1,nobs)))
temp<-GetModeBinary(Y,model,Xbeta,thetatilde_init=rep(0,nobs))
thetatilde<-temp$thetatilde
pitilde<-1-1/(1+exp(Xbeta+thetatilde))
pitilde[is.na(pitilde)==TRUE]<-0.5
A<-1/(pitilde*(1-pitilde))
py.alpha<-dbinom(Y,rep(1,length(Y)),pitilde)
gy.alpha<-dnorm(temp$Ytilde,thetatilde,A^0.5)
what<-prod(py.alpha/gy.alpha,na.rm=T)
logL_LA<-temp$logL_g + log(what)
return(logL_LA)
}




########################################################################
# Function to get logL_DKapprox for ar(1) state equation
#######################################################################

likfnDKapproxBinary<-function(pars,Y,X,improved.approx=FALSE) {
  r<-dim(X)[2]
  beta<-pars[1:r]
  phi<-artransform(pars[r+1])
  sigma2<-exp(pars[r+2])
  nobs<-length(Y)
  Xbeta<-X%*%beta
  thetatilde<-rep(0,nobs)
  pitilde<-1-1/(1+exp(Xbeta+thetatilde))
  pitilde[is.na(pitilde)==TRUE]<-0.5
  A<-1/(pitilde*(1-pitilde))
  Ytilde<-thetatilde + A*(Y-pitilde)
  model<-SSModel(Ytilde~-1+SSMarima(ar=phi, Q=sigma2), H=array(A,c(1,1,nobs)))
  temp<-GetModeBinary(Y,model,Xbeta,thetatilde_init=rep(0,nobs))
  # DK approximation - first part only
  v_k<-temp$out$V_mu[1,1,]
  thetatilde<-temp$thetatilde
  pitilde<-1-1/(1+exp(Xbeta+thetatilde))
  pitilde[is.na(pitilde)==TRUE]<-0.5
  A<-1/(pitilde*(1-pitilde))
  py.alpha<-dbinom(Y,rep(1,length(Y)),pitilde)
  gy.alpha<-dnorm(temp$Ytilde,thetatilde,A^0.5)
  what<-prod(py.alpha/gy.alpha,na.rm=T)
  logL_DK<-temp$logL_g + log(what)
  if(improved.approx==TRUE)logL_DK<-logL_DK+log(1+(1/8)*sum(exp(thetatilde+Xbeta)*(v_k)^2))
  #(neg arg if -ve sign --- CHECK THIS LAST NEEDS MODIFICATION FOR BINARY DATA)
  return(logL_DK)
}




#################################################################
# Function to get logL_LAIS Importance Sample augmented for ar(1) state equation
#################################################################

likfnLAIS<-function(pars,Y,X, N=1000, antiflag=TRUE,plot_samples=FALSE,trim=0.0) {
r<-dim(X)[2]
beta<-pars[1:r]
phi<-artransform(pars[r+1])
sigma2<-exp(pars[r+2])
nobs<-length(Y)
Xbeta<-X%*%beta
thetatilde<-rep(0,nobs)
pitilde<-1-1/(1+exp(Xbeta+thetatilde))
pitilde[is.na(pitilde)==TRUE]<-0.5
A<-1/(pitilde*(1-pitilde))
Ytilde<-thetatilde + A*(Y-exp(Xbeta+thetatilde))
model<-SSModel(Ytilde~-1+SSMarima(ar=phi, Q=sigma2), H=array(A,c(1,1,nobs)))
temp<-GetModeBinary(Y,model,Xbeta,thetatilde=thetatilde)
pitilde<-1-1/(1+exp(Xbeta+temp$thetatilde))
pitilde[is.na(pitilde)==TRUE]<-0.5
A<-1/(pitilde*(1-pitilde))
py.alpha<-dbinom(Y,rep(1,length(Y)),pitilde)
gy.alpha<-dnorm(temp$Ytilde,temp$thetatilde,A^0.5)
what<-prod(py.alpha/gy.alpha,na.rm=T)
logL_LA<-temp$logL_g + log(what)

sample.state<-simulateSSM(temp$model,type=c("state"),antithetics=antiflag,nsim=N)

# exp(R(alphatilde,alpha) Importance weights
py.alpha<-dbinom(Y,rep(1,length(Y)),pitilde)
gy.alpha<-dnorm(temp$Ytilde,thetatilde,A^0.5)
what<-prod(py.alpha/gy.alpha,na.rm=T)
pitilde<-1-1/(1+exp(sample.state[,1,]+Xbeta[,1]))
pitilde[is.na(pitilde)==TRUE]<-0.5
py.alpha<-dbinom(Y,rep(1,length(Y)),pitilde)
pitilde<-1-1/(1+exp(temp$thetatilde+Xbeta[,1]))
pitilde[is.na(pitilde)==TRUE]<-0.5
py.alphatilde<-dbinom(Y,rep(1,length(Y)),pitilde)
if(dim(sample.state)[3]==1) w<-prod(py.alpha/py.alphatilde,na.rm=T) else
   w<-apply(py.alpha/py.alphatilde,2,prod,na.rm=T)
#print(w)
for(i in 1:dim(sample.state)[3]){
u<-sample.state[,1,i]-temp$thetatilde
w[i]<-w[i]*exp(-sum(u*(Y-pitilde),na.rm=T)+(1/2)*sum(u^2/A,na.rm=T))
#print(w[i])
}
ts.plot(log(w))
#print(log(mean(w)))		
logL_LAIS<-logL_LA+log(mean(w,trim=0.10))
# optional plotting
if(plot_samples == TRUE){
ts.plot(sample.state[,1,],col="grey")
lines(temp$thetatilde,col="red")
title("Simulations p(alpha|Ytilde) in approx Gaussian model \n red=thetatilde")
}
return(logL_LAIS)
}


