<style>
<!--
.companyClock {
	background-color: black;
	color: lime;
	font: bold 20px MS Sans Serif;
	padding: 3px;
}
-->
</style>


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
var serverdate=new Date(document.getElementById("company_clock").value);
//var serverdate=new Date();
		
function padlength(what){
var output=(what.toString().length==1)? "0"+what : what
return output
}


function displaytime(){
serverdate.setSeconds(serverdate.getSeconds()+1)
var datestring=montharray[serverdate.getMonth()]+" "+padlength(serverdate.getDate())+", "+serverdate.getFullYear()
var timestring='' <!-- padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())
var militaryHour=serverdate.getHours();
//var militaryMin=serverdate.getMinutes();
//var militarySec=serverdate.getSeconds();
var hours=serverdate.getHours();
var minutes=serverdate.getMinutes();
var seconds=serverdate.getSeconds();
var dn = "AM"
	if (hours==12) dn="PM" 
		if (hours>12){
		dn="PM"
		hours=hours-12
		}

timing=padlength(hours)+" : "+padlength(minutes)+" : "+padlength(seconds)
ctiming=padlength(hours)+":"+padlength(minutes)+":"+padlength(seconds)
//This is the Added Code
if (dn=="AM"){
	if (minutes >= 15 && militaryHour == 7 ) {
		hours = parseInt(hours) + 1 ;
		document.getElementById("military_clock").value = "08:00:00";
		timing="08 : 00 : " + padlength(seconds);
	}else{
		document.getElementById("military_clock").value = ctiming;
	}
}

document.getElementById("digitalclock").innerHTML=timing+" <sup style='font-size:10px'>"+dn+"</sup>"
document.getElementById("company_clock").value = ctiming
document.getElementById("ampm").value = dn
}
window.onload=function(){
setInterval("displaytime()", 1000)
}

</script>
