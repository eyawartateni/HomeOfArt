-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 12 mai 2021 à 00:36
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `seemyart`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `nom_cat` varchar(20) NOT NULL COMMENT 'nom de la categorie',
  `stat_cat` int(11) NOT NULL COMMENT 'stat de la categorie'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`nom_cat`, `stat_cat`) VALUES
('musique', 235),
('painture', 10),
('sculpture', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idproduit` int(11) NOT NULL,
  `libelle` varchar(20) NOT NULL COMMENT 'name produit',
  `categorie` varchar(15) DEFAULT NULL COMMENT 'categorie de produit',
  `prix` decimal(8,2) NOT NULL COMMENT 'prix produit',
  `quantite` int(11) NOT NULL COMMENT 'description de produit',
  `imageP` varchar(255) NOT NULL,
  `descriptionP` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idproduit`, `libelle`, `categorie`, `prix`, `quantite`, `imageP`, `descriptionP`) VALUES
(9, 'tableau ocean deep', 'painture', '600.00', 1, 'ocean.jpg', 'ceci est un tableau dessiné par l\'artiste Monem Hmila qui étais un vrai masterpeace de les années 1930,\r\nce tableau a aussi grande histoire que la majotié des autres tableau ou méme artiste.\r\nmerci beaucoup .'),
(14, 'tableau mother afric', 'painture', '500.60', 2, 'africa.jpg', 'zefn zvzve zvzvz vzvz vj africa'),
(21, 'sculpture By Loepar', 'sculpture', '1542.36', 1, 'fille.jpg', 'ceci est une sculpture bal bla bla ect....'),
(23, 'guitar', 'musique', '30.00', 5, 'guitar.jpg', 'La guitare est un instrument à cordes pincées. Les cordes sont disposées parallèlement à la table d\'harmonie et au manche, généralement coupé de frettes, sur lesquelles on appuie les cordes, d\'une main, pour produire des notes différentes.'),
(29, 'flutte', 'musique', '36.00', 85, '1619923032.jpeg', 'effnvv$apevfn'),
(30, 'a', 'musique', '2.00', 2, '1619923216.jpeg', 'ea');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `login`, `password`, `role`) VALUES
(1, 'hassen', 'ahmadi', 'hassenahmadi@ymail.com', 'hassen', '12345678', 'admin'),
(2, 'omar', 'mrad', 'omar.mard@esprit.tn', 'omar', '000000000', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`nom_cat`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idproduit`),
  ADD KEY `fk_categorie` (`categorie`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idproduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
