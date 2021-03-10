
<div class="form-row px-4 py-2">
    <legend class="col-12">Datos de la asociación</legend>
    <div class="col-lg-10">
        <label><strong>Nombre:</strong> <?= $datos['nombre_asociacion'] ?></label>
    </div>
    <div class="col-lg-2">
        <label><strong>RFC:</strong> <?= $datos['rfc_asociacion'] ?></label>
    </div>
    <div class="col-lg-12">
        <label><strong>Domicilio:</strong> <?= $datos['domicilio_asociacion'] ?></label>
    </div>
    <div class="col-lg-3">
        <label><strong>Fecha de constitución:</strong> <?= $datos['fecha_asociacion'] ?></label>
    </div>


</div>
<!--- formulario de colegio ----->
<div class="form-row px-4 py-2">

    <legend class="col-12">Datos del colegio</legend>

    <div class="form-group col-lg-4">
        <label><strong>Nombre del asociado:</strong> <?= $datos['nombre'] ?></label>
    </div>
    <div class="form-group col-lg-4">
        <label for="curp"><strong>CURP:</strong> <?= $datos['curp'] ?></label>
    </div>
    <div class="form-group col-lg-8">
        <label for="colegio"><strong>Nombre del colegio:</strong> <?= $datos['nombre_colegio'] ?> </label>
    </div>
    <div class="form-group col-lg-4">
        <label for="rfc"><strong>RFC:</strong> <?= $datos['rfc_colegio'] ?></label>
    </div>
    <div class="form-group col-lg-2">
        <label for="mapa"><strong>Mapa:</strong> <?= $datos['mapa'] ?></label>
    </div>
    <div class="form-group col-lg-8">
        <label for="calle"><strong>Domicilio:</strong> <?= $datos['domicilio'] ?></label>
    </div>
    <div class="form-group col-lg-3">
        <label for="fecha_constitucion"><strong>Fecha de constitución del colegio:</strong> <?= $datos['fecha'] ?>
        </label>
    </div>
    <div class="form-group col-lg-3">
        <label for="periodo-mesa-directiva"><strong>Periodo mesa directiva:</strong>
            <?= $datos['periodo_mesa_directiva'] ?></label>
    </div>
</div>
<div class="form-row px-4 py-2">
    <legend class="col-12">Datos de contacto</legend>
    <div class="form-group col-4">
        <label for="email"><strong>Correo electrónico:</strong> <?= $datos['email'] ?></label>
    </div>
    <div class="form-group col-4">
        <label for="telefono"><strong>Número telefónico:</strong> <?= $datos['telefono'] ?></label>
    </div>
    <div class="form-group col-4">
        <label for="pagina-web"><strong>Pagina web:</strong> <?= $datos['pagina_web'] ?></label>
    </div>
</div>

<div class="form-row px-4 py-2">
    <legend class="col-lg-12">Redes sociales</legend>

    <?php

    $cuentas = explode(",", $datos['cuenta']);
    $red = explode(",", $datos["red_social"]);
    $icono = explode(",", $datos["rs_icon"]);
    ?>
    <div class="col-lg-4 table-responsive-sm mt-4 mt-md-0">
        <table id="t_redes_sociales" class="table table-hover text-center">
            <thead>
                <tr>
                    <th>Cuenta</th>
                    <th>Red social</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < sizeof($cuentas); $i++) : ?>
                    <tr>
                        <td><?= $cuentas[$i] ?></td>
                        <td>&#x<?= $icono[$i] ?> <?= $red[$i] ?></td>
                        
                    </tr>
                <?php endfor ?>
            </tbody>
        </table>
    </div>
</div>
</div>