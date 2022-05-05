
 
 
 <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Clvet</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
               <li class="nav-item has-treeview">
            <a href="{{ route('inicio') }}" class="nav-link {{ request()->is('inicio') ? 'nav-link' : 'nav-link' }}">

                <i class="nav-icon fas fa-tachometer-alt green"></i>
                <p>
                 Inicio
                </p>
            </a>
          </li>


        <li class="nav-item">
        <a href="{{ route('inicio') }}" class="{{ request()->routeIs('inicio') ? 'nav-link' : 'nav-link' }}">
            <i class="nav-icon fas fa-money-check-alt green"></i>
            <p>
              venta
            </p>
          </a>
        </li>


      <li class="nav-item has-treeview">
        <a href="{{ route('inicio') }}" class="nav-link {{ request()->is('inicio') ? '' : '' }}">

          <i class="nav-icon fas fa-comment green"></i>
          <p>
            Recordatorios
          </p>
        </a>
      
      </li>


      
      <li class="nav-item has-treeview">
        <a href="{{ route('inicio') }}" class="nav-link {{ request()->is('inicio') ? '' : '' }}">

          <i class="nav-icon fas fa-medkit green"></i>
          <p>
            Hospitalizados
           
          </p>
        </a>
       
      </li>


    
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-inicio green"></i>
          <p>
           Administración
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">

         <li class="nav-item">
          <a href="{{ route('inicio') }}" class="nav-link {{ request()->is('inicio') ? '' : '' }}">

              <i class="nav-icon fas fa-list-ol green"></i>
              <p>
                Caja
              </p>
           </a>   
          </li>


          <li class="nav-item">
          <a href="{{ route('inicio') }}" class="nav-link {{ request()->is('inicio') ? '' : '' }}">

              <i class="nav-icon fas fa-tags green"></i>
              <p>
                Inventario
              </p>
          </a> 

          </li>
          
            <li class="nav-item">
            <a href="{{ route('inicio') }}" class="nav-link {{ request()->is('inicio') ? '' : '' }}">

                  <i class="nav-icon fas fa-cogs white"></i>
                  <p>
                      Compras
                  </p>
          </a>
            </li>
        </ul>
      </li>
     
        
       
      <li class="nav-item has-treeview">
        <a href="{{ route('inicio') }}" class="nav-link {{ request()->is('inicio') ? '' : '' }}">

          <i class="nav-icon fas fa-gift green"></i>
          <p>
            Enviar mensaje
          </p>
        </a>
        
      </li>


        <li class="nav-item"> 
            <a href="{{ route('inicio') }}" class="{{ request()->routeIs('inicio') ? 'nav-link' : 'nav-link' }}">
                <i class="{{ request()->routeIs('inicio') ? 'nav-icon fas fa-building' : 'nav-icon fas fa-building' }}"></i>
                <p>Empresa</p>
            </a>
       </li>


       <li class="nav-item"> 
            <a href="{{ route('inicio') }}" class="{{ request()->routeIs('inicio') ? 'nav-link' : 'nav-link' }}">
                <i class="{{ request()->routeIs('inicio') ? 'nav-icon fas fa-chart-bar green' : 'nav-icon fas fa-chart-bar green' }}"></i>
                <p>Estadistica</p>
            </a>
       </li>

   
       
       <li class="nav-item"> 
            <a href="{{ route('inicio') }}" class="{{ request()->routeIs('inicio') ? 'nav-link' : 'nav-link' }}">
                <i class="{{ request()->routeIs('inicio') ? 'nav-icon fas fa-graduation-cap orange' : 'nav-icon fas fa-graduation-cap orange' }}"></i>
                <p>Aprender</p>
            </a>
       </li>


       
       <li class="nav-item"> 
            <a href="{{ route('inicio') }}" class="{{ request()->routeIs('inicio') ? 'nav-link' : 'nav-link' }}">
                <i class="{{ request()->routeIs('inicio') ? 'nav-icon fas fa-credit-card' : 'nav-icon fas fa-credit-card' }}"></i>
                <p>Pagar</p>
            </a>
       </li>




          <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    <i class="nav-icon fa fa-power-off" style="color:#C81010"></i>
                    <p>
                        Salir
                    </p>
                 </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
        </li>
            
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 

