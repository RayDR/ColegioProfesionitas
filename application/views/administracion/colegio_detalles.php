<div class="form-row px-4 py-2">
    <legend class="col-12">Datos de la asociación</legend>
    <div class="col-lg-8">
        <label><strong>Nombre:</strong> <?= $datos['nombre_asociacion'] ?></label>
    </div>
    <div class="col-lg-4">
        <label><strong>RFC:</strong> <?= $datos['rfc_asociacion'] ?></label>
    </div>
    <div class="col-lg-12">
        <label><strong>Domicilio:</strong> <?= $datos['domicilio_asociacion'] ?></label>
    </div>
    <div class="col-lg-3">
        <label><strong>Fecha de constitución:</strong> <?= mdate( '%d/%m/%Y', strtotime($datos['fecha_asociacion']) ) ?></label>
    </div>


</div>
<!--- formulario de colegio ----->
<div class="form-row px-4 py-2">

    <legend class="col-12">Datos del colegio</legend>

    <div class="form-group col-12">
        <label><strong>Nombre del asociado:</strong> <?= $datos['nombre'] ?></label>
    </div>
    <div class="form-group col-lg-4">
        <label for="curp"><strong>CURP:</strong> <?= $datos['curp'] ?></label>
    </div>
    <div class="form-group col-lg-4">
        <label for="rfc"><strong>RFC:</strong> <?= $datos['rfc_colegio'] ?></label>
    </div>
    <div class="form-group col-lg-10">
        <label for="colegio"><strong>Nombre del colegio:</strong> <?= $datos['nombre_colegio'] ?> </label>
    </div>
    <div class="form-group col-lg-8">
        <label for="calle"><strong>Domicilio:</strong> <?= $datos['domicilio'] ?></label>
    </div>
    <div class="form-group col-lg-4">
        <label for="mapa"><strong>Mapa:</strong> <?= $datos['mapa'] ?></label>
    </div>
    <div class="form-group col-lg-8">
        <label for="fecha_constitucion"><strong>Fecha de constitución del colegio:</strong> <?= $datos['fecha'] ?>
        </label>
    </div>
    <div class="form-group col-lg-4">
        <label for="periodo-mesa-directiva"><strong>Periodo mesa directiva:</strong>
            <?= $datos['periodo_mesa_directiva'] ?></label>
    </div>
</div>
<div class="form-row px-4 py-2">
    <legend class="col-12">Datos de contacto</legend>
    <div class="form-group col-lg-4">
        <label for="email"><strong>Correo electrónico:</strong> <?= $datos['email'] ?></label>
    </div>
    <div class="form-group col-lg-4">
        <label for="telefono"><strong>Número telefónico:</strong> <?= $datos['telefono'] ?></label>
    </div>
    <div class="form-group col-lg-4">
        <label for="pagina-web"><strong>Pagina web:</strong> <?= $datos['pagina_web'] ?></label>
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
                    <?php foreach ($cuentas as $key => $cuenta): ?>
                        <?php if ( $cuenta != '' || $red[$key] != ''  ): ?>
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

<div class="form-row px-4 py-2">
    <legend class="col-12">Integrantes</legend>   
    <div class="col-12 table-responsive mx-auto">
        <?php if ( $asociados_list ): ?>
            <table id="t_asociados" class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Primero Apellido</th>
                        <th>Segundo Apellido</th>
                        <th>CURP</th>
                        <th>Fecha SERCP</th>
                        <th>Nivel educativo</th>
                        <th>Institución</th>
                        <th>Carrera</th>
                        <th>Número de cédula</th>
                        <th>Telefono</th>
                        <th>Correo electrónico</th>
                        <th>Horas de servicio social</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($asociados_list as $key => $asociado) : ?>
                        <tr>
                            <td><?= $asociado->nombres ?></td>
                            <td><?= $asociado->primer_apellido ?></td>
                            <td><?= $asociado->segundo_apellido ?></td>
                            <td><?= $asociado->curp ?></td>
                            <td><?= $asociado->fecha_sercp ?></td>
                            <td><?= $asociado->nivel_educativo ?></td>
                            <td><?= $asociado->institucion ?></td>
                            <td><?= $asociado->carrera ?></td>
                            <td><?= $asociado->numero_cedula ?></td>
                            <td><?= $asociado->telefono ?></td>
                            <td><?= $asociado->email ?></td>
                            <td><?= $asociado->horas_servicio_social ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

</div>

<script type="text/javascript" src="<?= base_url("sources/js/administracion/perfil.js") ?>"></script>
