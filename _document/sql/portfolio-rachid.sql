-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 30 juin 2023 à 20:24
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portfolio-rachid`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `libelle`) VALUES
(1, 'Tous');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_commentaire` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_projet` int(11) NOT NULL,
  `projets_id_categorie` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id_commentaire`, `description`, `auteur`, `created_at`, `modified_at`, `status`, `id_projet`, `projets_id_categorie`) VALUES
(9, 'C\'est biiieng !', 'Zidane', '2023-06-30 10:46:54', '2023-06-30 10:46:54', 'new', 16, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires_has_commentaires`
--

CREATE TABLE `commentaires_has_commentaires` (
  `commentaires_id_commentaire` int(11) NOT NULL,
  `commentaires_id_commentaire1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `id_projet` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `duree` varchar(100) NOT NULL,
  `url_figma` varchar(1000) DEFAULT NULL,
  `url_github` varchar(255) DEFAULT NULL,
  `url_site` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_categorie` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id_projet`, `titre`, `image`, `role`, `description`, `duree`, `url_figma`, `url_github`, `url_site`, `created_at`, `modified_at`, `status`, `id_categorie`) VALUES
(16, 'Sucré au sucre', 'https://www.messagersdepaix.org/wp-content/uploads/2023/06/presentation-sucre-au-sucre.png', 'Design & développement', 'C’est un projet fictif dans lequel j’ai réalisé le site internet d’une marque de donuts. L’inspiration vient d’un même d’internet. Stack utilisé : HTML, CSS, JS, FIGMA.', '1 semaine', 'https://www.figma.com/proto/ra313X7UOGm18IHy1OTA3Q/Rachid-Boudjakdji?', 'https://github.com/rachboudj/sucre-au-sucre', 'https://rachboudj.github.io/sucre-au-sucre/', '2023-06-30 01:36:22', '2023-06-30 01:36:22', 'publish', 1),
(17, 'Vérifier un mots de passe', 'https://www.messagersdepaix.org/wp-content/uploads/2023/06/verifier-mdp.png', 'Design & développement', 'Ce projet est un vérificateur de mots de passe solide. Quand l\'utilisateur rentre un mots de passe, il y a en dessous les attentes pour que le mots de passe soit validé (doit contenir un chiffre, une majuscule, un symbole...).\r\n\r\nStack utilisé : HTML, CSS, JavaScript et Figma.', '1 jour', '', 'https://github.com/rachboudj/js-verifier-mdp', 'https://rachboudj.github.io/js-verifier-mdp/', '2023-06-30 12:57:07', '2023-06-30 12:57:07', 'publish', 1),
(18, 'Générateur de mots de passe', 'https://www.messagersdepaix.org/wp-content/uploads/2023/06/password-generator.png', 'Design & développement', 'Ce projet est un générateur de mots. Il m\'a permis de manipuler des fonctions natives tel que math() ou mathRandom() pour générer des chaines de caractères aléatoire, tout en respectant les normes d\'un mots de passe fiable grâce au regex.\r\n\r\nStack utilisé : HTML, CSS, JS, FIGMA.', '1 jour', 'https://www.figma.com/proto/ra313X7UOGm18IHy1OTA3Q/Rachid-Boudjakdji?page-id=37%3A2&type=design&node-id=37-3&viewport=479%2C407%2C0.71&t=DQ9Ba6mZJ86HOsMR-1&scaling=scale-down&mode=design', 'https://github.com/rachboudj/js-generateur-mdp', 'https://rachboudj.github.io/js-generateur-mdp/', '2023-06-30 13:06:58', '2023-06-30 13:06:58', 'publish', 1),
(19, 'Dictionnaire de pays', 'https://www.messagersdepaix.org/wp-content/uploads/2023/06/dico-pays.png', 'Design & développement', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.\r\nStack utilisé : HTML, CSS, JS et FIGMA.', '1 jour', 'https://www.figma.com/proto/KzRfYo4kLTiVT146lrNXLQ/Dico-pays?page-id=0%3A1&type=design&node-id=1-2&viewport=249%2C362%2C0.35&t=k3aHnOg8Bdddn1LX-1&scaling=scale-down&mode=design', 'https://github.com/rachboudj/js-info-pays', 'https://rachboudj.github.io/js-info-pays/', '2023-06-30 13:08:39', '2023-06-30 13:08:39', 'publish', 1),
(20, 'To do list app', 'https://www.messagersdepaix.org/wp-content/uploads/2023/06/to-do-list.png', 'Design & développement', 'Ce projet une to do list réalisé en JavaScript. Il m\'a permis d\'apprendre à manipuler le DOM. J\'ai découvert comment sélectionner et modifier des éléments HTML, ajouter ou supprimer des éléments du DOM, et mettre à jour le contenu de la page en temps réel.\r\nJ\'ai aussi appris à gérer les événements utilisateur tels que la soumission d’un formulaire, et à leur associer des actions spécifiques.\r\n\r\nStack utilisé : HTML, CSS, JS et FIGMA.', '1 semaine', 'https://www.figma.com/proto/CxIeItripDOMmyR0ytA9oj/To-do-list?page-id=0%3A1&type=design&node-id=1-2&viewport=479%2C407%2C0.71&t=CAqbeR9Zqf230ef2-1&scaling=scale-down&mode=design', 'https://github.com/rachboudj/js-to-do-app', 'https://rachboudj.github.io/js-to-do-app/', '2023-06-30 13:10:39', '2023-06-30 13:10:39', 'publish', 1),
(21, 'Page coming soon et invalidation mail', 'https://www.messagersdepaix.org/wp-content/uploads/2023/06/desktop-design.jpg', 'Développement', 'Le site frontendmentor.io propose tous types de projet. Celui là en fait partie. Il fournit la maquette que j\'ai du intégrer par la suite. La subtilité de ce projet est de rendre invalid le formulaire de l\'email quand l\'adresse et mal écrite. \r\nGrâce à ce projet, j\'ai pu voir pour la première ce qu\'est un regex, et travailler les conditions en JS.\r\n\r\nStack utilisé : HTML, CSS et JS.', '2 jours', 'https://www.frontendmentor.io/challenges/base-apparel-coming-soon-page-5d46b47f8db8a7063f9331a0', 'https://github.com/rachboudj/fem-landing-page-coming-soon', 'https://rachboudj.github.io/fem-landing-page-coming-soon/', '2023-06-30 13:14:36', '2023-06-30 13:14:36', 'publish', 1),
(22, 'Portfolio de Rachid', 'https://www.messagersdepaix.org/wp-content/uploads/2023/06/presentation-rachid.png', 'Design & développement', 'Mon portfolio, qui est aussi un devoir exigé par la NWS. Ça m\'a permis d\'avoir un projet concret à réaliser pour comprendre comment créer et communiquer avec une base de donnée. J\'ai développé un dashboard administrateur où celui-ci peut ajouter, modifier ou supprimer un projet (un CRUD). La même chose peut-être faite avec les utilisateurs qui s\'inscrivent.\r\n\r\nStack utilisé : HTML, CSS, JS, PHP, WORKBENCH, MYSQL et FIGMA.', '2 mois', 'https://www.figma.com/proto/ra313X7UOGm18IHy1OTA3Q/Rachid-Boudjakdji?page-id=5%3A2&type=design&node-id=32-2&viewport=-1296%2C149%2C0.67&t=kRn3svvuitP4MTEv-1&scaling=scale-down-width&mode=design', 'https://github.com/rachboudj/portfolio-rachid-php', '', '2023-06-30 13:18:10', '2023-06-30 13:18:10', 'publish', 1),
(23, 'Jeu pierre feuille ciseaux', 'https://www.messagersdepaix.org/wp-content/uploads/2023/06/Capture-decran-2023-06-30-a-22.15.31.png', 'Développement', 'Le fameux jeu du pierre, feuille, ciseaux. Ça m\'a permis de gérer les tableaux et le côté aléatoire de l\'ordinateur qui jour contre le joueur.\r\n\r\nStack utilisé : HTML, CSS et JS.', '2 jours', '', 'https://github.com/rachboudj/js-pierre-feuille-ciseaux', 'https://rachboudj.github.io/js-pierre-feuille-ciseaux/', '2023-06-30 22:23:31', '2023-06-30 22:23:31', 'publish', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `telephone` varchar(12) DEFAULT NULL,
  `role` varchar(45) DEFAULT 'Utilisateur inscrit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `prenom`, `email`, `mdp`, `telephone`, `role`) VALUES
(1, 'rachid', 'rachid', 'rachid@gmail.com', '$2y$10$N.4VVx5QyNeit1LYYAcV8uICcmEGbd81VUEeeHpvOQzaiU/2hLJQm', NULL, 'admin'),
(7, 'test2', 'test2', 'test2@gmail.com', '$2y$10$1a8UIvykM.7rFN.H8rahDu70ebbA/AAnVzi36v08mUrer82v.EbZK', NULL, 'Utilisateur inscrit'),
(8, 'nicolas', 'nicolas', 'nicolas@gmail.com', '$2y$10$vfTnNwHG7zY4CVtulQq8vOMkfQlNf5IpAv7uG2QAyI4Wd1wILhc6m', NULL, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs_has_projets`
--

CREATE TABLE `utilisateurs_has_projets` (
  `utilisateurs_id_utilisateur` int(11) NOT NULL,
  `projets_id_projet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `fk_commentaires_projets1_idx` (`id_projet`,`projets_id_categorie`);

--
-- Index pour la table `commentaires_has_commentaires`
--
ALTER TABLE `commentaires_has_commentaires`
  ADD PRIMARY KEY (`commentaires_id_commentaire`,`commentaires_id_commentaire1`),
  ADD KEY `fk_commentaires_has_commentaires_commentaires2_idx` (`commentaires_id_commentaire1`),
  ADD KEY `fk_commentaires_has_commentaires_commentaires1_idx` (`commentaires_id_commentaire`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id_projet`,`id_categorie`),
  ADD KEY `fk_projets_categories1_idx` (`id_categorie`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Index pour la table `utilisateurs_has_projets`
--
ALTER TABLE `utilisateurs_has_projets`
  ADD PRIMARY KEY (`utilisateurs_id_utilisateur`,`projets_id_projet`),
  ADD KEY `fk_utilisateurs_has_projets_projets1_idx` (`projets_id_projet`),
  ADD KEY `fk_utilisateurs_has_projets_utilisateurs1_idx` (`utilisateurs_id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `fk_commentaires_projets1` FOREIGN KEY (`id_projet`,`projets_id_categorie`) REFERENCES `projets` (`id_projet`, `id_categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commentaires_has_commentaires`
--
ALTER TABLE `commentaires_has_commentaires`
  ADD CONSTRAINT `fk_commentaires_has_commentaires_commentaires1` FOREIGN KEY (`commentaires_id_commentaire`) REFERENCES `commentaires` (`id_commentaire`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_commentaires_has_commentaires_commentaires2` FOREIGN KEY (`commentaires_id_commentaire1`) REFERENCES `commentaires` (`id_commentaire`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `projets`
--
ALTER TABLE `projets`
  ADD CONSTRAINT `fk_projets_categories1` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateurs_has_projets`
--
ALTER TABLE `utilisateurs_has_projets`
  ADD CONSTRAINT `fk_utilisateurs_has_projets_projets1` FOREIGN KEY (`projets_id_projet`) REFERENCES `projets` (`id_projet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateurs_has_projets_utilisateurs1` FOREIGN KEY (`utilisateurs_id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
