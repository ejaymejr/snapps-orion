 <?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>
<table class="table condensed bordered" id="mfgTableResult"> 
<tr>
    <td class="bg-green fg-white alignCenter span3" nowrap>MANUFACTURING SECTOR</td>
    <td class="bg-green fg-white alignCenter span3" nowrap><center>ENTITLEMENT</center></td>
    <td class="bg-green fg-white alignCenter span3" nowrap><center>UTILISED</center></td>
    <td class="bg-green fg-white alignCenter span3" nowrap><center>BALANCE</center></td>
    <td class="bg-green fg-white alignCenter span3" nowrap></td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap><small>Foreign Worker Quota</small></td>
    <td class="bg-white " nowrap>    
    <?php
    	$calculateQuota = new QuotaLevy();
    	$totForeignWorker = $calculateQuota->ComputeMfgForeignWorkerQuota($com_spr);
    	$totForeignUtilised = $com_spass + $com_wp + $com_prc;
    	$totalWorkForce = $totForeignUtilised + $com_spr;
    	echo number_format($totForeignWorker, 1);
    	echo '<small class="fg-crimson"> ( '.$calculateQuota->FormulaMfgForeignWorkerQuota($com_spr).' ) </small>';
    ?></td>
    <td class="bg-white " nowrap>    
    <?php
    	echo number_format($totForeignUtilised, 1);
    ?></td>
    <td class="bg-white alignRight" nowrap>    
    <?php
    	echo number_format($totForeignWorker - $totForeignUtilised, 1);
    ?></td>
    <td class="bg-white " nowrap><span class="fg-crimson"><small></small></span></td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap><small>SPASS Quota</small></td>
    <td class="bg-white " nowrap>    
    <?php
    	$totSpass = $calculateQuota->ComputeMfgSPassQuota($totalWorkForce);
    	echo number_format($totSpass, 1);
    	echo '<small class="fg-crimson"> ( '.$calculateQuota->FormulaMfgSPassQuota($totalWorkForce).' ) </small>';
    ?></td>
    <td class="bg-white " nowrap>    
    <?php
    	echo $com_spass;
    ?></td>
    <td class="bg-white alignRight" nowrap>    
    <?php
    	echo number_format($totSpass - $com_spass, 1);
    ?></td>
    <td class="bg-white " nowrap><span class="fg-crimson"><small></small></span></td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap><small>PRC Quota</small></td>
    <td class="bg-white " nowrap>    
    <?php
    	$totPrc = $calculateQuota->ComputeMfgPRCQuota($totalWorkForce );
    	echo number_format($totPrc, 1);
    	echo '<small class="fg-crimson"> ( '.$calculateQuota->FormulaMfgPRCQuota($totalWorkForce).' ) </small>';
    ?></td>
    <td class="bg-white " nowrap>    
    <?php
    	echo $com_prc;
    ?></td>
    <td class="bg-white alignRight" nowrap>    
    <?php
    	echo number_format($totPrc - $com_prc, 1);
    ?></td>
    <td class="bg-white " nowrap><span class="fg-crimson"><small></small></span></td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap><small>WP (malaysian) Quota</small></td>
    <td class="bg-white " nowrap>    
    <?php
    	//totalSPPRC = $totSpass + $totPrc;
    	$totalWPMalaysian = $totForeignWorker -  $totSpass -  $totPrc;
		echo number_format($totalWPMalaysian, 1);
    ?><span class="fg-crimson"><small> 
    (Total Foreign Worker [ <?php echo number_format($totForeignWorker, 1) ?> ]
    <br>- SPass Quota [ <?php echo number_format($totSpass, 1) ?> ]
    <br>- PRC Quota [ <?php echo number_format($totPrc, 1) ?> ] )</small></span></td>
    <td class="bg-white " nowrap>    
    <?php
    	echo $com_wp;
    ?></td>
    <td class="bg-white alignRight" nowrap>    
    <?php
    	echo number_format($totalWPMalaysian -  $com_wp, 1);
    ?></td>
    <td class="bg-white " nowrap><span class="fg-crimson"><small></small></span></td>
</tr>
</table>
