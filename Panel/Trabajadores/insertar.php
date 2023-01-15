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
				<h3 style="text-align:center">NUEVO REGISTRO</h3>
			</div>
            <br>
			<form class="form-horizontal" method="POST" action="guardar.php" autocomplete="off">
				<div class="form-group">
					<label for="codigo" class="col-sm-2 control-label">Codigo</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="codigo" name="codigo" placeholder="codigo" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="nombre" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="descripcion" class="col-sm-2 control-label">Descripción</label>
					<div class="col-sm-10">
						<input type="precio" class="form-control" id="descripcio" name="descripcion" placeholder="descripcion">
					</div>
				</div>
				
				<div class="form-group">
					<label for="unidad_medida" class="col-sm-2 control-label">Unidad de Medida</label>
					<div class="col-sm-10">
						<select class="form-control" id="unidad_medida" name="unidad_medida" placeholder="unidad de medida">
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
						<input type="precio" class="form-control" id="precio" name="precio" placeholder="precio">
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Guardar</button>
						<a href="../productos.php" class="btn btn-primary">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
</body>
</html>