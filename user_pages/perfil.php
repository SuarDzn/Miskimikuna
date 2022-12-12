<?php
session_start();
require '../php/conexion.php';
require '../php/verify.php';

$user_id = $_SESSION['user_id'];
$name = $_SESSION['name'];
$last_name = $_SESSION['last_name'];
$email = $_SESSION['email'];

if($_POST){
$uname = $_POST['name'];
$ulast_name = $_POST['last_name'];
$uemail = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
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
                        if ($password == $cpassword) {
                            $sql = "UPDATE `users` SET `email`='$uemail', `password`='$pass_c',`name`='$uname',`last_name`='$ulast_name' WHERE `user_id`='$user_id'";
                            if ($mysqli->multi_query($sql) === TRUE) {
                                $_SESSION['name']=$_POST['name'];
                                $_SESSION['last_name']=$_POST['last_name'];
                                $_SESSION['email']=$_POST['email'];
                                $_SESSION['password']=$_POST['password'];
                                echo "<script type=\"text/javascript\">alert('Informacion Actualizada Correctamente');
                                window.location='../user_pages/perfil.php';</script>";
                            } else {
                                echo "<script type=\"text/javascript\">alert('Fallo al actualizar');
                                window.location='../user_pages/perfil.php';</script>";
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
    <title>MiskiMikuna - Perfil</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/perfil.css">
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

        function update() {
            var result = confirm('¿Estás seguro de actualizar con estos datos?');
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
    <section class="sub-header h-login">

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
                            } ?>
                        </a></li>
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
    </section>

    <section>
        <div class="container">
            <form class="update" action="../user_pages/perfil.php" method="post">
                <div class="row gutters">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="account-settings">
                                    <div class="user-profile">
                                        <div class="user-avatar">
                                            <i class="fa fa-user-circle fa-10x"></i>
                                        </div>
                                        <h1 class="txt">
                                            <?php
                                            if (isset($name)) {
                                                if (isset($last_name)) {
                                                    echo $name . " " . $last_name;
                                                }
                                            } else {
                                                echo "Mi perfil";
                                            } ?>
                                        </h1>
                                        <h5 class="txt">
                                            <?php
                                            if (isset($email)) {
                                                echo $email;
                                            } else {
                                                echo "example@gmail.com";
                                            } ?>
                                        </h5>
                                    </div>
                                    <div class="about">
                                        <h5 class="txt">Miembro de MiskiMikuna</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row gutters">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <h2><label for="name">Nombre:</label></h2>
                                            <h3><input class="input" type="text" class="form-control" placeholder=<?php
                                                                                                                if (isset($name)) {
                                                                                                                    echo $name;
                                                                                                                }  ?> name='name'>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <h2><label for="last_name">Apellido:</label></h2>
                                            <h3><input class="input" type="text" class="form-control" placeholder=<?php
                                                                                                                    if (isset($last_name)) {
                                                                                                                        echo $last_name;
                                                                                                                    }  ?> name='last_name'>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <h2><label for="email">Correo:</label></h2>
                                            <h3><input class="input" type="email" class="form-control" placeholder=<?php
                                                                                                                if (isset($email)) {
                                                                                                                    echo $email;
                                                                                                                }  ?> name='email'>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <h2><label for="password">Contraseña:</label></h2>
                                            <h3><input class="input" type="password" class="form-control" placeholder="Contraseña" name='password'>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <h2><label for="ciTy">Confirmar Contraseña:</label></h2>
                                            <h3><input class="input" type="password" class="form-control" placeholder="Repetir Contraseña" name='cpassword'>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right">
                                            <h2><input onClick="update()" type="submit" name="udpate" class="btn btn-primary" value="Actualizar"></input class="input"></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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