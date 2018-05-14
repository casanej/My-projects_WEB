<?php
require_once("php/framework.php");
$user = new user_manager();

echo $user->doRegister("Rafael Casanje", "rafael.casanje@gmail.com", "R@f@el2010");
?>
