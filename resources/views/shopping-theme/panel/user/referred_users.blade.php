@extends('app')

@section('content')
    <div class="row">
        <div class="large-12 columns">
            <div class="box">
                <div class="box-header bg-transparent" style="margin-top: 15px; margin-bottom: 15px;">
                    <div class="left large-5">
                        <div class="row collapse">
                            <div class="small-11 columns">
                                <input readonly type="text"
                                       class="text-center wbtn"
                                       id="webservice-id-1"
                                       value="https://www.zarinpal.com/auth/register?referrer={{base64_encode($user->email)}}"
                                       oncontextmenu="this.select()"
                                       onclick="this.select()"/></div>
                            <div class="small-1 columns">
                                <button data-copytarget="#webservice-id-1}}"
                                        class="button postfix wbtn">
                                    <d data-copytarget="#webservice-id-1"
                                       class="icon icon-clipboard-3" style="line-height: 3em"></d>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="large-7">
                        <label style="padding: 10px;">
                            {{--<i class="icon-menu"></i>--}}
                            {{trans('user.affiliate')}}</label>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <table class="table">
                            <tr>
                                <th>{{trans('user.zpId')}}</th>
                                <th>{{trans('user.name')}}</th>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>ZP.{{$user->public_id}}</td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                {!! $users->render() !!}
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        (function () {

            'use strict';

            document.body.addEventListener('click', copy, true);
            function copy(e) {
                var
                        t = e.target,
                        c = t.dataset.copytarget,
                        inp = (c ? document.querySelector(c) : null);

                if (inp && inp.select) {

                    inp.select();

                    try {
                        document.execCommand('copy');
                        inp.blur();
                        t.classList.add('copied');
                        setTimeout(function () {
                            t.classList.remove('copied');
                        }, 500);
                    }
                    catch (err) {
                        alert('Please press Ctrl/Cmd+C to copy');
                    }

                }

            }

        })();
    </script>
@endsection