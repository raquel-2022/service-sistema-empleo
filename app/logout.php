<?php
session_start();
session_destroy();
// Redirigir a la p      gina de inicio de sesi      n
header("Location: index.php");
exit();
?>


