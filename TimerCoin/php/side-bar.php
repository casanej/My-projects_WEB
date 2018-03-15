<?php
if($typeMenu == 0){
?>
<section class="sidebar">
	<div class="user-panel">
		<div class="pull-left image">
			
		</div>
		<div class="pull-left info">
			<p>Login / Register</p>
		</div>
	</div>
	<ul class="sidebar-menu" data-widget="tree">
		<li class="header">MAIN NAVIGATION</li>
		<li>
			<a href="index.php"><i class="fa fa-dashboard"></i> <span>Home</span></a>
		</li>
	</ul>
</section>
<?php
} else if($typeMenu == 1){
?>
<aside class="main-sidebar">
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?=sprintf("upload/profile/%s.png", $userUniqId);?>" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?=$userName;?></p>
			</div>
		</div>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">WEB SITE</li>
			<li><a href="#"><i class="fa fa-dashboard"></i> <span>About</span></a></li>
			<li><a href="#"><i class="fa fa-dashboard"></i> <span>Contact</span></a></li>
			<li><a href="#"><i class="fa fa-dashboard"></i> <span>Terms</span></a></li>
			<li><a href="#"><i class="fa fa-question"></i> <span>F.A.Q</span></a></li>
			<li class="header">MAIN NAVIGATION</li>
			<li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>
			<li><a href="timer.php"><i class="fa fa-clock-o"></i> <span>Timers</span></a></li>
			<li class="header">SUPORT</li>
			<li><a href="javascript:void(0);"><i class="fa fa-sticky-note"></i> <span>Tickets</span></a></li>
			<li><a href="javascript:void(0);"><i class="fa fa-envelope"></i> <span>Mesages</span></a></li>
			<li><a href="javascript:void(0);"><i class="fa fa-bell"></i> <span>Notification</span></a></li>
			<li><a href="javascript:void(0);"><i class="fa fa-comments"></i> <span>Live Chat (In development)</span></a></li>
			<li><a href="javascript:void(0);"><i class=""></i> <span>&nbsp;</span></a></li>
			<li><a href="javascript:void(0);"><i class=""></i> <span>&nbsp;</span></a></li>
		</ul>
	</section>
</aside>
<?php
}
?>