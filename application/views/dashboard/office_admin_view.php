
<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>


 <script type="text/javascript">
  $(document).ready(function () { 
  
  	$("#upfile1").click(function () {
    $("#user_file").trigger('click');
	});
	
	
	
  });
 </script> 



<!--Main contaner start -->
<div id="main_container" >
<!-- left contaner start -->
 
 <!--Left contaner end -->
 <!--right contaner start -->
 <div id="purveyor_container" class="midcontainer" >
 <?php if($this->session->flashdata('success') !='') { ?>
		  			<div class="succ" style="margin-top:20px;"> <?php echo $this->session->flashdata('success'); ?></div> <br>
<?php } ?>
  
 
   <!--test container -->
   <div id="office_admin">
     
		<div class="head"><h1> Office Administartion </h1></div>
			<div style="padding:5px;"><h2>New Conatct</h2></div>
			 <section class="contact" >
				<form action="<?php echo base_url();?>office/submit" method="post" enctype="multipart/form-data">
									  <aside style="width:150px;float:left;">
									  <img src="<?php echo base_url();?>assets/images/profile.gif" id="upfile1" style="cursor:pointer" />
									 <input type="file" name="user_file" id="user_file" style="display:none" />
									  <span> Upload Photo </span>
									 </aside>
									 <section id="purveyor_addnew">
									 
									   <div class="row_2">
											
											<label>Company Name</label> <br />
											<select name="company_name" id="company_name" required="required">
												<option></option>
												<?php foreach($company as $cmp) { ?>
												<option value="<?php echo $cmp['company_id'];?>"><?php echo $cmp['company_name'];?></option>
												<?php } ?>
											</select>	<br /><br />
											
											<label>Contact Person</label><br />
											<input type="text" name="contact_person" required/><br /><br />
											<label>Phone Number</label><br />
											<input type="text" name="contact_number"  required/><br /><br />
											<label>Email Address</label><br />
											<input type="email" name="email" required/><br /><br />
											
											<div style="margin-left:80px;">
												<label><img src="<?php echo base_url();?>assets/images/linkedin.jpg" width="30px;" height="30px;"></label>
												 <input type="text" name="linkedin" style="width:250px;" placeholder="www.linkedin.com/mypage" ><br /><br />
												<label><img src="<?php echo base_url();?>assets/images/fb.jpg" width="30px;" height="30px;"></label>
												 <input type="text" name="fb" style="width:250px;" placeholder="www.facebook.com/mypage"><br /><br />
												<label><img src="<?php echo base_url();?>assets/images/twitter.png" width="30px;" height="30px;"></albel>
												 <input type="text" name="twitter" style="width:250px;" placeholder="www.twitter.com/mypage"><br /><br />
											</div>
											
											<input type="submit" name="submit" value="Add&synch" class="submit">
											
											
										</div>
										
										
									 </section>
				 			<form>
			</section>		
							
		</div>	
  	 </div> <!--end test container-->

  </div> 
 <!--right contaner end -->
 
</div>
</div>
<!--Main contaner end -->  

       



