DROP DATABASE faculdade;
CREATE DATABASE faculdade;
use faculdade;
CREATE TABLE usuarios(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(20) NOT NULL,
    sobrenome VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    curso VARCHAR(5) NOT NULL,
    nota_atividade DECIMAL(5,2) NOT NULL DEFAULT 0,
    nota_prova DECIMAL(5,2) NOT NULL DEFAULT 0,
    nota_final DECIMAL(5,2) NOT NULL DEFAULT 0
);

-- Primeiro insira alguns dados de teste
INSERT INTO usuarios (nome, sobrenome, email, curso) VALUES 
('João', 'Silva', 'joao@email.com', 'ADS'),
('Maria', 'Santos', 'maria@email.com', 'ES');

-- Agora sim pode visualizar os dados
SELECT * FROM usuarios;

SHOW TABLES;