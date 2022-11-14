<?php 

require ("constantes.php");

$conexion = new mysqli (server,user,pw,bd);

if (!$conexion){
	die ('Error en conexion'.mysqli_error());
	}
?>
