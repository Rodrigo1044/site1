-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 30/10/2024 às 01:11
-- Versão do servidor: 8.0.40
-- Versão do PHP: 8.2.18

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
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(140) NOT NULL,
  `genero` varchar(16) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nascimento` date NOT NULL,
  `chamado` varchar(140) NOT NULL,
  `email` varchar(104) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `estados` varchar(140) NOT NULL,
  `cidades` varchar(140) NOT NULL,
  `senha` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `genero`, `cpf`, `nascimento`, `chamado`, `email`, `numero`, `estados`, `cidades`, `senha`) VALUES
(5, 'rodrigo', 'masculino', '54623085821', '2005-05-20', 'Rod', 'rodrigo@gmail.com', '11984754708', 'SP', 'São Paulo', 1044);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
