-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : sam. 27 nov. 2021 à 17:41
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(1, 'azer', 10, '2021-11-26 13:11:33'),
(2, 'fffff', 10, '2021-11-26 13:55:31'),
(3, 'fffff', 10, '2021-11-26 13:56:26'),
(4, 'fffff', 10, '2021-11-26 13:59:34'),
(5, 'jjjjj', 10, '2021-11-26 13:59:43'),
(6, 'aaaaaaaaaaaa21', 10, '2021-11-26 13:59:54'),
(7, 'aaaaaaaaaaaa21', 10, '2021-11-26 14:03:10'),
(8, 'dddddddddddddddf', 10, '2021-11-26 14:53:22'),
(9, 'dfghjklppp', 10, '2021-11-26 16:59:34'),
(10, 'minksssss', 13, '2021-11-27 18:22:34');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(7, 'oi', 'ef67e0868c98e5f0b0e2fcd9b0c4a3bad808f551'),
(8, 'y', '95cb0bfd2977c761298d9624e4b4d4c72a39974a'),
(9, 'vvv', 'dbe6cae2f52b55095b513c15321b934146828d76'),
(10, 'azer', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077'),
(11, 'css', '2f84417a9e73cead4d5c99e05daff2a534b30132'),
(12, 'a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8'),
(13, 'e', '58e6b3a414a1e090dfc6029add0f3555ccba127f');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
