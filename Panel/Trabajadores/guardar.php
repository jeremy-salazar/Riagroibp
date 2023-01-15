<?php
    include ("../conexion.php");
    $cod=$_REQUEST["codigo"];
    $nombre=$_REQUEST["nombre"];
    $descrip=$_REQUEST["descripcion"];
    $unimedi=$_REQUEST["unidad_medida"];
    $precio=$_REQUEST["precio"];
    $sqlstr="insert into producto (codigo, nombre, descripcion, unidad_medida, precio)";
    $sqlstr.= "values('".$cod."','".$nombre."','".$descrip."','".$unimedi."','".$precio."')";
    $i=mysqli_query($mysqli,$sqlstr);
    header("location: ../productos.php");
;?>