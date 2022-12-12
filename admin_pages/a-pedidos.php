<?php
session_start();
require '../php/verify.php';
include("../php/conexion.php");
require("../models/admin.php");
require("../models/orders.php");

$orders = new Orders();
$o = $orders->getOrders();

$admin = new Admin();
$info = $admin->getAdmin();

$name = $_SESSION['name'];
$last_name = $_SESSION['last_name'];
$email = $_SESSION['email'];

if ($_POST) {

    $sql = "SELECT o.order_id, o.customer_id, o.product_id, c.name, c.last_name, p.description, o.address, o.quantity, p.price
    FROM orders o, customers c, products p
    WHERE o.customer_id = c.customer_id and o.product_id = p.product_id";
    $resultado = mysqli_multi_query($mysqli, $sql);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>MiskiMikuna - Pedidos</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/pedidos.css">
    <link rel="stylesheet" href="../css/main_adm.css">
    <script>
        function checker() {
            var result = confirm('¿Estás seguro de volver al inicio?');
            if (result == false) {
                event.preventDefault();
            }
        }

        function check() {
            var result = confirm('¿Estás seguro de realizar esta acción?');
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
            <h2><span class=""><img src="../img/new_logo_white_min.png" width="40px" height="40px"></span> <span>MiskiMikuna</span></h2>
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
                    <a href="../admin_pages/a-productos.php"><span class="las la-drumstick-bite"></span>
                        <span>Productos</span></a>
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
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Pedidos Recientes</h3>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Cliente</td>
                                            <td>Pedido</td>
                                            <td>Dirección</td>
                                            <td>Cantidad</td>
                                            <td>Total</td>
                                            <td colspan="2">
                                                <center>Acciones</center>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 0; $i < count($o); $i++) {
                                        ?>
                                            <tr>
                                                <td><?php echo $o[$i]["order_id"]; ?></td>
                                                <td><?php echo $o[$i]["name"] . " " . $o[$i]["last_name"]; ?></td>
                                                <td><?php echo $o[$i]["description"]; ?></td>
                                                <td><?php echo $o[$i]["address"]; ?></td>
                                                <td><?php echo $o[$i]["quantity"]; ?></td>
                                                <td><?php
                                                    echo "S/. " . $o[$i]["quantity"] * $o[$i]["price"];
                                                    ?></td>
                                                <td><a href="../admin_pages/update_order.php?id=<?php echo $o[$i]["order_id"] ?>" class="action-btn blue" onClick="check()">
                                                        <center>Editar</center>
                                                    </a></td>
                                                <td><a href="../controller/delete_order.php?id=<?php echo $o[$i]["order_id"] ?>" class="action-btn red" onClick="check()">
                                                        <center>Eliminar</center>
                                                    </a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>

</body>

</html>