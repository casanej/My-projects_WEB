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
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Timers :: TimerCoin</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
				<li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#you are here"> </i> Timers</a></li>
			</ol>
		</section>

		<section class="content">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Timers</h3>
					<?php
					if(isset($_SESSION['Timers']['error'])){
						$message = $_SESSION['Timers']['error'];
						switch($message){
							case 4:
								echo $startFramework->createCallout(2, 'Success', "Counter reset successfully");
								break;
							case strpos($message, "Success") >= 0 && $_SESSION['Timers']['error'] != 0:
								echo $startFramework->createCallout(2, 'Success', $message);
								break;
						}
						$_SESSION['Timers']['error'] = 0;
					}
					?>
				</div>
				<div class="box-body">
					<?php
					require_once("php/@validations/timer-select.php");
					
					$info = retrieveAllTimers();
					
					for($i=0;$i<count($info);$i++){
						printf('<iframe src="php/ifrTimer.php?id=%s" height="250" width="48%%" frameborder="0" scrolling="no"></iframe>', $info[$i]['id']);
					}
					?>
				</div>
				<div class="box-footer">
					<div class="row">
						<div class="col-md-12">
							<form action="php/@validations/timer-insert.php" method="post">
								<div class="bg-gray color-pallete box fixMargin">
									<div class="box-header">
										<h4>Create a new timer</h4>
									</div>
									<div class="box-body">
										<div class="row">
											<div class="col-md-4">
												<label>Name: </label>
												<input class="inputTransparent inputBBorder width80" type="text" name="timerName">
											</div>
											<div class="col-md-4">
												<label>Duration: </label>
												<input class="inputTransparent inputBBorder" type="number" name="timerDuration" placeholder="Put the time in seconds">
											</div>
											<div class="col-md-4">
												<label class="control-label">Repeat: </label>
												<select class="inputTransparent inputBBorder width80" name="timerRepeat">
													<option value="0">No</option>
													<option value="1">Yes</option>
												</select>
											</div>
											<hr>
											<div class="col-md-12">
												<label>Redirect when finished ? </label>
												<input class="inputTransparent inputBBorder width80" type="text" name="timerRedirect" placeholder="Leave empty if you do not want redirect">
											</div>
										</div>
										<hr>
										<p><button class="btn btn-success width100" type="submit"><i class="fa fa-clock-o"></i> Create Timer</button></p>
									</div>
								</div>
							</form>
						</div>
					</div>
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
