-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Client :  mysql51-37.perso
-- Généré le :  Lun 02 Novembre 2015 à 12:02
-- Version du serveur :  5.1.73-2+squeeze+build1+1-log
-- Version de PHP :  5.3.8

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bbblysgkbbbl`
--

-- DELIMITER $$
--
-- Fonctions
--
-- DROP FUNCTION IF EXISTS `nbOccur`$$
-- CREATE DEFINER=`bbblysgkbbbl`@`%` FUNCTION `nbOccur`( str VARCHAR(20), txt VARCHAR(50)) RETURNS int(11)
--     NO SQL
-- BEGIN
-- DECLARE nb,pos int default 0;
-- only:loop 
-- 	set pos = LOCATE(str,txt,pos+1);
-- 	if 0 = pos then leave only;
-- 	end if;
-- 	set nb = nb+1;
-- end loop only;
-- return nb;
-- END$$

-- DELIMITER ;


DROP TABLE IF EXISTS `personnagerp`;
DROP TABLE IF EXISTS `commentaire_personnage`;
DROP TABLE IF EXISTS `recompense`;
DROP TABLE IF EXISTS `stats_player`;
DROP TABLE IF EXISTS `player`;
DROP TABLE IF EXISTS `matchs`;
DROP TABLE IF EXISTS `saison_ligue`;
DROP TABLE IF EXISTS `lsv_svg`;
DROP TABLE IF EXISTS `lsv`;
DROP TABLE IF EXISTS `ligue_link`;
DROP TABLE IF EXISTS `team`;
DROP TABLE IF EXISTS `membre`;
DROP TABLE IF EXISTS `ligue`;

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--

CREATE TABLE `ligue` (
  `idligue` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `ordre` float DEFAULT NULL,
  `prestige` int(11) DEFAULT '1',
  `actif` int(1) NOT NULL DEFAULT '1',
  `pos_top` int(11) NOT NULL DEFAULT '0',
  `pos_left` int(11) NOT NULL DEFAULT '0',
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Index pour la table `ligue`
--
ALTER TABLE `ligue`
  ADD PRIMARY KEY (`idligue`),
  ADD UNIQUE KEY `ordre` (`ordre`);

-- --------------------------------------------------------

--
-- Structure de la table `ligue_link`
--

CREATE TABLE `ligue_link` (
  `idmetaligue` int(11) NOT NULL,
  `idliguechild` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

CREATE TABLE `matchs` (
  `idmatch` bigint(20) NOT NULL,
  `idsaison_ligue` int(11) NOT NULL,
  `idteam1` int(11) DEFAULT NULL,
  `idteam2` int(11) DEFAULT NULL,
  `urltopic` varchar(250) DEFAULT NULL,
  `journee` int(11) NOT NULL,
  `datematch` datetime DEFAULT NULL,
  `score1` int(11) DEFAULT NULL,
  `score2` int(11) DEFAULT NULL,
  `possession1` int(11) DEFAULT NULL,
  `occupation_own1` int(11) DEFAULT NULL,
  `occupation_their1` int(11) DEFAULT NULL,
  `sub_sonne1` int(11) DEFAULT NULL,
  `sub_ko1` int(11) DEFAULT NULL,
  `sub_blesse1` int(11) DEFAULT NULL,
  `sub_mort1` int(11) DEFAULT NULL,
  `possession2` int(11) DEFAULT NULL,
  `occupation_own2` int(11) DEFAULT NULL,
  `occupation_their2` int(11) DEFAULT NULL,
  `sub_sonne2` int(11) DEFAULT NULL,
  `sub_ko2` int(11) DEFAULT NULL,
  `sub_blesse2` int(11) DEFAULT NULL,
  `sub_mort2` int(11) DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `spectateur` int(11) DEFAULT NULL,
  `idmatch1` bigint(20) DEFAULT NULL,
  `idmatch2` bigint(20) DEFAULT NULL,
  `poule` varchar(11) DEFAULT NULL,
  `modif_gloire1` int(11) DEFAULT '0',
  `modif_gloire2` int(11) DEFAULT '0',
  `malus_gloire` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `idmembre` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(50) NOT NULL DEFAULT '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.',
  `droits` int(1) DEFAULT '0',
  `hover_nav` tinyint(1) DEFAULT '1',
  `hover_nav_place` tinyint(1) DEFAULT '0',
  `tresorerie` int(11) DEFAULT '0',
  `police_defaut` varchar(50) DEFAULT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '1',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;



-- --------------------------------------------------------

--
-- Structure de la table `player`
--

CREATE TABLE `player` (
  `idplayer` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `idposte` int(11) NOT NULL,
  `idteam` bigint(20) NOT NULL,
  `competences` varchar(50) DEFAULT NULL,
  `blessures` varchar(50) DEFAULT NULL,
  `fired` tinyint(1) DEFAULT '0',
  `blesse` tinyint(1) DEFAULT '0',
  `num` int(11) DEFAULT '0',
  `xp` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;


-- --------------------------------------------------------

--
-- Structure de la table `saison_ligue`
--

CREATE TABLE `saison_ligue` (
  `idligue` int(11) NOT NULL,
  `saison` varchar(11) NOT NULL,
  -- `mode_ligue` enum('championnat','coupe','open') NOT NULL,
  `mode_ligue` varchar(11) NOT NULL,
  `idsaison_ligue` int(11) NOT NULL,
  `ordre` float DEFAULT NULL,
  `date_deb` datetime DEFAULT NULL,
  `date_fin` datetime DEFAULT NULL,
  `actif` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `stats_player`
--

CREATE TABLE `stats_player` (
  `idplayer` bigint(20) NOT NULL,
  `idmatch` bigint(20) NOT NULL,
  `jpv` int(11) DEFAULT NULL,
  `passe` int(11) DEFAULT NULL,
  `reception` int(11) DEFAULT NULL,
  `interception` int(11) DEFAULT NULL,
  `touchdown` int(11) DEFAULT NULL,
  `plaque` int(11) DEFAULT NULL,
  `sonne` int(11) DEFAULT NULL,
  `ko` int(11) DEFAULT NULL,
  `blesse` int(11) DEFAULT NULL,
  `mort` int(11) DEFAULT NULL,
  `tacle` int(11) DEFAULT NULL,
  `dist_passe` int(11) DEFAULT NULL,
  `dist_course` int(11) DEFAULT NULL,
  `sub_interception` int(11) DEFAULT NULL,
  `sub_plaque` int(11) DEFAULT NULL,
  `sub_sonne` int(11) DEFAULT NULL,
  `sub_ko` int(11) DEFAULT NULL,
  `sub_blesse` int(11) DEFAULT NULL,
  `sub_tacle` int(11) DEFAULT NULL,
  `sub_mort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

