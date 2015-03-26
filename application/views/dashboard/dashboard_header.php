<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Margin Markup</title>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/dashboard.css">
 <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
 
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
  
});

</script> 
 
 
 <script type="text/javascript">
 $(document).ready(function () { 
     $('#ftp_div').hide();
	 $('#drag_div').hide();
	 $('#submit_btn').hide();
    $("#radio_1, #radio_2").change(function () { 
        if ($("#radio_1").is(":checked")) {
            $('#ftp_div').show();
			$('#drag_div').hide();
			 $('#submit_btn').show();
        }
        else if ($("#radio_2").is(":checked")) {
        	$("input").removeAttr('required');
            $('#drag_div').show();
			$('#ftp_div').hide();
			 $('#submit_btn').show();
        }
       
    });
	
	 $('.close-hide').click(function(){
      $('.hide-div').hide();
  });
	
	        
});
 </script>	


<style>

nav {
    background: none repeat scroll 0 0 #EAEAEA;
    font: 13px/1.4 "Lucida Grande","Lucida Sans Unicode",Tahoma,sans-serif;
    position: relative;
    white-space: nowrap;
	width: 100%;
	margin: 20px auto;
}
nav ul {
    list-style: outside none none;
	border: 1px solid #adaeae;
	box-shadow: 0 0 1px 0;
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
    left: 23%;
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
}
*/
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
    padding: 8px 12px;
    /*position: relative;*/
    text-decoration: none;
	border-right: 2px solid #c4c4c4;
}
nav ul li.last a{
border-right: 0 none;
}
</style>

</head>
<body>
<!--header-->
<?php  $url =  $this->uri->segment(1); 
if($url=='dashboard') {$url =1;}
?>
<header id="header">
<div class="header_top"> <label> Get Started </label>

 
  <!--<div style="float:right;margin:10px 25px 15px 0px;color: white;cursor:pointer;" id="flip_down">&#9660;</div>-->
  <div style="float:right;margin:10px 25px 15px 0px;color: white;cursor:pointer;" id="flip_down"><img src="<?php echo base_url();?>assets/images/down.png"></div>
</div>
	<div id="welcome_menu"  >
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
		<span style="position: relative;top: 5px;left:15px;"><img src="<?php echo base_url()?>assets/images/q_1.png" width="22px" height="22px"> </span>
		<div style="margin-left:25px;font-size:11px;color: #fefffe;"> <span style="font-weight:bold;"> <?php echo $details->username; ?> is signed in </span> not you? </div>
	</div>
	<br clear="all" />
</div>

<div style="margin:auto 272px;width:413px;">
	<nav>
		 <ul>
		   <li <?php if($url==1) {?> class="active" <?php } ?> >
		    <a  href="<?php echo base_url();?>dashboard"> Dashboard </a>
			<span></span>
		     </li>
		   <li> <a href="<?php echo base_url();?>menu"> Menu </a> </li>
		   <li> <a href="<?php echo base_url();?>testkitchen"> Test Kitchen </a> </li>
		   <li> <a href="<?php echo base_url();?>office"> Office </a> </li>
		   <li class="last"> <a href="<?php echo base_url();?>orderguide/cat/1"> Order Guide </a> </li>
		 </ul>
	</nav>
</div> 
</header>

<!--End Header -->