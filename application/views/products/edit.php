

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Gestionar
      <small>Productos</small>
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
            <h3 class="box-title">Editar producto</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="<?php base_url('users/update') ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label>Vista previa de la imagen: </label>
                  <img src="<?php echo base_url() . $product_data['image'] ?>" width="150" height="150" class="img-circle">
                </div>

                <div class="form-group">
                  <label for="product_image">Actualizar imagen</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="product_image" name="product_image" type="file">
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="product_name">Nombre del producto</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Nombre del producto" value="<?php echo $product_data['nombre']; ?>"  autocomplete="off"/>
                </div>
                
                    <div class="form-group">
                      <label for="product_name">Precio del producto</label>
                      <input type="number" min="0" max="500" step="0.01" class="form-control" id="precio" name="precio" placeholder="Precio del producto"  value="<?php echo $product_data['precio_unitario']; ?>"required/>
                    </div>
                 

                <div class="form-group">
                  <label for="material">Material del Producto</label>
                  <select class="form-control" id="material" name="material">
                    <option value="1" <?php if($product_data['material'] == 1) { echo "selected='selected'"; } ?>>Material de Laton</option>
                    <option value="2" <?php if($product_data['material'] == 2) { echo "selected='selected'"; } ?>>Material de Acero</option>
                    <option value="3" <?php if($product_data['material'] == 3) { echo "selected='selected'"; } ?>>Material de Cobre</option>
                  </select>
                </div>


                <div class="form-group">
                  <label for="category">Categoría</label>
                  <?php $category_data = json_decode($product_data['category_id']);  ?>
                  <select class="form-control select_group" id="category" name="category[]">
                    <?php foreach ($category as $k => $v): ?>
                   
                      <option value="<?php echo $v['id'] ?>" <?php if($category_data == $v['id']) { echo "selected='selected'"; } ?>><?php echo $v['nombre'] ?></option>
                           
                    <?php endforeach ?>
                  </select>
                </div>



                <div class="form-group">
                  <label for="unidad_medida">Medidas</label>
                  <select class="form-control" id="unidad_medida" name="unidad_medida">
                    <option value="1" <?php if($product_data['unidad_medida'] == 1) { echo "selected='selected'"; } ?>>Medidas en Kilogramo (Kg)</option>
                    <option value="2" <?php if($product_data['unidad_medida'] = 2) { echo "selected='selected'"; } ?>>Medidas en Litro (L)</option>
                  </select>
                </div>
                
                <div class="row">
                  <div class="col-md-12 col-xs-12">
                   <div class="form-group">
                      <label for="descripcion">Descripción
                      </label>
                      <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción del producto" value="<?php echo $product_data['descripcion']; ?>"  autocomplete="off"/>
              
                 
                  </div>
                </div>
              </div>


             <!-- dsadsdas -->
 
             
             <table class="table table-bordered" id="product_info_table">
                  <thead>
                    <tr>
                      <th style="width:50%">Producto</th>
                      <th style="width:10%">Cantidad</th>
                      <th style="width:10%"><button type="button" id="add_row" class="btn btn-default"><i class="fa fa-plus"></i></button></th>
                    </tr>
                  </thead>

                   <tbody>
                  
                    <?php if(isset($order_data['order_item'])): ?>
                      <?php $x = 1; ?>
                      <?php foreach ($order_data['order_item'] as $key => $val): ?>

                  
                       <tr id="row_<?php echo $x; ?>">
                         <td>
                          <select class="form-control select_group product" data-row-id="row_<?php echo $x; ?>" id="product_<?php echo $x; ?>" name="product[]" style="width:100%;" onchange="getProductData(<?php echo $x; ?>)" required>
                              <option value=""></option>
                              <?php foreach ($products as $k => $v): ?>  
                                <option value="<?php echo $v['id'] ?>" <?php if($val['insumo_id'] == $v['id']) { echo "selected='selected'"; } ?>><?php echo $v['nombre'] ?></option>
                              <?php endforeach ?>
                            </select>
                          </td>
                          <td><input type="text" name="qty[]" id="qty_<?php echo $x; ?>" class="form-control" required onkeyup="getTotal(<?php echo $x; ?>)" value="<?php echo $val['cantidad'] ?>" autocomplete="off"></td>
                         
                          <td><button type="button" class="btn btn-default" onclick="removeRow('<?php echo $x; ?>')"><i class="fa fa-close"></i></button></td>
                       </tr>
                       <?php $x++; ?>
                     <?php endforeach; ?>
                   <?php endif; ?>
                   </tbody>
                </table>

             <!-- dasfdasfdsaf -->
           

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                <a href="<?php echo base_url('products/') ?>" class="btn btn-warning">Atras</a>
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
    var base_url = "<?php echo base_url(); ?>";

  $(document).ready(function() {
    $(".select_group").select2();
    $("#description").wysihtml5();

    // $("#mainProductNewNav").addClass('active');
    // $("#manageProductNav").addClass('active');
    

    $("#category").select2();

$("#mainProductsNav").addClass('active');
$("#addProductsNav").addClass('active');

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


 // Add new row in the table 
 $("#add_row").unbind('click').bind('click', function() {
      var table = $("#product_info_table");
      var count_table_tbody_tr = $("#product_info_table tbody tr").length;
      var row_id = count_table_tbody_tr + 1;


      $.ajax({
          url: base_url + '/products/getTableProductRow/',
          type: 'post',
          dataType: 'json',
          success:function(response) {
            

              // console.log(reponse.x);
               var html = '<tr id="row_'+row_id+'">'+
                   '<td>'+ 
                    '<select class="form-control select_group product" data-row-id="'+row_id+'" id="product_'+row_id+'" name="product[]" style="width:100%;" onchange="getProductData('+row_id+')">'+
                        '<option value=""></option>';
                        $.each(response, function(index, value) {
                          html += '<option value="'+value.id+'">'+value.nombre+'</option>';             
                        });
                        
                      html += '</select>'+
                    '</td>'+ 
                    '<td><input type="number" name="qty[]" id="qty_'+row_id+'" class="form-control" onkeyup="getTotal('+row_id+')"></td>'+
                    '<td><button type="button" class="btn btn-default" onclick="removeRow(\''+row_id+'\')"><i class="fa fa-close"></i></button></td>'+
                    '</tr>';

                if(count_table_tbody_tr >= 1) {
                $("#product_info_table tbody tr:last").after(html);  
              }
              else {
                $("#product_info_table tbody").html(html);
              }

              $(".product").select2();

          }
        });

      return false;
    });

  });



  function getProductData(row_id)
  {
    var product_id = $("#product_"+row_id).val();    
    if(product_id == "") {
      // $("#rate_"+row_id).val("");
      // $("#rate_value_"+row_id).val("");

      $("#qty_"+row_id).val("");           

      // $("#amount_"+row_id).val("");
      // $("#amount_value_"+row_id).val("");

    } else {
      $.ajax({
        url: base_url + 'products/getInsumoValueById',
        type: 'post',
        data: {product_id : product_id},
        dataType: 'json',
        success:function(response) {
          // setting the rate value into the rate input field
          
          // $("#rate_"+row_id).val(response.price);
          // $("#rate_value_"+row_id).val(response.price);

          $("#qty_"+row_id).val(1);
          $("#qty_value_"+row_id).val(1);

          // var total = Number(response.price) * 1;
          // total = total.toFixed(2);
          // $("#amount_"+row_id).val(total);
          // $("#amount_value_"+row_id).val(total);
          
          // subAmount();
        } // /success
      }); // /ajax function to fetch the product data 
    }
  }

  function removeRow(tr_id)
  {
    $("#product_info_table tbody tr#row_"+tr_id).remove();
    // subAmount();
  }
</script>