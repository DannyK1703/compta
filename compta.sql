-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 09 juin 2021 à 12:16
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `compta`
--

-- --------------------------------------------------------

--
-- Structure de la table `balance`
--

CREATE TABLE `balance` (
  `compte` varchar(10) NOT NULL,
  `intitule` varchar(500) NOT NULL,
  `sold_I_deb` double DEFAULT NULL,
  `sold_I_cred` double DEFAULT NULL,
  `mvm_deb` double DEFAULT NULL,
  `mvm_cred` double DEFAULT NULL,
  `sold_F_deb` double DEFAULT NULL,
  `sold_F_cred` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `balance`
--

INSERT INTO `balance` (`compte`, `intitule`, `sold_I_deb`, `sold_I_cred`, `mvm_deb`, `mvm_cred`, `sold_F_deb`, `sold_F_cred`) VALUES
('12', 'Frais de recherche et de prospection', 1450, NULL, 450, NULL, 1000, NULL),
('15', 'Primes liées au capital social', NULL, 5, NULL, 600, NULL, 5),
('41', 'Brevet, licences, logiciels et droits similaires', 5800, NULL, 800, NULL, 5000, NULL),
('40', 'Fournisseurs d\'exploitation', NULL, 56000, NULL, 60000, NULL, 50000);

-- --------------------------------------------------------

--
-- Structure de la table `balance_n`
--

CREATE TABLE `balance_n` (
  `compte` varchar(10) NOT NULL,
  `intitule` varchar(500) NOT NULL,
  `sold_I_deb` double NOT NULL DEFAULT 0,
  `sold_I_cred` double NOT NULL DEFAULT 0,
  `mvm_deb` double NOT NULL DEFAULT 0,
  `mvm_cred` double NOT NULL DEFAULT 0,
  `sold_F_deb` double NOT NULL DEFAULT 0,
  `sold_F_cred` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `balance_n`
--

INSERT INTO `balance_n` (`compte`, `intitule`, `sold_I_deb`, `sold_I_cred`, `mvm_deb`, `mvm_cred`, `sold_F_deb`, `sold_F_cred`) VALUES
('12', 'Fonds commercial et droit au bail', 1450, 0, 450, 0, 1000, 0),
('15', 'Apporteurs capital non appelé (-)', 0, 5, 0, 5, 0, 400),
('41', 'Matériel de transport', 5800, 0, 800, 0, 5000, 0),
('40', 'Ecarts de réévaluation', 0, 56000, 0, 60000, 0, 50000);

-- --------------------------------------------------------

--
-- Structure de la table `bilant_a`
--

CREATE TABLE `bilant_a` (
  `intitule` varchar(500) NOT NULL,
  `brut` double NOT NULL,
  `Exercice_31_12_n` double NOT NULL,
  `Exercice_31_12_n_1` double NOT NULL,
  `deperc` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bilant_a`
--

INSERT INTO `bilant_a` (`intitule`, `brut`, `Exercice_31_12_n`, `Exercice_31_12_n_1`, `deperc`) VALUES
('Autres immobilisations incorporelles', 0, 0, 0, 0),
('Autres immobilisations incorporelles', 0, 0, 0, 0),
('Terrains (1) \r\n(1) dont placement en Net,,,,,,,,, ,/,,,,,,,,,,,', 0, 0, 0, 0),
('Bâtiments\r\n(1) dont placement en Net,,,,,,, ,,,,/,,,,,,,,,,,', 0, 0, 0, 0),
('Aménagement, agencements et Installations', 0, 0, 0, 0),
('Matériel, mobilier et actifs biologiques', 0, 0, 0, 0),
('Avances et acomptes versés sur immobilisations', 0, 0, 0, 0),
('Titres de participation', 0, 0, 0, 0),
('Autres immobilisations financières', 0, 0, 0, 0),
('Fournisseurs, avances versées', 0, 0, 0, 0),
('Clients', 0, 0, 0, 0),
('ACTIF CIRCULANT H.A.O', 0, 0, 0, 0),
('STOCKS ET ENCOURS', 0, 0, 0, 0),
('CREANCES ET EMPLOIS ASSIMILES', 0, 0, 0, 0),
('Autres créances', 0, 0, 0, 0),
('Titres de placement', 0, 0, 0, 0),
('Valeurs à encaisser', 0, 0, 0, 0),
('Ecarts de conversion -actif', 0, 0, 0, 0),
('Banques, chèques postaux, caisse', 0, 0, 0, 0),
('Frais de recherche et de prospection', 0, 1000, 0, 0),
('Matériel de transport', 0, 0, 0, 0),
('Brevet, licences, logiciels et droits similaires', 0, 5000, 0, 0),
('Fonds commercial et droit au bail', 0, 0, 1000, 0);

-- --------------------------------------------------------

--
-- Structure de la table `bilant_p`
--

CREATE TABLE `bilant_p` (
  `intitule` varchar(100) NOT NULL,
  `Exercice_31_12_n` double NOT NULL,
  `Exercice_31_12_n_1` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bilant_p`
--

INSERT INTO `bilant_p` (`intitule`, `Exercice_31_12_n`, `Exercice_31_12_n_1`) VALUES
(' Capital', 0, 0),
(' Apporteurs capital non appelé (-)', 0, 0),
('  Ecarts de réévaluation', 0, 0),
('Réserves indisponibles', 0, 0),
('Réserves libres', 0, 0),
('Report à nouveau   (+ ou -)', 0, 0),
('Résultat net de l\'exercice (+ ou -)', 0, 0),
('Subventions d\'investissement', 0, 0),
('Provisions réglementées', 0, 0),
('Emprunts et dettes financières diverses', 0, 0),
('Dettes de location acquisition', 0, 0),
('Provisions pour risques et charges', 0, 0),
('TOTAL DETTES FINANCIERES ET RESSOURCES ASSIMILEES', 0, 0),
('TOTAL RESSOURCES STABLES', 0, 0),
('Dettes circulantes H.A O', 0, 0),
('Clients, avances reçues', 0, 0),
('Dettes fiscales et sociales', 0, 0),
('Autres dettes', 0, 0),
('Provisions pour risques et charges', 0, 0),
('TOTAL PASSIF CIRCULANT', 0, 0),
('Banques, crédits d\'escompte', 0, 0),
('Banques, établissements financiers et crédits de trésorerie', 0, 0),
('TOTAL TRESORERIE-PASSIF', 0, 0),
('Ecart de conversion- Passif', 0, 0),
('Primes liées au capital social', 0, 5),
('Apporteurs capital non appelé (-)', 400, 0),
('Fournisseurs d\'exploitation', 0, 50000),
('Ecarts de réévaluation', 50000, 1);

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

CREATE TABLE `resultat` (
  `intitule` varchar(500) NOT NULL,
  `net_n` double NOT NULL,
  `net_n_1` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `resultat`
--

INSERT INTO `resultat` (`intitule`, `net_n`, `net_n_1`) VALUES
('Ventes de marchandises', 0, 0),
('Achat de marchandises', 0, 0),
('Variation  de stocks de marchandises', 0, 0),
('Vente de produits fabriqués', 0, 0),
('Produits accessoires', 0, 0),
('Production stockées (ou déstockage)', 0, 0),
('Travaux, services vendus', 0, 0),
('Production immobilisée', 0, 0),
('Subvention d\'exploitation', 0, 0),
('Autres produits', 0, 0),
('Transferts de charges d’exploitation', 0, 0),
('Achats de matières premières et fournitures liées', 0, 0),
('Variations de stocks de matières premières et fournitures liées', 0, 0),
('Autres achats', 0, 0),
('Variations des autres approvisionnements', 0, 0),
('Transport', 0, 0),
('Services extérieurs', 0, 0),
('Impôts et taxes', 0, 0),
('Autres charges', 0, 0),
('Charges de personnel', 0, 0),
('Reprise d’amortissements, provisions et dépréciations', 0, 0),
('Dotations aux amortissements, aux provisions et dépréciations', 0, 0),
('Revenus financiers et assimilés', 0, 0),
('Reprises de provisions et dépréciations financières', 0, 0),
('Transferts de charges financières', 0, 0),
('Frais financiers et charges assimilées', 0, 0),
('Dotations aux provisions et aux dépréciations financières', 0, 0),
('Produits des cessions d\'immobilisations', 0, 0),
('Autres produits H.A.O', 0, 0),
('Valeurs comptables des cessions d\'immobilisations', 0, 0),
('Autres charges H.A.O', 0, 0),
('Participations des travailleurs', 0, 0),
('Impôts sur le résultat', 0, 0),
('MARGE COMMERCIALE (Somme TA à RB)', 0, 0),
('CHIFFRES D’AFFAIRES (A + B + C+ D)', 0, 0),
('VALEUR AJOUTEE (XB+RA+RB) + (somme TE à RJ)', 0, 0),
('EXCEDENT BRUT D\'EXPLOITATION (XC + RK) ', 0, 0),
('RESULTAT D\'EXPLOITATION (XD + TJ + RL)', 0, 0),
(' RESULTAT FINANCIER (Somme TK à RN)', 0, 0),
('RESULTAT DES ACTIVITES ORDINAIRES (XE + XF)', 0, 0),
('RESULTAT HORS ACTIVITES ORDINAIRES (somme TN à RP)', 0, 0),
('RESULTAT NET (XG + XH +RQ + RS)', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
