-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 23-Maio-2018 às 23:39
-- Versão do servidor: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amparomaternal`
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
-- Estrutura da tabela `categoriasdespesa`
--

CREATE TABLE `categoriasdespesa` (
  `id` int(10) NOT NULL,
  `nome` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoriasdespesa`
--

INSERT INTO `categoriasdespesa` (`id`, `nome`) VALUES
(2, 'teste'),
(3, 'refeiÃ§ao'),
(4, 'Roupas'),
(5, 'sei la'),
(6, 'Agasalhos'),
(7, 'moveis'),
(8, 'higiene');

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

CREATE TABLE `despesas` (
  `idDespesa` int(10) NOT NULL,
  `idCategoria` int(10) NOT NULL,
  `infoDespesa` varchar(250) NOT NULL,
  `reais` int(10) NOT NULL,
  `centavos` int(2) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `despesas`
--

INSERT INTO `despesas` (`idDespesa`, `idCategoria`, `infoDespesa`, `reais`, `centavos`, `data`) VALUES
(1, 3, 'alimentacao', 123, 34, '2018-04-15'),
(2, 3, 'Ali', 234, 48, '2018-04-22');

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
  `valorCentavos` int(2) NOT NULL,
  `tipoDinheiro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Cadastro de Doacoes';

--
-- Extraindo dados da tabela `doacao`
--

INSERT INTO `doacao` (`id_doacao`, `id_tipoDoacao`, `item_doacao`, `id_campanha`, `id_doador`, `dataDoacao`, `quantidade`, `valorDinheiro`, `valorCentavos`, `tipoDinheiro`) VALUES
(1, 8, 'Dinheiro', 7, 1, '2018-03-15', 0, 123, 50, 1),
(2, 7, 'Ropunhasd', 7, 1, '2018-03-15', 5, 0, 0, 5),
(3, 7, 'Comidads', 7, 1, '2018-03-15', 54, 0, 0, 5),
(4, 7, 'Ropunhasd', 7, 1, '2018-03-15', 5, 0, 0, 5),
(5, 7, 'Ropunhasd', 7, 1, '2018-03-15', 5, 0, 0, 5),
(6, 8, 'Dinheiro', 1, 1, '2018-04-22', 0, 145, 50, 2);

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
  `documento` varchar(80) NOT NULL,
  `tipoPessoa` varchar(20) NOT NULL,
  `operadora` varchar(150) NOT NULL,
  `turma` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `doador`
--

INSERT INTO `doador` (`id_doador`, `nome`, `endereco`, `email`, `telefoneResidencial`, `celular1`, `celular2`, `nascimento`, `dataCadastro`, `tipoDoador`, `doaDia`, `doaMes`, `documento`, `tipoPessoa`, `operadora`, `turma`) VALUES
(1, 'Victor Assis', 'Zeca Preto 68', 'vitinhomx@outlook.com', '324234234', '325432343', '323534', '1994-12-05', '2018-03-08', 'Fidelizado', 10, 'nenhum', '', 'FÃ­sica', '*', '*'),
(2, 'Joao Paulo', 'Rua A, Bairro B, numero 22', 'jp@email.com', '38232332', '999999999', '999999999', '2018-05-16', '2018-05-15', 'Fidelizado', 10, 'nenhum', '', 'Física', '*', '*'),
(3, 'Joao Vitor Rodrigues', 'Rua A, numero 6, Bairro São Joao', 'asdas@asdasasd.com', '0 00 0000-0000', '0 00 0 0000-0000', '0 00 0 0000-0000', '1994-01-01', '2018-05-20', 'Exporádico', 0, 'Aleatório', '123.456.789-90', 'Física', 'S.I.', '3º período');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipodoacao`
--

CREATE TABLE `tipodoacao` (
  `id_tipoDoacao` int(100) NOT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipodoacao`
--

INSERT INTO `tipodoacao` (`id_tipoDoacao`, `nome`) VALUES
(1, 'Nenhuma'),
(7, 'roupasinhas'),
(8, 'Dinheiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipodoacaodinheiro`
--

CREATE TABLE `tipodoacaodinheiro` (
  `idTipoDinheiro` int(100) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipodoacaodinheiro`
--

INSERT INTO `tipodoacaodinheiro` (`idTipoDinheiro`, `tipo`) VALUES
(1, 'deposito'),
(2, 'especie'),
(3, 'cheque'),
(4, 'cartao'),
(5, 'outro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tiposbusca`
--

CREATE TABLE `tiposbusca` (
  `idTipoBusca` int(5) NOT NULL,
  `tipoBusca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tiposbusca`
--

INSERT INTO `tiposbusca` (`idTipoBusca`, `tipoBusca`) VALUES
(1, 'DOADOR'),
(2, 'DOACAO');

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
-- Indexes for table `categoriasdespesa`
--
ALTER TABLE `categoriasdespesa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `despesas`
--
ALTER TABLE `despesas`
  ADD PRIMARY KEY (`idDespesa`);

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
-- Indexes for table `tipodoacao`
--
ALTER TABLE `tipodoacao`
  ADD PRIMARY KEY (`id_tipoDoacao`);

--
-- Indexes for table `tipodoacaodinheiro`
--
ALTER TABLE `tipodoacaodinheiro`
  ADD PRIMARY KEY (`idTipoDinheiro`);

--
-- Indexes for table `tiposbusca`
--
ALTER TABLE `tiposbusca`
  ADD PRIMARY KEY (`idTipoBusca`);

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
-- AUTO_INCREMENT for table `categoriasdespesa`
--
ALTER TABLE `categoriasdespesa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `despesas`
--
ALTER TABLE `despesas`
  MODIFY `idDespesa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `doacao`
--
ALTER TABLE `doacao`
  MODIFY `id_doacao` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `doador`
--
ALTER TABLE `doador`
  MODIFY `id_doador` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tipodoacao`
--
ALTER TABLE `tipodoacao`
  MODIFY `id_tipoDoacao` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tipodoacaodinheiro`
--
ALTER TABLE `tipodoacaodinheiro`
  MODIFY `idTipoDinheiro` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tiposbusca`
--
ALTER TABLE `tiposbusca`
  MODIFY `idTipoBusca` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
