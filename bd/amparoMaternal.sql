-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 15/04/2018 às 18:46
-- Versão do servidor: 5.7.21-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `amparoMaternal`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `campanhas`
--

CREATE TABLE `campanhas` (
  `id_campanha` int(10) NOT NULL,
  `nomeCampanha` varchar(200) NOT NULL,
  `dataInicial` date NOT NULL,
  `dataFinal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela para cadastro das campanhas.';

--
-- Fazendo dump de dados para tabela `campanhas`
--

INSERT INTO `campanhas` (`id_campanha`, `nomeCampanha`, `dataInicial`, `dataFinal`) VALUES
(1, 'Nenhuma', '0000-00-00', '0000-00-00'),
(7, 'Natal', '2018-03-12', '2018-03-21');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoriasDespesa`
--

CREATE TABLE `categoriasDespesa` (
  `id` int(10) NOT NULL,
  `nome` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `categoriasDespesa`
--

INSERT INTO `categoriasDespesa` (`id`, `nome`) VALUES
(2, 'teste'),
(3, 'refeiÃ§ao'),
(4, 'Roupas'),
(5, 'sei la'),
(6, 'Agasalhos'),
(7, 'moveis'),
(8, 'higiene');

-- --------------------------------------------------------

--
-- Estrutura para tabela `despesas`
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
-- Fazendo dump de dados para tabela `despesas`
--

INSERT INTO `despesas` (`idDespesa`, `idCategoria`, `infoDespesa`, `reais`, `centavos`, `data`) VALUES
(1, 3, 'alimentacao', 123, 34, '2018-04-15');

-- --------------------------------------------------------

--
-- Estrutura para tabela `doacao`
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
  `tipoDinheiro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Cadastro de Doacoes';

--
-- Fazendo dump de dados para tabela `doacao`
--

INSERT INTO `doacao` (`id_doacao`, `id_tipoDoacao`, `item_doacao`, `id_campanha`, `id_doador`, `dataDoacao`, `quantidade`, `valorDinheiro`, `tipoDinheiro`) VALUES
(1, 8, 'Dinheiro', 7, 1, '2018-03-15', 0, 123.43, 1),
(2, 7, 'Ropunhasd', 7, 1, '2018-03-15', 5, 0, 5),
(3, 7, 'Comidads', 7, 1, '2018-03-15', 54, 0, 5),
(4, 7, 'Ropunhasd', 7, 1, '2018-03-15', 5, 0, 5),
(5, 7, 'Ropunhasd', 7, 1, '2018-03-15', 5, 0, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `doador`
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
-- Fazendo dump de dados para tabela `doador`
--

INSERT INTO `doador` (`id_doador`, `nome`, `endereco`, `email`, `telefoneResidencial`, `celular1`, `celular2`, `nascimento`, `dataCadastro`, `tipoDoador`, `doaDia`, `doaMes`, `tipoPessoa`, `operadora`, `turma`) VALUES
(1, 'Victor Assis', 'Zeca Preto 68', 'vitinhomx@outlook.com', '324234234', '325432343', '323534', '1994-12-05', '2018-03-08', 'Fidelizado', 10, 'nenhum', 'FÃ­sica', '*', '*');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipoDoacao`
--

CREATE TABLE `tipoDoacao` (
  `id_tipoDoacao` int(100) NOT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tipoDoacao`
--

INSERT INTO `tipoDoacao` (`id_tipoDoacao`, `nome`) VALUES
(1, 'Nenhuma'),
(7, 'roupasinhas'),
(8, 'Dinheiro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipoDoacaoDinheiro`
--

CREATE TABLE `tipoDoacaoDinheiro` (
  `idTipoDinheiro` int(100) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tipoDoacaoDinheiro`
--

INSERT INTO `tipoDoacaoDinheiro` (`idTipoDinheiro`, `tipo`) VALUES
(1, 'deposito'),
(2, 'especie'),
(3, 'cheque'),
(4, 'cartao'),
(5, 'outro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tiposBusca`
--

CREATE TABLE `tiposBusca` (
  `idTipoBusca` int(5) NOT NULL,
  `tipoBusca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tiposBusca`
--

INSERT INTO `tiposBusca` (`idTipoBusca`, `tipoBusca`) VALUES
(1, 'DOADOR'),
(2, 'DATA DE CADASTRO DO DOADOR'),
(3, 'DOACAO'),
(4, 'DATA DA DOACAO'),
(5, 'CAMPANHA'),
(6, 'DATA INICIAL DA CAMPANHA'),
(7, 'DATA FINAL DA CAMPANHA'),
(8, 'DESPESA'),
(9, 'DATA DA DESPESA'),
(10, 'TIPO DE DOADOR');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
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
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `sobrenome`, `nome_usuario`, `senha`, `nivel`) VALUES
(1, 'Victor', 'Assis', 'victor', '123456', 'user');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `campanhas`
--
ALTER TABLE `campanhas`
  ADD PRIMARY KEY (`id_campanha`);

--
-- Índices de tabela `categoriasDespesa`
--
ALTER TABLE `categoriasDespesa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `despesas`
--
ALTER TABLE `despesas`
  ADD PRIMARY KEY (`idDespesa`);

--
-- Índices de tabela `doacao`
--
ALTER TABLE `doacao`
  ADD PRIMARY KEY (`id_doacao`);

--
-- Índices de tabela `doador`
--
ALTER TABLE `doador`
  ADD PRIMARY KEY (`id_doador`);

--
-- Índices de tabela `tipoDoacao`
--
ALTER TABLE `tipoDoacao`
  ADD PRIMARY KEY (`id_tipoDoacao`);

--
-- Índices de tabela `tipoDoacaoDinheiro`
--
ALTER TABLE `tipoDoacaoDinheiro`
  ADD PRIMARY KEY (`idTipoDinheiro`);

--
-- Índices de tabela `tiposBusca`
--
ALTER TABLE `tiposBusca`
  ADD PRIMARY KEY (`idTipoBusca`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `campanhas`
--
ALTER TABLE `campanhas`
  MODIFY `id_campanha` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `categoriasDespesa`
--
ALTER TABLE `categoriasDespesa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de tabela `despesas`
--
ALTER TABLE `despesas`
  MODIFY `idDespesa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `doacao`
--
ALTER TABLE `doacao`
  MODIFY `id_doacao` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `doador`
--
ALTER TABLE `doador`
  MODIFY `id_doador` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `tipoDoacao`
--
ALTER TABLE `tipoDoacao`
  MODIFY `id_tipoDoacao` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de tabela `tipoDoacaoDinheiro`
--
ALTER TABLE `tipoDoacaoDinheiro`
  MODIFY `idTipoDinheiro` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `tiposBusca`
--
ALTER TABLE `tiposBusca`
  MODIFY `idTipoBusca` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
