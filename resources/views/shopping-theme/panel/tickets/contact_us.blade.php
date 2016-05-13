@extends('auth.auth_base')

@section('content')
    <div class="row">

        {!! Form::open(array('route' => 'home.postCreate'))!!}
        {!! Form::text('name', 'نام', null, ['autocomplete' => 'false']) !!}
        {!! Form::email('email', 'ایمیل') !!}
        {!! Form::text('phone', 'شماره تماس', null, ['maxlength' => 11, 'class' => 'ltr', 'autocomplete' => 'false']) !!}
        {!! Form::text('title', 'عنوان', null, ['autocomplete' => 'false']) !!}
        {!! Form::textarea('content', 'محتوا') !!}
        {!! Form::submit('ارسال تیکت', ['class'=>'button radius small bg-blue']) !!}
        {!! Form::close() !!}
    </div>
@endsection