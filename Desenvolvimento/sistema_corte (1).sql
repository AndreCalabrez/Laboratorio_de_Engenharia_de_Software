-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `sistema_corte`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairro`
--

CREATE TABLE IF NOT EXISTS `bairro` (
  `codBairro` int(11) NOT NULL AUTO_INCREMENT,
  `bairro` varchar(100) NOT NULL,
  `codCidade` int(11) NOT NULL,
  PRIMARY KEY (`codBairro`),
  KEY `fk_bairro_cidade` (`codCidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `bairro`
--

INSERT INTO `bairro` (`codBairro`, `bairro`, `codCidade`) VALUES
(1, 'Itaoca', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE IF NOT EXISTS `cidade` (
  `codCidade` int(11) NOT NULL AUTO_INCREMENT,
  `cidade` varchar(50) NOT NULL,
  `siglaUF` char(2) NOT NULL,
  PRIMARY KEY (`codCidade`),
  KEY `fk_cidade_uf` (`siglaUF`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`codCidade`, `cidade`, `siglaUF`) VALUES
(1, 'Cachoeiro de Itapemirim', 'ES');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `codCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` varchar(3) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `cpfCnpj` varchar(15) NOT NULL,
  `codBairro` int(11) NOT NULL,
  PRIMARY KEY (`codCliente`),
  KEY `fk_cliente_bairro` (`codBairro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disco`
--

CREATE TABLE IF NOT EXISTS `disco` (
  `codDisco` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `espessura` decimal(3,2) NOT NULL,
  `diametro` decimal(3,2) NOT NULL,
  `tempoTrabalho` decimal(6,2) NOT NULL,
  PRIMARY KEY (`codDisco`),
  UNIQUE KEY `codDisco` (`codDisco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `codFuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` varchar(3) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `codBairro` int(11) NOT NULL,
  `funcao` varchar(50) NOT NULL,
  PRIMARY KEY (`codFuncionario`),
  KEY `fk_funcionario_bairro` (`codBairro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`codFuncionario`, `nome`, `rua`, `numero`, `telefone`, `login`, `senha`, `cpf`, `codBairro`, `funcao`) VALUES
(9, 'andre', 'a', 'a', 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'a', 1, 'a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE IF NOT EXISTS `itens` (
  `codItens` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nomePeca` varchar(30) NOT NULL,
  `largura` decimal(3,2) NOT NULL,
  `altura` decimal(3,2) NOT NULL,
  `qtd` int(11) NOT NULL,
  `codPedidoDeCorte` int(11) NOT NULL,
  PRIMARY KEY (`codItens`),
  UNIQUE KEY `codItens` (`codItens`),
  KEY `fk_PedidoDeCorte_Itens` (`codPedidoDeCorte`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidodecorte`
--

CREATE TABLE IF NOT EXISTS `pedidodecorte` (
  `codPedido` int(11) NOT NULL,
  `qtdPerdaP` decimal(4,2) NOT NULL,
  `qtdPerdaM` decimal(4,2) NOT NULL,
  `resultado` varchar(100) NOT NULL,
  `alterado` char(1) NOT NULL,
  `codCliente` int(11) NOT NULL,
  `codFuncionario` int(11) NOT NULL,
  `codDisco` int(11) NOT NULL,
  `situacao` varchar(30) NOT NULL,
  PRIMARY KEY (`codPedido`),
  KEY `fk_Pedido_Cliente` (`codCliente`),
  KEY `fk_Pedido_Funcionario` (`codFuncionario`),
  KEY `fk_Pedido_Disco` (`codDisco`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidoproduto`
--

CREATE TABLE IF NOT EXISTS `pedidoproduto` (
  `codPedido` int(11) NOT NULL,
  `codProduto` int(11) NOT NULL,
  `largura` decimal(3,2) NOT NULL,
  `altura` decimal(3,2) NOT NULL,
  `qtdChapas` int(11) NOT NULL,
  PRIMARY KEY (`codPedido`,`codProduto`),
  KEY `fk_pedidoProduto_produto` (`codProduto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `codProduto` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `corPred` varchar(20) NOT NULL,
  `espessura` varchar(5) NOT NULL,
  PRIMARY KEY (`codProduto`),
  UNIQUE KEY `codProduto` (`codProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `uf`
--

CREATE TABLE IF NOT EXISTS `uf` (
  `siglaUf` char(2) NOT NULL,
  `estado` varchar(40) NOT NULL,
  PRIMARY KEY (`siglaUf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `uf`
--

INSERT INTO `uf` (`siglaUf`, `estado`) VALUES
('ES', 'Espirito Santo');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `bairro`
--
ALTER TABLE `bairro`
  ADD CONSTRAINT `fk_bairro_cidade` FOREIGN KEY (`codCidade`) REFERENCES `cidade` (`codCidade`);

--
-- Restrições para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `fk_cidade_uf` FOREIGN KEY (`siglaUF`) REFERENCES `uf` (`siglaUf`);

--
-- Restrições para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_bairro` FOREIGN KEY (`codBairro`) REFERENCES `bairro` (`codBairro`);

--
-- Restrições para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_funcionario_bairro` FOREIGN KEY (`codBairro`) REFERENCES `bairro` (`codBairro`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
