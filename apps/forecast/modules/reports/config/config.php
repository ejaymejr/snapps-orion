<?php

sfConfig::set('app_page_heading', 'Finance Information Report');

sfConfig::set('app_submenu_items', 
    array(
        array('Income/Expense Daily',     'reports/dailyIncomeExpense',   'reports', 'dailyIncomeExpense' ),
        array('Income/Expense Trend',     'reports/trendIncomeExpense',   'reports', 'trendIncomeExpense' ),
    ));

$ballast = new DataGridColumnHeaders(); //employee Ledger Group
$ballast->addHeader(new DataGridColumnHeader('no',               'No',              false, false,                                20, 'alignCenter alignMiddle', 'nowrap'));
$ballast->addHeader(new DataGridColumnHeader('trans_date',         'Date',        false, false,            30, 'alignCenter alignMiddle', 'nowrap'));
$ballast->addHeader(new DataGridColumnHeader('component', 'Component',          false, false, 50, 'alignCenter alignMiddle', 'nowrap'));
$ballast->addHeader(new DataGridColumnHeader('value', 'Amount',              false, false,   50, 'alignCenter alignMiddle', 'nowrap'));
$ballast->addHeader(new DataGridColumnHeader('income_expense',         'Sales/Expense',      false, false,            30, 'alignCenter alignMiddle', 'nowrap'));
$ballast->addHeader(new DataGridColumnHeader('sales_source', 'Source',              false, false,   50, 'alignCenter alignMiddle', 'nowrap'));
$ballast->addHeader(new DataGridColumnHeader('company_id',         'Company',      false, false,            30, 'alignCenter alignMiddle', 'nowrap'));
$ballast->setSortBy(sfContext::getInstance()->getRequest()->getParameter('sortBy', 'date'));
$ballast->setSortOrder(sfContext::getInstance()->getRequest()->getParameter('sortOrder', 'DESC'));
sfConfig::set('app_ballast_grid_headers', $ballast);