<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styleCadastrar.css">
    <title>Cadastro</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="#">Cadastrar usuario</a></li>
                <li><a href="verificarUsuario.php">Procurar Usuario</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <!-- Exibir mensagens de sucesso/erro -->
        <?php
        if(isset($sucesso)) {
            echo $sucesso;
        }
        if(isset($erro)) {
            echo $erro;
        }
        ?>
        
        <form action="" method="POST">
            <h2>Cadastro de Aluno</h2>

            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required value="<?php echo isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : ''; ?>">

            <label for="sobrenome">Sobrenome:</label>
            <input type="text" name="sobrenome" id="sobrenome" required value="<?php echo isset($_POST['sobrenome']) ? htmlspecialchars($_POST['sobrenome']) : ''; ?>">

            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">

            <label for="curso">Selecione:</label>
            <select name="curso" id="curso" required>
                <option value="ads" <?php echo (isset($_POST['curso']) && $_POST['curso'] == 'ads') ? 'selected' : ''; ?>>Análise e Desenvolvimento de Sistemas</option>
                <option value="es" <?php echo (isset($_POST['curso']) && $_POST['curso'] == 'es') ? 'selected' : ''; ?>>Engenharia de Software</option>
                <option value="si" <?php echo (isset($_POST['curso']) && $_POST['curso'] == 'si') ? 'selected' : ''; ?>>Sistema da Informação</option>
                <option value="cc" <?php echo (isset($_POST['curso']) && $_POST['curso'] == 'cc') ? 'selected' : ''; ?>>Ciências da Computação</option>
            </select>
            
            <input type="submit" value="Cadastrar">
        </form>
    </main>

<?php
// Configuração de erros
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Processamento do formulário
if($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Incluir conexão
        $caminho_conexao = "../conexao/conexao.php";
        if (!file_exists($caminho_conexao)) {
            throw new Exception("Arquivo de conexão não encontrado!");
        }
        
        include($caminho_conexao);
        
        // Coletar e validar dados
        $nome = trim($_POST["nome"] ?? '');
        $sobrenome = trim($_POST["sobrenome"] ?? '');
        $email = trim($_POST["email"] ?? '');
        $curso = $_POST["curso"] ?? '';
        
        if (empty($nome) || empty($sobrenome) || empty($email) || empty($curso)) {
            throw new Exception("Todos os campos são obrigatórios!");
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("E-mail inválido!");
        }
        
        // Mapear cursos para códigos
        $cursos_map = [
            'ads' => 'ADS',
            'es' => 'ES', 
            'si' => 'SI',
            'cc' => 'CC'
        ];
        
        $curso_codigo = $cursos_map[$curso] ?? 'ADS';
        
        // **CORREÇÃO PRINCIPAL: campo correto é 'curso' não 'cursos'**
        $sql = "INSERT INTO usuarios (nome, sobrenome, email, curso, nota_atividade, nota_prova, nota_final) VALUES (?, ?, ?, ?, 0, 0, 0)";
        
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception("Erro na preparação: " . $conn->error);
        }
        
        $stmt->bind_param("ssss", $nome, $sobrenome, $email, $curso_codigo);
        
        if ($stmt->execute()) {
            $sucesso = "<div style='color: green; padding: 10px; margin: 10px; border: 2px solid green; background: #f0fff0;'>✅ Usuário cadastrado com sucesso!</div>";
        } else {
            // Verificar se é erro de duplicação de email
            if ($conn->errno == 1062) {
                throw new Exception("Este e-mail já está cadastrado!");
            } else {
                throw new Exception("Erro ao cadastrar: " . $stmt->error);
            }
        }
        
        $stmt->close();
        $conn->close();
        
    } catch (Exception $e) {
        $erro = "<div style='color: red; padding: 10px; margin: 10px; border: 2px solid red; background: #fff0f0;'>❌ " . $e->getMessage() . "</div>";
    }
}
?>
</body>
</html>