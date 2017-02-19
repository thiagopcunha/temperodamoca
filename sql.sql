-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07-Dez-2016 às 12:43
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tempero`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_adm` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id_adm`, `nome`, `email`, `login`, `senha`) VALUES
(1, 'danilo', 'dan@hotmail.com', 'daniloadm', 'daniloadm'),
(2, 'danilo', 'danilo@hotmail.com', 'danilo', 'danilo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio`
--

CREATE TABLE `cardapio` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` decimal(5,2) NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cardapio`
--

INSERT INTO `cardapio` (`id`, `nome`, `preco`, `imagem`, `descricao`) VALUES
(5, 'Bisteca', '12.00', '../view/image/cardapio/bisteca.jpg', 'Bisteca, Arroz, Alface'),
(6, 'Calabresa', '12.00', '../view/image/cardapio/calabresa.jpg', 'Calabresa, Maionese, Arroz, Alface'),
(7, 'Omelete', '12.00', '../view/image/cardapio/omelete.jpg', 'Omelete, Tomate, Arroz'),
(8, 'Picadinho', '12.00', '../view/image/cardapio/picadinho.jpg', 'Picadinho, Arroz, Alface'),
(9, 'Frango', '12.00', '../view/image/cardapio/frango.jpg', 'Frango, Arroz, Fritas, Alface'),
(10, 'Bife', '12.00', '../view/image/cardapio/bife.jpg', 'Bife, Arroz, Cebola');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id_msg` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` int(20) NOT NULL,
  `mensagem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitas`
--

CREATE TABLE `visitas` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `uniques` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `pageviews` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `visitas`
--

INSERT INTO `visitas` (`id`, `data`, `uniques`, `pageviews`) VALUES
(1, '2016-11-28', 1, 48),
(2, '2016-11-30', 3, 21),
(3, '2016-12-01', 1, 10),
(4, '2016-12-07', 1, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indexes for table `cardapio`
--
ALTER TABLE `cardapio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id_msg`);

--
-- Indexes for table `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data` (`data`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cardapio`
--
ALTER TABLE `cardapio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
