<?php
include("../php/conexion.php");
$order_id = $_GET['id'];
$customer_id = $_POST['customer_id'];
$product_id = $_POST['product_id'];
$address = $_POST['address'];
$quantity = $_POST['quantity'];
$subtotal = $_POST['subtotal'];

$sql = "UPDATE `orders` 
SET `customer_id`=$customer_id,`product_id`=$product_id,`address`='$address',`quantity`='$quantity',`subtotal`='$subtotal' 
WHERE order_id = $order_id";
if($mysqli->query($sql)===TRUE){
    echo"<script type=\"text/javascript\">alert('Pedido actualizado con éxito');
    window.location='../admin_pages/a-pedidos.php';</script>";
}else{
    echo"<script type=\"text/javascript\">alert('Fallo al actualizar el pedido');
    window.location='../admin_pages/a-pedidos.php';</script>";
};
?>