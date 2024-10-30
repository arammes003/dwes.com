<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/funciones.php');

inicio_html("Saneamiento y Validación de Datos", ["/styles/general.css", "/styles/forms.css"]);

echo "<header>Saneamiento y validación de datos</header>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /*
    SANEAMIENTO DE DATOS
    
    */
    $nombre = $_POST['nombre'];

    echo "<p><a href='" . $_SERVER['PHP_SELF'] . "'Introducir otros datos</a></p>";
} else {
?>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <fieldset>
            <legend>Introducir datos</legend>

            <label for="dni">DNI</label>
            <input type="text" name="dni" id="dni">

            <label for="nombre">Nombre completo</label>
            <input type="text" name="nombre" id="nombre" size="40">

            <label for="email">Email</label>
            <input type="text" name="email" id="email" size="30">

            <label for="suscripcion">Suscribirse al boletín</label>
            <input type="checkbox" name="suscripcion" id="suscripcion">

            <label for="sitio">Web personal</label>
            <input type="text" name="sitio" id="sitio" size="30">

            <label for="peso">Peso</label>
            <input type="text" name="peso" id="peso" size="3">

            <label for="edad">Edad (Entre 18 y 65)</label>
            <input type="text" name="edad" id="edad" size="2">

            <label for="patologias_previas">Patologías previas</label>
            <select name="patologias_previas" id="patologias_previas" multiple size="5">
                <option value="osteoporosis">Osteoporosis</option>
                <option value="anemia">Anemia</option>
                <option value="artrosis">Artrosis</option>
                <option value="hemocromatosis">Hemocromatosis</option>
            </select>

            <label for="comentarios">comentarios</label>
            <textarea name="comentarios" id="comentarios" rows="4"></textarea>
        </fieldset>
    </form>
<?php
}

fin_html()

?>