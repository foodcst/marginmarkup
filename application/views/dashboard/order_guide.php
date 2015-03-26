<style>
.circle{
width: 13px;
height: 13px;
border-radius: 50px;
font-size: 20px;
color: #fff;
line-height: 100px;
text-align: center;
background: #18931E;
display: inline-block;
}
</style>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/stylescroll.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.mCustomScrollbar.css">


<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>assets/fancy/lib/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/fancy/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/fancy/source/jquery.fancybox.css?v=2.1.5" media="screen" />
	
<!--<script type="text/javascript">
		$(function() {
			
		  $('.fancybox').fancybox();
		});
</script>-->

 <script>
$(function() {
$("body").on("click", "#addmore", function() {
    var tr = "<tr><td><select><option> Pretzel Bread</option></select></td><td><input type='text' name='' style='width:40px;' /></td><td>each</td><td>$0.43</td><td>$0.43</td><td>$0.42</td><td>sysco</td><td> <input type='button' class='contatc-menu' value='contact' /></td><td><input type='button' class='removebutton' id='removemore'  value='Delete' /></td></tr>";
	 $('#table').append(tr);
});




});
</script>

<script type="text/javascript">
$(document).ready(function(){
     $("#row-cost").show();
	 $("#yield-cost").hide();
    $('input[type="radio"]').click(function(){
            if($(this).attr("value")=="rowcost"){
                $("#row-cost").show();
                $("#yield-cost").hide();
         }
		 });
		 
		 $('input[type="radio"]').click(function(){
            if($(this).attr("value")=="yieldcost"){
                $("#yield-cost").show();
                $("#row-cost").hide();
         }
		 });
});			
</script>

<script type="text/javascript">
$(document).ready(function(){
/*$('input[name="purv_chk"]:checked').each(function() {
   alert(this.value);
});*/

/*var form_data = {
			vendor_id: $('.check_purv:checked').serialize(),
  			cat_id: $('#cat_id').val()
  			 };
			 
	var cat_id = $('#cat_id').val();	
	 
          $.ajax({
                    url: '<?php echo base_url();?>orderguide/check_purveyordata',
                    type: 'POST',
					dataType: 'json',
                    //data: {check:check},
					data: $('.check_purv:checked').serialize() + "&cat_id="+cat_id,
                    success: function(data){ alert(data);
					/* for (i = 0; i < data.length; i++) {
					  alert(data[i].total);
					 }
                        
						$('#best_price').html(data);
                    }
                });

  /*$('.check_purv').click(function(){
                var check= $(this).val();
                
               $.ajax({
                    url: '<?php echo base_url();?>orderguide/check_purveyordata',
                    type: 'POST',
                    //data: {check:check},
					 data: $('.check_purv:checked').serialize(),
                    success: function(data){ 
                        
						$('#best_price').html(data);
                    }
                });
            });*/

});
</script>

<script type="text/javascript">
$(document).ready(function(){
 var cat_id = $('#cat_id').val();
  
    $('.genpdf').click(function (event){ 
	var s=[];
	 $('.check_purv:checked').each(function() {
	   s.push($(this).val()); 
	  
	});	 
     event.preventDefault(); 
      $.ajax({
                    url: '<?php echo base_url();?>orderguide/pdfgenerate',
                    type: 'POST',
					dataType: 'json',
                    //data: {check:check},
					data:  $('#form-id').serialize() + "&s="+s + "&cat_id="+cat_id,
                    success: function(data){ 
					     
					alert(data);
					//$('#best_price').html(data);
                    }
                });
     return false;
   });
   
   
});
</script>

<script type="text/javascript">
$(document).ready(function(){
 var total=0;
 $('#table input.order').blur(function() { 
 
  $('#table input:checked:enabled').each(function() {
    order_count = $(this).closest('tr').find("input.order").val();
		  order_price = $(this).closest('tr').find("input.price").val();
		  t = order_count * order_price;
		  total = total + t;
		  //alert(total);
	});	 
	//alert(total); 
	$("#best_price").html('$'+total.toFixed(2))
 });
 
 

});
</script>

