<?php

$nombre=$_POST['nombre'];
$email=$_POST['email'];
$mensaje=$_POST['mensaje'];

if(empty($nombre)){
    header("location:./?page=contacto&rta=0x001");
}
elseif(!is_string($nombre) && is_numeric($nombre)){
    header("location:./?page=contacto&rta=0x001");
}
elseif(is_numeric(substr($nombre,0,1))){
    header("location:./?page=contacto&rta=0x001");
}
elseif(strlen($nombre)<=3){
    header("location:./?page=contacto&rta=0x001");
}
elseif(filter_var($email,FILTER_VALIDATE_EMAIL)===FALSE){
    header("location:./?page=contacto&rta=0x002");
}
elseif(empty($email)){
    header("location:./?page=contacto&rta=0x002");
}
elseif(empty($mensaje)){
    header("location:./?page=contacto&rta=0x003");
}
elseif(strlen($mensaje>300)){
    header("location:./?page=contacto&rta=0x003");
}else{
    
        $para="flores.brian.tomas@gmail.com";
        $asunto="Contacto tienda";
        $cabecera = "From:" . $email . "\r\n";
		$cabecera.= "MIME-Version: 1.0\r\n";
        $cabecera.= "Content-Type: text/html; charset=UTF-8\r\n";
        $cuerpo="<h1>COMERCIO IT - CONTACTO DESDE TIENDA</h1><br>";
        $cuerpo="<b>Nombre: </b>". $nombre;
        $cuerpo="<br><b>Apellido: </b>".$apellido;
        $cuerpo="<br><b>Mensaje: </b>". $mensaje;
        
        if (!mail($para, $asunto, $cuerpo, $cabecera)) {
            header("location:./?page=contacto&rta=0x005");
             
        } else {
            header("location:./?page=contacto&rta=0x004");   
        }
}

?>