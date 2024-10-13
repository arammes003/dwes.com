<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios</title>
</head>

<body>
    <?php
    $con_beca = true;
    $nombre = "Adri";
    ?>
    <form action="" method="POST">
        <input type="checkbox" <?= $con_beca ? "checked" : "" ?>>Con beca<br>
        <input type="text" name="nombre" size="30" value="<?= isset($nombre) ? $nombre : "" ?>">
        <button>Enviar</button>
    </form>

    <h2>Operador de fusion NULL</h2>
    <?php
    

    ?>
</body>

</html>