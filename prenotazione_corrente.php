<?php

require 'vendor/autoload.php';
include_once("config.php");

use League\Plates\Engine;

$templates = new Engine('./view', 'tpl');

$sql = "SELECT codice_fiscale,codice_prenotazione FROM prenotazioni WHERE giorno = CURRENT_DATE()";

$stmt = $pdo->query($sql);

$result =$stmt->fetchAll();

echo $templates ->render('prenotazione_corrente', ['result' => $result]);
