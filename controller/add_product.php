<?php
include("../php/conexion.php");

$user_type=$_POST['user_type'];
$description=$_POST['description'];
$price=$_POST['price'];
$type=$_POST['type'];
$img_url=$_POST['img_url'];

$sql = "INSERT INTO `products`(`product_id`, `description`, `price`, `type`, `img_url`) 
VALUES (null,'$description',$price,$type,'$img_url')";
if($mysqli->query($sql)===TRUE){
    echo"<script type=\"text/javascript\">alert('Producto registrado con éxito');
    window.location='../admin_pages/a-productos.php';</script>";
}else{
    echo"<script type=\"text/javascript\">alert('Fallo al registrar el producto');
    window.location='../admin_pages/a-productos.php';</script>";
};
