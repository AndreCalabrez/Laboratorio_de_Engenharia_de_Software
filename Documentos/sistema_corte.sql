-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Maio-2017 às 23:54
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_corte`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairro`
--

CREATE TABLE `bairro` (
  `codBairro` int(11) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `codCidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `codCidade` int(11) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `siglaUF` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `codCliente` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` varchar(3) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `cpfCnpj` varchar(15) NOT NULL,
  `codBairro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disco`
--

CREATE TABLE `disco` (
  `codDisco` bigint(20) UNSIGNED NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `espessura` decimal(3,2) NOT NULL,
  `diametro` decimal(3,2) NOT NULL,
  `tempoTrabalho` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `codFuncionario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` varchar(3) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `codBairro` int(11) NOT NULL,
  `funcao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `codItens` bigint(20) UNSIGNED NOT NULL,
  `nomePeca` varchar(30) NOT NULL,
  `largura` decimal(3,2) NOT NULL,
  `altura` decimal(3,2) NOT NULL,
  `qtd` int(11) NOT NULL,
  `codPedidoDeCorte` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidodecorte`
--

CREATE TABLE `pedidodecorte` (
  `codPedido` int(11) NOT NULL,
  `qtdPerdaP` decimal(4,2) NOT NULL,
  `qtdPerdaM` decimal(4,2) NOT NULL,
  `resultado` varchar(100) NOT NULL,
  `alterado` char(1) NOT NULL,
  `codCliente` int(11) NOT NULL,
  `codFuncionario` int(11) NOT NULL,
  `codDisco` int(11) NOT NULL,
  `situacao` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidoproduto`
--

CREATE TABLE `pedidoproduto` (
  `codPedido` int(11) NOT NULL,
  `codProduto` int(11) NOT NULL,
  `largura` decimal(3,2) NOT NULL,
  `altura` decimal(3,2) NOT NULL,
  `qtdChapas` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `codProduto` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `corPred` varchar(20) NOT NULL,
  `espessura` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `uf`
--

CREATE TABLE `uf` (
  `siglaUf` char(2) NOT NULL,
  `estado` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bairro`
--
ALTER TABLE `bairro`
  ADD PRIMARY KEY (`codBairro`),
  ADD KEY `fk_bairro_cidade` (`codCidade`);

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`codCidade`),
  ADD KEY `fk_cidade_uf` (`siglaUF`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codCliente`),
  ADD KEY `fk_cliente_bairro` (`codBairro`);

--
-- Indexes for table `disco`
--
ALTER TABLE `disco`
  ADD PRIMARY KEY (`codDisco`),
  ADD UNIQUE KEY `codDisco` (`codDisco`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`codFuncionario`),
  ADD KEY `fk_funcionario_bairro` (`codBairro`);

--
-- Indexes for table `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`codItens`),
  ADD UNIQUE KEY `codItens` (`codItens`),
  ADD KEY `fk_PedidoDeCorte_Itens` (`codPedidoDeCorte`);

--
-- Indexes for table `pedidodecorte`
--
ALTER TABLE `pedidodecorte`
  ADD PRIMARY KEY (`codPedido`),
  ADD KEY `fk_Pedido_Cliente` (`codCliente`),
  ADD KEY `fk_Pedido_Funcionario` (`codFuncionario`),
  ADD KEY `fk_Pedido_Disco` (`codDisco`);

--
-- Indexes for table `pedidoproduto`
--
ALTER TABLE `pedidoproduto`
  ADD PRIMARY KEY (`codPedido`,`codProduto`),
  ADD KEY `fk_pedidoProduto_produto` (`codProduto`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`codProduto`),
  ADD UNIQUE KEY `codProduto` (`codProduto`);

--
-- Indexes for table `uf`
--
ALTER TABLE `uf`
  ADD PRIMARY KEY (`siglaUf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bairro`
--
ALTER TABLE `bairro`
  MODIFY `codBairro` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `codCidade` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codCliente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `disco`
--
ALTER TABLE `disco`
  MODIFY `codDisco` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `codFuncionario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `itens`
--
ALTER TABLE `itens`
  MODIFY `codItens` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `codProduto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `bairro`
--
ALTER TABLE `bairro`
  ADD CONSTRAINT `fk_bairro_cidade` FOREIGN KEY (`codCidade`) REFERENCES `cidade` (`codCidade`);

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `fk_cidade_uf` FOREIGN KEY (`siglaUF`) REFERENCES `uf` (`siglaUf`);

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_bairro` FOREIGN KEY (`codBairro`) REFERENCES `bairro` (`codBairro`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_funcionario_bairro` FOREIGN KEY (`codBairro`) REFERENCES `bairro` (`codBairro`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
