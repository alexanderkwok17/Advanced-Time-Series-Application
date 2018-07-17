# Read in the Boat Race data:

library(KFAS)
BoatRace <- read.csv("boatrace.csv")
BoatRace$Ox_Win<-1-BoatRace$Cam_Win
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
# Yes, Klingenberg uses an ar(1) latent process with rho (our phi) = 0.69

# Using the fitSSM function to maximize over state noise variance Q.
# without importance sampling for calculation of likelihood.

DK_SSM<-SSModel(Cam_Win~SSMtrend(1,Q=list(NA)),u=rep(1,dim(BoatRace)[1]),data=BoatRace,distribution="binomial")
DK_SSM_fit<-fitSSM(DK_SSM,inits=0.4,method="BFGS") # default no importance sampling
exp(DK_SSM_fit$optim.out$par)
DK_SSM_fit$model$Q # same thing as last line.

# Note Durbin and Koopman page 325 report the value Q= \sigma_eta^2 = 0.331
# so what is going on... (they use importance sampling)

# Profile of 'likelihood' without and with importance sampling.
par(mfrow=c(2,2))
for (N in c(0,10,100,500)){
# Get optimal Qhat for nsims=N importance sampling likelihood approximation 
DK_SSM_fit_withSims<-fitSSM(DK_SSM,inits=0.4,method="BFGS",nsim=N)
Qhat<-DK_SSM_fit_withSims$model$Q

logL<-NULL
temp<-DK_SSM
for (Q in seq(0.10,0.40,0.02))
{
temp$Q[,,1]<-Q
logL<-rbind(logL,c(Q,logLik(temp,nsim=N)))
}

plot(logL[,1],logL[,2],ylab="logL",xlab="Qhat")
abline(v=Qhat)
title(paste(" N = ",as.character(N),", Qhat= ",as.character(round(Qhat,2))))

}

# Using the optimised estimate....
DK_SSM_fit_withSims<-fitSSM(DK_SSM,inits=0.4,method="BFGS",nsim=1000)

DK_SSM_KFS<-KFS(DK_SSM_fit_withSims$model,smoothing=c('signal','mean'))

par(mfrow=c(2,1))
ts.plot(ts(DK_SSM_KFS$model$y,start=BoatRace$Year[1]),
        ylab="",type="p")
pi_t<-1-1/(1+exp(DK_SSM_KFS$thetahat))
lines(ts(pi_t,start=BoatRace$Year[1]))
pi_t_hi<-1-1/(1+exp(DK_SSM_KFS$thetahat+qnorm(0.75)*DK_SSM_KFS$V_theta[1,1,]^0.5))
pi_t_lo<-1-1/(1+exp(DK_SSM_KFS$thetahat-qnorm(0.75)*DK_SSM_KFS$V_theta[1,1,]^0.5))
lines(ts(pi_t_hi,start=BoatRace$Year[1]))
lines(ts(pi_t_lo,start=BoatRace$Year[1]))
abline(h=0.5)
points(BoatRace$Year[is.na(BoatRace$Cam_Win)],
       rep(0.5,length(BoatRace$Year[is.na(BoatRace$Cam_Win)])),pch='|')


# Alternative (correct) plot using muhat fom DK_SSM_KFS object:
# USes delta method for confidence bands in following (slightly different)

ts.plot(ts(DK_SSM_KFS$model$y,start=BoatRace$Year[1]),
        ylab="",type="p")
lines(ts(DK_SSM_KFS$muhat,start=BoatRace$Year[1]))
muhat_t_hi<-DK_SSM_KFS$muhat+qnorm(0.75)*DK_SSM_KFS$V_mu[1,1,]^0.5
muhat_t_lo<-DK_SSM_KFS$muhat-qnorm(0.75)*DK_SSM_KFS$V_mu[1,1,]^0.5
lines(ts(muhat_t_hi,start=BoatRace$Year[1]))
lines(ts(muhat_t_lo,start=BoatRace$Year[1]))
lines(ts(pi_t_hi,start=BoatRace$Year[1]),lty=2,col="red")
lines(ts(pi_t_lo,start=BoatRace$Year[1]),lty=2,col="red")
points(BoatRace$Year[is.na(BoatRace$Cam_Win)],
       rep(0.5,length(BoatRace$Year[is.na(BoatRace$Cam_Win)])),pch='|')
abline(h=0.5)


# try larger state equation variance as in DK Section 14.6.
DK_SSM_fit$model$Q[1,1,1]<-0.330
DK_SSM_KFS<-KFS(DK_SSM_fit$model,smoothing=c('signal'))

ts.plot(ts(DK_SSM_KFS$model$y,start=BoatRace$Year[1]),
        ylab="",type="p")
pi_t<-1-1/(1+exp(DK_SSM_KFS$thetahat))
lines(ts(pi_t,start=BoatRace$Year[1]))
pi_t_hi<-1-1/(1+exp(DK_SSM_KFS$thetahat+qnorm(0.75)*DK_SSM_KFS$V_theta[1,1,]^0.5))
pi_t_lo<-1-1/(1+exp(DK_SSM_KFS$thetahat-qnorm(0.75)*DK_SSM_KFS$V_theta[1,1,]^0.5))
lines(ts(pi_t_hi,start=BoatRace$Year[1]))
lines(ts(pi_t_lo,start=BoatRace$Year[1]))
points(BoatRace$Year[is.na(BoatRace$Cam_Win)],
       rep(0.5,length(BoatRace$Year[is.na(BoatRace$Cam_Win)])),pch='|')
