<?php
    print_r($_POST);
    if(!isset($_POST['id_persona'])){
        header('Location: ../admin/perfil.php?mensaje=error');
    }

    include('conexion.php');
    include('../comunes/alerta.php');
    $id = $_POST['id_persona'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $editar = $bd->prepare("UPDATE personas
    SET personas.documento = :documento, personas.nombre = :nombre, personas.apellido = :apellido, personas.telefono = :telefono, personas.correo = :correo,
    WHERE personas.id_persona = :id");

    $resultado = $editar->execute(
        [
            'id' => $id,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'telefono' => $telefono,
            'correo' => $correo,
        ]
    );
if($rol == "Administrador"){
    if($resultado){ 
        header('Location: ../admin/perfil.php?mensaje=editado');
    }else{
        header('Location: ../admin/perfil.php?mensaje=error');
        exit();
    }
}else{
    if($resultado){ 
        header('Location: ../user/perfil.php?mensaje=editado');
    }else{
        header('Location: ../user/perfil.php?mensaje=error');
        exit();
    }
}
?>


