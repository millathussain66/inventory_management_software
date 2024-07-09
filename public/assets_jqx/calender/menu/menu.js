/* 
   Simple JQuery Accordion menu.
   HTML structure to use:

   <ul id="menu">
     <li><a href="#">Sub menu heading</a>
     <ul>
       <li><a href="http://site.com/">Link</a></li>
       <li><a href="http://site.com/">Link</a></li>
       <li><a href="http://site.com/">Link</a></li>
       ...
       ...
     </ul>
     <li><a href="#">Sub menu heading</a>
     <ul>
       <li><a href="http://site.com/">Link</a></li>
       <li><a href="http://site.com/">Link</a></li>
       <li><a href="http://site.com/">Link</a></li>
       ...
       ...
     </ul>
     ...
     ...
   </ul>

Copyright 2007 by Marco van Hylckama Vlieg

web: http://www.i-marco.nl/weblog/
email: marco@i-marco.nl

Free for non-commercial use
*/

function initMenu() {
	var g=1;
  	for(var i=1; i<=20; i++){
			if(i!=0){
				$('#menu'+i+' ul').hide();
			}
		}
  
  $('#menu ul').hide();
  $('#menu ul:first').show();
  $('#menu li a').click(
    function() { var g=1;
 
 		for(var i=1; i<=20; i++){
			if(i!=0){
				$('#menu'+i+' ul').hide();
			}
		}
 
  
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		if(g==0){
		 g=1;		
		$('#menu ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
  
  	$('#menu1 li a').click(
    function() {	
		var g=1;
		//alert(g);
		var idff=1;
		$('#menu ul').hide();	
		 for(var i=1; i<=20; i++){
			if(i!=idff){
				$('#menu'+i+' ul').hide();
			}
		}
		 
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		
		if(g==0){
		 g=1;		
		$('#menu'+idff+' ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu'+idff+' ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu'+idff+' ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
	$('#menu2 li a').click(
    function() {	
		var g=1;
		var idff=2;
		$('#menu ul').hide();	
		 for(var i=1; i<=20; i++){
			if(i!=idff){
				$('#menu'+i+' ul').hide();
			}
		}
		 
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		if(g==0){
		 g=1;		
		$('#menu'+idff+' ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu'+idff+' ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu'+idff+' ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
	$('#menu3 li a').click(
    function() {	
		var g=1;
		var idff=3;
		$('#menu ul').hide();	
		 for(var i=1; i<=20; i++){
			if(i!=idff){
				$('#menu'+i+' ul').hide();
			}
		}
		 
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		if(g==0){
		 g=1;		
		$('#menu'+idff+' ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu'+idff+' ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu'+idff+' ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
	$('#menu4 li a').click(
    function() {
		var g=1;
		var idff=4;
		$('#menu ul').hide();	
		 for(var i=1; i<=20; i++){
			if(i!=idff){
				$('#menu'+i+' ul').hide();
			}
		}
		 
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		if(g==0){
		 g=1;		
		$('#menu'+idff+' ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu'+idff+' ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu'+idff+' ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
   	$('#menu5 li a').click(
    function() {
		var g=1;
		var idff=5;
		$('#menu ul').hide();	
		 for(var i=1; i<=20; i++){
			if(i!=idff){
				$('#menu'+i+' ul').hide();
			}
		}
		 
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		if(g==0){
		 g=1;		
		$('#menu'+idff+' ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu'+idff+' ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu'+idff+' ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
	$('#menu6 li a').click(
    function() {
		var g=1;
		var idff=6;
		$('#menu ul').hide();	
		 for(var i=1; i<=20; i++){
			if(i!=idff){
				$('#menu'+i+' ul').hide();
			}
		}
		 
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		if(g==0){
		 g=1;		
		$('#menu'+idff+' ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu'+idff+' ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu'+idff+' ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
	$('#menu7 li a').click(
    function() {
		var g=1;
		var idff=7;
		$('#menu ul').hide();	
		 for(var i=1; i<=20; i++){
			if(i!=idff){
				$('#menu'+i+' ul').hide();
			}
		}
		 
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		if(g==0){
		 g=1;		
		$('#menu'+idff+' ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu'+idff+' ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu'+idff+' ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
	$('#menu8 li a').click(
    function() { var g=1;	
		var idff=8;
		$('#menu ul').hide();	
		 for(var i=1; i<=20; i++){
			if(i!=idff){
				$('#menu'+i+' ul').hide();
			}
		}
		 
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		if(g==0){
		 g=1;		
		$('#menu'+idff+' ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu'+idff+' ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu'+idff+' ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
	$('#menu9 li a').click(
    function() { var g=1;	
		var idff=9;
		$('#menu ul').hide();	
		 for(var i=1; i<=20; i++){
			if(i!=idff){
				$('#menu'+i+' ul').hide();
			}
		}
		 
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		if(g==0){
		 g=1;		
		$('#menu'+idff+' ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu'+idff+' ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu'+idff+' ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
	$('#menu10 li a').click(
    function() { var g=1;	
		var idff=10;
		$('#menu ul').hide();	
		 for(var i=1; i<=20; i++){
			if(i!=idff){
				$('#menu'+i+' ul').hide();
			}
		}
		 
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		if(g==0){
		 g=1;		
		$('#menu'+idff+' ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu'+idff+' ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu'+idff+' ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
	$('#menu11 li a').click(
    function() { var g=1;	
		var idff=11;
		$('#menu ul').hide();	
		 for(var i=1; i<=20; i++){
			if(i!=idff){
				$('#menu'+i+' ul').hide();
			}
		}
		 
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		if(g==0){
		 g=1;		
		$('#menu'+idff+' ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu'+idff+' ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu'+idff+' ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
	$('#menu12 li a').click(
    function() { var g=1;	
		var idff=12;
		$('#menu ul').hide();	
		 for(var i=1; i<=20; i++){
			if(i!=idff){
				$('#menu'+i+' ul').hide();
			}
		}
		 
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		if(g==0){
		 g=1;		
		$('#menu'+idff+' ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu'+idff+' ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu'+idff+' ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
	$('#menu13 li a').click(
    function() { var g=1;	
		var idff=13;
		$('#menu ul').hide();	
		 for(var i=1; i<=20; i++){
			if(i!=idff){
				$('#menu'+i+' ul').hide();
			}
		}
		 
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		if(g==0){
		 g=1;		
		$('#menu'+idff+' ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu'+idff+' ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu'+idff+' ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
	$('#menu14 li a').click(
    function() { var g=1;	
		var idff=14;
		$('#menu ul').hide();	
		 for(var i=1; i<=20; i++){
			if(i!=idff){
				$('#menu'+i+' ul').hide();
			}
		}
		 
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		if(g==0){
		 g=1;		
		$('#menu'+idff+' ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu'+idff+' ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu'+idff+' ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
	$('#menu15 li a').click(
    function() { var g=1;	
		var idff=15;
		$('#menu ul').hide();	
		 for(var i=1; i<=20; i++){
			if(i!=idff){
				$('#menu'+i+' ul').hide();
			}
		}
		 
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		if(g==0){
		 g=1;		
		$('#menu'+idff+' ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu'+idff+' ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu'+idff+' ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
	$('#menu16 li a').click(
    function() { var g=1;	
		var idff=16;
		$('#menu ul').hide();	
		 for(var i=1; i<=20; i++){
			if(i!=idff){
				$('#menu'+i+' ul').hide();
			}
		}
		 
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		if(g==0){
		 g=1;		
		$('#menu'+idff+' ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu'+idff+' ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu'+idff+' ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
	$('#menu17 li a').click(
    function() { var g=1;	
		var idff=17;
		$('#menu ul').hide();	
		 for(var i=1; i<=20; i++){
			if(i!=idff){
				$('#menu'+i+' ul').hide();
			}
		}
		 
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		if(g==0){
		 g=1;		
		$('#menu'+idff+' ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu'+idff+' ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu'+idff+' ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
	$('#menu18 li a').click(
    function() { var g=1;	
		var idff=18;
		$('#menu ul').hide();	
		 for(var i=1; i<=20; i++){
			if(i!=idff){
				$('#menu'+i+' ul').hide();
			}
		}
		 
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		if(g==0){
		 g=1;		
		$('#menu'+idff+' ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu'+idff+' ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu'+idff+' ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
	$('#menu19 li a').click(
    function() { var g=1;	
		var idff=19;
		$('#menu ul').hide();	
		 for(var i=1; i<=20; i++){
			if(i!=idff){
				$('#menu'+i+' ul').hide();
			}
		}
		 
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		if(g==0){
		 g=1;		
		$('#menu'+idff+' ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu'+idff+' ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu'+idff+' ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
	$('#menu20 li a').click(
    function() { var g=1;	
		var idff=20;
		$('#menu ul').hide();	
		 for(var i=1; i<=20; i++){
			if(i!=idff){
				$('#menu'+i+' ul').hide();
			}
		}
		 
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		if(g==0){
		 g=1;		
		$('#menu'+idff+' ul:visible').slideDown('normal');
		}
		else if(g==1){
		g=0;
		$('#menu'+idff+' ul:visible').slideUp('normal');
		}
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		 var g=1;
		 // alert('This is from second');
        $('#menu'+idff+' ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
	
	
 
	
  }
$(document).ready(function() {initMenu();});
/*
function initMenu(menuID) {
$(’#’ + menuID + ‘ ul’).hide();
$(’#’ + menuID + ‘ ul:first’).show();
$(’#’ + menuID + ‘ li a’).click(
function() {
var checkElement = $(this).next();
if((checkElement.is(‘ul’)) && (checkElement.is(’:visible’))) {
return false;
}
if((checkElement.is(‘ul’)) && (!checkElement.is(’:visible’))) {
$(’#’ + menuID + ‘ ul:visible’).slideUp(‘normal’);
checkElement.slideDown(‘normal’);
return false;
}
}
);
}
$(document).ready(function() {initMenu(‘menu’);initMenu(‘menu2’);});
*/