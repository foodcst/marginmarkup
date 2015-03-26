<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css">
<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>

<script>
$(function() {
$( "#tabs" ).tabs();
});
</script>
<script>
$(document).ready(function(){
 /* $("td").click(function(){ alert(123);
  $("input").prop('required',true);
 
  });
  */
  $(".t1").click(function(){ 
		alert($(this).closest('tr').find('td').find('input[type=text]').val());
  });
  
});

</script>

<!--Main contaner start -->
<div id="main_container" >
<!-- left contaner start -->
 
 <!--Left contaner end -->
 <!--right contaner start -->
 <div id="purveyor_container" > 
   <div id="profile">
   		<div class="head"><h3> Purveyors </h3></div>
		
		 <!--Tab Start -->
			<div id="tabs">
				<ul>
				<li><a href="#tabs-1">Manage</a></li>
				<li><a href="#tabs-2">Search</a></li>
				<li><a href="#tabs-3">Add new</a></li>
				</ul>
				<div id="tabs-1">
					
				
				</div>
				<div id="tabs-2">
					
				</div>
				<div id="tabs-3">
				  <!-- start purveyors manual adding -->
				  <div style="margin-left:margin-left:150px;">
				  <form action="<?php echo base_url();?>purveyors/manualsubmit" method="post"> 
				    <div style="overflow-y:auto;height:350px;">
				  		<table id="table" border="0" cellpadding="3" cellspacing="10" style="table-layout:fixed">
							<tr> <th style="background:#999999;"> Count </th><th style="background:#999999;">Unit</th><th style="background:#999999;">Grocery Items</th>
							   <th style="background:#999999;">Price</th><th style="background:#999999;">Factor</th><th style="background:#999999;">count</th>
							   <th style="background:#999999;">Unit</th> <th style="background:#999999;">Order Guide</th> <th style="background:#999999;">Match</th>
							 </tr>
							 <?php foreach($grocery as $groc) { ?>
							<tr><td><input type="text" name="count[]" style="width:50px;"  /></td>
								<td><input type="text" name="unit[]" style="width:50px;"  /></td>
								<td> <input type="text" name="items[]" style="width:200px;"  /></td>
								<td><input type="text" name="price[]" style="width:50px;"  /></td>
								<td><input type="text" name="factor[]" style="width:50px;"  /></td>
								<td><?php echo $groc->grocery_count; ?></td>
								<td><?php echo $groc->grocery_unit; ?></td>
								<td><?php echo $groc->grocery_descriptions; ?></td>
								<td><input type="checkbox" name="match[]" class="t1"  /></td>
							</tr>
							<?php } ?>
							
							</table>
						</div>	
						<table>
						
						<tr><td><input type="submit" class="submit"  value="Add&Sync"/> </td></tr>
						</table>
					</form>	
				  </div> <!--end purveyors manual adding-->
				</div> <!--Tab-3 end-->
		 
		
   </div>
   
 
 </div>
 <!--right contaner end -->

 
</div>
<!--Main contaner end -->  

</body>
</html>
  
  
       



