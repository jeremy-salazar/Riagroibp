<?php
    require '../Panel/conxpdo.php';
    require '../Carrito/config.php';
    require '../Panel/conexion.php';
    $db = new Database();
    $con=$db->conectar();

    $productos =isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

    $lista_carrito = array();

    if($productos != null){
        foreach ($productos as $clave => $cantidad) {

            $sql=$con->prepare("SELECT id_producto,nombre,imagen,precio,descuento, $cantidad AS cantidad FROM producto WHERE id_producto=? AND estado=1");
            $sql->execute([$clave]);
            $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);

        }
    }else{
        header("Location: ../index.php");
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <section id="header">
        <a href="../index.php"><img src="img/logo.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a href="../index.php">INICIO</a></li>
                <li><a href="../shop.php">PRODUCTO</a></li>
                <li><a href="../blog.php">NOSOTRO</a></li>
                <li><a href="../contact.php">CONTACTO</a></li>
                <li id="lg-bag"><a href="../cart.php">
                <span id="num_cart"><?php echo $num_cart; ?></span>
                <i class="far fa-shopping-bag"></i></a>
                </li><a id="close" href="#"><i class="far fa-times"></i></a>
            </ul>
        </div>
        
    </section>

    
    <section id="cart" class="section-p1">
        <div class="row">
            <div class="col-6">
                <h4>Detalles de pago</h4>
                <div id="paypal-button-container"></div>
                
            </div>
        <div class="col-6">
        <table width="100%">
            <thead>
                <tr>
                    <td>Imagen</td>
                    <td>Producto</td>
                    <td>Precio</td>
                    <td>Subtotal</td>
                </tr>
            </thead>

            <tbody>
                    <?php if($lista_carrito == null){
                        echo '<tr><td colspan="6" class="text-center"><b>Lista vacia</b></td></tr>';
                    }else{
                        $total=0;
                        foreach($lista_carrito as $producto){
                            $_id = $producto['id_producto'];
                            $imagen = $producto['imagen'];
                            $nombre = $producto['nombre'];
                            $cantidad = $producto['cantidad'];
                            $descuento =$producto['descuento'];
                            $precio = $producto['precio'];
                            $precio_desc=$precio-(($precio * $descuento)/100);
                            $subtotal = $cantidad * $precio_desc;
                            $total += $subtotal;
                        ?>
                <tr>  
                    
                    <td>
                        <img height="70px" src="data:image/jpg;base64,<?php echo base64_encode($imagen); ?>"/>
                    </td>
                    <td>
                        <?php echo $nombre;?>
                    </td>
                    <td>
                        <?php echo MONEDA. number_format($precio_desc,2,'.',',');?>
                    </td>
                    <td>
                        <div id="subtotal_<?php echo $_id;?>" name="subtotal[]"><?php echo MONEDA. number_format($subtotal,2,'.',',');?></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td colspan="2">
                        <p class="h3" id="total"><?php echo MONEDA . number_format($total,2,'.','.'); ?></p>
                    </td>
                </tr>
                <?php } ?>
            </tbody>

            <?php } ?>
        </table>
        </div>
    </div>
    </section>
                        
    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="img/logo.png" alt="">
            <h4>Contacto</h4>
            <p><strong>Address:</strong>Lima-Huaura-pe</p>
            <p><strong>Phone:</strong>983764892</p>
            <p><strong>Hours:</strong>Lunes a Domingo: 4.00am a 6.pm</p>
            <div class="follow">
                <h4>Follow Us</h4>
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
            <h4>About</h4>
            <a href="#">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>
        <div class="col install">
            <p>Pasarelas de pago seguras</p>
            <img src="img/pay/pay.png" alt="">
        </div>

        <div class="copyright">
            <p>© 2021, Tech2 etc - HTML CSS Ecommerce Template</p>
        </div>
    </footer>

    <script src="script.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID;?>&currency=<?php echo CURRENCY; ?>"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        paypal.Buttons({
            style:{
                color:'blue',
                shape:'pill',
                label:'pay'
            },
            createOrder: function(data, actions){
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: <?php echo $total ;?>
                        }
                    }]
                });
            },
            onApprove: function(data, actions){
                let URL ='carrito/captura.php'
                actions.order.capture().then(function(detalles){
                   console.log(detalles)
                   let url ='carrito/captura.php'
                   return fetch(url,{
                    method: 'post',
                    header:{
                        'content-type':'application/json'
                    },
                    body: JSON.stringify({
                        detalles: detalles
                    })
                   }) 
                });
            },
            onCancel: function(data){
                alert("pago cancelado");
                console.log(data);
            }
        }).render('#paypal-button-container');
    </script>

</body>

</html>