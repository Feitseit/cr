-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Loomise aeg: Märts 12, 2026 kell 10:56 EL
-- Serveri versioon: 10.4.32-MariaDB
-- PHP versioon: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `cr`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `mark` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `engine` varchar(255) NOT NULL,
  `fuel` enum('bensiin','diisel','elekter','gaas') NOT NULL,
  `price` int(4) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `cars`
--

INSERT INTO `cars` (`id`, `mark`, `model`, `engine`, `fuel`, `price`, `image`) VALUES
(1, 'bmw', 'V10', '', 'elekter', 1500, 'Bmwm5.jpg'),
(2, 'Suzuki', 'Vitara', 'V8', 'elekter', 414, '/est/et/tempus/semper/est.png'),
(3, 'Toyota', 'Sienna', 'V12', 'gaas', 197, '/lobortis/vel/dapibus.xml'),
(4, 'Toyota', 'T100 Xtra', 'V6', 'bensiin', 386, '/ullamcorper/augue/a.html'),
(5, 'Toyota', 'TundraMax', 'V8', 'elekter', 639, '/justo.aspx'),
(6, 'Dodge', 'Grand Caravan', 'V10', 'elekter', 817, '/convallis/nunc/proin/at/turpis/a/pede.jpg'),
(7, 'Mazda', 'MX-5', 'V6', 'bensiin', 870, '/orci/luctus/et/ultrices/posuere/cubilia.json'),
(8, 'Toyota', 'Echo', 'V8', 'bensiin', 210, '/parturient/montes.json'),
(9, 'Mercury', 'Sable', 'V6', 'diisel', 162, '/in/tempus/sit.js'),
(10, 'Dodge', 'Ramcharger', 'V8', 'elekter', 149, '/magna/vestibulum/aliquet/ultrices/erat.jpg'),
(11, 'Chevrolet', 'Corvette', 'V10', 'bensiin', 427, '/enim/blandit/mi/in/porttitor/pede/justo.aspx'),
(12, 'GMC', 'Yukon XL 1500', 'V6', 'gaas', 148, '/molestie/sed/justo/pellentesque/viverra.jsp'),
(13, 'BMW', 'Z3', 'V8', 'bensiin', 908, '/nulla/ac/enim.html'),
(14, 'Mazda', 'Mazda6', 'V10', 'gaas', 763, '/orci/luctus/et.js'),
(15, 'Aston Martin', 'DB9', 'V6', 'diisel', 888, '/ipsum/praesent/blandit/lacinia/erat/vestibulum.aspx'),
(16, 'Lotus', 'Esprit', 'V10', 'diisel', 543, '/ac/diam/cras/pellentesque/volutpat/dui/maecenas.png'),
(17, 'Mitsubishi', 'Montero', 'V8', 'gaas', 915, '/ultricies/eu.xml'),
(18, 'Dodge', 'Ram Van 3500', 'V6', 'gaas', 270, '/interdum/mauris/ullamcorper/purus.png'),
(19, 'Hyundai', 'Tiburon', 'V6', 'bensiin', 267, '/ornare/imperdiet/sapien.xml'),
(20, 'Toyota', '4Runner', 'V12', 'elekter', 309, '/morbi/vel.js'),
(21, 'Pontiac', 'Chevette', 'V10', 'diisel', 493, '/tristique/est/et/tempus/semper/est.png'),
(22, 'Dodge', 'Dynasty', 'V6', 'gaas', 542, '/at/feugiat.jpg'),
(23, 'Jaguar', 'XK Series', 'V12', 'diisel', 675, '/orci/nullam/molestie/nibh.aspx'),
(24, 'BMW', '650', 'V10', 'diisel', 537, '/convallis/duis/consequat/dui/nec.json'),
(25, 'Chevrolet', 'Express 2500', 'V8', 'diisel', 780, '/turpis/elementum/ligula/vehicula/consequat/morbi/a.json'),
(26, 'Dodge', 'Dakota', 'V8', 'bensiin', 202, '/rutrum/ac/lobortis/vel.jpg'),
(27, 'Volkswagen', 'GTI', 'V8', 'diisel', 242, '/placerat/ante.html'),
(28, 'Volvo', 'XC90', 'V8', 'gaas', 606, '/felis/eu.png'),
(29, 'Kia', 'Sorento', 'V10', 'diisel', 232, '/dolor/sit/amet/consectetuer/adipiscing/elit.html'),
(30, 'Pontiac', 'Grand Am', 'V10', 'gaas', 474, '/pharetra/magna/ac/consequat/metus/sapien/ut.png'),
(31, 'Jeep', 'Liberty', 'V10', 'bensiin', 792, '/non/ligula/pellentesque.jsp'),
(32, 'Mercury', 'Milan', 'V10', 'bensiin', 826, '/maecenas/tincidunt/lacus/at.xml'),
(33, 'Audi', '90', 'V12', 'bensiin', 421, '/integer/a/nibh/in/quis/justo/maecenas.js'),
(34, 'Porsche', 'Cayenne', 'V12', 'bensiin', 611, '/primis/in/faucibus/orci/luctus/et/ultrices.json'),
(35, 'Oldsmobile', '88', 'V8', 'elekter', 527, '/ut/dolor.json'),
(36, 'Mazda', 'Navajo', 'V8', 'bensiin', 265, '/sit/amet/nulla/quisque/arcu/libero.json'),
(37, 'Honda', 'S2000', 'V10', 'bensiin', 711, '/pede/malesuada/in.aspx'),
(38, 'Oldsmobile', 'Achieva', 'V6', 'gaas', 591, '/odio.jpg'),
(39, 'Pontiac', 'Sunbird', 'V8', 'bensiin', 806, '/pellentesque/volutpat.xml'),
(40, 'Honda', 'CR-V', 'V10', 'diisel', 212, '/accumsan.html'),
(41, 'Dodge', 'Neon', 'V8', 'elekter', 123, '/sed/accumsan/felis/ut/at.json');

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
