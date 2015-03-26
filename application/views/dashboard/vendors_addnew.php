<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
<script src="<?php echo base_url()?>assets/js/jquery-1.11.1.min.js"></script>

<!-- start search-->
<script type="text/javascript">
$(document).ready(function () { 
  //$("#grosslist").hide();
  
  $("#search_vendors").click(function () { 
   	
   	 var input_value= $('#search_text').val();
       
			$.ajax({
				type: "POST", 
				async: false,
				dataType: "html", 
				url: "<?php echo base_url();?>vendors/ajax_search",   
				data: "input_value="+input_value,
				success: function(data){ 

					$('#inferiz').html(data);
					
					//$('#grosslist').fadeIn(200).show();
				},
				error: function(){alert('error');}
				});     
	});
});
</script>
<!--end search -->


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

   <!--test container -->
   <div id="profile">
     
			<div class="head"><h1> Vendors </h1></div>
				 <div id="minitab">
						<ul id="tablist">
							<li ><a href="#">Manage</a></li>
							<li  ><a href="<?php echo base_url();?>vendors/search">Search</a></li>
							<li class="active"><a href="<?php echo base_url();?>vendors/addnew">Add New</a></li>
						</ul>
				 </div>
				 <div class="mini-tab-1" >
				 		<div id="tab_manage"><!--common  -->
							<section>
									  	<h3> Regal Foods </h3> <br> 
									 	<span> Contact Name : TEst </span> <br>
									 	<span> Phone Number : TEst </span>  <br>
									 	<span> Email Address : test@mail.com </span>  <br>
									  </section>	
									 <section >
									 <section>

											<div id="item_list" style="margin-left:margin-left:150px;">
											<form action="<?php echo base_url();?>" method="post">
											<div id="item_list" style="overflow-y:auto;">
											<table border="0" cellpadding="3" cellspacing="10">
											<tr><th style="background:#999999;width:100px;"> Ingredient </th><th style="background:#999999;">Unit</th><th style="background:#999999;"> Measurement </th>
											<th style="background:#999999;">Cost </th> <th style="background:#999999;">Include </th></tr>
												
											<tr><td><input type="text" name="ingredient[]" /></td>
											<td><input type="text" name="unit[]" style="width:50px;" /></td>
											<td><input type="text" name="measurement[]" /></td>
											
											<td><input type="text" name="cost[]" style="width:50px;" /></td>
											
											<td><input type="checkbox" name="check[]"/></td>
											</tr>
											<tr><td><input type="text" name="ingredient[]" /></td>
											<td><input type="text" name="unit[]" style="width:50px;" /></td>
											<td><input type="text" name="measurement[]" /></td>
											
											<td><input type="text" name="cost[]" style="width:50px;" /></td>
											
											<td><input type="checkbox" name="check[]"/></td>
											</tr>
											
											</div>
											<tr><td colspan="5"><input type="submit" name="submit" class="submit" value="Add & Sync" /></td></tr>	
											</table>
									 </section>	
						</div>	
				 </div>
			</div>	
  	 </div> <!--end test container-->

  </div> <!--right contaner end -->
 
</div>
</div>
<!--Main contaner end -->  

       



