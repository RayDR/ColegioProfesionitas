var scheduler = '#eventos';

var datos_evento  = {};

$(document)
  .off('click','.scheduler-event-content')
  .on('click','.scheduler-event-content', function(event) {});

$(document).ready(function($) {
  // finiciar_scheduler();
  $('#evento-crear').click(fn_agregar_evento);
});

$(document).on('click', '#enviar-evento', fn_guardar_evento);

function finiciar_scheduler(){
  var datos = [];
  eventos.forEach( function(evento, index) {
    datos.push({
      disabled  : false,
      content: evento.evento,
      startDate: new Date(evento.fecha_inicio),
      endDate: new Date(evento.fecha_fin)
    });
  });
    
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

}

function fn_agregar_evento() {
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

// function validaConclusion() {
//   let date = $('#fecha_inicio').val();
//   let fechaOut = $(this).val();
//   if (fechaOut < date) {
//     futil_alerta('Fecha de conclusion no puede ser anterior a la fecha de inicio');
//   }
// }


function fn_guardar_evento(){    
    var error_event = '';
    datos_evento_aux  = $('#modal-form-evento').serializeArray();
    datos_evento      = (datos_evento_aux) ? datos_evento_aux : datos_evento;
    datos_evento.forEach(function (dato, indice) {
      nombre = $(`#modal-form-evento #${dato.name}`).data('nombre') ? 
      $(`#modal-form-evento #${dato.name}`).data('nombre') : 
      dato.name;

      if (dato.value == '' && $(`#modal-form-evento #${dato.name}`).prop('required')) {
        if(dato.name != "cuenta"){
          error_event += `El campo <b><a href="#modal-form-evento #${dato.name}"">${nombre}</a></b> es requerido.<br>`;       
          futil_validacion_input($(`#modal-form-evento #${dato.name}`), false);
        }else
					futil_validacion_input($(`#modal-form-evento #${dato.name}`), true);
      }else if(dato.name == "fecha_inicio" ){
        if (dato.value == '') {
          error_event += `El campo <b><a href="#modal-form-evento #${dato.name}"">${nombre}</a></b> es requerido.<br>`;       
          futil_validacion_input($(`#modal-form-evento #${dato.name}`), false);
        }else
					futil_validacion_input($(`#modal-form-evento #${dato.name}`), true);
      }else if(dato.name == "fecha_termino"){
        if (dato.value == '') {
          error_event += `El campo <b><a href="#modal-form-evento #${dato.name}"">${nombre}</a></b> es requerido.<br>`;       
          futil_validacion_input($(`#modal-form-evento #${dato.name}`), false);
        }else{
          let date = $('#fecha_inicio').val();
          let fechaOut = $('#fecha_termino').val();
          if (fechaOut < date ) {
            error_event += `El campo <b><a href="#modal-form-evento #${dato.name}"">${nombre}</a></b> no puede ser anterior a la fecha inicio. <br>`;
            futil_validacion_input($(`#modal-form-evento #${dato.name}`), false);
          }else{
            futil_validacion_input($(`#modal-form-evento #${dato.name}`), true);
          }  
					futil_validacion_input($(`#modal-form-evento #${dato.name}`), true);
        }
      }
    });

    if (!error_event) {
      futil_alerta('','', "#evento-errores");
      var respuesta = futil_json_query(
        'Administracion/guardar_evento',
        {
          evento  :  datos_evento
        });
      
      if (respuesta.exito) {
        futil_toast('Registro de evento exitoso');

        setTimeout(function () {
          window.location.replace(url('Administracion'));
        }, 500);
      }else{
        futil_toast(respuesta.mensaje, '', 'danger');
      }
    }else{
      futil_toast("Por favor valide los campos requeridos", '', "danger");
      futil_alerta(error_event, 'danger', "#evento-errores");
    }
  }