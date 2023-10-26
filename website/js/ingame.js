let started = false;
window.addEventListener("keydown", checkKeyPressed, false);


function checkKeyPressed(evt) {
    console.log(evt.keyCode)
    if (evt.keyCode.toString() === "83" && evt.shiftKey && started === false) {
        start()
    } else if (evt.keyCode.toString() === "83" && evt.shiftKey && started === true) {
        end()
    }
}
function start(){
    document.querySelector("#Username").innerHTML = prompt("Wat is dou naam");
    started = true;
    updateBPM()
    document.getElementById('blackscreen').style.opacity = 1;
    setTimeout(() => {
        document.getElementById('tablebody').style.display = 'none';
    }, 2000);

    setTimeout(() => {
        document.getElementById('ingamebody').style.display = 'flex';
    }, 2000);

    setTimeout(() => {
        document.getElementById('blackscreen').style.opacity = 0;
    }, 2000);

    setTimeout(() => {
        countTimer()
    }, 1000);
}

function end(){
    started = false;
    document.getElementById('blackscreen').style.opacity = 1;

    setTimeout(() => {
        document.getElementById('ingamebody').style.display = 'none';
    }, 2000);

    setTimeout(() => {
        document.getElementById('tablebody').style.display = 'flex';
    }, 2000);

    setTimeout(() => {
        document.getElementById('blackscreen').style.opacity = 0;
    }, 2000);
}

function updateBPM(){
    $( "#bpmtext" ).load("bpm.php");
    if (started){
        setTimeout(updateBPM, 1000);
    }
}


var totalSeconds = 0;
function countTimer() {
    ++totalSeconds;
    var minute = Math.floor(totalSeconds / 60);
    var seconds = totalSeconds - minute * 60;

    if (started == false) {
        totalSeconds = 0;
        minute = 0;
        seconds = 0;
    } else {
        if (minute < 10)
            minute = "0" + minute;
        if (seconds < 10)
            seconds = "0" + seconds;
        document.getElementById("tijd").innerHTML = minute + ":" + seconds;
        setTimeout(() => {
            countTimer()
        }, 1000);
    }
}
