<!--
 Titre : Rent A Snow
 Auteur : Eaaswaralingam Kaarththigan
 Date : 26.01.2020
 Version : 1.0
 -->
<?php

// tampon de flux stocké en mémoire

ob_start();
$titre = "Rent A Snow - Accueil"

?>
<div id="container">
    <!-- zone de connexion -->

    <!-- Formulaire pour se connecter sur le site !-->
    <form action="index.php?action=login" method="post">
        <h1>Connexion</h1>

        <label><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="password" required>

        <input type="submit" id='submit' value='LOGIN' >


    </form>
    <a href="index.php?action"></a>
</div>

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>

