#!/bin/sh 

LOGDIR="log" 

NOW="$(date +"%Y%m%d-%H%M")"
LOGPATH=${LOGDIR}/dailyPowerAndWater.log

/opt/php/bin/php dailyPowerAndWater.php | tee -a ${LOGPATH}
#/opt/php/bin/php dailyFinance.php | tee -a ${LOGPATH} 

