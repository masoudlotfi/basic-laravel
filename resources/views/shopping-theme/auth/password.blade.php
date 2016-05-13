@extends('auth.auth_base')
@section('content')
    <!-- /.box-header -->
    <div class="box-body " style="display: block;">
        <div class="row">

            <div class="large-12 columns">
                        <p>{{trans('auth.forgetPass')}}</p>
                        {!! Form::open(['action' => ['Auth\PasswordController@postEmail']]) !!}
                        <div class="row collapse">
                            <div class="small-10  columns">
                                {!! Form::emailField('email', '', $email, ['placeholder' => trans('auth.email')]) !!}
                            </div>
                            <div class="small-2  columns">
                                <span class="prefix bg-yellow"><i class="text-dark-gray icon-address-1"></i></span>
                            </div>
                        </div>
                        {!! Form::submit(trans('auth.send'), ['class'=>'button radius small expand bg-yellow text-dark-gray']) !!}
                    <a href="{{URL::route('auth.getRegister')}}" class="left" ><i class="icon icon-arrow-11"></i> {{trans('user.register')}}</a>
                    <a href="{{URL::route('auth.getLogin')}}"><i class="icon icon-arrow-11"></i> {{trans('user.login')}}</a>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
    <!-- end .timeline -->
@endsection
