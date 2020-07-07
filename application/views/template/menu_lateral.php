   <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
      <i class="fas fa-bars"></i>
   </a>

   <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-brand">
         <a href="#"><?= SISTEMA ?></a>
         <div id="close-sidebar">
            <i class="fas fa-times"></i>
         </div>
      </div>

      <div class="sidebar-header">
         <div class="user-pic">
            <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">
         </div>
         <div class="user-info">
            <span class="user-name">Juan
               <strong>Perez</strong>
            </span>
            <span class="user-role">Validador</span>
            <span class="user-status"><a href="#">Cerrar Sesión</a></span>
         </div>
      </div>

      <div class="sidebar-menu">
         <ul>
            <li class="header-menu">
               <span>General</span>
            </li>
            <li class="sidebar-dropdown">
               <a href="#">
                  <i class="fa fa-tachometer-alt"></i>
                  <span>Convocatorias</span>
               </a>
               <div class="sidebar-submenu">
                  <ul>
                     <li>
                        <a href="#">Nivel Básica</a>
                     </li>
                     <li>
                        <a href="#">Nivel Media</a>
                     </li>
                     <li>
                        <a href="#">Nivel Superior</a>
                     </li>
                  </ul>
               </div>
            </li>
            <li class="header-menu">
               <span>Registros</span>
            </li>
            <li>
               <a href="#">
                  <i class="fa fa-book"></i>
                  <span>Verificar Solicitudes</span>
               </a>
            </li>
         </ul>
      </div>

      <div class="sidebar-footer">
         <a href="#">
            <i class="fa fa-power-off"></i>
         </a>
      </div>
   </nav>