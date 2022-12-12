<?php
include("../php/conexion.php");

$customer_id = $_GET['id'];
$name=$_POST['name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];

$sql = "UPDATE `customers` SET `email`='$email',`name`='$name',`last_name`='$last_name' WHERE customer_id = $customer_id";
if($mysqli->query($sql)===TRUE){
    echo"<script type=\"text/javascript\">alert('Cliente actualizado con éxito');
    window.location='../admin_pages/a-clientes.php';</script>";
}else{
    echo"<script type=\"text/javascript\">alert('Fallo al actualizar el cliente');
    window.location='../admin_pages/a-clientes.php';</script>";
};
?>