<?php

require "conexion.php";
//CREAR NUEVO PRODUCTO
if(isset($_GET['accion'])){
   if(isset($_POST['enviar'])){
    /*
        $_FILES['file']["type"]
                       ["size"]
                       ["size"]
                        ["tmp_name"]
                       */              
        
        $nombre=$_POST['nombre'];
        $precio=$_POST['precio'];
        $marca=$_POST['marca'];
        $categoria=$_POST['categoria'];
        $presentacion=$_POST['presentacion'];
        $stock=$_POST['stock'];
        $imagen=$_FILES['imagen'];
        //var_dump($imagen); PARA VER SI FUNCIONA, TRAE UN ARRAY   
        $rta = crearProducto($nombre, $precio, $marca,$categoria, $presentacion, $stock,$imagen);
        echo mostrarMensajes($rta);
    }
}
//OBTENER DATOS DEL PRODUCTO A EDITAR
if(isset($_GET['idProducto'])){
    $idProducto=$_GET['idProducto'];
    $valor=obtenerProducto($idProducto);
    $valorMarca=obtenerMarcaProducto($valor['Marca']);
    $valorCategoria=obtenerCategoriaProducto($valor['Categoria']);
}


//EDITAR PRODUCTO
if(isset($_POST['editar'])){
    $idProducto=$_POST['idProducto'];
    $nombre=$_POST['nombre'];
    $precio=$_POST['precio'];
    $marca=$_POST['marca'];
    $categoria=$_POST['categoria'];
    $presentacion=$_POST['presentacion'];
    $stock=$_POST['stock'];
    $imagenActual=$_POST['imagenActual'];
    $imagen=$_FILES['imagen'];
    $mensaje=actualizarProductos($idProducto,$nombre,$precio,$marca,$categoria,$presentacion,$stock, $imagen, $imagenActual);
    echo mostrarMensajes($mensaje);
}

//OBTENER DATOS DEL PRODUCTO

if($_GET['accion']=='n'){
    ?>
    <h1>Crear nuevo producto</h1>
    <?php
}else if($_GET['accion']=='a'){
    ?>
    <h1>Actualizar producto</h1>
    <?php
}
?>

<!-------------------------------------------FORMULARIO-------------------------------------->

    <div class="contact-form">
		<form action="" method="post" enctype="multipart/form-data">
			<input type="text" class="textbox" name="nombre" 
            <?php 
            if(isset($_GET['idProducto'])){
            ?>
            value="<?php echo $valor['Nombre']; ?>"
            <?php
            }else{
            ?>
            placeholder="Nombre"
            <?php } ?>
            >

			<input type="text" class="textbox" name="precio"
            <?php 
            if(isset($_GET['idProducto'])){
            ?>
            value="<?php echo $valor['Precio']; ?>"
            <?php
            }else{
            ?>
            placeholder="Precio"
            <?php } ?>
            >

<!-------------------------------------------SELECT-------------------------------------->

            <select name="marca" class="form-control form-group">
                
                    <?php 
                    if(isset($_GET['idProducto'])){
                    ?>
                    <option selected value="<?php echo $valorMarca['idMarca']; ?>"><?php echo $valorMarca['Nombre']; ?></option>
                    <?php
                        }else{
                    ?>
                <option value="">Marca</option>
                        <?php }?>
                <?php
                    $sql="SELECT * FROM marcas";
                    $conexion->prepare($sql);
                    foreach($conexion->query($sql) as $row){
                ?>
                <option value="<?php echo $row['idMarca']; ?>"><?php echo $row['Nombre']; ?></option>
                    <?php }?>
            </select>




            <select name="categoria" class="form-control">
                <?php 
                    if(isset($_GET['idProducto'])){
                    ?>
                    <option selected value="<?php echo $valorCategoria['idCategoria']; ?>"><?php echo $valorCategoria['Nombre']; ?></option>
                    <?php
                      }else{
                        ?>
                    <option value="">Categoria</option>
                    <?php } ?>
                <?php
                    $sql="SELECT * FROM categorias";
                    $conexion->prepare($sql);
                    foreach($conexion->query($sql) as $row){
            ?>
            <option value="<?php echo $row['idCategoria']; ?>"><?php echo $row['Nombre']; ?></option>
                    <?php }?>
            </select>
            
            
            <input type="text" class="textbox" name="presentacion"
            <?php 
            if(isset($_GET['idProducto'])){
            ?>
            value="<?php echo $valor['Presentacion']; ?>"
            <?php
            }else{
            ?>
            placeholder="Presentacion"
            <?php } ?>
            >

            <input type="text" class="textbox" name="stock"
            <?php 
            if(isset($_GET['idProducto'])){
            ?>
            value="<?php echo $valor['Stock']; ?>"
            <?php
            }else{
            ?>
            placeholder="Stock"
            <?php } ?>
            >
            
            <?php
            if(isset($_GET['idProducto'])){
            ?>
            <input type="hidden" name="idProducto" value="<?php echo $_GET['idProducto']; ?>">
            <?php } ?>

            <?php
             if($_GET['accion']=='a'){
            ?>
            <img src="../images/productos/<?php echo $valor['Imagen'];?>" style="width:150px;">
            <input type="hidden" name="imagenActual" value="<?php echo $valor['Imagen']; ?>">

             <?php } ?>
            <input type="file" name="imagen">

<!-------------------------------------------BOTON-------------------------------------->
            <?php
            if($_GET['accion']=='n'){
            ?>
			<input type="submit" value="Guardar" name="enviar">
            <?php
            }else if($_GET['accion']=='a'){
            ?>
            <input type="submit" value="Actualizar" name="editar">
            <?php
            }
            ?>
			<div class="clearfix"></div>
        </form>
	</div>