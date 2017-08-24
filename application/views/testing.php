<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>jQuery UI Example Page</title>
	<link href="<?php echo base_url(); ?>resource/js/jquery-ui-1.12/jquery-ui.css" rel="stylesheet">
	<style>
	body{
		font-family: "Trebuchet MS", sans-serif;
		margin: 50px;
	}
	.demoHeaders {
		margin-top: 2em;
	}
	#dialog-link {
		padding: .4em 1em .4em 20px;
		text-decoration: none;
		position: relative;
	}
	#dialog-link span.ui-icon {
		margin: 0 5px 0 0;
		position: absolute;
		left: .2em;
		top: 50%;
		margin-top: -8px;
	}
	#icons {
		margin: 0;
		padding: 0;
	}
	#icons li {
		margin: 2px;
		position: relative;
		padding: 4px 0;
		cursor: pointer;
		float: left;
		list-style: none;
	}
	#icons span.ui-icon {
		float: left;
		margin: 0 4px;
	}
	.fakewindowcontain .ui-widget-overlay {
		position: absolute;
	}
	select {
		width: 200px;
	}
	</style>
</head>
<body>
<div id="datepicker"></div>
<script src="<?php echo base_url(); ?>resource/js/jquery-3.1.0.js"></script> 
<script src="<?php echo base_url(); ?>resource/js/sizzle.js"></script> 
<script src="<?php echo base_url(); ?>resource/js/jquery-ui-1.12/jquery-ui.js"></script>
<script>
	$($function(){
		$('#date').datepicker();
	});

$( "#datepicker" ).datepicker({
	inline: true
});
</script>
</body>

</html>