-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Jul-2018 às 18:23
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolas`
--

CREATE TABLE `escolas` (
  `email_escolas` varchar(100) COLLATE utf8_bin NOT NULL,
  `senha_escolas` varchar(20) COLLATE utf8_bin NOT NULL,
  `bairro_escolas` varchar(50) COLLATE utf8_bin NOT NULL,
  `rua_escolas` varchar(50) COLLATE utf8_bin NOT NULL,
  `cod_escolas` int(10) NOT NULL,
  `nomeAcesso_escolas` varchar(26) COLLATE utf8_bin NOT NULL,
  `nome_escolas` varchar(100) COLLATE utf8_bin NOT NULL,
  `telefone_escolas` varchar(15) COLLATE utf8_bin NOT NULL,
  `cnpj_escolas` varchar(18) COLLATE utf8_bin NOT NULL,
  `cod_users` int(10) NOT NULL,
  `num_escolas` varchar(5) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `escolas`
--

INSERT INTO `escolas` (`email_escolas`, `senha_escolas`, `bairro_escolas`, `rua_escolas`, `cod_escolas`, `nomeAcesso_escolas`, `nome_escolas`, `telefone_escolas`, `cnpj_escolas`, `cod_users`, `num_escolas`) VALUES
('escola@teste.com', '123456', 'Joaquim Romão', 'Princesa Isabel', 1, 'medici', 'Centro Educacional Presidente Médici', '(22) 22222-2222', '22.222.222/2222-22', 1, 's/n');

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
  ADD PRIMARY KEY (`cod_alunos`);

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
  MODIFY `cod_alunos` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `escolas`
--
ALTER TABLE `escolas`
  MODIFY `cod_escolas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Limitadores para a tabela `escolas`
--
ALTER TABLE `escolas`
  ADD CONSTRAINT `escolas_ibfk_1` FOREIGN KEY (`cod_users`) REFERENCES `users` (`cod_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
