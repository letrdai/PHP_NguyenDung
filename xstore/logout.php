<?php
session_start();

unset($_SESSION['userLogged']);
header("Location: index.php"); die;
?>