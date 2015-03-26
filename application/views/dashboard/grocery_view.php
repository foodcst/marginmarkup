
<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>


<script>
$(function() {
$("body").on("click", "#addmore", function() {
    var tr = "<tr><td><input type='text' name='count[]' style='width:50px;' required/></td><td><input type='text' name='unit[]' style='width:50px;' /></td><td><input type='text' name='description[]' style='width:200px;' required/></td></tr>";
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
 	 <a href="#">Back to Order Guide </a> </div>
 </aside>	
 <!--Left contaner end -->
 <!--right contaner start -->
 <div id="purveyor_container" > 
   <div id="profile">
   		<div class="head">
   			<div style="float:left;"> <h1> Grocery List </h1> </div>

   			<div id="horizonttab" style="border:1px solid;float:left;display:block;">
   				<ul id="tablist">
   					<li ><a href="#">All</a></li>
					<li  class="active"><a href="<?php echo base_url();?>">Fresh Produce</a></li>
					<li><a href="<?php echo base_url();?>">Meat</a></li>
					<li><a href="<?php echo base_url();?>">Dairy/Non Dairy</a></li>
					<li><a href="<?php echo base_url();?>">Frozen Foods</a></li>
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
							<p>
							
				   
						  		<table id="table" border="0" cellpadding="3" cellspacing="10">
									<tr> <th style="background:#999999;"> Count </th><th style="background:#999999;">Unit</th><th style="background:#999999;">Description</th> </tr>
									<tr><td><input type="text" name="count[]" style="width:50px;" required /></td>
										<td><input type="text" name="unit[]" style="width:50px;"  /></td>
										<td> <input type="text" name="description[]" style="width:200px;" required /></td>
										
									</tr>
									</table>
									<input type="button" id="addmore"  value="+" />Add another ingredient
								<table>
								<tr><td><!-- <input type="submit" class="submit"  value="Add&Sync"/> --> </td></tr>
								</table>
							
								
							</p>
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


  
       



