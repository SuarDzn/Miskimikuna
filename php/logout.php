<?php
Session_start();
Session_destroy();

//redirect
header("Location: ../index.php");
?>