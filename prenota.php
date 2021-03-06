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
//Variabili al momento costanti poi verranno prese tramite POST
$codice_fiscale = 'BCUERUJEKJSBKBC';
$giorno = '2021-03-06';

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