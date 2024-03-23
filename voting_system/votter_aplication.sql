-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2024 at 09:33 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votter_aplication`
--

-- --------------------------------------------------------

--
-- Table structure for table `canditors`
--

CREATE TABLE `canditors` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `nid_number` varchar(20) NOT NULL,
  `distic` varchar(100) NOT NULL,
  `symbol_name` varchar(100) NOT NULL,
  `canditor_photo` varchar(100) NOT NULL,
  `symble_photo` varchar(100) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `canditors`
--

INSERT INTO `canditors` (`id`, `name`, `email`, `phone`, `nid_number`, `distic`, `symbol_name`, `canditor_photo`, `symble_photo`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Mahi Apa', 'mahi@mailinator.com', '+1 (345) 815-5562', '1232343', 'rorocuk', 'Truck', '3377.jpeg', '4290.jpg', 1, NULL, '2024-03-22 20:37:34'),
(2, 'Hiro Alom', 'hiro@gmail.com', '+1 (371) 167-2693', '2123565676', 'gyper', 'Aktara', '4470.jpeg', '6567.png', 1, NULL, '2024-03-22 20:39:53'),
(3, 'Samim Usman', 'samim@gmail.com', '+1 (113) 235-8045', '124234535', 'xufo', 'Car', '5344.jpeg', '2950.jpg', 1, NULL, '2024-03-22 20:41:34'),
(4, 'Chamily', 'chamily@gmail.com', '+1 (374) 438-5009', '2345454', 'moc', 'Goru Gari', '9869.jpeg', '5068.jpg', 0, NULL, '2024-03-22 20:43:49'),
(5, 'Mofiz', 'mofiz@gmail.com', '+1 (393) 158-1846', '1243234355', 'moc', 'Kodal', '4617.jpeg', '4047.jpeg', 1, NULL, '2024-03-22 20:45:36');

-- --------------------------------------------------------

--
-- Table structure for table `comitionar`
--

CREATE TABLE `comitionar` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT 'Admin',
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comitionar`
--

