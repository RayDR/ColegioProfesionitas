$(document).ready(fn_iniciar_sistema);

function fn_iniciar_sistema(){
	loader(false);
	$('[data-toggle="popover"]').popover({ container: 'body' });
	$('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });

	$("#menu-navegacion a").click(function(event) {
		var link = $(this).attr('href');

		$("#menu-navegacion a").removeClass('active');
		$(this).addClass('active');

		let ajax_html = futil_muestra_vista('Administracion/menu', {link : link.substring(1, link.length)});
		if ( ajax_html )
			$("#ajax-admin-html").html(ajax_html);
		else{
			$(".toast").toast('hide');
		}
	});
}