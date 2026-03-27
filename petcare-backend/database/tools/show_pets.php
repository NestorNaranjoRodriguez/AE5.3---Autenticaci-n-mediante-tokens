<?php
$db = new PDO('sqlite:' . __DIR__ . '/../database.sqlite');
$res = $db->query('SELECT id,nombre,especie,raza,edad,sexo,peso,fecha_nacimiento,chip,esterilizado,vacunado,observaciones,created_at FROM pets ORDER BY id DESC LIMIT 20');
foreach ($res as $row) {
    echo implode(' | ', [
        $row['id'],$row['nombre'],$row['especie'],$row['raza'],$row['edad'],$row['sexo'],$row['peso'],$row['fecha_nacimiento'],$row['chip'],$row['esterilizado'],$row['vacunado'],$row['observaciones'],$row['created_at']
    ]) . PHP_EOL;
}
