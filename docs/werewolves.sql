-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 10 sep. 2021 à 15:36
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `werewolves`
--

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `specificity` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id`, `name`, `hash`, `description`, `picture`, `icon`, `specificity`, `created_at`, `updated_at`) VALUES
(1, 'Loup-Garou de Thiercelieux', 'loup-garou-de-thiercelieux', `<p>Dans \"l\'Est sauvage\", le petit hameau de Thiercelieux est depuis peu devenu la proie des Loups-Garous. </p><p>Des meurtres sont commis chaque nuit par certains habitants du villages, devenus Lycanthropes à cause d\'un phénomène mystérieux (peut-être l\'effet de serre ?)... </p><p>Les Villageois doivent se ressaisir pour éradiquer ce nouveau fléau venu du fond des âges, avant que le hameau ne perde ses derniers habitants.</p>`, 'sdfds', 'dsfs', 0, '2021-09-08 13:43:20', '2021-09-09 17:07:00'),
(2, 'Nouvelle Lune', 'nouvelle-lune', `<p>Bienvenue dans ce nouvel opus \"Locatercien\", puisqu\'ainsi se nomment les habitants de Thiercelieux, hameau dévasté. </p><p> Le village étant devenu trop dangereux pour certains d\'entre nous, c\'est en exil forcé que nous mettons la dernière main à cet ouvrage. </p><p> Des messages secrets, au péril de leur vie, sont venus nous trouver dans notre retraite cachée et nous ont faits part de l\'évolution de la terrible menace. </p><p> Toutefois la résistance s\'organise et de nouveaux personnages aux talents prometteurs ont rejoint le combat contre les terribles Loups-Garous !</p>`, 'fghf', 'gfhgf', 0, '2021-09-08 13:43:20', '2021-09-09 17:53:42'),
(3, 'Personnages', 'personnages', `<p>Depuis de nombreux cycles lunaires, la quiétude était enfin revenue dans les environs de \"Thiercelieux\". Jusqu\'à ce qu\'un \"enfançon sauvage\" regagne la forêt profonde et commence à hurler chaque nuit. </p><p> Peu de temps après, de nouvelles disparitions mystérieuses ainsi que d\'atroces vestiges criminels convainquirent les habitants du village que des monstres polymorphes encore plus redoutables vivaient parmi eux. <br/>Ils convoquèrent alors, depuis les confins de la contrée, d\'autres \"<b>Personnages</b>\" très puissants, pour lutter contre cette abominable engeance...</p>`, 'fdsfs', 'dsfsd', 0, '2021-09-08 13:43:20', '2021-09-09 17:37:10'),
(4, 'Le Village', 'le-village', `<p>Le village de Thiercelieux n\'était plus qu\'un désert de ruines. De tous les recoins du pays, les volontaires ont afflué pour s\'installer dans les maisons, les fermes et les échoppes flambant neuves et recréer une vie digne de ce site merveilleux.</p><p>Toutefois il demeure que certains esprits chagrins font courir un bruit inquiétant : de sinistres loups-garous se seraient immiscés dans leur nouvelle communauté !</p>`, 'dfgd', 'gfhdf', 0, '2021-09-08 13:43:20', '2021-09-09 17:38:08'),
(5, 'Site', '', '', NULL, '', 0, '2021-09-08 13:43:20', '2021-09-08 13:43:20');

-- --------------------------------------------------------

--
-- Structure de la table `new_moon`
--

DROP TABLE IF EXISTS `new_moon`;
CREATE TABLE IF NOT EXISTS `new_moon` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `phase` varchar(20) NOT NULL,
  `event` text NOT NULL,
  `instruction` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `new_moon`
--

