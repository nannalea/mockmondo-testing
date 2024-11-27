-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Vært: localhost:8889
-- Genereringstid: 26. 05 2023 kl. 09:15:52
-- Serverversion: 5.7.34
-- PHP-version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `momondo-testing`
--
CREATE DATABASE IF NOT EXISTS `momondo-testing` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `momondo-testing`;

DELIMITER $$
--
-- Procedurer
--
DROP PROCEDURE IF EXISTS `checkForDoubleFlightIDValues`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkForDoubleFlightIDValues` ()  SELECT 
    flight_id, 
    COUNT(flight_id)
FROM
    flights
GROUP BY flight_id
HAVING COUNT(flight_id) > 1$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `flights`
--

DROP TABLE IF EXISTS `flights`;
CREATE TABLE `flights` (
  `flight_id` varchar(10) NOT NULL,
  `departure_city` varchar(85) DEFAULT NULL,
  `departure_city_img` varchar(100) NOT NULL,
  `departure_airport` varchar(100) DEFAULT NULL,
  `departure_airport_code` varchar(10) NOT NULL,
  `departure_country` varchar(60) DEFAULT NULL,
  `departure_date` varchar(10) DEFAULT NULL,
  `departure_time` varchar(5) DEFAULT NULL,
  `arrival_city` varchar(85) DEFAULT NULL,
  `arrival_city_img` varchar(100) NOT NULL,
  `arrival_airport` varchar(100) DEFAULT NULL,
  `arrival_airport_code` varchar(3) NOT NULL,
  `arrival_country` varchar(60) DEFAULT NULL,
  `arrival_date` varchar(10) DEFAULT NULL,
  `arrival_time` varchar(5) DEFAULT NULL,
  `airline` varchar(50) DEFAULT NULL,
  `airline_logo` varchar(100) DEFAULT NULL,
  `flight_price` smallint(5) UNSIGNED DEFAULT NULL,
  `travel_duration` varchar(10) NOT NULL,
  `stops` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `flights`
--

INSERT INTO `flights` (`flight_id`, `departure_city`, `departure_city_img`, `departure_airport`, `departure_airport_code`, `departure_country`, `departure_date`, `departure_time`, `arrival_city`, `arrival_city_img`, `arrival_airport`, `arrival_airport_code`, `arrival_country`, `arrival_date`, `arrival_time`, `airline`, `airline_logo`, `flight_price`, `travel_duration`, `stops`) VALUES
('1018455459', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '08.10.2023', '10.00', 'Damascus ', 'damascus.jpg', 'Damascus International Airport', 'DAM', 'Syria', '15.10.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', '2 stops'),
('1029928006', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '31.10.2023', '02.10', 'Belfast', 'belfast.jpg', 'Belfast International Airport', 'BFS', 'Northern Ireland', '07.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '3h 25m', 'Direct'),
('1054768209', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '19.10.2023', '02.10', 'Lima ', 'lima.jpg', 'Jorge Chávez International Airport', 'LIM', 'Peru', '26.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '21h 55m', 'Direct'),
('1104870990', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '17.10.2023', '02.10', 'Helsinki', 'helsinki.jpg', 'Helsinki-Vantaa Airport', 'HEL', 'Finland', '24.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '3h 25m', '1 stop'),
('1377159048', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '12.10.2023', '02.10', 'Abu Dhabi ', 'abudhabi.jpg', 'Abu Dhabi International', 'AUH', 'United Arab Emirates', '19.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 00m', 'Direct'),
('1379978516', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '14.10.2023', '15.35', 'Istanbul', 'istanbul.jpg', 'Atatürk International Airport', 'IST', 'Turkey', '21.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '22h 35m', '2 stops'),
('1393922432', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '12.10.2023', '10.00', 'Akita', 'akita.jpg', 'Akita Airport', 'AXT', 'Japan', '19.10.2023', '14.30', 'SAS', 'sas.png', 349, '7h 20m', '2 stops'),
('1425316642', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '31.10.2023', '15.35', 'Adelaide', 'adelaide.jpg', 'Adelaide Airport', 'ADL', 'Australia', '07.11.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', '2 stops'),
('1687534068', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '25.10.2023', '02.10', 'Manchester', 'manchester.jpg', 'Manchester Airport', 'MAN', 'England', '01.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 20m', 'Direct'),
('1695592728', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '30.10.2023', '02.10', 'Oslo ', 'oslo.jpg', 'Gardermoen', 'OSL', 'Norway', '06.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 00m', '2 stops'),
('1731644284', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '30.10.2023', '02.10', 'Oklahoma City', 'oklahomacity.jpg', 'Will Rogers World Airport', 'OKC', 'USA', '06.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 40m', 'Direct'),
('1739013390', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '20.10.2023', '02.10', 'Moscow', 'moscow.jpg', 'Domodedovo International Airport', 'DME', 'Russia', '27.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '3h 25m', '1 stop'),
('1766074639', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '07.10.2023', '10.00', 'Lagos', 'lagos.jpg', 'Murtala Muhammed International Airport', 'LOS', 'Nigeria', '14.10.2023', '14.30', 'SAS', 'sas.png', 349, '7h 20m', 'Direct'),
('1773986784', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '10.10.2023', '15.35', 'Lima ', 'lima.jpg', 'Jorge Chávez International Airport', 'LIM', 'Peru', '17.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', '1 stop'),
('1814594194', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '01.11.2023', '10.00', 'Honolulu', 'honolulu.jpg', 'Daniel K. Inouye International Airport', 'HNL', 'USA, Hawaii', '08.11.2023', '14.30', 'SAS', 'sas.png', 349, '7h 20m', 'Direct'),
('1864158492', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '18.10.2023', '10.00', 'Ulaanbaatar ', 'ulaanbaatar.jpg', 'Chinggis Khaan International Airport', 'UBN', 'Mongolia', '25.10.2023', '14.30', 'SAS', 'sas.png', 349, '20h 40m', '2 stops'),
('1911525973', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '04.10.2023', '10.00', 'Venice', 'venice.jpg', 'Venice Marco Polo Airport', 'VCE', 'Italy', '11.10.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', 'Direct'),
('1924149750', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '29.10.2023', '10.00', 'Toronto', 'toronto.jpg', 'Toronto Pearson International Airport', 'YYZ', 'Canada', '05.11.2023', '14.30', 'SAS', 'sas.png', 349, '13h 25m', '2 stops'),
('1942089574', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '08.10.2023', '02.10', 'Cape Town', 'capetown.jpg', 'Cape Town International Airport', 'CPT', 'South Africa', '15.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '21h 55m', '2 stops'),
('2024456046', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '12.10.2023', '15.35', 'Dakar', 'dakar.jpg', 'Blaise Diagne International Airport', 'DSS', 'Senegal', '19.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '6h 10m', '1 stop'),
('2078144000', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '16.10.2023', '02.10', 'New York', 'newyork.jpg', 'John F Kennedy International Airport', 'JFK', 'USA', '23.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '8h 23m', '2 stops'),
('2115095347', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '26.10.2023', '02.10', 'Chicago', 'chicago.jpg', 'Chicago O\'Hare International Airport', 'ORD', 'USA', '02.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 40m', 'Direct'),
('2116016221', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '13.10.2023', '15.35', 'Honolulu', 'honolulu.jpg', 'Daniel K. Inouye International Airport', 'HNL', 'USA, Hawaii', '20.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '1h 35m', 'Direct'),
('2154605685', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '08.10.2023', '02.10', 'Guatemala City ', 'guatemalacity.jpg', 'La Aurora International Airport', 'GUA', 'Guatemala', '15.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 40m', 'Direct'),
('2186011588', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '15.10.2023', '10.00', 'Union Island', 'unionisland.jpg', 'Union Island Airport', 'UNI', 'Saint Vincent and the Grenadines', '22.10.2023', '14.30', 'SAS', 'sas.png', 349, '1h 15m', 'Direct'),
('2211279233', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '22.10.2023', '10.00', 'Guatemala City ', 'guatemalacity.jpg', 'La Aurora International Airport', 'GUA', 'Guatemala', '29.10.2023', '14.30', 'SAS', 'sas.png', 349, '1h 15m', 'Direct'),
('2314154889', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '21.10.2023', '15.35', 'Lagos', 'lagos.jpg', 'Murtala Muhammed International Airport', 'LOS', 'Nigeria', '28.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '1h 35m', 'Direct'),
('2376138213', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '27.10.2023', '10.00', 'Dortmund', 'dortmund.jpg', 'Dortmund Airport', 'DTM', 'Germany', '03.11.2023', '14.30', 'SAS', 'sas.png', 349, '13h 25m', 'Direct'),
('2381655073', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '06.10.2023', '02.10', 'Adelaide', 'adelaide.jpg', 'Adelaide Airport', 'ADL', 'Australia', '13.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '3h 25m', '3 stops'),
('2414771950', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '06.10.2023', '10.00', 'Rio de Janeiro', 'riodejaneiro.jpg', 'Santos Dumont Airport', 'SDU', 'Brazil', '13.10.2023', '14.30', 'SAS', 'sas.png', 349, '13h 25m', 'Direct'),
('2426852120', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '06.10.2023', '10.00', 'Kuala Lumpur ', 'kualalumpur.jpg', 'Kuala Lumpur International Airport', 'KUL', 'Malaysia', '13.10.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', '2 stops'),
('2496741847', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '24.10.2023', '02.10', 'Casablanca', 'casablanca.jpg', 'Anfa Airport', 'CAS', 'Morocco', '31.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '20h 35m', 'Direct'),
('2564012782', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '18.10.2023', '15.35', 'Beijing', 'beijing.jpg', 'Beijing Nanyuan Airport', 'NAY', 'China', '25.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '10h 25m', 'Direct'),
('2608861235', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '10.10.2023', '15.35', 'Tokyo', 'tokyo.jpg', 'Narita International Airport', 'NRT', 'Japan', '17.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '1h 35m', '1 stop'),
('2627059452', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '09.10.2023', '15.35', 'Miami', 'miami.jpg', 'Miami International Airport', 'MIA', 'USA', '16.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '10h 25m', 'Direct'),
('2759850025', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '31.10.2023', '15.35', 'Zurich', 'zurich.jpg', 'Zürich Airport', 'ZRH', 'Switzerland', '07.11.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '0h 50m', '3 stops'),
('2822396474', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '24.10.2023', '15.35', 'Kiev ', 'kiev.jpg', 'Boryspil International Airport', 'KBP', 'Ukraine', '31.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '10h 25m', 'Direct'),
('2988826239', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '01.10.2023', '02.10', 'Fukushima', 'fukushima.jpg', 'Fukushima Airport', 'FKS', 'Japan', '08.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '3h 25m', '2 stops'),
('3000594005', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '31.10.2023', '02.10', 'Guam', 'guam.jpg', 'Guam International Airport', 'GUM', 'Guam', '07.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '20h 35m', 'Direct'),
('3014842538', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '18.10.2023', '15.35', 'Jacquinot Bay', 'jacquinotbay.jpg', 'Jacquinot Bay Airport', 'JAQ', 'Papua New Guinea', '25.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '0h 50m', 'Direct'),
('3018455459', 'New York', 'newyork.jpg', 'John F Kennedy International Airport', 'JFK', 'USA', '20.08.2023', '18.10', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '21.08.2023', '8:40', 'SAS', 'sas.png', 320, '7h 40m', '1 stop'),
('3024574179', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '10.10.2023', '02.10', 'Miami', 'miami.jpg', 'Miami International Airport', 'MIA', 'USA', '17.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 00m', '1 stop'),
('3036470199', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '26.10.2023', '02.10', 'Istanbul', 'istanbul.jpg', 'Atatürk International Airport', 'IST', 'Turkey', '02.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '20h 35m', 'Direct'),
('3038063626', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '11.10.2023', '10.00', 'Ibiza', 'ibiza.jpg', 'Ibiza Airport', 'IBZ', 'Spain', '18.10.2023', '14.30', 'SAS', 'sas.png', 349, '13h 25m', 'Direct'),
('3053947764', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '13.10.2023', '02.10', 'Xieng Khouang', 'xiengkhouang.jpg', 'Xieng Khouang Airport', 'XKH', 'Laos', '20.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '21h 55m', 'Direct'),
('3076744421', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '03.10.2023', '15.35', 'Damascus ', 'damascus.jpg', 'Damascus International Airport', 'DAM', 'Syria', '10.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '10h 25m', '2 stops'),
('3122884154', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '16.10.2023', '10.00', 'Grand Cayman', 'grandcayman.jpg', 'Owen Roberts International', 'GCM', 'Cayman Islands', '23.10.2023', '14.30', 'SAS', 'sas.png', 349, '13h 25m', 'Direct'),
('3128816711', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '10.10.2023', '15.35', 'Fukushima', 'fukushima.jpg', 'Fukushima Airport', 'FKS', 'Japan', '17.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', 'Direct'),
('3139732824', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '14.10.2023', '15.35', 'Belfast', 'belfast.jpg', 'Belfast International Airport', 'BFS', 'Northern Ireland', '21.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', 'Direct'),
('3177505868', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '09.10.2023', '10.00', 'Phuket', 'phuket.jpg', 'Phuket International Airport', 'HKT', 'Thailand', '16.10.2023', '14.30', 'SAS', 'sas.png', 349, '20h 40m', '2 stops'),
('3227537646', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '12.10.2023', '15.35', 'Antalya', 'antalya.jpg', 'Antalya Airport', 'AYT', 'Turkey', '19.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '22h 35m', 'Direct'),
('3246931804', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '31.10.2023', '10.00', 'Odense', 'odense.jpg', 'Hans Christian Andersen Airport', 'ODE', 'Denmark', '07.11.2023', '14.30', 'SAS', 'sas.png', 349, '20h 40m', 'Direct'),
('3256132698', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '09.10.2023', '15.35', 'Odense', 'odense.jpg', 'Hans Christian Andersen Airport', 'ODE', 'Denmark', '16.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '22h 35m', 'Direct'),
('3277894235', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '18.10.2023', '10.00', 'Oslo ', 'oslo.jpg', 'Gardermoen', 'OSL', 'Norway', '25.10.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', '2 stops'),
('3284203578', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '27.10.2023', '15.35', 'Geneva', 'geneva.jpg', 'Geneva-Cointrin International Airport', 'GVA', 'Switzerland', '03.11.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '1h 35m', '3 stops'),
('3303448156', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '22.10.2023', '10.00', 'Reykjavik', 'reykjavik.jpg', 'Keflavík International Airport', 'KEF', 'Iceland', '29.10.2023', '14.30', 'SAS', 'sas.png', 349, '7h 20m', '3 stops'),
('3356296028', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '27.10.2023', '10.00', 'Panama City ', 'panamacity.jpg', 'Tocumen International Airport', 'PTY', 'Panama', '03.11.2023', '14.30', 'SAS', 'sas.png', 349, '7h 20m', 'Direct'),
('3387703687', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '02.10.2023', '10.00', 'Madrid ', 'madrid.jpg', 'Barajas International Airport', 'MAD', 'Spain', '09.10.2023', '14.30', 'SAS', 'sas.png', 349, '1h 15m', '2 stops'),
('3405216024', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '15.10.2023', '15.35', 'Rome', 'rome.jpg', 'Ciampino Airport', 'CIA', 'Italy', '22.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '22h 35m', 'Direct'),
('3429756038', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '14.10.2023', '02.10', 'Queenstown', 'queenstown.jpg', 'Queenstown Airport', 'ZQN', 'New Zealand', '21.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '3h 25m', '2 stops'),
('3457223106', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '31.10.2023', '15.35', 'Rio de Janeiro', 'riodejaneiro.jpg', 'Santos Dumont Airport', 'SDU', 'Brazil', '07.11.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', 'Direct'),
('3470339574', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '18.10.2023', '15.35', 'New York', 'newyork.jpg', 'John F Kennedy International Airport', 'JFK', 'USA', '25.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '1h 35m', '2 stops'),
('3473312877', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '25.10.2023', '02.10', 'Yasawa', 'yasawa.jpg', 'Yasawa Island Airport', 'YAS', 'Fiji', '01.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '20h 35m', '2 stops'),
('3518141205', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '29.10.2023', '15.35', 'Delhi ', 'delhi.jpg', 'Indira Gandhi International Airport', 'DEL', 'India', '05.11.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '1h 35m', 'Direct'),
('3576230427', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '30.10.2023', '10.00', 'Hamilton', 'hamilton.jpg', 'Hamilton International Airport', 'HLZ', 'New Zealand', '06.11.2023', '14.30', 'SAS', 'sas.png', 349, '13h 15m', '2 stops'),
('3576784470', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '24.10.2023', '15.35', 'Freeport', 'freeport.jpg', 'Grand Bahama International Airport', 'FPO', 'Bahamas', '31.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '10h 25m', 'Direct'),
('3644078691', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '07.10.2023', '10.00', 'Aalborg', 'aalborg.jpg', 'Aalborg Airport', 'AAL', 'Denmark', '14.10.2023', '14.30', 'SAS', 'sas.png', 349, '1h 15m', 'Direct'),
('3655328534', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '06.10.2023', '15.35', 'Prague ', 'prague.jpg', 'Václav Havel Airport Prague', 'PRG', 'Czech Republic', '13.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '0h 50m', 'Direct'),
('3754530618', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '08.10.2023', '15.35', 'Amsterdam', 'amsterdam.jpg', 'Amsterdam Airport Schiphol', 'AMS', 'Netherlands', '15.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', 'Direct'),
('3754609332', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '30.10.2023', '15.35', 'Norrkoeping', 'norrkoeping.jpg', 'Norrköping Airport', 'NRK', 'Sweden', '06.11.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', '2 stops'),
('3797119536', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '21.10.2023', '02.10', 'Dakar', 'dakar.jpg', 'Blaise Diagne International Airport', 'DSS', 'Senegal', '28.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 20m', 'Direct'),
('3838499092', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '30.10.2023', '02.10', 'Pyongyang ', 'pyongyang.jpg', 'Sunan International Airport', 'FNJ', 'North Korea', '06.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 20m', '1 stop'),
('3856437082', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '12.10.2023', '10.00', 'Salvador', 'salvador.jpg', 'Salvador International Airport', 'SSA', 'Brazil', '19.10.2023', '14.30', 'SAS', 'sas.png', 349, '1h 15m', '1 stop'),
('3860429447', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '22.10.2023', '15.35', 'Cape Town', 'capetown.jpg', 'Cape Town International Airport', 'CPT', 'South Africa', '29.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', '3 stops'),
('3890108982', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '13.10.2023', '02.10', 'Union Island', 'unionisland.jpg', 'Union Island Airport', 'UNI', 'Saint Vincent and the Grenadines', '20.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 40m', '1 stop'),
('3907553058', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '30.10.2023', '02.10', 'Eindhoven', 'eindhoven.jpg', 'Eindhoven Airport', 'EIN', 'Netherlands', '06.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '20h 35m', '2 stops'),
('3978706784', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '16.10.2023', '15.35', 'Havana ', 'havana.jpg', 'José Martí International Airport', 'HAV', 'Cuba', '23.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '10h 25m', 'Direct'),
('4089225435', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '30.10.2023', '10.00', 'Bangkok', 'bangkok.jpg', 'Suvarnabhumi International Airport', 'BKK', 'Thailand', '06.11.2023', '14.30', 'SAS', 'sas.png', 349, '1h 15m', 'Direct'),
('4098372499', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '30.10.2023', '02.10', 'El Paso', 'elpaso.jpg', 'El Paso International Airport', 'ELP', 'USA', '06.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 40m', 'Direct'),
('4214292362', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '27.10.2023', '10.00', 'Jumla', 'jumla.jpg', 'Jumla Airport', 'JUM', 'Nepal', '03.11.2023', '14.30', 'SAS', 'sas.png', 349, '13h 15m', '1 stop'),
('4233863175', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '21.10.2023', '15.35', 'Xieng Khouang', 'xiengkhouang.jpg', 'Xieng Khouang Airport', 'XKH', 'Laos', '28.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', 'Direct'),
('4234658185', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '23.10.2023', '10.00', 'Chicago', 'chicago.jpg', 'Chicago O\'Hare International Airport', 'ORD', 'USA', '30.10.2023', '14.30', 'SAS', 'sas.png', 349, '1h 15m', 'Direct'),
('4243598623', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '17.10.2023', '02.10', 'Aalborg', 'aalborg.jpg', 'Aalborg Airport', 'AAL', 'Denmark', '24.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 40m', 'Direct'),
('4269985847', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '05.10.2023', '15.35', 'Guam', 'guam.jpg', 'Guam International Airport', 'GUM', 'Guam', '12.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '22h 35m', '1 stop'),
('4272143925', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '28.10.2023', '10.00', 'Havana ', 'havana.jpg', 'José Martí International Airport', 'HAV', 'Cuba', '04.11.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', '2 stops'),
('4286656810', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '02.10.2023', '02.10', 'Kuala Lumpur ', 'kualalumpur.jpg', 'Kuala Lumpur International Airport', 'KUL', 'Malaysia', '09.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '3h 25m', '2 stops'),
('4331866519', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '07.10.2023', '15.35', 'Oklahoma City', 'oklahomacity.jpg', 'Will Rogers World Airport', 'OKC', 'USA', '14.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '0h 50m', 'Direct'),
('4423144892', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '30.10.2023', '10.00', 'Cape Town', 'capetown.jpg', 'Cape Town International Airport', 'CPT', 'South Africa', '06.11.2023', '14.30', 'SAS', 'sas.png', 349, '13h 25m', '2 stops'),
('4440381340', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '05.10.2023', '15.35', 'Guatemala City ', 'guatemalacity.jpg', 'La Aurora International Airport', 'GUA', 'Guatemala', '12.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '0h 50m', '1 stop'),
('4507578360', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '20.10.2023', '15.35', 'Jumla', 'jumla.jpg', 'Jumla Airport', 'JUM', 'Nepal', '27.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '6h 10m', 'Direct'),
('4510972305', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '21.10.2023', '02.10', 'London', 'london.jpg', 'Heathrow Airport', 'LHR', 'England', '28.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '20h 35m', 'Direct'),
('4555340664', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '10.10.2023', '02.10', 'Zurich', 'zurich.jpg', 'Zürich Airport', 'ZRH', 'Switzerland', '17.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 40m', '2 stops'),
('4657156962', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '18.10.2023', '15.35', 'Panama City ', 'panamacity.jpg', 'Tocumen International Airport', 'PTY', 'Panama', '25.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '1h 35m', '1 stop'),
('4722380612', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '01.11.2023', '15.35', 'Bangkok', 'bangkok.jpg', 'Suvarnabhumi International Airport', 'BKK', 'Thailand', '08.11.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '0h 50m', '2 stops'),
('4728395365', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '01.11.2023', '10.00', 'Istanbul', 'istanbul.jpg', 'Atatürk International Airport', 'IST', 'Turkey', '08.11.2023', '14.30', 'SAS', 'sas.png', 349, '20h 40m', '3 stops'),
('4732037961', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '23.10.2023', '10.00', 'Vancouver', 'vancouver.jpg', 'Vancouver International Airport', 'YVR', 'Canada', '30.10.2023', '14.30', 'SAS', 'sas.png', 349, '13h 15m', 'Direct'),
('4774098989', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '23.10.2023', '02.10', 'Ulaanbaatar ', 'ulaanbaatar.jpg', 'Chinggis Khaan International Airport', 'UBN', 'Mongolia', '30.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '20h 35m', 'Direct'),
('4939266250', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '26.10.2023', '02.10', 'Rome', 'rome.jpg', 'Ciampino Airport', 'CIA', 'Italy', '02.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '20h 35m', 'Direct'),
('4943989968', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '31.10.2023', '10.00', 'Amsterdam', 'amsterdam.jpg', 'Amsterdam Airport Schiphol', 'AMS', 'Netherlands', '07.11.2023', '14.30', 'SAS', 'sas.png', 349, '13h 25m', 'Direct'),
('4950150124', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '06.10.2023', '02.10', 'Reykjavik', 'reykjavik.jpg', 'Keflavík International Airport', 'KEF', 'Iceland', '13.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '8h 23m', 'Direct'),
('4971146188', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '10.10.2023', '10.00', 'Rome', 'rome.jpg', 'Ciampino Airport', 'CIA', 'Italy', '17.10.2023', '14.30', 'SAS', 'sas.png', 349, '20h 40m', '1 stop'),
('4984631026', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '03.10.2023', '15.35', 'Dortmund', 'dortmund.jpg', 'Dortmund Airport', 'DTM', 'Germany', '10.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', 'Direct'),
('5076036035', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '23.10.2023', '02.10', 'Dortmund', 'dortmund.jpg', 'Dortmund Airport', 'DTM', 'Germany', '30.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '21h 55m', '1 stop'),
('5126935807', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '06.10.2023', '15.35', 'Yasawa', 'yasawa.jpg', 'Yasawa Island Airport', 'YAS', 'Fiji', '13.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '22h 35m', 'Direct'),
('5158568582', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '19.10.2023', '15.35', 'Fort Albany', 'fortalbany.jpg', 'Fort Albany Airport', 'YFA', 'Canada', '26.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '6h 10m', 'Direct'),
('5170918013', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '02.10.2023', '02.10', 'Vancouver', 'vancouver.jpg', 'Vancouver International Airport', 'YVR', 'Canada', '09.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 20m', '1 stop'),
('5172790752', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '15.10.2023', '02.10', 'Phuket', 'phuket.jpg', 'Phuket International Airport', 'HKT', 'Thailand', '22.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '20h 35m', '3 stops'),
('5196129334', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '03.10.2023', '15.35', 'Eindhoven', 'eindhoven.jpg', 'Eindhoven Airport', 'EIN', 'Netherlands', '10.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '22h 35m', '2 stops'),
('5313417744', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '31.10.2023', '10.00', 'Casablanca', 'casablanca.jpg', 'Anfa Airport', 'CAS', 'Morocco', '07.11.2023', '14.30', 'SAS', 'sas.png', 349, '20h 40m', 'Direct'),
('5325359110', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '01.10.2023', '10.00', 'Beijing', 'beijing.jpg', 'Beijing Nanyuan Airport', 'NAY', 'China', '08.10.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', 'Direct'),
('5330557647', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '02.10.2023', '10.00', 'New York', 'newyork.jpg', 'John F Kennedy International Airport', 'JFK', 'USA', '09.10.2023', '14.30', 'SAS', 'sas.png', 349, '7h 20m', 'Direct'),
('5387358832', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '16.10.2023', '10.00', 'Prague ', 'prague.jpg', 'Václav Havel Airport Prague', 'PRG', 'Czech Republic', '23.10.2023', '14.30', 'SAS', 'sas.png', 349, '1h 15m', '2 stops'),
('5419816447', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '05.10.2023', '15.35', 'Madrid ', 'madrid.jpg', 'Barajas International Airport', 'MAD', 'Spain', '12.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '0h 50m', '2 stops'),
('5468870732', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '28.10.2023', '10.00', 'Belfast', 'belfast.jpg', 'Belfast International Airport', 'BFS', 'Northern Ireland', '04.11.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', '1 stop'),
('5528979757', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '02.10.2023', '10.00', 'Miami', 'miami.jpg', 'Miami International Airport', 'MIA', 'USA', '09.10.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', 'Direct'),
('5532578914', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '24.10.2023', '15.35', 'Grand Cayman', 'grandcayman.jpg', 'Owen Roberts International', 'GCM', 'Cayman Islands', '31.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', 'Direct'),
('5552978636', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '12.10.2023', '02.10', 'Quanzhou', 'quanzhou.jpg', 'Quanzhou Jinjiang Airport', 'JJN', 'Fujian, China', '19.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 00m', '1 stop'),
('5557169934', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '08.10.2023', '10.00', 'Cancun', 'cancun.jpg', 'Cancún International Airport', 'CUN', 'Mexico', '15.10.2023', '14.30', 'SAS', 'sas.png', 349, '7h 20m', '1 stop'),
('5618007265', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '28.10.2023', '10.00', 'Fort Albany', 'fortalbany.jpg', 'Fort Albany Airport', 'YFA', 'Canada', '04.11.2023', '14.30', 'SAS', 'sas.png', 349, '13h 15m', 'Direct'),
('5623225118', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '26.10.2023', '02.10', 'Geneva', 'geneva.jpg', 'Geneva-Cointrin International Airport', 'GVA', 'Switzerland', '02.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '8h 23m', '2 stops'),
('5652171393', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '09.10.2023', '02.10', 'Antalya', 'antalya.jpg', 'Antalya Airport', 'AYT', 'Turkey', '16.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '20h 35m', '1 stop'),
('5674393465', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '06.10.2023', '15.35', 'Salvador', 'salvador.jpg', 'Salvador International Airport', 'SSA', 'Brazil', '13.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '0h 50m', 'Direct'),
('5711490080', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '02.10.2023', '02.10', 'Prague ', 'prague.jpg', 'Václav Havel Airport Prague', 'PRG', 'Czech Republic', '09.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 40m', 'Direct'),
('5790368983', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '25.10.2023', '10.00', 'Pyongyang ', 'pyongyang.jpg', 'Sunan International Airport', 'FNJ', 'North Korea', '01.11.2023', '14.30', 'SAS', 'sas.png', 349, '13h 15m', 'Direct'),
('5802291354', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '19.10.2023', '15.35', 'Ibiza', 'ibiza.jpg', 'Ibiza Airport', 'IBZ', 'Spain', '26.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', '2 stops'),
('5817145467', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '31.10.2023', '10.00', 'Helsinki', 'helsinki.jpg', 'Helsinki-Vantaa Airport', 'HEL', 'Finland', '07.11.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', 'Direct'),
('5828980862', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '07.10.2023', '02.10', 'Toronto', 'toronto.jpg', 'Toronto Pearson International Airport', 'YYZ', 'Canada', '14.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '21h 55m', '3 stops'),
('5851486033', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '29.10.2023', '10.00', 'Fukushima', 'fukushima.jpg', 'Fukushima Airport', 'FKS', 'Japan', '05.11.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', '1 stop'),
('5860989759', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '03.10.2023', '10.00', 'Aberdeen', 'aberdeen.jpg', 'Aberdeen International Airport', 'ABZ', 'Scotland', '10.10.2023', '14.30', 'SAS', 'sas.png', 349, '13h 15m', 'Direct'),
('5895169934', 'Barcelona', 'barcelona.jpg', 'Barcelona El Prat Airport', 'BCN', 'Spain', '18.10.2023', '15.20', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '18.10.2023', '19.15', 'Norwegian', 'norwegian.png', 180, '4h 50m', 'Direct'),
('5976882305', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '28.10.2023', '15.35', 'Abu Dhabi ', 'abudhabi.jpg', 'Abu Dhabi International', 'AUH', 'United Arab Emirates', '04.11.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '10h 25m', '1 stop'),
('6008645694', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '01.11.2023', '10.00', 'Jacquinot Bay', 'jacquinotbay.jpg', 'Jacquinot Bay Airport', 'JAQ', 'Papua New Guinea', '08.11.2023', '14.30', 'SAS', 'sas.png', 349, '1h 15m', 'Direct'),
('6062353679', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '21.10.2023', '15.35', 'Helsinki', 'helsinki.jpg', 'Helsinki-Vantaa Airport', 'HEL', 'Finland', '28.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', 'Direct'),
('6087330655', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '19.10.2023', '15.35', 'Chicago', 'chicago.jpg', 'Chicago O\'Hare International Airport', 'ORD', 'USA', '26.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '0h 50m', '1 stop'),
('6097092513', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '28.10.2023', '02.10', 'Jacquinot Bay', 'jacquinotbay.jpg', 'Jacquinot Bay Airport', 'JAQ', 'Papua New Guinea', '04.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 40m', 'Direct'),
('6236842352', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '20.10.2023', '02.10', 'Jumla', 'jumla.jpg', 'Jumla Airport', 'JUM', 'Nepal', '27.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 20m', 'Direct'),
('6254971423', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '24.10.2023', '10.00', 'Queenstown', 'queenstown.jpg', 'Queenstown Airport', 'ZQN', 'New Zealand', '31.10.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', 'Direct'),
('6288645102', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '01.11.2023', '02.10', 'Norrkoeping', 'norrkoeping.jpg', 'Norrköping Airport', 'NRK', 'Sweden', '08.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '21h 55m', 'Direct'),
('6308098459', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '29.10.2023', '02.10', 'Salvador', 'salvador.jpg', 'Salvador International Airport', 'SSA', 'Brazil', '05.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 40m', '2 stops'),
('6308484779', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '23.10.2023', '10.00', 'David', 'david.jpg', 'Enrique Malek International Airport', 'DAV', 'Panama', '30.10.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', '2 stops'),
('6333192333', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '20.10.2023', '10.00', 'Abu Dhabi ', 'abudhabi.jpg', 'Abu Dhabi International', 'AUH', 'United Arab Emirates', '27.10.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', 'Direct'),
('6353234913', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '31.10.2023', '10.00', 'Delhi ', 'delhi.jpg', 'Indira Gandhi International Airport', 'DEL', 'India', '07.11.2023', '14.30', 'SAS', 'sas.png', 349, '7h 20m', 'Direct'),
('6368967602', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '16.10.2023', '15.35', 'Union Island', 'unionisland.jpg', 'Union Island Airport', 'UNI', 'Saint Vincent and the Grenadines', '23.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '0h 50m', 'Direct'),
('6396214486', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '05.10.2023', '15.35', 'Moscow', 'moscow.jpg', 'Domodedovo International Airport', 'DME', 'Russia', '12.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', 'Direct'),
('6417170794', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '27.10.2023', '15.35', 'Palma de Mallorca', 'palmademallorca.jpg', 'Palma de Mallorca Airport', 'PMI', 'Spain', '03.11.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', 'Direct'),
('6420118226', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '06.10.2023', '15.35', 'Washington D.C.', 'washingtond.c..jpg', 'Washington Dulles International', 'IAD', 'USA', '13.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', '2 stops'),
('6436522054', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '28.10.2023', '15.35', 'Manchester', 'manchester.jpg', 'Manchester Airport', 'MAN', 'England', '04.11.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '6h 10m', 'Direct'),
('6475620251', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '19.10.2023', '15.35', 'Aalborg', 'aalborg.jpg', 'Aalborg Airport', 'AAL', 'Denmark', '26.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '0h 50m', 'Direct'),
('6500026332', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '11.10.2023', '10.00', 'London', 'london.jpg', 'Heathrow Airport', 'LHR', 'England', '18.10.2023', '14.30', 'SAS', 'sas.png', 349, '20h 40m', 'Direct'),
('6575039976', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '18.10.2023', '15.35', 'David', 'david.jpg', 'Enrique Malek International Airport', 'DAV', 'Panama', '25.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', 'Direct'),
('6589897198', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '16.10.2023', '02.10', 'Kiev ', 'kiev.jpg', 'Boryspil International Airport', 'KBP', 'Ukraine', '23.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 00m', '2 stops'),
('6604954342', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '13.10.2023', '10.00', 'Barcelona', 'barcelona.jpg', 'Barcelona El Prat Airport', 'BCN', 'Spain', '20.10.2023', '14.30', 'SAS', 'sas.png', 349, '13h 15m', '3 stops'),
('6623619135', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '21.10.2023', '02.10', 'Tokyo', 'tokyo.jpg', 'Narita International Airport', 'NRT', 'Japan', '28.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '8h 23m', 'Direct'),
('6627928981', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '02.10.2023', '15.35', 'Paris', 'paris.jpg', 'Charles de Gaulle Airport', 'CDG', 'France', '09.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', '1 stop'),
('6633997596', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '11.10.2023', '10.00', 'Wuhan', 'wuhan.jpg', 'Wuhan Tianhe International', 'WUH', 'China', '18.10.2023', '14.30', 'SAS', 'sas.png', 349, '7h 20m', 'Direct'),
('6644721865', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '11.10.2023', '02.10', 'Hamilton', 'hamilton.jpg', 'Hamilton International Airport', 'HLZ', 'New Zealand', '18.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 20m', '3 stops'),
('6683986829', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '04.10.2023', '02.10', 'David', 'david.jpg', 'Enrique Malek International Airport', 'DAV', 'Panama', '11.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '3h 25m', 'Direct'),
('6685135796', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '21.10.2023', '10.00', 'Guam', 'guam.jpg', 'Guam International Airport', 'GUM', 'Guam', '28.10.2023', '14.30', 'SAS', 'sas.png', 349, '20h 40m', 'Direct'),
('6809358847', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '27.10.2023', '15.35', 'Quanzhou', 'quanzhou.jpg', 'Quanzhou Jinjiang Airport', 'JJN', 'Fujian, China', '03.11.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '10h 25m', 'Direct'),
('6849105580', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '16.10.2023', '02.10', 'Barcelona', 'barcelona.jpg', 'Barcelona El Prat Airport', 'BCN', 'Spain', '23.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 20m', 'Direct'),
('6904234522', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '22.10.2023', '02.10', 'Havana ', 'havana.jpg', 'José Martí International Airport', 'HAV', 'Cuba', '29.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 00m', 'Direct'),
('6943238605', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '17.10.2023', '10.00', 'El Paso', 'elpaso.jpg', 'El Paso International Airport', 'ELP', 'USA', '24.10.2023', '14.30', 'SAS', 'sas.png', 349, '1h 15m', '3 stops'),
('7107712514', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '11.10.2023', '02.10', 'Damascus ', 'damascus.jpg', 'Damascus International Airport', 'DAM', 'Syria', '18.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 00m', '3 stops'),
('7113958410', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '01.10.2023', '10.00', 'Antalya', 'antalya.jpg', 'Antalya Airport', 'AYT', 'Turkey', '08.10.2023', '14.30', 'SAS', 'sas.png', 349, '20h 40m', 'Direct'),
('7115235451', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '06.10.2023', '15.35', 'San Francisco', 'sanfrancisco.jpg', 'San Francisco International Airport', 'SFO', 'USA', '13.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '6h 10m', '3 stops'),
('7134790524', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '09.10.2023', '10.00', 'Washington D.C.', 'washingtond.c..jpg', 'Washington Dulles International', 'IAD', 'USA', '16.10.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', '3 stops'),
('7157919888', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '02.10.2023', '15.35', 'Queenstown', 'queenstown.jpg', 'Queenstown Airport', 'ZQN', 'New Zealand', '09.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', '2 stops'),
('7194484129', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '31.10.2023', '02.10', 'Grand Cayman', 'grandcayman.jpg', 'Owen Roberts International', 'GCM', 'Cayman Islands', '07.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '21h 55m', 'Direct'),
('7238252522', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '15.10.2023', '15.35', 'Casablanca', 'casablanca.jpg', 'Anfa Airport', 'CAS', 'Morocco', '22.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '22h 35m', 'Direct'),
('7257563525', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '24.10.2023', '15.35', 'Toronto', 'toronto.jpg', 'Toronto Pearson International Airport', 'YYZ', 'Canada', '31.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', '2 stops'),
('7271760228', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '09.10.2023', '10.00', 'Singapore', 'singapore.jpg', 'Changi Airport Singapore', 'SIN', 'Singapore', '16.10.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', 'Direct'),
('7291850473', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '17.10.2023', '02.10', 'Fort Albany', 'fortalbany.jpg', 'Fort Albany Airport', 'YFA', 'Canada', '24.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 20m', 'Direct'),
('7292311957', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '09.10.2023', '15.35', 'Aberdeen', 'aberdeen.jpg', 'Aberdeen International Airport', 'ABZ', 'Scotland', '16.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '6h 10m', '1 stop'),
('7305457234', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '23.10.2023', '15.35', 'Vancouver', 'vancouver.jpg', 'Vancouver International Airport', 'YVR', 'Canada', '30.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '6h 10m', 'Direct'),
('7321866829', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '28.10.2023', '02.10', 'Madrid ', 'madrid.jpg', 'Barajas International Airport', 'MAD', 'Spain', '04.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 40m', '3 stops'),
('7355412420', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '07.10.2023', '10.00', 'Quanzhou', 'quanzhou.jpg', 'Quanzhou Jinjiang Airport', 'JJN', 'Fujian, China', '14.10.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', 'Direct'),
('7379382116', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '20.10.2023', '15.35', 'Wuhan', 'wuhan.jpg', 'Wuhan Tianhe International', 'WUH', 'China', '27.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '1h 35m', 'Direct'),
('7382553913', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '08.10.2023', '02.10', 'Panama City ', 'panamacity.jpg', 'Tocumen International Airport', 'PTY', 'Panama', '15.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '8h 23m', 'Direct'),
('7428377341', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '01.11.2023', '02.10', 'Washington D.C.', 'washingtond.c..jpg', 'Washington Dulles International', 'IAD', 'USA', '08.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '3h 25m', 'Direct'),
('7431967289', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '24.10.2023', '15.35', 'Kuala Lumpur ', 'kualalumpur.jpg', 'Kuala Lumpur International Airport', 'KUL', 'Malaysia', '31.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', '3 stops'),
('7507873953', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '13.10.2023', '15.35', 'Cancun', 'cancun.jpg', 'Cancún International Airport', 'CUN', 'Mexico', '20.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '1h 35m', 'Direct'),
('7524884050', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '12.10.2023', '10.00', 'Oklahoma City', 'oklahomacity.jpg', 'Will Rogers World Airport', 'OKC', 'USA', '19.10.2023', '14.30', 'SAS', 'sas.png', 349, '1h 15m', '1 stop'),
('7611681787', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '30.10.2023', '15.35', 'Reykjavik', 'reykjavik.jpg', 'Keflavík International Airport', 'KEF', 'Iceland', '06.11.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '1h 35m', '2 stops'),
('7624621070', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '09.10.2023', '02.10', 'Freeport', 'freeport.jpg', 'Grand Bahama International Airport', 'FPO', 'Bahamas', '16.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 00m', 'Direct'),
('7625048325', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '27.10.2023', '15.35', 'London', 'london.jpg', 'Heathrow Airport', 'LHR', 'England', '03.11.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '22h 35m', '1 stop'),
('7806687090', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '05.10.2023', '02.10', 'Osaka', 'osaka.jpg', 'Kansai International Airport', 'KIX', 'Japan', '12.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 20m', '2 stops'),
('7867432917', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '18.10.2023', '15.35', 'Ulaanbaatar ', 'ulaanbaatar.jpg', 'Chinggis Khaan International Airport', 'UBN', 'Mongolia', '25.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '22h 35m', 'Direct'),
('7960245889', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '17.10.2023', '02.10', 'Lagos', 'lagos.jpg', 'Murtala Muhammed International Airport', 'LOS', 'Nigeria', '24.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '8h 23m', 'Direct'),
('7991306584', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '01.10.2023', '10.00', 'Freeport', 'freeport.jpg', 'Grand Bahama International Airport', 'FPO', 'Bahamas', '08.10.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', '1 stop'),
('8080976023', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '10.10.2023', '02.10', 'Ibiza', 'ibiza.jpg', 'Ibiza Airport', 'IBZ', 'Spain', '17.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '21h 55m', '2 stops');
INSERT INTO `flights` (`flight_id`, `departure_city`, `departure_city_img`, `departure_airport`, `departure_airport_code`, `departure_country`, `departure_date`, `departure_time`, `arrival_city`, `arrival_city_img`, `arrival_airport`, `arrival_airport_code`, `arrival_country`, `arrival_date`, `arrival_time`, `airline`, `airline_logo`, `flight_price`, `travel_duration`, `stops`) VALUES
('8083032957', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '06.10.2023', '10.00', 'Yasawa', 'yasawa.jpg', 'Yasawa Island Airport', 'YAS', 'Fiji', '13.10.2023', '14.30', 'SAS', 'sas.png', 349, '20h 40m', '1 stop'),
('8103508126', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '27.10.2023', '10.00', 'Manchester', 'manchester.jpg', 'Manchester Airport', 'MAN', 'England', '03.11.2023', '14.30', 'SAS', 'sas.png', 349, '13h 15m', '2 stops'),
('8157699657', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '29.10.2023', '10.00', 'Shanghai', 'shanghai.jpg', 'Hongqiao International Airport', 'SHA', 'China', '05.11.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', 'Direct'),
('8180103508', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '01.10.2023', '02.10', 'Delhi ', 'delhi.jpg', 'Indira Gandhi International Airport', 'DEL', 'India', '08.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '8h 23m', '1 stop'),
('8195993299', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '30.10.2023', '10.00', 'Paris', 'paris.jpg', 'Charles de Gaulle Airport', 'CDG', 'France', '06.11.2023', '14.30', 'SAS', 'sas.png', 349, '13h 25m', 'Direct'),
('8260193123', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '16.10.2023', '10.00', 'Tokyo', 'tokyo.jpg', 'Narita International Airport', 'NRT', 'Japan', '23.10.2023', '14.30', 'SAS', 'sas.png', 349, '7h 20m', 'Direct'),
('8269532459', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '20.10.2023', '10.00', 'Xieng Khouang', 'xiengkhouang.jpg', 'Xieng Khouang Airport', 'XKH', 'Laos', '27.10.2023', '14.30', 'SAS', 'sas.png', 349, '13h 25m', '1 stop'),
('8271364009', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '11.10.2023', '02.10', 'Akita', 'akita.jpg', 'Akita Airport', 'AXT', 'Japan', '18.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '8h 23m', 'Direct'),
('8280557649', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '16.10.2023', '10.00', 'San Francisco', 'sanfrancisco.jpg', 'San Francisco International Airport', 'SFO', 'USA', '23.10.2023', '14.30', 'SAS', 'sas.png', 349, '13h 15m', '2 stops'),
('8330590458', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '24.10.2023', '15.35', 'Shanghai', 'shanghai.jpg', 'Hongqiao International Airport', 'SHA', 'China', '31.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '10h 25m', 'Direct'),
('8385083864', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '10.10.2023', '10.00', 'Geneva', 'geneva.jpg', 'Geneva-Cointrin International Airport', 'GVA', 'Switzerland', '17.10.2023', '14.30', 'SAS', 'sas.png', 349, '7h 20m', '2 stops'),
('8456997923', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '25.10.2023', '02.10', 'Amsterdam', 'amsterdam.jpg', 'Amsterdam Airport Schiphol', 'AMS', 'Netherlands', '01.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '21h 55m', '1 stop'),
('8507202383', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '01.11.2023', '15.35', 'Hamilton', 'hamilton.jpg', 'Hamilton International Airport', 'HLZ', 'New Zealand', '08.11.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '6h 10m', '2 stops'),
('8535527507', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '16.10.2023', '02.10', 'Odense', 'odense.jpg', 'Hans Christian Andersen Airport', 'ODE', 'Denmark', '23.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '20h 35m', 'Direct'),
('8552753507', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '15.10.2023', '15.35', 'Pyongyang ', 'pyongyang.jpg', 'Sunan International Airport', 'FNJ', 'North Korea', '22.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '6h 10m', 'Direct'),
('8610543324', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '10.10.2023', '02.10', 'Venice', 'venice.jpg', 'Venice Marco Polo Airport', 'VCE', 'Italy', '17.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 00m', '2 stops'),
('8633883912', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '06.10.2023', '02.10', 'Shanghai', 'shanghai.jpg', 'Hongqiao International Airport', 'SHA', 'China', '13.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 00m', 'Direct'),
('8712801217', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '19.10.2023', '10.00', 'Kiev ', 'kiev.jpg', 'Boryspil International Airport', 'KBP', 'Ukraine', '26.10.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', '1 stop'),
('8733532634', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '07.10.2023', '02.10', 'Paris', 'paris.jpg', 'Charles de Gaulle Airport', 'CDG', 'France', '14.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '21h 55m', 'Direct'),
('8898339791', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '20.10.2023', '02.10', 'San Francisco', 'sanfrancisco.jpg', 'San Francisco International Airport', 'SFO', 'USA', '27.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 20m', '2 stops'),
('8957825252', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '31.10.2023', '10.00', 'Lima ', 'lima.jpg', 'Jorge Chávez International Airport', 'LIM', 'Peru', '07.11.2023', '14.30', 'SAS', 'sas.png', 349, '13h 25m', 'Direct'),
('8993651168', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '25.10.2023', '10.00', 'Moscow', 'moscow.jpg', 'Domodedovo International Airport', 'DME', 'Russia', '01.11.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', 'Direct'),
('9090515563', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '31.10.2023', '15.35', 'Venice', 'venice.jpg', 'Venice Marco Polo Airport', 'VCE', 'Italy', '07.11.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '10h 25m', '2 stops'),
('9135055166', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '28.10.2023', '02.10', 'Singapore', 'singapore.jpg', 'Changi Airport Singapore', 'SIN', 'Singapore', '04.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '3h 25m', 'Direct'),
('9159586122', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '03.10.2023', '10.00', 'Zurich', 'zurich.jpg', 'Zürich Airport', 'ZRH', 'Switzerland', '10.10.2023', '14.30', 'SAS', 'sas.png', 349, '1h 15m', '2 stops'),
('9173337530', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '08.10.2023', '10.00', 'Osaka', 'osaka.jpg', 'Kansai International Airport', 'KIX', 'Japan', '15.10.2023', '14.30', 'SAS', 'sas.png', 349, '13h 15m', '1 stop'),
('9242657763', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '11.10.2023', '02.10', 'Palma de Mallorca', 'palmademallorca.jpg', 'Palma de Mallorca Airport', 'PMI', 'Spain', '18.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '3h 25m', 'Direct'),
('9298243116', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '16.10.2023', '15.35', 'Singapore', 'singapore.jpg', 'Changi Airport Singapore', 'SIN', 'Singapore', '23.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '3h 25m', '1 stop'),
('9298957997', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '09.10.2023', '15.35', 'Barcelona', 'barcelona.jpg', 'Barcelona El Prat Airport', 'BCN', 'Spain', '16.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '6h 10m', '2 stops'),
('9326790647', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '24.10.2023', '02.10', 'Bangkok', 'bangkok.jpg', 'Suvarnabhumi International Airport', 'BKK', 'Thailand', '31.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 40m', '2 stops'),
('9356999925', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '11.10.2023', '15.35', 'Oslo ', 'oslo.jpg', 'Gardermoen', 'OSL', 'Norway', '18.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '10h 25m', '3 stops'),
('9404400030', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '25.10.2023', '15.35', 'El Paso', 'elpaso.jpg', 'El Paso International Airport', 'ELP', 'USA', '01.11.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '0h 50m', '2 stops'),
('9408657353', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '08.10.2023', '10.00', 'Dakar', 'dakar.jpg', 'Blaise Diagne International Airport', 'DSS', 'Senegal', '15.10.2023', '14.30', 'SAS', 'sas.png', 349, '13h 15m', 'Direct'),
('9444542392', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '24.10.2023', '15.35', 'Phuket', 'phuket.jpg', 'Phuket International Airport', 'HKT', 'Thailand', '31.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '22h 35m', '2 stops'),
('9450639154', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '25.10.2023', '02.10', 'Aberdeen', 'aberdeen.jpg', 'Aberdeen International Airport', 'ABZ', 'Scotland', '01.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 20m', 'Direct'),
('9532413691', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '04.10.2023', '10.00', 'Norrkoeping', 'norrkoeping.jpg', 'Norrköping Airport', 'NRK', 'Sweden', '11.10.2023', '14.30', 'SAS', 'sas.png', 349, '13h 25m', '3 stops'),
('9535566209', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '25.10.2023', '02.10', 'Beijing', 'beijing.jpg', 'Beijing Nanyuan Airport', 'NAY', 'China', '01.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '2h 00m', 'Direct'),
('9537842104', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '19.10.2023', '10.00', 'Palma de Mallorca', 'palmademallorca.jpg', 'Palma de Mallorca Airport', 'PMI', 'Spain', '26.10.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', 'Direct'),
('9633078329', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '01.11.2023', '10.00', 'Adelaide', 'adelaide.jpg', 'Adelaide Airport', 'ADL', 'Australia', '08.11.2023', '14.30', 'SAS', 'sas.png', 349, '2h 00m', '2 stops'),
('9722159128', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '18.10.2023', '15.35', 'Osaka', 'osaka.jpg', 'Kansai International Airport', 'KIX', 'Japan', '25.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '6h 10m', 'Direct'),
('9765230677', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '16.10.2023', '02.10', 'Honolulu', 'honolulu.jpg', 'Daniel K. Inouye International Airport', 'HNL', 'USA, Hawaii', '23.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '8h 23m', '1 stop'),
('9765421276', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '04.10.2023', '10.00', 'Eindhoven', 'eindhoven.jpg', 'Eindhoven Airport', 'EIN', 'Netherlands', '11.10.2023', '14.30', 'SAS', 'sas.png', 349, '20h 40m', 'Direct'),
('9824866015', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '11.10.2023', '02.10', 'Cancun', 'cancun.jpg', 'Cancún International Airport', 'CUN', 'Mexico', '18.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '8h 23m', '2 stops'),
('9849521345', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '29.10.2023', '02.10', 'Rio de Janeiro', 'riodejaneiro.jpg', 'Santos Dumont Airport', 'SDU', 'Brazil', '05.11.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '21h 55m', 'Direct'),
('9868940922', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '02.10.2023', '02.10', 'Wuhan', 'wuhan.jpg', 'Wuhan Tianhe International', 'WUH', 'China', '09.10.2023', '06.40', 'Lufthansa', 'lufthansa.png', 1149, '8h 23m', 'Direct'),
('9971162722', 'Copenhagen', 'copenhagen.jpg', 'Copenhagen Airport', 'CPH', 'Denmark', '06.10.2023', '15.35', 'Akita', 'akita.jpg', 'Akita Airport', 'AXT', 'Japan', '13.10.2023', '20.05', 'Norwegian', 'norwegian.png', 599, '1h 35m', 'Direct');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `flights`
--
ALTER TABLE `flights`
  ADD UNIQUE KEY `flight_id` (`flight_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
