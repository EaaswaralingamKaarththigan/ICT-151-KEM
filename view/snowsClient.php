

<?php

/*  Autor : Kaarththigan Eaaswaralingam
    Date : 28.02.2020

*/
$_GET["action"] = "snowsachat";
// tampon de flux stocké en mémoire
ob_start(); // Ouvre la memoire tampon
$titre = "Rent A Snow - Acceuil";

?>

<?php foreach ($snows as $snow) : ?>

<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="<?=$snow['photo']; ?>" alt="Nature">
        <div class="caption">
            <h3><?=$snow['code']; ?></h3>
            <p>Hic dolore eram illum nescius, summis an nostrud ne varias. Ut quid dolore se deserunt se culpa doctrina possumus, irure distinguantur officia eram quamquam, ubi nam instituendarum, quamquam minim vidisse nescius.</p>
            <p><a href="#" class="btn btn-xs btn-primary" role="button" title="En savoir +">En savoir +</a> <a href="#" class="btn btn-xs btn-default" role="button" title="Voir le détail">Voir le détail</a></p>
        </div>
    </div>

<?php endforeach; ?>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>

