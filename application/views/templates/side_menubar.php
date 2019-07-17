<aside class="main-sidebar" style="background-color: #171717; height: 120% !important;">
    <!-- sidebar: style can be found in sidebar.less --> 
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" style=" font-size: 15px; margin-top:15px;" data-widget="tree">
                    
                     
            <li id="dashboardMainMenu" >
                <a href="<?php echo base_url('dashboard')?>">
                    <img class="fa" src="/disenio2/assets/images/icons/dashboard.png"> 
                    <span style="margin-left: 15px;">Panel de Control</span>
                </a>
            </li>


            <?php if(in_array('createMesas', $user_permission) || in_array('updateMesas', $user_permission) || in_array('viewCategory', $user_permission) || in_array('deleteMesas', $user_permission)): ?>
                <li id="proveedoresNav" >
                    <a href="<?php echo base_url('proveedores/') ?>">
                      <img class="fa" src="/disenio2/assets/images/icons/provider.png">
                      <span style="margin-left: 15px;">
                        Proveedores
                      </span>
                    </a>
                </li>
            <?php endif;?>
           

            <?php if($user_permission): ?>
                <?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                    <li class="treeview" id="mainUserNav">
                        <a href="#">
                            <img class="fa" src="/disenio2/assets/images/icons/users.png">
                            <span style="margin-left: 15px;">
                                Usuarios del Sistema
                            </span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                          <?php if(in_array('createUser', $user_permission)): ?>
                              <li id="createUserNav">
                                  <a href="<?php echo base_url('users/create') ?>">
                                      <i class="fa fa-circle-o"></i>
                                      Agregar usuario
                                  </a>
                              </li>
                          <?php endif; ?>

                          <?php if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                              <li id="manageUserNav">
                                  <a href="<?php echo base_url('users') ?>">
                                      <i class="fa fa-circle-o"></i>
                                      Administrar usuarios
                                  </a>
                              </li>
                          <?php endif; ?>
                        </ul>
                    </li>
            <?php endif; ?>

          <?php if(in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
            <li id="mainGroupNav">
              <a href="<?php echo base_url('groups') ?>">
               <img  class="fa" src="/disenio2/assets/images/icons/groups.png">
                <span style="margin-left: 15px;">
                Gestionar Grupos
              </span>
              </a>
            </li>
          <?php endif; ?>


     

          <?php if(in_array('createCategory', $user_permission) || in_array('updateCategory', $user_permission) || in_array('viewCategory', $user_permission) || in_array('deleteCategory', $user_permission)): ?>
            <li id="categoryNav">
              <a href="<?php echo base_url('category/') ?>">
                <img  class="fa" src="/disenio2/assets/images/icons/categories.png">
                <span style="margin-left: 15px;">
                  Gestionar Categorías
                </span>
              </a>
            </li>
          <?php endif; ?>

      

           <!--Menu Productos totales-->
          <?php if(in_array('createProduct', $user_permission) || in_array('updateProduct', $user_permission) || in_array('viewProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>
            <li id="mainProductNav">
              <a href="<?php echo base_url('products/') ?>">
                <img class="fa" src="/disenio2/assets/images/icons/products.png">
                <span style="margin-left: 15px;">Productos Totales</span>
              </a>
            </li>
          <?php endif; ?>

          <!--Menu Pedidos totales-->

          <?php if(in_array('createProduct', $user_permission) || in_array('updateProduct', $user_permission) || in_array('viewProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>
            <li id="mainPedidosNav">
              <a href="<?php echo base_url('pedidos/') ?>">
                <img class="fa" src="/disenio2/assets/images/icons/products.png">
                <span style="margin-left: 15px;">Pedidos</span>
              </a>
            </li>
          <?php endif; ?>

          <?php if(in_array('createProduct', $user_permission) || in_array('updateProduct', $user_permission) || in_array('viewProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>
            <li id="mainCotizacionNav">
              <a href="<?php echo base_url('cotizacion/') ?>">
                <img class="fa" src="/disenio2/assets/images/icons/products.png">
                <span style="margin-left: 15px;">Cotizacion</span>
              </a>
            </li>
          <?php endif; ?>

  

        <?php endif; ?>
      </ul>
    </section>
  </aside>

 