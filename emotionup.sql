-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-05-2018 a las 02:27:32
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `emotiondev`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `active`, `password`, `remember_token`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Exala Innovacion Digital', 'admin', 'exalainnovacion@gmail.com', 1, '$2y$10$Jw23Cr391p0jfzrW0iLNVeU4Od7UiuAnDuZSMBufnULYNI3pjj5gm', 'krmpv72Fu96g8AmawvlDY9VJowdhavHv1GQjO6k6g6UHw74XkTxst4STyyPz', '2018-01-17 22:16:04', '2018-03-03 01:22:28', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `texto` longtext COLLATE utf8_unicode_ci NOT NULL,
  `article_types_id` int(10) UNSIGNED NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article_types`
--

CREATE TABLE `article_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `link_imagen` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `banner_types_id` int(10) UNSIGNED NOT NULL,
  `tipo_archivo` enum('imagen','video') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'imagen',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `link`, `link_imagen`, `estado`, `banner_types_id`, `tipo_archivo`, `created_at`, `updated_at`, `slug`) VALUES
(7, '', '/images/banners/Banner_20180226113949881193552.tres.jpg', 1, 9, 'imagen', '2018-02-26 16:39:49', '2018-02-26 16:39:49', 'images-banners-banner-20180226113949881193552-tres-jpg'),
(8, '', '/images/banners/Banner_20180226114006106766663.cuatro.jpg', 1, 10, 'imagen', '2018-02-26 16:40:07', '2018-02-26 16:40:07', 'images-banners-banner-20180226114006106766663-cuatro-jpg'),
(9, '', '/images/banners/Banner_20180226121004225412167.dos.jpg', 1, 11, 'imagen', '2018-02-26 17:10:04', '2018-02-26 17:10:04', 'images-banners-banner-20180226121004225412167-dos-jpg'),
(10, '', '/images/banners/Banner_2018022612101961735872.uno.jpg', 1, 12, 'imagen', '2018-02-26 17:10:19', '2018-02-26 17:10:19', 'images-banners-banner-2018022612101961735872-uno-jpg'),
(11, '', '/images/banners/Banner_20180226121039902573089.entrenadorpersonal.jpg', 1, 13, 'imagen', '2018-02-26 17:10:39', '2018-02-26 17:10:39', 'images-banners-banner-20180226121039902573089-entrenadorpersonal-jpg'),
(12, '', '/images/banners/Banner_2018022612104961139726.entrenadordeplanta.jpg', 1, 13, 'imagen', '2018-02-26 17:10:49', '2018-02-26 17:10:49', 'images-banners-banner-2018022612104961139726-entrenadordeplanta-jpg'),
(13, '', '/images/banners/Banner_20180226121105827211923.tres.jpg', 1, 14, 'imagen', '2018-02-26 17:11:05', '2018-02-26 17:11:05', 'images-banners-banner-20180226121105827211923-tres-jpg'),
(14, '', '/images/banners/Banner_201802261211391749979415.zonadeestiramientoyadomen.jpg', 1, 15, 'imagen', '2018-02-26 17:11:39', '2018-02-26 17:11:39', 'images-banners-banner-201802261211391749979415-zonadeestiramientoyadomen-jpg'),
(15, '', '/images/banners/Banner_201802261211561451705139.cuatro.jpg', 1, 16, 'imagen', '2018-02-26 17:11:56', '2018-02-26 17:11:56', 'images-banners-banner-201802261211561451705139-cuatro-jpg'),
(16, '', '/images/banners/Banner_20180226121236273145377.zonaspinning.jpg', 1, 17, 'imagen', '2018-02-26 17:12:37', '2018-02-26 17:12:37', 'images-banners-banner-20180226121236273145377-zonaspinning-jpg'),
(17, '', '/images/banners/Banner_201802261212542048045034.zonadeparqueadero.jpg', 1, 18, 'imagen', '2018-02-26 17:12:54', '2018-02-26 17:12:54', 'images-banners-banner-201802261212542048045034-zonadeparqueadero-jpg'),
(18, '', '/images/banners/Banner_20180226190154352034028.banneruno.png', 1, 19, 'imagen', '2018-02-27 00:01:54', '2018-02-27 00:01:54', 'images-banners-banner-20180226190154352034028-banneruno-png'),
(19, '/', '4hW2U-gAYVA', 1, 5, 'imagen', '2018-03-03 02:22:12', '2018-03-03 02:22:29', 'dettxv8wmuo'),
(20, '', '/images/banners/Banner_2018030507311774276371.cardio.jpg', 1, 8, 'imagen', '2018-03-05 14:31:17', '2018-03-05 14:31:17', 'images-banners-banner-2018030507311774276371-cardio-jpg'),
(21, '', '/images/banners/Banner_201803050738371243385496.grupales.jpg', 1, 7, 'imagen', '2018-03-05 14:38:37', '2018-03-05 14:38:37', 'images-banners-banner-201803050738371243385496-grupales-jpg'),
(22, '', '/images/banners/Banner_201803050741152013863202.fuerza.jpg', 1, 9, 'imagen', '2018-03-05 14:41:15', '2018-03-05 14:41:15', 'images-banners-banner-201803050741152013863202-fuerza-jpg'),
(24, '', '/images/banners/Banner_20180305074747110585943.bannerdos.jpg', 1, 1, 'imagen', '2018-03-05 14:47:47', '2018-03-05 14:47:47', 'images-banners-banner-20180305074747110585943-bannerdos-jpg'),
(26, '3', '/images/banners/Banner_20180305075156539463551.bannercuatro.jpg', 1, 1, 'imagen', '2018-03-05 14:51:56', '2018-03-05 14:56:05', 'images-banners-banner-20180305075156539463551-bannercuatro-jpg'),
(27, '', '/images/banners/Banner_20180305075816417117252.pesam-dos.jpg', 1, 14, 'imagen', '2018-03-05 14:58:17', '2018-03-05 14:58:17', 'images-banners-banner-20180305075816417117252-pesam-dos-jpg'),
(35, '', '/images/banners/Banner_20180413145419686205933.promocion-cuatrimestre-pagina-web.jpg', 1, 1, 'imagen', '2018-04-13 21:54:19', '2018-04-13 21:54:19', 'images-banners-banner-20180413145419686205933-promocion-cuatrimestre-pagina-web-jpg'),
(36, '', '/images/banners/Banner_20180413145434742924727.mes-89000-pagina-web.jpg', 1, 1, 'imagen', '2018-04-13 21:54:34', '2018-04-13 21:54:34', 'images-banners-banner-20180413145434742924727-mes-89000-pagina-web-jpg'),
(37, '', '/images/banners/Banner_2018043017364414773.danza.jpg', 1, 20, 'imagen', '2018-04-30 22:36:45', '2018-04-30 22:36:45', 'images-banners-banner-2018043017364414773-danza-jpg'),
(38, '', '/images/banners/Banner_2018043017370526698.taek.jpg', 1, 20, 'imagen', '2018-04-30 22:37:05', '2018-04-30 22:37:05', 'images-banners-banner-2018043017370526698-taek-jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner_types`
--

CREATE TABLE `banner_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `banner_types`
--

INSERT INTO `banner_types` (`id`, `nombre`, `descripcion`, `estado`, `slug`) VALUES
(1, 'Principal', NULL, 1, 'principal'),
(2, 'Secundario', NULL, 1, 'secundario'),
(3, 'Terciario', NULL, 1, 'terciario'),
(4, 'Cuaternario', NULL, 1, 'cuaternario'),
(5, 'Video Principal', NULL, 1, 'video-principal'),
(6, 'Planes', NULL, 1, 'planes'),
(7, 'backGrupos', NULL, 1, 'backgrupos'),
(8, 'backCardio', NULL, 1, 'backcardio'),
(9, 'backFuerza', NULL, 1, 'backfuerza'),
(10, 'backTurco', NULL, 1, 'backturco'),
(11, 'cardio', NULL, 1, 'cardio'),
(12, 'grupos', NULL, 1, 'grupos'),
(13, 'entrenador', NULL, 1, 'entrenador'),
(14, 'musculacion', NULL, 1, 'musculacion'),
(15, 'estiramiento', NULL, 1, 'estiramiento'),
(16, 'humeda', NULL, 1, 'humeda'),
(17, 'spinnig', NULL, 1, 'spinnig'),
(18, 'parqueadero', NULL, 1, 'parqueadero'),
(19, 'spa', NULL, 1, 'spa'),
(20, 'cursos', NULL, 1, 'cursos'),
(21, 'dietas', NULL, 1, 'dietas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristics`
--

CREATE TABLE `caracteristics` (
  `id_caracteristic` int(10) UNSIGNED NOT NULL,
  `name_caracteristic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristic_categories`
--

CREATE TABLE `caracteristic_categories` (
  `id_caracteristic_category` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristic_category_caracteristics`
--

CREATE TABLE `caracteristic_category_caracteristics` (
  `id_pivot_category_caracteristics` int(10) UNSIGNED NOT NULL,
  `fk_category` int(10) UNSIGNED NOT NULL,
  `fk_caracteristic` int(10) UNSIGNED NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristic_products`
--

CREATE TABLE `caracteristic_products` (
  `id_caracteristic_product` int(10) UNSIGNED NOT NULL,
  `fk_category` int(10) UNSIGNED NOT NULL,
  `fk_product` int(10) UNSIGNED NOT NULL,
  `fk_caracteristic` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristic_product_categories`
--

CREATE TABLE `caracteristic_product_categories` (
  `id_pivot_category_products` int(10) UNSIGNED NOT NULL,
  `fk_category` int(10) UNSIGNED NOT NULL,
  `fk_product_category` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discounts`
--

CREATE TABLE `discounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_cupon` enum('normal','carro') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'normal',
  `activar_codigo` tinyint(1) NOT NULL DEFAULT '0',
  `discount` int(11) NOT NULL DEFAULT '0',
  `price` double(15,2) NOT NULL DEFAULT '0.00',
  `codigo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discount_product`
--

CREATE TABLE `discount_product` (
  `discount_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discount_product_subcategory`
--

CREATE TABLE `discount_product_subcategory` (
  `discount_id` int(10) UNSIGNED NOT NULL,
  `product_subcategory_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documents`
--

CREATE TABLE `documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link_documento` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `document_category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `document_categories`
--

CREATE TABLE `document_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `document_categories`
--

INSERT INTO `document_categories` (`id`, `nombre`, `descripcion`, `estado`, `slug`) VALUES
(1, 'RUT', NULL, 1, 'rut'),
(2, 'Cámara de Comercio', NULL, 1, 'camara-de-comercio'),
(3, 'Certificación Bancaria', NULL, 1, 'certificacion-bancaria'),
(4, 'RIT', NULL, 1, 'rit'),
(5, 'Ley 789', NULL, 1, 'ley-789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitations`
--

CREATE TABLE `invitations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `invitations`
--

INSERT INTO `invitations` (`id`, `name`, `email`, `cc`, `estado`, `slug`, `created_at`, `updated_at`) VALUES
(47, 'joys', 'florez.joys@gmail.com', '1016011237', 0, 'joys', '2018-03-03 01:40:18', '2018-03-03 03:15:52'),
(48, '5a99fc63ebe19', 'treely2@yahoo.com', '', 0, '5a99fc63ebe19', '2018-03-03 03:37:36', '2018-03-03 03:37:36'),
(49, 'yessica paola nieto', 'yekayy76@hotmail.com', '1019087338', 0, 'yessica-paola-nieto', '2018-03-05 17:52:29', '2018-03-05 17:52:29'),
(50, 'olga romero', 'olgaro_j@hotmail.com', '1019023765', 1, 'olga-romero', '2018-03-06 00:46:34', '2018-03-06 00:47:43'),
(51, 'tatiana lombo', 'tatianalombo@hotmail.com', '1019137592', 1, 'tatiana-lombo', '2018-03-06 01:34:50', '2018-03-06 01:37:30'),
(52, 'juan sebastian zapata mora', 'andre128232@gmail.com', '1001077999', 1, 'juan-sebastian-zapata-mora', '2018-03-07 19:43:50', '2018-03-13 23:28:53'),
(53, 'María Bernal', 'maarii178@gmail.com', '1018514727', 1, 'maria-bernal', '2018-03-10 02:01:40', '2018-03-10 02:02:02'),
(54, 'Juan Gomez', 'juan_go_sa@hotmail.con', '1018473539', 1, 'juan-gomez', '2018-03-13 01:38:11', '2018-03-13 01:55:59'),
(55, 'Viviana corredor ', 'corredorbarragan@gmail.com', '1118540043', 0, 'viviana-corredor', '2018-03-15 00:56:05', '2018-03-15 00:56:05'),
(56, 'Jennifer hernandez', 'ingjenniferhb@gmail.com', '1075237495', 0, 'jennifer-hernandez', '2018-03-15 00:57:38', '2018-03-15 00:57:38'),
(57, 'Leonard Galvis ', 'galvisleonard@gmail.com', '1019083271', 0, 'leonard-galvis', '2018-03-17 17:28:30', '2018-03-17 17:28:30'),
(58, 'Gisela villamil ', 'bluegigi73@gmail.com', '1019064137', 0, 'gisela-villamil', '2018-03-17 17:30:57', '2018-03-17 17:30:57'),
(59, 'olga lucia coy', 'olgalu1231@gmail.com', '52223252', 1, 'olga-lucia-coy', '2018-03-23 02:21:28', '2018-03-24 17:23:07'),
(60, 'roberth novoa', 'Rnovoa@mincultura.gov.co', '79570287', 0, 'roberth-novoa', '2018-03-23 02:22:15', '2018-03-23 02:22:15'),
(61, 'Sebastian Rodríguez ', 'jsebr10@hotmail.com', '1015466209', 0, 'sebastian-rodriguez', '2018-03-26 05:08:35', '2018-03-26 05:08:35'),
(62, 'DANIELA URRERA', 'DANIELAURREADUARTE@HOTMAIL.COM', '1000950915', 1, 'daniela-urrera', '2018-03-26 17:55:59', '2018-03-26 18:01:32'),
(63, ' Jhoseph Mauricio Anzola Rivera', 'jhosmaur18@gmail.com', '1000458088', 0, 'jhoseph-mauricio-anzola-rivera', '2018-03-26 21:55:02', '2018-03-26 21:55:02'),
(64, 'Freddy lopez', 'fregolo69@hotmail.com', '80418162', 1, 'freddy-lopez', '2018-03-26 22:35:39', '2018-03-26 22:35:51'),
(65, 'Camila Vangh-egas', 'Mariacamila0910@gmail.com', '1040751840', 1, 'camila-vangh-egas', '2018-03-28 21:07:31', '2018-03-29 00:08:18'),
(66, 'cristian avila ', 'crisavila.03@hotmail.com', '1019092985', 1, 'cristian-avila', '2018-03-28 22:13:49', '2018-03-28 22:19:07'),
(67, 'juliana arevalo', 'caranjul@hotmail.com', '1021512402', 1, 'juliana-arevalo', '2018-04-03 01:08:45', '2018-04-03 01:09:13'),
(68, 'Jorge Enrique Pedroza Martelo ', 'jpedrozamartelo@hotmail.com', '1143362819', 1, 'jorge-enrique-pedroza-martelo', '2018-04-03 01:36:34', '2018-04-03 02:21:43'),
(69, 'Omairy vicuña', 'omairy_del_carmen@hotmail.com', '23757234', 0, 'omairy-vicuna', '2018-04-04 16:25:13', '2018-04-04 16:25:13'),
(70, 'María Camila Domínguez', 'cami0818@gmail.com', '1015441127', 0, 'maria-camila-dominguez', '2018-04-07 12:25:57', '2018-04-07 12:25:57'),
(71, 'Aura Gaitan', 'auragaitan@hotmail.com', '52583556', 1, 'aura-gaitan', '2018-04-08 03:56:28', '2018-04-10 02:31:44'),
(72, 'Ricardo chaparro', 'ricardochaparro9@gmail.com', '79248867', 1, 'ricardo-chaparro', '2018-04-08 03:58:32', '2018-04-10 02:31:50'),
(73, 'Gian carlos morales granados', 'dipamora-28@hotmail.com', '1019130987', 1, 'gian-carlos-morales-granados', '2018-04-14 02:37:09', '2018-04-15 18:02:08'),
(74, 'Samuel Rodríguez Velasquez ', 'sajuen_l@hotmail.com', '1020821343', 1, 'samuel-rodriguez-velasquez', '2018-04-16 01:23:39', '2018-04-16 15:51:33'),
(75, 'juan estevan neva santana', 'jens8558@hotmail.com', '1001097349', 1, 'juan-estevan-neva-santana', '2018-04-17 23:25:23', '2018-04-17 23:57:36'),
(76, 'Didra Gutiérrez ', 'dydregj@gmail.com', '1082920965', 0, 'didra-gutierrez', '2018-04-18 19:57:54', '2018-04-18 19:57:54'),
(77, 'andres salamanca ', 'filsoleil@gmail.com', '79693434', 1, 'andres-salamanca', '2018-04-20 03:52:45', '2018-04-20 03:53:03'),
(78, 'Ana Maria Delvalle', 'aranchadiev@hotmail.com', '52809375', 0, 'ana-maria-delvalle', '2018-04-20 20:31:56', '2018-04-20 20:31:56'),
(79, 'CARLOS AUGUSTO ROJAS NEIRA', 'carrojas1@yahoo.com', '80470091', 0, 'carlos-augusto-rojas-neira', '2018-04-24 18:40:33', '2018-04-24 18:40:33'),
(80, 'fernando porras', 'proyectos@dreemmadrid.es', '19939919', 0, 'fernando-porras', '2018-04-24 19:03:16', '2018-04-24 19:03:16'),
(81, 'ANA ROCIO SANTANA AVENDAÑO', 'rociosantana02@gmail.com', '52338908', 0, 'ana-rocio-santana-avendano', '2018-04-24 19:54:35', '2018-04-24 19:54:35'),
(82, 'Laura Valentina Cogua González', 'valent21laucog@hotmail.com', '1001089331', 0, 'laura-valentina-cogua-gonzalez', '2018-04-28 13:58:22', '2018-04-28 13:58:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `menus_id` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercadolibre_notifications`
--

CREATE TABLE `mercadolibre_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `resource` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `topic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `application_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attempts` smallint(6) NOT NULL,
  `status` smallint(6) NOT NULL,
  `process` smallint(6) NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sent` datetime NOT NULL,
  `received` datetime NOT NULL,
  `request` longtext COLLATE utf8_unicode_ci NOT NULL,
  `response` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercadolibre_questions`
--

CREATE TABLE `mercadolibre_questions` (
  `question_id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `process` smallint(6) NOT NULL,
  `zendesk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mercadolibre_question_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `received` datetime NOT NULL COMMENT 'Received Quetion Day',
  `sent` datetime DEFAULT NULL COMMENT 'Sent Respont Day'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_21_111806_mercadolibre_notifications_table', 1),
(4, '2016_06_10_111806_mercadolibre_questions_table', 1),
(5, '2017_03_04_000038_create_user_password_resets_table', 1),
(6, '2017_03_04_000638_create_admins_table', 1),
(7, '2017_03_04_000639_create_admin_password_resets_table', 1),
(8, '2017_03_04_030847_create_shoppingcart_table', 1),
(9, '2017_03_04_190645_create_user_social_accounts_table', 1),
(10, '2017_03_04_191335_entrust_setup_tables', 1),
(11, '2017_03_04_235733_create_menus_table', 1),
(12, '2017_03_04_235744_create_banner_types_table', 1),
(13, '2017_03_04_235755_create_banners_table', 1),
(14, '2017_03_04_235802_create_wallpapers_table', 1),
(15, '2017_03_04_235813_create_document_categories_table', 1),
(16, '2017_03_04_235814_create_documents_table', 1),
(17, '2017_03_04_235900_create_article_types_table', 1),
(18, '2017_03_04_235905_create_articles_table', 1),
(19, '2017_03_04_235936_create_product_brands_table', 1),
(20, '2017_03_04_235944_create_product_categories_table', 1),
(21, '2017_03_05_000036_create_product_subcategories_table', 1),
(22, '2017_03_05_000049_create_product_tags_table', 1),
(23, '2017_03_05_000139_create_product_filters_table', 1),
(24, '2017_03_05_000522_create_product_filter_product_subcategory_pivot_table', 1),
(25, '2017_03_05_000622_create_products_table', 1),
(26, '2017_03_05_002557_create_product_subcategory_product_pivot_table', 1),
(27, '2017_03_05_002602_create_product_tag_product_pivot_table', 1),
(28, '2017_03_05_002606_create_product_filter_product_pivot_table', 1),
(29, '2017_03_05_002610_create_product_pictures_table', 1),
(30, '2017_03_05_002610_create_product_videos_table', 1),
(31, '2017_03_05_002611_create_product_additionals_table', 1),
(32, '2017_03_05_002850_create_product_subproduct_pivot_table', 1),
(33, '2017_03_05_003824_create_orders_table', 1),
(34, '2017_03_05_004054_create_shipping_orders_table', 1),
(35, '2017_03_05_004055_create_online_orders_table', 1),
(36, '2017_03_05_004202_create_order_products_table', 1),
(37, '2017_03_05_011027_create_pc_builds_table', 1),
(38, '2017_03_05_011028_create_pc_build_products_table', 1),
(39, '2017_03_05_011124_create_nvidias_table', 1),
(40, '2017_03_05_055724_create_discounts_table', 1),
(41, '2017_03_15_053915_create_discount_product_pivot_table', 1),
(42, '2017_03_15_054015_create_discount_product_subcategory_pivot_table', 1),
(43, '2017_03_29_141358_create_wishlists_table', 1),
(44, '2017_05_24_154846_create_push_subscriptions_table', 1),
(45, '2017_07_11_234328_create_product_notifies_table', 1),
(46, '2017_09_05_141955_create_caracteristic_categories_table', 1),
(47, '2017_09_05_142853_create_caracteristics_table', 1),
(48, '2017_09_06_104059_create_caracteristic_category_caracteristics_table', 1),
(49, '2017_09_06_125132_create_caracteristic_product_categories_table', 1),
(50, '2017_09_07_162127_create_caracteristic_products_table', 1),
(51, '2018_01_18_205831_create_invitation_table', 2),
(52, '2018_04_30_140659_create_pagos_table', 3),
(53, '2018_04_30_143847_create_state_pagos_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nvidias`
--

CREATE TABLE `nvidias` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `link_imagen` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `html` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `online_orders`
--

CREATE TABLE `online_orders` (
  `orders_id` int(10) UNSIGNED NOT NULL,
  `collection_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `collection_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `preference_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `external_reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transportadora` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'sin asignar',
  `numero_guia` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'sin asignar',
  `link_seguimiento` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'sin asignar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_pago` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_products`
--

CREATE TABLE `order_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `units` int(11) NOT NULL,
  `unit_price` double(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birday` date NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eps` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contacto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `share` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `star` date NOT NULL,
  `active` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `name`, `email`, `cc`, `birday`, `direccion`, `tipe`, `eps`, `contacto`, `share`, `star`, `active`, `created_at`, `updated_at`) VALUES
(6, '123123123', 'florez.joys@gmail.com', '1234567890', '2018-04-25', 'asdasdasd', 'cc', 'asdasdasd', 'asdasdasdas', 'internet', '2018-05-01', 'activado', '2018-04-30 21:20:21', '2018-04-30 21:20:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pc_builds`
--

CREATE TABLE `pc_builds` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `armado` tinyint(1) NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pc_build_products`
--

CREATE TABLE `pc_build_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `pc_build_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create-admin', 'Crear Administración', 'Crear Registros del Área de Administración', '2018-01-17 22:16:03', '2018-01-17 22:16:03'),
(2, 'edit-admin', 'Editar Administración', 'Editar Registros del Área de Administración', '2018-01-17 22:16:03', '2018-01-17 22:16:03'),
(3, 'delete-admin', 'Borrar Administración', 'Borrar Registros del Área de Administración', '2018-01-17 22:16:03', '2018-01-17 22:16:03'),
(4, 'create-user', 'Crear Usuarios', 'Crear Registros del Área de Usuarios', '2018-01-17 22:16:03', '2018-01-17 22:16:03'),
(5, 'edit-user', 'Editar Usuarios', 'Editar Registros del Área de Usuarios', '2018-01-17 22:16:03', '2018-01-17 22:16:03'),
(6, 'delete-user', 'Borrar Usuarios', 'Borrar Registros del Área de Usuarios', '2018-01-17 22:16:03', '2018-01-17 22:16:03'),
(7, 'create-articles', 'Crear Artículos', 'Crear Registros del Área de Artículos', '2018-01-17 22:16:03', '2018-01-17 22:16:03'),
(8, 'edit-articles', 'Editar Artículos', 'Editar Registros del Área de Artículos', '2018-01-17 22:16:03', '2018-01-17 22:16:03'),
(9, 'delete-articles', 'Borrar Artículos', 'Borrar Registros del Área de Artículos', '2018-01-17 22:16:03', '2018-01-17 22:16:03'),
(10, 'create-store', 'Crear Tienda', 'Crear Registros del Área de Tienda', '2018-01-17 22:16:03', '2018-01-17 22:16:03'),
(11, 'edit-store', 'Editar Tienda', 'Editar Registros del Área de Tienda', '2018-01-17 22:16:03', '2018-01-17 22:16:03'),
(12, 'delete-store', 'Borrar Tienda', 'Borrar Registros del Área de Tienda', '2018-01-17 22:16:03', '2018-01-17 22:16:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 3),
(5, 1),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(10, 4),
(11, 1),
(11, 4),
(12, 1),
(12, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8_unicode_ci,
  `seller_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` double(15,2) NOT NULL,
  `ml_price` double(15,2) NOT NULL,
  `local_price` double(15,2) NOT NULL,
  `tax` tinyint(1) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL,
  `video_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sellerCustomField` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `specifications` text COLLATE utf8_unicode_ci,
  `permalink` text COLLATE utf8_unicode_ci,
  `status` text COLLATE utf8_unicode_ci,
  `ml_status` text COLLATE utf8_unicode_ci,
  `warranty` text COLLATE utf8_unicode_ci,
  `parent_item_id` int(11) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `product_special` tinyint(1) NOT NULL DEFAULT '0',
  `processor_type` enum('n/a','intel','amd') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n/a',
  `brands_id` int(10) UNSIGNED NOT NULL,
  `available_date` date NOT NULL DEFAULT '1969-12-31',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_additionals`
--

CREATE TABLE `product_additionals` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `products_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_brands`
--

CREATE TABLE `product_brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `product_brands`
--

INSERT INTO `product_brands` (`id`, `nombre`, `descripcion`, `estado`, `slug`) VALUES
(1, 'N/A', NULL, 1, 'n-a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hidden` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `product_categories`
--

INSERT INTO `product_categories` (`id`, `nombre`, `descripcion`, `estado`, `slug`, `hidden`) VALUES
(1, 'planes', 'planes', 1, 'planes', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_filters`
--

CREATE TABLE `product_filters` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_filter_product`
--

CREATE TABLE `product_filter_product` (
  `product_filter_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_filter_product_subcategory`
--

CREATE TABLE `product_filter_product_subcategory` (
  `product_filter_id` int(10) UNSIGNED NOT NULL,
  `product_subcategory_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_notifies`
--

CREATE TABLE `product_notifies` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_pictures`
--

CREATE TABLE `product_pictures` (
  `id` int(10) UNSIGNED NOT NULL,
  `link_imagen` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `products_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `posicion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_subcategories`
--

CREATE TABLE `product_subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `product_categories_id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `product_subcategories`
--

INSERT INTO `product_subcategories` (`id`, `nombre`, `descripcion`, `estado`, `product_categories_id`, `slug`) VALUES
(1, '1 mes', NULL, 1, 1, '1-mes'),
(2, '3 meses', NULL, 1, 1, '3-meses'),
(3, '6 meses', NULL, 1, 1, '6-meses'),
(4, '1 año', NULL, 1, 1, '1-ano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_subcategory_product`
--

CREATE TABLE `product_subcategory_product` (
  `product_subcategory_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_subproduct`
--

CREATE TABLE `product_subproduct` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `subproduct_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_tags`
--

CREATE TABLE `product_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_tag_product`
--

CREATE TABLE `product_tag_product` (
  `product_tag_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_videos`
--

CREATE TABLE `product_videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `link_video` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `products_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `push_subscriptions`
--

CREATE TABLE `push_subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_archivo` enum('admin','user') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `push_subscriptions`
--

INSERT INTO `push_subscriptions` (`id`, `token`, `tipo_archivo`, `created_at`, `updated_at`) VALUES
(1, 'c5nUseCCbdo:APA91bHSuqAQiw2dMOJqKrDfdPPls-rD0fvd8sZEYzePvLSZjv4SX3Ji_jl76XUPZpSdMn63MLWotORERjSrVQoHx2Tx0L0QbEQjoKkkESB-ELFhbHlSpS0uWsWG9ecgGhe5pBjL5KTI', 'user', '2018-04-30 18:58:47', '2018-04-30 18:58:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'Superadministrador', 'Todos los Permisos', '2018-01-17 22:16:03', '2018-01-17 22:16:03'),
(2, 'admin', 'Administrador General', 'Permisos del Área de Administración General', '2018-01-17 22:16:04', '2018-01-17 22:16:04'),
(3, 'users', 'Administrador de Usuarios', 'Permisos del Área de Usuarios', '2018-01-17 22:16:04', '2018-01-17 22:16:04'),
(4, 'store', 'Administrador de Tienda', 'Permisos del Área de Tienda', '2018-01-17 22:16:04', '2018-01-17 22:16:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shipping_orders`
--

CREATE TABLE `shipping_orders` (
  `orders_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dni` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `direccion_2` mediumtext COLLATE utf8_unicode_ci,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `instance` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state_pagos`
--

CREATE TABLE `state_pagos` (
  `id` int(10) UNSIGNED NOT NULL,
  `cc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `plan` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `state_pagos`
--

INSERT INTO `state_pagos` (`id`, `cc`, `created_at`, `plan`) VALUES
(1, '1234567890', '2018-04-30 16:20:21', 'mensualidad'),
(2, '1234567890', '2018-04-30 16:26:21', 'mensualidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `birthday` date DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `city`, `active`, `birthday`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'User', 'Test', 'test', 'sinusuario@example.com', NULL, 1, NULL, NULL, '$2y$10$69Vzq7bgQjWorx92oCcJbuE9JikwM03Jcxk4meZBU5mnP0Zl2/3yu', NULL, '2018-01-17 22:16:05', '2018-01-18 03:05:39', 'user'),
(2, 'joys', 'florez', 'thelord', 'florez.joys@gmail.com', 'Bogota', 1, '1988-08-13', '', '$2y$10$87D3kChNJuWE9IJhKnVNf.RJN2EpI1fmpj.qnTFEAnzNpC.XmJtuu', NULL, '2018-01-18 03:07:14', '2018-01-18 03:07:14', 'thelord');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_password_resets`
--

CREATE TABLE `user_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_social_accounts`
--

CREATE TABLE `user_social_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `provider_user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wallpapers`
--

CREATE TABLE `wallpapers` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `link_imagen` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `tipo_archivo` enum('imagen','video') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'imagen',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `products_id` int(10) UNSIGNED NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_slug_unique` (`slug`);

--
-- Indices de la tabla `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`),
  ADD KEY `admin_password_resets_token_index` (`token`);

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`),
  ADD KEY `articles_article_types_id_foreign` (`article_types_id`);

--
-- Indices de la tabla `article_types`
--
ALTER TABLE `article_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `article_types_slug_unique` (`slug`);

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_slug_unique` (`slug`),
  ADD KEY `banners_banner_types_id_foreign` (`banner_types_id`);

--
-- Indices de la tabla `banner_types`
--
ALTER TABLE `banner_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banner_types_slug_unique` (`slug`);

--
-- Indices de la tabla `caracteristics`
--
ALTER TABLE `caracteristics`
  ADD PRIMARY KEY (`id_caracteristic`);

--
-- Indices de la tabla `caracteristic_categories`
--
ALTER TABLE `caracteristic_categories`
  ADD PRIMARY KEY (`id_caracteristic_category`);

--
-- Indices de la tabla `caracteristic_category_caracteristics`
--
ALTER TABLE `caracteristic_category_caracteristics`
  ADD PRIMARY KEY (`id_pivot_category_caracteristics`),
  ADD KEY `caracteristic_category_caracteristics_fk_category_foreign` (`fk_category`),
  ADD KEY `caracteristic_category_caracteristics_fk_caracteristic_foreign` (`fk_caracteristic`);

--
-- Indices de la tabla `caracteristic_products`
--
ALTER TABLE `caracteristic_products`
  ADD PRIMARY KEY (`id_caracteristic_product`),
  ADD KEY `caracteristic_products_fk_category_foreign` (`fk_category`),
  ADD KEY `caracteristic_products_fk_product_foreign` (`fk_product`),
  ADD KEY `caracteristic_products_fk_caracteristic_foreign` (`fk_caracteristic`);

--
-- Indices de la tabla `caracteristic_product_categories`
--
ALTER TABLE `caracteristic_product_categories`
  ADD PRIMARY KEY (`id_pivot_category_products`),
  ADD KEY `caracteristic_product_categories_fk_category_foreign` (`fk_category`),
  ADD KEY `caracteristic_product_categories_fk_product_category_foreign` (`fk_product_category`);

--
-- Indices de la tabla `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `discounts_slug_unique` (`slug`);

--
-- Indices de la tabla `discount_product`
--
ALTER TABLE `discount_product`
  ADD PRIMARY KEY (`discount_id`,`product_id`),
  ADD KEY `discount_product_discount_id_index` (`discount_id`),
  ADD KEY `discount_product_product_id_index` (`product_id`);

--
-- Indices de la tabla `discount_product_subcategory`
--
ALTER TABLE `discount_product_subcategory`
  ADD PRIMARY KEY (`discount_id`,`product_subcategory_id`),
  ADD KEY `discount_product_subcategory_discount_id_index` (`discount_id`),
  ADD KEY `discount_product_subcategory_product_subcategory_id_index` (`product_subcategory_id`);

--
-- Indices de la tabla `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documents_slug_unique` (`slug`),
  ADD KEY `documents_document_category_id_foreign` (`document_category_id`);

--
-- Indices de la tabla `document_categories`
--
ALTER TABLE `document_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `document_categories_slug_unique` (`slug`);

--
-- Indices de la tabla `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invitations_email_unique` (`email`),
  ADD UNIQUE KEY `invitations_cc_unique` (`cc`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_slug_unique` (`slug`);

--
-- Indices de la tabla `mercadolibre_notifications`
--
ALTER TABLE `mercadolibre_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mercadolibre_questions`
--
ALTER TABLE `mercadolibre_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nvidias`
--
ALTER TABLE `nvidias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nvidias_slug_unique` (`slug`);

--
-- Indices de la tabla `online_orders`
--
ALTER TABLE `online_orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD UNIQUE KEY `online_orders_slug_unique` (`slug`),
  ADD KEY `online_orders_orders_id_index` (`orders_id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_slug_unique` (`slug`),
  ADD KEY `orders_users_id_foreign` (`users_id`);

--
-- Indices de la tabla `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_products_slug_unique` (`slug`),
  ADD KEY `order_products_product_id_foreign` (`product_id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pagos_email_unique` (`email`),
  ADD UNIQUE KEY `pagos_cc_unique` (`cc`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `pc_builds`
--
ALTER TABLE `pc_builds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pc_builds_slug_unique` (`slug`),
  ADD KEY `pc_builds_users_id_foreign` (`users_id`);

--
-- Indices de la tabla `pc_build_products`
--
ALTER TABLE `pc_build_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pc_build_products_pc_build_id_index` (`pc_build_id`),
  ADD KEY `pc_build_products_product_id_index` (`product_id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_brands_id_foreign` (`brands_id`);

--
-- Indices de la tabla `product_additionals`
--
ALTER TABLE `product_additionals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_additionals_slug_unique` (`slug`),
  ADD KEY `product_additionals_products_id_foreign` (`products_id`);

--
-- Indices de la tabla `product_brands`
--
ALTER TABLE `product_brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_brands_slug_unique` (`slug`);

--
-- Indices de la tabla `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_categories_slug_unique` (`slug`);

--
-- Indices de la tabla `product_filters`
--
ALTER TABLE `product_filters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_filters_slug_unique` (`slug`);

--
-- Indices de la tabla `product_filter_product`
--
ALTER TABLE `product_filter_product`
  ADD KEY `product_filter_product_product_filter_id_foreign` (`product_filter_id`),
  ADD KEY `product_filter_product_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `product_filter_product_subcategory`
--
ALTER TABLE `product_filter_product_subcategory`
  ADD PRIMARY KEY (`product_filter_id`,`product_subcategory_id`),
  ADD KEY `product_filter_product_subcategory_product_filter_id_index` (`product_filter_id`),
  ADD KEY `product_filter_product_subcategory_product_subcategory_id_index` (`product_subcategory_id`);

--
-- Indices de la tabla `product_notifies`
--
ALTER TABLE `product_notifies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_notifies_user_id_index` (`user_id`),
  ADD KEY `product_notifies_product_id_index` (`product_id`);

--
-- Indices de la tabla `product_pictures`
--
ALTER TABLE `product_pictures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_pictures_slug_unique` (`slug`),
  ADD KEY `product_pictures_products_id_foreign` (`products_id`);

--
-- Indices de la tabla `product_subcategories`
--
ALTER TABLE `product_subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_subcategories_slug_unique` (`slug`),
  ADD KEY `product_subcategories_product_categories_id_foreign` (`product_categories_id`);

--
-- Indices de la tabla `product_subcategory_product`
--
ALTER TABLE `product_subcategory_product`
  ADD KEY `ps_product_subcategory_id` (`product_subcategory_id`),
  ADD KEY `ps_product_id` (`product_id`);

--
-- Indices de la tabla `product_subproduct`
--
ALTER TABLE `product_subproduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_subproduct_product_id_foreign` (`product_id`),
  ADD KEY `product_subproduct_subproduct_id_foreign` (`subproduct_id`);

--
-- Indices de la tabla `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_tags_slug_unique` (`slug`);

--
-- Indices de la tabla `product_tag_product`
--
ALTER TABLE `product_tag_product`
  ADD PRIMARY KEY (`product_tag_id`,`product_id`),
  ADD KEY `product_tag_product_product_tag_id_index` (`product_tag_id`),
  ADD KEY `product_tag_product_product_id_index` (`product_id`);

--
-- Indices de la tabla `product_videos`
--
ALTER TABLE `product_videos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_videos_slug_unique` (`slug`),
  ADD KEY `product_videos_products_id_foreign` (`products_id`);

--
-- Indices de la tabla `push_subscriptions`
--
ALTER TABLE `push_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `shipping_orders`
--
ALTER TABLE `shipping_orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD UNIQUE KEY `shipping_orders_slug_unique` (`slug`),
  ADD KEY `shipping_orders_orders_id_index` (`orders_id`);

--
-- Indices de la tabla `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indices de la tabla `state_pagos`
--
ALTER TABLE `state_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_slug_unique` (`slug`);

--
-- Indices de la tabla `user_password_resets`
--
ALTER TABLE `user_password_resets`
  ADD KEY `user_password_resets_email_index` (`email`),
  ADD KEY `user_password_resets_token_index` (`token`);

--
-- Indices de la tabla `user_social_accounts`
--
ALTER TABLE `user_social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_social_accounts_users_id_foreign` (`users_id`);

--
-- Indices de la tabla `wallpapers`
--
ALTER TABLE `wallpapers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wallpapers_slug_unique` (`slug`);

--
-- Indices de la tabla `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_users_id_foreign` (`users_id`),
  ADD KEY `wishlists_products_id_foreign` (`products_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `article_types`
--
ALTER TABLE `article_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `banner_types`
--
ALTER TABLE `banner_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `caracteristics`
--
ALTER TABLE `caracteristics`
  MODIFY `id_caracteristic` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `caracteristic_categories`
--
ALTER TABLE `caracteristic_categories`
  MODIFY `id_caracteristic_category` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `caracteristic_category_caracteristics`
--
ALTER TABLE `caracteristic_category_caracteristics`
  MODIFY `id_pivot_category_caracteristics` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `caracteristic_products`
--
ALTER TABLE `caracteristic_products`
  MODIFY `id_caracteristic_product` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `caracteristic_product_categories`
--
ALTER TABLE `caracteristic_product_categories`
  MODIFY `id_pivot_category_products` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `document_categories`
--
ALTER TABLE `document_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mercadolibre_notifications`
--
ALTER TABLE `mercadolibre_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mercadolibre_questions`
--
ALTER TABLE `mercadolibre_questions`
  MODIFY `question_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT de la tabla `nvidias`
--
ALTER TABLE `nvidias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pc_builds`
--
ALTER TABLE `pc_builds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pc_build_products`
--
ALTER TABLE `pc_build_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `product_additionals`
--
ALTER TABLE `product_additionals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `product_brands`
--
ALTER TABLE `product_brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `product_filters`
--
ALTER TABLE `product_filters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `product_notifies`
--
ALTER TABLE `product_notifies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `product_pictures`
--
ALTER TABLE `product_pictures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `product_subcategories`
--
ALTER TABLE `product_subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `product_subproduct`
--
ALTER TABLE `product_subproduct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `product_videos`
--
ALTER TABLE `product_videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `push_subscriptions`
--
ALTER TABLE `push_subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `state_pagos`
--
ALTER TABLE `state_pagos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `user_social_accounts`
--
ALTER TABLE `user_social_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `wallpapers`
--
ALTER TABLE `wallpapers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_article_types_id_foreign` FOREIGN KEY (`article_types_id`) REFERENCES `article_types` (`id`);

--
-- Filtros para la tabla `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_banner_types_id_foreign` FOREIGN KEY (`banner_types_id`) REFERENCES `banner_types` (`id`);

--
-- Filtros para la tabla `caracteristic_category_caracteristics`
--
ALTER TABLE `caracteristic_category_caracteristics`
  ADD CONSTRAINT `caracteristic_category_caracteristics_fk_caracteristic_foreign` FOREIGN KEY (`fk_caracteristic`) REFERENCES `caracteristics` (`id_caracteristic`),
  ADD CONSTRAINT `caracteristic_category_caracteristics_fk_category_foreign` FOREIGN KEY (`fk_category`) REFERENCES `caracteristic_categories` (`id_caracteristic_category`);

--
-- Filtros para la tabla `caracteristic_products`
--
ALTER TABLE `caracteristic_products`
  ADD CONSTRAINT `caracteristic_products_fk_caracteristic_foreign` FOREIGN KEY (`fk_caracteristic`) REFERENCES `caracteristics` (`id_caracteristic`),
  ADD CONSTRAINT `caracteristic_products_fk_category_foreign` FOREIGN KEY (`fk_category`) REFERENCES `caracteristic_categories` (`id_caracteristic_category`),
  ADD CONSTRAINT `caracteristic_products_fk_product_foreign` FOREIGN KEY (`fk_product`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `caracteristic_product_categories`
--
ALTER TABLE `caracteristic_product_categories`
  ADD CONSTRAINT `caracteristic_product_categories_fk_category_foreign` FOREIGN KEY (`fk_category`) REFERENCES `caracteristic_categories` (`id_caracteristic_category`),
  ADD CONSTRAINT `caracteristic_product_categories_fk_product_category_foreign` FOREIGN KEY (`fk_product_category`) REFERENCES `product_subcategories` (`id`);

--
-- Filtros para la tabla `discount_product`
--
ALTER TABLE `discount_product`
  ADD CONSTRAINT `discount_product_discount_id_foreign` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `discount_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `discount_product_subcategory`
--
ALTER TABLE `discount_product_subcategory`
  ADD CONSTRAINT `ps_discount_id` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ps_subcategory_id` FOREIGN KEY (`product_subcategory_id`) REFERENCES `product_subcategories` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_document_category_id_foreign` FOREIGN KEY (`document_category_id`) REFERENCES `document_categories` (`id`);

--
-- Filtros para la tabla `online_orders`
--
ALTER TABLE `online_orders`
  ADD CONSTRAINT `online_orders_orders_id_foreign` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`);

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `pc_builds`
--
ALTER TABLE `pc_builds`
  ADD CONSTRAINT `pc_builds_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `pc_build_products`
--
ALTER TABLE `pc_build_products`
  ADD CONSTRAINT `pc_build_products_pc_build_id_foreign` FOREIGN KEY (`pc_build_id`) REFERENCES `pc_builds` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pc_build_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brands_id_foreign` FOREIGN KEY (`brands_id`) REFERENCES `product_brands` (`id`);

--
-- Filtros para la tabla `product_additionals`
--
ALTER TABLE `product_additionals`
  ADD CONSTRAINT `product_additionals_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `product_filter_product`
--
ALTER TABLE `product_filter_product`
  ADD CONSTRAINT `product_filter_product_product_filter_id_foreign` FOREIGN KEY (`product_filter_id`) REFERENCES `product_filters` (`id`),
  ADD CONSTRAINT `product_filter_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `product_filter_product_subcategory`
--
ALTER TABLE `product_filter_product_subcategory`
  ADD CONSTRAINT `pf_ps_id` FOREIGN KEY (`product_filter_id`) REFERENCES `product_filters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ps_pf_id` FOREIGN KEY (`product_subcategory_id`) REFERENCES `product_subcategories` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `product_notifies`
--
ALTER TABLE `product_notifies`
  ADD CONSTRAINT `product_notifies_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_notifies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `product_pictures`
--
ALTER TABLE `product_pictures`
  ADD CONSTRAINT `product_pictures_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `product_subcategories`
--
ALTER TABLE `product_subcategories`
  ADD CONSTRAINT `product_subcategories_product_categories_id_foreign` FOREIGN KEY (`product_categories_id`) REFERENCES `product_categories` (`id`);

--
-- Filtros para la tabla `product_subcategory_product`
--
ALTER TABLE `product_subcategory_product`
  ADD CONSTRAINT `ps_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `ps_product_subcategory_id` FOREIGN KEY (`product_subcategory_id`) REFERENCES `product_subcategories` (`id`);

--
-- Filtros para la tabla `product_subproduct`
--
ALTER TABLE `product_subproduct`
  ADD CONSTRAINT `product_subproduct_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_subproduct_subproduct_id_foreign` FOREIGN KEY (`subproduct_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `product_tag_product`
--
ALTER TABLE `product_tag_product`
  ADD CONSTRAINT `product_tag_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_tag_product_product_tag_id_foreign` FOREIGN KEY (`product_tag_id`) REFERENCES `product_tags` (`id`);

--
-- Filtros para la tabla `product_videos`
--
ALTER TABLE `product_videos`
  ADD CONSTRAINT `product_videos_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `shipping_orders`
--
ALTER TABLE `shipping_orders`
  ADD CONSTRAINT `shipping_orders_orders_id_foreign` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`);

--
-- Filtros para la tabla `user_social_accounts`
--
ALTER TABLE `user_social_accounts`
  ADD CONSTRAINT `user_social_accounts_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `wishlists_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
