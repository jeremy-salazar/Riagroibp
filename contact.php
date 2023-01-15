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
    <title>Document</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/font-awesome.css">
</head>

<body>

    <section id="header">
        <a href="index.php"><img src="img/logo.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php">INICIO</a></li>
                <li><a href="shop.php">PRODUCTO</a></li>
                <li><a href="blog.php">NOSOTROS</a></li>
                <li><a class="active" href="contact.php">CONTACTO</a></li>
                <li id="lg-bag"><a href="cart.php">
                <span id="num_cart"><?php echo $num_cart; ?></span>
                <i class="far fa-shopping-bag"></i></a>
            </ul>
        </div>
    </section>

    <section id="page-header" class="about-header">

        <h2>RIAGRO.SA</h2>
        <p>CALIDAD Y EXPERIENCIA QUE NESESITAS </p>

    </section>

    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>PONERSE EN CONTACTO</span>
            <h2>Visite una de  las ubicaciones de nuestra tienda y contactenos</h2>
            <h3>Oficina Central</h3>
            <div>
                <li>
                    <i class="fal fa-map"></i>
                    <p>Lima-Huaura-pe</p>
                </li>
                <li>
                    <i class="far fa-envelope"></i>
                    <p>Riagro.sa@gmail.com </p>
                </li>
                <li>
                    <i class="fas fa-phone-alt"></i>
                    <p>983764892</p>
                </li>
                <li>
                    <i class="far fa-clock"></i>
                    <p>Lunes a Domingo: 4.00am  a 6.pm </p>
                </li>
            </div>
        </div>

        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3915.5990193497396!2d-77.59763979719968!3d-11.06865989306019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2spe!4v1670912794552!5m2!1ses!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <section class="form_wrap">

        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>INFORMACION<br>DE CONTACTO</h2>
            </section>
            <section class="info_items">
                <p><span class="fa fa-envelope"></span> RIAGRO.SA@gmail.com</p>
                <p><span class="fa fa-mobile"></span> 984758938</p>
            </section>
        </section>

        <form action="" class="form_contact">
            <h2>Envia un mensaje</h2>
            <div class="user_info">
                <label for="names">Nombres *</label>
                <input type="text" id="names">

                <label for="phone">Telefono / Celular</label>
                <input type="text" id="phone">

                <label for="email">Correo electronico *</label>
                <input type="text" id="email">

                <label for="mensaje">Mensaje *</label>
                <textarea id="mensaje"></textarea>

                <input type="button" value="Enviar Mensaje" id="btnSend">
            </div>
        </form>

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