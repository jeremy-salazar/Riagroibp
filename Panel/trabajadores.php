<?php
    session_start();
    require 'conexion.php';

    if(!isset($_SESSION['id_trabajador'])){
        header("Location: index.php");
    }

    $rango =$_SESSION['rango'];

    $id_usuario = $_SESSION['id_trabajador'];
    $tipo_usuario = $_SESSION['tipo_trabajador'];
    $nombre=$_SESSION['datos'];
    $where = "";
    
    $sql ="SELECT * FROM trabajador $where";
    $result=mysqli_query($mysqli,$sql);

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="principal.php">RIAGRO S.A</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $rango; ?><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Configuración</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="trabajadores.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Equipo de Trabajo
                            </a>

                            <?php if($tipo_usuario==1){ ?>

                            <div class="sb-sidenav-menu-heading">Interfaz</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Registros
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="productos.php">Productos</a>
                                    <a class="nav-link" href="inventario.php">Inventario</a>
                                    <a class="nav-link" href="usuarios.php">Usuarios</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Páginas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Autenticación
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Acceso</a>
                                            <a class="nav-link" href="register.html">Registro</a>
                                            <a class="nav-link" href="password.html">Resetear contraseña</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <?php } ?>
                            <div class="sb-sidenav-menu-heading">Complementos</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Gráficos
                            </a>
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                layouts
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Conectado como:</div>
                        <?php echo $nombre; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 ">
                        <h1 class="mt-4">Equipo de Trabajo</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="principal.php">Panel de Control</a></li>
                            <li class="breadcrumb-item active">Tablas</li>
                        </ol>                          
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabla de Datos
                                <div class="container text-center">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="insertar.php"><button id="btnNuevo" type="button" class="btn btn-success">Nuevo</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="card-body table-responsive">
                                <table id="datatablesSimple"class="table table-striped table-bordered table-condensed align-middle" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Usuario</th>                    
                                            <th>Password</th>
                                            <th>Nombre</th>
                                            <th>DNI</th>
                                            <th>Rango</th>
                                            <th>Tipo de Trabajador</th>
                                            <th>Opciones</th>

                                        </tr>
                                    </thead>
                                    </tfoot>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_array($result)){?>
                                        <tr>
                                            <td><?php echo $row['id_trabajador']; ?></td>
                                            <td><?php echo $row['usuario']; ?></td>
                                            <td><?php echo $row['password']; ?></td>
                                            <td><?php echo $row['datos']; ?></td>
                                            <td><?php echo $row['dni']; ?></td>
                                            <td><?php echo $row['rango']; ?></td>
                                            <td><?php echo $row['tipo_trabajador']; ?></td>
                                            <td>
                                                <div class="text-center">
                                                    <div class="btn-group">
                                                        <a href="./Trabajadores/editar.php?id=<?php echo $row['id_trabajador']?>"><input class="btn btn-warning" type="submit" value="Editar"></a>                                                                             
                                                        <form action="./Trabajadores/elimina.php" method="post">
                                                        <input type="hidden" value="<?php echo $row['id_trabajador']?>" name="txtID"readonly>
                                                        <input class="btn btn-danger"type="submit" value="Borrar" name="btnEliminar">
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid px-4">
                    <a href=""><button id="btnNuevo" type="button" class="btn btn-danger"><img src="../Images/table.svg" alt=""> PDF</button></a>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Sistema Riagro S.A 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

</div>  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="./js/jquery-3.6.1.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="./js/datatables-simple-demo.js"></script>
    </body>
</html>
