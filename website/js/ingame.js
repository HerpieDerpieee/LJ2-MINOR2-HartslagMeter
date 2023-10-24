let started = false;
window.addEventListener("keydown", checkKeyPressed, false);


function checkKeyPressed(evt) {
    if (evt.keyCode == "83" && started == false) {
        start()
    }else if (evt.keyCode == "83" && started == true){
        end()
    }
function start(){
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
