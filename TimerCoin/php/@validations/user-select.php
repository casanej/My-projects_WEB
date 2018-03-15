<?php
if(!isset($_SESSION)) session_start();

require_once("../@system/connect.php");
require_once("../@system/login.php");

$email = $_POST['lemail'];
$password = $_POST['lpassword'];

$instantiateLogin = new login();

if($makeLogin = $instantiateLogin->calldoLogin($email, $password)){
	$redirect = "../../index.php";
} else{
	$redirect = "../../access.php";
}

$closeConn = $instantiateLogin->force_close();

header("Location: ".$redirect);
?>