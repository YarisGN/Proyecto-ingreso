<!-- incluir otro archivo php -->
<?php 
    include ('../includes/conexion.php'); 
    include ('comunes/navbar.php');
    include ('../comunes/alerta.php');
?>
<!-- fin incluir otro archivo php -->

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

<!-- capturar la fecha y hora -->
<?php
    date_default_timezone_set('America/Bogota');
    $fecha_actual=date("d-m-Y H:i:s")
    ?>
<!-- fin capturar la fecha y hora -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Usuarios</title>
    <link rel="shortcut icon" href="../img/logoSena.png" type="image/x-icon">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- cdn icnonos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
    <!-- ingresar nuevas personas -->
    <div class="container">
        <h1 class="text-center">Registro Usuarios</h1>
        <div class="card">
            <div style="background: #669900;" class="card-header text-white">
                Formulariuo de Registro
            </div>
            <div class="card-body">
                <form action="../crud/registrar.php" method="post"> 
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Nombre:</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Apellido:</label>
                                <input class="form-control" type="text" name="apellido" id="apellido" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Documento:</label>
                                <input class="form-control" type="number" name="documento" id="documento" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Tipo Documento:</label>
                                <select class="form-control" name="tipo_documento" id="tipo_documento" required>
                                    <option value="">Seleccione</option>
                                   
                                        <?php 
                                        $consulta_sub_item = "SELECT * FROM sub_item
                                        WHERE id_item = 2;";
                                        $query_sub_item = mysqli_query($conexion,$consulta_sub_item);
                                            while ($row = mysqli_fetch_array($query_sub_item)) {
                                                echo "<option value=".$row['id_sub_item'].">".$row['descripcion']."</option>";
                                            }
                                        ?>
                                    
                                </select>
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Correo:</label>
                                <input class="form-control" type="email" name="correo" id="correo" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Teléfono:</label>
                                <input class="form-control" type="number" name="telefono" id="telefono" required>
                            </div>
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Objeto:</label>
                                <input class="form-control" type="text" name="objeto" id="objeto">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Observacion:</label>
                                <textarea class="form-control" name="observacion" id="observacion" cols="10" rows="1"></textarea>
                            </div>
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Rol:</label>
                                <select class="form-control" name="rol" id="rol" required>
                                    <option value="">Seleccione</option>
                                   
                                        <?php 
                                        $consulta_sub_item = "SELECT * FROM sub_item
                                        WHERE id_item = 1;";
                                        $query_sub_item = mysqli_query($conexion,$consulta_sub_item);
                                            while ($row = mysqli_fetch_array($query_sub_item)) {
                                                echo "<option value=".$row['id_sub_item'].">".$row['descripcion']."</option>";
                                            }
                                        ?>
                
                                </select>
                            </div>
                        </div> 
                        <div class="col-lg-6">
                            <div class="form-group">
                                <br>
                                <button style="background: #669900;" class="btn text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Digite Usuario" type="submit">Enviar</button>
                            </div>
                        </div>
                    </div>
    
                    <br> 
                </form>
            </div>
        </div>
    </div>
    <!-- fin ingresar nuevas personas -->

        <!-- tabla de registros de personas -->
        <br><br>
        <div class="container-fluid">
            <h2 class="text-center">Registros</h2>
            <br><br>
            <?php $consulta = "SELECT * FROM personas 
                LEFT JOIN detalles ON personas.id_persona = detalles.id_persona;";
                include ('../comunes/usuarios.php');
            ?>
        </div>
        <!-- fin tabla de registros de personas -->
    
    

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