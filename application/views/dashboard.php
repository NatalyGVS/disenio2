
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style= "background-color: #f8f8f8; padding-top: 35px;">

<!-- "background-color: #ffffff; "> -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
        <label style="font-size: 35px;">
        Panel de Control</label>
        <!-- <small>Panel de control</small> -->
      </h2>
      <ol class="breadcrumb" style="font-size: 15px;">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Panel de Control</li>
      </ol>
      <hr>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) --> 
      <?php if($is_admin == true): ?>

        <div class="row">
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <a href="<?php echo base_url('products/') ?>" class="small-box-footer"> 
            <div class="small-box bg-aqua">
            	
              <!-- color celeste -->
              <div class="inner">  <!-- como centrarlo  -->
                <h3><?php echo $total_products ?></h3>
                  <h2>Productos totales</h2>

              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>   <!-- icono -->
              </div>
               <label class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></label>
          
            </div>
            </a>
          </div>



          <!-- ./col -->
          <div class="col-lg-4 col-xs-6">
          	<a href="<?php echo base_url('orders/') ?>" class="small-box-footer"> 
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $total_paid_orders ?></h3>
                <p>
                  <h2>Total de órdenes pagadas</h2>
                
              </p>
              
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <label class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></label>
            </div>
        </a>
          </div>




          <!-- ./col -->
          <div class="col-lg-4 col-xs-6">
          	<a href="<?php echo base_url('users/') ?>" class="small-box-footer"> 
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo $total_users; ?></h3>
                 <p>
                  <h2>Usuarios totales </h2>
                 </p>
              
              </div>
              <div class="icon">
                <i class="ion ion-android-people"></i>
              </div>
              <label class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></label>
            </div>
        </a>
          </div>

          <!-- ./col -->

          <!-- ./col -->
          <div class="col-lg-4 col-xs-6">
          	<a href="<?php echo base_url('mesas/') ?>" class="small-box-footer"> 
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo $total_users; ?></h3>
                 <p>
                  <h2>Mesas disponibles</h2>
                 </p>
              
              </div>
              <div class="icon">
                <i class="ion ion-android-apps"></i>
              </div>
              <label class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></label>
            </div>
        </a>
          </div>

          <!-- ./col -->

          <!-- ./col -->
          <div class="col-lg-4 col-xs-6">
          	<a href="<?php echo base_url('category/') ?>" class="small-box-footer"> 
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $total_users; ?></h3>
                 <p>
                  <h2>Categorías</h2>
                 </p>
              
              </div>
              <div class="icon">
                <i class="ion ion-android-bookmark"></i>
              </div>
              <label class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></label>
            </div>
        </a>
          </div>

          <!-- ./col -->

          <div class="col-lg-4 col-xs-6">
          	<a href="<?php echo base_url('reports/') ?>" class="small-box-footer"> 
            <!-- small box -->
            <div class="small-box bg-black">
              <div class="inner">
                <h3>20%</h3>
                 <p>
                  <h2>Estadísticas</h2>
                 </p>
              
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <label class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></label>
            </div>
        </a>
          </div>

          <!-- ./col -->
        </div>
        <!-- /.row -->
      <?php else: ?>
        
      <?php endif; ?>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    $(document).ready(function() {
      $("#dashboardMainMenu").addClass('active');
    }); 
  </script>
