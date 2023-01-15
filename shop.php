<?php
    require '../Riagroibp/Panel/conxpdo.php';
    require '../Riagroibp/Carrito/config.php';
    require '../Riagroibp/Panel/conexion.php';
    $db = new Database();
    $con=$db->conectar();

    $sql=$con->prepare("SELECT id_producto,nombre,imagen,precio FROM producto WHERE estado=1");
    $sql->execute();
    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    //session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIAGRO.SA</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
    <!-- Link To CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <section id="header">
        <a href="index.php"><img src="img/logo.png" class="logo" alt=""></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">INICIO</a></li>
                <li><a href="shop.php">PRODUCTO</a></li>
                <li><a href="blog.php">NOSOTROS</a></li>
                <li><a href="contact.php">CONTACTO</a></li>

                <div class="nav container">
                <li id="lg-bag"><a href="cart.php">
                <span id="num_cart"><?php echo $num_cart; ?></span>
                <i class="far fa-shopping-bag"></i></a>
                    <!-- Cart -->
                    <div class="cart">
                        <h2 class="cart-title">CARRITO</h2>
                        <!-- Content -->
                        <div class="cart-content">
        
                        </div>
                        <!-- Total -->
                        <div class="total">
                            <div class="total-title">Total</div>
                            <div class="total-price">$0</div>
                        </div>
                        <!-- Buy Button -->
                        <button type="button" class="btn-buy">COMPRA AHORA</button>
                        <!-- Cart Close -->
                        <i class='bx bx-x' id="close-cart"></i>
        
                    </div>
                </div>
            </ul>
        </div>
    </section>

    <section id="page-header">

        <h2>RIAGRO.SA</h2>

        <p>CALIDAD Y EXPERIENCIA QUE NESESITAS </p>

    </section>
    <section class="shop container">
        <h2 class="section-title"></h2>
        <!-- Content -->
        <div class="shop-content">
            <!-- Box 1 -->
            <?PHP foreach($resultado as $row){?>
                <div class="product-box">
                    <a href="./sproduct.php?id=<?php echo $row['id_producto']; ?>&token=<?php echo hash_hmac('sha1', $row['id_producto'], KEY_TOKEN);?>"><img class="product-img" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>"/></a>
                    <span>PRODUCTO</span>
                    <h2 class="product-title"><?php echo $row['nombre']; ?></h2>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <span class="price"><?php echo number_format($row['precio'],2,'.',','); ?></span>
                    <i class='bx bx-shopping-bag add-cart' onclick="addProducto(<?php echo $row['id_producto']; ?>,'<?php echo hash_hmac('sha1', $row['id_producto'], KEY_TOKEN); ?>')"></i>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- Link TO JS -->
    <script src="js/main.js"></script>

    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fal fa-long-arrow-alt-right"></i></a>
    </section>
    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>REGISTRECE PARA MAS INFORMACION</h4>
            <p>Reciba actualicaciones por correo sobre nuestra ultimas <span> ofertas especiales.</span> </p>
        </div>
        <div class="form">
            <input type="text" placeholder=" Escriba su correo ">
            <button class="normal">Sign Up</button>
        </div>
    </section>

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="img/products/logo.jpg" alt="">
            <h4>Contacto</h4>
            <p><strong>Direccion: </strong> Lima-Huaura</p>
            <p><strong>Telefono:</strong> +01 2222 365 /(+51) 987547389</p>
            <p><strong>Hora de atecion:</strong>4:00 am - 6:00 pm</p>
            <div class="follow">
                <h4>Siguenos </h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>SOBRE</h4>
            <a href="#">Sobre nosotros</a>
            <a href="#">Delivery</a>
            <a href="#">Politica y Privacidad</a>
            <a href="#">Terminos y Condiciones</a>
            <a href="#">Contactanos</a>
        </div>

        <div class="col">
            <h4>MI CUENTA</h4>
            <a href="#">Iniciar secion</a>
            <a href="#">Ver Carrito</a>
            <a href="#">Mi lista</a>
            <a href="#">Rasstrear pedido</a>
            <a href="#">Ayuda</a>
        </div>

        <div class="col install">
            <h4>METODO DE PAGO</h4>
            <p>Forma segura de pagar </p>
            <img src="img/pay/pay.png" alt="">
        </div>

        <div class="copyright">
            <p>© ESTUDIANTES DEL IBP-2022</p>
        </div>
    </footer>


    <script src="script.js"></script>
    <!-- Link TO JS -->
    <script src="js/main.js"></script>
    <script>
        function addProducto(id,token){
            let url = '../Riagroibp/Carrito/carrito.php'
            let formData = new FormData()
            formData.append('id', id)
            formData.append('token', token)

            fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data =>{
                if(data.ok){
                    let elemento = document.getElementById('num_cart')
                    elemento.innerHTML=data.numero
                }
            })
        }
    </script>
    
</body>

</html>