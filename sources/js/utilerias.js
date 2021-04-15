/*
|----------------------------------
| VARIABLE GLOBALES DE CONTROL
|--------------------------------------------------------------------------
*/

var cargandoVista = false;

/*
|--------------------------------------------------------------------------
| FUNCIONES GENERALES
|--------------------------------------------------------------------------
*/

// Función de animación de carga del sistema
function loader(opcion = true){
  let loader = $("#loader");
  if ( opcion == true ){
    if ( loader.is(":visible") == false )
      loader.fadeIn('fast');
  }
  else 
    loader.fadeOut(1500);  
}

// Función para reducir la llamada a la url base del sistema
function url(url = "", comodin = true, hash = true){
  url = (comodin)? "index.php/" + url : url;
  if ( hash )
    return $("#base_url").val() + url + futil_cache_buster();
  else
    return $("#base_url").val() + url;
}

function futil_cache_buster(){
  var hash = ( new Date() ).getTime();
  return `?${hash}`;
}

/**
|   Función que muestra alertas si se incluye el apartado en el HTML
|     Parámetros:
|               @param mensaje    -   Contenido de la alerta
|               @param color      -   Color de la alerta
|               @param contenedor -   Padre del objeto alert
|               @param apilar     -   Activa/descativa el apilar de las alertas
*/
function futil_alerta(mensaje = '', color = '', contenedor = '', apilar = false, scroll= true){
  let alerta  = $(`${contenedor} #alertas`);
  color       = ( color == '' )? 'info' : color;

  if ( mensaje == '' ){ // Eliminar alertas
    alerta.html('');
    return;
  }

  let html    = `
    <div tabindex="-1" class="alert alert-${color}" role="alert">    
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <span>${mensaje}</span>
    </div>
  `;
  if ( apilar )
    alerta.append(html);
  else 
    alerta.html(html);
  if ( scroll )
    futil_back_to_top();
}

/**
|   Función que habilita las notificaciones tipo toast
|       Recibe:
|               Encabezado     -   Cabecera
|               Notificacion   -   Cuerpo
|               Tipo           -   Color
|               Duracion       -   3.5 segundos por defecto
|   Cambia el estilo si solo se ingresa la Cabecera
|   Apilable si se invoca más de 1 vez
*/
function futil_toast(encabezado = "", notificacion = "", tipo = "success", duracion = 5){
  let notificaciones = $("#notificaciones");

  let color   = (tipo == "rojo")?   "fondo-rojo": 
                (tipo == "verde")?  "fondo-verde": 
                (tipo == "dorado")? "fondo-dorado": 
                "bg-" + tipo;
  let texto   = (tipo == "muted" || tipo == "light" || tipo == "white")? "texto-rojo" : 
                "text-white";

  let titulo  = "";

  if ( ( notificacion == "" || notificacion == null ) && encabezado != "" ){
    notificacion  = encabezado;
    encabezado    = "";
  }

  if ( encabezado != "" )
    titulo = `
      <div class="toast-header">
        <div class="`+ color +` rounded mr-2" style="width: 20px; height: 20px;"></div>
        <strong class="mr-auto">`+ encabezado +`</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>`;

  var toast_html = `
    <div class="toast `+ color +`" role="alert" aria-live="assertive" aria-atomic="true" data-delay="`+ duracion * 1000 +`" style="min-width: 350px;">
      `+ titulo +`
      <div class="toast-body `+ texto +`">
      `+ notificacion +`
      </div>
    </div>
  `;
  notificaciones.append(toast_html);

  $(".toast").toast('show');

  setTimeout(function() {
      $('.toast').each(function(index, tostada) {
        if ( index > 0 )
          notificaciones.append(tostada);
        else 
          notificaciones.html('');
      });
  }, duracion * 1000);
}

function futil_close_toast(){ $(this).hide(100); }

/**
|   Función que habilita el modal
|       Recibe:
|               Titulo      -   Cabezara
|               Contenido   -   Cuerpo
|               Botones     -   Pie
|   Requiere un contenido para motrarse
|   Parametro html = true para insertar código HTML
 */
function futil_modal(titulo, contenido = "", botones = "", anchura = "lg", html = true){
  let modal   = $("#modal");

  if( modal.is(':visible') ){
    $("#modal").modal('hide');
  }

  if ( titulo == "ERR"){
    titulo    = "ERROR NO CONTROLADO";
    contenido = (contenido != "")? contenido: "Ha ocurrido un error al intentar ingresar al sistema, por favor, comunique al administrador del sistema.";
  }
  else if ( titulo == "CNX"){
    titulo    = "FALLÓ LA CONEXIÓN";
    contenido = "No se pudo contectar al servidor, por favor verifique su conexión a internet.";
  }
  else if ( titulo == "404"){
    titulo    = "404 - Página no encontrada";
    contenido = "No se localizó la página que estaba consultado.";
  }
  
  if( contenido == "" )
    return;

  if ( anchura == "lg" ){
    $("#modal .modal-dialog").removeClass('modal-xl');
    $("#modal .modal-dialog").addClass('modal-lg');
  } else if ( anchura == "xl" ){
    $("#modal .modal-dialog").removeClass('modal-lg');
    $("#modal .modal-dialog").addClass('modal-xl');
  } else {
    $("#modal .modal-dialog").removeClass('modal-xl');
    $("#modal .modal-dialog").removeClass('modal-lg');
  }

  if ( html ){
    $("#modal-titulo").html(titulo);
    $("#modal-contenido").html(contenido);
  } else {
    $("#modal-titulo").text(titulo);
    $("#modal-contenido").text(contenido);
  }

  if ( botones == "" )
    $("#modal-botones").html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>');
  else if ( botones == "salir" )
    $("#modal-botones").html(`<a href="${ url() }" class="btn btn-secondary">Salir</a>`);
  else 
    $("#modal-botones").html(botones);  

  modal.modal('show');
}

/**
|   Función que habilita el modal con efectos
|       Recibe:
|               Titulo      -   Cabezara
|               Contenido   -   Cuerpo
|               Botones     -   Pie
|               Anchura     -   lg por defecto
|               Efecto      -   Tipo de efecto
|   Requiere un contenido para motrarse
|   Parametro html = true para insertar código HTML
 */
function futil_cmodal(titulo, contenido = "", botones = "salir", anchura = "lg", html = true){
  let modal   = $("#modal-container");
  let tiempo  = 50;

  modal.on('hidden.bs.modal', function (event) {
      $("#modal-titulo").html('');
      $("#modal-contenido").html('');
      $('#modal').modal('dispose');
  });

  if( modal.is(':visible') ){
    $("#modal").modal('hide');
    tiempo = 500;
  }
  setTimeout(function() {
    if ( anchura == "lg" ){
      $("#modal .modal-dialog").removeClass('modal-xl');
      $("#modal .modal-dialog").addClass('modal-lg');
    } else if ( anchura == "xl" ){
      $("#modal .modal-dialog").removeClass('modal-lg');
      $("#modal .modal-dialog").addClass('modal-xl');
    } else {
      $("#modal .modal-dialog").removeClass('modal-xl');
      $("#modal .modal-dialog").removeClass('modal-lg');
    }
   
    $("#modal-titulo").html(titulo);
    $("#modal-contenido").html(contenido);
    
    if ( botones == "" )
      $("#modal-botones").html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>');
    else if ( botones == "salir" )
      $("#modal-botones").html(`<a href="${ url() }" class="btn btn-secondary">Salir</a>`);
    else 
      $("#modal-botones").html(botones);  

    $('body').addClass('modal-active');
  }, tiempo);
}

