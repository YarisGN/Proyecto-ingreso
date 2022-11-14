<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer contraseña</title>

    <link rel="shortcut icon" href="img/logoSena.png" type="image/x-icon">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" 	type="text/css" media="all">

</head>
<body>
<?php
$paginaAnterior = $_SERVER["HTTP_REFERER"];
?>
    
<!-- formulario para restablecer contraseña -->
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
                <h5 class="offcanvas-title" id="offcanvasLabel">Restablecer contraseña:</h5> 
            </div>
            <form class="p-4" method="POST" action="restablecer/restablecer.php">
                <div class="mb-3">
                    <label for="c" class="form-label">Email: </label>
                    <input type="email" name="email" id="c" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Restablecer</button>
                </div>
            </form> 
        </div>
    </div>
</div>
</div>
<!-- fin formulario para restablecer contraseña -->

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