<script type="text/javascript">
$(document).ready(function(){

 
$("#table input:checkbox").click(function(){ 
    var total=0;
    $('#table input:checked:enabled').each(function(index) {
          order_count = $(this).closest('tr').find("input.order").val();
		  order_price = $(this).closest('tr').find("input.price").val();
		  t = order_count * order_price;
		  total = total + t;
          
    });
	 
    $("#best_price").html('$'+total.toFixed(2));
  });
  
});  
</script>

<script type="text/javascript">
$(document).ready(function(){

//$("#table input:checkbox").click(function(){ 
    var total=0;
    $('#table input:checked:enabled').each(function(index) {
          order_count = $(this).closest('tr').find("input.order").val();
		  order_price = $(this).closest('tr').find("input.price").val();
		  t = order_count * order_price;
		  total = total + t;
		 
    });
	 //alert(total);
    $("#best_price").html('$'+total.toFixed(2))
 // });
  
});  
</script>

<script type="text/javascript"> 
$(document).ready(function(){
 
 $(".check_purv:checkbox").click(function(){ 
 var e = $('#check_purv').serialize();
 
 		$.ajax({
                    url: '<?php echo base_url();?>orderguide/totalvalue',
                    type: 'POST',
					dataType: 'json',
					async:false,
                    //data: {check:check},
					data:  $('#check_purv').serialize(),
                    success: function(data){
					 for(var i =0;i < data.length;i++)
						{
						  var item = data[i];
						  if(i ==0) {
						  var tot  = (Number(item.mintotal).toFixed(2));
						  $('#best_price').html('$'+tot);
						  $('#new_best_price').html('$'+tot); 
						  $('#best_company').html(data[i].company_name); 
						  $('#company_no').html(data[i].contact_number);
						  }
						  if(i ==1 ) { 
						    var tot  = (Number(item.mintotal).toFixed(2));
						  $('#best_price_2').html('$'+tot);
						  $('#best_company_2').html(data[i].company_name); 
						  
						  }
						  if(i ==2 ) { 
						    var tot  = (Number(item.mintotal).toFixed(2));
						  $('#best_price_3').html('$'+tot);
						  $('#best_company_3').html(data[i].company_name); 
						  
						  }
						  
						}
					
					
                    }
                });
 });

});
</script>


<script type="text/javascript"> 
$(document).ready(function(){

 var e = $('#check_purv').serialize();
   
              $.ajax({
                    url: '<?php echo base_url();?>orderguide/totalvalue',
                    type: 'POST',
					dataType: 'json',
					async:false,
                    //data: {check:check},
					data:  $('#check_purv').serialize(),
                    success: function(data){  //alert((data.length));
					for(var i =0;i < data.length;i++)
						{
						  var item = data[i];
						  if(i ==0) {
						  var tot  = (Number(item.mintotal));
						  $('#best_price').html('$'+tot); 
						  $('#new_best_price').html('$'+tot); 
						  $('#best_company').html(data[i].company_name); 
						  $('#company_no').html(data[i].contact_number);
						  }
						  if(i ==1 ) { 
						    var tot  = (Number(item.mintotal).toFixed(2));
						  $('#best_price_2').html('$'+tot);
						  $('#best_company_2').html(data[i].company_name); 
						  
						  }
						  if(i ==2 ) { 
						    var tot  = (Number(item.mintotal).toFixed(2));
						  $('#best_price_3').html('$'+tot);
						  $('#best_company_3').html(data[i].company_name); 
						  
						  }
						  
						}
					
					
					
					
                    }
                });
				
});
</script>


<?php
$cat_id = $this->uri->segment('3');
?>
<!--Main contaner start -->
<div class="container-synch" >
 <div class="head-div" >  
 <img src="<?php echo base_url();?>assets/images/clock.png" class="clockico" />
 <span > Last Sync :  <?php if(isset($last_update[0]->reg_date)) { echo date("M, d Y m:s", strtotime($last_update[0]->reg_date));} ?> </span> </div>
 </div>
<div id="main_container" >

