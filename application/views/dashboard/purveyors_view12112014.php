<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css">
<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
<!-- check box disabled -->
 <script type="text/javascript">
  $(document).ready(function () { 
	$('input#radio_1').attr("disabled",true); 
	$('input#radio_2').attr("disabled",true);  	
	
     $("#hide-ftp").hide();
	 $("#hide-drag").hide();
	  
	 $("#spread").click(enable_cb);
	 
	function enable_cb() { 
	if (this.checked) {
	 $("input#radio_1").removeAttr("disabled");
	 $("input#radio_2").removeAttr("disabled");
	}
	}  
	
    $("#radio_1, #radio_2").change(function () { 
        if ($("#radio_1").is(":checked")) {
            $("#hide-ftp").show();
			$("#hide-drag").hide();
        }
        else if ($("#radio_2").is(":checked")) {
            $("#hide-drag").show();
			$("#hide-ftp").hide();
        }
       
    });        
});
 </script>
 <script type="text/javascript">
  $(document).ready(function () { 
  
  	$("#upfile1").click(function () {
    $("#user_file").trigger('click');
	});
	
	
	
  });
 </script> 



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
     
			<div class="head"><h1> Purveyors </h1></div>
				 <div id="minitab">
						<ul id="tablist">
							<li class="active"><a href="#">Manage</a></li>
							<li><a href="<?php echo base_url();?>purveyors/search">Search</a></li>
							<li><a href="<?php echo base_url();?>purveyors/addnew">Add New</a></li>
						</ul>
				 </div>
				 <div class="mini-tab-1" >
				 		<div id="tab_manage"><!--common  -->
							<p>
								 
							</p>
						</div>	
				 </div>
			</div>	
  	 </div> <!--end test container-->

  </div> <!--right contaner end -->
 
</div>
</div>
<!--Main contaner end -->  


       



