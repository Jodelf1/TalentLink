-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Dez-2024 às 18:15
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `talentlink_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidaturas`
--

CREATE TABLE `candidaturas` (
  `id` int(11) UNSIGNED NOT NULL,
  `vaga_id` int(11) UNSIGNED NOT NULL,
  `candidato_id` int(11) UNSIGNED NOT NULL,
  `status` enum('pendente','em_avaliacao','aceito','rejeitado') DEFAULT 'pendente',
  `data_candidatura` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias_vagas`
--

CREATE TABLE `categorias_vagas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cv`
--

CREATE TABLE `cv` (
  `id` int(11) UNSIGNED NOT NULL,
  `candidato_id` int(11) UNSIGNED NOT NULL,
  `biografria` text NOT NULL,
  `data_nasc` date NOT NULL,
  `telefone` int(13) NOT NULL,
  `profissao` varchar(255) NOT NULL,
  `formacao` text NOT NULL,
  `habilidades` text NOT NULL,
  `experiencias` text DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(11) NOT NULL,
  `referencia_id` int(10) UNSIGNED NOT NULL,
  `tipo_referencia` enum('vaga','formacao','utilizador') NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `tipo` enum('vaga','formacao','entrevista','sistema') NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `mensagem` text NOT NULL,
  `lida` tinyint(1) DEFAULT 0,
  `referencia_id` int(10) UNSIGNED DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfis_empresas`
--

CREATE TABLE `perfis_empresas` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) UNSIGNED NOT NULL,
  `nome_empresa` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `localizacao` varchar(255) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfis_formadores`
--

CREATE TABLE `perfis_formadores` (
  `id` int(11) UNSIGNED NOT NULL,
  `formador_id` int(11) UNSIGNED NOT NULL,
  `nome_formador` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `especialidades` text NOT NULL,
  `localizacao` varchar(255) DEFAULT NULL,
  `contato` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `phpauth_attempts`
--

CREATE TABLE `phpauth_attempts` (
  `id` int(11) NOT NULL,
  `ip` char(39) NOT NULL,
  `expiredate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `phpauth_config`
--

