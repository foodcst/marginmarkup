
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/stylescroll.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.mCustomScrollbar.css">

<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>

 <script>
$(function() {
$("body").on("click", "#addmore", function() {
    var tr = "<tr><td><div class='styled-select'><select><option> Pretzel Bread</option></select></div></td><td><input type='text' name='' style='width:20px;height:24px;' /></td><td>each</td><td>$0.43</td><td>$0.43</td><td>$0.42</td><td>sysco</td><td> <input type='button' class='contatc-menu' value='contact' /></td><td><input type='button' class='removebutton' id='removemore'  value='Delete' /></td></tr>";
	 $('#table').append(tr);
});

});
</script>

<script>
 $("body").on("click", ".removebutton", function() {
    
     $(this).closest('tr').remove();
     return false;
 });
</script>

<script type="text/javascript">
$(document).ready(function(){
     $("#row-cost").show();
	 $("#yield-cost").hide();
	 $(".yieldinfo").hide();
    $('input[type="radio"]').click(function(){
            if($(this).attr("value")=="rowcost"){
                $("#row-cost").show();
				 $(".yieldinfo").css("display", "none");
                $("#yield-cost").hide();
         }
		 });
		 
		 $('input[type="radio"]').click(function(){
            if($(this).attr("value")=="yieldcost"){
                $("#yield-cost").show();
				 $(".yieldinfo").css("display", "inline-block");
                $("#row-cost").hide();
         }
		 });
});			
</script>

<script>
$(document).ready(function(){
$('tr select').change(function(){
  tr_id=$(this).parents('tr').attr('id');
  
   var sync_id = $(this).val();
   $.ajax({
			url: '<?php echo base_url();?>menu/ajax_menudata',
			type:'POST',
			dataType: 'json',
			async:false,
			data: {sync_id: sync_id},
			success: function(data){ 
			  //alert(data[0].sync_id);
			  $("#"+tr_id+" .syncfactor").val(data[0].sync_factor);
			  $("#"+tr_id+" .syncunit").html(data[0].sync_unit);
			
			} 
		}); 
  
  
});
});
</script>


