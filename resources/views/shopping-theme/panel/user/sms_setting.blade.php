@extends('app')

@section('content')
    <div class="row">
        <div class="large-12 columns">
            <div class="box">
                <div class="box-header bg-transparent">
                    <h3 class="box-title">
                        <i class="icon-menu"></i>
                        <span>{{trans('user.userSMS')}}</span>
                    </h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="large-4 large-centered columns">
                            {!! Form::open(['route' => 'panel.user.postSmsSetting']) !!}
                            <div class="large-12 columns">
                                <div class="sms-setting">
                                    @foreach($smsSettings as $key => $smsSetting)
                                        {!! Form::checkboxField($key, trans('user.'.$key), 1, $smsSetting) !!}
                                    @endforeach
                                </div>
                            </div>
                            <div class="large-12 end columns">
                                {!! Form::submit(trans('user.update'), ['class'=>'button radius small expand bg-blue']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="box-header bg-transparent">
                    <h3 class="box-title">
                        <i class="icon-menu"></i>
                        <span>{{trans('user.userEmail')}}</span>
                    </h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="large-4 large-centered columns">
                            {!! Form::open(['route' => 'panel.user.postEmailSetting']) !!}
                            <div class="large-12 columns">
                                <div class="sms-setting">
                                    @if(!empty($emailSettings))
                                        @foreach($emailSettings as $key => $emailSetting)
                                            {!! Form::checkboxField($key, trans('user.Email'.$key), 1, $emailSetting) !!}
                                        @endforeach
                                    @else
                                        @foreach($emails as $key => $emailSetting)
                                            {!! Form::checkboxField($key, trans('user.Email'.$key), 1, $emailSetting) !!}
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="large-12 end columns">
                                {!! Form::submit(trans('user.update'), ['class'=>'button radius small expand bg-blue']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>

                <div class="box-header bg-transparent">
                    <h3 class="box-title">
                        <i class="icon-menu"></i>
                        <span>{{trans('user.userSecuritySetting')}}</span>
                    </h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="large-4 large-centered columns">
                            {!! Form::open(['route' => 'panel.user.postSecuritySetting']) !!}
                            <div class="large-12 columns">
                                <div class="sms-setting">
                                    {!! Form::checkboxField('two_factor_authentication', trans('user.securitySetting'),null, $user['two_factor_authentication']) !!}
                                </div>
                            </div>
                            <div class="large-12 end columns">
                                {!! Form::submit(trans('user.update'), ['class'=>'button radius small expand bg-blue']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection