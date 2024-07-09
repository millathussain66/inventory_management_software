// JavaScript Document
function addRowToTableadduser(tblname)
{
	
  var tbl = document.getElementById(tblname);
  var lastRow = tbl.rows.length;
  var iteration = lastRow;
  var row = tbl.insertRow(lastRow);  
  

// For lable
  var cellRightSel = row.insertCell(0);
  var el = document.createElement('label');
  var labeltext = document.createTextNode("User Group Name");
  el.appendChild(labeltext);
  cellRightSel.appendChild(el);
  
  //For text
  var cellRight = row.insertCell(1);
  var el = document.createElement('input');
  el.setAttribute('type', 'text');
  el.setAttribute('class', 'text');
  el.setAttribute('name', 'bione[]');  
  el.setAttribute('size', '31');  
  el.setAttribute("style", "border: 1px solid #a0a0a0;font-family:Verdana;font-size:8pt");  
  cellRight.appendChild(el);
  el.focus(); 
    
}
function removeRowFromTableadduser(tblname)
{	
  var tbl = document.getElementById(tblname);
  var lastRow = tbl.rows.length;
  if (lastRow > 1) 
  	{
	  if(!confirm('Are you sure to delete row ? '))
  			{
  				return;
  			}
  		tbl.deleteRow(lastRow - 1); 
	} 
}
function validatationadduser(nameug)
{
 
 var temp=100; 
 var all_inpt='';
 var frm = document.frmUserInfo;  
  	for(var j=0;j<frm.length;j++)   								
	{ 	e1=frm.elements[j];
		if((e1.type=='text' && e1.value!='') && e1.name.indexOf('bione') != -1) 
		{		 
			if(all_inpt==''){all_inpt= $.trim(e1.value.toUpperCase());}else{
			all_inpt=all_inpt+'::::'+ $.trim(e1.value.toUpperCase());}
		}
	}
	
	for(i=0;i< frm.length;i++)  								
	{ 	e=frm.elements[i];
		if((e.type=='text' && e.value=='') && e.name.indexOf('bione') != -1) 
		{	if(temp==100){temp=i;}	
			e.style.border="1px solid red";
		}
		else if((e.type=='text' && e.value!='') && e.name.indexOf('bione') != -1) 
		{	
				var hiden_error=100;
				for(var er1=0; er1<nameug; er1++){				
					if(document.getElementById('ugns'+er1).value==$.trim(e.value.toUpperCase())){
						if(temp==100){temp=i;}
						if(hiden_error==100){hiden_error=i;}
					}
				}
			if(hiden_error!=100){e.style.border="1px solid blue";}else{e.style.border="1px solid #a0a0a0";}		
			
			var aPosition=all_inpt.indexOf("::::");
			if (aPosition>0){
				customer_id_array=all_inpt.split("::::");
				var temp_all_eror=100;
				var cunt=0;
				for (var i1=0;i1<customer_id_array.length;i1++){
					
					if(customer_id_array[i1]==$.trim(e.value.toUpperCase())){
						cunt++;
						if(temp==100 && cunt>1){temp=temp_all_eror;}
						if(temp_all_eror==100 && cunt==1){temp_all_eror=i; }						
					}
				}
			}
			if(temp_all_eror!=100 && cunt>1){e.style.border="1px solid blue";}
			
		}
	 	else{continue;}					
  	}	
	if(temp!=100){	
		document.getElementById("msg").style.display='none';
		document.getElementById("span_error_msg").style.display='block';
		frm.elements[temp].focus();
		return false;
	}				
} 
 
 //category
 
 function addRowToTableaddcategory(tblname)
{
	
  var tbl = document.getElementById(tblname);
  var lastRow = tbl.rows.length;
  var iteration = lastRow;
  var row = tbl.insertRow(lastRow);  
  

// For lable
  var cellRightSel = row.insertCell(0);
  var el = document.createElement('label');
  var labeltext = document.createTextNode("User Right Category");
  el.appendChild(labeltext);
  cellRightSel.appendChild(el);
  
  //For text
  var cellRight = row.insertCell(1);
  var el = document.createElement('input');
  el.setAttribute('type', 'text');
  el.setAttribute('class', 'text');
  el.setAttribute('name', 'bione[]'); 
  el.setAttribute('size', '31');
  //el.setAttribute('Font-Size', '8pt');
  el.setAttribute("style", "border: 1px solid #a0a0a0;font-family:Verdana;font-size:8pt");
  //el.setAttribute('onblur', 'check_duplicate(this.value)');
  cellRight.appendChild(el);
  el.focus(); 
    
}
function removeRowFromTableaddcategory(tblname)
{	
  var tbl = document.getElementById(tblname);
  var lastRow = tbl.rows.length;
  if (lastRow > 1) 
  	{
	  if(!confirm('Are you sure to delete row ? '))
  			{
  				return;
  			}
  		tbl.deleteRow(lastRow - 1); 
	} 
}
function validatationaddcategory(nameug)
{	 
	 var temp=100; 
 var all_inpt='';
 var frm = document.frmUserInfo;  
  	for(var j=0;j<frm.length;j++)   								
	{ 	e1=frm.elements[j];
		if((e1.type=='text' && e1.value!='') && e1.name.indexOf('bione') != -1) 
		{		 
			if(all_inpt==''){all_inpt= $.trim(e1.value.toUpperCase());}else{
			all_inpt=all_inpt+'::::'+ $.trim(e1.value.toUpperCase());}
		}
	}
	
	for(i=0;i< frm.length;i++)  								
	{ 	e=frm.elements[i];
		if((e.type=='text' && e.value=='') && e.name.indexOf('bione') != -1) 
		{	if(temp==100){temp=i;}	
			e.style.border="1px solid red";
		}
		else if((e.type=='text' && e.value!='') && e.name.indexOf('bione') != -1) 
		{	
				var hiden_error=100;
				for(var er1=0; er1<nameug; er1++){				
					if(document.getElementById('ugns'+er1).value==$.trim(e.value.toUpperCase())){
						if(temp==100){temp=i;}
						if(hiden_error==100){hiden_error=i;}
					}
				}
			if(hiden_error!=100){e.style.border="1px solid blue";}else{e.style.border="1px solid #a0a0a0";}		
			
			var aPosition=all_inpt.indexOf("::::");
			if (aPosition>0){
				customer_id_array=all_inpt.split("::::");
				var temp_all_eror=100;
				var cunt=0;
				for (var i1=0;i1<customer_id_array.length;i1++){
					
					if(customer_id_array[i1]==$.trim(e.value.toUpperCase())){
						cunt++;
						if(temp==100 && cunt>1){temp=temp_all_eror;}
						if(temp_all_eror==100 && cunt==1){temp_all_eror=i; }						
					}
				}
			}
			if(temp_all_eror!=100 && cunt>1){e.style.border="1px solid blue";}
			
		}
	 	else{continue;}					
  	}	
	if(temp!=100){	
		document.getElementById("msg").style.display='none';
		document.getElementById("span_error_msg").style.display='block';
		frm.elements[temp].focus();
		return false;
	}				
}
function validatationsortcategory(nameug)
{	
	

  var check_error = 0;  
  var cnt_err=0;
  for(i=0; i<nameug; i++)
  {
	  var txtc=document.getElementById("bione"+i)
	  if(txtc.value =='')
		 {		
			 
			 txtc.style.border="1px solid red";
			 txtc.focus()
			 cnt_err++;
			 //return (false);
		 }
		 else
		 {
			 for(j=0; j<nameug; j++)
			 {
				 var txtc1=document.getElementById("bione"+j)
				 if (i!=j)
				 {
				 
					 if ((txtc.value)==(txtc1.value))
					 {
						 txtc1.style.border="1px solid blue";
						 txtc1.focus()
						 cnt_err++;
					 }
					 else
					 {
						 txtc.style.border="1px solid black";
					 }
				 }
			 }
		 }
  
}
  
	if(cnt_err != 0)
	{
		document.getElementById("msg").style.display='none';
		document.getElementById("span_error_msg").style.display='block';
		return (false);
	}
	else if(cnt_err == 0)
	{
		document.getElementById("msg").style.display='none';
		document.getElementById("span_error_msg").style.display='none';
		 return (true);
	}					
}

 //right
 function addRowToTableaddright(tblname)
{
	
  var tbl = document.getElementById(tblname);
  var lastRow = tbl.rows.length;
  var iteration = lastRow;
  var row = tbl.insertRow(lastRow);  
  

// For lable
  var cellRightSel = row.insertCell(0);
  var el = document.createElement('label');
  var labeltext = document.createTextNode("User Right Name");
  el.appendChild(labeltext);
  cellRightSel.appendChild(el);
  
  //For text
  var cellRight = row.insertCell(1);
  var el = document.createElement('input');
  el.setAttribute('type', 'text');
  el.setAttribute('class', 'text');
  el.setAttribute('name', 'bione[]'); 
  el.setAttribute('size', '33'); 
  el.setAttribute("style", "border: 1px solid #a0a0a0;font-family:Verdana;font-size:8pt");  
  cellRight.appendChild(el);
  el.focus();
  var tbl = document.getElementById(tblname);
  var lastRow = tbl.rows.length;
  var iteration = lastRow;
  var row = tbl.insertRow(lastRow);  
  

// For lable
  var cellRightSel = row.insertCell(0);
  var el = document.createElement('label');
  var labeltext = document.createTextNode("URL");
  el.appendChild(labeltext);
  cellRightSel.appendChild(el);
  
  //For text
  var cellRight = row.insertCell(1);
  var el = document.createElement('input');
  el.setAttribute('type', 'text');
  el.setAttribute('class', 'text');
  el.setAttribute('name', 'URL[]');  
  el.setAttribute('size', '33');
  //el.setAttribute('Font-Size', '8pt');
  el.setAttribute("style", "border: 1px solid #a0a0a0;font-family:Verdana;font-size:8pt"); 
  cellRight.appendChild(el);
  
    
}
function removeRowFromTableaddright(tblname)
{	
  var tbl = document.getElementById(tblname);
  var lastRow = tbl.rows.length;
  if (lastRow > 2) 
  	{
	  if(!confirm('Are you sure to delete row ? '))
  			{
  				return;
  			}
  		tbl.deleteRow(lastRow - 1);
		var lastRow = tbl.rows.length;
		tbl.deleteRow(lastRow - 1);
	} 
}
function validatationaddright()
{
	if (document.frmUserInfo.stlselectcate.value=='0')
	{	
		document.getElementById("span_error_msg").style.display='none';
		var base=document.getElementById("baseUrld").value;		
	 	document.getElementById("msg").innerHTML='<span style="color:#FF0000; font-weight:bold;"><img src="'+base+'images/unchecked.gif" alt="verify" /> Please Select a User Right Category</span>';		
		document.frmUserInfo.stlselectcate.focus();		
		return (false);	
	}
	 
	var nameug=document.frmUserInfo.count_all_u.value;
	var frm = document.frmUserInfo;  
	 var temp=100; 
	 var all_inpt='';
 	
  	for(var j=0;j<frm.length;j++)   								
	{ 	e1=frm.elements[j];
		if((e1.type=='text' && e1.value!='') && e1.name.indexOf('bione') != -1) 
		{		 
			if(all_inpt==''){all_inpt= $.trim(e1.value.toUpperCase());}else{
			all_inpt=all_inpt+'::::'+ $.trim(e1.value.toUpperCase());}
		}
	}
	
	for(i=0;i< frm.length;i++)  								
	{ 	e=frm.elements[i];
		if((e.type=='text' && e.value=='') && e.name.indexOf('bione') != -1) 
		{	if(temp==100){temp=i;}	
			e.style.border="1px solid red";
		}
		else if((e.type=='text' && e.value!='') && e.name.indexOf('bione') != -1) 
		{	
				var hiden_error=100;
				for(var er1=0; er1<nameug; er1++){				
					if(document.getElementById('ugns'+er1).value==$.trim(e.value.toUpperCase())){
						if(temp==100){temp=i;}
						if(hiden_error==100){hiden_error=i;}
					}
				}
			if(hiden_error!=100){e.style.border="1px solid blue";}else{e.style.border="1px solid #a0a0a0";}		
			
			var aPosition=all_inpt.indexOf("::::");
			if (aPosition>0){
				customer_id_array=all_inpt.split("::::");
				var temp_all_eror=100;
				var cunt=0;
				for (var i1=0;i1<customer_id_array.length;i1++){
					
					if(customer_id_array[i1]==$.trim(e.value.toUpperCase())){
						cunt++;
						if(temp==100 && cunt>1){temp=temp_all_eror;}
						if(temp_all_eror==100 && cunt==1){temp_all_eror=i; }						
					}
				}
			}
			if(temp_all_eror!=100 && cunt>1){e.style.border="1px solid blue";}
			
		}
	 	else{continue;}					
  	}	
	//////////
	 var temp2=100; 
	 var all_inpt_2='';
	 
	  
  	for(var j=0;j<frm.length;j++)   								
	{ 	e4=frm.elements[j];
		if((e4.type=='text' && e4.value!='') && e4.name.indexOf('URL') != -1) 
		{		 
			if(all_inpt_2==''){all_inpt_2= $.trim(e4.value.toUpperCase());}else{
			all_inpt_2=all_inpt_2+'::::'+ $.trim(e4.value.toUpperCase());}
		}
	}
	
	for(var ii=0;ii< frm.length;ii++)  								
	{ 	e5=frm.elements[ii];
		if((e5.type=='text' && e5.value=='') && e5.name.indexOf('URL') != -1) 
		{	if(temp2==100){temp2=ii;}	
			e5.style.border="1px solid red";
		}
		else if((e5.type=='text' && e5.value!='') && e5.name.indexOf('URL') != -1) 
		{	
				var hiden_error2=100;
				for(var er6=0; er6<nameug; er6++){				
					if(document.getElementById('uurl'+er6).value==$.trim(e5.value.toUpperCase())){
						if(temp2==100){temp2=ii;}
						if(hiden_error2==100){hiden_error2=ii;}
					}
				}
			if(hiden_error2!=100){e5.style.border="1px solid blue";}else{e5.style.border="1px solid #a0a0a0";}		
			
			var aPosition2=all_inpt_2.indexOf("::::");
			if (aPosition2>0){
				customer_id_array2=all_inpt_2.split("::::");
				var temp_all_eror5=100;
				var cunt2=0;
				for (var i7=0;i7<customer_id_array2.length;i7++){
					
					if(customer_id_array2[i7]==$.trim(e5.value.toUpperCase())){
						cunt2++;
						if(temp2==100 && cunt2>1){temp2=temp_all_eror5;}
						if(temp_all_eror5==100 && cunt2==1){temp_all_eror5=ii; }						
					}
				}
			}
			if(temp_all_eror5!=100 && cunt2>1){e5.style.border="1px solid blue";}
			
		}
	 	else{continue;}					
  	}	
	/*if(temp2!=100){	
		document.getElementById("msg").style.display='none';
		document.getElementById("span_error_msg").style.display='block';
		frm.elements[temp2].focus();
		return false;
	}	*/				
		

  	if(temp!=100 && temp2==100){
	frm.elements[temp].focus();
	document.getElementById("msg").style.display='none';
	document.getElementById("span_error_msg").style.display='block';
	return false;
	}
	else if(temp2!=100 && temp==100){
	//document.frmUserInfo.URL[temp2].focus();
	frm.elements[temp2].focus();
	document.getElementById("msg").style.display='none';
	document.getElementById("span_error_msg").style.display='block';
	return false;
	}
	else if(temp2!=100 && temp2!=100){
		if(temp<temp2 || temp2==temp){
			frm.elements[temp].focus();
			document.getElementById("msg").style.display='none';
			document.getElementById("span_error_msg").style.display='block';
			return false;
		}
		else{
			frm.elements[temp2].focus();
			document.getElementById("msg").style.display='none';
			document.getElementById("span_error_msg").style.display='block';
			return false;
		}
	}
}

 function clickOnchangeViewCat(allvalue)
{
	if(allvalue==200 && document.getElementById("sltMainDocumentsId").value==0){
			document.getElementById("msg1").style.display='none';
			document.getElementById("span_error_msg").style.display='block';
			document.getElementById("sltMainDocumentsId").focus();
			return false;
	}
	else{document.getElementById("span_error_msg").style.display='none';}
	
	if(allvalue==200){document.getElementById("s_sall").value=document.getElementById("sltMainDocumentsId").value;}
	else if(allvalue==100){document.getElementById("s_sall").value=100;}	
	document.signupForm.submit()
}