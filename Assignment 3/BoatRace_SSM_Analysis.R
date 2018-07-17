# Initialize packages and functions

library(KFAS)
library(numDeriv)
library(lme4)
source("BinaryFunctions.R")
plots_in_pdf<-FALSE



# Read in the Boat Race data:


BoatRace <- read.csv("boatrace.csv")
BoatRace$Ox_Win<-1-BoatRace$Cam_Win
nobs<-length(BoatRace$Cam_Win)
X<-cbind(rep(1,nobs),BoatRace$Wgt_Diff)
colnames(X)<-c("Incpt","Wgt_Diff")
Y<-BoatRace$Cam_Win

# Plot main series:

plot(BoatRace$Year,BoatRace$Cam_Win, ylab="Cambridge Win")
title("Time series of wins by Cambridge \n Cambridge vs Oxford Boat Race")
abline(h=0.5)
ts.plot(ts(BoatRace$Wgt_Diff,start=BoatRace$Year[1]), ylab="Weight Difference")
title("Time series of Team Weight Difference (Winner - Loser)\n Cambridge vs Oxford Boat Race")

# Klingenberg report simple logistic model estimate of weight effect
# equals 0.118, with a s.e. of 0.036. Klingeberg uses data to 2007.
# log Likelihood value is reported as -98 in Klingenberg.
# Matches output from:

summary(glm(cbind(Cam_Win,Ox_Win)~Wgt_Diff, data=BoatRace, family="binomial", subset= Year<= 2007))
logLik(glm(cbind(Cam_Win,Ox_Win)~Wgt_Diff, data=BoatRace, family="binomial", subset= Year<= 2007))


# GLM for data to 2011 -- is this the data used in Durbin and Koopman Section 14.6???

BoatRace_glm<-glm(cbind(Cam_Win,Ox_Win)~Wgt_Diff, data=BoatRace, family="binomial")
summary(BoatRace_glm)
logLik(BoatRace_glm)

plot(BoatRace$Year,BoatRace$Cam_Win, ylab="Cambridge Win")
lines(BoatRace$Year[!is.na(BoatRace$Cam_Win)],BoatRace_glm$fitted.values)
title("Time series of wins by Cambridge \n with logistic regression fitted values")
abline(h=0.5)
abline(h=mean(BoatRace_glm$fitted.values),col="purple")
# Can this be improved by using an autoregressive latent process??

# Can we detect serial dependence by standard residual analysis?
BoatRace$glm_Resids<-rep(NA,dim(BoatRace)[1])
BoatRace$glm_Resids[!is.na(BoatRace$Cam_Win)]<-residuals(BoatRace_glm,type="pearson")
acf(BoatRace$glm_Resids,na.action=na.pass)

# ACF of Pearson residuals suggests very little serial dependence. 
# Yet, Klingenberg uses an ar(1) latent process with rho (our phi) = 0.69

# Fitting using 'glmer' ( Same as GLM! in this case....)
case<-rep(1:nobs,each=1)
(gm1 <- glmer(cbind(Cam_Win,Ox_Win) ~  Wgt_Diff + (1 | case),data=BoatRace,
              family = binomial,nAGQ=3))


# Using KFAS functions to set up state space model

phi<-0.69
sigma2<-2.03^2

BoatRaceSSM<-SSModel(Cam_Win~Wgt_Diff+SSMarima(ar=phi, Q=sigma2), u=rep(1,nobs),
	data=BoatRace, distribution='binomial')

BoatRace_approxSSM<-approxSSM(BoatRaceSSM,theta=0, maxiter=500,tol=1e-10)
print(BoatRace_approxSSM$iterations)

logL_BoatRace_approxSSM<-logLik(BoatRace_approxSSM)

BoatRaceSSM_KFS<-KFS(BoatRaceSSM, filtering = c('state','signal'),smoothing=c('state','signal'),theta=0, maxiter=500)

beta<-BoatRaceSSM_KFS$alphahat[1,1:2]
Xbeta<-X%*%beta

if(plots_in_pdf == TRUE) pdf("Polio/Figure8_1.pdf")
par(mfrow=c(1,1))
ts.plot(ts(BoatRace$Cam_Win,start=BoatRace$Year[1]), type="p", ylab="Prob")
pihats_1<-1-1/(1+exp(BoatRace_approxSSM$thetahat))
pihats_2<-1-1/(1+exp(Xbeta+BoatRaceSSM_KFS$alphahat[,3]))
pihats_3<-1-1/(1+exp(Xbeta))
points(ts(pihats_1,start=1829),col="blue",pch="+")
lines(ts(pihats_1,start=1829),col="blue")
lines(ts(pihats_2,start=1829),col="red")
lines(ts(pihats_3,start=1829),col="green")
if(plots_in_pdf == TRUE) dev.off()

