var scheduler = '#eventos';

var datos_evento  = {};

$(document)
  .off('click','.scheduler-event-content')
  .on('click','.scheduler-event-content', function(event) {});
$(document).on('click', '#enviar-evento', fn_guardar_evento);

$(document).ready(function($) {
  finiciar_scheduler();
  $('#evento-crear').click(fn_agregar_evento);
});

function finiciar_scheduler(){
  var datos = [];
  $.get(url('Administracion/get_eventos_ajax')).then(function (data) {
    data = JSON.parse(data);
    data.forEach(function(evento, index){
      datos.push({
        disabled: false,
        content:evento.nombre_evento,
        startDate: new Date(evento.fecha_desde),
        endDate: new Date(evento.fecha_hasta)
      });
    });
  }).then(function(data){
    YUI({lang: 'es-MX'}).use(
      'aui-scheduler',
      function(Y) {
        var eventRecorder = new Y.SchedulerEventRecorder();

        var agenda    = new Y.SchedulerAgendaView({
              isoTime   : true,
              strings: {
                noEvents  : 'No hay acuerdos registrados'
              }
            }),
            calDia    = new Y.SchedulerDayView({
              isoTime   : true,
              strings   : { allDay: 'Todo el día' }
            }),
            calSemana = new Y.SchedulerWeekView({
              isoTime   : true,
              strings   : { allDay: 'Todo el día' }
            }),
            calMes    = new Y.SchedulerMonthView({
              isoTime   : true,
              strings: {
                close   : 'Cerrar',
                show    : 'Mostrar',
                more    : 'más'
              }
            });

        new Y.Scheduler(
          {
            boundingBox : scheduler,
            activeView  : calMes,
            date        : new Date(),
            eventRecorder: eventRecorder,
            items       : datos,
            render      : true,
            strings: {
              agenda  : 'Agenda',
              day     : 'Día',
              month   : 'Mes',
              today   : 'HOY',
              week    : 'Semana',
              year    : 'Año'
            },
            views         : [ agenda, calMes, calSemana, calDia ]
          }
        );
        futil_back_to_top();
      }
    );
  }).catch((error)=>console.log(error));
}

function fn_agregar_evento(e) {
  loader();
  $.get(url('Administracion/modal_evento')).then(function(data){
    return JSON.parse(data);
  }).then(function(data){
    if (data.exito) {
      futil_modal('Registrar', data.html);
    }else{
      futil_toast((data.error)? data.error : '', '', 'danger');
    }
  }).catch(function(error){
    futil_toast(`Ha ocurrido un error<br></br><b>${error.message}</b>`, '', 'danger');
  }).always(function(){
    loader(false);
  })
}

function fn_guardar_evento(){
  var error_event = '';

  datos_evento_aux  = $('#modal-form-evento').serializeArray();
  datos_evento      = (datos_evento_aux) ? datos_evento_aux : datos_evento;

  datos_evento.forEach(function (dato, indice) {
    nombre_evento = $(`#modal-form-evento #${dato.name}`).data('nombre_evento') ? 
    $(`#modal-form-evento #${dato.name}`).data('nombre_evento') : 
    dato.name;

    if (dato.value == '' && $(`#modal-form-evento #${dato.name}`).prop('required')) {
      
      if(dato.name != "nombre_evento"){
        error_event += `El campo <b><a href="#${dato.name}"></a></b> es requerido. <br>`;
        futil_validacion_input($(`#modal-form-evento #${dato.name}`), false);
      }else if(dato.name != "fecha_inicio"){
        error_event += `El campo <b><a href="#${dato.name}"></a></b> debe ser especificado. <br>`; 
        futil_validacion_input($(`#modal-form-evento #${dato.name}`), false);
      }else if(dato.name != "fecha_termino"){
        error_event += `El campo <b><a href="#${dato.name}"></a></b> debe ser especificado <br>`;
      }else{
        futil_validacion_input($(`#modal-form-evento #${dato.name}`), true);
      }
      
    }else{
        futil_validacion_input($(`#modal-form-evento #${dato.name}`), true);
    }
  });

  if (!error_event) {
    futil_alerta('','', "#evento-errores");
    var respuesta = futil_json_query(
      'Administracion/guardar_evento',
      datos_evento
    );
    
    if (respuesta.exito) {
      futil_modal();
      futil_toast('Registro de evento exitoso');
    }else{
      futil_toast(respuesta.error, '', 'danger');
    }
  }else{
    futil_toast("Por favor valide los campos requeridos", '', "danger");
    futil_alerta(errores, 'danger', "#evento-errores");
  }
}