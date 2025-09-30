-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Set-2025 às 16:14
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `protudos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tablets`
--

CREATE TABLE `tablets` (
  `tab_cod` int(11) NOT NULL,
  `tab_descricao` varchar(30) NOT NULL,
  `tab_fabricante` varchar(15) NOT NULL,
  `tab_numeroserie` varchar(30) NOT NULL,
  `tab_acessorios` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tablets`
--

INSERT INTO `tablets` (`tab_cod`, `tab_descricao`, `tab_fabricante`, `tab_numeroserie`, `tab_acessorios`) VALUES
(3, 'Samsung ABC', 'Sansung', '789', 'Fone de Ouvido'),
(4, 'Xaoimi', 'Xaiomi', '456', 'Fone de Ouvido');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tablets`
--
ALTER TABLE `tablets`
  ADD PRIMARY KEY (`tab_cod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tablets`
--
ALTER TABLE `tablets`
  MODIFY `tab_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
