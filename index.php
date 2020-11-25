<?php
require_once "functions.php";
if(isset($_GET['page'])){
	$page=$_GET['page'];
}else{
	$page = 'inicio';
}


include ('header.php');

?>
			<section id="page" style="width:100%;">
			
			<?php

			cargarPagina($page);

			?>

			</section>
			
<?php include "footer.php"?>