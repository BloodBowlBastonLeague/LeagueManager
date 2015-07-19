-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 17, 2015 at 12:12 PM
-- Server version: 5.5.41-log
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bbbl`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`bbblysgkbbbl`@`%` FUNCTION `nbOccur`( str VARCHAR(20), txt VARCHAR(50)) RETURNS int(11)
    NO SQL
BEGIN
DECLARE nb,pos int default 0;
only:loop 
	set pos = LOCATE(str,txt,pos+1);
	if 0 = pos then leave only;
	end if;
	set nb = nb+1;
end loop only;
return nb;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=73 ;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`idmembre`, `pseudo`, `email`, `pass`, `droits`, `hover_nav`, `hover_nav_place`, `tresorerie`, `police_defaut`, `actif`, `description`) VALUES
(1, 'Maremick', 'maremick@gmail.com', '$1$6n..V3/.$6C0ZBG.r4KXc/LfvI50TQ0', 15, 1, 0, 120000, 'Midnight', 0, ''),
(2, 'Obsidian', 'e', '$1$6n..V3/.$R81Z0AmGILLqsDIZd2CGd.', 0, 1, 0, 86900, 'Midnight', 0, ''),
(3, 'Poulp', 'a', '$1$6n..V3/.$ruKCeRqJrAxGFu9Pv5K7C0', 0, 1, 0, 75000, 'Midnight', 0, ''),
(4, 'Jahstrad', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 15, 1, 0, 140000, 'Midnight', 1, ''),
(5, 'Thalar', NULL, '$1$6n..V3/.$6uSJV1YAkTb1ZQYZzAJ2R1', 15, 1, 0, 50000, 'Midnight', 0, ''),
(6, 'Ashrame', NULL, '$1$6n..V3/.$WPlEBwjVHddCvZ8tmcaLU.', 15, 1, 0, 95300, 'Midnight', 1, ''),
(7, 'Oscar Tilage', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 79300, 'Midnight', 1, ''),
(8, 'Zongogo', NULL, '$1$6n..V3/.$cADnDJW54larH/cD0Y48P/', 0, 1, 0, 40000, 'Midnight', 1, ''),
(9, 'Marius le Gardien', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, 'Midnight', 0, ''),
(10, 'Ignatt', NULL, '$1$6n..V3/.$Um46PlqOWNVteWmEskiVF0', 0, 1, 0, 95000, 'Midnight', 1, ''),
(11, 'Kien', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 65000, 'Midnight', 1, ''),
(12, 'Elenalcar', NULL, '$1$6n..V3/.$hZaV2TPHMWJSq2F9oLtsR0', 0, 1, 0, 103700, 'Midnight', 1, ''),
(13, 'Elender', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, 'Midnight', 1, ''),
(14, 'Miaousse666', NULL, '$1$6n..V3/.$P0vyA7XOvR98jVz3/kc6O1', 0, 1, 0, 82000, 'Midnight', 0, ''),
(15, 'Shadow Chris', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 75000, 'Midnight', 0, ''),
(16, 'Cuivenen', NULL, '$1$6n..V3/.$yUdKVcmEIPFPwN5fAjuIj1', 0, 1, 0, 117000, 'Midnight', 1, ''),
(17, 'Sezzla Kalongi', NULL, '$1$6n..V3/.$opeczoE5Nmqhc4BMJK38U.', 0, 1, 1, 110500, 'Midnight', 0, ''),
(18, 'Le Lapin Troll', NULL, '$1$6n..V3/.$BlrKbkSanK2C4i94KiVJX/', 15, 0, 0, 40000, 'Midnight', 1, ''),
(19, 'RelaxMax', NULL, '$1$6n..V3/.$Rxjud0DvRUqim1N5rxi/s1', 0, 1, 0, 65000, 'Midnight', 1, ''),
(20, 'Voodoo', NULL, '$1$6n..V3/.$g8RH4o4zolN.HZfC6ojHJ.', 15, 1, 0, 67400, 'Midnight', 1, ''),
(21, 'Bran', NULL, '$1$6n..V3/.$YEjWknnJTHniJmKiko98Z1', 0, 1, 0, 10000, 'Midnight', 0, ''),
(22, 'Zoid', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 55400, 'Midnight', 1, ''),
(23, 'Gros77', NULL, '$1$6n..V3/.$PK66JepTVUmxPzWBf7uH/0', 0, 1, 0, 85000, 'Midnight', 1, 'Gros est LE coach le plus apprécié de la BBBL ! Le seul coach que tout le monde a réussi a aimer lorsqu’il entraînait des petits hommes barbus, transformant ces dangereux psychopathes en de doux et inoffensif petits ours colorés ! Mais sous ses atours de brave coach sympathique, Gros cache une volonté sans faille de se hisser un jour sur la plus haute marche, bien qu’il ne sache pas encore bien laquelle … En choisissant d’entrainer des chaotiques, Gros a choisi de se donner le temps, le temps de bien former ces hommes chèvres / taureau et d’en faire des danseuses étoiles.'),
(24, 'Arrgggh', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, 'Midnight', 0, ''),
(25, 'Kurlom', NULL, '$1$6n..V3/.$fY52hPoKfUQaIT7IsNcY8.', 0, 1, 0, 76500, 'Midnight', 0, ''),
(26, 'Yaouch', NULL, '$1$6n..V3/.$.OcLqPVce28/pKpLe.mng/', 0, 1, 0, 57000, 'Midnight', 1, ''),
(27, 'Relaps', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 5000, 'Midnight', 1, 'Relaps a frayé, des années durant, avec la lie de lie, les pires raclures de blood bowl city leur offrant une porte de sortie réelle à leur condition précaire, un espace de liberté et de violence dans un monde dur et sans pitié ! Après avoir été maudit, oublié, perdu, warpé, utilisé par des démons taquins, Relaps est revenu toujours plus fort, toujours plus beau avec une équipe à la dimension de son talent :  des halflings !\r\n\r\nSa pugnacité naturelle, son caractère pointilleux, sa grande rigueur grammaticale son autant d’atouts essentiels pour mener ce coach vers les sommets … de l’espoir ! ou l’espoir des sommets qui sait ?'),
(28, 'Aigor', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 57500, 'Midnight', 0, ''),
(29, 'Lilyth Demona', NULL, '$1$6n..V3/.$OfK3/XQb7O0sks.um9ZOv.', 0, 1, 0, 44300, 'Midnight', 0, ''),
(30, 'Coach Clement0', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 40000, 'Midnight', 1, ''),
(31, 'Marcus Miragos', NULL, '$1$6n..V3/.$M3xaA2tOqaE3J7JtN.ndQ0', 0, 1, 1, 0, 'Midnight', 1, ''),
(32, 'Zek', NULL, '$1$6n..V3/.$8RSawnaHmgnSnWWUzEhiB/', 0, 1, 0, 106500, 'Midnight', 0, ''),
(33, 'Karwael', NULL, '$1$6n..V3/.$icm93hpNhlnut0RUE8gy/.', 0, 1, 0, 81000, 'Midnight', 0, ''),
(34, 'Zol', NULL, '$1$6n..V3/.$MJJqCc.XuQN5KmfgNNN7v.', 0, 1, 0, 0, 'Midnight', 0, ''),
(35, 'Feuille2Chene', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 1, 105000, 'Midnight', 0, ''),
(36, 'DocteurZ', NULL, '$1$6n..V3/.$wzpakulMNRihy9Zc7BVJz1', 0, 1, 0, 112000, 'Midnight', 1, ''),
(37, 'Oligunar', NULL, '$1$6n..V3/.$sTFNgcc57vD1Ra7NdDxk..', 0, 1, 0, 75000, 'Midnight', 1, ''),
(38, 'Cordell', NULL, '$1$6n..V3/.$/bzZZiXk4GexxaXsQj4iS0', 0, 1, 0, 75000, 'Midnight', 0, ''),
(39, 'Plouplou', NULL, '$1$6n..V3/.$B9g678AIIOBCk6dTEcmgo/', 0, 1, 0, 70000, 'Midnight', 0, ''),
(40, 'MomieNova', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, 'Midnight', 1, ''),
(41, 'Nikolay', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 40000, 'Midnight', 0, ''),
(42, 'Alikaa', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 40000, 'Midnight', 1, ''),
(43, 'Cinod', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 1, 72900, 'Midnight', 1, ''),
(44, 'Huste', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, 'Midnight', 0, ''),
(45, 'Tamtamm', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, 'Midnight', 0, ''),
(46, 'Sulrik', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, 'Midnight', 0, ''),
(47, 'Stex', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 40000, 'Midnight', 0, ''),
(48, 'Kaess', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, 'Midnight', 0, ''),
(49, 'Gallka', 'fred.tommeray@gmail.com', '$1$6n..V3/.$H2b5S9Q.znE06rw6wwstJ/', 0, 1, 0, 0, 'Midnight', 1, ''),
(50, 'Ergan', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, NULL, 0, ''),
(51, 'Vald', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, NULL, 0, ''),
(52, 'Ducky', NULL, '$1$6n..V3/.$v4nETAXmR9QfHlytxP/u0/', 0, 1, 0, 0, NULL, 1, ''),
(53, 'Immisantzen', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, NULL, 0, 'Immisantzen était jeune, très jeune, trop jeune lorsqu’il postula la première fois à la BBBL. Pour son bien, les coaches durent prendre une mesure radicale et l’exclure avant même de l’avoir intégré ! Mais la jeunesse est tumultueuse et ce coach au caractère bien trempé est pugnace ! Il revint l’année d’après, puis celle d’après encore et encore jusqu’à ce que les coaches s’habituent tellement à voir son visage qu’aucun ne pu vraiment savoir qu’il n’avait pas été accepté … Ce passager clandestin de l’espoir , promu à la tête d’une équipe d’orque pour le moins original à encore de belles années devant lui …'),
(54, 'Stryke', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, NULL, 0, ''),
(55, 'Kurva Piroska', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, NULL, 0, ''),
(56, 'jeestdieu', NULL, '$1$6n..V3/.$4a915wD16sBENPu7M65y4/', 0, 1, 0, 0, NULL, 0, ''),
(57, 'Hersiphar', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, NULL, 0, ''),
(58, 'Kristoflax', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, NULL, 1, ''),
(59, 'Bodygger', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, NULL, 0, ''),
(60, 'Elsantos', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, NULL, 1, ''),
(61, 'bioskop', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, NULL, 1, ''),
(62, 'gally099', NULL, '$1$6n..V3/.$ksne2VXdWg5X.KUW18D9E0', 0, 1, 0, 0, NULL, 1, 'On pourrait dire bien des choses de cette nouvelle recrue ! Impliqué, appliqué, volontaire Gally a l’étoffe pour jouer avec les plus grands ! Mais au final ce qui résume le mieux ce coach est la chanson scandée par l’ensemble de ses plus fervents supporters lors des matchs tendus: « Gally, gally, gally, l’ami des tout petits, il aime se raconter des contes de fée et remuer le bout de son nez !  Si tu es triste, que tu as un gros chagrin, tu sais qu’il existe un petit malin, un coach aimable, gentil et câlin, qui t’offre ses joueuses pour te réconforter ! » Comme vous l’aurez compris la générosité de ce coach n’a de limite que le nombre de ses joueuses ! Merci Gally !'),
(65, 'vieille mytho barré', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, NULL, 0, ''),
(66, 'Ecklir', NULL, '$1$6n..V3/.$67cQrGwdoLwdUK1rGadS11', 0, 1, 0, 0, NULL, 1, ''),
(67, 'Deadpool78', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, NULL, 0, ''),
(68, 'unelegant slayer', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 0, 1, 0, 0, NULL, 1, 'Il fut le coach le plus prometteur de sa génération, ce « jeune » talent avait TOUT pour réussir ! Il maitrisait parfaitement les arcanes de ce sport, avait un rare talent pour sélectionner les joueurs les plus prometteurs et avait compris que dans blood bowl, il y avait blood mais il n’y avait pas ball ! Il fut même pressenti pour prendre la tête des Reikland Reavers en 2484 …\r\n\r\nPuis le blood bowl évolua, lui pas. Comme un vieux mercenaire revenu de l’empire après 15 ans de guerre, il refusa le changement. Son style endiablé, novateur et téméraire devint vieillot, monomaniaque et prévisible. Puis Unélégant Slayer disparu, un soir … on ne sait pas ce qu’il fit pendant ces 10 dernières années, mais son retour ne présage rien de bon … oh non !'),
(69, 'ZeCid', NULL, '$1$6n..V3/.$96KSU8BeUxj9BWHo0lLs8.', 0, 1, 0, 0, NULL, 1, 'Ze Cid est au blood bowl ce que Jeanne Calmant fut au viager : une bonne idée qui se transforme en une bonne grosse catastrophe coûteuse!  Ses tactiques novatrices, son esprit incisif et sa vision clair du jeu sont malheureusement déformées par un défaut net d’élocution qui transforme ses idées claires et précises et un amalgame brouillon de mots incompréhensibles qui n’auraient aucun impact, si ce fin tacticien n’avait choisi de coacher des nains … Il est toujours très amusant de voir ces petits être barbus en pétard courir de ci de la pour essayer de rattraper l’imbroglio !'),
(70, 'Rankstail', NULL, '$1$6n..V3/.$7ctcPccDe8bLiQeW0qkvu1', 0, 1, 0, 0, NULL, 1, 'Randstad ou plutôt Rannnnnddddsstaaaaaaad à lancer de nombreux coaches, en donnant des formations sur mesure ! Ha on me dit dans l’oreillette qu’il s’agit de Rankstail … désolé … Rankstail est un coach au sang froid, très froid. Ses analyses rationnelles se retrouve dans un jeu solide et organisé que certains, jaloux, ou amoureux du blood bowl samba jugeraient comme stéréotypé. La vérité est tailleur et Rankstail a de très beaux costumes ! Alors attention à ce coach nouvelle génération qui risque de vous surprendre !'),
(71, 'Monsieur Vegas', NULL, '$1$6n..V3/.$qOgAZYl/.5y5lDnARAe9A.', 0, 1, 0, 0, NULL, 1, 'Monsieur Vegas est le genre de coach qui vous ferait presque croire que vous le connaissez bien. Sa nonchalance naturelle couplée à une verve imagé ont poussé les membres de l’administrorium à vérifier que derrière le masque ne se cachait pas un ancien coach qui ferait une sorte de come-back déguisé, ou un émissaire des buveurs de lait qui voudrait reprendre pied dans la ligue non corruption ! Mais si l’enquête n’est toujours pas terminé, Monsieur Vegas fait partit des nouveaux grands espoirs de la ligue, il pourrait réussir à se hisser aussi rapidement que ses receveurs humains, au plus haut, renversant la tendance un peu lourde qui est en place et qui pousse les équipes « plus légères » à la porte ! Retenez bien le nom de ce monsieur vegas ou quelque soit son vrai nom.'),
(72, 'Burtock', NULL, '$1$6n..V3/.$uj3Bfs4AKruxej5AMwWW1.', 9, 1, 0, 0, NULL, 1, 'Qui est il ? d’où vient il ? ce formidable coach des temps nouveaux ? Au fin fond de Blood Bowl City, à des étages et des étages de la Terre, veille celui que l’administratorium appelle quand il n''est plus capable de trouver une solution à ses problèmes, quand il ne reste plus aucun espoir : Burtock le coach MYSTERE !');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=243 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`idteam`, `name`, `idroster`, `idcoach`, `logo`, `url`, `idteamserver`, `prestige`, `apo`, `assistant`, `pompom`, `tresor`, `reroll`, `popularite`, `url_photo`, `proprio`, `domicile`, `couleurs`, `sponsors`, `gloire`, `date_modif_gloire`, `background`, `cri`, `actif`) VALUES
(0, 'Joueur Freelance', 1, 1, 'logo_b18.png', 'http://lbbf.forumactif.com/', 0, 1, 0, 0, 0, 0, 0, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 179, '2014-05-21 23:48:10', NULL, NULL, 0),
(1, 'La Khorupted Squad', 8, 1, 'Logo_Chaos_Maremick001_Player.png', 'http://lbbf.forumactif.com/t2812-maremick-la-khorupted-squad', 646229, 1, 1, 2, 2, 120000, 4, 8, 'http://i13.servimg.com/u/f13/15/20/71/39/bloodb18.jpg', 'Futel le corrompu', 'Blood Bowl City', 'Rouge Sang', 'Rouge Sang', 68, '2013-03-25 20:33:04', '<a href="http://lbbf.forumactif.com/t2812-maremick-la-khorupted-squad">Actualité de la Squad</a>', 'Que la symphonie fracasse !', 0),
(3, 'Les Nurgles d''Amour', 18, 7, 'Logo_Nurgle_01_Player.png', 'http://lbbf.forumactif.com/t2814-oscar-tilage-les-nurgles-d-amour', 641035, 1, 0, 0, 1, 180000, 4, 7, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(6, 'Serial Lovers', 17, 19, 'Logo_Neutre_SerialLovers_Player.png', 'http://lbbf.forumactif.com/t2688-relaxmax-serial-lovers', 628991, 1, 0, 0, 0, 780000, 4, 10, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(7, 'Saulaile Kouch Han', 4, 25, 'Logo_Orc_SaulaileKouchHan_Player.png', 'http://lbbf.forumactif.com/t2695-kurlom-saulaile-kouch-han', 572405, 1, 1, 1, 2, 610000, 4, 9, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(8, 'Draco Deus', 12, 5, 'Logo_norse_thalar_Player.png', 'http://lbbf.forumactif.com/t2776-thalar-draco-deus', 630584, 1, 1, 0, 4, 10000, 5, 6, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(9, 'Les Nauséabonds du Lac', 18, 10, 'Logo_Nurgle_02_Player.png', 'http://lbbf.forumactif.com/t2793-bachibouzouc-les-nauseabonds-du-lac', 635760, 1, 0, 0, 0, 830000, 3, 10, 'http://i48.servimg.com/u/f48/15/68/33/21/a12.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 526, '2014-08-11 15:12:57', NULL, NULL, 0),
(10, 'A.V.M.I.', 16, 13, 'Logo_Khemri_06_Player.png', 'http://lbbf.forumactif.com/t2772-elender-avmi', 623801, 1, 0, 4, 4, 380000, 5, 6, NULL, 'Eux mêmes', 'Nehekhara', 'Noir et or', 'Eux mêmes', 179, '2014-05-07 14:15:54', NULL, NULL, 0),
(11, 'Les Vanyars', 15, 16, 'Logo_HighElf_01_Player.png', 'http://lbbf.forumactif.com/t2917-cuivenen-les-vanyars', 666233, 1, 1, 0, 0, 20000, 4, 10, 'http://i45.servimg.com/u/f45/15/15/50/24/vanyar12.jpg', 'JRRT', 'Valinor Arena', 'Bleu Canard WC', 'L''Administratorum', 1150, '2014-08-27 16:35:23', NULL, NULL, 0),
(12, 'Les Guardians', 2, 9, 'Logo_Dwarf_16_Player.png', 'http://lbbf.forumactif.com/t2820-marius-le-gardien-les-guardians', 645180, 1, 1, 0, 0, 370000, 4, 10, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(13, 'Woody Roots Bush Bombers', 7, 24, 'Logo_Neutre_15_Player.png', 'http://lbbf.forumactif.com/t2825-arrgggh-woody-roots-bush-bombers', 645433, 1, 1, 0, 0, 40000, 4, 10, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(14, 'USS Antre-Prise', 10, 8, 'Logo_zongogo_Player.png', 'http://lbbf.forumactif.com/t2842-zongogo-uss-antre-prise', 655174, 1, 0, 1, 0, 260000, 4, 9, NULL, 'Autogestion/Starfleet', 'l''USS Antre-Prise', 'un joli rose un peu passé', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(15, 'E.L.F.E.S', 14, 2, 'Logo_Elf_E_Player.png', 'http://lbbf.forumactif.com/t2714-obsidian-les-elfes', 666105, 1, 1, 2, 2, 30000, 4, 8, 'http://i47.servimg.com/u/f47/14/37/30/82/sans_t11.jpg', 'Obsidian', 'Sylvania', 'blanc et violet', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(16, 'Les R.O.M.E.S', 17, 6, 'Logo_Necromantic_01_Player.png', 'http://lbbf.forumactif.com/t2680-ashrame-les-romes', 616616, 1, 0, 0, 0, 735000, 4, 13, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(17, 'Les Apostats de Nuffle', 9, 32, 'Logo_DarkElf_Apostats_Player.png', 'http://lbbf.forumactif.com/t2795-zek-les-apostats-de-nuffle', 647542, 1, 1, 0, 0, 420000, 4, 7, 'http://i45.servimg.com/u/f45/14/95/03/49/s811.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 730, '2013-10-03 11:55:33', NULL, NULL, 0),
(18, 'Sons of Alaric', 2, 30, 'Logo_Dwarf_SonsOfAlaric_Player.png', 'http://lbbf.forumactif.com/t2872-coach-clement0-sons-of-alaric', 656803, 1, 1, 2, 2, 430003, 3, 10, 'http://i41.servimg.com/u/f41/14/31/31/01/bloodb55.jpg', 'Inconnu', 'SAMCRO', 'Noir', 'Harley Gurnisson', 594, '2014-05-25 09:37:54', NULL, NULL, 0),
(19, 'Lustrian Bobcats', 13, 28, 'Logo_Amazon_LustrianBobcats_Player.png', 'http://lbbf.forumactif.com/t2724-aigor-lustrian-bobcats', 611971, 1, 1, 0, 1, 480000, 4, 8, NULL, 'Esclaves de la mode', 'Lycée Varach Mâchegoule', 'bleu azur', 'Virjine', 100, NULL, NULL, NULL, 0),
(20, 'Les Plaies Mobiles_BBBL', 18, 22, 'Logo_Nurgle_Plaiesmobiles_Player.png', 'http://lbbf.forumactif.com/t2689-zoid-les-plaies-mobiles', 608539, 1, 0, 1, 1, 540000, 4, 6, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(21, 'New Capricaa Battlestars', 15, 17, 'Logo_sezzla_Player.png', 'http://lbbf.forumactif.com/t2767-sezzla-kalongi-new-capricaa-battlestars-handisport', 626607, 1, 1, 1, 1, 130000, 4, 9, 'http://i44.servimg.com/u/f44/14/34/05/64/bloodb65.jpg', 'Sezzla Kalongi', 'Lucchini', 'Noir-Or-Sang', 'XIIIème Colony', 100, NULL, 'NCB GALACTICANS: FUTURS VAINQUEURS DE LA COUPE DU CHAOS', 'We got a plan!', 0),
(22, 'Vodka Raide Bull', 12, 3, 'Logo_Norse_VodkaRaideBull_Player.png', 'http://lbbf.forumactif.com/t2824-poulp-vodka-raide-bull', 645684, 1, 1, 0, 1, 30000, 4, 7, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(23, 'Les Enfants de Bwa a Pare', 7, 12, 'Logo_WoodElf_10_Player.png', 'http://lbbf.forumactif.com/t2851-elenalcar-les-enfants-de-bwa-a-pare', 649938, 1, 1, 1, 1, 0, 4, 6, NULL, 'aucun ', 'Bois du Gland ', 'selon la saison ', 'Durex ', 69, '2014-08-27 16:35:23', NULL, NULL, 0),
(24, 'Les Darkside Magic', 9, 20, 'Logo_Neutre_05_Player.png', 'http://lbbf.forumactif.com/t3403-voodoo-les-darkside-magic', 772843, 1, 1, 0, 0, 170003, 4, 9, NULL, 'Voodoo Corp.', '"Au ''Ti Punch", la meilleure auberge créole de Nag', 'Noir et Argent', 'La Puissante Magie Voodoo', 1058, '2014-08-25 22:02:40', NULL, NULL, 0),
(25, 'Strike Tim ki Frakass', 4, 26, 'Logo_Orc_06_Player.png', 'http://lbbf.forumactif.com/t2836-yaouch-strike-tim-ki-frakass', 648172, 1, 1, 0, 10, 110000, 4, 6, NULL, 'Non renseigné', 'Non renseigné', 'Rouge sanlant', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(26, 'Amor, Ha Mors, à Mort!', 20, 38, 'Logo_Vampire_01_Player.png', 'http://lbbf.forumactif.com/t2843-cordell-amor-ha-morsa-mort', 648866, 1, 1, 4, 4, 20000, 5, 5, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(27, 'Cosmowolf', 17, 11, 'Logo_kien3_Player.png', 'http://lbbf.forumactif.com/t2850-kien-cosmowolf', 649540, 1, 0, 0, 0, 1090000, 4, 7, 'http://i48.servimg.com/u/f48/13/78/23/16/bloodb38.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 560, '2014-09-03 21:46:56', NULL, NULL, 0),
(28, 'Rot in Pieces', 16, 43, 'rot_in_pieces.png', 'http://lbbf.forumactif.com/t2720-cinod-rot-in-pieces', 604150, 1, 0, 0, 0, 720000, 3, 7, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(29, 'Arts Scéniques', 8, 4, 'Logo_Chaos_Jah_Player.png', 'http://lbbf.forumactif.com/t2846-jahstrad-les-arts-sceniques', 657948, 1, 1, 0, 0, 120000, 3, 7, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 742, '2013-11-26 21:10:25', NULL, NULL, 0),
(30, 'Fougeres d''Elithis', 1, 40, 'Logo_human_fougeresdelithis_Player.png', 'http://lbbf.forumactif.com/t2811-momienova-les-fougeres-d-elithis', 639895, 1, 1, 4, 4, 50000, 4, 6, 'http://i47.servimg.com/u/f47/11/77/93/60/bloodb43.jpg', 'Momienova', 'Eden Park', 'Noire', 'Fertilyser', 100, NULL, NULL, NULL, 0),
(31, 'Contumax', 1, 27, 'Logo_Human_Contumax_Player.png', 'http://lbbf.forumactif.com/t2701-relaps-contumax', 644917, 1, 1, 0, 3, 40000, 3, 7, NULL, 'Fondation Chrysis', 'Omaha Stadium', 'Gris et Rouge', 'Non renseigné', 68, '2013-03-20 15:58:59', NULL, NULL, 0),
(32, 'Horned One Pride', 3, 18, 'Logo_Skaven_HOP_Player.png', 'http://lbbf.forumactif.com/t2713-le-lapin-toll-horned-one-pride', 610660, 1, 1, 0, 3, 160000, 4, 7, 'http://chimaylechat.free.fr/BBBL/S8/HOP_S8_3D.png', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 330, '2014-05-15 16:10:46', NULL, NULL, 0),
(33, 'Girlz With Ballz', 13, 35, 'Logo_Amazon_GirlzWithBallz_Player.png', 'http://lbbf.forumactif.com/t2742-feuille2chene-girlz-with-ballz', 618115, 1, 1, 2, 9, 205000, 5, 7, 'http://i45.servimg.com/u/f45/11/15/27/76/clipbo19.jpg', 'Lena Longues-Tresses', 'Sanctuaire du lac Lokka, Lustrie', 'Vert et brun', 'Khorne Flakes', 100, NULL, NULL, NULL, 0),
(34, 'Black is a Color', 9, 39, 'Logo_DarkElf_03_Player.png', 'http://lbbf.forumactif.com/t2756-plouplou-black-is-a-color', 659034, 1, 1, 1, 1, 20000, 4, 8, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(35, 'Les Frères d''Armes', 2, 23, 'Logo_Dwarf_Gros_Player.png', 'http://lbbf.forumactif.com/t2808-gros-les-freres-d-armes', 639064, 1, 1, 2, 2, 0, 3, 6, 'http://i44.servimg.com/u/f44/14/24/30/48/fa11.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 1, '2014-04-30 14:05:44', NULL, NULL, 0),
(36, 'Les Ailes', 9, 34, 'Logo_DarkElf_Ailes_Player.png', 'http://lbbf.forumactif.com/t2770-zol_bzh-les-ailes', 621672, 1, 1, 1, 1, 20000, 4, 11, 'http://i47.servimg.com/u/f47/14/07/61/04/ailes10.jpg', 'Matriarche Latiférina', 'Clar Karond', 'Or et Noir', 'Foul Lockers', 100, NULL, NULL, NULL, 0),
(37, 'Lé Krabouillerz'' Rédz''', 4, 42, 'Logo_Orc_03_Player.png', 'http://lbbf.forumactif.com/t3468-alikaa-le-krabouillerz-redz-ii', 780476, 1, 1, 1, 1, 520000, 4, 10, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(38, 'La Tribu de Laur''Héalle', 13, 31, 'laurhealle.png', 'http://lbbf.forumactif.com/t2723-marcus-miragos-la-tribu-de-laur-healle', 608803, 1, 1, 0, 0, 620000, 4, 7, 'http://i41.servimg.com/u/f41/13/31/43/97/tribu_12.jpg', 'La tribu de Laur''Héalle', 'Village de la Tribu de Laur''Héalle', 'Bleu', 'L''onguent miraculeux', 100, NULL, NULL, NULL, 0),
(39, 'Foudre d''Evereska', 14, 15, 'Logo_Elf_Foudred''Evereska_Player.png', 'http://lbbf.forumactif.com/t2863-shadows-chrisfoudre-d-evereska', 653349, 1, 1, 8, 4, 320000, 4, 4, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(40, 'La Confrerie Duffienne', 12, 37, 'confrerie_duffienne.png', 'http://lbbf.forumactif.com/t2832-oligunar-la-confrerie-duffienne', 636412, 1, 1, 0, 3, 60000, 3, 9, NULL, 'Duff and co ', 'Comptoir duff, port de BBcity ', 'Non renseigné', 'Duff and co ', 570, '2013-11-25 13:07:28', NULL, NULL, 0),
(41, 'Act of Revenge', 9, 29, 'Logo_DarkElf_09_Player.png', 'http://lbbf.forumactif.com/t3450-lilyth-act-of-revenge', 779531, 1, 1, 0, 0, 280000, 4, 7, 'http://i46.servimg.com/u/f46/16/06/97/17/photo_10.jpg', 'personne n''est propriétaire d''elfes noirs !!!!', 'Cave dans le donjon en face du Perk', 'noire', 'Canal Skull', 100, NULL, NULL, NULL, 0),
(42, 'Z.O.B.', 19, 14, 'zob.png', 'http://lbbf.forumactif.com/t4572-miaousse666-zob-zirkus-ogrish-barnum', 863530, 1, 1, 3, 3, 190000, 4, 6, 'http://i49.servimg.com/u/f49/13/09/09/22/zob_bb10.jpg', 'Non renseigné', 'Blood Bowl City', 'Jaune', 'Kil-ogg''s Crunch', 100, NULL, NULL, NULL, 0),
(43, 'Les Cheikhs Critiques', 6, 21, 'Logo_Goblin_09_Player.png', 'http://lbbf.forumactif.com/t2774-bran-les-cheikhs-critiques', 622462, 1, 1, 1, 4, 100000, 5, 4, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(44, 'Norsc''Apocal''Hips', 12, 14, 'Logo_Norsc''Apocal''Hips_Player.png', 'http://lbbf.forumactif.com/t2698-miaousse666-norsc-apocal-hips', 630692, 1, 1, 2, 2, 40000, 4, 6, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(45, 'Sons of Russ', 12, 42, 'sons_of_russ.png', 'http://lbbf.forumactif.com/t2819-alikaa-sons-of-russ', 639393, 1, 1, 0, 0, 80000, 3, 8, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(46, 'Les Tords-Boyaux', 17, 44, 'Logo_Neutre_16_Player.png', 'somewhere', 627880, 1, 0, 0, 0, 30000, 3, 5, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(47, 'Le Peuple du Voodoo', 10, 20, 'Logo_Neutre_08_Player.png', 'http://lbbf.forumactif.com/t2794-voodoo-le-peuple-du-voodoo', 641887, 1, 0, 0, 0, 10000, 4, 5, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(49, 'Flying Rodent', 3, 25, 'logosite.png', 'http://lbbf.forumactif.com/t6282-kurlom-the-flying-rodent', 983205, 1, 1, 0, 0, 200000, 4, 8, 'http://i43.servimg.com/u/f43/15/13/64/34/site210.jpg', 'Eux-mêmes !', 'Le Flying Rodent', 'Noir', 'Pillages divers', 100, NULL, NULL, NULL, 0),
(50, 'Les A-Men', 1, 6, 'a-men-13.png', 'http://lbbf.forumactif.com/t6267-ashrame-les-a-men', 991692, 1, 1, 0, 0, 480000, 4, 9, 'http://i42.servimg.com/u/f42/13/22/38/17/equipe10.jpg', 'LIBRE !!!', 'Cimstadium', 'Bleu', 'Krock Mork', 100, NULL, NULL, NULL, 0),
(51, 'Loups du Middenland', 10, 5, 'Logo_Undead_thalar_Player2.png', 'http://lbbf.forumactif.com/t6363-thalar-les-loups-du-middenland#83695', 992051, 1, 0, 0, 0, 230000, 4, 7, 'http://img851.imageshack.us/img851/7822/teamx.png', 'Mel e''Agant', 'Middenheim', 'Bleu et blanc', 'Royale Canine', 100, NULL, NULL, NULL, 0),
(52, 'Jurassic Perk', 5, 31, 'jperk_12.png', 'http://lbbf.forumactif.com/t6120-marcus-miragos-jurassic-perk#83690', 963777, 1, 1, 0, 0, 1230000, 4, 8, 'http://i79.servimg.com/u/f79/13/31/43/97/jp10.jpg', 'Les employés du Perk', 'Blood Bowl City', 'Bleu', 'Le Jurassic Perk lui même!!', 279, '2013-08-28 20:10:00', NULL, NULL, 0),
(53, 'Stade Chaosien', 8, 21, 'logo_s10.png', 'http://lbbf.forumactif.com/t6108-bran-stade-chaosien', 969306, 1, 1, 2, 3, 520000, 5, 8, NULL, 'Christopher Saruman', 'Kemperbad', 'Rose et bleu', 'Saruman Pharmaceuticals Corp.', 301, '2013-05-28 21:05:36', NULL, NULL, 0),
(54, 'Les Zonards', 6, 19, 'logo_r10.png', 'http://lbbf.forumactif.com/t6266-relaxmax-les-zonards', 981785, 1, 1, 0, 0, 260000, 4, 5, 'http://i48.servimg.com/u/f48/14/58/68/82/bloodb56.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(55, 'Biques Crunch', 8, 7, 'logo_c16-64.png', 'http://lbbf.forumactif.com/t6291-oscar-tilage-biques-crunch', 984247, 1, 1, 0, 0, 110000, 4, 7, 'http://i45.servimg.com/u/f45/14/35/56/20/bloodb95.jpg', 'C''est top secret', 'Le maquis', 'Noir !', 'Aucun pour le moment', 100, NULL, NULL, NULL, 0),
(56, '[BBBL] The G-Team', 4, 43, 'logo_g10.png', 'http://lbbf.forumactif.com/t6360-cinod-the-g-team', 991190, 1, 1, 0, 0, 1010003, 3, 9, 'http://i42.servimg.com/u/f42/14/82/58/52/bloodb16.jpg', 'CiNoD', 'Middenheim', 'Vert', 'Association des Répurgateurs du Vieux Monde', 784, '2014-09-03 20:38:37', NULL, NULL, 0),
(57, 'le retour du vendredi', 7, 33, 'retour-vendredi.png', 'http://lbbf.forumactif.com/t6268-karwael-le-retour-du-vendredi', 975213, 1, 1, 2, 2, 800003, 3, 8, NULL, 'Elrond de maison noble', 'Bois de Blood Bowl city', 'vert et blanc', 'sang de dragon', 709, '2014-07-23 08:51:02', NULL, NULL, 0),
(58, 'Mutants Corporation', 3, 36, 'mutant10.png', 'http://lbbf.forumactif.com/t6091-docteurz-mutants-corporation', 973255, 1, 1, 0, 0, 40000, 3, 12, NULL, 'Non renseigné', 'Sous BB City', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(59, 'Gobelin Factory', 6, 3, 'goblin10.png', 'http://lbbf.forumactif.com/t6330-poulp-le-laboratoire-des-petites-horreurs-gobelin-factory', 990720, 1, 1, 1, 3, 150000, 4, 7, NULL, 'Baron "Docteur" Sigismund', 'Chateau Sigismund à Waldenhof', 'Marron', 'Crock''n''Suce', 100, NULL, NULL, NULL, 0),
(66, 'Blood Panthers', 9, 5, 'Logo_Panthers_blood2.png', 'http://lbbf.forumactif.com/t7049-thalar-blood-panthers', 1062759, 1, 1, 0, 0, 60000, 2, 2, 'http://i46.servimg.com/u/f46/11/16/88/63/sans_t14.jpg', 'Conseil Naja', 'Non renseigné', 'Noir et sang', 'aucun', 100, NULL, NULL, NULL, 0),
(67, 'Le Couvent des Mantas', 13, 30, 'Logo_Amazon_LeCouventDesMantas_Player.png', 'http://lbbf.forumactif.com/t7091-coach-clement0-le-couvent-des-mantas#95592', 1066656, 1, 0, 0, 0, 0, 0, 0, 'http://i41.servimg.com/u/f41/14/31/31/01/blood112.jpg', 'Le Seigneur', 'Le Couvent....', 'Vert', 'Goforissimo', 100, NULL, NULL, NULL, 0),
(68, 'SITCOM', 16, 28, 'logo.png', 'http://lbbf.forumactif.com/t7061-aigor-sitcom', 1066770, 1, 0, 1, 1, 950000, 3, 8, NULL, 'SITCOM', 'Maison des syndicats', 'Sang et Or', 'Khorne Flakes', 259, '2013-08-28 16:04:08', NULL, NULL, 0),
(69, 'LEs Topodocos', 18, 16, 'Logo_cuicui6464.png', 'http://lbbf.forumactif.com/t7075-cuivenen-les-topodocos#95232', 1066811, 1, 0, 0, 0, 70000, 3, 4, 'http://i45.servimg.com/u/f45/15/15/50/24/bloodb35.jpg', 'Cuivenen', 'Non renseigné', 'Jaune fluo radioactif', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(70, 'Mordheim Von Spaten', 17, 18, 'MVS_LogoPlayer.png', 'http://lbbf.forumactif.com/t7076-le-lapin-troll-mordheim-von-spaten', 1064478, 1, 0, 0, 0, 540000, 4, 7, 'http://chimaylechat.free.fr/BBBL/S9/MVS_Site.png', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 68, '2013-03-24 16:41:38', NULL, NULL, 0),
(71, 'les Magicals Girls', 13, 29, 'logoama.png', 'http://lbbf.forumactif.com/t7089-lilythles-magicals-girls', 1066513, 1, 1, 0, 0, 120000, 4, 4, 'http://i44.servimg.com/u/f44/16/94/34/93/image_10.jpg', 'Almus Dumble D''Or', 'Pus de Lard', 'Fushia', 'L''école de Pus de Lard', 100, NULL, NULL, NULL, 0),
(72, 'Vandersexxx', 1, 25, 'Sans titre.png', 'http://lbbf.forumactif.com/t7113-kurlom-vandersexxx', 1067685, 1, 1, 0, 0, 380000, 4, 5, 'http://i43.servimg.com/u/f43/15/13/64/34/aquipe14.jpg', 'Skarshall Teach', 'Dans ton ...', 'Noir', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(73, 'We Are Sexy & We Know It', 7, 2, 'Logo_WoodElf_We_Are_Sexy_&_We_Know_It.png', 'http://lbbf.forumactif.com/t7147-obsidian-we-are-sexy-and-we-know-it', 1069467, 1, 1, 0, 0, 150000, 2, 3, 'http://i46.servimg.com/u/f46/11/16/96/11/wasawk11.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(74, 'Believe in the Old Songs', 5, 35, 'logo site BOS.png', 'http://lbbf.forumactif.com/t7107-feuille2chene-believe-in-the-old-songs', 1072428, 1, 1, 1, 1, 1020001, 4, 10, 'http://i35.servimg.com/u/f35/11/15/27/76/clipbo25.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 699, '2014-05-27 12:09:16', NULL, NULL, 0),
(75, 'La Bande a Bad AIr', 1, 4, 'Logo_Neutre_15.png', 'http://lbbf.forumactif.com/t7102-jahstrad-la-bande-a-bad-air', 1066827, 1, 1, 0, 0, 40000, 2, 3, NULL, 'Che Guevara', 'Non renseigné', 'Rouge', 'FNLC', 100, NULL, NULL, NULL, 0),
(76, 'Les Amazons', 1, 7, 'oscar64.png', 'http://lbbf.forumactif.com/t7174-oscar-tilage-les-amazons', 1071469, 1, 1, 0, 0, 540000, 4, 7, 'http://i45.servimg.com/u/f45/14/35/56/20/blood154.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 358, '2013-12-06 15:02:13', NULL, NULL, 0),
(77, 'Rat Devil II', 3, 39, 'ratdevil.png', 'http://lbbf.forumactif.com/t7092-plouplou-les-rats-devil-ii-le-retour-de-la-suite-tadammmmm-skaven-bien-sur', 1073870, 1, 1, 0, 0, 70000, 3, 4, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(78, 'United Redskins', 1, 17, 'redskins1.png', 'http://lbbf.forumactif.com/t7202-sezzla-kalongi-united-redskins', 1073553, 1, 1, 1, 1, 430000, 4, 11, NULL, 'Sezzla Kalongi', 'Grandes Plaines du Nord', 'Rouge', 'Casino', 6, '2013-09-02 20:46:07', NULL, NULL, 0),
(79, 'Black Sheep KO''S', 8, 26, 'chaos Black Sheep-KO''S.png', 'http://lbbf.forumactif.com/t7213-yaouch-black-sheep-ko-s', 1073088, 1, 1, 0, 0, 650000, 3, 9, NULL, 'Yaouch Corporation', 'Hell Arena Stadium', 'Black Is Black', 'Black Chavroux', 100, NULL, NULL, NULL, 0),
(80, 'SAXONS ROUGE', 12, 26, 'bis-armasg-alpha.png', 'http://lbbf.forumactif.com/t7203-yaouch-les-saxons-rouge', 1072516, 1, 1, 0, 0, 20000, 3, 5, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(81, 'Operation Horned Baffe', 8, 22, 'Logo_Chaos_OHB.png', 'http://lbbf.forumactif.com/t7054-zoid-operation-horned-baffe', 1064413, 1, 1, 1, 1, 1550000, 3, 9, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 919, '2014-02-23 17:12:28', NULL, NULL, 0),
(82, 'Masopopotamie', 16, 22, 'Logo_Khemri_masopopotamie.png', 'http://lbbf.forumactif.com/t7206-zoid-masopopotamie', 1072854, 1, 0, 1, 1, 1220000, 3, 7, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 365, '2014-05-08 22:44:40', NULL, NULL, 0),
(83, 'Black Orc''N''Roll BBBL', 4, 21, 'skull_guitar_bnrbbbltypo.png', 'http://lbbf.forumactif.com/t7110-bran-black-orc-n-roll#98314', 1067418, 1, 1, 1, 2, 420000, 4, 8, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(84, 'Groquick', 12, 8, 'groquick.png', 'http://lbbf.forumactif.com/t7192-zongogo-groquick#98445', 1079213, 1, 1, 0, 0, 80000, 3, 6, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(85, 'Zongo''Z New Team', 3, 8, 'new_te10png mick.png', 'http://lbbf.forumactif.com/t7181-zongogo-zongo-z-new-team', 1082962, 1, 1, 0, 0, 540000, 3, 8, 'http://i45.servimg.com/u/f45/15/85/38/41/new_te11.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 580, '2014-05-22 12:07:33', NULL, NULL, 0),
(86, 'Minaciae Viridis', 4, 47, 'g64.png', 'http://lbbf.forumactif.com/t7251-stexminaciae-veridis', 1076403, 1, 0, 0, 0, 40000, 3, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(87, 'La F.O.s', 19, 11, 'Logo_Ogre_FOs 64.png', 'http://lbbf.forumactif.com/t2702-kien-fos-force-ogriere-et-snolt', 1078439, 1, 1, 0, 0, 320000, 4, 7, 'http://i48.servimg.com/u/f48/13/78/23/16/bloodb82.jpg', 'kien donarius', 'Bogenhafen', 'rouge', 'korn flakes', 100, NULL, NULL, NULL, 0),
(88, 'Viktoria''s Angels', 9, 42, 'Logo_VA.png', 'http://lbbf.forumactif.com/t7090-alikaa-viktoria-s-angels', 1079697, 1, 1, 0, 0, 60000, 4, 9, NULL, 'Viktoria Malikov', 'Nagaroth', 'Noir', 'Goforissimo', 561, '2013-05-30 21:03:49', NULL, NULL, 0),
(89, 'Sons Of Asahaim', 8, 42, 'Logo_Chaos_16.png', 'http://lbbf.forumactif.com/t7276-alikaa-sons-of-asaheim', 1079719, 1, 1, 0, 0, 0, 3, 4, NULL, 'Non renseigné', 'Le Croc', 'Bleu nuit', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(90, 'Les Recyclés de BB City', 17, 12, 'Logo_Neutre_001_Player.png', 'http://lbbf.forumactif.com/t6960-elenalcar-les-recycles-de-bbcity', 940407, 1, 0, 0, 0, 170000, 3, 6, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(91, 'Sotek Rising', 5, 20, 'Logo_Lizardman_001_Player.png', 'http://lbbf.forumactif.com/t7195-voodoo-sotek-rising', 1072186, 1, 1, 0, 0, 540000, 4, 9, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(92, 'BBBL La Faucheuse', 15, 40, 'Logo_HighElf_bbbllafaucheuse.png', 'http://lbbf.forumactif.com/t7184-momienova-la-faucheuse', 1071673, 1, 1, 0, 0, 120000, 3, 8, 'http://i47.servimg.com/u/f47/11/77/93/60/lafauc11.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 309, '2014-07-28 22:04:31', NULL, NULL, 0),
(93, 'Club des Nains du Strie', 2, 40, 'Logo_Dwarf_05.png', 'http://lbbf.forumactif.com/t7186-momienova-cns', 1071683, 1, 1, 3, 3, 640000, 4, 6, 'http://i47.servimg.com/u/f47/11/77/93/60/cns11.jpg', 'Momienova', 'Le Stridium', 'Noire', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(94, 'Les Chiens de la Famille', 12, 6, 'Logo_Norse_14.png', 'http://lbbf.forumactif.com/t7205-ashrame-les-chien-de-la-famille', 1077991, 1, 1, 0, 0, 10000, 2, 2, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(95, 'GreenPiss [BBBL]', 11, 14, 'Logo_Halfling_GreenPiss.png', 'http://lbbf.forumactif.com/t7288-miaousse666-greenpiss#98724', 1081241, 1, 1, 0, 0, 120000, 4, 0, 'http://i49.servimg.com/u/f49/13/09/09/22/bloodb64.jpg', 'Ni Dieu Ni Daître !!', 'SdF', 'Noir', 'Aucun', 100, NULL, NULL, NULL, 0),
(96, 'Les Ensorceleurs', 14, 19, 'chapea10.png', 'http://lbbf.forumactif.com/t7151-relaxmax-les-ensorceleurs-elfes-pros', 1069594, 1, 1, 0, 0, 140000, 4, 9, 'http://i48.servimg.com/u/f48/14/58/68/82/site10.jpg', 'Jade l''Illusionniste', 'Sur la grand place', 'Bleu turquoise', 'La Compagnie du Lait', 100, NULL, NULL, NULL, 0),
(97, 'Les chevaliers ronds', 19, 41, 'Logo_chevaliersrondssite.png', 'http://lbbf.forumactif.com/t7182-nikolay-les-chevaliers-ronds', 1082360, 1, 1, 1, 1, 70000, 4, 6, 'http://i47.servimg.com/u/f47/16/47/96/53/lcr-8010.jpg', 'Arthur bientôt roi', 'Camelot', 'Bleu', 'Khorne Flakes', 100, NULL, 'La quête d''Arthur, serviteur chez des Ogres, qui cherche à devenir un roi ...', 'A table !', 0),
(98, 'Strikers Of Doom', 8, 23, 'Logo_StrikersofDoom_Player.png', 'http://lbbf.forumactif.com/t7277-gros-strikers-of-doom', 1079657, 1, 1, 1, 1, 250000, 3, 3, 'http://i44.servimg.com/u/f44/14/24/30/48/bloodb25.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(99, 'Artificial Infectious', 18, 36, 'Logo_Nurgle_07.png', 'http://lbbf.forumactif.com/t7234-docteurz-artificial-infectious', 1082140, 1, 0, 0, 0, 485000, 4, 8, NULL, 'Doktor', 'Inconnu', 'Rouge', 'Bill Portes', 100, NULL, NULL, NULL, 0),
(100, 'la Bande à Tic', 6, 15, 'Tac.png', 'http://lbbf.forumactif.com/t7063-shadows-la-bande-a-tic', 1064734, 1, 1, 4, 3, 240000, 4, 5, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 2, '2013-06-05 23:14:10', NULL, NULL, 0),
(101, 'Les Zanzibaris', 14, 10, 'elf_leszanzibaris2.png', 'http://lbbf.forumactif.com/t7319-bachibouzouc-les-zanzibaris', 1084248, 1, 1, 0, 0, 340000, 2, 9, 'http://i48.servimg.com/u/f48/15/68/33/21/zan210.jpg', 'Bachi', 'Planete Zanzibar', 'rose tapette', 'a pa', 516, '2013-12-06 15:02:13', NULL, NULL, 0),
(102, 'Boo Yaa Tribe', 6, 18, 'Logo_Goblin_BYT.dds', 'http://lbbf.forumactif.com/t7345-le-lapin-troll-boo-yaa-tribe#99374', 1085541, 1, 1, 0, 0, 370000, 4, 4, 'http://chimaylechat.free.fr/BBBL/S9/BYT_Site.png', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(103, 'Les Nee Bars Trotters', 1, 24, 'Sans titre.PNG', 'http://lbbf.forumactif.com/t7383-arrgggh-les-nee-bars-trotters', 1088479, 1, 1, 0, 0, 10000, 3, 1, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(104, 'Picard Syndicate', 12, 48, 'CF903-K_lg.jpg', 'http://lbbf.forumactif.com/t7552-kaess-picard-syndicate', NULL, 1, 0, 0, 0, 0, 0, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(105, 'Vanyars Pocket', 15, 43, 'vanyar10.png', 'http://lbbf.forumactif.com/t8047-cinod-vanyars-pocket', 1128761, 1, 1, 0, 0, 140000, 3, 5, 'http://i42.servimg.com/u/f42/14/82/58/52/bloodb65.jpg', 'CiNoD', 'Ulthuan', 'Vert', 'Non renseigné', 100, NULL, 'http://lbbf.forumactif.com/t8047-cinod-vanyars-pocket', 'Ultra absorbant !', 0),
(106, 'Taupe Chef', 11, 22, '64.png', 'http://lbbf.forumactif.com/t8072-taupe-chef', 1129656, 1, 1, 1, 1, 250000, 4, 2, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(107, 'Nains Venteurs', 2, 2, 'Logo_Dwarf_01_Nains_site.dds', 'http://lbbf.forumactif.com/t8099-obsidian-les-nains-venteurs', 1133525, 1, 1, 0, 0, 160000, 3, 5, 'http://i46.servimg.com/u/f46/11/16/96/11/photo10.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(108, 'Les Nains Postiers', 11, 25, 'Logo half.png', 'http://lbbf.forumactif.com/t8151-kurlom-les-nains-postiers', 1136504, 1, 1, 1, 0, 200000, 4, 5, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(109, 'Ganja Mother', 7, 3, 'ganja 64.png', 'http://lbbf.forumactif.com/t8354-poulp-ganja-mother', 1148205, 1, 1, 0, 1, 40000, 3, 6, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(110, 'Jus de Paume II', 7, 13, 'logoJP2.png', 'http://lbbf.forumactif.com/t8653-elender-jus-de-paume-ii', 1166692, 1, 1, 0, 1, 130000, 5, 7, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 633, '2014-09-03 18:22:37', NULL, NULL, 0),
(111, 'Loren High Wildcats', 7, 38, 'Logo_Loren - Copie.dds', 'http://lbbf.forumactif.com/t8656-cordell-loren-high-wildcats', 1166836, 1, 1, 0, 1, 90000, 3, 5, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(112, 'Lords Of Tragedy', 14, 23, 'images[98].jpg', 'http://lbbf.forumactif.com/t8637-gros-lords-of-tragedy', 1170537, 1, 1, 0, 0, 600000, 3, 6, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 79, '2013-06-05 20:58:01', NULL, NULL, 0),
(113, 'Bone Babes', 10, 35, 'Logo_Undead_BoneBabes.png', 'http://lbbf.forumactif.com/t8845-feuille2chene-bone-babes#120664', 1181655, 1, 0, 0, 1, 180000, 4, 10, 'http://i45.servimg.com/u/f45/11/15/27/76/clipbo39.jpg', 'F2C', 'Sous-sols de BBCity', 'Blanc/Noir', 'Non renseigné', 100, NULL, 'créations de F2C, à base de vrais morceaux de Girlz.', 'On est revenues et on n''est pas contentes!', 0),
(114, 'Les Shadoks', 6, 32, 'Logo_Goblin_Shadoks.png', 'http://lbbf.forumactif.com/t8858-zek-les-shadoks#120814', 1182358, 1, 1, 0, 0, 30000, 3, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(115, 'Death Skulls Raiders', 4, 5, 'Logo_Ork_Deathskullsraiders.png', 'http://lbbf.forumactif.com/t9161-thalar-death-skulls-raiders#124993', 1206493, 1, 0, 0, 0, 30000, 3, 1, 'http://imageshack.us/a/img546/5153/ekipdeath.png', 'Administrateur Thalar', 'Sous sol de l''Administratorum', 'Bleu', 'ADC  (Argent Détournée des Caisses)', 100, NULL, 'La plus légendaire défaite de l''Administrateur et coach Thalar face aux horribles bêtes aux longues oreilles et à la corpulence de tapette lors d''une finale de Superbowl devint un mythe, murmure d''une honte sans nom. Thalar coacha alors plusieurs équipes qui malgré leurs potentiels n''arrivèrent jamais à remporter une coupe sous les rires des coachs adverses. \r\nMais ils furent tous dupés ! En secret, dans les pronfondeurs des sous-sols de l''Administratorum, Thalar reforma sa maître-équipe. Une équipe pour les dominer tous. Une équipe pour les défier. Une équipe pour les bourriner et sur les terrains les tuer.\r\nC''est l''heure de ressortir les peintures bleus et les masques de mort. C''est l''heure des crânes défoncés et de la toute puissante waaagh. C''est l''heure du retour des mythiques Death Skulls Raiders.[/', 'A mor lé long'' n''oreilles !!!', 0),
(116, 'La Cave à Neuneuh', 3, 31, 'dollar1011111.png', 'http://lbbf.forumactif.com/t9173-la-cave-a-neuneuh#125204', 1207109, 1, 1, 1, 1, 100000, 4, 8, 'http://i31.servimg.com/u/f31/13/31/43/97/sans_t11.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 407, '2014-02-25 18:53:16', NULL, NULL, 0),
(117, 'Descendants d''Itarillië', 7, 2, 'Logo_WoodElf_04_site.png', 'http://lbbf.forumactif.com/t9228-obsidian-descendants-d-itarillie', 1210824, 1, 1, 1, 1, 230000, 3, 10, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 946, '2014-02-22 21:24:48', NULL, NULL, 0),
(118, 'I Urulocë Morë', 15, 49, 'logo64x64.png', 'http://lbbf.forumactif.com/t9330-gallka-i-uruloce-more#127902', 1244113, 1, 1, 0, 0, 30000, 2, 0, 'http://i47.servimg.com/u/f47/17/87/56/02/equipe14.jpg', 'L''armée de Tiriostlocë', 'Tiriostlocë', 'Noir', 'Les Art Murié', 100, NULL, 'Il fût un temps où les Hauts-Elfes, grâce à leur maîtrise de la navigation, possédaient et possèdent toujours de nombreux comptoirs et cité à travers le monde.\r\n\r\nIl est de ce monde un endroit se trouvant au Nord de la Bretonnie, une terre sauvage et inhospitalière, Nommé Nosca. Cette Région froide et montagneuse était avant tout une contrée où les nains prospéraient.\r\n\r\nConnaissant tous cette inimitié entre ces deux peuples une guerre sans pitié fût déclarée. Celle-ci dura de nombreuses années, durant lesquelles moult batailles jonchées de victoire et de défaite furent le dur quotidien de ces Nobles Chevaliers Hauts-Elfes. Las de cette guerres incessantes, les hautes instances Haut-Elfe décidèrent de quitter les lieux et de laisser la place aux nains.\r\n\r\nMais cela fut sans compter sur le fait que quelques Haut-Elfes, par fierté, s''unirent afin de passer outre cette décision et décidèrent de trouver un lieu en cette régions ou les Nains ne les trouveraient pas.\r\n\r\nIls finirent donc par s''installer sur une montagne maudite (par les dires des Nains), ou il construisirent la cité de Tiriostlocë.\r\n\r\nAprès quelques années les hautes instances décidèrent d''envoyer certains de leurs meilleurs combattants sur les terrains de BloodBowl afin de prouver, à la face du monde, la force que possède les Hauts-Elfes.', 'Ve turunth Urulocë, Ve turutha le !', 0),
(119, 'Les maraudeurs d''Ashut', 21, 11, 'taureau.png', 'http://lbbf.forumactif.com/t9401-les-maraudeurs-d-ashut', 1251829, 1, 1, 0, 0, 510000, 3, 6, 'http://i48.servimg.com/u/f48/13/78/23/16/blood163.jpg', 'Non renseigné', 'Les sombres terres', 'vert ', 'Non renseigné', 211, '2013-03-18 23:14:40', 'Dans les contrées lointaine très lointaine des terres sombre sévit le peuple d''Ashut,les nains du chaos ce peuple doit sa prospérité a ses esclaves et chaque année ils partent de plus en plus loin pour trouver de nouveaux volontaires,si loin qu''un jour ils tombèrent sur le peuple des norsk qui pratiquer un sport étrange,le bloodbowl,des esclaves gobs et orcs avaient déjà tenté de leurs parler de ce sport que la terre entière pratiquer mais ceux ci avaient toujours penser que ce n''était qu''une tentative pour grappiller quelques minutes de repos non mérité.\r\n\r\nDonc les esclaves disaient vrai et quand les nains virent a quel point ce sport était glorifié par les peuplades du vieux monde et surtout à quel point il était lucratif,l’appel de l''or se fit plus fort que tout,les plus puissant sorciers se réunirent et la décision fut prise d''envoyer une équipe,cette équipe devait représenter de son mieux le peuple nains du chaos et surtout son dieu tutélaire,Ashut.', 'Pour Ashut', 0),
(120, 'La Croisade Noire', 21, 23, 'crane.jpg', 'http://lbbf.forumactif.com/t9454-la-croisade-noire', 1250668, 1, 1, 0, 0, 50000, 3, 2, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(121, 'New Ogreland Patriots', 19, 42, 'Logo_Ogre_13.png', 'http://lbbf.forumactif.com/t9414-alikaa-new-ogreland-patriots', 1240828, 1, 1, 0, 0, 280000, 4, 9, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 72, '2013-03-20 21:39:35', NULL, NULL, 0),
(122, 'Casse_Noisette', 14, 22, 'Logo_Elf_cassenoisette.dds', 'http://lbbf.forumactif.com/t9476-casse-noisette#129929', 1256545, 1, 1, 0, 0, 310000, 3, 5, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 222, '2013-06-05 23:14:10', NULL, NULL, 0),
(123, 'Les Black Hawks', 15, 49, 'Logo_HighElf_BH.png', 'http://lbbf.forumactif.com/t9497-gallka-les-black-hawks', 1264184, 1, 1, 2, 3, 120000, 3, 7, 'http://i47.servimg.com/u/f47/17/87/56/02/equipe18.jpg', 'Gallka', 'Chicca''Go', 'Rouge', 'Hot Key', 548, '2014-05-13 11:05:17', '  ', 'Nos serres dans votre gorge !!!', 0),
(124, 'La Pierre du Belier', 23, 35, 'Logo_Khorne_F2C.png', 'http://lbbf.forumactif.com/t9566-feuille2chene-la-pierre-du-belier#131338', 1263958, 1, 1, 0, 1, 490000, 3, 7, 'http://i72.servimg.com/u/f72/11/15/27/76/bloodb12.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 651, '2014-02-22 21:24:48', NULL, NULL, 0),
(125, 'Déchus de Karak Vlag', 21, 13, 'logoDKV.png', 'http://lbbf.forumactif.com/t9573-elender-les-dechus-de-karak-vlag#131537', 1249509, 1, 1, 1, 3, 620000, 4, 6, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 278, '2014-03-03 20:32:09', NULL, NULL, 0),
(126, 'Les Ch''ti Hommes Libres', 22, 6, 'Logo_Underworld_Ashrame.png', 'http://lbbf.forumactif.com/t9400-ashrame-les-ch-tis-hommes-libres', 1247266, 1, 1, 0, 0, 100000, 3, 3, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 127, '2013-09-09 21:05:53', NULL, NULL, 0),
(127, 'Locksley Shadows Digger', 22, 18, 'Logo_Underworld_LSD.png', 'http://lbbf.forumactif.com/t9572-le-lapin-troll-locksley-shadows-digger', 1272102, 1, 1, 0, 0, 270000, 3, 2, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 68, '2013-03-20 22:54:29', NULL, NULL, 0),
(128, 'Les Gardiens D''Elenalcar', 9, 12, 'Logo_DarkElf_02_Player.png', 'http://lbbf.forumactif.com/t9589-elenalcar-les-gardiens-d-elenalcar', 1285036, 1, 1, 0, 0, 60000, 3, 6, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 266, '2013-08-27 13:50:06', NULL, NULL, 0),
(129, 'Khorne Muses', 23, 19, 'cornem10.png', 'http://lbbf.forumactif.com/t9523-relax-max-khorne-muses', 1273999, 1, 1, 0, 0, 770000, 3, 8, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 530, '2013-11-25 21:49:47', NULL, NULL, 0),
(130, 'L.P.Z.D.L.P.', 21, 8, 'lpzdlplogosite.png', 'http://lbbf.forumactif.com/t9251-zongo-lpzdlp', 1260265, 1, 1, 0, 0, 865000, 4, 8, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 725, '2014-09-14 14:22:36', NULL, NULL, 0),
(131, 'Les Voyageurs du Reve', 7, 40, 'Logo_WoodElf_LesVoyageursduReve.png', 'http://lbbf.forumactif.com/t9561-momienova-les-voyageurs-du-reve', 1273003, 1, 1, 0, 0, 110000, 3, 6, 'http://i76.servimg.com/u/f76/11/77/93/60/vdr11.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 364, '2013-11-18 21:13:05', NULL, NULL, 0),
(132, 'Olympique de Norseye', 12, 30, 'Logo_Norse_OlympiquedeNorseye_Player.png', 'http://lbbf.forumactif.com/t9558-clement0-l-olympique-de-norseye', 1272606, 1, 1, 1, 1, 60003, 3, 4, 'http://i74.servimg.com/u/f74/14/31/31/01/on-sit10.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 132, '2013-03-18 21:14:56', NULL, NULL, 0),
(133, '42eme Platoon', 2, 25, 'soldat10.png', 'http://lbbf.forumactif.com/t9508-kurlom-la-42eme-platoon', 1262560, 1, 1, 0, 0, 310000, 4, 9, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 450, '2013-09-05 14:00:35', NULL, NULL, 0),
(134, 'Dwarves Of Chaos', 21, 36, 'Dwarves Of Chaos.png', 'http://lbbf.forumactif.com/t9094-docteurz-dwarves-of-chaos', 1261443, 1, 1, 0, 0, 20000, 3, 3, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(135, 'Pohm Pohm Boyz', 21, 20, 'nains.png', 'http://lbbf.forumactif.com/t9581-voodoo-pohm-pohm-boyz', 1281830, 1, 1, 0, 0, 70000, 3, 4, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 105, '2013-03-20 21:03:24', NULL, NULL, 0),
(136, 'Les Eperviers Maudits', 9, 50, 'logo equipe Xav 2.png', 'http://lbbf.forumactif.com/t9622-ergan-les-eperviers-maudits', 1294220, 1, 1, 0, 0, 40000, 3, 3, 'http://i82.servimg.com/u/f82/18/06/51/10/bloodb10.jpg', 'Ergan Vériopère', 'Non renseigné', 'rouge sang', 'Non renseigné', 117, '2013-08-01 23:47:53', 'http://lbbf.forumactif.com/t9622-ergan-les-eperviers-maudits', 'Tant que les vents souffleront, Au bout nous irons!', 0),
(137, '''Death Squad''', 10, 11, 'Death Squad 64.gif', 'http://lbbf.forumactif.com/t10026-kien-death-squad#137468', 1423556, 1, 0, 0, 0, 190000, 3, 5, 'http://i73.servimg.com/u/f73/13/78/23/16/death_10.jpg', 'La Mort', 'l''au dela', 'blanc', 'Non renseigné', 149, '2013-06-05 21:05:45', 'Death is coming', 'Meurt', 0),
(138, 'Les Clowns de la BBBL', 8, 6, 'logo_clown.png', 'http://lbbf.forumactif.com/t10030-ashrame-les-clowns-de-la-bbbl#137568', 1414048, 1, 1, 0, 0, 175011, 4, 11, 'http://i69.servimg.com/u/f69/13/22/38/17/clowns10.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 961, '2014-08-25 22:02:40', NULL, NULL, 0),
(139, 'Les Dieux de l''Arène', 8, 20, 'Logo_Chaos_Les Dieux de l''Arène.png', 'http://lbbf.forumactif.com/t10003-les-dieux-de-l-arene', 1412298, 1, 1, 0, 0, 30000, 3, 6, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 305, '2013-09-05 14:00:35', NULL, NULL, 0),
(140, 'Onward Red Klutz', 4, 28, 'Logo_Ork.png', 'http://lbbf.forumactif.com/t10032-aigor-onward-red-klutz#137599', 1427369, 1, 1, 0, 0, 440000, 3, 8, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 73, '2013-11-18 23:04:52', NULL, NULL, 0),
(141, 'Les Chairs Li D''heure', 19, 29, 'Logo_Ogre_14 chairs2.png', 'http://lbbf.forumactif.com/t10031-lilyth-les-chairs-li-d-heure', 1425106, 1, 1, 6, 6, 20000, 5, 2, 'http://i72.servimg.com/u/f72/16/94/34/93/photo_10.jpg', 'Lilyth Demona', 'le banc de touche', 'rouge', 'néant', 78, '2014-02-23 09:57:59', '...', 'B ! B ! B ! L !', 0),
(142, '300 Dwitch', 11, 1, '300Dwitch.png', 'http://lbbf.forumactif.com/t9989-maremick-300-dwitch', 1408716, 1, 1, 1, 1, 240005, 4, 5, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 130, '2013-05-27 21:22:15', NULL, NULL, 0),
(143, 'La Clinik'' de Krit&Krat', 22, 42, 'Logo_Neutre_10.png', 'http://lbbf.forumactif.com/t10007-alikaa-la-clinik-de-kritkrat', 1427007, 1, 1, 0, 1, 1040008, 4, 7, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 229, '2014-09-03 21:46:56', NULL, NULL, 0),
(144, 'Pink Spider Party', 9, 51, 'PinkSpider.png', 'http://lbbf.forumactif.com/t10024-zombie-vald-pink-spider-party', 1422199, 1, 1, 0, 1, 70000, 3, 8, 'http://www.servimg.com/u/f73/18/20/34/49/bloodb10.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 83, '2014-03-04 21:07:23', NULL, NULL, 0),
(145, 'Emergency Grooms', 14, 18, 'Logo_Neutre_10.png', 'http://lbbf.forumactif.com/t10044-le-lapin-troll-emergency-grooms', 1379181, 1, 1, 0, 0, 50000, 4, 4, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 124, '2013-06-05 21:05:45', NULL, NULL, 0),
(146, 'LEs Princes Mor-Saigneurs', 20, 16, 'Logo_Vampire_01.png', 'http://lbbf.forumactif.com/t10048-cuivenen-les-princes-mor-saigneurs', 1427286, 1, 1, 0, 0, 250003, 5, 7, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 358, '2014-02-26 21:35:09', NULL, NULL, 0),
(147, '911-Annus Fatalis', 12, 22, 'Logo_Norse_911_Site.png', 'http://lbbf.forumactif.com/t10335-zoid-911-annus-fatalis#141798', 1481314, 1, 1, 0, 0, 80000, 2, 3, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 104, '2014-06-10 21:37:01', NULL, NULL, 0),
(148, 'Les Pourfendeur Noir', 2, 52, 'Logo_Dwarf_13_Les_Pourfendeur_Noir_64x64.png', 'http://lbbf.forumactif.com/t10344-ducky27-les-pourfendeur-noir', 1474154, 1, 1, 1, 7, 390000, 4, 8, NULL, 'Non renseigné', 'La montagne noir', 'Noir', 'Smirnoff', 526, '2014-09-14 14:22:36', '...', 'N''ai crainte de pourfendre le crane de ton adversaire', 0),
(149, 'Nuff Sound', 3, 35, 'Logo_Skaven_Nuff Sound.png', 'http://lbbf.forumactif.com/t10381-feuille2chene-nuff-sound#142532', 1486514, 1, 1, 0, 0, 10003, 3, 4, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 144, '2013-09-11 21:17:13', NULL, NULL, 0),
(150, 'Shadows Of Pain', 8, 23, 'images.jpg', 'http://lbbf.forumactif.com/t10402-gros-shadows-of-pain#143050', 1494465, 1, 1, 0, 0, 220006, 3, 6, 'http://i80.servimg.com/u/f80/14/24/30/48/bloodb10.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 141, '2013-11-28 21:35:40', NULL, NULL, 0),
(151, 'Smells LactIne''s Pyrite', 18, 22, 'Logo_Nurgle_SLIP_Player.png', 'http://lbbf.forumactif.com/t10400-zoid-smells-lactine-s-pyrite#143061', 1494169, 1, 0, 0, 0, 900003, 3, 10, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 672, '2014-08-31 17:08:17', NULL, NULL, 0),
(152, 'Les Nazetèques', 5, 25, 'Sans titre.png', 'http://lbbf.forumactif.com/t10407-kurlom-les-nazteques', 1488628, 1, 1, 0, 0, 360010, 4, 11, 'http://i78.servimg.com/u/f78/15/13/64/34/bloodb16.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 652, '2014-02-25 18:53:16', NULL, NULL, 0),
(153, 'Lé KraBouYerZ'' RedZ'' TrI', 6, 42, 'Logo_Goblin_04.dds', 'http://lbbf.forumactif.com/t10317p15-alikaa-le-krabouillerz-redz-tri#143083', 1481623, 1, 1, 0, 0, 240000, 4, 4, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 141, '2013-09-04 10:15:05', NULL, NULL, 0),
(154, 'KHÂRNAGE', 8, 27, 'Khârnage.png', 'http://lbbf.forumactif.com/t10404-relaps-kharnage', 1494655, 1, 0, 0, 0, 120000, 3, 7, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 112, '2013-11-30 14:34:09', NULL, NULL, 0),
(155, 'Straight Elves Society', 9, 30, 'Logo_DarkElves_SES_Player.png', 'clement0straight', 1496252, 1, 1, 1, 1, 190010, 3, 10, 'http://i56.servimg.com/u/f56/14/31/31/01/bloodb25.jpg', 'Nanard', 'Non renseigné', 'Noir et Turquoise', 'Non renseigné', 720, '2014-09-03 20:38:37', '-', 'We Are Better Than You', 0),
(156, 'Middenheim Spies', 3, 53, 'MS.png', 'http://lbbf.forumactif.com/t10420-mimisantzen-middenheim-spies', 1482319, 1, 1, 0, 2, 120000, 2, 2, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 89, '2013-09-10 07:09:49', NULL, NULL, 0),
(157, 'Le ARGG Sauvage', 4, 37, 'Crane 1.png', 'http://lbbf.forumactif.com/t10572-oligunar-le-argg-sauvage', 1519309, 1, 1, 0, 0, 870000, 3, 9, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 547, '2014-09-01 22:05:48', NULL, NULL, 0),
(158, 'Les Village People', 2, 55, 'LogositeVip.png', 'http://lbbf.forumactif.com/t10585-kurva-piroska-les-village-people#145775', 1519538, 1, 1, 0, 1, 440000, 4, 8, 'http://i57.servimg.com/u/f57/18/40/25/50/800x3410.jpg', 'Fond des Magouilles Internationales', 'Sang Franc Cisko', 'Rouge et or', 'Le Vice & Co', 294, '2014-02-24 15:02:51', 'Ils sont petits et joyeux ce sont les Village People.', 'Y.M.C.A', 0),
(159, 'Virus Project', 20, 11, 'vampire 64.png', 'http://lbbf.forumactif.com/t10362-kien-les-virus-project', 1484954, 1, 1, 0, 0, 0, 4, 1, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 113, '2013-09-11 21:17:13', NULL, NULL, 0),
(160, 'For Ever Green', 4, 54, 'BB.png', 'http://lbbf.forumactif.com/t10615-stryke-for-ever-green', 1503202, 1, 1, 0, 0, 0, 3, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 92, '2013-09-10 07:08:55', NULL, NULL, 0),
(161, 'Surtur''s Fists', 12, 18, 'Logo_Norse_SF_Site.png', 'http://lbbf.forumactif.com/t10822-surtur-s-fists#149010', 1569604, 1, 1, 0, 0, 210000, 3, 6, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 244, '2014-08-27 21:43:38', NULL, NULL, 0),
(162, 'Altdorf Comets', 1, 21, 'comets.png', 'http://lbbf.forumactif.com/t10818-bran-altdorf-comets', 1566564, 1, 1, 1, 2, 170000, 3, 6, 'http://i70.servimg.com/u/f70/16/12/74/19/sans_t11.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 192, '2014-03-03 20:32:09', NULL, NULL, 0),
(163, 'Immortal Lizard Beasts', 5, 56, 'lezard png.png', 'http://lbbf.forumactif.com/t10819-jeestdieu-immortal-lizard-beasts', 1567651, 1, 1, 1, 1, 380001, 3, 8, 'http://i58.servimg.com/u/f58/17/53/10/15/bloodb14.jpg', 'Jeestdieu', 'Heaven', 'Bleu Blanc Rouge', 'Ikickass', 617, '2014-07-07 21:46:40', 'Les Immortal Lizard Beasts, terreur divine des terrains de Blood Bowl. Craignez le courroux de Dieu.', 'Allez les bleus !', 0),
(164, 'Kebab', 8, 57, 'logo_Hersi.png', 'http://lbbf.forumactif.com/t10836-hersiphar-kebab', 1573518, 1, 1, 0, 0, 180000, 1, 3, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 113, '2013-12-05 21:39:52', NULL, NULL, 0),
(165, 'Walking Dead Peacemaker 2', 10, 58, 'Logo_Undead_site.png', 'http://lbbf.forumactif.com/t10842-baenre-walking-dead-peacemaker-2', 1573490, 1, 0, 0, 0, 430000, 3, 5, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 361, '2014-05-11 12:47:48', NULL, NULL, 0),
(166, 'Team Murica', 20, 25, 'logo site.png', 'http://lbbf.forumactif.com/t11076-kurlom-team-murica#152489', NULL, 1, 0, 0, 0, 0, 0, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(167, 'Wakkass Urglass', 14, 1, 'Logo_Elf_WakassUrglass.png', 'http://lbbf.forumactif.com/t7678-maremick-wakkass-urglass-en-construction', 1629591, 1, 1, 0, 0, 10000, 5, 5, 'http://i38.servimg.com/u/f38/15/20/71/39/bloodb10.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 117, '2015-03-01 14:23:39', NULL, NULL, 1),
(168, 'Boucher d''Altdorf', 1, 11, 'boucher64pn.png', 'http://lbbf.forumactif.com/t11167-kien-boucher-d-altdorf#top', NULL, 1, 0, 0, 0, 0, 0, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0);
INSERT INTO `team` (`idteam`, `name`, `idroster`, `idcoach`, `logo`, `url`, `idteamserver`, `prestige`, `apo`, `assistant`, `pompom`, `tresor`, `reroll`, `popularite`, `url_photo`, `proprio`, `domicile`, `couleurs`, `sponsors`, `gloire`, `date_modif_gloire`, `background`, `cri`, `actif`) VALUES
(169, 'Champions de Jigoku', 10, 40, 'momie610.png', 'http://lbbf.forumactif.com/t11174-momienova-champions-de-jigoku', NULL, 1, 0, 0, 0, 30000, 3, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(170, 'Les Indicibles Divinités', 18, 35, 'Logo_site_Grands Anciens.png', 'http://lbbf.forumactif.com/t11183-f2c-indicibles-divinites', NULL, 1, 0, 0, 0, 0, 0, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(171, 'Crypte Age', 17, 7, 'Logo.png', 'http://lbbf.forumactif.com/t11248-oscar-tilage-crypte-age', 1653290, 1, 0, 0, 0, 0, 3, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 104, '2014-01-07 19:54:43', NULL, NULL, 0),
(172, 'O.P.A.', 4, 31, 'Logo_Orc_141.png', 'http://lbbf.forumactif.com/t11342-marcus-miragos-opa#156345', 1662062, 1, 1, 0, 0, 60000, 2, 3, 'http://i56.servimg.com/u/f56/13/31/43/97/opa10.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 112, '2014-01-18 11:56:59', NULL, NULL, 0),
(173, 'Pom''Pom d''Api', 7, 29, 'pompomdapi.png', 'http://lbbf.forumactif.com/t11346-lilyth-les-pom-pom-d-api#156420', 1662812, 1, 1, 0, 0, 0, 2, 0, 'http://i56.servimg.com/u/f56/16/94/34/93/photoe10.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 96, '2014-01-18 11:56:59', NULL, NULL, 0),
(174, 'Death Enforcement Agency', 17, 56, 'logo.png', 'http://lbbf.forumactif.com/t11127-jeestdieu-death-enforcement-agency', NULL, 1, 0, 0, 0, 0, 0, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(175, 'Brown Rats', 3, 61, 'Rats.jpg', 'http://lbbf.forumactif.com/t11564-bioskop-brown-rats', 1699242, 1, 1, 0, 0, 10000, 2, 4, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 182, '2014-07-05 21:04:26', NULL, NULL, 0),
(176, 'Ah Push', 5, 52, 'Logo_Lizardman_02_Ah_Push_64x64.png', 'http://lbbf.forumactif.com/t11588-ah-push#159618', 1785844, 1, 1, 0, 0, 310000, 3, 8, 'http://i39.servimg.com/u/f39/17/52/11/49/bloodb22.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 422, '2015-03-09 21:00:02', NULL, NULL, 0),
(177, 'Les Ork''Zangelz', 4, 62, 'Logo_Orc_Ork''Zangelz.png', 'http://lbbf.forumactif.com/t11590-retour-vers-le-passe', 1704723, 1, 1, 3, 3, 210000, 4, 5, 'http://i57.servimg.com/u/f57/18/87/18/70/equipe12.jpg', 'Non renseigné', 'L''antre de la folie', 'Rouge', 'Project D', 254, '2014-08-28 17:56:26', 'L''équipe s''appelait autrefois les Red Suns. Ils croient qu''en peignant une partie de leur peau en rouge que ça améliorera leur vitesse. Ils vénèrent le Dieu Mork pour leur octroyer la vitesse divine. Au lieu de cela, Mork leur a envoyé un ange pour les guider qui deviendra leur nouveau coach. Ils se renommèrent les Ork''Zangelz en hommage au surnom de leur nouveau coach.', 'Waaaggghhh!', 0),
(178, 'Des elfes pleins d''avenir', 14, 66, 'kaier_tattoo.png', 'http://lbbf.forumactif.com/t11612-ecklir-des-elfes-pleins-d-avenir', 1710347, 1, 1, 0, 0, 120001, 3, 8, NULL, 'Coach Bart', 'Stade La clé des champs', 'Bleu et Blanc', 'Alain Elflelou', 405, '2014-08-28 17:56:26', 'Une jeune équipe venue tout droit des landes de l''Ouest', 'Marquer plus pour gagner plus!', 0),
(179, 'Black Death Eulogy', 3, 51, 'Logo_Skaven_06.png', 'http://lbbf.forumactif.com/t11198-zombie-vald-black-death-eulogy', 1647220, 1, 1, 0, 0, 130000, 3, 5, 'http://i56.servimg.com/u/f56/18/20/34/49/bloodb29.jpg', 'Non renseigné', 'Non renseigné', 'Gris sourie', 'Non renseigné', 98, '2014-08-11 15:12:57', '?', 'Heralds of the plague...', 0),
(180, 'les enfants de la bowl', 9, 65, 'logos dark elf.jpeg', 'http://lbbf.forumactif.com/t11619-les-enfants-de-la-bowl#160206', 1706441, 1, 1, 0, 0, 170000, 1, 3, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 518, '2014-05-22 09:17:57', NULL, NULL, 0),
(181, 'Les Touaregs', 15, 19, 'Logo_HighElf_04_Player.dds', 'http://lbbf.forumactif.com/t11140-relax-les-touaregs', 1631278, 1, 1, 0, 0, 200001, 3, 9, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 451, '2014-05-18 09:43:32', NULL, NULL, 0),
(182, 'Les Rats Fils Tauleurs', 3, 4, 'Sans titre 1.png', 'http://lbbf.forumactif.com/t11638-jahstrad-rats-fils-tauleurs', 535700, 1, 1, 0, 0, 770003, 3, 11, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 1083, '2014-09-03 18:22:37', NULL, NULL, 0),
(183, 'Fauteurs de trouble crew', 6, 60, 'Logo_Goblin_LesZonards_Player.dds', 'http://lbbf.forumactif.com/t11646-elsanto-s-fauteurs-de-trouble-crew#160436', 1710785, 1, 0, 0, 0, 30000, 4, 1, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 1, '2014-04-30 22:01:08', NULL, NULL, 0),
(184, 'Undead Is Not Dead', 10, 54, '544.png', 'http://lbbf.forumactif.com/t11251-strykeundead-is-not-dead', 1653317, 1, 0, 0, 0, 260000, 4, 8, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 315, '2014-05-06 22:43:15', NULL, NULL, 0),
(185, 'Les Chevaliers Phénix', 15, 23, 'phenix-57dda4.jpg', 'http://lbbf.forumactif.com/t11798-les-chevaliers-phenix#162334', 1728612, 1, 0, 0, 0, 10000, 2, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 99, '2014-05-19 21:03:19', NULL, NULL, 0),
(186, 'STORM SQUAD', 9, 27, 'Logo_Neutre_09_Player.png', 'http://lbbf.forumactif.com/t11760p45-la-coupe-dwywcapifyaap#162337', 1728001, 1, 0, 0, 0, 0, 0, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 98, '2014-05-21 21:34:15', NULL, NULL, 0),
(187, 'Etz haHa''yim', 21, 35, 'Logo_ChaosDwarf_15.png', 'http://lbbf.forumactif.com/t11799-etz-haha-yim#162338', 1257462, 1, 1, 0, 0, 10000, 2, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 102, '2014-05-24 14:58:15', NULL, NULL, 0),
(188, 'Pink Pirates Zombies', 17, 51, 'Logo_Necromantic_07.dds', 'http://lbbf.forumactif.com/t11800-pink-pirates-zombies#162342', 1728608, 1, 0, 0, 0, 40000, 2, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 99, '2014-05-19 21:30:49', NULL, NULL, 0),
(189, 'Reikland Rivers', 11, 8, 'tumblr_inline_n4hjo8zXJq1s4e5wg.png', 'http://lbbf.forumactif.com/t11803-zongo-reikland-rivers#162356', 1727898, 1, 0, 0, 0, 0, 0, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 101, '2014-05-16 14:51:06', NULL, NULL, 0),
(190, 'Le Bateau Ivre', 22, 40, 'Logo_Underworld_10.dds', 'http://lbbf.forumactif.com/t11804-momienova-le-bateau-ivre', 1728637, 1, 0, 0, 0, 0, 0, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, '2014-05-28 21:35:45', NULL, NULL, 0),
(191, 'Les Supers A-Rat', 3, 6, 'Logo_Neutre_09_Player.png', 'http://lbbf.forumactif.com/t11805-ashrame-les-supers-a-rat#162369', 1729638, 1, 0, 0, 0, 0, 0, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 102, '2014-06-10 21:37:01', NULL, NULL, 0),
(192, 'Les Lions du Panshir', 15, 66, 'SLD-Lion-Logo.png', 'http://lbbf.forumactif.com/t11808-ecklir-les-lions-du-panshir', 1726254, 1, 0, 0, 0, 10000, 2, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, '2014-05-22 18:06:55', NULL, NULL, 0),
(193, 'les obsédés du Bounty', 6, 65, 'th-ConvertImage2-ConvertImage.png', 'http://lbbf.forumactif.com/t11796-les-obsedes-du-bounty', 1728430, 1, 1, 0, 0, 0, 3, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 101, '2014-05-18 14:58:34', NULL, NULL, 0),
(194, 'Bull dozer', 21, 11, 'Logo_ChaosDwarf_04.dds', 'http://lbbf.forumactif.com/t11820-les-bull-dozer#162498', 1728536, 1, 1, 0, 0, 30000, 3, 1, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 102, '2014-05-26 21:35:07', NULL, NULL, 0),
(195, 'International Police', 14, 49, 'Logo_Elf_15.png', 'http://lbbf.forumactif.com/t11821-gallka-international-police#162519', 1729280, 1, 0, 0, 0, 0, 0, 0, 'http://i57.servimg.com/u/f57/17/87/56/02/sans_t38.jpg', 'Inter Poul', 'Evry-Ouere', 'Bleu', 'Mat''Rack', 99, '2014-05-21 22:09:11', '   ', 'Elémentaire mon Cher Watson', 0),
(196, 'Rapides et Furieux', 7, 20, 'Logo_Neutre_05_Player.png', 'http://lbbf.forumactif.com/t11829-voodoo-rapides-et-furieux-elfes-sylvains#162639', 1728393, 1, 1, 0, 0, 40000, 2, 2, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 101, '2014-06-04 21:16:18', NULL, NULL, 0),
(197, 'Cursed Black Cats - old', 15, 23, 'Cursed Black Cats.png', 'http://lbbf.forumactif.com/t11879-gros-cursed-black-cats', 1734236, 1, 0, 0, 0, 10000, 2, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 156, '2014-07-31 14:01:46', NULL, NULL, 0),
(198, 'Death No Mort', 10, 12, 'Death No Mort.png', 'http://lbbf.forumactif.com/t11160-elenalcar-death-no-mort', 1577687, 1, 0, 0, 0, 310000, 4, 7, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 247, '2014-08-27 21:43:38', NULL, NULL, 0),
(200, 'G.E.E.K.', 6, 25, 'G.E.E.K.png', 'http://lbbf.forumactif.com/t11888-geek#163637', 1735550, 1, 0, 0, 0, 0, 4, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 80, '2014-06-30 21:06:58', NULL, NULL, 0),
(201, 'les nougaroux', 17, 65, 'Les Nougaroux.png', 'http://lbbf.forumactif.com/t11889-les-nougaroux#163638', NULL, 1, 0, 0, 0, 0, 0, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(202, 'L''Administratoruhm', 19, 19, 'lapincorne.png', 'L''Administratoruhm', 1732036, 1, 0, 0, 0, 0, 0, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 167, '2014-06-20 14:09:52', NULL, NULL, 0),
(203, 'Les Ménades d''Azures', 13, 62, 'logo les ménades d''azures.png', 'http://lbbf.forumactif.com/t12070-gally-les-menades-d-azures', 1776163, 1, 1, 0, 0, 40000, 3, 6, 'http://i39.servimg.com/u/f39/18/87/18/70/equipe12.jpg', 'Les dieux', 'Valhalla', 'Violet et rouge sang pour les tatouages ', 'La bière qui rend fou !', 140, '2014-12-22 20:53:13', 'Des valkyries lassés de chercher des morts, elles préfèrent les envoyer dans l''au-delà elles-mêmes!', 'La mort est une délivrance, chérissez là !', 0),
(204, 'Devil', 8, 11, 'diables.png', 'http://lbbf.forumactif.com/t12093-kien-devil#166115', 1780350, 1, 1, 0, 0, 260000, 3, 9, 'http://i39.servimg.com/u/f39/13/78/23/16/devil10.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 473, '2015-02-26 21:25:18', NULL, NULL, 1),
(205, 'Them White Walkers', 10, 30, 'Logo_Undead_08_Player.png', 'http://lbbf.forumactif.com/t12099-coach-clement0-them-white-walkers#166223', 1781328, 1, 0, 0, 0, 370000, 3, 6, 'http://chimaylechat.free.fr/BBBL/S14/whitewalkers.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 582, '2014-12-18 20:33:59', NULL, NULL, 0),
(206, 'Sombréros de l''Amer', 9, 6, 'Logo_Neutre_22_Player.png', 'http://lbbf.forumactif.com/t12104-ashrame-sombreros-de-l-amer#166328', 1779582, 1, 1, 0, 0, 320000, 3, 11, 'http://i39.servimg.com/u/f39/13/22/38/17/equipe10.jpg', 'Ashrame', 'Nuln', 'Maron', 'Orca Cola', 938, '2015-03-11 21:36:44', 'Coming SOON', 'ALWAYS LOST IN CYANIDE', 1),
(207, 'Bondage Goat Zombie', 10, 22, 'Logo_Undead_08.png', 'http://lbbf.forumactif.com/t12103-zoid-bondage-goat-zombie', 1779835, 1, 0, 0, 0, 260000, 3, 8, 'http://chimaylechat.free.fr/BBBL/S14/goat.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 776, '2015-03-12 21:37:15', NULL, NULL, 1),
(208, 'Les Bulles Doseurs', 21, 37, 'Logo_ChaosDwarf_02.png', 'http://lbbf.forumactif.com/t12105-oligunar-les-bulles-doseurs#166238', 1754019, 1, 1, 0, 0, 110000, 3, 4, 'http://chimaylechat.free.fr/BBBL/S14/bulles.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 282, '2015-03-03 20:08:11', NULL, NULL, 1),
(209, 'Pestes et choléra', 18, 13, 'logo.png', 'http://lbbf.forumactif.com/t12153-elender-pestes-et-cholera', 1765793, 1, 0, 0, 1, 50000, 4, 8, 'http://chimaylechat.free.fr/BBBL/S14/pestes.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 218, '2015-02-25 20:32:53', NULL, NULL, 1),
(210, 'Fluide Glacial BBClub', 18, 19, 'logofluide.png', 'http://lbbf.forumactif.com/t12025-relax-max-fluide-glacial-bbclub', 1760812, 1, 0, 0, 0, 800000, 3, 8, 'http://i39.servimg.com/u/f39/14/58/68/82/teampi10.jpg', 'RelaxMax', 'Sur les étagères', 'Rouge', 'Fluide Glacial', 610, '2015-03-09 21:00:02', '[i]"12 ans, l''âge de tous les excès : la diarrhée est phénoménale et l''abus de prunes fatal. Lorsque le flux cesse un bref instant de couler, Liteul Relax voit un vieux magazine briller sur l''étagère : la Golden 1ère édition de Fluide Glacial 55 ans avant JC. Gnnnn magnifique, mirifique, fantastique, il s''absorbe dans le trésor faisant fi des traces de doigts gras, des trous de boulettes et de quelques tâches de café bien noir." [/i]\r\n\r\n\r\nCe souvenir resurgit soudain dans l''esprit tourmenté de coach Relax en pleine gastro aiguë : l''odeur familière des water closet ? La couleur verdâtre de la gerbe matinale ? Ou encore le poster roman photo de Léandri qui trône fièrement au-dessus de la cuvette ?\r\n\r\n[url=http://www.servimg.com/image_preview.php?i=592&u=14586882][img]http://i39.servimg.com/u/f39/14/58/68/82/laandr10.jpg[/img][/url]\r\n\r\n"Qu''est-ce que c''est beau !!!". Transcendé il en invoqua aux puissances obscures du chaos et attira à lui les avatars maudits et purulents de ses héros de jeunesse.\r\n', 'Tape t''en une bonne !!', 1),
(211, 'Spaten Pro Infam Teschek', 17, 18, 'Logo_Necromantic_SPIT_Player.png', 'http://lbbf.forumactif.com/t12140-le-lapin-troll-spaten-pro-infam-teschek', 1777162, 1, 0, 0, 0, 390000, 4, 5, 'http://chimaylechat.free.fr/BBBL/S14/SPIT_Photo_Site.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 482, '2015-03-09 21:39:36', NULL, NULL, 1),
(212, 'New-Orc Highlanders', 4, 12, 'Logo_Orc_05.png', 'http://lbbf.forumactif.com/t12169-elenalcar-new-orc-highlanders', 1241208, 1, 1, 0, 0, 200000, 3, 7, 'http://chimaylechat.free.fr/BBBL/S14/neworc.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 442, '2015-03-12 20:28:23', NULL, NULL, 1),
(213, 'LEs Banyards', 4, 16, '60x60-AvatarRed.png', 'http://lbbf.forumactif.com/t12167-les-vanyars-si-si', 1785961, 1, 1, 0, 0, 490000, 3, 5, 'http://www.revamericatours.com/wp-content/uploads/2012/04/usa-line-dance-etats-unis-800x340.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 259, '2015-03-12 20:28:23', NULL, NULL, 1),
(214, 'P.O.L.E. E.M.P.L.O.I.', 6, 31, 'Logo_Goblin_06.png', 'http://lbbf.forumactif.com/t12165-marcus-miragos-pole-emploi', 1776207, 1, 1, 0, 0, 10000, 3, 2, 'http://chimaylechat.free.fr/BBBL/S14/pole.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 97, '2014-10-10 18:53:48', NULL, NULL, 0),
(215, 'Sous Sol Nightmare', 22, 4, 'Logo_Underworld_06.png', 'http://lbbf.forumactif.com/t12168-jahstrad-sous-sol-nightmare', 1779210, 1, 1, 0, 0, 350000, 3, 4, 'http://chimaylechat.free.fr/BBBL/S14/soussol.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 1, '2015-03-06 18:01:07', NULL, NULL, 1),
(216, 'Blanche Neige & ses nains', 21, 60, 'Logo_ChaosDwarf_07.png', 'http://lbbf.forumactif.com/t12152-elsantooooos-blanche-neige-et-ses-ptis-nains#166468', 1776744, 1, 1, 2, 2, 570000, 2, 9, 'http://chimaylechat.free.fr/BBBL/S14/blanche.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 364, '2015-03-11 21:08:04', NULL, NULL, 1),
(217, 'Neuf Enfers', 10, 40, 'Logo_Undead_01.png', 'http://lbbf.forumactif.com/t12171-momienova-neuf-enfers', 1786669, 1, 0, 2, 2, 560000, 4, 7, 'http://chimaylechat.free.fr/BBBL/S14/neuf.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 625, '2015-03-11 21:36:44', NULL, NULL, 1),
(218, 'Skav 4 EVER', 3, 36, 'Logo_Roster_Skav 4 EVER.png', 'http://lbbf.forumactif.com/t12172-lui-l-immonde-4-ever#166720', 1785861, 1, 1, 0, 0, 600000, 3, 8, 'http://i39.servimg.com/u/f39/16/38/25/64/bloodb12.jpg', 'Une boite aux Bahamas', 'Dans mon repère secret', 'Perle', 'Karwalite corp', 788, '2015-03-12 21:37:15', 'ckoissa', 'Pas le temps.', 1),
(219, 'Les Miraculés', 17, 20, 'Logo_Neutre_10.png', 'http://lbbf.forumactif.com/t12157-voodoo-les-miracules', 1784565, 1, 0, 0, 0, 370000, 3, 9, 'http://chimaylechat.free.fr/BBBL/S14/miracules.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 959, '2015-03-10 11:07:33', NULL, NULL, 1),
(220, 'Les Rats Gnagna', 3, 43, 'Logo_Skaven_VanyarsPocket.dds', 'http://lbbf.forumactif.com/t12177-cinod-les-rats-gnagna', 1786969, 1, 1, 0, 0, 190000, 3, 6, 'http://chimaylechat.free.fr/BBBL/S14/rats.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 135, '2015-03-12 23:17:08', NULL, NULL, 1),
(221, 'Les Experts Holy Wood', 7, 7, 'Les Experts Holy Wood.png', 'http://lbbf.forumactif.com/t12183-oscar-tilage-les-experts-holy-wood', 1787308, 1, 1, 0, 0, 70000, 3, 8, 'http://i39.servimg.com/u/f39/14/35/56/20/les_ex12.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 420, '2015-03-12 23:17:08', NULL, NULL, 1),
(222, '16 de PIQUE', 11, 27, 'Logo_Halfling_20.PNG', 'http://lbbf.forumactif.com/t12109-relaps-16-de-pique', 1775978, 1, 1, 4, 4, 360000, 3, 2, 'http://chimaylechat.free.fr/BBBL/S14/16.jpg', 'Non renseigné', 'PIQUE', 'Noir et Vert', 'EVIL PIKES Inc', 89, '2014-12-15 19:37:49', 'Curiosité du Mootland, PIQUE n''a rien à envier aux cités chaotiques.', 'Faut pas tomber', 0),
(223, 'Orcs on the Rocs', 4, 68, 'Logo_Orc_06_Player.png', 'http://lbbf.forumactif.com/t12181-unelegantslayer-orcs-on-the-rocs#166862', 1787188, 1, 1, 1, 2, 810000, 4, 8, 'http://i39.servimg.com/u/f39/13/22/38/17/equipe11.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 601, '2015-03-11 21:08:04', NULL, NULL, 1),
(224, 'Kill Korne Killer', 23, 26, '118966_zero-drk_zerodrk-khorne-berserk.jpg', 'http://lbbf.forumactif.com/t12155-yaouch-kill-korne-killer', 1784046, 1, 0, 0, 0, 10000, 2, 2, 'http://chimaylechat.free.fr/BBBL/S14/kill.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 101, '2014-10-15 21:14:38', NULL, NULL, 0),
(225, 'Fat Bottomed Elves', 14, 8, 'Logo_Elf_17_Player.png', 'http://lbbf.forumactif.com/t12189-zongogo-fat-bottomed-elves', 1788468, 1, 1, 0, 0, 30000, 3, 3, 'http://i39.servimg.com/u/f39/15/85/38/41/fbe_of11.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 103, '2014-10-15 21:31:07', NULL, NULL, 0),
(226, 'Ama God', 13, 42, 'Logo_Amazon_08.png', 'http://lbbf.forumactif.com/t12179-alikaa-ama-god', 1787105, 1, 1, 0, 0, 160000, 3, 6, 'http://chimaylechat.free.fr/BBBL/S14/ama.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 245, '2014-12-17 23:46:23', NULL, NULL, 0),
(227, 'Les Déplumeurs', 5, 10, 'Logo_Neutre_04.png', 'http://lbbf.forumactif.com/t12135-bachibouzouc-les-deplumeurs#167017', 1783010, 1, 1, 0, 0, 250000, 3, 8, 'http://i39.servimg.com/u/f39/15/68/33/21/116b10.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 730, '2015-03-10 11:07:33', NULL, NULL, 1),
(228, 'Purple Hearts', 15, 23, 'purple_logo.png', 'http://lbbf.forumactif.com/t12187-gros-purple-hearts', 1788348, 1, 1, 0, 0, 0, 2, 2, 'http://i39.servimg.com/u/f39/14/24/30/48/bloodb21.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 99, '2014-10-18 22:26:52', NULL, NULL, 0),
(229, 'Westside Vikings', 12, 58, 'Logo_Neutre_16.png', 'http://lbbf.forumactif.com/t12193-kristoflax-westside-vikings', 1788487, 1, 0, 0, 0, 10000, 5, 4, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 7, '2014-12-17 21:08:13', NULL, NULL, 1),
(230, 'Meurage', 4, 53, 'Logo_Neutre_10_Meurage.png', 'http://lbbf.forumactif.com/t12192-immisantzen-meurage', 1788860, 1, 1, 0, 0, 80000, 3, 2, 'http://i39.servimg.com/u/f39/18/29/26/88/meurag10.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 105, '2014-12-21 11:13:26', NULL, NULL, 0),
(231, 'Opération Mains Propres', 14, 8, 'lapincorne.png', 'http://lbbf.forumactif.com', 1790650, 1, 1, 0, 0, 130000, 3, 4, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 105, '2014-10-18 22:35:51', NULL, NULL, 0),
(232, 'Mercenaires de Daligar', 1, 70, 'Logo_Neutre_18.png', 'http://lbbf.forumactif.com/t12355-rankstail-mercenaires-de-daligar', 1809114, 1, 1, 0, 0, 510000, 3, 10, 'http://chimaylechat.free.fr/BBBL/Site/Daligar_Photo.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 545, '2015-03-09 21:39:36', NULL, NULL, 1),
(233, 'Petits Sagouins Graisseux', 2, 69, '1 - Copie.png', 'http://lbbf.forumactif.com/t12364-zecid-petits-sagouins-graisseux', 1795823, 1, 1, 0, 0, 370000, 4, 9, 'http://chimaylechat.free.fr/BBBL/Site/PSG_Photo_Site.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 167, '2015-02-25 20:34:38', NULL, NULL, 1),
(234, 'Pigalle Buccaneers', 12, 71, 'buccaneers.png', 'http://lbbf.forumactif.com/t12361-monsieurvegas-pigalle-buccaneers', 1809831, 1, 1, 5, 4, 180000, 3, 7, 'http://i39.servimg.com/u/f39/14/53/06/50/unname11.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 270, '2015-02-27 22:26:56', NULL, NULL, 1),
(235, 'Propritude', 19, 18, 'lapincorne.png', 'http://bbbl.fr', NULL, 1, 0, 0, 0, 0, 0, 0, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 100, NULL, NULL, NULL, 0),
(236, 'Dark Judges', 8, 23, 'dark_j10.png', 'http://lbbf.forumactif.com/t12349-gros-dark-judges', 1808201, 1, 1, 0, 0, 160000, 3, 2, 'http://i39.servimg.com/u/f39/14/24/30/48/bloodb21.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 112, '2014-12-22 20:40:53', NULL, NULL, 0),
(237, 'Les Bad Ministre Atorium', 20, 72, 'Logo_Vampire_12_Player.png', 'http://lbbf.forumactif.com/c48-administratorum', 1810931, 1, 0, 0, 0, 50000, 4, 4, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 113, '2014-12-21 20:01:29', NULL, NULL, 0),
(238, 'O.U.R.S.S.', 5, 31, 'Logo lézards3.png', 'http://lbbf.forumactif.com/t12614-marcus-miragos-o-u-r-s-s', 1842219, 1, 1, 0, 0, 170000, 3, 6, 'http://i38.servimg.com/u/f38/13/31/43/97/sans_t10.jpg', 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 136, '2015-02-25 20:34:38', NULL, NULL, 1),
(239, 'Jurassic World Peace', 5, 30, 'Logo_Lizardman_JurrassicWorld.png', 'http://lbbf.forumactif.com/t12621-clement0-jurassic-world-peace#172353', 1844544, 1, 1, 0, 0, 0, 3, 5, 'http://i38.servimg.com/u/f38/14/31/31/01/bloodb20.jpg', 'Non renseigné', 'Lustrie', 'Orange', 'Louis Vuitton', 127, '2015-02-25 20:32:53', '-', 'Roarrrrkrrr', 1),
(240, 'SteelBorn 2.0', 2, 27, 'steelborn_player.png', 'http://lbbf.forumactif.com/t12631-relaps-steelborn-2-0', 1841649, 1, 0, 0, 0, 90000, 3, 1, 'http://i38.servimg.com/u/f38/14/14/83/52/steelb11.jpg', 'Bruenor BATTLEHAMMER', 'OMAHA STADIUM', 'NOIR et JAUNE', 'POING P', 99, '2015-02-25 19:57:32', ' ', 'Hold the line !!!', 1),
(241, 'Les Ecrabouilleurs Rouges', 2, 42, 'Logo_Dwarf_16.png', 'http://lbbf.forumactif.com/t12632-alikaa-les-ecrabouilleurs-rouges', 1848008, 1, 1, 0, 0, 170000, 3, 4, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 126, '2015-03-01 14:23:39', NULL, NULL, 1),
(242, 'Les Comimis', 22, 72, 'Logo_Underworld_07.png', 'http://lbbf.forumactif.com/f191-equipes', 1847309, 1, 1, 0, 0, 0, 3, 2, NULL, 'Non renseigné', 'Non renseigné', 'Non renseigné', 'Non renseigné', 106, '2015-02-25 19:57:32', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
 ADD PRIMARY KEY (`idmembre`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
 ADD PRIMARY KEY (`idteam`), ADD UNIQUE KEY `idteamserver` (`idteamserver`), ADD KEY `idcoach` (`idcoach`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `membre`
--
ALTER TABLE `membre`
MODIFY `idmembre` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
MODIFY `idteam` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=243;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `team`
--
ALTER TABLE `team`
ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`idcoach`) REFERENCES `membre` (`idmembre`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
