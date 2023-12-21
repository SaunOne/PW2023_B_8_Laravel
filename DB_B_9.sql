-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 21, 2023 at 08:42 AM
-- Server version: 10.6.14-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u461470083_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `saldo` double NOT NULL DEFAULT 0,
  `no_telp` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `type_pengguna` varchar(255) DEFAULT NULL,
  `image_profile` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verify_key` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `fullname`, `username`, `email`, `password`, `saldo`, `no_telp`, `alamat`, `type_pengguna`, `image_profile`, `created_at`, `updated_at`, `active`, `email_verified_at`, `verify_key`, `remember_token`) VALUES
(7, 'ryan pratama', 'ryan01', 'lololasdo09@gmail.com', '$2y$12$u21Giy/Q2nsj7bfVFb/3CuALN8zhj0xjEDjIkivzMXzrgPLTMJ4o.', 400000, '081236755961', 'sdfsdf', 'user', 'fZlM5ae57XCHCe5RMliIhJL2FYd0up7DZKyKUxXn.jpg', NULL, NULL, NULL, NULL, 'hm8iiyTpjVVyi27jzQqLtAlERbXLPd9PAPoKdKhKNKTTThqLYR7WHkGOEbmlPH6JiOlV4eJWiAn2IUSJeybMlorxFKvr3sOT8RIV', NULL),
(8, 'ryan pratama', 'ryan01', 'tinar02@gmail.com', '$2y$12$mcar7ef6oD/RJ9BSTAFHrORKSym.0jAedUcyV1tCIPmkp9X1YHMx6', 0, '081236755961', 'sdfsdf', 'latihan', '2GxDb6qU4zcjhRbMiT5oWjhIwNlhvgrweO8X0dIk.jpg', NULL, NULL, NULL, NULL, 'CYyNcpKxlsIlPJW8gbA8OAvWN2WTozcRGZSg9bQN8S4H6PV0qz2zP9KWg50GmBkNON4kKfEK5eEkLoWYNCVWgegHjQapv5q9oH3v', NULL),
(9, 'ryan pratama', 'ryan01', 'lololo09@gmail.com', '$2y$12$96Mq36EUCdF/49i5re1Uuu3jcLZhg9qZN6jZGXgeZ6rxESgVxcXYW', 0, '081236755961', 'sdfsdf', 'latihan', '209DncqDfaCs8j7oT4lHRtA2UqCFpPqgEGe5aSfr.jpg', NULL, NULL, NULL, NULL, 'gUkmTelcur6ct8JOh840p0sB00FaFj4bReyE4Ni9nZgDB9RmzUYBnLTrmjLcq3wwfZ6tZVCt6D8UepIC9dfTREi9EttLLMPkRQQi', NULL),
(19, 'komang tinar', 'komang01', 'admin@gmail.com', '$2y$12$8znTmZ9L8nYmHsCWL3EprumJY2gW/juDHynufkMSHbt4yIc7UwyNO', 0, '081236755961', 'sdfsfsdf', 'admin', '12e.jpg', NULL, NULL, 1, NULL, 'yGV1CX5WFnCcuGOFZZ1AEUGcanGe5AlEkBvWCaQQahdyuxqCo4S6tL3mmzupjKSe7YgF0ue5yLLHQvQCK50cUCILx2UmS1uP5Diy', NULL),
(28, 'tinar', 'tinar01', 'tinar01@gmail.com', '$2y$12$9e1fZPeR9sQuYaMVXJyanuWauuKb70zB4xt/6tOr7fVNrW2VC9fCe', 0, NULL, 'gejayan', 'user', NULL, NULL, NULL, 0, NULL, 'YXlF6jOTYUqlY07YVd56T30mRZM4mcA9sC5perR6wl0uKmx2XFA3zlPLchGfwW9t9Ji8C9kOpZvlgkEvmgGcgoWYnSjbVktJKcRx', NULL),
(29, 'tinar', 'tinar01', 'tinar11@gmail.com', '$2y$12$S4lzq/3HAnVXryB8kqNVeOPnP24IiunKntFj4oGIAm.B1ELOOZete', 0, NULL, 'gejayan', 'user', NULL, NULL, NULL, 0, NULL, 'RQPA7rdccVraRXDbMyOjkly5exaVB0h5csscsIF6gfLioM5vDB6qerCQwhLhl2FRf1P82srUTHNxcwvG3I86ENatM1QJbYcn2T7u', NULL),
(30, 'tinar', 'tinar01', 'tinar7@gmail.com', '$2y$12$OD9E/gNQFWtXBRok8ojJx.hT.UK6nCZ.ataIxfI3anjt2f.Wt0cXm', 0, NULL, 'gejayan', 'user', NULL, NULL, NULL, 0, NULL, 'SYz68MCmbI0f4N5rSl7eRH3GwqTeMlU0mu5jd6yiNbElwalNGqyg7l5Aj2G72fVWdfB36so1gyGXvIBkJEj0lF25JhjO1jrYliBE', NULL),
(31, 'tinar', '123', '1dsfjn123@gmail.com', '$2y$12$T6U8YJwCrPcHk1GSzUlXmeSvDyQdW83yoEb4wm5v.ZMORyqVdxYBy', 0, NULL, 'iodhsf', 'user', NULL, NULL, NULL, 0, NULL, 'YtnhTDCIqi9at8Ol7ZV8O1t3D1om1AVyTICeZLm5l9ycJD8tfH8o4Upcj8ShZhRNQWQlaiF4DhxsTvqGHUV9lgREN1cHlfKyd33X', NULL),
(32, 'tinar', '123', 'fjn123@gmail.com', '$2y$12$Vqr2qwz31CVl7qoMNYlvse.pXMDyyFVxjtVjel1eLN9pggIyAaqyi', 0, NULL, 'iodhsf', 'user', NULL, NULL, NULL, 0, NULL, 'EZzDNYfKzceLuXT0EYl8sbVdNT6H8q0FHGOmJSkQaEKKj4dvZxKlwKCfBe4zAzcXV7JcCmTrgQic0sMPcD4lxZHGTAa4Hne3gEqm', NULL),
(33, 'tinar', '123123', 't2@gmail.com', '$2y$12$S.gF081dI.YHUqe/9WNLZe4WtmV9./lyy4EWGX3xhBG7OjSYMlZD2', 0, NULL, 'jalan 2 ja', 'user', NULL, NULL, NULL, 0, NULL, '3Lau5JNwZRXfDlZJQMmM8bni42WSTQzmkSkiP0ZsgmRvNpIrPiwBeMniwB3eMye2WBaC89PEakYiZlYvww7gdxJbhN2cIUayklYt', NULL),
(34, 'tinar', '123123', 't5@gmail.com', '$2y$12$jAV5YQDcqbwka4O6l/SnUOZV3UoxcVVpg0I6rvB7Nc/AYSbBcs8Ry', 0, NULL, 'jalan 2 ja', 'user', NULL, NULL, NULL, 0, NULL, 'pZRMAlDhuQvd0bvZdbnWf7ty0AtSQniFpsnnVtbGzZmEmt5HUHDhw7vMl153JtqpwPx7CD5mazezjQp9apU8RpfWetIJPNqClRHT', NULL),
(35, 'tinar', '123', 'fjn15463@gmail.com', '$2y$12$gBR9FKNDc2dhq7OqA1AhPOTQZHtuiw0zPa8cEOshdyWZFcU9gKGuu', 0, NULL, 'iodhsf', 'user', NULL, NULL, NULL, 0, NULL, 'E2yAO4oVJcpVC1POoAqbkPlzVcbQMwb7YgXXEzmt3LTCj8T9F5dCO4ZaD67gqyHg5snMLlTr46c4g7PZZqy5n9vlJeUxOeqwARYt', NULL),
(36, '321', '123', '123@gmail.com', '$2y$12$05W/j5wYvtElQnIx/UFkTefghOhmCublXRX5WLCFfj7ecTwRVaUFC', 0, NULL, 'dsc', 'user', NULL, NULL, NULL, 0, NULL, 'OHRowzgTNODYvWkvvoZWJDrDMZdbHmXiPUT1ZpIrZehjoGhG2NNYjVzIGdAOdpRvLuhcDTKSqlcfgTk05foAfeYGHZRGTy6X1Rz8', NULL),
(37, '123', '123', '123sad@gmail.com', '$2y$12$i48huu4lqCSEHzsBjcXGwedsgv.gXoNvPRztF2dvf3HuM4TNJNyDq', 0, NULL, '123', 'user', NULL, NULL, NULL, 0, NULL, 'EaDifrmWbyFaMcJqaZ5QrdDJv4ewLGsCNOc7cxerEHDAdIBtMVAKrywYKHgec95vYM76Ssb7tg5NpLlKvOs0Ivn1oCVYqkFei9aN', NULL),
(38, '123', '123213', '123dsf@gmail.com', '$2y$12$9SndkBt5XLFPacbeR4gThecrMQZMqGIKT8VwLz1lszSwiH4AT6OC.', 0, NULL, '123', 'user', NULL, NULL, NULL, 0, NULL, 'me5jEOriYvbgfMBV8OGmqV2s21RGHqyPk2HWhbL3LpNM0rB8OJZZzqLHD6xDeN09VeX5zgarX9Qb0vyEpoO1RW3XJUpXMac4uUd7', NULL),
(39, '123', '123213', '12ddsf@gmail.com', '$2y$12$YhYuVn/waQoYRiAeVlrhCOS5oBInYCvQ2lnZyKgpqa4AYNbdQu3.e', 0, NULL, '123', 'user', NULL, NULL, NULL, 0, NULL, '6Rv9E4yqSK01bjnRRohqSgT9dpU6nrYZRi8HyP2oqN2vXFfwhCTMCpJybWj0HCtVc5ht9Z9FtVL9SWOSMFWGGlibyjUnriyTA9Mi', NULL),
(40, '21213', '123', '123dff@gmail.com', '$2y$12$dIyvldbKuZA8atjLWV9CJ.kC2oIqHiSInZ9VIpIaJQa4yJwvlXR2G', 0, NULL, '123123123', 'user', NULL, NULL, NULL, 0, NULL, 'WBWckHD4HqgPkY1Gvs0hCYrRPoRxWCmQDyuh6Eu8Q013u0ClKCWs3zVdnysMqLevZiMkqjFGCCvvdXoPW41B0g3u6VzJmWgxWAHW', NULL),
(41, '23', '123', '12sdf3@gmail.com', '$2y$12$lB5f9TimM5TnjT2DT8Mmx.YZFMS6oMRjTupAMRdyAvgdDUmGvpudW', 0, NULL, '123', 'user', NULL, NULL, NULL, 0, NULL, 'mVUBxKUxe2VJkL9emzB4wv2vedrG26qIu4CDzdID4S4JVazRtkD526VLzoIBYX9c2DzH8FRoU83ZbfhrCKqSKk6IxPftgImSNfmr', NULL),
(42, '23', '123', '12ssdfdf3@gmail.com', '$2y$12$CelnBSxqaR2CX3mAYfIbPOvw3qtvR2zzUcW8omrCgc87f0wyBFbB6', 0, NULL, '123', 'user', NULL, NULL, NULL, 0, NULL, '9tsK6QgCeGUdQJAyQgvYRAx10GFpCZYwpVV66O4e681BbD6F4gzuY0t0e91uj9djIMPiDJCmqzjKYTtIM2Fy805reHjhyTJ0hwHN', NULL),
(43, '123', '123123', 'ydf325@gmail.com', '$2y$12$0aM34U.MroKOOFpfmTtO.ekI4aapWwhk5EhXkmlUdZT/imcbgl0xS', 0, NULL, 'sdfe', 'user', NULL, NULL, NULL, 0, NULL, 'YQmFIXhf40KiOfo31c3LGhNne9S7LLmOYY40ES12EQKi58iNi8uTJpEG1ucEJFiIxzBFVg5to5LnbLm88Ym4pNG3QotQcTsH4ZUp', NULL),
(44, '123', '123123', 'ydf325dfds@gmail.com', '$2y$12$lnMJ0RaTxsAPIzlVaaUVO.Xa9eIHnxMqCT7Rn/VjXZhaVAmcCHQji', 0, NULL, 'sdfe', 'user', NULL, NULL, NULL, 0, NULL, 'FNHIgO00lk6NwKBzpnWGP3i7CuSlwwBSCBiiVvXGd5GNaQ2hgMxqxxSKoc8HHYaGr0EMAZtr1gabJcs74ySWZ86M9gkX7I8ZUuIl', NULL),
(45, 'sef', 'sdf', 'veve@gmail.com', '$2y$12$/Z12lOS4wJHkD.xrLV1maeImSN0sU/N.t.7xCUGWdiuZexXdVzzRq', 0, NULL, '123', 'user', NULL, NULL, NULL, 0, NULL, 'Ni0DHPIcLks9XyhPsUtfD6zlQVHmGzSNh4pmib6aXNK9f4XCFcU2SiRwlDilzsSYZ0OIrDbnQYqC61863fr4SuAq5dVIHqoQ29Dn', NULL),
(46, 'sef', 'sdf', 'tinartinar720@gmail.com', '$2y$12$YhoAQm2B5glD1gLIt47/sO6kiVu1AbSqF0IEPPDfVh2fP1tfdJ0uu', 0, NULL, '123', 'user', '6UYyvRTDej051ya45KUqPWcwWwlS9xCUvkkUCHRY.jpg', NULL, NULL, 1, '2023-12-20 20:09:34', 'AXMyBKz5OHxnE9UqD8MHK8EJWXFwQ6WzlgVldTFWSfrB7cQGmwpMYoWyhW60uNuuWiMlWa2TyNzWRvQ4rFqf1tEpMy2dZwtKyT1I', NULL),
(47, 'tinar', '123123', 't5asd@gmail.com', '$2y$12$0SFqH7ARExxyH0/qygrblO2K9LoBJFEDBBQwPBVF6JKUYI6NlEkDS', 0, NULL, 'jalan 2 ja', 'user', NULL, NULL, NULL, 0, NULL, 'zqX7NIL4oW2FwF4ieF1I91sAnlk7JYRuC6sTXJqjERHToWLKxTaoM12LbeZ1XezY75auCZPpRpS3SKHY5aC3lsPG4eOKLh0BUSup', NULL),
(48, 'yonn', 'yonn123', 'yonn@gmail.com', '$2y$12$pxjlm2acJFoyw5zpq0l4ju61L/aCOWPA7AAhmffkX4MOD6hStRmv6', 0, NULL, 'Jl. ddawo 2 fieha', 'user', NULL, NULL, NULL, 0, NULL, 'JuuMopJJN6sBPdrthfwh4eV24qvSdFw61gx3BW7ogtagvZ2yLEWHp2ualfnapue1sCDIRPO1l87x7zN0yxHswpofIjOJGwNUjTC7', NULL),
(49, 'tinar123', '123', 'yosa@gmail.com', '$2y$12$btckbrkD78vifzzweainlOdROrRmHsk/sWuzYkIVIXX7Dc.NN2oaK', 0, NULL, 'Br Dinas Geriana Kangin', 'user', NULL, NULL, NULL, 0, NULL, 'Iyjh0dDhSpTT2bVhj6zTppBOIeFybyXOkM383uoXyVQK7bdr9kzFrgpjXY06gpl2xfj49HFLiFXR6Zc9BIMo5j1mXWPU32Q5bfVn', NULL),
(50, 'gdyn', 'gdyn66', NULL, '$2y$12$UEw56sOv3k3lQRpL0X1BI.gd0V8FYKuL51dEh.v8Ms9.rDnIcDr5S', 233725, '666555888666', 'Jl. diwjib 2 fiaei', 'user', 'C5T1EahaGg2zR3zMcRLikeAfxbCUduprf5fgxWtv.png', NULL, NULL, 1, '2023-12-21 07:03:27', 'tS4uf3uuHJuCqR6VATsLBEoGRb8JujBIw2Yl90wJG6OItGyW6DwmYXTDv2bPHZx9M9oml1soLDxFkAbblj7ljEUJkGcchQc7iPTW', NULL),
(51, '123', '123', '123123@gmail.com', '$2y$12$DxSxRQqxLq9v61CnRJHEOOis5QJejgkmXElIpIvuhzPDUI2NqqX0O', 0, NULL, '12345678', 'user', NULL, NULL, NULL, 0, NULL, 'PeUrKZQcU421nmnPIJEq536bvcYWoGrMFqerUAjPKD4iuRwhsVJy0J1GpsKv5FCuYkzbxiW9G9tIabQUQ3zvADvzbz3QUi40caca', NULL),
(52, 'I Komang Agus Tinar Putra', 'tinar0112', 'komangtinar01@gmail.com', '$2y$12$Gy5Ji7lyYbVYGp/6EdgJKuuiHV/DIaniEIZDrr2onkjR2og.TqqQ6', 198734, '+6282147549972', 'Br Dinas Geriana Kangin', 'user', NULL, NULL, NULL, 1, '2023-12-21 08:26:27', 'pqPn6cf4cGmgWtPoBboKehrEWbQ3TsRv0vov4vFUbAeWMogkX6wYOeyAWftEpVfp329200k9a2o3PULKTarys26HAc4i7vfEncs6', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
