<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scripts PHP</title>
</head>

<body>
    <h1>Nivel: Principiante</h1>
    <h3>1. Crea un script PHP que visualiza las siguientes magnitudes (utiliza un número en notación científica y elige una precisión diferente para cada dato):<br>
        • La distancia de la tierra al sol.<br>
        • La distancia de Plutón al Sol (5,9064x109 km).<br>
        • El diámetro del Sol.<br>
    </h3>
    <?php
    $dist_tierra_sol = 150e6;
    echo "La distancia de la Tiera al Sol es de: " . number_format($dist_tierra_sol, 0, '.', '.') . " millones de kms<br>";
    $dist_pluton_sol = 5916e6;
    echo "La distancia de Plutón al Sol es de: " . number_format($dist_pluton_sol, 0, '.', '.') . " millones de kms<br>";
    $diametro_sol = 13927e2;
    echo "El diámetro del Sol es de: " . number_format($diametro_sol, 0, '.', '.') . " millones de kms<br>";
    ?>

    <h3>2. Crea un script PHP que declara tres variables de tipo entero y les asigna a cada una el número 989 en decimal, octal, hexadecimal y binaria. </h3>
    <?php
    $num_decimal = 989;
    $num_octal = decoct($num_decimal);
    $num_hexa = dechex($num_decimal);
    $num_bin = decbin($num_decimal);

    echo "Decimal: $num_decimal <br>";
    echo "Octal: $num_octal <br>";
    echo "Hexadecimal: $num_hexa <br>";
    echo "Binario: $num_bin <br>";
    ?>

    <h3>3. Crea un script PHP que muestre en pantalla (utiliza un número float en notación
        científica y elige una precisión diferente para ambos datos): <br>
        • La cantidad de bits en una memoria RAM de 16 GB.<br>
        • La población de la Tierra.<br>
        • El tamaño de algún virus (20 nm).<br>
    </h3>
    <?php
    $bits = 1.24e11;
    echo "Una RAM de 16 GB tiene un total de: " . number_format($bits, 2, ',', '.') . " bits<br>";
    $poblacion = 7951e6;
    echo "La población de la Tierra es de: " . number_format($poblacion, 0, '.', '.') . " de personas<br>";
    $virus = 20e-9;
    echo "El tamaño de un virus de 20nm es de: " . number_format($virus, 9, ',', '.') . "<br>";
    ?>

    <h3>4. Crea un script PHP que muestre la cadena “Mi primer, y no único, ejercicio”, incluyendo las comillas dobles. Inicialmente la cadena se muestra directamente, luego utiliza una variable</h3>

    <?php
    echo '"Mi primer, y no único, ejercicio"<br>';
    $cadena = '"Mi primer, y no único, ejercicio"';
    echo $cadena . "<br>";
    ?>

    <h3>
        5. Crea un script PHP que asigna un nombre de usuario a una variable y luego muestra la cadena ¡Hola <nombre>! El <nombre> es el nombre de usuario asignado a la variable
    </h3>

    <?php
    $nombre = "Alfonso";
    echo "¡Hola $nombre! <br>";
    ?>

    <h3>
        6. Crea un script PHP que asigna el nombre de tu padre/madre y luego, muestre en pantalla la cadena ¡El nombre de mi padre/madre es <nombre>!.
    </h3>

    <?php
    $nombre = "Catalina";
    echo "¡El nombre de mi madre es $nombre!<br>";
    ?>

    <h3>7. Crea un script PHP que calcule y muestre la siguiente operación aritmética:
        (
        3+2
        /
        2⋅5
        )
        ^2
    </h3>

    <?php
    $operacion = ((3 + 2) / (2 * 5)) ** 2;
    echo "El resultado de esta operación aritmética es: $operacion<br>";
    ?>

    <h3>8. Crea un script PHP que declare las variables a, b y c con valores 3.5, 6 y 4.25 respectivamente. Luego calcule y muestre en pantalla la siguiente operación aritmética:
    </h3>

    <?php
    $a = 3.5;
    $b = 6;
    $c = 4.25;
    $operacion = (($a + 2) / (2 * $b)) * (($c - 4) / ($a / $c)) ** 2;
    printf("El resultado de la operación es: %0.5f <br>", $operacion);
    ?>

    <h3>9. Crea un script PHP asigna a dos variables un número de horas extra trabajadas y el salario por cada una. Luego, calcula y muestre en pantalla el salario con el símbolo monetario.</h3>
    <?php
    $horas_extra = 13;
    $precio_hora_extra = 5;
    $salario = $horas_extra * $precio_hora_extra;
    echo "El salario de este trabajador es de: $salario €<br>";
    ?>

    <h3>10. Crea un script PHP que asigna a una variable un número entero positivo y luego muestre la suma de números enteros desde 1 al número ingresado. Esta suma se puede calcular con la siguiente expresión:</h3>

    <?php
    $var = 5;
    $operacion = $var * ($var + 1) / 2;
    echo "La suma de numeros enteros desde el 1 hasta el numero ingresado($var) es de: $operacion<br>";
    ?>

    <h3>11. Crea un script PHP que asigna a una variable tu peso en Kg y luego calcule el peso equivalente en onzas. Una onza son 28,3495 gramos.</h3>
    <?php
    $peso_kg = 95;
    $onza = 35.274;
    $peso_conv = ($peso_kg ^ 3) * $onza;
    echo "Tu peso de $peso_kg kg en onzas es un total de: " .  number_format($peso_conv, 3, ',', '.') . "<br>";
    ?>

    <h3>12. Crea un script PHP que calcule y muestre cuántos bytes hay en un SSD de 64GB.</h3>
    <?php
    $byte = 1e9;
    $memoria_ssd = 64;
    $res = $byte * $memoria_ssd;
    echo "Un disco duro SSD de 64GB tiene un total de " . number_format($res, 0, '.', '.') . " bytes<br>";
    ?>

    <h3>Crea un script PHP que asigna a una variable un NIF sin la letra. Después calcula y muestra la letra correspondiente a él</h3>
    <?php
    $num_dni = 26533118;
    //$num_dni = rand(00000000, 99999999);
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    $calc = $num_dni % 23;
    $letra = $letras[$calc];
    echo "El DNI completo es: $num_dni-$letra<br>";
    ?>
</body>

</html>