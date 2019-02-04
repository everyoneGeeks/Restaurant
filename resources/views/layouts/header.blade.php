<body>
  <!-- begin #page-loader -->
  <div id="page-loader" class="fade in"><span class="spinner"></span></div>
  <!-- end #page-loader -->
  
  <!-- begin #page-container -->
  <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top navbar-inverse">
      <!-- begin container-fluid -->
      <div class="container-fluid">
        <!-- begin mobile sidebar expand / collapse button -->
        <div class="navbar-header">
          <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> the Restaurant </a>
          <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <!-- end mobile sidebar expand / collapse button -->
        
        <!-- begin header navigation right -->
        <ul class="nav navbar-nav navbar-left">
          <li class="dropdown navbar-user">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/Images/admin.png" alt="" /> 
              <span class="hidden-xs">@yield('user')</span> <b class="caret"></b>
            </a>
            @if(Auth::check())
            <ul class="dropdown-menu animated fadeInLeft">

            {{-- <li><a href="/user/show/{{Auth::user()->id}}">{{Auth::user()->name}}</a></li> --}}
            <li><a href="/user/show/{{Auth::user()->id}}">الصفحة الشخصية</a></li>
              <li class="divider"></li>
              {{-- <li><a href="javascript:;">تسجيل الخروج</a></li> --}}
              <li class="nav-item dropdown">
                {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::User()->name }} <span class="caret"></span>
                </a> --}}

                {{-- <div class="dropdown-menu" aria-labelledby="navbarDropdown"> --}}
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('تسجيل الخروج') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                {{-- </div> --}}
            </li>
            </ul>
            @endif
          </li>
        </ul>
        <!-- end header navigation right -->
      </div>
      <!-- end container-fluid -->
    </div>
    <!-- end #header -->