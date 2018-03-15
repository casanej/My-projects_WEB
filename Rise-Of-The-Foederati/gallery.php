<?php
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Rise of the Foederati :: Gallery</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<link rel="stylesheet" href="css/fa-solid.css">
	<link rel="stylesheet" href="css/risefoederati.css">
	<link rel="stylesheet" href="css/photoswipe.css">
	<link rel="stylesheet" href="css/photoswipe/default-skin.css">
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/photoswipe.min.js"></script>
	<script src="js/photoswipe-ui-default.min.js"></script>
</head>

<body id="gallery" onLoad="">
	<header>
		<?php include("php/barra-de-menu-topo.php"); ?>
	</header>
	<div class="container-fluid">
		<div class="row">
			<?php
			$qntdImages = 8;
			for($i=0;$i<=$qntdImages;$i++){
				$dados = "";
				$dados .= '<div class="col-md-2" onClick="openGallery('.$i.')">';
				$dados .= '<img class="image imageBorder" src="images/gallery_'.$i.'.png" width="200" height="200">';
				$dados .= '</div>';
				echo $dados;
			}
			?>
		</div>
		<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="pswp__bg"></div>
			<div class="pswp__scroll-wrap">
				<div class="pswp__container">
					<div class="pswp__item"></div>
					<div class="pswp__item"></div>
					<div class="pswp__item"></div>
				</div>
				<div class="pswp__ui pswp__ui--hidden">
					<div class="pswp__top-bar">
						<div class="pswp__counter"></div>
						<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
						<button class="pswp__button pswp__button--share" title="Share"></button>
						<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
						<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
						<div class="pswp__preloader">
							<div class="pswp__preloader__icn">
							  <div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							  </div>
							</div>
						</div>
					</div>
					<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
						<div class="pswp__share-tooltip"></div> 
					</div>
					<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
					<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
					<div class="pswp__caption">
						<div class="pswp__caption__center"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script>
	
function openGallery(index){
	var pswpElement = document.querySelectorAll('.pswp')[0];
	var items = [
		<?php
		$qntdImages = 8;
		for($i=0;$i<=$qntdImages;$i++){
			$dados = "";
			if($i != $qntdImages){
				$dados .= '{';
				$dados .= 'src: "images/gallery_'.$i.'.png",';
				$dados .= 'w:1980,';
				$dados .= 'h:1080,';
				$dados .= 'msrc: "images/gallery_'.$i.'.png"';
				$dados .= '},';
			} else{
				$dados .= '{';
				$dados .= 'src: "images/gallery_'.$i.'.png",';
				$dados .= 'w:1980,';
				$dados .= 'h:1080,';
				$dados .= 'msrc: "images/gallery_'.$i.'.png"';
				$dados .= '}';
			}	
			echo $dados;
		}
			
		?>
	];

	var options = {
		index: index
	};
	
	var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
	gallery.init();
}
</script>