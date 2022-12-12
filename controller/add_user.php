<?php
include("../php/conexion.php");

$user_type=$_POST['user_type'];
$name=$_POST['name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$password=$_POST['password'];
$password_cyf = sha1($password);

$sql = "INSERT INTO `users`(`user_id`, `email`, `password`, `name`, `last_name`, `user_type`) 
VALUES (null,'$email','$password_cyf','$name','$last_name',$user_type)";
if($mysqli->query($sql)===TRUE){
    echo"<script type=\"text/javascript\">alert('Usuario registrado con éxito');
    window.location='../admin_pages/a-usuarios.php';</script>";
}else{
    echo"<script type=\"text/javascript\">alert('Fallo al Registrar el Usuario');
    window.location='../admin_pages/a-usuarios.php';</script>";
};
?>