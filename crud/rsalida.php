<?php
include ('../includes/conexion.php');
    //print_r($_POST);
    if(empty($_POST["documento"]) || empty($_POST["descripcion"]) || empty($_POST["placa"]) || empty($_POST["serial"]) || empty($_POST["cantidad"]) || empty($_POST["precio"])){
        header('Location: ../user/salida.php?mensaje=falta');
        exit();
    }
    if(empty("SELECT * FROM personas WHERE documento = '".$_POST['documento']."'")){
        header('Location: ../user/salida.php?mensaje=error');
        exit();
    }

    include_once 'conexion.php';
    $id_persona = $_POST["documento"];
    $descripcion = $_POST["descripcion"];
    $placa = $_POST["placa"];
    $serial = $_POST["serial"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];
    
    $sentencia = $bd->prepare("INSERT INTO salida(documento,descripcion,placa,serial,cantidad,precio) VALUES (?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$id_persona,$descripcion,$placa,$serial,$cantidad,$precio]);

    if ($resultado === TRUE) {
        header('Location: ../user/salida.php?mensaje=registrado');
    } else {
        header('Location: ../user/salida.php?mensaje=error');
        exit();
    }
    
?>