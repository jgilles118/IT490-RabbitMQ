<?php


error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);


$username = $_GET["Username"];
$password = $_GET["Password"];
$name = $_GET["Name"];
$email = $_GET["Email"];

header("refresh:1; url = 'djmvClient.php'");

        //Session incase user,password,type needed elsewhere 
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        $_SESSION["message"] = "Newby";



$host = "localhost";
$user = "mk694";
$pass = "testmk694";
$dbname = "userlogin";

$con = mysqli_connect($host, $user, $pass, $dbname);


        $newUser = mysqli_query($con, "INSERT INTO user(Username, Password, Name, Email) VALUES('$username', '$password', '$name', '$email')");

        if($con->query($newUser) == FALSE) { $_SESSION["message"]= "New Member";
                                header("refresh:1; url = 'vmdajClient.php'");
                                header("refresh:1; url = 'http://api2.bigoven.com'");  }

	else {  $_SESSION["message"]= "Creation issue";
                header("refresh:1; url = 'djmvClient.php'");
                $url = "register.html";
                header ("refresh:2; url =$url");  }


?>

