<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>introducao php</title>
</head>
<body>
    <h1>
        <?php
            echo "Hello World";
        ?>
    </h1>
    <h2>
        variaveis em PHP
    </h2>

    <p>
        <?php
            $nome = "Matthew";
            $sobre = "Light";

            echo "Nome $nome $sobrenome <br>";
        ?>
    </p>

    <h2> constantes em PHP </h2>
    <p>
        <?php
            const facul = "UMC";
            const cidade = "Mogi";

            echo "Faculdade". " " . facul . "<br>";
            echo "cidade" . " " . cidade . "<br>";
        ?>
    </p>
</body>
</html>