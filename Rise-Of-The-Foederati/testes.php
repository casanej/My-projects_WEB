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
						<path class="enabled" id="Basques" d="M 244.17,693.21
						   C 241.90,695.31 240.25,698.34 237.70,699.43
							 235.48,700.37 223.23,700.01 220.00,700.00
							 213.96,699.99 199.52,698.77 196.51,692.81
							 193.75,687.36 195.96,681.58 195.73,677.00
							 195.46,671.68 191.65,664.17 197.42,659.98
							 199.59,658.41 211.26,655.92 214.00,656.31
							 214.00,656.31 221.00,658.50 221.00,658.50
							 225.27,659.52 228.09,657.80 232.00,658.50
							 237.52,659.28 238.17,662.19 247.00,660.85
							 251.49,660.17 254.55,658.93 257.96,655.87
							 259.63,654.38 262.67,650.38 264.94,650.34
							 267.41,650.29 267.77,653.17 267.62,655.01
							 267.30,659.03 263.36,665.99 266.60,669.42
							 269.88,672.88 281.29,670.82 283.34,677.09
							 286.33,686.21 270.33,681.59 267.00,681.00
							 267.00,681.00 262.00,693.21 262.00,693.21
							 255.86,689.60 250.07,688.49 244.17,693.21 Z" />
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
		<br><br><br><br><br>
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="959px" height="593px" viewBox="none" preserveAspectRatio="xMidYMid meet" xml:space="preserve" >
	


</svg>

<div class="description"></div>

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
	
	$description = $(".description");

  $('.enabled').hover(function() {
    
    $(this).attr("class", "enabled heyo");
    $description.addClass('active');
    $description.html($(this).attr('id'));
  }, function() {
    $description.removeClass('active');
  });

$(document).on('mousemove', function(e){
  
  $description.css({
    left:  e.pageX,
    top:   e.pageY - 70
  });
  
});
</script>

<style>
	html, body {
  width: 100%;
}

svg {
  max-width: 100% !important;
  height: auto;
  display: block;
}

.heyo:hover {
	fill: red;
	stroke: yellow;
}

.enabled {
	fill-opacity: 0;
  	cursor: pointer;
}

.description {
	border: 1px solid black;
	border-radius: 5px;
	background: white;
	
	padding: 10px;
	
	pointer-events: none;
	position: absolute;
	/*font-size: 18px;*/
	text-align: center;
	

	/*z-index: 5;*/
	line-height: 30px;
	/*margin: 0 auto;*/
	color: #21669e;
	
	/*box-shadow: 0 0 0 1px #eee;*/
	-moz-transform: translateX(-50%);
	-ms-transform: translateX(-50%);
	-webkit-transform: translateX(-50%);
	transform: translateX(-50%);
	display: none;
}
.description.active {
  display: block;
}
.description:after {
  content: "";
  position: absolute;
  left: 50%;
  top: 100%;
  width: 0;
  height: 0;
  margin-left: -10px;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
  border-top: 10px solid white;
}

</style>