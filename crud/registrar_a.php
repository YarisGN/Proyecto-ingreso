<?php
    //print_r($_POST);
    if(empty($_POST["documento"]) || empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["telefono"]) || empty($_POST["correo"]) || empty($_POST["rol"]) || empty($_POST["pass"])){
        header('Location: ../admin/registro.php?mensaje=falta');
        exit();
    }
    include_once '../includes/conexion.php';
    include_once 'conexion.php';
    $tipo_documento = $_POST["tipo_documento"];
    $documento = $_POST["documento"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $rol = $_POST["rol"];
    $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
    
    $sentencia = $bd->prepare("INSERT INTO personas(tipo_documento,documento,nombre,apellido,telefono,correo,rol,pass) VALUES (?,?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$tipo_documento,$documento,$nombre,$apellido,$telefono,$correo,$rol,$pass]);

    $ultimap = ("SELECT * FROM personas WHERE id_persona =(SELECT max(id_persona) FROM personas);");
    $result = mysqli_query($conexion,$ultimap);
    while($row = mysqli_fetch_array($result)){
        $id = $row[0];
    }

    if ($resultado === TRUE) {
        header('Location: ../admin/registro.php?mensaje=registrado');
    } else {
        header('Location: ../admin/registro.php?mensaje=error');
        exit();
    }
    
?>