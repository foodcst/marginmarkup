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
  
  	$("#upfile1").click(function () {
    $("#user_file").trigger('click');
	});
	
	
	
  });
 </script> 
<!-- start search-->
<script type="text/javascript">
 $(document).ready(function () { 
     $("#search_vendors").click(function () {
   	 
   	 var input_value= $('#search_text').val();
   
			$.ajax({
				type: "POST", 
				async: false, 
				url: "<?php echo base_url();?>purveyors/search",   
				data: "input_value="+input_value,
				success: function(data){ alert(data);
					//$('#inferiz').html(data);
					
				},
				error: function(){alert('error');}
				});     
	});
});
</script>
<!--end search -->
<script>
$(function() {
$( "#tabs" ).tabs();
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
   <div id="profile">
     
   		<div class="head"><h1> Purveyors </h1></div>
		
		 <!--Tab Start -->
			<div id="tabs">
				<ul>
				<li><a href="#tabs-1">Manage</a></li>
				<li><a href="#tabs-2">Search</a></li>
				<li><a href="#tabs-3">Add New</a></li>
				</ul>
				<div id="tabs-1">
				<p>
				
				</p>
				
				</div>
				<div id="tabs-2">
				<p>
					 <form id="search_form" action="" method="post">
					 <input type="text" name="search" id="search_text" style="width:300px;height:20px;" />
					 <input type="submit" value="search vendors" name="search_vendors" id="search_vendors" />
					</form>
				</p>
				</div>
				<div id="tabs-3">
				
				
				<form action="<?php echo base_url();?>purveyors/submit" method="post" enctype="multipart/form-data">
				  <aside style="width:150px;float:left;">
				  <img src="<?php echo base_url();?>assets/images/profile.gif" id="upfile1" style="cursor:pointer" />
				 <input type="file" name="user_file" id="user_file" style="display:none" />
				  <label> Upload Photo </label>
				 </aside>
				 <section id="purveyor_addnew">
				 
				   <div class="row_2">
						<p>Company Information </p>
						<label>Company Name</label> <br />
						<input type="text" name="company_anme" required/><br /><br />
						<label>Contact Person</label><br />
						<input type="text" name="contact_person" required/><br /><br />
						<label>Phone Number</label><br />
						<input type="text" name="contact_number"  required/><br /><br />
						<label>Email Address</label><br />
						<input type="email" name="email" required/><br /><br />
						<p>syncing Options </p>
						
						<div style="">
							<div style="float:left;">
								<input type="checkbox" id="spread"/>Import a spreadsheet<br />
								<input type="checkbox" />Add manually <br />
								<input type="checkbox" />Use the Vendor's API <br />
							</div>
							<div style="float:left; margin-left:44px;">
								<input type="radio" name="ftp" id="radio_1" />FTP <input type="radio" name="ftp" id="radio_2"/>Drag and Drop <br />
								<div id="hide-ftp">
									<label>Server   : </label>&nbsp;&nbsp;<input type="text" name="server_name" style="width:120px;" /> <br />
									<label>Username : </label><input type="text" name="serve_user" style="width:120px;"/> <br />
									<label>Password : </label><input type="password" name="server_pwd" style="width:120px;"/>
								</div>
								<div id="hide-drag">
								 <input type="file" name="csv" /> 
								</div>	
							</div>
						</div>
						
						<div style="clear:both;"> </div>
					</div>
					<div style="float:right;margin-right: 300px;"> <input type="submit" name="submit" class="submit" value="Add & Synch" /> </div>	
					<div style="clear:both;"> </div>
					
				 </section>
				 <form>
				 <!-- start grocery api items -->
					<div style="margin-left:margin-left:150px;">
					   <form action="">
							<table border="1">
								<tr><th> Count </th><th>Unit</th><th>Grocery Items </th> <th>Factor </th> <th>count </th><th>Unit </th> <th>Order guide </th> <th>Match </th></tr>
								<tr><td><input type="text" style="width:50px;" /></td>
									<td><input type="text" style="width:50px;" /></td>
									<td><select>
										<option>Apple </option>
										</select>
									</td>
									<td><input type="text" style="width:50px;" /></td>
									<td>48</td>
									<td></td>
									<td>Avocado Hass Fresh</td>
									<td><input type="checkbox" /></td>
								</tr>
								<tr><td colspan="10"><input type="submit" /></td></tr>	
							</table>
						</form>	
					</div> <!--end grocery api item -->
				</div> <!--Tab end-->
		 
		
   </div>
   
 
 </div>
 <!--right contaner end -->

 
</div>
</div>
<!--Main contaner end -->  
<footer id="footer">

	 <div class="row_1">Havleng problem? contact support</div>
	 <div class="row_2">
	 <a href="#"> What's new </a> | <a href="#">syatem stats </a> | <a href="#">Privacy Policy </a> | <a href="#">Terms of service </a>
	 </div>
	
</footer>
</body>

       



