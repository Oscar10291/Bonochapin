<?php
session_start();

// Verificar si el usuario está logeado
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

// Recuperar el nombre de usuario de la sesión
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de tu página</title>
    <!-- Enlaces a tus archivos CSS -->
    <link rel="stylesheet" href="styles\styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="Imagenes\logosinfondo.png" class="logo-img">
            <h2 class="logo-nombre">Bono Chapín</h2>
        </div>
    </header>
    <h1> Bienvenido, <?= $username ?> </h1> <!-- Mostrar el nombre de usuario -->
    <h2>Tabla de Ventas</h2>

    <table>
      <thead>
        <tr>
          <th>Nombre Vendedor</th>
          <th>Fecha y Hora</th>
          <th>Número Vendido</th>
        </tr>
      </thead>
      <tbody>
        <!-- Aquí irían las filas de la tabla -->
      </tbody>
    </table>

    <footer>
        <p>Pie de página &copy; 2024</p>
    </footer>
</body>
</html>
