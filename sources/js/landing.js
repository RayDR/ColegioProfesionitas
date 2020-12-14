var menuFlotante = false;
$(document).ready(fn_iniciar_sistema);

function fn_iniciar_sistema(){
	loader(false);
	$('[data-toggle="popover"]').popover({ container: 'body' });
	$('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });

	$(window).scroll(function(event) {
		var scrollPosicion = $(this).scrollTop();
		// Cambiar menú inicio de sesión
		if ( scrollPosicion > $("#menul_scroller").offset().top ){			
			$("#menul_flotante").addClass('fixed-top bg-light');
			$("#menul_flotante").removeClass('p-2').addClass('p-1');
			if ( ! menuFlotante ){
				menuFlotante = true;
				$("#menul_flotante").hide();
				$("#menul_flotante").fadeIn('slow');
			}
		} else {
			menuFlotante = false;
			$("#menul_flotante").removeClass('fixed-top bg-light');
			$("#menul_flotante").removeClass('p-1').addClass('p-2');
		}
	});
}


