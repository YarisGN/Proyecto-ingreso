<!-- incluir otro php -->
<?php 
    include ('../includes/conexion.php'); 
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
    <title>Cambiar contraseña</title>

    <link rel="shortcut icon" href="../img/logoSena.png" type="image/x-icon">
    
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" 	type="text/css" media="all">
</head>
<body>
    <?php

        $id = $_GET['persona'];

        $paginaAnterior = $_SERVER["HTTP_REFERER"];

        $consulta = "SELECT * FROM personas WHERE rol = 18";
    ?>
    <?php
        $query = mysqli_query($conexion, $consulta);
        $num_registros = mysqli_num_rows($query);
        if ($num_registros>0) {
    ?>
    <?php   
        $cont = 0; while ($registros = mysqli_fetch_array($query)){ $cont++; 
        $cont; 
        $pass = $registros['pass'];
        }}
    ?>

    <!-- cambiar contraseña -->
    <?php
        if(isset($_POST['editar'])){
            require "../comunes/conexion.php";

            $passActual = $mysqli->real_escape_string($_POST['passActual']);
            $pass1 = $mysqli->real_escape_string($_POST['pass1']);
            $pass2 = $mysqli->real_escape_string($_POST['pass2']);

            $passActual = md5($passActual);
            $pass1 = md5($pass1);
            $pass2 = md5($pass2);

            $sqlA= $mysqli->query("SELECT pass FROM personas WHERE id_persona = '".$_SESSION['id_persona']."'");
            $rowA = $sqlA->fetch_array();

            if($rowA['passActual'] == $passActual){

                if($pass1 == $pass2){
                    $update = $mysqli->query("UPDATE personas SET pass = $pass1 WHERE id_persona = '".$SESSION['id_persona']."'");
                    if($update) {echo "Se ha actualizado tu comtraseña";}
                }
                else{
                    echo "Las dos contraseñas no coinciden";
                }
            }
            else{
                echo "Tu contraseña actual no coincide";
            }
        }
    ?>
    <!-- fin cambiar contraseña -->
      
    <!-- formulario para cambiar contraseña -->
    <div class="container mt-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $paginaAnterior;?> ">Atr&aacute;s</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">echo $pass." "." ";  </li> -->
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasLabel">Cambiar contraseña:</h5> 
                    </div>
                    <form class="p-4" method="POST" action="administradores.php">
                        <div class="mb-3">
                            <label class="form-label">Contraseña actual: </label>
                            <input type="password" name="passActual" id="pass" class="form-control" name="passActual" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nueva contraseña: </label>
                            <input type="password" name="pass1" id="pass" class="form-control" name="pass1" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirmar contraseña: </label>
                            <input type="password" name="pass2" id="pass" class="form-control" name="pass2" required>
                        </div>
                        <div class="d-grid">
                            <input type="hidden" name="id_persona" value="<?php $registros['id_persona']; ?>">
                            <input type="submit" class="btn btn-primary" value="Editar">
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>
    <!-- fin formulario para cambiar contraseña -->   

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../js/demo/datatables-demo.js"></script>
</body>
</html>