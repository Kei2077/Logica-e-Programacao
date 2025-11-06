<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Testando conexão...<br>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "faculdade";

// Testar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falhou: " . $conn->connect_error);
} else {
    echo "Conexão bem-sucedida!<br>";
}

// Testar se a tabela existe
$result = $conn->query("SHOW TABLES LIKE 'usuarios'");
if ($result->num_rows > 0) {
    echo "Tabela 'usuarios' existe!<br>";
} else {
    echo "Tabela 'usuarios' NÃO existe!<br>";
}

$conn->close();
?>