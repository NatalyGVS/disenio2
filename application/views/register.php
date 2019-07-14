<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Registro de usuario</title>

    <!-- Icons font CSS-->
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/favicon.ico');?>"/>
    <link href="<?php echo base_url('assets/register/vendor/font-awesome-4.7/css/font-awesome.min.css');?>" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url('assets/register/vendor/select2/select2.min.css');?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url('assets/register/vendor/datepicker/daterangepicker.css');?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url('assets/register/css/main.css');?>" rel="stylesheet" media="all">
</head>

<body >
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50" style=
       "background:url('/disenio2/assets/images/background_image/bg_register.jpg'); 
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Crear cuenta de usuario</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo base_url('auth/register')?>">
                        <div class="form-row m-b-55">
                            <div class="name">Nombres completos</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="firstname" required>
                                            <label class="label--desc">Nombres</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="lastname" required>
                                            <label class="label--desc">Apellidos</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Cuenta de usuario</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="email" required>
                                            <label class="label--desc">Correo electrónico</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="password" name="password" required>
                                            <label class="label--desc">Contraseña</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name">Informarción adicional</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="username" required>
                                            <label class="label--desc">Nickname</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="phone" required>
                                            <label class="label--desc">Número de celular</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Rol de usuario</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="groups" id="groups">
                                            <option disabled="disabled" selected="selected">Seleccione un rol</option>
                                            <option value="2">Administrador</option>
                                            <option value="4">Trabajador</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                            <label class="label label--block">Seleccione el género del usuario</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Masculino
                                    <input type="radio" checked="checked" name="gender" value="1">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">Femenino
                                    <input type="radio" name="gender"value="2">
                                    <span class="checkmark"></span>
                                </label>
                            
                            <div align="right">
                                <button class="btn btn--radius-2 btn--red" type="submit" style="margin-left: 15px;">Registrar</button>
                            </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="<?php echo base_url('assets/register/vendor/jquery/jquery.min.js');?>"></script>
    <!-- Vendor JS-->
    <script src="<?php echo base_url('assets/register/vendor/select2/select2.min.js');?>"></script>
    <script src="<?php echo base_url('assets/register/vendor/datepicker/moment.min.js');?>"></script>
    <script src="<?php echo base_url('assets/register/vendor/datepicker/daterangepicker.js');?>"></script>

    <!-- Main JS-->
    <script src="<?php echo base_url('assets/register/js/global.js');?>"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->