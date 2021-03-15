<?php
include_once("config.php");
//Variabili valorizzate tramite POST
$codice_fiscale = $_POST['codice'];
$giorno = $_POST['giorno'];
//$codice_prenotazione = $_POST['codice_prenotazione'];
$codice_prenotazione = bin2hex(openssl_random_pseudo_bytes(6));
//Query di inserimento preparate
$sql = "INSERT INTO prenotazioni VALUES(null, :codice_fiscale, :giorno, :codice_prenotazione)";

//Inviamo la query al db che la tiene in pancia
$stmt = $pdo-> prepare($sql);

//Inviamo i dati concreti che verranno messi al posto dei segnaposto
$stmt -> execute(
    [
        'codice_fiscale' => $codice_fiscale,
        'giorno' => $giorno,
        'codice_prenotazione' => $codice_prenotazione
    ]
);
//Ridirige il browser verso la pagina indicata nella Location
header('Location:lista_prenotazioni.php');
exit(0);