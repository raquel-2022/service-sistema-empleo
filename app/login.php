<?php
include('conexion.php');
session_start();

$error_message = "";
$result_message = "";

// Procesa el formulario cuando se env      a
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

// vulnerable a inyeccion SQL
//    $query = "SELECT id, password FROM usuarios WHERE username = ?";
    $query = "SELECT id, username FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = $conexion->query($query);

// Cifrar la contraseña antes de almacenarla
//    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
//    if ($result->fetch() && password_verify($password, $hashed_password)) {

    if ($result) {
        // Autenticaci      n exitosa
        if ($result->num_rows > 0) {
            $_SESSION['usuario_id'] = $result->fetch_assoc()['id'];
            $result_message = 'Autenticacion exitosa. Redireccionando a dashboard...';
            header("Location: dashboard.php");
            exit();
        } else {
            // Las credenciales son incorrectas
            $error_message = 'Credenciales incorrectas';
        }
    } else {
        // Error en la consulta
        $error_message = 'Error en la consulta: ' . htmlspecialchars($conexion->error);
        $error_message .= ' Consulta realizada: ' . $query;  // Mostrar la consulta realizada
    }
}
// Consulta para mostrar los resultados de una inyeccion SQL (solo con fines educativos)
$injection_query = "'; SELECT id, username FROM usuarios; --";

// Ejecuta la consulta de inyeccion SQL
$injection_result = $conexion->query($injection_query);

// Cierra la conexi      n a la base de datos
$conexion->close();
?>
<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesion</title>

  <style>
        /* Puedes agregar estilos adicionales si es necesario */
        body {
            font-family: Arial, sans-serif;
//        display: flex;
          align-items: center;
       justify-content:flex-start;
//            margin: 0;
        margin: 20px; /* Agrega un margen general alrededor de todo el cuerpo */
// margin-bottom: 520px;

        }

    header {
//           background-color:#74a7d4 ;
            color:#000000;
            padding:0.5em;
            text-align: left;
            display: flex;
            justify-content: space-between;
            align-items: center;

              width: 100%;
        }
/*        form {
         max-width: 350px;
           background-color: #f2f2f2;
           padding: 30px;
          border-radius: 10px;
           position: relative;
            text-align: center;
          margin-top:15px;
         height: auto;
        }
*/
.input-container {
margin-top: 30px;
position:relative;
}
        input {
       margin-top:10px;
 width: calc(100% - 20px);
        margin: 10px;
           width: 320px;
            padding: 15px;
            margin-bottom: 10px;

            box-sizing: border-box;
          padding-left: 30px;
      }

        button:hover {
            background-color: #404040;
        }
        button {
            background-color: #FF1111;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 15px 0 0; 
            text-align: center; 
     }
       .avatar-icon {
            position: absolute;
            top: -40px;
          left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 80px;
            background-color: #c8d3ff;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
border: 3px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
   .icon {
            position: absolute;
            top: 104px;
            transform: translateY(-50%);
            left: 23px;
            color: #;

        }

        .password-icon {
            cursor: pointer;
            position: absolute;
            top: 104px;
            right: 12px;
            transform: translateY(-50%);
            color: #333;
//           background-color: #333;
        }

        .user-icon {
            position: absolute;
            top: 25px;
            left: 23px;
            color:#fff;
}
.login-form-container {
    /* Estilos especificos para el formulario de inicio de sesion */
display: flex;
    flex-direction: column;
    align-items: center;
        max-width: 350px;
    background-color: #f2f2f2;
     padding: 40px;
       border-radius: 10px;
     position: relative;
        text-align: center;
        margin-top:100px;
         height: auto;
//justify-content: center;
margin-left: 450px;
}

    </style>
</head>
<body>
<div class="login-form-container">   
    <form method="post" action="login.php" novalidate>
         <div class="avatar-icon">👤</div>
         <?php if ($error_message): ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
          <?php endif; ?>

      <div class="input-container">
          <div>
             <span class="user-icon">👤</span>
             <input type="text" name="username" placeholder="Usuario" required>
          </div>
          <div>
            <span class="icon">🔒</span>
            <input type="password" name="password" id="passwordField" placeholder="password" required>
            <span class="password-icon" onclick="togglePasswordVisibility()">👁️</span>
          </div>

      </div>

        <button type="submit">Iniciar Sesion</button>

        <?php if (!empty($result_message)): ?>
    		<textarea readonly><?php echo $result_message; ?></textarea>
	<?php endif; ?>

        <?php
 
        if ($injection_result && $injection_result->num_rows > 0) {
            echo "<h3>Resultados de la consulta de inyeccion SQL:</h3>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Usuario</th></tr>";

            while ($row = $injection_result->fetch_assoc()) {
                echo "<tr><td>" . htmlspecialchars($row['id']) . "</td><td>" . htmlspecialchars($row['username']) . "</td></tr>";
            }

            echo "</table>";
        }
       ?>
    </form>
    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById("passwordField");
            passwordField.type = (passwordField.type === "password") ? "text" : "password";
        }
    </script>
  </div>
</body>
</html>

