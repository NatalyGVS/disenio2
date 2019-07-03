-------------LO AGREGADO PARA DISEÑO-------------
CREATE TABLE `proveedores`(
  `id` varchar(255) NOT NULL,
  `razon_social` varchar(255),
  `ruc` varchar(255) NOT NULL,
  `direccion` varchar(255),
  `tipo_proveedor` varchar(255) NOT NULL
)
	-- table categories
	CREATE TABLE IF NOT EXISTS `categories`(
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `nombre` varchar(255) NOT NULL,
	  primary key(id)
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `insumos`(
  `id` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL
 
)

CREATE TABLE `productosnew`(
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `category_id` text NOT NULL,
  `material` varchar(255),
  `unidad_medida` varchar(255) NOT NULL,
  `descripcion` varchar(255),
  `image` text NOT NULL
)

-- CREATE TABLE `productosnew`(
--   `id` varchar(255) NOT NULL,
--   `id_categoria` varchar(255) NOT NULL,
--   `material` varchar(255),
--   `unidad_medida` varchar(255) NOT NULL,
--   `descripcion` varchar(255),
--    `imagen` text NOT NULL
-- )


CREATE TABLE `producto_insumo`(
  `id` varchar(255) NOT NULL,
  `insumo_id` varchar(255) NOT NULL,
  `producto_id` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL
)


CREATE TABLE `kardex`(
  `id_kardex` varchar(255) NOT NULL,
  `codigo_kardex` varchar(255) NOT NULL,
  `id_producto` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `detalle` varchar(255),
  `precio_unitario` int(11) NOT NULL,
  `entrada_cantidad` int(11),
  `entrada_precio_total` int (11),
  `salida_cantidad` int(11),
  `salida_precio_total` int (11),
  `saldo_cantidad` int(11) NOT NULL,
  `saldo_precio_total` int (11) NOT NUlL
)

CREATE TABLE `inventario`(
  `id_producto` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `unidad_medida` varchar(255) NOT NULL
)

CREATE TABLE `pedido`(
  `id_pedido` varchar(255) NOT NULL,
  `codigo_pedido` varchar(255) NOT NULL,
  `fecha_emision` varchar(255) NOT NULL,
  `id_trabajador` varchar(255) NOT NULL,
  `id_order_item` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL--falta poner para que sea en espera por defecto
)

CREATE TABLE `order_item`(
  `id_order_item` varchar(255) NOT NULL,
  `id_pedido` varchar(255) NOT NULL,
  `id_producto` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL
)

CREATE TABLE `rol`(
  `id_rol` varchar(255) NOT NULL,
  `grupo` varchar(255) NOT NULL,
  `id_usuario` varchar(255) NOT NULL
)

CREATE TABLE `usuario`(
  `id_usuario` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `celular` varchar(255),
  `dni` varchar(255) NOT NULL
)

CREATE TABLE `cotizacion`(
  `id_cotizacion` varchar(255) NOT NULL,
  `id_proveedor` varchar(255) NOT NULL,
  `fecha_entrega` varchar(255) NOT NULL
  --FALTA LO DE LA LISTA DE PRODUCTOS
)

CREATE TABLE `documento_de_evaluacion_de_cotizacion`(
  `id_documento` varchar(255) NOT NULL,
  `fecha_evaluacion` varchar(255) NOT NULL,
  --aquí en vez de id_trabajador pongo id_pedido
  `id_pedido` varchar(255) NOT NULL
  --FALTA PONER PARA LAS COTIZACIONES QUE VAN EN EL DOCUMENTO
)

CREATE TABLE `orden_compra`(
  `id_orden` varchar(255) NOT NULL,
  `codigo_orden` varchar(255) NOT NULL,
  `id_usuario_emisor` varchar(255) NOT NULL,
  `id_usuario_receptor` varchar(255) NOT NULL,
  `id_cotizacion` varchar(255) NOT NULL
)

ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `insumos`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `productosnew`
  ADD PRIMARY KEY (`id`);

  ALTER TABLE `producto_insumo`
  ADD PRIMARY KEY (`id`);

-- ALTER TABLE `kardex`
--   ADD PRIMARY KEY (`id_kardex`);

-- ALTER TABLE `inventario`
--   ADD PRIMARY KEY (`id_producto`);

-- ALTER TABLE `pedido`
--   ADD PRIMARY KEY (`id_pedido`);

-- ALTER TABLE `order_item`
--   ADD PRIMARY KEY (`id_order_item`);

-- ALTER TABLE `rol`
--   ADD PRIMARY KEY (`id_rol`);

-- ALTER TABLE `usuario`
--   ADD PRIMARY KEY (`id_usuario`);

-- ALTER TABLE `cotizacion`
--   ADD PRIMARY KEY (`id_cotizacion`);

-- ALTER TABLE `documento_de_evaluacion_de_cotizacion`
--   ADD PRIMARY KEY (`id_documento`);

-- ALTER TABLE `orden_compra`
--   ADD PRIMARY KEY (`id_orden`);


 
--
-- AUTO_INCREMENT for table `proveedor`
--

ALTER TABLE `proveedores`
  MODIFY `id`int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
);

ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

  ALTER TABLE `insumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

    ALTER TABLE `productosnew`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

    ALTER TABLE `producto_insumo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
  


-- ********************************************************************************
-- ********************************************************************************
-- ********************************************************************************
	
	
	
	create database if not exists disenio2;

	use disenio2;

	-- primera table, importante.
	-- table users
	CREATE TABLE IF NOT EXISTS users(
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `username` varchar(255) NOT NULL,
	  `email` varchar(255) NOT NULL,
	  `password` varchar(255) NOT NULL,
	  `firstname` varchar(255) NOT NULL,
	  `lastname` varchar(255) NOT NULL,
	  `phone` varchar(255) NOT NULL,
	  `gender` int(11) NOT NULL,
	  primary key(id, email)
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;


	-- Cada usuario pertenecerá a un grupo
	-- table groups
	CREATE TABLE IF NOT EXISTS `groups` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `group_name` varchar(255) NOT NULL,
	  `permission` text NOT NULL,
	  primary key (id)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;


	-- table intermedia entre el usuario y el grupo.
	-- table user-group
	CREATE TABLE IF NOT EXISTS `user_group` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `user_id` int(11) NOT NULL,
	  `group_id` int(11) NOT NULL,
	  foreign key (user_id) references users(id, email),
	  foreign key (group_id) references groups (id)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `orders`
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

	-- table proovedor
	CREATE TABLE IF NOT EXISTS `proveedores`(
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `razon_social` varchar(255),
	  `ruc` varchar(255) NOT NULL,
	  `direccion` varchar(255),
	  `tipo_proveedor` varchar(255) NOT NULL,
	  primary key(id)
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;


	-- table categories
	CREATE TABLE IF NOT EXISTS `categories`(
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `nombre` varchar(255) NOT NULL,
	  primary key(id)
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;

	-- table products
		CREATE TABLE `products` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `category_id` int(11) NOT NULL,
		  `proveedor_id` int(11) NOT NULL,
		  `name` varchar(255) NOT NULL,
		  `material` varchar(255),
		  `unidad_medida` varchar(255) NOT NULL,
		  `descripcion` varchar(255),
		  `price` varchar(255) NOT NULL,
		  `qty` varchar(255) NOT NULL,
		  `image` text NOT NULL,
		  `description` text NOT NULL,
		  primary key (id),
		  foreign key (category_id) references categories(id),
		  foreign key (proveedor_id) references proveedores(id)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;