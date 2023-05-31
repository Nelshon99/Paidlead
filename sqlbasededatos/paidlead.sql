-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2021 a las 15:23:17
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `paidlead`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nombre_asesor` varchar(100) NOT NULL,
  `telefono` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre_asesor`, `telefono`, `email`, `password`, `admin`) VALUES
(1, 'Gerson ', 123456789, 'admin@gmail.com', '$2y$10$HdS7775yQ3R5184wdxKPG.xItfk6wWPd4OFGtp/aPv1mi3B8NncQq', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_p`
--

CREATE TABLE `categorias_p` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias_p`
--

INSERT INTO `categorias_p` (`id`, `nombre`) VALUES
(1, 'Comestibles'),
(2, 'Bebidas'),
(3, 'Empaquetados'),
(4, 'No empaquetados'),
(5, 'Galletas'),
(6, 'Chocolate'),
(7, 'Panes'),
(8, 'Variados'),
(9, 'Gaseosas'),
(10, 'Jugos'),
(11, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `nombre_persona` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `valor_compra` varchar(20) DEFAULT NULL,
  `referencia_pago` varchar(30) DEFAULT NULL,
  `estado_compra` varchar(20) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `nombre_persona`, `telefono`, `email`, `valor_compra`, `referencia_pago`, `estado_compra`, `fecha`) VALUES
(28, 'Gerson Pedrozo', '+573004155476', 'gersonpedrozosalcedo@gmail.com', '2400', '1360207586', 'PAGADO', '2021-11-02 09:03:11'),
(29, 'Sebastian Pedrozo', '+573004145948', 'sebas@gmail.com', '2400', '1559914236', 'PAGADO', '2021-11-02 16:08:11'),
(30, 'prueba2', '+573004155476', 'gersonpedrozosalcedo@gmail.com', '2400', '2029563068', 'PAGADO', '2021-11-02 17:51:43'),
(31, 'prueba2', '+573004155476', 'gersonpedrozosalcedo@gmail.com', '2400', '1921701435', 'PAGADO', '2021-11-02 17:52:40'),
(32, 'prueba2', '+573004155476', 'gersonpedrozosalcedo@gmail.com', '2400', '1442577445', 'PAGADO', '2021-11-02 20:21:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasarela_pago`
--

CREATE TABLE `pasarela_pago` (
  `Id` int(11) NOT NULL,
  `Pasarela` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `PublicKey` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PrivateKey` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Currency` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `RedirectUrl` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ApiRest` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Ambiente` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pasarela_pago`
--

INSERT INTO `pasarela_pago` (`Id`, `Pasarela`, `PublicKey`, `PrivateKey`, `Currency`, `RedirectUrl`, `ApiRest`, `Ambiente`, `Estado`) VALUES
(1, 'wompi', 'pub_test_iO45oJoDpkzEqD1mqRh55YmWYSRnNo6n', 'prv_test_hLvBpvouYaySQLkEUGCZLeVdpbM7vTGQ\r\n', 'COP', '', 'https://sandbox.wompi.co/v1/', 'pruebas', 1),
(2, 'wompi', 'pub_test_iO45oJoDpkzEqD1mqRh55YmWYSRnNo6n\r\n', 'prv_test_hLvBpvouYaySQLkEUGCZLeVdpbM7vTGQ', 'COP', 'https://farmakanna.com/portal/paciente/historial_pedidos', 'https://production.wompi.co/v1/', 'produccion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `descripcion` varchar(100) DEFAULT NULL,
  `creado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `codigo_barra` varchar(30) DEFAULT NULL,
  `foto_producto` varchar(30) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria`, `nombre`, `precio`, `stock`, `descripcion`, `creado`, `codigo_barra`, `foto_producto`, `estado`) VALUES
(161, 'Bebidas', 'Cocacola 1/4 litros', 2400, 37, 'bebida nutritiva', '2021-11-02 20:21:48', '725272730706', 'cocacola.png', 0),
(162, 'Gaseosas', 'Pepsy 500 ml', 1900, 28, 'La mejor gaseosa', '2021-11-04 14:07:37', '625272730709', '3331770.jpg', 0),
(163, 'Jugos', 'Hit mango 1/4 litro', 3000, 10, 'Jugos', '2021-11-04 14:10:42', '525272730702', '480.png', 0),
(164, 'Galletas', 'Clud social 24g', 700, 7, 'Galleta salada con harina de trigo integral ', '2021-11-02 09:05:59', '225272730701', '7622210854209.webp', 0),
(165, 'Chocolate', 'masmelo', 2000, 9, 'Rico chocolate', '2021-11-02 09:05:59', '155156735631', 'Idoc julio 2021 -44.jpg', 0),
(166, 'Empaquetados', 'choclito', 1200, 30, 'jhhgfh', '2021-11-02 09:05:59', '543167816515', '_ASM3536.png', 0),
(177, 'Comestibles', 'prueba2', 0, 30, 'dsddsd', '0000-00-00 00:00:00', '153748264521', '2e37e04f-b084-499a-b080-ccb802', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_compras`
--

CREATE TABLE `producto_compras` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto_compras`
--

INSERT INTO `producto_compras` (`id`, `id_producto`, `cantidad_producto`, `fecha`, `id_compra`) VALUES
(35, 161, 1, 2021, 28),
(36, 161, 1, 2021, 29),
(37, 161, 1, 2021, 30),
(38, 161, 1, 2021, 31),
(39, 161, 1, 2021, 32);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias_p`
--
ALTER TABLE `categorias_p`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `producto_compras`
--
ALTER TABLE `producto_compras`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias_p`
--
ALTER TABLE `categorias_p`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT de la tabla `producto_compras`
--
ALTER TABLE `producto_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
