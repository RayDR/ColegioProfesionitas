var scheduler = '#eventos';
var datos_evento  = {};
var dt;

$(document)
  .off('click','#evento-crear, .scheduler-view-table-colgrid')
  .on('click','#evento-crear, .scheduler-view-table-colgrid', fn_agregar_evento);
// Clases de los componentes del calendario.
// .scheduler-event-content, .scheduler-event-title, .scheduler-event, .scheduler-view-table-colgrid, 
// .scheduler-event-content, .scheduler-event-title, .scheduler-event, .scheduler-view-table-colgrid, 
$(document)
  .off('click', '#enviar-evento')
  .on('click', '#enviar-evento', fn_guardar_evento);

$(document)
  .off('click', '.show-evento')
  .on('click', '.show-evento', fn_administrar_evento);

$(document)
  .off('click', '#editar-evento')
  .on('click', '#editar-evento', fn_actualizar_evento);

$(document)
  .off('click', '#eliminar-evento')
  .on('click', '#eliminar-evento', fn_eliminar_evento);

$(document).ready(function($) {
  finiciar_scheduler();
  fn_eventos_dt();
});

function fn_eventos_dt(){
  dt= $("#tb_eventos").DataTable({
    searching: false,
    paging: false,
    info: false,
    bStateSave: true,
    sPaginationType: "full_numbers",
    scrollX: true,
    scrollY: '70vh',
    scrollCollapse: true,
    ajax:{
      url: url('Administracion/get_eventos_ajax'),
      type: "POST",
      dataSrc: ''
    },
    columns:[
      {data: 'nombre_evento'},
      {data: 'fecha_desde'},
      {data: 'fecha_hasta'},
      {data: null,render:function (data) {
        return `<button type="button" class="btn btn-secondary boton-rojo show-evento" data-toggle="tooltip" data-title="Administrar evento"><i class="fa fa-pencil-square-o"></i></button>`;
      }}
    ],
    drawCallback: function (settings) {
        $('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });
    },
    language:{
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    }
  });
}

function finiciar_scheduler(){
  var datos = [];
  $.get(url('Administracion/get_eventos_ajax')).then(function (data) {
    data = JSON.parse(data);
    data.forEach(function(evento, index){
      datos.push({
        disabled: false,
        content: evento.nombre_evento,
        startDate: new Date(evento.fecha_desde),
        endDate: new Date(evento.fecha_hasta)
      });
    });
  }).then(function(data){
    
    YUI({lang: 'es-MX'}).use(
      'aui-scheduler',
      function(Y) {
        // var eventRecorder = new Y.SchedulerEventRecorder();

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
            // eventRecorder: eventRecorder, 
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
  });
}

function fn_guardar_evento(){
  let error_event = '';

  datos_evento_aux  = $('#modal-form-evento').serializeArray();
  console.log(datos_evento_aux);
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
      //actualizo tabla
      $.fn.dataTable.isDataTable('#tb_eventos');
      dt.ajax.reload(null, false);
      // actualizo scheduler
    }else{
      futil_toast(respuesta.error, '', 'danger');
    }
  }else{
    futil_toast("Por favor valide los campos requeridos", '', "danger");
    futil_alerta(errores, 'danger', "#evento-errores");
  }
}

function fn_administrar_evento(params){
  let datos = dt.row($(this).closest('tr')).data();
  let fechIn = datos['fecha_desde'].replace(" ", "T").slice(0,-3);
  let fechOut = datos['fecha_hasta'].replace(" ", "T").slice(0, -3);
  loader();
  $.get(url('Administracion/modal_evento')).then(function(data){
    return JSON.parse(data);
  }).then(function(data){
    if (data.exito) {
      futil_modal('Administrar evento', data.html);
      //reemplazo boton guardar por editar y eliminar
      $('#modal-form-evento').append('<input type="hidden" id="id_evento" name="id_evento" data-nombre="Id de evento"></input>');
      $('#enviar-evento').replaceWith('<input type="button" id="editar-evento" value="Guardar" class="mt-3 px-5 btn btn-secondary boton-rojo boton-evento" data-evento=""></input> <input type="button" id="eliminar-evento" value="Eliminar" class="mt-3 px-5 btn btn-secondary boton-rojo boton-evento" data-evento=""></input>');
      // Seteo campos del input
      $('#id_evento').val(datos['evento_id']);
      $('#nombre_evento').val(datos['nombre_evento']);
      $('#fecha_inicio').val(fechIn);
      $('#fecha_termino').val(fechOut);
    }else{
      futil_toast((data.error)? data.error : '', '', 'danger');
    }
  }).catch(function(error){
    futil_toast(`Ha ocurrido un error<br></br><b>${error.message}</b>`, '', 'danger');
  }).always(function(){
    loader(false);
  });  
}

function fn_actualizar_evento(){
  let error_event = '';

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
      'Administracion/editar_evento',
      datos_evento
    );
    
    if (respuesta.exito) {
      futil_modal();
      futil_toast('Actualización de evento exitoso');
      $.fn.dataTable.isDataTable('#tb_eventos');
      dt.ajax.reload(null, false);
      futil_toast('Tabla actualizada');
      
    }else{
      futil_toast(respuesta.error, '', 'danger');
    }
  }else{
    futil_toast("Por favor valide los campos requeridos", '', "danger");
    futil_alerta(errores, 'danger', "#evento-errores");
  }

}

function fn_eliminar_evento(){
  datos_evento = $('#modal-form-evento').serializeArray();
  var respuesta = futil_json_query(
    'Administracion/eliminar_evento',
    datos_evento
  );
  if (respuesta.exito) {
    futil_modal();
    futil_toast('Evento eliminado');
    $.fn.dataTable.isDataTable('#tb_eventos');
      dt.ajax.reload(null, false);
      futil_toast('Tabla actualizada');
  }else{
    futil_toast(respuesta.error, '', 'danger');
  }
}