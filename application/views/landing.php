<main id="fondo-landing" class="page-content">
	<div class="container-fluid">
		<div class="row align-items-center fondo-rojo" style="min-height: 13vh;">
			<div class="col-12">					
				<h1 class="text-center text-white"><?= SISTEMA ?></h1>
			</div>
		</div>
		<?php $this->load->view($template.'menu_superior');?>
		<div class="row mt-3" style="min-height: 20vh;">
			<div class="col-12 col-lg-7 ">
				<div class="row no-gutters border rounded mb-4 shadow position-relative bg-light" style="min-height: 70vh;">
					<div class="col-12">
						<h3 class="text-center texto-rojo my-3">Comunicados</h3>
						<hr class="border borde-dorado mx-5">

						<div class="row border mx-5 rounded mb-4 shadow-sm bg-white" style="min-height: 60%">
							<div class="col pt-3">
								<p class="text-center">No hay comunicados para mostrar.</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-lg-5 col-xl-4">
				<div class="row no-gutters border rounded mb-4 shadow position-relative bg-muted align-items-center" style="min-height: 60vh;">
					<div class="col-12 px-5 px-lg-3">
						<input type="button" class="btn btn-block btn-lg btn-primary boton-verde py-3" value="Opción 1">
					</div>
					<div class="col-12 px-5 px-lg-3">
						<input type="button" class="btn btn-block btn-lg btn-primary boton-verde py-3" value="Opción 2">
					</div>
					<div class="col-12 px-5 px-lg-3">
						<input type="button" class="btn btn-block btn-lg btn-primary boton-verde py-3" value="Opción 3">
					</div>
					<div class="col-12 px-5 px-lg-3">
						<input type="button" class="btn btn-block btn-lg btn-primary boton-verde py-3" value="Opción 4">
					</div>
				</div>
			</div>

			<div class="col-12 offset-xl-1"></div>
		</div>
	</div>
</main>

<script type="text/javascript" src="<?=base_url('sources/js/landing.js')?>"></script>