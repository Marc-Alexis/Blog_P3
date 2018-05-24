-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Client :  db691385996.db.1and1.com
-- Généré le :  Jeu 24 Mai 2018 à 12:03
-- Version du serveur :  5.5.60-0+deb7u1-log
-- Version de PHP :  5.4.45-0+deb7u14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db691385996`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `date` datetime NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `date`, `cat_id`) VALUES
(3, 'Mistral', '<p style="box-sizing: inherit; margin: 0px 0px 0.5em; line-height: 1.5; color: rgba(0, 0, 0, 0.8); font-family: Roboto, ''Helvetica Neue'', sans-serif; font-size: 16px;">Ven ve voke up, ve had zese wodies. Your best is an idiot! Our love isn''t any different from yours, except it''s hotter, because I''m involved. Quite possible. We live long and are celebrated poopers.</p>\r\n<p style="box-sizing: inherit; margin: 0px 0px 0.5em; line-height: 1.5; color: rgba(0, 0, 0, 0.8); font-family: Roboto, ''Helvetica Neue'', sans-serif; font-size: 16px;">Bender, being God isn''t easy. If you do too much, people get dependent on you, and if you do nothing, they lose hope. You have to use a light touch. Like a safecracker, or a pickpocket. Too much work. Let''s burn it and say we dumped it in the sewer.</p>\r\n<p style="box-sizing: inherit; margin: 0px 0px 0.5em; line-height: 1.5; color: rgba(0, 0, 0, 0.8); font-family: Roboto, ''Helvetica Neue'', sans-serif; font-size: 16px;">So, how ''bout them Knicks? And then the battle''s not so bad? This opera''s as lousy as it is brilliant! Your lyrics lack subtlety. You can''t just have your characters announce how they feel. That makes me feel angry!</p>', '2017-07-26 14:21:27', 1),
(4, 'Tramontane', '<p style="box-sizing: inherit; margin: 0px 0px 0.5em; line-height: 1.5; color: rgba(0, 0, 0, 0.8); font-family: Roboto, ''Helvetica Neue'', sans-serif; font-size: 16px;">Goodbye, friends. I never thought I''d die like this. But I always really hoped. Humans dating robots is sick. You people wonder why I''m still single? It''s ''cause all the fine robot sisters are dating humans!</p>\r\n<p style="box-sizing: inherit; margin: 0px 0px 0.5em; line-height: 1.5; color: rgba(0, 0, 0, 0.8); font-family: Roboto, ''Helvetica Neue'', sans-serif; font-size: 16px;">Well, let''s just dump it in the sewer and say we delivered it. Come, Comrade Bender! We must take to the streets! No argument here. No, just a regular mistake.</p>\r\n<p style="box-sizing: inherit; margin: 0px 0px 0.5em; line-height: 1.5; color: rgba(0, 0, 0, 0.8); font-family: Roboto, ''Helvetica Neue'', sans-serif; font-size: 16px;">Fry! Quit doing the right thing, you jerk! No! The cat shelter''s on to me. I meant ''physically''. Look, perhaps you could let me work for a little food? I could clean the floors or paint a fence, or service you sexually?</p>', '2017-07-26 14:21:47', 1),
(5, 'BelvÃ©dÃ¨re', '<p style="box-sizing: inherit; margin: 0px 0px 0.5em; line-height: 1.5; color: rgba(0, 0, 0, 0.8); font-family: Roboto, ''Helvetica Neue'', sans-serif; font-size: 16px;">Hey, guess what you''re accessories to. In our darkest hour, we can stand erect, with proud upthrust bosoms. Shut up and take my money! Son, as your lawyer, I declare y''all are in a 12-piece bucket o'' trouble. But I done struck you a deal: Five hours of community service cleanin'' up that ol'' mess you caused.</p>\r\n<p style="box-sizing: inherit; margin: 0px 0px 0.5em; line-height: 1.5; color: rgba(0, 0, 0, 0.8); font-family: Roboto, ''Helvetica Neue'', sans-serif; font-size: 16px;">Kif, I have mated with a woman. Inform the men. Daddy Bender, we''re hungry. Oh, how I wish I could believe or understand that! There''s only one reasonable course of action now: kill Flexo! I suppose I could part with ''one'' and still be feared&hellip;</p>\r\n<p style="box-sizing: inherit; margin: 0px 0px 0.5em; line-height: 1.5; color: rgba(0, 0, 0, 0.8); font-family: Roboto, ''Helvetica Neue'', sans-serif; font-size: 16px;">Our love isn''t any different from yours, except it''s hotter, because I''m involved. Ow, my spirit! Oh, I don''t have time for this. I have to go and buy a single piece of fruit with a coupon and then return it, making people wait behind me while I complain.</p>', '2017-07-26 14:22:07', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Chapitre 1'),
(2, 'Chapitre 2'),
(3, 'Chapitre 3');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext NOT NULL,
  `date_posted` datetime NOT NULL,
  `art_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `reported` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `art_id` (`art_id`),
  KEY `usr_id` (`usr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `date_posted`, `art_id`, `usr_id`, `reported`) VALUES
(1, 'Super', '2017-07-29 22:27:19', 5, 1, 1),
(2, 'Bonjour', '2017-12-15 10:02:32', 5, 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'demo', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', 'admin'),
(2, 'Marc-Alexis', '9df1d2e10943979ae9979ec1666bd3fa28ad10f4', 'user'),
(3, 'Flagusdile', '9df1d2e10943979ae9979ec1666bd3fa28ad10f4', 'user');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`art_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
