<!-- incluir otro archivo php -->
<?php 
    include ('../includes/conexion.php'); 
    include ('comunes/navbar.php');
    include ('../comunes/alerta.php')
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
<?php
    include ('../includes/conexion.php');
    $consulta = "SELECT *, personas.id_persona AS id FROM salida 
    LEFT JOIN personas ON personas.documento = salida.documento;";
?>
<!-- capturar fecha y hora -->
<?php
    date_default_timezone_set('America/Bogota');
    $fecha_actual=date("d-m-Y H:i:s")
?>
<!-- fin capturar fecha y hora -->
   
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Salida</title>
    <link rel="shortcut icon" href="../img/logoSena.png" type="image/x-icon">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- cdn icnonos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
<div class="container">
        <h1 class="text-center">Elementos de salida</h1>
        <div class="card">
            <div style="background: #669900;" class="card-header text-white">
                Formulario
            </div>
            <div class="card-body">
                <form action="../crud/rsalida.php" method="post"> 
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Documento:</label>
                                <input class="form-control" type="number" name="documento" id="documento" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Descripcion:</label>
                                <input class="form-control" type="text" name="descripcion" id="descripcion" required>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Placa:</label>
                                <input class="form-control" type="text" name="placa" id="placa" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Serial:</label>
                                <input class="form-control" type="number" name="serial" id="serial" required>
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Cantidad:</label>
                                <input class="form-control" type="text" name="cantidad" id="cantidad" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Precio:</label>
                                <input class="form-control" type="number" name="precio" id="precio" required>
                            </div>
                        </div> 
                    </div>
                    <div class="row">
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
</div>

<div class="container-fluid">
    <h1 class="text-center">Registros</h1>
    <br><br> 
    <?php
        $query = mysqli_query($conexion, $consulta);
        $num_registros = mysqli_num_rows($query);

        if ($num_registros>0) 
        {
    ?>
    <div class="row">
        <div class="table-responsive">
            <table border="1" id="dataTable" class="table table-bordered dataTable" width="100%" cellspacing="0">
                <thead class="text-dark">
                    <tr role="row">
                        <th>#</th>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Descripcion</th>
                        <th>Placa</th>
                        <th>Serial</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th></th>
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
                        <td><?php echo utf8_encode($registros['descripcion']);?></td>
                        <td><?php echo utf8_encode($registros['placa']);?></td>
                        <td><?php echo $registros['serial'];?></td>
                        <td><?php echo utf8_encode($registros['cantidad']);?></td>
                        <td><?php echo utf8_encode($registros['precio']);?></td>
                        <td><a class="text-success" href="../crud/editar.php?persona=<?php echo $registros['id']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                    </tr>
                        
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
    <br><br>
                
    <?php 
    }else{
            echo "<h3 class='text-center'>No Se Encuentran Registros</h3>";
        }
    ?>
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