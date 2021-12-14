var datos;
$(document).ready(function () {
    $("#registrar-asociado").click(fn_registrar_asociado);
    $(".mayusculas").blur(mayusculas);
    $("#curp").blur(fn_validar_curp);
    $("#email").blur(fn_validar_email);
    $('#editar-asociado').click(fn_actualizar_asociado);
    $("#eliminar-asociado").click(fn_eliminar_asociado);
});

function mayusculas(e) {
    this.value = this.value.toUpperCase();
}

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
        { 'input': 'Colegio', 'id': 'colegio_id' },
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
                futil_modal();
            } else 
                futil_toast(respuesta.error, '', "danger");
                futil_alerta('Ya existe registro con el numero de cedula', 'danger', "#errores-form");
        }
    } else {
        futil_toast("Por favor, valide los campos requeridos.", '', "danger");
        futil_alerta(errores, 'danger', "#errores-form");
    }
}

function fn_actualizar_asociado(e){  
    e.preventDefault();
    var datos_aux = $('#editar_asociado').serializeArray(),
        errores   = '';
    datos = ( !datos_aux )? datos : datos_aux;
    campos_obligatorios = [
        { 'input': 'Colegio', 'id': 'colegio_id' },
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

        loader();
        setTimeout(() => {            
            $.post(url('Administracion/editar_asociado'), {asociado: datos})
             .then(data => JSON.parse(data))
             .then(function(data){
                if ( data.exito ){
                    futil_toast('Asociado actualizado', '', "success");
                    futil_modal();
                    if ( dt ){
                        dt.ajax.reload(null, false);
                        futil_toast('Tabla actualizada.');
                    }
                } else 
                    futil_toast(data.error, '', "danger");
             })
             .catch(error => futil_toast('No se pudo realizar la operación', '', 'danger'))
             .always(() => loader(false));
        }, 100);
    } else {
        futil_toast("Por favor, valide los campos requeridos.", '', "danger");
        futil_alerta(errores, 'danger', "#errores-form");
    }
  
  }


function fn_eliminar_asociado(){
    datos = $('#editar_asociado').serializeArray();
    var respuesta = futil_json_query('Administracion/eliminar_asociado', { 'asociado': datos });
    if (respuesta.exito) {
      futil_toast('Asociado eliminado');
      futil_modal();
    }else{
      futil_toast(respuesta.error, '', 'danger');
      futil_modal();
    }
  }

