@extends('auth.auth_base')

@section('content')
        <!-- /.box-header -->
<div class="box-body " style="display: block;">
    <div class="row">

        <div class="large-12 columns">
            <div class="row">
                <div class="edumix-signup-panel">
                    <p>{{trans('user.emailVerification')}}</p>
                    {!! Form::open(['action' => ['Auth\AuthController@postSendEmailVerifier']]) !!}
                    <div class="row collapse">
                        <div class="small-10  columns">
                            {!! Form::emailField('email', '', $email, ['placeholder'=>'Email']) !!}
                        </div>
                        <div class="small-2  columns">
                            <span class="prefix bg-yellow"><i class="text-dark-gray icon-address-1"></i></span>
                        </div>
                    </div>
                    {!! Form::submit(trans('user.send'), ['class'=>'button radius small expand bg-yellow text-dark-gray']) !!}
                    {!! Form::close() !!}
                </div>
            </div>

        </div>

    </div>

</div>
<!-- end .timeline -->
@endsection