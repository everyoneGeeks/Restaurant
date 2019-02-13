@extends ('layouts.master')
@section('title', "تعديل الاقسام  ")
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
            <h4 class="panel-title">  تعديل  الاقسام   </h4>
        </div>
        <div class="panel-body">
                @if (session('message'))
                <div class="alert alert-success text-center">
                    {{ session('message') }}
                </div>
            @endif
        <form action="{{route('update.category',$Categories->id)}}" method="POST" dir="rtl">
                @csrf
                <fieldset>
                <div class="row">

                    <div class="col-md-6">
                                <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                                        <label for="category">الاقسام المتاحة  </label>
                                        <select class="form-control js-example-basic-single" name="category">
                                                @foreach($categories as $category)   
                                                @if($category->id == $Categories->id)
                                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                                @else
                                                     <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                     @endif
                                                     @endforeach
                                                   </select>
                                        @if ($errors->has('category'))
                                        <span style="color:red;">{{ $errors->first('category') }}</span>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                            <button type="submit" class="btn btn-sm btn-primary m-r-5"> حفظ </button>
                                        </div>
                    </div><!--end col-md-6-->
                    

                </div><!--end row-->

         
                </fieldset>
            </form>
        </div>
    </div>

</div><!-- end col-md-12 -->

</div><!-- end row -->
@endsection