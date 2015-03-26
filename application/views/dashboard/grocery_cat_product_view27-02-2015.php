<link rel="stylesheet" href="<?php echo base_url()?>assets/css/stylescroll.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.mCustomScrollbar.css">

<style>
html {
  font-family: "roboto", helvetica;
  position: relative;
  height: 100%;
  font-size: 100%;
  line-height: 1.5;
  color: #444;
}

h2 {
  margin: 1.75em 0 0;
  font-size: 5vw;
}

#popup1 h3 { font-size: 1.0em; }

#popup1 p {
text-align:center;
font-size: 14px;

}

.v-center {
  height: 100vh;
  width: 100%;
  display: table;
  position: relative;
  text-align: center;
}

.v-center > div {
  display: table-cell;
  vertical-align: middle;
  position: relative;
  top: -10%;
}

.btn {
font-size: 3vmin;
  padding: 0.75em 1.5em;
  background-color: #fff;
  border: 1px solid #bbb;
  color: #333;
  text-decoration: none;
  display: inline;
  border-radius: 4px;
  -webkit-transition: background-color 1s ease;
  -moz-transition: background-color 1s ease;
  transition: background-color 1s ease;
}

.stylebut {
  background-color: #006c00;
 border: 1px solid rgb(45, 38, 38);
 border-radius: 3px;
 color: #ffffff;
 cursor: pointer;
 padding: 8px !important;
 text-decoration:none;
 font-size: 13px;
}

.popupbtn {
   background-color: #4984BD;
 border: 0px solid rgb(45, 38, 38);
 border-radius: 3px;
 color: #ffffff;
 cursor: pointer;
 padding: 8px !important;
 text-decoration:none;
 font-size: 13px;
 margin-left: 170px;
}
/*.btn:hover {
  background-color: #ddd;
  -webkit-transition: background-color 1s ease;
  -moz-transition: background-color 1s ease;
  transition: background-color 1s ease;
}*/

.btn-small {
  padding: .75em 1em;
  font-size: 0.8em;
}

.modal-box {
  display: none;
  position: absolute;
  z-index: 1000;
  width: 98%;
  background: white;
  border-bottom: 1px solid #aaa;
  border-radius: 4px;
  box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
  border: 1px solid rgba(0, 0, 0, 0.1);
  background-clip: padding-box;
}
@media (min-width: 32em) {

.modal-box { width: 36%; }
}

