<?php

require 'vendor/autoload.php';
include_once("config.php");

use League\Plates\Engine;

$templates = new Engine('./view', 'tpl');

$sql = "SELECT * FROM prenotazioni";

$stmt = $pdo->query($sql);

$result =$stmt->fetchAll();

//se sei una persona che ha fatto il login
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];


    echo $templates->render('lista_prenotazioni1',
        [
            'result' => $result,
            'username' => $username
        ]
    );
}

else
    echo $templates->render('utente_non_autorizzato');