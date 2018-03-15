<?php
if(!isset($_SESSION)) session_start();

$pathLink = $_SERVER['REQUEST_URI'];

switch($pathLink){
	case strpos($pathLink, "ifrTimer.php") > -1:
		$path = '';
		break;
	case strpos($pathLink, "timer.php") > -1:
		$path = 'php/';
		break;
}

require_once($path."@system/connect.php");
require_once($path."@system/timers.php");

function setTimezone($timezone){
	date_default_timezone_set($timezone);
}

function retrieveAllTimers(){
	$startTimer = new timers();
	$timers = $startTimer->callTimerRetrieveAll();
	
	if($timers){
		$result = $timers;	
	} else{
		$result = false;
	}
	
	return $result;
}

function retrieveTimersById($timerId){
	$startTimer = new timers();
	if($timer = $startTimer->callRetrieveAllTimersId($timerId)){
		$result = $timer;
	} else{
		$result = false;
	}
	
	return $result;
}
?>