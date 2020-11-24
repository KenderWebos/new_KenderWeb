const startTime = 30;
let time = startTime * 60;

const countDownElement = document.getElementById("countDown");

actualizarHora();
var idActualizar = setInterval(actualizarHora, 1000);

actualizarHorasBarra();
var idActualizarBarra = setInterval( actualizarHorasBarra , 1000*60*5 );

window.onload = function()
{
    //document.onkeyup = teclas;
    window.addEventListener("keydown", teclas, false);
};

function teclas(key)
{
    if( key.keyCode === 13 )
    {
        getData();
        //se puede poner un .style de un elemento para modificar su parte de style CSS
    }

}

var getData = function()
{
    var inputText = document.getElementById("mainSearch");
    window.open("https://www.youtube.com/results?search_query=" + inputText.value);
    inputText.value = "";
};

var verMasTarde = function()
{
    window.open("https://www.youtube.com/playlist?list=WL");
};

var openUp = function(){
    window.open("https://www.youtube.com/feed/subscriptions");
};

function openTrello(){
    window.open("https://trello.com/b/xLvWi7Wr/things");
}

function actualizarHora()
{
    var fecha = new Date();
    var Mañana = false;
        
    var pHora = document.getElementById("hora");
    var pMensaje = document.getElementById("mensaje");
    
    var hora = fecha.getHours()%12 > 12 ? fecha.getHours()%12 - 12: fecha.getHours()%12;
    var minutos = fecha.getMinutes(); 
    var segundos = fecha.getSeconds();
    
    hora = hora===0 ? 12 : hora; 
    
    hora = hora < 10 ? "0" + hora : hora;
    minutos = minutos < 10 ? "0" + minutos : minutos;
    segundos = segundos < 10 ? "0" + segundos : segundos;
    
    pHora.textContent = "|| " + hora + " :  " + minutos + " : " + segundos + " ||";
            
    if (fecha.getHours()%24 >= 12)
    {
        pMensaje.textContent = "Recuerda que es de tarde.";
        Mañana = false;
    }
    else
    {
        pMensaje.textContent = "Recuerda que es de mañana.";
        Mañana = true;
    }

    if (fecha.getHours()%12 >= 10 && fecha.getHours()%12<=12 && !Mañana)
    {
        pMensaje.textContent+=(" [a mimir...]");
    }
}

function actualizarHorasBarra()
{
    var fecha = new Date();
    var tiempo = (((fecha.getHours() - 8)/14)*100) > 100 ? 100: (((fecha.getHours() - 8)/14)*100);
    tiempo = (((fecha.getHours() - 8)/14)*100) < 0 ? 0: (((fecha.getHours() - 8)/14)*100);
    var precision = ((fecha.getMinutes() / 60)/14) * 100;
    
    document.getElementById("progressBar").value = (tiempo + precision);
}

var idCountDown = null;

function startCountDown()
{
    idCountDown === null ? idCountDown = setInterval(updateCountDown, 1000):null;
    
}

function stopCountDown()
{
    clearInterval(idCountDown);
    idCountDown = null;
}

function restartCountDown()
{
    var pCountDown = document.getElementById("countDown_1");
    stopCountDown();
    timeLeft = 60*30;
    
    var count = 30 + ":" + "00";
    pCountDown.textContent = count;
}

var timeLeft = 60*30;
//document.getElementById("countDownStart").style.

function updateCountDown()
{
    var pCountDown = document.getElementById("countDown_1");
    timeLeft <= 1 ? clearInterval(idCountDown): null;
    timeLeft--;
    
    var minutes = Math.floor( timeLeft/60 );
    var seconds = timeLeft%60;
    
    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;
    
    var count = minutes + ":" + seconds;
    
    pCountDown.textContent = count;
}

function mostrar(){
    document.getElementById("wallpaperHeri").style.display = "block";
}

function ocultar(){
    document.getElementById("wallpaperHeri").style.display = "none";
}
