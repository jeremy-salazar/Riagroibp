<?php
    require '../Riagroibp/Panel/conxpdo.php';
    require '../Riagroibp/Carrito/config.php';
    require '../Riagroibp/Panel/conexion.php';
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
    }
    //session_destroy();
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

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section id="header">
        <a href="index.php"><img src="img/logo.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php">INICIO</a></li>
                <li><a href="shop.php">PRODUCTO</a></li>
                <li><a href="blog.php">NOSOTRO</a></li>
                <li><a href="contact.php">CONTACTO</a></li>
                <li id="lg-bag"><a href="cart.php">
                <span id="num_cart"><?php echo $num_cart; ?></span>
                <i class="far fa-shopping-bag"></i></a>
                </li><a id="close" href="#"><i class="far fa-times"></i></a>
            </ul>
        </div>
        
    </section>

    <section id="page-header" class="about-header">

        <h2>RIAGRO S.A </h2>
        <p>¡AHORRA hasta un 70%!</p>

    </section>

    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Remover</td>
                    <td>Imagen</td>
                    <td>Producto</td>
                    <td>Precio</td>
                    <td>Cantidad</td>
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
                        <a href="#" id="eliminar" data-bs-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal"><i class="far fa-times-circle"></i></a>
                    </td>
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
                        <input type="number" min="1" value="<?php echo $cantidad ?>" name="" id="cantidad_<?php echo $_id; ?>" onchange="actualizaCantidad(this.value,<?php echo $_id; ?>)">
                    </td>
                    <td>
                        <div id="subtotal_<?php echo $_id;?>" name="subtotal[]"><?php echo MONEDA. number_format($subtotal,2,'.',',');?></div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            <?php } ?>
        </table>
    </section>
    <section id="cart-add" class="section-p1">
    <?php if($lista_carrito != null){?>
        <div id="subtotal">
            <h3>Total del Carrito</h3>
            <table>
                
                <tr>
                    <td><strong>Total</strong></td>
                    <td id="total"><strong><?php echo MONEDA . number_format($total,2,'.','.'); ?></strong></td>
                </tr>
            </table>
            <a href="../Riagroibp/Carrito/pago.php"><button class="normal">Proceder al pago</button></a>
        </div>
    <?php } ?>
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
    <!-- Modal -->
    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Alerta</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            ¿Desea eliminar el producto de la lista?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button id="btn-elimina" type="button" class="btn btn-danger" onclick="elimina()">Eliminar</button>
        </div>
        </div>
    </div>
    </div>

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
    <script>

        let eliminaModal =document.getElementById('eliminaModal')
        eliminaModal.addEventListener('show.bs.modal', function(event){
            let button =event.relatedTarget
            let id=button.getAttribute('data-bs-id')
            let buttonElimina= eliminaModal.querySelector('.modal-footer #btn-elimina')
            buttonElimina.value=id
        })

        function actualizaCantidad(cantidad,id){
            let url = '../Riagroibp/Carrito/actualizarCarrito.php'
            let formData = new FormData()
            formData.append('action', 'agregar')
            formData.append('id', id)
            formData.append('cantidad', cantidad)

            fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data => {
                if(data.ok){

                    let divsubtotal = document.getElementById('subtotal_' + id)
                    divsubtotal.innerHTML = data.sub

                    let total = 0.00
                    let list = document.getElementsByName('subtotal[]')

                    for(let i = 0; i < list.length; i++){
                        total += parseFloat(list[i].innerHTML.replace(/[S/.]/g,' '))
                    }

                    total = new Intl.NumberFormat('en-US',{
                        minimumFractionDigits: 2
                    }).format(total)
                    document.getElementById('total').innerHTML='<?php echo MONEDA; ?>' + total

                }
            })
        }

        function elimina(){
            let botonElimina = document.getElementById('btn-elimina')
            let id = botonElimina.value

            let url = '../Riagroibp/Carrito/actualizarCarrito.php'
            let formData = new FormData()
            formData.append('action', 'eliminar')
            formData.append('id', id)

            fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data => {
                if(data.ok){
                    location.reload()
                }
            })
        }
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>