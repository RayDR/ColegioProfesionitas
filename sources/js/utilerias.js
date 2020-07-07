$(document).off("change.caracteres_prohibidos", ".util_normaliza").on("change.caracteres_prohibidos", ".util_normaliza", fn_normaliza_caracteres);
$(document).off("keypress.solo_numeros", ".util_snumeros").on("keypress.solo_numeros", ".util_snumeros", fn_solo_numeros);
$(document).off('click', '.alert-close').on('click', '.alert-close', function() {
	$(this).parent().hide();
});
$(document).off("click.mostrar", ".submenu").on("click.mostrar", ".submenu", fn_muestra_vista);
$(document).off("click.back-to-top", ".back-to-top").on("click.back-to-top", ".back-to-top", fn_back_to_top);

$(window).scroll(fn_window_scroll);

/**  ********************************************************
**                    FUNCIONES GENERALES                   
** ********************************************************/

function fn_loader(opcion = true){
	let loader = $("#loader");
	let bg_loader = $("#loader-background");
	if ( opcion == true ){
		bg_loader.fadeIn('fast');
		loader.fadeIn('fast');
	}else {
		bg_loader.fadeOut(600);
		loader.fadeOut(600);
	}
}

function url(url = "", comodin = true){
	url = (comodin)? "index.php/" + url : url;
	return $("#base_url").val() + url;
}

/**
 *	Función que habilita la alerta debajo del título
 *	Requiere un mensaje para mostrarse
 *	Colores: peligro	-	rojo
 *			 alerta		-	amarillo
 *			 atencion	-	dorado
 *			 exito		-	verde
 *			 mensaje	-	azul
 *	(Por defecto tomará color: azul)
 */
function alerta_mensaje(mensaje = "", tipo_mensaje = "mensaje", html=false){
	let alerta = $("#alert-mensaje");
	if(mensaje == ""){
		alerta.hide('slow');
		return;
	}
	if(tipo_mensaje == "peligro"){
		alerta.removeClass();
		alerta.addClass('alert alert-danger');
	} else if(tipo_mensaje == "alerta"){
		alerta.removeClass();
		alerta.addClass('alert alert-warning');
	} else if(tipo_mensaje == "atencion"){
		alerta.removeClass();
		alerta.addClass('alert alert-secondary');
	} else if(tipo_mensaje == "exito"){
		alerta.removeClass();
		alerta.addClass('alert alert-success');
	} else {
		alerta.removeClass();
		alerta.addClass('alert alert-info');
	}
	if ( html == true )
		alerta.children("span").html(mensaje);
	else
		alerta.children("span").text(mensaje);
	alerta.attr({
		hidden: false
	});
	window.scrollTo(0,0);
	alerta.show('fast');
	alerta.fadeIn('fast');
	alerta.slideDown('slow');
}

/**
 *	Función que habilita el modal
 *		Recibe:
 *				Titulo 		-	Cabezara
 *				Contenido 	-	Cuerpo
 *				Botones 	-	Pie
 *	Requiere un contenido para motrarse
 *	Parametro html = true para insertar código HTML
 */
function modal_mensaje(titulo, contenido = "", botones = "", html = false){
	let modal = $("#modal-mensajes");	
	if(contenido == ""){
		modal.modal('hide');
		if ( titulo == "ERR"){
			titulo = "ERROR NO CONTROLADO";
			contenido = "Ha ocurrido un error al intentar ingresar al sistema, por favor, comunique al administrador del sistema.";
		}
		else if ( titulo == "CNX"){
			titulo = "FALLÓ LA CONEXIÓN";
			contenido = "No se pudo contectar al servidor, por favor verifique su conexión a internet.";
		}
		else if ( titulo == "404"){
			titulo = "404 - Página no encontrada";
			contenido = "No se localizó la página que estaba consultado.";
		}
		else
			return;
	}
	if ( html ){
		$("#modal-mensaje-titulo").html(titulo);
		$("#modal-mensaje-contenido").html(contenido);
	}else {
		$("#modal-mensaje-titulo").text(titulo);
		$("#modal-mensaje-contenido").text(contenido);
	}

	$("#modal-mensaje-botones").html(botones);

	modal.modal('show');
}

function modal_video(){
	let modal = $("#modal-video");

	let srcVideo = $(this).data('src');
	let autoplay = $(this).data('autoplay');

	autoplay = (autoplay)? '?autoplay=1' : '';
	$(modal + ' iframe').attr('src', ( srcVideo + autoplay ));

	modal.modal('show');
}

/**  ********************************************************
**                  FIN FUNCIONES GENERALES                 
** ********************************************************/

var normalizar = (function() {
  var no_permitidos = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç'´`^~",
	 permitidos = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuuÑñCc     ",
	 mapeo = {};

  for (var i = 0, j = no_permitidos.length; i < j; i++)
	 mapeo[no_permitidos.charAt(i)] = permitidos.charAt(i);

  return function(str) {
	 var ret = [];
	 for (var i = 0, j = str.length; i < j; i++) {
		var c = str.charAt(i);
		if (mapeo.hasOwnProperty(str.charAt(i)))
		  ret.push(mapeo[c]);
		else
		  ret.push(c);
	 }
	 return ret.join('');
  }
})();