.modal-box header,
.modal-box .modal-header {
  padding: 0.10em 1.0em;
 border-bottom: 1px solid #ddd;
 text-align: center;
 border-radius: 4px;
 
 color: #636363;
background: #f8f8f8;
background: -moz-linear-gradient(top, #f8f8f8 0%, #e8e8e8 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f8f8f8), color-stop(100%,#e8e8e8));
background: -webkit-linear-gradient(top, #f8f8f8 0%,#e8e8e8 100%);
background: -o-linear-gradient(top, #f8f8f8 0%,#e8e8e8 100%);
background: -ms-linear-gradient(top, #f8f8f8 0%,#e8e8e8 100%);
background: linear-gradient(top, #f8f8f8 0%,#e8e8e8 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f8f8f8', endColorstr='#e8e8e8',GradientType=0 );

}

.modal-box header h3,
.modal-box header h4,
.modal-box .modal-header h3,
.modal-box .modal-header h4 { margin: 0; }

.modal-box .modal-body { padding: 2em 1.5em; }

.modal-box footer,
.modal-box .modal-footer {
  padding: 1em;
  border-top: 1px solid #ddd;
  background: rgba(0, 0, 0, 0.02);
  text-align: right;
}

.modal-overlay {
  opacity: 0;
  filter: alpha(opacity=0);
  position: absolute;
  top: 0;
  left: 0;
  z-index: 900;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.3) !important;
}

</style>
<style>
.progress {
  height: 16px;

  border: 1px solid #eeeeee;
  overflow: hidden;
  margin:14px;
  border-radius: 5px;
}
.progress__bar {
  display: block;
  height: 100%;
  background: #4984BD;
}

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
<!--<script> 
   
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
  </script>-->	
<!--grocery Deleting -->




<!--<script type="text/javascript">
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
 </script>-->
 
 <script>
$(function() {
$("body").on("click", "#addmore", function() {
    var tr = "<tr><td><input type='text' class='description' name='description[]' style='width:300px;' required/></td><td><input type='text' class='pack' name='pack[]' style='width:50px;' required/></td><td><input type='text' class='size' name='size[]' style='width:50px;' required/></td><td><select name='purchaseunit[]' required><option value='case'>Case </option><option value='each'>Each </option></select></td><td></td><td><select name='um[]' style='width:50px;' required><option value='ea'>EA </option><option value='oz-wt'>OZ-wt </option><option value='oz-fl'>OZ-fl </option><option value='lb'>LB (wt 160z per lb) </option><option value='galoon'>Gallon (fluid,128 fl oz per gallon) </option></select></td><td><input type='text' class='ruperpu' name='ruperpu[]' style='width:50px;' required/></td><td><input type='text' class='yield' name='yield[]' style='width:50px;' required /></td><td><input type='button' class='removebutton' id='removemore'  value='Delete' /></td></tr>";
	 $('#table').append(tr);
});




});
</script>
<script>
 $("body").on("click", ".removebutton", function() {
    
     $(this).closest('tr').remove();
     return false;
 });
</script>
 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
 
 <script> 
   
 $(function() { 
 
 //$('form').bind('click', function (e) {
   //e.preventDefault();
  $(".submit").on( "click", function(e) { 
   $(".description").each(function(){
    if($(this).val().length !=0 ) {
       return false;
		e.preventDefault();
     }
	 });
      //e.preventDefault();
    var description =  $(".description").val();
	//alert(description);
	var description12 =  $(".description12").val();
	var pack =  $(".pack").val();
	var size =  $(".size").val();
	var ruperpu =  $(".ruperpu").val();
	var yield =  $(".yield").val();
	
    if(description == "") { return true;}
	if(description12 == "") { return true;}
	if(pack == "") { return true;}
	if(size == "") { return true;}
	if(ruperpu == "") { return true;}
	if(yield == "") { return true;}
	
	//$("#table").find("input.description").prop('required',true);
       $.ajax({
       url:'<?php echo base_url();?>grocery/submit',
       type: 'POST',
       data: $("#myForm").serialize(),
       success: function(data){ 
           if(data==1)
           {
           	//$('#su').html('Insertion success!..');
           	$('.modal-box').css("display", "block");

           }
           
       },
      
   });
   
  
  //return true;
      });
	  
	///});
 });
  </script>	

 




<script>
$(document).ready(function() {
    
	
	
    var $item = $('li.item'), //Cache your DOM selector
        visible = 2, //Set the number of items that will be visible
        index = 0, //Starting index
        endIndex = ( $item.length / visible ) - 1; //End index
    
    $('#nextid').click(function(){ 
        if(index < endIndex ){
          index++;
          $item.animate({'left':'-=10px'});
        }
    });
    
    $('div#arrowL').click(function(){
        if(index > 0){
          index--;            
          $item.animate({'left':'+=300px'});
        }
    });
    
});
</script>

<!--Main contaner start -->
<div id="main_container" >
	<?php if($this->session->flashdata('success') !='') { ?>
		  			<div class="grosssucc hide-div" style="margin-top:20px;"> <?php echo $this->session->flashdata('success'); ?>
					<button type="button" class="close-hide" data-dismiss="alert" aria-hidden="TRUE">&times;</button>
					</div> <br>
<?php } ?>
<?php if($this->session->flashdata('failure') !='') { ?>
		  			<div class="grossfailure hide-div" style="margin-top:20px;"> <?php echo $this->session->flashdata('success'); ?>
					<button type="button" class="close-hide" data-dismiss="alert" aria-hidden="TRUE">&times;</button>
					</div> <br>
<?php } ?>


<!-- left contaner start -->

  <aside id="officecontact">
 	<div class="order_back">
 		<img src="http://localhost/marginmarkup/assets/images/left_arrow.png">
 	 <a href="#">Back to Order Guide </a> 
	 </div>
	 <div class="convert-price">
	 <img src="<?php echo base_url();?>assets/images/con-1.png" />
	 </div>
	 <div class="reference">
	 <p>Reference</p>
	  <span>Size Options </span>
	  <ul>
	   <li>Cnt</li>
	   <li>LBS</li>
	   <li>#10 Can</li>
	   <li>32OZ</li>
	   <li>Each</li>
	 </ul>
	 
	 <span>Purchase Unit Options </span>
	  <ul>
	   <li>Case</li>
	   <li>Each</li>
	   
	 </ul>
	 
	  <span>U/M Options </span>
	  <ul>
	   <li>EA</li>
	   <li>OZ-wt</li>
	   <li>OZ-fl</li>
	   <li>LB (wt 160z per lb)</li>
	   <li>Gallon (fluid,128 fl oz per gallon)</li>
	 </ul>
	 </div>
 </aside>	
 <!--Left contaner end -->
 <!--right contaner start -->
 <div id="purveyor_container" > 


   <div id="profile">
   		<div class="head ">
   			<div style="float:left;"> <h1> Grocery List </h1> </div> 

   			<div id="horizonttab" style="border:1px solid;float:left;display:block;">
   				<ul id="tablist">
   					<li ><a href="#">All</a></li>
   					<?php $i=1; foreach($group_cat as $group) {?>
   						 
   					 
   					 <li  <?php if($cat_id == $group['group_id']) { echo "class='active'";} ?> class="item" >
   					 	<a href="<?php echo base_url();?>grocery/cat/<?php echo $group['group_id']; ?>"><?php echo $group['group_name']; ?></a></li>
   					<?php if($i==5) {echo "<li><a href='' id='nextid'>Next</a></li>"; break; } $i++; } ?>
					
   				</ul>
   			 </div>
   			 <!--<div id="modaladd"> <a href="#openModal">  Add </a></div>
   			 <div id="modaladd"> <a href="#openModal_1">  Delete </a></div>-->
   			 <br clear="all">
   		</div>


		 <!--Tab Start -->
		 			
				 <div class="mini-tab-grocery " >
				 
				   <div class="content mCustomScrollbar"> <!--scroll -->
				 		<form action="" method="post" id="myForm">
				 		<div id="tab_manage" class="tab_manage"><!--common  -->
							<div class="recipe-head" style="float:right;"><p>Recipe Cost Unit (RU)</p> </div>
							
				   
						  		<table id="table" border="0" cellpadding="3" cellspacing="10">
									<tr class="common-tr"> <th > Description </th><th >Pack</th><th >Size</th> <th style="width:50px;" >Purchase Unit</th><td></td> <th >U/M</th> <th >#RU per PU</th> <th >Yield % </th> <td> </td> </tr>
									<tr><td><input type="text" class="description" name="description[]" style="width:300px;" required /></td>
										<td><input type="text" class="pack" name="pack[]" style="width:50px;" required /></td>
										<td><input type="text" class="size" name="size[]" style="width:50px;" required /></td>
										<td>
										<select name="purchaseunit[]" required>
										  <option value="case">Case </option>
										  <option value="each">Each </option>
										</select>
										 </td>
										 <td></td>
										 <td>
										  <select name="um[]" style="width:50px;" required>
										  <option value="ea">EA </option>
										  <option value="oz-wt">OZ-wt </option>
										  <option value="oz-fl">OZ-fl </option>
										  <option value="lb">LB (wt 160z per lb) </option>
										  <option value="galoon">Gallon (fluid,128 fl oz per gallon) </option>
										</select>
										 </td>
										 <td><input type="text" class="ruperpu" name="ruperpu[]" style="width:50px;" required /></td>
										 <td><input type="text" class="yield" name="yield[]" style="width:50px;" required /></td>
										<td> </td>
										
									</tr>
									</table>
									<input type="button" id="addmore"  value="+" />Add another ingredient
								<table>
								<tr><td><!-- <input type="submit" class="submit"  value="Add&Sync"/> --> </td></tr>
								</table>
							
								<input type="hidden" name="cat_id" value="<?php echo $cat_id;?>" />
						
						</div>
						<div style="float:right;margin-top:15px;">
						 <!--<a class="js-open-modal btn stylebut"  href="#" data-modal-id="popup1"> Add & Sync</a>-->
						<input type="submit" id-"add-submit"  class="submit"   value="Add&Sync"/>
						
						 </div>
						<br clear="all"	>
						</form>	
						
						</div> <!--sroll end-->
				 	</div>
			</div>	
		<!--Tab end-->
		 
		
   </div>
   
 
 </div>
 <!--right contaner end -->
</div>
 
</div>
<!--Main contaner end -->  



<div id="popup1" class="modal-box">
  <header> 
    <h3>Order Guide Sync</h3>
  </header>
  <div class="modal-body">
    <p>
	Syncing......Done
	</p>
	
	<!-- <div class="progress" role="progressbar" data-goal="-50" aria-valuemin="-100" aria-valuemax="0">
       <div class="progress__bar"></div>
										
     </div>-->
	<!--<form action="<?php echo base_url();?>office" method="post">
	<input type="submit" id="button_go" name="sumit" class="popupbtn" value="Go To Vendors" />
	</form>-->
  </div>
  
  
 

</div>



 <script type="text/javascript" src="<?php echo base_url();?>assets/js/rainbow.min.js"></script>
    <!--<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-asProgress.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function($){
        $('.progress').asProgress({
            'namespace': 'progress'
        });

       $('.progress').asProgress('go',50);
        /*$('.submit').on('click', function(){
             $('.progress').asProgress('go',50);
        });*/
       
    });
    </script>       


<!--<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> -->
<script>
$(function(){

var appendthis =  ("<div class='modal-overlay js-modal-close'></div>");

	$('a[data-modal-id]').click(function(e) {
		e.preventDefault();
    $("body").append(appendthis);
    $(".modal-overlay").fadeTo(500, 0.7);
    //$(".js-modalbox").fadeIn(500);
		var modalBox = $(this).attr('data-modal-id');
		$('#'+modalBox).fadeIn($(this).data());
	});  
  
  
$(".js-modal-close, .modal-overlay").click(function() {
    $(".modal-box, .modal-overlay").fadeOut(500, function() {
        $(".modal-overlay").remove();
    });
 
});
 
$(window).resize(function() {
    $(".modal-box").css({
        top: ($(window).height() - $(".modal-box").outerHeight()) / 2,
        left: ($(window).width() - $(".modal-box").outerWidth()) / 2
    });
});
 
$(window).resize();
 
});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>



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
  

