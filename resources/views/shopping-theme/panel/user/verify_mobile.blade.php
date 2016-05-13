@extends('app')

@section('content')
    <div class="row">
        <div class="large-12 columns">
            <div class="box">
                <div class="box-header bg-transparent">
                    <h3 class="box-title">
                        <i class="icon-menu"></i>
                        <span>{{trans('user.VerifyMobile')}}</span>
                    </h3>
                </div>
                <div class="box-body">
                    <div class="large-6 large-centered columns">
                    <div class="row">
                        @if($isSent)
                            {!! Form::open(['route' => 'panel.user.postVerifyMobile']) !!}

                            <div class="large-12 columns">
                                {!! Form::textField('code', trans('common.code'), null, ['class' => 'ltr', 'autocomplete' => 'false']) !!}
                            </div>
                            <div class="large-4 end columns">
                                {!! Form::submit(trans('user.confirm'), ['class'=>'button radius small expand bg-blue']) !!}
                            </div>
                            {!! Form::close() !!}
                            {!! Form::open(['route' => 'panel.user.postVerifyMobileSend']) !!}
                            <div class="large-4 end columns">
                                {!! Form::submit(trans('user.reSend'), ['class'=>'button radius small expand bg-blue']) !!}
                            </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['route' => 'panel.user.postVerifyMobileSend']) !!}

                                <div class="row collapse">
                                    <div class="large-9 medium-9 small-8 columns">
                                        {!! Form::textField('mobile', trans('user.userMobile'),$user->mobile, ['maxlength' => 11, 'class' => 'ltr', 'autocomplete' => 'false']) !!}
                                    </div>
                                    <div class="large-3 medium-3 small-4 columns">
                                        <br>
                                        {!! Form::submit(trans('user.send'), ['class'=>'button radius small expand bg-blue']) !!}
                                    </div>
                                </div>

                            {!! Form::close() !!}
                        @endif
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