var normalizar = (function() {
  var no_permitidos = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç|°¬¡!¿?#$%&/\\()=+*~[]{}-_¨´`^\".:,;",
      permitidos = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuuÑñCc ",
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

function futil_muestra_password(){
  let span = $(this);
  let tipo_input = span.parent().parent().children('input')[0];

  if ( tipo_input.type == "password" )
  {
    tipo_input.type = "text";
    span.removeClass('fondo-verde-o');
    span.addClass('fondo-rojo-o');
    span.children('small').removeClass();
    span.children('small').addClass('far fa-eye-slash');
  }
  else
  {
    tipo_input.type = "password";
    span.removeClass('fondo-rojo-o');
    span.addClass('fondo-verde-o');
    span.children('small').removeClass();
    span.children('small').addClass('far fa-eye');
  }
}

function futil_back_to_top(){ $('html, body').animate( { scrollTop : 0 }, 300 ); }

function futil_scroll_page(){
  if (this.hash !== "") {
    event.preventDefault();
    $('html, body').stop().animate({
      scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);
  }
}

function futil_window_scroll_top(){
  if ( $(this).scrollTop() > 100 )
    $('.back-to-top').fadeIn(100);
  else
    $('.back-to-top').fadeOut(100);

  if ( $(".sticky-header").offset() ){
    if ( $(this).scrollTop () > $(".sticky-header").offset().top ){
      if ( ! $('.sticky-close').hasClass('inactive') ){
        $('.sticky-on-scroll').addClass('sticky-top');
        $('.sticky-on-scroll').removeClass('col');
        $('.sticky-close').parent().removeClass('d-none');
      }
    } else {
      $('.sticky-on-scroll').addClass('col');
      $('.sticky-on-scroll').removeClass('sticky-top');
      $('.sticky-close').removeClass('inactive');
      $('.sticky-close').parent().addClass('d-none active');
    }
  }
}

function futil_close_sticky(){
  $('.sticky-on-scroll').removeClass('sticky-top');
  $('.sticky-close').parent().addClass('d-none');
  $('.sticky-close').addClass('inactive');
}

/*
|--------------------------------------------------------------------------
| FUNCIONES PARA MANEJO DE DIRECCIONAMIENTO
|--------------------------------------------------------------------------
*/

// Función de redirección interna
function futil_redirige(link){
  window.location.href = url(link);
}

// Función que permite abrir/recargar una ventana de nombre único para evitar otras del mismo nombre
function futil_abrir_ventana(url, nombre, opciones = "", objetoVentana){
  var ventana;
  if ( objetoVentana != null ){
    if ( ! objetoVentana.closed ){
      objetoVentana.focus();
      objetoVentana.location.href = url;
      return objetoVentana;
    }
  }
  ventana = window.open( url, nombre, opciones );
  return ventana;
}

// Función que dada un URL o propiedad data, carga una vista modo ajax
function futil_muestra_vista(G_URL, datos = [], SUFIX=""){
  G_URL = ( $(this).data("url") )? $(this).data("url") + SUFIX : G_URL + SUFIX;
  var html = "";
  if ( G_URL ){
    if ( ! cargandoVista ){
      cargandoVista = true;
      $.ajax({
        url:    G_URL,
        type:   'POST',
        cache:  true,
        async:  false,
        global: false,
        data:   datos,
        beforeSend: function() {
          loader(); 
        },
        success: function(data, textStatus, xhr) {
          try {
            data = JSON.parse(data);
            if ( data.exito )
              html = data.html;
            else {
              if ( data.error ){
                if (data.error = 'ACCESS')
                  futil_redirige('');
              }
              futil_modal('ERR','<p class="lead">Se intentó invocar una opción del menú inválida.</p>');
            }
          } catch(e) {
            futil_toast('No se pudo cargar la ventana.<br><i>' + e + '</i>','','danger');
          }
        },
        fail: function(xhr, textStatus, errorThrown){ 
          futil_modal('ERR', errorThrown);
          loader(false);
        },
        error: function(xhr, textStatus, errorThrown){ 
          futil_modal('ERR', errorThrown);
          loader(false);
        }, 
        complete: function(){
          loader(false);
          setTimeout(function() { cargandoVista = false; }, 500);
        }
      });
    }
  }
  return html;
}

// Función que dada un URL obtiene una respuesta JSON
function futil_json_query(G_URL, datos = [], SUFIX="", async = false){
  G_URL = ( $(this).data("url") )? $(this).data("url") + SUFIX : G_URL + SUFIX;
  var json = "";
  if ( G_URL ){
    if ( ! cargandoVista ){
      loader(); 
      cargandoVista = true;
      $.ajax({
        url:    G_URL,
        type:   'POST',
        cache:  true,
        async:  async,
        global: false,
        data:   datos,
        success: function(data, textStatus, xhr) {
          try {            
            json = JSON.parse(data);
          } catch(e) {
            futil_modal('ERR', e);
          }
        },
        fail: function(xhr, textStatus, errorThrown){ 
          futil_modal('ERR', errorThrown);
          loader(false);
        },
        error: function(xhr, textStatus, errorThrown){ 
          futil_modal('ERR', errorThrown);
          loader(false);
        }, 
        complete: function(){
          loader(false);
          setTimeout(function() { cargandoVista = false; }, 500);
        }
      });
    }
  }
  return json;
}


function futil_form_controller(URL, formconf = [], inputs = [], contenedor = "main" ){
  if ( ! formconf || formconf == null )
    formconf = {
      id:     `form-${contenedor}`,
      name:   `form-${contenedor}`,
      action: URL,
      method: 'POST'
    }
  else {
    formconf.id     = ( formconf.id     ) ? formconf.id     : 
                      ( formconf.name   ) ? formconf.name   : `form-${contenedor}`;
    formconf.name   = ( formconf.name   ) ? formconf.name   : 
                      ( formconf.id     ) ? formconf.id     : `form-${contenedor}`;
    formconf.action = ( formconf.action ) ? formconf.action : URL;
    formconf.method = ( formconf.method ) ? formconf.method : `POST`;
  }

  if ( inputs == null || inputs == undefined )
    inputs = [];

  var form = $("<form/>", formconf );

  inputs.forEach( function(input, index) {
    form.append( 
      $("<input>", 
        {
          id:     ( input.id    ) ? input.id    :   
                  ( input.name  ) ? input.name  :   `input${index + 1}`,
          name:   ( input.name  ) ? input.name  :   
                  ( input.id    ) ? input.id    :   `input${index + 1}`,
          type:   ( input.type  ) ? input.type  :   `hidden`,
          value:  ( input.value ) ? input.value :  '',
        }
      )
    );
  });

  $(contenedor).html(form);
  return {'id': formconf.id, 'name': formconf.name};
}

/*
|--------------------------------------------------------------------------
| FUNCIONES VALIDADORAS/RESTRICTORAS DE DATOS
|--------------------------------------------------------------------------
*/

// Función para validar el RFC
function futil_valida_rfc(rfc, aceptarGenerico = true) {
  var valid   = ( rfc.length == 12 )? 
                '^(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))' : 
                '^(([A-Z]|[a-z]|\s){1})(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))';

  var validRfc  = new RegExp(valid);
  var matchArray= rfc.match(validRfc);
  if ( matchArray==null )
    return false;
  else
    return true;
}

// Función que valida que una CURP cumpla con el formato obligatorio
function futil_valida_curp(curp) {
  if ( curp.length < 18 )
    return false;

  var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0\d|1[0-2])(?:[0-2]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
      validado = curp.match(re);
  
  if (! validado )
    return false;

  if (validado[2] != digitoVerificador(validado[1])) 
    return false;
        
  return true; //Validado
}

// Dígito de validación de CURPS
function digitoVerificador(digito) {
  var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
      lngSuma      = 0.0,
      lngDigito    = 0.0;
  for(var i=0; i<17; i++)
      lngSuma= lngSuma + diccionario.indexOf(digito.charAt(i)) * (18 - i);
  lngDigito = 10 - lngSuma % 10;
  if(lngDigito == 10)
      return 0;
  return lngDigito;
}

// Functión que dado un evento transforma un diccionario de caracteres a un diccionario normalizado
function futil_normaliza_caracteres(){
    let cadena_normalizar = $(this).val();
    let cadena_normalizada = normalizar(cadena_normalizar);
    $(this).val(cadena_normalizada.trim().toUpperCase());
}

// Función que permite el ingreso de dígitos únicamente
function futil_solo_numeros( e ){
  
  console.log('Fail');
  if( e.keyCode < 48 || e.keyCode > 57 )
    return false;
}

// Función para validar estructura general de correos
function futil_validar_correo(email) {
  return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email);
}

// Función para validar estructura general de correos V2
function futil_validar_correo_2(correo_electronico) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(correo_electronico);
}

// Función que dado un evento restringe los valores entre 0 y 10
function futil_cero_diez(){
  let calificacion = $(this).val();
  calificacion = ( calificacion < 11 )? calificacion :
                 ( calificacion > 11 && calificacion < 101 )? calificacion / 10 :
                 0;
  return $(this).val(calificacion);
}

function futil_valida_password(usuario, password){
  let valoraciones    = [];
  valoraciones.exito  = true;

  if ( usuario.length < 4 || usuario == '' ){
    valoraciones.exito = false;
    valoraciones.push(
      {
        campo       : 'usuario',
        resultado   : false,
        valoracion  : 'longitud',
        mensaje     : 'Usuario o correo electrónico inválido'
      }
    );
  } else 
    valoraciones.push(
      {
        campo       : 'usuario',
        resultado   : true,
        valoracion  : 'longitud',
        mensaje     : 'Usuario válido'
      }
    );

  if ( password.length < 6 || password == '' ){
    valoraciones.exito = false;
    valoraciones.push(
      {
        campo       : 'password',
        resultado   : false,
        valoracion  : 'longitud',
        mensaje     : 'La contraseña no es válida'
      }
    );
  } else 
    valoraciones.push(
      {
        campo       : 'password',
        resultado   : true,
        valoracion  : 'longitud',
        mensaje     : 'Contraseña válida'
      }
    );
  return valoraciones;
}

function futil_valida_nueva_password(password){
  let valoraciones    = [];
  valoraciones.exito  = true;

  if ( password.length < 7 || password == ''){
    valoraciones.exito = false;
    valoraciones.push(
      {
        'valoracion'  : 'longitud',
        'resultado'   : false,
        'leyenda'     : `<small class="text-danger"><span class="fa fa-close"> Debe ser mayor a 6 caracteres</span></small>`,
        'mensaje'     : 'La contraseña debe ser mayor a 6 caracteres'
      }
    );
  } else 
    valoraciones.push(
      {
        'valoracion'  : 'longitud',
        'resultado'   : true,
        'leyenda'     : `<small class="text-success"><span class="fa fa-check"> Debe ser mayor a 6 caracteres</span></small>`,
      }
    );

  if ( ! password.match(/[a-z]/) ){
    valoraciones.exito = false;
    valoraciones.push(
      {
        'valoracion'  : 'minuscula',
        'resultado'   : false,
        'leyenda'     : `<small class="text-danger"><span class="fa fa-close"> Incluir minúscula</span></small>`,
        'mensaje'     : 'La contraseña debe contener al menos una letra minúscula'
      }
    );
  } else 
    valoraciones.push(
      {
        'valoracion'  : 'minuscula',
        'resultado'   : true,
        'leyenda'     : `<small class="text-success"><span class="fa fa-check"> Incluir minúscula</span></small>`,
      }
    );

  if ( ! password.match(/[A-Z]/) ){
    valoraciones.exito = false;
    valoraciones.push(
      {
        'valoracion'  : 'mayuscula',
        'resultado'   : false,
        'leyenda'     : `<small class="text-danger"><span class="fa fa-close"> Incluir mayúscula</span></small>`,
        'mensaje'     : 'La contraseña debe contener al menos una letra mayúscula'
      }
    );
  } else 
    valoraciones.push(
      {
        'valoracion'  : 'mayuscula',
        'resultado'   : true,
        'leyenda'     : `<small class="text-success"><span class="fa fa-check"> Incluir mayúscula</span></small>`,
      }
    );

  if ( ! password.match(/\d/) ){
    valoraciones.exito = false;
    valoraciones.push(
      {
        'valoracion'  : 'numero',
        'resultado'   : false,
        'leyenda'     : `<small class="text-danger"><span class="fa fa-close"> Incluir número</span></small>`,
        'mensaje'     : 'La contraseña debe contener al menos un número'
      }
    );
  } else 
    valoraciones.push(
      {
        'valoracion'  : 'numero',
        'resultado'   : true,
        'leyenda'     : `<small class="text-success"><span class="fa fa-check"> Incluir número</span></small>`,
      }
    );
  return valoraciones;
}

// Función para dar estilo de válido o inválido a un objeto/input y su caption
function futil_validacion_input(objeto, valido = true, mensaje = ""){
  if ( objeto == null || objeto == undefined )
    return;

  objeto.removeClass('is-valid');
  objeto.removeClass('is-invalid');

  if ( $.type(valido) === "boolean" ){
    if ( valido )
      objeto.addClass('is-valid');
    else
      objeto.addClass('is-invalid');
  }
  futil_validacion_texto(objeto, valido);
}

// Función que dado un objeto da un estilo al texto del mismo
function futil_validacion_texto(objeto, opcion = true){
  if ( $.type(opcion) === "boolean" ){
    if (opcion){
      objeto.removeClass('text-danger');
      objeto.addClass('text-success');
    } else {
      objeto.removeClass('text-success');
      objeto.addClass('text-danger');
    }
  }
}

/*
|--------------------------------------------------------------------------
| FORMATEADORES
|--------------------------------------------------------------------------
*/

// Función para formatear a fecha
function futil_convertir_fecha(fecha){
  if ( !fecha )
    return '';
  var date  = new Date(fecha);

  let anio    = date.getFullYear(),
      mes     = date.getMonth() + 1,
      dia     = date.getDate();  

  dia   = ( dia < 10 )? 0   + '' + dia  : dia;
  mes = ( mes < 10 )? 0 + '' + mes : mes;
  
  return `${dia}/${mes}/${anio}`;
}

// Función para formatear a fecha y hora
function futil_convertir_fecha_hora(fecha){
  if ( !fecha )
    return '';
  var date    = new Date(fecha);

  let anio    = date.getFullYear(),
      mes     = date.getMonth() + 1,
      dia     = date.getDate(),
      hora    = date.getHours(),
      mins    = date.getMinutes();  

  dia   = ( dia < 10 )? 0   + '' + dia  : dia;
  mes   = ( mes < 10 )? 0   + '' + mes  : mes;
  hora  = ( hora < 10 )? 0  + '' + hora : hora;
  mins  = ( mins < 10 )? 0  + '' + mins : mins;
  
  return `${dia}/${mes}/${anio} ${hora}:${mins}`;
}

// Función para dar formato y enlace rápido a tipo teléfono
function futil_covertir_telefono(telefono, codigo = '+52', icono = false){
  if ( ! telefono )
    return '<a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a>';
  let texto = `${telefono}`;
  if ( icono )
    texto = `<i class="fa fa-phone" aria-hidden="true"></i>`;
  return `<a href="tel:${codigo}${telefono}">${texto}</a>`;
}

// Función para dar formato y enlace rápido a tipo correo
function futil_covertir_correo(correo, asunto = '', cuerpo = '', texto = '', icono = false){
  if ( ! correo )
    return `<a href="#" class="disabled"><i class="fa fa-envelope" aria-hidden="true"></i></a>`;

  if ( asunto != '' )
    asunto = '?subject=' + codificaHTML(asunto);
  if ( cuerpo != '' )
    cuerpo = '&body=' + codificaHTML(cuerpo);

  if ( texto == '' )
    texto = `${correo}`;
  if ( icono )
    texto = `<i class="fa fa-envelope" aria-hidden="true"></i>`;
  return `<a href="mailto:${correo}${asunto}${cuerpo}">${texto}</a>`;
}

// Función para formatear a moneda
function futil_convertir_moneda(cantidad, simbolo = '$'){
  if ( ! cantidad )
    return '$ 0.00';
  return simbolo + cantidad.replace(/\D/g, "")
                           .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                           .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
}

// Codificar UTF-8
function codifica_utf8( cadena ){
  return window.btoa( unescape( encodeURIComponent( cadena ) ) );
}

// Decodificar UTF-8
function decodifica_utf8( cadena ){
  return decodeURIComponent( escape( window.atob( cadena ) ) );
}

function codificaHTML( cadena ){
  return encodeURIComponent( cadena );
}


/*
| EVENTOS DISPARADORES
|--------------------------------------------------------------------------
*/

$(document)
          .off("change.caracteres_prohibidos", ".util_normaliza")
          .on("change.caracteres_prohibidos", ".util_normaliza", futil_normaliza_caracteres);
$(document)
          .off("keypress.solo_numeros", ".util_snumeros")
          .on("keypress.solo_numeros", ".util_snumeros", futil_solo_numeros);
$(document)
          .off("blur.cero_diez", ".util_cero_diez")
          .on("blur.cero_diez", ".util_cero_diez", futil_cero_diez);
$(document)
          .off("click.mostrar", ".submenu")
          .on("click.mostrar", ".submenu", futil_muestra_vista);
$(document)
          .off("click.back-to-top", ".back-to-top")
          .on("click.back-to-top", ".back-to-top", futil_back_to_top);
$(document)
          .off('click.cerrar_menustop', '.sticky-close')
          .on('click.cerrar_menustop', '.sticky-close', futil_close_sticky);
$(document)
          .off('click.cerrar_toast', '.toast')
          .on('click.cerrar_toast', '.toast', futil_close_toast);

$(window).scroll(futil_window_scroll_top);
