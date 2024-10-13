<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
</head>

<body>
    <h1>Array</h1>
    <p>Un array es un conjunto de elementos que se referencian con el mismo nombre. A cada variable del array se le conoce como componente o elemento del array. CAda componente tiene asociado una clave que se emplea para acceder a ese componente</p>
    <p>En PHP los arrays son muy flexibles. HAy de dos tipos: escalares y asociativos. Para acceder a un elemento se usa su clave con el operador []. SI la clave es un numero entero mayor o igual que 0 es un array escalar. Si la clave es una cadena de caracteres es un array asociativo.</p>

    <h2>Array escalar</h2>
    <?php
    // un array se define de dos formas
    // 1ª con la fun cion Array()
    $notas = array(4, 8, 9, 7);

    // 2ª con un literal
    $numeros = [6, 4, 7, 8, 5.5];

    // Si solo se indican los elementos del array, la clave comienza por 0 desde la izquierda
    echo "La primera nota es: $notas[0]<br>";
    echo "La tercera nota es: $notas[2]<br>";

    // al definir el array podemos indicar los indices
    $notas = array(4 => 8.5, 4 => 4.75, 7 => 5);

    unset($notas[4]);
    $notas[5] = rand(1, 10);
    echo "$notas[5]<br>";
    ?>

    <h2>Arrays asociativos</h2>
    <p>Array que tiene una cadena de caracteres como clave</p>
    <?php
    $coche['123456'] = "Seat leon";
    $coche['987654'] = "Ford Focus";

    echo "Mi coche es: " . $coche['123456'] . "<br>";
    ?>

    <h2>Array mixto</h2>
    <p>Cuando las claves son indices numericos o cadenas indistintamente</p>
    <?php
    $alumno['nombre'] = "Alfonso";
    $alumno[0] = 4;
    $alumno[1] = 6;
    $alumno[2] = 5;
    $alumno['media'] = 5;

    echo "El alumno {$alumno['nombre']} y tiene de notas $alumno[0], $alumno[1], $alumno[2]<br>";
    echo "Su media es {$alumno['media']}<br>";
    ?>

    <h2>Array bidimensional</h2>
    <p>Arrays con dos dimensiones y por tanto para acceder a un elemento hacen falta dos claves</p>
    <?php
    $notas = array(
        array(5, 3, 7, 3),
        array(2, 6, 4, 9),
        array(1, 5, 2, 8),
        array(10, 2, 3, 7),
    );

    echo "El elemento en la fila 2 columna 3 es --> {$notas[1][2]}<br>";

    $notas[][] = 9;
    echo "El ultimo elemento de la ultima fila es: {$notas[4][0]}<br>";

    $notas[3][] = 7.5;

    echo "El último elemento de la fila 3 (la cuarta) es: {$notas[3][4]}<br>";

    // array asociativo, se accede por clave no por indice
    $coches = [
        '1234abc' => ['marca' => 'Seat', 'modelo' => 'Ibiza', 'motor' => 'Diesel', 'pvp' => 19000],
        '9876zxv' => ['marca' => 'Topolla', 'modelo' => 'Grandota', 'motor' => 'Tumadre', 'pvp' => 6],
    ];

    echo "El primer coche es {$coches['1234abc']['marca']} modelo {$coches['1234abc']['modelo']}<br>";


    // CREA UN ARRAY DE UN EQUIPO DE FUTBOL DONDE CADA FILA SON LAS POSICIONES
    // DONDE JUEGAN LOS JUGADORES IDENTIFICADOS POR SU DORSAL

    $equipo = [
        'PT' => [
            '1' => ['NOMBRE' => 'Courtois', 'DORSAL' => 1],
            '13' => ['NOMBRE' => 'Lunin', 'DORSAL' => 13],
        ],
        'DFC' => [
            '2' => ['NOMBRE' => 'Carvajal'],
            '3' => ['NOMBRE' => 'E. Militao'],
            '4' => ['NOMBRE' => 'Alaba'],
            '17' => ['NOMBRE' => 'Lucas V'],
            '18' => ['NOMBRE' => 'Vallejo'],
            '20' => ['NOMBRE' => 'Fran García'],
            '22' => ['NOMBRE' => 'Rüdiger'],
        ],
        'MC' => [
            '5' => ['NOMBRE' => 'Bellingham'],
            '6' => ['NOMBRE' => 'Camavinga'],
            '8' => ['NOMBRE' => 'Valverde'],
            '10' => ['NOMBRE' => 'Modrić'],
            '14' => ['NOMBRE' => 'Tchouameni'],
            '15' => ['NOMBRE' => 'Arda Güler'],
        ],
        'DC' => [
            '7' => ['NOMBRE' => 'Vini Jr.'],
            '9' => ['NOMBRE' => 'Mbappé'],
            '11' => ['NOMBRE' => 'Rodygo'],
            '16' => ['NOMBRE' => 'Endrick'],
            '21' => ['NOMBRE' => 'Brahim'],
        ],
    ];

    foreach ($equipo as $posicion => $jugadores) {
        echo "<h2>$posicion</h2>";
        foreach ($jugadores as $jugador) {
            foreach ($jugador as $posicion) {
                echo "$posicion";
                echo "<br>";
            }
        }
    }

    ?>

    <h2>Arrays multidimensionales</h2>
    <?php
    $notas = [
        [
            [3, 4, 5, 6],
            [5, 9, 8, 1],
        ],
        [
            [4, 6, 5, 3],
            [1, 8, 7, 9]
        ],
        [
            [2, 8, 4, 6],
            [9, 10, 4, 3]
        ]
    ];

    echo "Accedo al elemento 1, 1, 2: {$notas[1][1][2]}<br>";

    $notas = [
        'alfonso' => [
            'T1' => ['dwes' => 7, 'dwec' => 9, 'daw' => 10],
            'T2' => ['dwes' => 5, 'dwec' => 5.6, 'daw' => 9],
            'T3' => ['dwes' => 9, 'dwec' => 8, 'daw' => 1],
        ],
        'adri' => [
            'T1' => ['dwes' => 10, 'dwec' => 2, 'daw' => 6],
            'T2' => ['dwes' => 9, 'dwec' => 6, 'daw' => 3],
            'T3' => ['dwes' => 8, 'dwec' => 5, 'daw' => 9],
        ],
    ];

    echo "La nota de maria en el segundo trimestre en dwec es: {$notas['alfonso']['T2']['dwec']}<br>";
    ?>
    <h2>Recorrer un array</h2>
    <?php
    echo "<h3>Bucle for tradicional</h3>";
    // Para arrays escalares puedo usar un bucle for tradicional
    $numeros = [6, 19, 12, 7, 11, 9, 3];
    for ($i = 0; $i < count($numeros); $i++) {
        echo "Elemento $i es {$numeros[$i]}<br>";
    }

    // Para cualquier tipo de array tenemos el bucle foreach
    // foreach ($array as [$clave =>] $valor) {
    //
    // }
    echo "<h3>Bucle foreach</h3>";
    foreach ($numeros as $numero) {
        echo "El número es $numero<br>";
    }

    echo "<br>";
    $alumno = [];   // Crea un array vacío. Equivalente a $alumno = Array();
    $alumno['nombre'] = "Juan Gómez";
    $alumno[0] = 4;
    $alumno[1] = 6;
    $alumno[2] = 5;
    $alumno['media'] = 5;

    foreach ($alumno as $clave => $valor) {
        echo "Elemento con clave $clave y valor $valor<br>";
    }

    echo "<h3>Recorrido de arrays multidimensionales</h3>";
    /*
Si es un array bidimensional escalar podemos usar dos bucles
for anidados y utilizamos los dos contadores de bucle para
acceder a elementos individuales

for( $i = 0; $i < count($notas); $i++ ) {
    echo "Recorrido de la fila $i<br>";
    for( $j = 0; $j < count($notas[$i]); $j++) {
        echo "Fila $i Columna $j: {$notas[$i][$j]}<br>";
    }
}
*/

    foreach ($notas as $alumno => $trimestres) {
        echo "Notas de $alumno:<br>";
        foreach ($trimestres as $trimestre => $modulos) {
            echo "Notas del trimestre $trimestre:<br>";
            foreach ($modulos as $modulo => $nota) {
                echo "Módulo: $modulo Nota: $nota<br>";
            }
            echo "-----------------------------<br>";
        }
        echo "=================================<br>";
    }

    echo "El array con los coches<br>";
    foreach ($coches as $matricula => $coche) {
        echo "Coche con matrícula: $matricula<br>";
        foreach ($coche as $clave => $valor) {
            echo "$clave: $valor<br>";
        }
        echo "-----------------------<br>";
    }
    ?>
    ?>
</body>

</html>