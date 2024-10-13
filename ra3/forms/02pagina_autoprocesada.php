<?php
/*
Páginas autoprocesadas:
  - Si se recibe una petición GET, se genera el formulario.
  El atributo action tiene el valor.

  - Si se recibe una petición POST, se recogen los datos del formulario y
    se procesa la petición, generando la salida.
*/

require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");
inicio_html('Páginas autoprocesadas', ["/styles/general.css", "styles/formularios.css"]);


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Genero el formulario.
?>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">

        <fieldset>
            <legend>Datos personales:</legend>
            <label for="nombre">Nombre completo</label>
            <input type="text" name="nombre" id="nombre" size="50" required placeholder="Introduce aquí tu nombre completo">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" size="40" required placeholder="mail@mail.es">

            <label for="clave">Clave</label>
            <input type="password" name="clave" id="clave" size="10" required placeholder="password">
        </fieldset>

        <input type="submit" name="operacion" value="Enviar">
    </form>
<?php
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger datos del formulario y procesar la respuesta.
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contraseña = $_POST['clave'];
    $operacion = $_POST['operacion'];

    echo "Nombre: $nombre<br>";
    echo "Mail: $email<br>";
    echo "Contraseña: $contraseña<br>";
    echo "Operación: $operacion<br>";
}

fin_html();

?>