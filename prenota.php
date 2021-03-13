<?php
include_once "config.php";

//Variabili valorizzate tramite POST

$codice_fiscale = $_POST ['codice'] ;
$giorno = $_POST['giorno'];

//Query di inserimento preparate

$sql = "INSERT INTO prenotazioni VALUES(null, :codice_fiscale, :giorno)";

//Inviamo la query al db che la tiene in pancia
$stmt = $pdo-> prepare($sql);

//Inviamo i dati concreti che verranno messi al posto dei segnaposto
$stmt -> execute(
    [
        'codice_fiscale' => $codice_fiscale,
        'giorno' => $giorno
    ]
);
//ridirige il browser verso la pagina indicata nella location
header('location: visualizza_prenotazioni.php');
exit(0);


