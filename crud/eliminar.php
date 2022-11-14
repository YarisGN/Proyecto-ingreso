

<?php 
    if(!isset($_GET['persona'])){
        header('Location: ../admin/registros.php?mensaje=error');
        exit();
    }

    include_once '../includes/conexion.php';
    include_once 'conexion.php';
    $id = $_GET['persona'];

    $sentencia = $conexion->prepare("DELETE FROM personas WHERE id_persona = $id;");
    $resultado = $sentencia->execute();

    $_SESSION['rol'] = $rol;

    if($rol == 17){
        if($resultado){ 
            header('Location: ../admin/registros.php?mensaje=eliminado');
        }else{
            header('Location: ../admin/registros.php?mensaje=error');
            exit();
        }
    }else{
        if($resultado){ 
            header('Location: ../user/registros.php?mensaje=eliminado');
        }else{
            header('Location: ../user/registros.php?mensaje=error');
            exit();
        }
    }
    ?>