CREATE TABLE `team` (
  `idteam` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `idroster` int(11) NOT NULL DEFAULT '0',
  `idcoach` int(11) NOT NULL,
  `logo` varchar(100) NOT NULL DEFAULT 'Logo_Neutre_00_Player.png',
  `url` varchar(250) NOT NULL,
  `idteamserver` bigint(20) DEFAULT NULL,
  `prestige` int(11) DEFAULT '1',
  `apo` int(11) DEFAULT '0',
  `assistant` int(11) DEFAULT '0',
  `pompom` int(11) DEFAULT '0',
  `tresor` int(11) DEFAULT '0',
  `reroll` int(11) DEFAULT '0',
  `popularite` int(11) DEFAULT '0',
  `url_photo` varchar(255) DEFAULT NULL,
  `proprio` varchar(50) DEFAULT 'Non renseigné',
  `domicile` varchar(50) DEFAULT 'Non renseigné',
  `couleurs` varchar(50) DEFAULT 'Non renseigné',
  `sponsors` varchar(50) DEFAULT 'Non renseigné',
  `gloire` int(11) NOT NULL DEFAULT '100',
  `date_modif_gloire` datetime DEFAULT NULL,
  `background` text,
  `cri` varchar(255) DEFAULT NULL,
  `actif` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Index pour les tables exportées
--




--
-- Index pour la table `ligue_link`
--
ALTER TABLE `ligue_link`
  ADD PRIMARY KEY (`idmetaligue`,`idliguechild`),
  ADD KEY `idmetaligue` (`idmetaligue`),
  ADD KEY `idliguechild` (`idliguechild`);

--
-- Index pour la table `lsv`
--

--
-- Index pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`idmatch`),
  ADD KEY `idmatch2` (`idmatch2`),
  ADD KEY `idmatch1` (`idmatch1`),
  ADD KEY `idteam2` (`idteam2`),
  ADD KEY `idteam1` (`idteam1`),
  ADD KEY `idsaison_ligue` (`idsaison_ligue`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`idmembre`);


