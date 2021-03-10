var datos_asociacion = {},
	datos_colegio    = {},
	redes_sociales   = [];
$(document).off('click.remove', '#remove_red').on('click.remove', '#remove_red', fn_remove_red_social);
$(document).ready(function () {
	$('.cargar_cps').change(cargarCp);
	$('.validar-rfc').blur(validarRFC);
	$('.valdar-curp').blur(validarCurp);
	$('#enviar-registro').click(fn_guardar_registro);
	$('.add-red-social').click(fn_add_red_social);
	$('#email').blur(validarEmail);
	//$('#remove_red').click(fn_remove_red_social);
	//add-red-social
});
function validarEmail() {
	let mail = $(this).val();
	if (mail.length < 1) {
		return;
	}
	if (!futil_validar_correo(mail)) {
		futil_toast("Formato de correo electronico invalido", '', "danger");
	}
}

function validarRFC() {
	let rfc = $(this).val();
	if (rfc.length < 1) {
		return;
	}
	if (!futil_valida_rfc(rfc)) {
		futil_toast("Formato de RFC invalido", '', "danger");
	}
}

function validarCurp() {
	let curp = $(this).val();
	if (curp.length < 1) {
		return;
	}
	if (!futil_valida_curp(curp))
		futil_toast("Formato de CURP invalido", '', "danger");
}

function cargarCp(e) {
	let id = $(this).data("objetivo");
	let muncipio = $(this).val();
	$(id).html(futil_muestra_vista("Administracion/listar_cps/" + muncipio));
}

function fn_guardar_registro() {
	var select_asociacion = ['municipio', 'codigo_postal'],
		select_colegio = ['municipio', 'codigo-postal'],
		errores = '',
		cole_errores = '';

	datos_asociacion_aux = $("#modal-form-registro-asc").serializeArray();
	datos_colegio_aux = $("#modal-form-registro-cole").serializeArray();
	datos_asociacion = (datos_asociacion_aux) ? datos_asociacion_aux : datos_asociacion;
	datos_colegio = (datos_colegio_aux) ? datos_colegio_aux : datos_colegio;

	datos_asociacion.forEach(function (dato, indice) {
		nombre = $(`#modal-form-registro-asc #${dato.name}`).data('nombre') ?
			$(`#modal-form-registro-asc #${dato.name}`).data('nombre') :
			dato.name;
		if (dato.value == '') {
			errores += `El campo <b><a href="#modal-form-registro-asc #${dato.name}">${nombre}</a></b> es requerido.<br>`;
			futil_validacion_input($(`#modal-form-registro-asc #${dato.name}`), false);
		} else if (dato.name == "rfc") {
			if (!futil_valida_rfc(dato.value)) {
				cole_errores += `El <b><a href="#modal-form-registro-asc #${dato.name}">${nombre}</a></b> no es válido.<br>`;
				futil_validacion_input($(`#modal-form-registro-asc #${dato.name}`), false);
			} else
				futil_validacion_input($(`#modal-form-registro-asc #${dato.name}`), true);
		} else
			futil_validacion_input($(`#modal-form-registro-asc #${dato.name}`), true);
	});

	select_asociacion.forEach(function (select, indice) {
		if ($(`#${select}`).val() == null) {
			nombre= $(`#modal-form-registro-asc #${select}`).data('nombre')?
					$(`#modal-form-registro-asc #${select}`).data('nombre'):
					select;
			errores += `Por favor, seleccione un <b><a href="#modal-form-registro-asc #${select}">${nombre}</a></b> válido.<br>`;
			futil_validacion_input($(`#modal-form-registro-asc #${select}`), false);
		} 
	});

	select_colegio.forEach(function (select, indice) {
		if ($(`#${select}`).val() == null) {
			nombre= $(`#modal-form-registro-cole #${select}`).data('nombre')?
					$(`#modal-form-registro-cole #${select}`).data('nombre'):
					select;
			cole_errores += `Por favor, seleccione un <b><a href="#modal-form-registro-cole #${select}">${nombre}</a></b> válido.<br>`;
			futil_validacion_input($(`#modal-form-registro-cole #${select}`), false);
		}
	});

	datos_colegio.forEach(function (dato, indice) {
		nombre = $(`#modal-form-registro-cole #${dato.name}`).data('nombre') ?
		$(`#modal-form-registro-cole #${dato.name}`).data('nombre') :
		dato.name;
		if (dato.value == '') {
			if (dato.name != "cuenta") {
				cole_errores += `El campo <b><a href="#${dato.name}">${nombre}</a></b> es requerido.<br>`;
				futil_validacion_input($(`#modal-form-registro-cole #${dato.name}`), false);
			}
		} else if (dato.name == "rfc_col") {
			if (!futil_valida_rfc(dato.value)) {
				cole_errores += `El  <b><a href="#${dato.name}">${nombre}</a></b> no es valido.<br>`;
				futil_validacion_input($(`#modal-form-registro-cole #${dato.name}`), false);
			} else
				futil_validacion_input($(`#modal-form-registro-cole #${dato.name}`), true);
		} else if (dato.name == "curp") {
			if (!futil_valida_curp(dato.value)) {
				cole_errores += `La  <b><a href="#${dato.name}">${nombre}</a></b> no es valida.<br>`;
				futil_validacion_input($(`#modal-form-registro-cole #${dato.name}`), false);
			} else if(dato.name == "calle_col"){
				cole_errores += `La  <b><a href="#${dato.name}">${nombre}</a></b> no es valida.<br>`;
				futil_validacion_input($(`#modal-form-registro-cole #${dato.name}`), false);
			} else
				futil_validacion_input($(`#modal-form-registro-cole #${dato.name}`), true);
		} else
			futil_validacion_input($(`#modal-form-registro-cole #${dato.name}`), true);
	});

	if (!errores && !cole_errores) {
		futil_alerta('', '', "#ascociacion-errores"); 
		futil_alerta('', '', "#cole-errores");
		futil_toast("Datos correctos", '', "success");

		var respuesta=futil_json_query( 'Administracion/guardar_registro',
										{ 
											asociacion: datos_asociacion,
											colegio   : datos_colegio,
											redes_sociales:redes_sociales
										});
	} else {
		futil_toast("Por favor, valide los campos requeridos.", '', "danger");
		futil_alerta(errores, 'danger', "#ascociacion-errores");
		futil_alerta(cole_errores, 'danger', "#cole-errores");
	}
}

