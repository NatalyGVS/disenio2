<aside class="main-sidebar" style="background-color: #34393a;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" >
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" style="background-color: #34393a; font-size: 15px; margin-top:15px ; " data-widget="tree">
                    
                     
            <li id="dashboardMainMenu" >
                <a href="<?php echo base_url('dashboard')?>">
                    <img class="fa" src="/disenio2/assets/images/icons/dashboard.png"> 
                    <span style="margin-left: 15px;">Panel de Control</span>
                </a>
            </li>

            <?php if(in_array('createMesas', $user_permission) || in_array('updateMesas', $user_permission) || in_array('viewCategory', $user_permission) || in_array('deleteMesas', $user_permission)): ?>
                <li id="mesasNav" >
                    <a href="<?php echo base_url('mesas/') ?>">
                      <img class="fa" src="/disenio2/assets/images/icons/table.png">
                      <span style="margin-left: 15px;">
                        Mesas del Restaurante
                      </span>
                    </a>
                </li>
            <?php endif;?>

            <?php if(in_array('createMesas', $user_permission) || in_array('updateMesas', $user_permission) || in_array('viewCategory', $user_permission) || in_array('deleteMesas', $user_permission)): ?>
                <li id="proveedoresNav" >
                    <a href="<?php echo base_url('proveedores/') ?>">
                      <img class="fa" src="/disenio2/assets/images/icons/table.png">
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
              <a href="<?php echo base_url('products') ?>">
                <img class="fa" src="/disenio2/assets/images/icons/products.png">
                <span style="margin-left: 15px;">Productos Totales</span>
              </a>
            </li>
          <?php endif; ?>
          <!--Menu Productos totales-->


          <!--Menu Pedidos y Ordenes-->
          <?php if(in_array('createOrder', $user_permission) || in_array('updateOrder', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)): ?>
            <li class="manageOrdersNav" id="mainOrdersNav">
              <a href="<?php echo base_url('orders') ?>">
                <img  class="fa" src="/disenio2/assets/images/icons/orders.png">
                <span style="margin-left: 15px;">
                  Registro de Ordenes
                </span>
              </a>
            </li>
          <?php endif; ?>
         


       <!--Menu Pedidos y Ordenes-->
       <!-- <?php if(in_array('createOrder', $user_permission) || in_array('updateOrder', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)): ?> -->
            <li class="mainEstadoNav" id="mainEstadoNav">
              <a href="<?php echo base_url('estado') ?>">
                <img  class="fa" src="/disenio2/assets/images/icons/orders.png">
                <span style="margin-left: 15px;">
                  Estados Ordenes
                </span>
              </a>
            </li>
          <!-- <?php endif; ?> -->

   <!--Menu Pedidos y Ordenes-->
       <!-- <?php if(in_array('createOrder', $user_permission) || in_array('updateOrder', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)): ?> -->
       <li class="mainEstadoNav" id="mainCancelarNav">
              <a href="<?php echo base_url('cancelar') ?>">
                <img  class="fa" src="/disenio2/assets/images/icons/orders.png">
                <span style="margin-left: 15px;">
                  Cancelar pedido
                </span>
              </a>
            </li>
          <!-- <?php endif; ?> -->


          <?php if(in_array('viewReports', $user_permission)): ?>
              <li id="reportNav">
                  <a href="<?php echo base_url('orders/') ?>">
                      <img  class="fa" src="/disenio2/assets/images/icons/reports.png">
                      <span style="margin-left: 15px;">
                          Informes/Reportes
                      </span>
                  </a>
              </li>
          <?php endif; ?>
          <!--Menu Reportes e Informes-->


        <?php endif; ?>
      </ul>
    </section>
  </aside>

 