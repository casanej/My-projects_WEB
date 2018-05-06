<?php
require_once("../framework.php");
require_once("../@system/connection.php");
require_once("../@system/session_manager.php");
require_once("../@system/user_manager.php");

$fwFramework = new Framework();
$fwSessionManager = new SessionManager();
$fwuserMgmt = new UserManagement();

$startSession = $fwSessionManager->startSession();

$name = $_POST['registerFName'];
$surname = $_POST['registerLName'];
$email = $_POST['registerEmail'];
$password = $_POST['registerPassword'];

$fullName = sprintf("%s %s", $name, $surname);

$query = $fwuserMgmt->callRegisterUser($fullName, $email, $password);
?>
