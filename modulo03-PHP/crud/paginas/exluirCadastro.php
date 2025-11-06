<?php
    if(isset(["id"])){
        include("../conexao/conexao.php");

        $id = $_POST["id"];
        $sql = "DELETE FROM usuarios WHERE ID = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $id);

            $stmt->execute();
            header("Location: Verificarusuario.php");
            $stmt->close();
        } else {
            echo "<div class='mensagem erro'>Erro</div>";
        }

    }
?>