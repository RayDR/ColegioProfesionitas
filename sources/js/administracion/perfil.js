var datos;
$(document).ready(function () {
    $("#registrar-asociado").click(fn_registrar_asociado);
    $("#curp").blur(fn_validar_curp);
    $("#email").blur(fn_validar_email);
});

function fn_validar_curp(e) {
    let curp = $(this).val();
    if (curp.length < 1) 
        return;
    if (!futil_valida_curp(curp))
        futil_toast("Formato de CURP invalido", '', "danger");
}

function fn_validar_email(e) {
    let mail = $(this).val();

    if (mail.length < 1 || mail == undefined || mail == null )
        return;
    if (!futil_validar_correo(mail)) 
        futil_toast("Formato de correo electronico invalido", '', "danger");
}

function fn_registrar_asociado(e) {
    e.preventDefault();    
    var datos_aux = $('#fregistro-asociado').serializeArray(),
        errores   = '';
    datos = ( !datos_aux )? datos : datos_aux;
    campos_obligatorios = [
        { 'input': 'Nombre(s)', 'id': 'nombre' },
        { 'input': 'Primer apellido', 'id': 'primer_apellido' },
        { 'input': 'Número de Cédula', 'id': 'numero_cedula' }
    ]
    campos_obligatorios.forEach( function(element, index) {
        if ( $(`#${element.id}`).val() == '' || $(`#${element.id}`).val() == null )
            errores += `El campo <a href="#${element.id}">${element.input}</a> es requerido<br>`;
    });
    if (errores == '') {
        futil_alerta('', '', "#errores-form");

        datos.push({ name: "colegio_id", value: $('#colegio_id').val() });

        var respuesta = futil_json_query('Administracion/guardar_asociado', { 'asociado': datos });
        if ( respuesta ){
            if ( respuesta.exito ){
                futil_toast('Asociado registrado', '', "success");
                futil_muestra_vista();
            } else 
                futil_toast(respuesta.mensaje, '', "danger");
        }
    } else {
        futil_toast("Por favor, valide los campos requeridos.", '', "danger");
        futil_alerta(errores, 'danger', "#errores-form");
    }
}