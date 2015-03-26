<link rel="stylesheet" href="<?php echo base_url()?>assets/css/stylescroll.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.mCustomScrollbarGrocery.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
<script src="<?php echo base_url()?>assets/js/jquery-1.11.1.min.js"></script>

<!-- start search-->
<script type="text/javascript">
$(document).ready(function () { 
  //$("#grosslist").hide();
  
  $("#search_vendors").click(function () { 
   	
   	 var input_value= $('#search_text').val();
       
			$.ajax({
				type: "POST", 
				async: false,
				dataType: "html", 
				url: "<?php echo base_url();?>purveyors/ajax_search",   
				data: "input_value="+input_value,
				success: function(data){ 

					$('#inferiz').html(data);
					
					//$('#grosslist').fadeIn(200).show();
				},
				error: function(){alert('error');}
				});     
	});
});
</script>
<!--end search -->


<script>
$(function() {
	$('#minitab').on('click', 'li', function() {
    $('#tablist li.active').removeClass('active');
    $(this).addClass('active');
});
});
</script>
<!--$("body").on("click", ".removebutton", function() {-->
<script>
$(document).ready(function(){

/*$("body").on('change','tr select', function(){
var attribute_val=$(this).val();
//alert(attribute_val);
tr_id=$(this).parents('tr').attr('id');

$("#"+tr_id+" .psp_pack").html('hii');
});*/

$("body").on('change','tr select', function(){	
  tr_id=$(this).parents('tr').attr('id');

  var gross_pack =  $(this).closest('tr').find("input.size").val();
  //var gross_size =  parseFloat($(this).closest('tr').find('input.gross_size').val())
  //alert(gross_pack);
  //var total_pack = gross_pack * gross_size 
  
   var csv_id = $(this).val();
   //alert(csv_id);
     $.ajax({
			url: '<?php echo base_url();?>purveyors/ajax_purveyordata',
			type:'POST',
			dataType: 'json',
			async:false,
			data: {csv_id: csv_id},
			success: function(data){ 
			    $(this).closest('tr').find("td.psp_pack").html('');
			    $(this).closest('tr').find("td.psp_size").html('');
				$(this).closest('tr').find("td.psp_unit").html('');
			    $res =  data[0].pack;
				$res1 =  data[0].size;
				$ressize = data[0].size;
				$resunit =  data[0].unit;
				$hidden_price = data[0].price;
				
				if(isNaN($res1)) { 
					$res1 = 1;
					$f = data[0].pack * $res1;
					}
				else {
				     $f = data[0].pack * parseFloat(data[0].size);
				     }	
				
				   $total = gross_pack/$f;
				
				  $("#"+tr_id+" .psp_pack").html($res);
				  $("#"+tr_id+" .psp_size").html($ressize);
				  $("#"+tr_id+" .psp_unit").html($resunit);
				  $("#"+tr_id+" .factor").val($total);
				  $("#"+tr_id+" .hiddenprice").val($hidden_price);
				  
				  $("#"+tr_id+" .purchase_pack").val($res);
				  $("#"+tr_id+" .purchase_size").val(data[0].size);
				  $("#"+tr_id+" .purchase_unit").val($resunit);
				
				 //$(this).closest('tr').find("td.psp_size").append($res1);				  
			} 
		}); 
  
 });

});	   
</script>

<!--<script>
	$(document).ready(function(){
	
	    $(document).on("click","#table td",function(e){ 
		//$(this).closest('td.grosspack').show();
		$(document).on('change','.itemname', function(){
         $(this).closest('tr').find(".grosspack").show();
		});
		
		
		// $(".grosspack").show();
        var total_pack =  $(this).closest('tr').find("input.gross_pack").val() * parseFloat($(this).closest('tr').find('input.gross_size').val());
		
			var column_num = parseInt( $(this).index() ) + 1;
			var row_num = parseInt( $(this).parent().index() )+1;	 
            var bid = $(this).closest('td').val();
			
			 
			 var new_pack =  $(this).closest('tr').find("input.pack").val() * parseFloat($(this).closest('tr').find('input.size').val());
			 //alert(new_pack); 
			 var factor_pack =  (total_pack / new_pack);
			
			  parseFloat($(this).closest('tr').find("input.factor").val(total_pack / new_pack));
			
			  //if($(this).closest('tr').find("input.price").val() !='') {
			  
			  //}
			 if(bid == "") {
			 $(this).closest('tr').find("input").prop('required',true);
			 $(this).closest('tr').find("select").prop('required',true);
			/*  $(this).css({
                    "border": "1px solid red",
                    "background": "#FFCECE"
                });*/
			 }
			

			//$("#result").html( "Row_num =" + row_num + "  ,  Column_num ="+ column_num );   
		});
		
	});
</script>-->



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
							<li ><a href="<?php echo base_url();?>purveyors/manage">Manage</a></li>
							<li  class="active"><a href="<?php echo base_url();?>purveyors/search">Search</a></li>
							<li><a href="<?php echo base_url();?>purveyors/addnew">Add New</a></li>
						</ul>
				 </div>
				 <div class="mini-tab-1" >
				 		<div id="tab_manage" class="tb-backgorund"><!--common  -->
							<p>
								 <form id="search_form" action="" method="post">
								 <input type="text" name="search" id="search_text" style="width:300px;height:23px;" required/>
								 <input type="button" value="search vendors" name="search_vendors" id="search_vendors" />
								</form>

								<div id="inferiz"> </div>

								<!--<table id="table">
								<tr><td>dsd</td><td>ddddfd</td></tr>
								</table>-->
							</p>
						</div>	
				 </div>
			</div>	
  	 </div> <!--end test container-->

  </div> <!--right contaner end -->
 
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
  
       
       