<?php $cat_id = $this->uri->segment(3); ?>
<!--Main contaner start -->
<div id="main_container" >
<!-- left contaner start -->
 <aside id="menu-left">
 	<div class="order_back">
 		<img src="<?php echo base_url();?>assets/images/download_ico.png">
 	   <a>Download File </a> 
	 </div>
	 	  
	 <div class="reference">
	 <p>Cost Display <span class="yieldinfo"> <img src="<?php echo base_url();?>assets/images/yield_info.png"> </span> </p> 
	  <span> <input type="radio" name="cost" id="first" value="rowcost" checked="checked">Row Cost </span> <br />
	  <span><input type="radio" name="cost" value="yieldcost">Yield Cost </span>
	  <ul>
	   <li id="row-cost">Row cost is showing the ingredient cost without any regard to waste.This is the direct cost per unit from the purveyor you have selected</li>
	   <li id="yield-cost">Yield cost is showing the yield percentage already designated in your grocer list.As an example,if an ingredient is priced at $1.00 and has yield of 90%, the unit cost will be shown as $1.10.</li>
	   
	 </ul>
	 
	 <span>U/M Options </span>
	  <ul>
	   <li>EA</li>
	   <li>OZ-wt</li>
	   <li>OZ-fl</li>
	   <li>LB (wt 160z per lb)</li>
	   <li>Gallon (fluid,128 fl oz per gallon)</li>
	 </ul>
	
	 </div>
 </aside>	
 <!--Left contaner end -->
 
 <!--right contaner start -->
 <div id="purveyor_container" class="midcontainer" > 
    <div id="menu-container">
	   <div class="head">
	      <div style="float:left;"> <h1> Build Sheets </h1> </div>
		  <div style="float:left;">
		     <div class="menu-horizontab">
		         <ul id="menu-tablist">
   					<?php foreach($menucat as $menu) { ?>
					  <li <?php if($cat_id == $menu->cat_id) { ?> class="active" <?php } ?> >
					  <a href="<?php echo base_url();?>menu/cat/<?php echo $menu->cat_id;?>"><?php echo $menu->cat_name; ?></a>
					  </li>
					<?php } ?>
					<!--<li  class="active"><a href="#">Appetizers</a></li>
					<li><a href="#">Sandwiches</a></li>
					<li><a href="#">Entrees</a></li>
					<li><a href="#">Drinks</a></li> -->
   				 </ul>
			 </div>
		   </div>
		  <div style="float:right;margin:12px;">
		   <div style="display:inline-block;margin-top:-4px;"> <img src="<?php echo base_url();?>assets/images/recipe-ico.png" /> </div>
		    <span class="recipe"> Add Recipe </span></div>
	   </div>
	   
	 <div class="content mCustomScrollbar"> <!--scroll -->
	  
	   <!-- menu sub -->
	   
	   <div class="menu-sub">
	       <div class="sub-head">
	          <h1>Breakfast Sandwich </h1>
			  <div class="dashsymb" > <img src="<?php echo base_url();?>assets/images/menu_dash.png" /> </div>
		   </div>
		   
		   <div class="menu-innercontent">
		       <table id="table" border="0" cellpadding="3" cellspacing="10">
			     <tr > <th> </th> <th> </th> <th></th> <th> </th> <th> </th> <th></th>  <th></th> <th></th> <th></th>  </tr>
				 <?php
				 $i = 1;
				  foreach($result as $re) { ?>
				  <tr id='saj_<?php echo $i; ?>'>
				    <td>
					  <div class="styled-select">
				     <select name="sync_id" id="sync_id">
					   <?php  foreach($result as $rerow) { ?>
					   <option value="<?php echo $rerow->sync_id; ?>"> <?php echo $rerow->product_desc;?></option>
					   <?php } ?>
					 </select>
					 </div>
					</td>
					<td>
				    <input class="syncfactor" type="text" value="<?php echo $re->sync_factor; ?>" name="" style="width:20px;height:24px;text-align:center;" />
				 </td>
				  <td class="syncunit">
				 <?php echo $re->sync_unit; ?>
				 </td>
				  <td>
				  <?php $pattern = "/(\d+)/"; 
				        $array = preg_split($pattern, $re->sync_size, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
						$pu = $re->sync_price / $array[0] ;
						$puvalue = round($pu,2);
						echo "$".$puvalue;
				 //echo $re->sync_price." ".$re->sync_size;
				   
				    ?>
				 
				 </td>
				 <td>
				  <?php
				      $grandpu = $re->sync_factor * $puvalue;
				      echo $grandpu;
				 ?>
				  </td>
				
				  <td>
				  $0.12
				 </td>
				  <td>
				   Sysco
				 </td>
				  <td>
				  <input type="button" class="contatc-menu" value="contact" />
				 </td>
				  </tr>
				 <?php $i++; } ?>
				 <!--<tr>
				 <td>
				   <div class="styled-select">
				     <select>
					   <option> Pretzel Bread</option>
					 </select>
					 </div>
				 </td>
				 <td>
				    <input type="text" name="" style="width:20px;height:24px;" />
				 </td>
				 <td>
				 each
				 </td>
				  <td>
				 $0.43
				 </td>
				  <td>
				 $0.43
				 </td>
				 
				  <td>
				 $0.42
				 </td>
				  <td>
				   Sysco
				 </td>
				  <td>
				  <input type="button" class="contatc-menu" value="contact" />
				 </td>
				 </tr>-->
				 
				
				 
			   </table>
			   <input type="button" id="addmore"  value="+" />add another ingredient
		   </div>
		   
		   <div class="sub-content">
		       <div style="float:left;">
			     <table style="width:250px;" border="0" cellpadding="8" cellspacing="20">
				   <tr>
				   <td>
				     <div class="styled-select">
				     <select>
					 <?php foreach($menucat as $menu) { ?>
					 <option value="<?php echo $menu->cat_id; ?>"> <?php echo $menu->cat_name; ?> </option> 
					 <?php } ?>
					 </select>
					 </div>
					  </td>
				   <td> <input type="submit" class="menu-update" value="Update" /> </td>
				   </tr>
				   <tr>
				  
				   <td colspan="2">
				  <div style="float:left;"><img src="<?php echo base_url();?>assets/images/menu-info.png" /> </div>
				    <div style="float:left;margin-left: 46px;margin-top: -31px;">To update the category,simply select the category in the drop down and select "update" </div></td>
				   
				   </td>
				   </tr>
				 </table>
			  </div>
			  
			  <div style="float:right;">
			    <table  border="0" cellpadding="8" cellspacing="20">
				   <tr>
				   <td> COGS </td>
				   <td> $1.34 </td>
				   <td> $1.21 </td>
				   </tr>
				  <tr>
				   <td> Retail </td>
				   <td><div style="padding:6px;background:#FFFFFF;"> $1.34 </div></td>
				   <td> $1.21 </td>
				   </tr>
				   <tr>
				   <td> GP </td>
				   <td> $1.34 </td>
				   <td> $1.21 </td>
				   </tr>
				   <tr>
				   <td> GP % </td>
				   <td> $1.34 </td>
				   <td> $1.21 </td>
				   </tr>
				   <tr>
				   <td> Food Cost </td>
				   <td> $1.34 </td>
				   <td > <div style="border:1px solid #009933;padding:6px;"> $1.21 </div> </td>
				   </tr>
				 </table>
			  </div>
			 <br clear="all">
		   </div>
	   </div>
	   
	   
	    <div class="menu-sub">
	       <div class="sub-head">
	          <h1>Chicken Sandwich </h1>
			  <div class="dashsymb" > <img src="<?php echo base_url();?>assets/images/menu_dash.png" /> </div>
		   </div>
		   <div>
		       <table id="table" border="0" cellpadding="3" cellspacing="10">
			    <tr>
				 <td>
				 <div class="styled-select">
				  <select>
				   <option>Ciabata Bread </option>
				  </select>
				  </div>
				 </td>
				 <td>
				  2
				 </td>
				 <td>
				  slices
				 </td>
				 <td>
				  $0.52
				 </td>
				  <td>
				  $1.04
				 </td>
				  <td>
				  $1.04
				 </td>
				</tr>
			   </table>
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
  
       




  
       



