<!DOCTYPE html>
<html lang="es">
<head>
	<title>SIGESPRO</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/favicon.ico');?>"/>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/css.min.css');?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css');?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css');?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/animate/animate.css');?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/css-hamburgers/hamburgers.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/util.css');?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css');?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/animsition/css/animsition.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/select2/select2.min.css')?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/daterangepicker/daterangepicker.css')?>">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style=
	   "background:url('/disenio2/assets/images/background_image/background.jpg'); 
		background-position: center;
  		background-repeat: no-repeat;
  		background-size: cover;">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55" >
				<form class="login100-form validate-form flex-sb flex-w" action="<?php echo base_url('auth/login')?>" method="POST" style="padding: 5px;">
					
					<div class="avatar pull-left" align="center">
						<label style="font-size: 180%;margin-bottom: 10px;"><b>Gestor de Producción</b></label>
				<img src="<?php echo base_url('assets/images/icons/key.png');?>" style="width: 20%; height: auto;" />
	</div>
					<span class="txt1 p-b-11">
						Correo electrónico
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="email" name="email" placeholder="example@klauss.com">
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Contraseña
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password" placeholder="contraseña">
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<span style="color:red;"><?php if(!empty($errors)) {
				     	echo $errors; 
				      	echo '<i class="ion ion-android-alert"></i>';
				    } ?> </span>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" value="Iniciar sesión" class="login100-form-btn" style="width: 100%">
							
						</button>
					</div>
					
				</form>
				<form action="<?php echo base_url('auth/register')?>" method="POST">
					<div align="center" style="width: 100%; margin-top: 15px;">
						<button class="login100-form-btn" style="background-color: #ff7e69;">
							Crear un nuevo usuario
						</button>
					</div>
				</form>
					
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/vendor/jquery/jquery-3.2.1.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/vendor/animsition/js/animsition.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/vendor/js/popper.js');?>"></script>
	<script src="<?php echo base_url('assets/vendor/js.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/vendor/select2/select2.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/vendor/daterangepicker/moment.min.js');?>"></script>
	<script src="<?php echo base_url('assets/vendor/daterangepicker/daterangepicker.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/vendor/countdowntime/countdowntime.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/js/main.js');?>"></script>

</body>
</html>