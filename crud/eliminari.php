
<?php 
    if(!isset($_GET['persona'])){
        header('Location: ../user/usuarios.php?mensaje=error');
        exit();
    }

    include_once '../includes/conexion.php';
    include_once 'conexion.php';
    $id = $_GET['persona'];

    $sentencia = $conexion->prepare("DELETE FROM personas WHERE id_persona = $id;");
    $resultado = $sentencia->execute();

        if($resultado){ 
            header('Location: ../user/usuarios.php?mensaje=eliminado');
        }else{
            header('Location: ../user/usuarios.php?mensaje=error');
            exit();
        }
?>