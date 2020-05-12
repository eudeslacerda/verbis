-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 27/10/2018 às 13:20
-- Versão do servidor: 5.5.61-cll
-- Versão do PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
USE verbis;
--
-- Banco de dados: `netius_verbis`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `corrections`
--

CREATE TABLE `corrections` (
  `id` int(10) NOT NULL,
  `note` varchar(45) NOT NULL,
  `comments` text NOT NULL,
  `isselected` tinyint(1) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  `wording_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `institutions`
--

CREATE TABLE `institutions` (
  `id` int(10) NOT NULL,
  `institution` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `institutions`
--

INSERT INTO `institutions` (`id`, `institution`) VALUES
(1, 'Escola Estadual Major Sant\'Clair'),
(2, 'IFNMG - Campus Arinos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `menus`
--

CREATE TABLE `menus` (
  `id` int(10) NOT NULL,
  `parent` int(10) NOT NULL DEFAULT '0',
  `menu` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `ordinance` int(1) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `menus`
--

INSERT INTO `menus` (`id`, `parent`, `menu`, `address`, `ordinance`, `published`) VALUES
(9, 0, 'Redação', '#', 1, 1),
(10, 0, 'Chave', 'secret', 2, 1),
(11, 14, 'Usuário', 'user', 1, 1),
(13, 0, 'Proposta de Redação', 'theme', 3, 1),
(14, 0, 'Configuração', '#', 5, 1),
(15, 14, 'Menu', 'menu', 2, 1),
(20, 14, 'Perfil', 'role', 3, 1),
(21, 9, 'Corrigir', 'correction/wordings', 1, 1),
(22, 9, 'Corrigidas', 'correction', 2, 1),
(23, 0, 'Minhas Redações', 'wording', 4, 1),
(24, 9, 'Selecionadas', 'wording/selecteds', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `persons`
--

CREATE TABLE `persons` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `persons`
--

INSERT INTO `persons` (`id`, `name`, `user_id`) VALUES
(4, 'Eude Soares de Lacerda', 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'Corretor', 'Privilégios de Corretor, concedidos após a inserção do Administrador.'),
(2, 'Administrador', 'Usuário administrativo, tem acesso a tudo.'),
(3, 'Discente', 'Aluno com acesso ao sistema.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `roles_menus`
--

CREATE TABLE `roles_menus` (
  `role_id` int(11) UNSIGNED NOT NULL,
  `menu_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `roles_menus`
--

INSERT INTO `roles_menus` (`role_id`, `menu_id`) VALUES
(1, 9),
(2, 9),
(1, 10),
(2, 10),
(2, 11),
(1, 13),
(2, 13),
(2, 14),
(2, 15),
(2, 20),
(1, 21),
(2, 21),
(1, 22),
(2, 22),
(2, 23),
(3, 23),
(1, 24),
(2, 24);

-- --------------------------------------------------------

--
-- Estrutura para tabela `roles_users`
--

CREATE TABLE `roles_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `roles_users`
--

INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(7, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `secrets`
--

CREATE TABLE `secrets` (
  `id` int(11) NOT NULL,
  `value` varchar(45) NOT NULL,
  `validity` date NOT NULL,
  `quantity` int(2) NOT NULL,
  `institution_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `secrets`
--

INSERT INTO `secrets` (`id`, `value`, `validity`, `quantity`, `institution_id`) VALUES
(10, 'PNM20181025202450', '2018-10-31', 20, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `serie` varchar(45) NOT NULL,
  `class` varchar(45) NOT NULL,
  `person_id` int(11) NOT NULL,
  `institution_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `themes`
--

CREATE TABLE `themes` (
  `id` int(11) NOT NULL,
  `theme` varchar(60) NOT NULL,
  `validity` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `themes`
--

INSERT INTO `themes` (`id`, `theme`, `validity`, `description`) VALUES
(1, 'A vida na cidade', '2018-10-31', ' ajf akf aiof apoi fpao fpa poa fpoai fpoa fpao dfpaodf');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(254) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL,
  `logins` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `logins`, `last_login`, `status`) VALUES
(7, 'eude.lacerda@ifnmg.edu.br', 'eude.lacerda', 'af93cdff0f33b72eae062af2f15e3f79f7f0a5de9f6ec2b4e8b0c3cbb3c17df3', 48, 1540656836, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `user_tokens`
--

CREATE TABLE `user_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `created` int(10) UNSIGNED NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `user_tokens`
--

INSERT INTO `user_tokens` (`id`, `user_id`, `user_agent`, `token`, `created`, `expires`) VALUES
(21, 7, 'f3c67ccc7a9b255837ebdbbec971be5d2a8067ca', '13d918e271c691e9b7fa5624c548ead3b74d4f79', 1540656836, 1541866436);

-- --------------------------------------------------------

--
-- Estrutura para tabela `wordings`
--

CREATE TABLE `wordings` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `insertdate` date NOT NULL,
  `iscorrected` tinyint(1) NOT NULL DEFAULT '0',
  `secret_id` int(11) NOT NULL,
  `student_id` int(10) NOT NULL,
  `theme_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `corrections`
--
ALTER TABLE `corrections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_corrections_wordings1_idx` (`wording_id`),
  ADD KEY `fk_corrections_peoples1_idx` (`person_id`);

--
-- Índices de tabela `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Índices de tabela `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Índices de tabela `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_pessoas_users1_idx` (`user_id`);

--
-- Índices de tabela `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_name` (`name`);

--
-- Índices de tabela `roles_menus`
--
ALTER TABLE `roles_menus`
  ADD PRIMARY KEY (`role_id`,`menu_id`),
  ADD KEY `fk_roles_has_menus_menus1_idx` (`menu_id`),
  ADD KEY `fk_roles_has_menus_roles1_idx` (`role_id`);

--
-- Índices de tabela `roles_users`
--
ALTER TABLE `roles_users`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `fk_role_id` (`role_id`);

--
-- Índices de tabela `secrets`
--
ALTER TABLE `secrets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `chave_UNIQUE` (`value`),
  ADD KEY `fk_keys_institutions1_idx` (`institution_id`);

--
-- Índices de tabela `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `people_id_UNIQUE` (`person_id`),
  ADD KEY `fk_students_peoples1_idx` (`person_id`),
  ADD KEY `fk_students_institutions1_idx` (`institution_id`);

--
-- Índices de tabela `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_username` (`username`),
  ADD UNIQUE KEY `uniq_email` (`email`);

--
-- Índices de tabela `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_token` (`token`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `expires` (`expires`);

--
-- Índices de tabela `wordings`
--
ALTER TABLE `wordings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_wordings_keys1_idx` (`secret_id`),
  ADD KEY `fk_wordings_students1_idx` (`student_id`),
  ADD KEY `fk_wordings_themes1_idx` (`theme_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `corrections`
--
ALTER TABLE `corrections`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `secrets`
--
ALTER TABLE `secrets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `user_tokens`
--
ALTER TABLE `user_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `wordings`
--
ALTER TABLE `wordings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `corrections`
--
ALTER TABLE `corrections`
  ADD CONSTRAINT `fk_corrections_wordings1_idx` FOREIGN KEY (`wording_id`) REFERENCES `wordings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_corrections_persons1_idx` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `persons`
--
ALTER TABLE `persons`
  ADD CONSTRAINT `fk_person_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `roles_menus`
--
ALTER TABLE `roles_menus`
  ADD CONSTRAINT `fk_roles_has_menus_menus1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_roles_has_menus_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `roles_users`
--
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `secrets`
--
ALTER TABLE `secrets`
  ADD CONSTRAINT `fk_keys_institutions1` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_students_institutions1` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_students_persons1` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `wordings`
--
ALTER TABLE `wordings`
  ADD CONSTRAINT `fk_wordings_themes1` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_wordings_keys1` FOREIGN KEY (`secret_id`) REFERENCES `secrets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_wordings_students1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
