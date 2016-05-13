@extends('app')

@section('content')
    <div class="row">
        <div class="large-12 columns">
            <div class="box">
                <div class="box-header bg-transparent">
                    <h3 class="box-title">
                        <i class="icon-menu"></i>
                        <span>{{trans('user.upload')}}</span>
                    </h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="large-6 large-centered columns">

                            {!! Form::model($user,['route' => ['panel.user.postUploadDocument'],'files'=>true]) !!}
                                    <!-- <div class="box"> -->
                            <input type="file" name="id_card_file" id="id_card_file" class="inputfile inputfile-6"/>
                            <label for="id_card_file">
                                <strong></svg> {{trans('user.idCardFile')}}</strong>
                                <span>{{trans('user.updateDocsNote')}}</span>
                            </label>
                            @if ($errors->has('id_card_file'))
                                <small class="error">{{ $errors->first('id_card_file') }}</small>
                                @endif
                                        <!-- </div> -->
                                <!-- <div class="box"> -->
                                <input type="file" name="national_card_file" id="national_card_file"
                                       class="inputfile inputfile-6"/>
                                <label for="national_card_file">
                                    <strong></svg> {{trans('user.nationalIdFile')}}</strong>
                                    <span>{{trans('user.updateDocsNote')}}</span>
                                </label>
                                @if ($errors->has('national_card_file'))
                                    <small class="error">{{ $errors->first('national_card_file') }}</small>
                                    @endif
                                            <!-- </div> -->
                                    <!-- <div class="box"> -->
                                    <label>{{trans('user.introductionFileNote')}}</label>
                                    <input type="file" name="introduction_file" id="introduction_file"
                                           class="inputfile inputfile-6"/>
                                    <label for="introduction_file">
                                        <strong></svg> {{trans('user.introductionFile')}}</strong>
                                        <span>{{trans('user.updateDocsNote')}}</span>
                                    </label>
                                    @if ($errors->has('introductionFile'))
                                        <small class="error">{{ $errors->first('introductionFile') }}</small>
                                        @endif
                                    <!-- </div> -->
                                    {!! Form::submit(trans('user.updateDocs'), ['class'=>'button radius small bg-blue']) !!}
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
