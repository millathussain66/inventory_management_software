/*   Free Script provided by HIOXINDIA            */
/*   visit us at http://www.hscripts.com     */
/*   This is a copyright product of hioxindia.com */

var rTimer;
var sds ;
var h;
var m;
var s;
var f;
TimeTick();

function TimeTick()
{	
	sds =  new Date();
	h=sds.getHours();
	m=sds.getMinutes();	
	s=sds.getSeconds();
	f="AM";
	if(h>11){f="PM";}
	if(m<10){m="0"+m;}
	if(s<10){s="0"+s;}
	if(h>12 && h!=00){h=h-12; f="PM"}
	else if(h==00){h=12; f="AM"}
	if(h<10){h="0"+h;}
	document.getElementById("autotimechange").innerHTML=" "+h+" : "+m+" : "+s+"  "+f;
	if(rTimer){
		clearTimeout(rTimer);
	}	
	rTimer = setTimeout('TimeTick()', 1000);
}


