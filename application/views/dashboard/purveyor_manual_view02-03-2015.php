<link rel="stylesheet" href="<?php echo base_url()?>assets/css/stylescroll.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.mCustomScrollbarGrocery.css">

<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>

<script>
$(function() {
	$('#minitab').on('click', 'li', function() {
    $('#tablist li.active').removeClass('active');
    $(this).addClass('active');
});


});
</script>

<script>
	$(document).ready(function(){
	   
		$("#table td").click(function() {     
        var total_pack =  $(this).closest('tr').find("input.gross_pack").val() * parseFloat($(this).closest('tr').find('input.gross_size').val());
		
			var column_num = parseInt( $(this).index() ) + 1;
			var row_num = parseInt( $(this).parent().index() )+1;	 
            var bid = $(this).closest('td').val();
			
			 
			 var new_pack =  $(this).closest('tr').find("input.pack").val() * parseFloat($(this).closest('tr').find('input.size').val());
			 //alert(new_pack); 
			 var factor_pack =  (total_pack / new_pack);
			
			  parseFloat($(this).closest('tr').find("input.factor").val(total_pack / new_pack));
			
			  //if($(this).closest('tr').find("input.price").val() !='') {
			  
			  //}
			 if(bid == "") {
			 $(this).closest('tr').find("input").prop('required',true);
			 $(this).closest('tr').find("select").prop('required',true);
			/*  $(this).css({
                    "border": "1px solid red",
                    "background": "#FFCECE"
                });*/
			 }
			

			//$("#result").html( "Row_num =" + row_num + "  ,  Column_num ="+ column_num );   
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
				 		<div id="tab_manage" class=" tb-backgorund" ><!--common  -->
							<p>
								 <form action="<?php echo base_url();?>purveyors/manualsubmit" method="post" enctype="multipart/form-data">
								 
									 <!-- <section>
									  	<h3> <?php echo  $company_info[0]->contact_person; ?> </h3> <br> 
									 	<span> <b>Contact Name : </b> <?php echo $company_info[0]->contact_person; ?> </span> <br>
									 	<span> Phone Number : <?php echo $company_info[0]->contact_number; ?> </span>  <br>
									 	<span> Email Address : <?php echo $company_info[0]->contact_email; ?> </span>  <br>
									  </section>-->	
									  <section class="manual-view">
									  	<h3> Spring field</h3> <br> 
									 	<span> <b> Contact Name :</b> fdfdfdfd </span> <br>
									 	<span> Phone Number : 95959595 </span>  <br>
									 	<span> Email Address : fdfd@gmail.com </span>  <br>
									  </section>
									   <div class="content mCustomScrollbar"> <!--scroll -->
									 <section>
									 
									<!-- start purveyors manual adding -->
										  <div id="item_list"  style="margin-left:margin-left:150px;">
										  <form action="<?php echo base_url();?>purveyors/manualsubmit" method="post"> 
										    <div style="height:180px;">
											<div id="result"> </div>
										  		<table id="table" border="0" cellpadding="3" cellspacing="10" >
													<tr class="common-tr" > <th style="width:150px;"> Pack / Size / PU </th><th >Grocery Items</th>
													   <th >Price</th><th >Factor</th><th style="width:100px;">Pack / Size / PU</th>
													    <th >Order Guide</th> <th >Match</th>
													 </tr>
													
													 <?php foreach($grocery as $groc) { ?>
													<tr><td><input type="text" class="pack" name="pack[]" style="width:40px;"  />
														<input type="text" class="size" name="size[]" style="width:40px;"  />
														<select name="punit[]" style="width:60px;">
														     <option value=""> </option>
															 <option value='case'>Case </option><option value='each'>Each </option>
															 </select>
															 </td>
														<td>
														<select name="groceryitem[]">
														  <option value=""> </option>
														  <option>Avocado Hass Fresh</option>
														 </select>
														 </td>
														<td><input type="text" class="price" name="price[]" style="width:40px;"  /></td>
														<td><?php 
														  if( floatval($groc->grocery_size) == 0 ) {  $size = 1;}
														  else { $size = floatval($groc->grocery_size); }
														  $factor = $groc->grocery_pack * $size;
														
														  ?>
														<input type="text" class="factor" name="factor[]"  style="width:40px;"  /></td>
														<td><input type="hidden" class="gross_pack" name="gross_pack[]" value="<?php echo $groc->grocery_pack;?>" />
														  <input type="hidden" class="gross_size" name="gross_size[]" value="<?php echo $groc->grocery_size;?>" />
														<?php 
														 
														echo $groc->grocery_pack." ".$groc->grocery_size." ".$groc->grocery_purcunit; ?></td>
														<td><?php echo $groc->grocery_desc; ?></td>
														<td><input type="checkbox" name="match[]" class="t1"  /></td>
													</tr>
													<?php } ?>
													
													</table>
												</div>	
												
												<div style="width:600px;font-size: 12px;position: relative;top: 37px">
											
											If the added ingredient count does not equal your order guide count, a FACTOR will be added that is used to provide comparable pricing.See this video for further explanation.</div>
											   <div style="float:right;margin-top:5px;">
											    <input type="submit" name="submit" class="submit" value="Add & Synch" />
											   </div>
											</form>	
										  </div> <!--end purveyors manual adding-->
									 </section>	
									 </div> <!-- scroll end-->
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

       

<!-- Google CDN jQuery with fallback to local -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	
	
	<!-- custom scrollbar plugin -->
	<script src="<?php echo  base_url();?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
	
	<script>
		(function($){
			$(window).load(function(){
				
				$("#content-1").mCustomScrollbar({
					theme:"minimal"
				});
				
			});
		})(jQuery);
	</script>
  
       

