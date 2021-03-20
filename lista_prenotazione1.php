<?php

require 'vendor/autoload.php';
include_once("config.php");

use League\Plates\Engine;

$templates = new Engine('./view', 'tpl');

$sql = "SELECT * FROM prenotazioni";

$stmt = $pdo->query($sql);

$result =$stmt->fetchAll();

echo $templates ->render('lista_prenotazioni1', ['result' => $result]);
