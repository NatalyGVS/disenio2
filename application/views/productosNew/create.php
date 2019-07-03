

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Gestionar Productos
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Productos</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

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
            <h3 class="box-title">Añadir Producto</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="<?php base_url('users/create') ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">

                  <label for="product_image">Imagen</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="product_image" name="product_image" type="file">
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="product_name">Nombre del producto</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Nombre del producto" autocomplete="off"/>
                </div>

                <div class="form-group">
                  <label for="category">Categoría</label>
                  <select class="form-control select_group " id="category" name="category[]">
                    <?php foreach ($category as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>"><?php echo $v['nombre'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>



                <label for="tipo_proveedor">Material del Producto</label>
                  <select class="form-control" id="material" name="material">
                    <option value="1">laton</option>
                    <option value="2">acero</option>
                    <option value="3">cobre</option>
                  </select>
           </div>

          <div class="form-group">
            <label for="tipo_proveedor">Unidad de Medida</label>
            <select class="form-control" id="unidad_medida" name="unidad_medida">
              <option value="1">Kg</option>
              <option value="2">L</option>
            </select>
          </div>

                <div class="form-group">
                  <label for="descripcion">Descripción
                  </label>
                  <textarea type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Enter 
                  descripcion" autocomplete="off">
                  </textarea>
                </div>


                <!-- <div class="form-group">
                  <label for="category">Categoría</label>
                  <select class="form-control select_group" id="category" name="category[]" multiple="multiple">
                    <?php foreach ($category as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>"><?php echo $v['nombre'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>



                <div class="form-group">
                  <label for="store">Disponibilidad</label>
                  <select class="form-control" id="availability" name="availability">
                    <option value="1">si</option>
                    <option value="2">No</option>
                  </select>
                </div> -->

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                <a href="<?php echo base_url('productosnew/') ?>" class="btn btn-warning">Atras</a>
              </div>
            </form>
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
    $(".select_group").select2();
    $("#descripcion").wysihtml5();

    $("#mainProductosNewNav").addClass('active');
    $("#addProductosNewNav").addClass('active');
    
    var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="glyphicon glyphicon-tag"></i>' +
        '</button>'; 
    $("#product_image").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });

  });
</script>