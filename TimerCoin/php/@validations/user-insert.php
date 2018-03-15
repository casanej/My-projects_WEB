<?php
if(!isset($_SESSION)) session_start();

require_once("../@system/connect.php");
require_once("../@system/register.php");

$name = $_POST['rname'];
$email = $_POST['remail'];
$password = $_POST['rpass'];
$birthday = $_POST['rbirthday'];
$country = $_POST['rcountry'];
$timezone = $_POST['rtimezone'];
$safeword = $_POST['rsafeword'];

$instantiateRegister = new register();

$checkEmail = $instantiateRegister->callVerifyEmail($email);

if(!$checkEmail){
	$registerUser = $instantiateRegister->callRegisterUser($name, $email, $password, $birthday, $country, $timezone, $safeword);
	if($registerUser == true){
		$_SESSION['Error']['register'] = "";
		$redirect = '../../index.php';
	} else{
		$_SESSION['User']['logged'] = false;
		$redirect = '../../access.php';
	}
} else{
	$redirect = '../../access.php';
}

$closeConnection = $instantiateRegister->force_close();

header("Location: ".$redirect);
?>