<?php
function inicio_html($titulo, $estilos)
{ ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $titulo ?></title>

        <?php
        foreach ($estilos as $estilo) {
            echo "\t\t<link rel='stylesheet' type='text/css' href='$estilo'>";
        }
        ?>
    </head>

    <body>
    <?php
}

function fin_html()
{ ?>
    </body>

    </html>
<?php
}
?>