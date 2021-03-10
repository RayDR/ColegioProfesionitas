var datos = {};
$(document).ready(function () {
    $("#regsitrar-asociado").click(fn_regsitrar_asociado);
    $("#curp").blur(fn_validar_curp);
    $("#email").blur(fn_validar_email);
});

function fn_validar_curp() {
    let curp = $(this).val();
    if (curp.length < 1) {
        return;
    }
    if (!futil_valida_curp(curp))
        futil_toast("Formato de CURP invalido", '', "danger");
}

function fn_validar_email() {
    let mail = $(this).val();
    if (mail.length < 1) {
        return;
    }
    if (!futil_validar_correo(mail)) {
        futil_toast("Formato de correo electronico invalido", '', "danger");
    }
}

function fn_regsitrar_asociado(e) {
    e.preventDefault();
    //val
    var select_asociados = ['nivel_educativo', 'institucion', 'carrera'];
    
    datos_aux = $("#modal-form-registro-asc").serializeArray();
    datos = (datos_aux) ? datos_aux : datos;

    errores = '';

    datos.forEach(function (dato, indice){
        nombre = $(`#modal-form-registro-asc #${dato.name}`).data('nombre') ?
            $(`#modal-form-registro-asc #${dato.name}`).data('nombre') :
            dato.name;
        if (dato.value == '') {
            errores += `El campo <b><a href="#modal-form-registro-asc #${dato.name}">${nombre}</a></b> es requerido.<br>`;
            futil_validacion_input($(`#modal-form-registro-asc #${dato.name}`), false);
        } else if (dato.name == "curp") {
            if (!futil_valida_curp(dato.value)) {
                errores += `La  <b><a href="#${dato.name}">${nombre}</a></b> no es valida.<br>`;
                futil_validacion_input($(`#modal-form-registro-cole #${dato.name}`), false);
            } else
                futil_validacion_input($(`#modal-form-registro-cole #${dato.name}`), true);
        } else
            futil_validacion_input($(`#modal-form-registro-asc #${dato.name}`), true);
    });


    select_asociados.forEach(function (select, indice) {
        if ($(`#${select}`).val() == null) {
            nombre = $(`#modal-form-registro-asc #${select}`).data('nombre') ?
                $(`#modal-form-registro-asc #${select}`).data('nombre') :
                select;
            errores += `Por favor, seleccione un <b><a href="#modal-form-registro-asc #${select}">${nombre}</a></b> válido.<br>`;
            futil_validacion_input($(`#modal-form-registro-asc #${select}`), false);
        }
    });

    if (!errores) {
        futil_alerta('', '', "#errores-form");
        futil_toast("Datos correctos", '', "success");

        var respuesta = futil_json_query('Administracion/guardar_asociado',
            {
                'asociado': datos
            });
    } else {
        futil_toast("Por favor, valide los campos requeridos.", '', "danger");
        futil_alerta(errores, 'danger', "#errores-form");
    }


    
    
}

