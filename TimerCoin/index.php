<?php
if(!isset($_SESSION)) session_start();

require_once("php/framework.php");

$startFramework = new framework();

$headScripts = $startFramework->addHeadScripts();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home :: TimerCoin</title>
	<?=$headScripts;?>
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
	<header class="main-header" style="margin-bottom: -20px;">
		<?=require_once("php/menu-bar.php");?>
	</header>
	<aside class="main-sidebar" style="margin-bottom: -20px;">
		<?=require_once("php/side-bar.php");?>
	</aside>
	<div class="content-wrapper">
		<section class="content-header">
			<h1>Timercoin <small>your timer faucet</small></h1>
			<ol class="breadcrumb">
				<li><a href="#you are here"><i class="fa fa-dashboard"></i> Home</a></li>
			</ol>
		</section>

		<section class="content">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Title</h3>
				</div>
				<div class="box-body">
					Start creating your amazing application!
				</div>
				<div class="box-footer">
					Footer
				</div>
			</div>
		</section>
	</div>

	<footer class="main-footer">
		<?=require_once("php/footer.php");?>
	</footer>
	
	<aside class="control-sidebar control-sidebar-dark">
		<?=require_once("php/side-bar-right.php");?>
	</aside>
	<div class="control-sidebar-bg"></div>
</div>
</body>
</html>
