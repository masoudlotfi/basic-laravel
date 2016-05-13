@extends('app')

@section('content')
    <div class="row">
        <div class="large-12 columns">
            <div class="box">
                <div class="box-header bg-transparent">
                    <h3 class="box-title">
                        <i class="icon-menu"></i>
                        <span>{{trans('user.editUserInfo')}}</span>
                    </h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="large-12 columns ">
                            <fieldset class="">
                                <legend><i class="icon-alert-2"></i> {{trans('transaction.warning')}} </legend>
                                {{trans('user.editDescription')}}
                            </fieldset>
                        </div>
                        <div class="large-6 large-centered columns">
                            {!! Form::model($user,['route' => 'panel.user.postEdit']) !!}
                            <div class="large-12 columns">
                                {!! Form::textField('mobile',trans('user.userMobile'), null, ['maxlength' => 11, 'class' => 'ltr', 'autocomplete' => 'false']) !!}
                            </div>
                            <div class="large-12 columns">
                                {!! Form::textField('landline',trans('user.userLandLine'), null, ['class' => 'ltr', 'maxlength' => 13, 'autocomplete' => 'false']) !!}
                            </div>
                            <div class="large-12 columns">
                                {!! Form::textField('postal',trans('user.userPostal'), null, ['maxlength' => 11, 'class' => 'ltr', 'autocomplete' => 'false']) !!}
                            </div>
                            <div class="large-12 columns">
                                {!! Form::textareaField('address',trans('user.userAddress')) !!}
                            </div>
                            <div class="large-12 end columns">
                                {!! Form::submit(trans('user.userUpdateInfo'), ['class'=>'button radius small bg-blue']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection