-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 20 sep. 2023 à 16:20
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbparrot`
--

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Renault'),
(2, 'Peugeot'),
(3, 'Dacia'),
(4, 'Ford');

-- --------------------------------------------------------

--
-- Structure de la table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `energy_id` int(11) NOT NULL,
  `mileage` int(11) NOT NULL,
  `power` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date_circulation` date NOT NULL,
  `reference` varchar(20) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `car`
--

INSERT INTO `car` (`id`, `brand_id`, `model_id`, `year_id`, `color_id`, `energy_id`, `mileage`, `power`, `price`, `date_circulation`, `reference`, `image_name`) VALUES
(2, 1, 1, 1, 1, 1, 1200, 120, 25000, '2023-01-01', 'kjhkj', 'voiture1-6509c3457a255927738762.jpg'),
(3, 1, 1, 1, 1, 1, 200, 120, 30000, '2023-01-01', 'gfdgfd', 'slider-6509ce0ca21f5317154372.jpg'),
(4, 1, 1, 1, 1, 1, 3220, 100, 18000, '2023-01-01', 'oihlkjn', 'slider-3-6509d82c25054880584235.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'Rouge'),
(2, 'Noir'),
(4, 'Gris'),
(5, 'Bleu');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `subject` longtext NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_testimony` tinyint(1) NOT NULL,
  `car_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`id`, `firstname`, `lastname`, `email`, `is_testimony`, `car_id`) VALUES
(1, 'Albert', 'Emon', 'albertemon@yahoo.fr', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230913122526', '2023-09-13 14:25:58', 61),
('DoctrineMigrations\\Version20230913152913', '2023-09-13 18:01:08', 71),
('DoctrineMigrations\\Version20230916131417', '2023-09-16 15:14:58', 54),
('DoctrineMigrations\\Version20230916140904', '2023-09-16 16:09:53', 271),
('DoctrineMigrations\\Version20230916141544', '2023-09-16 16:15:57', 114),
('DoctrineMigrations\\Version20230916144218', '2023-09-16 16:42:40', 61),
('DoctrineMigrations\\Version20230916145712', '2023-09-16 16:57:53', 549),
('DoctrineMigrations\\Version20230916150459', '2023-09-16 17:05:08', 35),
('DoctrineMigrations\\Version20230916153326', '2023-09-16 17:33:33', 32),
('DoctrineMigrations\\Version20230916153604', '2023-09-16 17:36:11', 68),
('DoctrineMigrations\\Version20230917214412', '2023-09-17 23:44:55', 40),
('DoctrineMigrations\\Version20230918103144', '2023-09-18 12:32:04', 187),
('DoctrineMigrations\\Version20230918144249', '2023-09-18 16:43:08', 118),
('DoctrineMigrations\\Version20230918181233', '2023-09-18 20:12:49', 168),
('DoctrineMigrations\\Version20230918190745', '2023-09-18 21:08:05', 78),
('DoctrineMigrations\\Version20230918191127', '2023-09-18 21:11:35', 163),
('DoctrineMigrations\\Version20230918202928', '2023-09-18 22:29:49', 99),
('DoctrineMigrations\\Version20230918203355', '2023-09-18 22:34:03', 171),
('DoctrineMigrations\\Version20230919022653', '2023-09-19 04:27:03', 142),
('DoctrineMigrations\\Version20230919123121', '2023-09-19 14:31:28', 106),
('DoctrineMigrations\\Version20230919135655', '2023-09-19 15:57:03', 69),
('DoctrineMigrations\\Version20230919151206', '2023-09-19 17:12:17', 33),
('DoctrineMigrations\\Version20230919151310', '2023-09-19 17:13:15', 29),
('DoctrineMigrations\\Version20230919152258', '2023-09-19 17:23:13', 65),
('DoctrineMigrations\\Version20230919155003', '2023-09-19 17:50:12', 69),
('DoctrineMigrations\\Version20230920010107', '2023-09-20 03:01:17', 90),
('DoctrineMigrations\\Version20230920010706', '2023-09-20 03:07:16', 67),
('DoctrineMigrations\\Version20230920111145', '2023-09-20 13:11:53', 87),
('DoctrineMigrations\\Version20230920121448', '2023-09-20 14:14:55', 57);

-- --------------------------------------------------------

--
-- Structure de la table `energy`
--

CREATE TABLE `energy` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `energy`
--

INSERT INTO `energy` (`id`, `name`) VALUES
(1, 'Electrique'),
(2, 'Diesel'),
(3, 'Hybride'),
(4, 'Essence');

-- --------------------------------------------------------

--
-- Structure de la table `hour`
--

CREATE TABLE `hour` (
  `id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `morning` varchar(255) NOT NULL,
  `afternoon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `hour`
--

INSERT INTO `hour` (`id`, `day`, `morning`, `afternoon`) VALUES
(1, 'Lundi', '9h - 12h', '13h - 18h'),
(2, 'Mardi', '9h - 12h', '13h - 18h'),
(3, 'Mercredi', '9h - 12h', '13h - 18h'),
(4, 'Jeudi', '9h - 12h', '13h - 18h'),
(5, 'Vendredi', '9h - 12h', '13h - 18h'),
(6, 'Samedi', '9h - 12h', '13h - 18h'),
(7, 'Dimanche', 'Fermé', 'Fermé');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model`
--

INSERT INTO `model` (`id`, `name`, `brand_id`) VALUES
(1, 'Mégane', 1),
(2, 'Captur', 1);

-- --------------------------------------------------------

--
-- Structure de la table `testimony`
--

CREATE TABLE `testimony` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `lastname`, `firstname`) VALUES
(7, 'mkaled@yahoo.fr', '[ \"ROLE_ADMIN\" ]', '$2y$13$2tGXitaCH4RNow5FRvklR.nZAg4aYeJyVQMrToyKQUwTfwQayYiwi', 'mkd', 'mkd'),
(8, 'albert@emon.fr', '[ \"ROLE_USER\" ]', '$2y$13$hS0Tviamz7iSNPP/iDlpee4cWOg.AzlxXLe5JXvF66sZUo4d77Q/.', 'emon', 'albert'),
(9, 'john@doe.fr', '[ \"ROLE_ADMIN\" ]', '$2y$13$L5UJ2SZen4JaiclO5bB5TuSm88MXKww/7tGlas/6C.nFI/ZHOY6fC', 'doe', 'john'),
(10, 'bill@boy.fr', '[\"ROLE_ADMIN\"]', '$2y$13$KmpNyXml94lHFya1q5VlaemotIs2ZqG6ymISqGuwLxu2.6DnKTbSu', 'boy', 'billy'),
(11, 'alpha@beta.fr', '[ \"ROLE_MODERATOR\" ]', '$2y$13$i0oOPE9G.EZiBTOgCUEM6OmD7oTuBjmgq.5S9yYP4ysIQ9H4TjcF.', 'beta', 'alpha'),
(12, 'tit@tot.fr', '[\"ROLE_USER\"]', '$2y$13$04Wm7NyNebLcfokexdMNDuMfm8ZQqnNLqzJ5dWvrt6xN0HK9vqnBe', 'ekek', 'allo');

-- --------------------------------------------------------

--
-- Structure de la table `year`
--

CREATE TABLE `year` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `year`
--

INSERT INTO `year` (`id`, `name`) VALUES
(1, '2023'),
(2, '2022'),
(3, '2021'),
(4, '2020');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_773DE69DAEA34913` (`reference`),
  ADD KEY `IDX_773DE69D44F5D008` (`brand_id`),
  ADD KEY `IDX_773DE69D7975B7E7` (`model_id`),
  ADD KEY `IDX_773DE69D40C1FEA7` (`year_id`),
  ADD KEY `IDX_773DE69D7ADA1FB5` (`color_id`),
  ADD KEY `IDX_773DE69DEDDF52D` (`energy_id`);

--
-- Index pour la table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4C62E6381645DEA9` (`reference_id`);

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_81398E09C3C6F69F` (`car_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `energy`
--
ALTER TABLE `energy`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hour`
--
ALTER TABLE `hour`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C53D045FC3C6F69F` (`car_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D79572D944F5D008` (`brand_id`);

--
-- Index pour la table `testimony`
--
ALTER TABLE `testimony`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_523C94879395C3F3` (`customer_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Index pour la table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `energy`
--
ALTER TABLE `energy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `hour`
--
ALTER TABLE `hour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `testimony`
--
ALTER TABLE `testimony`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `year`
--
ALTER TABLE `year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `FK_773DE69D40C1FEA7` FOREIGN KEY (`year_id`) REFERENCES `year` (`id`),
  ADD CONSTRAINT `FK_773DE69D44F5D008` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `FK_773DE69D7975B7E7` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`),
  ADD CONSTRAINT `FK_773DE69D7ADA1FB5` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `FK_773DE69DEDDF52D` FOREIGN KEY (`energy_id`) REFERENCES `energy` (`id`);

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `FK_4C62E6381645DEA9` FOREIGN KEY (`reference_id`) REFERENCES `car` (`id`);

--
-- Contraintes pour la table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_81398E09C3C6F69F` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_C53D045FC3C6F69F` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`);

--
-- Contraintes pour la table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `FK_D79572D944F5D008` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`);

--
-- Contraintes pour la table `testimony`
--
ALTER TABLE `testimony`
  ADD CONSTRAINT `FK_523C94879395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
