'use strict'


/*--------------------------Clock on the header-----------------------------*/
var time = setInterval(function() {

  var date = new Date();
  let hours = date.getHours().toString().padStart(2, '0');
  let minutes = date.getMinutes().toString().padStart(2, '0');
  let seconds = date.getSeconds().toString().padStart(2, '0');

  document.getElementById("time").textContent = (hours + " : " + minutes + " : " + seconds);
}, 1000);



/*--------------------------Function of timer -----------------------------*/
let secTimer = 0;//Seconds
let minTimer = 0;//Minutes
let hourTimer = 0;//Hours
let counterInterval = null;
let totalMinutes = 0;
let timeLesStart = null;
const btnStart = document.getElementById('btn-start');
const btnPause = document.getElementById('btn-pause');
const btnStop = document.getElementById('btn-stop');
const btnReset = document.getElementById('btn-Reset');
const btnFinish = document.getElementById('btn-Finish');
const btnBlock = document.querySelector(".buttons-block");
const alertMes = document.getElementById("alMes");

function message(){
    
    alertMes.classList.remove('d-none');
    setTimeout(()=> alertMes.classList.add('d-none'), 3000)
    
}


function timer() {
    return setInterval(function(){
    if(secTimer < 59){
        secTimer++;
    } else {
        secTimer = 0;
        if(minTimer < 59){
            minTimer++;
        } else {
            minTimer = 0;
            hourTimer++;
        }
    }

    //Insert values of variables - secons, minutes and hours 
    setTimer();
    saveState();
    }, 1000)
}

function setTimer(){
    document.getElementById("seconds").textContent = (secTimer < 10) ? '0' + secTimer : secTimer;
    document.getElementById("minutes").textContent = (minTimer < 10) ? '0' + minTimer : minTimer;
    document.getElementById("hours").textContent = (hourTimer < 10) ? '0' + hourTimer : hourTimer;
}

function startTimer() {
    if(!counterInterval){
        counterInterval = timer();
        if (!timeLesStart) { 
            timeLesStart = Math.trunc(Date.now() / 1000);
        }
        btnStart.disabled = true;
        btnPause.disabled = false;
        btnStop.disabled = false;
    }
}

function pauseTimer(){
    clearInterval(counterInterval);
    counterInterval = null;
    btnStart.disabled = false;
    btnPause.disabled = true;
    saveState();
}

function resetTimer(){
    clearInterval(counterInterval);
    counterInterval = null;
    secTimer = minTimer = hourTimer = 0;
    timeLesStart = null;
    btnBlock.classList.add('d-none');
    btnStop.disabled = true;
    btnPause.disabled = true;
    btnStart.disabled = false;
    setTimer();
    localStorage.removeItem('lessonTimerState');
    
}

function stopTimer() {
    if(hourTimer === 0 && minTimer < 1){
        message();
        return;
    }
    clearInterval(counterInterval);
    counterInterval = null;
    let timeLesStop = Math.trunc(Date.now() / 1000);
    // Lesson duration in minutes without breaks.
    totalMinutes = Math.round((hourTimer * 3600 + minTimer * 60 + secTimer) / 60); 
    const timerData = {
        time_Start: timeLesStart,
        time_End : timeLesStop,
        lesson_Duration: totalMinutes
    };

    fetch("app/lesson.php", {
        method: 'POST',

        headers: {
            'Content-Type': 'application/json'
        },
        
        body: JSON.stringify(timerData)
    }).then(response => response.text())
    .then(result => {
        console.log("Server response", result);
        location.reload(); // Refresh current site after receiving a response from the PHP server
    })
    .catch(error => console.log("Error: ", error));
    
    secTimer = minTimer = hourTimer = 0;
    setTimer();
    btnStart.disabled = false;
    btnPause.disabled = true;
    btnStop.disabled = true;
    btnBlock.classList.add("d-none");
    localStorage.removeItem('lessonTimerState');
}
//headers: {"Content-Type": "application/json"} Эта строчка говорит серверу: «Внутри запроса будут данные в формате JSON».
//body: JSON.stringify(timerData) - Превращаем объект timerData в строку JSON и отправляем 
//then(response => response.text()) Когда сервер ответит, мы читаем его ответ как текст.
//then(result => console.log("Server response", result)) Выводим в консоль то, что вернул PHP
//catch(error => console.log("Error: ", error)); Ловим ошибки, если сервер упал или запрос не дошёл.


//Function for saving the timer state in case of browser page refresh
function saveState() {
    const state = {
        secTimer,
        minTimer,
        hourTimer,
        timeLesStart,
        isRunning: counterInterval !== null
    };

    localStorage.setItem('lessonTimerState', JSON.stringify(state));
}

btnStart.addEventListener('click', startTimer);
btnPause.addEventListener('click', pauseTimer);
btnReset.addEventListener('click', resetTimer);
btnFinish.addEventListener('click', stopTimer);

/*-------------------------------------------------------*/
//Opening and closing window with buttons for reset and finish
btnStop.addEventListener('click', function(){
    btnBlock.classList.toggle("d-none");
    setTimeout(()=> btnBlock.classList.add('d-none'), 15000)
})

//Function for restore condition of timer 
function restoreState() {
    const saved = localStorage.getItem('lessonTimerState');
    if (!saved) return;

    const state = JSON.parse(saved);

    secTimer = state.secTimer;
    minTimer = state.minTimer;
    hourTimer = state.hourTimer;
    timeLesStart = state.timeLesStart;

    setTimer();

    if (state.isRunning) {
        counterInterval = timer();
        btnStart.disabled = true;
        btnPause.disabled = false;
        btnStop.disabled = false;
    }
}
restoreState();//lounch function

