<!-- incluir otro archivo php -->
<?php 
    include ('../includes/conexion.php'); 
    include ('comunes/navbar.php');
    include ('../comunes/alerta.php');
?>
<!-- fin incluir otro archivo php -->

<!-- consulta -->
<?php
    include_once "../crud/conexion.php";
    $sentencia = $bd -> query("select * from personas");
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona);
?>
<!-- fin incluir otro php y consulta -->

<!-- cerrar -->
<?php
session_start();
if(isset($_SESSION['nombredelusuario'])){
    $usuarioingresado = $_SESSION['nombredelusuario'];
}
else{
    header('location: index.php');
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
    <title>Historial</title>
    <link rel="shortcut icon" href="../img/logoSena.png" type="image/x-icon">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- cdn icnonos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>

<!-- tabla de registros de todas las personas -->
<div class="container-fluid">
    <h1 class="text-center">Historial</h1>
    <br><br>
    <?php 
        $consulta = "SELECT *, personas.id_persona AS id FROM personas 
        LEFT JOIN detalles ON personas.id_persona = detalles.id_persona;";
    ?>

    <?php
        $query = mysqli_query($conexion, $consulta);
        $num_registros = mysqli_num_rows($query);

        if ($num_registros>0) {?>

            <div class="row">
                <div class="table-responsive">
                    <table border="1" id="dataTable" class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead class="text-dark">
                        <tr role="row">
                            <th>#</th>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th>Objeto</th>
                            <th>Observacion</th>
                            <th>Entrada</th>
                            <th>Salida</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php   
                                $cont = 0; while ($registros = mysqli_fetch_array($query)){ $cont++; ?>
                            <tr>
                                <td><?php echo $cont; ?></td>
                                <td><?php echo $registros['documento'];?></td>
                                <td><?php echo utf8_encode($registros['nombre']);?></td>
                                <td><?php echo utf8_encode($registros['apellido']);?></td>
                                <td><?php echo $registros['telefono'];?></td>
                                <td><?php echo utf8_encode($registros['correo']);?></td>
                                <td><?php 
                                if ($registros['rol'] == 1){
                                    $rol = "Aprendiz";
                                }   
                                else if ($registros['rol'] == 2){
                                    $rol = "Instructor";
                                }   
                                else if ($registros['rol'] == 17){
                                    $rol = "Administrador";
                                }   
                                else if ($registros['rol'] == 18){
                                    $rol = "Vigilante";
                                } 
                                else{
                                    $rol = "Desconocido";
                                } 
                                
                                echo utf8_encode($rol);?></td>
                                <td><?php echo utf8_encode($registros['objeto']);?></td>
                                <td><?php echo utf8_encode($registros['observacion']);?></td>
                                <td><?php echo utf8_encode($registros['entrada']);?></td>
                                <td><?php echo utf8_encode($registros['salida']);?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br><br>
                
        <?php }else{
            echo "<h3 class='text-center'>No Se Encuentran Registros</h3>";
        }
    ?>
</div>
<!-- fin tabla de registros de todas las personas -->

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