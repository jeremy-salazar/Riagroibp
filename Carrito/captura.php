<?php
    require '../Panel/conxpdo.php';
    require '../Carrito/config.php';
    require '../Panel/conexion.php';
    $db = new Database();
    $con=$db->conectar();

    $json =file_get_contents('php://input');
    $datos =json_decode($json, true);

    print_r($datos);

    if(is_array($datos)){
        $id_transaccion=$datos['detalles'];

    }


?>