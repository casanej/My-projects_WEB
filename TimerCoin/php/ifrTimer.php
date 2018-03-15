<?php
if(!isset($_SESSION)) session_start();

require_once("framework.php");
require_once("@validations/timer-select.php");

$startFramework = new framework();

$setTimezone = setTimezone('America/Sao_Paulo');
$headcripts = $startFramework->addHeadScripts('timer', '../');

$idTimer = $_GET['id'];

$info = retrieveTimersById($idTimer);

$cooldown = $info[0]['duration'];
$lastClick = $startFramework->datetimeToArray($info[0]['lastclick']);

$currentDate = date('Y-m-d H:i:s	');
$pastDate = date('Y-m-d H:i:s', mktime($lastClick['hour'], $lastClick['minute'], $lastClick['second'] + $cooldown, $lastClick['month'], $lastClick['day'], $lastClick['year']));

$seconds = $startFramework->secondsBetweenDatetime($pastDate, $currentDate);

//printf("Data atual: %s || Limit time: %s || Difference: %s", $currentDate, $pastDate, $seconds);
?>
<html>
<head>
	<?=$headcripts;?>
</head>
<body onLoad="instantiateInfo(<?=$seconds;?>, <?=$info[0]['recount'];?>, '<?=$info[0]['website'];?>', '<?=$info[0]['name'];?>');">
	<div class="box box-widget widget-user">
		<div class="widget-user-header bg-aqua-active">
			<h3 class="widget-user-username"><a href="<?=rawurldecode($info[0]['website']);?>"><?=$info[0]['name'];?></a></h3>
		  <h5 class="widget-user-desc">Last click: <?=$info[0]['lastclick'];?></h5>
		</div>
		<div class="widget-user-image">
		  <img class="img-circle" src="../upload/profile/201801998018020180.png" alt="User Avatar">
		</div>
		<div class="box-footer">
			<div class="row">
				<div class="col-xs-12" id="showTimerTime"></div>
				<div class="col-xs-3 fistRow"><button class="btn btn-success btn-block disabled" id="btnRecount" onClick="restartCounter(<?=$idTimer;?>);">Recount</button></div>
				<div class="col-xs-3 fistRow"><button class="btn btn-warning btn-block">Reset</button></div>
				<div class="col-xs-3 fistRow"><button class="btn btn-default btn-block bg-gray">Edit</button></div>
				<div class="col-xs-3 fistRow"><button class="btn btn-default btn-block bg-purple">Statistics</button></div>
			</div>
			
		</div>
	  </div>
</body>
</html>

<script>
</script>

<style>
	a{
		text-decoration: none;
		color: white;
	}
	
	a:hover{
		text-decoration: none;
		color: white;
	}
	
	#showTimerTime, fistRow{
		font-size: 30px;
		text-align: center;
	}
</style>