INSERT INTO `new_moon` (`id`, `name`, `phase`, `event`, `instruction`) VALUES
(1, 'Somnambulisme', 'Nouvelle Lune', 'Lorem', 'Lorem'),
(2, 'Toucher mortel', 'Nouvelle Lune', 'Lorem', 'Lorem'),
(3, 'Bourreau', 'Nouvelle Lune', 'Lorem', 'Lorem'),
(4, 'Méchant Bredin', 'Nouvelle Lune', 'Lorem', 'Lorem'),
(5, 'Ensevelissement', 'Nouvelle Lune', 'Lorem', 'Lorem'),
(6, 'Influences', 'Premier Croissant', 'Lorem', 'Lorem'),
(7, 'Retour de Flamme', 'Premier Croissant', 'Lorem', 'Lorem'),
(8, 'le Petiot', 'Premier Croissant', 'Lorem', 'Lorem'),
(9, 'Mécontentement', 'Premier Croissant', 'Lorem', 'Lorem'),
(10, 'le Spectre', 'Premier Croissant', 'Lorem', 'Lorem'),
(11, 'Nuit des Fous', 'Premier Croissant', 'Lorem', 'Lorem'),
(12, 'Enthousiasme', 'Premier Croissant', 'Lorem', 'Lorem'),
(13, 'Spiritisme', 'Pleine Lune', 'Lorem', 'Lorem'),
(14, 'Spiritisme', 'Pleine Lune', 'Lorem', 'Lorem'),
(15, 'Spiritisme', 'Pleine Lune', 'Lorem', 'Lorem'),
(16, 'Spiritisme', 'Pleine Lune', 'Lorem', 'Lorem'),
(17, 'Spiritisme', 'Pleine Lune', 'Lorem', 'Lorem'),
(18, 'Repas des anciens', 'Pleine Lune', 'Lorem', 'Lorem'),
(19, 'Radieux dimanche', 'Pleine Lune', 'Lorem', 'Lorem'),
(20, 'Fin des moissons', 'Pleine Lune', 'Lorem', 'Lorem'),
(21, 'Miraculée', 'Pleine Lune', 'Lorem', 'Lorem'),
(22, 'Bonnes manières', 'Pleine Lune', 'Lorem', 'Lorem'),
(23, 'Sombre lundi', 'Pleine Lune', 'Lorem', 'Lorem'),
(24, 'Pacte avec le Diable', 'Pleine Lune', 'Lorem', 'Lorem'),
(25, 'Bal du samedi soir', 'Pleine Lune', 'Lorem', 'Lorem'),
(26, 'Cuillète sylvestre', 'Pleine Lune', 'Lorem', 'Lorem'),
(27, 'Éclipse', 'Pleine Lune', 'Lorem', 'Lorem'),
(28, 'Pile ou Face', 'Pleine Lune', 'Lorem', 'Lorem'),
(29, 'Grande Méfiance', 'Pleine Lune', 'Lorem', 'Lorem'),
(30, 'Cauchemar', 'Pleine Lune', 'Lorem', 'Lorem'),
(31, 'Saint Philippe', 'Pleine Lune', 'Lorem', 'Lorem'),
(32, 'Qui va à la chasse', 'Pleine Lune', 'Lorem', 'Lorem'),
(33, 'Déluge', 'Pleine Lune', 'Lorem', 'Lorem'),
(34, 'ni Moi - ni Loup', 'Pleine Lune', 'Lorem', 'Lorem'),
(35, 'Châtiment', 'Pleine Lune', 'Lorem', 'Lorem'),
(36, 'Jour des Fous', 'Pleine Lune', 'Lorem', 'Lorem');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `excerpt` text,
  `description` text NOT NULL,
  `side` varchar(15) NOT NULL,
  `extension_id` int(10) UNSIGNED NOT NULL,
  `first_night` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `picture`, `excerpt`, `description`, `side`, `extension_id`, `first_night`) VALUES
