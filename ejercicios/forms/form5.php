<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");


ini_set("upload_max_filesize", 500 * 1024);

define("PRECIO_DESAYUNO", 20);
// Arrya destinos
$destinos = [
    "paris" => array('nombre' => 'París', 'precio' => 100),
    "londres" => array('nombre' => 'Londres', 'precio' => 120),
    "estocolmo" => array('nombre' => 'Estocolmo', 'precio' => 200),
    "edinburgo" => array('nombre' => 'Edinburgo', 'precio' => 175),
    "praga" => array('nombre' => 'Praga', 'precio' => 125),
    "viena" => array('nombre' => 'Viena', 'precio' => 150),
];

// Array compañias
$companias = [
    "miair" => array('nombre' => 'MYAir', 'precio' => 0),
    "airfly" => array('nombre' => 'AirFly', 'precio' => 50),
    "vuelaconmigo" => array('nombre' => 'VuelaConmigo', 'precio' => 75),
    "apedalesair" => array('nombre' => 'ApedalesAir', 'precio' => 150),
];

// Array hoteles
$hoteles = [
    3 => 0,
    4 => 40,
    5 => 100
];

$extras = [
    'vg' => array('nombre' => 'Visita Guiada', 'precio' => 200),
    'bt' => array('nombre' => 'Bus turístico', 'precio' => 30),
    '2mf' => array('nombre' => '2ª Maleta Facturada', 'precio' => 20),
    'sv' => array('nombre' => 'Seguro de Viaje', 'precio' => 30),
];

// Página autogenerada. EL formulario se presenta con get y la respuesta se genera con post
inicio_html("Actividad 05", ["/styles/forms.css", "/styles/general.css"]);

