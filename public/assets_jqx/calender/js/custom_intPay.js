function get_radio_value(flds) {
 var i = 0;
  var len = flds.length;
  
  while (i < len) {
    if (flds[i].checked) {
      return flds[i].value;
    }
    i++;
  }  
  return "";
}
function int_pay_validatiiion(){
				var to_index=$("#count_indx_total").val();				
				
				var ci_ID=0;
				var ff=1;				
				for(ff=1; ff<to_index; ff++){							
						if(document.getElementById("int_ci_id"+ff).checked==true && document.getElementById("int_ci_id"+ff).disabled==false ){								
								ci_ID++;			
						}else{ continue;}
				}
				if($("#for_selection").val()!=2){
				if(ci_ID==0 ){					
						alert("Please select at least any one");
						return false;
				}
				}
				var form = document.forms.customer_int_form;
				
				
				var n=get_radio_value(form.elements.payment_type);
				
				var ac_no_13=$.trim($("#AC_No").val());
				var sol_id_3=$.trim($("#sol_id").val());
				
				if(n=='AC' && $.trim($("#AC_No").val())==""){
						alert("Please enter account no.");
						$("#AC_No").focus();
						return false;
				}
				
				if(ac_no_13.length!=13){ 
					alert('AC No. should be 13 digits');
					$("#AC_No").focus();
					return false;
				}
				
				
				if(n=='AC' && $.trim($("#sol_id").val())==""){
						alert("Please enter SOL ID.");
						$("#sol_id").focus();
						return false;
				}
				if(sol_id_3.length!=3){ 
					alert('SOL ID should be 3 digits');
					$("#sol_id").focus();
					return false;
				}
				if($("#currency").val()=="0"){
					alert("Please select currency");
						$("#currency").focus();
						return false;				
				}
				if($.trim($("#ExchangeRate").val())==0 || $.trim($("#ExchangeRate").val())==""){
					alert("Please enter Exchange Rate");
						$("#ExchangeRate").focus();
						return false;				
				}
				if($("#paid_date").val()==""){
					alert("Please enter paid date");
						$("#paid_date").focus();
						return false;				
				}
				
				if (isDate($("#paid_date").val())==false) {
					$("#paid_date").focus();
					$("#paid_date").select();
					return false;					
				}
				//if($("#currency").val()==$("#hiden_currency").val()){
					//alert("Please select currency");
					//	$("#currency").focus();
						//return false;				
				//}
				else{ 
						question = confirm("Are you sure want to Save?");
						if (question =="0"){return (false);}
						else{ 
						return (true);
						}	
				}		
		}