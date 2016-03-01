<div id="footer_quality" class="alignCenter">
<?php 
$webPolicyHeader = WebPolicyHeaderPeer::GetActivePolicy();
foreach($webPolicyHeader as $header):
?>
<h2>&nbsp;&nbsp;&nbsp;<?php echo $header->getName() ?></h2>
	<ol>
	<?php 
		$webPolicyDetail = WebPolicyDetailPeer::GetDetailByWebPolicyHeaderId($header->getId()); 
		foreach($webPolicyDetail as $detail):
	?>
	<li><small><?php echo $detail->getContent(); ?></small></li>	
	<?php endforeach; ?>
	</ol>
<?php endforeach; ?>

