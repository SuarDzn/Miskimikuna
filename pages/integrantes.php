<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiskiMikuna - Nuestro Equipo</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/69e84cf231.js" crossorigin="anonymous"></script>
    <script>
        function checker(){
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
            <a href="../index.php"><img src="../img/new_logo_white_min.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="../pages/nosotros.php">Nosotros</a></li>
                    <li><a href="../pages/carta.php"> Nuestra Carta</a></li>
                    <li><a href="../pages/integrantes.php">Nuestro Equipo</a></li>
                    <li><a href="../pages/login.php">Ingresa o Registrate</a></li>
                </ul>
            </div>
            <div class="icons">
                <div class="cart-box">
                    <div class="cart-icon">
                        <i class="fas fa-shopping-cart" id="cart-icon"></i>
                        <a href="../pages/cart.php" onclick="checker()" id="cart-icon-phone"><i class="fas fa-shopping-cart"></i></a>
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
            <div class="team-col two">
                <img src="../img/juan.jpg">
            </div>
            <div class="team-col one">
                <h1>Juan Gutierrez</h1>
                <p>
                    19 años <br>
                    Estudiante de Ingenieria de Sistemas e Informatica en la Universidad Tecnologica del Perú
                </p>
            </div>
        </div>

        <div class="row">
            <div class="team-col">
                <h1>Gustavo Yalan</h1>
                <p>
                    25 años <br>
                    Estudiante de Ingenieria de Sistemas e Informatica en la Universidad Tecnologica del Perú
                </p>
            </div>
            <div class="team-col">
                <img src="../img/gustavo.jpg">
            </div>
        </div>

        <div class="row">
            <div class="team-col two">
                <img src="../img/miguel.jpg">
            </div>
            <div class="team-col one">
                <h1>Miguel Eguiguren</h1>
                <p>
                    19 años <br>
                    Estudiante de Ingenieria de Sistemas e Informatica en la Universidad Tecnologica del Perú
                </p>
            </div>
        </div>

        <div class="row">
            <div class="team-col">
                <h1>Samir Barreto</h1>
                <p>
                    19 años <br>
                    Estudiante de Ingenieria de Sistemas e Informatica en la Universidad Tecnologica del Perú
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

    <!-- Carrito -->
    <script src="../carrito/carrito.js"></script>
    <script src="../carrito/carrito_emergente.js"></script>
</body>


</html>