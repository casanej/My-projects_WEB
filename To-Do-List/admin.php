<?php
require_once("php/framework.php");

$user = new user_manager();

$user->doRegister("Rafael Casanje", "rafael.casanje@gmail.com", "R@f@el2010");

//printf("<br>Echo: %s<br>Dump: %s<br>", $user, "BUSTED");
$info = json_encode($user);
$info = explode(">", $info);

var_dump( $info[0]);



?>
