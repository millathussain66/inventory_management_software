/*jQuery(document).ready(function() {
	jQuery('#ligin').click(function() {	 
		var bValid=true;
		if (bValid) {
			var data = jQuery('#user_login').serialize();   
			jQuery.ajax({
			  url:"home/ajax_login",
			  type: "post",
			  data : data,
			  datatype: "json",
			  success:function(response){
				  //alert(data);
							var json = jQuery.parseJSON(response); 
							if(json.Status=='1')
							{
								if(json.changepasssts=='1')
								{
									window.location = "home/log_success";
									jQuery("#error").hide();
								}
								else
								{
									openpass();
									
									//window.location = "home/change_pass";
									//jQuery("#error").hide();	
								}
							}
							else
							{
								jQuery("#error").show();
								jQuery("#error").fadeOut(11500);
								jQuery("#error").html('<img align="absmiddle" src="'+baseurl+'images/invalid_icon.png" border="0" /> &nbsp;Invalid user id or password');
								return false;
								
							}
						} 
			  
			});
				 
		 }				   
							   
	});
	
	jQuery('#passchange').click(function() {	 
		var bValid=true;
		if (bValid) {
			var data = jQuery('#user_pass_change').serialize();   
			jQuery.ajax({
			  url:"home/ajax_login",
			  type: "post",
			  data : data,
			  datatype: "json",
			  success:function(response){
							var json = jQuery.parseJSON(response); 
							if(json.Status=='1')
							{
								if(json.changepasssts=='1')
								{
									window.location = "home/log_success";
									jQuery("#error").hide();
								}
								else
								{
									window.location = "home/change_pass";
									jQuery("#error").hide();	
								}
							}
							else
							{
								jQuery("#error").show();
								jQuery("#error").html('<img align="absmiddle" src="'+baseurl+'images/invalid_icon.png" border="0" /> &nbsp;Invalid user id or password');
								return false;
								
							}
						} 
			  
			});
				 
		 }				   
							   
	});
		   
});*/