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
    <title>Usuarios</title>
    <link rel="shortcut icon" href="img/logoSena.png" type="image/x-icon">
    
    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- cdn icnonos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <!--Cargando-->
        <div class="cargando row">       
            <div class="d-flex justify-content-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
            </div>
        </div>
        <!--Fin Cargando-->
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
                                <label for="">Documento:</label>
                                <input class="form-control" type="number" name="documento" id="documento" required onblur="buscar_datos();">
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
                                <input class="form-control" type="text" name="objeto" id="objeto" required>
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
                                <button name="fecha_actual" style="background: #669900;" class="btn text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Digite Usuario" type="submit">Enviar</button>
                            </div>
                        </div>
                    </div>
                    <br> 
                </form>
            </div>
        </div>
    </div>

    <br><br>
    <div class="accordion container-fluid pb-4" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Usuarios pendientes
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    
                <?php $consulta = "SELECT * FROM personas 
                    LEFT JOIN detalles ON personas.id_persona = detalles.id_persona WHERE rol = 1 or rol = 2;";
                    include ('../comunes/usuarios.php'); 
                ?>

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


<script type="text/javascript">
  $(document).ready(function(){
        $('.cargando').hide();
      });  

  function buscar_datos()
  {
    documento = $("#documento").documento();
    
    
    var parametros = 
    {
      "buscar": "1",
      "documento" : documento
    };
    $.ajax(
    {
      data:  parametros,
      dataType: 'json',
      url:   '../codigos_php.php',
      type:  'post',
      beforeSend: function() 
      {
        $('.formulario').hide();
        $('.cargando').show();
        
      }, 
      error: function()
      {alert("Error");},
      complete: function() 
      {
        $('.formulario').show();
        $('.cargando').hide();
       
      },
      success:  function (valores) 
      {
        if(valores.existe=="1") //Aqui usamos la variable que NO use en el vídeo
        {
          $("#nombre").val(valores.nombre);
          $("#apellido").val(valores.apellido);
          $("#correo").val(valores.correo);
          $("#telefono").val(valores.telefono);
        }
        else
        {
          alert("El propietario no existe, ¡Crealo!")
        }

      }
    }) 
  }

  function limpiar()
  {
    $("#documento").val("");
    $("#nombre").val("");
    $("#apellido").val("");
    $("#correo").val("");
    $("#telefono").val("");
  }

  function guardar()
  {
    var parametros = 
    {
      "guardar": "1",
      "documento" : $("#documento").val(),
      "nombre" : $("#nombre").val(),
      "apellido" : $("#apellido").val(),
      "correo" : $("#correo").val(),
      "telefono" : $("#telefono").val(),
    };
    $.ajax(
    {
      data:  parametros,
      url:   '../comunes/codigos_php.php',
      type:  'post',
      beforeSend: function() 
      {
        $('.formulario').hide();
        $('.cargando').show();
        
      }, 
      error: function()
      {alert("Error");},
      complete: function() 
      {
        $('.formulario').show();
        $('.cargando').hide();
       
      },
      success:  function (mensaje) 
      {$('.resultados').html(mensaje);}
    }) 
    limpiar();
  }
</script>