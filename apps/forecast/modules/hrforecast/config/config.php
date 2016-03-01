<?php

sfConfig::set('app_page_heading', 'Finance Information Report');

sfConfig::set('app_submenu_items', 
    array(
        array('Daily Forecast',     'hrforecast/dailyForeCast',   'hrforecast', 'dailyForeCast' ),
        array('Monthly Trend',      'hrforecast/monthlyTrend',    'hrforecast', 'monthlyTrend' ),
    ));