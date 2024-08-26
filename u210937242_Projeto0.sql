-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 26/08/2024 às 12:01
-- Versão do servidor: 10.11.8-MariaDB-cll-lve
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u210937242_Projeto0`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `u210937242_comentario`
--

CREATE TABLE `u210937242_comentario` (
  `COMENT_ID` int(11) NOT NULL,
  `POST_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `CONTEUDO` text NOT NULL,
  `DATA_PUBLICACAO` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `u210937242_posts`
--

CREATE TABLE `u210937242_posts` (
  `POST_ID` int(11) NOT NULL,
  `TITULO` varchar(255) NOT NULL,
  `CONTEUDO` text DEFAULT NULL,
  `ANEXOS` varchar(100) DEFAULT NULL,
  `USER_ID` int(11) NOT NULL,
  `DATA_PUBLICACAO` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `u210937242_posts`
--

INSERT INTO `u210937242_posts` (`POST_ID`, `TITULO`, `CONTEUDO`, `ANEXOS`, `USER_ID`, `DATA_PUBLICACAO`) VALUES
(7, 'BEM VINDOS!!!', 'Você acaba de chegar no site de postagem de Thiago Reis Dalla Bernardina e Jonas Moreira Nascimento, faça sua primeira postagem clicando em \"Criar post\" e socialize comentando na postagem dos outros usuários.', 'emoji_joinha.png', 10, '2024-08-26 10:54:57');

-- --------------------------------------------------------

--
-- Estrutura para tabela `u210937242_usuario`
--

CREATE TABLE `u210937242_usuario` (
  `USER_ID` int(11) NOT NULL,
  `NOME` varchar(20) NOT NULL,
  `SOBRENOME` varchar(50) NOT NULL,
  `SENHA` varchar(16) NOT NULL,
  `NICKNAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `u210937242_usuario`
--

INSERT INTO `u210937242_usuario` (`USER_ID`, `NOME`, `SOBRENOME`, `SENHA`, `NICKNAME`) VALUES
(10, 'Thiago', 'Reis Dalla Bernardina', 'reis2004', 'tbernardina'),
(12, 'teste', 'teste', 'teste', 'teste'),
(13, 'Scheila ', 'Reis', '1234', 'Scheila ');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `u210937242_comentario`
--
ALTER TABLE `u210937242_comentario`
  ADD PRIMARY KEY (`COMENT_ID`),
  ADD KEY `link_comentario_post` (`POST_ID`),
  ADD KEY `link_comentario_user` (`USER_ID`);

--
-- Índices de tabela `u210937242_posts`
--
ALTER TABLE `u210937242_posts`
  ADD PRIMARY KEY (`POST_ID`),
  ADD KEY `link_post_usuario` (`USER_ID`);

--
-- Índices de tabela `u210937242_usuario`
--
ALTER TABLE `u210937242_usuario`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `u210937242_comentario`
--
ALTER TABLE `u210937242_comentario`
  MODIFY `COMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `u210937242_posts`
--
ALTER TABLE `u210937242_posts`
  MODIFY `POST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `u210937242_usuario`
--
ALTER TABLE `u210937242_usuario`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `u210937242_comentario`
--
ALTER TABLE `u210937242_comentario`
  ADD CONSTRAINT `link_post_comentario` FOREIGN KEY (`POST_ID`) REFERENCES `u210937242_posts` (`POST_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `link_usuario_comentario` FOREIGN KEY (`USER_ID`) REFERENCES `u210937242_usuario` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `u210937242_posts`
--
ALTER TABLE `u210937242_posts`
  ADD CONSTRAINT `link_post_usuario` FOREIGN KEY (`USER_ID`) REFERENCES `u210937242_usuario` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
