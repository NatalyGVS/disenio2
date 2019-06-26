<?php 
class ClientUser{

		private $firstname = "";
		private $lastname = "";
		private $email = "";
		private $password = "";
		private $gender = "";
		private $phone = "";
		private $username = "";

		public function __construct($firstname, $lastname, $email, $password, $gender, $phone, $username){
			$this->firstname = $firstname;
			$this->lastname = $lastname;
			$this->email = $email;
			$this->password = $password;
			$this->gender = $gender;
			$this->phone = $phone;
			$this->username = $username;
		}


		public function login(){
			if(strcmp($this->email,"")){
				$connection = $this->getConnection();
				$database = $this->getDb($connection);
				if($database==1){
					$listar = $this->verifyUserEmailPassword($connection);
					return $listar;
				}else{
					return "false"; //Error en la BD.
				}

			}else{
				return "false"; //error email vacio.
			}
		}

		public function register_user(){

			if(strcmp($this->email,"")){
				$connection = $this->getConnection();
				$database = $this->getDb($connection);
				if($database==1){
					if($this->verifyUserEmail($connection)!=false){
						$this->insertDbUser($connection, $this->firstname, $this->lastname, $this->email, $this->password, $this->gender, $this->phone, $this->username);
					}else{
						echo "<script>location.href='http://localhost/disenio2/application/views/cliente/registrar.php';</script>";
					}
				}else{
					echo "Error en la base de datos";
				}

			}else{
				echo "<script>location.href='http://localhost/disenio2/application/views/cliente/registrar.php';</script>";
			}
		}

		public function getConnection(){
			include ('config/dbunmsm/config.php');
			include ('config/dbunmsm/functions.php');
			include ('config/dbunmsm/mysql.php');
			
			$usuario = "root";
			$contrasena = "";
			$servidor = "localhost";
			$connection = mysqli_connect( $servidor, $usuario, $contrasena) or die ("No se pudo conectar con el servidor");
			return $connection;
		}

		public function getDb($connection){
			$base_datos = "disenio2";
			$db = mysqli_select_db ($connection, $base_datos) or die ( "No se pudo conectar a la BD" );
			return $db;
		}

		public function verifyUserEmail($connection){
			$consulta = "SELECT * FROM users WHERE email = '$this->email' ";

			$resultado = mysqli_query($connection, $consulta) or die ( "No se pudo realizar la consulta");
			$listar = mysqli_fetch_array( $resultado);
			if($listar['id']!=""){
				return false;
			}else{
				
				return true;
			}
		}

		public function verifyUserEmailPassword($connection){
			$consulta = "SELECT * FROM users WHERE email = '$this->email' AND password = '$this->password'";

			$resultado = mysqli_query($connection, $consulta) or die ( "No se pudo realizar la consulta");
			$listar = mysqli_fetch_array( $resultado);
			

			return $listar;
		}

		public function insertDbUser($connection){
			$_GRABAR_SQL = "INSERT INTO users (
			firstname,
			lastname,
			email,
			password,
			gender,
			phone,
			username)
			VALUES (
			'$this->firstname',
			'$this->lastname',
			'$this->email',
			'$this->password',
			'$this->gender',
			'$this->phone',
			'$this->username')";

			mysqli_query ($connection,$_GRABAR_SQL);
			header ("Cache-Control: no-cache, must-revalidate");
			$ref = 'http://localhost/disenio2/application/views/cliente/email/envioemail.php?&firstname='.$this->firstname.'&lastname='.$this->lastname.'&email='.$this->email.'&gender='.$this->gender.'&password='.$this->password;
		  	echo "<script>location.href='$ref';</script>";
		}
	}

?>