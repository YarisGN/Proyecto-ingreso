<?php
    //print_r($_POST);
    if(empty($_POST["doc"]) || empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["telefono"]) || empty($_POST["correo"]) || empty($_POST["rol"])){
        header('Location: ../admin/usuarios.php?mensaje=falta');
        exit();
    }

    include_once '../includes/conexion.php';
    include_once 'conexion.php';
    $tipo_documento = $_POST["tipo_documento"];
    $documento = $_POST["doc"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $rol = $_POST["rol"];
    $objeto = $_POST["objeto"];
    $observacion = $_POST["observacion"];
    
    
    $sentencia = $bd->prepare("INSERT INTO personas(tipo_documento,documento,nombre,apellido,telefono,correo,rol) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$tipo_documento,$documento,$nombre,$apellido,$telefono,$correo,$rol]);

    $ultimap = ("SELECT * FROM personas WHERE id_persona=(SELECT max(id_persona) FROM personas);");
    $result = mysqli_query($conexion,$ultimap);
    while($row = mysqli_fetch_array($result)) {
		$id = $row[0];
	}

    $sentencia2 = $bd->prepare("INSERT INTO detalles(id_persona,objeto,observacion) VALUES (?,?,?);");
    $resultado = $sentencia2->execute([$id,$objeto,$observacion]);


    if($rol == 17){
        if($resultado){ 
            header('Location: ../admin/usuarios.php?mensaje=editado');
        }else{
            header('Location: ../admin/usuarios.php?mensaje=error');
            exit();
        }
    }else{
        if($resultado){ 
            header('Location: ../user/usuarios.php?mensaje=editado');
        }else{
            header('Location: ../user/usuarios.php?mensaje=error');
            exit();
        }
    }
?>
