-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Loomise aeg: Märts 12, 2026 kell 10:55 EL
-- Serveri versioon: 10.4.32-MariaDB
-- PHP versioon: 8.0.30

USE `cr`;
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
(1, 'Audi', 'Q8', 'V8', 'bensiin', 1500, 'audiq8.jpg'),
(2, 'Chrysler', 'Concorde', 'V12', 'gaas', 6072, '/pede.xml'),
(3, 'Isuzu', 'Amigo', 'V12', 'bensiin', 7046, '/rutrum/at/lorem/integer/tincidunt/ante/vel.jsp'),
(4, 'Kia', 'Spectra5', 'V8', 'diisel', 3613, '/velit/nec/nisi/vulputate/nonummy/maecenas.json'),
(5, 'Plymouth', 'Colt Vista', 'V6', 'gaas', 9026, '/pretium/quis/lectus/suspendisse/potenti.xml'),
(6, 'Mercedes-Benz', 'E-Class', 'V12', 'elekter', 3121, '/interdum.json'),
(7, 'MINI', 'Cooper', 'V12', 'gaas', 2302, '/vestibulum/aliquet/ultrices/erat/tortor/sollicitudin.html'),
(8, 'Maybach', '62', 'V6', 'diisel', 8109, '/ut.jsp'),
(9, 'Mercedes-Benz', 'E-Class', 'V6', 'elekter', 7795, '/nisl/ut/volutpat/sapien/arcu/sed/augue.json'),
(10, 'Chevrolet', 'Express 2500', 'V12', 'elekter', 898, '/eu/magna/vulputate/luctus/cum.html'),
(11, 'Corbin', 'Sparrow', 'V12', 'bensiin', 2017, '/leo/maecenas/pulvinar.png'),
(12, 'Chevrolet', 'Express 3500', 'V12', 'diisel', 8478, '/amet.jpg'),
(13, 'Jeep', 'Cherokee', 'V6', 'gaas', 3800, '/id/sapien/in.jpg'),
(14, 'Jeep', 'Cherokee', 'V12', 'gaas', 3925, '/consequat.xml'),
(15, 'Dodge', 'D350 Club', 'V12', 'bensiin', 6410, '/nisl/venenatis.xml'),
(16, 'Chevrolet', 'S10 Blazer', 'V8', 'elekter', 8191, '/sapien/ut/nunc/vestibulum/ante.png'),
(17, 'Mercedes-Benz', 'W201', 'V12', 'elekter', 8510, '/et/ultrices.json'),
(18, 'Toyota', 'Avalon', 'V12', 'bensiin', 2274, '/id/mauris/vulputate/elementum/nullam/varius.png'),
(19, 'Mazda', 'Familia', 'V6', 'gaas', 2129, '/condimentum/id/luctus/nec/molestie.html'),
(20, 'Lexus', 'SC', 'V12', 'elekter', 6069, '/imperdiet/sapien.aspx'),
(21, 'Honda', 'Accord', 'V6', 'elekter', 3491, '/lacus/at/velit/vivamus/vel/nulla.png'),
(22, 'Honda', 'Passport', 'V6', 'diisel', 6103, '/libero/convallis/eget.js'),
(23, 'Volkswagen', 'Jetta', 'V8', 'diisel', 8795, '/in.js'),
(24, 'Honda', 'Accord', 'V8', 'diisel', 1237, '/ut/odio/cras.jsp'),
(25, 'Fiat', 'Nuova 500', 'V8', 'elekter', 6019, '/tempus/vel/pede/morbi.jsp'),
(26, 'Chevrolet', 'Malibu', 'V6', 'elekter', 5834, '/sapien/dignissim.jsp'),
(27, 'Volkswagen', 'Golf', 'V6', 'bensiin', 2814, '/in.jpg'),
(28, 'Audi', 'R8', 'V8', 'gaas', 6889, '/rutrum/nulla.jsp'),
(29, 'Cadillac', 'Escalade EXT', 'V12', 'elekter', 2270, '/vivamus/metus/arcu/adipiscing/molestie.jsp'),
(30, 'Nissan', 'Murano', 'V12', 'gaas', 7512, '/tempus/sit/amet.jsp'),
(31, 'BMW', 'Alpina B7', 'V8', 'gaas', 5972, '/nec.xml'),
(32, 'Audi', '90', 'V8', 'diisel', 5185, '/in/sagittis.json'),
(33, 'Eagle', 'Vision', 'V6', 'diisel', 6278, '/lorem/vitae/mattis/nibh/ligula/nec.jsp'),
(34, 'Bentley', 'Mulsanne', 'V6', 'bensiin', 3397, '/primis/in/faucibus/orci/luctus.png'),
(35, 'Mitsubishi', 'Lancer Evolution', 'V6', 'diisel', 9022, '/venenatis/lacinia.html'),
(36, 'Mitsubishi', 'Eclipse', 'V8', 'elekter', 5392, '/convallis/nulla/neque/libero/convallis.js'),
(37, 'Mercury', 'Tracer', 'V12', 'elekter', 4111, '/amet.jsp'),
(38, 'Oldsmobile', 'Bravada', 'V12', 'gaas', 6908, '/at/velit/vivamus.aspx'),
(39, 'Dodge', 'Ram 1500', 'V12', 'diisel', 2316, '/leo/maecenas/pulvinar.png'),
(40, 'Audi', '100', 'V12', 'bensiin', 5141, '/quam/pharetra/magna/ac/consequat/metus/sapien.xml'),
(41, 'Ferrari', '458 Italia', 'V6', 'elekter', 1023, '/ultrices/enim/lorem.js');

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
