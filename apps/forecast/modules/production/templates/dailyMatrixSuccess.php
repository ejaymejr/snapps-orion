
<div class="contentBox">
<h1><?php echo link_to('<i class="icon-arrow fg-darker smaller"></i>', '') ?>
	DAILY  <small>PRODUCTIVITY</small></h1>
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('production/dailyMatrix')?>" method="post">
<div class="panel" data-role="panel">
<div class="panel-header bg-lightBlue">
<span class="fg-white">DAILY INCOME EXPENSE</span>
</div>
<div class="panel-content">
<table class="table bordered condensed" >
<tr>
    <td class="bg-clearBlue alignRight" nowrap><small>Daily</small></td>
    <td class="alignLeft" nowrap>
    <?php
    echo HTMLLib::CreateDateInput('start_date', $sf_params->get('start_date'), 'span2');
    ?>
    </td>
    <td class="bg-clearBlue alignRight" nowrap><small>TO</small></td>
    <td><?php echo HTMLLib::CreateDateInput('end_date', $sf_params->get('end_date'), 'span2'); ?></td>    
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap><small>Company</td>
    <td class="alignLeft" nowrap>
    <?php
    echo HTMLLib::CreateSelect('company', $sf_params->get('company'), $company, "span2");
    ?>
    </td>    
    <td class="bg-clearBlue alignRight" nowrap><small>Frequency</small></td>
    <td><?php
    $freq = array ( "daily"=>" - Daily - ");
    echo HTMLLib::CreateSelect('frequency', $sf_params->get('frequency'), $freq, "span2");
    ?></td> 
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap><small>Sales Source</small></td>
    <td class="alignLeft" nowrap>
    <?php
    $sales_source = array('PAID HOURS'=>'PAID HOURS', 'ACTUAL IN-OUT RECORD'=>'ACTUAL IN-OUT RECORD');
    echo HTMLLib::CreateSelect('sales_source', $sf_params->get('sales_source'), $sales_source, "span2");
    ?>
    </td>    
    <td class="bg-clearBlue alignRight" nowrap><small></small></td>
    <td><input type="submit" name="benchmark" value=" Show Cost and Sales Daily " class="success"></td>
</tr>
<tr>
    <td class="bg-clearBlue text-right" nowrap><small>Group(s)</small></td>
    <td width="20" class="" nowrap><small>
    <?php
        echo checkbox_tag('cleanroompacking', 'CLEANROOM PACKING', $sf_params->get('cleanroompacking')) . ' - CLEANROOM PACKING';
    ?>
    </small></td>
    <td width="20" class="" nowrap><small>
    <?php
        echo checkbox_tag('incoming', 'INCOMING(SORTING JUMPSUIT)', $sf_params->get('incoming')) . ' - INCOMING(SORTING JUMPSUIT)';
    ?>
    </small></td>    
    <td width="100%" class="" nowrap><small>
    <?php
        echo checkbox_tag('mcsother', 'MCS OTHER', $sf_params->get('mcsother')) . ' - MCS OTHER';
    ?>
    </small></td>    
</tr>
<tr>
    <td class="bg-clearBlue text-right" nowrap><small>    <span class="negative">&nbsp;&nbsp;(no selection means no filter)</span></small></td>
    <td class="" nowrap><small>
    <?php
        echo checkbox_tag('shoewashing', 'SHOE WASHING', $sf_params->get('shoewashing')) . ' - SHOE WASHING';
    ?>
    </small></td>  
    <td class="" nowrap><small>
    <?php
        echo checkbox_tag('shoepacking', 'SHOE PACKING', $sf_params->get('shoepacking')) . ' - SHOE PACKING';
    ?>
    </small></td>   
    <td class="" nowrap><small>
    <?php
        echo checkbox_tag('mcsall', 'ALL MICRONCLEAN', $sf_params->get('mcsall')) . ' - MCS ALL';
    ?> | <em class="fg-blue">check this to select all worker</em>
    </small></td>       
</tr>
<tr>
    <td class="bg-clearBlue text-right" nowrap>&nbsp;</td>
    <td class="" nowrap><small>
    <?php
        echo checkbox_tag('shoesvacuumpack', 'SHOES VACUUM PACK', $sf_params->get('shoesvacuumpack')) . ' - SHOES VACUUM PACK';
    ?>
    </small></td>
    <td class="" nowrap><small>
    <?php
        echo checkbox_tag('mcssupport', 'MCS SUPPORT', $sf_params->get('mcssupport')) . ' - MCS SUPPORT';
    ?>
    </small></td>    
    <td class="" nowrap><small></small></td>
