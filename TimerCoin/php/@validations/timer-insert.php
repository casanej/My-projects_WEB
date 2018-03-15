<?php
if(!isset($_SESSION)) session_start();

require_once("../@system/connect.php");
require_once("../@system/timers.php");

$startTimers = new timers();

$name = $_POST['timerName'];
$duration = $_POST['timerDuration'];
$repeat = $_POST['timerRepeat'];
$redirect = $_POST['timerRedirect'];

$query = $startTimers->callTimerInsert($name, $redirect, $duration, $repeat);

switch($query){ 
	case 1:
		$_SESSION['Timers']['error'] = "Success! Timer added with succefull";
		break;
	case 1064:
		$_SESSION['Timers']['error'] = "The connection with database has failed, try again after.";
		break;
	default:
		$_SESSION['Timers']['error'] = "Something unknown happened! Contact an administrator fot further information.";
		break;	
}

header("Location: ../../timer.php");
?>