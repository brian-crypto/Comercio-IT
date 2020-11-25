<?php
$host="localhost";
$db="comercio";
$user="root";
$pass="";

//HOSTING



try {
    $conexion = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
    //echo "Si conectó";
} catch (PDOExcepction $e) {
    echo "Error".$e->getMessage();
}
/*

try



*/