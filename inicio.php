	<?php 
	
	if(isset($_GET['alert'])){
		?>

		<script>alert("Cerraste bien la sesion, Bai!");</script>

		<?php
	}
	?>

	<!-- PRODUCTOS DESTACADOS -->
    <div class="shoes-grid">
	<div class="products">
		<h5 class="latest-product">PRODUCTOS DESTACADOS</h5>
	</div>
	<div class="product-left">
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"> </div>
</div>
<!-- ULTIMOS PRODUCTOS -->
<div class="shoes-grid">
	<div class="products">
		<h5 class="latest-product">ULTIMOS PRODUCTOS</h5>	
		<a class="view-all" href="./?page=productos">VER TODOS<span></span></a>
	</div>
	<div class="product-left">
	<?php 
	include "admin/conexion.php";
	$sql="SELECT * FROM productos WHERE Estado=?";
	$producto=$conexion->prepare($sql);
	$producto->bindValue(1,"1",PDO::PARAM_INT);
	$producto->execute();
	$rows=$producto->fetchAll();

	foreach($rows as $row ){
	
	?>
		<!-- Producto #1 -->
		<div class="col-sm-4 col-md-4 chain-grid">
			<a href="./?page=producto&idProducto=<?php echo $row['idProducto'];?>"><img class="img-responsive chain" src="images/productos/<?php echo $row['Imagen']?>" alt=" " /></a>
			<span class="star"></span>
			<div class="grid-chain-bottom">
				<h6><a href="./?page=producto"><?php echo $row['Nombre']?></a></h6>
				<div class="star-price">
					<div class="dolor-grid"> 
						<span class="actual"><?php echo $row['Precio']?></span>
					</div>
					<a class="now-get get-cart" href="./?page=producto&idProducto=<?php echo $row['idProducto']?>">VER MÁS</a> 
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

		<?php
	}
		?>
		
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"> </div>
</div>