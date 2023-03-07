-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 16 nov. 2022 à 08:33
-- Version du serveur : 5.7.24
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `social`
--

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `publishedAt` datetime NOT NULL,
  `category` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `content`, `publishedAt`, `category`, `userId`) VALUES
(1, 'Le meilleurs super-héros c\'est Iron Man. J\'attends vos contre argument !', '2022-11-16 05:16:12', 'Disney', 1),
(7, 'Les Anneaux de pouvoir c\'est chiant !', '2022-11-16 05:25:11', 'Prime Vidéo', 1),
(8, 'The boys INCROYABLE !', '2022-11-16 05:25:42', 'Prime Vidéo', 1),
(9, 'La meilleurs série sur les adolescents \"Euphoria\" !', '2022-11-16 05:26:46', 'Euphoria', 1),
(10, 'She Hulk la pire série que j\'ai jamais vue.', '2022-11-16 05:27:32', 'Disney', 2),
(11, 'House of the Dragon a battu les Anneaux de pouvoir, choqué !', '2022-11-16 05:28:34', 'Hbo', 2),
(12, 'Enfin Netflix à supprimer la Saga Winx !', '2022-11-16 05:29:22', 'Netflix', 2),
(13, 'Good Omens la meilleurs série sur les dieux', '2022-11-16 05:30:24', 'Prime Vidéo', 2),
(15, 'Stranger Things meilleur série de Netflix', '2022-11-16 05:34:29', 'Netflix', 4),
(16, 'Encore une fois allez voir The Boys', '2022-11-16 05:34:57', 'Netflix', 4),
(17, 'Miss marvel bof', '2022-11-16 05:35:13', 'Netflix', 4),
(18, 'La meilleurs série de Hbo c\'est évidemment GOT', '2022-11-16 05:37:43', 'Netflix', 1),
(20, 'La meilleurs série de Hbo c\'est évidemment GOT', '2022-11-16 05:38:55', 'Netflix', 5);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `firstName`, `LastName`, `email`, `password`) VALUES
(1, 'ironman', 'ironman', 'ironman', 'ironman@gmail.com', '$2y$10$YNlGDAQqiTWdlYhd0R8up.ZUeZpS4m4yTkJ/RvhILazo2Qxf/Bj5C'),
(2, 'superman', 'superman', 'superman', 'superman@gmail.com', '$2y$10$e4jokYajZxw12/LxzO3oTefILzkrxIEE8WttgWSGFrpxLCS/6pmmm'),
(4, 'eleven', 'eleven', 'eleven', 'eleven@gmail', '$2y$10$B0eTaoy403uYX6UEV4QduOfg0FI5NgyrXROFkVazWBofEW7XA.Cf2'),
(5, 'daenerys', 'daenerys', 'daenerys', 'daenerys@gmail.com', '$2y$10$3XJhPgVf9KXULZ3fFAWmO.DksSAciGhY5flySY4/62puTT7GeGmby'),
(6, 'ola', 'ola', 'ola', 'ola@gmail.com', '$2y$10$9if6kjhmJb.Nt40hZVv8nOjcEZIcgGoapa118dXlOiNewe/aAcIKm'),
(7, 'ppp', 'ppp', 'ppp', 'ppp@gmail.com', '$2y$10$9Z.LfmOzEVPPSvs1kXrcnekuv7BBjpl3N9qoDCp4UORUBeCtsxdR6'),
(8, 'oplp', 'oplp', 'oplp', 'oplp@gmail.com', '$2y$10$FLCbRi0XWjUc8cB8ABmSpu2tvXd3Ob1d53A/5PYT.7xmlOXoebf0u');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
