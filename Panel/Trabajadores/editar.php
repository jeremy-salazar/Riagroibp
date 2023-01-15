<?php
    include ("../conexion.php");
    //recibir parametros
	$id=$_GET["id"];
    $producto="SELECT * FROM producto where id_producto='$id'";
    $result=mysqli_query($mysqli,$producto);
    while($row=mysqli_fetch_array($result))
    {  
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" href="../css/estilooo.css"/>
    <script src="../js/jquery-3.6.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <title>Actualizar Registro</title>
</head>
<body class="cara">
    <div class="container">
			<div class="row">
				<h3 style="text-align:center">ACTUALIZAR REGISTRO</h3>
			</div>
            <br>
			<form class="form-horizontal" method="POST" action="modificar.php" autocomplete="off">
				<p>
            	<input type="hidden" value="<?php echo $row['id_producto'];?>" name="id">
        		</p>
				<div class="form-group">
					<label for="codigo" class="col-sm-2 control-label">Codigo</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" value="<?php echo $row['codigo'];?>"id="codigo" name="codigo" placeholder="codigo" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="nombre" class="form-control" value="<?php echo $row['nombre'];?>" id="nombre" name="nombre" placeholder="nombre" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="descripcion" class="col-sm-2 control-label">Descripción</label>
					<div class="col-sm-10">
						<input type="precio" class="form-control" value="<?php echo $row['descripcion'];?>" id="descripcio" name="descripcion">
					</div>
				</div>
				<div class="form-group">
					<label for="unidad_medida" class="col-sm-2 control-label">Unidad de Medida</label>
					<div class="col-sm-10">
						<select class="form-control" value="<?php echo $row['unidad_medida'];?>" id="unidad_medida" name="unidad_medida">
							<option value="Litro">LITRO</option>
							<option value="Metro">METRO</option>
                            <option value="Tonelada">TONELADA</option>
							<option value="Kilogramo">KILOGRAMO</option>
                            <option value="Gramo">GRAMO</option>
						</select>
					</div>
				</div>
                <div class="form-group">
					<label for="precio" class="col-sm-2 control-label">Precio</label>
					<div class="col-sm-10">
						<input type="precio" class="form-control" value="<?php echo $row['precio'];?>" id="precio" name="precio" >
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Modificar</button>
						<a href="../productos.php" class="btn btn-primary">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
		<?php
		}?>
</body>
</html>