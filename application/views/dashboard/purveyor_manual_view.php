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

 $(function() { 
 
 
     $("#table .itemname").on( "click", function(e) {  
	    //tr_id=$(this).parents('tr').attr('id');
		tr_id = $(this).closest('tr').attr('id');
    //alert(tr_id);
        $('#'+tr_id).find("input.purchase_pack").prop('required',true);
	    $('#'+tr_id).find("input.purchase_size").prop('required',true);
	    $('#'+tr_id).find("select.purchase_unit").prop('required',true);
	    $('#'+tr_id).find("input.itemname").prop('required',true);	
		$('#'+tr_id).find("input.hiddenprice").prop('required',true);
		$('#'+tr_id).find("input.factor").prop('required',true);
		
		$pack =  $('#'+tr_id).find("input.purchase_pack").val();
		$size =  $('#'+tr_id).find("input.purchase_size").val();
				
		$gross_pack = $('#'+tr_id).find("input.size").val();
		//alert($gross_pack);
		$f = $pack * parseFloat($size);		
		$total = $gross_pack/$f;
		
		$(".hiddenprice").keydown(function(){ 
		   $('#'+tr_id).find("input.factor").val($total);
		});
		
       
       
		
		
		//$('#'+tr_id).find("input.factor").val($total);
	  
	 });
  
 });
   
</script>

<!--<script>
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
</script>-->


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
								 
								 
									 <!-- <section>
									  	<h3> <?php echo  $company_info[0]->contact_person; ?> </h3> <br> 
									 	<span> <b>Contact Name : </b> <?php echo $company_info[0]->contact_person; ?> </span> <br>
									 	<span> Phone Number : <?php echo $company_info[0]->contact_number; ?> </span>  <br>
									 	<span> Email Address : <?php echo $company_info[0]->contact_email; ?> </span>  <br>
									  </section>-->	
									  <section class="manual-view">
									  	<h3> Spring field</h3> <br> 
									 	<span> <b> Contact Name :</b> Manish </span> <br>
									 	<span> Phone Number : 95959595 </span>  <br>
									 	<span> Email Address : manish@gmail.com </span>  <br>
									  </section>
									  
									 <section>
									 
									<!-- start purveyors manual adding -->
										  <div id="item_list"  style="margin-left:margin-left:150px;">
										  <form action="<?php echo base_url();?>purveyors/manage" method="post"> 
										    <div style="">
											<table  border="0" cellpadding="3" cellspacing="10" >
											<tr class="common-tr" > <th style="width:138px;"> Pack / Size / PU </th><th style="text-align:center;width:235px;" >Grocery Items</th>
												<th >Price</th><th >Factor</th><th style="width:100px;">Pack / Size / PU</th>
												<th style="text-align:left;width:220px;">Order Guide</th> <th >Match</th>
											</tr>
											</table>
											<div class="content mCustomScrollbar"> <!--scroll --> 
											<div id="result"> </div>
										  		<table id="table" border="0" cellpadding="3" cellspacing="10" >
													<!--<tr class="common-tr" > <th style="width:150px;"> Pack / Size / PU </th><th >Grocery Items</th>
													   <th >Price</th><th >Factor</th><th style="width:100px;">Pack / Size / PU</th>
													    <th >Order Guide</th> <th >Match</th>
													 </tr>-->
													
													 <?php 
													  $i=1;
													 foreach($grocery as $groc) { ?>
													<tr id='saj_<?php echo $i; ?>'>
													  <td><input type="text" class="purchase_pack" name="purchase_pack[]" style="width:30px;text-align:center;"  /></td>
													  <td><input type="text" class="purchase_size" name="purchase_size[]" style="width:30px;text-align:center;"  /></td>
													  <td>														    
														    <select class="purchase_unit" name="purchase_unit[]" style="width:50px;height:24px;">
														     <option> </option>
															 <option value='case'>Case </option>
															 <option value='each'>Each </option>
															 </select>															 </td>
														<td>
														<input type="text" id="itemname" class="itemname" name="itemname[]" style="width:240px;" />
														<!--<select id="itemname" class="itemname" name="itemname[]" style="width:250px;height:24px;">
														<option></option>
											
																	
														<option value=""></option>
																	
														</select>-->															 </td>
														<td><input type="text" class="hiddenprice" name="hiddenprice[]" style="width:30px;text-align:center;"  /></td>
														 
														
														
														<td><input type="text" class="factor" name="factor[]"  style="width:40px;text-align:center;"  />
														<?php 
														  if( floatval($groc->grocery_size) == 0 ) {  $size = 1;}
														  else { $size = floatval($groc->grocery_size); }
														  $factor12 = $groc->grocery_pack * $size;
														
														  ?>
														  <input type="hidden" class="size" name="size[]" value="<?php echo $factor12; ?>"
														</td>
														<td>
														<?php 
														 
														echo $groc->grocery_pack." ".$groc->grocery_size." ".$groc->grocery_purcunit; ?></td>
														<td><?php echo $groc->grocery_desc; ?></td>
														<td><input class="match" type="checkbox" name="check[]" class="t1"  /></td>
													</tr>
													<?php $i++; } ?>
													</table>
											  </div> <!-- scroll end -->
												</div>	
												<input type="hidden" name="company_id" value="<?php echo $company_info[0]->company_id; ?>"  />
												<div style="width:600px;font-size: 12px;position: relative;top: 37px">
											<div style="float:left;clear:left;margin-right:7px;">
											<img src="'.base_url() .'assets/images/i.png" />
											</div>
											If the added ingredient count does not equal your order guide count, a FACTOR will be added that is used to provide comparable pricing.See this video for further explanation.</div>
											   <div style="float:right;margin-top:5px;">
											    <input type="submit" name="submit" class="submit" value="Add & Synch" />
											   </div>
											</form>	
										  </div> <!--end purveyors manual adding-->
									 </section>	
									
									<div style="clear:both;"> </div>
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
  
       

