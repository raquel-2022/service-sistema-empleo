<?php
$servername = "localhost:3306";
$username = "diego";
$password = "diego";
$database = "midatabase";

$conexion = new mysqli($servername, $username, $password, $database);

if ($conexion->connect_error) {
    die("Conexi      n fallida: " . $conexion->connect_error);
}
?>
