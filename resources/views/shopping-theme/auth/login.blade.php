@extends('auth.auth_base')
@section('content')
    <!-- /.box-header -->
    <div class="box-body ">
        <div class="row">

            <div class="large-12 columns">
                <p class="welcome"></p>
                {!! Form::open(['action' => ['Auth\AuthController@postLogin']]) !!}

                <div class="row collapse">
                    <div class="small-12 columns">
                        {!! Form::label('email', 'ایمیل') !!}
                        {!! Form::email('email', '', ['placeholder'=>'ایمیل', 'autofocus']) !!}
                        {!! Form::label('pass', 'رمز عبور') !!}
                        {!! Form::password('password', '', ['placeholder'=>'رمز عبور', 'class'=>' text-tiny ltr', 'autocomplete' => 'false']) !!}
                    </div>
                </div>
                {!! Form::submit('ورود', ['class'=>'button radius small expand bg-yellow text-dark-gray']) !!}
                <a href="{{URL::route('auth.getRegister')}}" class="left"><i class="icon icon-arrow-11"></i> لینک عضویت</a>
                <br/>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
    <!-- end .timeline -->
@endsection