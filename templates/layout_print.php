<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<link href="<?php echo url_for('').'css/print.css' ?> " rel="stylesheet" />
<link href="<?php echo url_for('').'css/printwb.css' ?>" rel="stylesheet" />
<script type="text/javascript" src="<?php echo url_for('').'js/signature/flashcanvas.js' ?>" ></script>
<script type="text/javascript" src="<?php echo url_for('').'js/jquery-2.js' ?>"  ></script>

<script type="text/javascript" src="<?php echo url_for('').'js/signature/modernizr.js' ?>"  ></script>
<script type="text/javascript" src="<?php echo url_for('').'js/signature/jSignature.min.js' ?>"  ></script>
<script type="text/javascript" src="<?php echo url_for('').'js/signature/jSignature.min.noconflict.js' ?>"  ></script>
<body>
<?php //include_partial('global/message', array('sf_request' => $sf_request)); ?>
<div id="main">
	<?php echo $sf_data->getRaw('sf_content') ?>
</div>
</body>
</html>

