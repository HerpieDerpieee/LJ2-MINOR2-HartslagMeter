let hartgroot = false

setTimeout(hartklop, 1500)
function hartklop(){
    if(hartgroot == false){
        document.getElementById("hart").style.transform = 'scale(1.1)';
        hartgroot = true;
    }else if (hartgroot == true){
        document.getElementById("hart").style.transform = 'scale(1)';
        hartgroot = false;
    }
    setTimeout(hartklop, 1500)
}
