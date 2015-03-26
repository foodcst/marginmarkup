<script src="<?php echo base_url()?>assets/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function () { 
	$('input#color_1').on('change', function() { 
    if (this.checked) {
        var checkname = $(this).attr("name");
        $("input:checkbox[name='" + checkname + "']").removeAttr("checked");
        this.checked = true;
    }
});

});
</script>
<style type="text/css">
<!--
input.largerCheckbox
{
	width: 30px;
	height: 30px;
}

//-->
</style>
 <script type="text/javascript">
  $(document).ready(function () { 
  	$('#msg2').hide();
    //event.preventDefault();
  	$(".color_theme").click(function () {
   	$('#msg').show();
	
	$('#msg2').hide();
	});
	
	$(".color_theme2").click(function () {
   	$('#msg2').show();
	 $('#msg').hide();
	});
	
  });
 </script> 
<!-- container-->
<section id="container">
<!--container left-->
 <!--contanier let end-->
 
    <section style="float:left;"> 
			<?php if($this->session->flashdata('success') !='') { ?>
		  			<div class="succ" style="margin-top:20px;"> <?php echo $this->session->flashdata('success'); ?></div>
		  		<?php } ?>
			 <div style="float:left;width:700px;">
					<article class="widget" >
					  <div class="whead">
					  <h1>Admin</h1>
					  </div>
					  
					  <div id="admin_profile">
					  <form action="<?php echo base_url();?>admin/submit" method="post" enctype="multipart/form-data">
					   <p> Global settings </p>
					   <label><b>Company Name </b></label> <br />
					   <input type="text" name="company_name" required /> <br /><br />
					   
					   <input type="checkbox" name="email_recipie" /> <label>Email user's when recipie is added</label> <br />
					   <input type="checkbox" name="email_price" /><label> Email user's when prices changes </label> <br />
					   <input type="checkbox" name="email_potential" /> <label>Email user's when potential COGS changes by </label>
					   <br />
					   <p> Admin & Tech support</p>
					   <label> <b> support Name </b></label> <br />
					   <input type="text" name="support_name" required /> <br /><br />
					   <label> <b> Support Email </b> </label> <br />
					   <input type="email" name="support_email" required /> <br />
					   
					   <p>Appearance</p>
					    <label> <b> Color Theme </b> </label> <br />
					   <div class="color_theme" >
					   
					   <span id="msg" > selected </span>
					   <input type="radio" class="largerCheckbox" name="color_1" checked="checked" id="color_1" value="576477" style="display:none;" />  &nbsp;&nbsp; 
					  
					    </div>
						<div class="color_theme2" >
						<span id="msg2" >selected</span>
						 <input type="radio" class="largerCheckbox" name="color_1" id="color_1" value="1C1C1D" style="display:none;" /> </div> <br /><br clear="all">
						
						<label> <b> Company Logo </b> </label> <br />
						<input type="file" name="logo_file" />  <br /><br />
						
						<input type="submit" id="submit" value="Save Settings" /> <input type="reset" class="cancel_bt" value="cancel" />
					   

					   </form>
					  </div>
					 <br clear="all" />
					</article>
					
			 </div>
			 <br clear="all" />
			 
			 	</section> 
	
 <br clear="all" />
</section>
<!--end container-->
	<br clear="all" />
	<footer id="footer">

	 <div class="row_1">Havleng problem? contact support</div>
	 <div class="row_2">
	 <a href="#"> What's new </a> | <a href="#">syatem stats </a> | <a href="#">Privacy Policy </a> | <a href="#">Terms of service </a>
	 </div>
	
</footer>
</body>

</body>
</html>