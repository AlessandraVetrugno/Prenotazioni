<?php

//Dice a livello dello script che gli errori verranno mostrati
//e che non verranno loggati
ini_set("display_errors", 1);
ini_set("log_errors", 0);

$host = 'localhost';
$db = 'tamponi';
$user = 'root';
$pass = '';

//Stringa di connessione
$dsn = 'mysql:host=' . $host . ';dbname=' . $db;

$pdo = new PDO($dsn, $user, $pass);
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


