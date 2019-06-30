

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestionar Usuarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          
          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Agregar usuario</h3>
            </div>
            <form role="form" action="<?php base_url('users/create') ?>" method="post">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="row">
                <div class="form-group col-lg-4 col-xs-4">
                  <label for="groups">Los grupos</label>
                  <select class="form-control" id="groups" name="groups">
                    <option value="">Seleccionar grupos</option>
                    <?php foreach ($group_data as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>"><?php echo $v['group_name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>

              <div class="row">
                  <div class="form-group col-xs-4">
                    <label for="fname">Nombre </label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Nombre " required>
                  </div>

                  <div class="form-group col-xs-3 ">
                    <label for="lname">Apellido</label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Apellido" required>
                  </div>

                  <div class="form-group col-xs-3">
                  <label for="username">Nombre de usuario</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" required>
                </div>
                </div>

              <div class="row">
                  <div class="form-group col-xs-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                  </div>

                  <div class="form-group col-xs-3" >
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                  </div>

                  <div class="form-group col-xs-3">
                    <label for="cpassword">Confirme password</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirme Password" required>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-xs-2">
                  <label for="phone">Teléfono</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono" required>
                </div>

                <div class="form-group col-xs-4">
                  <label for="gender">Género</label>
                  <div class="radio">
                    <div class= "col-xs-3">
                      <label>
                      <input type="radio" name="gender" id="male" value="1">
                      Masculino
                    </label>
                  </div>
                  <div class= "col-xs-3">
                    <label>
                      <input type="radio" name="gender" id="female" value="2">
                     Femenino
                    </label>
                    </div>
                    
                  </div>
                </div>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                <a href="<?php echo base_url('users/') ?>" class="btn btn-warning">Atras</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    $("#groups").select2();

    $("#mainUserNav").addClass('active');
    $("#createUserNav").addClass('active');
  
  });
</script>
