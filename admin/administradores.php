<!-- incluir otro php -->
<?php 
    include ('../includes/conexion.php'); 
    include ('comunes/navbar.php');
    include ('../comunes/alerta.php')
?>
<!-- fin incluir otro php -->

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

<!-- consulta -->
<?php
    include("../comunes/conexion.php");

    $sql="SELECT * FROM personas";
    $query=mysqli_query($conn,$sql);

    $row=mysqli_fetch_array($query);
?>
<!-- fin consulta -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="shortcut icon" href="../img/logoSena.png" type="image/x-icon">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- cdn icnonos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body> 

<!-- ingresar datos vigilante -->
<div class="container-fluid">
    <div class="mt-4">
        <h1 class="text-center">Registro</h1>
        <div class="card">
            <div style="background: #669900;" class="card-header text-white">
                Formulariuo de Registro
            </div>
            <div class="card-body">
                <form action="../crud/registrar_a.php" method="post"> 
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
                                <input class="form-control" type="text" name="correo" id="correo" required>
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
                                <label for="">Contraseña:</label>
                                <input class="form-control" type="password" name="pass" id="pass" pattern="[a-zA-Z0-9+*]{6,15}" title="Una contraseña válida debe estar compuesta por letras y/o números y tener una longitud entre 6 y 15 caracteres" required>
                                <input type="checkbox" onclick="Toggle()">
                                <b>Mostrar contraseña</b>
                                
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
    <!-- fin ingresar datos vigilante -->
    
    <!-- tabla registros de vigilantes -->
    <h1 class="text-center">Registros</h1>
    <br><br>
    <?php 
    
    $consulta = "SELECT * FROM personas WHERE rol = 17 or rol = 18";
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
                            <th>Rol</th>
                            <th>Cambiar contraseña</th>
                            <th>Eliminar</th>
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
                            <td class="text-center"><a class="text-success" href="contraseña.php?persona=<?php echo $registros['pass']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                            <td class="text-center"><a onclick="return confirm('Estas seguro de eliminar a: <?php echo $registros['nombre']; ?>');" class="text-danger" href="../crud/eliminar.php?persona=<?php echo $registros['pass']; ?>"><i class="bi-trash-fill"></i></a></td>
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
    <!-- fin tabla registros de vigilantes -->
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

<!-- ver contraseña -->
<script>
    // Change the type of input to password or text
    function Toggle() {
        var temp = document.getElementById("pass");
        if (temp.type === "password") {
            temp.type = "text";
        }
        else {
            temp.type = "password";
        }
    }
</script>
<!-- fin ver contraseña -->

</body>
</html>

