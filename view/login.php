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
<form action="index.php?action=login" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
$content = ob_get_clean();
require "gabarit.php";
?>

