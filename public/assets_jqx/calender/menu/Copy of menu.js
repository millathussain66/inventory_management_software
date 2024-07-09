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
  $('#menu1 ul').hide();
  $('#menu2 ul').hide();
  $('#menu3 ul').hide();
  $('#menu4 ul').hide();
  $('#menu5 ul').hide();
  $('#menu6 ul').hide();
  $('#menu7 ul').hide();
  $('#menu8 ul').hide();
  $('#menu ul').hide();
  $('#menu ul:first').show();
  $('#menu li a').click(
    function() {
  $('#menu1 ul').hide();
  $('#menu2 ul').hide();
  $('#menu3 ul').hide();
  $('#menu4 ul').hide();
  $('#menu5 ul').hide();
  $('#menu6 ul').hide();
  $('#menu7 ul').hide();
  $('#menu8 ul').hide();
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
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
		  $('#menu ul').hide();		  
		  $('#menu2 ul').hide();
		  $('#menu3 ul').hide();
		  $('#menu4 ul').hide();
		  $('#menu5 ul').hide();
          $('#menu6 ul').hide();
          $('#menu7 ul').hide();
		  $('#menu8 ul').hide();
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		  // alert('This is from second');
        $('#menu1 ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
  
  $('#menu2 li a').click(
    function() {
		  $('#menu1 ul').hide();
		  $('#menu ul').hide();
		  $('#menu3 ul').hide();
		  $('#menu4 ul').hide();
		  $('#menu5 ul').hide();
		  $('#menu6 ul').hide();
		  $('#menu7 ul').hide();
		  $('#menu8 ul').hide();
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		  // alert('This is from second');
        $('#menu2 ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
  $('#menu3 li a').click(
    function() {
		  $('#menu1 ul').hide();
		  $('#menu2 ul').hide();
		  $('#menu ul').hide();
		  $('#menu4 ul').hide();
		  $('#menu5 ul').hide();
		  $('#menu6 ul').hide();
		  $('#menu7 ul').hide();
		  $('#menu8 ul').hide();
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		  // alert('This is from second');
        $('#menu3 ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
  
  $('#menu4 li a').click(
    function() {
		  $('#menu1 ul').hide();
		  $('#menu2 ul').hide();
		  $('#menu3 ul').hide();
		  $('#menu ul').hide();
		  $('#menu5 ul').hide();
		  $('#menu6 ul').hide();
		  $('#menu7 ul').hide();
		  $('#menu8 ul').hide();
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		  // alert('This is from second');
        $('#menu4 ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
  $('#menu5 li a').click(
    function() {
		$('#menu1 ul').hide();
		  $('#menu2 ul').hide();
		  $('#menu3 ul').hide();
		  $('#menu4 ul').hide();
		  $('#menu ul').hide();
		  $('#menu6 ul').hide();
		  $('#menu7 ul').hide();
		  $('#menu8 ul').hide();
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		  // alert('This is from second');
        $('#menu5 ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
  $('#menu6 li a').click(
    function() {
		$('#menu1 ul').hide();
		  $('#menu2 ul').hide();
		  $('#menu3 ul').hide();
		  $('#menu4 ul').hide();
		  $('#menu5 ul').hide();
		  $('#menu ul').hide();
		  $('#menu7 ul').hide();
		  $('#menu8 ul').hide();
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		  // alert('This is from second');
        $('#menu6 ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
  $('#menu7 li a').click(
    function() {
		$('#menu1 ul').hide();
		  $('#menu2 ul').hide();
		  $('#menu3 ul').hide();
		  $('#menu4 ul').hide();
		  $('#menu5 ul').hide();
		  $('#menu6 ul').hide();
		  $('#menu ul').hide();
		  $('#menu8 ul').hide();
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		  // alert('This is from second');
        $('#menu7 ul:visible').slideUp('normal');
		 //alert('This is from slideup normal');
        checkElement.slideDown('normal');
		// alert('This is from slide down normal');
        return false;
        }
      }
    );
  	$('#menu8 li a').click(
    function() {
		$('#menu1 ul').hide();
		  $('#menu2 ul').hide();
		  $('#menu3 ul').hide();
		  $('#menu4 ul').hide();
		  $('#menu5 ul').hide();
		  $('#menu6 ul').hide();
		  $('#menu7 ul').hide();
		  $('#menu ul').hide();
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		 // alert('This is from first');
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		  // alert('This is from second');
        $('#menu8 ul:visible').slideUp('normal');
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