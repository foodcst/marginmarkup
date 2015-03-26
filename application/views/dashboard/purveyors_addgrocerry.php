<link rel="stylesheet" href="<?php echo base_url()?>assets/css/stylescroll.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.mCustomScrollbar.css">

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
  
 //$(".psp").hide();
 //alert(t);
  
});
</script>

<script>
$(document).ready(function(){
 $('.itemname').change(function () { 	
  
  var gross_pack =  $(this).closest('tr').find("input.gross_pack").val();
  var gross_size =  parseFloat($(this).closest('tr').find('input.gross_size').val())
  //alert(gross_size);
 
   var csv_id = $(".itemname").val();
   alert(csv_id);
     $.ajax({
			url: '<?php echo base_url();?>purveyors/ajax_purveyordata',
			type:'POST',
			dataType: 'json',
			data: {csv_id: csv_id},
			success: function(data){ //alert(data[0].csv_id);
			   $(".itemname").closest('tr').find("td.psp_pack").html('');
			    $(".itemname").closest('tr').find("td.psp_size").html('');
			    $res =  data[0].pack ;
				$res1 =  data[0].size;
				//alert($res); 
				//$(".psp").append($res);
				$("#itemname").closest('tr').find("td.psp_pack").append($res);
				$("#itemname").closest('tr').find("td.psp_size").append($res1);				  
			} 
		}); 
  
 });

});	   
</script>
<script>
	$(document).ready(function(){
	   $('#itemname123').change(function () { //alert(123);
		//$("#table .item").click(function() {
		var t = $(this).closest('tr').find("div.psp").css("display", "block");  
		//alert(t);
		  
        var total_pack =  $(this).closest('tr').find("input.gross_pack").val() * parseFloat($(this).closest('tr').find('input.gross_size').val());
		//alert(total_pack);
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

<!--<style type="text/css">
tbody {
   height:100px;
    overflow: auto;
}

thead > tr, tbody{
    display:block;}
</style>-->

<!--Main contaner start -->
<div id="main_container" >
<!-- left contaner start -->
 
 <!--Left contaner end -->
 <!--right contaner start -->
 <div id="purveyor_container" >
 <?php /*if($this->session->flashdata('success') !='') { ?>
		  			<div class="succ" style="margin-top:20px;"> <?php echo $this->session->flashdata('success'); ?></div> <br>
<?php }*/ ?>
<?php /* if($this->session->flashdata('failure') !='') { ?>
		  			<div class="failure" style="margin-top:20px;"> <?php echo $this->session->flashdata('failure'); ?></div> <br>
<?php }*/ ?>
  

 
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
				 		<div id="tab_manage" class=" tb-backgorund"><!--common  -->
							<p>
<form action="<?php echo base_url();?>purveyors/apiinsert" method="post" enctype="multipart/form-data">
									  <section id="sect-grocery">
									 
									  	<h3> <?php echo  $company_info[0]->company_name; ?> </h3> <br> 
									 	<span> <b> Contact Name : </b><?php echo $company_info[0]->contact_person; ?> </span> <br>
									 	<span> Phone Number : <?php echo $company_info[0]->contact_number; ?> </span>  <br>
									 	<span> Email Address : <?php echo $company_info[0]->contact_email; ?> </span>  <br>
									  </section>	
									 <section >
									 <section >

											<div id="item_list" style="margin-left:margin-left:150px;border: 1px solid #d6d8d7;">
											<form action="<?php echo base_url();?>" method="post">
											<!--<div style="overflow-y:auto;height:350px;margin-top: 20px;">-->
											<div>
											 <table  border="0" cellpadding="3" cellspacing="10" >
											 <tr class="common-tr"><th style="width:100px;" > Pack / Size / PU </th><th style="text-align:center;width:248px;">Grocery Item</th>
											<th >Factor </th> <th style="width:130px;" > Pack / Size / PU </th><th style="text-align:left;width:245px;" >Order guide </th> <th>Match </th></thead></tr>
											 </table>
                                          </div>
											<div class="content mCustomScrollbar"> <!--scroll --> 
											<table id="table" border="0" cellpadding="3" cellspacing="10" class="listed-table" style="border:none;">
											<thead>
											<!--<tr class="common-tr"><th > Pack / Size / PU </th><th style="text-align:left;">Grocery Item</th>
											<th >Factor </th> <th > Pack / Size / PU </th><th style="text-align:left;" >Order guide </th> <th>Match </th></thead></tr>-->
											
											<?php if($grocery) { foreach($grocery as $groc) {
											
											 ?>	
											<tbody style="">
											<tr>
											  <td class="psp_pack" style="width:20px;"></td>
											  <td class="psp_size" style="width:40px;"></td>
											  <td class="psp" style="width:30px;"> 
											
											
											<?php //echo $groc->grocery_pack." ". $groc->grocery_size." ". $groc->grocery_purcunit; ?>											
											</td>
											
											<td class="item"><select id="itemname" class="itemname" name="itemname[]" style="width:250px;height:24px;">
											<option></option>
											<?php if(isset($purveyor_data)) { foreach($purveyor_data as $purv) {  ?>
																	
											<option value="<?php echo $purv['csv_id']; ?>"><?php echo $purv['product_desc']; ?></option>
											<?php } } ?>							
											</select>											</td>
											<?php 
														  if( floatval($groc->grocery_size) == 0 ) {  $size = 1;}
														  else { $size = floatval($groc->grocery_size); }
														  $factor = $groc->grocery_pack * $size;
														
														  ?>
											<td><input type="text" class="factor" name="factor[]" style="width:40px;" /></td>
											<td style="width:30px;" ><?php echo $groc->grocery_pack; ?></td>
											<td style="width:50px;" ><?php echo $groc->grocery_size; ?></td>
											<td style="width:30px;"><?php echo $groc->grocery_purcunit; ?> </td>
											
											<?php //echo $groc->grocery_pack." ". $groc->grocery_size." ". $groc->grocery_purcunit; ?></td>
											<input type="hidden" class="gross_pack" name="gross_pack[]" value="<?php echo $groc->grocery_pack;?>" />
											<input type="hidden" class="gross_size" name="gross_size[]" value="<?php echo $groc->grocery_size;?>" />
											<td><?php echo $groc->grocery_desc; ?></td>
											<td><input type="checkbox" name="check[]"/></td>
											</tr>
											</tbody>
											<?php } } ?>
											<tr>
											  <td>                                              
											  </div>
											<tr><td colspan="12"><!--<input type="submit" name="submit" class="submit" value="Add & Synch" />--></td></tr>	
											</table>
											</div>
									 </section>	
									
									
									<div>
											<div style="width:600px;font-size: 12px;position: relative;top: 28px;">
											<div style="float:left;clear:left;margin-right:7px;">
											<img src="'.base_url() .'assets/images/i.png" />
											</div>

											If the added ingredient count does not equal your order guide count, a FACTOR will be added that is used to provide comparable pricing.See this video for further explanation.</div>
											   <div style="float:right;">
											    <input type="submit" name="submit" class="submit" value="Add & Synch" />
											   </div>
</div>
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
  
              



