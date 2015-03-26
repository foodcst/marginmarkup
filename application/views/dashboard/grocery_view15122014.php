<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css">
<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>

<script>
$(function() {
$( "#tabs" ).tabs();
});
</script>
<script>
$(function() {
$("body").on("click", "#addmore", function() {
    var tr = "<tr><td><input type='text' name='count[]' style='width:30px;' required/></td><td><input type='text' name='unit[]' style='width:30px;' /></td><td><input type='text' name='description[]' style='width:150px;' required/></td></tr>";
	 $('#table').append(tr);
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
   		<div class="head"><h3> Grocery List </h3></div>
		
		 <!--Tab Start -->
			<div id="tabs">
				<ul>
				<li><a href="#tabs-1">All</a></li>
				<li><a href="#tabs-2">Fresh Produce</a></li>
				<li><a href="#tabs-3">Meat</a></li>
				</ul>
				<div id="tabs-1">
					
				
				</div>
				<div id="tabs-2">
					 <!-- start grocery List -->
				  <div style="margin-left:margin-left:150px;">
				  <form action="<?php echo base_url();?>grocery/submit" method="post">
				   
				  		<table id="table" border="0" cellpadding="3" cellspacing="10">
							<tr> <th style="background:#999999;"> Count </th><th style="background:#999999;">Unit</th><th style="background:#999999;">Description</th> </tr>
							<tr><td><input type="text" name="count[]" style="width:50px;" required /></td>
								<td><input type="text" name="unit[]" style="width:50px;"  /></td>
								<td> <input type="text" name="description[]" style="width:200px;" required /></td>
								
							</tr>
							</table>
							<input type="button" id="addmore" value="+" />Add another ingredient
						<table>
						<tr><td><input type="submit"  value="Add&Sync"/> </td></tr>
					</form>	
				  </div> <!--end grocery List -->
				</div>
				<div id="tabs-3">
				
				</div> <!--Tab end-->
		 
		
   </div>
   
 
 </div>
 <!--right contaner end -->

 
</div>
<!--Main contaner end -->  

</body>
</html>
  
  
       



