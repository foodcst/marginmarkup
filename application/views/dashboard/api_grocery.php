<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var numberOfChecCount = $('input:checkbox').length;
  		for ( var i = 1; i < numberOfChecCount; i++ )
  		 {
  		 	
  		 	$('#count_' + i).click(function(){
  		 			$('#count_' + i).addClass('warning');
  		 			

  		 	});
  		 	$('#unit_' + i).click(function(){
  		 			$('#unit_' + i).addClass('warning');
  		 			

  		 	});
  		 	return true;
  		 }
	

	
  		
	return true;

});	
</script>

<div style="margin-left:margin-left:150px;">
				  <form action="<?php echo base_url();?>purveyors/apiinsert123" method="post">
				  <div style="overflow-y:auto;height:350px;">
				  		<table border="0" cellpadding="3" cellspacing="10">
							<tr><th style="background:#999999;"> Count </th><th style="background:#999999;">Unit</th><th style="background:#999999;">Grocery Items </th>
							 <th style="background:#999999;">Factor </th> <th style="background:#999999;">count </th><th style="background:#999999;">Unit </th> <th style="background:#999999;">Order guide </th> <th style="background:#999999;">Match </th></tr>
							
							 <?php $i=1; foreach($grocery as $groc) { ?>
							<tr><td><input type="text" id="count_<?php echo $i; ?>" name="count[]" style="width:50px;" /></td>
								<td><input type="text" id="unit_<?php echo $i; ?>" name="unit[]" style="width:50px;" /></td>
								<td><select id="itemname_<?php echo $i; ?>" name="itemname[]">
								<option> </option>
									<?php 
									if(count($result)!='') { 
							      foreach($result as $re) {
								  
								?>	
								    <option value="<?php echo $re->Itemname; ?>"><?php echo $re->Itemname; ?></option>
								<?php  } } ?>	
								    </select>
								</td>
								<td><input type="text" name="factor[]" style="width:50px;" /></td>
								<td><?php echo $groc->grocery_count;?></td>
								<td><?php echo $groc->grocery_unit;?></td>
								<td><?php echo $groc->grocery_descriptions;?></td>
								<td><input type="checkbox" id="check_<?php echo $i; ?>" name="check[]"/></td>
							</tr>
							
							<?php $i++; } ?>
						</div>	
							<tr><td colspan="10"><input type="submit" name="submit" id="submit" /></td></tr>	
						</table>
					</form>	
				  </div> 