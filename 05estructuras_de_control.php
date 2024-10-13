<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estructuras de control</title>
</head>

<body>
    <h1>Estructuras de control</h1>

    <h2>Sentencias</h2>
    <p>Las sentencias simples acaban en ;, pudiendo haber más de una en la misma línea</p>

    <?php
    $numero3 = 3;
    echo "El número es $numero<br>";
    $numero += 3;
    print "Ahora es $numero<br>";
    ?>

    <p>Un bloque de sentencias es un conjunto de sentencias encerrados entre llaves.
        No suelen ir solas, sino formar parte de una estructura de control.
        Además, se pueden anidar.
    </p>

    <?php
    $numero = 5;
    echo "El número es $numero<br>";
    $numero -= 2;
    echo "Ahora es $numero<br>"; {
        $numero = 8;
        $numero += 2;
        echo "El resultado es $numero";
    }
    echo "El número es $numero<br>";
    ?>

    <h2>Bucles</h2>

    <?php
    // Tabla de multiplicar del 4
    for ($i = 0; $i < 11; $i++) {
        $res =  4 * $i;
        echo "4 x $i = $res<br>";
    }

    // Generar numeros aleatorios entre 1 y 10
    // hasta que la suma sea superior a 100 o se hayan genberado como máximo 20 numeros

    $sum_pares = 0;
    $num = 0;
    $cont = 0;
    while (true) {
        $num = rand(1, 10);

        if ($num % 2 == 0)
            $sum_pares += $num;
        if ($sum_pares > 100) break;


        if ($cont == 20) break;
        $cont++;
        echo "Se han generado $cont números y la suma de los pares es: $sum_pares<br>";
    }

    for ($i = 0; $i < 200; $i++) {
        $numero = rand(1, 1000);
        echo "el numero generado es: $numero. primos:";

        for ($j = 1; $j < $numero; $j++) {
            //averiguar si $j es primo
            $cuantos_primo = 0;
            $es_primo = true;
            //$raiz_cuadrada = $j **0.5; 
            $raiz_cuadrada = sqrt($j);
            $k = 2;
            while ($es_primo && $k < $raiz_cuadrada) {
                if ($j % $k == 0) $es_primo = false;
                $k++;
            }

            // como saber si $j es primo
            if ($es_primo) {
                echo "$j:";
                $cuantos_primo++;

                if ($cuantos_primo > 10) break 2;
            }
        }
    }

    for ($i = 0; $i < 10; $i++) {
        $num = rand(1, 10);
        echo "<br>Numero: $num"
    }

    ?>




</body>

</html>