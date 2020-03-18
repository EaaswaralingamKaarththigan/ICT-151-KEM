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
<form action="index.php?action=register">
    <div class="container">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label for="email"><b>Email</b></label><br>
        <input type="text" placeholder="Enter Email" name="new_email" required>
        <br>
        <label for="email"><b>Username</b></label><br>
        <input type="text" placeholder="Enter Username" name="new_username" required>
        <br>
        <label for="psw"><b>Password</b></label><br>
        <input type="password" placeholder="Enter Password" name="new_password" required>
        <br>
        <hr>
        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

        <button type="submit" class="registerbtn">Register</button>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="#">Sign in</a>.</p>
    </div>
</form>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>

