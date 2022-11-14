<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Login</title>
    <link rel="shortcut icon" href="img/logoSena.png" type="image/x-icon">
</head>
<body class="p-3 mb-2 bg-light text-dark">
    <!-- ==//==//==//==//==//== LOGIN  ==//==//==//==//==//== -->
    <div class="container mt-5 shadow p-3 mb-5 bg-body rounded">
        <div class="card border border-dark">
            <div class="card-body">
                <div class="row ">
                    <div class="col-lg-12 px-4">
                        <div>
                            <img class="p-2" src="img/logoInicio.png" width="130" alt="">
                        </div>
                        <hr>
                        <form class="px-5 py-2" action="" method="post">
                            <div class="mb-3">
                                <label for="exampleInputUser1" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="exampleInputUser1" name="documento" placeholder="Usuario / Documento" pattern="^[a-zA-Z0-9-_\.]{3,15}$" title="Un usuario apropiado debe comenzar con letra, contener letras, números, guiones bajos y puntos, y tener entre 3 y 15 caracteres de longitud" required>
                            </div>
                            <br>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                <input type="password" id="pass" class="form-control" id="exampleInputPassword1" name="pass" placeholder="Contraseña" pattern="[a-zA-Z0-9+*]{6,15}" title="Una contraseña válida debe estar compuesta por letras y/o números y tener una longitud entre 6 y 15 caracteres" required>
                                
                                <input type="checkbox" onclick="Toggle()">
                                <b>Mostrar contraseña</b>
                                <a class="nav-link text-muted" href="olvidepass.php">Olvidé mi contraseña</a>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" style="background: #669900;" class="btn text-white" name="btningresar">Ingresar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==//==//==//==//==//== FIN LOGIN  ==//==//==//==//==//== -->

    <?php
    session_start();
    if(isset($_POST['btningresar'])) {
        require ('comunes/conexion.php');

        $documento=$_POST['documento'];
        $pass=$_POST['pass'];
    
        $consulta = "Select * from personas 
        where documento ='$documento'";
        $query = mysqli_query($conn,$consulta);
        $nr=mysqli_num_rows($query);
        
        if ($nr>0){
            if($row=mysqli_fetch_array($query)){
                $rol = $row['rol'];
                $nombre = $row['nombre'];
                $apellido = $row['apellido'];
                $pass2 = $row['pass'];
                $_SESSION['nombre'] = $nombre;
                $_SESSION['apellido'] = $apellido;
                $_SESSION['rol'] = $rol;
            }
            
            if (password_verify($pass, $pass2)){
                if(!isset($_SESSION['nombredelusuario'])){
                    $_SESSION['nombredelusuario']=$nombre;
                    if ($rol == 18){
                        header("location: user/");
                    }
                    if ($rol == 17){
                        header("location: admin/");
                    }
                }
            }
            else{
                echo "<script>alert('Usuario no existe');window.location= 'index.php'</script>";
            }
        }
    }
    ?>

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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>