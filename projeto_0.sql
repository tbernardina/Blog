-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/08/2024 às 21:07
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
-- Banco de dados: `projeto_0`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `COMENT_ID` int(11) NOT NULL,
  `POST_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `CONTEUDO` text NOT NULL,
  `DATA_PUBLICACAO` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts`
--

CREATE TABLE `posts` (
  `POST_ID` int(11) NOT NULL,
  `TITULO` varchar(255) NOT NULL,
  `CONTEUDO` text DEFAULT NULL,
  `ANEXOS` varchar(100) DEFAULT NULL,
  `USER_ID` int(11) NOT NULL,
  `DATA_PUBLICACAO` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `posts`
--

INSERT INTO `posts` (`POST_ID`, `TITULO`, `CONTEUDO`, `ANEXOS`, `USER_ID`, `DATA_PUBLICACAO`) VALUES
(6, 'Teste', 'Chupa Mulambada', NULL, 11, '2024-08-19 15:42:42');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `USER_ID` int(11) NOT NULL,
  `NOME` varchar(20) NOT NULL,
  `SOBRENOME` varchar(50) NOT NULL,
  `SENHA` varchar(16) NOT NULL,
  `NICKNAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`USER_ID`, `NOME`, `SOBRENOME`, `SENHA`, `NICKNAME`) VALUES
(10, 'Thiago', 'Reis Dalla Bernardina', 'reis2004', 'tbernardina'),
(11, 'Chupa', 'Membro', '12345678', 'ChupaMembro'),
(12, 'teste', 'teste', 'teste', 'teste');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`COMENT_ID`),
  ADD KEY `link_comentario_post` (`POST_ID`),
  ADD KEY `link_comentario_user` (`USER_ID`);

--
-- Índices de tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`POST_ID`),
  ADD KEY `link_post_usuario` (`USER_ID`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `COMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `POST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `link_comentario_post` FOREIGN KEY (`POST_ID`) REFERENCES `posts` (`POST_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `link_comentario_user` FOREIGN KEY (`USER_ID`) REFERENCES `usuario` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `link_post_usuario` FOREIGN KEY (`USER_ID`) REFERENCES `usuario` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
