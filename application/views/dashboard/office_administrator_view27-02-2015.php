
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/stylescroll.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.mCustomScrollbar.css">

<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>


 <script type="text/javascript">
  $(document).ready(function () { 
  
  	$("#upfile1").click(function () {
    $("#user_file").trigger('click');
	});
	
	
	
  });
 </script> 



<!--Main contaner start -->
<div id="main_container" >
<!-- left contaner start -->
 <aside id="officecontact">
 	 <div class="add_new" ><img src="<?php echo base_url();?>assets/images/prf.png">
 	  <a href="<?php echo base_url();?>office/administration">Add Contact</a>
 	   </div>
 </aside>
 <!--Left contaner end -->
 
 <!--right contaner start -->
 <div id="purveyor_container" >
 
   <!--test container -->
  
   <div id="office_admin">
     
			<div class="head"><h1> Office Administration </h1></div>
			  <div class="content mCustomScrollbar"> <!--scroll -->
				
				<section class="widget">
					<?php foreach($administrator as $contact) { ?>					 
					<article class="row_1">
						<div class="col_1" >
							<?php if($contact['photo']!='') { ?>
							<img src="<?php echo base_url();?>uploads/administrator/<?php echo $contact['photo'];?>" wisth="80px;" height="75px;"> <br>
							<?php } else { ?>
							<img src="<?php echo base_url();?>assets/images/profile.gif" wisth="80px;" height="75px;"> <br>
							<?php } ?>
							<span> Profile photo </span>
						 </div>
						<div class="col_2" >
							<h3> <?php echo $contact['company_name']; ?> </h3><br>
							<span> <b> Conatct Name : </b><?php echo $contact['office_contact_person']; ?> </span> <br>
							<span> Phone Number : <?php echo $contact['office_phone_number']; ?> </span> <br> 
							<span> Email Address : <a href="#"><?php echo $contact['office_email']; ?> </a> </span> <br>
						</div>
						<div class="col_3" >
							<img src="<?php echo base_url();?>assets/images/linkedin.jpg">&nbsp;&nbsp;
							<img src="<?php echo base_url();?>assets/images/fb.jpg">&nbsp;&nbsp;
							<img src="<?php echo base_url();?>assets/images/twitter.png">

						</div>
						<div style="float:right;"> Sync by : api  </div>
						<br clear="all">
					</article>
					<?php } ?>		   
					<!-- <article class="row_1">
						<div class="col_1" >
							<img src="<?php echo base_url();?>assets/images/profile.gif" wisth="80px;" height="75px;"> <br>
							<lable> Profile photo </label>
						 </div>
						<div class="col_2" >
							<h3>sysco</h3><br>
							Conatct Name : dsds <br>
							Phone Number : 58-58-25 <br> 
							Email Address : <a href="#">re56@gmail.com </a> <br>
						</div>
						<div class="col_3" >
							lin fb twit
						</div>
						<br clear="all">
					</article>		
					<article class="row_1">
						<div class="col_1" >
							<img src="<?php echo base_url();?>assets/images/profile.gif" wisth="80px;" height="75px;"> <br>
							<lable> Profile photo </label>
						 </div>
						<div class="col_2" >
							<h3>sysco</h3><br>
							Conatct Name : dsds <br>
							Phone Number : 58-58-25 <br> 
							Email Address : <a href="#">re56@gmail.com </a> <br>
						</div>
						<div class="col_3" >
							lin fb twit
						</div>
						<br clear="all">
					</article>				 -->			
										
				</section>
				
				 </div> <!--sroll end-->			
			</div>	
  	 </div> <!--end test container-->

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



