<?php
session_start();
session_destroy(); // Destruye todas las variables de sesión

// Redirige al usuario de vuelta a index.php
header("Location: index.php");
exit();
?>
