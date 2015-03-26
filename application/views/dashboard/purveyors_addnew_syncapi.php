
<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>

<script>
$(function() {
	$('#minitab').on('click', 'li', function() {
    $('#tablist li.active').removeClass('active');
    $(this).addClass('active');
});
});
</script>


<!--Main contaner start -->
<div id="main_container" >
<!-- left contaner start -->
 
 <!--Left contaner end -->
 <!--right contaner start -->
 <div id="purveyor_container" >
 <?php if($this->session->flashdata('success') !='') { ?>
		  			<div class="succ" style="margin-top:20px;"> <?php echo $this->session->flashdata('success'); ?></div> <br>
<?php } ?>
<?php if($this->session->flashdata('failure') !='') { ?>
		  			<div class="failure" style="margin-top:20px;"> <?php echo $this->session->flashdata('failure'); ?></div> <br>
<?php } ?>
  

 
   <!--test container -->
   <div id="profile">
     
			<div class="head"><h1> Purveyors </h1></div>
				 <div id="minitab">
						<ul id="tablist">
							<li ><a href="#">Manage</a></li>
							<li><a href="<?php echo base_url();?>purveyors/search">Search</a></li>
							<li class="active"><a href="<?php echo base_url();?>purveyors/addnew">Add New</a></li>
						</ul>
				 </div>
				 <div class="mini-tab-1" >
				 		<div id="tab_manage"><!--common  -->
							<p>
								 <form action="<?php echo base_url();?>purveyors/grocerryadd" method="post" enctype="multipart/form-data">
									  
									 <section id="synch">
									 
									   <div class="row_2">
											<p>Sync API </p>
											<dd style="font-size: 12px;"> Your vendor will provide you with your user name,password and the API.if you dont have access to these online,please contact your vendor representative directly and they can provide these to you.Remember that you can always conatct our support team as well to assist you.
											 </dd> <br>
											<label>API User Name</label> <br />
											<input type="text" name="api_user_anme" required/><br /><br />
											<label>API Password</label><br />
											<input type="password" name="api_user_pwd" required/><br /><br />
											<label>API</label><br />
											<input type="text" name="contact_number"  required/><br /><br />
											
											
											
											<div style="clear:both;"> </div>
										</div>
										<div style="float:right;"> <input type="submit" name="submit" class="submit" value="Add & Synch" /> </div>	
										
										
									 </section>
									 <aside id="sync_right" > 
									 
									 	<?php foreach($company_info as $cmpany) {  ?>
									 	<h3> <?php echo  $cmpany->company_name; ?> </h3> <br> 
									 	<span> <b> Contact Name : </b><?php echo $cmpany->contact_person; ?> </span> <br>
									 	<span> Phone Number : <?php echo $cmpany->contact_number; ?> </span>  <br>
									 	<span> Email Address : <?php echo $cmpany->contact_email; ?> </span>  <br>
									 	<?php } ?>	
									 </aside>
									 <div style="clear:both;"> </div>
				 			<form>
							</p>
						</div>	
				 </div>
			</div>	
  	 </div> <!--end test container-->

  </div> 
 <!--right contaner end -->
 
</div>
</div>
<!--Main contaner end -->  

       



