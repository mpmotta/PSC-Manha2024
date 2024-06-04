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