<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="stylephp.css">
</head>
<body>
    <main class="container">
        <h1>Dados Enviados</h1>
        <?php
            // var_dump($_REQUEST['nome']);
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobreNome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];

            echo "<p id='nome'><strong>O seu nome: </strong> $nome </p>";
            echo "<p><strong>O seu sobrenome: </strong> $sobrenome </p>";
            echo "<p><strong>O seu email: </strong> $email </p>";
            echo "<p><strong>A sua senha: </strong> $senha </p>";
        ?>
</body>
</html>