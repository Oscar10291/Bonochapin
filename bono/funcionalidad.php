<?php

function generarCombinacionYMostrarGif() {
    mostrarNumerosAnimados(); // Llama a la función que muestra los números animados
    echo "<script>document.querySelector('.gif').style.display = 'block';</script>";
}

function mostrarNumerosAnimados() {
    echo "<script>document.getElementById('combinacion').innerHTML = '';</script>"; // Limpiar el contenido anterior

    $numerosFinales = [];
    for ($i = 0; $i < 8; $i++) {
        $numerosFinales[] = rand(0, 9); // Generar números aleatorios y almacenarlos en un array
    }

    $index = 0;
    echo "<script>var intervalo = setInterval(function() {";
    echo "if ($index < $numerosFinales.length) {";
    echo "var cuadro = document.createElement('div');";
    echo "cuadro.style.backgroundColor = 'white';";
    echo "cuadro.style.display = 'inline-block';";
    echo "cuadro.style.margin = '25px';";
    echo "cuadro.style.padding = '10px';";
    echo "cuadro.style.border = '2px solid black';";
    echo "document.getElementById('combinacion').appendChild(cuadro);";

    echo "var numerosIntermedios = [];";
    echo "for (var j = 0; j < 10; j++) {";
    echo "numerosIntermedios.push(j);"; // Generar una secuencia de números del 0 al 9
    echo "}";

    echo "var intermedioIndex = 0;";
    echo "var intermedioIntervalo = setInterval(function() {";
    echo "if (intermedioIndex < numerosIntermedios.length) {";
    echo "cuadro.textContent = numerosIntermedios[intermedioIndex];"; // Mostrar el número intermedio actual
    echo "intermedioIndex++;";
    echo "} else {";
    echo "clearInterval(intermedioIntervalo);"; // Detener la secuencia intermedia cuando se muestren todos los números
    echo "cuadro.textContent = $numerosFinales[$index];"; // Mostrar el número final
    echo "$index++;";
    echo "if ($index === $numerosFinales.length) {";
    echo "lanzarConfeti();";
    echo "}";
    echo "}";
    echo "}, 50);";
    echo "}";

    echo "else {";
    echo "clearInterval(intervalo);";
    echo "}";
    echo "}, 1000);";
}

function lanzarConfeti() {
    echo "<script>var coloresConfeti = ['#FF5733', '#FFC300', '#C70039', '#900C3F', '#581845'];</script>"; // Puedes agregar más colores si lo deseas

    echo "<script>var confetiContainer = document.createElement('div');";
    echo "confetiContainer.classList.add('confeti-container');";
    echo "document.body.appendChild(confetiContainer);</script>";

    for ($i = 0; $i < 100; $i++) {
        echo "<script>var confeti = document.createElement('div');";
        echo "confeti.classList.add('confeti');";
        echo "confeti.style.left = Math.random() * 100 + 'vw';";
        echo "confeti.style.backgroundColor = coloresConfeti[Math.floor(Math.random() * coloresConfeti.length)];"; // Seleccionar aleatoriamente un color
        echo "confeti.style.animationDelay = Math.random() * 5 + 's';";
        echo "confetiContainer.appendChild(confeti);</script>";
    }

    // Eliminar el contenedor de confeti después de 10 segundos
    echo "<script>setTimeout(function() {";
    echo "document.body.removeChild(confetiContainer);";
    echo "}, 10000);</script>"; // Duración de 10 segundos en milisegundos
}

if (isset($_POST['generar'])) {
    generarCombinacionYMostrarGif();
}

?>
