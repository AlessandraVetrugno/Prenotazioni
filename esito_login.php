<?php

require 'vendor/autoload.php';
include_once "config.php";

use League\Plates\Engine;

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view','tpl');

//Variabili valorizzate tramite POST
$username = $_POST['username'];
$password = $_POST['password'];


//Controllo sull'univocità dello username
$sql = "SELECT * FROM utenti WHERE username = :username";

//Inviamo la query al database che la tiene in pancia
$stmt = $pdo->prepare($sql);

$stmt->execute(
    [
        'username' => $username
    ]
);

$riga = $stmt->fetch();
//lo user name non è presente nel database

if ($riga == false)
{
    echo $templates->render('login_fallito', ['username' => $username]);
}
//lo username è presente, bisogna verificare se la password è corretta
else {
    $pass_hash = $riga['password'];
    //la password è corretta
    if (password_verify($password, $pass_hash)) {
        echo $templates->render('utente_autenticato', ['username' => $username]);
    }
    //la password è sbagliata
    else {
        echo $templates->render('login_fallito', ['username' => $username]);
    }
}
