-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2021 a las 04:44:53
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shami`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Combos', '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(2, 'Ensaladas', '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(3, 'Calientes', '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(4, 'Frios', '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(5, 'Postres', '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(6, 'Bebidas', '2021-09-09 17:20:39', '2021-09-09 17:20:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_04_193547_create_categorias_table', 1),
(5, '2021_01_05_151416_create_productos_table', 1),
(6, '2021_09_01_112748_create_ordens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordens`
--

CREATE TABLE `ordens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listaPedido` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`listaPedido`)),
  `total` double(10,2) NOT NULL,
  `estado` enum('1','2','3','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria_id`, `precio`, `created_at`, `updated_at`, `imagen`, `descripcion`) VALUES
(1602, 'COMBO 1', 1, '660.00', '2021-09-19 17:18:53', '2021-09-19 17:18:53', 'upload-productos/SroqKM4yzWJCFfX7WG5KfytScxQ68e3uF7Rx3HoA.jpg', 'Shawarma de ternera, pollo a Falafel + Papas fritas McCain + Gaseosa en lata'),
(1603, 'COMBO 2', 1, '680.00', '2021-09-19 17:20:26', '2021-09-19 17:20:26', 'upload-productos/DofthIdtnPHafeG5dw19l21vw2V88HUvg3ayludh.jpg', 'Shawarma de ternera, Pollo de Falabel + porción Hummus + bebida'),
(1604, 'COMBO 3', 1, '1300.00', '2021-09-19 17:21:12', '2021-09-19 17:21:12', 'upload-productos/BSZOXvlcfcjNls2uD8qSgSLiB7666NpA2vCkZjeF.jpg', '2 Shawarma de ternera, Pollo de Falabel + Fatay + Papas fritas + 2 bebidas'),
(1605, 'COMBO 4', 1, '700.00', '2021-09-19 17:22:08', '2021-09-19 17:22:08', 'upload-productos/6n43l3Pq3cfOr2JhngQgFO31HdGI5y4F5bc4OXHk.jpg', 'Shawarma de ternera, Pollo o Falabel + Hummus, Tabule, 2 Falabel + bebida'),
(1606, 'COMBO 5', 1, '360.00', '2021-09-19 17:22:42', '2021-09-19 17:22:42', 'upload-productos/M3fcRwsWmVWxQBFV6RfxEKi6hplIlASyHXRbkfT3.jpg', '2 Fatay de Carne, Verduras o Queso + Gaseosa en lata'),
(1607, 'COMBO VEGETARIANO', 1, '580.00', '2021-09-19 17:23:28', '2021-09-19 17:26:56', 'upload-productos/tQZLpGztSiHrPkHVeBvbHOiiedDUAuKG6PPMqveW.jpg', 'Sandwich de Falafel + Ensalada tabulé + agua mineral'),
(1608, 'FALAFEL', 2, '350.00', '2021-09-19 17:37:15', '2021-09-19 17:44:05', 'upload-productos/Vq1i1b9e4YDq6i0GM1xp06chPsDLpCL8uwbsq6E3.jpg', 'Falafel + mix de verduras + aceituras - cebolla murado + salsa de granada + sesamo'),
(1609, 'TABULE', 2, '350.00', '2021-09-19 17:38:53', '2021-09-19 17:38:53', 'upload-productos/dT2S0Wvi48oJYqKHT2qOBmh7SwVannjdMrtQX2p8.jpg', 'Ensalada de Tomate, Cebolla, Perejil, Pepino, Menta, Trigo fino con Limón y aceite de Oliva'),
(1610, 'FATOUSH', 2, '350.00', '2021-09-19 17:40:47', '2021-09-19 17:40:47', 'upload-productos/din4i7DDVnw6az7yygxWj4WjvsvmAiKMPINiVMDR.jpg', 'Ensalada de Tomate, Pepino, Menta, Rúcula, Aceitunas, Ajo, trocitos de Pan tostado, Aceite de Oliva y vinagre de Frambruesa'),
(1611, 'IUNANI', 2, '380.00', '2021-09-19 17:42:17', '2021-09-19 17:42:17', 'upload-productos/xdGpTRolA3oUYYDcSe9z9aKN5JIjkZnEADri5K9y.jpg', 'Ensalada con Aceitunas, Queso Arabe, Tomates, Nueces, Rúcula, Aceto balsámico y Aceite de Oliva'),
(1612, 'SHAWARMA TERNERA O POLLO', 3, '420.00', '2021-09-19 17:48:33', '2021-09-19 17:48:33', 'upload-productos/HIMiFLwPgHM5RJ4UIbU8RkGVe0Sk9afGw30M2DqH.jpg', 'Carne macerada en hierbas, picada en tiras, servido en pan de \"pita\", con ensalada y salsas tradicionales'),
(1613, 'SHAWARMA CORDERO', 3, '480.00', '2021-09-19 17:50:52', '2021-09-19 17:50:52', 'upload-productos/mMJF7N8SlvK86Ku98jFat69flXsZnJNMtto1EKZL.jpg', 'Carne macerada en hierbas, picada en tiras, servido en pan de \"pita\" con ensalada y salsas tradicionales'),
(1614, 'FALAFEL', 3, '360.00', '2021-09-19 17:52:49', '2021-09-19 17:52:49', 'upload-productos/yjG7xFTZqiBInmJVSiXZm7bG5R8LNsOSVgLN8QS7.jpg', 'Crocantes fritos de garbanzo rebozado con finas hierbas y especias árabes. Puede ser  vegetariano, al plato o en sandwich'),
(1615, 'PAPAS FRITAS', 3, '250.00', '2021-09-19 17:54:08', '2021-09-19 17:54:08', 'upload-productos/1CPXzIBN6UounZMkpkmiCDbnnIId3pwGmGUYWtom.jpg', 'Clásicas y deliciosas papas fritas'),
(1616, 'FATAY DE CARNE', 3, '55.00', '2021-09-19 17:55:30', '2021-09-19 17:55:30', 'upload-productos/jZal2HBc5vRgqMzrRuyf1yEdeesuAFzEQXYnte9w.jpg', 'Empanadas árabes de carne de ternera con verduras y limón'),
(1617, 'FATAY VERDURA O QUESO', 3, '55.00', '2021-09-19 17:57:07', '2021-09-19 17:57:07', 'upload-productos/5COljDHqMukiSLVg3AqKWH6WlHhx351dFtwFtIdI.jpg', 'Empanadas vegetarianas árabes de vurduras o de queso, con perejil'),
(1618, 'KEPE FRITO O ASADO', 3, '160.00', '2021-09-19 17:58:04', '2021-09-19 17:58:04', 'upload-productos/6b1sAGCuABICSTKksMsUjy35wTTwVgRL6Hqf1Ujs.jpg', 'Bolitas de carne mezclada con trigo fino y nueces'),
(1619, 'LAHMUYIN', 3, '150.00', '2021-09-19 17:58:59', '2021-09-19 17:58:59', 'upload-productos/46q62wwC8mMioC6DxwZefScD1yIa6iwIANhwr0QN.jpg', 'Empanadas abiertas de carne'),
(1620, 'YABRA X 8', 3, '390.00', '2021-09-19 18:00:10', '2021-09-19 18:00:10', 'upload-productos/QiHGSThNA7ZjU2BQCEJZP0gBLVyf9FpvECzbb585.jpg', 'Carne de ternera y arroz envueltos en hojas de parra'),
(1621, 'ARROZ PILAF', 3, '360.00', '2021-09-19 18:01:26', '2021-09-19 18:01:26', 'upload-productos/TgW23guBrwd2MjBPjQ558uM8OCLtOvL2lSZYqAFY.jpg', 'Arroz con pasas de uva, castañas de cajú, almendras y finos dados de pollo'),
(1622, 'HOMUS', 4, '280.00', '2021-09-26 04:17:55', '2021-09-26 04:17:55', 'upload-productos/s5c72dH00g7dWWjv9z8XZMVdHdViDDP4szlyWfiR.jpg', 'Puré de Garbanzo con pasta de Sésamo'),
(1623, 'MUTABAL', 4, '280.00', '2021-09-26 04:18:36', '2021-09-26 04:18:36', 'upload-productos/x0W8BpJDvxKZytg3owBdbFi1YqJDIQ0D8CyuYagc.jpg', 'Puré de berenjenas con Yogurt y pasta de Sésamo'),
(1624, 'SHAWANDAR', 4, '280.00', '2021-09-26 04:19:27', '2021-09-26 04:19:27', 'upload-productos/dppu0jjAL2t8orfz7PI2evugkdmSrB4INwSGign3.jpg', 'Puré de Remolachas con tahine de Sésamo'),
(1625, 'LABNEH', 4, '280.00', '2021-09-26 04:20:08', '2021-09-26 04:20:08', 'upload-productos/G9yAv3QZKi4Btz3otOepXDaxIx0GeCEkNYFsm1NB.jpg', 'Yogurt natural con agregados de Menta y aceite de Oliva'),
(1626, 'LABNEH', 4, '280.00', '2021-09-26 04:20:08', '2021-09-26 04:20:08', 'upload-productos/p1xnKInHLOmxEGYBGFOqdmwSeIjTqpXdCIudBmCy.jpg', 'Yogurt natural con agregados de Menta y aceite de Oliva'),
(1627, 'BABA GANUSH', 4, '280.00', '2021-09-26 04:20:53', '2021-09-26 04:20:53', 'upload-productos/mjp0tdLyCqNmm8g9GYl1t08DUS4UvXWr2epgKHbC.jpg', 'Puré de Berenjenas con morrón verde y rojo, Perejil y Limón'),
(1628, 'QUESO ÁRABE', 4, '280.00', '2021-09-26 04:21:33', '2021-09-26 04:21:33', 'upload-productos/rYX5kq5kSrRr5M8gZlXJwkgROBQT7mFmj8AZjwh8.jpg', 'Queso con aceitunas y semillas de Sésamo'),
(1629, 'KADAIEF', 5, '140.00', '2021-09-26 04:29:02', '2021-09-26 04:29:02', 'upload-productos/6WToUbVhLUOjwd62GI3FyxOQ4qoVXGNkuh41mkWL.jpg', 'Masa de kataifi relleno con nueces y coco'),
(1630, 'MAMUL', 5, '90.00', '2021-09-26 04:29:29', '2021-09-26 04:29:29', 'upload-productos/LjBYZXXesrwiDpSZ4DtYzafCCmdHnVz1eDHU7WgB.jpg', 'Bacadillo relleno con nueces o coco'),
(1631, 'BAKLAWA', 5, '150.00', '2021-09-26 04:30:16', '2021-09-26 04:30:16', 'upload-productos/aA1OvLTP5Zo5kBiBqNEv3oArzgqglbBzFBlX1FUq.jpg', 'Masa filo con nuez, pistacho, almendras o castañas de cajú y almibar'),
(1632, 'SURTIDOS DE DULCES ÁRABES', 5, '500.00', '2021-09-26 04:30:56', '2021-09-26 04:30:56', 'upload-productos/F6HUX9ysFo51ErXh0fQJgLU0VpIOFJFUmT8aJ0V7.png', 'Selección de dulces con nueces, almendras, castañas y pistacho'),
(1633, 'NÁNA', 6, '190.00', '2021-09-26 04:34:54', '2021-09-26 04:34:54', 'upload-productos/Su19klAbRViZ233iAgsjN9QFo7rFjiMPPsoYEkIY.jpg', 'Jugo de limón con menta'),
(1634, 'KARKADÉ', 6, '190.00', '2021-09-26 04:35:36', '2021-09-26 04:35:36', 'upload-productos/9nkANUBYfljGwaG5yTUVB1FaDQQH54TslejshawZ.jpg', 'Té refrescante típicamente egipcio, hecho con Flores de Hibiscus'),
(1635, 'SHARAWI', 6, '190.00', '2021-09-26 04:36:17', '2021-09-26 04:36:17', 'upload-productos/uSnGQ1HwwvIL0WJwpH9BEOCvBSWvOpeRbtrv6AnS.jpg', 'Té refrescante a base de Flores con Cardamomo'),
(1636, 'GASEOSA EN LATA', 6, '130.00', '2021-09-26 04:37:03', '2021-09-26 04:37:03', 'upload-productos/2ImbjNHo3JaQWZEgL6z9oZWcxkXDeFHndKeRAQlj.jpg', '-'),
(1637, 'AGUA MINERAL', 6, '130.00', '2021-09-26 04:37:35', '2021-09-26 04:37:35', 'upload-productos/JHSeRdj3W7qXMwzgrnNZTqqxFQIOSlOYyWW99zJL.jpg', '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razonSocial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provincia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` bigint(20) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('administrador','franquiciado','mayorista') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `razonSocial`, `cuit`, `direccion`, `localidad`, `provincia`, `whatsapp`, `email`, `email_verified_at`, `password`, `tipo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fernando Pereyra', NULL, NULL, NULL, NULL, NULL, NULL, 'fer@correo.com', NULL, '$2y$10$hxtF1VZPS5S77M2v27ORu.sc7rUCNwccWPk9M8SoN00gRQOJbooRS', 'administrador', NULL, '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(2, 'PARQUE RIVADAVIA', 'TUJABI SRL', '30-71710900-3', 'Av. Rivadavia 4717', 'CABALLITO', 'CABA', 1163592876, 'parquerivadavia@eneldo.com', NULL, '$2y$10$bJeshgE3TM9KMuIzhrdAFuHqQojMwVdLrXoUaxb9w2hR3AeRMKR4i', 'franquiciado', NULL, '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(3, 'AGUERO', 'DAMIAN ARIEL POLIN', '20-31453752-2', 'Aguero 1926', 'RECOLETA', 'CABA', 1132010549, 'aguero@eneldo.com', NULL, '$2y$10$wuyAOZxxfGzSZvygut60dOdPgsPaQ6CoJ/TskPaKvI5UeIFTcZ3WG', 'franquiciado', NULL, '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(4, 'ROSARIO', 'IGNACIO SEPLIARSKY', '20-25328968-7', 'Pte roca 872', 'ROSARIO', 'SANTA FE', 3412111635, 'rosario@eneldo.com', NULL, '$2y$10$raSr65xpHpD4Pop3h0WPZ.XI3qfHCtGNV5FxQEBkEU04/giBO4ic.', 'franquiciado', NULL, '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(5, 'LACROZE', 'KARBEL SRL', '30-71713658-2', 'Lacroze 2244', 'PALERMO', 'CABA', 11321377933, 'lacroze@eneldo.com', NULL, '$2y$10$h6qzpYEyFmpYp.PlstiBcOKHhrFB4SLioCfh9uWpz9oYxPv3ehjW2', 'franquiciado', NULL, '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(6, 'REMEROS', 'MARIA SOLEDAD CORGHI', '27-25171788-0', 'Av. Santa Maria de las Conchas 4711', 'RINCON DE MILBERG', 'PCIA. DE BS.AS', 1128537813, 'remeros@eneldo.com', NULL, '$2y$10$28HZASZS0qDIBrJ00U58j.5X.M8AG6jaQFxmAd9FYdW0sWBNHQV9a', 'franquiciado', NULL, '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(7, 'PUEYRREDON', 'JORGE ARIEL PILIPSKY', '20-22128058-0', 'Av. Mosconi 2602', 'VILLA PUEYRREDON', 'CABA', 1166377074, 'pueyrredon@eneldo.com', NULL, '$2y$10$nIEK4CYjPoqLs98MOb7quOimSsTEyG1RwL9gGn680eU.mcRGmQRU6', 'franquiciado', NULL, '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(8, 'MARTINEZ', '7273 SRL', '30-71702335-4', 'General Alvear 469', 'Martinez', 'PCIA. DE BS.AS', 1130273697, 'martinez@eneldo.com', NULL, '$2y$10$klCbbj.yr9w/peOkVpHiaeIMKmHjs44iuDM10/lYJQ.r9mCK7T7n6', 'franquiciado', NULL, '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(9, 'PILAR', 'LEANDRO LAMMARDO', '20-28910004-1', 'R. Caamaño 1060', 'PILAR', 'PCIA. DE BS.AS', 1131991993, 'pilar@eneldo.com', NULL, '$2y$10$CvSlbREIdmyYYaNDXO/eee.wh3x8tDO0o/WSssksYLSloc1EjWxEW', 'franquiciado', NULL, '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(10, 'AV. SANTA FE', 'EZEQUIEL PERAZZO', '20-28985048-2', 'Av. Santa Fe 1600', 'Recoleta', 'CABA', 1131780143, 'santafe@eneldo.com', NULL, '$2y$10$34uROMPrnKBqRsX4/QXF3uikqeAqXPV.fqJx8ClX1pTda2NUdnZGy', 'franquiciado', NULL, '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(11, 'ALVAREZ', 'MIGUEL ANGEL REXACH', '20-08104212-9', 'Gorriti 1064', 'FRANCISCO ALVAREZ', 'PCIA. DE BS.AS', 1140862301, 'alvarez@eneldo.com', NULL, '$2y$10$eag/PEv9cp3ejTYZ.0JYzOaofF5q3cZ3k8XUAZia.ajeF/q3/TQNK', 'franquiciado', NULL, '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(12, 'BELGRANO', 'MATIAS HECTOR FERNANDEZ', '20-28298905-1', 'Av. Cabildo 2841', 'BELGRANO', 'CABA', 1152600352, 'belgrano@eneldo.com', NULL, '$2y$10$/DGm5wm7e440Nr5tM.cPr.RnV0iZfLwQzSD95NvSPk.XXIqZ.ZNoG', 'franquiciado', NULL, '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(13, 'URQUIZA', 'HUMITA SRL', '33-71656517-9', 'Av. Olazabal 4955', 'VILLA URQUIZA', 'CABA', 1132757219, 'urquiza@eneldo.com', NULL, '$2y$10$bGGlBkEdsRmYJIoFyJ2/wOjWLAd9X3xBcOUTspyC/FhphfZaZeqSa', 'franquiciado', NULL, '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(14, 'SCALABRINI', 'HUMITA SRL', '33-71656517-9', 'Raul Escalabrini Ortiz 2762', 'PALERMO', 'CABA', 1127172481, 'scalabrini@eneldo.com', NULL, '$2y$10$9fakngnjaoYFfKkiSyTVh.GRTlb4JL2R3h.B5BDQhmQKoOo6ZI8mK', 'franquiciado', NULL, '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(15, 'LAS HERAS', 'LOCRO SA', '33-71543389-9', 'Av. Las Heras 2000', 'RECOLETA', 'CABA', 1156251073, 'lasheras@eneldo.com', NULL, '$2y$10$JgJ3vVz3K4sUKlEhnWOux.RxbH5wLzO5DzKJfw5.umixnHnDmNHFm', 'administrador', NULL, '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(16, 'PRIMERA JUNTA', 'LOCRO SA', '33-71543389-9', 'Av. Rivadavia 5595', 'CABALLITO', 'CABA', 1163036138, 'primerajunta@eneldo.com', NULL, '$2y$10$XOi5604kLq6STILlAouqSeH8kHzt20iPzkNKoaEiQumee2FjfW9B2', 'franquiciado', NULL, '2021-09-09 17:20:39', '2021-09-09 17:20:39'),
(17, 'ALMAGRO', 'LOCRO SA', '33-71543389-9', 'Av. Corrientes 4549', 'ALMAGRO', 'CABA', 1156251073, 'almagro@eneldo.com', NULL, '$2y$10$Htm8ddyPhSnSl70h5acmgOgTyQwOOQCPfQklollXQrXoV48peVXfq', 'franquiciado', NULL, '2021-09-09 17:20:39', '2021-09-09 17:20:39');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordens`
--
ALTER TABLE `ordens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordens_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ordens`
--
ALTER TABLE `ordens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1638;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ordens`
--
ALTER TABLE `ordens`
  ADD CONSTRAINT `ordens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
