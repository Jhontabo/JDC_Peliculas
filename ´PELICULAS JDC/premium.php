<?php
session_start();
include("CONEXION.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>ApnaTheatre</title>
  <link rel="shortcut icon" href="./Images/Logo/Title.jpeg" type="image/x-icon">

  <!-- Font  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link href="./static/style.css" rel="stylesheet" type="text/css" />
  <link href="./static/premium.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="static/bootstrap.min.css">
  <link rel="stylesheet" href="static/style-min.css">
  <link rel="stylesheet" href="cards.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.85)), url("Images/fondopags.jpg") no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
      color: white;
    }

    #scrollToTopButton {
      position: fixed;
      bottom: 40px;
      right: 25px;
      font-size: 25px;
      z-index: 99;
      width: 50px;
      height: 50px;
      background-color: #53FB18;
      color: black;
      border: none;
      cursor: pointer;
      outline: none;
      padding: 6px;
      border-radius: 50%;
    }

    #scrollToTopButton:hover, i:hover {
      background-color: white;
      color: #53FB18;
    }

    #nav:hover {
      background-color: #53FB18!important;
    }

    .logo {
      width: 110px;
      height: 90px;
      padding: 3px;
      margin: 0;
      padding: 0;
    }

    .fas:hover {
      background: none!important;
    }

    .nav-item {
      flex-wrap: wrap;
    }

    .menu li a:hover {
      color: #53FB18 !important;
      opacity: 0.5;
    }

    .navbar-brand {
      border-radius: 10px;
      margin: 10px;
      background-color: #53FB18;
      display: inline-block;
    }

    .footer {
      margin-bottom: 15px;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    .footer-content {
      display: flex;
      justify-content: space-between;
      padding: 10px 20px;
    }

    .footer-logo {
      width: 150px;
      height: 120px;
      padding: 3px;
      margin: 0px 0px 0px 10px;
      padding: 0;
    }

    .nav-item:hover {
      margin-bottom: 10px;
    }

    #header-nav .navbar-nav .nav-item .nav-link:hover {
      color: #53FB18;
      text-decoration: none;
      transition: color 0.3s ease, text-shadow 0.3s ease;
      text-shadow: 0 0 10px #53FB18;
    }

    .footer-heading {
      color: white;
    }

    .footer-left, .footer-right, .footer-middle {
      text-align: center;
    }

    .icons {
      margin-left: -30px;
    }

    .footer-links i {
      font-size: 30px;
      width: 40px;
      height: 40px;
      padding: 5px;
      margin-top: 30px;
    }

    .footer-middle a i:hover {
      background-color: white;
      border-radius: 50px;
      color: #53FB18;
    }

    .footer-middle-list-item {
      list-style: none;
      font-size: 15px;
      font-family: cursive;
      margin: 5px 0px 0px 15px;
      text-align: left;
    }

    .footer-middle-list-item a {
      text-decoration: none;
      color: white;
    }

    .footer-middle-list-item a:hover {
      color: #53FB18;
    }

    .footer-right {
      margin-top: -15px;
    }

    .footer-contact-button {
      font-size: 20px;
      background-color: #53FB18;
      color: black;
      padding: 10px;
      border: none;
      border-radius: 10px;
      text-decoration: none;
    }

    .footer-contact-button:hover {
      background-color: white;
      color: #53FB18;
    }

    .footer-bottom-tagline {
      color: white;
      font-size: 15px;
      font-family: cursive;
      margin-bottom: 25px;
    }

    .footer-copyright {
      text-align: center;
      color: white;
      margin-top: 20px;
      font-size: 18px;
    }

    .footer-hr {
      color: grey;
      font-weight: bold;
    }

    .user-table {
      margin: 20px;
      color: white;
    }

    .user-table table {
      width: 100%;
      border-collapse: collapse;
      color: white;
    }

    .user-table th, .user-table td {
      border: 1px solid #53FB18;
      padding: 8px;
      text-align: left;
    }

    .user-table th {
      background-color: #53FB18;
      color: black;
    }

    .user-table tr:nth-child(even) {
      background-color: rgba(0, 0, 0, 0.5);
    }

    .user-table tr:hover {
      background-color: rgba(0, 0, 0, 0.7);
    }
  </style>
</head>

<body>
  <!-- Navbar starts -->
  <nav class="navbar navbar-expand-lg navbar-light bg-dark" id="header-nav">
    <div class="container-fluid">
      <a class="navbar-brand" href="home.php">
        <img class="logo" src="Images/Logo/TITLE.jpeg" alt="" width="30" height="24">
      </a>
      <button id="nav" class="navbar-toggler" style="background-color:#53FB18" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" style="background-color:black;"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php" onMouseOver="this.style.color='Green'" onMouseOut="this.style.color='white'">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="movies.html" onMouseOver="this.style.color='green'" onMouseOut="this.style.color='white'">Movies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="web-series.html" onMouseOver="this.style.color='green'" onMouseOut="this.style.color='white'">Web Series</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tv.html" onMouseOver="this.style.color='green'" onMouseOut="this.style.color='white'">TV</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="premium.html" onMouseOver="this.style.color='green'" onMouseOut="this.style.color='white'">Premium</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactus.php" onMouseOver="this.style.color='green'" onMouseOut="this.style.color='white'">Contactanos</a>
          </li>
        </ul>
        <form id="searchForm" class="d-flex">
          <input class="form-control me-2" onMouseOver="this.style.color='green'" type="text" id="searchText" placeholder="Search" aria-label="Search">
          <button style="background-color: #53FB18; border-color: #53FB18;" class="btn btn-danger" type="submit">BUSCAR</button>
        </form>
      </div>
    </div>
  </nav>

  <!-- Tabla de Películas Registradas -->
  <div class="user-table">
  <h2 style="color: #53FB18;"> Películas Premium</h2>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Información</th>
          <th>Imagen</th>
          <th>Año</th>
          <th>Temporadas</th>
          <th>IMDb</th>
          <th>Duración</th>
          <th>Fecha de Registro</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Conectar a la base de datos y hacer la consulta
        include("CONEXION.php");
        
        $sql = "SELECT id, nombre, informacion, imagen, anio, temporadas, imdb, duracion, fecha_registro FROM peliculas";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["informacion"] . "</td>";
            echo '<td><img src="' . $row["imagen"] . '" style="max-width: 100px; max-height: 100px;" /></td>';
            echo "<td>" . $row["anio"] . "</td>";
            echo "<td>" . $row["temporadas"] . "</td>";
            echo "<td>" . $row["imdb"] . "</td>";
            echo "<td>" . $row["duracion"] . "</td>";
            echo "<td>" . $row["fecha_registro"] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='9'>No se encontraron películas registradas.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>



