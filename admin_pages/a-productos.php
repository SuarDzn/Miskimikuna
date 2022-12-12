<?php
session_start();
require '../php/verify.php';
include("../php/conexion.php");
require("../models/products.php");
require("../models/admin.php");

$product = new Products();
$datos = $product->getProducts();

$admin = new Admin();
$info = $admin->getAdmin();

$name = $_SESSION['name'];
$last_name = $_SESSION['last_name'];
$email = $_SESSION['email'];

if ($_POST) {

    $sql = "SELECT product_id, `description`, price, `type`,img_url  FROM products";
    $resultado = mysqli_query($mysqli, $sql);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>MiskiMikuna - Productos</title>
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
                    <a href="../admin_pages/a-productos.php" class="active"><span class="las la-drumstick-bite"></span>
                        <span>Productos</span></a>
                </li>
                <li>
                    <a href="../admin_pages/a-pedidos.php"><span class="las la-shopping-bag"></span>
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
                Productos
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
                            <h3>Productos</h3>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Descripcion</td>
                                            <td>Precio</td>
                                            <td>Tipo</td>
                                            <td colspan="2">
                                                <center>Acciones</center>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Muestra de resultados -->
                                        <?php
                                        for ($i = 0; $i < count($datos); $i++) {
                                        ?>
                                            <tr>
                                                <td><?php echo $datos[$i]["product_id"]; ?></td>
                                                <td><?php echo $datos[$i]["description"]; ?></td>
                                                <td><?php echo $datos[$i]["price"]; ?></td>
                                                <td><?php
                                                    switch ($datos[$i]["type"]) {
                                                        case 1:
                                                            echo "Entradas";
                                                            break;
                                                        case 2:
                                                            echo "Anticuchos";
                                                            break;
                                                        case 3:
                                                            echo "Cervezas";
                                                            break;
                                                        case 4:
                                                            echo "Gaseosas";
                                                            break;
                                                        case 5:
                                                            echo "Vinos";
                                                            break;
                                                        default:
                                                            echo "Sin Especificar";
                                                            break;
                                                    } ?></td>
                                                <td><a href="../admin_pages/update_product.php?id=<?php echo $datos[$i]["product_id"] ?>" class="action-btn blue" onClick="check()">
                                                        <center>Editar</center>
                                                    </a></td>
                                                <td><a href="../controller/delete_product.php?id=<?php echo $datos[$i]["product_id"] ?>" class="action-btn red" onClick="check()">
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
            <a href="../admin_pages/add_product.php" class="hero-btn inverted-btn" onClick="check()">Añadir Producto</a>
        </main>
    </div>

</body>

</html>