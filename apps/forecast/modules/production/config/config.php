<?php

sfConfig::set('app_page_heading', 'Production Matrix');

sfConfig::set('app_submenu_items', 
    array(
        array('Daily Matrix',     'production/dailyMatrix',   'production', 'dailyMatrix' ),
        array('Weekly Matrix',     'production/weeklyMatrix',   'production', 'weeklyMatrix' ),
        array('Monthly Matrix',     'production/monthlyMatrix',   'production', 'monthlyMatrix' ),
        array('Unit Price Statistics',     'http://dev.micronclean/cityhall/sales/invoice/upstats' )
    ));