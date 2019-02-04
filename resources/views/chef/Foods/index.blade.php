@extends ('layouts.master')
@section('title', "الاطعمة")
@section ('content')

<div class="row">

<div class="col-md-12 col-sm-12">

</div>

<div class="col-md-12">

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>


            </div>
            <h4 class="panel-title">الاطعمة</h4>
        </div>
        <div class="panel-body">
                @if (session('message'))
                <div class="alert alert-success text-center">
                    {{ session('message') }}
                </div>
            @endif

            <table id="data-table" class="table table-striped table-bordered nowrap" width="100%" dir="rtl" >
                <thead>
                    <tr>
                      <th>الاسم  </th>
                      <th>الصورة </th>
                      <th>الوصف </th>
                      <th>السعر </th>
                      <th>القسم </th>
                      <th>الخصم </th>
                      <th>تعديل </th>
                      <th>حذف  </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($foods as $U)
                    <tr>
                    <td>{{$U->name}}</td>
                    <td><img src="{{$U->image}}"></td>
                      <td>{{ $U->description }}</td>
                      <td>{{ $U->price }}</td>
                      <td>{{ $U->category->name }}</td>
                      <td>{{ $U->discount }}</td>
                      <td><a href="{{route('edit.food',$U->id)}}" class="btn btn-success btn-xs"> تعديل </a></td>
                      <td><a href="{{route('delete.food',$U->id)}}" class="btn btn-danger btn-xs"> حذف </a></td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
            <div class="clearfix"></div>
            <div class="container" style="margin-top:25px">
       <a href="{{route('add.food')}}" class="btn btn-success">اضافة وجبة  جديده </i>
       </a>
       </div>
        </div>
        
    </div>
    <!-- end panel -->
</div>

</div><!-- end row -->
@endsection