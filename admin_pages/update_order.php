<?php
session_start();
require '../php/verify.php';
include("../php/conexion.php");
require("../models/admin.php");

$admin = new Admin();
$info = $admin->getAdmin();

$name = $_SESSION['name'];
$last_name = $_SESSION['last_name'];
$email = $_SESSION['email'];
$order_id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>Huasi - Añadir Cliente</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/clientes.css">
    <link rel="stylesheet" href="../css/main_adm.css">
    <script>
        function checker() {
            var result = confirm('¿Estás seguro de volver al inicio?');
            if (result == false) {
                event.preventDefault();
            }
        }
    </script>
</head>

<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class=""><img src="../img/new_logo_white_min.png" width="40px" height="40px"></span> <span>Huasi</span></h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="../admin_pages/a-dashboard.php"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="../admin_pages/a-usuarios.php"><span class="las la-grin-alt"></span>
                        <span>Usuarios</span></a>
                </li>
                <li>
                    <a href="../admin_pages/a-clientes.php"><span class="las la-users"></span>
                        <span>Clientes</span></a>
                </li>
                <li>
                    <a href="../admin_pages/a-pedidos.php" class="active"><span class="las la-shopping-bag"></span>
                        <span>Pedidos</span></a>
                </li>
                <li>
                    <a href="../admin_pages/a-staff.php"><span class="las la-user-circle"></span>
                        <span>Staff</span></a>
                </li>
                <li>
                    <a onClick="checker()" href="../admin_pages/a-inicio.php"><span class="las la-sign-out-alt"></span>
                        <span>Salir</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Pedidos
            </h2>

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search Here " />
            </div>

            <div class="user-wrapper">
                <img src=<?php
                            if (isset($email)) {
                                switch ($email) {
                                    case "samir@gmail.com":
                                        echo "../img/sam.jpg";
                                        break;
                                    default:
                                        break;
                                }
                            }
                            ?> width="40px" height="40px">
                <div>
                    <h4>
                        <?php
                        if (isset($name)) {
                            if (isset($last_name)) {
                                echo $name . " " . $last_name;
                            }
                        } else {
                            echo "Mi perfil";
                        }
                        ?>
                    </h4>
                    <small>
                        <?php
                        if (isset($email)) {
                            switch ($email) {
                                case "samir@gmail.com":
                                    echo "Ing. Sistemas";
                                    break;
                                default:
                                    break;
                            }
                        }
                        ?>
                    </small>
                </div>
            </div>
        </header>

        <main>

            <form class="" action="../controller/update_order.php?id=<?php echo $order_id?>" method="POST">
                <h3>Editar Orden</h3>
                <input type="number" class="login-input" placeholder="ID del Cliente*" min="1" name="customer_id" required />
                <input type="number" class="login-input" placeholder="ID del Producto*" min="1" name="product_id" required />
                <input type="text" class="login-input" placeholder="Direccion*" name="address" required />
                <input type="number" class="login-input" placeholder="Cantidad*" name="quantity" min="1" required />
                <input type="number" class="login-input" placeholder="Subtotal*" name="subtotal" min="1" step="any"required />
                <div class="center"><input type="submit" value="Editar Orden" class="hero-btn inverted-btn" /></div>
            </form>


        </main>
    </div>

</body>

</html>