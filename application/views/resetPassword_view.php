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
	
	.login {
	color:#FF0000;
	}
	.loginLink {
	color: rgb(84, 213, 84);
	}
	</style>
	<script type="text/javascript" src="<?php echo base_url();?>assets/jqueryplugin/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/jqueryplugin/jquery.validate.js"></script>
  
	<script>

function validatePassword(){
 
 var validator = $("#loginForm").validate({
  rules: {                   
   password :"required",
   passconf:{
    equalTo: "#password"
      }  
     },                             
     messages: {
      password :" Enter Password",
      passconf :" Enter Confirm Password Same as Password"
     }
 });
 if(validator.form()){
  form = $("#loginForm").serialize();
  
  	
		$.ajax({
       type: "POST",
       url: "<?php  echo site_url('resetpassword/add'); ?>",
       data: form,

       success: function(data){ 
          if(data==0) { 
		   $('.login').html('The URL Doesnt Match ');
		   $('#password').val('');
		   $('#passconf').val('');
		   }
		  if(data==1) {
		   $('.loginLink').append('Your password reset succes! click on <a href="<?php echo base_url();?>login"> Login? </a> ');
		   $('#password').val('');
		   $('#passconf').val('');
		    }
       }

     });
     event.preventDefault();
     return false;  //stop the actual form post !important!

 }
}

 </script>
 
</head>
<body>

<div id="container">
     <?php $code = $this->input->get('code');?>  
		<div id="body">
		
		 <form id="loginForm" action="" method="post">
		 <div class="login" > </div>
		 <div class="loginLink" > </div>
		 <input type="password" id="password" name="password" class="txtstyle" placeholder="Password" >
		 <span class="error"> <?php echo form_error('password'); ?> </span>
		  <br>
		 <input type="password" id="passconf" name="passconf" class="txtstyle" placeholder="Retype Password" >
		 <span class="error"><?php echo form_error('passconf'); ?> </span>
		  <br>
		
		 <div class="loginbutton">
		 <input type="hidden" name="code" value="<?php echo $code; ?>">
		 	<input type="submit" name="submit" id="submit" onClick="validatePassword();">
		 </div>
		 </form>
		</div>
		
		
		
</div>

</body>
</html>