<?php 
session_start();
require 'database.php';

$message = '';

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, username, password FROM usuarios WHERE username = :username');
    $records->bindParam(':username', $_POST['username']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if ($results && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        $_SESSION['username'] = $results['username']; // Guardar el nombre de usuario en la sesión
        header("Location: tombola.php");
        exit();
    } else {
        $message = 'Lo siento, las credenciales no coinciden';
    }
} else {
    $message = 'Por favor, ingresa tanto el nombre de usuario como la contraseña.';
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
    </header>
    <?php if(!empty($message)): ?>
        <p> <?= $message ?></p>
    <?php endif; ?>
    <h1> Inicio Sesion </h1>
    <form action="login.php" method="post">
        <input type="text" name="username" placeholder="Ingresa tu usuario">
        <input type="password" name="password" placeholder="Ingresa tu contraseña">
        <input type="submit" value="Enviar">
    </form>
    <a class= volver href="index.php">volver</a>
    <footer>
        <p>Pie de página &copy; 2024</p>
    </footer>
</body>
</html>