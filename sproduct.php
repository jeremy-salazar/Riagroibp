<?php
    require '../Riagroibp/Carrito/config.php';
    require '../Riagroibp/Panel/conxpdo.php';
    $db = new Database();
    $con=$db->conectar();

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $token = isset($_GET['token']) ? $_GET['token'] : '';

    if($id=='' || $token ==''){
        echo 'Error al procesar la petición';
        exit;
    }else{
        $token_tmp =hash_hmac('sha1',$id,KEY_TOKEN);

        if($token ==$token_tmp){

            $sql=$con->prepare("SELECT count(id_producto) FROM producto WHERE id_producto=? AND estado=1");
            $sql->execute([$id]);
            if($sql->fetchColumn()>0){

                $sql=$con->prepare("SELECT nombre,imagen,descripcion,precio,descuento FROM producto WHERE id_producto=? AND estado=1");
                $sql->execute([$id]);
                $row =$sql->fetch(PDO::FETCH_ASSOC);
                $nombre =$row['nombre'];
                $descripcion =$row['descripcion'];
                $precio =$row['precio'];
                $descuento=$row['descuento'];
                $precio_desc = $precio-(($precio*$descuento)/100);
            }
            $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }else{
            echo 'Error al procesar la petición';
            exit;
        }
    }

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
</head>

<body>

    <section id="header">
        <a href="index.php"><img src="img/logo.png" class="logo" alt=""></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">INICIO</a></li>
                <li><a class="active" href="shop.php">PRODUCTO</a></li>
                <li><a href="blog.php">NOSOTROS</a></li>
                <li><a href="contact.php">CONTACTO</a></li>
                <li id="lg-bag">
                    <a href="cart.php">
                        <span id="num_cart"><?php echo $num_cart; ?></span>
                        <i class="far fa-shopping-bag"></i>
                    </a>
                </li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.html"><i class="far fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img width="100%" id="MainImg" alt="" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>"/>

            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="img/products/f1.png" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="img/products/f2.jpg" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="img/products/f3.jpg" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="img/products/f4.jpg" width="100%" class="small-img" alt="">
                </div>
            </div>
        </div>

        <div class="single-pro-details">
            <h6>INICIO / PRODUCTO</h6>
            <h4><?php echo $nombre; ?></h4>
            <?php if($descuento>0){?>
                <p><del><?php echo MONEDA .  number_format($precio,2,'.',','); ?></del></p>
                <small class="text_success"> Ahora con <?php echo $descuento; ?>%</small>
                <h2><?php echo MONEDA .  number_format($precio_desc,2,'.',','); ?></h2>
            <?php } else { ?>
                <h2><?php echo MONEDA .  number_format($precio,2,'.',','); ?></h2>
            <?php } ?>
            <input type="number" value="1">
            <select>
              <option>Seleccione</option>
              <option>3-LITRO</option>
              <option>6-LITROS</option>
              <option>MEDIA CAJA</option>
              <option>CAJA COMPLETA</option>
          </select>
            <button class="normal">COMPRAR AHORA</button>
            <br>
            <br>
            <button class="normal" onclick="addProducto(<?php echo $id; ?>,'<?php echo $token_tmp; ?>')">AÑADE A CARRITO</button>
            <h4>DETALLES DEL PRODUCTO</h4>
            <span> Ingredientes Activos
                Abamectina 50 g / L
                Descripción
                Es un insecticida de amplio espectro y no sistemico. Actúa por contacto , por ingestion y también como fumigante , tiene control sobre las etapas moviles de acaros, escarabajos, etc.
                Presentación
                200 L - 20 L - 1 L - 250 cc</span>
        </div>
    </section>

    <section id="product1" class="section-p1">
        <h2>NUEVOS PRODUCTOS </h2>
        <p>Productos exclusivos</p>
        <div class="pro-container">
            <div class="pro">
                <img src="img/products/n1.jpg" alt="">
                <div class="des">
                    <span>ROOT HOR</span>
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
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
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
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
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
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
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
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>

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
    <script>
        var MainImg = document.getElementById("MainImg");
        var smallimg = document.getElementsByClassName("small-img");

        smallimg[0].onclick = function() {
            MainImg.src = smallimg[0].src;
        }
        smallimg[1].onclick = function() {
            MainImg.src = smallimg[1].src;
        }
        smallimg[2].onclick = function() {
            MainImg.src = smallimg[2].src;
        }
        smallimg[3].onclick = function() {
            MainImg.src = smallimg[3].src;
        }
    </script>


    <script src="script.js"></script>
</body>

</html>