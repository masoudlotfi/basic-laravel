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
                        <div class="large-6 large-centered columns">

                            {!! Form::model($user,['route' => ['panel.user.postUpdateInformation'],'files'=>true]) !!}


                            <div class="row collapse">
                                <div class="small-2 large-2 columns">
                                    {!! Form::radioField('gender' ,trans('user.male'), 'male', ($user->gender == 'male') ? 'checked' : 1 )!!}
                                </div>

                                <div class="small-2 large-2 columns">

                                    {!! Form::radioField('gender' ,trans('user.female'), 'female', ($user->gender == 'female') ? 'checked' : null )!!}
                                </div>
                                <div class="small-5 large-4 columns">
                                    {!! Form::textField('first_name',trans('user.firstName'), null, ['autocomplete' => 'false']) !!}
                                </div>
                                <div class="small-5 large-4 columns">
                                    {!! Form::textField('last_name',trans('user.lastName'), null, ['autocomplete' => 'false']) !!}
                                </div>
                            </div>

                            {!! Form::textField('father_name',trans('user.fatherName'), null, ['autocomplete' => 'false']) !!}
                            {!! Form::textField('ssn',trans('user.nationalId'),null,['placeholder'=>'0011234560', 'maxlength' => 10, 'class' => 'ltr', 'autocomplete' => 'false']) !!}
                            <div>
                                <div class="large-3  columns">
                                    <label>{{trans('user.birthday')}}</label>
                                </div>
                                <div class="large-3  columns">
                                    {!! Form::textField('year', trans('user.year'), $year, ['placeholder'=>'1360', 'maxlength' => 4, 'class' => 'ltr']) !!}
                                </div>
                                <div class="large-3  columns">
                                    {!! Form::selectField('month', $month, trans('user.month'), $monthDay) !!}
                                </div>
                                <div class="large-3  columns">
                                    {!! Form::textField('day', trans('user.day'), $day, ['placeholder'=>'12', 'maxlength' => 2, 'class' => 'ltr']) !!}
                                </div>
                            </div>
                            {!! Form::textField('landline',trans('user.userLandLine'),null,['placeholder'=>'02188671000', 'maxlength' => 13, 'class' => 'ltr', 'autocomplete' => 'false']) !!}
                            {!! Form::textField('mobile',trans('user.userMobile'),null,['placeholder'=>'09121234567', 'maxlength' => 11, 'class' => 'ltr', 'autocomplete' => 'false']) !!}
                            {!! Form::textareaField('address',trans('user.userAddress'), null, ['placeholder'=>'نام شهر - خیابان اصلی - خیابان فرعی - کوچه - پلاک - زنگ']) !!}
                            {!! Form::textField('postal',trans('user.userPostal'),null,['placeholder'=>'1234567890', 'maxlength' => 11, 'autocomplete' => 'false']) !!}
                            {!! Form::submit(trans('user.nextStep'), ['class'=>'button radius small bg-blue']) !!}
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('css')

    {!! Theme::css(URL::asset('zarinpal-theme/css/persian-datepicker.min.css')) !!}

@endsection

@section('js')

    <script type="text/javascript">

        (function (e, t, n) {
            var r = e.querySelectorAll("html")[0];
            r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2")
        })(document, window, 0);

        'use strict';

        ;
        (function ($, window, document, undefined) {
            $('.inputfile').each(function () {
                var $input = $(this),
                        $label = $input.next('label'),
                        labelVal = $label.html();

                $input.on('change', function (e) {
                    var fileName = '';

                    if (this.files && this.files.length > 1)
                        fileName = ( this.getAttribute('data-multiple-caption') || '' ).replace('{count}', this.files.length);
                    else if (e.target.value)
                        fileName = e.target.value.split('\\').pop();

                    if (fileName)
                        $label.find('span').html(fileName);
                    else
                        $label.html(labelVal);
                });

                // Firefox bug fix
                $input
                        .on('focus', function () {
                            $input.addClass('has-focus');
                        })
                        .on('blur', function () {
                            $input.removeClass('has-focus');
                        });
            });
        })(jQuery, window, document);
    </script>

@endsection
