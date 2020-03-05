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

    $query = "SELECT userEmailAddress, userPsw FROM snows;";
    $result = executeQuery($query);


    foreach ($result as $user) {
        if ($username == $user['userEmailAddress'] && $password == $user['userPsw']) {

        }
    }

}
