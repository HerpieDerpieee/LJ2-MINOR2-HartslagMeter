document.addEventListener("load", updateBPM())

function updateBPM(){
    $( "#bpmtext" ).load("bpm.php");
    setTimeout(updateBPM, 1000);
}