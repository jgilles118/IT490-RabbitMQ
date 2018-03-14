#!/usr/bin/php
<?php
session_start();

error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);
ini_set('display_errors', 1);

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');


$user = ($_POST['user']);
$pass = ($_POST['pass']);
$type = ($_POST['type']);
$_SESSION["username"] = $user;
$_SESSION["password"] = $pass;
$_SESSION["type"] = $type;


function doLogin($username,$password)
{

$url = "djmvClient.php";
$lolo = "lolo.html";
$api = "http://api2.bigoven.com";
$host = "localhost";
$DBuser = "root";
$DBpass = "it490";
$database = 'userLogin';


$con = mysqli_connect($host, $DBuser, $DBpass, $database);

$query=mysqli_query($con, "SELECT * from User WHERE Member='$username' && Password='$password'");

$rows = mysqli_num_rows($query);

if($rows==1) { echo "Your Username and Password are Correct"; 
	header("refresh:2; url= $url");
	header("refresh:2; url= $$api"); 
	return true; }

else { echo "Your Username and Password are Wrong"; 
	header("refresh: 2; url= $lolo"); 
	return false;} 

}
doLogin($user, $pass);


/*
function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }

  switch ($request['type'])
  {
    case "login":
      return doLogin($request['username'],$request['password']);
    case "validate_session":
      return doValidate($request['sessionId']);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();
*/
?>

