<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, username, password FROM usuarios WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
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
        <nav>
        <a href="Tombola.php" class="#">Inicio</a>
        <a href="signup.php" class="#">Nuevo Usuario</a>
        <a href="tombolavirtual.php" class="#">Tómbola Virtual</a>
        <a href="ventas.php" class="#">Registros</a>
        <a href="#" class="#">Ventas</a>
        <a href="logout.php" class="#">Cerrar Sesión</a>
    
         
        </nav>
       
    </header>
    
    <main>
        
    </main>
    
    <footer>
        <p>Pie de página &copy; 2024</p>
    </footer>
</body>
</html>