--
-- Index pour la table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`idplayer`),
  ADD KEY `idteam` (`idteam`),
  ADD KEY `idteam_2` (`idteam`);



--
-- Index pour la table `saison_ligue`
--
ALTER TABLE `saison_ligue`
  ADD PRIMARY KEY (`idsaison_ligue`),
  ADD UNIQUE KEY `ordre` (`ordre`),
  ADD KEY `idligue` (`idligue`);

--
-- Index pour la table `stats_player`
--
ALTER TABLE `stats_player`
  ADD PRIMARY KEY (`idplayer`,`idmatch`),
  ADD KEY `idplayer` (`idplayer`),
  ADD KEY `idmatch` (`idmatch`);

--
-- Index pour la table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`idteam`),
  ADD UNIQUE KEY `idteamserver` (`idteamserver`),
  ADD KEY `idcoach` (`idcoach`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ligue`
--
ALTER TABLE `ligue`
  MODIFY `idligue` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `idmatch` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `idmembre` int(11) NOT NULL AUTO_INCREMENT;
--
--

--
-- AUTO_INCREMENT pour la table `saison_ligue`
--
ALTER TABLE `saison_ligue`
  MODIFY `idsaison_ligue` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `team`
--
ALTER TABLE `team`
  MODIFY `idteam` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ligue_link`
--
ALTER TABLE `ligue_link`
  ADD CONSTRAINT `ligue_link_ibfk_1` FOREIGN KEY (`idmetaligue`) REFERENCES `ligue` (`idligue`),
  ADD CONSTRAINT `ligue_link_ibfk_2` FOREIGN KEY (`idliguechild`) REFERENCES `ligue` (`idligue`);

--
-- Contraintes pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD CONSTRAINT `matchs_ibfk_1` FOREIGN KEY (`idsaison_ligue`) REFERENCES `saison_ligue` (`idsaison_ligue`),
  ADD CONSTRAINT `matchs_ibfk_2` FOREIGN KEY (`idteam1`) REFERENCES `team` (`idteam`),
  ADD CONSTRAINT `matchs_ibfk_3` FOREIGN KEY (`idteam2`) REFERENCES `team` (`idteam`),
  ADD CONSTRAINT `matchs_ibfk_4` FOREIGN KEY (`idmatch1`) REFERENCES `matchs` (`idmatch`),
  ADD CONSTRAINT `matchs_ibfk_5` FOREIGN KEY (`idmatch2`) REFERENCES `matchs` (`idmatch`);

--
-- Contraintes pour la table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`idteam`) REFERENCES `team` (`idteamserver`);


--
-- Contraintes pour la table `saison_ligue`
--
ALTER TABLE `saison_ligue`
  ADD CONSTRAINT `saison_ligue_ibfk_1` FOREIGN KEY (`idligue`) REFERENCES `ligue` (`idligue`);

--
-- Contraintes pour la table `stats_player`
--
ALTER TABLE `stats_player`
  ADD CONSTRAINT `stats_player_ibfk_1` FOREIGN KEY (`idmatch`) REFERENCES `matchs` (`idmatch`) ON DELETE CASCADE,
  ADD CONSTRAINT `stats_player_ibfk_2` FOREIGN KEY (`idplayer`) REFERENCES `player` (`idplayer`);

--
-- Contraintes pour la table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`idcoach`) REFERENCES `membre` (`idmembre`);

-- /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
-- /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- --------------------------------------------------------

--
-- Structure de la table `recompense`
--

