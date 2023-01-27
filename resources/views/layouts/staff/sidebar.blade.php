<style>
.img{
        background-position: center;
        background-size: cover;  
        border-radius: 50%;
        width: 40px;
        height: 40px;
      }
#img{
        background-position: center;
        background-size: cover;  
        border-radius: 50%;
        width: 40px;
        height: 40px;
      }
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-light elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link py-3">
         <img src="{{ asset('dist/img/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3">
     <div class="brand-text font-weight-light">ระบบสารบรรณ</div>
    </a>

  <!-- Sidebar -->
  <div class="sidebar">
     <div class="d-flex"> 
     <div class="brand-link py-3" ><h6>    
     @if(Auth::user()->Image==null) 
     <i class="bi bi-person-circle" style="font-size:35px;margin-left:3px"></i>
      @else
      <img id="img" style="background-image:url('/files/file/{{ Auth::user()->Image }}');">
      @endif
      <span class="brand-text font-weight-light" style="margin-left:10px;">{{Auth::user()->name}} {{Auth::user()->Lastname}} STAFF</span>
      </div> </h6>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>


 <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Sidebar Menu -->
          <!--  หน้าแรก --> 
        @foreach($setallow as $home)
           @if($home->id==1)
              @if($home->staffstatus==1)
            <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">
            <i class="nav-icon bi bi-house-door"></i>
              <p>
             หน้าแรก
              </p>
            </a>
          </li>
              @else

              @endif

          @endif
          @endforeach


            <!-- แจ้งเตือนใหม่ -->
            @foreach($setallow as $warm)
           @if($warm->id==2)
              @if($warm->staffstatus==1)
              <li class="nav-item">
              <a href="{{ route('warn') }}" class="nav-link">
            <i class="nav-icon bi bi-bell"></i>
              <p>
              แจ้งเตือนใหม่
               @if($total==null)
               @else
               <span class="right badge badge-danger">{{$total}}</span>
               @endif
              </p>
            </a>
          </li>
              @else

              @endif

          @endif
          @endforeach
     
         
          <!-- รับหนังสือ folder-->
             @foreach($setallow as $admit)
           @if($admit->id==3&&$admit->staffstatus==1)
              <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon bi bi-file-arrow-down"></i>
              <p>
               รับหนังสือ
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
          @else

          @endif
          @endforeach
          <!-- เพิ่มข้อมูลหนังสือรับเข้า -->
           @foreach($setallow as $addadmit)
           @if($addadmit->id==4&&$addadmit->staffstatus==1) 
              <li class="nav-item">
                <a href="{{route('addbook')}}" class="nav-link">
                @foreach($setallow as $admit)
                @if($admit->id==3&&$admit->staffstatus==1) 
                  <i class="far fa-circle nav-icon"></i>
                @elseif($admit->id==3&&$admit->staffstatus==0)
                  <i class="nav-icon bi bi-file-earmark-plus"></i>   
                @endif
                 @endforeach 
                 <p>เพิ่มข้อมูลหนังสือรับเข้า</p>
                </a>
              </li>
            @else

          @endif
          @endforeach          
          <!-- ข้อมูลหนังสือรับเข้า -->
           @foreach($setallow as $dataadmit)
           @if($dataadmit->id==5&&$dataadmit->staffstatus==1)
              <li class="nav-item">
                <a href="{{route('admitstaff')}}" class="nav-link">
                @foreach($setallow as $admit)
                @if($admit->id==3&&$admit->staffstatus==1) 
                  <i class="far fa-circle nav-icon"></i>
                @elseif($admit->id==3&&$admit->staffstatus==0)
                  <i class="nav-icon bi bi-folder2-open"></i>   
                @endif
                 @endforeach 
                  <p>ข้อมูลหนังสือรับเข้า</p>
                </a>
              </li>
            @else

          @endif
          @endforeach  
           <!-- รับหนังสือ folder ปิด-->
           @foreach($setallow as $admit)
           @if($admit->id==3&&$admit->staffstatus==1)
              </ul>
          </li>
              @else

          @endif
          @endforeach



           <!-- ส่งหนังสือ folder -->
           @foreach($setallow as $sendbookout)
           @if($sendbookout->id==6&&$sendbookout->staffstatus==1)
              <li class="nav-item">
             <a href="#" class="nav-link">
             <i class="nav-icon bi bi-file-arrow-up"></i>
              <p>
               ส่งหนังสือ
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @else

          @endif
          @endforeach          
           <!-- สร้างหนังสือ -->
           @foreach($setallow as $form)
           @if($form->id==7&&$form->staffstatus==1)
              <li class="nav-item">
                <a href="{{ route('form') }}" class="nav-link">
                @foreach($setallow as $bookout)
                @if($bookout->id==6&&$bookout->staffstatus==1) 
                <i class="far fa-circle nav-icon"></i>
                @elseif($bookout->id==6&&$bookout->staffstatus==0)
                  <i class="nav-icon bi bi-journal-plus"></i>   
                @endif
                 @endforeach 
                  <p>สร้างหนังสือ</p>
                </a>
              </li>
              @else

          @endif
          @endforeach
          <!-- ข้อมูลหนังสือออก -->
          @foreach($setallow as $databookout)
           @if($databookout->id==9&&$databookout->staffstatus==1)
              <li class="nav-item">
                <a href="{{route('bookoutstaff')}}" class="nav-link">
                @foreach($setallow as $bookout)
                @if($bookout->id==6&&$bookout->staffstatus==1) 
                <i class="far fa-circle nav-icon"></i>
                @elseif($bookout->id==6&&$bookout->staffstatus==0)
                  <i class="nav-icon bi bi-folder2"></i>   
                @endif
                 @endforeach
                  <p>ข้อมูลหนังสือออก</p>
                </a>
              </li>
              @else

          @endif
          @endforeach
          <!-- ส่งหนังสือ folder ปิดfolder-->
            @foreach($setallow as $sendbookout)
           @if($sendbookout->id==6&&$sendbookout->staffstatus==1)
                </ul>
          </li>
              @else

          @endif
          @endforeach

           <!-- ข้อมูลขนส่ง -->
           @foreach($setallow as $transport)
           @if($transport->id==10&&$transport->staffstatus==1)
          <li class="nav-item">
            <a href="{{route('transportstaff')}}" class="nav-link">
            <i class="nav-icon bi bi-car-front"></i>
              <p>
              ข้อมูลขนส่ง
              </p>
            </a>
          </li>
              @else

          @endif
          @endforeach


           <!-- ตั้งค่าข้อมูลส่วนตัว -->
           @foreach($setallow as $profile)
           @if($profile->id==11&&$profile->staffstatus==1)
          <li class="nav-item">
            <a href="{{route('profile')}}" class="nav-link">
            <i class="nav-icon bi bi-gear"></i>
            <p>ตั้งค่าส่วนตัว</p>
            </a>
          </li>
              @else

          @endif
          @endforeach


           <!-- ข้อมูลผู้ใช้ -->
           @foreach($setallow as $claim)
           @if($claim->id==12&&$claim->staffstatus==1)
              <li class="nav-item">
            <a href="{{route('claim')}}" class="nav-link">
            <i class="nav-icon bi bi-people"></i>
              <p>ข้อมูลผู้ใช้</p>
            </a>
          </li>
              @else

          @endif
          @endforeach

        
          <!-- กำหนดสิทธิ์ผู้ใช้ -->
          @foreach($setallow as $allowstaff)
           @if($allowstaff->id==13&&$allowstaff->staffstatus==1)
          <li class="nav-item">
            <a href="{{route('allow')}}" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="nav-icon bi bi-person-gear" viewBox="2 2 18 16">
            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
            </svg>
            <p style="margin-left:-5px;"> 
                กำหนดสิทธิ์ผู้ใช้
              </p>
            </a>
          </li>
              @else

          @endif
          @endforeach
         
          <li class="nav-item"> 
          <form method="POST" action="{{ route('logout') }}" class="nav-link"x-data>                  
                <a href="{{ route('logout') }}"  @click.prevent="$root.submit();">
                                @csrf
               <i class="nav-icon bi bi-box-arrow-right"></i>  </form>    
              <p>
               ออกจากระบบ
              </p>                 
             </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

