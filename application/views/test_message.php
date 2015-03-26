<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<!-- Add jQuery library -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/fancy/lib/jquery-1.10.1.min.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/fancy/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fancy/source/jquery.fancybox.css?v=2.1.5" media="screen" />

	
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			
		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}

		body {
			max-width: 700px;
			margin: 0 auto;
		}
	</style>
</head>
<body>
	<h1>fancyBox</h1>

	
	
	<ul>
	<li><a class="fancybox" href="">test</a> </li>
		
		
	</ul>

	
</body>
</html>