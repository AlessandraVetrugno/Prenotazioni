
<?php $this->layout('main',['argomento' => 'Lista delle prenotazioni giornaliere']); ?>

<table class="striped">
    <caption> Lista delle Prenotazioni correnti</caption>
    <thead>
    <tr>
        <th>Codice fiscale</th>

        <th>Codice univoco</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($result as $row): ?>
    <tr>
        <td><?php echo $row['codice_fiscale'] ?></td>

        <td><?php echo $row['codice_prenotazione'] ?></td>
    </tr>
    <?php endforeach ?>
    </tbody>
</table>
