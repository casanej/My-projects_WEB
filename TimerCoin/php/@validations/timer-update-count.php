<?php
if(!isset($_SESSION)) session_start();

require_once("../@system/connect.php");
require_once("../@system/timers.php");

$startTimers = new timers();

$idTimer = $_POST['index'];

$query = $startTimers->callUpdateLastClick($idTimer);

switch($query){
	case true:
		$_SESSION['Timers']['error'] = 4;
		break;
	case false:
		$_SESSION['Timers']['error'] = "Error with database. Contact an administrator with error: ".$query;
		break;
	case 1064:
		$_SESSION['Timers']['error'] = "Problem with MySQL row. Contact an administrator with error: 1064";
		break;
	default:
		$_SESSION['Timers']['error'] = $query;
		break;
}

$closeConn = $startTimers->force_close();

echo $_SESSION['Timer']['error'];
?>