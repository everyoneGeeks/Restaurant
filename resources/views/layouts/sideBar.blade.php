<!-- begin #sidebar -->
<div id="sidebar" class="sidebar sidebar-transparent">
  <!-- begin sidebar scrollbar -->
  <div data-scrollbar="true" data-height="100%">
    <!-- begin sidebar user -->
    <ul class="nav">
      <li class="nav-profile">
        <div class="image">
          <a href="javascript:;">
            <img src="public/assets/img/user-13.jpg" alt="" />
          </a>
        </div>
        <div class="info">
          stdslibrary
          <small>{{ Auth::user()->name }}</small>
        </div>
      </li>
    </ul>
    <!-- end sidebar user -->
    <!-- begin sidebar nav -->
    <ul class="nav">

      <li class="{{ Request::is(Route::current()->getName() == 'home') ? 'active' : '' }}">
        <a href="/home">
          <i class="fa fa-dashboard"></i>
          <span>الرئيسية</span>
        </a>
      </li>

      <li class="{{ Request::is('users*') ? 'active ' : '' }}">
        <a href="/users">
          <i class="fa fa-users"></i>
          <span>المستخدمون</span>
        </a>
      </li>

      <li class="{{ Request::is('product*') ? 'active ' : '' }}">
        <a href="/product">
          <i class="glyphicon glyphicon-gift"></i>
          <span>المنتجات </span>
        </a>
      </li>

      <li class="{{ Request::is('orders*') ? 'active ' : '' }}">
        <a href="/orders">
          <i class="glyphicon glyphicon-calendar"></i>
          <span>الطلبات </span>
        </a>
      </li>

      </li>
      <li class="{{ Request::is('advertisements*') ? 'active ' : '' }}">
        <a href="/advertisements">
          <i class="fa fa-address-book"></i>
          <span>الاعلانات</span>
        </a>
      </li>
     

      <li class="{{ Request::is('brand*') ? 'active ' : '' }}">
        <a href="/brand">
          <i class="fa fa-address-book"></i>
          <span>العلامات التجارية </span>
        </a>
      </li>

      <li class="{{ Request::is('color*') ? 'active ' : '' }}">
        <a href="/color">
          <i class="fa fa-address-book"></i>
          <span>الالوان </span>
        </a>
      </li>

      <li class="{{ Request::is('policy*') ? 'active ' : '' }}">
        <a href="/policy">
          <i class="fa fa-file-text-o"></i>
          <span>سياسة التطبيق</span>
        </a>
      </li>

      <li class="{{ Request::is('about*') ? 'active ' : '' }}">
        <a href="/about">
          <i class="fa fa-file-text-o"></i>
          <span>عن الموقع</span>
        </a>
      </li>

      <li class="{{ Request::is('contact*') ? 'active ' : '' }}">
        <a href="/contact">
          <i class="fa fa-phone"></i>
          <span>تواصل معنا</span>
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