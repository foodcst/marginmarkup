  
<!-- container-->
<section id="container">
<!--container left-->
  <!--contanier let end-->
 
    <section style="float:left;">
    	<?php if($this->session->flashdata('success') !='') { ?>
		  			<div class="succ hide-div" style="margin-top:20px;"> <?php echo $this->session->flashdata('success'); ?>
					<button type="button" class="close-hide" data-dismiss="alert" aria-hidden="TRUE">&times;</button>
					</div> <br>
		  <?php } ?>
		  <?php if($this->session->flashdata('failure') !='') { ?>
		  			<div class="failure hide-div" style="margin-top:20px;"> <?php echo $this->session->flashdata('failure'); ?>
					<button type="button" class="close-hide" data-dismiss="alert" aria-hidden="TRUE">&times;</button>
					</div> <br>
		  <?php } ?>

			 <div style="float:left;width:100%;">
					<article class="widget" >
					  <div class="whead">
					  <h1> <span style="position: relative;top: -3px;"><img src="<?php echo base_url();?>assets/images/line.png" height="2px;" width="15px;"/></span> Menu Stats</h1>
					  </div>
					  <div class="row">
						<span style="font-weight:bold;display: inline-block;margin-left: 8px;"><p>January</p></span>
						 <table border="0" cellpadding="24" cellspacing="10" style="font-size:11px;">
						 	<tr><td style="width:200px;">Recipes </td> <td>12 </td> </tr>
							<tr><td>Month start COGS </td> <td>31% </td> </tr>
							<tr><td>Month End COGS </td> <td> 31% </td> </tr>
						 </table>
					  </div>
					  <div class="row">
					  <span style="font-weight:bold;display: inline-block;margin-left: 8px;"><p>January</p></span>
					  <table border="0" cellpadding="24" cellspacing="10" style="font-size:11px;">
						 	<tr><td style="width:200px;">Recipes </td> <td>12 </td> </tr>
							<tr><td>Month start COGS </td> <td>31% </td> </tr>
							<tr><td>Month End COGS </td> <td> 31% </td> </tr>
						 </table>
					  </div>
					  <div class="row_last">
					 <span style="font-weight:bold;display: inline-block;margin-left: 8px;"><p>January</p></span>
					  <table border="0" cellpadding="24" cellspacing="10" style="font-size:11px;">
						 	<tr><td style="width:200px;">Recipes </td> <td>12 </td> </tr>
							<tr><td>Month start COGS </td> <td>31% </td> </tr>
							<tr><td>Month End COGS </td> <td> 31% </td> </tr>
						 </table>
					  </div>
					 <br clear="all" />
					</article>
					
			 </div>
			 <br clear="all" />
			 <section style="float:left;width:700px;">
				<article class="middle_widget" >
					  <div class="whead">
					  <h1> <span style="position: relative;top: -3px;"><img src="<?php echo base_url();?>assets/images/line.png" height="2px;" width="13px;"/></span> 3 Foods to watch</h1> 
					  </div>
					  <div class="row"><i class="fa fa-pencil"></i>
						<img src="<?php echo base_url();?>assets/images/upload.png">
					  <span style="position:relative;top:-9px;"> Pretex Bread </span>
					  </div>
					  <div class="row">
						<img src="<?php echo base_url();?>assets/images/upload.png">
					  <span style="position:relative;top:-9px;"> Pepper Jack cheese </span>
					  </div>
					  <div class="row_last">
						<img src="<?php echo base_url();?>assets/images/upload.png">
					  <span style="position:relative;top:-9px;"> Egg </span>
					  </div>
					 <br clear="all" />
				</article>
				
				<article class="middle_widget" >
					  <div class="whead">
					  <h1> <span style="position: relative;top: -3px;"><img src="<?php echo base_url();?>assets/images/line.png" height="2px;" width="13px;"/></span> 2 Test Recipe</h1>
					  </div>
					  <div class="row_two">
						
					  Working on 1 <b>Entree </b> menu item with a COGS at 27%
					  </div>
					  <div style="border: 1px solid #edeeef;margin-left: 18px;margin-right: 18px;"> </div>
					  <div class="row_two_last">
						
					  Working on 1 <b> Drink </b> menu item with a COGS at 17%
					  </div>
					  
					 <br clear="all" />
				</article>
				
				<article class="middle_widget" >
					  <div class="whead">
					  <h1> <span style="position: relative;top: -3px;"><img src="<?php echo base_url();?>assets/images/line.png" height="2px;" width="13px;"/></span> Update Your Latest Price</h1>
					  </div>
					   <form action="<?php echo base_url();?>dashboard/updateprice" method="post" enctype="multipart/form-data" > 
					    <div class="row_synch" >
						   <div class="styled-select">
							<select name="purveyor_name" required >
								<option>  </option>
								<?php foreach($purveyors as $purv) { ?>
								
							 <option value="<?php echo $purv->company_id; ?>"> <?php echo $purv->company_name; ?></option>
							 <?php } ?>
							</select>
							<!--<div class="one"></div>-->
						</div>	
							<br><br>
							<a href="<?php echo base_url();?>purveyors/addnew">Add new pureyor </a> and upadte pricing
						</div>
						<div class="row_drag"> 
						 <input type="radio" name="choose" id="radio_1" value="ftp"> FTP
						  <input type="radio" name="choose" id="radio_2" value="drag">Drag and Drop
						  
						</div> 
						
							<div id="ftp_div">
								<label> Server </label>  :<input type="text" name="server" required> <br><br>

								<label> User Name </label> :<input type="text" name="username" required><br><br>
								<label> Password : </label> <input type="password" name="pwd" required ><br><br>
							</div>
							<div id="drag_div">
								<input name="csv_file" type="file" id="price_drag">
							</div>
							<div id="submit_btn">
								<input type="submit" id="submit" value="synch">
							</div>
					   
					 <br clear="all" />
					 </form> 
				</article>
					
			 </section>
			 
			  <section id="content_right" >
				<div class="right_mid_right_1">
					<h4> Current Cogs % </h4> 
					 <span class="rate"> 30 </span>
				 </div>
				 
				<div class="right_mid_right_2">
					<h4>Potential COGS % </h4> 
					<span class="rate"> 30 </span>
				 </div>
			  </section>
	</section> 
	
 <br clear="all" />
</section>
<!--end container-->
	<br clear="all" />
	<footer id="footer">

	 <div class="row_1">Having problem? contact support</div>
	 <div class="row_2">
	 <a href="#"> What's new </a> | <a href="#">System Status </a> | <a href="#">Privacy Policy </a> | <a href="#">Terms of service </a>
	 </div>
	
</footer>
</body>

</body>
</html>