<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          


              <li class="nav-item {{ setActive(['home*']) }}"> 
                <a class="nav-link {{ setActive(['home*']) }}" href="{{route('home')}}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Dashboard
                    
                    </p>
                  </a>
                </li>
                
         



          @if(Auth::user()->level == 'admin')
          <li li class="nav-item">
          <a class="nav-link " data-toggle="collapse" href="#ui-basic" aria-controls="ui-basic">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <div class="collapse {{ setShow(['talenta*','kas*', 'user*']) }}" id="ui-basic">
              <ul class="nav flex-column sub-menu">


              <li class="nav-item">
                  <a class="nav-link {{ setActive(['anggota*']) }}" href="{{route('anggota.index')}}">
                  <i class=" nav-icon fas fa-edit"></i>
                  <p>Data Anggota</p>
                  </a>
                </li>

                
              <li class="nav-item">
                  <a class="nav-link {{ setActive(['talenta*']) }}" href="{{route('talenta.index')}}">
                  <i class="nav-icon fas fa-list"></i>
                  <p>Data Pelayanan</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link {{ setActive(['kk*']) }}" href="{{route('kk.index')}}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Data Kepala Keluarga</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link {{ setActive(['detkk*']) }}" href="{{route('detailkk.index')}}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Data Anggota Keluarga</p>
                  </a>
                </li>

                <li class="nav-item">
                <a class="nav-link {{ setActive(['user*']) }}" href="{{route('user.index')}}">
                  <i class="far fa-user nav-icon"></i>
                  <p>Pengguna</p>
                  </a>
                </li>

                
                
              </ul>
            </div>
            <li class="nav-item {{ setActive(['/export', 'export']) }}"> 
                <a class="nav-link {{ setActive(['export*']) }}" href="{{url('/export')}}">
                    <i class="nav-icon fas fa-cloud-download-alt"></i>
                    <p>
                      Laporan
                    
                    </p>
                  </a>
                </li>
          </li>
          @endif
          

       <div class="d-flex border-bottom">
              
                </div>

                
        


            <li class="nav-item {{ setActive(['logout', '']) }}"> 
            <a class="dropdown-item nav-link {{ setActive(['logout*']) }}" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-times"></i>
              <p class="text-red">
                                      <b>
                                         
                                        Keluar
                                        
                                      </b>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
              </p>
            </a>
            </li>

           
      

          
          
        </ul>