INSERT INTO `comitionar` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$jf4Z/PQBiFPUi2Oyw.KhNuUalQcnQw6Q9N4g2xH0woqYWUMyciAC6');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `birth_day` date NOT NULL,
  `nid_number` varchar(20) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `subdistrict` varchar(100) NOT NULL,
  `zip` int NOT NULL,
  `village` varchar(100) NOT NULL,
  `photo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `name`, `email`, `phone`, `father_name`, `mother_name`, `birth_day`, `nid_number`, `gender`, `district`, `subdistrict`, `zip`, `village`, `photo`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 'sk', 'rovybesup@mailinator.com', '+8801304460275', 'Macy Morrison', 'Erich Lang', '1999-11-05', '92021454676', 'femail', 'Exercitationem quis ', 'Id quis animi perfe', 43012, 'Dolor et est modi au', '3402.jpeg', '2024-03-22 21:29:47', NULL, '2024-03-22 20:27:17'),
(3, 'Lewis Hobbs', 'xoluwojuzo@mailinator.com', '+1 (599) 317-5473', 'Sydney Mercado', 'Quail Jimenez', '2020-12-11', '928465687768', 'mail', 'Dolore sint tempor d', 'Ullam voluptatem Co', 93260, 'Exercitation suscipi', '9904.jpeg', NULL, NULL, '2024-03-22 20:27:48'),
(4, 'Dylan Barlow', 'soxofyqyxu@mailinator.com', '+1 (258) 317-8449', 'Mikayla Olsen', 'Kellie Herring', '2004-06-14', '455325457876', 'femail', 'Ea quia itaque volup', 'Quia distinctio Mag', 92719, 'Cillum impedit nost', '9775.jpeg', NULL, NULL, '2024-03-22 20:28:03'),
(5, 'Nyssa Howard', 'pesovenu@mailinator.com', '+1 (331) 879-1612', 'Bell Richard', 'Uriel Moore', '1971-11-10', '2722354565787', 'mail', 'Ut id dolores pariat', 'Repellendus Eos iu', 22161, 'Proident proident ', '2251.jpeg', NULL, NULL, '2024-03-22 20:28:17'),
(6, 'Jaime Ratliff', 'naloj@mailinator.com', '+1 (573) 937-2325', 'Lysandra Bradford', 'Nyssa Kemp', '1987-07-17', '4633456776876', 'other', 'Ipsa voluptatem bla', 'Laudantium culpa r', 22143, 'Tempor laborum sit a', '5518.jpeg', NULL, NULL, '2024-03-22 20:28:31'),
(7, 'Madeline Cochran', 'kadebi@mailinator.com', '+1 (213) 315-6424', 'Lacota Kim', 'Remedios Hutchinson', '1990-12-14', '8373455677688', 'femail', 'Dolore unde commodi ', 'Id officia molestiae', 10322, 'Ullamco esse culpa n', '4291.jpeg', NULL, NULL, '2024-03-22 20:28:43'),
(8, 'Barclay Williams', 'dupeq@mailinator.com', '+1 (318) 115-8452', 'Cruz Higgins', 'Jade Ashley', '2011-10-02', '23854687987', 'mail', 'Adipisicing et quis ', 'Nostrud qui obcaecat', 92155, 'Nisi impedit rem id', '4756.jpeg', NULL, NULL, '2024-03-22 20:28:57'),
(9, 'Odessa Kent', 'melym@mailinator.com', '+1 (419) 417-4615', 'Samson Nash', 'Brenda Cantu', '2020-04-27', '71423545765687', 'mail', 'Nam qui rerum aut vo', 'Incididunt minus odi', 18998, 'Repudiandae voluptas', '5519.jpeg', NULL, NULL, '2024-03-22 20:29:15'),
(10, 'Taylor Moses', 'rigulahibu@mailinator.com', '+1 (647) 335-4978', 'Jerome Bolton', 'Casey West', '2002-08-20', '491235457687', 'mail', 'Voluptas eius sit vo', 'Accusantium cupidita', 71698, 'Maiores rerum explic', '1502.jpeg', NULL, NULL, '2024-03-22 20:29:30'),
(11, 'Silas Quinn', 'zeruhexa@mailinator.com', '+1 (575) 413-5677', 'Edward Key', 'Colton Jenkins', '1974-07-19', '63234346554765', 'femail', 'Odio ex ut nulla mol', 'Non nisi quisquam qu', 80710, 'Quod quis fugit aut', '3908.jpeg', NULL, NULL, '2024-03-22 20:29:56'),
(12, 'Medge Mcclure', 'kevezy@mailinator.com', '+1 (893) 341-3921', 'Rhoda Matthews', 'Malachi Greene', '1993-10-16', '713243456456776', 'other', 'Corrupti fuga Simi', 'Cupidatat aut quis d', 65858, 'Nihil eum ex perspic', '7268.jpeg', NULL, NULL, '2024-03-22 20:30:16'),
(13, 'Tallulah Haley', 'buxem@mailinator.com', '+1 (315) 631-7977', 'Phyllis Navarro', 'Cullen Mclaughlin', '2023-05-18', '539235446567', 'other', 'Porro culpa non omni', 'Veritatis ad est eum', 10588, 'Autem ex ea amet es', '5821.png', NULL, NULL, '2024-03-22 20:30:35'),
(14, 'Noble Puckett', 'gacosyn@mailinator.com', '+1 (878) 155-7156', 'Claudia Harmon', 'Jacob Salas', '1992-12-02', '6102344356567', 'mail', 'Aut minim quia nihil', 'Irure rerum quidem h', 82861, 'Qui id sunt ipsam qu', '8448.jpeg', NULL, NULL, '2024-03-22 20:32:12'),
(15, 'Berk Curtis', 'bodypiq@mailinator.com', '+1 (105) 181-8195', 'Timon Holder', 'Stacey Foreman', '2017-06-18', '8302345346556', 'mail', 'Quo cillum minima et', 'Laudantium minus mi', 32770, 'Adipisci aut ut iure', '2474.jpeg', NULL, NULL, '2024-03-22 20:32:25'),
(16, 'Carla Holder', 'wujob@mailinator.com', '+1 (704) 316-9892', 'Moses Frye', 'Stewart Gates', '1975-05-21', '192234354355', 'other', 'Labore similique aut', 'Iste saepe consequat', 50600, 'Neque enim voluptate', '5115.jpg', NULL, NULL, '2024-03-22 21:23:07'),
(17, 'Connor Kemp', 'kolyn@mailinator.com', '+1 (448) 762-5355', 'Gregory Cote', 'Shad Ray', '1977-07-11', '787243245345', 'mail', 'Reiciendis possimus', 'Consectetur doloribu', 70388, 'Aspernatur proident', '7120.jpeg', NULL, NULL, '2024-03-22 21:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `voter_list`
--

CREATE TABLE `voter_list` (
  `id` int NOT NULL,
  `canditor_id` int NOT NULL,
  `voter_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `voter_list`
--

INSERT INTO `voter_list` (`id`, `canditor_id`, `voter_id`) VALUES
(1, 1, 1),
(2, 3, 3),
(3, 2, 5),
(4, 1, 6),
(5, 3, 8),
(6, 3, 9),
(7, 3, 10),
(8, 1, 11),
(9, 1, 12),
(10, 1, 13),
(11, 1, 14),
(12, 1, 15),
(13, 1, 16),
(14, 3, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canditors`
--
ALTER TABLE `canditors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comitionar`
--
ALTER TABLE `comitionar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voter_list`
--
ALTER TABLE `voter_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `canditors`
--
ALTER TABLE `canditors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comitionar`
--
ALTER TABLE `comitionar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `voter_list`
--
ALTER TABLE `voter_list`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
