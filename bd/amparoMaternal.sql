-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 12-Mar-2018 às 07:11
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amparoMaternal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `campanhas`
--

CREATE TABLE `campanhas` (
  `id_campanha` int(10) NOT NULL,
  `nomeCampanha` varchar(200) NOT NULL,
  `dataInicial` date NOT NULL,
  `dataFinal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela para cadastro das campanhas.';

--
-- Extraindo dados da tabela `campanhas`
--

INSERT INTO `campanhas` (`id_campanha`, `nomeCampanha`, `dataInicial`, `dataFinal`) VALUES
(1, 'Nenhuma', '0000-00-00', '0000-00-00'),
(7, 'Natal', '2018-03-12', '2018-03-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `doacao`
--

CREATE TABLE `doacao` (
  `id_doacao` int(10) NOT NULL,
  `id_tipoDoacao` int(100) NOT NULL,
  `item_doacao` varchar(200) NOT NULL,
  `id_campanha` int(10) NOT NULL,
  `id_doador` int(10) NOT NULL,
  `dataDoacao` date NOT NULL,
  `quantidade` int(10) NOT NULL,
  `valorDinheiro` float NOT NULL,
  `tipoDinheiro` int(11) NOT NULL,
  `tipoItem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Cadastro de Doacoes';

-- --------------------------------------------------------

--
-- Estrutura da tabela `doador`
--

CREATE TABLE `doador` (
  `id_doador` int(100) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefoneResidencial` varchar(20) NOT NULL,
  `celular1` varchar(20) NOT NULL,
  `celular2` varchar(20) NOT NULL,
  `nascimento` date NOT NULL,
  `dataCadastro` date NOT NULL,
  `tipoDoador` varchar(20) NOT NULL,
  `doaDia` int(2) NOT NULL,
  `doaMes` varchar(10) NOT NULL,
  `tipoPessoa` varchar(20) NOT NULL,
  `operadora` varchar(150) NOT NULL,
  `turma` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `doador`
--

INSERT INTO `doador` (`id_doador`, `nome`, `endereco`, `email`, `telefoneResidencial`, `celular1`, `celular2`, `nascimento`, `dataCadastro`, `tipoDoador`, `doaDia`, `doaMes`, `tipoPessoa`, `operadora`, `turma`) VALUES
(1, 'Victor Assis', 'Zeca Preto 68', 'vitinhomx@outlook.com', '324234234', '325432343', '323534', '1994-12-05', '2018-03-08', 'Fidelizado', 10, 'nenhum', 'FÃ­sica', '*', '*');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoDoacao`
--

CREATE TABLE `tipoDoacao` (
  `id_tipoDoacao` int(100) NOT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipoDoacao`
--

INSERT INTO `tipoDoacao` (`id_tipoDoacao`, `nome`) VALUES
(1, 'Nenhuma'),
(7, 'roupasinhas'),
(8, 'Dinheiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoDoacaoDinheiro`
--

CREATE TABLE `tipoDoacaoDinheiro` (
  `idTipoDinheiro` int(100) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipoDoacaoDinheiro`
--

INSERT INTO `tipoDoacaoDinheiro` (`idTipoDinheiro`, `tipo`) VALUES
(1, 'deposito'),
(2, 'especie'),
(3, 'cheque'),
(4, 'cartao'),
(5, 'outro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nivel` varchar(5) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `sobrenome`, `nome_usuario`, `senha`, `nivel`) VALUES
(1, 'Victor', 'Assis', 'victor', '123456', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campanhas`
--
ALTER TABLE `campanhas`
  ADD PRIMARY KEY (`id_campanha`);

--
-- Indexes for table `doacao`
--
ALTER TABLE `doacao`
  ADD PRIMARY KEY (`id_doacao`);

--
-- Indexes for table `doador`
--
ALTER TABLE `doador`
  ADD PRIMARY KEY (`id_doador`);

--
-- Indexes for table `tipoDoacao`
--
ALTER TABLE `tipoDoacao`
  ADD PRIMARY KEY (`id_tipoDoacao`);

--
-- Indexes for table `tipoDoacaoDinheiro`
--
ALTER TABLE `tipoDoacaoDinheiro`
  ADD PRIMARY KEY (`idTipoDinheiro`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campanhas`
--
ALTER TABLE `campanhas`
  MODIFY `id_campanha` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doacao`
--
ALTER TABLE `doacao`
  MODIFY `id_doacao` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doador`
--
ALTER TABLE `doador`
  MODIFY `id_doador` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipoDoacao`
--
ALTER TABLE `tipoDoacao`
  MODIFY `id_tipoDoacao` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tipoDoacaoDinheiro`
--
ALTER TABLE `tipoDoacaoDinheiro`
  MODIFY `idTipoDinheiro` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;