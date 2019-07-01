<!DOCTYPE html>
<html lang="en">
<head>
	<title>SINGESPRO</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/bootstrap/images/icons/favicon.ico') ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/vendor/bootstrap/css/bootstrap.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/vendor/animate/animate.css') ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/vendor/css-hamburgers/hamburgers.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/vendor/select2/select2.min.css') ?>">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/util.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/main.css') ?>">
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
   
	<script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>

<!--===============================================================================================-->
</head>
<body>
	<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="padding-top: 200px;">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3>COMUNICADO DE DUVAN</h3>
           </div>
           <div class="modal-body">
              <h4>Crear nueva Database</h4>
              Copiar y pegar el script que se encuentra en Database/disenio2.sql.    
       </div>
           <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>
	<div class="limiter">

		<div class="container-login100">

			<div class="wrap-login100">
				<span class="login100-form-title" style="font-size: 30px;">
						SISTEMA INFORMÁTICO GESTOR DE PRODUCCIÓN
					</span>
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url('assets/bootstrap/images/img-02.png') ?>" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="<?php echo base_url(); ?>auth/login">
					
					<h2>Grupo Klaus Brass</h2>
					<hr/>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: example@unmsm.edu.pe">
						
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
					
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<span style="color:red;"><?php if(!empty($errors)) {
				     	echo $errors; 
				      	echo '<i class="ion ion-android-alert"></i>';
				    } ?> </span>
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Iniciar Sesión
						</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>
	
	

<!--===============================================================================================-->	
	<script src="<?php echo base_url('assets/bootstrap/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/bootstrap/vendor/bootstrap/js/popper.js') ?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/bootstrap/vendor/select2/select2.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/bootstrap/vendor/tilt/tilt.jquery.min.js ') ?>"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/bootstrap/js/main.js') ?>"></script>

</body>
</html>