if(plots_in_pdf == TRUE) pdf("Figure.pdf")
par(mfrow=c(2,1))
ts.plot(BoatRaceSSM_KFS$alphahat[,3],col="purple")
abline(h=0)
acf(BoatRaceSSM_KFS$alphahat[,3])
if(plots_in_pdf == TRUE) dev.off()

# Using function to get mode.

# First set up approximate Gaussian model....

thetatilde<-rep(0,nobs)
pitilde<-1-1/(1+exp(Xbeta+thetatilde))
pitilde[is.na(pitilde)==TRUE]<-0.5
A<-pitilde*(1-pitilde)
Ytilde<-thetatilde + A*(Y-pitilde)
ts.plot(Ytilde)

# Testing if arbitrary value for system noise H when A missing matters
# IT DOES NOT....

BoatRace_approx<-SSModel(Ytilde~-1+SSMarima(ar=phi, Q=sigma2), H=array(A_noNA,c(1,1,length(Y))))
is.SSModel(BoatRace_approx)
out<-KFS(BoatRace_approx,smoothing=c('signal'))
out$logLik
ts.plot(out$muhat)
points(out$muhat)
# run function to get mode by direct implementation of Newton Raphson method...
# starting from zero - converges quickly..
if(plots_in_pdf == TRUE) pdf("X.pdf")
par(mfrow=c(1,1))
BoatRace_approx_mode<-GetModeBinary(Y,BoatRace_approx,Xbeta,
  thetatilde_init=rep(0,nobs),maxiter=600, plot_iters=TRUE,tol=1e-10)
abline(h=0,col="red")
lines(BoatRace_approx_mode$thetatilde, col="blue")
if(plots_in_pdf == TRUE) dev.off()
points(BoatRaceSSM_KFS$alphahat[,3],col="red",pch="+")

print(BoatRace_approx_mode$results)

# run function to get mode by direct implementation of Newton Raphson method...
# starting from alphahat from above - very quick for same betas....
if(plots_in_pdf == TRUE) pdf("X.pdf")
par(mfrow=c(1,1))
BoatRace_approx_mode<-GetModeBinary(Y,BoatRace_approx,Xbeta,
  thetatilde_init=BoatRaceSSM_KFS$alphahat[,3],maxiter=600, plot_iters=TRUE,tol=1e-10)
abline(h=0,col="red")
lines(BoatRace_approx_mode$thetatilde, col="blue")
if(plots_in_pdf == TRUE) dev.off()
points(BoatRaceSSM_KFS$alphahat[,3],col="red",pch="+")

print(BoatRace_approx_mode$results)

# run function to get mode by direct implementation of Newton Raphson method...
# using method for initializing in approxSSM -- very fast 

thetatilde_init<-qlogis((ifelse(is.na(BoatRaceSSM$y[,1]), 0.5, 
                                BoatRaceSSM$y[, 1]) + 0.5)/(BoatRaceSSM$u[, 1] +1))
ts.plot(thetatilde_init)
points(thetatilde_init)
if(plots_in_pdf == TRUE) pdf("X.pdf")
par(mfrow=c(1,1))
BoatRace_approx_mode<-GetModeBinary(Y,BoatRace_approx,Xbeta,
       thetatilde_init=thetatilde_init,maxiter=800, plot_iters=TRUE,tol=1e-10)
abline(h=0,col="red")
lines(BoatRace_approx_mode$thetatilde, col="blue")
if(plots_in_pdf == TRUE) dev.off()
points(BoatRaceSSM_KFS$alphahat[,3],col="red",pch="+")

print(BoatRace_approx_mode$results)


# Can we replicate Klingenberg estimates:

# Klingenberg report simple logistic model estimate of weight effect
# equals 0.118, with a s.e. of 0.036. Klingeberg uses data to 2007.
# log Likelihood value is reported as -98 in Klingenberg.
# Matches output from:

summary(glm(cbind(Cam_Win,Ox_Win)~Wgt_Diff, data=BoatRace, family="binomial", subset= Year<= 2007))
logLik(glm(cbind(Cam_Win,Ox_Win)~Wgt_Diff, data=BoatRace, family="binomial", subset= Year<= 2007))


# Fitting using 'glmer' ( Same as GLM! in this case....)

case<-rep(1:dim(BoatRace)[1],each=1)
(gm1 <- glmer(cbind(Cam_Win,Ox_Win) ~  Wgt_Diff + (1 | case),data=BoatRace,
              family = binomial,nAGQ=3,subset=Year<=2007))


####################################################
Laplace and DK approximations.
#####################################################

