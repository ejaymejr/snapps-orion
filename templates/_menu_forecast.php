
<ul class="element-menu">
	<li><a class="dropdown-toggle" href="#">HR COST</a>
	<ul class="dropdown-menu dark" data-role="dropdown">
		<li><?php echo link_to('Daily Costs ', 'hrforecast/dailyForecast'  )?></li>
		<li><?php echo link_to('Weekly Costs ', 'hrforecast/weeklyForecast'  )?></li>
		<li><?php echo link_to('Monthly Costs', 'hrforecast/monthlyForecast'  )?></li>
		<li class="divider"></li>
		<li><?php echo link_to('Monthly Payroll Chart', 'hrforecast/monthlyPayroll'  )?></li>
	</ul>
	</li>
	
	<li><a class="dropdown-toggle" href="#">PRODUCTION EFFICIENCY</a>
	<ul class="dropdown-menu dark" data-role="dropdown">
		<li><?php echo link_to('Daily Matrix ', 'production/dailyMatrix'  )?></li>
<!-- 		<li><?php echo link_to('Weekly Trend', 'production/weeklyMatrix'  )?></li>-->
		<li><?php echo link_to('Monthly Trend', 'production/monthlyMatrix'  )?></li>
		<li class="divider"></li>
		<li><?php echo link_to('MALAYSIA POWER & WATER', 'production/malaysiaPowerAndWater'  )?></li>
<!--		<li><?php echo link_to('Unit Price', 'http://dev.micronclean/cityhall/sales/invoice/upstats', array('target'=>"_BLANK") )?></li>-->
	</ul>
	</li>
	
	<li><a class="dropdown-toggle" href="#">FINANCIAL REPORT</a>
	<ul class="dropdown-menu dark" data-role="dropdown">
		<li><?php echo link_to('Daily Cost Vs Sales ', 'finance/dailyIncomeExpense'  )?></li>
		<li><?php echo link_to('Weekly Cost Vs Sales', 'finance/weeklySalesExpense'  )?></li>
		<li><?php echo link_to('Monthly Trend Cost Vs Sales', 'finance/trendIncomeExpense'  )?></li>
		<li><?php echo link_to('Ballast Water Treatment', 'finance/ballastSearch'  )?></li>
<!--		<li><?php echo link_to('Human Resource Cost', 'finance/hrCost'  )?></li>-->
	</ul>
	</li>
</ul>
