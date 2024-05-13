
function generarCombinacionYMostrarGif() {
    mostrarNumerosAnimados(); // Llama a la función que muestra los números animados
    document.querySelector('.gif').style.display = 'block';
}

function mostrarNumerosAnimados() {
    var contenedor = document.getElementById('combinacion');
    contenedor.innerHTML = ''; // Limpiar el contenido anterior

    var numerosFinales = [];
    for (var i = 0; i < 8; i++) {
        numerosFinales.push(Math.floor(Math.random() * 10)); // Generar números aleatorios y almacenarlos en un array
    }

    var index = 0;
    var intervalo = setInterval(function() {
        if (index < numerosFinales.length) {
            var cuadro = document.createElement('div');
            cuadro.style.backgroundColor = 'white';
            cuadro.style.display = 'inline-block';
            cuadro.style.margin = '25px';
            cuadro.style.padding = '10px';
            cuadro.style.border = '2px solid black';
            contenedor.appendChild(cuadro);

            var numerosIntermedios = [];
            for (var j = 0; j < 10; j++) {
                numerosIntermedios.push(j); // Generar una secuencia de números del 0 al 9
            }

            var intermedioIndex = 0;
            var intermedioIntervalo = setInterval(function() {
                if (intermedioIndex < numerosIntermedios.length) {
                    cuadro.textContent = numerosIntermedios[intermedioIndex]; // Mostrar el número intermedio actual
                    intermedioIndex++;
                } else {
                    clearInterval(intermedioIntervalo); // Detener la secuencia intermedia cuando se muestren todos los números
                    cuadro.textContent = numerosFinales[index]; // Mostrar el número final
                    index++;
                    if (index === numerosFinales.length) {
                        // Si es el último número, lanzar confeti
                        lanzarConfeti();
                    }
                }
            }, 50); // Intervalo de tiempo entre cada número intermedio (ajusta según lo rápido que quieras que cambien los números)
        } else {
            clearInterval(intervalo); // Detener la animación cuando se muestren todos los números finales
        }
    }, 1000); // Intervalo de tiempo entre cada cuadro (ajusta según lo rápido que quieras que cambien los cuadros)
}

function lanzarConfeti() {
    var confetiContainer = document.createElement('div');
    confetiContainer.classList.add('confeti-container');
    document.body.appendChild(confetiContainer);

    for (var i = 0; i < 100; i++) {
        var confeti = document.createElement('div');
        confeti.classList.add('confeti');
        confeti.style.left = Math.random() * 100 + 'vw';
        confeti.style.backgroundColor = coloresConfeti[Math.floor(Math.random() * coloresConfeti.length)]; // Seleccionar aleatoriamente un color
        confeti.style.animationDelay = Math.random() * 5 + 's';
        confetiContainer.appendChild(confeti);
    }

    // Eliminar el contenedor de confeti después de 10 segundos
    setTimeout(function() {
        document.body.removeChild(confetiContainer);
    }, 10000); // Duración de 10 segundos en milisegundos
}



var coloresConfeti = ['#FF5733', '#FFC300', '#C70039', '#900C3F', '#581845']; // Puedes agregar más colores si lo deseas


let contador = 1; // Contador para el número autoincrementable

// Función para añadir una nueva fila a la tabla
function agregarFila() {
    const tabla = document.getElementById("tabla").getElementsByTagName('tbody')[0];
    const nuevaFila = tabla.insertRow();

    const celdaNumero = nuevaFila.insertCell(0);
    const celdaFechaHora = nuevaFila.insertCell(1);
    const celdaVendedor = nuevaFila.insertCell(2);

    const numero = document.getElementById("numero").value;
    const vendedor = document.getElementById("vendedor").value;

    celdaNumero.textContent = numero;
    celdaFechaHora.textContent = obtenerFechaHoraActual();
    celdaVendedor.textContent = vendedor;

    // Limpiar campos después de agregar la fila
    document.getElementById("numero").value = "";
    document.getElementById("vendedor").value = "";

    contador++;
}

// Función para obtener la fecha y hora actual en formato legible
function obtenerFechaHoraActual() {
    const ahora = new Date();
    const fecha = ahora.toLocaleDateString();
    const hora = ahora.toLocaleTimeString();
    return fecha + " " + hora;
}
