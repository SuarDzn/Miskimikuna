<?php
session_start();
require '../php/verify.php';
$name = $_SESSION['name'];
$last_name = $_SESSION['last_name'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiskiMikuna - Nuestro Equipo</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/69e84cf231.js" crossorigin="anonymous"></script>
    <script>
        function checker() {
            var result = confirm('¿Estás seguro de salir?');
            if (result == false) {
                event.preventDefault();
            }
        }
        
        function cart(){
            if(Object.keys(carrito).length === 0){
                window.alert('¡Carrito Vacío - Comience a Comprar!');
                event.preventDefault();
            }
        }
    </script>
</head>

<body bgcolor="#101010">
    <section class="sub-header">

        <nav>
            <a href="../user_pages/u-inicio.php"><img src="../img/new_logo_white_min.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="../user_pages/u-inicio.php">Inicio</a></li>
                    <li><a href="../user_pages/u-nosotros.php">Nosotros</a></li>
                    <li><a href="../user_pages/u-carta.php"> Nuestra Carta</a></li>
                    <li><a href="../user_pages/u-integrantes.php">Nuestro Equipo</a></li>
                    <li><a href="../user_pages/perfil.php">
                            <?php
                            if (isset($name)) {
                                if (isset($last_name)) {
                                    echo $name . " " . $last_name;
                                }
                            } else {
                                echo "Mi perfil";
                            } ?></a></li>
                </ul>
            </div>
            <div class="icons">
                <a onClick="checker()" href="../php/logout.php" class="las la-sign-out-alt"></a>
                <div class="cart-box">
                    <div class="cart-icon">
                        <i class="fas fa-shopping-cart" id="cart-icon"></i>
                        <a href="../user_pages/u-cart.php" onclick="cart()" id="cart-icon-phone"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                    <div class="whole-cart-window hide" id="result">
                        <div class="cart-wrapper" id="cart-header"></div>
                        <div class="cart-wrapper" id="items"></div>
                        <div class="cart-wrapper" id="cart-footer">¡Carrito Vacío - Comience a Comprar!</div>
                    </div>
                </div>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <h1>Nuestro Equipo</h1>
    </section>

    <!-- Nuestro Equipo -->
    <section class="team">

        <div class="row">
            <div class="team-col">
                <h1>Gianpierre Vargas</h1>
                <p>
                    20 años <br>
                    Estudiante de Ingenieria de Software en la Universidad Tecnológica del Perú.
                    Encargado de la elaboración del apartado "Login" del presente proyecto.
                </p>
            </div>
            <div class="team-col">
                <img src="../img/gian.jpg">
            </div>
        </div>

        <div class="row">
            <div class="team-col two">
                <img src="../img/juan.jpg">
            </div>
            <div class="team-col one">
                <h1>Juan De La Portilla</h1>
                <p>
                    18 años <br>
                    Estudiante de Ingenieria de Software en la Universidad Tecnológica del Perú.
                    Encargado de la elaboración del apartado "Inicio" del presente proyecto.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="team-col">
                <h1>Joseph Cavero</h1>
                <p>
                    19 años <br>
                    Estudiante de Ingenieria de Sistemas e Informática en la Universidad Tecnológica del Perú.
                    Encargado de la elaboración del apartado "Quienes Somos" del presente proyecto.
                </p>
            </div>
            <div class="team-col">
                <img src="../img/joseph.jpg">
            </div>
        </div>

        <div class="row">
            <div class="team-col two">
                <img src="../img/seiyi.jpg">
            </div>
            <div class="team-col one">
                <h1>Seiyi Suehiro</h1>
                <p>
                    19 años <br>
                    Estudiante de Ingenieria de Sistemas e Informática en la Universidad Tecnológica del Perú.
                    Encargado de la elaboración del apartado "Registrarse" del presente proyecto.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="team-col">
                <h1>Samir Barreto</h1>
                <p>
                    19 años <br>
                    Estudiante de Ingenieria de Sistemas e Informática en la Universidad Tecnológica del Perú.
                    Encargado de la creacion de contenido grafico / visual, con aportes de diseño grafico profesional,
                    como se puede observar en tanto al logo y el apartado “carta”, como también aportar en la
                    codificacion del pie de página del presente Proyecto.
                </p>
            </div>
            <div class="team-col">
                <img src="../img/sam.jpg">
            </div>
        </div>

    </section>

    <!-- Footer -->

    <section class="footer">
        <div class="head-section">
            <h3>Contáctanos</h3>
            <p>
                <i class="fa-solid fa-phone"></i>&nbsp;934-734-454 <br>
                <i class="fa-solid fa-phone"></i>&nbsp;923-435-322
            </p>
        </div>
        <div class="head-section">
            <h4>Síguenos en Nuestras Redes Sociales</h4>
            <div class="footer-content">
                <div class="section">
                    <a href="##" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook-f"></i>&nbsp;MiskiMikuna Restaurante</a>
                    <a href="##" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram"></i>&nbsp;@MiskiMikuna</a>
                </div>
            </div>
        </div>
        <div class="footer-content">
            <div class="section">
                <h4><a href=#>Libro de Reclamaciones</a></h4>
                <h4><a href=#>Política de Cookies</a></h4><br>
            </div>
        </div><br>
        <div class="head-section">
            <small>&copy; 2022 Página desarrollada por el grupo 3</small><br>
        </div>
    </section>

    <!-- JavaScript para el Menu -->

    <script>
        var navLinks = document.getElementById("navLinks")

        function showMenu() {
            navLinks.style.right = "0";
        }

        function hideMenu() {
            navLinks.style.right = "-200px";
        }
    </script>

    <!-- Boton Chatbot -->
    <script>
        window.addEventListener('mouseover', initLandbot, {
            once: true
        });
        window.addEventListener('touchstart', initLandbot, {
            once: true
        });
        var myLandbot;

        function initLandbot() {
            if (!myLandbot) {
                var s = document.createElement('script');
                s.type = 'text/javascript';
                s.async = true;
                s.addEventListener('load', function() {
                    var myLandbot = new Landbot.Livechat({
                        configUrl: 'https://landbot.site/v3/H-1313590-0O9QP7AB8FQ5VGLQ/index.json',
                    });
                });
                s.src = 'https://cdn.landbot.io/landbot-3/landbot-3.0.0.js';
                var x = document.getElementsByTagName('script')[0];
                x.parentNode.insertBefore(s, x);
            }
        }
    </script>
    <!-- Template del Carrito -->

    <template id="template-carrito">
        <div class="cart-item">
            <img src="../img/Entradas_Criollas/entradas_1.jpeg">
            <div class="details">
                <h3>Item Name</h3>
                <span>Cantidad: </span><span class="quantity">1</span><br><br>
                <button class="cart-btn add">+</button>
                <button class="cart-btn delete">-</button><br><br>
                <span>Precio: S/.</span><span class="price">1</span>
            </div>
        </div>
    </template>

    <!-- Template del Footer Carrito -->

    <template id="template-footer">
        <div class="total-productos">Total de Productos: <span class="ncantidad">0</span></div>
        <div class="subtotal">Total: S./<span class="nprecio">0.00</span></div>
        <a class="checkout" id="comprar-carrito" href="../user_pages/u-cart.php">Comprar Carrito</a>
    </template>

    <!-- Template del Header Carrito -->

    <template id="template-header">
        <h2>Mi Carrito</h2>
        <button id="vaciar-carrito">Vaciar Todo</button>
    </template>

    <!-- Carrito -->
    <script src="../carrito/carrito.js"></script>
    <script src="../carrito/carrito_emergente.js"></script>
</body>


</html>