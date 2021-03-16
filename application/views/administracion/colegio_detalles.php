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
    <div class="row mt-2 px-0">
        <button class="btn btn-dark btn-block boton-rojo" type="button" data-toggle="collapse" data-target="#modal-form-registro-asc" aria-expanded="false" aria-controls="collapseExample">
            Registrar nuevo integrante
        </button>
        <form id="modal-form-registro-asc" class="collapse shadow bg-light rounded col-12">
            <div class="form-row p-4">
                <div class="col-12 my-3" id="errores-form">
                    <?PHP $this->load->view('template/utiles/alertas'); ?>
                </div>
                <div class="form-group col-lg-4">
                    <label for="nombre">Nombre(s)</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" data-nombre="Nombre">
                </div>
                <div class="form-group col-lg-4">
                    <label for="primer_apellido">Primer apellido</label>
                    <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" data-nombre="Primer apellido">
                </div>
                <div class="form-group col-lg-4">
                    <label for="segundo_apellido">Segundo apellido </label>
                    <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" data-nombre="Segundo apellido">
                </div>
                <div class="form-group col-lg-4">
                    <label for="segundo_apellido">CURP </label>
                    <input type="text" class="form-control" id="curp" name="curp" data-nombre="CURP">
                </div>
                <div class="form-group col-lg-3">
                    <label for="fecha_constitucion">Fecha sercp </label>
                    <input type="date" class="form-control" id="fecha_sercp" name="fecha_sercp" data-nombre="Fecha constitucion">
                </div>
                <div class="form-group col-lg-3">
                    <label for="nivel_educativo">Nivel educactivo</label>
                    <select id="nivel_educativo" name="nivel_educativo" class="custom-select" data-nombre="Nivel educactivo">
                        <option selected disabled>Seleccione el nivel educactivo</option>
                        <?php foreach ($niveles as $key => $nivel) : ?>
                            <option value="<?= $nivel->nivel_educativo_id ?>"><?= $nivel->descripcion ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label for="institucion">Institución</label>
                    <select id="institucion" name="institucion" class="custom-select" data-nombre="Institución">
                        <option selected disabled>Seleccione la instutición</option>
                        <?php foreach ($instituciones as $key => $institucion) : ?>
                            <option value="<?= $institucion->institucion_id ?>"><?= $institucion->nombre ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label for="carrera">Carrera</label>
                    <select id="carrera" name="carrera" class="custom-select" data-nombre="Carrera">
                        <option selected disabled>Seleccione la instutición</option>
                        <?php foreach ($carreras as $key => $carrera) : ?>
                            <option value="<?= $carrera->carrera_id ?>"><?= $carrera->nombre ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group col-lg-3">
                    <label for="numero_cedula">Número de cédula</label>
                    <input type="text" class="form-control" id="numero_cedula" name="numero_cedula" data-nombre="Numero cedula">
                </div>
                <div class="form-group col-lg-3">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control util_snumeros" id="telefono" name="telefono" data-nombre="Telefono">
                </div>
                <div class="form-group col-lg-4">
                    <label for="email">Correo electrónico</label>
                    <input type="text" class="form-control" id="email" name="email" data-nombre="Correo electronico">
                </div>
                <div class="form-group col-lg-2">
                    <label for="horas_servicio_social">Horas de servicio social</label>
                    <input type="text" class="form-control util_snumeros" id="horas_servicio_social" name="horas_servicio_social" data-nombre="Horas Servicio">
                </div>

                <div class="form-group col-lg-12">
                    <input type="submit" id="regsitrar-asociado" value="Registrar integrante" class="mt-3 btn btn-secondary boton-rojo">
                </div>
            </div>
        </form>
    </div>
</div>

</div>

<script type="text/javascript" src="<?= base_url("sources/js/administracion/perfil.js") ?>"></script>
