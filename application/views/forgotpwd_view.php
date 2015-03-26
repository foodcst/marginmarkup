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
	margin: 180px auto 60px;
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
	#body a {
	text-decoration:none;
	font-size:11px;
	color:#CCCCCC;
	font-family:"Courier New", Courier, monospace;
	}
	
	.loginbutton input{
		 
		  color: #666666;
		  cursor: pointer;
		  font-weight: bold;
		  height: 25px;
		  border:0px;
		  width: 55px;
		  margin: 8px 87px 10px 31px;
	}
	.error {
	color:#FF0000;
	float:left;
	}
	.mail_send {
	color: rgb(84, 213, 84);
	}
	</style>
</head>
<body>

<div id="container">
       
		<div id="body">
		 <form action="<?php echo base_url();?>login/forgotpassword" method="post">
		  <span class="error"><?php echo $this->session->flashdata('msg'); ?> </span>
		  <span class="mail_send">
		   <?php
		 	if($this->session->flashdata('email_send')!='') { echo $this->session->flashdata("email_send"); }
		 ?>
		 </span>
		 <input type="email" name="email" class="txtstyle" required placeholder="Enter Your Email Address">
		 <span class="error"> <?php echo form_error('email'); ?> </span>
		  <br>
		
		 <div class="loginbutton">
		 	<input type="submit" name="submit">
		 </div>
		 </form>
		</div>
		
</div>

</body>
</html>