<nav>
    <ul class="nav nav-tabs" id="nav-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="home" aria-selected="true">Datos Principales</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link " id="nav-contacto-tab" data-toggle="tab" href="#nav-contacto" role="tab" aria-controls="contacto" aria-selected="false">Datos de Contacto</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link " id="nav-asociado-tab" data-toggle="tab" href="#nav-asociado" role="tab" aria-controls="asociado" aria-selected="false">Lista de Asociados</a>
        </li>
    </ul>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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

    </div>
    <div class="tab-pane fade" id="nav-contacto" role="tabpanel" aria-labelledby="nav-contacto-tab">
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
    <div class="tab-pane fade" id="nav-asociado" role="tabpanel" aria-labelledby="nav-asociado-tab">
        
        <div class="form-row px-4 py-2">
            <legend class="col-12">Integrantes</legend>   
            <div class="table-responsive mx-auto">
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
</div>

<script type="text/javascript" src="<?= base_url("sources/js/administracion/perfil.js") ?>"></script>