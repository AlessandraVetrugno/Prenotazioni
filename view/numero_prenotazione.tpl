<?php $this->layout('main',['argomento' => 'Lista delle prenotazioni']); ?>

<table class="striped">

    <h4>
        Lista delle Prenotazioni che vanno da <?=$data_inizio?> a <?=$data_fine?>
    </h4>
    <thead>
    <tr>
        <th>Giorno prenotazione:</th>

        <th>Numero delle prenotazioni:</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($result as $row): ?>
    <tr>
        <td><?php echo $row['giorno'] ?></td>
        <td><?php echo $row['numero_prenotazioni'] ?></td>
    </tr>
    <?php endforeach ?>
    </tbody>
</table>

