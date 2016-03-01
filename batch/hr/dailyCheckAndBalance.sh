#!/bin/sh 

LOGDIR="log" 

NOW="$(date +"%Y%m%d-%H%M")"
LOGPATH=${LOGDIR}/dailyCheckAndBalance-${NOW}.log

/opt/php/bin/php HrDailyCheckAndBalance.php | tee ${LOGPATH}

