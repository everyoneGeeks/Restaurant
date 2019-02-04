<!-- begin #sidebar -->
<div id="sidebar" class="sidebar sidebar-transparent">
  <!-- begin sidebar scrollbar -->
  <div data-scrollbar="true" data-height="100%">
    <!-- begin sidebar user -->
    <ul class="nav">
      <li class="nav-profile">
        <div class="image">
          <a href="javascript:;">
            <img src="/Images/admin.png" alt="" />
          </a>
        </div>
        <div class="info">
          the Restaurant
          <small>{{ Auth::user()->name }}</small>
        </div>
      </li>
    </ul>
    <!-- end sidebar user -->
    <!-- begin sidebar nav -->
    <ul class="nav">


      <li class="{{ Request::is('/user/table*') ? 'active ' : '' }}">
      <a href="{{route('tables')}}">
          <i class="fas fa-utensils"></i>
          <span>الطاولات </span>
        </a>
      </li>

      <li class="{{ Request::is('/user/category*') ? 'active ' : '' }}">
        <a href="{{route('categories')}}">
            <i class="fas fa-utensils"></i>
            <span>الاقسام </span>
          </a>
        </li>  
        
        <li class="{{ Request::is('/user/food*') ? 'active ' : '' }}">
          <a href="{{route('foods')}}">
              <i class="fas fa-utensils"></i>
              <span>الاطعمة  </span>
            </a>
          </li>  

      <!-- begin sidebar minify button -->
      <li>
        <a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify">
          <i class="fa fa-angle-double-left"></i>
        </a>
      </li>
      <!-- end sidebar minify button -->
    </ul>
    <!-- end sidebar nav -->
  </div>
  <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar-->