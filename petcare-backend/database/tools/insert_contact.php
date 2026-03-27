<?php
$db = new PDO('sqlite:' . __DIR__ . '/../database.sqlite');
$stmt = $db->prepare('INSERT INTO contact (nombre, apellidos, correo, direccion, direccion_secundaria, sexo, telefono, mensaje, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, datetime("now"), datetime("now"))');
$stmt->execute(['Prueba','Apellido','test@example.com','Calle 1','Depto 2','hombre','123456789','mensaje de prueba']);
echo "Inserted, id=" . $db->lastInsertId() . PHP_EOL;
