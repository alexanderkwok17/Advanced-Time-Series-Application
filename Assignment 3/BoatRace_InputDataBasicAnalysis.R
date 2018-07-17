# Read in the Boat Race data:


BoatRace <- read.csv("BoatRace/boatrace.csv")
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


