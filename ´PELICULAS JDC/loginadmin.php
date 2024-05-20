<?php 
   session_start();
?>  
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
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

.log {
    color: #53FB18;
    text-align: center;
    font-size: 35px;
}

.company {
    color: #53FB18;
    text-align: center;
}
.btn {
    background-color: black;
    color: #53FB18;
    border: none;
    padding: 8px 10px;
    cursor: pointer;
    border-radius: 5px;
    width: fit-content;
    margin: 0 auto;
    display: block;
}

.btn:hover {
    background-color: #53FB18;
}

.btn:active {
    background-color:#53FB18;
    color: white;
}
.field.input {
    text-align: left;
}

.field.input label {
    color: white;
}

.field.input input {
    background-color: #212121;
    color: white;
    border: 1px solid #53FB18;
    padding: 8px 10px;
    border-radius: 5px;
    width: 100%;
    box-sizing: border-box;
    margin-bottom: 10px;
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
        include("CONEXION.php");
        if(isset($_POST['submit'])){
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);

            // Check if the user is an admin
            if($email == 'jdc@gmail.com' && $password == '123456'){
                $_SESSION['valid'] = $email;
                $_SESSION['username'] = 'Admin';
                $_SESSION['id'] = 1;
                header("Location: menuadmin.php");
                exit();
            } else {
                $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email' AND Password='$password'") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['age'] = $row['Age'];
                    $_SESSION['id'] = $row['Id'];
                } else {
                    echo "<div class='message'>
                            <p>Wrong Username or Password</p>
                          </div><br>";
                    echo "<a href='index.php'><button class='btn'>Go Back</button></a>";
                }
                if(isset($_SESSION['valid'])){
                    header("Location: home.php");
                    exit();
                }
            }
        } else {
    ?>
        <header class="log">ADMIN LOGIN</header>
        <form action="" method="post">
            <div class="field input">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="off" required>
            </div>

            <div class="field">
                <input type="submit" class="btn" name="submit" value="LOGIN">
            </div>
        </form>
    </div>
    <?php 
        } 
    ?>
    <footer class="footer">
        <p><span>Contacto:3183578094</span></p>
        <p><span class="info">Correo electrónico:</span> jdcstreaming@gmail.com</p>
        <p><span class="info">Teléfono:</span> +1 (555) 123-4567</p>
        <p><span class="company">JDC STREAMING</span></p>
    </footer>

</body>
</html>

