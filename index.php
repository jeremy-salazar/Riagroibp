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
                </div>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.html"><i class="far fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <section id="hero">
        <h4>Super Ofertas</h4>
        <h2>RIAGRO</h2>
        <h1>PRODUCTOS  DE CALIDAD PARA TUS CULTIVOS</h1>
        <p>Ahorre hasta un 70% en nuestra tienda Online!</p>
        <a href="./shop.php"><button>Compre Ahora</button></a>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="img/features/f1.png" alt="">
            <h6>ENVIO GRATIS</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f2.png" alt="">
            <h6>PEDIDO EN LINEA</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f3.png" alt="">
            <h6>AHORRE DINERO</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f4.png" alt="">
            <h6>PROMOCIONES</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f5.png" alt="">
            <h6>VENTA FELIZ</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f6.png" alt="">
            <h6> ATENCION 24/7 </h6>
        </div>
    </section>

    <section id="product1" class="section-p1">
        <h2>PRODUCTOS DESTACADOS </h2>
        <p>AHORRE UN 30% EN ESTOS PRODUCTOS</p>
        <div class="pro-container">
            <?PHP foreach($resultado as $row){?>
            <div class="pro" >
            <a href="./sproduct.php?id=<?php echo $row['id_producto']; ?>&token=<?php echo hash_hmac('sha1', $row['id_producto'], KEY_TOKEN);?>"><img class="product-img" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>"/></a>
                <div div class="des">
                    <span><?php echo $row['nombre']; ?></span>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4><?php echo number_format($row['precio'],2,'.',','); ?></h4>
                </div>
                <i class='bx bx-shopping-bag add-cart' onclick="addProducto(<?php echo $row['id_producto']; ?>,'<?php echo hash_hmac('sha1', $row['id_producto'], KEY_TOKEN); ?>')"></i>

            </div>
            <?php } ?>
        </div>
</section>

    <section id="banner" class="section-m1">
        <h4>RIAGRO.SA </h4>
        <h2>HASTA UN <span>30% DE DESCUENTO</span> – EN TODOS LOS PRODUCTOS NUEVOS </h2>
        <button class="normal">Explore mas </button>
    </section>

    <section id="product1" class="section-p1">
        <h2>NUEVOS PRODUCTOS</h2>
        <p>PRODUCTOS EXCLUSIVOS </p>
       <div class="pro-container">
            <div class="pro">
                <img src="img/products/n1.jpg" alt="">
                <div div class="des">
                    <span>ROOT-HOR</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <div class="pro">
                <img src="img/products/n2.jpg" alt="">
                <div class="des">
                    <span>BAYFOLAR</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <div class="pro">
                <img src="img/products/n3.jpg" alt="">
                <div class="des">
                    <span>AMISTAR-TOP</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <div class="pro">
                <img src="img/products/n4.jpg" alt="">
                <div class="des">
                    <span>OLIGOMIX</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <div class="pro">
                <img src="img/products/n5.jpg" alt="">
                <div class="des">
                    <span>FACTOR</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <div class="pro">
                <img src="img/products/n6.jpg" alt="">
                <div class="des">
                    <span>ARRANQUE</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <div class="pro">
                <img src="img/products/n7.jpg" alt="">
                <div class="des">
                    <span>BLINDAJE</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <div class="pro">
                <img src="img/products/n8.jpg" alt="">
                <div class="des">
                    <span>MASTERPRO</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
        </div>
    </section>

    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>RIAGRO.SA</h4>
            <h2>GUIA DE PRODUCTO</h2>
            <span>ECXELENTE PRODUCTOS ,PARA GRANDES CULTIVOS</span>
            <a href="./blog.php"><button class="white">MAS INFORMACION</button></a>
        </div>
        <div class="banner-box banner-box2">
            <h4>RIAGRO.SA</h4>
            <h2>CAPACITACIONES</h2>
            <span>LAS MEJORES CAPACITACIONES </span>
            <a href="./contact.php"><button class="white">MAS INFORMACION</button></a>
        </div>
    </section>

    <section id="banner3">
        <div class="banner-box">
            <h2>EXCLUSIVOS PROFUCTOS</h2>
            <h3>OBTEN EL-50% DESCUENTO</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>NUEVOS PRODUCTOS </h2>
            <h3>INGRESO 2023</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>MAS CAPACITACIONES</h2>
            <h3>EXCLUSIVO PARA CLIENTES</h3>
        </div>
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
            <p><strong>Telefono:</strong> +01 2222 365 /(+51) 958738475</p>
            <p><strong>Hora de atecion:</strong> 4:00 am - 6:00 pm</p>
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