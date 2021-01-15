var menuFlotante = false;
$(document)
		.off('change', '#form-registro-municipio')
		.on('change', '#form-registro-municipio', fn_municipio_colonias);
$(document)
		.off('click', '#form-registro-solicitar')
		.on('click', '#form-registro-solicitar', fn_solicitar_registro);
$(document).ready(fn_iniciar_sistema);

function fn_iniciar_sistema(){
	loader(false);
	$('[data-toggle="popover"]').popover({ container: 'body' });
	$('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });

	$(window).scroll(function(event) {
		var scrollPosicion = $(this).scrollTop();
		// Cambiar menú inicio de sesión
		if ( scrollPosicion > $("#menul_scroller").offset().top ){			
			$("#form-inicio-sesion").addClass('inicio-sesion-alt');
			$("#menul_flotante").addClass('fixed-top bg-light');
			$("#menul_flotante").removeClass('p-2').addClass('p-1');
			$("#menul_flotante").children().removeClass('text-white');
			$("#menu-superior-flotante").children()
												 .children()
												 .children('a').removeClass('text-white');
			if ( ! menuFlotante ){
				menuFlotante = true;
				$("#menul_flotante").hide();
				$("#menul_flotante").fadeIn('slow');
			}
		} else {
			menuFlotante = false;
			$("#form-inicio-sesion").removeClass('inicio-sesion-alt');
			$("#menul_flotante").removeClass('fixed-top bg-light');
			$("#menul_flotante").removeClass('p-1').addClass('p-2');
			$("#menul_flotante").children().addClass('text-white');
			$("#menu-superior-flotante").children()
												 .children()
												 .children('a').addClass('text-white');
		}
	});

	$("#menul_scroller a").on('click', function(event) {
		if (this.hash !== "") {
			var hash = this.hash;
			event.preventDefault();
			$('html, body').stop().animate(
				{scrollTop: $(this.hash).offset().top-80},
				800);
		}
	});

	$("#form-registro").click(function(event) {
		if ( $("#modal-form-registro").html() != undefined )
			$('#modal').modal('show');
		else 
			futil_modal(
				'Solicitud de Registro', 
				futil_muestra_vista('index.php/Inicio/registro'), 
				`<button id="form-registro-solicitar" type="button" class="btn btn-secondary boton-rojo px-5">Solicitar</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>` );
	});

	$("#inicio-sesion").click(function(e) {
		e.preventDefault();
		if ( $('#form-inicio-sesion').is(':visible') )
			$('#form-inicio-sesion').fadeOut(150);
		else
			$('#form-inicio-sesion').fadeIn(250);
	});

	$("#is-acceder").click(function (e) {
		e.preventDefault();
		let acceso  = true, mensaje = '',
			 inputs 	= [ {nombre: 'correo_electronico', id: 'is-correo'},
							 {nombre: 'password', id: 'is-password'}];

		if ( $("#form-inicio-sesion #is-correo").val().length < 10 ){
			mensaje += 'Ingrese un <b>correo electrónico</b> válido.<br>';
			acceso = false;
		}
		if ( $("#form-inicio-sesion #is-password").val().length < 6 ){
			mensaje += 'Ingrese una <b>contraseña</b> válida.<br>';
			acceso = false;
		}
		if ( ! acceso ){
			futil_alerta(mensaje,'danger','#form-inicio-sesion');
			return;
		}

		var datos_acceso 	= $("#form-inicio-sesion input").serializeArray();

		$.ajax({
	      url   : url('Inicio/acceder'),
	      type  : 'POST',
	      async : false,
	      data  : datos_acceso,
	      beforeSend: function(data, textStatus, xhr) {
	      	$("#form-inicio-sesion #is-acceder").attr('disabled', true);
	      	$("#form-inicio-sesion #is-acceder").html('Ingresando <i class="fas fa-spinner fa-spin"></i>')
	      },
	      success: function(data, textStatus, xhr) {
	         try {
	            data = JSON.parse(data);
	            if ( data.exito ){
	            	futil_alerta(data.mensaje,'success','#form-inicio-sesion');
	            	$("#form-inicio-sesion #is-acceder").html('Redirigiendo <i class="fas fa-spinner fa-spin"></i>');
	            	futil_redirige('Administracion');
	            }
	            else 
	            	futil_alerta(data.mensaje,'danger','#form-inicio-sesion');
	         } catch(e) {
	            futil_modal('ERR', e);
	         }
	      },
	      complete: function(){
	      	$("#form-inicio-sesion #is-acceder").attr('disabled', false);
	      	$("#form-inicio-sesion #is-acceder").text('Ingresar');
	      }
	   });
	});
}

function fn_municipio_colonias(){
	var municipio_id = $(this).val();
	$("#form-registro-colonia").html('<option selected disabled>Seleccione una opción</option>');
	colonias.forEach( function(colonia, index) {
		if ( colonia.municipio_id == municipio_id )
			$("#form-registro-colonia")
					.append(`<option value="${colonia.codigo_postal_id}">${colonia.d_asenta}</option>`);
	});
}

function fn_solicitar_registro(){
	if ( validar_registro() ){
		var datos_registro = $("#modal-form-registro").serializeArray();
		$.ajax({
	      url   : url('Inicio/guardar_preregistro'),
	      type  : 'POST',
	      async : false,
	      data  : datos_registro,
	      beforeSend: function(data, textStatus, xhr) {
	      	$("#form-registro-solicitar").attr('disabled', true);
	      	$("#form-registro-solicitar").html('Guardando <i class="fas fa-spinner fa-spin"></i>')
	      },
	      success: function(data, textStatus, xhr) {
	         try {
	            data = JSON.parse(data);
	            if ( data.exito ){
	            	futil_toast('Solicitud exitosa');
	            	registro_existoso();
	            }
	            else 
	            	futil_toast(data.error,'', 'warning');
	         } catch(e) {
	            futil_toast('Error','Error al generar la solicitud<br>' + e, 'danger');
	         }
	      },
	      complete: function(){
	      	$("#form-registro-solicitar").attr('disabled', false);
	      	$("#form-registro-solicitar").text('Solicitar');
	      }
	   });
	}
}

function limpiar_registro(){
	let inputs 	= [ 'nombre','papellido','sapellido','rfc','colegio',
						 'calle','numero','email','telefono'];
	inputs.forEach( function(input, index) {
		$(`#modal-form-registro #form-registro-${input}`).val('')
																		 .removeClass('is-valid')
																		 .removeClass('is-invalid');
	});
	$("#form-registro-municipio").removeClass('is-valid')
										  .removeClass('is-invalid')
										  .val( $("#form-registro-municipio option:first").val() );
	$("#form-registro-colonia").removeClass('is-valid')
										.removeClass('is-invalid')
										.html('<option selected disabled>Seleccione primero un municipio</option>');
}

function registro_existoso(){
	$("#modal-form-registro").parent().html(`
		<div class="container">
			<div class="row">
				<div class="col-2">
					<span class="text-success display-1 text-center my-auto"><span class="font-weight-bold"><i class="far fa-check-circle"></i></span></span>
				</div>
				<div class="col-10">
					<span class="text-success display-4">Su registro se ha completado con éxito.</span>
				</div>
			</div>
		</div>
	`);
	$("#form-registro-solicitar").html('');
}

function validar_registro(){
	let exito 	= true, errores = [];
	let inputs 	= [ { id: 'nombre', 		nombre: 'Nombre' },
						 { id: 'papellido', 	nombre: 'Primer apellido' },
						 { id: 'sapellido', 	nombre: 'Segundo apellido', opcional: true },
						 { id: 'rfc', 			nombre: 'RFC' },
						 { id: 'colegio', 	nombre: 'Nombre de Colegio ó Asociación' },
						 { id: 'municipio', 	nombre: 'Municipio', error: 'requiere una opción valida' },
						 { id: 'colonia', 	nombre: 'Colonia', 	error: 'requiere una opción valida' },
						 { id: 'calle', 		nombre: 'Calle' },
						 { id: 'numero', 		nombre: 'Número' },
						 { id: 'email', 		nombre: 'Correo electrónico' },
						 { id: 'telefono', 	nombre: 'Número telefónico', opcional: true } ];

	inputs.forEach( function(input, index) {
		let valor = $(`#modal-form-registro #form-registro-${input.id}`).val();
		if ( valor == "" || valor == undefined ){
			if ( ! input.opcional ){
				$(`#modal-form-registro #form-registro-${input.id}`).removeClass('is-valid').addClass('is-invalid');
				exito = false;
				errores.push(input);
			}
		} else {
			$(`#modal-form-registro #form-registro-${input.id}`).removeClass('is-invalid').addClass('is-valid');
			if ( input.id == 'rfc' ){
				if ( futil_valida_rfc( valor ) )
					$(`#modal-form-registro #form-registro-${input.id}`).removeClass('is-invalid').addClass('is-valid');
				else {
					$(`#modal-form-registro #form-registro-${input.id}`).removeClass('is-valid').addClass('is-invalid');
					exito = false;
					input.error = ["es inválido"];
					errores.push(input);
				}
			}
		}		
	});
	if ( ! exito ){
		var mensaje_error 	= '';
		errores.forEach( function(error, index) {
			mensaje_error += `El campo <b>${error.nombre}</b> ${( error.error )? error.error : 'es requerido'}.<br>`;
		});
		futil_alerta(mensaje_error,'warning', '#modal-form-registro', false, true);
	}
	return exito;
}