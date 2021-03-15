<?php
include_once("config.php");

$sql = "SELECT codice_fiscale, giorno, codice_prenotazione FROM prenotazioni";
$stmt = $pdo->query($sql);

$valori = ' ';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $valori.= "<tr><td>" . $row['codice_fiscale'] . "</td><td>" . $row['giorno'] . "</td><td>" . $row['codice_prenotazione'] . "</td></tr>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista Prenotazioni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<h1 align="center"> <b> Lista delle prenotazioni</b></h1>
<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th scope="co_fiscale"><b>Codice Fiscale</b></th>
        <th scope="giorno"><b>Giorno</b></th>
        <th scope="codice_prenotazione"><b>Codice Prenotazione</b></th>
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