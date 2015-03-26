
<style>

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
  font-size: 4vmin;
  
  color: #333;
  text-decoration: none;
  display: inline;
 
 
}



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

.modal-box { width: 70%; }
}

.modal-box header,
.modal-box .modal-header {
  padding: 1.25em 1.5em;
  border-bottom: 1px solid #ddd;
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

a.close {
  line-height: 1;
  font-size: 1.5em;
  position: absolute;
  top: 5%;
  right: 2%;
  text-decoration: none;
  color: #bbb;
}

a.close:hover {
  color: #222;
  -webkit-transition: color 1s ease;
  -moz-transition: color 1s ease;
  transition: color 1s ease;
}
.success {
 color:#00CC00;
 margin-left:20px;
}

.succMsg {
 color:#00CC00;
 margin-left:20px;
}
fieldset {
padding:10px;
border-radius:4px;
border: 1px solid #cdcdcd;
}

fieldset  input[type="text"] {
margin-top: 6px;
    padding: 5px;
    width: 398px;
	}
.popBtn {
    background-color: #006c00;
    border: 1px solid rgb(139, 131, 131);
    border-radius: 3px;
    color: #ffffff;
    cursor: pointer;
    padding: 3px !important;
}

.saveRow {
 background-color: #006c00;
    border: 1px solid rgb(139, 131, 131);
    border-radius: 3px;
    color: #ffffff;
    cursor: pointer;
    padding: 3px !important;
}	

.editRow {
 background-color: #006c00;
    border: 1px solid rgb(139, 131, 131);
    border-radius: 3px;
    color: #ffffff;
    cursor: pointer;
    padding: 3px !important;
}
</style>

<link rel="stylesheet" href="<?php echo base_url()?>assets/css/stylescroll.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.mCustomScrollbar.css">

<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>

 <script>
$(function() {
$("body").on("click", "#addmore", function() {
    var tr = "<tr><td><select><option> Pretzel Bread</option></select></td><td><input type='text' name='' style='width:40px;' /></td><td>each</td><td>$0.43</td><td>$0.43</td><td>$0.42</td><td>sysco</td><td> <input type='button' class='contatc-menu' value='contact' /></td><td><input type='button' class='removebutton' id='removemore'  value='Delete' /></td></tr>";
	 $('#table').append(tr);
});




});
</script> 

<script>
$(function() {
$("body").on("click", ".saveRow", function() {

 var cat_name=  $(this).closest('tr').find("input.cat_name").val();
 var cat_id=    $(this).closest('tr').find("input.cat_id").val();
 
   $.ajax({
           type: "POST",
           url: '<?php echo base_url();?>testkitchen/ajax_update',
           data: {cat_name:cat_name,cat_id:cat_id}, // serializes the form's elements.
		   cache: false,
           success: function(data)
           { 
               $('.succMsg').html('Update Succesfully!.');
			   $('#tableMenu').html(data);
           }
         });

});
});
</script>


<script>
$(function() {
$("body").on("click", "#send", function() {
  
     $.ajax({
           type: "POST",
           url: '<?php echo base_url();?>testkitchen/ajax_submit',
           data: $("#idForm").serialize(), // serializes the form's elements.
		   cache: false,
           success: function(data)
           {
               $('.success').html('Category successfuly added!.');
			   $('#tableMenu').html(data); 
           }
         });
 });
});
</script>

<script>
$(function() {
 $("body").on("click", ".editRow", function() {
   $(this).closest('tr').find("input.cat_name").css("display", "block");   
   $(this).closest('tr').find("input.saveRow").css("display", "block");
 });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
     $("#row-cost").show();
	 $("#yield-cost").hide();
	 $(".yieldinfo").hide();
    $('input[type="radio"]').click(function(){
            if($(this).attr("value")=="rowcost"){
                $("#row-cost").show();
				 $(".yieldinfo").css("display", "none");
                $("#yield-cost").hide();
         }
		 });
		 
		 $('input[type="radio"]').click(function(){
            if($(this).attr("value")=="yieldcost"){
                $("#yield-cost").show();
				$(".yieldinfo").css("display", "inline-block");
                $("#row-cost").hide();
         }
		 });
});			
</script>
<!--Main contaner start -->
<div id="main_container" >
<!-- left contaner start -->
 <aside id="menu-left">
 	<div class="order_back">
 		<img src="<?php echo base_url();?>assets/images/download_ico.png">
 	   <a>Download File </a> 
	 </div>
	 
	 <div class="order_current">
	  <p>Current Test Kitchen</p>
	  <ul>
	  <li> Turkey Club </li>
	  
	  </ul>
	 </div>
	 
	 <div class="reference">
	 <p>Cost Display <span class="yieldinfo"> <img src="<?php echo base_url();?>assets/images/yield_info.png"> </span> </p>
	  <span> <input type="radio" name="cost" id="first" value="rowcost" checked="checked">Row Cost </span> <br />
	  <span><input type="radio" name="cost" value="yieldcost">Yield Cost </span>
	  <ul>
	   <li id="row-cost">Row cost is showing the ingredient cost without any regard to waste.This is the direct cost per unit from the purveyor you have selected</li>
	    <li id="yield-cost">Yield cost is showing the yield percentage already designated in your grocer list.As an example,if an ingredient is priced at $1.00 and has yield of 90%, the unit cost will be shown as $1.10.</li>
	   
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
 <div id="purveyor_container" class="midcontainer" > 
    <div id="menu-container">
	   <div class="head">
	      <div style="float:left;"> <h1> Test Kitchen </h1> </div>
		  <div style="float:left;">
		     
		   </div>
		  <div style="float:right;margin:12px;">
		  <div style="display:inline-block;margin-top:-4px;"> <img src="<?php echo base_url();?>assets/images/recipe-ico.png" /> </div>
		   <span class="recipe"> <a class="js-open-modal btn" href="#" data-modal-id="popup1"> Add Recipe </a></span>
		   </div>
	   </div>
	  
	  <div class="content mCustomScrollbar"> <!--scroll -->
	  
	   <!-- menu sub -->
	   <div class="menu-sub">
	       <div class="sub-head">
	          <h1>Turkey Club </h1>
		   </div>
		   
		   <div class="menu-innercontent" >
		       <table id="table" border="0" cellpadding="3" cellspacing="10">
			     <tr > <th> </th> <th> </th> <th></th> <th> </th> <th> </th> <th></th>  <th></th> <th></th> <th></th>  </tr>
				 
				 <tr>
				 <td>
				     <div class="styled-select">
				     <select>
					   <option> Pretzel Bread</option>
					 </select>
					 </div>
				 </td>
				 <td>
				    <input type="text" name="" style="width:40px;" />
				 </td>
				 <td>
				 each
				 </td>
				  <td>
				 $0.43
				 </td>
				  <td>
				 $0.43
				 </td>
				 
				  <td>
				 $0.42
				 </td>
				  <td>
				   Sysco
				 </td>
				  <td>
				  <input type="button" class="contatc-menu" value="contact" />
				 </td>
				 </tr>
				 
				
				 
			   </table>
			   <input type="button" id="addmore"  value="+" />Add another ingredient
		   </div>
		   
		   <div class="sub-content">
		       <div style="float:left;">
			     <table style="width:250px;" border="0" cellpadding="8" cellspacing="20">
				   <tr>
				   <td>
				   <div class="styled-select">
				      <select>
					  <option> Sandwiches </option>
					  </select>
				  </div>	  
				  </td>
				   <td> <input type="submit" class="menu-update" value="Update" /> </td>
				   </tr>
				   <tr>
				   
				   <td colspan="2" > 
				   <div style="float:left;"><img src="<?php echo base_url();?>assets/images/menu-info.png" /> </div>
				    <div style="float:left;margin-left: 46px;margin-top: -31px;">
					To update the category,simply select the category in the drop down and select "update"
					</div>
					</td>
				   </td>
				   </tr>
				 </table>
			  </div>
			  
			  <div style="float:right;">
			    <table  border="0" cellpadding="8" cellspacing="20">
				   <tr>
				   <td> COGS </td>
				   <td> $1.34 </td>
				   <td> $1.21 </td>
				   </tr>
				  <tr>
				   <td> COGS </td>
				   <td> $1.34 </td>
				   <td> $1.21 </td>
				   </tr>
				 </table>
			  </div>
			 <br clear="all">
		   </div>
		   
		   
		    <div style="float:right;">
			<input type="submit" class="kitchen-button-save" value="Save to Test Kitchen" />
	         <input type="submit" class="kitchen-button" value="Add To Menu" />
	        </div>
			 <br clear="all">
	   </div>
	   
	  
	  
	</div>
	 
	 </div> <!--sroll end-->
	
 </div>
 <!--right contaner end -->
 
</div>
 
</div>
<!--Main contaner end -->  


<div id="popup1" class="modal-box">
  <header> 
    <h3>Add Category</h3>
	
  </header>
  <div class="success">  </div>
  <div class="modal-body">
    <p>
	<fieldset>
	<legend> Add Category</legend>
	<form action="" id="idForm" method="post">
	<label>Category Name: <span>*</span></label>
    <input type="text" name="cat_name" id="cat_name" placeholder="Category Name"/> <br />  <br />
	<span style="margin-left:100px;"><input class="popBtn" type="button" id="send" value="Add"/> </span>
	</form>
	</fieldset>
	</p>
	<p>
	 <header>
	 <h3>Category List</h3>
	 </header>
	 <div class="succMsg">  </div>
	  <table id="tableMenu" border="0" cellpadding="4" cellspacing="5">
	  <tr><th> Sl.No </th><th> Category </th> <th> </th> <th></th> <th> Action </th></tr>
	   <?php $i=1;
	  foreach($result as $re) { ?>
	  <tr> <td> <?php echo $i;?> </td> <td> <?php echo $re->cat_name;?> </td>
	   <td >
	    <input type="text" class="cat_name" name="cat_name[]" style="display:none;" value="<?php echo $re->cat_name; ?>" />
		<input type="hidden" class="cat_id" name="cat_id[]" value="<?php echo $re->cat_id; ?>" />
		</td> 
		<td><input type="button" class="saveRow" value="Update" style="display:none;" />
		</td>
	    <td> <input type="button" value="Edit" class="editRow" /> </td> </tr>
	   <?php $i++; } ?>
	  </table>
	
	</p>
  </div>
  <footer> <a href="#" class="btn btn-small js-modal-close">Close</a> </footer>
</div>


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



