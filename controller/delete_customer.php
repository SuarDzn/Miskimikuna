<?php
include("../php/conexion.php");

$customer_id=$_GET['id'];

$sql = "DELETE FROM customers WHERE customer_id = $customer_id";
if($mysqli->query($sql)===TRUE){
    echo"<script type=\"text/javascript\">alert('Cliente eliminado con éxito');
    window.location='../admin_pages/a-clientes.php';</script>";
}else{
    echo"<script type=\"text/javascript\">alert('Fallo al eliminar el cliente');
    window.location='../admin_pages/a-clientes.php';</script>";
};
