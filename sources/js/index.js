$(document).ready(fn_iniciar_sistema);

function fn_iniciar_sistema(){
	$('[data-toggle="popover"]').popover({ container: 'body' });
	$('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });
}