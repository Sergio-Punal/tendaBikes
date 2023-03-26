-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: dbxdebug
-- Xerado en: 15 de Mar de 2022 ás 09:19
-- Versión do servidor: 8.0.28
-- Versión do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tendaBikes`
--

-- --------------------------------------------------------

--
-- Estrutura da táboa `bicicletas`
--

CREATE TABLE `bicicletas` (
  `nomeBici` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `prezo` decimal(10,2) NOT NULL,
  `imaxe` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- A extraer os datos da táboa `bicicletas`
--

INSERT INTO `bicicletas` (`nomeBici`, `prezo`, `imaxe`) VALUES
('Brompton C-Line Explore', '1620.00', 'BromptonC-LineExplore.png'),
('Conor City 24S', '514.00', 'ConorCity24S.png'),
('Conor Soho', '282.35', 'ConorSoho.png'),
('Ebike ossby Curve Electric', '1690.00', 'EbikeOssbyCurveElectric.png'),
('Ebike Specialized Tero 4.0', '4800.00', 'EbikeSpecializedTero4.0.png'),
('Giant Stance 29', '1999.00', 'GiantStance29.jpg'),
('Giant Talon 3', '649.00', 'GiantTalon3.png'),
('Orbea Laufey H10', '1899.00', 'OrbeaLaufey.jpg'),
('Orbea Occam H30', '2599.00', 'OrbeaOccam.jpg'),
('Specialized Stumpjumper Alloy', '2700.00', 'SpecializedStumpjumper.png');

-- --------------------------------------------------------

--
-- Estrutura da táboa `usuarios`
--

CREATE TABLE `usuarios` (
  `user` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `contrasinal` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bicicletas`
--
ALTER TABLE `bicicletas`
  ADD PRIMARY KEY (`nomeBici`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
