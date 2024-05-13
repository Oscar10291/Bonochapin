<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapines</title>
    <link rel="stylesheet" type="text/css" href="styles\styles.css">
    <script src="funcion.js"></script>
</head>
<body>
<header>
    <div class="logo">
            <img src="Imagenes\logosinfondo.png" class="logo-img">
            <h2 class="logo-nombre">Bono Chapín</h2>

            
    </div>
        <nav>
        <a href="Tombola.php" class="Tombola.php">Inicio</a>
        <a href="signup.php" class="#">Nuevo Usuario</a>
        <a href="tombolavirtual.php" class="#">Tómbola Virtual</a>
        <a href="#" class="#">Registros</a>
        <a href="#" class="#">Ventas</a>
        <a href="logout.php" class="#">Cerrar Sesión</a>
    
         
        </nav>
       
    </header>
    <div class="gif-container">
        <img src="Imagenes\tombola-loader-white.gif" class="gif" /> <!-- Inicialmente oculta -->
    </div>
    <h1 class="titulotombola">EL NÚMERO GANADOR ES: </h1>
<div id="combinacion"></div>
<button onclick="generarCombinacionYMostrarGif()">Generar Combinación</button>

    
    
</body>
</html>