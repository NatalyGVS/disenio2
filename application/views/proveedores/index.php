<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style=
     "background-color: #ffffff; padding-top: 35px;">
  <!-- Content Header (Page header) -->
  <section class="content-header" >
      <h2>
         <label style="font-size: 35px;">
        Gestor de Proveedores</label>
      </h2>

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

        <!-- <?php //if(in_array('createMesas', $user_permission)): ?> -->
          <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Añadir Proveedor</button>
          <br /> <br />
        <!-- ?php endif; ?> -->

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Gestionar Proveedores</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Razon Social</th>
                <th>RUC</th>
                <th>Direccion</th>
                <th>Tipo de Proveedor</th>
                <!--<?php //if(in_array('updateMesas', $user_permission) || in_array('deleteMesas', $user_permission)): ?>-->
                  <th>Action</th>
                <!--<?php //endif; ?>-->
              </tr>
              </thead>

            </table>
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

<!--<?php //if(in_array('createMesas', $user_permission)): ?>-->
<!-- create brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Añadir Proveedor</h4>
      </div>

      <form role="form" action="<?php echo base_url('proveedores/create') ?>" method="post" id="createForm">

        <div class="modal-body">

          <div class="form-group">
            <label for="brand_name">Razon Social</label>
            <input type="text" class="form-control" id="proveedores_razon_social" name="proveedores_razon_social" placeholder="Escribe la Razon Social" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="brand_name">RUC</label>
            <input type="text" class="form-control" id="proveedores_RUC" name="proveedores_RUC" placeholder="Escribe el RUC" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="brand_name">Direccion</label>
            <input type="text" class="form-control" id="proveedores_direccion" name="proveedores_direccion" placeholder="Escribe la Direccion" autocomplete="off">
          </div>


          <div class="form-group">
            <label for="tipo_proveedor">Tipo Proveedor</label>
            <select class="form-control" id="tipo_proveedor" name="tipo_proveedor">
              <option value="1">tipo1</option>
              <option value="2">tipo2</option>
            </select>
          </div>
          
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--<?php //endif; ?>-->

<!--<?php //if(in_array('updateMesas', $user_permission)): ?>-->
<!-- edit brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar Proveedor</h4>
      </div>

      <form role="form" action="<?php echo base_url('proveedores/update') ?>" method="post" id="updateForm">

        <div class="modal-body">
          <div id="messages"></div>

          <div class="form-group">
            <label for="edit_brand_name">Razon Social</label>
            <input type="text" class="form-control" id="edit_proveedores_razon_social" name="edit_proveedores_razon_social" placeholder="Ingresa Razon Social" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="edit_brand_name">RUC</label>
            <input type="text" class="form-control" id="edit_proveedores_RUC" name="edit_proveedores_RUC" placeholder="Ingresa RUC" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="edit_brand_name">Direccion</label>
            <input type="text" class="form-control" id="edit_proveedores_direccion" name="edit_proveedores_direccion" placeholder="Ingresa Direccion" autocomplete="off">
          </div>
          
          <div class="form-group">
            <label for="edit_tipo_proveedor">Tipo Proveedor</label>
            <select class="form-control" id="edit_tipo_proveedor" name="edit_tipo_proveedor">
            <option value="1">tipo1</option>
              <option value="2">tipo2</option>
            </select>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>

      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--<?php //endif; ?>-->

<!--<?php //if(in_array('deleteMesas', $user_permission)): ?>-->
<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Eliminar Proveedor</h4>
      </div>

      <form role="form" action="<?php echo base_url('proveedores/remove') ?>" method="post" id="removeForm">
        <div class="modal-body">
          <p>¿Realmente quieres eliminar esta proveedor?  Se deben eliminar con todossus productos</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- <?php //endif; ?> -->


<script type="text/javascript">
var manageTable;

$(document).ready(function() {
  $("#proveedoresNav").addClass('active');
  
  // initialize the datatable  /////////////////////////////////////////////////////////////////////////////////////////////////////////////
  manageTable = $('#manageTable').DataTable({
    'ajax': 'fetchProveedoresData',
    'order': [],
    "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    }
  });

  // submit the create from 
  $("#createForm").unbind('submit').on('submit', function() {
    var form = $(this);

    // remove the text-danger
    $(".text-danger").remove();

    $.ajax({
      url: form.attr('action'),
      type: form.attr('method'),
      data: form.serialize(), // /converting the form data into array and sending it to server
      dataType: 'json',
      success:function(response) {

        manageTable.ajax.reload(null, false); 

        if(response.success === true) {
          $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
            '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
          '</div>');


          // hide the modal
          $("#addModal").modal('hide');

          // reset the form
          $("#createForm")[0].reset();
          $("#createForm .form-group").removeClass('has-error').removeClass('has-success');

        } else {

          if(response.messages instanceof Object) {
            $.each(response.messages, function(index, value) {
              var id = $("#"+index);

              id.closest('.form-group')
              .removeClass('has-error')
              .removeClass('has-success')
              .addClass(value.length > 0 ? 'has-error' : 'has-success');
              
              id.after(value);

            });
          } else {
            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
            '</div>');
          }
        }
      }
    }); 

    return false;
  });

});

// edit function
function editFunc(id)
{ 
  $.ajax({
    url: 'fetchProveedoresDataById/'+id,
    type: 'post',
    dataType: 'json',
    success:function(response) {

       $("#edit_proveedores_razon_social").val(response.razon_social);
       $("#edit_proveedores_RUC").val(response.ruc);
       $("#edit_proveedores_direccion").val(response.direccion);
       $("#edit_tipo_proveedor").val(response.tipo_proveedor);
      
      // submit the edit from 
      $("#updateForm").unbind('submit').bind('submit', function() {
        var form = $(this);

        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action') + '/' + id,
          type: form.attr('method'),
          data: form.serialize(), // /converting the form data into array and sending it to server
          dataType: 'json',
          success:function(response) {

            manageTable.ajax.reload(null, false); 

            if(response.success === true) {
              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
              '</div>');


              // hide the modal
              $("#editModal").modal('hide');
              // reset the form 
              $("#updateForm .form-group").removeClass('has-error').removeClass('has-success');

            } else {

              if(response.messages instanceof Object) {
                $.each(response.messages, function(index, value) {
                  var id = $("#"+index);

                  id.closest('.form-group')
                  .removeClass('has-error')
                  .removeClass('has-success')
                  .addClass(value.length > 0 ? 'has-error' : 'has-success');
                  
                  id.after(value);

                });
              } else {
                $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                '</div>');
              }
            }
          }
        }); 

        return false;
      });

    }
  });
}

// remove functions 
function removeFunc(id)
{
  if(id) {

    $("#removeForm").on('submit', function() {
    
      var form = $(this);

      // remove the text-danger
      $(".text-danger").remove();
    
      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: { proveedores_id:id }, 
        dataType: 'json',
        success:function(response) {
        
          manageTable.ajax.reload(null, false); 

          if(response.success === true) {
            $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
            '</div>');

            // hide the modal
            $("#removeModal").modal('hide');

          } else {
           
            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
            '</div>'); 
          }
        }
      }); 

      return false;
    });
  }
}


</script>
