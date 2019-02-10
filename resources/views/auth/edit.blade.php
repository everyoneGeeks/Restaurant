@extends ('layouts.master')
@section('title', "تعديل مستخدم")
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
            <h4 class="panel-title"> تعديل مستخدم </h4>
        </div>
        <div class="panel-body">
                            <!--POP Add this to show  sendMessageFalid -->
                            @if(Session::get("sendMessageSucc"))
                            <div class="alert alert-success fade in m-b-15 text-center">
                                                      <strong>  {{Session::get("sendMessageSucc")}}!</strong>
                      
                                                      <span class="close" data-dismiss="alert">×</span>
                                                  </div>
                            @endif
                            <!--POP End  -->
                                                <form action="{{route('chef.update')}}" method="POST" dir="rtl">
                <!-- // Handel the Cross Site Request Forgery -->
                @csrf
                <input type="hidden" name="id" value="{{$User->id}}">
                <fieldset>
                <div class="row">
                    <legend>تعديل مستخدم</legend>

                    <div class="col-md-6">
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">الاسم</label>
                        <input type="text" name="name" class="form-control"  value="{{$User->name}}">
                        @if ($errors->has('name'))
                        <span style="color:red;">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    </div><!--end col-md-6-->

                    <div class="col-md-6">
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">الايميل</label>
                        <input type="text" name="email" class="form-control"  value="{{$User->email}}">
                        @if ($errors->has('email'))
                        <span style="color:red;">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    </div><!--end col-md-6-->
                    </div>

                <div class="row">

                    <div class="col-md-6">
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">كلمة المرور</label>
                        <input type="password" name="password" class="form-control"  value="">
                        @if ($errors->has('password'))
                        <span style="color:red;">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    </div><!--end col-md-6-->
                </div>


                <button type="submit" class="btn btn-sm btn-primary m-r-5"> حفظ </button>
                </fieldset>
            </form>
        </div>
    </div>

</div><!-- end col-md-12 -->

</div><!-- end row -->
@endsection