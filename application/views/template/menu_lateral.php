<?php $Dashboard = 'Administracion'; // URL index de Adminsitración?>
<a id="show-sidebar" class="btn btn-sm" href="javascript:void(0)" data-toggle="tooltip" data-title="Abrir menú" data-placement="right">
   <i class="fas fa-ellipsis-h text-center texto-rojo" style="font-size: 2rem;"></i>
</a>
<nav id="sidebar" class="sidebar-wrapper">
   <div class="sidebar-content">
      <div class="sidebar-brand">
         <a href="<?= $Dashboard ?>" class="inicio"><?= SISTEMA ?></a>
         <div id="close-sidebar">
            <i class="fas fa-times"></i>
         </div>
      </div>

      <div class="sidebar-header">
         <a href="Usuarios" class="perfil">
            <div class="user-pic">
               <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">
            </div>
            <div class="user-info">
               <span class="user-name"><?= $usuario->nombres ?>
                  <strong><?= $usuario->primer_apellido ?></strong>
               </span>
               <span class="user-role">
                  <span class="badge badge-secondary fondo-rojo"><?= $usuario->tipo_usuario ?></span>
               </span>
               <span class="user-status">
                  <div id="progress">
                     <i class="fas fa-circle text-danger"></i>
                  </div>
               </span>
            </div>
         </a>
      </div>
      <!-- sidebar-header  -->
      <div class="sidebar-search">
         <div>
            <div class="input-group">
               <input type="text" class="form-control search-menu" placeholder="Buscar...">
               <div class="input-group-append">
                  <span class="input-group-text">
                     <i class="fa fa-search" aria-hidden="true"></i>
                  </span>
               </div>
            </div>
         </div>
      </div>
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
         <ul>
            <li class="header-menu">
               <span>General</span>
            </li>
            <li>
               <a href="<?= $Dashboard ?>">
                  <i class="fa fa-tachometer-alt"></i>
                  <span>Dashboard</span>
               </a>
            </li>
            <li>
               <a id="listado-titulo">
                  <i class="fas fa-graduation-cap"></i>
                  <span>Títulos</span>
               </a>
            </li>
            <li>
               <a id="listado-lotes">
                  <i class="fas fa-clipboard-list"></i>
                  <span>Lotes</span>
               </a>
            </li>
            <li class="header-menu">
               <span>Administración</span>
            </li>
            <li>
               <a id="listado-usuarios">
                  <i class="fa fa-users"></i>
                  <span>Usuarios</span>
               </a>
            </li>
            <li class="sidebar-dropdown">
               <a>
                  <i class="fas fa-tools"></i>
                  <span>Configuración</span>
               </a>
               <div class="sidebar-submenu">
                  <ul>                     
                     <li>
                        <a id="listado-instituciones">
                           <span>Instituciones</span>
                        </a>
                     </li>
                     <li>
                        <a id="listado-carreras">
                           <span>Carreras</span>
                        </a>
                     </li>
                     <li>
                        <a id="listado-autorizaciones">
                           <span>Autorizaciones</span>
                        </a>
                     </li>
                     <li>
                        <a id="listado-rvoes">
                           <span>RVOEs</span>
                        </a>
                     </li>
                     <li>
                        <a id="listado-firmantes">
                           <span>Firmantes</span>
                        </a>
                     </li>
                  </ul>
               </div>
            </li>
         </ul>
      </div>
      <!-- sidebar-menu  -->
   </div>
   <!-- sidebar-content  -->
   <div class="sidebar-footer">
      <a id="ml-notificaciones" class="notificaciones">
         <i class="fa fa-bell"></i>
         <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <!-- <a>
         <i class="fa fa-envelope"></i>
         <span class="badge badge-pill badge-success notification">7</span>
      </a> -->
      <a href="Usuarios" class="perfil">
         <i class="fa fa-users-cog"></i>
      </a>
      <a href="Usuarios/logout" class="logout">
         <i class="fa fa-power-off"></i>
         <span class="badge-sonar"></span>
      </a>
   </div>
</nav>
