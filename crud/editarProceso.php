<?php
    print_r($_POST);
    if(!isset($_POST['id_persona'])){
        header('Location: ../user/historial.php?mensaje=error');
    }

    include('conexion.php');
    include('../comunes/alerta.php');
    $id = $_POST['id_persona'];
    $documento = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];
    $objeto = $_POST['objeto'];
    $observacion = $_POST['observacion'];

    $editar = $bd->prepare("UPDATE personas
    INNER JOIN detalles ON personas.id_persona = detalles.id_persona
    SET personas.documento = :documento, personas.nombre = :nombre, personas.apellido = :apellido, personas.telefono = :telefono, personas.correo = :correo, personas.rol = :rol, detalles.objeto = :objeto, detalles.observacion = :observacion
    WHERE personas.id_persona = :id");

    $resultado = $editar->execute(
        [
            'id' => $id,
            'documento' => $documento,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'telefono' => $telefono,
            'correo' => $correo,
            'rol' => $rol,
            'objeto' => $objeto,
            'observacion' => $observacion
        ]
    );
    if($resultado){ 
        header('Location: ../user/historial.php?mensaje=editado');
    }else{
        header('Location: ../user/historial.php?mensaje=error');
        exit();
    }
?>
