-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02/10/2025 às 00:37
-- Versão do servidor: 9.1.0
-- Versão do PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc-mmm`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `horario` enum('manha-segunda','manha-terça','manha-quarta','manha-quinta','manha-sexta','manha-sabado','tarde-segunda','tarde-terça','tarde-quarta','tarde-quinta','tarde-sexta','tarde-sabado','noite-segunda','noite-terça','noite-quarta','noite-quinta','noite-sexta','noite-sabado') NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
CREATE TABLE IF NOT EXISTS `disciplina` (
  `id_disciplina` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(55) NOT NULL,
  `duraçao` int NOT NULL,
  `nivel_necessario` varchar(55) NOT NULL,
  PRIMARY KEY (`id_disciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina_curso`
--

DROP TABLE IF EXISTS `disciplina_curso`;
CREATE TABLE IF NOT EXISTS `disciplina_curso` (
  `id_disciplina` int NOT NULL,
  `id_curso` int NOT NULL,
  PRIMARY KEY (`id_disciplina`,`id_curso`),
  KEY `id_curso` (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE IF NOT EXISTS `professor` (
  `id_professor` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` int NOT NULL,
  `trabalha-sabado` tinyint(1) NOT NULL,
  `turno` enum('manha','tarde','noite','manha-tarde','manha-noite','tarde-noite') NOT NULL,
  PRIMARY KEY (`id_professor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor_habilidade`
--

DROP TABLE IF EXISTS `professor_habilidade`;
CREATE TABLE IF NOT EXISTS `professor_habilidade` (
  `id_professor` int NOT NULL,
  `id_disciplina` int NOT NULL,
  PRIMARY KEY (`id_professor`,`id_disciplina`),
  KEY `id_disciplina` (`id_disciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `id_turma` int NOT NULL AUTO_INCREMENT,
  `id_professor` int NOT NULL,
  `id_disciplina` int NOT NULL,
  `modulo` int NOT NULL,
  `turno` varchar(55) NOT NULL,
  PRIMARY KEY (`id_turma`),
  KEY `id_professor` (`id_professor`),
  KEY `id_disciplina` (`id_disciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `disciplina_curso`
--
ALTER TABLE `disciplina_curso`
  ADD CONSTRAINT `disciplina_curso_ibfk_1` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `disciplina_curso_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Restrições para tabelas `professor_habilidade`
--
ALTER TABLE `professor_habilidade`
  ADD CONSTRAINT `professor_habilidade_ibfk_1` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `professor_habilidade_ibfk_2` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id_professor`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Restrições para tabelas `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id_professor`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `turma_ibfk_2` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
