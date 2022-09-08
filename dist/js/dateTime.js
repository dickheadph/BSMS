var today = new Date();
var day = today.getDay();
var daylist = ["Sunday","Monday","Tuesday","Wednesday ","Thursday","Friday","Saturday"];
var month = today.getMonth()+1;

if (month == 1) {
	month = "January";
	document.getElementById("displayDate").innerHTML = daylist[day] + " - " + month + " " + today.getDate() + ", " + today.getFullYear();
}
else if (month == 2) {
	month = "February";
	document.getElementById("displayDate").innerHTML = daylist[day] + " - " + month + " " + today.getDate() + ", " + today.getFullYear();
}
else if (month == 3) {
	month = "March";
	document.getElementById("displayDate").innerHTML = daylist[day] + " - " + month + " " + today.getDate() + ", " + today.getFullYear();
}
else if (month == 4) {
	month = "April";
	document.getElementById("displayDate").innerHTML = daylist[day] + " - " + month + " " + today.getDate() + ", " + today.getFullYear();
}
else if (month == 5) {
	month = "May";
	document.getElementById("displayDate").innerHTML = daylist[day] + " - " + month + " " + today.getDate() + ", " + today.getFullYear();
}
else if (month == 6) {
	month = "June";
	document.getElementById("displayDate").innerHTML = daylist[day] + " - " + month + " " + today.getDate() + ", " + today.getFullYear();
}
else if (month == 7) {
	month = "July";
	document.getElementById("displayDate").innerHTML = daylist[day] + " - " + month + " " + today.getDate() + ", " + today.getFullYear();
}
else if (month == 8) {
	month = "August";
	document.getElementById("displayDate").innerHTML = daylist[day] + " - " + month + " " + today.getDate() + ", " + today.getFullYear();
}
else if (month == 9) {
	month = "September";
	document.getElementById("displayDate").innerHTML = daylist[day] + " - " + month + " " + today.getDate() + ", " + today.getFullYear();
}
else if (month == 10) {
	month = "October";
	document.getElementById("displayDate").innerHTML = daylist[day] + " - " + month + " " + today.getDate() + ", " + today.getFullYear();
}
else if (month == 11) {
	month = "November";
	document.getElementById("displayDate").innerHTML = daylist[day] + " - " + month + " " + today.getDate() + ", " + today.getFullYear();
}
else if (month == 12) {
	month = "December";
	document.getElementById("displayDate").innerHTML = daylist[day] + " - " + month + " " + today.getDate() + ", " + today.getFullYear();
}

var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

document.getElementById("displayTime").innerHTML = time;

function display_ct6() {
	var x = new Date()
	var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
	hours = x.getHours( ) % 12;
	hours = hours ? hours : 12;
	var x1 = hours + ":" +  x.getMinutes() + ":" +  x.getSeconds() + ampm;
	document.getElementById('ct6').innerHTML = x1;
	display_c6();
}
function display_c6(){
	var refresh=1000; // Refresh rate in milli seconds
	mytime=setTimeout('display_ct6()',refresh)
}

display_c6();