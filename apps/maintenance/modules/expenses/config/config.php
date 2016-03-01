<?php

sfConfig::set('app_page_heading', 'T.C. Khoo Expense Monitoring');

sfConfig::set('app_submenu_items', 
    array(
        array('Power Consumption',     'expenses/powerConsumptionSearch',   'expenses', 'powerConsumptionSearch' ),
        array('Water Consumption',     'expenses/waterConsumptionSearch',   'expenses', 'waterConsumptionSearch' ),
//        array('Hr Forecast',           'expenses/hrForecast',   'expenses', 'hrForecast' ),
//        array('Finance Summary',       'expenses/financeSummary',   'expenses', 'financeSummary' ),
        //array('Human Resource',        'expenses/generalInfo',        'expenses', 'generalInfo' )
    ));

// $ds = new DataGridColumnHeaders();
// $ds->addHeader(new DataGridColumnHeader('no',      'No',           false, false,                           20, 'alignCenter alignMiddle', 'nowrap'));
// $ds->addHeader(new DataGridColumnHeader('date',    'Date',         true, PowerUsagePeer::DATE,   150, 'alignCenter alignMiddle', 'nowrap'));
// $ds->addHeader(new DataGridColumnHeader('',        'Day of Week',         true, false,   150, 'alignCenter alignMiddle', 'nowrap'));
// $ds->addHeader(new DataGridColumnHeader('am',      'AM READING',         true, PowerUsagePeer::AMPM,           80, 'alignCenter alignMiddle', 'nowrap'));
// $ds->addHeader(new DataGridColumnHeader('pm',      'PM READING',         true, PowerUsagePeer::AMPM,           80, 'alignCenter alignMiddle', 'nowrap'));
// $ds->addHeader(new DataGridColumnHeader('am',      'AM CONSUMPTION',         true, PowerUsagePeer::AMPM,           100, 'alignCenter alignMiddle', 'nowrap'));
// $ds->addHeader(new DataGridColumnHeader('pm',      'PM CONSUMPTION',         true, PowerUsagePeer::AMPM,           100, 'alignCenter alignMiddle', 'nowrap'));
// $ds->addHeader(new DataGridColumnHeader('unit',    'UNIT',         true, PowerUsagePeer::UNIT,       100, 'alignCenter alignMiddle', 'nowrap'));
// $ds->addHeader(new DataGridColumnHeader('',    'CONV (15)',         false, false,       80, 'alignCenter alignMiddle', 'nowrap'));
// $ds->addHeader(new DataGridColumnHeader('',    'AM COST',     true, PowerUsagePeer::UNIT_PRICE,   100, 'alignCenter alignMiddle', 'nowrap'));
// $ds->addHeader(new DataGridColumnHeader('',    'DAILY COST',     true, PowerUsagePeer::UNIT_PRICE,   100, 'alignCenter alignMiddle', 'nowrap'));
// $ds->setSortBy(sfContext::getInstance()->getRequest()->getParameter('sortBy', 'time'));
// $ds->setSortOrder(sfContext::getInstance()->getRequest()->getParameter('sortOrder', 'DESC'));
// sfConfig::set('app_powerusage_grid_headers', $ds);

// $wu = new DataGridColumnHeaders();
// $wu->addHeader(new DataGridColumnHeader('no',      'No',           false, false,                           20, 'alignCenter alignMiddle', 'nowrap'));
// $wu->addHeader(new DataGridColumnHeader('date',    'Date',         true, WaterUsagePeer::DATE,   150, 'alignCenter alignMiddle', 'nowrap'));
// $wu->addHeader(new DataGridColumnHeader('',        'Day of Week',         true, false,   150, 'alignCenter alignMiddle', 'nowrap'));
// $wu->addHeader(new DataGridColumnHeader('am',      'AM READING',         true, WaterUsagePeer::AMPM,           80, 'alignCenter alignMiddle', 'nowrap'));
// $wu->addHeader(new DataGridColumnHeader('pm',      'PM READING',         true, WaterUsagePeer::AMPM,           80, 'alignCenter alignMiddle', 'nowrap'));
// $wu->addHeader(new DataGridColumnHeader('am',      'AM CONSUMPTION',         true, WaterUsagePeer::AMPM,           100, 'alignCenter alignMiddle', 'nowrap'));
// $wu->addHeader(new DataGridColumnHeader('pm',      'PM CONSUMPTION',         true, WaterUsagePeer::AMPM,           100, 'alignCenter alignMiddle', 'nowrap'));
// $wu->addHeader(new DataGridColumnHeader('unit',    'UNIT',         true, WaterUsagePeer::UNIT,       100, 'alignCenter alignMiddle', 'nowrap'));
// $wu->addHeader(new DataGridColumnHeader('',    'CONV (15)',         false, false,       80, 'alignCenter alignMiddle', 'nowrap'));
// $wu->addHeader(new DataGridColumnHeader('',    'AM COST',     true, WaterUsagePeer::UNIT_PRICE,   100, 'alignCenter alignMiddle', 'nowrap'));
// $wu->addHeader(new DataGridColumnHeader('',    'DAILY COST',     true, WaterUsagePeer::UNIT_PRICE,   100, 'alignCenter alignMiddle', 'nowrap'));
// $wu->setSortBy(sfContext::getInstance()->getRequest()->getParameter('sortBy', 'time'));
// $wu->setSortOrder(sfContext::getInstance()->getRequest()->getParameter('sortOrder', 'DESC'));
// sfConfig::set('app_waterusage_grid_headers', $wu);