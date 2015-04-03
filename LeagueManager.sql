-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2015 at 01:07 PM
-- Server version: 5.5.41-log
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `leaguemanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE IF NOT EXISTS `coach` (
`coach_ID` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `league`
--

CREATE TABLE IF NOT EXISTS `league` (
`league_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `order` int(11) NOT NULL DEFAULT '0',
  `league_ID_Parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `league_season`
--

CREATE TABLE IF NOT EXISTS `league_season` (
`league_season_ID` int(11) NOT NULL,
  `league_ID` int(11) NOT NULL,
  `start_Date` date NOT NULL,
  `end_Date` date NOT NULL,
  `type` varchar(64) NOT NULL,
  `season` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

CREATE TABLE IF NOT EXISTS `match` (
`match_ID` int(11) NOT NULL,
  `league_season_ID` int(11) DEFAULT NULL,
  `idTeam_Listing_Away` int(11) DEFAULT NULL,
  `idTeam_Listing_Home` int(11) DEFAULT NULL,
  `Championship_iSeason` int(11) DEFAULT NULL,
  `Championship_iDay` int(11) DEFAULT NULL,
  `Championship_iGroup` int(11) DEFAULT NULL,
  `Championship_idRule_Types` int(11) DEFAULT NULL,
  `Championship_iEliminitationLevel` int(11) DEFAULT NULL,
  `Playoff_iEliminationLevel` int(11) DEFAULT NULL,
  `Playoff_bAwayGame` int(11) DEFAULT NULL,
  `Away_iScore` int(11) DEFAULT NULL,
  `Away_iReward` int(11) DEFAULT NULL,
  `Away_iCashEarned` int(11) DEFAULT NULL,
  `Away_iPossessionBall` int(11) DEFAULT NULL,
  `Away_Occupation_iOwn` int(11) DEFAULT NULL,
  `Away_Occupation_iTheir` int(11) DEFAULT NULL,
  `Away_iMVP` int(11) DEFAULT NULL,
  `Away_Inflicted_iPasses` int(11) DEFAULT NULL,
  `Away_Inflicted_iCatches` int(11) DEFAULT NULL,
  `Away_Inflicted_iInterceptions` int(11) DEFAULT NULL,
  `Away_Inflicted_iTouchdowns` int(11) DEFAULT NULL,
  `Away_Inflicted_iCasualties` int(11) DEFAULT NULL,
  `Away_Inflicted_iTackles` int(11) DEFAULT NULL,
  `Away_Inflicted_iKO` int(11) DEFAULT NULL,
  `Away_Inflicted_iInjuries` int(11) DEFAULT NULL,
  `Away_Inflicted_iDead` int(11) DEFAULT NULL,
  `Away_Inflicted_iMetersRunning` int(11) DEFAULT NULL,
  `Away_Inflicted_iMetersPassing` int(11) DEFAULT NULL,
  `Away_Sustained_iPasses` int(11) DEFAULT NULL,
  `Away_Sustained_iCatches` int(11) DEFAULT NULL,
  `Away_Sustained_iInterceptions` int(11) DEFAULT NULL,
  `Away_Sustained_iTouchdowns` int(11) DEFAULT NULL,
  `Away_Sustained_iCasualties` int(11) DEFAULT NULL,
  `Away_Sustained_iTackles` int(11) DEFAULT NULL,
  `Away_Sustained_iKO` int(11) DEFAULT NULL,
  `Away_Sustained_iInjuries` int(11) DEFAULT NULL,
  `Away_Sustained_iDead` int(11) DEFAULT NULL,
  `Away_Sustained_iMetersRunning` int(11) DEFAULT NULL,
  `Away_Sustained_iMetersPassing` int(11) DEFAULT NULL,
  `Away_iMetersRunning` int(11) DEFAULT NULL,
  `Away_iMetersPassing` int(11) DEFAULT NULL,
  `Home_iScore` int(11) DEFAULT NULL,
  `Home_iReward` int(11) DEFAULT NULL,
  `Home_iCashEarned` int(11) DEFAULT NULL,
  `Home_iPossessionBall` int(11) DEFAULT NULL,
  `Home_Occupation_iOwn` int(11) DEFAULT NULL,
  `Home_Occupation_iTheir` int(11) DEFAULT NULL,
  `Home_iMVP` int(11) DEFAULT NULL,
  `Home_Inflicted_iPasses` int(11) DEFAULT NULL,
  `Home_Inflicted_iCatches` int(11) DEFAULT NULL,
  `Home_Inflicted_iInterceptions` int(11) DEFAULT NULL,
  `Home_Inflicted_iTouchdowns` int(11) DEFAULT NULL,
  `Home_Inflicted_iCasualties` int(11) DEFAULT NULL,
  `Home_Inflicted_iTackles` int(11) DEFAULT NULL,
  `Home_Inflicted_iKO` int(11) DEFAULT NULL,
  `Home_Inflicted_iInjuries` int(11) DEFAULT NULL,
  `Home_Inflicted_iDead` int(11) DEFAULT NULL,
  `Home_Inflicted_iMetersRunning` int(11) DEFAULT NULL,
  `Home_Inflicted_iMetersPassing` int(11) DEFAULT NULL,
  `Home_Sustained_iPasses` int(11) DEFAULT NULL,
  `Home_Sustained_iCatches` int(11) DEFAULT NULL,
  `Home_Sustained_iInterceptions` int(11) DEFAULT NULL,
  `Home_Sustained_iTouchdowns` int(11) DEFAULT NULL,
  `Home_Sustained_iCasualties` int(11) DEFAULT NULL,
  `Home_Sustained_iTackles` int(11) DEFAULT NULL,
  `Home_Sustained_iKO` int(11) DEFAULT NULL,
  `Home_Sustained_iInjuries` int(11) DEFAULT NULL,
  `Home_Sustained_iDead` int(11) DEFAULT NULL,
  `Home_Sustained_iMetersRunning` int(11) DEFAULT NULL,
  `Home_Sustained_iMetersPassing` int(11) DEFAULT NULL,
  `Home_iMetersRunning` int(11) DEFAULT NULL,
  `Home_iMetersPassing` int(11) DEFAULT NULL,
  `iSpectators` int(11) DEFAULT NULL,
  `iRating` int(11) DEFAULT NULL,
  `bPlayed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `match_player_stat`
