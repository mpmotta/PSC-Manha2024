CREATE DATABASE market_2024_1;
USE market_2024_1;
CREATE TABLE cidade(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL
);

CREATE TABLE cliente(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    nascimento DATE DEFAULT '1980-04-20',
    salario DOUBLE DEFAULT 1412.00,
    codCidade INT NOT NULL,
    FOREIGN KEY (codCidade) REFERENCES cidade(id)
);

ALTER TABLE cidade
	ADD COLUMN criado timestamp DEFAULT CURRENT_TIMESTAMP,
    ADD COLUMN editado timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

    ALTER TABLE cliente
	ADD COLUMN criado timestamp DEFAULT CURRENT_TIMESTAMP,
    ADD COLUMN editado timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

-- criando tabela usuario

    CREATE TABLE usuario(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(200) NOT NULL,
    senha VARCHAR(300) NOT NULL,
    admin BOOLEAN DEFAULT 0
);

-- inserindo usuario admin, senha 1234
INSERT INTO usuario (nome, email, senha, admin) VALUES ('Administrador', 'admin@loja.com', '81dc9bdb52d04dc20036dbd8313ed055', 1);