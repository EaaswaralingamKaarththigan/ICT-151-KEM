<?php

session_start();

require_once "model/model.php";

function home()
{
    $_GET["action"] = "home";
    require "view/home.php";
}


function login()
{

    $username = @$_POST['email'];
    $password = @$_POST['password'];


    if (isset($username) && isset($password)) {
        checkLogin($username, $password);
    } else {
        require "view/login.php";
    }
}


function logout()
{
    $_GET["action"] = "logout";
    $_SESSION = session_destroy();
    home();
}

function loginsuccess()
{
    $_GET["action"] = "loginsuccess";
    require "view/loginsuccess.php";
}

function snowsvente()
{
    $_GET["action"] = "snowsvente";
    $snows = getSnows();
    require "view/snowsSeller.php";
}

function snowsachat()
{
    $_GET["action"] = "view/snowsClient.php";
    $snows = getSnows();
    require "view/snowsClient.php";
}

function register()
{
    $_GET["action"] = "register";

    /* Get inputs */
    $username = @$_POST['new_username'];
    $email = strtolower(@$_POST['new_email']);
    $password = password_hash(@$_POST['new_password'], PASSWORD_DEFAULT);

    /* Checks if the imputs are empty */
    if (!isset($username) || !isset($email) || !isset($password)) {
        require_once "view/register.php";
    } else {

        addUser($username, $email, $password);

        require_once "view/register.php";
    }
}

function CreateSnow(){

}