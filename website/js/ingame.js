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
    const username = prompt("Wat is uw naam");
    document.querySelector("#Username").innerHTML = username
    started = true;
    $.post("https://89618.stu.sd-lab.nl/LJ2/BEROEPS2/Hartslag/createRow.php",
        {
            username: username,
        },
        function(data, status){
            console.error("Data: " + data + "\nStatus: " + status);
        }
    );
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



function updateBPM(){
    $( "#bpmtext" ).load("bpm.php");
    if (started){
        setTimeout(updateBPM, 1000);
    }
}


let totalSeconds = 0;
let minute = 0
let seconds = 0
function countTimer() {
    ++totalSeconds;
     minute = Math.floor(totalSeconds / 60);
     seconds = totalSeconds - minute * 60;

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

function end(){
    console.log(minute + ":" + seconds);

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