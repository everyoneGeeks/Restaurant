@extends ('layouts.master')
@section('title', "تعديل  اطعمة ")
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
            <h4 class="panel-title">  تعديل اطعمة   </h4>
        </div>
        <div class="panel-body">
                @if (session('message'))
                <div class="alert alert-success text-center">
                    {{ session('message') }}
                </div>
            @endif

        <form action="{{route('update.food',$foods->id)}}" method="POST" dir="rtl" enctype="multipart/form-data">
                @csrf
                <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">الاسم</label>
                        <input type="text" name="name" class="form-control"  value="{{$foods->name}}">
                            @if ($errors->has('name'))
                            <span style="color:red;">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                            <img width="200px"  src="{{$foods->image}}">
                        <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                <label for="image">الصورة</label>
                        <input type="file" name="image" class="form-control"  value="">
                                @if ($errors->has('image'))
                                <span style="color:red;">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                    </div><!--end col-md-6-->
                    <div class="col-md-6">
                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description">الوصف</label>
                            <input type="text" name="description" class="form-control"  value="{{$foods->description}}">
                                @if ($errors->has('description'))
                                <span style="color:red;">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label for="price">السعر </label>
                                    <input type="number" name="price" class="form-control"  value="{{$foods->price}}">
                                    @if ($errors->has('price'))
                                    <span style="color:red;">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                        </div><!--end col-md-6-->
                        <div class="col-md-6">
                                <div class="form-group {{ $errors->has('discount') ? ' has-error' : '' }}">
                                    <label for="discount">الخصم</label>
                                    <input type="number" name="discount" class="form-control"  value="{{$foods->discount}}">
                                    @if ($errors->has('discount'))
                                    <span style="color:red;">{{ $errors->first('discount') }}</span>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                                        <label for="category">الاقسام المتاحة  </label>

                                               
                                                <select class="form-control js-example-basic-single" name="category">
                                                        @foreach($Categories as $category)    
                                                        @if($foods->category_id == $category->id)
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