<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <title>Contact Us</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="./Images/Logo/Title.jpeg" type="image/x-icon">

  <!-- Font  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="./static/style.css" rel="stylesheet" type="text/css" />

  <form action="process_contact_form.php" method="POST" name="contact-form" id="contact-form" onsubmit="return validateForm();">

  <style>

    body {
        margin: 0;
        padding: 0;
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.85)),
          url("Images/logo/FONDCONT.jpg") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
      }
    /* navbar css */
    #header-nav .nav-link {
      color: white;
      font-size: 20px;
      margin-left: 20px;

    }

    .menu li a {
      text-decoration: none;
    }
    .nav-item :hover{
  margin-bottom: 10px;

  
}
#header-nav .navbar-nav .nav-item .nav-link:hover {
  color: #53FB18;
  text-decoration: none; /* Remove underline */
  transition: color 0.3s ease, text-shadow 0.3s ease; /* Add transition effect */
  text-shadow: 0 0 10px #53FB18; /* Add glowing effect */
}
    .menu li a:hover {
      color: #53FB18 !important;
      opacity: 0.5;
    }

    #variety {
      margin: 0.5rem;
    }

    .btn-outline-danger,
    .btn-outline-danger:focus {
      outline: none;
      box-shadow: none;
    }

    .contactForm {
      margin: 5px;
    }

    /* <!------------------------Scroll to top button------------------------------------------------> */

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

    #scrollToTopButton:hover,
    i:hover {
      background-color: white;
      color: #53FB18;
    }

    .btn-sm a {
      color: white;
      transition: all 0.3s ease;
      float: right;
      font-size: medium;
    }

    .btn-sm a:hover {
      color: #53FB18;
      transition: all 0.3s ease;
    }

    #nav:hover {
      background-color: #53FB18 !important;

    }
    #header-nav .nav-link {
  color: white;
  font-size: 20px;
  margin-left: 20px;
}
    @media only screen and (max-width: 1400px){
  #header-nav .nav-link {
    color: white;
    font-size: 18px;
    margin-left: 18px;
  }
}

@media only screen and (min-width: 1133px) and (max-width: 1275px) {
  #header-nav .nav-link {
    color: white;
    font-size: 15px;
    margin-left: 10px;
  } 
}
@media only screen and (min-width: 1035px) and (max-width: 1132px) {
  #header-nav .nav-link {
    color: white;
    font-size: 15px;
    margin-left: 10px;
  } 
  #searchText{
    width: 120px;
  }
  #submitBtn{
    width: 60px;
    display: flex;
    justify-content: center;
  }
}
@media only screen and (min-width: 993px) and (max-width: 1034px) {
  #header-nav .nav-link {
    color: white;
    font-size: 14px;
    margin-left: 10px;
  } 

#searchText{
  width: 100px;
}
#submitBtn{
  width: 50px;
  display: flex;
  justify-content: center;
}
}
  </style>

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>
  <script type="text/javascript">
    (function () {
      emailjs.init("user_3Y57GrE42p8s0kTrKxP0W");
    })();
  </script>

  <script type="text/javascript">
    window.onload = function () {
      document.getElementById('contact-form').addEventListener('submit', function (event) {
        event.preventDefault();
        // generate a five digit number for the contact_number variable
        this.contact_number.value = Math.random() * 100000 | 0;
        // these IDs from the previous steps
        emailjs.sendForm('contact_service', 'contact_form', this)
          .then(function () {
            console.log('SUCCESS!');
          }, function (error) {
            console.log('FAILED...', error);
          });
      });
    }
  </script>
</head>

<?php
// Incluye el archivo de conexión
include("CONEXION.php");

