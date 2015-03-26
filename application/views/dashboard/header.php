<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Margin Markup</title>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/styles.css">
 
 <style>

nav {
    /*background: none repeat scroll 0 0 #E2E2E2;*/
    font: 13px/1.4 "Lucida Grande","Lucida Sans Unicode",Tahoma,sans-serif;
    position: relative;
    white-space: nowrap;
	width: 100%;
	margin: 20px auto;
	
	
background: -moz-linear-gradient(left, rgba(228,228,228,1) 2%, rgba(228,228,228,1) 99%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, right top, color-stop(2%,rgba(228,228,228,1)), color-stop(99%,rgba(228,228,228,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(left, rgba(228,228,228,1) 2%,rgba(228,228,228,1) 99%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(left, rgba(228,228,228,1) 2%,rgba(228,228,228,1) 99%); /* Opera 11.10+ */
background: -ms-linear-gradient(left, rgba(228,228,228,1) 2%,rgba(228,228,228,1) 99%); /* IE10+ */
background: linear-gradient(to right, rgba(228,228,228,1) 2%,rgba(228,228,228,1) 99%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e4e4e4', endColorstr='#e4e4e4',GradientType=1 ); 
}
nav ul {
    list-style: outside none none;
	border: 1px solid #adaeae;
}
nav li {
    display: inline-block;
	 position: relative;
}
.embed-nav a.active::after {
    border-top-color: #cccccc;
}
/*nav a.active::after {
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
   border-top: 8px solid #EAEAEA;
	background:url('assets/images/menu_down.png') no-repeat;
	border:1px solid red;
    content: "";
    left: 50%;
    margin-left: -8px;
    position: absolute;
    top: 100%;
    z-index: 1000;
}
*/
nav li.active > span  {
 background: url("assets/images/menu_down.png") no-repeat scroll 100% bottom rgba(0, 0, 0, 0);
    content: "";
    height: 18px;
    left: -1%;
    position: absolute;
    top: 24px;
    width: 41px;
}

/*nav li.active {
 position:absolute;
 width:30px;
 height:30px;
 top:100%;
 margin-left:32%;
 content: url("assets/images/menu_down.png");
}*/
nav a.active {
    background: none repeat scroll 0 0 #cccccc;
    color: #000000;
}
nav a.active {
  background: none repeat scroll 0 0 #EAEAEA;
color: black;

}

nav a {
    color: #666666;
    display: inline-block;
    padding: 8px 14px;
    /*position: relative;*/
    text-decoration: none;
	 border-right: 2px solid #c4c4c4;
}
nav ul li.last a{
border-right: 0 none;
}
</style>
 
 <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
 <script src="<?php echo base_url();?>assets/js/custom.js"></script>
 



<script> 
$(document).ready(function(){
   
  $("#welcome_menu").hide();
  $("#flip_down").click(function(){
    $("#welcome_menu").slideToggle("slow");
	$(this).find("#flip_up, #flip_down").toggle();
  });
  
   
  $('#myDiv').click(function(){
    $("#welcome_menu").slideToggle("slow");
	});
	
  $('.close-hide').click(function(){
      $('.hide-div').hide();
  });	
  
});

</script>  


</head>
<body>
<!--header-->
<?php  $url =  $this->uri->segment(1); 
if($url=='office') {$url =4;}
if($url=='menu') {$url =2;}
if($url=='testkitchen') {$url =3;}
if($url=='orderguide') {$url =5;}
?>
<header id="header">
<div class="header_top"> <label> Get Started </label>
	<div style="float:right;margin:10px 10px 15px 0px;color: rgb(35, 73, 171);cursor:pointer;" id="flip_down"><img src="<?php echo base_url();?>assets/images/down.png"></div>
</div>
	<div id="welcome_menu" >
		<article class="menu_sub" >
		  <ul>
		  	<li class="odd" ><a href="" class="user_icon"> Add a User </a> </li>
			<li class="even"><a href="" class="vendor_icon"> Add a Vendor </a> </li>
			<li class="odd"> <a href="" class="order_icon"> Create Your Order Guide </a> </li>
			<li class="even"> <a href="" class="food_icon"> Get Food Pricing </a> </li>
			<li class="odd"> <a href="" class="build_icon"> Build a recipe </a> </li>
			<li class="even"> <a href="" class="contact_icon"> Add a Contact </a> </li>
			<li class="odd"> <a href="" class="dash_icon"> Review your dashboard </a> </li>
		  </ul>
		</article>
		
		<article class="welcome_description" >
		 <div class="welcome_content" > <div style="float:right;margin:10px 10px 15px 0px;color: rgb(35, 73, 171);cursor:pointer;" id="myDiv">&#9650;</div>
			  <h4>Welcome, Brett!</h4><br>
			   <p> Let's help you get comfortable with margin markup </p> <br><br>
			  <p> <span>&larr;</span> Take these 7 steps now to get the most ouf your account </p> <br><br>
			  <p> click on step to watch a short video tutorial.As you complete each step,it will be checked off.And once you've completed all of them,we will move this Getting started section out of your way. </p> <br><br>
			   <p>if you ever need help,email us at <a href="#">help@marginmarkup.com </a> or use the email/chat box at the right corner of any page.</p>
		   </div>
		   
		</article>
	    
	 </div>
  <script>$("#welcome_menu").hide();</script>

<div class="search_profile">
	<div class="search_row"><input type="text" placeholder="Search for latest food pricing"><input type="submit" id="search" value="search"></div>
	<div class="profile_row">
		<a href="<?php echo base_url();?>admin">Admin</a> | <a href="<?php echo base_url();?>profile">Profile</a> | <a href="<?php echo base_url();?>logout">Logout</a> | <a href="">Help</a>
		<span style="position: relative;top: 5px;left:15px;"> <img src="<?php echo base_url()?>assets/images/q_1.png" width="22px" height="22px"> </span>
		<div style="margin-left:25px;font-size:11px;color:#fefffe;"> <?php echo $details->username; ?> is signed in not you? </div>
	</div>
	<br clear="all" />
</div>

<div style="margin:auto 281px;;width: 415px">
	<nav>
		 <ul>
		   <li > <a href="<?php echo base_url();?>dashboard"> Dashboard </a> </li>
		   <li <?php if($url==2) {?> class="active" <?php } ?>> <a  href="<?php echo base_url();?>menu"> Menu </a> <span></span></li>
		   <li <?php if($url==3) {?> class="active" <?php } ?> > <a  href="<?php echo base_url();?>testkitchen"> Test Kitchen </a> <span></span> </li>
		   <li <?php if($url==4) {?> class="active" <?php } ?> > <a  href="<?php echo base_url();?>office"> Office </a> <span></span> </li>
		   <li  class="last <?php  if($url==5) {?> active<?php } ?>" > <a  href="<?php echo base_url();?>orderguide/cat/1"> Order Guide </a> <span></span> </li>
		 </ul>
	</nav>
</div>
</header>
<!--End Header -->