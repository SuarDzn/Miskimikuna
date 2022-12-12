<?php
include("../php/conexion.php");

$name=$_POST['name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];

$sql = "INSERT INTO `customers`(`customer_id`, `email`, `name`, `last_name`) 
VALUES (null,'$email','$name','$last_name')";
if($mysqli->query($sql)===TRUE){
    echo"<script type=\"text/javascript\">alert('Cliente registrado con éxito');
    window.location='../admin_pages/a-clientes.php';</script>";
}else{
    echo"<script type=\"text/javascript\">alert('Fallo al registrar el cliente');
    window.location='../admin_pages/a-clientes.php';</script>";
};
?>