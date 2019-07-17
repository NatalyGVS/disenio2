-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-07-2019 a las 21:42:59
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `disenio2`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `INSERT_COTIZACION`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_COTIZACION` (IN `v_id_pedido` INT, IN `v_id_proveedor` INT)  BEGIN
  SELECT @fecha := CAST(NOW() AS CHAR);
  INSERT INTO `cotizacion`(
    `id_pedido`,
    `id_proveedor`,
    `fecha_cotizacion`
  )
  VALUES (
    v_id_pedido,
    v_id_proveedor,
    @fecha
  );
  
END$$

DROP PROCEDURE IF EXISTS `INSERT_DET_COTIZACION`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_DET_COTIZACION` (IN `v_id_cotizacion` INT, IN `v_id_insumo` INT, IN `v_cantidad` INT, IN `v_pu` VARCHAR(255), IN `v_valoracion` VARCHAR(255))  BEGIN
  INSERT INTO `cotizacion_detalle`(
    `id_cotizacion`,
    `insumo_id`,
    `cant_total`,
    `pu`,
    `valoracion`
  )
  VALUES (
    v_id_cotizacion,
    v_id_insumo,
    v_pu,
    v_valoracion
  );
END$$

DROP PROCEDURE IF EXISTS `UPDATE_COTIZACION`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_COTIZACION` (IN `v_id_cotizacion` INT)  BEGIN
  SELECT @v_precio := SUM(CAST(`pu` AS SIGNED)*CAST(`cant_total` AS SIGNED)) FROM `cotizacion_detalle` WHERE `id_cotizacion` = v_id_cotizacion;
  SELECT @v_puntuacion := SUM(CAST(`valoracion` AS SIGNED)*`cant_total`)  FROM `cotizacion_detallae` WHERE `id_cotizacion` = v_id_cotizacion;
  UPDATE `cotizacion`
  SET
    `puntuacion` = @v_puntuacion,
    `precio` = @v_precio
  WHERE
    `id` = v_id_cotizacion;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `nombre`, `active`) VALUES
(1, 'Barras', 1),
(2, 'Llaves', 1),
(3, 'Perfiles', 1),
(4, 'Forjados', 1),
(5, 'Válvulas', 1),
(6, 'Portaválvulas', 1),
(7, 'Maquinados', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `service_charge_value` varchar(255) NOT NULL,
  `vat_charge_value` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `currency` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`id`, `company_name`, `service_charge_value`, `vat_charge_value`, `address`, `phone`, `country`, `message`, `currency`) VALUES
(1, 'nombre', '', '18', 'doreccopm', '12312321', 'pais', 'holi', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

DROP TABLE IF EXISTS `cotizacion`;
CREATE TABLE IF NOT EXISTS `cotizacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fecha_cotizacion` varchar(255) NOT NULL,
  `puntuacion` varchar(255) NOT NULL,
  `precio` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`id`, `id_pedido`, `id_proveedor`, `fecha_cotizacion`, `puntuacion`, `precio`) VALUES
(36, 8, 1, '', '', ''),
(37, 8, 2, '', '', ''),
(38, 8, 3, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_detalle`
--

