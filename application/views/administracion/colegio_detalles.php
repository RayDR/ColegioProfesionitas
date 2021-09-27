<div class="form-row px-4 py-2">
    <legend class="col-12">Datos de la asociación</legend>
    <div class="col-lg-8">
        <label><strong>Nombre:</strong> </label>
        <p class="text-justify"><?= $datos['nombre_asociacion'] ?></p>
    </div>
    <div class="col-lg-4">
        <label><strong>RFC:</strong> </label>
        <p class="text-justify"><?= $datos['rfc_asociacion'] ?></p>
    </div>
    <div class="col-lg-8">
        <label><strong>Domicilio:</strong> </label>
        <p class="text-justify"><?= $datos['domicilio_asociacion'] ?></p>
    </div>
    <div class="col-lg-4">
        <label><strong>Fecha de constitución:</strong> </label>
        <p class="text-justify"><?= mdate('%d/%m/%Y', strtotime($datos['fecha_asociacion'])) ?></p>
    </div>


</div>
<!--- formulario de colegio ----->
<div class="form-row px-4 py-2">

    <legend class="col-12">Datos del colegio</legend>

    <div class="form-group col-4">
        <label><strong>Nombre del asociado:</strong> </label>
        <p class="text-justify"><?= $datos['nombre'] ?></p>
    </div>
    <div class="form-group col-lg-4">
        <label for="curp"><strong>CURP:</strong></label>
        <p class="text-justify"> <?= $datos['curp'] ?></p>
    </div>
    <div class="form-group col-lg-4">
        <label for="rfc"><strong>RFC:</strong></label>
        <p class="text-justify"> <?= $datos['rfc_colegio'] ?></p>
    </div>
    <div class="form-group col-lg-6">
        <label for="colegio"><strong>Nombre del colegio:</strong> </label>
        <p class="justify text"><?= $datos['nombre_colegio'] ?> </p>
    </div>
    <div class="form-group col-lg-6">
        <label for="calle"><strong>Domicilio:</strong> </label>
        <p class="text-justify"><?= $datos['domicilio'] ?></p>
    </div>
    <div class="form-group col-lg-12">
        <label for="mapa"><strong>Mapa:</strong> </label>
        <p class="text-justify text-break "><?= $datos['mapa'] ?></p>
    </div>
    <div class="form-group col-lg-4">
        <label for="fecha_constitucion"><strong>Fecha de constitución del colegio:</strong> </label>
        <p class="text-justify"><?= $datos['fecha'] ?></p>
    </div>
    <div class="form-group col-lg-4">
        <label for="periodo-mesa-directiva"><strong>Periodo mesa directiva:</strong></label>
        <p class="text-justify"> <?= $datos['periodo_mesa_directiva'] ?></p>
    </div>
</div>
<div class="form-row px-4 py-2">
    <legend class="col-12">Datos de contacto</legend>
    <div class="form-group col-lg-4">
        <label for="email"><strong>Correo electrónico:</strong> </label>
        <p class="text-justify"><?= $datos['email'] ?></p>
    </div>
    <div class="form-group col-lg-4">
        <label for="telefono"><strong>Número telefónico:</strong> </label>
        <p class="text-justify"><?= $datos['telefono'] ?></p>
    </div>
    <div class="form-group col-lg-4">
        <label for="pagina-web"><strong>Pagina web:</strong> </label>
        <p class="text-justify"><?= $datos['pagina_web'] ?></p>
    </div>
</div>

<div class="form-row px-4 py-2">
    <legend class="col-12">Redes sociales</legend>

    <?php

    $cuentas = explode(",", $datos['cuenta']);
    $red = explode(",", $datos["red_social"]);
    $icono = explode(",", $datos["rs_icon"]);
    ?>
    <div class="col-12 ">
        <div class="table-responsive-sm mx-auto">
            <table id="t_redes_sociales" class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>Cuenta</th>
                        <th>Red social</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cuentas as $key => $cuenta) : ?>
                        <?php if ($cuenta != '' || $red[$key] != '') : ?>
                            <tr>
                                <td><?= $cuenta ?></td>
                                <td>&#x<?= $icono[$key] ?> <?= $red[$key] ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


</div>

<script type="text/javascript" src="<?= base_url("sources/js/administracion/perfil.js") ?>"></script>