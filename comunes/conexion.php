<?php 

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="adso1";

//Lista de Tablas
$tabla_db1 = "persona";

$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$conn){
    die("No hay conexión: ".mysqli_connect_error());
}

?>