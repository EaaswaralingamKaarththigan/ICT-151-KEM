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
    <div class="thumbnail col-sm-6 col-md-3" style="display: inline-block; margin: 20px">

        <h3 style="display: inline"><?= $snow['code']; ?></h3>
        <img src="<?= $snow['photo']; ?>" alt="Nature">


        <a href="#" class="btn btn-xs btn-primary" role="button" title="En savoir +">En savoir +</a> <a
                href="#" class="btn btn-xs btn-default" role="button" title="Voir le détail">Voir le
            détail</a>
    </div>

    <button></button>

<?php endforeach; ?>



<?php
$content = ob_get_clean();
require "gabarit.php";
?>

