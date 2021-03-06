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
<body>
    <svg width="100%" viewBox="0 0 1195 939" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <image xlink:href="images/Tribes_Map-assets/Fundo.png" width="100%" height="100%"/>
        <image xlink:href="images/Tribes_Map-assets/Mapa.png" width="100%" height="100%"/>
        <a href="javascript:void(0);">
            <image xlink:href="images/Tribes_Map-assets/Visigoths.png" x="262" y="596" width="87" height="93">
        </a>
        <a href="javascript:void(0);">
            <image xlink:href="images/Tribes_Map-assets/Basques.png" x="194" y="649" width="92" height="51">
        </a>

          <path class="enabled" id="Basques" fill="none" stroke="black" stroke-width="1" d="M 285.34,678.96
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
             270.60,670.61 287.73,671.47 285.34,678.96 Z" />
    </svg>
    <div class="description"></div>
</body>
</html>
<script>
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
svg {
  max-width: 100% !important;
  height: auto;
  display: block;
}

.heyo:hover {
  fill: #CC2929;
  -moz-transition: 0.3s;
  -o-transition: 0.3s;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}

.enabled {
  fill: #21669E;
  cursor: pointer;
}

.description {
  pointer-events: none;
  position: absolute;
  font-size: 18px;
  text-align: center;
  background: white;
  padding: 10px 15px;
  z-index: 5;
  height: 30px;
  line-height: 30px;
  margin: 0 auto;
  color: #21669e;
  border-radius: 5px;
  box-shadow: 0 0 0 1px #eee;
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
