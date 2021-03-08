<option disabled selected>Seleccione una opción</option>
<?php foreach ($codigos_postales as $key => $cp): ?>
    <option value="<?= $cp->codigo_postal_id ?>"><?= $cp->d_asenta ?></option>
<?php endforeach; ?>