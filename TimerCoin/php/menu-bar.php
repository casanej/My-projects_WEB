<?php
if(!isset($_SESSION)) session_start();

if(!isset($_SESSION['User']['logged'])){
	$typeMenu = 0;
} else{
	if($_SESSION['User']['logged'] == false){
		$typeMenu = 0;
	} else{
		$typeMenu = 1;
		/* Sessions infos */
		$userName = $_SESSION['User']['name'];
		$userUniqId = $_SESSION['User']['userid'];
	}
}

if($typeMenu == 0){
?>
<a href="index2.html" class = "logo" >
	<span class="logo-mini"><b>T</b>C</span>
	<span class="logo-lg"><b>Timer</b>Coin</span>
</a>
<nav class="navbar navbar-static-top">
	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</a>
	<div class="navbar-custom-menu">
		<ul class="nav navbar-nav">			
			<li class="user user-menu">
				<a href="access.php">
					<span class="hidden-xs">Login / Register</span>
				</a>
			</li>
		<!-- Control Sidebar Toggle Button -->
		<li>
		<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
		</li>
		</ul>
	</div>
</nav>
<?php
} else if($typeMenu == 1){
?>
<a href="index2.html" class = "logo" >
	<span class="logo-mini"><b>T</b>C</span>
	<span class="logo-lg"><b>Timer</b>Coin</span>
</a>
<nav class="navbar navbar-static-top">
	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</a>
	<div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
			<li class="dropdown messages-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-envelope-o"></i>
					<span class="label label-success">0</span>
				</a>
				<ul class="dropdown-menu">
					<li class="header">You have 0 messages</li>
					<li>
						<ul class="menu">
							<!-- Conteudo aqui -->
						</ul>
					</li>
					<li class="footer"><a href="#">See All Messages</a>
					</li>
				</ul>
			</li>
			
			<li class="dropdown notifications-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-bell-o"></i>
					<span class="label label-warning">0</span>
				</a>

				<ul class="dropdown-menu">
					<li class="header">You have 0 notifications</li>
					<li>
						<ul class="menu">
							<!-- Conteudo aqui -->
						</ul>
					</li>
					<li class="footer"><a href="#">View all notifications</a></li>
				</ul>
			</li>
			<li class="dropdown tasks-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-flag-o"></i>
					<span class="label label-danger">0</span>
				</a>
				<ul class="dropdown-menu">
					<li class="header">You have 0 tasks</li>
					<li>
						<ul class="menu">
							<li>
								<!-- Conteudo aqui -->
							</li>
						</ul>
					</li>
					<li class="footer"><a href="#">View all tasks</a></li>
				</ul>
			</li>
			
			<li class="dropdown user user-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="<?=sprintf("upload/profile/%s.png", $userUniqId);?>" class="user-image" alt="User Image">
					<span class="hidden-xs"><?=$userName;?></span>
				</a>

				<ul class="dropdown-menu">
					<li class="user-header">
						<img src="<?=sprintf("upload/profile/%s.png", $userUniqId);?>" class="img-circle" alt="User Image">
						<p><?=$userName;?></p>
					</li>
					<li class="user-body">
						<div class="row">
							<div class="col-xs-4 text-center btn-block"><a href="#">Counters</a></div>
						</div>
					</li>
					<li class="user-footer">
						<div class="pull-left"><a href="#" class="btn btn-default btn-flat">Profile</a></div>
						<div class="pull-right"><a href="php/@validations/user-disconnect.php" class="btn btn-default btn-flat">Sign out</a></div>
					</li>
				</ul>
			</li>
		<!-- Control Sidebar Toggle Button -->
		<li>
		<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
		</li>
		</ul>
	</div>
</nav>
<?php
}
?>