abline(h=0.5)

##########################################################################
# Adding regression on Weight Difference variable....
##########################################################################

# Using the fitSSM function to maximize over state noise variance Q.
# without importance sampling for calculation of likelihood.

DK_SSM_Wgt<-SSModel(Cam_Win~Wgt_Diff+SSMtrend(1,Q=list(NA)),u=rep(1,dim(BoatRace)[1]),data=BoatRace,distribution="binomial")
DK_SSM_Wgt_fit<-fitSSM(DK_SSM_Wgt,inits= -2.0,method="BFGS",nsims=1) # default no importance sampling
exp(DK_SSM_Wgt_fit$optim.out$par)
DK_SSM_Wgt_fit$model$Q # same thing as last line and as for no regression.


# Profile of 'likelihood' without and with importance sampling.
par(mfrow=c(2,2))
for (N in c(0,10,100,200)){
  # Get optimal Qhat for nsims=N importance sampling likelihood approximation 
  DK_SSM_Wgt_fit_withSims<-fitSSM(DK_SSM_Wgt,inits=-2,method="BFGS",nsim=N)
  Qhat<-DK_SSM_Wgt_fit_withSims$model$Q
  
  logL<-NULL
  temp<-DK_SSM_Wgt
  for (Q in seq(0.025,0.15,0.01))
  {
    temp$Q[,,1]<-Q
    logL<-rbind(logL,c(Q,logLik(temp,nsim=N)))
  }
  
  plot(logL[,1],logL[,2],ylab="logL",xlab="Qhat")
  abline(v=Qhat)
  title(paste(" N = ",as.character(N),", Qhat= ",as.character(round(Qhat,3))))
  
}


# Extract estimate of beta for weight diff...
DK_SSM_Wgt_KFS<-KFS(DK_SSM_Wgt_fit_withSims$model,smoothing=c('signal','state'))
DK_SSM_Wgt_fit_withSims$model$Q
DK_SSM_Wgt_KFS
# Uses optimized (Imp Sample likelihood) Qhat = 0.07523  
# and estimates impact of weight difference to be 0.09779 (s.e. = 0.03623)
# logL  is -105.6479
logLik(DK_SSM_Wgt_fit_withSims$model)
# Klingenberg estimates beta = 0.139 (s.e. 0.060) with AR(state equation model)
# Klingenberg reports logLik= -80.


##########################################################################
# Adding regression on QUADRATIC of Weight Difference variable....
##########################################################################

# Using the fitSSM function to maximize over state noise variance Q.
# without importance sampling for calculation of likelihood.

DK_SSM_Wgt2<-SSModel(Cam_Win~Wgt_Diff+I(Wgt_Diff^2)+SSMtrend(1,Q=list(NA)),u=rep(1,dim(BoatRace)[1]),data=BoatRace,distribution="binomial")
DK_SSM_Wgt2_fit<-fitSSM(DK_SSM_Wgt2,inits= -2.0,method="BFGS",nsims=1) # default no importance sampling
exp(DK_SSM_Wgt2_fit$optim.out$par)
DK_SSM_Wgt2_fit$model$Q # same thing as last line and as for no regression.


# Profile of 'likelihood' without and with importance sampling.
par(mfrow=c(2,2))
for (N in c(0,10,100,200)){
  # Get optimal Qhat for nsims=N importance sampling likelihood approximation 
  DK_SSM_Wgt2_fit_withSims<-fitSSM(DK_SSM_Wgt2,inits=-2,method="BFGS",nsim=N)
  Qhat<-DK_SSM_Wgt2_fit_withSims$model$Q
  
  logL<-NULL
  temp<-DK_SSM_Wgt2
  for (Q in seq(0.025,0.15,0.01))
  {
    temp$Q[,,1]<-Q
    logL<-rbind(logL,c(Q,logLik(temp,nsim=N)))
  }
  
  plot(logL[,1],logL[,2],ylab="logL",xlab="Qhat")
  abline(v=Qhat)
  title(paste(" N = ",as.character(N),", Qhat= ",as.character(round(Qhat,3))))
  
}

DK_SSM_Wgt2_KFS<-KFS(DK_SSM_Wgt2_fit_withSims$model,smoothing=c('signal','state'))
DK_SSM_Wgt2_fit_withSims$model$Q
#Compare with state noise variance estimates using LINEAR in weigth difference 
DK_SSM_Wgt_fit_withSims$model$Q


DK_SSM_Wgt2_KFS
# Uses optimized (Imp Sample likelihood) Qhat = 0.07523  
# and estimates impact of weight difference to be 0.09779 (s.e. = 0.03623)
# logL  is -105.6479
logLik(DK_SSM_Wgt2_fit_withSims$model)

# Compare with fit using LINEAR in Weight difference.

logLik(DK_SSM_Wgt_fit_withSims$model)
