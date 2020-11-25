<?php

if(isset($_GET['idProducto'])){
	$idProducto=$_GET['idProducto'];
	$dato=obtenerProducto($idProducto);
}

?>

<div class="single_top">
	<div class="single_grid">
		<div class="grid images_3_of_2">
			<ul id="etalage">
				<li>
					<img class="etalage_thumb_image" src="images/productos/<?php echo $dato['Imagen']?>" class="img-responsive" />
				</li>
			</ul>
			<div class="clearfix"></div>		
		</div>
		<div class="desc1 span_3_of_2">
			<h4><?php echo $dato['Nombre']?></h4>
			<div class="cart-b">
				<div class="left-n "><?php echo $dato['Precio']?></div>
				<a class="now-get get-cart-in" href="#">COMPRAR</a> 
				<div class="clearfix"></div>
			</div>
			<h6><?php echo $dato['Stock']?> unid. de stock</h6>
			<p><?php echo $dato['Presentacion']?></p>
			<div class="share">
				<h5>Compartir Producto:</h5>
				<ul class="share_nav">
					<li><a href="#"><img src="images/facebook.png" title="facebook"></a></li>
					<li><a href="#"><img src="images/twitter.png" title="Twiiter"></a></li>
					<li><a href="#"><img src="images/rss.png" title="Rss"></a></li>
					<li><a href="#"><img src="images/gpluse.png" title="Google+"></a></li>
				</ul>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
			