-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/11/2024 às 03:37
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `login`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `item_pedido`
--

CREATE TABLE `item_pedido` (
  `idItem` int(11) NOT NULL,
  `idPedido` int(11) DEFAULT NULL,
  `idMovel` int(11) NOT NULL,
  `valorMovel` double NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `item_pedido`
--

INSERT INTO `item_pedido` (`idItem`, `idPedido`, `idMovel`, `valorMovel`, `idUsuario`) VALUES
(1, NULL, 1, 1299.99, 1),
(20, NULL, 3, 1000.99, 1),
(56, 40, 1, 1299.99, 17),
(57, 40, 2, 989.99, 17),
(58, 41, 1, 1299.99, 19),
(59, 41, 2, 989.99, 19),
(60, 42, 3, 1000.99, 19),
(61, 42, 2, 989.99, 19),
(62, NULL, 3, 1000.99, 19);

-- --------------------------------------------------------

--
-- Estrutura para tabela `moveis`
--

CREATE TABLE `moveis` (
  `idmovel` int(30) NOT NULL,
  `Nome` varchar(40) DEFAULT NULL,
  `Categoria` varchar(40) DEFAULT NULL,
  `Modelo` varchar(40) DEFAULT NULL,
  `cor` varchar(40) DEFAULT NULL,
  `EndImagem` varchar(100) NOT NULL,
  `preco` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `moveis`
--

INSERT INTO `moveis` (`idmovel`, `Nome`, `Categoria`, `Modelo`, `cor`, `EndImagem`, `preco`) VALUES
(1, 'Sofá 2 lugares', 'Sofa', 'riot games', 'Mercurio', 'img/foto1.png', 1299.99),
(2, 'Armário de Cozinha - 6 Portas', 'Armario', 'riot games', 'branco', 'img/foto2.png', 989.99),
(3, 'Cama de casal', 'Cama', 'Cama box', 'Marrom', 'img/foto3.png', 1000.99),
(4, 'Mesa', 'Mesa', 'Mesa de mármore', 'branco', 'img/foto4.png', 650);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `valorPedido` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedido`
--

INSERT INTO `pedido` (`idPedido`, `idUsuario`, `valorPedido`) VALUES
(1, 1, 100),
(3, 7, 90),
(40, 17, 2289.98),
(41, 19, 2289.98),
(42, 19, 1990.98);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(30) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `email`) VALUES
(1, 'Miguel', '123', 'maads2006@gmail.com'),
(7, 'as', '123', 'as@gmail.com'),
(8, 'Bruno Nunes', '123', 'bruno@hotmail.com'),
(17, 'Davi do Carmo', '123', 'davi@gmail.com'),
(18, 'Davi do Carmo', '123', 'maads2006@gmail.com'),
(19, 'bruno', '1234', 'brunonunes2001@outlook.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `item_pedido`
--
ALTER TABLE `item_pedido`
  ADD PRIMARY KEY (`idItem`),
  ADD KEY `fk_itemPedido_Pedido` (`idPedido`),
  ADD KEY `fk_itemPedido_Movel` (`idMovel`);

--
-- Índices de tabela `moveis`
--
ALTER TABLE `moveis`
  ADD PRIMARY KEY (`idmovel`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `fk_pedido_Usuario` (`idUsuario`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `item_pedido`
--
ALTER TABLE `item_pedido`
  MODIFY `idItem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `moveis`
--
ALTER TABLE `moveis`
  MODIFY `idmovel` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `item_pedido`
--
ALTER TABLE `item_pedido`
  ADD CONSTRAINT `fk_itemPedido_Movel` FOREIGN KEY (`idMovel`) REFERENCES `moveis` (`idmovel`),
  ADD CONSTRAINT `fk_itemPedido_Pedido` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`);

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_Usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
