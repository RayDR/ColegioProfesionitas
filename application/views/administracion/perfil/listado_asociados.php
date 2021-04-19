<?php if ( !$asociados ): ?>
<tr>
	<td colspan="10"><h5>No hay asociados registrado</h5></td>
</tr>
<?php endif ?>
<?php foreach ($asociados as $key => $asociado) : ?>
	<tr>
		<td><?= $asociado->nombres ?> <?= $asociado->primer_apellido ?> <?= $asociado->segundo_apellido ?></td>
		<td><?= $asociado->curp ?></td>
		<td><?= $asociado->fecha_sercp ?></td>
		<td><?= $asociado->carrera ?></td>
		<td><?= $asociado->numero_cedula ?></td>
		<td><?= $asociado->telefono ?></td>
		<td><?= $asociado->email ?></td>
		<td><?= $asociado->horas_servicio_social ?></td>
	</tr>
<?php endforeach ?>