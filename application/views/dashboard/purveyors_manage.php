

 <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/switch.css">
<style>
.progress {
  height: 16px;

  border: 1px solid #eeeeee;
  overflow: hidden;
 
  border-radius: 5px;
}
.progress__bar {
  display: block;
  height: 100%;
  background: #4984BD;
}

.styled-select {
    background: url("../assets/images/downico.png") no-repeat scroll 127px center white;
    border: 1px solid #ccc;
    border-radius: 3px;
    display: inline-block;
    height: 22px;
    overflow: -moz-hidden-unscrollable;
    position: relative;
    width: 100%;
}

.styled-select select {
    background: none repeat scroll 0 0 transparent;
    border: 0 none;
    font-size: 11px;
    height: 100%;
    left: 0;
    opacity: 0;
    
    top: 0;
    width: 100%;
}

</style>
<script>
$(function() {
	var totalCheckboxes = $('input:checkbox').length;
		
		$('.switch_disable').addClass('selected');
		
			$('.switch_enable').on('click', function(e) { 
				$('#' + this.id).addClass('selected');
				var arr = this.id.split('_');
				var d = '#switch_disable_';
				$(d + arr[2]).removeClass('selected');
			   	$('.switch_val').val("1");
			   
			});

			$('.switch_disable').on('click', function(e) {
			   	$('#' + this.id).addClass('selected');
			   	var arr = this.id.split('_');
			   	var f = '#switch_enable_';
			   	$(f + arr[2]).removeClass('selected');
			   	$('.switch_val').val("0");
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
<?php /*if($this->session->flashdata('success') !='') { ?>
		  			<div class="succ" style="margin-top:20px;"> <?php echo $this->session->flashdata('success'); ?></div> <br>
		  		<?php }*/ ?>
   <!--test container -->
   <div id="profile" class="purveyor-div">
     
			<div class="head"><h1> Purveyors </h1></div>
				 <div id="minitab">
						<ul id="tablist" style="width:300px;">
							<li class="active"><a href="<?php echo base_url();?>purveyors/manage">Manage</a></li>
							<li  ><a href="<?php echo base_url();?>purveyors/search">Search</a></li>
							<li><a href="<?php echo base_url();?>purveyors/addnew">Add New</a></li>
						</ul>
				 </div>
				 <div class="mini-tab-1" >
				 		<div id="tab_manage" class="tab_manage"><!--common  -->
							<p>
								<div class="guide">Order Guide </div>
								<section>
									<table border="0" cellpadding="10" cellspacing="20">
										<?php $i=1; foreach($purveyors as $purv) { ?>
										<tr>
											<td><input type="checkbox" id="chk" checked="checked">  </td>
											<td>
											<div class="styled-select">
												<select name="purveyor" id="purveyor">
													<option><?php echo $purv->company_name; ?></option>
													
												</select>
											</div>		
												 </td>
											<td>
												<div class="switch_options">
												<span class="switch_enable" id="switch_enable_<?=$i?>"> ON </span>
												<span class="switch_disable" id="switch_disable_<?=$i?>"> OFF </span>
												<input type="hidden" class="switch_val" id="switch_val_<?=$i?>" value="0"/>
											</div>
											 </td>
											<td></td>
										</tr>
										<?php $i++; } ?>
										<tr>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										 <td> 
										
										 <?php if( $this->session->flashdata('success') !="") { ?>
										  <div style="position:relative;top:-47px;left: -40px;width: 78px;">
										  <div id="loader" style=" background: url('../assets/images/ajax-loader321.gif')  no-repeat center center ;height:30px;"></div>
										  
										  </div>
										  <?php } ?>
										  <table width="100%">
										  <tr><td> </td></tr>
										  </table>
										  
										   </td>
										</tr>
										<!-- <tr>
											<td><input type="checkbox" id="chk">  </td>
											<td>
												<select name="purveyor" id="purveyor">
													<option>Walmart</option>
													<option></option>
												</select>	
												 </td>
											<td>
												<div class="switch_options">
												<span class="switch_enable" id="switch_enable_2"> ON </span>
												<span class="switch_disable" id="switch_disable_2"> OFF </span>
												<input type="hidden" class="switch_val" id="switch_val_2" value="0"/>
											</div>
											 </td>
											<td> </td>
										</tr> -->
									</table>
									
									<?php if( $this->session->flashdata('success') !="") { ?>
									<div  style="position:relative;top: -107px;right: -373px;width: 400px;">
									    <div style="position:relative;top: -41px;font-size: 11px;"> Downloading file ......... <span class="ttr"> </span> </div>
									     <div class="progress" role="progressbar" data-goal="-50" aria-valuemin="-100" aria-valuemax="0">
                        				<div class="progress__bar"></div>
                    					</div>
									</div>	
									<?php  } ?>
								</section>
								
								      
							
								
							</p>
						</div>	
				 </div>
			</div>	
  	 </div> <!--end test container-->

  </div> <!--right contaner end -->
 
</div>
</div>
<!--Main contaner end -->  

 <script type="text/javascript" src="<?php echo base_url();?>assets/js/rainbow.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-asProgress.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function($){
        $('.progress').asProgress({
            'namespace': 'progress'
        });
      
        $('.progress').asProgress('go',50);
        /*$('#button_go').on('click', function(){
             $('.progress').asProgress('go',50);
        });*/
       
       
    });
    </script>       



