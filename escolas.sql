-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Ago-2018 às 18:27
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
  `data_cadastro` date NOT NULL,
  `sigla_escolas` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `escolas`
--

INSERT INTO `escolas` (`cod_escolas`, `nome_escolas`, `email_escolas`, `nomeAcesso_escolas`, `senha_escolas`, `telefone_escolas`, `cnpj_escolas`, `cep_escolas`, `rua_escolas`, `bairro_escolas`, `cidade_escolas`, `uf_escolas`, `cod_users`, `num_escolas`, `data_cadastro`, `sigla_escolas`) VALUES
(1, 'Centro Educacional Presidente Médici', 'emyllematos7@gmail.com', 'panda', '123456', '(73) 98839-7290', '22.222.222/2222-22', '45200-747', 'Princesa Isabel', 'Joaquim Romão', 'Jequié', 'BA', 2, '6', '2018-07-28', ''),
(2, 'School Of Performing Arts', 'emyllematos7@gmail.com', 'sopa', 'nct', '(73) 98839-7290', '00.280.273/0001-37', '45200-747', 'Neo City Avenue', 'Gangnam', 'Seoul', 'KR', 2, '127', '2018-08-09', 'SOPA'),
(3, '', '', '', '', '', '', '', '', '', '', '', 2, 's/n', '2018-08-09', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `escolas`
--
ALTER TABLE `escolas`
  ADD PRIMARY KEY (`cod_escolas`),
  ADD KEY `cod_users` (`cod_users`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `escolas`
--
ALTER TABLE `escolas`
  MODIFY `cod_escolas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
