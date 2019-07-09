<?php 

class Model_auth extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* 
		This function checks if the email exists in the database
	*/

	public function createIfNotExists(){
		$sqlusers = 'CREATE TABLE IF NOT EXISTS users(
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `username` varchar(255) NOT NULL,
			  `email` varchar(255) NOT NULL,
			  `password` varchar(255) NOT NULL,
			  `firstname` varchar(255) NOT NULL,
			  `lastname` varchar(255) NOT NULL,
			  `phone` varchar(255) NOT NULL,
			  `gender` int(11) NOT NULL,
			  primary key(id, email)
			)ENGINE=InnoDB DEFAULT CHARSET=utf8'; 

		$sqlgroups = 'CREATE TABLE IF NOT EXISTS `groups` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `group_name` varchar(255) NOT NULL,
			  `permission` text NOT NULL,
			  primary key (id)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8';

		$sqlug = '	CREATE TABLE IF NOT EXISTS `user_group` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `user_id` int(11) NOT NULL,
			  `group_id` int(11) NOT NULL,
			  primary key(id),
			  constraint fk2 foreign key (`group_id`) references `groups` (`id`),
			  constraint fk1 foreign key (`user_id`) references `users`(`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8';

		$sqlproveedores = '	CREATE TABLE IF NOT EXISTS `proveedores`(
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `razon_social` varchar(255),
			  `ruc` varchar(255) NOT NULL,
			  `direccion` varchar(255),
			  `tipo_proveedor` varchar(255) NOT NULL,
			  primary key(id)
			)ENGINE=InnoDB DEFAULT CHARSET=utf8';

		$sqlcategories = '	CREATE TABLE IF NOT EXISTS `categories`(
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `nombre` varchar(255) NOT NULL,
			  primary key(id)
			)ENGINE=InnoDB DEFAULT CHARSET=utf8';

			$sqlproducts = 'CREATE TABLE IF NOT EXISTS `products` (
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
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;';

		$sql_insert = "INSERT IGNORE INTO `groups` (`id`, `group_name`, `permission`) VALUES
(2, 'Administrador', 'a:24:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:14:\"createCategory\";i:9;s:14:\"updateCategory\";i:10;s:12:\"viewCategory\";i:11;s:14:\"deleteCategory\";i:12;s:13:\"createProduct\";i:13;s:13:\"updateProduct\";i:14;s:11:\"viewProduct\";i:15;s:13:\"deleteProduct\";i:16;s:11:\"createOrder\";i:17;s:11:\"updateOrder\";i:18;s:9:\"viewOrder\";i:19;s:11:\"deleteOrder\";i:20;s:11:\"viewReports\";i:21;s:13:\"updateCompany\";i:22;s:11:\"viewProfile\";i:23;s:13:\"updateSetting\";}')";

		$this->db->query($sqlusers);
		$this->db->query($sqlgroups);
		$this->db->query($sqlug);
		$this->db->query($sqlcategories);
		$this->db->query($sqlproveedores);
		$this->db->query($sqlproducts);
		$this->db->query($sql_insert);
	}


	public function check_email($email) 
	{
		$this->createIfNotExists();
		if($email) {
             	$sql = 'SELECT * FROM users WHERE email = ?';
				$query = $this->db->query($sql, array($email));
				$result = $query->num_rows();
				return ($result == 1) ? true : false;
		
		}
		return false;
	}

	/* 
		This function checks if the email and password matches with the database
	*/
	public function login($email, $password) {
		if($email && $password) {
			$sql = "SELECT * FROM users WHERE email = ?";
			$query = $this->db->query($sql, array($email));

			if($query->num_rows() == 1) {
				$result = $query->row_array();

				$hash_password = password_verify($password, $result['password']);
				if($hash_password === true) {
					return $result;	
				}
				else {
					return false;
				}
			}
			else {
				return false;
			}
		}
	}
}