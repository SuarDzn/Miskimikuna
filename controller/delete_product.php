<?php
include("../php/conexion.php");

$product_id=$_GET['id'];

$sql = "DELETE FROM products WHERE product_id = $product_id";
if($mysqli->query($sql)===TRUE){
    echo"<script type=\"text/javascript\">alert('Producto eliminado con éxito');
    window.location='../admin_pages/a-productos.php';</script>";
}else{
    echo"<script type=\"text/javascript\">alert('Fallo al eliminar el producto');
    window.location='../admin_pages/a-productos.php';</script>";
};
