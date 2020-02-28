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
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root2');
    define('DB_PASSWORD', 'pa$$w0rd');
    define('DB_DATABASE', 'snows');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form

        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']);

        $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];

        $count = mysqli_num_rows($result);

        // If result matched $myusername and $mypassword, table row must be 1 row

        if($count == 1) {
            session_register("myusername");
            $_SESSION['login_user'] = $myusername;

            header("location: welcome.php");
        }else {
            $error = "Your Login Name or Password is invalid";
        }
    }
}
