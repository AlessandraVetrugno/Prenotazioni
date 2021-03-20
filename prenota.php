<?php
include_once("config.php");
//Variabili valorizzate tramite POST
$codice_fiscale = $_POST['codice'];
$giorno = $_POST['giorno'];

//controllo sul numero di persone per giorno

$sql_numero= "SELECT COUNT(*) AS n_prenotazioni FROM prenotazioni WHERE DAY(prenotazioni.giorno) = DAY('$giorno')";

$n_prenotazioni = $pdo->query($sql_numero)->fetchAll()[0]["n_prenotazioni"];

if ($n_prenotazioni >= 3){
    echo "Impossibile prenotare in questo giorno poichè è stato raggiunto il numero massimo di prenotazioni";
    exit(0);
}


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
