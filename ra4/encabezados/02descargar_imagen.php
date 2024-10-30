<?php
$imagen = filter_input(INPUT_GET, 'imagen', FILTER_SANITIZE_NUMBER_INT);

$imagen_validada = filter_var($imagen, FILTER_VALIDATE_INT);

switch (intval($imagen)) {
    case 1: {
            $archivo = "/var/www/dwes.com/ra4/imagenes/architecture.png";
            if (file_exists($archivo)) {
                $tipo_mime = mime_content_type($archivo);
                readfile($archivo);
            }
        }


    case 2: {
            $archivo = "/var/www/dwes.com/ra4/imagenes/chord.png";
            if (file_exists($archivo)) {
                $tipo_mime = mime_content_type($archivo);
                readfile($archivo);
            }
        }
}
