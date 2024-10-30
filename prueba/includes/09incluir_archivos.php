<?php
include($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");

// Modificacion de las rutas de búsqueda de archivos de php.ini
$include_path_actual = ini_get("include.path"); // Leo el valor actual de include_path
$include_path_actual .= (":" . $_SERVER['DOCUMENT_ROOT'] . "includes"); // Añado el directorio
ini_set("include_path", $include_path_actual); // Asignop el nuevo include_path
//require("funciones.php"); // Solo tengo que poner el nombre del archivo

// Incluir archivos sin modificar el include_path y poniendo la ruta absoluta
require($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");

// A partir de aquí utilizo las funciones de los archivos incluidos
inicio_html("Inclusión de archivos", ['/styles/general.css']);

echo "<h1>Inclusión de ficheros en HTML</h1>";
fin_html();