--

CREATE TABLE IF NOT EXISTS `match_player_stat` (
`player_stat_ID` int(11) NOT NULL,
  `player_ID` int(11) DEFAULT NULL,
  `match_ID` int(11) DEFAULT NULL,
  `iMVP` int(11) DEFAULT NULL,
  `Inflicted_iPasses` int(11) DEFAULT NULL,
  `Inflicted_iCatches` int(11) DEFAULT NULL,
  `Inflicted_iInterceptions` int(11) DEFAULT NULL,
  `Inflicted_iTouchdowns` int(11) DEFAULT NULL,
  `Inflicted_iCasualties` int(11) DEFAULT NULL,
  `Inflicted_iTackles` int(11) DEFAULT NULL,
  `Inflicted_iKO` int(11) DEFAULT NULL,
  `Inflicted_iStuns` int(11) DEFAULT NULL,
  `Inflicted_iInjuries` int(11) DEFAULT NULL,
  `Inflicted_iDead` int(11) DEFAULT NULL,
  `Inflicted_iMetersRunning` int(11) DEFAULT NULL,
  `Inflicted_iMetersPassing` int(11) DEFAULT NULL,
  `Sustained_iInterceptions` int(11) DEFAULT NULL,
  `Sustained_iCasualties` int(11) DEFAULT NULL,
  `Sustained_iTackles` int(11) DEFAULT NULL,
  `Sustained_iKO` int(11) DEFAULT NULL,
  `Sustained_iStuns` int(11) DEFAULT NULL,
  `Sustained_iInjuries` int(11) DEFAULT NULL,
  `Sustained_iDead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
`player_ID` int(11) NOT NULL,
  `player_ID_Game` int(11) NOT NULL,
  `team_ID` int(11) NOT NULL,
  `team_ID_Game` int(11) NOT NULL,
  `param_ID_Title` int(11) NOT NULL,
  `number` tinyint(4) NOT NULL,
  `name` varchar(64) NOT NULL,
  `MA` tinyint(4) NOT NULL,
  `ST` tinyint(4) NOT NULL,
  `AG` tinyint(4) NOT NULL,
  `AV` tinyint(4) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `casualties` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL,
  `fired` tinyint(1) NOT NULL,
  `dead` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `player_stat`
--

CREATE TABLE IF NOT EXISTS `player_stat` (
`player_stat_ID` int(11) NOT NULL,
  `player_ID` int(11) DEFAULT NULL,
  `iMVP` int(11) DEFAULT NULL,
  `Inflicted_iPasses` int(11) DEFAULT NULL,
  `Inflicted_iCatches` int(11) DEFAULT NULL,
  `Inflicted_iInterceptions` int(11) DEFAULT NULL,
  `Inflicted_iTouchdowns` int(11) DEFAULT NULL,
  `Inflicted_iCasualties` int(11) DEFAULT NULL,
  `Inflicted_iTackles` int(11) DEFAULT NULL,
  `Inflicted_iKO` int(11) DEFAULT NULL,
  `Inflicted_iStuns` int(11) DEFAULT NULL,
  `Inflicted_iInjuries` int(11) DEFAULT NULL,
  `Inflicted_iDead` int(11) DEFAULT NULL,
  `Inflicted_iMetersRunning` int(11) DEFAULT NULL,
  `Inflicted_iMetersPassing` int(11) DEFAULT NULL,
  `Sustained_iInterceptions` int(11) DEFAULT NULL,
  `Sustained_iCasualties` int(11) DEFAULT NULL,
  `Sustained_iTackles` int(11) DEFAULT NULL,
  `Sustained_iKO` int(11) DEFAULT NULL,
  `Sustained_iStuns` int(11) DEFAULT NULL,
  `Sustained_iInjuries` int(11) DEFAULT NULL,
  `Sustained_iDead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `team_ID` int(11) NOT NULL,
  `team_ID_Game` int(11) NOT NULL,
  `coach_ID` int(11) NOT NULL,
  `strName` varchar(255) NOT NULL,
  `idRaces` int(11) NOT NULL,
  `strLogo` varchar(255) NOT NULL,
  `iTeamColor` int(11) DEFAULT NULL,
  `strLeitmotiv` text,
  `strBackground` text,
  `iValue` int(11) DEFAULT NULL,
  `iPopularity` int(11) DEFAULT NULL,
  `iCash` int(11) DEFAULT NULL,
  `iCheerleaders` int(11) DEFAULT NULL,
  `iBalms` int(11) DEFAULT NULL,
  `bApothecary` int(11) DEFAULT NULL,
  `iRerolls` int(11) DEFAULT NULL,
  `bEdited` int(11) DEFAULT NULL,
  `idTeam_Listing_Filters` int(11) NOT NULL,
  `idStrings_Formatted_Background` int(11) DEFAULT NULL,
  `idStrings_Localized_Leitmotiv` int(11) DEFAULT NULL,
  `iNextPurchase` int(11) DEFAULT NULL,
  `iAssistantCoaches` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
 ADD PRIMARY KEY (`coach_ID`), ADD UNIQUE KEY `user_ID` (`coach_ID`,`name`,`email`);

--
-- Indexes for table `league`
--
ALTER TABLE `league`
 ADD PRIMARY KEY (`league_ID`), ADD UNIQUE KEY `league_ID` (`league_ID`), ADD KEY `name` (`name`,`active`,`league_ID_Parent`);

--
-- Indexes for table `league_season`
--
ALTER TABLE `league_season`
 ADD PRIMARY KEY (`league_season_ID`), ADD UNIQUE KEY `league_season_ID` (`league_season_ID`), ADD KEY `league_ID` (`league_ID`,`start_Date`,`end_Date`);

--
-- Indexes for table `match`
--
ALTER TABLE `match`
 ADD PRIMARY KEY (`match_ID`);

--
-- Indexes for table `match_player_stat`
--
ALTER TABLE `match_player_stat`
 ADD PRIMARY KEY (`player_stat_ID`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
 ADD PRIMARY KEY (`player_ID`), ADD UNIQUE KEY `player_ID` (`player_ID`,`player_ID_Game`);

--
-- Indexes for table `player_stat`
--
ALTER TABLE `player_stat`
 ADD PRIMARY KEY (`player_stat_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coach`
--
ALTER TABLE `coach`
MODIFY `coach_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `league`
--
ALTER TABLE `league`
MODIFY `league_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `league_season`
--
ALTER TABLE `league_season`
MODIFY `league_season_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `match`
--
ALTER TABLE `match`
MODIFY `match_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `match_player_stat`
--
ALTER TABLE `match_player_stat`
MODIFY `player_stat_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
MODIFY `player_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `player_stat`
--
ALTER TABLE `player_stat`
MODIFY `player_stat_ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
