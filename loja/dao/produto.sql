CREATE table produto(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
	descricao text not null,
    valor DOUBLE not null,
    criado timestamp DEFAULT CURRENT_TIMESTAMP,
    editado timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );
