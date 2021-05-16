-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 17 mai 2021 à 01:34
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
-- Structure de la table `billetterie`
--

CREATE TABLE `billetterie` (
  `id_billet` int(11) NOT NULL,
  `id_evenement` int(20) NOT NULL,
  `nbre` int(11) NOT NULL,
  `prix` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `billetterie`
--

INSERT INTO `billetterie` (`id_billet`, `id_evenement`, `nbre`, `prix`) VALUES
(8, 12371, 20, 20),
(9, 12372, 20, 20);

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
  `refcommande` int(8) NOT NULL,
  `idclient` int(7) NOT NULL,
  `prixtotal` int(7) NOT NULL,
  `etat` varchar(30) NOT NULL,
  `detail` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`refcommande`, `idclient`, `prixtotal`, `etat`, `detail`, `date`, `id`) VALUES
(8, 6, 3402, 'CONFIRMER', '1x tableau oc</br>3x sculpture', '2021-05-16 13:36:44', 0),
(9, 6, 3402, 'CONFIRMER', '1x tableau oc</br>3x sculpture', '2021-05-16 13:37:02', 0),
(10, 6, 2400, 'CONFIRMER', '1x tableau oc</br>3x sculpture', '2021-05-16 14:03:37', 0),
(11, 6, 2901, 'CONFIRMER', '1x tableau oc</br>3x sculpture', '2021-05-16 14:03:59', 0),
(12, 6, 2901, 'CONFIRMEE', '1x tableau oc</br>3x sculpture', '2021-05-16 14:34:52', 0);

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
(54, 'hi\r\n', '2021-05-14 14:12:18', 30, 4),
(55, 'hi', '2021-05-14 14:12:24', 30, 4),
(56, 'dd', '2021-05-14 14:14:39', 30, 4),
(57, 'jj', '2021-05-16 22:26:03', 31, 6);

-- --------------------------------------------------------

--
-- Structure de la table `dislikes`
--

CREATE TABLE `dislikes` (
  `id_dislike` int(11) NOT NULL,
  `id_publication` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `dislikes`
--

INSERT INTO `dislikes` (`id_dislike`, `id_publication`, `id_client`) VALUES
(10, 31, 4);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_event` int(11) NOT NULL,
  `nom_event` varchar(20) NOT NULL,
  `type_event` varchar(20) NOT NULL,
  `date_event` date NOT NULL,
  `nbre_participants` int(11) NOT NULL,
  `artiste` varchar(20) NOT NULL,
  `image_event` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_event`, `nom_event`, `type_event`, `date_event`, `nbre_participants`, `artiste`, `image_event`) VALUES
(12371, 'artify', 'artistique', '2021-04-10', 20, 'jack', '1619591693.jpeg'),
(12372, 'art et deco', 'culturel', '2021-04-24', 100, 'eya', '1619591907.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id_like` int(11) NOT NULL,
  `id_publication` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id_like`, `id_publication`, `id_client`) VALUES
(20, 33, 4),
(34, 32, 4),
(36, 30, 4),
(38, 32, 6);

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
(592, '2021-05-13', 867, 124, 'oui', 100, 'tunis'),
(595, '2021-05-19', 869, 124, 'non', 100, 'monastir');

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
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id_panier` int(8) NOT NULL,
  `id_client` int(11) NOT NULL,
  `nom_produit` varchar(10) NOT NULL,
  `img_produit` varchar(255) NOT NULL,
  `prix_produit` int(30) NOT NULL,
  `qte` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id_panier`, `id_client`, `nom_produit`, `img_produit`, `prix_produit`, `qte`) VALUES
(2, 4, 'tableau oc', 'ocean.jpg', 600, 2),
(3, 8, 'sculpture ', 'fille.jpg', 1542, 1),
(4, 2, 'tableau mo', 'africa.jpg', 501, 2),
(7, 1, 'guitar', 'guitar.jpg', 30, 2),
(8, 4, 'guitar', 'guitar.jpg', 35, 2),
(9, 6, 'tableau oc', 'ocean.jpg', 600, 1),
(11, 3, 'tableau oc', 'ocean.jpg', 600, 1),
(18, 6, 'sculpture ', 'fille.jpg', 600, 3);

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
(30, 'Hiiiiiiii', 'Hiiiiiiii', '1620914981.jpeg', 4, '2021-05-13 15:09:41'),
(31, 'Hi', 'Hi', '1620999501.jpeg', 4, '2021-05-14 14:38:22'),
(32, 'Hi', 'Hi', '1620999507.jpeg', 4, '2021-05-14 14:38:27'),
(33, 'Hi', 'Hi', '1620999513.jpeg', 4, '2021-05-14 14:38:33');

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
(15, 'hi', '2021-05-14 14:12:29', 54, 4),
(16, 'hi', '2021-05-14 14:12:31', 54, 4),
(17, 'ss', '2021-05-14 14:20:12', 54, 4),
(18, 'sss', '2021-05-14 14:20:17', 54, 4),
(19, 'll', '2021-05-16 22:26:16', 57, 6);

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
  `role` varchar(50) NOT NULL,
  `image_client` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `login`, `password`, `role`, `image_client`) VALUES
(1, 'hassen', 'ahmadi', 'hassenahmadi@ymail.com', 'hassen', '12345678', 'admin', ''),
(2, 'omar', 'mrad', 'omar.mard@esprit.tn', 'omar', '000000000', 'admin', ''),
(3, 'haythem', 'mechi', 'haythemmech@esprit.t,', 'haythem', '1234', '', ''),
(4, 'Eya', 'Bouz', 'Eyabouz@esprit.tn', 'Eyaaaaa', '12345678', 'client', '1621033763.jpeg'),
(5, 'eya', 'wart', 'eyawart@esprit.tn', 'eyawart', '12345678', 'client', ''),
(6, 'mayssa', 'bouzid', 'mayssa.bouzid@esprit.tn', 'mayssa', '12345678', 'client', '1621035310.jpeg'),
(7, 'eya', 'wartateni', 'eyawart@esprit.tn', 'eya', '12345678', '', '1621035426.jpeg'),
(8, 'eya', 'eya', 'eyawartateni@esprit.tn', 'eya', '12345678', 'client', '1621035518.jpeg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `billetterie`
--
ALTER TABLE `billetterie`
  ADD PRIMARY KEY (`id_billet`),
  ADD KEY `fk_event` (`id_evenement`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`nom_cat`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`refcommande`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Index pour la table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id_dislike`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_event`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`idlivraison`),
  ADD KEY `fk_livraison_livreur` (`idLivreur`);

--
-- Index pour la table `livreur`
--
ALTER TABLE `livreur`
  ADD PRIMARY KEY (`idLivreur`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_panier`);

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
-- AUTO_INCREMENT pour la table `billetterie`
--
ALTER TABLE `billetterie`
  MODIFY `id_billet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `refcommande` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id_dislike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12388;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `idlivraison` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=596;

--
-- AUTO_INCREMENT pour la table `livreur`
--
ALTER TABLE `livreur`
  MODIFY `idLivreur` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=867;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id_panier` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idproduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id_publication` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id_reponse` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `billetterie`
--
ALTER TABLE `billetterie`
  ADD CONSTRAINT `fk_event` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_event`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
