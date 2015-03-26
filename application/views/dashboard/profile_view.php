
<script language='javascript' type='text/javascript'>
function check(input) {
    if (input.value != document.getElementById('newpwd').value) {
        input.setCustomValidity('The two passwords must match.');
    } else {
        // input is valid -- reset the error message
        input.setCustomValidity('');
   }
}
</script>	
<!--Main contaner start -->
<div id="main_container" >
<!-- left contaner start -->
 <div id="left_container" >
 	
	
	<section class="left_widget_2">
	 <div class="head"><h3>Your Info</h3></div>
	 <ul>
	    <li> <a href="#" > Brett payne </a> </li>
		<li> <a href="#" > Own </a> </li>
		<li class="last"> <a href="#" > Admin </a> </li>
	  </ul>
	</section>
	
 </div>
 <!--Left contaner end -->
 <!--right contaner start -->
 <div id="right_container" >
   <div id="profile" class="profile_div">
   		<div class="head"><h1> Profile </h1></div>
		<div id="profile_info">
		 <?php ?>
		  <form class="form" action="<?php echo base_url();?>profile/submit" method="post" enctype="multipart/form-data">
		 
		  <p >Your Login Information</p>
		  <?php if($this->session->flashdata('msg') !='') { ?>
		  <div class="failure"> <?php echo $this->session->flashdata('msg'); ?></div> <br>
		  <?php } ?>
		  <?php if($this->session->flashdata('success') !='') { ?>
		  <div class="succ"> <?php echo $this->session->flashdata('success'); ?></div> <br>
		  <?php } ?>
		 
		  <label> <b> Your Email Address </b> </label> <br>
		  <input type="email" name="email" placeholder="Your email address" value="<?php echo $emailid; ?>" readonly required  ><br><br>
		  <lable> <b> Old Password </b> </label> <br>
		  <input type="password" name="oldpwd" required > <br><br>
		   <lable> <b> New Password </b> </label> <br>
		  <input type="password" id="newpwd" name="newpwd" required  > <br><br>
		  <lable><b> New Password confirmation </b> </label> <br>
		  <input type="password" id="passwordconf" name="passwordconf" oninput="check(this)" required > <br><br>
		  <p >Your contact Information</p>
		  <lable> <b> Phone </b> </label> <br>
		   <input type="text" name="phone" pattern="(\+?\d[- .]*){7,13}" value="<?php  echo $details->phone;  ?>" required ><br><br>
		   <input type="checkbox" name="cog_sms" checked="checked">Receive SMS message of COG change over 2%
		   <p >Settings</p>
		   <input type="checkbox" name="cog_email" checked="checked">Receive daily email with  COG changes <br>
		   <input type="checkbox" name="customer_support" checked="checked">Show customer support widget <br> <br>
		   <input type="submit" class="submit" name="submit" value="Save Setting"> <input class="cancel_bt" type="reset" value="Cancel" >
		  </form>
		</div>
		
   </div>
   
 
 </div>
 <!--right contaner end -->
 <br clear="all" />
 
</div>
<!--Main contaner end -->  
<footer id="footer">

	 <div class="row_1">Havleng problem? contact support</div>
	 <div class="row_2">
	 <a href="#"> What's new </a> | <a href="#">syatem stats </a> | <a href="#">Privacy Policy </a> | <a href="#">Terms of service </a>
	 </div>
	
</footer>
</body>

</body>
</html>
  
  
       