CREATE TABLE `phpauth_config` (
  `id` int(11) UNSIGNED NOT NULL,
  `setting` varchar(100) NOT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `phpauth_config`
--

INSERT INTO `phpauth_config` (`id`, `setting`, `value`) VALUES
(1, 'allow_concurrent_sessions', '0'),
(2, 'attack_mitigation_time', '+30 minutes'),
(3, 'attempts_before_ban', '30'),
(4, 'attempts_before_verify', '5'),
(5, 'bcrypt_cost', '10'),
(6, 'cookie_domain', ''),
(7, 'cookie_forget', '+30 minutes'),
(8, 'cookie_http', '1'),
(9, 'cookie_name', 'phpauth_session_cookie'),
(10, 'cookie_path', '/'),
(11, 'cookie_remember', '+1 month'),
(12, 'cookie_renew', '+5 minutes'),
(13, 'cookie_samesite', 'Strict'),
(14, 'cookie_secure', '1'),
(15, 'custom_datetime_format', 'Y-m-d H:i'),
(16, 'emailmessage_suppress_activation', '0'),
(17, 'emailmessage_suppress_reset', '0'),
(18, 'request_key_expiration', '+10 minutes'),
(19, 'site_activation_page', 'activate'),
(20, 'site_activation_page_append_code', '0'),
(21, 'site_email', 'no-reply@phpauth.cuonic.com'),
(22, 'site_key', 'fghuior.)/!/jdUkd8s2!7HVHG7777ghg'),
(23, 'site_language', 'en_GB'),
(24, 'site_name', 'PHPAuth'),
(25, 'site_password_reset_page', 'reset'),
(26, 'site_password_reset_page_append_code', '0'),
(27, 'site_timezone', 'Europe/Paris'),
(28, 'site_url', 'https://github.com/PHPAuth/PHPAuth'),
(29, 'smtp', '0'),
(30, 'smtp_auth', '1'),
(31, 'smtp_debug', '0'),
(32, 'smtp_host', 'smtp.example.com'),
(33, 'smtp_password', 'password'),
(34, 'smtp_port', '25'),
(35, 'smtp_security', ''),
(36, 'smtp_username', 'email@example.com'),
(37, 'table_attempts', 'phpauth_attempts'),
(38, 'table_emails_banned', 'phpauth_emails_banned'),
(39, 'table_requests', 'phpauth_requests'),
(40, 'table_sessions', 'phpauth_sessions'),
(41, 'table_translations', 'phpauth_translation_dictionary'),
(42, 'table_users', 'phpauth_users'),
(43, 'translation_source', 'php'),
(44, 'uses_session', '0'),
(45, 'verify_email_max_length', '100'),
(46, 'verify_email_min_length', '5'),
(47, 'verify_password_min_length', '3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `phpauth_emails_banned`
--

CREATE TABLE `phpauth_emails_banned` (
  `id` int(11) NOT NULL,
  `domain` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `phpauth_requests`
--

CREATE TABLE `phpauth_requests` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `token` char(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `expire` datetime NOT NULL,
  `type` enum('activation','reset') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `phpauth_sessions`
--

CREATE TABLE `phpauth_sessions` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `hash` char(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `expiredate` datetime NOT NULL,
  `ip` varchar(39) NOT NULL,
  `device_id` varchar(36) DEFAULT NULL,
  `agent` varchar(200) NOT NULL,
  `cookie_crc` char(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `phpauth_users`
--

CREATE TABLE `phpauth_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isactive` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `dt` datetime NOT NULL DEFAULT current_timestamp(),
  `user_type` enum('candidato','empresa','formador','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `phpauth_users`
--

INSERT INTO `phpauth_users` (`id`, `email`, `password`, `isactive`, `dt`, `user_type`) VALUES
(3, 'itzjoestar@proton.me', '$2y$10$9lGPRDVUywVqukIvgWF0f.kZxmu4Df6Bl3ZgNYkO/XyPYPVsYRds.', 0, '2024-12-31 17:25:01', 'candidato'),
(4, 'jodelfimarimba@gmail.com', '$2y$10$V7qy2G2h/8FnDC2GrxOvTOBrutvx0.AUX4L1IxPthWX6FvibVrLtW', 0, '2024-12-31 17:27:32', 'empresa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE `vagas` (
  `id` int(11) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `empresa_id` int(10) UNSIGNED NOT NULL,
  `requisitos` text NOT NULL,
  `localidade` varchar(255) NOT NULL,
  `salario_min` decimal(10,2) NOT NULL,
  `salario_max` decimal(10,2) NOT NULL,
  `data_expiracao` date NOT NULL,
  `status` enum('ativo','expirado','deletado') DEFAULT 'ativo',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `webinars_formacoes`
--

CREATE TABLE `webinars_formacoes` (
  `id` int(11) UNSIGNED NOT NULL,
  `formador_id` int(11) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `data_inicio` datetime NOT NULL,
  `data_fim` datetime NOT NULL,
  `localizacao` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `candidaturas`
--
ALTER TABLE `candidaturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vaga_id` (`vaga_id`),
  ADD KEY `candidato_id` (`candidato_id`);

--
-- Índices para tabela `categorias_vagas`
--
ALTER TABLE `categorias_vagas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidato_id` (`candidato_id`);

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_imagens_formacoes` (`referencia_id`);

--
-- Índices para tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `fk_referencia_usuarios` (`referencia_id`);

--
-- Índices para tabela `perfis_empresas`
--
ALTER TABLE `perfis_empresas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresa_id` (`empresa_id`);

--
-- Índices para tabela `perfis_formadores`
--
ALTER TABLE `perfis_formadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formador_id` (`formador_id`);

--
-- Índices para tabela `phpauth_config`
--
ALTER TABLE `phpauth_config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting` (`setting`);

--
-- Índices para tabela `phpauth_users`
--
ALTER TABLE `phpauth_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `vagas`
--
ALTER TABLE `vagas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresa_id` (`empresa_id`),
  ADD KEY `fk_categoria` (`categoria_id`);

--
-- Índices para tabela `webinars_formacoes`
--
ALTER TABLE `webinars_formacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formador_id` (`formador_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `candidaturas`
--
ALTER TABLE `candidaturas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categorias_vagas`
--
ALTER TABLE `categorias_vagas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cv`
--
ALTER TABLE `cv`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `perfis_empresas`
--
ALTER TABLE `perfis_empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `perfis_formadores`
--
ALTER TABLE `perfis_formadores`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `phpauth_config`
--
ALTER TABLE `phpauth_config`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `phpauth_users`
--
ALTER TABLE `phpauth_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `vagas`
--
ALTER TABLE `vagas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `webinars_formacoes`
--
ALTER TABLE `webinars_formacoes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `candidaturas`
--
ALTER TABLE `candidaturas`
  ADD CONSTRAINT `candidaturas_ibfk_1` FOREIGN KEY (`vaga_id`) REFERENCES `vagas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `candidaturas_ibfk_2` FOREIGN KEY (`candidato_id`) REFERENCES `phpauth_users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `cv`
--
ALTER TABLE `cv`
  ADD CONSTRAINT `cv_ibfk_1` FOREIGN KEY (`candidato_id`) REFERENCES `phpauth_users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `fk_imagens_formacoes` FOREIGN KEY (`referencia_id`) REFERENCES `webinars_formacoes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_imagens_utilizadores` FOREIGN KEY (`referencia_id`) REFERENCES `phpauth_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_imagens_vagas` FOREIGN KEY (`referencia_id`) REFERENCES `vagas` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD CONSTRAINT `fk_referencia_formacoes` FOREIGN KEY (`referencia_id`) REFERENCES `webinars_formacoes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_referencia_usuarios` FOREIGN KEY (`referencia_id`) REFERENCES `phpauth_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_referencia_vagas` FOREIGN KEY (`referencia_id`) REFERENCES `vagas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notificacoes_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `phpauth_users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `perfis_empresas`
--
ALTER TABLE `perfis_empresas`
  ADD CONSTRAINT `perfis_empresas_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `phpauth_users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `perfis_formadores`
--
ALTER TABLE `perfis_formadores`
  ADD CONSTRAINT `perfis_formadores_ibfk_1` FOREIGN KEY (`formador_id`) REFERENCES `phpauth_users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `vagas`
--
ALTER TABLE `vagas`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias_vagas` (`id`),
  ADD CONSTRAINT `vagas_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `phpauth_users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `webinars_formacoes`
--
ALTER TABLE `webinars_formacoes`
  ADD CONSTRAINT `webinars_formacoes_ibfk_1` FOREIGN KEY (`formador_id`) REFERENCES `phpauth_users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
