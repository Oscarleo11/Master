-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 20 fév. 2024 à 14:30
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `monochop`
--

-- --------------------------------------------------------

--
-- Structure de la table `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `photo_profil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `adm`
--

INSERT INTO `adm` (`id`, `pseudo`, `email`, `motdepasse`, `photo_profil`) VALUES
(77, 'Hegel', 'hegel@admin.com', '12345678', ''),
(79, 'Blaire', 'blaire@gmail.com', '12345', ''),
(87, 'Mouba', 'mouba@gmail.com', '123456', ''),
(88, 'Oscar Leo', 'leo@gmail.com', '123456', ''),
(89, 'Acolade', 'acolade@gmail.com', '1234567', '');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `description`) VALUES
(1, 'Sneaker', 'Des chaussures pour tous');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` text NOT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `image`, `nom`, `prix`, `description`, `id_admin`) VALUES
(90, '../../admin/MyDashboard/images/vuiyon.jpeg', 'Sac bandoulière', 453, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender.Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender', NULL),
(91, '../../admin/MyDashboard/images/Louis.jpeg', 'Sac bandoulière', 453, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender.Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender', NULL),
(93, '../../admin/MyDashboard/images/Yeezy706.jpeg', 'Yeezy700', 231, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender.Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender', NULL),
(94, '../../admin/MyDashboard/images/Yeezy704.webp', 'Yeezy702', 213, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender.Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender', NULL),
(95, '../../admin/MyDashboard/images/Yeezy703.jpeg', 'Yeezy703', 213, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender.Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender', NULL),
(96, '../../admin/MyDashboard/images/Yeezy701.jpeg', 'Yeezy704', 322, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender.Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender', NULL),
(97, '../../admin/MyDashboard/images/Yeezy700.jpeg', 'Yeezy705', 135, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender.Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender', NULL),
(98, '../../admin/MyDashboard/images/Yeezy705.jpeg', 'Yeezy706', 231, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender.Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender', NULL),
(99, '../../admin/MyDashboard/images/Yeezy708.jpeg', 'Yeezy708', 232, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender.Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender', NULL),
(100, '../../admin/MyDashboard/images/Yeezy709.jpeg', 'Yeezy709', 432, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender.Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender', NULL),
(101, '../../admin/MyDashboard/images/Yeezy70.jpeg', 'Yeezy700', 175, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender.Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender', NULL),
(102, '../../admin/MyDashboard/images/Yeezy7.jpeg', 'Yeezy707', 712, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender.Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender', NULL),
(103, '../../admin/MyDashboard/images/Yeezy7022.jpeg', 'Yeezy702', 175, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender.Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender', NULL),
(104, '../../admin/MyDashboard/images/Yeezy71C.jpeg', 'Yeezy711', 164, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender.Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender', NULL),
(105, '../../admin/MyDashboard/images/images.jpeg', 'Yeezy712', 271, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender.Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender', NULL),
(106, '../../admin/MyDashboard/images/images (1).jpeg', 'Yeezy708', 123, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender.Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender', NULL),
(107, '../../admin/MyDashboard/images/images (2).jpeg', 'Yeezy701', 161, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender.Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur perferendis, natus rem non officiis animi accusamus dolores reprehender', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `email`, `motdepasse`) VALUES
(5, 'Antonio', 'ball@gmail.com', 'JHBVHBJGSJ.G'),
(9, 'Miguel', 'alone@gmail.com', '1234567'),
(10, 'Calm', 'calm@gmail.com', '1234567'),
(11, 'Jonh', 'john@gmail.com', '1234567'),
(12, 'Loid', 'loid@gmail.com', '1234567'),
(13, 'Dann Marino', 'dann@gmail.com', '1234567'),
(15, 'toto', 'toto@gmail.com', '1234567');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categorie` (`id_admin`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `fk_categorie` FOREIGN KEY (`id_admin`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
