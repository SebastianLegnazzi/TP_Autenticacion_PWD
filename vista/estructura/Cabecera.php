<?php
include "../../configuracion.php";
$objSesion = new c_sesion;
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example" id="header">
    <div class="container-fluid">
      <span class="navbar-brand text-white" style="font-family: 'Chivo', sans-serif;">| Trabajo practico 5 - Sesiones |</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav me-auto mb-2 m-2 mb-sm-0">
          <li class="nav-item">
            <a class="nav-link text-white btn btn-primary m-2" href="../sesion/registrarse.php" style="font-family: 'Chivo', sans-serif;">Registrarse</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white btn btn-primary m-2" href="../sesion/login.php" style="font-family: 'Chivo', sans-serif;">Login</a>
          </li>
          <?php
          if (array_key_exists("nombreUsuario", $_SESSION) && array_key_exists("roles", $_SESSION) && array_key_exists("PHPSESSID", $_COOKIE)) {
          ?>
            <li class="nav-item">
              <a class="nav-link text-white btn btn-primary m-2" href="../modUsuarios/listarUsuario.php" style="font-family: 'Chivo', sans-serif;">Lista de usuarios</a>
            </li>
        </ul>
        <div class="dropstart">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
            </svg>
          </button>
          <ul class="dropdown-menu">
            <li><a href="" class="dropdown-item" type="button">Cerrar Sesion</a></li>
          </ul>
        </div>
      <?php
          }
      ?>
      </div>
    </div>
    <script>
    </script>
  </nav>