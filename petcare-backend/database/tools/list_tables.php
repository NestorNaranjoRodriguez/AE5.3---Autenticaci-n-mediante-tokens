<?php
$db = new PDO('sqlite:' . __DIR__ . '/../database.sqlite');
$res = $db->query("SELECT name FROM sqlite_master WHERE type='table'");
foreach ($res as $row) {
    echo $row['name'] . PHP_EOL;
}
