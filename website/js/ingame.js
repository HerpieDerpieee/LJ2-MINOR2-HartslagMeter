let started = false;
window.addEventListener("keydown", checkKeyPressed, false);


function checkKeyPressed(evt) {
    console.log(evt.keyCode)
    if (evt.keyCode.toString() === "83" && started === false) {
        start()
    } else if (evt.keyCode.toString() === "83" && started === true) {
        end()
    }
}
function start(){
    started = true;
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
