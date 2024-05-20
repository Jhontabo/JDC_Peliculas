<?php
    session_start();
    include("CONEXION.php");
    if(!isset($_SESSION['valid'])){
        header("Location: loginadmin.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <link href="./static/style2.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="./Images/Logo/Title.jpeg" type="image/x-icon" />
</head>

<style>
body {
    margin: 0;
    padding: 0;
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.85)), url("Images/fondobase.jpg") no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.logo img {
    width: 110px;
    height: 90px;
    padding: 3px;
    border: 5px solid #53FB18;
    border-radius: 50%;
    margin-bottom: 20px;
}

.container {
    text-align: center;
}

.menu {
    margin-top: 20px;
    display: flex;
    gap: 20px;
    justify-content: center;
}

.menu button {
    background-color: #212121;
    color: #53FB18;
    border: 1px solid #53FB18;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s, color 0.3s;
}

.menu button:hover {
    background-color: #53FB18;
    color: #212121;
}

.title {
    color: #53FB18;
    font-size: 36px;
    font-weight: bold;
    margin-bottom: 20px;
}

.field {
    margin-bottom: 20px;
}

.field label {
    color: #53FB18;
    display: block;
    margin-bottom: 5px;
}

.field input {
    background-color: #212121;
    color: white;
    border: 1px solid #53FB18;
    padding: 8px 10px;
    border-radius: 5px;
    width: 100%;
}

.field input:focus {
    border-color: #53FB18;
}
</style>

<body>
    <div class="container">
        <div class="logo">
            <a href="home.php">
                <img src="Images/logoprincipal.jpeg" class="img-logo" alt="Logo" />
            </a>
        </div>
        <div class="title">MENU DE ADMINISTRADOR</div>
        <div class="menu">
            <button onclick="location.href='admin.php'">Observar Datos</button>
            <button onclick="location.href='peliculas_admin.php'">Administrar Películas</button>
        </div>
    </div>
    <button id="scrollToTopButton" title="Go to top" class="ml-5">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </button>
</body>
</html>
