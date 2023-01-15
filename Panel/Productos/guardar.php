<?php
    include ("../conexion.php");
    $cod=$_REQUEST["codigo"];
    $nombre=$_REQUEST["nombre"];
    $imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $descrip=$_REQUEST["descripcion"];
    $unimedi=$_REQUEST["unidad_medida"];
    $precio=$_REQUEST["precio"];
    $descuento=$_REQUEST["descuento"];
    $estado=$_REQUEST["estado"];
    $sqlstr="insert into producto (codigo, nombre, imagen, descripcion, unidad_medida, precio, descuento, estado)";
    $sqlstr.= "values('".$cod."','".$nombre."','".$imagen."','".$descrip."','".$unimedi."','".$precio."','".$descuento."','".$estado."')";
    $i=mysqli_query($mysqli,$sqlstr);
    header("location: ../productos.php");
;?>