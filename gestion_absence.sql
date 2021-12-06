-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 06 déc. 2021 à 12:00
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_absence`
--

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

CREATE TABLE `seance` (
  `id` int(11) NOT NULL,
  `date_seance` text NOT NULL,
  `arrivee` text NOT NULL,
  `depart` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`id`, `date_seance`, `arrivee`, `depart`, `id_user`) VALUES
(1, '2021-12-02', '12:33:38', '12:36:30', 2),
(2, '2021-12-02', '23:17:56', '23:17:59', 3),
(3, '2021-12-03', '00:09:54', '00:09:56', 2),
(4, '2021-12-03', '00:10:10', '00:10:12', 3),
(5, '2021-12-04', '10:40:02', '', 2),
(6, '2021-12-04', '10:41:12', '', 3),
(7, '2021-12-04', '10:41:43', '', 8),
(8, '2021-12-04', '10:42:15', '', 11);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenoms` varchar(255) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` text NOT NULL,
  `typee` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenoms`, `sexe`, `contact`, `mail`, `pass`, `typee`) VALUES
(1, 'TOKPA', 'JEAN-NOEL', 'M', '0152794630', 'jntokpa@gmail.com', '1234', 'Admin'),
(2, 'GOUZOU', 'PRUNELLE', 'F', '0769559655', 'psgouzou@gmail.com', '1234', 'Apprenant(e)'),
(3, 'CAMARA', 'MAMADOU', 'M', '0708644868', 'camso@gmail.com', '0000', 'Apprenant(e)'),
(7, 'N\'DIAYE', 'ABDOUL', 'M', '0145254524', 'abdoulndiaye@gmail.com', '0001', 'Formateur'),
(8, 'KONAN', 'FELIX', 'M', '0708095040', 'yass@gmail.com', '0000', 'Apprenant(e)'),
(9, 'MICHOT', 'IBRAHIM', 'M', '0708040120', 'michot@gmail.com', '3333', 'Formateur'),
(11, 'DAGNOGO', 'MYRIAM', 'F', '0701020305', 'myriamdagnogo@gmail.com', '1234', 'Apprenant(e)'),
(12, 'DETI', 'VENANCE', 'M', '0808080808', 'venancedeti@gmail.com', '1234', 'Admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cle_user` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `seance`
--
ALTER TABLE `seance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `seance_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
