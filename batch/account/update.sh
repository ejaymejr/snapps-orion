#!/bin/sh 

LOGDIR="log" 

NOW="$(date +"%Y%m%d-%H%M")"
LOGPATH=${LOGDIR}/smsUpdate.log

/opt/php/bin/php dailyUpdate.php | tee -a ${LOGPATH}
#/opt/php/bin/php dailyFinance.php | tee -a ${LOGPATH} 

