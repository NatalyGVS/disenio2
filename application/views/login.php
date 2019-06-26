<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>La Reserva</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  
  
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css') ?>">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body style=
	   "background:url('/disenio2/assets/images/background_image/background.jpg'); 
		background-position: center;
  		background-repeat: no-repeat;
  		background-size: cover;">
<div style=
	   "width: 40%;
	   	position: absolute; 
		top: 25%; 
		left: 30%; 
		margin: 0px 0 0 0px;">
  
  <!-- /.login-logo -->
  <div style="color:#ffffff; background-color: #ffffff; position: relative;" align="center">
    <p class="login-logo" style="background-color: #000000; opacity: .9"><b>La Reserva</b></p>
    <form action="<?php echo base_url('auth/login') ?>" method="post" style="opacity: 1; width: 80%;">
     <div class="login-box-body" >
     	<b>Bienvenido, ingresa con tu cuenta!</b>
 <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" id="email" placeholder="ejemplo@gmail.com" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <p style="color:#000000;">
      <?php echo validation_errors(); ?>  
    <?php if(!empty($errors)) {
      //header("Location:login");
      echo $errors; 
      echo '<i class="ion ion-android-alert"></i>';
    } ?>  
    </p>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-6" style=
	   "width: 100%;
	   	position: relative; 
		margin: 0px 0 0 0px;">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar sesión</button>
        </div>
        <!-- /.col -->
      </div>
     </div>
    </form>

    <a class="btn btn-block bg-green" href="../application/views/cliente/">Ir a la Página Principal</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->

<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
