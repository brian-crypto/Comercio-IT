<?php

function verificar($numero){
    if($numero>2 && $numero<4){

    }
}

try {
    $numero=20;
    echo "primeras lineas <br>";
    echo "segundas lineas";
    if($numero<5){
        throw new Exception('<br>El valor no puede ser menor a 5');
    }
    echo "aqui estoy en mi programa bla bla bla <br>";
    echo "<br>codeando";
} catch (Exception $e) {
    echo "<br>ERROR".$e->getMessage();
} finally{
    echo "<br> Soy el final y me estoy ejecutando";
}


/*

try{
    ..ejercutar conjunto de sentencias..
}catch{
    ..mostrar el error..
}finally{
    ..ejecutar algo extra si o si
}



*/