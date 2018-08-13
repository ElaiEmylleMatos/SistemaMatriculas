-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Ago-2018 às 05:43
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
(1, 'Centro Educacional Presidente Médici', 'Presidente.medici@outlook.com', 'panda', '123456', '(73) 3525-7694', '33.019.548/0001-32', '45200-747', 'Princesa Isabel', 'Joaquim Romão', 'Jequié', 'BA', 2, '6', '2018-08-12', ''),
(2, 'School Of Performing Arts', 'Seoul_arts@sopa.kr', 'sopa', 'nct', '(73) 98853-8245', '00.280.273/0001-37', '45200-747', 'Neo City Avenue', 'Gangnam', 'Seoul', 'KR', 2, '127', '2018-08-10', 'SOPA'),
(3, 'Emylle Matos Academy', 'emyllematos7@gmail.com', 'emylle', '123456', '73988397290', '62.726.310/0001-45', '45200-747', 'Neo City Avenue', 'Neo Bairro', 'Neo City', 'KR', 2, 's/n', '2018-08-12', 'EMA'),
(4, 'Escolinha da Vida Anormal', 'escola@eva.com', 'ui', '123', '(73) 98839-7290', '21.759.758/0001-88', '45200-747', 'Rua Demosthenes Pires', 'Joaquim Romão', 'Jequié', 'BA', 2, 's/n', '2018-08-12', 'EVA'),
(5, 'Escola Stray Kids', 'Stray.kids@jyp.kr', 'taeyongah', '123456', '(73) 98839-7290', '01.773.518/0001-20', '45200-747', 'Han Hyunjinie', 'Jisung', 'Seoul', 'KR', 2, 's/n', '2018-08-12', '');

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
  MODIFY `cod_escolas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
