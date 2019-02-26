@extends ('layouts.master')
@section('title', "اضافة صنف ")
@section ('content')

<div class="row">


    <div class="col-md-12">

    <div class="panel panel-inverse" data-sortable-id="form-stuff-3">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            	<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            	<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            	<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            </div>
            <h4 class="panel-title">  اضافة صنف   </h4>
        </div>
        <div class="panel-body">
                @if (session('message'))
                <div class="alert alert-success text-center">
                    {{ session('message') }}
                </div>
            @endif
        <form action="{{route('add.food.kitchen',$id)}}" method="POST" dir="rtl">
                @csrf
                <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">الصنف   </label>
                            <select class="form-control js-example-basic-single" name="name">
                                    @foreach ($Kitchen as $item)  
                                         <option value="{{ $item->id }}">{{ $item->name }}</option>
                                         @endforeach
                                       </select>

                            @if ($errors->has('name'))
                            <span style="color:red;">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div><!--end col-md-6-->
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount">الكمية   </label>
                            <input type="amount" name="amount" class="form-control"  value="">
                            @if ($errors->has('amount'))
                            <span style="color:red;">{{ $errors->first('amount') }}</span>
                            @endif
                        </div>
                    </div><!--end col-md-6-->
                </div><!--end row-->

                <button type="submit" class="btn btn-sm btn-primary m-r-5"> حفظ </button>
                </fieldset>
            </form>
        </div>
    </div>

</div><!-- end col-md-12 -->

</div><!-- end row -->
@endsection