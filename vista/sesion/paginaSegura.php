<?php
include_once("../estructura/Cabecera.php");
if (array_key_exists("nombreUsuario", $_SESSION) && array_key_exists("roles",$_SESSION) && array_key_exists("PHPSESSID", $_COOKIE)) {
    header('Location: ../modUsuarios/listarUsuario.php');
} else {
    header('Location: login.php');
}
include_once("../estructura/Pie.php")
?>
