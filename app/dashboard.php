<?php
session_start();

// Verificar si el usuario ha iniciado sesision
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
// Incluir archivo de conexion
include('conexion.php');
// Consultar empleados
$sql = "SELECT * FROM empleados";
$resultado = $conexion->query($sql);

// Logica para el panel de control del administrador
// (Debes agregar la l      gica de administracion aqu, como mostrar la lista de empleados, configuraciones, etc.)
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h2>Panel de Control</h2>
    <p>Bienvenido, Usuario <?php echo $_SESSION['usuario_id']; ?> (<a href="logout.php">Cerrar Sesi      n</a>)</p>

    <!-- Mostrar la lista de empleados -->
    <h3>Lista de Empleados</h3>
    <?php
    if ($resultado->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Puesto</th><th>CV Archivo</th></tr>";
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['id'] . "</td>";
            echo "<td>" . $fila['nombre'] . "</td>";
            echo "<td>" . $fila['puesto'] . "</td>";
            echo "<td><a href='/uploads/" . $fila['cv_path'] . "' target='_blank'>Ver CV</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No hay empleados registrados.";
    }

    // Cerrar la conexion a la base de datos
    $conexion->close();
    ?>

    <!-- Aqu se puede agregar mas contenido del dashboard -->
</body>
</html>
