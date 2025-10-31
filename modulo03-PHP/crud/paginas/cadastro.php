<!DOCTYPE html>
<html lang="en">
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
        <form action="cadastro.php" method="POST">
            <h2>Cadastro de Aluno</h2>

            <label for="nome">nome:</label>
            <input type="text" name="nome" id="nome">

            <label for="sobrenome">sobrenome:</label>
            <input type="text" name="sobrenome" id="sobrenome">

            <label for="email">E-mail: </label>
            <input type="email" name="email" id="emial">

            <label for="curso">Selecione:</label>
            <select name="curso" id="curso">
                <option value="ads">Analise e Desenvolvimento de Sistemas</option>
                <option value="es">Engeharia de Software</option>
                <option value="si">Sistema da Informacao</option>
                <option value="cc">Ciencias da computacao</option>
            </select>
            <input type="submit" value="cadastrar">
        </form>
    </main>
    <?php
        try{
            if($_SERVER["REQUESt_METHOD"] == "POST"){
                include("../conexao/conexao.php");
                $nome = $_POST["nome"];
                $sobrenome = $_POST["sobrenome"];
                $email = $_POST["email"];
                $curso = $_POST["curso"];
                $hoje = new DateTime();
                echo $hoje->format("Ym") . rand(100,999);

                echo $id;

                $sql = "INSERT INTO usuarios (id, nome, sobrenone, email, cursos) values (?,?,?,?,?)";
                $stmt = $conn->prepare($sql);

                $stmt->bind_param("issss,$id,$nome,$sobrenome,$emsil,$curso");
                echo "<div class='mensagem sucesso'>usuario cadastrado </div>";
                $stmt->close();
                $conn->close();
            }
        }

        catch(mysqli_sql_exceptiom $e){
            if (str_contains($e->getMessage(), "Duplicate entry")){
                echo "<div class'mensagem erro'>E-mail ja esta cadastrado </div>";
            } else {
                echo "<div class='mensagem erro'> Erro ao cadastrar, tente novamente </div>";
            }
            
        }

    ?>
</body>
</html>