// Verificar si el formulario ha sido enviado
if (isset($_POST["send"])) {
    // Obtener datos del formulario
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Preparar y ejecutar la consulta SQL para insertar los datos en la tabla
    $sql = "INSERT INTO contact_messages (firstname, lastname, email, phone, subject, message) VALUES ('$firstname', '$lastname', '$email', '$phone', '$subject', '$message')";

    if ($con->query($sql) === TRUE) {
        // Enviar una respuesta de éxito
        echo "Mensaje enviado con éxito";
    } else {
        // Enviar un mensaje de error si falla la inserción
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>
<body>


  <div class="scroll-bar">
    <STyle>
    

  </STyle>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark" id="header-nav">
      <div class="container-fluid">
        <style>
          .navbar-brand {
                  border-radius: 10px; /* ajusta este valor según el grado de redondez deseado */
                  margin: 10px; /* ajusta este valor según el margen deseado */
                  background-color: #53FB18; /* color verde especificado */
                  display: inline-block; /* para que el enlace ocupe solo el espacio necesario */
            }
        </style>
        <a class="navbar-brand" href="home.php"><img class="logo" src="Images/Logo/TITLE.jpeg" alt="" width="30"
            height="24"></a>
        <button id="nav" class="navbar-toggler" id="nav" style="background-color:#53FB18" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" style="background-color:black;"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item ">
              <a class="nav-link active s" aria-current="page" href="home.php" onMouseOver="this.style.color='Green'" onMouseOut="this.style.color='white'">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="movies.html" onMouseOver="this.style.color='green'" onMouseOut="this.style.color='white'">Movies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="web-series.html" onMouseOver="this.style.color='green'" onMouseOut="this.style.color='white'" >Web Series</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tv.html"  onMouseOver="this.style.color='green'" onMouseOut="this.style.color='white'">TV</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="premium.php"  onMouseOver="this.style.color='green'" onMouseOut="this.style.color='white'">Premium</a>
            </li>
      
            <li class="nav-item">
              <a class="nav-link" href="contactus.php"  onMouseOver="this.style.color='green'" onMouseOut="this.style.color='white'">Contactanos</a>
            </li>
            <li> 
              
            
          </ul>
          <form id="searchForm" class="d-flex">
            <input class="form-control me-2" onMouseOver="this.style.color='green'" type="text" id="searchText" placeholder="Search" aria-label="Search">
            <button style="background-color: #53FB18; border-color: #53FB18;" class="btn btn-danger" type="submit">BUSCAR</button>
        </form>
        
      </div>
    </nav>
            

        <!-- navbar ends -->


    <div class="container">
      <div id="movies" class="row"></div>
    </div>
    <hr>


    <div class="box">

      <div class="text">
        <h1>Contacta con<span style="color: #53FB18;"> Nosotros</span></h1>
        <style>
                .redline {
          width: 50%; /* Ancho del 50% del contenedor padre */
          height: 2px; /* Grosor de la línea */
          background-color: #53FB18; /* Color verde */
          margin-top: 10px; /* Margen superior para separarla de otros elementos */
          margin-left: auto; /* Centra la línea horizontalmente */
          margin-right: auto;
        }


        </style>
        <div class="redline"></div>
        <p style="color: #53FB18;">JDC-STREAMING</p>
      </div>
    </div>

  
    <div class="touch">
      <h2>OPINIONES</h2>
      <div class="redline"></div>
    </div>
    <div class="container fill">
      <div class="forthis">
      <form action="contactus.php" method="POST" name="contact-form" id="contact-form" onsubmit="return validateForm();">
          <div class="form-row two2">
            <div class="form-group col-md-6 column">
              <input type="text" class="form-control input" id="firstname" name="firstname" placeholder=" " >
              <label for="firstname" class="">First Name</label>
              <div class="underline">
              </div>
            </div>
            <div class="form-group col-md-6 column">
              <input type="text" class="form-control input" id="lastname" name="lastname" placeholder=" " >
              <label for="lastname" class="">Last Name</label>
              <div class="underline"></div>
            </div>
          </div>
          <div class="form-row one1">
            <div class="form-group col-lg-6 column">
              <input type="text" class="form-control input" id="email" name="email" placeholder=" " >
              <label for="email" class="">Email</label>
              <div class="underline"></div>
            </div>
            <div class="form-group col-lg-6 column">
              <input type="text" class="form-control input" id="phone" name="phone"  placeholder=" ">
              <label for="number" class="">Phone Number</label>
              <div class="underline"></div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group column">
              <input type="text" class="form-control input" name="subject" id="subject" placeholder=" " >
              <label for="subject" class="">Subject</label>
              <div class="underline extra"></div>
            </div>
          </div>
          <div class="form-row size">
            <div class="form-group column">
              <textarea type="text" class="form-control input" name="message" id="message" rows="5"  placeholder=" "></textarea>
              <label for="message" class="">Message</label>
              <div class="underline extra gap"></div>
            </div>
          </div>
          <div class="btn-sm">
            <input type="submit" name="send" value="SEND MESSAGE" class="sm-button" id="submit-btn"> 
            <a href="#" onclick="clearFunc()">Reset</a>
          </div>
        </form>
      </div>
    </div>

    <!-- address -->

    <div class="container address">
      <div class="row add-row">
        <div class="col-sm-6">
          <h3>CONTACTANOS</h3>
          <div class="redline"></div>
          <p>JDC-STREAMING</p>
          <p>Daniel luna-Juan Pachajoa-Cristian Ortega
          </p>
          <p>TEL.FIJO - 500029</p>
          <div class="phone-e">
            <p><span class="glyphicon glyphicon-envelope"> </span> JDC-STREAMIG@gmail.com</p>
            <p><span class="glyphicon glyphicon-phone"></span> +91-97427 66666</p>
          </div>
        </div>
        <div class="col-sm-6 map-padd">
          <!-- -map- -->
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3889.019213593812!2d77.62060731482127!3d12.906485990898592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae14eed2a26dbb%3A0x98f64960052a26b0!2sTrainingMug!5e0!3m2!1sen!2sin!4v1504259922701"
            width="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>


    <!-- offcanva JS and footer js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://daniellaharel.com/raindrops/js/raindrops.js"></script>

    <div class="bottom-gap"></div>



    <!-------------------------------Footer-------------------------------->
   <!-------------------------------Footer-------------------------------->
   <footer class="footer">
    <hr class="footer-hr">
    <div class="footer-content">
      <div class="footer-left">
        <a href="home.php" class="rounded-logo">
          <STyle>
            .rounded-logo {
                border-radius: 10px; /* ajusta este valor según el grado de redondez deseado */
                margin: 10px; /* ajusta este valor según el margen deseado */
                background-color: #53FB18; /* color verde especificado */
                display: inline-block; /* para que el enlace ocupe solo el espacio necesario */
          }
          </STyle>
          <img class="footer-logo" src="Images/Logo/TITLE.jpeg" alt="" width="30" height="24">
      </a>
        <p class="footer-bottom-tagline">JDC-STREAMIG</p>
      </div>
      <div class="footer-middle">
        <h2 class="footer-heading">NOSOTROS</h2>
        <ul class="footer-middle-list icons">
          <a class="footer-links" href="https://www.facebook.com/" target="_blank"><i
              class="fab fa-facebook-f facebook" style="color:hwb(116 11% 2%)"></i></a>
          <a class="footer-links" href="https://twitter.com/login?lang=en" target="_blank"><i
              class="fab fa-twitter twitter" style="color:hwb(116 11% 2%)"></i></a>
          <a class="footer-links" href="https://www.instagram.com/" target="_blank"><i
              class="fab fa-instagram instagram" style="color:hwb(116 11% 2%)"></i></a>
        </ul>
      </div>
      <div class="footer-middle">
        <h2 class="footer-heading">SERVICIOS</h2>
        <ul class="footer-middle-list">
          <li class="footer-middle-list-item"><a href="home.php">DISFRUTA DE NUEVO CONTENIDO</a> </li>
          <li class="footer-middle-list-item"><a href="web-series.html">SERIES</a> </li>
          <li class="footer-middle-list-item"><a href="news.html">MUY PRONTO</a> </li>
          <li class="footer-middle-list-item"><a href="premium.php">SERVICO PREMIUM</a> </li>
        </ul>
      </div>
     <div class="footer-middle">
              <h2 class="footer-heading">APPS</h2>
              <ul class="footer-middle-list icons">
                  <a class="footer-links" href="#"><i class="fab fa-google-play" style="color:#53FB18"></i></a>
                  <a class="footer-links" href="#"><i class="fab fa-app-store-ios" style="color:#53FB18"></i></a>
              </ul>
          </div>
      <div class="footer-right">
        <p class="footer-links">
        <h2 class="footer-heading">CONTACTANOS</h2>
        <a style="color: #53FB18;" class="footer-contact-button" href="contactus.php">Contact</a>
        </p>
      </div>
    </div>
    <hr class="footer-hr">
    <div style="color: #53FB18;" class="footer-copyright">
        <script>
          
        </script>JDC-STREAMIG 
      </p>
    </div>
  </footer>

    <!--------------scrool to top button-->
    <button id="scrollToTopButton" title="Go to top" class="ml-5">
      <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </button>
    <script>
      $(document).ready(function () {
        var scrollTopButton = document.getElementById("scrollToTopButton");
        window.onscroll = function () {
          scrollFunction()
        };

        function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollTopButton.style.display = "block";
          } else {
            scrollTopButton.style.display = "none";
          }
        }
        $("#scrollToTopButton").click(function () {
          $('html ,body').animate({
            scrollTop: 0
          }, 800)
        });
      });
    </script>
    <!-- offcanva JS and footer js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://daniellaharel.com/raindrops/js/raindrops.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/main-min.js"></script>

    <script> jQuery('#waterdrop').raindrops({ color: '#292c2f', canvasHeight: 150, density: 0.1, frequency: 20 });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
      crossorigin="anonymous"></script>
    <script src="./static/script.js"></script>

    <script>
      function logout(){
        window.location.replace("login.html");
      }
    </script>

    <script type="text/javascript">

    function validateForm(){
      const firstname = document.getElementById("firstname");
      const lastname = document.getElementById("lastname");
      const email = document.getElementById("email");
      const phone = document.getElementById("phone");
      const subject = document.getElementById("subject");
      const message = document.getElementById("message");
      let alphabets = /^[A-Za-z]+$/ ; 
      if (firstname.value.trim().length === 0 && lastname.value.trim().length === 0 && email.value.trim().length === 0 && phone.value.trim().length === 0 && subject.value.trim().length === 0 && message.value.trim().length === 0  ){
       swal("Oops..." , "Please! Enter the credentials first ." , "error"); 
        return false ; 
      }
      if (firstname.value.trim().length === 0 ) {
        swal("Oops..." , "Please! Enter your first name ." , "error"); 
        return false ; 
      }
      if (!firstname.value.trim().match(alphabets) ){
        swal("Oops..." , "Please! Enter a valid first name." , "error"); 
        return false; 
      }
      if(lastname.value.trim().length > 0 ) {
        if (!lastname.value.trim().match(alphabets) ){
        swal("Oops..." , "Please! Enter a valid last name." , "error"); 
        return false; 
        }
      }
      if (email.value.trim().length === 0 ) {
        swal("Oops..." , "Please! Enter your email address." , "error"); 
        return false ; 
      }
      if (!email.value.trim().includes("@gmail.com")) {
        swal("Oops..." , "Please! Enter a valid email address." , "error"); 
        return false ; 
      }
      if ( phone.value.trim().length != 10 ||  isNaN(phone.value.trim()) ) {
        swal("Oops..." , "Phone number should be 10 digits. " , "error"); 
        return false ; 
      }
      if (subject.value.trim().length === 0 ) {
        swal("Oops..." , "Please! Enter the subject." , "error"); 
        return false ; 
      }
      if (message.value.trim().length === 0 ) {
        swal("Oops..." , "Please! Enter the message." , "error"); 
        return false ; 
      }
      swal("Congrats!", "Message was delivered successfully! Thanks for your Submission", "success");
      return true ; 
    }

    document.getElementById("submit-btn").addEventListener("click" , validateForm);

      function clearFunc() {
        document.getElementById("firstname").value = "";
        document.getElementById("lastname").value = "";
        document.getElementById("email").value = "";
        document.getElementById("phone").value = "";
        document.getElementById("subject").value = "";
        document.getElementById("message").value = "";
      }

    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>

</html>
