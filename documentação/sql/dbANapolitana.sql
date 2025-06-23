-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Jun-2025 às 02:10
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbanapolitana`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nome_categoria`) VALUES
(1, 'Sorvete de pote'),
(2, 'Picolé'),
(3, 'Cobertura'),
(4, 'Acompanhamento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formapagamento`
--

CREATE TABLE `formapagamento` (
  `id_formaPagamento` int(11) NOT NULL,
  `nome_formaPagamento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `formapagamento`
--

INSERT INTO `formapagamento` (`id_formaPagamento`, `nome_formaPagamento`) VALUES
(1, 'Dinheiro'),
(2, 'Cartão'),
(3, 'Pix');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nome_marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nome_marca`) VALUES
(1, 'Kibon'),
(2, 'Nestlé');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(50) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `categorias_id_categoria` int(11) NOT NULL,
  `marcas_id_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `preco`, `categorias_id_categoria`, `marcas_id_marca`) VALUES
(2, 'Sorvete de chocolate (Nestlé)', 12.00, 1, 2),
(3, 'Cobertura de morango (Kibon)', 8.00, 3, 1),
(4, 'Picolé de Limão (kibon)', 6.00, 2, 1),
(5, 'Gotas de chocolate (Kibon)', 2.00, 4, 1),
(6, 'Picolé de flocos (Nestlé)', 4.00, 2, 2),
(7, 'Sorvete de morango (Kibon)', 12.00, 1, 1),
(8, 'Picolé de chocolate Nestlé', 6.00, 2, 2),
(9, 'Picolé de Morango (Kibon)', 8.00, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `situacao` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `email`, `senha`, `situacao`) VALUES
(1, 'Maria123', 'maria@gmail.com', '$2y$10$jeIJ1NbDaWzL3dUviM2EI.3p30xQ0BRNjSWcz7hY0WZHuBWyBoOsC', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_venda` int(11) NOT NULL,
  `quantidade_venda` int(11) NOT NULL,
  `valor_venda` decimal(10,2) NOT NULL,
  `produtos_id_produto` int(11) NOT NULL,
  `formaPagamento_id_formaPagamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id_venda`, `quantidade_venda`, `valor_venda`, `produtos_id_produto`, `formaPagamento_id_formaPagamento`) VALUES
(2, 2, 24.00, 2, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `formapagamento`
--
ALTER TABLE `formapagamento`
  ADD PRIMARY KEY (`id_formaPagamento`);

--
-- Índices para tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `categorias_id_categoria` (`categorias_id_categoria`),
  ADD KEY `marcas_id_marca` (`marcas_id_marca`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `produtos_id_produto` (`produtos_id_produto`),
  ADD KEY `formaPagamento_id_formaPagamento` (`formaPagamento_id_formaPagamento`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `formapagamento`
--
ALTER TABLE `formapagamento`
  MODIFY `id_formaPagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `marcas_id_marca` FOREIGN KEY (`marcas_id_marca`) REFERENCES `marcas` (`id_marca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `formaPagamento_id_formaPagamento` FOREIGN KEY (`formaPagamento_id_formaPagamento`) REFERENCES `formapagamento` (`id_formaPagamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produtos_id_produto` FOREIGN KEY (`produtos_id_produto`) REFERENCES `produtos` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
