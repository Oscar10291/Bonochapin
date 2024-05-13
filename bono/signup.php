<?php 
   require 'database.php';

   $error_message = '';
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       if (!empty($_POST['username']) && !empty($_POST['nombre']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {
           // Verificar si las contraseñas coinciden
           if ($_POST['password'] !== $_POST['confirm_password']) {
               $error_message = 'Las contraseñas no coinciden';
           } else {
               // Verificar si el nombre de usuario ya existe en la base de datos
               $stmt = $conn->prepare('SELECT COUNT(*) AS count FROM usuarios WHERE username = :username');
               $stmt->bindParam(':username', $_POST['username']);
               $stmt->execute();
               $result = $stmt->fetch(PDO::FETCH_ASSOC);
   
               // Si el nombre de usuario ya existe, mostrar un mensaje de error
               if ($result['count'] > 0) {
                   $error_message = 'El nombre de usuario ya está en uso, por favor elige otro';
               } else {
                   // Insertar el nuevo usuario en la base de datos
                   $sql = "INSERT INTO usuarios (username, Nombre , password) VALUES (:username, :nombre, :password)";
                   $stmt = $conn->prepare($sql);
                   $stmt->bindParam(':username', $_POST['username']);
                   $stmt->bindParam(':nombre', $_POST['nombre']); // Vincular el parámetro de nombre
                   $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                   $stmt->bindParam(':password', $password);
   
                   if ($stmt->execute()) {
                       $message = 'Usuario creado exitosamente';
                   } else {
                       $error_message = 'Lo siento, ha ocurrido un problema al crear tu cuenta';
                   }
               }
           }
       } else {
           $error_message = 'Por favor, completa todos los campos';
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
        <a href="#" class="#">Registros</a>
        <a href="#" class="#">Ventas</a>
        <a href="logout.php" class="#">Cerrar Sesión</a>
    
         
        </nav>
       
    </header>
    <?php if(!empty($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form action="signup.php" method="POST">
        <input name="username" type="text" placeholder="Ingresa tu usuario">
        <input name="nombre" type="text" placeholder="Escribe tu nombre">
        <input name="password" type="password" placeholder="Ingresa tu contraseña">
        <input name="confirm_password" type="password" placeholder="Confirma la contraseña">
        <input type="submit" value="Registrarse">
    </form>
    <footer>
        <p>Pie de página &copy; 2024</p>
    </footer>
</body>
</html>
