-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Abr-2017 às 19:47
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spapc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairro`
--

CREATE TABLE `bairro` (
  `cod_bairro` int(11) NOT NULL,
  `nome_bairro` varchar(150) DEFAULT NULL,
  `cod_cidade` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `cod_cidade` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cod_uf` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cod_cliente` int(11) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `rua` varchar(200) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `tipo` varchar(25) DEFAULT NULL,
  `cpf_cnpj` varchar(20) DEFAULT NULL,
  `inscricao_estadual` varchar(15) DEFAULT NULL,
  `cod_bairro` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disco`
--

CREATE TABLE `disco` (
  `cod_disco` int(11) NOT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `espessura` decimal(3,1) DEFAULT NULL,
  `DIAMETRO` decimal(3,1) DEFAULT NULL,
  `TEMPO_TRABALHO` decimal(4,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `COD_FUNCIONARIO` int(11) NOT NULL,
  `NOME` varchar(100) DEFAULT NULL,
  `RUA` varchar(150) DEFAULT NULL,
  `NUMERO` varchar(10) DEFAULT NULL,
  `TELEFONE` varchar(15) DEFAULT NULL,
  `LOGIN` varchar(15) DEFAULT NULL,
  `SENHA` varchar(20) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `COD_BAIRRO` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `COD_ITENS` int(11) NOT NULL,
  `nome_peca` varchar(50) DEFAULT NULL,
  `largura` decimal(4,2) DEFAULT NULL,
  `altura` decimal(4,2) DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidodecorte`
--

CREATE TABLE `pedidodecorte` (
  `COD_PEDIDO` int(11) NOT NULL,
  `cod_cliente` int(11) DEFAULT NULL,
  `cod_funcionario` int(11) DEFAULT NULL,
  `cod_produto` int(11) DEFAULT NULL,
  `cod_disco` int(11) DEFAULT NULL,
  `cod_itens` int(11) DEFAULT NULL,
  `LARGURA` decimal(4,2) DEFAULT NULL,
  `ALTURA` decimal(4,2) DEFAULT NULL,
  `Qtd_chapas` int(11) DEFAULT NULL,
  `qtd_perda_P` decimal(6,3) DEFAULT NULL,
  `qtd_perda_m` decimal(6,3) DEFAULT NULL,
  `data_hora_corte` date DEFAULT NULL,
  `situacao` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `COD_PRODUTO` int(11) NOT NULL,
  `NOME` varchar(100) DEFAULT NULL,
  `COR_PRED` varchar(35) DEFAULT NULL,
  `ESPESSURA` decimal(3,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `uf`
--

CREATE TABLE `uf` (
  `cod` int(11) NOT NULL,
  `uf` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bairro`
--
ALTER TABLE `bairro`
  ADD PRIMARY KEY (`cod_bairro`),
  ADD KEY `FK_BAIRRO_CIDADE` (`cod_cidade`);

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`cod_cidade`),
  ADD KEY `FK_CIDADE_UF` (`cod_uf`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod_cliente`),
  ADD KEY `fk_cliente_bairro` (`cod_bairro`);

--
-- Indexes for table `disco`
--
ALTER TABLE `disco`
  ADD PRIMARY KEY (`cod_disco`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`COD_FUNCIONARIO`),
  ADD KEY `FK_FUNCIONARIO_BAIRRO` (`COD_BAIRRO`);

--
-- Indexes for table `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`COD_ITENS`);

--
-- Indexes for table `pedidodecorte`
--
ALTER TABLE `pedidodecorte`
  ADD PRIMARY KEY (`COD_PEDIDO`),
  ADD KEY `FK_PRDIDODECORTE_CLIENTE` (`cod_cliente`),
  ADD KEY `FK_PRDIDODECORTE_FUNCIONARIO` (`cod_funcionario`),
  ADD KEY `FK_PRDIDODECORTE_PRODUTO` (`cod_produto`),
  ADD KEY `FK_PRDIDODECORTE_DISCO` (`cod_disco`),
  ADD KEY `FK_PRDIDODECORTE_ITENS` (`cod_itens`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`COD_PRODUTO`);

--
-- Indexes for table `uf`
--
ALTER TABLE `uf`
  ADD PRIMARY KEY (`cod`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
