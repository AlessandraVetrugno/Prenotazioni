<?php
ini_set("display_errors", 1);
ini_set("log_errors", 0);
$host = 'localhost';
$db = 'tamponi';
$user = 'root';
$pass = '';
$dsn = 'mysql:host=' . $host . ';dbname=' . $db;
$pdo = new PDO($dsn, $user, $pass);

$sql = "SELECT codice_fiscale, giorno FROM prenotazioni";

$stmt = $pdo->query($sql);
$valori = ' ';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $valori.= "<tr><td>" . $row['codice_fiscale'] . "</td><td>" . $row['giorno'] . "</td></tr>";

}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista Prenotazioni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="Style.css">
</head>
<body>
<h1 align="center" > <b> Lista delle prenotazioni </b> </h1>

<table id= "table" class="table table-striped table-hover">
    <thead>
    <tr>
        <th scope="nome"> <b> Codice fiscale</b></th>
        <th scope="co_fiscale"> <b> Data </b> </th>

    </tr>
    </thead>
    <tbody>
    <?php
    echo $valori;
    ?>
    </tbody>

</table>

</body>
</html>