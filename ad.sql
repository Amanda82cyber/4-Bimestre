-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 01/10/2019 às 07h34min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `ad`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `CPF` char(11) DEFAULT NULL,
  `id_roupa` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `comentario` varchar(100) NOT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `CPF` (`CPF`),
  KEY `id_roupa` (`id_roupa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `CPF`, `id_roupa`, `data`, `hora`, `comentario`) VALUES
(17, NULL, 4, '2017-04-19', '20:32:47', 'Adorei!!! Vou me cadastrar para comprar!!'),
(18, NULL, 2, '2017-04-19', '20:52:51', 'Q verde lindo!!!'),
(19, '44809499847', 2, '2017-04-19', '20:57:40', 'Adorei!!! Comprei e chegou antes do prazo!!'),
(32, NULL, 2, '2018-09-19', '18:37:32', 'aaaaaaaaa'),
(33, '44809499847', 2, '2029-09-19', '06:29:35', 'kk'),
(34, '44809499847', 2, '2029-09-19', '06:31:44', 'eee'),
(35, '44809499847', 2, '2001-10-19', '07:26:14', 'Queroooooooooooooooooo!!'),
(36, '44809499847', 2, '2001-10-19', '07:26:42', 'Ameiii!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comprar`
--

CREATE TABLE IF NOT EXISTS `comprar` (
  `CPF` char(11) NOT NULL,
  `id_roupa` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_compra`),
  KEY `CPF` (`CPF`),
  KEY `id_roupa` (`id_roupa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Extraindo dados da tabela `comprar`
--

INSERT INTO `comprar` (`CPF`, `id_roupa`, `quantidade`, `id_compra`) VALUES
('44809499847', 2, 3, 6),
('44809499847', 2, 1, 49),
('44809499847', 2, 2, 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `loja`
--

CREATE TABLE IF NOT EXISTS `loja` (
  `CNPJ` char(14) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `estado` char(2) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `senha` int(11) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`CNPJ`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `loja`
--

INSERT INTO `loja` (`CNPJ`, `nome`, `estado`, `cidade`, `rua`, `senha`, `pais`, `email`) VALUES
('12334444', 'CriaÃ§Ãµes Claudia', 'SP', 'Araraquara', 'Av. SÃ£o Pedro', 7777, 'BR', 'claudinha@gmail.com'),
('12345', 'Dafiti', 'SP', 'Boa EsperanÃ§a do Sul', 'Dom Pedro 1', 12345, 'Brasil', 'dafiti@gmail.com'),
('666666666', 'Xuxa', 'PA', 'BelÃ©m', 'FafÃ¡', 99999, 'BR', 'soparabaixinhos@gmail.com'),
('88888', 'Montreal Magazine', 'SP', 'Bauru', 'Os Bandeirantes', 777, 'Brasil', 'montrealM@gmail.com'),
('999999', 'Textil Abril', 'SP', 'Araraquara', 'Avenida Luiz AntÃ´nio CorrÃªa da Silva, 147', 123, 'Brasil', 'textabril@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `roupa`
--

CREATE TABLE IF NOT EXISTS `roupa` (
  `id_roupa` int(11) NOT NULL AUTO_INCREMENT,
  `material` varchar(100) NOT NULL,
  `tamanho` varchar(50) NOT NULL,
  `ano_lancamento` date NOT NULL,
  `quantidade` int(11) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `cor` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `preco` float NOT NULL,
  `genero` char(1) NOT NULL,
  `CNPJ` char(14) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id_roupa`),
  KEY `CNPJ` (`CNPJ`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Extraindo dados da tabela `roupa`
--

INSERT INTO `roupa` (`id_roupa`, `material`, `tamanho`, `ano_lancamento`, `quantidade`, `marca`, `cor`, `tipo`, `preco`, `genero`, `CNPJ`, `foto`) VALUES
(2, 'Poliester', 'G', '2017-01-21', 28, 'Lua Nova', '#48c75b', 'Camisa', 40, 'M', '12345', 'f0030750f8a09cea4d215b7590b20b25.jpg'),
(4, 'Seda', 'M', '2017-12-13', 20, 'Maria FilÃ³', '#646ded', 'Saia', 50, 'F', '12345', '9e5cbe5f2f98c85100d8785184cf55fb.jpg'),
(45, 'Palha', '36', '2019-09-05', 20, 'HavaÃ­', '#000000', 'Saia', 20, 'F', '12345', '36f1da1086fbd5b327221adda6bc6525.jpg'),
(48, 'AlgodÃ£o', '36', '2019-10-23', 34, 'PandaKids', '#000000', 'CalÃ§a e blusa', 23, 'F', '12345', '3e691e0a060228c965c392f0cb0a1be8.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `CPF` char(11) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `estado` char(2) NOT NULL,
  `data_nascimento` date NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `sexo` char(1) NOT NULL,
  `cartao_credito` int(11) NOT NULL,
  `senha` int(11) NOT NULL,
  PRIMARY KEY (`CPF`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`CPF`, `cidade`, `rua`, `estado`, `data_nascimento`, `nome`, `email`, `pais`, `sexo`, `cartao_credito`, `senha`) VALUES
('10293845679', 'Araraquara', 'asdasda', 'SP', '1999-11-30', 'teste', 'ads@asd', 'Brasil', 'M', 41234123, 12345),
('12345678901', 'Barretos', 'Pedro JosÃ©', 'SP', '2019-09-07', 'Agatha Maria', 'agatinha@gmail.com', 'Brasil', 'F', 8888888, 123),
('22233446789', 'Araraquara', 'Dos bobos', 'CE', '2019-10-18', 'Moana Santana', 'moana@gmail.com', 'BR', 'F', 2147483647, 8888),
('44809499847', 'Aararquara', 'R Isidoro Bitio Neto', 'SP', '2001-11-04', 'DeoclÃ©cia', 'deinhah@gmail.com', 'Brasil', 'F', 2147483647, 123456),
('46892475342', 'Belo Horizonte', 'BelÃ­ssima ConceiÃ§Ã£o', 'AC', '2019-01-22', 'Lurdinha Cruz', 'lurdinhaCruz@gmail.com', 'Brasil', 'F', 999999999, 567);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_roupa`) REFERENCES `roupa` (`id_roupa`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_5` FOREIGN KEY (`CPF`) REFERENCES `usuario` (`CPF`) ON UPDATE SET NULL;

--
-- Restrições para a tabela `comprar`
--
ALTER TABLE `comprar`
  ADD CONSTRAINT `comprar_ibfk_3` FOREIGN KEY (`CPF`) REFERENCES `usuario` (`CPF`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comprar_ibfk_4` FOREIGN KEY (`id_roupa`) REFERENCES `roupa` (`id_roupa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `roupa`
--
ALTER TABLE `roupa`
  ADD CONSTRAINT `roupa_ibfk_2` FOREIGN KEY (`CNPJ`) REFERENCES `loja` (`CNPJ`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
