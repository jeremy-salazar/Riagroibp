<?php
    require_once ("../conexion.php");
    $sql ="SELECT * FROM producto";
    $result=mysqli_query($mysqli,$sql);

    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=reporte_Productos.xls");
?>
    <table border="1" id="datatablesSimple"class="table table-striped table-bordered table-condensed align-middle" style="width:100%;">
        <caption>Datos de Productos</caption>
        <thead>
        <tr>
            <th>#</th>
            <th>Codigo</th>                    
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Unidad de Medida</th>
            <th>Precio</th>
        </tr>
        </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($result)){?>
                <tr>
                <td><?php echo $row['id_producto']; ?></td>
                <td><?php echo $row['codigo']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['descripcion']; ?></td>
                <td><?php echo $row['unidad_medida']; ?></td>
                <td><?php echo $row['precio']; ?></td>                                            
                </tr>
                <?php } ?>
            </tbody>
    </table>