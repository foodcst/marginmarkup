<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Margin Markup</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #576477;
		margin: 0px;
		padding:0px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		
	}
	
	
	form{
	width:400px;
	margin: 0 auto;
	display: block;
	}
	
	input {
	 display: block;
	 width: 150px;
	 float: left;
	 margin-bottom: 10px;
	}
	
	.txtstyle::-webkit-input-placeholder {
    font-family: Georgia, "Times New Roman", Times, serif;
	}

	.txtstyle:-ms-input-placeholder {
		font-family: Verdana, Arial, Helvetica, sans-serif;
	}

	.txtstyle:-moz-placeholder {
     font-family: Georgia, "Times New Roman", Times, serif;
	}

	.txtstyle::-moz-placeholder {
    font-family: Verdana, Arial, Helvetica, sans-serif;
	}
	
	br {
 		clear: left;
	}
	img {
		width:270px;
		height:70px;
		margin:0px 5px 0px 25px;
	}
	.txtstyle {
		
		width: 300px;
		height:20px;
		color:#333333;
		padding:3px;
		margin-right:4px;
		margin-bottom:8px;
		font-family:tahoma, arial, sans-serif;
		-webkit-border-radius: 3px; 
       -moz-border-radius: 3px; 
       border-radius: 3px; 
	}
	#body {
	padding-top:150px;
	}
	#body a {
	text-decoration:none;
	font-size:11px;
	color:#CCCCCC;
	font-family:"Courier New", Courier, monospace;
	}
	
	.loginbutton input{
		  background: url("<?php echo base_url();?>assets/images/login.png") no-repeat scroll;
		  color: #000000;
		  text-indent:-999px;
		  cursor: pointer;
		  font-weight: bold;
		  height: 38px;
		  float:right;
		  border:0px;
		  width: 90px;
		  margin: 8px 87px 10px 31px;
	}
	.error {
	color:#FF0000;
	float:left;
	}
	.mail_send {
	color: rgb(84, 213, 84);
	margin-left: 77px;
	}
	.stats_error {
	padding: 10px;
	margin-bottom: 20px;
	background-color: #FFFFFF;
	border: 1px solid #d7e3f0;
	height: 20px;
	border-left: 4px solid #E74C3C;
	width: 280px;
	color: #E74C3C;
	font-weight: bold;
	}
	.stats_succ {
	padding: 10px;
	margin-bottom: 20px;
	background-color: #FFFFFF;
	border: 1px solid #d7e3f0;
	height: 20px;
	border-left: 4px solid #2ECC71;
	width: 280px;
	color: #2ECC71;
	font-weight: bold;
	}
	</style>
</head>
<body>

<div id="container">
       
		<div id="body">
		
		 <form action="<?php echo base_url();?>login/authenticate" method="post">
		
		 <img src="<?php echo base_url();?>assets/images/logo-111.png">
		 
		 <?php if($this->session->flashdata('msg') !='') { ?>
		 <div class="stats_error"> <?php echo $this->session->flashdata('msg'); ?> </div>
		 <?php } ?>
		  <?php if($this->session->flashdata('logout_succes') !='') { ?>
			 <div class="stats_succ">
		<?php 
		 echo $this->session->flashdata('logout_succes');
		?>	
		</div>
		<?php } ?>
		 <input type="email" name="email" class="txtstyle" required placeholder="Email">
		 <span class="error"> <?php //echo form_error('email'); ?> </span>
		  <br>
		 <input type="password" name="password" class="txtstyle" required placeholder="Password">
		 <span class="error"><?php //echo form_error('password'); ?> </span>
		  <br>
		 <a  href="<?php echo base_url()?>login/forgotpassword">Forgot Yor Password?</a>
		 <div class="loginbutton">
		 	<input type="submit" name="submit">
		 </div>
		 </form>
		</div>
		 <br clear="all" />
</div>

</body>
</html>