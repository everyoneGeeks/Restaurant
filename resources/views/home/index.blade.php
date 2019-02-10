@extends ('layouts.master')
@section('title', "الرئيسية")
@section ('content')

<!-- begin row -->
<div class="row">
{!! Charts::styles() !!}
  <!-- begin col-3 -->
  <div class="col-md-3 col-sm-6">
    <div class="widget widget-stats bg-green">
      <div class="stats-icon"><i class="fa fa-users"></i></div>
      <div class="stats-info">
        <h4>اجمالى المستخدمين</h4>
        <p>{{$UsersCount}}</p>  
      </div>
      <div class="stats-link">
        <a href="/users"><i class="fa fa-arrow-circle-o-left"></i> عرض التفاصيل</a>
      </div>
    </div>
  </div>
  <!-- end col-3 -->

    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
      <div class="widget widget-stats bg-green">
        <div class="stats-icon"><i class="fa fa-building"></i></div>
        <div class="stats-info">
          <h4> اجمالى الطلبيات</h4>
          <p>{{$Order}}</p>  
        </div>
        <div class="stats-link">
          <a href="/orders"><i class="fa fa-arrow-circle-o-left"></i> عرض التفاصيل</a>
        </div>
      </div>
    </div>
    <!-- end col-3 -->

    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
      <div class="widget widget-stats bg-green">
        <div class="stats-icon"><i class="fa fa-bullhorn"></i></div>
        <div class="stats-info">
          <h4>اجمالى  المنتجات </h4>
          <p>{{$product}}</p>  
        </div>
        <div class="stats-link">
          <a href="/product"><i class="fa fa-arrow-circle-o-left"></i> عرض التفاصيل</a>
        </div>
      </div>
    </div>
    <!-- end col-3 -->

    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-green">
          <div class="stats-icon"><i class="fa fa-commenting-o"></i></div>
          <div class="stats-info">
            <h4>اجمالى  الاعلانات</h4>
            <p>{{$AdsCount}}</p>  
          </div>
          <div class="stats-link">
            <a href="/advertisements"><i class="fa fa-arrow-circle-o-left"></i> عرض التفاصيل</a>
          </div>
        </div>
      </div>
      <!-- end col-3 -->     
    
</div>



<div class="row">
  <div class="col-md-6 col-sm-12">
  <div class="panel panel-inverse" data-sortable-id="index-1">
      <div class="panel-heading">
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
          </div>
          <h4 class="panel-title">المستخدمون</h4>
      </div>
  	<div class="panel-body">
  		{!! $chart_users->html() !!}
  	</div>
  </div>
  </div><!-- end col-md-6 col-sm-12 -->

  <div class="col-md-6 col-sm-12">
    <div class="panel panel-inverse" data-sortable-id="index-1">
        <div class="panel-heading">
            <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            </div>
            <h4 class="panel-title">الشركات</h4>
        </div>
      <div class="panel-body">
        {!! $chart_companies->html() !!}
      </div>
    </div>
    </div><!-- end col-md-6 col-sm-12 -->


</div>


<div class="row">

  <div class="col-md-6">
    <div class="panel panel-inverse" data-sortable-id="index-6">
      <div class="panel-heading">
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
          </div>
          <h4 class="panel-title">احدث المستخدمين</h4>
      </div>
      <div class="panel-body p-t-0">
        <table class="table table-valign-middle m-b-0" dir="rtl">
          <thead>
            <tr>  
              <th>الاسم</th>
              <th>تاريخ الانضمام</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($RecentUsers as $RU)
            <tr>
              <td><a href="/users/show/{{$RU->id}}">{{$RU->name}}</a></td>
              <td>{{$RU->created_at}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div><!-- end col-6 -->

  <div class="col-md-6">
    <div class="panel panel-inverse" data-sortable-id="index-6">
      <div class="panel-heading">
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
          </div>
          <h4 class="panel-title">احدث  الطلبيات</h4>
      </div>
      <div class="panel-body p-t-0">
        <table class="table table-valign-middle m-b-0" dir="rtl">
          <thead>
            <tr>  
              <th>اسم المنتج </th>
              <th>حالة الطلب </th>
            </tr>
          </thead>
          <tbody>
          @foreach ($RecentCompanies as $RC)
            <tr>
              <td><a href="/users/show/{{$RC->id}}">{{$RC->order_product->name}}</a></td>
              <td>جارى التنفيذ </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div><!-- end col-6 -->


</div>


    {!! Charts::scripts() !!}
    {!! $chart_users->script() !!}
    {!! $chart_companies->script() !!}

@endsection