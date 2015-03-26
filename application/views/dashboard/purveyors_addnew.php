<link rel="stylesheet" href="<?php echo base_url()?>assets/css/stylescroll.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.mCustomScrollbarGrocery.css">


<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css">
<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
<!-- check box disabled -->
 <script type="text/javascript">
  $(document).ready(function () { 
	$('input#radio_1').attr("disabled",true); 
	$('input#radio_2').attr("disabled",true);  	
	
     $("#hide-ftp").hide();
	 $("#hide-drag").hide();
	  
	 $("#spread").click(enable_cb);
	 
	function enable_cb() { 
	if (this.checked) {
	 $("input#radio_1").removeAttr("disabled");
	 $("input#radio_2").removeAttr("disabled");
	}
		else {
		 $("#hide-ftp").hide();
		 $("#hide-drag").hide();
		 $('input#radio_1').attr("disabled",true); 
		$('input#radio_2').attr("disabled",true);  	
		 
		}
	} 
	
	
	
    $("#radio_1, #radio_2").change(function () { 
        if ($("#radio_1").is(":checked")) {
            $("#hide-ftp").show();
			$("#hide-drag").hide();
        }
        else if ($("#radio_2").is(":checked")) {
            $("#hide-drag").show();
			$("#hide-ftp").hide();
        }
       
    });        
});
 </script>
 
<script type="text/javascript">
 $(document).ready(function () {
  $("#hide-drag").removeAttr('checked');
	  $("#hide-ftp").removeAttr('checked'); 
   var $unique = $('input.unique12');
   $unique.click(function() {
   var val =$(this).val();
   if(val != 'spread') {
     $("#hide-drag").hide();
	 $("#hide-ftp").hide();
	  $("#hide-drag").prop('checked', false);
	  $("#hide-ftp").prop('checked', false);
   }
    //$unique.filter(':checked').not(this).removeAttr('checked');
	
});
});
 </script>  
 
 <script type="text/javascript">
 $(document).ready(function () { 
   var $unique = $('input.unique3');
  
   var $uniqueapi = $('input.unique');
   var $unique2 = $('input.unique2');
   //$('input.unique12').prop('checked', false);
    
	
	
   $uniqueapi.click(function() { 
   $("#hide-ftp").hide();
	 $("#hide-drag").hide();
    $('input.unique2').prop('checked', false); 
	 $('input.unique3').prop('checked', false);
   });
   
   $unique2.click(function() { 
   $("#hide-ftp").hide();
	 $("#hide-drag").hide();
    $('input.unique12').attr("disabled",true);
	 $('input.unique123').attr("disabled",true);  
     $('input.unique').prop('checked', false); 
	 $('input.unique3').prop('checked', false);
   });
   
   $unique.click(function() { 
      $('input.unique3').attr('checked', 'checked');
     $('input.unique').prop('checked', false); 
	 $('input.unique2').prop('checked', false);
   var val = $(this).val();
   if(val == 'ftp') {
    
     $("#hide-ftp").show();
	 $("#hide-drag").hide();
    }
    if(val == 'drag') { 
	
     $("#hide-drag").show();
	 $("#hide-ftp").hide();
    }
	
    //$unique.filter(':checked').not(this).removeAttr('checked');
});
});
 </script>  
 
 <script type="text/javascript">
  $(document).ready(function () { 
  
  	$("#upfile1").click(function () {
    $("#user_file").trigger('click');
	});
	
	
	
  });
 </script> 

<script>
$(function() {
$( "#tabs" ).tabs();
});
</script>

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

