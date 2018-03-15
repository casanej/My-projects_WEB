<?php
if(!isset($_SESSION)) session_start();

require_once("../@system/connect.php");
require_once("../@system/login.php");

$instantiateLogin = new login();

$logoff = $instantiateLogin->calldoLogoff();

header("Location: ../../index.php");
?>