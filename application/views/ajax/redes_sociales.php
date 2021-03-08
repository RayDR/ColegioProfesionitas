<option disabled selected>Seleccione una red social</option>
<?php foreach ($redes_sociales as $key => $rds): ?>
    <option value="<?= $rds->red_social_id ?>">&#x<?= $rds->icon ?> <?= $rds->nombre ?></option>
<?php endforeach; ?>