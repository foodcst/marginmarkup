<style>
	.modalDialog {
		position: fixed;
		font-family: Arial, Helvetica, sans-serif;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		background: rgba(0,0,0,0.8);
		z-index: 99999;
		opacity:0;
		-webkit-transition: opacity 400ms ease-in;
		-moz-transition: opacity 400ms ease-in;
		transition: opacity 400ms ease-in;
		pointer-events: none;
	}

	.modalDialog:target {
		opacity:1;
		pointer-events: auto;
	}

	.modalDialog > div {
		width: 400px;
		position: relative;
		margin: 10% auto;
		padding: 5px 20px 13px 20px;
		border-radius: 10px;
		background: #fff;
		background: -moz-linear-gradient(#fff, #999);
		background: -webkit-linear-gradient(#fff, #999);
		background: -o-linear-gradient(#fff, #999);
	}

	.close {
		background: #606061;
		color: #FFFFFF;
		line-height: 25px;
		position: absolute;
		right: -12px;
		text-align: center;
		top: -10px;
		width: 24px;
		text-decoration: none;
		font-weight: bold;
		-webkit-border-radius: 12px;
		-moz-border-radius: 12px;
		border-radius: 12px;
		-moz-box-shadow: 1px 1px 3px #000;
		-webkit-box-shadow: 1px 1px 3px #000;
		box-shadow: 1px 1px 3px #000;
	}

	.close:hover { background: #00d9ff; }
	</style>
	<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>

<script type="text/javascript">

    $(function () {
            var div = $('#horizonttab #tablist'),
                 ul = $('ul#tablist'),
                 ulPadding = 15;
            var divWidth = div.width();
            div.css({ overflow: 'hidden' });
            var lastLi = ul.find('li:last-child');
            $('#horizonttab #tablist').mousemove(function (e) {
                var ulWidth = lastLi[0].offsetLeft + lastLi.outerWidth() + ulPadding;

                var left = (e.pageX - div.offset().left) * (ulWidth - divWidth) / divWidth;
                div.scrollLeft(left);
            });
        });


</script>	

<!--grocery adding -->
<script> 
   
     $(function(){
      
      $("#grocer_add").on( "click", function(event) {
       
		 event.preventDefault();

       $.ajax({
       url:'<?php echo base_url();?>grocery/ajax_grocery',
       type: 'POST',
       data: $("#grocForm1").serialize(),
       success: function(data){ 
           if(data==1)
           {
           	$('#su').html('Insertion success!..');
           	$('#modalid').hide();

           }
           
       },
      
   });
      
   
      });
    });
  </script>	
<!--grocery Deleting -->
<script type="text/javascript">
$(function() {
 $("#grocer_delete").on( "click", function(event) {
 	 event.preventDefault();
 	var group = $('#group_id').val();
 	 $.ajax({
       url:'<?php echo base_url();?>grocery/ajax_delete_grocery',
       type: 'POST',
       data: {group_name:group},
       success: function(data){ 
           if(data==1)
           {
           	$('#sudelete').html('Deletion success!..');
           	$('#modalid_123').hide();

           }
           
       },
      
   });


 });
 });
 </script>
 

<script type="text/javascript">
$(function() {
$("body").on("click", "#addmore", function() {

    var tr = "<tr><td><input type='text' name='count[]' style='width:50px;' required/></td><td><input type='text' name='unit[]' style='width:50px;' /></td><td><input type='text' name='description[]' style='width:200px;' required/></td></tr>";
	 $('#table').append(tr);
});

});
</script>
<!--Main contaner start -->
<div id="main_container" >
	<?php if($this->session->flashdata('success') !='') { ?>
		  			<div class="grosssucc" style="margin-top:20px;"> <?php echo $this->session->flashdata('success'); ?></div> <br>
<?php } ?>
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
   					<?php $i=1; foreach($group_cat as $group) {?>
   						 
   					 
   					 <li  <?php if($cat_id == $group['group_id']) { echo "class='active'";} ?> >
   					 	<a href="<?php echo base_url();?>grocery/cat/<?php echo $group['group_id']; ?>"><?php echo $group['group_name']; ?></a></li>
   					<?php if($i==5) {echo "<li><a href='' id='nextid'>Next</a></li>"; break; } $i++; } ?>
					
   				</ul>
   			 </div>
   			 <div id="modaladd"> <a href="#openModal">  Add </a></div>
   			 <div id="modaladd"> <a href="#openModal_1">  Delete </a></div>
   			 <br clear="all">
   		</div>


   		 <!--modal -->
			<div id="openModal" class="modalDialog">
				<div>
					<a href="#close" title="Close" class="close">X</a>
					<div id="su"> </div>
					<div id="modalid">
					<h2>Add Grocery</h2>
					<p>
						<form action="" id="grocForm1" method="post">
							<input type="text" name="grocery_cat" id="grocery_cat"> <br>
							<input type="button" id="grocer_add" value="Add">
						</form>
					</p>
					</div>
				</div>
			</div>
		<!--end modal-->
		 <!--modal -->
			<div id="openModal_1" class="modalDialog">
				<div>
					<a href="#close" title="Close" class="close">X</a>
					<div id="sudelete"> </div>
					<div id="modalid_123">
					<h2>Delete Grocery</h2>
					<p>
						<form action="" id="grocForm123" method="post">
							<select name="group_id" id="group_id" >
								<option></option>
							<?php foreach($group_cat as $gp) { ?>
							<option value="<?php echo $gp['group_id']; ?>"><?php echo $gp['group_name']; ?></option>
							<?php } ?>
						</select> <br>
						<input type="button" id="grocer_delete" value="Delete">
						</form>
					</p>
					</div>
				</div>
			</div>
		<!--end modal-->
		 <!--Tab Start -->
		 			
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
									<input type="hidden" name="cat_id" value="<?php echo $cat_id;?>">
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


  
       



