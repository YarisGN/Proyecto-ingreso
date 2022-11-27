<?php
	include("comunes/abrir_conexion.php");
	 
	 	if(isset($_POST['buscar']))
    { 
    	$doc = $_POST['doc'];
    	$valores = array();
    	$valores['existe'] = "0";

    	//CONSULTAR
		  $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE documento = '$doc'");
		  while($consulta = mysqli_fetch_array($resultados))
		  {
			$valores['tipo_documento'] = $consulta['tipo_documento'];		    
		  	$valores['nombre'] = $consulta['nombre'];
		  	$valores['apellido'] = $consulta['apellido'];
		  	$valores['correo'] = $consulta['correo'];
		  	$valores['telefono'] = $consulta['telefono'];
		  	$valores['rol'] = $consulta['rol'];		    
		  }
		  $valores = json_encode($valores);
			echo $valores;
    }
  include("comunes/cerrar_conexion.php");
?>
