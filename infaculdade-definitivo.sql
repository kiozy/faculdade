-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09-Ago-2015 às 03:55
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `infaculdade`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `cod_aluno` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_turma` int(11) unsigned DEFAULT NULL,
  `cod_usuario` int(11) unsigned NOT NULL,
  `matricula_aluno` int(11) NOT NULL,
  `nome_aluno` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` char(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_aluno`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `matricula_aluno` (`matricula_aluno`),
  KEY `cod_turma_aluno_fk_idx` (`cod_turma`),
  KEY `cod_usuario_aluno_fk_idx` (`cod_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`cod_aluno`, `cod_turma`, `cod_usuario`, `matricula_aluno`, `nome_aluno`, `cpf`) VALUES
(1, NULL, 28, 24, 'Dorminhocoson', '1212'),
(2, NULL, 29, 25, 'pudim', '12212'),
(3, NULL, 30, 26, 'Nhac', '1221322'),
(4, NULL, 31, 8001, 'Trogdor ', '09876');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE IF NOT EXISTS `disciplina` (
  `cod_disciplina` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_disc` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ementa` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_disciplina`),
  UNIQUE KEY `nome_disc` (`nome_disc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`cod_disciplina`, `nome_disc`, `ementa`) VALUES
(1, 'Queijo', 'comer queijo'),
(2, 'Batata', 'comer batata'),
(3, 'banco de dados', '???');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE IF NOT EXISTS `endereco` (
  `cod_endereco` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(10) unsigned NOT NULL,
  `endereco` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_endereco`),
  KEY `cod_usuario` (`cod_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`cod_endereco`, `cod_usuario`, `endereco`, `numero`, `bairro`) VALUES
