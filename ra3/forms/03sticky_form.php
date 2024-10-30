<?php
/*
    Formularios que presentan por defecto los valores de un envío previo del mismo formulario

    Al generar el formulario se añaden:
        -PAra los inputs el atributo vlue con el valor por defecto añadido mediante sentencia echo abreviada
        - pARA los checkboxs o input type radio se añade el atributo cheked si en el envio previo el campo chekout se activo
        - Para select/option se añade selected al option que se eligió en el envio previo
 */


require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/funciones.php");

inicio_html("Sticky Forms", ['/styles/general.css', '/styles/forms.css']);

$email = isset($_POST['email']) ? $_POST['email'] : "";
$tema = isset($_POST['tema']) ? $_POST['tema'] : "";

?>
<header>Sugerencias del ciudadano</header>
<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
    <fieldset>
        <legend>Introduce tu sugerencia</legend>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" size="20" required>

        <label for="tema">Tema</label>
        <select name="tema" id="tema" size="1">
            <option value="" <?= $tema == "" ? "selected" : "" ?>>Elige un tema...</option>
            <option value="in" <?= $tema == "" ? "selected" : "" ?>>Infraestructuras</option>
            <option value="lc" <?= $tema == "" ? "selected" : "" ?>>Limpieza de calles</option>
            <option value="fe" <?= $tema == "" ? "selected" : "" ?>>Ferias</option>
            <option value="re" <?= $tema == "" ? "selected" : "" ?>>Recogida de enseres</option>
        </select>

        <label for="departamento">Departamento</label>
        <div>
            <input type="radio" name="dpto" id="dpto" value="op">Obra pública<br>
            <input type="radio" name="dpto" id="dpto" value="cf">Concejalia de festejos<br>
            <input type="radio" name="dpto" id="dpto" value="sa">Saneamiento<br>
        </div>

        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" id="titulo" size="40">

        <label for="sugerencia">Sugerencia</label>
        <textarea name="sugerencia" id="sugerencia" rows="3" cols="30"></textarea>
    </fieldset>
    <input type="submit" name="operacion" id="operacion" value="Registrar">
</form>
<?php



fin_html();

?>