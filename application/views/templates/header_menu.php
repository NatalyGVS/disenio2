<header class="main-header" style="width: 100%; position: fixed;"
>
    <!-- Logo -->
    <a class="logo" style="background: #171717;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SINGESPRO</b></span>
      
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background: #171717">
      <!-- Sidebar toggle button-->
          
          
            <nav>
                <ul class="nava ul">
                  <li class="licreated"><a class="label-info label abg"><span style="padding-right: 25px;"><?php $user_id = $this->session->userdata('id');
                                          $user_data = $this->model_users->getUserData($user_id);
                                          $this->data['user_data'] = $user_data;

                                          $user_group = $this->model_users->getUserGroup($user_id);
                                          $this->data['user_group'] = $user_group;echo $user_data['username'];?>
                       
                      </span></a>
                      <ul class="ul2">
                        <li>
                            <a class="abg2" href="<?php echo base_url('users/profile/') ?>">
                                <p>
                                    <i class="fa fa-user-o" style="margin-right: 5px;">
                                    </i>
                                  Mi perfil
                                </p>
                            </a>
                        </li>

                        <li>
                            <a class="abg2" href="<?php echo base_url('users/setting/') ?>">
                                <p> 
                                    <i class="fa fa-wrench" style="margin-right: 5px;">
                                    </i>
                                  Editar datos
                                </p>
                            </a>
                        </li>
                        <li>
                            <a class="abg2" href="<?php echo base_url('auth/logout') ?>"><p><i class="glyphicon glyphicon-log-out" style="margin-right: 5px;"></i>Cerrar Sesión</p></a></li>
                      </ul>
                  </li>
                </ul> 
            </nav>
    </nav>
     <div class="bg-orange" style="font-size: 5px; background-color: #39ace7!important;" align="right"> <label> </label></div>
</header>
  <!-- Left side column. contains the logo and sidebar -->
  