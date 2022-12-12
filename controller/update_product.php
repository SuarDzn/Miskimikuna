<?php
include("../php/conexion.php");
$product_id = $_GET['id'];
$description=$_POST['description'];
$price=$_POST['price'];
$type=$_POST['type'];
$img_url=$_POST['img_url'];

$sql = "UPDATE `products` 
SET `description`='$description',`price`='$price',`type`='$type',`img_url`='$img_url' 
WHERE product_id = $product_id";
if($mysqli->query($sql)===TRUE){
    echo"<script type=\"text/javascript\">alert('Producto actualizado con éxito');
    window.location='../admin_pages/a-productos.php';</script>";
}else{
    echo"<script type=\"text/javascript\">alert('Fallo al actualizar el producto');
    window.location='../admin_pages/a-productos.php';</script>";
};
?>