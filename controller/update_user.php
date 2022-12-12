<?php
include("../php/conexion.php");
$user_id = $_GET['id'];
$user_type=$_POST['user_type'];
$name=$_POST['name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$password=$_POST['password'];
$password_cyf = sha1($password);

$sql = "UPDATE `users` SET `email`='$email',`password`='$password_cyf',`name`='$name',`last_name`='$last_name',`user_type`='$user_type' WHERE user_id ='$user_id'";
if($mysqli->query($sql)===TRUE){
    echo"<script type=\"text/javascript\">alert('Usuario actualizado con éxito');
    window.location='../admin_pages/a-usuarios.php';</script>";
}else{
    echo"<script type=\"text/javascript\">alert('Fallo al actualizar el Usuario');
    window.location='../admin_pages/a-usuarios.php';</script>";
};
?>