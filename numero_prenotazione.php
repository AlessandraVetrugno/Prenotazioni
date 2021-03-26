<?php

require 'vendor/autoload.php';
include_once("config.php");

use League\Plates\Engine;

$templates = new Engine('./view', 'tpl');

$data_inizio = $_POST['data_inizio'];
$data_fine = $_POST['data_fine'];

$sql = "SELECT giorno, COUNT(*) AS numero_prenotazioni
FROM prenotazioni
WHERE giorno BETWEEN :data_inizio AND :data_fine
GROUP BY giorno
ORDER BY numero_prenotazioni DESC ";


$stmt = $pdo->prepare($sql);

//Inviamo i dati concreti che verranno messi al posto dei segnaposto
$stmt->execute(
    [
        'data_inizio' => $data_inizio,
        'data_fine' => $data_fine
    ]
);
$result =$stmt->fetchAll();

echo $templates ->render('numero_prenotazione', [
    'result' => $result,
    'data_inizio' => $data_inizio,
    'data_fine' => $data_fine
]);