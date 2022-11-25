<?php
	include("comunes/abrir_conexion.php");
	 
	 	if(isset($_POST['buscar']))
    { 
    	$documento = $_POST['documento'];
    	$valores = array();
    	$valores['existe'] = "0";

    	//CONSULTAR
		  $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE documento = '$documento'");
		  while($consulta = mysqli_fetch_array($resultados))
		  {
		  	$valores['existe'] = "1"; //Esta variable no la usamos en el vídeo (se me olvido, lo siento xD). Aqui la uso en la linea 97 de registro.php
		  	$valores['nombre'] = $consulta['nombre'];
		  	$valores['apellido'] = $consulta['apellido'];
		  	$valores['telefono'] = $consulta['telefono'];		    
		  }
		  sleep(1);
		  $valores = json_encode($valores);
			echo $valores;
    }

    if(isset($_POST['guardar']))
    { 
    	$documento = $_POST['documento'];
    	$nombre = $_POST['nombre'];
    	$apellido = $_POST['apellido'];
    	$telefono = $_POST['telefono'];
    	$existe = "0";

    	//CONSULTAR
		  $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE documento = '$documento'");
		  while($consulta = mysqli_fetch_array($resultados))
		  {
		    $existe = "1";
		  }

		  if($existe=="1")
		  {
		  	//actualizar
		  	  $_UPDATE_SQL="UPDATE $tabla_db1 Set 
				  nombre='$nombre', 
				  apellido='$apellido', 
				  telefono='$telefono' 
				  
				  WHERE doc='$doc'"; 
				  mysqli_query($conexion,$_UPDATE_SQL); 
				  echo "<b>Dato Actualizado</b>";
		  }
		  else
		  {
		  	//crear uno nuevo
		  	mysqli_query($conexion, "INSERT INTO $tabla_db1 
			  (documento,nombre,apellido,telefono) 
			    values 
			  ('$documento','$nombre','$apellido','$telefono')");
			  echo "Propietario Agregado";
		  }

    }
	
  include("comunes/cerrar_conexion.php");
?>

