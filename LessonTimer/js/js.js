'use strict'

var time = setInterval(function() {
  var date = new Date();
  let hours = date.getHours().toString().padStart(2, '0');
  let minutes = date.getMinutes().toString().padStart(2, '0');
  let seconds = date.getSeconds().toString().padStart(2, '0');

  document.getElementById("time").innerHTML = ("Time " + hours + " : " + minutes + " : " + seconds);
}, 1000);

let secTimer = 0;
let minTimer = 0;
let hourTimer = 0;

let secondsCounter = setInterval(function(){
    if(secTimer < 59){
        secTimer += 1;
    } else {
        secTimer = 0;
        if(minTimer < 59){
            minTimer += 1;
        } else {
            minTimer = 0;
            hourTimer += 1;
        }
    }

    document.getElementById("seconds").innerHTML = (secTimer < 10) ? '0' + secTimer : secTimer;
    document.getElementById("minuts").innerHTML = (minTimer < 10) ? '0' + minTimer : minTimer;
    document.getElementById("hours").innerHTML = (hourTimer < 10) ? '0' + hourTimer : hourTimer;
}, 1000)