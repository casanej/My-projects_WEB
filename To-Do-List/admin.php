<?php
require_once("php/framework.php");
$user = new user_manager();

<<<<<<< HEAD
$user->doRegister("Rafael Casanje", "rafael.casanje@gmail.com", "R@f@el2010");

//printf("<br>Echo: %s<br>Dump: %s<br>", $user, "BUSTED");
$info = json_encode($user);
$info = explode(">", $info);

var_dump( $info[0]);



=======
echo $user->doRegister("Rafael Casanje", "rafael.casanje@gmail.com", "R@f@el2010");
>>>>>>> f73fa81b423ab3338d3790c89b998d2efbfec3a2
?>
