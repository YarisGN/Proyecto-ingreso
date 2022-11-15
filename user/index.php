<!-- incluir otro archivo php -->
<?php 
    include ('../includes/conexion.php'); 
    include ('comunes/navbar.php');
?>
<!-- fin incluir otro archivo php -->
<!-- cerrar -->
<?php
  session_start();
  if(isset($_SESSION['nombredelusuario'])){
      $usuarioingresado = $_SESSION['nombredelusuario'];
  }
  else{
      header('location: ../index.php');
  }

  if(($_SESSION['rol'] == 18)){}
  else{
      header('location: ../admin');
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

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <title>Home</title>
  <link rel="shortcut icon" href="../img/logoSena.png" type="image/x-icon">
</head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,256L60,256C120,256,240,256,360,224C480,192,600,128,720,90.7C840,53,960,43,1080,53.3C1200,64,1320,96,1380,112L1440,128L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>

    <!-- bienvenida con el nombre de usuario que ingreso -->
    <?php
        echo"<h3 class='bien navbar-brand'>Welcome: $usuarioingresado</h3>";
    ?>
    <!-- fin bienvenida con el nombre de usuario que ingreso -->

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,256L60,256C120,256,240,256,360,224C480,192,600,128,720,90.7C840,53,960,43,1080,53.3C1200,64,1320,96,1380,112L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>

  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  
</body>
</html>