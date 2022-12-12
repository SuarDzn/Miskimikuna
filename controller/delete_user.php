<?php
include("../php/conexion.php");

$user_id=$_GET['id'];

$sql = "DELETE FROM users WHERE user_id='$user_id'";
if($mysqli->query($sql)===TRUE){
    echo"<script type=\"text/javascript\">alert('Usuario eliminado con éxito');
    window.location='../admin_pages/a-usuarios.php';</script>";
}else{
    echo"<script type=\"text/javascript\">alert('Fallo al eliminar el usuario');
    window.location='../admin_pages/a-usuarios.php';</script>";
};
?>