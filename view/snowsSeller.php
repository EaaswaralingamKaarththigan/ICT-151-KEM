

<?php

/*  Autor : Kaarththigan Eaaswaralingam
    Date : 28.02.2020

*/
$_GET["action"] = "snowsvente";
// tampon de flux stocké en mémoire
ob_start(); // Ouvre la memoire tampon
$titre = "Rent A Snow - Acceuil";

?>


<table class="table">
    <thead>
    <tr>
        <th scope="col">Code</th>
        <th scope="col">Marque</th>
        <th scope="col">Modèle</th>
        <th scope="col">Longueur</th>
        <th scope="col">Prix</th>
        <th scope="col">Disponibilité</th>
        <th scope="col">Photo</th>
    </tr>
    </thead>

    <?php foreach ($snows as $snow) : ?>

    <tbody>
        <tr>
            <td><?=$snow['code']; ?></td>
            <td><?=$snow['brand']; ?></td>
            <td><?=$snow['model']; ?></td>
            <td><?=$snow['snowLength']; ?> cm</td>
            <td><?=$snow['dailyPrice']; ?>.- par jour</td>
            <td><?=$snow['qtyAvailable']; ?></td>
            <td><img src="<?=$snow['photo']; ?>" alt="Image" style="width:10%"></td>
        </tr>
    <tbody>
    <?php endforeach; ?>
</table>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>

