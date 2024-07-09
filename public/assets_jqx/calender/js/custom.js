$().ready(function() {	
	

	
	$("#sp_rec_edit_show_btn").click( function() {		
			var baseURLll=$("#baseURLll").val();
			if($("#BB_ref_no_edit").val()==0){
				 document.getElementById("Error_Message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color: #FF0000; font-weight:bold;">Please Select Bangladesh Bank Reference No.</span>';	
				 $("#BB_ref_no_edit").focus();				 
				 return (false);
			 }else{		
			$("#sp_receive_Form_change").submit();
			 }
	});
	$("#sp_rec_verify_show_btn").click( function() {		
			var baseURLll=$("#baseURLll").val();
			if($("#BB_ref_no_edit").val()==0){
				 document.getElementById("Error_Message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color: #FF0000; font-weight:bold;">Please Select Bangladesh Bank Reference No.</span>';	
				 $("#BB_ref_no_edit").focus();				 
				 return (false);
			 }else{		
			$("#sp_receive_Form_change").submit();
			 }
	});
	
	
	$("#stbranchcom").change( function() {		
		var head_office_id=$("#stbranchcom").val();
		if (head_office_id==1){
			$("#stdivisioncom").attr("disabled","");
			$("#sltDivisionId").attr("enabled","enabled");
			$("#sltDivisionId").focus();
		}
		else{
			$("#stdivisioncom").attr("enabled","");
			$("#stdivisioncom").attr("disabled","disabled");
			document.getElementById("stdivisioncom").options[0].selected=true;
			$("#stdivisioncom").focus();
		}	
	});	
	
	
	
	
	
	$("#categoryName").change( function() {		
		$("#view_interest_rate_history").submit();
	});
	$("#Commission").click( function() {
		//alert($("#categoryName").val());
		if($("#categoryName").val() == 0)
			{
				alert("Please Select Category");
				$("#categoryName").focus();
				return false;				
			}
		else 	
		$("#view_commission_history").submit();
	});

	$("#categoryName").change( function() {		
		$("#edit_rate_form").submit();
	});
	$("#categoryName").change( function() {		
		$("#edit_rate_form").submit();
	});
	$("#categoryName").change( function() {		
		$("#update_interest").submit();
	});
	$("#categoryName").change( function() {		
		$("#edit_denomination_form").submit();
	});
	$("#categoryName").change( function() {		
		$("#delete_denomination_form").submit();
	});
	
	
	$("#Application_form_add").submit( function() {
		var error_chck = 0; var countTotal = document.userf.countTotal.value;  
		  var baseURLll = $("#baseURLll").val();
		  var frm = document.userf; var  c = 0;
		  for(i=0;i< frm.length;i++){
			  e=frm.elements[i];
			  if ( e.type=='checkbox' && e.name.indexOf('chkBoxSelect') != -1){
				if(e.checked== false){c++;
				var chk2=e.value;
				var tigg2='txtQuantity'+chk2;	
				document.getElementById(tigg2).style.border="1px solid #a0a0a0";
				//document.getElementById(tigg2).value='';
				}					
			  }
			  else{ continue;}							
		  }		
			 if(countTotal==c && c != 0){
				 document.getElementById("username_error_show").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> Please select at least one';				
				 return (false);
			 }				
				var focus_first='';
				for(i=0;i< frm.length;i++){	e=frm.elements[i];	  	
					if (e.type=='checkbox' && e.name.indexOf('chkBoxSelect') != -1){					
						if(e.checked== true){
							var chk=e.value;
							var tigg='txtQuantity'+chk;					
							if(document.getElementById(tigg).value==''){
								document.getElementById("username_error_show").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> Please enter the Quantity value';
								
								if(focus_first==''){focus_first=tigg;}
								document.getElementById(tigg).style.border="1px solid red";
								error_chck =1;							
							}
							else if(document.getElementById(tigg).value==0){
								document.getElementById("username_error_show").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> Zero (0) is not a valid Quantity input';
								
								if(focus_first==''){focus_first=tigg;}
								document.getElementById(tigg).style.border="1px solid red";
								error_chck =1;							
							}
							else{document.getElementById(tigg).style.border="1px solid #a0a0a0"; continue;}								
						}
						else if(e.checked== false){
							var chk=e.value;
							var tigg='txtQuantity'+chk;					
							if(document.getElementById(tigg).value!=''){
								document.getElementById("username_error_show").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> Please check correspondence checkbox';
								document.getElementById(tigg).style.border="1px solid red";								
								if(focus_first==''){focus_first=tigg;}
								//document.getElementById(tigg).focus();
								error_chck =1;							
							}
							else{document.getElementById(tigg).style.border="1px solid #a0a0a0"; continue;}								
						}
					}
					else{ continue;}
				
					
			}
			 
			if(error_chck ==1){ 
			document.getElementById(focus_first).focus();
			return (false);	} else if(error_chck =0){ return (true);}
	});
	
	
	$("#edit_ref_Form").submit( function() {
		if($("#ref_No_id").val()==''){ 
		document.getElementById("ref_No_id").style.border="1px solid red";		
		var baseURLll = $("#baseURLll").val();
		document.getElementById("username_error_show").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> Please Enter Application Reference No.';
		$("#ref_No_id").focus();
		return false
		}
	});	
	
	
	$("#App_edit_form").submit(function() {
		var baseURLll=$("#baseURLll").val();
		if ($("#countTotal").val() >0) {
		var status=true;
		var chk_denom_id="";
		var i=0;
		var c=1;
		var focus_first='';
		for (var i=1;i<$("#countTotal").val();i++){
					chk_denom_id="#chkBoxSelect_"+i;
					if ($(chk_denom_id).attr("checked") == true){						
						if ( $("#txtQuantity_"+i).val()==""){
							document.getElementById("txtQuantity_"+i).style.border="1px solid red";	
							document.getElementById("Showerror_edit_app_view").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color: #FF0000; font-weight:bold;"> Please enter the Quantity value</span>';
							//$("#txtQuantity_"+i).focus();
							if(focus_first==''){focus_first=$("#txtQuantity_"+i);}
							status=false;
						}
						else if ($("#txtQuantity_"+i).val()==0){
							document.getElementById("txtQuantity_"+i).style.border="1px solid red";	
							document.getElementById("Showerror_edit_app_view").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color: #FF0000; font-weight:bold;"> Zero (0) is not a valid Quantity input</span>';
							//$("#txtQuantity_"+i).focus();
							if(focus_first==''){focus_first=$("#txtQuantity_"+i);}
							status=false;
						}
						else{document.getElementById("txtQuantity_"+i).style.border="1px solid #a0a0a0";}
					}
					else if ($(chk_denom_id).attr("checked") == false){						
						if ($("#txtQuantity_"+i).val()!=""){
							document.getElementById("txtQuantity_"+i).style.border="1px solid red";
							document.getElementById("Showerror_edit_app_view").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color: #FF0000; font-weight:bold;"> Please check correspondence checkbox</span>';
							if(focus_first==''){focus_first=$("#txtQuantity_"+i);}
							//$("#txtQuantity_"+i).focus();
							status=false;
						}
						else{document.getElementById("txtQuantity_"+i).style.border="1px solid #a0a0a0";}
					}
					if ($(chk_denom_id).attr("checked") == false){					
						//document.getElementById("txtQuantity_"+i).style.border="1px solid black";
						//document.getElementById("txtQuantity_"+i).value='';
						c++;
					}
		}
		if (status==false){	
		focus_first.focus();
		return false;}	
		
		
		if($("#countTotal").val()==c && c != 1){
				 document.getElementById("Showerror_edit_app_view").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color: #FF0000; font-weight:bold;"> Please check at least one checkbox</span>';				
				 return (false);
		}
      }
      return true;
    });

	$("#App_verify_form").submit( function() {
		var baseURLll=$("#baseURLll").val();
		var countTotal=$("#countTotal").val();
		var focus_first='';
		var c=1;
		for(i=1;i<countTotal;i++){
			if ($("#txtmessage_"+i).val()==""){
				if(focus_first==''){focus_first=$("#txtmessage_"+i);}
			c++;
			}			
		}
		if(c==countTotal && c!=1) {
			document.getElementById("verify_con_msgg").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color: #FF0000; font-weight:bold;"> Please enter message</span>';
			focus_first.focus();
			return false;
		}
		
	});
	
	
	
	$("#show_uniq_delete").click( function() {
		var baseURLll=$("#baseURLll").val();
		var orrrd=$("#orrrd_").val();
		if($("#ref_No_id").val()==""){
			document.getElementById("ref_No_id").style.border="1px solid red";
			var baseURLll = $("#baseURLll").val();
			document.getElementById("username_error_show").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> Please Enter Application Reference No.';
			$("#ref_No_id").focus();
			return false;
		}
		else{
			var ref_No_idd="";
			var ref_No_id_array=new Array();
			var aPosition=$("#ref_No_id").val().indexOf("/");
			if (aPosition>0){
				ref_No_id_array=$("#ref_No_id").val().split("/");
				var i;
				var ref_No_idd="";
				for (i=0;i<ref_No_id_array.length;i++){
					if (ref_No_idd==""){
						ref_No_idd=ref_No_id_array[i];
					}
					else{
						ref_No_idd += "_" + ref_No_id_array[i];
					}
				}
			}
			else {
				ref_No_idd=$("#ref_No_id").val();
			}	
			window.location.href = baseURLll+"index.php/stock_receive/delete/"+orrrd+"/"+ref_No_idd+"/";
		}
	});
	
	
	
	$("#show_all_delete").click( function() {
		var baseURLll=$("#baseURLll").val();
		var orrrd=$("#orrrd_").val();
		window.location.href = baseURLll+"index.php/stock_receive/delete/"+orrrd+"/all/";							
	});
	
	$("#delete_ref_Form").submit(function() {
		var baseURLll=$("#baseURLll").val();
		if ($("#countTotal").val() >1) {
		var status=true;  
		var chk_denom_id="";
		var i=0;
		var c=1;
			for (i=1;i<$("#countTotal").val();i++){
					var status2=true;
					chk_denom_id="#chkBoxSelect_"+i;
					if ($(chk_denom_id).attr("checked") == false){												
					status=false; status2=false;
					c++;
					}					
					if (status2==false){						
						document.getElementById("chkBoxSelect_"+i).style.border="1px solid red";						
						document.getElementById("username_error_show").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please select atleast one checkbox</span>';
						//return false;
					}
					
			}
			if ($("#countTotal").val()==c && c!=1){						
				return false;
			}
			else{
				for (j=1;j<$("#countTotal").val();j++){
					document.getElementById("chkBoxSelect_"+j).style.border="1px solid black";						
					document.getElementById("username_error_show").innerHTML='';
				}
			}
		
      	}
     if(status2==true){ if(deleteItem('Are you sure want to delete?')==false){ return false; } }
    });	
	
	$("#show_uniq_search").click( function() {
		var baseURLll=$("#baseURLll").val();
		var orrrd=$("#orrrd_").val();
		if($("#ref_No_id").val()==""){
			document.getElementById("ref_No_id").style.border="1px solid red";
			document.getElementById("show_uniq_search_msg").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please Enter Application Reference No.</span>';
			$("#ref_No_id").focus();
			return false;
		}
		else{
			var ref_No_idd="";
			var ref_No_id_array=new Array();
			var aPosition=$("#ref_No_id").val().indexOf("/");
			if (aPosition>0){
				ref_No_id_array=$("#ref_No_id").val().split("/");
				var i;
				var ref_No_idd="";
				for (i=0;i<ref_No_id_array.length;i++){
					if (ref_No_idd==""){
						ref_No_idd=ref_No_id_array[i];
					}
					else{
						ref_No_idd += "_" + ref_No_id_array[i];
					}
				}
			}
			else {
				ref_No_idd=$("#ref_No_id").val();
			}	
			window.location.href = baseURLll+"index.php/stock_receive/search/"+orrrd+"/"+ref_No_idd+"/";
		}
	});
	
	$("#show_all_search").click( function() {
		var baseURLll=$("#baseURLll").val();
		var orrrd=$("#orrrd_").val();
		window.location.href = baseURLll+"index.php/stock_receive/search/"+orrrd+"/all/";							
	});
	
	$("#show_sp_receive_id").click( function() {
	var baseURLll=$("#baseURLll").val();
	var orrrd=$("#orrrd_").val();
	
	if($("#AppRef_year_id").val()==""){
		document.getElementById("AppRef_year_id").style.border="1px solid red";			
		$("#stoc_receive_error_message").empty();
		$("#stoc_receive_error_message").append('<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span id="stoc_receive_error_message" style="color: #FF0000; font-weight:bold;">Please Enter Application Reference No.</span>');
		$("#AppRef_year_id").focus();
		return false;
	}
	else if($("#txtSlNo_id").val()==""){			
		document.getElementById("txtSlNo_id").style.border="1px solid red";
		$("#stoc_receive_error_message").empty();
		$("#stoc_receive_error_message").append('<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span id="stoc_receive_error_message" style="color: #FF0000; font-weight:bold;">Please Enter Application Reference No.</span>');
		$("#txtSlNo_id").focus();
		return false;
	}		
	else{
		document.getElementById("AppRef_year_id").style.border="1px solid #a0a0a0";
		document.getElementById("txtSlNo_id").style.border="1px solid #a0a0a0";
		var orrrd=$("#orrrd_").val();
		var ref_formate=$("#formate_1_id").val()+$("#AppRef_year_id").val()+"_"+$("#txtSlNo_id").val();				
		window.location.href = baseURLll+"index.php/stock_receive/sp_receive/"+orrrd+"/"+ref_formate+"/";
	}});
		/*Submit receive Shanchay-Patra Start*/
		$("#sp_receive_Form").submit(function() {
		var baseURLll=$("#baseURLll").val();
		if ($("#countTotal").val() >1) {
		var status=true;  
		var chk_denom_id="";
		var i=0;
		var c=1; var inner=0;
		var k=0;	
			
			for (j=1;j<$("#countTotal").val();j++){					
					var chk_denom_id22="#chkBoxSelect_"+j;
					if ($(chk_denom_id22).attr("checked") == false){
					document.getElementById("chkBoxSelect_"+j).style.border="1px solid red";
					}
					if($(chk_denom_id22).attr("checked") == true){ k=1;}					
			}
			for (f=1;f<$("#countTotal").val();f++){					
				if(k==1){document.getElementById("chkBoxSelect_"+f).style.border="1px solid #a0a0a0";}
			}
			
			
			for (i=1;i<$("#countTotal").val();i++){
					var status2=true;
					chk_denom_id="#chkBoxSelect_"+i;
					if ($(chk_denom_id).attr("checked") == false){
						document.getElementById("txtReceiveQuantity_"+i).style.border="1px solid #a0a0a0";
						document.getElementById("titleSpFrom_"+i).style.border="1px solid #a0a0a0";
						document.getElementById("txtSpFrom_"+i).style.border="1px solid #a0a0a0";
						document.getElementById("txtSpTo_"+i).style.border="1px solid #a0a0a0";
						
						
						if (($("#txtReceiveQuantity_"+i).val() != '' || $("#titleSpFrom_"+i).val() != '' || 
							$("#titleSpFrom_"+i).val() != '' || $("#txtSpTo_"+i).val() != '') && $(chk_denom_id).attr("checked") == false){	
								document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please check correspondence checkbox</span>';
								document.getElementById("chkBoxSelect_"+i).style.border="1px solid red";
								$("#chkBoxSelect_"+i).focus();
								return false;							
							}
						
						
						//document.getElementById("txtReceiveQuantity_"+i).value='';
						//document.getElementById("titleSpFrom_"+i).value='';
						//document.getElementById("txtSpFrom_"+i).value='';
						//document.getElementById("txtSpTo_"+i).value='';
					status=false; status2=false;
					c++;
					}
					if ($(chk_denom_id).attr("checked") == true){
						document.getElementById("chkBoxSelect_"+i).style.border="1px solid #a0a0a0";
						if ($("#txtReceiveQuantity_"+i).val() == ''){
							inner++;
							document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please Enter Receive Quantity</span>';							
							document.getElementById("txtReceiveQuantity_"+i).style.border="1px solid red";
							$("#txtReceiveQuantity_"+i).focus();
							return false;
									
						}else{document.getElementById("txtReceiveQuantity_"+i).style.border="1px solid #a0a0a0";}		
						if ($("#titleSpFrom_"+i).val() == ''){
							inner++;	
							document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please Enter Script Title</span>';							
							document.getElementById("titleSpFrom_"+i).style.border="1px solid red";
							$("#titleSpFrom_"+i).focus();
							return false;
									
							
						}else{document.getElementById("titleSpFrom_"+i).style.border="1px solid #a0a0a0";}	
						if ($("#txtSpFrom_"+i).val() == ''){
							inner++;	
							document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please Enter Script Starting No.</span>';							
							document.getElementById("txtSpFrom_"+i).style.border="1px solid red";
							$("#txtSpFrom_"+i).focus();
							return false;						
						}else{document.getElementById("txtSpFrom_"+i).style.border="1px solid #a0a0a0";}	
						if ($("#txtSpTo_"+i).val() == ''){
							inner++;	
							document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please Enter Script Last No.</span>';							
							document.getElementById("txtSpTo_"+i).style.border="1px solid red";
							$("#txtSpTo_"+i).focus();
							return false;						
						}else{document.getElementById("txtSpTo_"+i).style.border="1px solid #a0a0a0";}
							
							if($("#txtReceiveQuantity_"+i).val() != ''){
								if(parseInt($("#AppliQuanty_"+i).val())<parseInt($("#txtReceiveQuantity_"+i).val())){
									document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Receive Quantity should not be greater than Applied Quantity</span>';				
									
									$("#txtReceiveQuantity_"+i).focus();
									return false;
								}
							}							
							if ($("#txtReceiveQuantity_"+i).val() != '' && $("#titleSpFrom_"+i).val() != '' &&  $("#titleSpFrom_"+i).val() != ''){					
								var dif=0;
								
								if($("#txtSpTo_"+i).val()<$("#txtSpFrom_"+i).val()){
									document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">SP No. To value should not be less than from value</span>';
									
									$("#txtSpTo_"+i).focus();
									return false;
								} 
								dif=(($("#txtSpTo_"+i).val())*1-$("#txtSpFrom_"+i).val()*1)*1+1;								
								if(parseInt($("#txtReceiveQuantity_"+i).val())!=dif) {
									document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Receive Quantity mismatch</span>';									
									$("#txtSpFrom_"+i).focus();
									return false;
								}
							}
							
					}							
			}
			
			if ($("#countTotal").val()==c && c!=1){
				document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please select atleast one checkbox</span>';
				return false;
			}else{document.getElementById("stoc_receive_error_message").innerHTML='';}
			if(inner!=0){
				
				return false;}
		
		}
		      	
		if($("#bbRf").val()==""){
			document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please Enter Bangladesh Bank Ref. No.</span>';			
			$("#bbRf").focus();
			return false;
		}
		if($("#sltRecBy").val() == 0) {		
			document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please Select Received By</span>';
			
			$("#sltRecBy").focus();
			$("#sltRecBy").select();			
			return false;
		}
		if($("#txtYr").val()==""){
			document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please Enter Received Date</span>';
			
			$("#txtYr").focus();
			return false;
		}
		else if (isDate($("#txtYr").val())==false){
		$("#txtYr").focus();
		$("#txtYr").select();
        return false;
     	}
		else if ($("#txtYr").val()!=""){
			//alert(birth_DATE_CHEK($("#txtYr").val(), $("#currentDate").val(), 1));
				if(birth_DATE_CHEK($("#txtYr").val(), $("#currentDate").val(), 1)>0){  
				document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Received Date should not be any advance date</span>';
				$("#txtYr").focus();
				$("#txtYr").select();
				return false;
				}
		}
		
	  	return true;
   		});
	// end add receive	
	/*Submit receive Shanchay-Patra Start*/
		$("#sp_receive_Form_edit_view").submit(function() {		
		var baseURLll=$("#baseURLll").val();
		if ($("#countTotal").val() >1) {
		var status=true;  
		var chk_denom_id="";
		var i=0;
		var c=1; var inner=0;
		var k=0;	
			
			for (j=1;j<$("#countTotal").val();j++){					
					var chk_denom_id22="#chkBoxSelect_"+j;
					if ($(chk_denom_id22).attr("checked") == false){
					document.getElementById("chkBoxSelect_"+j).style.border="1px solid red";
					}
					if($(chk_denom_id22).attr("checked") == true){ k=1;}					
			}
			for (f=1;f<$("#countTotal").val();f++){					
				if(k==1){document.getElementById("chkBoxSelect_"+f).style.border="1px solid #a0a0a0";}
			}
			
			
			for (i=1;i<$("#countTotal").val();i++){
					var status2=true;
					chk_denom_id="#chkBoxSelect_"+i;
					if ($(chk_denom_id).attr("checked") == false){
						document.getElementById("txtReceiveQuantity_"+i).style.border="1px solid #a0a0a0";
						document.getElementById("titleSpFrom_"+i).style.border="1px solid #a0a0a0";
						document.getElementById("txtSpFrom_"+i).style.border="1px solid #a0a0a0";
						document.getElementById("txtSpTo_"+i).style.border="1px solid #a0a0a0";
						
						
						if (($("#txtReceiveQuantity_"+i).val() != '' || $("#titleSpFrom_"+i).val() != '' || 
							$("#titleSpFrom_"+i).val() != '' || $("#txtSpTo_"+i).val() != '') && $(chk_denom_id).attr("checked") == false){	
								document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please check correspondence checkbox</span>';
								document.getElementById("chkBoxSelect_"+i).style.border="1px solid red";
								$("#chkBoxSelect_"+i).focus();
								return false;							
							}
						
						
						//document.getElementById("txtReceiveQuantity_"+i).value='';
						//document.getElementById("titleSpFrom_"+i).value='';
						//document.getElementById("txtSpFrom_"+i).value='';
						//document.getElementById("txtSpTo_"+i).value='';
					status=false; status2=false;
					c++;
					}
					if ($(chk_denom_id).attr("checked") == true){
						document.getElementById("chkBoxSelect_"+i).style.border="1px solid #a0a0a0";
						if ($("#txtReceiveQuantity_"+i).val() == ''){
							inner++;
							document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please Enter Applied Quantity</span>';							
							document.getElementById("txtReceiveQuantity_"+i).style.border="1px solid red";
							$("#txtReceiveQuantity_"+i).focus();
							return false;
									
						}else{document.getElementById("txtReceiveQuantity_"+i).style.border="1px solid #a0a0a0";}		
						if ($("#titleSpFrom_"+i).val() == ''){
							inner++;	
							document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please Enter Script Title</span>';							
							document.getElementById("titleSpFrom_"+i).style.border="1px solid red";
							$("#titleSpFrom_"+i).focus();
							return false;
									
							
						}else{document.getElementById("titleSpFrom_"+i).style.border="1px solid #a0a0a0";}	
						if ($("#txtSpFrom_"+i).val() == ''){
							inner++;	
							document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please Enter Script Starting No.</span>';							
							document.getElementById("txtSpFrom_"+i).style.border="1px solid red";
							$("#txtSpFrom_"+i).focus();
							return false;						
						}else{document.getElementById("txtSpFrom_"+i).style.border="1px solid #a0a0a0";}	
						if ($("#txtSpTo_"+i).val() == ''){
							inner++;	
							document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please Enter Script Last No.</span>';							
							document.getElementById("txtSpTo_"+i).style.border="1px solid red";
							$("#txtSpTo_"+i).focus();
							return false;						
						}else{document.getElementById("txtSpTo_"+i).style.border="1px solid #a0a0a0";}
							
							if($("#txtReceiveQuantity_"+i).val() != ''){
								if(parseInt($("#AppliQuanty_"+i).val())<parseInt($("#txtReceiveQuantity_"+i).val())){
									document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Receive Quantity should not be greater than Applied Quantity</span>';				
									
									$("#txtReceiveQuantity_"+i).focus();
									return false;
								}
							}							
							if ($("#txtReceiveQuantity_"+i).val() != '' && $("#titleSpFrom_"+i).val() != '' &&  $("#titleSpFrom_"+i).val() != ''){					var dif=0;
								if($("#txtSpTo_"+i).val()<$("#txtSpFrom_"+i).val()){
									document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">SP No. To value should not be less than from value</span>';
									
									$("#txtSpTo_"+i).focus();
									return false;
								}
								dif=(($("#txtSpTo_"+i).val())*1-$("#txtSpFrom_"+i).val()*1)*1+1;								
								if(parseInt($("#txtReceiveQuantity_"+i).val())!=dif) {
									document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Receive Quantity mismatch</span>';									
									$("#txtSpFrom_"+i).focus();
									return false;
								}
							}
							
					}							
			}
			
			if ($("#countTotal").val()==c && c!=1){
				document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please select atleast one checkbox</span>';
				return false;
			}else{document.getElementById("stoc_receive_error_message").innerHTML='';}
			if(inner!=0){
				
				return false;}
		
		}
		      	
		if($("#bbRf").val()==""){
			document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please Enter Bangladesh Bank Ref. No.</span>';			
			$("#bbRf").focus();
			return false;
		}
		if($("#sltRecBy").val() == 0) {		
			document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please Select Received By</span>';
			
			$("#sltRecBy").focus();
			$("#sltRecBy").select();			
			return false;
		}
		if($("#txtYr").val()==""){
			document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please Enter Received Date</span>';
			
			$("#txtYr").focus();
			return false;
		}
		else if (isDate($("#txtYr").val())==false) {
		$("#txtYr").focus();
		$("#txtYr").select();
        return false;
      }
	  	return true;
   		});
//end edit receive sp
	
	$("#sp_rec_verify_msg").click( function() {
		var baseURLll=$("#baseURLll").val();
		var orrrd=$("#orrrd_").val();
		var countTotal=$("#countTotal").val();
		var sp_recId='';
		var message='';
		var empt=1;
		for(var v=1; v<countTotal;v++){
			
			if($("#message_"+v).val()==""){empt++;}
			sp_recId=sp_recId+'___'+$("#hidn_id_"+v).val();
			message=message+'___'+$("#message_"+v).val();			
		}	
		if(empt==countTotal){
		document.getElementById("stoc_receive_error_message").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;"> Please enter message</span>';
		}
		else{
		window.location.href = baseURLll+"index.php/stock_receive/verify_message_sp_receive/"+orrrd+"/"+sp_recId+"/"+message+"/"+countTotal+"/";							
		}
	});	
	
	
		$("#show_print_app").click( function() {
		var baseURLll=$("#baseURLll").val();
		var orrrd=$("#orrrd_").val();
		if($("#ref_No_id").val()==""){
			document.getElementById("ref_No_id").style.border="1px solid red";
			document.getElementById("show_print_app_msg").innerHTML='<img src="'+baseURLll+'images/unchecked.gif" alt="verify" /> <span style="color:#FF0000; font-weight:bold;">Please enter Application Reference No.</span>';
			$("#ref_No_id").focus();
			return false;
		}
		else{
			var ref_No_idd="";
			var ref_No_id_array=new Array();
			var aPosition=$("#ref_No_id").val().indexOf("/");
			if (aPosition>0){
				ref_No_id_array=$("#ref_No_id").val().split("/");
				var i;
				var ref_No_idd="";
				for (i=0;i<ref_No_id_array.length;i++){
					if (ref_No_idd==""){
						ref_No_idd=ref_No_id_array[i];
					}
					else{
						ref_No_idd += "_" + ref_No_id_array[i];
					}
				}
			}
			else {
				ref_No_idd=$("#ref_No_id").val();
			}	
			window.location.href = baseURLll+"index.php/stock_receive/print_app/"+orrrd+"/"+ref_No_idd+"/";
		}
	});
	
	
	
	$("#show_all_print_app").click( function() {
		var baseURLll=$("#baseURLll").val();
		var orrrd=$("#orrrd_").val();
		window.location.href = baseURLll+"index.php/stock_receive/print_app/"+orrrd+"/all/";							
	});

				////////////////////////////////////////////////////////////////////////////
				////////////////////////// End of Stock ////////////////////////////////////
				////////////////////////////////////////////////////////////////////////////


});