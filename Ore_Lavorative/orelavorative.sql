-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: Giu 07, 2018 alle 08:13
-- Versione del server: 5.5.38-0ubuntu0.14.04.1
-- Versione PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `orelavorative`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `amm`
--

CREATE TABLE IF NOT EXISTS `amm` (
  `idAmm` int(11) NOT NULL AUTO_INCREMENT,
  `Amministratori` varchar(20) NOT NULL,
  `idUtente` int(11) NOT NULL,
  PRIMARY KEY (`idAmm`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `amm`
--

INSERT INTO `amm` (`idAmm`, `Amministratori`, `idUtente`) VALUES
(1, 'Emaronti', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `commerc`
--

CREATE TABLE IF NOT EXISTS `commerc` (
  `idCommerc` int(11) NOT NULL AUTO_INCREMENT,
  `Commerciale` varchar(20) NOT NULL,
  `idUtente` int(11) NOT NULL,
  PRIMARY KEY (`idCommerc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `commerc`
--

INSERT INTO `commerc` (`idCommerc`, `Commerciale`, `idUtente`) VALUES
(1, 'Ksaiyam', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `data` date NOT NULL,
  `ore` int(11) NOT NULL,
  `luogo` varchar(40) NOT NULL,
  `descrizione` varchar(90) NOT NULL,
  `idProgetto` int(11) NOT NULL,
  `idUtente` int(11) NOT NULL,
  `idTipo` int(11) NOT NULL,
  PRIMARY KEY (`data`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `data`
--

INSERT INTO `data` (`data`, `ore`, `luogo`, `descrizione`, `idProgetto`, `idUtente`, `idTipo`) VALUES
('2018-06-21', 9, 'Lastra a Signa', '', 1, 6, 1),
('2018-06-25', 8, 'Lastra a Signa', '', 2, 6, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `ore_totali`
--

CREATE TABLE IF NOT EXISTS `ore_totali` (
  `id_Ore` int(11) NOT NULL AUTO_INCREMENT,
  `Ore_totali` int(11) NOT NULL,
  `Extra_ore` int(11) NOT NULL,
  `idProgetto` int(11) NOT NULL,
  `idUtente` int(11) NOT NULL,
  PRIMARY KEY (`id_Ore`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dump dei dati per la tabella `ore_totali`
--

INSERT INTO `ore_totali` (`id_Ore`, `Ore_totali`, `Extra_ore`, `idProgetto`, `idUtente`) VALUES
(3, 17, 0, 0, 4),
(4, 17, 0, 0, 5),
(5, 17, 1, 0, 6),
(6, 17, 0, 0, 7);

-- --------------------------------------------------------

--
-- Struttura della tabella `progetto`
--

CREATE TABLE IF NOT EXISTS `progetto` (
  `idProgetto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `descrizione` varchar(60) NOT NULL,
  `idTipo_Pro` int(11) NOT NULL,
  `AnnoStart` year(4) NOT NULL,
  `pro_commessa` int(11) NOT NULL,
  PRIMARY KEY (`idProgetto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `progetto`
--

INSERT INTO `progetto` (`idProgetto`, `nome`, `descrizione`, `idTipo_Pro`, `AnnoStart`, `pro_commessa`) VALUES
(1, 'PITTI', 'CTC - Ferrovie Emilia Romagna', 3, 2017, 1),
(2, 'SCADA', 'Non si sa', 0, 0000, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `tipogiornata`
--

CREATE TABLE IF NOT EXISTS `tipogiornata` (
  `idTipo` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(10) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dump dei dati per la tabella `tipogiornata`
--

INSERT INTO `tipogiornata` (`idTipo`, `Tipo`) VALUES
(1, 'Gl'),
(2, 'Gnl'),
(3, 'Ferie'),
(4, 'Trasferta'),
(5, 'Malattia'),
(6, 'Permesso');

-- --------------------------------------------------------

--
-- Struttura della tabella `tipo_progetto`
--

CREATE TABLE IF NOT EXISTS `tipo_progetto` (
  `idTipo_Pro` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_Tipo` varchar(11) NOT NULL,
  PRIMARY KEY (`idTipo_Pro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dump dei dati per la tabella `tipo_progetto`
--

INSERT INTO `tipo_progetto` (`idTipo_Pro`, `Nome_Tipo`) VALUES
(1, 'SCMT'),
(2, 'SCEDE'),
(3, 'ACT'),
(4, 'PRONTO TREN');

-- --------------------------------------------------------

--
-- Struttura della tabella `uten`
--

CREATE TABLE IF NOT EXISTS `uten` (
  `idUten` int(11) NOT NULL AUTO_INCREMENT,
  `idUtente` int(11) NOT NULL,
  `Utenti` varchar(20) NOT NULL,
  PRIMARY KEY (`idUten`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dump dei dati per la tabella `uten`
--

INSERT INTO `uten` (`idUten`, `idUtente`, `Utenti`) VALUES
(1, 3, 'MarioRossi'),
(2, 4, 'KumarS'),
(3, 5, 'RontiniE'),
(4, 6, 'EmaR'),
(5, 7, 'Rodrigo'),
(6, 8, 'Neripox'),
(7, 9, 'Riga'),
(8, 10, 'Indro'),
(9, 11, 'Luigi'),
(10, 12, 'Jack');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE IF NOT EXISTS `utente` (
  `idUtente` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`idUtente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`idUtente`, `Username`, `Password`) VALUES
(1, 'Emaronti', 'prova'),
(2, 'Ksaiyam', 'prova'),
(3, 'MarioRossi', 'prova'),
(4, 'KumarS', 'prova'),
(5, 'RontiniE', 'prova'),
(6, 'EmaR', 'prova');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
