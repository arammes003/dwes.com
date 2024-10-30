<?php
/* 
ENCADEZADOS
-------------

Ejemplo de uso de los enncabezados. Enviadmos contenido diferente de HTML para lo que tenemos que usar el encabezado Content-Type

Listar en formato de tabla los archivos del directorio ra4/archivos y que el usuario pueda descargar cualquiera de ellos

No hay descarga directa. Lectura del contenido del archivo con una función de PHP Y poner el contenido en la respuesta con su cabecera
*/

define("DIRECTORIO_ARCHIVOS", $_SERVER['DOCUMENT_ROOT'] . "/ra4/archivos");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    inicio_html("Encabezados", ["/styles/general.css", "/styles/tablas.css"]);
    echo "<header>Descarga de archivos</header>";
    $lista_archivos = scandir(DIRECTORIO_ARCHIVOS);

    if (count($lista_archivos) > 0) {
        echo <<<TABLA
            <table>
                <caption>Archivos disponibles para su descarga</caption>
                <thead>
                    <tr>
                    <th>Archivo</th>
                    <th>Tipo</th>
                    <th>Tamaño</th>
                    <th>Descarga</th>
                    </tr>
                </thead>
            <tbody>
        TABLA;
        foreach ($lista_archivos as $archivo) {
            if (is_file(DIRECTORIO_ARCHIVOS . "/$archivo")) {
                $tipo_mime = mime_content_type(DIRECTORIO_ARCHIVOS . "/$archivo");
                $tamaño = filesize(DIRECTORIO_ARCHIVOS . "/$archivo");
                // EJERCICIO LLEVAR EL TAMAÑO A LA MEDIDA MAS CERCANA
                echo "<tr>";
                echo "<td>$archivo</td>";
                echo "<td>$tipo_mime</td>";
                echo "<td>$tamaño</td>";
                echo <<<FORM
                    <td><form action="{$_SERVER['PHP_SELF']}" method="POST">
                        <input type="hidden" name="archivo" value="$archivo">
                        <input type="submit" name="operacion" value="Descarga">
                    </form>
                    </td>
                FORM;
                echo "</tr>";
            }
        }
        echo "</tbody>";
        echo "</table>";
    }

    fin_html();
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Descarga del archivo con post
    if (isset($_POST['archivo'])) {
        $archivo_saneado = filter_input(INPUT_POST, 'archivo', FILTER_SANITIZE_SPECIAL_CHARS);
        $archivo_saneado = htmlspecialchars($_POST['archivo']);
        $tipo_mime = mime_content_type(DIRECTORIO_ARCHIVOS . "/$archivo_saneado");
        header("Content-type: $tipo_mime");
        header("Content-disposition: attachment:filename='$archivo_saneado'");
        if (file_exists(DIRECTORIO_ARCHIVOS . "/$archivo_saneado")) {
            readfile(DIRECTORIO_ARCHIVOS . "/$archivo_saneado");
        }
    }
}
