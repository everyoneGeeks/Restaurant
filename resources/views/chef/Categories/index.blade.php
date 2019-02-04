@extends ('layouts.master')
@section('title', "الاقسام  ")
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
            <h4 class="panel-title">لاقسام</h4>
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
                      <th>اسم القسم </th>
                      <th>صورة القسم </th>
                      <th>تاريخ التسجيل</th>
                      <th>تعديل</th>
                      <th>حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Categories as $U)
                    <tr>
                    <td>{{$U->category->name}}</td>
                      <td><img src="{{$U->category->icon}}"></td>
                      <td>{{$U->created_at}}</td>
                      <td><a href="{{route('edit.category',$U->id)}}" class="btn btn-success btn-xs"> تعديل </a></td>
                      <td><a href="{{route('delete.category',$U->id)}}" class="btn btn-danger btn-xs"> حذف </a></td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
            <div class="clearfix"></div>
            <div class="container" style="margin-top:25px">
       <a href="{{route('add.category')}}" class="btn btn-success">اضافة قسم  جديده </i>
       </a>
       </div>
        </div>
        
    </div>
    <!-- end panel -->
</div>

</div><!-- end row -->
@endsection