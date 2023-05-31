-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2021 a las 01:11:29
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

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
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `cantidadTotal` int(11) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `tipo_pedido` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `id_cliente`, `precio`, `fecha`, `fecha_fin`, `cantidadTotal`, `direccion`, `tipo_pedido`, `estado`) VALUES
(508, 1, 2717000, '2021-06-18', '2021-06-21', 0, 'Urbanizacion jardines de san pedro segunda etapa M E lote 23', 1, 0),
(511, 3, 7465, '2021-06-21', '2021-06-23', 0, 'urbanizacion jardines de san pedro segunda etapa M E lote 26', 2, 3),
(516, 1, 22919000, '2021-06-23', '2021-06-25', 0, 'Urbanizacion jardines de san pedro segunda etapa M E lote 23', 2, 0),
(565, 20, 160, '2021-06-25', '2021-06-27', 0, 'Prueba cr29', 2, 0),
(566, 20, 520, '2021-06-25', '2021-06-27', 0, 'Prueba cr29', 1, 0),
(575, 3, 110, '2021-06-28', '2021-06-30', 0, 'urbanizacion jardines de san pedro segunda etapa M E lote 26', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial2`
--

CREATE TABLE `historial2` (
  `id` int(11) NOT NULL,
  `id_color` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_talla` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `cantidad_preorder` int(11) DEFAULT NULL,
  `id_h` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial2`
--

INSERT INTO `historial2` (`id`, `id_color`, `id_producto`, `id_talla`, `cantidad`, `cantidad_preorder`, `id_h`) VALUES
(1781, 4, 112, 4, 1, NULL, 508),
(1782, 4, 112, 5, 1, NULL, 508),
(1783, 4, 110, 5, 1, NULL, 508),
(1784, 1, 110, 3, 3, NULL, 508),
(1785, 1, 110, 4, 1, NULL, 508),
(1786, 17, 110, 3, 2, NULL, 508),
(1804, 39, 110, 3, NULL, 6, 511),
(1805, 39, 110, 4, NULL, 4, 511),
(1806, 39, 110, 5, NULL, 2, 511),
(1807, 4, 110, 3, NULL, 2, 511),
(1808, 4, 110, 4, NULL, 2, 511),
(1809, 4, 110, 5, NULL, 3, 511),
(1810, 1, 110, 3, NULL, 8, 511),
(1811, 1, 110, 4, NULL, 5, 511),
(1812, 1, 110, 5, NULL, 1, 511),
(1813, 17, 110, 4, NULL, 5, 511),
(1814, 17, 110, 5, NULL, 1, 511),
(1815, 1, 103, 3, NULL, 2, 511),
(1816, 1, 103, 4, NULL, 3, 511),
(1817, 1, 103, 5, NULL, 4, 511),
(1818, 4, 103, 3, NULL, 5, 511),
(1819, 4, 103, 4, NULL, 3, 511),
(1820, 4, 103, 5, NULL, 6, 511),
(1821, 39, 103, 3, NULL, 1, 511),
(1822, 39, 103, 4, NULL, 5, 511),
(1823, 39, 103, 5, NULL, 2, 511),
(1872, 11, 141, 3, NULL, 20, 516),
(1873, 11, 141, 4, NULL, 10, 516),
(1874, 30, 141, 3, NULL, 13, 516),
(1875, 30, 141, 4, NULL, 5, 516),
(1884, 42, 96, 3, NULL, 1, 516),
(1885, 5, 98, 3, NULL, 1, 516),
(1886, 4, 101, 3, NULL, 1, 516),
(1887, 26, 96, 5, NULL, 1, 516),
(2023, 3, 97, 3, NULL, 1, 565),
(2024, 5, 98, 3, 1, NULL, 566),
(2027, 4, 106, 3, 3, NULL, 566),
(2031, 41, 97, 3, NULL, 1, 565),
(2118, 44, 111, 3, 1, NULL, 575);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `cod_imagen` int(11) NOT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `foto_producto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria`, `nombre`, `precio`, `stock`, `descripcion`, `creado`, `codigo_barra`, `foto_producto`) VALUES
(161, 'Bebidas', 'Cocacola 1/4 litros', 24000, 50, 'bebida nutritiva', '2021-10-24 16:02:26', '123456789', 'Cocacola 1_4 litros.png'),
(162, 'Bebidas', 'Pepsy 500 mil', 1800, 20, NULL, '0000-00-00 00:00:00', '987654321', 'Nombre del archivo (4).png'),
(163, 'Jugos', 'Hit mango 1/4 litro', 3000, 10, 'Jugo ', '0000-00-00 00:00:00', '512345', 'Nombre del archivo.png'),
(164, 'Galletas', 'Clud social 24g', 700, 10, 'Galleta salada con harina de trigo integral ', '0000-00-00 00:00:00', '7622210847935', '7622210854209.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla`
--

CREATE TABLE `talla` (
  `id` int(11) NOT NULL,
  `nom_talla` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `talla`
--

INSERT INTO `talla` (`id`, `nom_talla`) VALUES
(3, 'One size'),
(4, 'Petit'),
(5, 'Extended');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombreEm` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `cedula` int(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `personaC` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `admin_verificado` int(11) NOT NULL DEFAULT 0,
  `asignar_asesor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nombreEm`, `telefono`, `cedula`, `direccion`, `codigo`, `personaC`, `ciudad`, `pais`, `admin_verificado`, `asignar_asesor`) VALUES
(1, 'gersonpedrozosalcedo@gmail.com', '$2y$10$HdS7775yQ3R5184wdxKPG.xItfk6wWPd4OFGtp/aPv1mi3B8NncQq', 'MC DEVINS', '3004155476', 1143415086, 'Urbanizacion jardines de san pedro segunda etapa M E lote 23', '130001', 'Gerson Pedrozo', 'Cartagena', 'Colombia', 0, 2),
(3, 'gpedrozos@unicartagena.edu.co', '$2y$10$kGdMrw1n1xqV25Jwf1ipZ.V9qoBWDmTeN51Ju0BRx/tJOeE3Qr1Na', 'Company S.A.S', '300145781', 1143415085, 'urbanizacion jardines de san pedro segunda etapa M E lote 26', '23540', 'Sebastian', 'Ciudad de Mexico', 'Mexico', 0, 2),
(20, 'webmaster@maygelcoronel.com', '$2y$10$kbOmw6S3lyRmrvncNlh1puhs15p350MSypRbL/Of0w7xGEARcRszy', 'Prueba S.A.S', '3201245823', 1234567, 'Prueba cr29', '55555', 'Carlos prueba', 'New York', 'Estados unidos', 0, 3);

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
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial2`
--
ALTER TABLE `historial2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`cod_imagen`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categorias_p`
--
ALTER TABLE `categorias_p`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=586;

--
-- AUTO_INCREMENT de la tabla `historial2`
--
ALTER TABLE `historial2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2131;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `cod_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT de la tabla `talla`
--
ALTER TABLE `talla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