# Data to 2007:
BoatRace07<-BoatRace[BoatRace$Year<=2007,]
nobs<-length(BoatRace07$Cam_Win)
X<-cbind(rep(1,nobs),BoatRace07$Wgt_Diff)
colnames(X)<-c("Incpt","Wgt_Diff")
Y<-BoatRace07$Cam_Win

# Klingenberg reports estimates:
phi<-0.69
sigma2<-2.03^2*(1-phi^2)
beta<-c(0.250,0.139)
pars<-c(beta,atanh(phi),log(sigma2))
parnames<-(c("Incpt","Wgt_Diff","Phi","Sigma2"))
names(pars)<-parnames
nobs<-length(Y)
Xbeta<-X%*%beta

# Comparing the L_DK with L_LA

likfnBinary(pars,Y,X)
likfnLAapproxBinary(pars,Y,X)
likfnDKapproxBinary(pars,Y,X)

if(plots_in_pdf == TRUE) pdf("FigureX.pdf")
par(mfrow=c(2,2))
for(i in 1:4) {
  parsgrid<-rep(NA,21)
  likelihood<-rep(NA,21)
  parsuse<-pars
  for(j in 1:21) {
    parsuse[i]<-pars[i]+(j-11)/50
    parsgrid[j]<-pars[i]+(j-11)/50
    likelihood[j]<-likfnLAapproxBinary(parsuse,Y,X)
  }
  plot(parsgrid,likelihood, type="l", ylab="logL_LA", xlab=names(pars[i]))
  abline(v=pars[i],col="purple")
}
if(plots_in_pdf == TRUE) dev.off()

# Newton Raphson Iterations: 
nr_maxiter<-15
for(nr_iter in 1:nr_maxiter){
  likfnLAapproxBinary(pars,Y,X)
  likfnLAapprox_d1<- grad(likfnLAapproxBinary,pars,Y=Y,X=X)
  likfnLAapprox_d2<- hessian(likfnLAapproxBinary,pars,Y=Y,X=X)
  pars_new<-pars-solve(likfnLAapprox_d2,likfnLAapprox_d1)
  NRresults<-cbind(pars,pars_new,likfnLAapprox_d1,diag(-solve(likfnLAapprox_d2))^0.5)
  colnames(NRresults)<-c("pars","pars_new","L_LA_d1","S.E.s")
  print(NRresults)
  # Update par estimates (if needed):
  pars<-pars_new
  names(pars)<-parnames
}
# Eventually converges to reasonable estimates..

phi<-artransform(pars[3])
sigma2<-exp(pars[4])
print(c(phi,sigma2))
print(likfnLAapproxBinary(pars,Y,X))

if(plots_in_pdf == TRUE) pdf("FigureX.pdf")
par(mfrow=c(2,2))
for(i in 1:4) {
  parsgrid<-rep(NA,21)
  likelihood<-rep(NA,21)
  parsuse<-pars
  for(j in 1:21) {
    parsuse[i]<-pars[i]+(j-11)/50
    parsgrid[j]<-pars[i]+(j-11)/50
    likelihood[j]<-likfnLAapproxBinary(parsuse,Y,X)
  }
  plot(parsgrid,likelihood, type="l", ylab="logL_LA", xlab=names(pars[i]))
  abline(v=pars[i],col="purple")
}
if(plots_in_pdf == TRUE) dev.off()
# Using 'optim':
# Starting at Klingenberg estimates FAILS
Xbeta<-X%*%beta
optim.out<-optim(par=pars,fn=likfnLAapproxBinary,control=list(fnscale=-1),
                 method="BFGS", Y=Y, X=X,hessian=TRUE)

cbind(optim.out$par,diag(-solve(optim.out$hessian))^0.5)
pars<-optim.out$par
phi<-artransform(pars[3])
sigma2<-exp(pars[4])
print(c(phi,sigma2))


# Applied to GLM estimates
# Does not coverge using NR or optim...
phi<-0.5
sigma2<-1
beta<-BoatRace_glm$coefficients
pars<-c(beta,atanh(phi),log(sigma2))
parnames<-(c("Incpt","Wgt_Diff","Phi","Sigma2"))
names(pars)<-parnames
nobs<-length(Y)
Xbeta<-X%*%beta


# Importance Sampling
# Klingenberg Estimates
phi<-0.69
sigma2<-2.03^2*(1-phi^2)
beta<-c(0.250,0.139)
pars<-c(beta,atanh(phi),log(sigma2))
parnames<-(c("Incpt","Wgt_Diff","Phi","Sigma2"))
names(pars)<-parnames
nobs<-length(Y)
Xbeta<-X%*%beta
likfnLAIS(pars,Y,X,N=5,antiflag=FALSE, plot_samples=TRUE)



