@extends ('layouts.master')
@section('title', "المخزن ")
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
            <h4 class="panel-title">المخزن</h4>
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
                      <th>الرقم</th>
                      <th>الاسم  </th>
                      <th>الكمية   </th>
                      <th>التاريخ  </th>
                      <th>تعديل</th>
                      <th>حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Kitchen as $U)
                    <tr>
                    <td>{{$U->id}}</td>
                    <td>{{$U->name}}</td>
                    <td>{{$U->amount}}</td>
                      <td>{{ $U->created_at->diffforhumans() }}</td>
                      <td><a href="{{route('edit.kitchen',$U->id)}}" class="btn btn-success btn-xs"> تعديل </a></td>
                      <td><a href="{{route('delete.kitchen',$U->id)}}" class="btn btn-danger btn-xs"> حذف </a></td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
            <div class="clearfix"></div>
            <div class="container" style="margin-top:25px">
       <a href="{{route('add.kitchen')}}" class="btn btn-success">اضافة للمخزن  </i>
       </a>
       </div>
        </div>
        
    </div>
    <!-- end panel -->
</div>

</div><!-- end row -->
@endsection