function fn_add_red_social() {
	var red_social = $("#red-social"),
		cuenta = $("#cuenta").val();
	if (red_social.val() != '' && cuenta != '') {
		let duplicado=false;
		redes_sociales.forEach(function (red, indice) {
			if(red.cuenta==cuenta && red.tipo==red_social.val())
			{
				//futil_validacion_input(red_social,false);
				futil_toast('Ya exite esta red social.', '', 'danger');
				duplicado=true;
			}
		});
		if(!duplicado)
		{
		redes_sociales.push({'tipo': red_social.val(), 'cuenta': cuenta,nombre:$("#red-social option:selected").text()});
		fn_actualiza_tabla_redes();
		}
	} else
		futil_toast('Complete los campos de cuenta y tipo de red social.', '', 'danger');
}

function fn_remove_red_social() {
	var fila = $(this).data('indice'),
		tipo = $('.tipo_red_social')
	cuenta = $("#cuenta").val();
	if (fila != null) {
		redes_sociales.splice(fila, 1);
		fn_actualiza_tabla_redes();
	} else
		futil_toast('Falló al intentar borrar la red social registrada.', '', 'warning');
}

function fn_actualiza_tabla_redes() {
	var table = $("#t_redes_sociales");
	table.html(`<tr>
					<th>Cuenta</th>
					<th>Red Social</th>
				</tr>`);

	redes_sociales.forEach(function (red, index) {
		console.log(red.nombre);
		table.append(`
		<tr>		
			<td class="tipo_cuenta">${red.cuenta}</td>
			<td class="tipo_red_social">${red.nombre}<td>
			<td><button class="btn btn-danger" id="remove_red"  data-indice='${index}'><i class="fa fa-trash"></i></button></td>
		</tr>`);
	});
}