<!-- left contaner start -->
 <aside id="menu-left">
 	<div class="order_back">
 		<img src="http://localhost/marginmarkup/assets/images/count_ico.png" >
 	   <a href="<?php echo base_url();?>grocery/cat/1">Edit Grocery List</a> 
	 </div>
	 	  
	 <div class="row_1">
	 <p>Purveyors</p> 
	 <div style="float:left;">
	 <form action="" method="post" id="check_purv">
	  <ul class="row_1-list" >
	  <?php foreach($purveyors as $purv) { ?>
	  <li><input type="checkbox" name="check_purv[]" class="check_purv" value="<?php echo $purv->company_id; ?>" <?php if($purv->company_id) { ?>checked="checked" <?php } ?> />
	   <?php echo $purv->company_name;?>  </li>
	  <?php }  ?>
	  <!-- <li><input type="checkbox" name="purv_chk[]" class="check_purv" value="1" checked="checked" /> Sysco  </li>
	   <li><input type="checkbox" name="purv_chk[]" class="check_purv" value="5" checked="checked" /> Reinhart </li>
	   <li><input type="checkbox" name="purv_chk[]" class="check_purv" value="6" checked="checked" /> Springfield  Grocer </li>-->
	 </ul>
	</form> 
	 </div>
	 <div style="float:right;">
	 <?php $j = array('990033','663399','0066FF');
	    foreach($purveyors as $k=>$v) { ?>
	   <div style="background:#<?php echo $j[$k];?>;width:24px;height:17px;"></div> <br />
	    <?php if($k == 2) { break;} }
	   ?>
	 <!--<div style="background:#990033;width:24px;height:17px;"></div> <br />
	 <div style="background:#663399;width:24px;height:17px;"></div> <br />
	 <div style="background:#0066FF;width:24px;height:17px;"></div>-->
	 </div>
	 </div>
	 
	 <div class="row_2">
	 <p>Best Purveyor</p>
	 
	  <ul>
	   <li ><span id="best_company">Reinhart</span> - <span id="company_no">800-238-7692</span> </li>
	   <b><li id="best_price"><b>  </b> </li></b>
	   
	   <li><a href="<?php echo base_url();?>orderguide/test" target="_blank" style="text-decoration:none;">Order by Email</a></li>
	   
	   <li class="mailnotify"><a><span id="best_company_2"></span></a> <div style="float:right;"><b> <span id="best_price_2"></span> </b></div></li>
	   <li class="mailnotify"><a><span id="best_company_3"></span></a> <div style="float:right;"><b> <span id="best_price_3"></span></b> </div></li>
	 </ul>
	 </div>
	 
	 <div class="row_3">
	 <p>Best Price</p>
	 
	  <ul>
	   <b><li id="new_best_price"><b>  </b></li></b>
	   <li><a href="<?php echo base_url();?>orderguide/test" target="_blank" style="text-decoration:none;">Order by Email</a></li>
	   
	 </ul>
	 </div>
	 
	 <div class="row_4">
	 <p>Copy Order to:</p>
	 
	  <ul>
	   <li><input type="checkbox" name="ccmail" checked="checked" /> <input type="text" value="tom@gmail.com" /></li>
	   <li><input type="checkbox" /> <input type="text" /></li>
	   
	 </ul>
	 <a href="" class="genpdf"> pdf </a>
	 
	<a class="fancybox" href="">test</a>
	 </div>
 </aside>	
 <!--Left contaner end -->
 
 <!--right contaner start -->
 
 <div id="purveyor_container" class="midcontainer" > 
    <div id="menu-container" class="ordermenu-height">
	
	   <div class="head">
	      <div style="float:left;"> <h1> Order Guide </h1> </div>
		  <div style="float:left;">
		     <div class="menu-horizontab">
		         <ul id="tablist">
   					<li ><a href="javascript:void(0);">All</a></li>
   					<?php $i=1; foreach($group_cat as $group) {?>
   						 
   					 
   					 <li  <?php if($cat_id == $group['group_id']) { echo "class='active'";} ?> class="item" >
   					 	<a href="<?php echo base_url();?>orderguide/cat/<?php echo $group['group_id']; ?>"><?php echo $group['group_name']; ?></a></li>
   					<?php if($i==5) {echo "<li><a href='' id='nextid'></a></li>"; break; } $i++; } ?>
					<!--<li  class="active"><a href="#">All</a></li>
					<li><a href="#">Fresh Produce</a></li>
					<li><a href="#">Meat</a></li>
					<li><a href="#">Dairy/Non Dairy</a></li> 
					<li><a href="#">Frozen Foods</a></li>-->
   				 </ul>
			 </div>
		   </div>
		  <div style="float:right;margin-right: 40px;"> <span> <img src="<?php echo base_url();?>assets/images/refresh_icon.png"  /> </span></div>
	   </div>
	   
	 <div class="content mCustomScrollbar height-content"> <!--scroll -->
	  
	   <!-- menu sub -->
	   
	   <div class="orderguide-sub">
	       <div class="sub-head">
		   
		   <table  border="0" cellpadding="3" cellspacing="10">
		   <tr> <th> Include? </th> <th style="width:114px;"> To Order </th> <th style="width:270px;"> Item  </th> <th style="width:280px;"> Current Price </th> </tr>
		   </table>
	         
		   </div>
		   
		   <div class="menu-innercontent"> 
		   <form  id="form-id" >
		       <table id="table" border="0" cellpadding="3" cellspacing="10">
			     <tr > <th> </th> <th style="width:100px;"> </th> <th style="width:130px;"> </th>
				 <?php   $j = array('990033','663399','0066FF');
	   					 foreach($purveyors as $k=>$v) { ?> 
				  <th ><div style="width:50px;height:22px;background:#<?php echo $j[$k]; ?>;"> </div> </th> <!--<th><div style="width:50px;height:22px;background:#663399;"> </div>  </th> <th > <div style="width:50px;height: 22px;background:#0066FF;"> </div>  </th> -->
				  <?php } ?>
				  
				   </tr>
				 <?php if($orderdata) {
				     foreach($orderdata as $order ) { 
					 $data['current_price']  = $this->grocery_model->current_price($order->grocery_id);
				      $data['purveyor_price'] = $this->grocery_model->all_current_price($order->grocery_id);
				  ?>
				 <tr>
				 
				 <td style="width:80px;">
				     <input type="checkbox" class="pricechk" name="pricechk[]" value="<?php echo @$data['current_price'][0]->sync_factor; ?>" <?php if(@$data['current_price'][0]->sync_factor) { ?> checked="checked"  <?php } ?> />
					 
					 <input type="hidden" name="pricecount[]" value="<?php echo @$data['current_price'][0]->sync_factor; ?>" />
					 
					 <input type="hidden" name="syncid[]" value="<?php echo @$data['current_price'][0]->sync_id; ?>" />
					 
				 </td>
				
				 <td style="width:80px;">
				    <input type="text" class="order" name="order[]" value="<?php echo @$data['current_price'][0]->sync_factor; ?>" style="width:40px;text-align:center;" />
					
				 </td>
				 <td style="width:270px;">
				<?php echo $order->grocery_desc; ?>
				<input type="hidden" name="grocery_item[]" value="<?php echo $order->grocery_desc; ?>" />
				
				<input type="hidden" name="grocery_id[]" value="<?php echo $order->grocery_id; ?>" />
				 </td>
				 <?php 
				 foreach($data['purveyor_price'] as $price) { $tArray[] = $price->price;  $min = min($tArray);  } 
				 if($data['purveyor_price']) {
				 foreach($data['purveyor_price'] as $price) {   ?>
				  <td style="width:80px;">
				  <?php if($min == $price->price ) { ?>
				  <div class="circle"></div>
				   <?php } ?>
				   
				   <input type="hidden" name="company[]" value="<?php echo $price->company_id;?>" />
				   <input type="hidden" class="price" name="price[]" value="<?php echo $price->price; ?>"  />
				   <?php echo $price->price; ?>
				   
				 </td>
				 <?php } } else { ?>
				  <td> N/A </td><td>N/A</td><td>N/A</td>
				 <?php } ?>
				
								 
				 </tr>
				 <?php } }  else { ?>
				  <tr> <td> No Data available !. </td></tr>
				 <?php } ?>
				
				 
				
				<input type="hidden" name="cat_id" id="cat_id" value="<?php echo $cat_id;?>" /> 
			   </table>
			   </form>
			   
		   </div>
		  
	   </div>
	   
	  
	  
	</div>
	 
	 </div> <!--sroll end-->
	
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
  
 




  
       



