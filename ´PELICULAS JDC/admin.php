<?php
    session_start();
    include("CONEXION.php");
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Usuarios Registrados</title>
    <link href="./static/style2.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="./Images/Logo/Title.jpeg" type="image/x-icon" />
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
            color: white;
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
            min-height: 100vh;
            flex-direction: column;
        }
        .form-box {
            width: 800px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            text-align: center;
        }
        .table-container {
            overflow-x: auto; /* Permite desplazarse horizontalmente en tablas grandes */
        }
        .user-table, .contact-table {
            display: none; /* Ocultamos las tablas por defecto */
            margin-top: 20px;
            width: 100%; /* Ajustamos al 100% para que ocupe todo el ancho del contenedor */
        }
        .user-table table, .contact-table table {
            width: 100%;
            border-collapse: collapse;
            margin: auto; /* Centramos la tabla */
        }
        .user-table th, .user-table td, .contact-table th, .contact-table td {
            border: 1px solid #53FB18;
            padding: 8px;
            text-align: center;
        }
        .user-table th, .contact-table th {
            background-color: #212121;
            color: #53FB18;
        }
        .user-table td, .contact-table td {
            background-color: #000;
            color: white;
        }
        .user-table tbody tr:nth-child(odd), .contact-table tbody tr:nth-child(odd) {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .user-table tbody tr:nth-child(even), .contact-table tbody tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .log {
            color: #53FB18;
            text-align: center;
            font-size: 35px;
            margin-bottom: 20px;
        }
        .company {
            color: #53FB18;
            text-align: center;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            background-color: #000;
            color: #fff;
            padding: 20px 0;
            margin-top: 20px;
        }
        /* Estilo para el botón */
        .toggle-button {
            background-color: #53FB18;
            border: none;
            color: black;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        .toggle-button:hover {
            background-color: #4CAF50;
        }
        /* Estilo para el scroll */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1; /* Fondo del scroll */
        }

        ::-webkit-scrollbar-thumb {
            background: #53FB18; /* Color del scroll */
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #4CAF50; /* Color del scroll al pasar el mouse */
        }

    </style>
</head>
<body>
    <div class="logo">
        <a href="home.php">
            <img src="Images/logoprincipal.jpeg" class="img-logo" alt="Logo" />
        </a>
    </div>
    <button id="scrollToTopButton" title="Go to top" class="ml-5">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </button>

    <div class="form-box">
        <header class="log">USUARIOS REGISTRADOS</header>

        <div class="user-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Edad</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // Consultar usuarios registrados
                    $result = mysqli_query($con, "SELECT * FROM users");

                    // Mostrar usuarios en la tabla
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['Id'] . "</td>";
                        echo "<td>" . $row['Username'] . "</td>";
                        echo "<td>" . $row['Email'] . "</td>";
                        echo "<td>" . $row['Age'] . "</td>";
                        echo "</tr>";
                    }

                    // Liberar resultado
                    mysqli_free_result($result);
                ?>
                </tbody>
            </table>
        </div>

        <!-- Botón para mostrar/ocultar la tabla -->
        <button class="toggle-button" id="toggleTableButton" onclick="toggleTable()">Mostrar Usuarios Registrados</button>
    </div>

    <div class="form-box">
        <header class="log">MENSAJES DE CONTACTO</header>

        <div class="table-container">
            <div class="contact-table">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Asunto</th>
                            <th>Mensaje</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        // Consultar mensajes de contacto
                        $result_contact = mysqli_query($con, "SELECT * FROM contact_messages");

                        // Mostrar mensajes en la tabla
                        while ($row = mysqli_fetch_array($result_contact)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['firstname'] . "</td>";
                            echo "<td>" . $row['lastname'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td>" . $row['subject'] . "</td>";
                            echo "<td>" . $row['message'] . "</td>";
                            echo "</tr>";
                        }

                        // Liberar resultado
                        mysqli_free_result($result_contact);

                        // Cerrar conexión
                        mysqli_close($con);
                    ?>
                    </tbody>
                </table>
            </div>

            <!-- Botón para mostrar/ocultar la tabla de mensajes -->
            <button class="toggle-button" id="toggleContactTableButton" onclick="toggleContactTable()">Mostrar Mensajes de Contacto</button>
        </div>
    </div>

    <footer class="footer">
        <p><span>Contacto: 3183578094</span></p>
        <p><span class="info">Correo electrónico:</span> jdcstreaming@gmail.com</p>
        <p><span class="info">Teléfono:</span> +1 (555) 123-4567</p>
        <p><span class="company">JDC STREAMING</span></p>
    </footer>

    <!-- Script para mostrar/ocultar la tabla de usuarios registrados -->
    <script>
        function toggleTable() {
            var table = document.querySelector('.user-table');
            var button = document.getElementById('toggleTableButton');
            
            if (table.style.display === 'none') {
                table.style.display = 'block';
                button.textContent = 'Ocultar Usuarios Registrados';
            } else {
                table.style.display = 'none';
                button.textContent = 'Mostrar Usuarios Registrados';
            }
        }

        // Función para mostrar/ocultar la tabla de mensajes de contacto
        function toggleContactTable() {
            var contactTable = document.querySelector('.contact-table');
            var contactButton = document.getElementById('toggleContactTableButton');
            
            if (contactTable.style.display === 'none') {
                contactTable.style.display = 'block';
                contactButton.textContent = 'Ocultar Mensajes de Contacto';
            } else {
                contactTable.style.display = 'none';
                contactButton.textContent = 'Mostrar Mensajes de Contacto';
            }
        }
    </script>
</body>
</html>
