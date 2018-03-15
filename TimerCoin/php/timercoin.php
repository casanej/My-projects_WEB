<?php
function getIp(){
	$ip = "Cannot get IP";
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	
	return $ip;
}

function passwordEncrypt($password){
	$pass = md5($password);
	return $pass;
}

function passwordVerify($password, $hash){
	if(password_verify($password, $hash)){
		return true;
	} else{
		return false;
	}
}
?>