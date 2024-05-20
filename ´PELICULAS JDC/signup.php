<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link href="./static/style2 .css" rel="stylesheet" type="text/css" />
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
}

.logo img {
    position: relative;
    top: 30px;
    left: 10px;
    width: 110px;
    height: 90px;
    padding: 3px;
    margin: 0;
    border: 5px solid #53FB18;
    border-radius: 50%;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.form-box {
    width: 400px;
    padding: 20px;
    background-color: rgba(0, 0, 0, 0.6);
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 0 auto;
    text-align: center;
}

.field {
    margin-bottom: 20px;
}

.field label {
    color: white; /* Cambiado a blanco */
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

.links {
    margin-top: 20px;
    color: white;
    text-align: center;
}

.links a {
    color: #53FB18;
}

.links a:hover {
    color: #3B8D26;
}

.footer {
    text-align: center;
    background-color: #000;
    color: #fff;
    padding: 20px 0;
}

.company {
    color: #53FB18;
    text-align: center;
}

.btn {
    background-color: black; /* Cambiado a negro */
    color: #53FB18;
    border: none;
    padding: 8px 20px; /* Ajustado el padding */
    cursor: pointer;
    border-radius: 5px;
    width: 50%; /* Ajustado el ancho */
    margin: 0 auto; /* Centrado horizontalmente */
    display: block;
}

.btn:hover {
    background-color: #53FB18;
}

.btn:active {
    background-color: #53FB18;
    color: black; /* Cambiado a negro */
}

.message{
    color: #53FB18;
    text-align: center;
}
.btn{
    background-color: #53FB18;
    color: black;
    text-align: center;
}
.header{
    color: #53FB18;
    text-align: center;
    font-size: 35px;
}
.field {
    margin-bottom: 20px;
    text-align: left; /* Alinea los campos a la izquierda */
}

.field label {
    color: white; /* Cambiado a blanco */
    display: block;
    margin-bottom: 5px;
}

.field input {
    background-color: #212121;
    color: white;
    border: 1px solid #53FB18;
    padding: 8px 10px;
    border-radius: 5px;
    width: calc(100% - 22px); /* Ajusta el ancho del input */
    /* Eliminado el width: 100%; */
}

.field input:focus {
    border-color: #53FB18;
}
.message{
    color: #fff;
}
/* Estilos para la barra de desplazamiento */
::-webkit-scrollbar {
    width: 10px; /* Ancho de la barra */
}

/* Track (parte no desplazada) */
::-webkit-scrollbar-track {
    background: transparent; /* Fondo transparente */
}

/* Handle (parte desplazada) */
::-webkit-scrollbar-thumb {
    background: #53FB18; /* Color de fondo verde */
    border-radius: 5px; /* Bordes redondeados */
}

/* Handle al pasar el mouse */
::-webkit-scrollbar-thumb:hover {
    background: #53FB18; /* Cambio de color al pasar el mouse */
}


</style>

<body>
    <div class="logo">
        <a href="home.php">
            <img src="Images/logoprincipal.jpeg" class="img-logo" alt="Logo" />
        </a>
    </div>
    <button id="scrollToTopButton" title="Go to top" class="ml-5">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </button>

    <div class="box form-box">
    <?php
        // Incluye el archivo de configuración para la conexión a la base de datos
        include("CONEXION.php");

        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];

            // Verificar la unicidad del correo electrónico
            $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");
            if(mysqli_num_rows($verify_query) != 0 ){
                echo "<div class='message'>
                          <p>ESTE EMAIL YA ESTA EN USO!</p>
                      </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Back</button></a>";
            } else {
                mysqli_query($con,"INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Error Occurred");

                echo "<div class='message'>
                          <p>REGISTRO REALIZADO!</p>
                      </div> <br>";
                echo "<a href='login.php'><button class='btn'>INICIAR SESION AHORA</button></a>";
            }
        } else {
    ?>


<header class="header">REGISTRO</header>

        <form action="" method="post">
            <div class="field input">
                <label for="username">USUARIO</label>
                <input type="text" name="username" id="username" autocomplete="off" required>
            </div>
            <div class="field input">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" autocomplete="off" required>
            </div>
            <div class="field input">
                <label for="age">EDAD</label>
                <input type="number" name="age" id="age" autocomplete="off" required>
            </div>
            <div class="field input">
                <label for="password">CONTRASEÑA</label>
                <input type="password" name="password" id="password" autocomplete="off" required>
            </div>
            <div class="field">
                <input type="submit" class="btn" name="submit" value="REGISTRATE">
            </div>
            <div class="links">
            ¿Ya eres usuario? <a href="login.php">INICIA SECION</a>
            </div>
        </form>
        <?php } ?>
    </div>
    <footer class="footer">
    <p><span >Contacto:3183578094</span></p>
    <p><span class="info">Correo electrónico:</span> jdcstreaming@gmail.com</p>
    <p><span class="info">Teléfono:</span> +1 (555) 123-4567</p>
    <p><span class="company">JDC STREAMING</span></p>
</footer>

</body>
</html>