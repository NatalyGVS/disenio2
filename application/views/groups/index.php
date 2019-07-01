

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style=
     "background-color: #ffffff; padding-top: 35px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
      <label style="font-size: 35px;">
       Gestionar Grupos de Trabajadores</label>
      
    </h2>

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

          <?php if(in_array('createGroup', $user_permission)): ?>
            <a href="<?php echo base_url('groups/create') ?>" class="btn btn-primary">Añadir grupo</a>
            <br /> <br />
          <?php endif; ?>

          <div class="box">
            <div class="container-login100">
          <!-- /.box-header -->
          <div class="wrap-login100">
            <div class="col-sm-3">
            </div>
            <!-- /.box-header -->
            <div class="box-body col-sm-6 col-xs-8">
              <table id="groupTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>COD</th>
                  <th>Nombre del grupo</th>
                  <?php if(in_array('updateGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                    <th>Acciones</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                  <?php if($groups_data): ?>                  
                    <?php foreach ($groups_data as $k => $v): ?>
                      <tr>
                        <td><?php echo $v['id']; ?></td>
                        <td><?php echo $v['group_name']; ?></td>

                        <?php if(in_array('updateGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                        <td>
                          <?php if(in_array('updateGroup', $user_permission)): ?>
                          <a href="<?php echo base_url('groups/edit/'.$v['id']) ?>" class="btn btn-default"><i class="fa fa-edit"></i> <span> Editar</span></a>  
                          <?php endif; ?>
                          <?php if(in_array('deleteGroup', $user_permission)): ?>
                          <a href="<?php echo base_url('groups/delete/'.$v['id']) ?>" class="btn btn-danger"><i class="fa fa-trash"></i><span> Eliminar</span></a>
                          <?php endif; ?>
                        </td>
                        <?php endif; ?>
                      </tr>
                    <?php endforeach ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
            <!-- /.box-body -->
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
      $('#groupTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
      });
      $("#mainGroupNav").addClass('active');
      $("#manageGroupNav").addClass('active');
    });
  </script>
