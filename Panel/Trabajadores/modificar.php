<?php
    include ("../conexion.php");

    $id=$_REQUEST["id"];
    $codigo=$_REQUEST["codigo"];
    $nombre=$_REQUEST["nombre"];
    $descripcion=$_REQUEST["descripcion"];
    $unimedi=$_REQUEST["unidad_medida"];
    $precio=$_REQUEST["precio"];

    //actualizamos tabla
    $actualizar="UPDATE producto SET codigo='$codigo',nombre='$nombre',descripcion='$descripcion',unidad_medida='$unimedi',precio='$precio' WHERE id_producto='$id'";
    $resultado=mysqli_query($mysqli,$actualizar);
    header("location: ../productos.php");
?>