<?php if($this->session->flashdata('failure_already') !='') { ?>
		  			<div class="failure" style="margin-top:20px;"> <?php echo $this->session->flashdata('failure_already'); ?></div> <br>
<?php } ?>

 
   <!--test container -->
   <div id="profile" class="purveyor-div">
     
			<div class="head"><h1> Purveyors </h1></div>
				 <div id="minitab">
						<ul id="tablist">
							<li ><a href="<?php echo base_url();?>purveyors/manage">Manage</a></li>
							<li><a href="<?php echo base_url();?>purveyors/search">Search</a></li>
							<li class="active"><a href="<?php echo base_url();?>purveyors/addnew">Add New</a></li>
						</ul>
				 </div>
				 <div class="mini-tab-1" >
				 		<div id="tab_manage"><!--common  -->
							<p> <?php if($company_id !="") {  ?>
								     <form action="<?php echo base_url();?>purveyors/update" method="post" enctype="multipart/form-data">
									  <aside style="width:150px;float:left;">
									  <img src="<?php echo base_url();?>assets/images/profile.gif" id="upfile1" style="cursor:pointer" />
									 <input type="file" name="user_file" id="user_file" style="display:none" />
									  <label> <span class="upload-photo"> Upload Photo </span> </label>
									 </aside>
									 <section id="purveyor_addnew">
									 
									   <div class="row_2">
											<p>Company Information </p>
											<label>Company Name</label> <br />
											<input type="text" name="company_name" value="<?php echo @$company_info->company_name;?>"  required/><br /><br />
											<label>Contact Person</label><br />
											<input type="text" name="contact_person" value="<?php echo @$company_info->contact_person;?>" required/><br /><br />
											<label>Phone Number</label><br />
											<input type="text" name="contact_number" value="<?php echo @$company_info->contact_number;?>"  required/><br /><br />
											<label>Email Address</label><br />
											<input type="email" name="email" value="<?php echo @$company_info->contact_email;?>" required/><br /><br />
											<p>syncing Options </p>
											
											<div style="">
												<div style="float:left;font-size: 12px;">
													<input type="checkbox" value="spread"  id="spread" class="unique"/>Import a spreadsheet<br />
													<input type="checkbox" value="manual" name="manual" class="unique2"/>Add manually <br />
													<input type="checkbox" value="vendorapi" name="vendorapi" class="unique3" checked="checked"/>Use the Vendor's API <br />
												</div>
												<div style="float:left; margin-left:44px;font-size: 12px;">
													<input type="checkbox" name="ftp" value="ftp" id="radio_1" class="unique12"/>FTP 
													<input type="checkbox" name="drag" value="drag" id="radio_2" class="unique123"/>Drag and Drop <br />
													<div id="hide-ftp">
														<span><label>Server   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label><input type="text" name="server_name" /></span> <br />
														<span> <label>Username : </label><input type="text" name="serve_user" /> </span> <br />
														<span>	<label>Password : </label><input type="password" id="pwd" name="server_pwd" /> </span><br />
													</div>
													<div id="hide-drag">
														
													 <input type="file" name="csv_file"  /> 
													</div>	
												</div>
											</div>
											<input type="hidden" name="company_id" value="<?php echo @$company_info->company_id;?>" />
											<div style="clear:both;"> </div>
										</div>
										<div style="float:right;margin-right: 300px;"> <input type="submit" name="submit" class="submit" value="Add & Synch" /> </div>	
										<div style="clear:both;"> </div>
										
									 </section>
				 			<form>
							<?php } else { ?>
							       <form action="<?php echo base_url();?>purveyors/submit" method="post" enctype="multipart/form-data">
									  <aside style="width:150px;float:left;">
									  <img src="<?php echo base_url();?>assets/images/profile.gif" id="upfile1" style="cursor:pointer" />
									 <input type="file" name="user_file" id="user_file" style="display:none" />
									  <label> <span class="upload-photo"> Upload Photo </span> </label>
									 </aside>
									 <section id="purveyor_addnew">
									 
									   <div class="row_2">
											<p>Company Information </p>
											<label>Company Name</label> <br />
											<input type="text" name="company_anme"  required/><br /><br />
											<label>Contact Person</label><br />
											<input type="text" name="contact_person"  required/><br /><br />
											<label>Phone Number</label><br />
											<input type="text" name="contact_number"   required/><br /><br />
											<label>Email Address</label><br />
											<input type="email" name="email"  required/><br /><br />
											<p>syncing Options </p>
											
											<div style="">
												<div style="float:left;font-size: 12px;">
													<input type="checkbox" value="spread"  id="spread" class="unique"/>Import a spreadsheet<br />
													<input type="checkbox" value="manual" name="manual" class="unique2"/>Add manually <br />
													<input type="checkbox" value="vendorapi" name="vendorapi" class="unique3" checked="checked"/>Use the Vendor's API <br />
												</div>
												<div style="float:left; margin-left:44px;font-size: 12px;">
													<input type="checkbox" name="ftp" value="ftp" id="radio_1" class="unique12"/>FTP 
													<input type="checkbox" name="drag" value="drag" id="radio_2" class="unique12"/>Drag and Drop <br />
													<div id="hide-ftp">
														<span><label>Server   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label><input type="text" name="server_name" /></span> <br />
														<span> <label>Username : </label><input type="text" name="serve_user" /> </span> <br />
														<span>	<label>Password : </label><input type="password" id="pwd" name="server_pwd" /> </span><br />
													</div>
													<div id="hide-drag">
														
													 <input type="file" name="csv_file"  /> 
													</div>	
												</div>
											</div>
											
											<div style="clear:both;"> </div>
										</div>
										<div style="float:right;margin-right: 300px;"> <input type="submit" name="submit" class="submit" value="Add & Synch" /> </div>	
										<div style="clear:both;"> </div>
										
									 </section>
				 			<form>
							<?php } ?>
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


       



