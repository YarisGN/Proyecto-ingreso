<!-- incluir otro archivo php -->
<?php 
    include ('../includes/conexion.php'); 
    include ('comunes/navbar.php');
    include ('../comunes/alerta.php')
?>
<!-- fin incluir otro archivo php -->
<!-- cerrar -->
<?php
    
    $paginaAnterior = $_SERVER["HTTP_REFERER"];
    session_start();
    if(isset($_SESSION['nombredelusuario']))
        {
            $nmb = $_SESSION['documento'];
            $usuarioingresado = $_SESSION['nombredelusuario'];
        }
        else
        {
            header('location: index.php');
        }

        if(($_SESSION['rol'] == 18)){}
        else{
            header('location: ../admin');
        }

        if(isset($_POST['btncerrar']))
        {
            session_destroy();
            header('location: ../index.php');
        }
?>
<!-- fin cerrar -->
<?php
	$consulta = "SELECT * FROM personas WHERE documento = $nmb";
?>
<?php
    $query = mysqli_query($conexion, $consulta);
    $num_registros = mysqli_num_rows($query);
    if ($num_registros>0) {?>
        <?php   
        $cont = 0; while ($registros = mysqli_fetch_array($query)){ $cont++; 
        $cont; 
        $nombre = $registros['nombre'];
        $apellido = $registros['apellido'];
        $telefono = $registros['telefono'];
        $correo = $registros['correo'];
        }

    }else{
            echo "<h3 class='text-center'>No Se Encuentran Registros</h3>";
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- cdn icnonos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $paginaAnterior;?> ">Atr&aacute;s</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $nombre." ".$apellido; ?> </li>
            </ol>
        </nav>
        <div class="car">
            <div class="car-header p-2 text">
                <h1>Perfil</h1>
            </div>
        </div>
            <form method="POST" action="../crud/editarPerfil.php">
                <div class="car-body">
                    <div class="row">
                        <div class="col-lg6">
                            <table class="table table-condensed">
                                <tbody>
                                    <tr>
                                        <td class='col-md-3'>Nombre:</td>
                                        <td>
                                            <input type="text" class="form-control input-sm" name="nombre" value="<?php echo $nombre; ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Apellido::</td>
                                        <td>
                                            <input type="text" class="form-control input-sm" name="apellido" value="<?php echo $apellido; ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Telefono:</td>
                                        <td>
                                            <input type="number" class="form-control input-sm" required name="telefono" value="<?php echo $telefono; ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Correo electrónico:</td>
                                        <td>
                                            <input type="email" class="form-control input-sm" name="correo" value="<?php echo $correo; ?>" required>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>Nueva contraseña:</td>
                                        <td>
                                            <input type="password" class="form-control input-sm" name="passn">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Confirmar nueva contraseña:</td>
                                        <td>
                                            <input type="password" class="form-control input-sm" name="passn">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Contraseña actual:</td>
                                        <td>
                                            <input type="password" class="form-control input-sm" name="correo" title="Debe ingresar su contraseña actual para actualizar sus datos." required>
                                        </td>
                                    </tr>
                                </tbody>
                            </table> 
                            <div class="panel-footer text-center">
                                <input type="submit" class="btn btn-sm btn-primary glyphicon glyphicon-refresh" value="Actualizar perfil">
                            </div>
                        </div> 
                    </div>
                </div>
            </form>
        </div>
    </div>
    

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