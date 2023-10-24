window.addEventListener("keydown", checkKeyPressed, false);

function checkKeyPressed(evt) {
    if (evt.keyCode == "83") {
        start()
    }
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
