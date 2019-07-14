<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style=
     "background-color: #f8f8f8; padding-top: 35px; height: 100%;">
  <!-- Content Header (Page header) -->
 <section class="content-header" >
      <h2>
         <label style="font-size: 35px;">
        Añadir Productos</label>
      </h2>

    </section>

  <!-- Main content -->
  <div class="col-md-6 col-xs-6" style=
     "background-color: #f8f8f8;">
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
          <div class="row">
            <div class="col-md-12 col-xs-12">
          <!-- /.box-header -->
          <form role="form" action="<?php base_url('products/create') ?>" method="post" enctype="multipart/form-data">

              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <div class="kv-avatar">
                      <div class="file-loading">

                          <input id="product_image" name="product_image" type="file">
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                <div class="form-group">
                  <label for="product_name">Nombre del producto</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Nombre del producto" required/>
                </div>
              </div>

              <div class="col-md-4 col-xs-4">
                <label for="tipo_proveedor">Material del Producto</label>
                  <select class="form-control" id="material" name="material" required>
                    <option value="1">Material de Laton</option>
                    <option value="2">Material de Acero</option>
                    <option value="3">Material de Cobre</option>
                  </select>
              </div>
        <div class="col-md-2 col-xs-2">
               <div class="form-group">
                  <label for="store">Disponible</label>
                  <select class="form-control" id="availability" name="availability" required>
                    <option value="1">si</option>
                    <option value="2">No</option>
                  </select>
                </div>
              </div>
              </div>
              <div class="row">
              <div class="col-md-6 col-xs-6">
                <div class="form-group">
                  <label for="category">Categoría</label>
                  <select class="form-control" name="category_id">
                    <?php foreach ($category as $k => $v): ?>
                      <option value="<?php echo $v['id']; ?>"><?php echo $v['nombre']; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
<div class="col-md-6 col-xs-6">
               <div class="form-group">
            <label for="tipo_proveedor">Unidad de Medida</label>
            <select class="form-control" id="unidad_medida" name="unidad_medida">
              <option value="1">Medidas en Kilogramo (Kg)</option>
              <option value="2">Medidas en Litro (L)</option>
            </select>
          </div>
        </div>
            </div>
           
        <div class="row">
          <div class="col-md-12 col-xs-12">
                <div class="form-group">
                  <label for="descripcion">Descripción
                  </label>
                  <textarea type="text" class="form-control" name="descripcion" placeholder="Descripción del producto (opcional)" autocomplete="off" style="resize: none;"></textarea>
                </div>
              </div>
              </div>
            </div>

               





            <table class="table table-bordered" id="product_info_table">
                  <thead>
                    <tr>
                      <th style="width:50%">Producto</th>
                      <th style="width:10%">Cantidad</th>
                      <th style="width:10%"><button type="button" id="add_row" class="btn btn-default"><i class="fa fa-plus"></i></button></th>
                    </tr>
                  </thead>

                   <tbody>
                     <tr id="row_1">
                       <td>
                        <select class="form-control select_group product" data-row-id="row_1" id="product_1" name="product[]" style="width:100%;" onchange="getProductData(1)" required>
                            <option value=""></option>
                            <?php foreach ($products as $k => $v): ?>
                              <option value="<?php echo $v['id'] ?>"><?php echo $v['nombre'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </td>
                        <td><input type="number" name="qty[]" id="qty_1" class="form-control" required onkeyup="getTotal(1)"></td>
                        <td><button type="button" class="btn btn-default" onclick="removeRow('1')"><i class="fa fa-close"></i></button></td>
                     </tr>
                   </tbody>
                </table>






              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Añadir producto</button>
                <a href="<?php echo base_url('products') ?>" class="btn btn-warning">Atras</a>
              </div>
              
            </form>
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
</div>

<div class="col-md-6 col-xs-6" style=
     "background-color: #f8f8f8;">
          <div class="avatar pull-left" align="center">
            
        <img src="<?php echo base_url('assets/images/icons/create_product.png');?>" style="width: 90%; height: auto;" />
  </div>
        </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
var manageTable;
var base_url = "<?php echo base_url(); ?>";

  $(document).ready(function() {
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
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i> <span style="margin-left:5px;"> añadir imagen</span>',
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



  }); //document 



  
  // get the product information from the server
  function getProductData(row_id)
  {
    var product_id = $("#product_"+row_id).val();    
    if(product_id == "") {
      $("#rate_"+row_id).val("");
      $("#rate_value_"+row_id).val("");

      $("#qty_"+row_id).val("");           

      $("#amount_"+row_id).val("");
      $("#amount_value_"+row_id).val("");

    } else {
      $.ajax({
        url: base_url + 'products/getProductValueById',
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

</script>