DROP TABLE IF EXISTS `cotizacion_detalle`;
CREATE TABLE IF NOT EXISTS `cotizacion_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cotizacion` int(11) NOT NULL,
  `insumo_id` int(11) NOT NULL,
  `cant_total` varchar(255) NOT NULL,
  `pu` varchar(255) NOT NULL,
  `valoracion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL,
  `permission` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `permission`) VALUES
(1, 'Administrator', 'a:36:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:11:\"createBrand\";i:9;s:11:\"updateBrand\";i:10;s:9:\"viewBrand\";i:11;s:11:\"deleteBrand\";i:12;s:14:\"createCategory\";i:13;s:14:\"updateCategory\";i:14;s:12:\"viewCategory\";i:15;s:14:\"deleteCategory\";i:16;s:11:\"createStore\";i:17;s:11:\"updateStore\";i:18;s:9:\"viewStore\";i:19;s:11:\"deleteStore\";i:20;s:15:\"createAttribute\";i:21;s:15:\"updateAttribute\";i:22;s:13:\"viewAttribute\";i:23;s:15:\"deleteAttribute\";i:24;s:13:\"createProduct\";i:25;s:13:\"updateProduct\";i:26;s:11:\"viewProduct\";i:27;s:13:\"deleteProduct\";i:28;s:11:\"createOrder\";i:29;s:11:\"updateOrder\";i:30;s:9:\"viewOrder\";i:31;s:11:\"deleteOrder\";i:32;s:11:\"viewReports\";i:33;s:13:\"updateCompany\";i:34;s:11:\"viewProfile\";i:35;s:13:\"updateSetting\";}'),
(2, 'Administrador', 'a:24:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:14:\"createCategory\";i:9;s:14:\"updateCategory\";i:10;s:12:\"viewCategory\";i:11;s:14:\"deleteCategory\";i:12;s:13:\"createProduct\";i:13;s:13:\"updateProduct\";i:14;s:11:\"viewProduct\";i:15;s:13:\"deleteProduct\";i:16;s:11:\"createOrder\";i:17;s:11:\"updateOrder\";i:18;s:9:\"viewOrder\";i:19;s:11:\"deleteOrder\";i:20;s:11:\"viewReports\";i:21;s:13:\"updateCompany\";i:22;s:11:\"viewProfile\";i:23;s:13:\"updateSetting\";}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

DROP TABLE IF EXISTS `insumos`;
CREATE TABLE IF NOT EXISTS `insumos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `unidad_medida` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`id`, `nombre`, `cantidad`, `unidad_medida`) VALUES
(1, 'insumo1', 2, 'kg'),
(2, 'insumo2', 20, 'kg'),
(3, 'insumo3', 62, 'kg'),
(4, 'insumo4', 58, 'gr'),
(5, 'insumo5', 0, 'lt'),
(6, 'insumo6', 7, 'u'),
(7, 'insumo7', 0, 'u'),
(8, 'insumo8', 0, 'kg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo_proveedor`
--

DROP TABLE IF EXISTS `insumo_proveedor`;
CREATE TABLE IF NOT EXISTS `insumo_proveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) NOT NULL,
  `id_insumo` int(11) NOT NULL,
  `precio_unitario` varchar(255) NOT NULL,
  `valoracion` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_proveedor` (`id_proveedor`),
  KEY `id_insumo` (`id_insumo`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `insumo_proveedor`
--

INSERT INTO `insumo_proveedor` (`id`, `id_proveedor`, `id_insumo`, `precio_unitario`, `valoracion`) VALUES
(1, 1, 1, '5', 3),
(2, 1, 2, '5', 3),
(3, 1, 3, '5.8', 5),
(4, 1, 4, '5', 4),
(5, 1, 5, '7', 3),
(6, 1, 6, '3', 3),
(7, 1, 7, '5', 4),
(8, 1, 8, '4', 3),
(9, 2, 1, '5.4', 3),
(10, 2, 2, '5.1', 3),
(11, 2, 3, '5', 5),
(12, 2, 4, '5', 4),
(13, 2, 5, '6.8', 3),
(14, 2, 6, '3.2', 3),
(15, 2, 7, '4', 4),
(16, 2, 8, '3', 3),
(17, 3, 1, '5.6', 3),
(18, 4, 2, '6', 3),
(19, 3, 3, '6.8', 5),
(20, 4, 4, '5', 4),
(21, 3, 5, '7.3', 3),
(22, 3, 6, '3.5', 3),
(23, 3, 7, '5.7', 4),
(24, 3, 8, '4.9', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` varchar(255) NOT NULL,
  `id_mesa` int(11) NOT NULL,
  `estado_orden` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `gross_amount` varchar(255) NOT NULL,
  `service_charge_rate` varchar(255) NOT NULL,
  `service_charge` varchar(255) NOT NULL,
  `vat_charge_rate` varchar(255) NOT NULL,
  `vat_charge` varchar(255) NOT NULL,
  `net_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `paid_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `bill_no`, `id_mesa`, `estado_orden`, `customer_name`, `customer_address`, `customer_phone`, `date_time`, `gross_amount`, `service_charge_rate`, `service_charge`, `vat_charge_rate`, `vat_charge`, `net_amount`, `discount`, `paid_status`, `user_id`) VALUES
(2, 'FISI-A8C5', 5, 0, 'aa', 'aa', 'aa', '1562160362', 'NaN', '', '0', '', '0', 'NaN', '', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders_item`
--

DROP TABLE IF EXISTS `orders_item`;
CREATE TABLE IF NOT EXISTS `orders_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `orders_item`
--

INSERT INTO `orders_item` (`id`, `order_id`, `product_id`, `qty`, `rate`, `amount`) VALUES
(5, 31, 2, '1', '', ''),
(6, 31, 3, '3', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codPedido` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `nombre_cli` varchar(255) NOT NULL,
  `direccion_cli` varchar(255) NOT NULL,
  `telefono_cli` varchar(255) NOT NULL,
  `ruc_cli` varchar(255) NOT NULL,
  `estado_pedido` int(11) NOT NULL,
  `estado_pago` int(11) NOT NULL,
  `cant_bruta` varchar(255) NOT NULL,
  `descuento` varchar(255) NOT NULL,
  `cant_neta` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `codPedido`, `fecha`, `nombre_cli`, `direccion_cli`, `telefono_cli`, `ruc_cli`, `estado_pedido`, `estado_pago`, `cant_bruta`, `descuento`, `cant_neta`) VALUES
(7, 'FISI-PED-1BD8', '1563361139', 'cli4', '', '', '', 0, 0, '4.24', '', '5.00'),
(8, 'FISI-PED-7880', '1563364095', 'Aaaaa', 'Aaaaaa', 'Bbbbbb', '1232132', 3, 0, '98.00', '10', '105.64'),
(9, 'FISI-PED-4416', '1563390182', 'aa', '', '', '', 0, 0, '5.23', '', '6.17'),
(10, 'FISI-PED-AB99', '1563390189', 'ss', 'ss', '', '', 0, 0, '5.23', '', '6.17'),
(11, 'FISI-PED-9D40', '1563390198', 'ssda', '', '', '', 0, 0, '3.15', '', '3.72');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_item`
--

DROP TABLE IF EXISTS `pedidos_item`;
CREATE TABLE IF NOT EXISTS `pedidos_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `pu` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos_item`
--

INSERT INTO `pedidos_item` (`id`, `pedido_id`, `producto_id`, `cantidad`, `pu`, `monto`) VALUES
(11, 7, 122, '1', 4, 4),
(29, 8, 121, '6', 3, 18),
(30, 8, 122, '20', 4, 80),
(31, 9, 123, '1', 5, 5),
(32, 10, 123, '1', 5, 5),
(33, 11, 121, '1', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productosnew`
--

DROP TABLE IF EXISTS `productosnew`;
CREATE TABLE IF NOT EXISTS `productosnew` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `category_id` text NOT NULL,
  `material` varchar(255) DEFAULT NULL,
  `unidad_medida` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `image` text NOT NULL,
  `precio_unitario` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productosnew`
--

INSERT INTO `productosnew` (`id`, `nombre`, `category_id`, `material`, `unidad_medida`, `descripcion`, `image`, `precio_unitario`) VALUES
(91, 'eeeddddd', '1', '1', '1', 'edddd', 'assets/images/product_image/5d2ba1bec4227.jpg', ''),
(109, 'Barra redonde para forja', '1', '1', '0', '', 'assets/images/product_image/defecto.jpg', '3.10'),
(110, 'Alfa Romero', '2', '1', '0', '', 'assets/images/product_image/defecto.jpg', '0.25'),
(111, 'American Motors', '2', '1', '0', '', 'assets/images/product_image/defecto.jpg', '0.31'),
(112, 'BMW', '2', '1', '0', '', 'assets/images/product_image/defecto.jpg', '1.09'),
(113, 'Caterpillar', '2', '1', '0', '', 'assets/images/product_image/defecto.jpg', '2.3'),
(114, 'Trefilado hexagonal y redonda', '3', '1', '0', '', 'assets/images/product_image/defecto.jpg', '2.3'),
(115, 'Blindado candado', '3', '1', '0', '', 'assets/images/product_image/defecto.jpg', '3.02'),
(116, 'Tirador', '3', '1', '0', '', 'assets/images/product_image/defecto.jpg', '2.0'),
(117, 'Tee', '4', '1', '0', '', 'assets/images/product_image/defecto.jpg', '3.09'),
(118, 'Codos', '4', '1', '0', '', 'assets/images/product_image/defecto.jpg', '5.58'),
(119, 'Robinetes', '4', '1', '0', '', 'assets/images/product_image/defecto.jpg', '5.08'),
(120, 'Esparcellamas', '4', '1', '0', '', 'assets/images/product_image/defecto.jpg', '4.12'),
(121, 'Premium', '5', '1', '0', '', 'assets/images/product_image/defecto.jpg', '3.15'),
(122, 'Portaválvulas', '6', '1', '0', '', 'assets/images/product_image/defecto.jpg', '4.24'),
(123, 'Peritas', '2', '1', '2', 'lkk', 'assets/images/product_image/defecto.jpg', '5.23'),
(125, 'sa', '1', '1', '0', '', 'assets/images/product_image/defecto.jpg', '333');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_insumo`
--

DROP TABLE IF EXISTS `producto_insumo`;
CREATE TABLE IF NOT EXISTS `producto_insumo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `insumo_id` int(11) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto_insumo`
--

INSERT INTO `producto_insumo` (`id`, `producto_id`, `insumo_id`, `cantidad`) VALUES
(57, 94, 3, '1'),
(58, 95, 5, '2'),
(59, 95, 3, '2'),
(60, 96, 7, '2'),
(61, 96, 4, '2'),
(62, 100, 7, '3'),
(63, 100, 3, '3'),
(64, 104, 4, '4'),
(65, 104, 3, '3'),
(66, 107, 4, '1'),
(67, 108, 2, '1'),
(68, 109, 1, '2'),
(69, 109, 3, '1'),
(70, 110, 4, '3'),
(71, 110, 2, '1'),
(72, 111, 5, '1'),
(73, 111, 2, '2'),
(74, 112, 5, '1'),
(75, 112, 3, '1'),
(76, 113, 4, '1'),
(77, 114, 5, '1'),
(78, 114, 2, '2'),
(79, 115, 5, '1'),
(80, 115, 1, '2'),
(81, 116, 2, '2'),
(82, 116, 4, '5'),
(83, 117, 3, '3'),
(84, 118, 4, '1'),
(85, 119, 4, '3'),
(86, 120, 2, '4'),
(87, 121, 3, '1'),
(88, 122, 3, '3'),
(89, 122, 2, '2'),
(90, 123, 3, '4'),
(91, 123, 2, '1'),
(92, 124, 4, '2'),
(93, 124, 2, '2'),
(94, 125, 3, '2'),
(95, 125, 6, '13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `material` varchar(255) DEFAULT NULL,
  `unidad_medida` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `proveedor_id` (`proveedor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(255) DEFAULT NULL,
  `ruc` varchar(255) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `tipo_proveedor` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `razon_social`, `ruc`, `direccion`, `tipo_proveedor`) VALUES
(1, 'Cia Camporsal', '20415721677', 'Avenida Colonial 560', '1'),
(2, 'Mecanica Industrial Lira', '20190143806', 'Calle Huarán 149 - 151 . Urb.27 de Abril', '1'),
(3, 'Dincorsa', '20165016115', 'Calle Mariscal Luzuriaga 544', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `phone`, `gender`) VALUES
(1, 'admin@admin.com', '$2y$10$yfi5nUQGXUZtMdl27dWAyOd/jMOmATBpiUvJDmUu9hJ5Ro6BE5wsK', 'admin@admin.com', 'john', 'doe', '80789998', 1),
(2, 'Nataly', '$2y$10$44zFjWQ3fICYE3rlwPvIyen/wY.esf1kaPIzXxHTtBfLK0PED0g7K', 'nataly@gmail.com', 'Nataly', 'Vasquez', '934495673', 2),
(3, 'jackore', '$2y$10$JGnF4Soh3rl.KRTlF2nwi.6vtAwKdKnecLY5SNLuX.1x7QpG5B4hO', 'jackeop95@gmail.com', 'jack', 'ore', '966199155', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_group`
--

DROP TABLE IF EXISTS `user_group`;
CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
