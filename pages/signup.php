<?php
require '../php/conexion.php';
session_start();

if ($_POST) {
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_cf = $_POST['cf_password'];
    $pass_c = sha1($password);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_POST['name'])) {
        echo "<script type=\"text/javascript\">alert('Porfavor ingrese su nombre');</script>";
    } else {
        if (empty($_POST['last_name'])) {
            echo "<script type=\"text/javascript\">alert('Porfavor ingrese su apellido');</script>";
        } else {
            if (empty($_POST['email'])) {
                echo "<script type=\"text/javascript\">alert('Porfavor ingrese su correo electrónico');</script>";
            } else {
                if (empty($_POST['password'])) {
                    echo "<script type=\"text/javascript\">alert('Porfavor ingrese su contraseña');</script>";
                } else {
                    if (!empty($_POST['password'])) {
                        if ($password == $password_cf) {
                            $sql = "INSERT INTO `users`(`user_id`, `email`, `password`, `name`, `last_name`, `user_type`) VALUES (null,'$email','$pass_c','$name','$last_name',2);
                            INSERT INTO `customers`(`customer_id`, `name`, `last_name`, `email`) VALUES (null,'$name','$last_name','$email')";
                            if ($mysqli->multi_query($sql) === TRUE) {
                                echo "<script type=\"text/javascript\">alert('Usuario registrado con éxito');</script>";
                            } else {
                                echo "<script type=\"text/javascript\">alert('Fallo al crear el usuario');</script>";
                            }
                        } else {
                            echo "<script type=\"text/javascript\">alert('Las contraseñas no coinciden');</script>";
                        }
                    }
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huasi - Registro</title>
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
    <section class="sub-header h-login">

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
    </section>

    <!-- Login Contenido -->

    <section class="login">

        <div class="row">
            <form class="login" action="../pages/signup.php" method="post">
                <h3>¡Bienvenido!</h3>
                <p>Configuremos tu cuenta personal</p>
                <p>¿Ya tienes una cuenta? &nbsp;<a href="../pages/login.php">Ingresa Sesión</a></p>
                <input type="name" class="login-input" placeholder="Nombre*" name="name" required />
                <input type="name" class="login-input" placeholder="Apellido*" name="last_name" required />
                <input type="email" class="login-input" placeholder="Correo Electrónico*" name="email" required />
                <input type="password" class="login-input" placeholder="Contraseña*" name="password" required />
                <input type="password" class="login-input" placeholder="Confirme la Contraseña*" name="cf_password" required /><br><br>
                <input type="submit" value="Crear Cuenta" class="hero-btn white-btn" />
            </form>
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