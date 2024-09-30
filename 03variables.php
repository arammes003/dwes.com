<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables</title>
</head>

<body>
    <h1>Variables: 03variables.php</h1>

    <?php
    // Las varables se definen con $identificador
    $nombre_variable = "Valor de la variable";

    // variables que no se han definido
    $resultado = $numero + 25;
    echo "El valor de numero es $numero y el resultado es $resultado<br>";

    $resultado = $sin_definir + 5.5;
    echo "El valor de sin definir es $sin_definir y el resultado es $resultado<br>";

    // si la variable está en un contexto logico su valor logico asume por defecto false
    ?>
    <h2>ANálisis de variables</h2>
    <h3>Análisis simple</h3>

    <?php
    // Consiste en introducir una variable en una cadena con " 0 heredoc para incrustar su valor dentro de la cadena

    echo "El resultado es $resultado<br>";
    ?>
    <h3>Analisis complejo</h3>
    <?php
    // En algunas situaciones nos encontramos ambigüedad en una variable interpolada. PAra ello usamos las llaves y e elimina la ambigüedad
    $calle = "Gónola";
    $num = 7;
    $pob = "Vva";
    $dist = "Jaén";

    echo "MI direccion en LOndres es {$num}th, $calle<br>$pob<br>$dist<br>";
    ?>

    <h2>Funciones para variables</h2>

    <?php
    // funcion gettype()
    echo "El tipo de datos de $resultado es " . gettype($resultado) . "<br>";
    echo "El tipo de datos de una expresion es " . gettype($num + 5.5) . "<br>";

    // funcion emprty()
    /* Comprueba si una variable tiene un valor
        - Si es entero devuelve true si es 0, false en caso contrario
        - Si es float devuelve true si es 0.0, false en caso contrario
        - Si es cadena devuelve true si es "", false en caso contrario
        - Devuelve true si es NULL o false  
    */
    if (empty($num)) echo "\$numero tiene el valor $numero<br>";
    else echo "\$numero tiene un valor no vacio<br>";

    $numero = NULL;
    if (empty($numero)) $numero = 12;
    else echo "\$numero tiene el valor $numero<br>";

    // FUncion isset();
    // Devuekve true si la variableestá definida y no es null
    if (isset($nueva_variable)) echo "La variable está definida y su valor es $nueva_variable<br>";
    else echo "La variable no está definida<br>";

    $variable_null = NULL;
    if (isset($variable_null)) echo "La variable está definida<br>";
    else echo "La variable $variable_null no está definifa o tiene valor NULL<br>";

    /*
        Funciones que comprueban los tipos de datos
        - is_bool() -> True si la expresion es booleana
        - is_int() -> True si la expresion es integer
        - is_float() -> True si la expresión es float
        - is_string() -> True si la expresion es una cadena
        - is_array() -> True si la expresion es un array

        En cualquier otro caso devuelve false
    */

    $edad = 20;
    $mayor_edad = $edad > 18;
    $numero_e = 2.71;
    $mensaje = "El numero es " . $numero_e . "<br>";

    if (is_int($edad)) echo "\$edad es un entero<br>";

    if (is_bool($mayor_edad)) echo "\$mayor_edad es booleana<br>";

    if (is_float($numero_e)) echo "\$numero_e es float<br>";

    if (is_string($mensaje)) echo "\$mensaje es una cadena<br>";
    ?>

    <h2>Constantes</h2>
    <p>UNa constante es un valor con nombre que no puede cambiar de valor en el programa. Se le asiga un valor en la declaración y permanece invariable. Se definen de dos formas:<br>
        - Mediante la funcion define()<br>
        - Mediante la palabra clave const <br>
    </p>
    <?php
    define("PI", 3.14159);
    define("PRECIO_BASE", 15000);
    define("DIRECTORIO_SUBIDAS", "/uploads/archivos");

    echo "El numero PI es " . PI . "<br>";
    $area = PI * PI * 5;
    echo "El area del circulo de radio 5 es $area<br>";
    echo "El Precio base es " . PRECIO_BASE . "<br>";

    $path_archivo = DIRECTORIO_SUBIDAS . "/archivo.pdf";
    echo "El archivo subido es $path_archivo<br>";

    $precio_rebajado = PRECIO_BASE - PRECIO_BASE * 0.25;
    echo "El precio rebajado es $precio_rebajado<br>";

    const SESION_USUARIO = 600;
    echo "La sesion del usuario finaliza en " . SESION_USUARIO . " segundos<br>";

    // COnstantes predefinidas por PHP
    echo "El script es " . __FILE__ . " y la linea es " . __LINE__ . "<br>";
    ?>

    <h2>Expresiones, operadores y operandos</h2>
    <p>UN aexpresion es una combinacion de operadroes y operandos que arroja un resultado. Tiene tipo de datos, que depende del tipo de datos de sus operandos y de la operacioón realizada<br>Los operadores pueden ser:<br>
        - UNarios: Solo necesitan un operando.<br>
        - Binarios: Utilizan dos operandos<br>
        - Ternarios: Utilizan tres operandos<br>
        Un operando es una expresion en si misma, siendo la mas simple de un literal o una variable, pero tambiuen puede ser un valor devuelto por una funcion o el resultado de otra expresion.<br>Las operaciones de una expresion no se ejecutan a la vez, sino en orden segun la precedencia y asociatividad de los operadores. ESta puede alterar a conveniencia
    </p>
    <h2>Operadores</h2>
    <h3>Asignacion</h3>
    <?php
    // el operador de asignacion es =
    $num = 45;
    $res = $num + 4 - 30;
    $sin_valor = NULL;
    ?>

    <h3>Operadores aritmeticos</h3>
    <?php
    /* 
            + Suma
            - REsta
            * Multiplicacion
            / DIvision
            % Modulo
            ** Exponenciacion

            Unarios
            + cONVERSION A ENTERO
            - El opuesto
        */
    $num1 = 15;
    $num2 = 9;
    $sum = $num1 + $num2;
    $res = $num1 - $num2;
    $opuesto = -$num1;
    $mult = $num1 * $num2;
    $div = $num1 / $num2;
    $mod = $num1 % $num2;
    $pot = $num1 ** $num2;
    echo "$sum $res $opuesto $mult $div $mod $pot<br>";

    $num1 = "35";
    $num4 = +$num1;
    echo "El \$num4 es $num4 y su tipo es " . gettype($num4) . "<br>";

    // no lo hace con float
    $num5 = PI;
    $num6 = +$num5;
    echo "El \$num6 es $num6 y su tipo es " . gettype($num6) . "<br>";
    ?>

    <h2>Operadores de asignacion aumentada</h2>
    <?php
    /* OPeradores de asignacion aumentada
        ++ Incremento
        -- Decremento
        +=
        -=
        /=
        %=
        *=
        */

    $numero = 4;
    $numer++;
    echo "Antes numero era 4 ahora es $numero<br>";
    ++$numero;
    echo "Antes numero era 5 ahora es $numero<br>";
    ?>

</body>

</html>