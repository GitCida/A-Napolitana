CREATE DATABASE plataformaANapolitana;
USE plataformaANapolitana;

CREATE TABLE produto (
  id_produto INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(50) NOT NULL,
  categoria VARCHAR(50),
  preco DECIMAL(10,2) NOT NULL
);

CREATE TABLE estoque (
  id_estoque INT AUTO_INCREMENT PRIMARY KEY,
  nome_ingrediente VARCHAR(50) NOT NULL,
  quantidade_atual INT NOT NULL,
  unidade_medida VARCHAR(10) NOT NULL,
  data_atualizacao DATETIME
);

CREATE TABLE venda (
  id_venda INT AUTO_INCREMENT PRIMARY KEY,
  data_hora DATETIME,
  soma_venda DECIMAL(10,2) NOT NULL,
  forma_pagamento VARCHAR(20) NOT NULL
);

CREATE TABLE ItemVenda (
  id_item_venda INT AUTO_INCREMENT PRIMARY KEY,
  id_venda INT NOT NULL,
  id_produto INT NOT NULL,
  quantidade INT NOT NULL,
  preco_unitario DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (id_venda) REFERENCES Venda(id_venda),
  FOREIGN KEY (id_produto) REFERENCES Produto(id_produto)
);
