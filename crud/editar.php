<?php 
    include ('../includes/conexion.php'); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="shortcut icon" href="../img/logoSena.png" type="image/x-icon">
    <!-- cdn icnonos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
<?php

$id = $_GET['persona'];

$paginaAnterior = $_SERVER["HTTP_REFERER"];

$consulta = "SELECT *, personas.id_persona AS codigo FROM personas 
            LEFT JOIN detalles ON personas.id_persona = detalles.id_persona
            WHERE personas.id_persona = $id;
";
    ?>
    <?php
        $query = mysqli_query($conexion, $consulta);
        $num_registros = mysqli_num_rows($query);
        if ($num_registros>0) {?>
                        <?php   
                        $cont = 0; while ($registros = mysqli_fetch_array($query)){ $cont++; 
                        $cont; 
                        $registros['codigo'];
                        $documento = $registros['documento'];
                        $nombre = $registros['nombre'];
                        $apellido = $registros['apellido'];
                        $telefono = $registros['telefono'];
                        $correo = $registros['correo'];

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
                        $rol;
                        $objeto = $registros['objeto'];
                        $observacion = $registros['observacion'];
                        }

                    }else{
                            echo "<h3 class='text-center'>No Se Encuentran Registros</h3>";
                    }
    ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $paginaAnterior;?> ">Atr&aacute;s</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $nombre." ".$apellido; ?> </li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasLabel">Editar datos:</h5> 
                    </div>
                    <form class="p-4" method="POST" action="editarProceso.php">
                        <div class="mb-3">
                            <label class="form-label">Documento: </label>
                            <input type="text" class="form-control" name="documento" required 
                            value="<?php echo $documento; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nombre: </label>
                            <input type="text" class="form-control" name="nombre" required 
                            value="<?php echo $nombre; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Apellido: </label>
                            <input type="text" class="form-control" name="apellido" required 
                            value="<?php echo $apellido; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telefono: </label>
                            <input type="number" class="form-control" name="telefono" required 
                            value="<?php echo $telefono; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Correo: </label>
                            <input type="text" class="form-control" name="correo" required 
                            value="<?php echo $correo; ?>">
                        </div>
                        <div class="mb-3">
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
                        <div class="mb-3">
                            <label class="form-label">Objeto: </label>
                            <textarea type="text" class="form-control" name="objeto" required><?php echo $objeto; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Observacion: </label>
                            <textarea type="text" class="form-control" name="observacion" required><?php echo $observacion; ?></textarea>
                        </div>
                        <div class="d-grid">
                            <input type="hidden" name="id_persona" value="<?php echo $id ?>">
                            <input type="submit" class="btn btn-primary" value="Editar">
                        </div>
                    </form>    
                </div>
            </div>
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



