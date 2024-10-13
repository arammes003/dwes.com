<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");
inicio_html("Proceso de formulario 1", ["/estilos/general.css"]);

if ($_SERVER['REQUEST_METHOD' == 'POST']) {

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $clave = $_POST['clave'];
    $linkedin = $_POST['linkedin'];
    $fecha_disponible = $_POST['fecha_disponible'];
    $hora_entrevista = $_POST['hora_entrevista'];
    $salario = $_POST['salario'];
    $areas = $_POST['areas']; // ARRAY
    $modalidad = $_POST['modalidad'];
    $tipo_contrato = $_POST['tipo_contrato'];
    $habilidades = $_POST['habilidades']; // ARRAY
    $comentarios = $_POST['comentarios'];
    $operacion = $_POST['operacion'];


    echo "Nombre: $nombre<br>";
    echo "Email: $email<br>";
    echo "Clave: $clave<br>";
    echo "URL perfil: $linkedin<br>";
    echo "Fecha disponibilidad: $fecha_disponible<br>";
    echo "Hora entrevista: $hora_entrevista<br>";
    echo "Salario: $salario<br>";
    $areas_interes = [
        "ds" => "Desarrollo software",
        'dg' => 'Desarrollo gráfico',
        'm' => 'Marketing',
        'rh' => 'Recursos humanos',
    ];

    echo "Areas de interés: ";
    foreach ($areas as $area) {
        if (array_key_exists($area, $areas_interes))
            echo "$areas_interes[$area] ";
    }
    echo "<br>";
    echo "Modalidad: $modalidad<br>";
    echo "Tipo de contrato: $tipo_contrato<br>";
    echo "Habilidades: ";
    foreach ($habilidades as $habilidad) {
        echo "$habilidad ";
    }
    echo "<br>";
    echo "Comentarios: $comentarios<br>";
    echo "Operación: $operacion<br>";
} else {
    echo "<h3>Error mongolo</h3>";
}

fin_html();
