<?php
    include ("../conexion.php");
    $id=$_POST["txtID"];
    mysqli_query($mysqli,"DELETE from producto where id_producto='$id'")or die("error al eliminar");
    mysqli_close($mysqli);
    header("location: ../productos.php");
?>