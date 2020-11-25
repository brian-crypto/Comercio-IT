<?php 

if(isset($_GET['rta'])){
	$rta=$_GET['rta'];
	echo mostrarMensajes($rta);
}

if(isset($_POST['usuario'])){
	$usuario=$_POST['usuario'];
	$clave=$_POST['clave'];
	accederUsuario($usuario,$clave);
}

?>

<div class="account_grid">
	<div class="login-right">
		<h3>INGRESO DE USUARIO</h3>
		<form action="#" method="post">
		<div>
			<span>Usuario:</span>
			<input type="text" name="usuario"> 
		</div>
		<div>
			<span>Contraseña:</span>
			<input type="password" name="clave"> 
		</div>
			<input type="submit" value="Ingresar">
			<br>
			<a class="forgot" href="#">¿Olvidaste tu contraseña?</a>
		</form>
	</div>	
	<div class=" login-left">
		<h3>¿NUEVO USUARIO?</h3>
		<a class="acount-btn" href="./?page=registro">Crear una cuenta</a>
	</div>
	<div class="clearfix"></div>
</div>

<?php 

if(isset($_GET['logout'])){
	session_start();
	unset($_SESSION);
	session_destroy();
	setcookie(session_name(),null);
	header("location:./?alert=true");
}

?>
		
