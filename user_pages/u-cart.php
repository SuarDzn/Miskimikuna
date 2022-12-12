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
    <title>MiskiMikuna - Mi Carrito</title>
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
    <section class="sub-header h-cart">

        <nav>
            <a href="../pages/index.php"><img src="../img/new_logo_white_min.png"></a>
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
                        <a href="#"><i class="fas fa-shopping-cart" id="cart-icon"></i></a>
                        <a href="../user_pages/u-cart.php" onclick="cart()" id="cart-icon-phone"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
    </section>

    <!-- Carrito -->

    <section class="cart">
        <div class="row">
            <div class="nosotros-col">
                <div id="cart-header"></div>
                <div id="items"></div>
            </div>
            <div class="nosotros-col">
                <div id="cart-footer"></div>
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
    <!-- Template del Footer Carrito -->
    <template id="template-footer">
        <div class="box-container">
            <div class="box">
                <h3>Resumen</h3>
                <p><span>Cantidad de Productos:</span><span class="ncantidad">cantidad</span><br>
                    <span>Total a Pagar: S/.</span><span class="nprecio"></span><br>
                </p>
                <a href="https://www.paypal.com/paypalme/SuxrDzn" onClick="pagar()" class="hero-btn inverted-btn"  target="_blank" rel="noopener noreferrer">Pagar</a>
            </div>
        </div>
    </template>

    <!-- Template del Body Carrito -->
    <template id="template-carrito">
        <div class="box-container">
            <div class="box">
                <button class="fas fa-heart" data-id=""></button>
                <div class="row">
                    <div class="nosotros-col">
                        <img src="" alt="">
                    </div>
                    <div class="nosotros-col">
                        <h3>titulo</h3>
                        <p><span>S/.</span><span class="price">precio</span></p>
                        <p class="align-right">
                            <button class="delete">-</button>
                            <span class="quantity">cantidad</span>
                            <button class="add">+</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <!-- Template del Header Carrito -->

    <template id="template-header">
        <div class="box-container">
            <div class="box">
                <h2>Mi Carrito</h2>
                <button id="vaciar-carrito">Vaciar Todo</button>
            </div>
        </div>

    </template>

    <!-- Carrito -->
    <script src="../carrito/carrito.js"></script>
    <script>
        function pagar() {
            var result = confirm('¿Estás seguro de pagar por estos productos?');
            if (result == false) {
                event.preventDefault();
            } else {
                confirm("Su compra ha sido un éxito");
                carrito = {};
                imprimirCarrito();
                window.location = '../pages/index.php';
            }
        }
    </script>

    <!-- JavaScript para el Resumen -->

    <script>
        window.onscroll = function() {
            myFunction()
        };
        var sticky = footer.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                footer.classList.add("sticky")
            } else {
                footer.classList.remove("sticky");
            }
        }
    </script>
</body>


</html>