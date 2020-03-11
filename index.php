<!--
 Titre : Rent A Snow
 Auteur : Eaaswaralingam Kaarththigan
 Date : 26.01.2020
 Version : 1.0
 -->
<?php
require "controler/controler.php";
if (isset($_GET{'action'})){
    $action=$_GET{'action'};
    switch ($action){
        case 'home' :
            home(); // Accède au page d'accueil
            break;
        case 'login' :
            login(); // Accède au page du login
            break;
        case 'logout' :
            logout(); // Accède au page du logout
            break;
        case 'login-success':
            loginsuccess();
            break;
        case 'snowsvente':
            snowsvente();
            break;
        case 'snowsachat':
            snowsachat();
            break;


        default :
            home(); // Page de l'accueil par défaut

    }
}
else{
    home();
}