<!-- incluir otro php -->
<?php 
    include ('../includes/conexion.php'); 
    include ('comunes/navbar.php');
?>
<!-- fin incluir otro php -->
<!-- cerrar --> 
<?php
session_start();
if(isset($_SESSION['nombredelusuario'])){
    $usuarioingresado = $_SESSION['nombredelusuario'];
}
else{
    header('location: ../index.php');
}

if(($_SESSION['rol'] == 17)){}
else{
    header('location: ../user');
}

if(isset($_POST['btncerrar'])){
    session_destroy();
    header('location: ../index.php');
}
?>
<!-- fin cerrar --> 

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <title>Home</title>
  <link rel="shortcut icon" href="../img/logoSena.png" type="image/x-icon">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" media="screen" href="../css/style.css">

    <style>
        .sena-sede-tic{
            opacity: 30%;
            background-image: url(../img/sena-sede-tic.jpg);
        }
        hr{
            color: royalblue;
        }
    </style>
</head>
<body>
    <div class="text-center">
        <!-- <img width="35%" class="sena-sede-tic" src="../img/sena-sede-tic.jpg" alt=""> -->

            <!-- bienvenida con el nombre de usuario que ingreso -->
            <?php
                echo"<h2 class=''>Welcome: $usuarioingresado</h2>";
            ?>
            <!-- fin bienvenida con el nombre de usuario que ingreso -->
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="lg-6">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut nulla fugiat quas odit blanditiis consequuntur omnis neque magnam officia aut illo officiis, a enim voluptatum eligendi obcaecati, quisquam non. Placeat?
                </p>
            </div>
            <div class="lg-6">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut nulla fugiat quas odit blanditiis consequuntur omnis neque magnam officia aut illo officiis, a enim voluptatum eligendi obcaecati, quisquam non. Placeat?
                </p>
            </div>
        </div>
    </div>
<br><br><br><br><br><br><br><br><br><br>
<hr>
    <footer>
        <div class="text-center">
            <a class="p-1" href=""><img width="2%" src="../img/icono_face.png" alt="facebook"></a> 
            <a class="p-1" href=""><img width="2%" src="../img/icono-twitter.png" alt="twitter"></a> 
            <a class="p-1" href=""><img width="2%" src="../img/icono-instagram.png" alt="instagram"></a> 
        </div>
        <div class="nav justify-content-center">
            <a class="nav-link p-2" href="https://github.com/YarisGN"><h6>@YarisGN</h6></a>
            <a  class="nav-link p-2" href="https://github.com/Shein0425"><h6>@Shein0425</h6></a>
        </div>
    </footer>
    

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
  
</body>
</html>