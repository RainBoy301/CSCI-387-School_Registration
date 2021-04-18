var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds();
var timeValue = now.getMonth() +"/" + now.getDate() +"/" + now.getFullYear()+" ";
timeValue += "" + ((hours >12) ? hours -12 :hours);
timeValue += ((minutes < 10) ? ":0" : ":"  + minutes);
timeValue += ((seconds < 10) ? ":0" : ":"  + seconds);
timeValue += (hours >= 12) ? " P.M." : " A.M.";
document.getElementById('footer').innerHTML += "<br>"+timeValue;

var random = function randomNumber(num){
  return Math.floor(Math.random()*num)+1;
};
