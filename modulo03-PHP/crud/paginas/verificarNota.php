<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Nota</title>
    <link rel="stylesheet" href="../estilos/styleVerificar.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="cadastro.php">Cadastrar Usuário</a></li>
                <li><a href="verificarUsuario.php">Procurar Usuário</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="containerSection">
            <form action="VerificarNota.php" method="post">
                <select name="curso" id="curso" class="estilo">
                    <option value="ads">Análise e Desenvolvimento de Sistemas</option>
                    <option value="es">Engenharia de Software</option>
                    <option value="si">Sistema da Informação</option>
                    <option value="cc">Ciências da Computação</option>
                </select>
                <input type="submit" value="Buscar">
            </form>
        </section>
        <section>
            <?php
                if(isset($_POST['curso'])) {
                    include('../conexao/conexao.php');

                    $curso = $_POST['curso'];
                    $sql = 'SELECT * FROM usuarios WHERE curso = ?'; // Corrigido nome da tabela
                    $stmt = $conn->prepare($sql);
                    $cursos_map = [
                        'ads' => 'ADS',
                        'es' => 'ES', 
                        'si' => 'SI',
                        'cc' => 'CC'
                    ];
                    $nomecurso = $cursos_map[$curso];

                    if ($stmt) {
                        $stmt->bind_param('s', $nomecurso); // Corrigido bind_param
                        $stmt->execute();

                        $resultado = $stmt->get_result();

                        if ($resultado->num_rows > 0) {
                        echo "<h1 style='text-align:center;'>$nomeCurso</h1>";
                            echo "<table>
                                    <thead> 
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Sobrenome</th>
                                            <th>Nota Atividade</th>
                                            <th>Nota Prova</th>
                                            <th>Nota Final</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                            
                            while ($row = $resultado->fetch_assoc()) { // Corrigido o loop
                                echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['nome']}</td>
                                        <td>{$row['sobrenome']}</td>
                                        <td>{$row['nota_atividade']}</td>
                                        <td>{$row['nota_prova']}</td>
                                        <td>{$row['nota_final']}</td>
                                    </tr>";
                            }
                            echo "</tbody></table>";
                        } else {
                            echo "<p>Nenhum resultado encontrado.</p>";
                        }
                    } else {
                        echo "<p>Erro na preparação da consulta.</p>";
                    }
                } // Fechando o if principal
            ?>        
        </section>
    </main>    
</body>
</html>