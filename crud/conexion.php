<?php 

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="adso1";

try {
	$bd = new PDO (
		'mysql:host=localhost;
		dbname='.$dbname,
		$dbuser,
		$dbpass,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	);
} catch (Exception $e) {
	echo "Problema con la conexion: ".$e->getMessage();
}

?>