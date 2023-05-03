-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Mar-2023 às 22:25
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `carros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(10) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `funcionario_entrada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `usuario`, `senha`, `funcionario_entrada`) VALUES
(1, 'armando', 'e10adc3949ba59abbe56e057f20f883e', '2023-03-30 14:20:38'),
(3, 'Laylton', 'e10adc3949ba59abbe56e057f20f883e', '2023-03-30 13:45:20'),
(4, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2023-03-30 13:56:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `id` int(11) NOT NULL,
  `placa` varchar(8) NOT NULL,
  `data_cadastro` date NOT NULL,
  `horario_entrada` time NOT NULL,
  `horario_saida` time DEFAULT NULL,
  `estacionado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`id`, `placa`, `data_cadastro`, `horario_entrada`, `horario_saida`, `estacionado`) VALUES
(2, 'BPG5992', '2023-03-30', '14:20:46', '16:11:31', 0),
(4, 'AWA1431', '2023-03-20', '15:50:17', '16:58:31', 0),
(5, 'BPG5993', '2023-03-20', '16:15:46', '13:50:40', 0),
(6, 'BPG5991', '2023-03-20', '16:15:56', '13:49:34', 0),
(7, 'DBF3349', '2023-03-20', '16:31:34', '13:51:09', 0),
(8, 'OMX8135', '2023-03-23', '14:10:15', '13:51:16', 0),
(11, 'ONX8135', '2023-03-23', '14:22:49', '13:52:40', 0),
(12, 'KNA2314', '2023-03-24', '02:24:13', '13:57:18', 0),
(13, 'TAB4521', '2023-03-24', '02:24:36', '16:11:37', 0),
(17, 'ETA9462', '2023-03-23', '14:36:52', '16:11:39', 0),
(18, 'JHK2538', '2023-03-24', '02:37:46', '16:11:40', 0),
(19, 'LMC6293', '2023-03-24', '02:38:24', '16:11:41', 0),
(20, 'GHT2145', '2023-03-24', '02:38:35', '16:11:42', 0),
(21, 'LMK9210', '2023-03-23', '14:38:55', '16:11:43', 0),
(22, 'GPI2723', '2023-03-23', '14:42:46', '16:58:22', 0),
(23, 'GPI2753', '2023-03-23', '14:42:51', '16:56:41', 0),
(24, 'GPI2756', '2023-03-24', '02:43:07', '16:35:08', 0),
(25, 'GPI7523', '2023-03-24', '02:43:14', '16:33:56', 0),
(26, 'GPI8654', '2023-03-23', '14:44:33', '16:33:28', 0),
(27, 'HRT1235', '2023-03-23', '15:54:35', NULL, 0),
(28, 'HET8742', '2023-03-30', '13:46:35', '16:11:44', 0),
(29, 'ROE8456', '2023-03-30', '17:15:52', '17:15:50', 1),
(30, 'RYE0291', '2023-03-30', '16:21:59', '16:22:02', 1),
(31, 'PWO7163', '2023-03-30', '16:22:58', '16:23:02', 0),
(32, 'COV8721', '2023-03-30', '16:24:40', NULL, 1),
(33, 'BRA2E19', '2023-03-30', '16:25:01', '16:26:38', 0),
(34, 'PXL9482', '2023-03-30', '17:16:35', NULL, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
