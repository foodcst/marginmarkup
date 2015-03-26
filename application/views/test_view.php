<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Margin Markup</title>

	<!--<style type="text/css">

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
	</style> -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css">
<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
<!-- check box disabled -->
<script type="text/javascript">
$(function() {
 $("#hide-ftp").css("display", "none");
 $("#hide-drag").css("display", "none");
 $("input.group1").attr("disabled", true);
  enable_cb();
  $("#spread").click(enable_cb);
  $(".group1").click(enable_ftp);
  $(".group2").click(enable_drag);
});

function enable_cb() { 
  if (this.checked) {
    $("input.group1").removeAttr("disabled");
	$("input.group2").removeAttr("disabled");
	
	$("#hide-ftp").css("display", "none");
	$("#hide-drag").css("display", "none");
  } else { 
  		$("input.group1").prop('checked', false);
		$("input.group2").prop('checked', false);
     $("input.group1").attr("disabled", true);
	 $("input.group2").attr("disabled", true);
	 $("#hide-ftp").css("display", "none");
	 $("#hide-drag").css("display", "none");
  }
}

function enable_ftp() {
if (this.checked) {

	/*$("input.group2").attr("disabled", true);*/
	$("input.group1").removeAttr("disabled");
	$("#hide-ftp").css("display", "block");
	$("#hide-drag").css("display", "none");
} 
else {
 	/*$("input.group2").removeAttr("disabled");*/
 	$("input.group1").removeAttr("disabled");
	$("#hide-ftp").css("display", "none");
	$("#hide-drag").css("display", "none");
 }
}
function enable_drag() { 
if (this.checked) {
	/*$("input.group1").attr("disabled", true);*/
	$("#hide-ftp").css("display", "none");
	$("#hide-drag").css("display", "block");
} 
else {
 	$("input.group1").removeAttr("disabled");
 	$("input.group2").removeAttr("disabled");
	$("#hide-ftp").css("display", "none");
	$("#hide-drag").css("display", "none");
 }
}
</script> <!-- check box end -->

</head>
<body>

<div id="container">
       
		<div id="body">
		<form class="pure-form" method="post" action="">
    <fieldset>
        <legend>Confirm password with HTML5</legend>

        <input type="password" placeholder="Password" id="password" required>
        <input type="password" placeholder="Confirm Password" id="confirm_password" required>

        <button type="submit" class="pure-button pure-button-primary">Confirm</button>
    </fieldset>
</form>
	
	<script type="text/javascript">
	var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
	</script>
		</div>
		
</div> 
<form action="<?php echo base_url();?>purveyors/test3" method="post">

<div style=""><input type="checkbox" id="spread" name="syncoption"/>Import a spreadsheet<br />
<input type="checkbox" name="syncoption" id="manual" />Add manually <br />
								<input type="checkbox" name="syncoption" id="vendorapi" />Use the Vendor's API <br />
								<input type="radio" name="spreadchk" class="group1" value="ftp" />FTP <input type="radio" name="spreadchk" value="dragndrop" class="group2"/>Drag and Drop <br />
								<div id="hide-ftp">
									<label>Server   : </label>&nbsp;&nbsp;<input type="text" name="server_name" style="width:120px;" /> <br />
									<label>Username : </label><input type="text" name="serve_user" style="width:120px;"/> <br />
									<label>Password : </label><input type="text" name="server_pwd" style="width:120px;"/>
								</div>
								<div id="hide-drag">
								 <input type="file" name="csv" /> 
								</div>	
								<input type="submit">
								</form>
</body>
</html>