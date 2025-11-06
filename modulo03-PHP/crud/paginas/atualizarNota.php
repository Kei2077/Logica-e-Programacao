<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styleCadastrar.css">
    <title>Atualizar nota</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="cadastro.php">Cadastrar usuario</a></li>
                <li><a href="verificarUsuario.php">Procurar Usuario</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="containerSection">
            <form action="atualizarNota.php" method="post">
                <select name="curso" id="curso" required>
                    <option value="ads">Analise e Desenvolvimento de Sistemas</option>
                    <option value="es">Engeharia de Software</option>
                    <option value="si">Sistema da Informacao</option>
                    <option value="cc">Ciencias da computacao</option>
                </select>
                <input type="submit" value="Buscar">
            </form>
        </section>
        <section>
            <?php
                if (isset($_POST["curso"])) {
                    include("../conexao/conexao.php");
                    $curso = $_POST["curso"];

                    $sql = "SELECT * FROM usuarios WHERE curso = ?";
                    $stmt = $conn->prepare($sql);

                    if ($stmt){
                        $stmt->bind_param("s", $curso);
                        $stmt->execute();
                        $resultado = $stmt->get_result();

                       if ($resultado->num_rows > 0) {
                            $cursos = [
                                "ads" => "ANALISE E DESENVOLVIMENTO DE SISTEMAS",
                                "es" => "ENGENHARIA DE SOFTWARE",
                                "si" => "SISTEMA DA INFORMACAO",
                                "cc" => "CIENCIAS DA COMPUTACAO"
                            ];
                            $nomeCurso = $cursos[$curso];
                            echo "<form action='processaNota.php' method='post' id='form-nota'>
                                <table>
                                    <thead> 
                                        <tr>ID</tr>
                                        <tr>NOme</tr>
                                        <tr>Sobrenome</tr>
                                        <tr>Nota Ativdade</tr>
                                        <tr>Nota Prova</tr>
                                    </thead>
                                </table>
                            </form>";

                            while ($row = $resultado->fetch_assoc()) {
                                echo "<tr>
                                    <td>{row['id']}</td>
                                        <td>{row['nome']}</td>
                                        <td>{row['sobrenome']}</td>
                                        <td><input type='number' name='nota_atividade[{$row['id']}]' required></td>
                                        <td><input type='number' name='nota_atividade[{$row['id']}] required></td>
                                    </tr>"
                            echo "</tbody>"
                        } else {
                            echo"<div class='mensagem erro'>O curso nao possui alunos cadastrados</div>";

                        }
                    }
                }
            ?>
        </section>
    </main>
</body>
</html>