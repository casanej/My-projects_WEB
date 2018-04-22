<?php
    $pgProvince = "null";
?>
<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<title>Rise of the Foederati :: Province</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/risefoederati.css">
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<link rel="stylesheet" href="css/fa-solid.css">
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body class="default">
	<header>
		<?php include("php/barra-de-menu-topo.php"); ?>
	</header>
	<div class="container" id="conteudo">
        <h1 align="center">Province Name</h1>
        <?php if($pgProvince == "null"): ?>
            <div class="row">
                <div class="col-md-12" align="center">
                    <img class="img-fluid" src="images/samples/1024x600.jpg" title="Province Map" alt="Province Map">
                    <br><br>
                </div>
                <div class="col-md-6">
                    <h4>Cities</h4>
                    <ul>
                        <li>City #1</li>
                        <li>City #2</li>
                        <li>City #3</li>
                        <li>City #4</li>
                        <li>City #5</li>
                        <li>City #6</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h4>Statistics</h4>
                    <ul type="none" align="left">
                        <li>FULL PROVINCE NAME: Example of full name</li>
                        <li>HABITANTS: 12.000</li>
                        <li>QUANTITY OF CITIES: 12</li>
                        <li>ECONOMY: Euro </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin pretium ipsum lobortis tincidunt. Phasellus volutpat tempor eros eu tincidunt. Sed sollicitudin accumsan placerat. Duis aliquet sed enim eget hendrerit. Phasellus pulvinar eget elit vitae commodo. Donec et elit mauris. Quisque feugiat lectus purus, eu varius tellus vestibulum et. Duis et imperdiet tellus. Fusce a porttitor erat. Donec quam purus, lacinia quis posuere vitae, tincidunt a justo. Mauris in tempor ex, at consequat sapien. Vivamus non rhoncus quam.</p>
                    <p>Pellentesque id leo congue leo luctus eleifend vitae eget sem. Phasellus a lobortis augue, in varius purus. Suspendisse potenti. Donec feugiat dapibus commodo. Suspendisse venenatis enim vel eros mattis hendrerit. Pellentesque accumsan, ante vitae fermentum tempus, urna nunc aliquet ante, ac lacinia arcu elit ac leo. Curabitur ac tellus sit amet est egestas accumsan eu ac nibh. In a metus lacinia, consequat leo sed, hendrerit lectus. Integer cursus felis sed urna sollicitudin condimentum.</p>
                </div>
            </div>
        <?php endif; ?>
	</div>
</body>
</html>
