@extends('auth.auth_base')

@section('content')
    <!-- /.box-header -->
    <div class="box-body " style="display: block;">
        <div class="row">

            <div class="large-12 columns">
                <div class="row">
                    <div class="edumix-signup-panel">
                        <p>{{trans('auth.confirmChangePass')}}</p>
                        {!! Form::open(['action' => ['Auth\PasswordController@postReset']]) !!}
                        <div class="row collapse">
                            <div class="small-10 columns ">
                                {!! Form::passwordField('password', '', null, ['placeholder'=>trans('auth.pass'), 'class' => 'ltr', 'autocomplete' => 'false']) !!}
                            </div>
                            <div class="small-2 columns ">
                                <span class="prefix bg-yellow"><i class="text-dark-gray icon-lock-2"></i></span>
                            </div>
                        </div>
                        <div class="row collapse">
                            <div class="small-10 columns ">
                                {!! Form::passwordField('password_confirmation', '', null, ['placeholder'=>trans('auth.confirmPass'), 'class' => 'ltr', 'autocomplete' => 'false']) !!}
                            </div>
                            <div class="small-2 columns ">
                                <span class="prefix bg-yellow"><i class="text-dark-gray icon-lock-2"></i></span>
                            </div>
                        </div>
                        {!! Form::hidden('token', $token) !!}
                        {!! Form::hidden('email', $user->email) !!}
                        {!! Form::submit(trans('auth.send'), ['class'=>'button radius small expand bg-yellow text-dark-gray']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end .timeline -->
@endsection