

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style=
     "background-color: #f8f8f8; padding-top: 35px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
         <label style="font-size: 35px;">
        Agregar usuario</label>
      </h2>

    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-6 col-xs-6">
          
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
            <form role="form" action="<?php base_url('users/create') ?>" method="post">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="row">
                <div class="form-group col-lg-6 col-xs-6">
                  <select class="form-control" name="groups">
                    <option value="">Seleccionar grupos</option>
                    <?php foreach ($group_data as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>"><?php echo $v['group_name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
            <hr/>
              <div class="row">
                <div class="form-group col-xs-6 col-lg-6">

                  <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" required>
                </div>
              </div>
              <div class="row">
                  <div class="form-group col-xs-6 col-lg-6">
                    <label for="fname">Nombres </label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Nombres completos " required>
                  </div>

                  <div class="form-group col-xs-6 col-lg-6">
                    <label for="lname">Apellidos</label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Apellidos completos" required>
                  </div>

                  
                </div>


                <div class="row">
                  <div class="form-group col-xs-6">
                  <label for="phone">Teléfono</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono" required>
                </div>

                <div class="form-group col-xs-6">
                  <label for="gender">Género</label>
                  <div class="radio">
                    <div class= "col-xs-6">
                      <label>
                      <input type="radio" name="gender" id="male" value="1">
                      Masculino
                    </label>
                  </div>
                  <div class= "col-xs-6">
                    <label>
                      <input type="radio" name="gender" id="female" value="2">
                     Femenino
                    </label>
                    </div>
                    
                  </div>
                </div>
                </div>
              <hr/>
              <div class="row">
                  <div class="form-group col-xs-6 col-lg-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@unmsm.edu.pe" required>
                  </div>
                </div>
<div class="row">
                <div class="form-group col-xs-6 col-lg-6" >
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                  </div>

                  <div class="form-group col-xs-6 col-lg-6">
                    <label for="cpassword">Confirme password</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirme Password" required>
                  </div>
                </div>


              </div>
              <!-- /.box-body -->

              <div class="box-footer" align="right">     
   
                <button type="submit" style="background-color: #39ace7; width: 47%;" class="btn btn-primary">Agrega usuario</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-6 col-xs-6">
          <div class="avatar pull-left" align="center">
            
        <img src="<?php echo base_url('assets/images/icons/create_user.png');?>" style="width: 90%; height: auto;" />
  </div>
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
