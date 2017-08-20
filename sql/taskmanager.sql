-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 20 aug 2017 om 17:52
-- Serverversie: 5.6.35
-- PHP-versie: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Taskmanager`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `deadlines`
--

CREATE TABLE `deadlines` (
  `id` int(250) NOT NULL,
  `deadline` varchar(250) NOT NULL,
  `duration` decimal(50,0) NOT NULL,
  `expiredate` date NOT NULL,
  `list` varchar(250) NOT NULL,
  `userid` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `deadlines`
--

INSERT INTO `deadlines` (`id`, `deadline`, `duration`, `expiredate`, `list`, `userid`) VALUES
(31, 'Pack your bags', '2', '2017-08-31', 'Travel', 6),
(33, 'Examen PHP', '1', '2017-08-28', 'PHP', 6),
(35, 'Gig in Brussels', '2', '2017-09-02', 'Music tour', 2),
(36, 'Become the new James Bond', '4', '2018-03-31', 'Acting', 7),
(38, 'Rob the Bellagio Casino', '2', '2017-08-22', 'Heists', 8);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(2, 'Roméo', 'Elvis', 'romeo@elvis.be', '$2y$12$sblgDjIwr/yJbvg1W5RNVOUUsZZdJOa2cNVwUnWtlT8IeDKyDQA4S'),
(3, 'Jack', 'Garrat', 'jack@garrat.com', '$2y$12$bbQZUcEDDwUwH0cCcW21/.cxOLFD.gPzZ.28R2Q4KusyRNtS2GLLK'),
(4, 'Harry ', 'Potter', 'harry@potter.com', '$2y$12$LDXS4jQO8bfyL8GQRmjSX.JntFZQER9lqgQu6weB6cN2t/I1DzRp2'),
(5, 'Anthony', 'Kiedis', 'rhcp@gmail.com', '$2y$12$WpV6f45Sq0SoNScDcatcHuRUdh1nDdySuduuW/SmJmNDGum4.ezm6'),
(6, 'Arne', 'Van Beveren', 'arne.vanbeveren@gmail.com', '$2y$12$7Jq2ZxUjvOCGUbpJm9gNNOa1oFtllTKgo.yMW2d9oiEopewqS59Di'),
(7, 'Matthias', 'Schoenaerts', 'ms@gmail.com', '$2y$12$YJcVwOaOU5N61j0kZ/L/4OBIk9.20LnlTjyY.gaX5C8EtuMPTX85C'),
(8, 'Danny', 'Ocean', 'danny@ocean.com', '$2y$12$OzOkYDVSq2dO9ZE0L8ie6uHsSFxGOtd9dixtjtvdVDDQb8pIVwI.W');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `deadlines`
--
ALTER TABLE `deadlines`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `deadlines`
--
ALTER TABLE `deadlines`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;