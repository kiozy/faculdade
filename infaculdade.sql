-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05-Ago-2015 às 16:33
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
  `cod_turma` int(11) unsigned NOT NULL,
  `cod_usuario` int(11) unsigned NOT NULL,
  `matricula_aluno` int(11) NOT NULL,
  `nome_aluno` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` char(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_aluno`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `matricula_aluno` (`matricula_aluno`),
  KEY `cod_turma_aluno_fk_idx` (`cod_turma`),
  KEY `cod_usuario_aluno_fk_idx` (`cod_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `ht` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_ponto`),
  KEY `cod_prof_ponto_fk_idx` (`cod_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `cod_professor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(10) unsigned NOT NULL,
  `matricula_prof` varchar(8) CHARACTER SET latin1 NOT NULL,
  `nome_prof` varchar(45) CHARACTER SET latin1 NOT NULL,
  `cpf` char(11) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`cod_professor`),
  KEY `cod_usuario` (`cod_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `cod_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(64) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(16) CHARACTER SET latin1 NOT NULL DEFAULT 'batatinha',
  `tipo` varchar(4) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`cod_usuario`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `login`, `senha`, `tipo`) VALUES
(1, 'a', '$1$zn2.Af0.$oouC', 'alun');

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
