<script type="text/javascript">

// Current Server Time script (SSI or PHP)- By JavaScriptKit.com (http://www.javascriptkit.com)
// For this and over 400+ free scripts, visit JavaScript Kit- http://www.javascriptkit.com/
// This notice must stay intact for use.

//Depending on whether your page supports SSI (.shtml) or PHP (.php), UNCOMMENT the line below your page supports and COMMENT the one it does not:
//Default is that SSI method is uncommented, and PHP is commented:

var currenttime = '<!--#config timefmt="%B %d, %Y %H:%M:%S"--><!--#echo var="DATE_LOCAL" -->' //SSI method of getting server date
var currenttime = '<? print date("F d, Y H:i:s", time())?>' //PHP method of getting server date

///////////Stop editting here/////////////////////////////////

var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
var serverdate=new Date(currenttime)

function padlength(what){
var output=(what.toString().length==1)? "0"+what : what
return output
}

function displaytime(){
serverdate.setSeconds(serverdate.getSeconds()+1)
var datestring=montharray[serverdate.getMonth()]+" "+padlength(serverdate.getDate())+", "+serverdate.getFullYear()
var timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())
document.getElementById("servertime").innerHTML=datestring+" "+timestring
}

window.onload=function(){
setInterval("displaytime()", 1000)
}

</script>












***********************************************

<script>
<!--
//LCD Clock script- by javascriptkit.com
//Visit JavaScript Kit (http://javascriptkit.com) for script
//Credit must stay intact for use

var alternate=0
var standardbrowser=!document.all&&!document.getElementById

if (standardbrowser)
document.write('<form name="tick"><input type="text" name="tock" size="11"></form>')

function show(){
if (!standardbrowser)
 var clockobj=document.getElementById? document.getElementById("digitalclock") : document.all.digitalclock
 var currenttime = '<? print date("F d, Y H:i:s", time())?>'
 var Digital=new Date(currenttime)
 var military=Digital.getHours()
 var hours=Digital.getHours()
 var minutes=Digital.getMinutes()
 var seconds=Digital.getSeconds() 
var dn="AM"
if (hours==12) dn="PM" 
		if (hours>12){
		dn="PM"
		hours=hours-12
		}

if (hours==0) hours=12
if (hours.toString().length==1) hours="0"+hours
if (seconds.toString().length==1) seconds="0"+seconds
if (minutes<=9)
	minutes="0"+minutes
if (standardbrowser){
	if (alternate==0)
		document.tick.tock.value=hours+" : "+minutes+" "+dn
	else
		document.tick.tock.value=hours+"   "+minutes+" "+dn
}else{
	//This is the Added Code
	if (dn=="AM"){
		if (minutes >= 15 && military < 9 ) {
			hours = parseInt(hours) + 1 ;
			minutes = "00";
		}
	}
	timing=hours+" : "+minutes+" : "+seconds;
	ctiming=hours+":"+minutes+":"+seconds;
	document.getElementById("company_clock").value = ctiming
	// end of added code
	if (alternate==0)
		clockobj.innerHTML=timing+" <sup style='font-size:10px'>"+dn+"</sup>"
	else
		clockobj.innerHTML=timing+" <sup style='font-size:10px'>"+dn+"</sup>"
	}
	alternate=(alternate==0)? 1 : 0
	setTimeout("show()",1000)
}
window.onload=show

//-->
</script>
