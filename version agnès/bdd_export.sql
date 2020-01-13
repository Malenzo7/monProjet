-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 09 jan. 2020 à 16:35
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'PHP', 'Langage de programmation libre, principalement utilisé pour produire des pages Web dynamiques via un serveur HTTP'),
(3, 'Symfony', 'Ensemble de composants PHP ainsi qu\'un framework MVC libre écrit en PHP'),
(6, 'Divers', 'Informations diverses');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `category`) VALUES
(17, 'que se passe-t-il', 'rien', 6),
(18, 'Les Expressions Régulières en PHP (REGEX)', 'Dans cet article nous allons voir comment fonctionnent les expressions régulières en PHP, ainsi que comment les utiliser pour effectuer une comparaison de motifs de manière efficace.\r\n\r\nLes expressions régulières sont un outil très utile pour les développeurs. Ils permettent de trouver, d’identifier ou de remplacer un mot, un caractère ou tout autre type de chaîne. Ce tutoriel vous apprendra à maîtriser le regexp PHP et vous montrera des expressions régulières PHP utiles prêtes à l’emploi ou d’autres utilisées à titre d’exemple pour bien appréhender ces expressions.\r\n\r\nCommençons par un bref aperçu des fonctions de filtrage intégrées de PHP les plus couramment utilisées avant de plonger dans le monde des expressions régulières.', 1),
(19, 'PHP est un langage déjà adapté au serverless', 'Le Forum PHP 2019 se tiendra les 24 et 25 octobre à Paris. En amont, le président de l\'Association française des utilisateurs de PHP, qui organise l\'événement, a répondu à nos questions.\r\n\r\nComment s\'oriente le langage PHP cette année ?\r\n\r\nAdrien Gallou est président de l’Association française des utilisateurs de PHP. © AFUP\r\nNous attendons la sortie de la version 7.4, qui est prévue pour fin novembre. PHP 7 recouvrait de nombreuses améliorations, notamment autour des performances, mais aussi des usages fonctionnels. Avec PHP 7.4, le travail continue pour faciliter les développements. Dans cette optique, PHP 7.4 introduit notamment le typage des propriétés. Cette version ajoute du sucre syntaxique. Cela passe par l\'extension de l\'opérateur null coalescing à la gestion des tableaux, ou encore par l\'introduction des fonctions arrow pour réduire la taille du code d\'une fonction.\r\n\r\nQuant à PHP 8 (dont la sortie pourrait intervenir en 2021, ndlr), il engendre beaucoup d\'activités sur la mailing list du projet PHP. Evoqué un temps pour PHP 7, la compilation just-in-time a été mise au menu de la version 8, l\'objectif étant de passer un nouveau palier en termes de performance.', 1),
(20, 'Salaires : combien gagnent les développeurs en 2019 (en France) ?', 'Créé à Lyon il y a cinq ans, le cabinet de recrutement informatique Silkhom nous a partagé une étude portant sur les salaires des développeurs en 2019 et plus globalement des métiers liés à l’informatique.\r\n\r\nPour réaliser ce baromètre sur les salaires, l’entreprise lyonnaise indique avoir analysé les données de plus de 3 600 candidats entre 2016 et 2019 inclus. Indiquées en milliers d’euros, les rémunérations se réfèrent à un montant brut annuel fixe. Le niveau d’expérience de l’employé ainsi que la zone géographique ont été pris en compte. Les différents lieux sont donc divisés en trois catégories : Paris, grandes villes (les plus peuplées après Paris) et régions.\r\n\r\nVoici les résultats de l’étude sur les salaires de Silkhom.', 6),
(21, '4 villes de destination pour l\'AFUP Day 2020', 'Notez la date dans votre agenda et choisissez votre destination : l\'AFUP Day 2020, le prochain cycle de conférences de l\'AFUP se tiendra le vendredi 15 mai à Lille, Lyon, Nantes et Tours !\r\n\r\nSuite au succès de la première édition en 2019, les villes de Lille et Lyon étaient motivées pour renouveler l\'expérience. Vu le dynamisme de leurs équipes et la réactivité des communautés locales, il était une évidence pour l\'AFUP de leur confier les clés de l\'édition 2020, dans des salles plus grandes ! L\'AFUP Day 2020 Lille se tiendra ainsi à Euratechnologies et l\'AFUP Day 2020 Lyon aura lieu à la Manufacture des Tabacs, aux amphithéâtres bien plus grands.\r\n\r\nL\'AFUP Day 2019 Rennes a été organisé en collaboration avec l\'antenne nantaise : en 2020, c\'est le tour des nantais d\'accueillir l\'événement, avec le soutien de l\'AFUP Rennes. C\'est donc parti pour l\'AFUP Day 2020 Nantes, qui sera accueilli dans les locaux d\'Akeneo.\r\n\r\nEnfin, les vrais \"petits nouveaux\" seront les tourangeaux ! L\'AFUP Tours organise avec grande assiduité meetups et apéros PHP depuis quelques années. Leur dossier de candidature était bien ficelé et a convaincu le bureau de l\'AFUP de leur confier les clés de l\'AFUP Day 2020 Tours.\r\n\r\nLes appels à conférences pour chacun de ces événements sont lancés, la billetterie est également ouverte, tout est disponible sur le site de l\'événement. Pour information, la billetterie Early Bird est désormais limitée en nombre de places disponibles. Soumettez vos sujets, prenez votre place, rendez-vous le vendredi 15 mai à Lille, Lyon, Nantes et Tours !\r\n		', 6);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'admin', '1234', 'Pierre', 'DELAROCHE'),
(3, 'redacteur', '1234', 'Janine', 'BERTRAND');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_category` FOREIGN KEY (`category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
