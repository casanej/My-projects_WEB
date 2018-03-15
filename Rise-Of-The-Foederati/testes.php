<?php
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Rise of the Foederati :: Home</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/risefoederati.css">
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<link rel="stylesheet" href="css/fa-solid.css">
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/mapper.js"></script>
</head>

<body id="tribes">
	<header>
		<?php include("php/barra-de-menu-topo.php"); ?>
	</header>
	<div class="container" id="conteudo">
		<?php
			if(!isset($_GET['tribe'])){
		?>
		<div class="row">
			<div class="col-md-12" style="height: 80%">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1195 939">
					<image class="highlight" id="Fundo.png" href="images/Tribes_Map-assets/Fundo.png"/>
					<image id="Mapa.png" href="images/Tribes_Map-assets/Mapa.png"/>
					<a href="?tribe=Visigoths">
						<image id="Visigoths.png" x="262" y="596" href="images/Tribes_Map-assets/Visigoths.png"/>
					</a>
					<a href="?tribe=Basques">
						<image id="Basques.png" x="194" y="649" href="images/Tribes_Map-assets/Basques.png"/>
					</a>
				</svg>
			</div>
			<!-- <div class="col-md-3">
				<div id="tribe">
					<div id="tribe-header" align="center">
						<img src="images/tribes/Visigoths.png" width="100" height="100">
					</div>
					<div id="tribe-body" align="center">
						<h4>Visigoths</h4>
						<p>The Goths of the West</p>
					</div>
					<div id="tribe-footer" align="center">
						<a class="btn btn-outline-warning btn-block" href="?tribe=Visigoths">View Units</a>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div id="tribe">
					<div id="tribe-header" align="center">
						<img src="images/tribes/Basques.png" width="100" height="100">
					</div>
					<div id="tribe-body" align="center">
						<h4>Basques</h4>
						<p>The Unconquerables</p>
					</div>
					<div id="tribe-footer" align="center">
						<a class="btn btn-outline-warning btn-block" href="?tribe=Basques">View Units</a>
					</div>
				</div>
			</div> -->
			<div class="col-md-3"></div>
			<div class="col-md-3"></div>
		</div>
		<?php 
			} else{
				require_once("php/tribes/".$_GET['tribe'].".php");
			}
		?>
	</div>
</body>
</html>

<style>
	.highlight{
		box-shadow: 0px 0px 3px 3px red;
	}
</style>

<script>
	function highlight(){
		console.log("teste");
		
	}
</script>