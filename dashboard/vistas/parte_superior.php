<?php
session_start();

if ($_SESSION["s_usuario"] === null) {
  header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css" />
  <link rel="stylesheet" href="vistas/style.css">
  <title>Dashboard - Bonbon</title>
</head>

<body>
  <!--C-->
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item">
        <img src="../vistas/images/bonbonnx.png" width="112" height="28">
      </a>
    </div>
    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a>
          </a>
          <a class="button is-light" href="includes/logout.php">
            Cerrar sesión
          </a>
        </div>
      </div>
    </div>
    </div>
  </nav>
<div class="content-dash" style="display: flex; margin: 2%">
  <aside class="menu" style="width: 15%; padding:1%">
    <p class="menu-label">
      General
    </p>
    <ul class="menu-list">
      <li><a href="index.php">Dashboard</a></li>
      <li><a href="misRecetas.php">Mis recetas</a></li>
    </ul>
  </aside>