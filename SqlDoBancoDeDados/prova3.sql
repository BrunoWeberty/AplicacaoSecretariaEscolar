-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 01-Maio-2019 às 23:36
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prova3`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id`, `descricao`, `created_at`, `updated_at`) VALUES
(1, 'Algoritmo', '2018-06-20 07:35:23', '2018-06-20 07:35:39'),
(2, 'Desenvolvimento de Aplicações Web', '2018-06-24 01:42:20', '2018-06-24 01:42:20'),
(4, 'Matemática Financeira', '2018-06-24 01:46:05', '2018-06-24 01:46:05'),
(6, 'Estrutura de Dados', '2018-06-28 15:55:33', '2018-06-28 15:55:33'),
(7, 'Calculo I', '2018-06-28 15:56:17', '2018-06-28 15:56:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_20_041546_create_disciplinas_table', 2),
(4, '2018_06_20_044845_create_professors_table', 3),
(7, '2018_06_24_001131_create_professor__disciplinas_table', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataN` date NOT NULL,
  `telefone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idade` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id`, `nome`, `cpf`, `dataN`, `telefone`, `idade`, `created_at`, `updated_at`) VALUES
(15, 'Emerson Gabriel', '777.777.777-77', '2018-06-04', '45 45454-5454', 0, '2018-06-28 13:25:00', '2018-06-28 13:25:00'),
(16, 'Jean Sousa', '117.234.834-90', '1993-06-15', '38 99232-3232', 25, '2018-06-28 13:26:18', '2018-06-29 00:09:01'),
(17, 'Gabriel', '130.123.782-90', '1999-02-23', '10 10101-0101', 19, '2018-06-28 13:27:16', '2018-06-28 13:27:16'),
(18, 'Mario', '119.234.762-80', '2015-06-23', '13 13131-3131', 3, '2018-06-28 13:28:09', '2018-06-28 13:28:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_disciplina`
--

CREATE TABLE `professor_disciplina` (
  `id` int(10) UNSIGNED NOT NULL,
  `professor_id` int(10) UNSIGNED DEFAULT NULL,
  `disciplina_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `professor_disciplina`
--

INSERT INTO `professor_disciplina` (`id`, `professor_id`, `disciplina_id`, `created_at`, `updated_at`) VALUES
(42, 15, 7, '2018-06-28 13:25:00', '2018-06-28 13:25:00'),
(43, 15, 2, '2018-06-28 13:25:00', '2018-06-28 13:25:00'),
(44, 15, 6, '2018-06-28 13:25:00', '2018-06-28 13:25:00'),
(47, 17, 2, '2018-06-28 13:27:16', '2018-06-28 13:27:16'),
(48, 17, 6, '2018-06-28 13:27:16', '2018-06-28 13:27:16'),
(49, 17, 4, '2018-06-28 13:27:16', '2018-06-28 13:27:16'),
(50, 18, 1, '2018-06-28 13:28:09', '2018-06-28 13:28:09'),
(51, 18, 7, '2018-06-28 13:28:10', '2018-06-28 13:28:10'),
(52, 18, 6, '2018-06-28 13:28:10', '2018-06-28 13:28:10'),
(53, 18, 4, '2018-06-28 13:28:10', '2018-06-28 13:28:10'),
(56, 16, 2, '2018-06-29 00:09:19', '2018-06-29 00:09:19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pedro Ribeiro', 'pedro@hotmail.com', '$2y$10$38HTyxFxtl9CeVbS2vLlH.NAnUv6riicyobl84nkkH3esmrvMQqTO', 'CnAmaRxyXQY2Ep6aGfXCyyO4VY2bLYy0adHICoK60tBGaWB5ImVUhqyffXtZ', '2018-06-20 07:09:02', '2018-06-20 07:09:02'),
(2, 'Maria Aparecida', 'maria@hotmail.com', '$2y$10$BtG/iYci3l1Mdf.63c7wAuWFbHUc62lU/b.lHGm1QU/BZmtHBPfu2', '11111111', '2018-06-20 07:10:00', '2018-06-20 07:10:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor_disciplina`
--
ALTER TABLE `professor_disciplina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professor_disciplina_professor_id_foreign` (`professor_id`),
  ADD KEY `professor_disciplina_disciplina_id_foreign` (`disciplina_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `professor_disciplina`
--
ALTER TABLE `professor_disciplina`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `professor_disciplina`
--
ALTER TABLE `professor_disciplina`
  ADD CONSTRAINT `professor_disciplina_disciplina_id_foreign` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplina` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `professor_disciplina_professor_id_foreign` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
