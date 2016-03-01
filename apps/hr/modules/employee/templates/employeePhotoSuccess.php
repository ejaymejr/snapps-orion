<div class="contentBox">
	<?php 
		$cols = 4;
	?>
	<table class="table condensed bordered">
		<tr>
			<td colspan="<?php echo $cols ?>" class="alignCenter bg-orange" ><h2 class="fg-white" >EMPLOYEE PHOTO</h2></td>
		</tr>
		
		<?php for($pos=0; $pos < sizeof($list['name']); $pos++ ): ?>
			<tr>
			<?php for ($x=0; $x< 4; $x++): ?>
			<td class="alignCenter">
				<?php echo image_tag('employee/' . $list['photo'][$x + $pos],'size="130x200"'); ?>
				<br>
				<?php echo $list['name'][$x + $pos]; ?>
			</td>
			<?php endfor; $pos= ($x - 1) + $pos; ?>
			</tr>
		<?php endfor;?>
		
	</table>
	
</div>