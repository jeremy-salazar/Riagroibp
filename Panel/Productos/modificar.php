<?php
    include ("../conexion.php");

    $id=$_REQUEST["id"];
    $codigo=$_REQUEST["codigo"];
    $nombre=$_REQUEST["nombre"];
    //$imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $descripcion=$_REQUEST["descripcion"];
    $unimedi=$_REQUEST["unidad_medida"];
    $precio=$_REQUEST["precio"];
    $descuento=$_REQUEST["descuento"];
    $estado=$_REQUEST["estado"];

    //actualizamos tabla
    $actualizar="UPDATE producto SET codigo='$codigo',nombre='$nombre',imagen='$imagen',descripcion='$descripcion',unidad_medida='$unimedi',precio='$precio',descuento='$descuento',estado='$estado' WHERE id_producto='$id'";
    $resultado=mysqli_query($mysqli,$actualizar);
    header("location: ../productos.php");
?>