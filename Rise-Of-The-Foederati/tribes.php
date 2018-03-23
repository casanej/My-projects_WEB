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
	<script src="js/map-highlight.js"></script>
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
			<div class="col-md-12">
				<img class="img-fluid" src="images/gallery_1.png" usemap="#image-map">

				<map name="image-map">
					<area id="Unknown" alt="Unknown" target="_self" title="Unkown" href="#Unknown" shape="poly" onMouseOver="highlight();" coords="141,752,136,744,134,739,135,734,124,726,111,728,107,731,97,729,84,732,88,720,88,712,86,708,89,701,86,694,80,698,80,691,76,689,77,676,88,656,91,638,89,623,87,616,89,604,89,595,87,591,83,586,80,583,82,578,88,574,97,573,100,572,98,571,110,564,117,568,125,569,137,568,147,567,159,571,168,572,167,579,168,583,169,590,169,599,166,616,162,620,153,621,157,628,154,665,162,671,164,678,165,686,178,700,180,718,188,717,195,720,199,728,202,734,199,737,190,737,177,736,170,739,167,743,158,743,153,752,149,754">
				</map>
			</div>
			<div class="col-md-3">
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
			</div>
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

<script>
	function highlight(){
		console.log("teste");
		
	}
</script>