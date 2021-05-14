-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 13 mai 2021 à 02:07
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
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int(7) NOT NULL,
  `idclt` int(7) NOT NULL,
  `idprod` int(7) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `idclt`, `idprod`, `adresse`, `prix`) VALUES
(123, 789, 582, 'tunis', 50),
(520, 789, 582, 'tunis', 200);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(8) NOT NULL,
  `messages` text NOT NULL,
  `date_commentaire` datetime NOT NULL,
  `id_publication_commentaire` int(8) NOT NULL,
  `id_client_commentaire` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `messages`, `date_commentaire`, `id_publication_commentaire`, `id_client_commentaire`) VALUES
(9, 'azezaqsdsqdqd', '2021-05-12 15:38:51', 19, 10);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `idlivraison` int(7) NOT NULL,
  `datelivraison` varchar(20) NOT NULL,
  `idLivreur` int(7) NOT NULL,
  `idCommande` int(7) NOT NULL,
  `etat` varchar(50) NOT NULL,
  `prix` int(30) NOT NULL,
  `adresse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`idlivraison`, `datelivraison`, `idLivreur`, `idCommande`, `etat`, `prix`, `adresse`) VALUES
(590, '2021-05-12', 123, 520, 'oui', 454, 'bizerte');

-- --------------------------------------------------------

--
-- Structure de la table `livreur`
--

CREATE TABLE `livreur` (
  `idLivreur` int(7) NOT NULL,
  `nomLivreur` varchar(30) NOT NULL,
  `prenomLivreur` varchar(30) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `email` varchar(80) NOT NULL,
  `tel` int(8) NOT NULL,
  `salaire` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livreur`
--

INSERT INTO `livreur` (`idLivreur`, `nomLivreur`, `prenomLivreur`, `adresse`, `email`, `tel`, `salaire`) VALUES
(123, 'eya', 'bouzaiene', 'Bardo', 'eya.bouzaien@gmail.com', 27708111, 1500),
(147, 'mayssa', 'bouzid', 'monastir', 'mayssa.bouzid@gmail.com', 98558111, 500),
(753, 'omar', 'mrad', 'bardo', 'omar.mrad@gmail.com', 28709100, 700);

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
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `id_publication` int(8) NOT NULL,
  `titre` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `id_client_publication` int(8) NOT NULL,
  `date_publication` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`id_publication`, `titre`, `description`, `image_name`, `id_client_publication`, `date_publication`) VALUES
(19, 'Hasseb', 'AAAA', '1620830311.jpeg', 10, '2021-05-12 15:38:31');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id_reponse` int(8) NOT NULL,
  `messages` text NOT NULL,
  `date_reponse` datetime NOT NULL,
  `id_commentaire_reponse` int(8) NOT NULL,
  `id_client_reponse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id_reponse`, `messages`, `date_reponse`, `id_commentaire_reponse`, `id_client_reponse`) VALUES
(6, 'az', '2021-05-12 15:39:08', 9, 10);

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
(2, 'omar', 'mrad', 'omar.mard@esprit.tn', 'omar', '000000000', 'admin'),
(3, 'haythem', 'mechi', 'haythemmech@esprit.t,', 'haythem', '1234', ''),
(4, 'Eya', 'Bouz', 'Eyabouz@esprit.tn', 'Eyaaaaa', '12345678', 'artiste');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`nom_cat`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`idlivraison`),
  ADD KEY `fk_livraison_livraison` (`idCommande`),
  ADD KEY `fk_livraison_livreur` (`idLivreur`);

--
-- Index pour la table `livreur`
--
ALTER TABLE `livreur`
  ADD PRIMARY KEY (`idLivreur`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idproduit`),
  ADD KEY `fk_categorie` (`categorie`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id_publication`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id_reponse`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `idlivraison` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=591;

--
-- AUTO_INCREMENT pour la table `livreur`
--
ALTER TABLE `livreur`
  MODIFY `idLivreur` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=867;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idproduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id_publication` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id_reponse` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `fk_livraison_livraison` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_livraison_livreur` FOREIGN KEY (`idLivreur`) REFERENCES `livreur` (`idLivreur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