(1, 'Simple Villageois', '', NULL, 'Lorem', 'Village', 1, 0),
(2, 'Loup-Garou', '', NULL, 'Lorem', 'Loup-Garou', 1, 0),
(3, 'Voyante', '', NULL, 'Lorem', 'Village', 1, 0),
(4, 'Petite-Fille', '', NULL, 'Lorem', 'Village', 1, 0),
(5, 'Sorcière', '', NULL, 'Lorem', 'Village', 1, 0),
(6, 'Chasseur', '', NULL, 'Lorem', 'Village', 1, 0),
(7, 'Cupidon', '', NULL, 'Lorem', 'Village', 1, 0),
(8, 'Voleur', '', NULL, 'Lorem', 'Ambigü', 1, 0),
(9, 'Ancien', '', NULL, 'Lorem', 'Village', 2, 0),
(10, 'Bouc émissaire', '', NULL, 'Lorem', 'Village', 2, 0),
(11, 'Salvateur', '', NULL, 'Lorem', 'Village', 2, 0),
(12, 'Idiot du Village', '', NULL, 'Lorem', 'Solitaire', 2, 0),
(13, 'Joueur de Flûte', '', NULL, 'Lorem', 'Village', 2, 0),
(14, 'Gitane', '', NULL, 'Lorem', 'Village', 2, 0),
(15, 'Enfant Sauvage', '', NULL, 'Lorem', 'Ambigü', 3, 0),
(16, `Chevalier à l\'Épée rouillée`, '', NULL, 'Lorem', 'Village', 3, 0),
(17, 'Villageois Villageois', '', NULL, 'Lorem', 'Village', 3, 0),
(18, 'Ange', '', NULL, 'Lorem', 'Solitaire', 3, 0),
(19, 'Infect Père des Loups', '', NULL, 'Lorem', 'Loup-Garou', 3, 0),
(20, 'Grand Méchant Loup', '', NULL, 'Lorem', 'Loup-Garou', 3, 0),
(21, 'Soeurs', '', NULL, 'Lorem', 'Village', 3, 0),
(22, 'Frères', '', NULL, 'Lorem', 'Village', 3, 0),
(23, `Montreur d\'Ours`, '', NULL, 'Lorem', 'Village', 3, 0),
(24, 'Renard', '', NULL, 'Lorem', 'Village', 3, 0),
(25, 'Chien-Loup', '', NULL, 'Lorem', 'Ambigü', 3, 0),
(26, 'Juge Bègue', '', NULL, 'Lorem', 'Village', 3, 0),
(27, 'Abominable Sectaire', '', NULL, 'Lorem', 'Solitaire', 3, 0),
(28, 'Servante Dévouée', '', NULL, 'Lorem', 'Ambigü', 3, 0),
(29, 'Comédien', '', NULL, 'Lorem', 'Ambigü', 3, 0),
(30, 'Loup-Garou Blanc', '', NULL, 'Lorem', 'Solitaire', 4, 0),
(31, 'Corbeau', '', NULL, 'Lorem', 'Village', 4, 0),
(32, 'Pyromane', '', NULL, 'Lorem', 'Village', 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `rules`
--

DROP TABLE IF EXISTS `rules`;
CREATE TABLE IF NOT EXISTS `rules` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `description` text,
  `specificity_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rules`
--

INSERT INTO `rules` (`id`, `name`, `hash`, `description`, `specificity_id`, `created_at`, `updated_at`) VALUES
(1, 'Clair de Lune', 'clair-de-lune', 'Lorem ipsum etc', 1, '2021-09-10 14:54:57', '2021-09-10 14:54:57'),
(2, 'La communauté des hameaux', 'la-communauté-des-hameaux', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur commodi ad ratione minus, mollitia, eveniet dolore corporis quasi accusantium at facere asperiores eos neque aut rem excepturi beatae veniam a!', 1, '2021-09-10 14:55:25', '2021-09-10 14:55:25'),
(3, '&#34;En tout cas c\\&#39;est sûrement pas lui !&#34;', 'en-tout-cas-c-est-surement-pas-lui', '', 1, '2021-09-10 14:56:17', '2021-09-10 14:56:17'),
(4, 'Murs-murs', 'murs-murs', '', 1, '2021-09-10 14:56:36', '2021-09-10 14:56:36'),
(5, 'Double-&#34;je&#34;', 'double-je', '', 1, '2021-09-10 14:57:24', '2021-09-10 14:57:24'),
(6, 'Fête de la moisson', 'fete-de-la-moisson', '', 1, '2021-09-10 14:57:39', '2021-09-10 14:57:39'),
(7, 'La peste noire', 'la-peste-noire', '', 1, '2021-09-10 14:57:53', '2021-09-10 14:57:53'),
(8, 'Fascination lycanthropique', 'fascination-lycanthropique', '', 1, '2021-09-10 14:58:08', '2021-09-10 14:58:08');

-- --------------------------------------------------------

--
-- Structure de la table `specificities`
--

DROP TABLE IF EXISTS `specificities`;
CREATE TABLE IF NOT EXISTS `specificities` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `description` text,
  `game_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `specificities`
--

INSERT INTO `specificities` (`id`, `name`, `hash`, `description`, `game_id`, `created_at`, `updated_at`) VALUES
(1, 'Variantes', 'variantes', `<p>En dehors des règles de base, il existe de nombreuses façons de jouer aux Loups-Garous de Thiercelieux.</p><p>Ces variantes résultent des facéties que nous nous permettons durant les innombrables parties que nous avons animées ainsi qu\\\'une sélection de certaines de vos nombreuses propositions postées sur notre site <a href=\"www.loups-garous.com\">www.loups-garous.com</a>.\"</p><p>Nous vous proposons ici le meilleur de ces variantes, testées et optimisées pour renouveler votre plaisir de jouer.</p>`, 2, '2021-09-10 14:08:23', '2021-09-10 14:08:23'),
(3, 'Nouvelle Lune', 'nouvelle-lune', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae, accusamus dolorum et beatae quos eveniet repudiandae, hic consectetur voluptatum aspernatur dolorem dignissimos tempore. Dicta ea nostrum, illum assumenda modi nihil aliquam officia dignissimos, debitis perspiciatis quos corporis architecto illo odit nemo consectetur nesciunt fuga, quidem eligendi doloribus? Ut, vitae doloribus.', 2, '2021-09-10 14:31:04', '2021-09-10 14:31:04'),
(4, 'Le Village', 'le-village', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae, accusamus dolorum et beatae quos eveniet repudiandae, hic consectetur voluptatum aspernatur dolorem dignissimos tempore. Dicta ea nostrum, illum assumenda modi nihil aliquam officia dignissimos, debitis perspiciatis quos corporis architecto illo odit nemo consectetur nesciunt fuga, quidem eligendi doloribus? Ut, vitae doloribus.', 4, '2021-09-10 14:31:29', '2021-09-10 14:31:29');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'user',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `avatar`, `role`, `status`) VALUES
(1, 'Lestrarcher', 'mickael.kern@hotmail.fr', '$2b$10$6qzghZKmYzTJ8q.6ED2HIuCz9Jz9/tmYIDh4p/xFPVrgJfMu3ceFK', '/images/e449e204e65781fbab1109fa2f96315c.gif', 'admin', 1),
(2, 'hel', 'adressebidon@hotmail.fr', '$2b$10$W75HBGdpAQ5oNMFzFCNU8.d3SlC2YMTQsHlDvBiKzqm.QGV1zHGfO', '/images/e449e204e65781fbab1109fa2f96315c.gif', 'user', 1),
(3, 'Carlos', 'charles.archer@hotmail.fr', '$2b$10$J0qIdEWOTIeJzzj8uReDMuIAI7EIiiykodblcPqn6beLP26amW7E6', '/images/e449e204e65781fbab1109fa2f96315c.gif', 'user', 1);

-- --------------------------------------------------------

--
-- Structure de la table `village`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'user',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `avatar`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lestrarcher', 'mickael.kern@hotmail.fr', '$2b$10$6qzghZKmYzTJ8q.6ED2HIuCz9Jz9/tmYIDh4p/xFPVrgJfMu3ceFK', 'https://images2.imgbox.com/6b/e1/ndJ0lsm4_o.png', 'admin', 1, '2021-09-21 11:44:15', '2021-09-21 11:44:15'),
(2, 'hel', 'adressebidon@hotmail.fr', '$2b$10$W75HBGdpAQ5oNMFzFCNU8.d3SlC2YMTQsHlDvBiKzqm.QGV1zHGfO', 'https://images2.imgbox.com/15/c9/bFUlvk0I_o.png', 'game-manager', 1, '2021-09-21 11:44:15', '2021-09-21 11:44:15'),
(3, 'Carlos', 'kaa-micka@hotmail.fr', '$2b$10$J0qIdEWOTIeJzzj8uReDMuIAI7EIiiykodblcPqn6beLP26amW7E6', 'https://images2.imgbox.com/bb/70/hSfQ2L5K_o.png', 'game-manager', 1, '2021-09-21 11:44:15', '2021-09-21 11:44:15'),
(8, 'hismione', 'hismione@lune.fr', '$2b$10$pkS8RDtTbS.CuUehJ/rUY.1vMRQhV.RevSTanH3SV0IgchnjpIdfe', '/images/e449e204e65781fbab1109fa2f96315c.gif', 'user', 1, '2021-10-05 17:09:58', '2021-10-05 17:09:58'),
(38, 'Borak', 'waterbender@waternation.com', '$2b$10$DjwK/BSGu6JGePw8lzywTOrv9LxIXUlOZIZ5bjORlx20UzrxChba2', '/images/e449e204e65781fbab1109fa2f96315c.gif', 'user', 1, '2021-10-06 01:40:46', '2021-10-06 01:40:46'),
(39, 'Stolas', 'water-bender@waternation.com', '$2b$10$btVQ/TBS4StacEzHxw4NWu20O6RurHWOBynizWsCw.v0W0G4tGFA6', '/images/e449e204e65781fbab1109fa2f96315c.gif', 'user', 1, '2021-10-06 01:43:40', '2021-10-06 01:43:40'),
(40, 'Mako', 'air-bender@airnation.com', '$2b$10$aCg3.LN8H73oIGQ0ldpPR.IPuiC.1CLRQLeUHibLw7zHXPWXM0256', '/images/e449e204e65781fbab1109fa2f96315c.gif', 'user', 1, '2021-10-06 01:44:21', '2021-10-06 01:44:21'),
(41, 'Sixtou', 'sixtou@chat.meow', '$2b$10$OFiDfVgCFHZiwssTr9zSEepEpnC5UIlcU67GnQPZDDzX.Wu3dCE16', 'https://images2.imgbox.com/15/c9/bFUlvk0I_o.png', 'guest', 1, '2021-10-06 15:23:38', '2021-10-16 17:38:04'),
(44, 'christouf', 'weshchristouf@hotmail.fr', '$2b$10$VfUPg/lLCas8Id6bYmV0RuTYqFaGkjPeoJ2xJPBm1..mHM.h3NzT6', 'https://images2.imgbox.com/15/c9/bFUlvk0I_o.png', 'user', 1, '2021-10-30 15:49:54', '2021-10-30 15:49:54'),
(45, 'Le Petiot', 'lepetiot@mdj-thiercelieux.fr', '$2y$10$GTMwIJhwHKlb8ojA2dJNGelkNeOX51gwS1mpzPR/23HdO05Fqm8fe', 'empty', 'guest', 1, '2021-11-18 15:57:33', '2021-11-18 15:57:33');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
