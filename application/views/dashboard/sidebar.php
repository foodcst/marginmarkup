
<section id="container">
<aside class="container_left">
 <section class="left_widget_top" style="margin-bottom:42px;">
	  <ul>
	    <li class="icon_1"> <a href="<?php echo base_url();?>purveyors/addnew" > Synch vendors </a> </li>
		<li class="icon_2"> <a href="#" > Build Recipe </a> </li>
		<li class="icon_3"> <a href="<?php echo base_url();?>admin" > Admin </a> </li>
	  </ul>
	</section>
	
	<section class="left_widget" style="margin-bottom:42px;">
	 <h1> Admin and support <div style="float:right;margin-top:-4px;"> <img src="<?php echo base_url();?>assets/images/icon_pencil-1.png"  /></div></h1>
	 
	 <ul>
	    <li> <a href="#" > Bret payne </a> <div style="border:1px solid #F0F0F0;margin-left:14px;"> </li>
		<li  class="last"> <a href="#" > brett@brettcpayne.com </a> <div style="border:1px solid #F0F0F0;margin-left:14px;"> </li>
		
	  </ul>
	  
	</section>
	
	<section class="left_widget" style="margin-bottom:42px;">
	 <h1> Your Info <div style="float:right;margin-top:-4px;"> <img src="<?php echo base_url();?>assets/images/icon_pencil-1.png"  /></div> </h1>
	 <ul>
	    <li> <a href="#" > Bret payne </a> <div style="border:1px solid #F0F0F0;margin-left:14px;"> </li>
		<li> <a href="#" > brett@brettcpayne.com </a> <div style="border:1px solid #F0F0F0;margin-left:14px;"> </li>
		
		<li class="last"> <a href="#" > Admin </a> <div style="border:1px solid #F0F0F0;margin-left:14px;"> </li>
	  </ul>
	</section>
	<section class="left_widget" style="margin-bottom:42px;">
	 <h1> Statistics <div style="float:right;margin-top:-4px;"> <img src="<?php echo base_url();?>assets/images/icon_pencil-1.png" /></div> </h1>
	 <ul>
	    <li> <a href="#" > Recipes </a><span style="float:right;"> 20 </span> <div style="border:1px solid #F0F0F0;margin-left:14px;"> </div> </li>
		<li> <a href="#" > Ingredients </a><span style="float:right;"> <?php if(isset($ingredients)) { echo $ingredients; }?> </span> <div style="border:1px solid #F0F0F0;margin-left:14px;"> </div> </li>
		<li class="last"> <a href="#" > Last Update  </a> <span style="float:right;"> <?php if(isset($last_update[0]->reg_date)) { echo date("d/n/Y", strtotime($last_update[0]->reg_date));} ?> </span> </li>
		
	  </ul>
	</section>
 </aside>