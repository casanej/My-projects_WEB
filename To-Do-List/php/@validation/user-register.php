<?php
require_once("../framework.php");

$fwUserMgmt = new UserManagement();

$startSession = SessionManager::startSession();

$name = $_POST['registerFName'];
$surname = $_POST['registerLName'];
$email = $_POST['registerEmail'];
$password = $_POST['registerPassword'];

$fullName = sprintf("%s %s", $name, $surname);

$query = $fwUserMgmt->callRegisterUser($fullName, $email, $password);


printf("Error -> %s", Framework::verifyError($query));
?>
