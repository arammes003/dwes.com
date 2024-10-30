<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/funciones.php');


$empleados = [
    '12345678k' => [
        'nombre' => 'Juan',
        'apellidos' => 'García Pérez',
        'email' => 'juanperez@gmail.com',
        'aceptacion' => true,
    ],
    '87654321m' => [
        'nombre' => 'María',
        'apellidos' => 'González López',
        'email' => 'maria@gmail.com',
        'aceptacion' => false,
    ],
    '11111111a' => [
        'nombre' => 'Ana',
        'apellidos' => 'Martínez Sánchez',
        'email' => 'ana@gmail.com',
        'aceptacion' => true,
    ]
];

function validarDatos()
{
    $opciones_filtrado = [
        'dni' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/[0-9]{8}[a-zA-Z]/']
        ],
        'nombre' => FILTER_SANITIZE_SPECIAL_CHARS,
        'apellidos' => FILTER_SANITIZE_SPECIAL_CHARS,
        'email' => FILTER_VALIDATE_EMAIL,
        'aceptacion' => FILTER_VALIDATE_BOOLEAN,
    ];

    subirPDF($_FILES['archivo']);

    $datosSaneados = filter_input_array(INPUT_POST, $opciones_filtrado);

    $dni = isset($datosSaneados['dni']) && preg_match("/[0-9]{8}[a-zA-Z]/", $datosSaneados['dni']) ? $datosSaneados['dni'] : false;
    $nombre = isset($datosSaneados['nombre']) ? $datosSaneados['nombre'] : false;
    $apellidos = isset($datosSaneados['apellidos']) ? $datosSaneados['apellidos'] : false;
    $email = isset($datosSaneados['email']) ? $datosSaneados['email'] : false;
    $aceptacion = isset($datosSaneados['aceptacion']) ? $datosSaneados['aceptacion'] : false;

    if ($dni && $nombre && $apellidos && $email) {
        return [
            'dni' => $dni,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'email' => $email,
            'aceptacion' => $aceptacion
        ];
    } else {
        echo "Error al validar los datos";
        return false;
    }
}

function mostrarEmpleados($empleado)
{
    global $empleados;

    echo "<table border='1'>";
    echo "<tr>
        <th>dni</th>
        <th>nombre</th>
        <th>apellidos</th>
        <th>email</th>
        <th>terminos</th>
    </tr>";
    echo "<tr>";
    echo "<td>{$empleado['dni']}</td>";
    echo "<td>{$empleado['nombre']}</td>";
    echo "<td>{$empleado['apellidos']}</td>";
    echo "<td>{$empleado['email']}</td>";
    echo "<td>" . ($empleado['aceptacion'] ? 'aceptado' : 'no aceptado')  . "</td>";
    echo "</tr>";

    foreach ($empleados as $dni => $value) {
        echo "<tr>";
        echo "<td>$dni</td>";
        echo "<td>{$value['nombre']}</td>";
        echo "<td>{$value['apellidos']}</td>";
        echo "<td>{$value['email']}</td>";
        echo "<td>" . ($value['aceptacion'] ? 'aceptado' : 'no aceptado')  . "</td>";
        echo "</tr>";
    }
}

function subirPDF($archivo)
{
    $tiposAdmitivos = ['application/pdf'];

    // Validamos si el archivo se ha subido correctamente
    if (!isset($archivo) || $archivo['error'] != UPLOAD_ERR_OK) {
        echo "<h2>Error al subir el archivo</h2>";
        return false;
    }

    // Sacamos el nombre del archivo
    $archivoTmp = $archivo['tmp_name'];
    // Sacamos el tipo mime
    $archivoMime = mime_content_type($archivoTmp);

    if ($archivoMime && in_array($archivoMime, $tiposAdmitivos)) {
        $path = $_SERVER['DOCUMENT_ROOT'] . "/prueba/uploads/";

        if (!is_dir($path) && !mkdir($path, 0777, true)) {
            //Error al crear la carpeta
            echo "<h2>Error al crear la carpeta de destino</h2>";
            return false;
        }
        $nombreArchivo = $_POST['dni'] . ".pdf";

        if (move_uploaded_file($archivoTmp, $path . $nombreArchivo)) {
            echo "<h2>Archivo subido correctamente</h2>";
            return true;
        } else {
            echo "<h2>Error al mover el archivo</h2>";
            return false;
        }
    } else {
        echo "<h2>Tipo de archivo no permitido</h2>";
        return false;
    }
}

inicio_html('Formulario 07', ['/styles/forms.css', "/styles/general.css", "/styles/tablas.css"]);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviar'])) {
    if ($datos = validarDatos()) {
        mostrarEmpleados($datos);

        mostrarFormulario($datos);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $datos = [];
    mostrarFormulario($datos);
}

function mostrarFormulario($datos)
{

    global $empleados;
?>
    <header>Solicitud de empleo</header>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Datos del Empleado</legend>

            <label for="dni">Dni</label>
            <input type="text" id="dni" name="dni" value="<?= isset($datos['dni']) ? $datos['dni'] : "" ?>" pattern="[0-9]{8}[a-zA-Z]">

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?= isset($datos['nombre']) ? $datos['nombre'] : "" ?>">

            <label for="apellidos">Apellido</label>
            <input type="text" id="apellido" name="apellidos" value="<?= isset($datos['apellidos']) ? $datos['apellidos'] : "" ?>">

            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?= isset($datos['email']) ? $datos['email'] : "" ?>">


            <label for="aceptacion">Aceptación registro datos personales</label>
            <input type="checkbox" name="aceptacion" id="aceptacion" value="1" <?= isset($datos['aceptacion'])  && $datos['aceptacion'] == '1' ? 'checked' : '' ?>>

            <label for="archivo">CV</label>
            <input type="file" name="archivo" id="archivo">

            <!--
            <div>
                <?php
                foreach ($empleados as $dni => $value) {
                    echo "<input type='checkbox' name='aceptar[]' value='$dni'> $dni - {$value['nombre']} - {$value['apellidos']} checked='<?= isset()?>' <br>";
                }
                ?>
            </div>
            -->
        </fieldset>
        <input type="submit" name="enviar" value="enviar">
    </form>
<?php
}


fin_html();
?>