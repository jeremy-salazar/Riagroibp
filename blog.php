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
</head>

<body>

    <section id="header">
        <a href="index.php"><img src="img/logo.png" class="logo" alt=""></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">INICIO</a></li>
                <li><a href="shop.php">PRODUCTO</a></li>
                <li><a class="active" href="blog.php">NOSOTROS</a></li>
                <li><a href="contact.php">CONTACTO</a></li>
                <li id="lg-bag"><a href="cart.php">
                <span id="num_cart"><?php echo $num_cart; ?></span>
                <i class="far fa-shopping-bag"></i></a>
            </ul>
        </div>
    </section>

    <section id="page-header" class="blog-header">
        <h2>RIAGRO</h2>
        <p> CALIDAD Y EXPERIENCIA QUE NESESITAS </p>
    </section>
    <br>
    <section class="acerca-de">
        <div class="contenedor">
            <h2 class="sobre-nosotros">Sobre nosotros</h2>
            <h3 class="slogan">IRRIGACION, AGRICULTURA Y SERVICIO (RIAGRO S.A).</h3>
            <p class="parrafo">RIAGRO, Nace por la iniciativa empresarial y deseos de crecimiento personal y profesional de sus dos principales socios fundadores, los Ingenieros MUÑOZ SANCHEZ SHEILLA, Y CALLE LUIS , quienes vieron una excelente oportunidad en formar y  emprender un negocio juntos con el fin de crecer, la cual siendo compañeros de trabajo pasarían a ser  socio de su propio  negocio.
            La idea se plantío hace 4 años el cual ellos siempre tenían planes de surgir y crecer, llego un momento donde tomaron la decisión de realizar sus sueños y empezaron a construir, diseñar su plan y estrategias de negocio el cual en el 2020 nace RIAGRO, una empresa dedicada a la venta de fertilizantes y agroquímicos. 
            </p>
            <p class="parrafo">La empresa continúa en su proceso de crecimiento y desarrollo, teniendo una excelente referencia en el mercado por la diversidad y calidad de servicios; así como también la ampliación de sus clientes, los que los a motivado a seguir creciendo.
            RIAGRO, esta buscado ser un modelo de agro-empresa gestionado bajo unas políticas que se basan en unos valores corporativos implantados por sus propietarios, donde el respeto por su gente y la búsqueda permanente de la competitividad y la calidad de sus productos son el soporte de su desarrollo.
            </p>
          
        </div>
    </section>
    <section class="galeria">
        <div class="sesgoarriba"></div>
        <div class="imagenes none">
            <img src="img/blog/agri1.jpg" alt="">
        </div>
        <div class="imagenes">
            <img src="img/blog/agri2.jpg" alt="">
        </div>
        <div class="imagenes">
            <img src="img/blog/agri3.jpg" alt="">
            <div class="encima">
                <h2>RIAGRO</h2>
                <div></div>
            </div>
        </div>
        <div class="imagenes">
            <img src="img/blog/agri4.jpg" alt="">

        </div>
        <div class="imagenes none">
            <img src="img/blog/agri1.jpg" alt="">
        </div>
        <div class="sesgoabajo"></div>
    </section>
    <br>
    <section class="miembros">
        <div class="contenedor">
            <h2 class="sobre-nosotros">Nuestro equipo</h2>
            <h3 class="slogan">Conoce a nuestro equipo de trabajo</h3>
            <div class="cards">
                <div class="card">
                    <img src="img/blog/ray.jpg" alt="">
                    <h4>ING-RAY ROJAS</h4>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="card">
                    <img src="img/blog/sheilla.jpg" alt="">
                    <h4>ING-SHEILLA MUÑOZ</h4>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="card">
                    <img src="img/blog/luis.jpg" alt="">
                    <h4>ING-LUIS CALLE</h4>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="fondo">
        <div class="sesgoarriba"></div>
        <div class="contenedor">
            <h2 class="titulo-patrocinadores"></h2>
            <h3 class="subtitulo-patrocinadores"></h3>
            <div class="clientes">
                <section class="about container">
                    <div class="abou__text">
                        <h2 class="subtitle"></h2>
                        <p class="about__paragraph"></p>
                   </div>
        
        <figure class="about__img">
            <img src="" class="about__picture">
        
        </figure>
        <figure class="about__img about__img--left" >
            <img src="" class="about__picture">
        
        </figure>
        
        
        </div>
        </section>

        <div class="sesgoabajo-unico"></div>
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