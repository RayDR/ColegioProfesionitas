var dt;
$(document).ready(function () {
    fn_iniciar_dt();

    $('#asociado-agregar').click(fn_agregar_asociado);
});

function fn_iniciar_dt() {
    dt = $("#dtAsociados").DataTable({
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
                    if ($.fn.dataTable.isDataTable('#dtAsociados')) {
                        dt.ajax.reload(null, false);
                        futil_toast('Tabla actualizada.');
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
            url: url('Administracion/get_datatable_asociados'),
            type: "POST",
            dataSrc: ''
        },
        columns: [
            { data: 'curp' },
            { 
                data: null,
                render: function(data){
                    return `${data.nombres} ${data.primer_apellido} ${data.segundo_apellido}`;
                }
            },
            { data: 'carrera' },
            { data: 'numero_cedula' },
            { data: 'fecha_sercp' },
            { data: 'telefono' },            
        ],
        drawCallback: function (settings) {
            $('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });

            $('tr td').click(fn_mostrar_asociado);
        },
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
        }
    });
}

function fn_ver_detalle(params) {
    var datos = dt.row($(this).closest('tr')).data();
    futil_modal(
        datos.nombre_colegio,
        futil_muestra_vista(
            "Administracion/modal_colegio",
            datos
        ),
        '',
        'xl'
    );
}

function fn_agregar_asociado(e){
    loader();
    $.get(url('Administracion/modal_asociado')).then(function(data){
        return JSON.parse(data);
    }).then(function(data){
        if( data.exito ){
            futil_modal('Registrar ', data.html);
        } else 
            futil_toast( (data.error)? data.error: '', '', 'danger');
    }).catch(function(error){
        futil_toast(`Ha ocurrido un error<br><b>${error.message}</b>`, '', 'danger');
    }).always(function(){
        loader(false);
    });
}

function fn_mostrar_asociado(){
    var data = dt.row($(this).closest('tr')).data();
    console.log(data);
    return;
   loader();
    $.post(url('Administracion/editar_asociado'), {}).then(function(data){
        return JSON.parse(data);
    }).then(function(data){
        if( data.exito ){
            futil_modal('Registrar ', data.html);
        } else 
            futil_toast( (data.error)? data.error: '', '', 'danger');
    }).catch(function(error){
        futil_toast(`Ha ocurrido un error<br><b>${error.message}</b>`, '', 'danger');
    }).always(function(){
        loader(false);
    });
}