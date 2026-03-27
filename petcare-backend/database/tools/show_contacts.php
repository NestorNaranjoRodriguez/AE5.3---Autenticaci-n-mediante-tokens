<?php
$db = new PDO('sqlite:' . __DIR__ . '/../database.sqlite');
$res = $db->query('SELECT id,nombre,apellidos,correo,direccion,direccion_secundaria,sexo,telefono,mensaje,created_at FROM contact ORDER BY id DESC LIMIT 20');
foreach ($res as $row) {
    echo implode(' | ', [$row['id'],$row['nombre'],$row['apellidos'],$row['correo'],$row['direccion'],$row['direccion_secundaria'],$row['sexo'],$row['telefono'],$row['mensaje'],$row['created_at']]) . PHP_EOL;
}
