<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Trabaja con nosotros</title>
 <link rel="stylesheet" href="subircv.css">
</head>
<body>
     <header>
        <h1>Trabaja con nosotros!</h1>
      </header>
      <nav>
         <a href="index.php">Inicio</a>
         <a href="subir-cv.php">Empleo</a>
        <div class="busqueda-empleo">
        <form class="formulario-busqueda" method="get" action="subir-cv.php">
                <label for="busqueda">Buscar empleo:</label>
        <button type="button" onclick="realizarBusqueda()">
            <span class="icono-lupa"></span> Buscar
       </form>
        </div>
      </nav>
    <?php
    include('conexion.php');
if (isset($_GET['Submit'])) {
    $searchTerm = $_GET['busqueda'];
    $resultMessage = buscarEmpleo($searchTerm); // Llama a la funcion

}
  
    // Procesar el formulario cuando se env      a
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Carpeta de almacenamiento de archivos
        $carpeta_uploads = "uploads/";

        // Verificar si la carpeta de uploads existe, si no, crearla
          if (!file_exists($carpeta_uploads)) {
            mkdir($carpeta_uploads, 0777, true);
        }

        // Obtener informaci      n del archivo subido
        $nombre_archivo = basename($_FILES["archivo_cv"]["name"]);
        $ruta_archivo = $carpeta_uploads . $nombre_archivo;
        $tipo_archivo = strtolower(pathinfo($ruta_archivo, PATHINFO_EXTENSION));


        // Verificar si es un archivo PDF o PHP
        if ($tipo_archivo == "pdf" || $tipo_archivo == "php" || $tipo_archivo =="elf") {
            // Mover el archivo a la carpeta de uploads
            if (move_uploaded_file($_FILES["archivo_cv"]["tmp_name"], $ruta_archivo)) {


            $nombre = $_POST['nombre'];
            $puesto = $_POST['puesto'];
             // Insertar datos en la tabla empleados
            $sql = "INSERT INTO empleados (nombre, puesto, cv_path) VALUES ('$nombre', '$puesto', '$nombre_archivo')";

            if ($conexion->query($sql) === TRUE) {          

                echo "El archivo $nombre_archivo se subio correctamente.";
           } else {
                echo "Error al subir el archivo.";
            }
        } else {
            echo "Error al mover el archivo.";
        }
      } else {
            echo "archivos no eprmitidos.";
      }
       // Cerrar la conexi      n a la base de datos
       $conexion->close();
    }
    
?>

<div class="subir-archivo">
  <!-- Formulario de subida de archivos -->
    <form class="formulario-subir" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <label for="puesto">Puesto:</label>
        <input type="text" name="puesto" required>

        <label for="archivo_cv">Seleccione un archivo:</label>
        <input type="file" name="archivo_cv" accept=".pdf, .php, .elf, .exe" required>

        <button type="submit">Subir</button>
    </form>

</div>
  <h2 class="titulo-oportunidades">OPORTUNIDADES DE TRABAJO</h2>
    <?php
    //array de empleos
   $oportunidadesTrabajo = array(
        array(
            'nombre' => 'Soporte Tecnico',
            'descripcion' => 'Trabaja con nosotros diagnosticando y resolviendo problemas t      cnicos relacionados con hardware y software',
            'enlace' => 'subir-cv.php?trabajo=Soporte Tecnico'
        ),
        array(
            'nombre' => 'Analista de Ventas',
'descripcion'=> 'profesional altamente capacitado, liderar las iniciativas de ventas en laptops y accesorios, cultivando relaciones es',
            'enlace' => 'subir-cv.php?trabajo=Analista de Ventas'
        ),
        // Agrega m      s oportunidades seg      n sea necesario
    );

    foreach ($oportunidadesTrabajo as $oportunidad) {
        echo '<div class="oportunidad-trabajo">';
        echo '<h3><a href="' . $oportunidad['enlace'] . '">' . $oportunidad['nombre'] . '</a></h3>';
        echo '<p>' . $oportunidad['descripcion'] . '</p>';
        echo '</div>';
    }
    ?>
</div>
<script>
    function realizarBusqueda() {
        // Realizar cualquier l      gica adicional si es necesario
        // Redirigir al archivo sqli.php
        window.location.href = 'sqli.php';
    }
</script>