// Pagina autoprocesada. EL formulario se presenta con GET y el proceso se hace con POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Se procesa el pformulario
    // si hay sticky form, se inicializan las variables con los datos del formulario para iniciar los valores de los controles del formulario

    $responsable = filter_input(INPUT_POST, 'responsable', FILTER_SANITIZE_SPECIAL_CHARS);
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_NUMBER_INT);
    //$telefono = filter_var($telefono, FILTER_VALIDATE_INT);
    $telefono = preg_match("/[0-9]{9}/", $telefono) == 0 ? "" : $telefono;

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    $destino = filter_input(INPUT_POST, 'destino', FILTER_SANITIZE_SPECIAL_CHARS);
    $destino = array_key_exists($destino, $destinos) ? $destino : false;

    $compania = filter_input(INPUT_POST, 'compania', FILTER_SANITIZE_SPECIAL_CHARS);
    $compania = array_key_exists($compania, $companias) ? $compania : false;

    $hotel = filter_input(INPUT_POST, 'hotel', FILTER_SANITIZE_NUMBER_INT);
    $hotel = filter_var(
        $hotel,
        FILTER_VALIDATE_INT,
        array(
            'min_range' => 3,
            'max_range' => 5,
            'default' => 3
        )
    );


    //$hotel = $hotel >= 3 && $hotel <= 5 ? $hotel : 3;

    $desayuno = isset($_POST['desayuno']) && $_POST['desayuno'] == 'on';

    $personas = filter_input(INPUT_POST, 'personas', FILTER_SANITIZE_NUMBER_INT);
    $personas = filter_var(
        $personas,
        FILTER_VALIDATE_INT,
        array(
            'min_range' => 5,
            'max_range' => 10,
            'default' => 5
        )
    );

    $dias = filter_input(INPUT_POST, 'dias', FILTER_SANITIZE_NUMBER_INT);
    $dias = $dias == 5 || $dias == 10 || $dias == 15 ? $dias : false;

    $extras_recibido = filter_input(INPUT_POST, 'extras', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
    $extras_ok = true;
    foreach ($extras_recibido as $extra) {
        if (!array_key_exists($extra, $extras)) {
            $extras_ok = false;
            break;
        } else {
            $extras_ok = true;
        }
    }


    // datos recibuidos, saneados y validados
    // se genera el presupuesto

    // se inicia un bufer de salida
    ob_start();

    // datos personales
    echo "<h3>Datos del presupuesto para las vacaciones</h3>";
    echo "Persona responsable $responsable - " . ($email ? $email : "Email no válido") . " <br>";
    echo "Teléfono de contacto: " . ($telefono ? $telefono : "Teléfono no válido") . " <br>";

    $total = 0;
    if ($destino && $personas && $dias) {
        echo "Destino: {$destinos[$destino]['nombre']}<br>";
        echo "Numero de personas: {$personas}<br>";
        echo "Numero de dias: $dias<br>";

        $precio_destino = $destinos[$destino]['precio'] * $dias * $personas;
        echo "Precio por ir a {$destinos[$destino]['nombre']} para $personas personas durante $dias días es de  " . number_format($precio_destino) . " €</p>";
        $total += $precio_destino;
    } else {
        ob_clean();

        echo "<h3>Error. El destino, las personas o los días no son correctas</h3>";
        // enviar el formulario
        mostrar_formulario();
        fin_html();
        ob_flush();
        exit();
    }

    if ($compania && $personas) {
        echo "<p>Línea aérea {$companias[$compania]['nombre']}<br>";
        if (strtoupper($compania) == 'MYAIR ') {
            echo "Sin sobrecoste por línea aérea<br>";
        } else {
            $precio_compania = $companias[$compania]['precio'];
            $total_compania = $precio_compania * intval($personas);
            echo "Suplemento por línea aérea: $total_compania €</p>";
            $total += $total_compania;
        }
    } else {
        ob_clean();
        echo "<h3>Error, la línea aérea o el número de personas es erróneo</h3>";
        mostrar_formulario();
        fin_html();
        ob_flush();
        exit(2);
    }

    if ($hotel && $personas && $dias) {
        echo "<p>Hotel: $hotel *<br>";
        $precio_hotel = $hoteles[$hotel];
        $total_hotel = $precio_hotel * intval($personas) * intval($dias);
        if ($precio_hotel == 0) {
            echo "Sin sobrecoste por hotel de $hotel *</p>";
        } else {
            echo "Suplemento por hotel de $hotel *: $total_hotel €</p>";
        }
    } else {
        ob_clean();
        echo "<h3>Error, la categoria de hotel o el numero de días o personas es erróneo</h3>";
        mostrar_formulario();
        fin_html();
        ob_flush();
        exit(3);
    }

    if ($desayuno) {
        if ($personas && $dias) {
            $total_desayuno = PRECIO_DESAYUNO * intval($personas) * intval($dias);
            echo "<p>Suplemento por desayuno incluido es: $total_desayuno €</p>";
            $total += $total_desayuno;
        } else {
            ob_clean();
            echo "<h3>Error en el número de personas o días</h3>";
            mostrar_formulario();
            fin_html();
            ob_flush();
            exit(4);
        }
    }

    // extras
    if ($extras_ok) {
        $total_extras = 0;
        echo "Se incluyen los siguientes extras: <br>";
        foreach ($extras_recibido as $extra) {
            if ($extra == 'vg') {
                echo "{$extras[$extra]['nombre']} : {$extras[$extra]['precio']} € p/d<br>";
                $total_extras += $extras[$extra]['precio'];
            } else {
                echo "{$extras[$extra]['nombre']} : {$extras[$extra]['precio']} € p/d<br>";
                $total_extras += $extras[$extra]['precio'] * intval($personas) * intval($dias);
            }
        }
        echo "Total extras: $total_extras €<br>";
        $total += $total_extras;
    } else {
        ob_clean();
        echo "<h3>Error, los extras enviados son erroneos</h3>";
        mostrar_formulario();
        fin_html();
        ob_flush();
        exit(5);
    }

    echo "<p>Total del viaje: " . number_format($total) . "€</p>";
    // subida archivo
    if ($_FILES['libro']['error'] == UPLOAD_ERR_OK) {
        $tipos_mime_admitidos = ['application/pdf'];
        $tipos_mime_files = $_FILES['libro']['type'];
        $tipos_mime_funcion = mime_content_type($_FILES['libro']['tmp_name']);

        if ($tipos_mime_files == $tipos_mime_funcion && in_array($tipos_mime_files, $tipos_mime_admitidos)) {
            $path = $_SERVER['DOCUMENT_ROOT'] . "ejercicios/forms/archivos/";
        }
        if (!file_exists($path) && is_dir($path)) {
            if (mkdir($path, 0755)) {
                $nombre_archivo = $_FILES['libro']['name'];
                if (move_uploaded_file($_FILES['libro']['tmp_name'], $nombre_archivo)) {
                    echo "<h3>Archivo $nombre_archivo se ha guardado correctamente</h3>";
                } else {
                    ob_clean();
                    echo "<h3>No se ha guardado el archivo</h3>";
                    mostrar_formulario();
                    fin_html();
                    ob_flush();
                    exit(6);
                }
            }
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Formulario SI NO ES STICKY FORM  
    // si es sticky form, inicializamos los valores de los controles del formulario con valores por defecto
    mostrar_formulario();
}

function mostrar_formulario()
{
    global $destinos, $companias, $hoteles;

    // si es sticky form el formulario viene aqui

?>
    <header>Presupuesto de viaje</header>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="<?= 500 * 1024 ?>">
        <fieldset>
            <legend>Datos del viaje</legend>
            <label for="responsable">Responsable del grupo</label>
            <input type="text" name="responsable" id="responsable" size="40" required>

            <label for="telefono">Telefono</label>
            <input type="text" name="telefono" id="telefono" size="10" required>

            <label for="email">Email</label>
            <input type="text" name="email" id="email" size="30" required>

            <label for="destino">Destino</label>
            <select name="destino" id="destino" size="1">
                <?php
                foreach ($destinos as $clave => $valor) {
                    echo "<option value='$clave'>{$valor['nombre']}</option>";
                }
                ?>
            </select>

            <label for="compania">Compañia</label>
            <select name="compania" id="compania" size="1">
                <?php
                foreach ($companias as $clave => $valor) {
                    echo "<option value='$clave'>{$valor['nombre']}</option>";
                }
                ?>

                <!-- <option value="paris">París</option>
            <option value="londres">Londres</option>
            <option value="estocolmo">Estocolmo</option>
            <option value="edinburgo">Edinburgo</option>
            <option value="praga">Praga</option>
            <option value="viena">Viena</option> -->
            </select>

            <label for="hotel">Hotel</label>
            <select name="hotel" id="hotel" size="1">
                <?php
                foreach ($hoteles as $clave => $valor) {
                    echo "<option value='$clave'>$clave * ($valor €/p/d)</option>";
                }
                ?>
            </select>

            <label for="desayuno">Desayuno incluido</label>
            <input type="checkbox" name="desayuno" id="desayuno">

            <label for="personas">Nº Personas</label>
            <input type="number" name="personas" id="personas" min="5" max="10" value="5">

            <label for="dias">Nº Días</label>
            <div>
                <input type="radio" name="dias" id="dias_5" value="5">5
                <input type="radio" name="dias" id="dias_10" value="10">10
                <input type="radio" name="dias" id="dias_15" value="15">15
            </div>

            <label for="extras[]">Extras</label>
            <div>
                <input type="checkbox" name="extras[]" id="extras_1" value="vg">Visita guiada<br>
                <input type="checkbox" name="extras[]" id="extras_2" value="bt">Bus turístico<br>
                <input type="checkbox" name="extras[]" id="extras_3" value="2mf">2ª Maleta facturada<br>
                <input type="checkbox" name="extras[]" id="extras_4" value="sv">Seguro de viaje<br>
            </div>

            <label for="libro">Copia del libro de familia</label>
            <input type="file" name="libro" id="libro">
        </fieldset>
        <input type="submit" name="operacion" value="Calcular presupuesto">
    </form>

<?php
}
fin_html();
ob_flush();
?>