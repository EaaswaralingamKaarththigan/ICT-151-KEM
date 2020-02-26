<?php
/**
 * Author   : nicolas.glassey@cpnv.ch
 * Project  : 151_2019_ForStudents
 * Created  : 05.02.2019 - 18:40
 *
 * Last update :    [01.12.2018 author]
 *                  [add $logName in function setFullPath]
 * Git source  :    [link]
 */
require_once "model/model.php";

/* La fonction qui permettra de pouvoir en lancer une se présente
au tout début */
session_start();

// Fonction pour aller dans le menu
function home(){
    $_GET['action']="home";
    require "view/home.php";
}

// Fonction relié à la connexion d'un utilisateur
function login(){
    $_GET['action']="login";
    $nom_utilisateur = @$_POST["username"]; // récupère le nom d'utilisateur
    $mot_de_passe = @$_POST['password']; // récupère le mot de passe

    if($nom_utilisateur == "" || $mot_de_passe == "") // si le nom d'utilisateur ou le mot de passe est vide, alors retourner sur la page "login"
    {
        require "view/login.php";
    }
    else // sinon vérifier si les identifiants sont justes
    {
        require "model/model.php"; // besoin de la page "modele"
        $connected = checklogin($nom_utilisateur,$mot_de_passe);
        if($connected)  // si les identifiants sont justes
        {

            $user = $nom_utilisateur;
            // afficher un message
            $_SESSION['users'] = $user; // le nom de la session portera le nom de l'utilisateur
            home(); // va sur la page d'accueil
        }
        else    // sinon :
        {

            $mdp = $mot_de_passe;
            $user = $nom_utilisateur;
            $falseuser = 'model/user.json';     // fichier json pour faux identifiants

            if (file_get_contents($falseuser) == "") // si le fichier est vide, il va créer les nouveaux données
            {


                $Array = array([
                    'false-username' => $user,
                    'password' => $mdp]);


                $Array = json_encode($Array, true);
                file_put_contents($falseuser, $Array);

            } else      // sinon, il va ajouter ces données à ceux déjà créés.
            {


                $Array = array(
                    'false-username' => $user,
                    'password' => $mdp);

                $sArray = file_get_contents($falseuser);
                $sArray = json_decode($sArray, true);
                array_push($sArray, $Array);
                $dataArray = json_encode($sArray, true);
                file_put_contents($falseuser, $dataArray);
            }
        }
        require require "view/login.php";      // besoin de la page de "loginfalse"
    }
}

// Fonction pour se déconnecter de la session
function logout() // Fonction qui va permettre de fermer la session
{
    $_GET['action'] = 'logout';
    $_SESSION = session_destroy();
    home();
}

function openDB(){
    openDBconversion();

}

