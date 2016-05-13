@extends('auth.auth_base')

@section('content')
    <div class="row">

        {!! Form::open(array('route' => 'home.postCreate'))!!}
        {!! Form::label('email', 'ایمیل') !!}
        {!! Form::email('email') !!}
        {!! Form::label('mobile', 'شماره تماس') !!}
        {!! Form::text('mobile', null, null, ['maxlength' => 11, 'class' => 'ltr', 'autocomplete' => 'false']) !!}
        {!! Form::label('title', 'عنوان') !!}
        {!! Form::text('title', null, null, ['autocomplete' => 'false']) !!}
        {!! Form::label('content', 'محتوا') !!}
        {!! Form::textarea('content') !!}
        {!! Form::submit('ارسال تیکت', ['class'=>'button radius small bg-blue']) !!}
        {!! Form::close() !!}
    </div>
@endsection