function codifica_utf8( cadena ){
	return window.btoa( unescape( encodeURIComponent( cadena ) ) );
}

function decodifica_utf8( cadena ){
	return decodeURIComponent( escape( window.atob( cadena ) ) );
}

function fn_normaliza_caracteres(){
	let cadena_normalizar = $(this).val();
	let cadena_normalizada = normalizar(cadena_normalizar);
	$(this).val(cadena_normalizada.trim().toUpperCase());
}

function fn_validar_correo(email) {
  return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email);
}

function fn_solo_numeros( e ){
	if( e.keyCode < 48 || e.keyCode > 57 )
		return false;
}

function input_valido(id, opcion = true){
  if (opcion){    
	 $("#" + id).removeClass('text-danger');
	 $("#" + id).addClass('text-success');
  } else {    
	 $("#" + id).removeClass('text-success');
	 $("#" + id).addClass('text-danger');
  }
}

function fn_valida_password(password){
  	let valoraciones = [];
  	if ( password.leght < 7 || password == '')
		valoraciones.push(
			{
			  'valoracion'	: 	'longitud',
			  'resultado'	: 	false,
			  'leyenda' 	: 	`<small class="text-danger"><span class="mdi mdi-close"> Debe ser mayor a 6 caracteres</span></small>`,
			  'mensaje'		: 	'La contraseña debe ser mayor a 6 caracteres'
			}
		);
	else 
		valoraciones.push(
			{
			  'valoracion'	: 	'longitud',
			  'resultado'	: 	true,
			  'leyenda' 	: 	`<small class="text-success"><span class="mdi mdi-check"> Debe ser mayor a 6 caracteres</span></small>`,
			}
		);

  	if ( ! password.match(/[a-z]/) )
		valoraciones.push(
			{
			  'valoracion'	: 	'minuscula',
			  'resultado'	: 	false,
			  'leyenda'		: 	`<small class="text-danger"><span class="mdi mdi-close"> Incluir minúscula</span></small>`,
			  'mensaje' 	: 	'La contraseña debe contener al menos una letra minúscula'
			}
		);
	else 
		valoraciones.push(
			{
			  'valoracion'	: 	'minuscula',
			  'resultado'	: 	true,
			  'leyenda'		: 	`<small class="text-success"><span class="mdi mdi-check"> Incluir minúscula</span></small>`,
			}
		);

  	if ( ! password.match(/[A-Z]/) )
		valoraciones.push(
			{
			  'valoracion'	: 	'mayuscula',
			  'resultado': 	false,
			  'leyenda' : `<small class="text-danger"><span class="mdi mdi-close"> Incluir mayúscula</span></small>`,
			  'mensaje' : 'La contraseña debe contener al menos una letra mayúscula'
			}
		);
	else 
		valoraciones.push(
			{
			  'valoracion'	: 	'mayuscula',
			  'resultado'	: 	true,
			  'leyenda' 	: 	`<small class="text-success"><span class="mdi mdi-check"> Incluir mayúscula</span></small>`,
			}
		);

  	if ( ! password.match(/\d/) )
		valoraciones.push(
			{
			  'valoracion'	: 	'numero',
			  'resultado'	: 	false,
			  'leyenda' 	: 	`<small class="text-danger"><span class="mdi mdi-close"> Incluir número</span></small>`,
			  'mensaje' 	: 	'La contraseña debe contener al menos un número'
			}
		);
	else 
		valoraciones.push(
			{
			  'valoracion'	: 	'numero',
			  'resultado'	: 	true,
			  'leyenda' 	: `<small class="text-success"><span class="mdi mdi-check"> Incluir número</span></small>`,
			}
		);

  	return valoraciones;
}

function muestra_password(){
	let span = $(this);
	let tipo_input = span.parent().parent().children('input')[0];
	if ( tipo_input.type == "password" ){
		tipo_input.type = "text";
		span.children('span').removeClass();
		span.children('span').addClass('mdi mdi-eye-off');
	}
	else {
		tipo_input.type = "password";
		span.children('span').removeClass();
		span.children('span').addClass('mdi mdi-eye');
	}

}

function fn_muestra_vista(){
	let uri = $(this).data("url");
	if ( uri != "#" ){
		$.ajax({
			url: url(uri + "_ajax"),
			type: 'POST',
			beforeSend: function() {
				fn_loader(true);
			},
			success: function(data, textStatus, xhr) {
				$("#ajax_html").html(data);
			},
			complete: function(){
				fn_loader(false);
			}
		});
		
	}
}

function fn_window_scroll(){
	if ( $(this).scrollTop() > 100 )
		$('.back-to-top').fadeIn(100);
	else
		$('.back-to-top').fadeOut(100);
}

function fn_back_to_top(){
	$('html, body').animate( { scrollTop : 0 }, 300 );
}