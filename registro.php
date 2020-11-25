<?php
	if(isset($_POST['nombre'])){
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$email=$_POST['email'];
		$usuario=$_POST['usuario'];
		$clave=$_POST['clave'];
		$clave2=$_POST['clave2'];
	
		if($clave!=$clave2){
			echo mostrarMensajes("0x014");
		}else{
			$mensaje=crearUsuario($nombre,$apellido,$email,$usuario,$clave);
			echo mostrarMensajes($mensaje);
		}
	}

	

?>
					<div class="register">
		<div class="register-top-grid">
			<h3>NUEVO USUARIO</h3>
			<form action="#" method="post">
				<div class="mation">
					<span>Nombre: <label>*</label></span>
					<input type="text" name="nombre"> 
					<span>Apellido: <label>*</label></span>
					<input type="text" name="apellido"> 
					<span>E-Mail: <label>*</label></span>
					<input type="text" name="email">
					<span>Usuario: <label>*</label></span>
					<input type="text" name="usuario">
					<span>Contraseña: <label>*</label></span>
					<input type="password" name="clave">
					<span>Repetir Contraseña: <label>*</label></span>
					<input type="password" name="clave2">
					<div class="register-but">
						<input type="submit" value="Registrarme">
					</div>
				</div>
			</form>
		</div>
		<div class="clearfix"></div>
	</div>

