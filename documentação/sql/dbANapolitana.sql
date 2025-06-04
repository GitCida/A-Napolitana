CREATE DATABASE dbanapolitana;
USE dbanapolitana;

CREATE TABLE categorias (
  id_categoria int(11) NOT NULL AUTO_INCREMENT,
  nome_categoria varchar(50) NOT NULL,
  PRIMARY KEY (id_categoria)
);

CREATE TABLE estoque (
  id_estoque int(11) NOT NULL AUTO_INCREMENT,
  quantidade_atual int(11) DEFAULT NULL,
  data_atualizacao datetime NOT NULL,
  unidadesMedidas_id_unidademedida int(11) NOT NULL,
  produtos_id_produto int(11) NOT NULL,
  PRIMARY KEY (id_estoque)
);

CREATE TABLE formapagamento (
  id_formaPagamento int(11) NOT NULL AUTO_INCREMENT,
  nome_formaPagamento varchar(20) NOT NULL,
  PRIMARY KEY (id_formaPagamento)
);

CREATE TABLE itemvenda (
  id_itemVenda int(11) NOT NULL AUTO_INCREMENT,
  quantidade_venda int(11) NOT NULL,
  preco_unitario decimal(10,2) NOT NULL,
  produtos_id_produto int(11) NOT NULL,
  vendas_id_venda int(11) NOT NULL,
  PRIMARY KEY (id_itemVenda)
);

CREATE TABLE produtos (
  id_produto int(11) NOT NULL AUTO_INCREMENT,
  nome_produto varchar(50) NOT NULL,
  preco decimal(10,2) NOT NULL,
  categorias_id_categoria int(11) NOT NULL,
  PRIMARY KEY (id_produto)
);

CREATE TABLE unidadesmedidas (
  id_unidadeMedida int(11) NOT NULL AUTO_INCREMENT,
  sigla varchar(10) NOT NULL,
  PRIMARY KEY (id_unidadeMedida)
);

CREATE TABLE usuarios (
  id_usuario int(11) NOT NULL AUTO_INCREMENT,
  nome_usuario varchar(80) NOT NULL,
  email varchar(80) NOT NULL,
  senha varchar(64) NOT NULL,
  situacao int(1) NOT NULL,
  PRIMARY KEY (id_usuario)
);

CREATE TABLE vendas (
  id_venda int(11) NOT NULL AUTO_INCREMENT,
  data_hora datetime NOT NULL,
  valor_venda decimal(10,2) NOT NULL,
  formaPagamento_id_formaPagamento int(11) NOT NULL,
  PRIMARY KEY (id_venda)
);

ALTER TABLE estoque
  ADD CONSTRAINT produto_id_produto FOREIGN KEY (produtos_id_produto) REFERENCES produtos(id_produto),
  ADD CONSTRAINT unidadesMedidas_id_unidademedida FOREIGN KEY (unidadesMedidas_id_unidademedida) REFERENCES unidadesmedidas(id_unidadeMedida) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE itemvenda
  ADD CONSTRAINT produtos_id_produto FOREIGN KEY (produtos_id_produto) REFERENCES produtos(id_produto) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT vendas_id_venda FOREIGN KEY (vendas_id_venda) REFERENCES vendas(id_venda) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE produtos
  ADD CONSTRAINT categorias_id_categoria FOREIGN KEY (categorias_id_categoria) REFERENCES categorias(id_categoria) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE vendas
  ADD CONSTRAINT formaPagamento_id_formaPagamento FOREIGN KEY (formaPagamento_id_formaPagamento) REFERENCES formapagamento(id_formaPagamento) ON DELETE CASCADE ON UPDATE CASCADE;
