<?php

include_once "config.php";
require 'vendor/autoload.php';

use League\Plates\Engine;

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view', 'tpl');

//Variabili valorizzate tramite POST
$codice_prenotazione = $_POST['codice'];


//
$sql ='UPDATE prenotazioni SET annullata = true WHERE codice_prenotazione = :codice_prenotazione';
$stmt = $pdo-> prepare($sql);
$stmt -> execute(
    [
        'codice_prenotazione' => $codice_prenotazione,

    ]
);


echo $templates->render('annulla',
    [
        'codice_prenotazione' => $codice_prenotazione,

    ]);