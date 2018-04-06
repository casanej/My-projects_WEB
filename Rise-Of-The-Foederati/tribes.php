<!DOCTYPE>
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
			<div class="col-md-12 d-none d-sm-block">
				<svg width="100%" viewBox="0 0 1195 939" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				  <image xlink:href="images/Tribes_Map-assets/Fundo.png" width="100%" height="100%"/>
				  <image xlink:href="images/Tribes_Map-assets/Mapa.png" width="100%" height="100%"/>
				  <a href="?tribe=Visigoths">
				    <image x="262" y="596" xlink:href="images/Tribes_Map-assets/Visigoths.png" width="87" height="93">
				    <path class="enabled" id="Visigoths" d="M 267.00,607.00
				       C 267.04,604.22 267.03,595.16 272.01,597.17
				       276.07,598.80 277.13,604.69 279.51,608.00
				       284.77,615.32 287.97,614.90 296.00,615.00
				       304.94,615.12 304.01,617.32 310.00,618.61
				       317.72,620.28 312.79,616.56 331.00,623.42
				       333.27,624.28 340.79,626.88 342.03,628.70
				       343.51,631.12 340.90,633.48 342.03,637.00
				       343.62,641.39 351.84,647.12 349.40,653.99
				       347.90,658.20 339.57,663.68 338.15,669.00
				       337.26,672.33 339.29,674.03 339.65,677.00
				       340.27,682.12 334.48,689.48 329.00,688.30
				       322.64,686.93 325.89,684.48 315.00,683.87
				       308.64,683.52 308.19,679.60 303.00,678.31
				       303.00,678.31 289.09,677.59 289.09,677.59
				       285.39,676.62 284.67,674.40 279.00,673.12
				       276.43,672.54 270.33,671.99 268.43,670.71
				       260.89,665.64 275.92,649.92 263.00,651.00
				       263.00,651.00 267.00,607.00 267.00,607.00 Z" />
				  </a>
				  <a href="?tribe=Basques">
				    <image id="Basques.svg" x="194" y="649" xlink:href="images/Tribes_Map-assets/Basques.png" width="92" height="51">
				    <path class="enabled" id="Basques" d="M 285.34,678.96
				       C 283.21,685.66 273.92,681.01 269.38,684.60
				       266.78,686.65 265.06,691.76 262.62,692.83
				       258.87,694.49 257.71,689.24 251.00,691.22
				       244.11,693.24 242.62,697.70 238.00,699.40
				       236.23,700.05 233.88,699.99 232.00,700.00
				       224.52,700.05 210.63,700.80 204.00,698.64
				       201.69,697.89 197.41,696.38 195.87,694.36
				       193.70,691.10 195.89,682.89 195.87,679.00
				       195.57,674.57 192.11,664.43 195.02,660.58
				       196.93,658.06 204.00,657.31 207.00,656.89
				       209.64,656.52 212.41,655.30 215.00,655.77
				       217.61,656.25 219.98,658.32 223.00,658.63
				       226.28,658.95 228.54,657.07 232.00,657.49
				       236.13,658.00 238.82,661.36 245.00,660.80
				       247.95,660.54 252.24,659.27 254.58,657.44
				       257.52,655.13 260.28,650.75 263.98,649.66
				       267.38,648.65 268.88,650.89 268.76,654.02
				       268.56,658.95 266.03,658.78 266.00,670.00
				       270.60,670.61 287.73,671.47 285.34,678.96 Z"/>
				  </a>
				</svg>
				<div class="description"></div>
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

<div class="description"></div>
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
