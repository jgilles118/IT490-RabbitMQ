
<?php
session_start();

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);

//Access to RMQ
include("djmvClient.php");
include("vmdajClient.php");

//From blog.html
$u =$_POST['User'];
$p =$_POST['Pass'];
$type =$_POST['type'];

//DB entrance
$host = "localhost";
$user = "mk694";
$pass = "testmk694";
$dbase = "userlogin";

if($type == "Login")    {

        //Session incase user,password,type needed elsewhere 
        $_SESSION["username"] = $u;
        $_SESSION["password"] = $p;
        $_SESSION["type"] = $type;
	$_SESSION["message"] = "Member Login attempt";
	//RMQ message
	 header("refresh:1; url = 'djmvClient.php'"); }

$con = mysqli_connect($host, $user, $pass, $dbase);

        $q = mysqli_query($con, "SELECT * from user WHERE Username = '$u' && Password='$p'");
        $rows = mysqli_num_rows($q);

        if($rows==1) {  $_SESSION["message"]= "Access GRANTED";
		      	//RMQ message
                         header("refresh:1; url = 'vmdajClient.php'");
		      	//Access to API
			header("refresh:1; url = 'http://api2.bigoven.com'");    }
                                
	else {	 $_SESSION["message"]= "Not A Member";
	      	//RMQ message
                 header("refresh:1; url = 'djmvClient.php'");
	      	//Redirect back to Registation page
                 $url = "register.html";
                 header ("refresh:2; url =$url");  }



?>

~                                                                               
~                                                                               
~                                                                               
~                                                                               
~                                                                               
~       
