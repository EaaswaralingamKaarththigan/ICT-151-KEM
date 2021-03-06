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

function openDBconversion(){
    $dbConnector = null;

    $sqlDriver = 'mysql';
    $hostname = 'localhost';
    $username = 'root2';
    $password = 'pa$$w0rd';
    $dbname = 'snows';
    $dns = $sqlDriver . ':host=' . $hostname . ';dbname=' . $dbname;
    try{
        $dbConnector = new PDO($dns, $username, $password);
    }
    catch (PDOException $exception) {
        echo 'Connection failed : ' . $exception->getMessage();
    }

    return $dbConnector;

}

function executeQuery($query){
    $queryResult = null;
    $databaseConnection = openDBconversion();
    if ($databaseConnection != null){
        $statement = $databaseConnection->prepare($query);
        $statement->execute();
        $queryResult = $statement->fetchAll();
    }
    $databaseConnection = null;

    return $queryResult;
}

/* Cette fonction permettra de pouvoir vérifier si les identifiants
de la session sont valides*/
function checklogin($username, $password){

    $query = "SELECT userEmailAddress, userPsw FROM users;";
    $result = executeQuery($query);

    foreach ($result as $user) {
        if ($username == $user['userEmailAddress'] && $password == $user['userPsw']) {
            echo 'ok';
            require "view/loginsuccess.php";
        }
        else {
            echo 'no ok';
            $_GET["action"] = "login";
            require "view/login.php";
        }
    }

}

function addUser($username, $password, $mail){
        $query = "INSERT INTO snows.users (userEmailAddress, userPsw, pseudo) VALUES ('$mail', '$password', '$username');";
        $result = executeQuery($query);
        return $result;
}

function getSnows(){
    $query = 'SELECT * FROM snows.snows;';
    $result = executeQuery($query);

    return $result;
}

function updateSnow($snowName){
    $query ="UPDATE snows.snows SET snowsname = $snowName;";
    $result = executeQuery($query);

    return $result;
}

function deleteSnow($snowName){
    $query = "DELETE from snows WHERE snowsname = $snowName;";
    $result = executeQuery($query);

    return $result;
}

function addSnow($snowname){
    $query = "INSERT INTO snows.users (snowsname) VALUES ($snowname);";
    $result = executeQuery($query);
    return $result;
}

