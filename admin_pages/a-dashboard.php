<?php
session_start();
require '../php/verify.php';
include("../php/conexion.php");
require("../models/admin.php");
require("../models/orders.php");
require("../models/users.php");

$orders = new Orders();
$o = $orders->getOrders();

$users = new Users();
$datos = $users->getUsers();

$admin = new Admin();
$info = $admin->getAdmin();

$name = $_SESSION['name'];
$last_name = $_SESSION['last_name'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>MiskiMikuna - Dashboard</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <script>
        function checker(){
            var result = confirm('¿Estás seguro de volver al inicio?');
            if(result==false){
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
                <li >
                    <a href="../admin_pages/a-dashboard.php" class="active"><span class="las la-igloo"></span>
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
                Dashboard
            </h2>

            <div class="user-wrapper">
            <img src=
                        <?php
                        if(isset($email)){
                            switch($email){
                                case "samir@gmail.com":echo "../img/sam.jpg";break;
                                default:break;
                            }
                           }
                        ?> 
                width="40px" height="40px">
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
                            if(isset($email)){
                                switch($email){
                                case "samir@gmail.com":echo "Ing. Sistemas";break;
                                default:break;
                            }
                            }
                        ?>
                    </small>
                </div>
            </div>
        </header>

        <main>
            <div class="dashboard cards">

                <div class="card-single">                        
                    <div>
                        <h1>
                        <?php
                        $cont=0;
                            for($i=0; $i<count($datos); $i++){
                                $cont++;
                            }
                        echo $cont;
                        ?>
                        </h1>
                        <span>Usuarios</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single">
                   <div>
                        <h1>
                        <?php
                        $cont=0;
                            for($i=0; $i<count($o); $i++){
                                $cont++;
                            }
                        echo $cont;
                        ?>
                        </h1>                            
                        <span>Pedidos</span>
                        </div>
                     <div>
                          <span class="las la-shopping-bag"></span>
                   </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>S/. 
                        <?php
                        $cont=0;
                            for($i=0; $i<count($o); $i++){
                                $cont=$cont+$o[$i]["quantity"]*$o[$i]["price"];
                            }
                        echo $cont;
                        ?>
                        </h1>
                        <span>Ganancias</span>
                    </div>
                    <div>
                        <span class="lab la-google-wallet"></span>
                    </div>
                </div>
            </div>
            
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Pedidos Recientes</h3>
                            <form method="get" action="../admin_pages/a-pedidos.php">
                                <button> Ver más <span class="las la-arrow-right"></span></span></button>
                            </form>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Cliente</td>
                                            <td>Pedido</td>
                                            <td>Precio</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for($i=0; $i<count($o); $i++){
                                    ?>
                                        <tr>
                                            <td><?php echo $o[$i]["name"]." ".$o[$i]["last_name"];?></td>
                                            <td><?php echo $o[$i]["description"];?></td>
                                            <td><?php
                                             echo "S/. ".$o[$i]["quantity"]*$o[$i]["price"];
                                             ?></td>
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

                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3>Miembros del Staff</h3>
                            <form method="get" action="../admin_pages/a-staff.php">
                                <button> Ver más <span class="las la-arrow-right"></span></span></button>
                            </form>
                        </div>

                        <div class="card-body">
                        <?php
                            for($i=0; $i<count($info); $i++){
                        ?>
                            <div class="customer">
                                <div class="info">
                                <img src=
                                <?php
                                    switch($i){
                                        case 0:echo "../img/sam.jpg";break;
                                        default:break;
                                    }
                                ?> 
                                width="40px" height="40px">
                                    <div>
                                        <h4><?php echo $info[$i]["name"]." ".$info[$i]["last_name"];?></h4>
                                        <small>
                                            <?php
                                                switch($i){
                                                    case 0:echo "Ing. Sistemas";break;
                                                    case 1:echo "Ing. Sistemas";break;
                                                    case 2:echo "Ing. de Software";break;
                                                    case 3:echo "Ing. Sistemas";break;
                                                    case 4:echo "Ing. de Software";break;
                                                    default:break;
                                                }
                                            ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>

</body>
</html>