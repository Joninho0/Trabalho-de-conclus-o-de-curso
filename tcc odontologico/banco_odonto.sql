create database banco_odonto;

use banco_odonto;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    telefone VARCHAR(15),
    cpf VARCHAR(14) NOT NULL UNIQUE,
    data_nascimento DATE,
    senha VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

SELECT * FROM usuarios;

DELETE FROM usuarios WHERE cpf = '46601353817';

