<?php

include_once "config.php";

//Query di inserimento preparate

$sql = "SELECT * FROM prenotazioni";

$stmt = $pdo -> query($sql);
$result= $stmt-> fetchAll();

echo "<pre>";
var_dump($result);
echo "</pre>";