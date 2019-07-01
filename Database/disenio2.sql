create database if not exists db_dis_sistemas;

use db_dis_sistemas;

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


--table groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL,
  `permission` text NOT NULL,
  primary key (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- table user-group
CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  foreign key (user_id) references users(id, email),
  foreign key (group_id) references groups (id)
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
