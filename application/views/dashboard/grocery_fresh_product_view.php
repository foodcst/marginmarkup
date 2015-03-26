
<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>


<script>
$(function() {
$("body").on("click", "#addmore", function() {
    var tr = "<tr><td><input type='text' name='description[]' style='width:300px;' required/></td><td><input type='text' name='pack[]' style='width:50px;' /></td><td><input type='text' name='size[]' style='width:50px;' required/></td><td><select purchaseunit[]><option value='case'>Case </option><option value='each'>Each </option></select></td><td></td><td><select name='um[]' style='width:50px;'><option value='ea'>EA </option><option value='oz-wt'>OZ-wt </option><option value='oz-fl'>OZ-fl </option><option value='lb'>LB (wt 160z per lb) </option><option value='galoon'>Gallon (fluid,128 fl oz per gallon) </option></select></td><td><input type='text' name='ruperpu[]' style='width:50px;' /></td><td><input type='text' name='yield[]' style='width:50px;'  /></td></tr>";
	 $('#table').append(tr);
});
});
</script>
<!--Main contaner start -->
<div id="main_container" >
<!-- left contaner start -->
 <aside id="officecontact">
 	<div class="order_back">
 		<img src="http://localhost/marginmarkup/assets/images/left_arrow.png">
 	 <a href="#">Back to Order Guide </a> 
	 </div>
	 <div class="convert-price">
	 <img src="<?php echo base_url();?>assets/images/con-1.png" />
	 </div>
	 <div class="reference">
	 <p>Reference</p>
	  <span>Size Options </span>
	  <ul>
	   <li>Cnt</li>
	   <li>LBS</li>
	   <li>#10 Can</li>
	   <li>32OZ</li>
	   <li>Each</li>
	 </ul>
	 
	 <span>Purchase Unit Options </span>
	  <ul>
	   <li>Case</li>
	   <li>Each</li>
	   
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
 <div id="purveyor_container" > 
   <div id="profile">
   		<div class="head grocery">
   			<div style="float:left;"> <h1> Grocery List </h1> </div>

   			<div id="horizonttab" style="border:1px solid;float:left;display:block;">
   				<ul id="tablist">
   					<li ><a href="#">All</a></li>
   					<?php $i=1; foreach($group_cat as $group) { ?>
   					 <li  class=""><a href="<?php echo base_url();?>grocery/cat/<?php echo $group['group_id']; ?>"><?php echo $group['group_name']; ?></a></li>
   					<?php $i++;if($i == 8) { break;} } ?>
					<!-- <li  class="active"><a href="<?php echo base_url();?>grocery/freshproducts">Fresh Produce</a></li>
					<li><a href="<?php echo base_url();?>grocery/meat">Meat</a></li>
					<li><a href="<?php echo base_url();?>">Dairy/Non Dairy</a></li>
					<li><a href="<?php echo base_url();?>">Frozen Foods</a></li> -->
   				</ul>	
   			 </div>
   			 <br clear="all">
   		</div>
		
		 <!--Tab Start -->
		 			<!-- <div id="minitab">
						<ul id="tablist">
							<li ><a href="#">All</a></li>
							<li  class="active"><a href="<?php echo base_url();?>">Fresh Produce</a></li>
							<li><a href="<?php echo base_url();?>">Meat</a></li>
						</ul>
				 	</div> -->
				 	<div class="mini-tab-grocery " >
				 		<form action="<?php echo base_url();?>grocery/submit" method="post">
				 		<div id="tab_manage" class="tab_manage"><!--common  -->
							<div class="recipe-head" style="float:right;"><p>Recipe Cost Unit (RU)</p> </div>
							
				   
						  		<table id="table" border="0" cellpadding="3" cellspacing="10">
									<tr class="common-tr"> <th > Description </th><th >Pack</th><th >Size</th> <th style="width:50px;" >Purchase Unit</th><td></td> <th >U/M</th> <th >#RU per PU</th> <th >Yield % </th> </tr>
									<tr><td><input type="text" name="description[]" style="width:300px;" required /></td>
										<td><input type="text" name="pack[]" style="width:50px;"  /></td>
										<td><input type="text" name="size[]" style="width:50px;"  /></td>
										<td>
										<select name="purchaseunit[]">
										  <option value="case">Case </option>
										  <option value="each">Each </option>
										</select>
										 </td>
										 <td></td>
										 <td>
										  <select name="um[]" style="width:50px;">
										  <option value="ea">EA </option>
										  <option value="oz-wt">OZ-wt </option>
										  <option value="oz-fl">OZ-fl </option>
										  <option value="lb">LB (wt 160z per lb) </option>
										  <option value="galoon">Gallon (fluid,128 fl oz per gallon)</option>
										</select>
										 </td>
										 <td><input type="text" name="ruperpu[]" style="width:50px;"  /></td>
										 <td><input type="text" name="yield[]" style="width:50px;"  /></td>
										
										
									</tr>
									</table>
									<input type="button" id="addmore"  value="+" />Add another ingredient
								<table>
								<tr><td><!-- <input type="submit" class="submit"  value="Add&Sync"/> --> </td></tr>
								</table>
							
								
						
						</div>
						<div style="float:right;margin-top:5px;"><input type="submit" class="submit"  value="Add&Sync"/> </div>
						<br clear="all"	>
						</form>	
				 	</div>
			</div>	
		<!--Tab end-->
		 
		
   </div>
   
 
 </div>
 <!--right contaner end -->
</div>
 
</div>
<!--Main contaner end -->  


  
       



