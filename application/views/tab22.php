<script type="text/javascript">
 $(document).ready(function () { 
     $("#search_vendors123").click(function () { 
   	
	  alert(123);
   	 var input_value= $('#search_text').val();
   
			$.ajax({
				type: "POST", 
				async: false, 
				url: "purveyors/search",   
				data: "input_value="+input_value,
				success: function(data){ 
				test_call();
					$('#inferiz').html(data);
					
				},
				error: function(){alert('error'); 
									
				 }
				});     
	});
	
	
	
	
	
});
</script>
<p>This is a demo of file ajax2.html</p>
<p>Here we have a form that will be submitted to its action URL (ajax2results.html) and results from the server (here in demo we have no server, so we just load static HTML file) will be displayed in hijacked element (tab, dialog etc).</p>
<p>Hijacking forms requires <a class="nohijack" href="http://malsup.com/jquery/form/">jQuery form plugin</a> (link will open in current page and not in hijacked element, because it has <code>nohijack</code> class).</p>
<form id="search_form" action="" method="post">
					 <input type="text" name="search" id="search_text" style="width:300px;height:20px;" />
					 <input type="submit" value="search vendors" name="search_vendors" id="search_vendors" />
					 <div id="inferiz">sasa </div>
					</form>