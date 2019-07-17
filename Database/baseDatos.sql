-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2019 a las 15:38:19
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `service_charge_value` varchar(255) NOT NULL,
  `vat_charge_value` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`id`, `company_name`, `service_charge_value`, `vat_charge_value`, `address`, `phone`, `country`, `message`, `currency`) VALUES
(1, 'nombre', '', '18', 'doreccopm', '12312321', 'pais', 'holi', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `insumos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `unidad_medida` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
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
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `bill_no`, `id_mesa`, `estado_orden`, `customer_name`, `customer_address`, `customer_phone`, `date_time`, `gross_amount`, `service_charge_rate`, `service_charge`, `vat_charge_rate`, `vat_charge`, `net_amount`, `discount`, `paid_status`, `user_id`) VALUES
(2, 'FISI-A8C5', 5, 0, 'aa', 'aa', 'aa', '1562160362', 'NaN', '', '0', '', '0', 'NaN', '', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders_item`
--

CREATE TABLE `orders_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
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
  `cant_neta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `codPedido`, `fecha`, `nombre_cli`, `direccion_cli`, `telefono_cli`, `ruc_cli`, `estado_pedido`, `estado_pago`, `cant_bruta`, `descuento`, `cant_neta`) VALUES
(7, 'FISI-PED-1BD8', '1563361139', 'cli4', '', '', '', 0, 0, '4.24', '', '5.00'),
(8, 'FISI-PED-7880', '1563364095', 'Aaaaa', 'Aaaaaa', 'Bbbbbb', '1232132', 0, 0, '98.00', '10', '105.64');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_item`
--

CREATE TABLE `pedidos_item` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `pu` int(11) NOT NULL,
  `monto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos_item`
--

INSERT INTO `pedidos_item` (`id`, `pedido_id`, `producto_id`, `cantidad`, `pu`, `monto`) VALUES
(11, 7, 122, '1', 4, 4),
(29, 8, 121, '6', 3, 18),
(30, 8, 122, '20', 4, 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productosnew`
--

CREATE TABLE `productosnew` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `category_id` text NOT NULL,
  `material` varchar(255) DEFAULT NULL,
  `unidad_medida` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `image` text NOT NULL,
  `precio_unitario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(123, 'Peritas', '2', '1', '2', 'lkk', 'assets/images/product_image/defecto.jpg', '5.23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_insumo`
--

CREATE TABLE `producto_insumo` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `insumo_id` int(11) NOT NULL,
  `cantidad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(93, 124, 2, '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `razon_social` varchar(255) DEFAULT NULL,
  `ruc` varchar(255) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `tipo_proveedor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `razon_social`, `ruc`, `direccion`, `tipo_proveedor`) VALUES
(4, 'Cia Camporsal', '20415721677', 'Avenida Colonial 560', '1'),
(5, 'Mecanica Industrial Lira', '20190143806', 'Calle Huarán 149 - 151 . Urb.27 de Abril', '1'),
(6, 'Dincorsa', '20165016115', 'Calle Mariscal Luzuriaga 544', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `phone`, `gender`) VALUES
(1, 'admin@admin.com', '$2y$10$yfi5nUQGXUZtMdl27dWAyOd/jMOmATBpiUvJDmUu9hJ5Ro6BE5wsK', 'admin@admin.com', 'john', 'doe', '80789998', 1),
(2, 'Nataly', '$2y$10$44zFjWQ3fICYE3rlwPvIyen/wY.esf1kaPIzXxHTtBfLK0PED0g7K', 'nataly@gmail.com', 'Nataly', 'Vasquez', '934495673', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders_item`
--
ALTER TABLE `orders_item`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos_item`
--
ALTER TABLE `pedidos_item`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productosnew`
--
ALTER TABLE `productosnew`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_insumo`
--
ALTER TABLE `producto_insumo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `orders_item`
--
ALTER TABLE `orders_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pedidos_item`
--
ALTER TABLE `pedidos_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `productosnew`
--
ALTER TABLE `productosnew`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de la tabla `producto_insumo`
--
ALTER TABLE `producto_insumo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
