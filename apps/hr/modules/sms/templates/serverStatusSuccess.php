<?php
	$mess = '';		
	$serverList = array('server'=>array(), 'port'=>array());
	//------------ write the list here
	$serverList['server'][] = '10.10.1.27';
	$serverList['port'][] = '3306';
	$serverList['server'][] = '10.10.1.27';
	$serverList['port'][] = '80';

	foreach($serverList["server"] as $pos=>$ip):
		$port = $serverList["port"][$pos];
	    if (! SmsMessageoutPeer::PingServer ($ip, $port ) ):
	    	$mess .= 'IP: '.$ip .':'.SmsMessageoutPeer::PortService($port);
	    	$mess.= ' DOWN...' . SmsMessageoutPeer::SMS_NEW_LINE;
	    endif;
    endforeach;
    if ($mess) $mess .= Date('Y-m-d h:i:s a');
    SmsMessageoutPeer::SendMessage($mess, '93828689', '','SERVER DOWN');
    //var_dump($mess);
    