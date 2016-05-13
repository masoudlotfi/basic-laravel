@extends('auth.auth_base')
@section('content')
    <!-- /.box-header -->
    <div class="box-body " style="display: block;">
        <div class="row">

            <div class="large-12 columns">
                <div class="row">
                    <div class="edumix-signup-panel">
                        {!! Form::open(['action' => ['Auth\AuthController@postRegister']]) !!}
                        <div class="row collapse">
                            <div class="small-6 large-6 columns">
                                {!! Form::label('firstName', 'نام') !!}
                                {!! Form::text('first_name', null, ['autocomplete' => 'false']) !!}
                            </div>
                            <div class="small-6 large-6 columns">
                                {!! Form::label('lastName', 'نام خانوادگی') !!}
                                {!! Form::text('last_name', null, ['autocomplete' => 'false']) !!}
                            </div>
                        </div>
                        {!! Form::label('email', 'ایمیل') !!}
                        {!! Form::email('email', null, ['placeholder' => 'something@gmail.com', 'autocomplete' => 'off']) !!}
                        {!! Form::label('mobile', 'شماره موبایل') !!}
                        {!! Form::text('mobile', null, ['autocomplete' => 'off']) !!}
                        {!! Form::label('address', 'آدرس') !!}
                        {!! Form::text('address', null, ['autocomplete' => 'false']) !!}
                        {!! Form::label('postalCode', 'کد پستی') !!}
                        {!! Form::text('postal_code', null, ['autocomplete' => 'false']) !!}
                        {!! Form::label('pass', 'رمز عبور') !!}
                        {!! Form::password('password', ['class' => 'ltr', 'autocomplete' => 'off']) !!}
                        {!! Form::submit('ثبت نام', ['class' => 'button radius small expand bg-yellow text-dark-gray']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end .timeline -->
@endsection

@section('js')
    <script>
        $('form').submit(function () {
            $(this).find((':submit')).attr("disabled", true);
        });
    </script>
@endsection