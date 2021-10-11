var dt;
$(document).off("click", ".ver-detalle").on("click", ".ver-detalle", fn_ver_detalle);
$(document).ready(function () {
    fn_iniciar_dt();
});

function fn_iniciar_dt() {
    dt = $("#tb_colegios").DataTable({
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
                    if ($.fn.dataTable.isDataTable('#tb_colegios')) {
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
            url: url('Administracion/get_colegios_ajax'),
            type: "POST",
            dataSrc: ''
        },
        columns: [
            { data: 'nombre_colegio' },
            { data: 'curp' },
            { data: 'rfc_colegio' },
            { data: 'nombre' },
            { data: 'domicilio' },
            {
                data: null,
                visible: false,
                render: function(data){
                    if ( data.mapa )
                        return `<a href="${data.mapa}" target="_blank">Abrir mapa</a>`;
                    return '';
                }
            },
            { data: 'fecha' },
            { data: 'periodo_mesa_directiva' },
            {data: null,render:function (data) {
                // return `<button type="button" class="btn btn-secondary btn-sm mr-1 boton-rojo ver-detalle" data-toggle="tooltip" data-title="Ver detalle"><i class="fas fa-search"></i></button><button type="button" class="btn btn-secondary btn-sm mr-1 boton-rojo " data-toggle="tooltip" data-title="Ocultar colegio"><i class="fas fa-eye-slash"></i></button>`;
                return `<button class="btn btn-secondary dropdown-toggle"  type="button" id="dropdownMenu" data-toggle="dropdown" arias-haspopup="true" aria-expanded="false"></button> <div class="dropdown-menu" aria-labelledby="dropdown-menu"> <a class="dropdown-item"> <button type="button" class="btn btn-secondary btn-sm mr-1 boton-rojo ver-detalle" data-toggle="tooltip" data-title="Ver detalle"><i class="fas fa-search"></i></button> <button type="button" class="btn btn-secondary btn-sm mr-1 boton-rojo " data-toggle="tooltip" data-title="Ocultar colegio"><i class="fas fa-eye-slash"></i></button> <button type="button" class="btn btn-secondary btn-sm boton-rojo " data-toggle="tooltip" data-title="Eliminar colegio"><i class="fas fa-trash"></i></button> </a></div> `;
            }}
            // { data: null, render: function(data){
            //     return  `<button type="button" class="btn btn-secondary btn-sm boton-rojo " data-toggle="tooltip" data-title="Eliminar colegio"><i class="fas fa-trash"></i></button>`
            // }}
            
        ],
        drawCallback: function (settings) {
            $('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });
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