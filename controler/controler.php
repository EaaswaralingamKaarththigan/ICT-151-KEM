<?php
/*  Autor : Adam Gruber
    Date : 16.12.2019
    Version : 1.0
*/
session_start();

require_once "model/model.php";
//This function redirects on home.php
function home()
{
    $_GET["action"] = "home";
    require "view/home.php";
}

/**
 *This function will test if the password and username are empty
 * If it isn't it will check it in an other function
 */
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

/**
 * This function will destroy the user SESSION when he is login
 */
function logout()
{
    $_GET["action"] = "logout";
    $_SESSION = session_destroy();
    home();
}


/* Redirect the user to the product page */
function products()
{
    require "view/products.php";
}

function loginsuccess()
{
    $_GET["action"] = "logout";
    require "view/loginsuccess.php";
}