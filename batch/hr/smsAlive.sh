#!/bin/sh 

LOGDIR="log" 

NOW="$(date +"%Y%m%d-%H%M")"
LOGPATH=${LOGDIR}/smsAlive.log

#touch diskspace.txt
#df -h / | tee diskspace.txt
#chmod 755 diskspace.txt

/opt/php/bin/php smsAlive.php | tee -a ${LOGPATH}

