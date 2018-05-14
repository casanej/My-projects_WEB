<?php
require_once("php/framework.php");

$user = new user_manager();

$user->doLogin("rafael.casanje@gmail.com", "");

echo $user;
?>
