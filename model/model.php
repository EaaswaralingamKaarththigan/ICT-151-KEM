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
        echo 'worked';
    }
    catch (PDOException $exception) {
        echo 'Connection failed : ' . $exception->getMessage();
    }

}

/* Cette fonction permettra de pouvoir vérifier si les identifiants
de la session sont valides*/
function checklogin($nom_util, $mdp){
    $userTable = file_get_contents("model/useracc.json");
    $userTable = json_decode($userTable, true);

    // va servir à aller rechercher les identifiants dans le fichier json
    foreach ($userTable as $user) {
        if ($user['user'] == $nom_util && $user['password'] == $mdp) {
            return true;
        }
    }
    return false;
}
