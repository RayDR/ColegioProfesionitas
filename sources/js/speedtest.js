var dirImagen   = url('sources/img/SETAB_COLOR.png', false); 
var pesoImagen  = 194085; //Bytes

function MostrarMensajeSpeedTest(msg) {
    var lProgeso = document.getElementById("progress");
    if (lProgeso) {
        var actualHTML = (typeof msg == "string") ? msg : msg.join("<br />");
        lProgeso.innerHTML = actualHTML;
    }
}

function IniciarSpeedTest() {
    MostrarMensajeSpeedTest('<span data-toggle="tooltip" data-placement="bottom" data-title="Probando conexión..."><i class="fas fa-circle-notch fa-spin text-info"></i>Sin conexión</span>');
    window.setTimeout( CalcularVelocidad, 10 );
};    

if (window.addEventListener) {
    window.addEventListener('load', IniciarSpeedTest, false);
} else if (window.attachEvent) {
    window.attachEvent('onload', IniciarSpeedTest);
}

function CalcularVelocidad() {
    var tInicio, tFin;
    var download = new Image();
    download.onload = function () {
        tFin = (new Date()).getTime();
        showResults();
    }
    
    download.onerror = function (err, msg) {
        MostrarMensajeSpeedTest(`<span data-toggle="tooltip" data-placement="bottom" data-title="${dirImagen}"><i class="fas fa-circle-notch fa-spin text-danger"></i>Prueba de conexión fallida.</span>`);
        $('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });
    }
    
    tInicio = (new Date()).getTime();
    
    download.src = dirImagen + futil_cache_buster();
    
    function showResults() {
        var duracion        = (tFin - tInicio) / 1000;
        var bitsCargados    = pesoImagen * 8;

        var speedBps        = (bitsCargados / duracion).toFixed(2);
        var speedKbps       = (speedBps / 1024).toFixed(2);
        var speedMbps       = (speedKbps / 1024).toFixed(2);
        
        $mensaje =  (speedMbps < 2)? `<span data-toggle="tooltip" data-placement="bottom" data-title="${speedMbps}Mbps"><i class="fas fa-circle text-warning"></i> Conectado</span>`: 
                    (speedMbps < 4)? `<span data-toggle="tooltip" data-placement="bottom" data-title="${speedMbps}Mbps"><i class="fas fa-circle text-success"></i> Conectado</span>`:
                    `<span data-toggle="tooltip" data-placement="bottom" data-title="${speedMbps}Mbps"><i class="fas fa-circle text-success"></i> Conectado</span>`;
        MostrarMensajeSpeedTest($mensaje);
        $('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });
    }
}