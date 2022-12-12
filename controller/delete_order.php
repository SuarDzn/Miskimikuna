<?php
include("../php/conexion.php");

$order_id=$_GET['id'];

$sql = "DELETE FROM orders WHERE order_id = $order_id";
if($mysqli->query($sql)===TRUE){
    echo"<script type=\"text/javascript\">alert('Pedido eliminado con éxito');
    window.location='../admin_pages/a-pedidos.php';</script>";
}else{
    echo"<script type=\"text/javascript\">alert('Fallo al eliminar el pedido');
    window.location='../admin_pages/a-pedidos.php';</script>";
};
