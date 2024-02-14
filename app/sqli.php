<?php
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="sqli.css">
</head>
<body>
    <div id="main-container">
        <form id="nuevo-pendiente-container" action="sqli.php" method="GET">
            <p>Buscar nombre de usuario por id</p>
            <input type="text" name="id">
            <input type="submit" value="buscar">

        <div id="resultado">
                <?php
 
                  if(isset($_GET['id'])){
                  $servername = "localhost:3306";
                  $username = "diego";
                  $password = "diego";
                  $database = "midatabase";

                 $conexion = new mysqli($servername, $username, $password, $database);
                 if ($conexion->connect_error) {
                    die("Conexi      n fallida: " . $conexion->connect_error);
                }
                  $id = $_GET['id'];
                  $sql = "SELECT username FROM usuarios WHERE id=$id";
                   //Obtenci      n de datos de tabla
                   $resultado = $conexion->query($sql);

                   while($row = $resultado->fetch_assoc()){
                   echo $row['username'];

                    }
                 }
        ?>
       </div>
     </form>

