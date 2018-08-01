-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Ago-2018 às 19:13
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matriculabanco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `senha_adm` varchar(20) COLLATE utf8_bin NOT NULL,
  `cod_adm` int(10) NOT NULL,
  `nomeAcesso_adm` varchar(20) COLLATE utf8_bin NOT NULL,
  `cod_users` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `RG_alunos` varchar(12) COLLATE utf8_bin NOT NULL,
  `CPF_alunos` varchar(14) COLLATE utf8_bin NOT NULL,
  `cod_alunos` int(10) NOT NULL,
  `serie_alunos` int(1) NOT NULL,
  `nome_alunos` varchar(70) COLLATE utf8_bin NOT NULL,
  `bairro_aluno` varchar(60) COLLATE utf8_bin NOT NULL,
  `celular_alunos` varchar(14) COLLATE utf8_bin NOT NULL,
  `email_alunos` varchar(100) COLLATE utf8_bin NOT NULL,
  `cod_escolas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`RG_alunos`, `CPF_alunos`, `cod_alunos`, `serie_alunos`, `nome_alunos`, `bairro_aluno`, `celular_alunos`, `email_alunos`, `cod_escolas`) VALUES
('713501245', '863.508.435-76', 1, 4, 'Elai Emylle Matos de Lima', 'Gangnam', '(73)98839-7290', 'emyllematos7@gmail.com', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolas`
--

CREATE TABLE `escolas` (
  `cod_escolas` int(10) NOT NULL,
  `nome_escolas` varchar(100) COLLATE utf8_bin NOT NULL,
  `email_escolas` varchar(100) COLLATE utf8_bin NOT NULL,
  `nomeAcesso_escolas` varchar(26) COLLATE utf8_bin NOT NULL,
  `senha_escolas` varchar(20) COLLATE utf8_bin NOT NULL,
  `telefone_escolas` varchar(15) COLLATE utf8_bin NOT NULL,
  `cnpj_escolas` varchar(18) COLLATE utf8_bin NOT NULL,
  `cep_escolas` varchar(9) COLLATE utf8_bin NOT NULL,
  `rua_escolas` varchar(50) COLLATE utf8_bin NOT NULL,
  `bairro_escolas` varchar(50) COLLATE utf8_bin NOT NULL,
  `cidade_escolas` varchar(50) COLLATE utf8_bin NOT NULL,
  `uf_escolas` varchar(2) COLLATE utf8_bin NOT NULL,
  `cod_users` int(10) NOT NULL,
  `num_escolas` varchar(5) COLLATE utf8_bin NOT NULL,
  `data_cadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `escolas`
--

INSERT INTO `escolas` (`cod_escolas`, `nome_escolas`, `email_escolas`, `nomeAcesso_escolas`, `senha_escolas`, `telefone_escolas`, `cnpj_escolas`, `cep_escolas`, `rua_escolas`, `bairro_escolas`, `cidade_escolas`, `uf_escolas`, `cod_users`, `num_escolas`, `data_cadastro`) VALUES
(1, 'Centro Educacional Presidente Médici', 'emyllematos7@gmail.com', 'panda', '123456', '(73) 98839-7290', '22.222.222/2222-22', '45200-747', 'Princesa Isabel', 'Joaquim Romão', 'Jequié', 'BA', 2, '6', '2018-07-28'),
(2, 'Escolinha da Vida', 'emyllematos7@gmail.com', 'Elai Emylle Matos', '123', '(73) 98839-7290', '22.222.222/2222-22', '45200-747', 'Rua do Jequiezinho', 'Jequiezinho', 'Jequié', 'BA', 2, '6', '2018-07-29'),
(3, 'Elai Emylle Matos', 'emyllematos7@gmail.com', 'Elai Emylle Matos', '12', '(73) 98839-7290', '22.222.222/2222-22', '45200-747', 'Juracy Novato', 'Joaquim Romão', 'Jequié', 'BA', 2, '2', '2018-07-28'),
(6, 'SOPA', 'emyllematos7@gmail.com', 'sopa', 'nct', '(73) 98839-7290', '00.280.273/0001-37', '45000-000', 'Han', 'Gangnam', 'Seoul', 'KR', 2, '127', '2018-07-31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `descricao_hist` varchar(300) COLLATE utf8_bin NOT NULL,
  `cod_escolas` int(10) NOT NULL,
  `cod_adm` int(10) NOT NULL,
  `cod_hist` int(10) NOT NULL,
  `data_hist` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relacao2_cadastram`
--

CREATE TABLE `relacao2_cadastram` (
  `cod_escolas` int(10) NOT NULL,
  `cod_alunos` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relacao3_adicionam`
--

CREATE TABLE `relacao3_adicionam` (
  `cod_escolas` int(10) NOT NULL,
  `cod_adm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorios`
--

CREATE TABLE `relatorios` (
  `cod_alunos` int(10) NOT NULL,
  `data_rela` date NOT NULL,
  `cod_rela` int(10) NOT NULL,
  `descricao_rela` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `cod_users` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`cod_users`) VALUES
(1),
(2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`cod_adm`);

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`cod_alunos`),
  ADD KEY `cod_escolas` (`cod_escolas`);

--
-- Indexes for table `escolas`
--
ALTER TABLE `escolas`
  ADD PRIMARY KEY (`cod_escolas`),
  ADD KEY `cod_users` (`cod_users`) USING BTREE;

--
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`cod_hist`);

--
-- Indexes for table `relatorios`
--
ALTER TABLE `relatorios`
  ADD PRIMARY KEY (`cod_rela`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`cod_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `cod_alunos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `escolas`
--
ALTER TABLE `escolas`
  MODIFY `cod_escolas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `historico`
--
ALTER TABLE `historico`
  MODIFY `cod_hist` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `cod_rela` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `cod_users` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `alunos_ibfk_1` FOREIGN KEY (`cod_escolas`) REFERENCES `escolas` (`cod_escolas`);

--
-- Limitadores para a tabela `escolas`
--
ALTER TABLE `escolas`
  ADD CONSTRAINT `escolas_ibfk_1` FOREIGN KEY (`cod_users`) REFERENCES `users` (`cod_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
