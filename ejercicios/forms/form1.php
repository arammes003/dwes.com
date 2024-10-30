<?php

# /var/www/dwes.com/ejercicios/forms/includes/funciones.php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ejercicios/forms/includes/funciones.php');
inicio_html('Ejercicio 1 Forms', ["/ejercicios/styles/general.css", "/ejercicios/styles/forms.css"]);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
?>
    <p>
        Crear un script PHP que presente un formulario donde se introduce un
        número entero y devuelve una respuesta con el número convertido en varios
        sistemas: binario, octal, hexadecimal, decimal
    </p>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <legend>Introduce un número entero</legend>
            <input type="number" name="entero" id="entero" required>
        </fieldset>
        <input type="submit" value="Enviar" name="enviar" />
    </form>

<?php
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num = $_POST['entero'];

    $bin = decbin($num);
    echo "El numero $num es en hexadecimal: $bin<br>";

    $octal = decoct($num);
    echo "El numero $num es en hexadecimal: $octal<br>";

    // $hex = dechex($num);
    echo "El numero $num es en hexadecimal:" . dechex($num) . "<br>";

    echo "El número en decimal es: $num<br>";
}

fin_html();

?>