(7, 24, 'Fundo do Oceano', '42', 'Pacífico'),
(10, 27, 'idk', 'idk', 'idk'),
(11, 28, 'Dormir', '1', 'Dormir'),
(12, 29, 'Dormir', '1', 'Dormir'),
(13, 30, 'Dormir', '1', 'Dormir'),
(14, 31, 'pudim', '12', 'pudim'),
(15, 32, 'igo', '13', 'igor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notafalta`
--

CREATE TABLE IF NOT EXISTS `notafalta` (
  `cod_nf` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nota` decimal(4,2) NOT NULL DEFAULT '0.00',
  `falta` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `cod_aluno` int(10) unsigned NOT NULL,
  `cod_disciplina` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cod_nf`),
  UNIQUE KEY `cod_aluno` (`cod_aluno`,`cod_disciplina`),
  KEY `nf_coddisc_fk` (`cod_disciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto`
--

CREATE TABLE IF NOT EXISTS `ponto` (
  `cod_ponto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_prof` int(11) unsigned NOT NULL,
  `hi` datetime NOT NULL,
  `hf` datetime DEFAULT NULL,
  `ht` time DEFAULT NULL,
  PRIMARY KEY (`cod_ponto`),
  UNIQUE KEY `uc_profentrada` (`cod_prof`,`hi`),
  KEY `cod_prof_ponto_fk_idx` (`cod_prof`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `ponto`
--

INSERT INTO `ponto` (`cod_ponto`, `cod_prof`, `hi`, `hf`, `ht`) VALUES
(1, 5, '2015-08-06 12:12:00', '2015-08-06 01:01:00', '-11:11:00'),
(4, 5, '2015-08-06 14:12:00', '2015-08-06 03:01:00', NULL),
(6, 5, '2015-08-06 17:12:00', '2015-08-06 18:13:00', NULL),
(9, 5, '2015-08-06 23:12:00', '2015-08-06 23:35:00', NULL),
(10, 5, '2015-08-06 03:12:00', '2015-08-06 11:35:00', '08:23:00'),
(11, 5, '2015-08-06 00:01:00', '2015-08-06 14:02:00', '14:01:00'),
(12, 5, '2015-08-06 01:01:00', '2015-08-06 13:02:00', '12:01:00'),
(13, 5, '2015-08-07 04:08:00', '2015-08-07 09:59:00', '05:51:00'),
(14, 5, '2015-08-07 12:00:00', '2015-08-07 13:00:00', '01:00:00'),
(16, 5, '2015-08-07 08:06:00', '2015-08-07 06:50:00', '-01:16:00'),
(17, 6, '2015-08-07 03:00:00', '2015-08-07 06:00:00', '03:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `cod_professor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(10) unsigned NOT NULL,
  `matricula_prof` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `nome_prof` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` char(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_professor`),
  UNIQUE KEY `matricula_prof` (`matricula_prof`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `cod_usuario` (`cod_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`cod_professor`, `cod_usuario`, `matricula_prof`, `nome_prof`, `cpf`) VALUES
(3, 24, '0', 'Cthulu', '0000000'),
(5, 27, '142', 'Ursinho Pimpão', '433211'),
(6, 32, '13', 'igor', '1217');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE IF NOT EXISTS `telefone` (
  `cod_telefone` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) unsigned NOT NULL,
  `telefone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_telefone`),
  KEY `cod_usuario_idx` (`cod_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE IF NOT EXISTS `turma` (
  `cod_turma` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_professor` int(11) unsigned NOT NULL,
  `cod_disciplina` int(11) unsigned NOT NULL,
  `num_alunos` int(11) NOT NULL,
  PRIMARY KEY (`cod_turma`),
  KEY `cod_prof_turma_fk_idx` (`cod_professor`),
  KEY `cod_disc_turma_fk_idx` (`cod_disciplina`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`cod_turma`, `cod_professor`, `cod_disciplina`, `num_alunos`) VALUES
(1, 5, 1, 0),
(3, 6, 3, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `cod_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'batatinha',
  `tipo` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_usuario`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `login`, `senha`, `tipo`) VALUES
(24, 'Lorde Supremo do Universo', '$1$u43.fV0.$/R2Id8X2/pHU/CUCrAHzO1', 'deus'),
(27, 'ursinho', '$1$B83.0l2.$zfB2MzEJVM9dlPT.BbPrk1', 'prof'),
(28, 'Zzzzz', '$1$UX..NS1.$1Qh/rb0lVU/XZZzU0P7j11', 'alun'),
(29, 'pudim', '$1$Vw3.4x1.$tPodxRO6yXl/T9be2LXW80', 'alun'),
(30, 'nhac', '$1$3v1.O.5.$Awmr03i0hcX4XpuYIPQI11', 'alun'),
(31, 'burninator', '$1$Q44.ZS2.$bTIRXnLn3bqTW8Bd9l0ES0', 'alun'),
(32, 'igor', '$1$f25.6a5.$WZFL60k6KKwcinNFYrS5G0', 'prof');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `cod_turma_aluno_fk` FOREIGN KEY (`cod_turma`) REFERENCES `turma` (`cod_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cod_usuario_aluno_fk` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `cod_usuario_fk` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `notafalta`
--
ALTER TABLE `notafalta`
  ADD CONSTRAINT `nf_codaluno_fk` FOREIGN KEY (`cod_aluno`) REFERENCES `aluno` (`cod_aluno`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nf_coddisc_fk` FOREIGN KEY (`cod_disciplina`) REFERENCES `disciplina` (`cod_disciplina`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `ponto`
--
ALTER TABLE `ponto`
  ADD CONSTRAINT `cod_prof_ponto_fk` FOREIGN KEY (`cod_prof`) REFERENCES `professor` (`cod_professor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `cod_usuario` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `cod_usuario_tel_fk` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `cod_disc_turma_fk` FOREIGN KEY (`cod_disciplina`) REFERENCES `disciplina` (`cod_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cod_prof_turma_fk` FOREIGN KEY (`cod_professor`) REFERENCES `professor` (`cod_professor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