-- CREATE TABLE `recompense` (
--   `idrecompense` int(11) NOT NULL,
--   `idjoueur` bigint(20) DEFAULT NULL,
--   `idteam` int(11) DEFAULT NULL,
--   `idcoach` int(11) DEFAULT NULL,
--   `type` enum('j_brute','t_brute','j_coureur','t_coureur','j_receveur','t_receveur','j_lanceur','t_lanceur','j_bliteur','t_blitzeur') NOT NULL,
--   `idsaison` int(11) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

-- --
-- -- Contraintes pour la table `recompense`
-- --
-- ALTER TABLE `recompense`
--   ADD CONSTRAINT `recompense_ibfk_1` FOREIGN KEY (`idjoueur`) REFERENCES `player` (`idplayer`),
--   ADD CONSTRAINT `recompense_ibfk_2` FOREIGN KEY (`idteam`) REFERENCES `team` (`idteam`),
--   ADD CONSTRAINT `recompense_ibfk_3` FOREIGN KEY (`idcoach`) REFERENCES `membre` (`idmembre`);

-- --------------------------------------------------------

--
-- Structure de la table `personnagerp`
--

-- CREATE TABLE `personnagerp` (
--   `idperso` int(11) NOT NULL,
--   `idmembre` int(11) NOT NULL,
--   `name` varchar(30) NOT NULL,
--   `background` text,
--   `type` enum('journaliste','administrateur','autre') NOT NULL DEFAULT 'autre'
-- ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- AUTO_INCREMENT pour la table `personnagerp`
-- ALTER TABLE `personnagerp`
--   MODIFY `idperso` int(11) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_personnage`
--

-- CREATE TABLE `commentaire_personnage` (
--   `idcommentaire` bigint(20) NOT NULL,
--   `type_perso` enum('coach','joueur','autre') NOT NULL,
--   `date_commentaire` datetime NOT NULL,
--   `commentaire` text NOT NULL,
--   `idperso` int(11) NOT NULL,
--   `idmatch` int(11) NOT NULL,
--   `pow` tinyint(1) NOT NULL DEFAULT '0'
-- ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Index pour la table `commentaire_personnage`
--
-- ALTER TABLE `commentaire_personnage`
--   ADD PRIMARY KEY (`idcommentaire`),
--   ADD KEY `match_commentaire` (`idmatch`);


--
-- Index pour la table `personnagerp`
--
-- ALTER TABLE `personnagerp`
--   ADD UNIQUE KEY `idperso` (`idperso`),
--   ADD KEY `proprio_perso` (`idmembre`);
-- --
-- -- Index pour la table `recompense`
-- --
-- ALTER TABLE `recompense`
--   ADD PRIMARY KEY (`idrecompense`),
--   ADD UNIQUE KEY `pk_secondaire_saison_type` (`type`,`idsaison`),
--   ADD KEY `fk_team` (`idteam`),
--   ADD KEY `fk_joueur` (`idjoueur`),
--   ADD KEY `fk_coach` (`idcoach`),
--   ADD KEY `fk_saison` (`idsaison`);

--
-- AUTO_INCREMENT pour la table `commentaire_personnage`
--

-- ALTER TABLE `commentaire_personnage`
--   MODIFY `idcommentaire` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `recompense`
--
-- ALTER TABLE `recompense`
--   MODIFY `idrecompense` int(11) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------

--
-- Structure de la table `lsv`
--

-- CREATE TABLE `lsv` (
--   `idlsv` int(11) NOT NULL,
--   `titre` varchar(50) NOT NULL,
--   `textlsv` text NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lsv_svg`
--

-- CREATE TABLE `lsv_svg` (
--   `idlsv` int(11) NOT NULL,
--   `titre` varchar(50) NOT NULL,
--   `textlsv` text NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- AUTO_INCREMENT pour la table `lsv`
--
-- ALTER TABLE `lsv`
--   MODIFY `idlsv` int(11) NOT NULL AUTO_INCREMENT;
-- --
-- -- AUTO_INCREMENT pour la table `lsv_svg`
-- --
-- ALTER TABLE `lsv_svg`
--   MODIFY `idlsv` int(11) NOT NULL AUTO_INCREMENT;

-- ALTER TABLE `lsv`
--   ADD PRIMARY KEY (`idlsv`);

-- --
-- -- Index pour la table `lsv_svg`
-- --
-- ALTER TABLE `lsv_svg`
--   ADD PRIMARY KEY (`idlsv`);
