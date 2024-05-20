<?php
session_start();
include("CONEXION.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $stmt = $con->prepare("SELECT * FROM peliculas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $nombre = $row['nombre'];
        $informacion = $row['informacion'];
        $anio = $row['anio'];
        $temporadas = $row['temporadas'];
        $imdb = $row['imdb'];
        $duracion = $row['duracion'];
        $imagen = $row['imagen'];

        $stmt->close();
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $informacion = $_POST['informacion'];
        $anio = $_POST['anio'];
        $temporadas = $_POST['temporadas'];
        $imdb = $_POST['imdb'];
        $duracion = $_POST['duracion'];

        // Manejo de la imagen
        $imagen = $_FILES['imagen'];
        $imagen_nombre = basename($imagen['name']);
        $imagen_tmp = $imagen['tmp_name'];
        $imagen_tipo = $imagen['type'];
        $imagen_tamano = $imagen['size'];

        // Comprobación y guardado de la imagen
        $upload_dir = 'uploads/';
        $imagen_path = $upload_dir . $imagen_nombre;

        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        if (move_uploaded_file($imagen_tmp, $imagen_path)) {
            // Borramos la imagen antigua si existe
            $stmt_img = $con->prepare("SELECT imagen FROM peliculas WHERE id = ?");
            $stmt_img->bind_param("i", $id);
            $stmt_img->execute();
            $result_img = $stmt_img->get_result();
            $row_img = $result_img->fetch_assoc();

            $old_image_path = $row_img['imagen'];
            unlink($old_image_path); // Borra la imagen antigua

            $stmt_img->close();

            // Actualizamos los datos de la película
            $stmt_update = $con->prepare("UPDATE peliculas SET nombre=?, informacion=?, anio=?, temporadas=?, imdb=?, duracion=?, imagen=? WHERE id=?");
            $stmt_update->bind_param("ssissssi", $nombre, $informacion, $anio, $temporadas, $imdb, $duracion, $imagen_path, $id);

            if ($stmt_update->execute()) {
                echo "Película actualizada correctamente.";
            } else {
                echo "Error al actualizar la película: " . $stmt_update->error;
            }

            $stmt_update->close();
        } else {
            echo "Error al subir la imagen.";
        }
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $stmt = $con->prepare("SELECT imagen FROM peliculas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $imagen_path = $row['imagen'];

        if (unlink($imagen_path)) {
            // Borra la imagen del servidor
            $stmt_delete = $con->prepare("DELETE FROM peliculas WHERE id = ?");
            $stmt_delete->bind_param("i", $id);

            if ($stmt_delete->execute()) {
                echo "Película eliminada correctamente.";
            } else {
                echo "Error al eliminar la película: " . $stmt_delete->error;
            }

            $stmt_delete->close();
        } else {
            echo "Error al eliminar la imagen.";
        }

        $stmt->close();
    } elseif (isset($_POST['registrar'])) {
        $nombre = $_POST['nombre'];
        $informacion = $_POST['informacion'];
        $anio = $_POST['anio'];
        $temporadas = $_POST['temporadas'];
        $imdb = $_POST['imdb'];
        $duracion = $_POST['duracion'];

        // Manejo de la imagen
        $imagen = $_FILES['imagen'];
        $imagen_nombre = basename($imagen['name']);
        $imagen_tmp = $imagen['tmp_name'];
        $imagen_tipo = $imagen['type'];
        $imagen_tamano = $imagen['size'];

        // Comprobación y guardado de la imagen
        $upload_dir = 'uploads/';
        $imagen_path = $upload_dir . $imagen_nombre;

        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        if (move_uploaded_file($imagen_tmp, $imagen_path)) {
            $stmt = $con->prepare("INSERT INTO peliculas (nombre, informacion, anio, temporadas, imdb, duracion, imagen) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssissss", $nombre, $informacion, $anio, $temporadas, $imdb, $duracion, $imagen_path);

            if ($stmt->execute()) {
                echo "Película registrada correctamente.";
            } else {
                echo "Error al registrar la película: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error al subir la imagen.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro de Películas</title>
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
        .form-box form {
            display: flex;
            flex-direction: column;
        }
        .form-box input, .form-box textarea {
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #53FB18;
            background-color: #212121;
            color: white;
            width: 100%;
            outline: none;
        }
        .form-box input:focus, .form-box textarea:focus {
            border-color: #53FB18;
        }
        .form-box input[type="submit"] {
            background-color: #53FB18;
            color: black;
            cursor: pointer;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .form-box input[type="submit"]:hover {
            background-color: #3b9e00;
        }
        .form-box input[type="file"] {
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            background-color: #212121;
            color: white;
            border: 1px solid #53FB18;
            outline: none;
        }
        .form-box input[type="file"]::-webkit-file-upload-button {
            padding: 10px 20px;
            border: none;
            background-color: #53FB18;
            color: black;
            cursor: pointer;
            border-radius: 5px;
            outline: none;
        }
        .form-box input[type="file"]::-webkit-file-upload-button:hover {
            background-color: #3b9e00;
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
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        .action-buttons button {
            background-color: #53FB18;
            color: black;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .action-buttons button:hover {
            background-color: #3b9e00;
        }
    </style>
</head>
<body>
<div class="logo">
        <a href="home.php">
            <img src="Images/logoprincipal.jpeg" class="img-logo" alt="Logo" />
        </a>
    </div>
    <div class="container">
        <?php if (isset($_POST['edit'])): ?>
            <div class="form-box">
                <h1 style="color: #53FB18;">Editar Película</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="text" name="nombre" placeholder="Nombre de la película" value="<?php echo $nombre; ?>" required>
                    <textarea name="informacion" placeholder="Información de la película" required><?php echo $informacion; ?></textarea>
                    <input type="text" name="anio" placeholder="Año" value="<?php echo $anio; ?>" required>
                    <input type="text" name="temporadas" placeholder="Número de temporadas" value="<?php echo $temporadas; ?>" required>
                    <input type="text" name="imdb" placeholder="IMDb" value="<?php echo $imdb; ?>" required>
                    <input type="text" name="duracion" placeholder="Duración" value="<?php echo $duracion; ?>" required>
                    <input type="file" name="imagen">
                    <input type="submit" name="update" value="Actualizar Película">
                </form>
            </div>
        <?php else: ?>
            <div class="form-box">
                <h1 style="color: #53FB18;">Registro de Películas</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="nombre" placeholder="Nombre de la película" value="<?php echo isset($nombre) ? $nombre : ''; ?>" required>
                    <textarea name="informacion" placeholder="Información de la película" required><?php echo isset($informacion) ? $informacion : ''; ?></textarea>
                    <input type="text" name="anio" placeholder="Año" value="<?php echo isset($anio) ? $anio : ''; ?>" required>
                    <input type="text" name="temporadas" placeholder="Número de temporadas" value="<?php echo isset($temporadas) ? $temporadas : ''; ?>" required>
                    <input type="text" name="imdb" placeholder="IMDb" value="<?php echo isset($imdb) ? $imdb : ''; ?>" required>
                    <input type="text" name="duracion" placeholder="Duración" value="<?php echo isset($duracion) ? $duracion : ''; ?>" required>
                    <input type="file" name="imagen">
                    <input type="submit" name="registrar" value="Registrar Película">
                </form>
            </div>
        <?php endif; ?>

        <div class="user-table">
            <h2>Tabla de Películas Registradas</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Información</th>
                        <th>Año</th>
                        <th>Temporadas</th>
                        <th>IMDb</th>
                        <th>Duración</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $con->prepare("SELECT * FROM peliculas");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['informacion'] . "</td>";
                        echo "<td>" . $row['anio'] . "</td>";
                        echo "<td>" . $row['temporadas'] . "</td>";
                        echo "<td>" . $row['imdb'] . "</td>";
                        echo "<td>" . $row['duracion'] . "</td>";
                        echo "<td><img src='" . $row['imagen'] . "' alt='Imagen de película' style='width: 100px;'></td>";
                        echo "<td>";
                        echo "<form action='' method='post' style='display:inline-block;'>";
                        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                        echo "<input type='submit' name='edit' value='Editar'>";
                        echo "</form>";
                        echo "<form action='' method='post' style='display:inline-block;'>";
                        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                        echo "<input type='submit' name='delete' value='Eliminar'>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    $stmt->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
