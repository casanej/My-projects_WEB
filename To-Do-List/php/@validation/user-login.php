<?php
require_once("../framework.php");
require_once("../@system/system_connect.php");
require_once("../@system/session_manager.php");
require_once("../@system/user_manager.php");

$fwFramework = new Framework();
$fwSessionManager = new SessionManager();
$fwUserMgmt = new UserManagement();

$startSession = SessionManager::startSession();

$email = $_POST['loginEmail'];
$password = $_POST['loginPassword'];

$query = $fwUserMgmt->callLoginUser($email, $password);


printf("Result: %s || Error -> %s", $query, Framework::verifyError($query));
?>
