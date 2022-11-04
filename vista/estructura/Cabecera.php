<?php
include "../../configuracion.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trabajo practico 5 - Sesiones</title>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../alertas/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="../alertas/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="../css/genera.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Third navbar example" id="header">
    <div class="container-fluid">
      <span class="navbar-brand text-white" style="font-family: 'Chivo', sans-serif;">| Trabajo practico 5 - Sesiones |</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav me-auto mb-2 m-2 mb-sm-0">
          <li class="nav-item">
            <a class="nav-link text-white btn btn-primary m-2" href="../home/index.php" style="font-family: 'Chivo', sans-serif;">Registrarse</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white btn btn-primary m-2" href="../home/index.php" style="font-family: 'Chivo', sans-serif;">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white btn btn-primary m-2" href="../modUsuarios/listarUsuario.php" style="font-family: 'Chivo', sans-serif;">Listar Usuarios</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>