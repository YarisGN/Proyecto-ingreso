<!-- cdn icnonos-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<?php
    $query = mysqli_query($conexion, $consulta);
    $personas = mysqli_num_rows($query);

    if ($personas>0) {?>

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
                        <th>Salida</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                   
                    <?php   
                    $cont = 0; while ($registros = mysqli_fetch_array($query)){ $cont++; ?>
                    <tr>
                        <td><?php echo $cont; ?></td>
                        <?php $registros['id_persona'];?>
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
                        <td name="fecha_actual"><a href="../crud/.php?persona=<?php echo $registros['id_persona']; ?>"><i class="bi-check-lg pl-5"></i></a></td>

                        <td class="text-center"><a onclick="return confirm('Estas seguro de eliminar a: <?php echo $registros['nombre']; ?>');" class="text-danger" href="../crud/eliminari.php?persona=<?php echo $registros['id_persona']; ?>"><i class="bi-trash-fill"></i></a></td>           
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
