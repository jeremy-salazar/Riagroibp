<?php
    define ("CLIENT_ID","AeVkOhxJTjsegN7xcsmDTu4pWbMamrrImhLWCneY_HL81R0fiG6bTfDjlmDCozPoJf2dWldCIHU1k-YR");
    define("CURRENCY","MXN");
    define("KEY_TOKEN","APR.wqc-354");
    define("MONEDA","S/.");

    session_start();

    $num_cart = 0;

    if(isset($_SESSION['carrito']['productos'])){
        $num_cart = count($_SESSION['carrito']['productos']);
    }
?>