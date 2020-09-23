<a id="show-sidebar" class="btn btn-sm btn-dark" href="javascript:void(0)" data-toggle="tooltip" data-title="Abrir menú" data-placement="right">
   <i class="fas fa-bars"></i>
</a>
<nav id="sidebar" class="sidebar-wrapper">
   <div class="sidebar-content">
      <div class="sidebar-brand">
         <a href="javascript:void(0)" class="inicio"><?= SISTEMA ?></a>
         <div id="close-sidebar">
            <i class="fas fa-times"></i>
         </div>
      </div>

      <div class="sidebar-header">
         <div class="user-pic">
            <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">
         </div>
         <div class="user-info">
            <span class="user-name">Usuario
               <strong>Apellido</strong>
            </span>
            <span class="user-role">Rol</span>
            <span class="user-status">
               <i class="fa fa-circle"></i>
               <span>Conectado</span>
            </span>
         </div>
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
               <a class="inicio">
                  <i class="fa fa-tachometer-alt"></i>
                  <span>Dashboard</span>
               </a>
            </li>
            <li class="header-menu">
               <span>Administración</span>
            </li>
            <li class="sidebar-dropdown">
               <a>
                  <i class="fa fa-book"></i>
                  <span>Menu Desplegable</span>
               </a>
               <div class="sidebar-submenu">
                  <ul>
                     <li>
                        <a>
                           Submenú 1
                        </a>
                     </li>
                     <li>
                        <a>
                           Submenú 2
                        </a>
                     </li>
                  </ul>
               </div>
            </li>
            <li class="header-menu">
               <span>Extra</span>
            </li>
            <li>
               <a id="masivos">
                  <i class="fas fa-mail-bulk"></i>
                  <span>Correos Masivo</span>
               </a>
            </li>
         </ul>
      </div>
      <!-- sidebar-menu  -->
   </div>
   <!-- sidebar-content  -->
   <div class="sidebar-footer">
      <a>
         <i class="fa fa-bell"></i>
         <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a>
         <i class="fa fa-envelope"></i>
         <span class="badge badge-pill badge-success notification">7</span>
      </a>
      <a>
         <i class="fa fa-cog"></i>
         <span class="badge-sonar"></span>
      </a>
      <a>
         <i class="fa fa-power-off"></i>
      </a>
   </div>
</nav>
