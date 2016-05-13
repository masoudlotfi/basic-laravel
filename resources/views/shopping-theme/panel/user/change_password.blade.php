@extends('app')

@section('content')
    <div class="row">
    <div class="large-12 columns">
    <div class="box">
    <div class="box-header bg-transparent">
        <h3 class="box-title">
            <i class="icon-menu"></i>
            <span>{{trans('user.changePassword')}}</span>
        </h3>
    </div>
        <div class="box-body">

            {!! Form::model($user,['route' => 'panel.user.postChangePassword']) !!}
                <div class="row">
                <div class="large-6 large-centered columns">
                    <div class="large-12 columns">
                        {!! Form::passwordField('password',trans('user.pass'), null, ['class' => 'ltr', 'autocomplete' => 'false']) !!}
                        {!! Form::passwordField('new_password',trans('user.newPass'), null, ['class' => 'ltr', 'autocomplete' => 'false']) !!}
                        {!! Form::passwordField('new_password_confirmation',trans('user.passConfirm'), null, ['class' => 'ltr', 'autocomplete' => 'false']) !!}
                    </div>
                    <div class="large-12 columns">
                        {!! Form::submit(trans('user.update'), ['class'=>'button radius small expand bg-blue']) !!}
                    </div>
                </div>
                </div>
            {!! Form::close() !!}

    </div>
    </div>
    </div>
    </div>
@endsection
