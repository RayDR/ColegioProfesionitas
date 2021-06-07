var scheduler = '#eventos';

$(document)
  .off('click','.scheduler-event-content')
  .on('click','.scheduler-event-content', function(event) {});

$(document).ready(function($) {
  finiciar_scheduler();
});

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