</tr>
<tr>
    <td class="bg-clearBlue text-right" nowrap>&nbsp;</td>
    <td class="" nowrap><small>
    <?php
        echo checkbox_tag('packingjumpsuit', 'PACKING (JUMPSUIT)', $sf_params->get('packingjumpsuit')) . ' - PACKING (JUMPSUIT)';
    ?>
    </small></td>
    <td class="" nowrap><small>
    <?php
        echo checkbox_tag('outsideshoepacking', 'OUTSIDE SHOE PACKING', $sf_params->get('outsideshoepacking')) . ' - OUTSIDE SHOE PACKING';
    ?>
    </small></td>
    <td class="" nowrap><small></small></td>    
</tr>
</table>
</div>
</div>
</form>
</div>
</div>
<?php

	if (isset($benchmark)):
		$sdate = $sf_params->get('sdate');
		$edate = $sf_params->get('edate');
		$co   = ($sf_params->get('company') <> 'ALL') ? $sf_params->get('company') : '';
		$egrp = ($sf_params->get('eGroup')  <> 'ALL')  ? $sf_params->get('eGroup') : null;
		$seq=1;
		$gbasi  = 0;
		$gpart  = 0;
		$got    = 0;
		$gallo  = 0;
		$gmeal  = 0;
		$gunde  = 0;
		$gabse  = 0;
		$gcpfr  = 0;
		$gcpfm  = 0;
		$gtota  = 0;
		$proof  = '';
		$gptot  = 0;
		$sproof = '';
		$twdith = '600';
		$dgroup = array();	
		
	?>
	<div class="panel" data-role="panel">
		<div class="panel-header bg-lightBlue">
		<span class="fg-white">DATA CHART</span>
		</div>
		<div class="panel-content">
			<?php include_partial('productivity_chart', array('productivity'=>$productivityChart, 'title' => 'PRODUCTIVITY CHART' ) ); ?>
			<?php include_partial('manhour_chart', array('manhour'=>$manhourChart, 'title' => 'MANHOUR CHART' ) ); ?>
			<?php include_partial('manpowercost_chart', array('salaryChartJson'=>$salaryChartJson, 'title' => 'PER TEAM SALARY CHART', 'teamSalaryColor' => $teamSalaryColor ) ); ?>
		</div>
	</div>
	<br>
	<div class="panel" data-role="panel">
		<div class="panel-header bg-lightBlue">
		<span class="fg-white">DATA SUMMARY</span>
		</div>
		<div class="panel-content">
			<table class="table bordered condensed striped">
				<tr>
					<td class="bg-clearBlue text-right span2" rowspan="2"><small><?php echo strtoupper(DateUtils::DUFormat('F', $sf_params->get('start_date')) ) ?></small></td>
					<?php foreach($days as $cdate): ?>
						<td class="bg-clearBlue text-center"><small><?php echo DateUtils::DUFormat('D', $cdate) ?></small></td>
					<?php endforeach;?>
					<td class="bg-clearBlue" rowspan="2">Total</td>
				</tr>
				<tr>
					<?php foreach($days as $cdate): ?>
						<td class="bg-clearBlue text-center"><small><?php echo DateUtils::DUFormat('j', $cdate) ?></small></td>
					<?php endforeach;?>
				</tr>
				<tr>
					<td class=" text-right" ><small>PER DAY ARTICLE</small></td>
					<?php $article = 0; $articleTotal = 0; $articleAverage = 0;?>
					<?php foreach($days as $cdate): ?>
						<?php 
							$article = $articleData[$cdate]['total'] ;
							$articleTotal += $article;?>
						<td class=" text-right"><a href="#" data-hint="Total Article| <?php echo $article ; ?>" ><small>
						<?php 
							echo  number_format($article/1000, 1);
							?>K</small></a></td>
					<?php endforeach;?>
					<td class=" text-right" ><small>
						<?php 
							$articleAverage = number_format( $articleTotal );
							echo number_format($articleTotal) ;?></small></td>
				</tr>
				<tr>
					<td class=" text-right" ><small>TOTAL MAN-HOURS</small></td>
					<?php $manhour = 0; $manhourTotal = 0; $manhourAverage = 0;?>
					<?php foreach($days as $cdate): ?>
						<td class=" text-right"><small>
						<?php 
							$manhour = ($employeeHours[$cdate]['hrs_worked']) ;
							$manhourTotal += $manhour;
							echo  number_format($manhour);
						?></small></td>
					<?php endforeach;?>
					<td class=" text-right" ><small>
						<?php 
							//$manhourAverage = number_format( $manhourTotal );
							echo  number_format($manhourTotal) ;?></small></td>
				</tr>
				<tr>
					<td class=" text-right" ><small>DIRECT STAFF</small></td>
					<?php $staff = 0; $staffTotal = 0; $staffAverage = 0;?>
					<?php foreach($days as $cdate): ?>
						<td class=" text-right"><small>
						<?php 
							$staff = ($employeeCount[$cdate]['employee_count']) ;
							$staffTotal += $staff;
							echo  number_format($staff);
						?></small></td>
					<?php endforeach;?>
					<td class=" text-right" ><small>
						<?php 
							//$staffAverage = number_format( $staffTotal  );
							echo  number_format($staffTotal) ;?></small></td>
				</tr>
				<tr>
					<td class=" text-right" ><small>AVERAGE MAN-HOUR</small></td>
					<?php $avgmanhour = 0; $avgmanhourTotal = 0; $avgmanhourAverage = 0;?>
					<?php foreach($days as $cdate): ?>
						<td class=" text-right"><small>
						<?php 
							$avgmanhour =  ($employeeHours[$cdate]['hrs_worked'] / $employeeCount[$cdate]['employee_count']) ;
							$avgmanhourTotal += $avgmanhour;
							echo  number_format($avgmanhour);
							?></small></td>
					<?php endforeach;?>
					<td class=" text-right" ><small>
						<?php 
							$avgmanhourAverage = number_format( $avgmanhourTotal / sizeof($days)); 
							echo  number_format($avgmanhourAverage) ;?>
							</small></td>
				</tr>
				<tr>
					<td class="bg-clearRed text-right" ><small>PRODUCTIVITY</small></td>
					<?php $productivity = 0; $productivityTotal = 0; $productivityAverage = 0;?>
					<?php foreach($days as $cdate): ?>
						<td class="bg-clearRed text-right"><small>
						<?php 
							$productivity = ($articleData[$cdate]['total'] / $employeeHours[$cdate]['hrs_worked']);
							$productivityTotal += $productivity;
							echo  number_format($productivity,1);
						?></small></td>
					<?php endforeach;?>
					<td class="bg-clearRed text-right" ><small>
						<?php $productivityAverage = number_format( $productivityTotal / sizeof($days), 1 );
							echo $productivityAverage ;?>
						</small></td>
				</tr>
			</table>
			<pre><small>
    <strong>TOTAL MAN HOURS</strong> is based on the Paid Hours.  (e.g. 12 hour shift works 10 hours, recorded hours is 12 not 10). 		
    <strong>DIRECT STAFF</strong> is based on worker who reported for work.  Worker on leave (any leave type) is not counted.
    <strong>PRODUCTIVITY</strong> = Total Article (<?php echo $articleTotal ?>) / Total Man-Hour (<?php echo $manhourTotal ?>)
    <strong>CONCLUSION</strong> The data tells us that there are <strong class="fg-green"><?php echo number_format($articleTotal/$manhourTotal ) ?> Articles are processed per person per hour</strong>.
			</small></pre>
		</div>
	</div>
		<div class="panel" data-role="panel">
		<div class="panel-header bg-lightBlue">
		<span class="fg-white">PER TEAM MANPOWER COST SUMMARY</span>
		</div>
		<div class="panel-content">
			<table class="table bordered condensed striped">
				<tr>
					<td class="bg-clearBlue text-right span2" rowspan="2" colspan="2"><small><?php echo strtoupper(DateUtils::DUFormat('F', $sf_params->get('start_date')) ) ?></small></td>
					<?php foreach($days as $cdate): ?>
						<td class="bg-clearBlue text-center" ><small><?php echo DateUtils::DUFormat('D', $cdate) ?></small></td>
					<?php endforeach;?>
					<td class="bg-clearBlue" rowspan="2">Total</td>
				</tr>
				<tr>
					<?php foreach($days as $cdate): ?>
						<td class="bg-clearBlue text-center"><small><?php echo DateUtils::DUFormat('j', $cdate) ?></small></td>
					<?php endforeach;?>
				</tr>
				<?php $seq = 1; ?>
				<?php foreach($salaryByTeam as $team => $whatever):?>
				<tr>
					<td class="text-right"><small><?php echo $seq++ ?></small></td>
					<td class="text-right"><small><?php echo $team ?></small></td>
					<?php $totalSalaryInTeam = 0;?>
					<?php foreach($days as $cdate): ?>
						<?php $totalSalaryInTeam += $salaryByTeam[$team][$cdate];?>
						<td class=" text-right"><small><?php echo number_format($salaryByTeam[$team][$cdate]) ?></small></td>
					<?php endforeach;?>
					<td class="text-right"><small><?php echo number_format($totalSalaryInTeam) ?></small></td>
				</tr>
				<?php endforeach;?>
				<tr>
					<td colspan="2" class="bg-clearRed  text-right"><small>Total</small></td>
					<?php $grandTotalSalary = 0;?>
					<?php foreach($days as $cdate): ?>
						<?php $grandTotalSalary += $salaryByTeamByDate[$cdate]; ?>
						<td class=" bg-clearRed text-right"><small><?php echo number_format($salaryByTeamByDate[$cdate]) ?></small></td>
					<?php endforeach;?>
					<td class="bg-clearRed  text-right"><small><?php echo number_format($grandTotalSalary);  ?></small></td>
				</tr>
			</table>
		</div>
	</div>
	<br>
	<div class="panel" data-role="panel">
		<div class="panel-header bg-lightBlue">
		<span class="fg-white">DAILY ARTICLES</span>
		</div>
		<div class="panel-content">
			<table class="table bordered condensed striped">
				<tr>
					<td class="bg-clearBlue text-right span2" rowspan="2" colspan="2"><small><?php echo strtoupper(DateUtils::DUFormat('F', $sf_params->get('start_date')) ) ?></small></td>
					<?php foreach($days as $cdate): ?>
						<td class="bg-clearBlue text-center" ><small><?php echo DateUtils::DUFormat('D', $cdate) ?></small></td>
					<?php endforeach;?>
					<td class="bg-clearBlue" rowspan="2">Total</td>
				</tr>
				<tr>
					<?php foreach($days as $cdate): ?>
						<td class="bg-clearBlue text-center"><small><?php echo DateUtils::DUFormat('j', $cdate) ?></small></td>
					<?php endforeach;?>
				</tr>
				<?php $seq = 1; ?>
				<?php foreach($articleList as $article ): ?>
				<tr>
					<td class="text-right"><small><?php echo $seq++ ?></small></td>
					<td class="text-right"><small><?php echo $article ?></small></td>
					<?php foreach($days as $cdate): ?>
						<td class=" text-right"><small><?php echo number_format($articleData[$cdate][$article]) ?></small></td>
					<?php endforeach;?>
					<td class="text-right"><small><?php echo number_format($articleData[$article]['total']) ?></small></td>
				</tr>
				<?php endforeach;?>
				<tr class="bg-clearRed">
					<td class="text-right " colspan="2"><small>Total</small></td>
					<?php $grandTotalArticle = 0;?>
					<?php foreach($days as $cdate): ?>
						<?php $grandTotalArticle += $articleData[$cdate]['total']; ?>
						<td class=" text-right"><small><?php echo number_format($articleData[$cdate]['total']) ?></small></td>
					<?php endforeach;?>
				<td class="text-right"><small><?php echo number_format($grandTotalArticle) ?></small></td>
			</table>
		</div>
	</div>
	<br>
	<div class="panel" data-role="panel">
		<div class="panel-header bg-lightBlue">
		<span class="fg-white">DAILY MANPOWER COST</span>
		</div>
		<div class="panel-content">
			<table class="bordered condensed table striped hovered">
				<tr>
					<td class="bg-clearBlue text-center " rowspan="2"><small>SEQ</small></td>
					<td class="bg-clearBlue text-center span2" rowspan="2" ><small>NAME</small></td>
					<td class="bg-clearBlue text-center span2" rowspan="2" ><small>TEAM</small></td>
					<?php foreach($days as $cdate): ?>
						<td class="bg-clearBlue text-center"><small><?php echo DateUtils::DUFormat('D', $cdate) ?></small></td>
					<?php endforeach;?>
					<td class="bg-clearBlue" rowspan="2">Total</td>
				</tr>
				<tr>
					<?php foreach($days as $cdate): ?>
						<td class="bg-clearBlue text-center"><small><?php echo DateUtils::DUFormat('j', $cdate) ?></small></td>
					<?php endforeach;?>
				</tr>
				<?php $seq = 1; ?>
				<?php foreach ($employeeList as $empNo => $name):?>
				<tr>
					<td><small><?php echo $seq++ ?></small></td>
					<td class="text-right" nowrap><small><?php echo substr($name, 0, 10 ) ?></small></td>
					<td class="text-center" nowrap><small><?php echo $employeeTeam[$empNo] ?></small></td>
					<?php foreach($days as $cdate): ?>
						<td class=" text-center"><small><?php echo number_format($employeeData[$empNo][$cdate]['salary']) ?></small></td>
					<?php endforeach;?>
					<td class="text-right"><small><?php echo number_format($employeeData[$empNo]['total_salary']) ?></small></td>
				</tr>
				<?php endforeach;?>
				
				<tr>
					<td colspan="3" class="bg-clearRed  text-right"><small>Total</small></td>
					<?php $grandTotalSalary = 0; ?>
					<?php foreach($days as $cdate): ?>
						<?php $grandTotalSalary += $totalSalaryPerDay[$cdate]; ?>
						<td class=" bg-clearRed text-center"><small><?php echo number_format($totalSalaryPerDay[$cdate]) ?></small></td>
					<?php endforeach;?>
					<td class="bg-clearRed  text-right"><small><?php echo number_format($grandTotalSalary);  ?></small></td>
				</tr>
			</table>
		</div>
	</div>


	<?php foreach($teamList as $team):?>
	<br>
	<div class="panel" data-role="panel">
		<div class="panel-header bg-lightBlue">
		<span class="fg-white">DAILY <?php echo $team ?> TEAM SUMMARY</span>
		</div>
		<div class="panel-content">
			<table class="bordered condensed table striped hovered">
				<tr>
					<td class="bg-clearBlue text-center " rowspan="2"><small>SEQ</small></td>
					<td class="bg-clearBlue text-center span2" rowspan="2" ><small>NAME</small></td>
					<td class="bg-clearBlue text-center span2" rowspan="2" ><small>TEAM</small></td>
					<?php foreach($days as $cdate): ?>
						<td class="bg-clearBlue text-center"><small><?php echo DateUtils::DUFormat('D', $cdate) ?></small></td>
					<?php endforeach;?>
					<td class="bg-clearBlue" rowspan="2">Total</td>
				</tr>
				<tr>
					<?php $seq = 1; $teamTotal= array();?>
					<?php foreach($days as $cdate): ?>
						<?php $teamTotal[$cdate] = 0; ?>
						<td class="bg-clearBlue text-center"><small><?php echo DateUtils::DUFormat('j', $cdate) ?></small></td>
					<?php endforeach;?>
				</tr>
				
				<?php foreach ($employeeList as $empNo => $name):?>
				<?php if ($team == $employeeTeam[$empNo]) : ?>
				<tr>
					<td><small><?php echo $seq++ ?></small></td>
					<td class="text-right" nowrap><small><?php echo substr($name, 0, 10 ) ?></small></td>
					<td class="text-center" nowrap><small><?php echo $employeeTeam[$empNo] ?></small></td>
					<?php foreach($days as $cdate): ?>
						<?php $teamTotal[$cdate] += $employeeData[$empNo][$cdate]['hrs_worked']; ?>
						<td class=" text-center"><small><?php echo number_format($employeeData[$empNo][$cdate]['hrs_worked']) ?></small></td>
					<?php endforeach;?>
					<td class="text-right"><small><?php echo number_format($employeeData[$empNo]['total_salary']) ?></small></td>
				</tr>
				<?php endif;?>
				<?php endforeach;?>
				
				<tr>
					<td colspan="3" class="bg-clearRed  text-right"><small>Total</small></td>
					<?php $grandTotalSalary = 0; ?>
					<?php foreach($days as $cdate): ?>
						<?php $grandTotalSalary += $teamTotal[$cdate]; ?>
						<td class=" bg-clearRed text-center"><small><?php echo number_format($teamTotal[$cdate]) ?></small></td>
					<?php endforeach;?>
					<td class="bg-clearRed  text-right"><small><?php echo number_format($grandTotalSalary);  ?></small></td>
				</tr>
			</table>
			<p><small>The information above indicates the hours worked per worker.</small></p>
		</div>
	</div>
	<?php endforeach;?>
	
	
	<?php 	
		
	endif;
?>

</div>
