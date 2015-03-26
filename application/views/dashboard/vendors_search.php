<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
<script src="<?php echo base_url()?>assets/js/jquery-1.11.1.min.js"></script>

<!-- start search-->
<script type="text/javascript">
$(document).ready(function () { 
  //$("#grosslist").hide();
  
  $("#search_vendors").click(function () { 
   	
   	 var input_value= $('#search_text').val();
       
			$.ajax({
				type: "POST", 
				async: false,
				dataType: "html", 
				url: "<?php echo base_url();?>vendors/ajax_search",   
				data: "input_value="+input_value,
				success: function(data){ 

					$('#inferiz').html(data);
					
					//$('#grosslist').fadeIn(200).show();
				},
				error: function(){alert('error');}
				});     
	});
});
</script>
<!--end search -->


<script>
$(function() {
	$('#minitab').on('click', 'li', function() {
    $('#tablist li.active').removeClass('active');
    $(this).addClass('active');
});
});
</script>


<!--Main contaner start -->
<div id="main_container" >
<!-- left contaner start -->
 
 <!--Left contaner end -->
 <!--right contaner start -->
 <div id="purveyor_container" >
 <?php if($this->session->flashdata('success') !='') { ?>
		  			<div class="succ" style="margin-top:20px;"> <?php echo $this->session->flashdata('success'); ?></div> <br>
		  		<?php } ?>

   <!--test container -->
   <div id="profile">
     
			<div class="head"><h1> Vendors </h1></div>
				 <div id="minitab">
						<ul id="tablist">
							<li ><a href="#">Manage</a></li>
							<li  class="active"><a href="<?php echo base_url();?>vendors">Search</a></li>
							<li><a href="<?php echo base_url();?>vendors/addnew">Add New</a></li>
						</ul>
				 </div>
				 <div class="mini-tab-1" >
				 		<div id="tab_manage"><!--common  -->
							<p>
								 <form id="search_form" action="" method="post">
								 <input type="text" name="search" id="search_text" style="width:300px;height:20px;" required/>
								 <input type="button" value="search vendors" name="search_vendors" id="search_vendors" />
								</form>

								<div id="inferiz"> </div>

								
							</p>
						</div>	
				 </div>
			</div>	
  	 </div> <!--end test container-->

  </div> <!--right contaner end -->
 
</div>
</div>
<!--Main contaner end -->  

       



