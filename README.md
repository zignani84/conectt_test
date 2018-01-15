# conectt_test
Formulário de Inscrição com validação e Impede que um cliente se cadastre duas vezes para o evento; Apenas clientes maiores de 18 anos podem efetuar a inscrição; Formulário responsivo para se adaptar a dispositivos móveis e não faz recarregamento da página (postback). Relatório de inscritos ordenados pela Idade.

Deve-se criar uma base de dados em localhost, usuario root e senha em branco com o nome de "connect_test" e uma tabela com nome de "users"
 com a seguinte estrutura:
 
 -- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Jan-2018 às 07:47
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `connect_test`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `cpf` varchar(14) COLLATE latin1_general_ci NOT NULL,
  `data` date NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `company` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `telefone` varchar(14) COLLATE latin1_general_ci DEFAULT NULL,
  `cell` varchar(15) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
