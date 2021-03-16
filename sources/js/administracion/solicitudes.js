var dt;
var estatus_;

$(document).off('click.aprobar', '#enviar-registro').on('click.aprobar', '#enviar-registro', fn_aprobar);
$(document).ready(function($) {
	fn_inciar_datatable();
});

function fn_inciar_datatable(){
	dt = $("#dtSolicitudes").DataTable({
        bStateSave: true,
        sPaginationType: "full_numbers",
        scrollX: true,
        scrollY: '70vh',
        scrollCollapse: true,
        //dom: '<"row text-center mb-3"<"col-md-6"B><"#dtBusquedaAvanzada.col-md-6"Q>><"row d-flex justify-content-between"<"col-6"l><"col-6"f>>tip',
        dom: '<"row text-center mb-3"<"col-12"B>><"row d-flex justify-content-between"<"col-6"l><"col-6"f>>t<"mb-3"i>p',
        buttons: [
            {
                text: 'Actualizar',
                action: function (e, dt, node, config) {
                    $(this).prop({ disabled: true });
                    if ($.fn.dataTable.isDataTable('#dtSolicitudes')) {
                        fn_actualizar_dt();
                    } else
                        $(this).prop({ disabled: true });
                }
            },
            { extend: 'excel' },
            { extend: 'csv' },
            { extend: 'pdf' },
            {
                extend: 'colvis',
                text: 'Columnas',
                columns: ':gt(0)',
            }
        ],
        ajax: {
            url: url('Administracion/get_solicitudes_ajax', true, false),
            type: "POST",
            dataSrc: ''
        },
        columns: [
            { data: 'solicitud_registro_id' },
            { data: 'rfc' },
            { data: 'nombre_asociacion' },
            {
            	data   : null,
            	render : function (data){
            		return `${data.solicitante_nombre} ${data.solicitante_primer_apellido} ${data.solicitante_segundo_apellido}`;
            	}
            },
            {
            	data   : null,
            	render : function (data){
            		return `${data.calle} #${data.numero}`;
            	}
            },
            { data: 'fecha_solicitud' },
            { data: 'solicitante_email' },
            { data: 'solicitante_telefono' },
            {
            	data   : null,
            	render : function (data){
            		let color = (data.estatus == 'Pendiente')? 'secondary': 
            					(data.estatus == 'Aprobado')?  'success'  : 
            					(data.estatus == 'Rechazado')? 'danger'   : 'dark';
            		return `<span class="badge badge-pill badge-${color}">${data.estatus}</span>`;
            	}
            },
            { 
            	data   : null,
            	render : function (data) {
            		if ( data.estatus == 'Aprobado' )
            			return '';
                	return `<div class="dropdown">
								<button class="btn boton-bordes-rojos rounded py-0 px-2 dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Cambiar estatus
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" onclick="fn_cambiar_estatu(${data.solicitud_registro_id}, 1)">Pendiente</a>
									<a class="dropdown-item" onclick="fn_cambiar_estatu(${data.solicitud_registro_id}, 2)">Aprobar</a>
									<a class="dropdown-item" onclick="fn_cambiar_estatu(${data.solicitud_registro_id}, 3)">Rechazar</a>
								</div>
							</div>`;
                }
            }
            
        ],
        drawCallback: function (settings) {
            $('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });
        },
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
        }
    });
}

function fn_cambiar_estatu(solicitud, estatus) {
	estatus_ = estatus;
	if ( estatus == 2 ){
		var html = futil_muestra_vista( url(`Administracion/modal_aprobar_solicitud/${solicitud}`, true, false) );
		futil_modal(
			'Formulario de Aprobación de Solicitud' ,
			html, '', 'xl'
		);
	} else
		fn_actualiza_estatus_solicitud(solicitud, estatus);	
}

function fn_aprobar(){
	var solicitud = $(this).data('solicitud');
    if ( estatus_ == 2 ){
    	if ( solicitud ){
    		futil_modal();
    	}
    }
}

function fn_actualizar_dt(mensaje = '', tipo = ''){
	dt.ajax.reload(null, false);
	mensaje = ( mensaje == '' )? 'Tabla actualizada.': mensaje;
	tipo    = ( tipo == '' )? 'success' : tipo;
	futil_toast(mensaje, '', tipo);
}