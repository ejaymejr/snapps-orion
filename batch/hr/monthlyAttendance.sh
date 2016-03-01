#!/bin/sh 

LOGDIR="log" 

NOW="$(date +"%Y%m%d-%H%M")"
LOGPATH=${LOGDIR}/monthlyAttendance-${NOW}.log

/opt/php/bin/php daily12HrsAttendance.php | tee ${LOGPATH}
/opt/php/bin/php monthlyAttendance.php | tee ${LOGPATH}

