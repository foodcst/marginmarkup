<link rel="stylesheet" href="<?php echo base_url();?>assets/ui/css/smoothness/jquery-ui-1.7.custom.css" />
<script type="text/javascript" src="<?php echo base_url();?>assets/ui/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/ui/js/jquery-ui-1.7.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/ui/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/ui/jquery.hijack.min.js"></script>

<script type="text/javascript">
 $(document).ready(function () { 
     $("#search_vendors").click(function () {  
   	  
   	 var input_value= $('#search_text').val();
  
			$.ajax({
				type: "POST", 
				async: false, 
				url: "<?php echo base_url();?>purveyors/search",   
				data: "input_value="+input_value,
				success: function(data){ 
				test_call();
					$('#inferiz').html(data);
					
				},
				error: function(){alert('error'); 
				
				
					
				 }
				});     
	});
	function test_call() { 
	
  //$("#tabs").tabs("select", $(".ui-tabs-nav").children().size() - 1);
 
  }
	
});
</script>


<!--<script type="text/javascript">
    var selected_tab = 1;
    $(function () {
        var tabs = $("#tabs").tabs({
            select: function (e, i) {
                selected_tab = i.index;
				
            }
        });
        selected_tab = $("[id$=selected_tab]").val() != "" ? parseInt($("[id$=selected_tab]").val()) : 0;
        tabs.tabs('select', selected_tab);
		
        $("form").submit(function () {
            $("[id$=selected_tab]").val(selected_tab);
			alert(selected_tab);
			
        });
    });
   
</script>-->


<div id="tabs">
<ul>
<li><a href="#tabs-1" id="1">1 - Hijack links</a></li>
	<li><a href="#tabs-2" id="2">2 - Hijack forms</a></li>
<li><a href="#tabs-3" id="3">3 - Hijack forms</a></li>
</ul>

<div id="tabs-1">
<p>first
					
</p>
</div>
<div id="tabs-2">
<p>secod
					
</p>
</div>


<div id="tabs-3">
<p><form  id="search_form" action="tab" method="post">

					 <input type="text" name="search" id="search_text" style="width:300px;height:20px;" />
					 <input type="submit" value="search vendors" name="search_vendors" id="search_vendors" />
					 <div id="inferiz">sasa </div>
					</form>
					<?php //$this->load->view('tab22');?>
					
</p>
</div>






</div>



<script type="text/javascript">
$(function() {

    // with hijack()
    $("#tabs").tabs({ // start jQuery UI tabs
        load: function(event, ui) { // load callback, hijacking every loaded panel
            $(ui.panel).hijack();
        }
    });

   
});
</script>


<!--<div id="tabs">
<ul>
<li><a href="#tabs-1" id="1">Tab 1</a></li>
<li><a href="#tabs-2" id="2">Tab 2</a></li>
<li><a href="#tabs-3" id="3">Tab 3</a></li>
</ul>
<div id="tabs-1">
<p>Tab 1 content</p>
</div>
<div id="tabs-2">
<p><form id="search_form" action="" method="post">
					 <input type="text" name="search" id="search_text" style="width:300px;height:20px;" />
					 <input type="submit" value="search vendors" name="search_vendors" id="search_vendors" />
					 <div id="inferiz">sasa </div>
					</form>
					
</p>
</div>
<div id="tabs-3">
<p>Tab 3 content</p>
</div>
</div>-->