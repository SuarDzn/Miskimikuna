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
    <title>MiskiMikuna - Nuestra Carta</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/carta.css">
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
    </script>
</head>

<body bgcolor="#101010">
    <section class="sub-header">

        <nav>
            <a href="../admin_pages/a-inicio.php"><img src="../img/new_logo_white_min.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="../admin_pages/a-inicio.php">Inicio</a></li>
                    <li><a href="../admin_pages/a-nosotros.php">Nosotros</a></li>
                    <li><a href="../admin_pages/a-carta.php"> Nuestra Carta</a></li>
                    <li><a href="../admin_pages/a-integrantes.php">Nuestro Equipo</a></li>
                    <li><a href="../admin_pages/a-dashboard.php">Dashboard</li>
                </ul>
            </div>
            <div class="icons">
                <a onClick="checker()" href="../php/logout.php" class="las la-sign-out-alt"></a>
                <div class="cart-box">
                    <div class="cart-icon">
                        <i class="fas fa-shopping-cart" id="cart-icon"></i>
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
    </section>

    <!-- Menu Nav -->

    <section class="menu container">
        
        <div class="scroll-menu" id="navbar">
            <a href="#entradas-1" class="section-title">Entradas Criollas</a>
            <a href="#anticuchos-1" class="section-title">Anticuchos</a>
            <a href="#cervezas-1" class="section-title">Cervezas</a>
            <a href="#gaseosas-1" class="section-title">Gaseosas</a>
            <a href="#vinos-1" class="section-title">Vinos</a>
        </div>
    
    <div class="entradas dishes" id="entradas-1">
        <h3>Entradas Criollas</h3>
        <p>"Cocinamos con amor para que comas con conciencia"</p>
        <div class="box-container" id="entradas"></div>
    </div>

    <div class="entradas dishes" id="anticuchos-1">
        <h3>Anticuchos</h3>
        <p>"No hay amor mas sincero que el amor por la comida"</p>
        <div class="box-container" id="anticuchos"></div>
    </div>

    <div class="entradas dishes" id="cervezas-1">
        <h3>Cervezas</h3>
        <p>"Amigos y cerveza fría, como mínimo una vez al día"</p>
        <div class="box-container" id="cervezas"></div>
    </div>

    <div class="entradas dishes" id="gaseosas-1">
        <h3>Gaseosas</h3>
        <p>"No te llevaré al cielo, pero te puedo hacer probar la gloria"</p>
        <div class="box-container" id="gaseosas"></div>
    </div>

    <div class="entradas dishes" id="vinos-1">
        <h3>Vinos</h3>
        <p>"Los viajes en el tiempo se hacen a través de los sabores"</p>
        <div class="box-container" id="vinos"></div>
    </div>

    </section>
    
    <!-- Template de Carta -->

    <template id="template-card">
        <div class="box-container">
            <div class="box">
                <img src="" alt="">
                <h3>Titulo</h3>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>S/.</span><span class="precio">precio</span>
                <button class="btn">Añadir a la Cesta</button>
            </div>
        </div>
    </template>

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

    <!-- JavaScript para el Nav Menu -->

    <script>
        window.onscroll = function() {
            myFunction()
        };

        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
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
        <a class="checkout" id="comprar-carrito" href="../pages/cart.php">Comprar Carrito</a>
    </template>

    <!-- Template del Header Carrito -->

    <template id="template-header">
        <h2>Mi Carrito</h2>
        <button id="vaciar-carrito">Vaciar Todo</button>
    </template>

    <!-- Crear tarjetas -->

    <script src="../carrito/tarjetas.js"></script>

    <!-- JavaScript del Carrito -->

    <script src="../carrito/carrito.js"></script>
    <script>
     

        entradas.addEventListener('click', e => {
            addCarrito(e)
        })

        anticuchos.addEventListener('click', e => {
            addCarrito(e)
        })

        cervezas.addEventListener('click', e => {
            addCarrito(e)
        })

        gaseosas.addEventListener('click', e => {
            addCarrito(e)
        })

        vinos.addEventListener('click', e => {
            addCarrito(e)
        })
    </script>
    <script src="../carrito/carrito_emergente.js"></script>
</body>


</html>