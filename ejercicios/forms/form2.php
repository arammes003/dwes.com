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
            <legend>Introduce los datos del libro</legend>
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" id="isbn">

            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo">

            <label for="autor">Autores</label>
            <select name="autor" id="autor" size="6">
                <option value="ken">Ken Follet</option>
                <option value="max">Max Hastings</option>
                <option value="isaac">Isaac Asimov</option>
                <option value="carl">Carl Sagan</option>
                <option value="steve">Steve Jacobson</option>
                <option value="george">George R.R Martin</option>
            </select>

            <label for="genero">Género</label>
            <select name="genero" id="genero" size="4">
                <option value="novela">Novela histórica</option>
                <option value="div">Divulgación científica</option>
                <option value="biografia">Biografía</option>
                <option value="fantasia">Fantasía</option>
            </select>
        </fieldset>
        <input type="submit" value="Enviar" name="enviar" />
    </form>

<?php
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $libro['123-4-56789-012-3'] = ['Ken Follet', 'Los pilares de la tierra', 'Novela histórica'];
    $libro['987-6-54321-098-7'] = ['Ken Follet', 'La caída de los gigantes', 'Novela histórica'];
    $libro['345-1-91827-019-4'] = ['Max Hastings', 'La guerra de Churchill', 'Biografía'];
    $libro['908-2-10928-374-5'] = ['Isaac Asimov', 'Fundación', 'Fantasía'];
    $libro['657-4-39856-543-3'] = ['Isaac Asimov', 'Yo, robot', 'Fantasía'];
    $libro['576-4-23442-998-5'] = ['Carl Sagan', 'Cosmos', 'Divulgación científica'];
    $libro['398-4-92438-323-2'] = ['Carl Sagan', 'La diversidad de la ciencia', 'Divulgación científica'];
    $libro['984-5-39874-209-4'] = ['Steve Jacobson', 'Jobs', 'Biografía'];
    $libro['564-7-54937-300-6'] = ['George R.R Martin', 'Juego de tronos', 'Fantasía'];
    $libro['677-2-10293-833-8'] = ['George R.R Martin', 'Sueño de primavera', 'Fantasía'];

    $isbn = $_POST['isbn'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $genero = $_POST['genero'];


    if (array_key_exists($isbn, $libro)) {
        $datos = $libro[$isbn];

        echo "Autor: $datos[0]";
        echo "Titulo: $datos[1]";
        echo "Genero: $datos[2]";
    }
}

fin_html();

?>