@extends('app')
@section('content')
    <div class="row">
        <div class="large-12 row">
            <div class="box  ">
                <!-- /.box-header -->
                <div class="box-header bg-transparent">
                    <h6 class="box-title"><i class="icon-menu"></i>
                           <span class="text-right">
                            {{trans('common.account')}}
                        </span>
                    </h6>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="large-12 row">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-header bg-transparent columns">
                    <div class="large-12 columns">
                        <div class="large-2 medium-2 small-2 columns show-for-medium-up">
                            <img class="user-pic img-circle right"
                                 src="//rokh.chehrak.com/{{md5(Auth::user()->email)}}?default={{urlencode('https://cdn.zarinpal.com/emails/img/zarinpal-email-profile-default.png')}}&size=64">
                        </div>
                        <div class="large-10 medium-10 small-12 columns">
                            <div class="clear"> {{ $user->name }}</div>
                            <div class="margin-right large-10 medium-10 small-10">{{trans('common.zarinpalId')}}: <span
                                        class=""> ZP.{{ $user->public_id }} </span></div>
                            <div class="right radius bg-yellow text-dark-gray"> {{trans('user.user_level_' . $user->level)}}</div>
                        </div>

                    </div>
                    <div class="large-12">
                        <h6 class="box-title"><i class="icon-menu"></i>
                           <span class="text-right">
                            {{trans('common.purses')}}
                        </span>
                        </h6>

                        <div class="left">
                            <button id="UpdateBalance" class="button tiny icon icon-refresh radius"></button>
                        </div>
                        @if($latestPurse->purse < 5)
                            <div class="left" style="margin-left: 10px;">
                                <a href="{{URL::route('panel.purse.getCreate')}}">
                                    <button class="button tiny icon radius">
                                        {{trans('purse.create')}}
                                    </button>
                                </a>
                            </div>
                        @endif
                    </div>

                </div>

                <div style="margin:15px 0 0" class="box-body">

                    <div class="stats-wrap">
                        <div class="row">
                            @foreach($purses as $purse)
                                <div id="firstModal{{$purse->purse}}" class="reveal-modal" data-reveal>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="small-12 large-12 columns">
                                                <fieldset>
                                                    <legend>
                                                        <i class="icon-alert-3"></i> {{trans('transaction.warning')}}
                                                    </legend>
                                                    {!! nl2br(trans('transaction.addFunds')) !!}
                                                </fieldset>
                                            </div>
                                            <div class="large-6 large-centered columns">
                                                {!! Form::open(array('route' => ['panel.purse.postAddFunds', $purse->_id]))!!}
                                                <div class="row collapse">
                                                    <div class="small-8 columns">
                                                        {!! Form::textField('amount', trans('purse.amount'), null, ['id' => 'pan', 'class' => 'ltr', 'autocomplete' => 'false']) !!}
                                                        {{--{!! Form::hidden('purse', $purse->_id) !!}--}}

                                                    </div>
                                                    <div class="small-4 columns">
                                                        <br/>
                                                        {!! Form::submit(trans('purse.addFunds'), ['class'=>'button postfix']) !!}
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                    <a class="close-reveal-modal">&#215;</a>
                                </div>
                            @endforeach

                            <div class="clearfix margin-center"></div>
                            @foreach($purses as $purse)
                                <div class="large-2 medium-2 small-4 end columns">


                                    <div class="bg-complete-profile">
                                        <a title="{{trans('purse.showTransaction')}}"
                                           href="{!! URL::route('panel.transaction.getIndex', [$purse->purse]) !!}">
                                            <span class="bg-yellow icon-wallet-3"></span>
                                        </a>
                                        <!--   <img src="img/bag.png"> -->
                                        @if($purse->purse != 1 && $purse->purse != 99)
                                            <a title="{{trans('purse.editName')}}"
                                               href="{!! URL::route('panel.purse.getEdit', [$purse->purse]) !!}">
                                                <h6 class="bg-white text-black">
                                                    <i class="icon icon-pen-4"></i>
                                                    <strong>
                                                        {{$purse->name}}
                                                    </strong>
                                                </h6>
                                            </a>
                                        @else
                                            <h6 class="bg-white text-black">
                                                <strong>{{$purse->name}}</strong>
                                            </h6>
                                        @endif

                                        <h6 class="bg-black text-white" style="font-size: 11px">
                                            ZP.{{$purse->User->public_id}}.{{$purse->purse}}

                                        </h6>
                                        <a data-reveal-id="firstModal{{$purse->purse}}"
                                           id="addFunds{{$purse->purse}}"
                                           title="{{trans('purse.addFundsPurse')}}"
                                           href="#">
                                            <h6 style="background-color: #4d4d4d; color : #FDC645">
                                                {{trans('purse.addFundsPurse')}}
                                            </h6>
                                        </a>
                                        <a title="{{trans('purse.showTransaction')}}"
                                           href="{!! URL::route('panel.transaction.getIndex', [$purse->purse]) !!}">
                                            <h6 class="bg-white text-black">
                                                {{trans('common.balance')}}
                                                <strong id="BalanceForPurse-{{ $purse->purse }}">{{number_format($purse->balance)}}</strong>
                                            </h6>
                                        </a>
                                        <a title="{{trans('purse.inCome')}} "
                                           href="{!! URL::route('panel.transaction.getIndex', [$purse->purse, 'billType' => 1]) !!}">
                                            <h6>{{trans('purse.inCome')}} {{$purseDetails[$purse->_id]['positive']}}</h6>
                                        </a>
                                        <a title="{{trans('purse.outCome')}}"
                                           href="{!! URL::route('panel.transaction.getIndex', [$purse->purse, 'billType' => -1]) !!}">
                                            <h6>{{trans('purse.outCome')}} {{$purseDetails[$purse->_id]['negative']}}</h6>
                                        </a>
                                        <a title="{{trans('purse.withdraw')}}"
                                           href="{!! URL::route('panel.transaction.getIndex', [$purse->purse, 'billType' => -2]) !!}">
                                            <h6>{{trans('purse.withdraw')}} {{$purseDetails[$purse->_id]['withdraw']}}</h6>
                                        </a>

                                    </div>
                                    </a>

                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="large-12 medium-12 small-12 box columns">
            <div class="box-header bg-transparent">
                <h6 class="box-title"><i class="icon-menu"></i>
                           <span class="text-right">
                           {{trans('dash.transactionAmountLastTenDay')}}
                        </span>
                </h6>
            </div>
            <div class="box-body">
                <div class="row collapse">
                    <div class="large-1 medium-2 small-3 columns text-size-10">
                        <label style="line-height: 31px">{{trans('purse.purse')}}</label>
                    </div>
                    <div class="large-10 medium-8 small-8 columns">
                        {!! Form::selectField('purses', $purses->pluck('name','purse'), false, 1, [
                            'id'=>'purses_stats',
                            'choose'=>false,
                        ]) !!}
                    </div>
                    <div class="large-1 medium-1 small-1 columns">
                        <i id="refreshTransactionsList" class="radius button tiny icon icon-refresh"></i>
                    </div>
                </div>

                <div class="row">
                    <div class="large-5 columns">
                        <div class="box bg-transparent">
                            <div style="margin:0 0 0" class="box-body no-pad">
                                <table id="lastTenTransaction" class="rwd-table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">{{trans('transaction.docNo')}}</th>
                                        <th class="text-center">{{trans('common.amount')}}</th>
                                        <th class="text-center">{{trans('transaction.date')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.box -->
                    <div class="large-7 columns">
                        <div class="box bg-transparent ">
                            <div style="margin:0 0 0" class="box-body no-pad">
                                <div id="transactionChart" style="width:100%; height:400px;"></div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

@section('css')

    {!! Theme::css(URL::asset('zarinpal-theme/css/dashboard.css')) !!}
    {!! Theme::css(URL::asset('zarinpal-theme/amcharts/style.css')) !!}

@endsection

@section('js')

    {!! Theme::js(URL::asset('zarinpal-theme/amcharts/amcharts.js')) !!}
    {!! Theme::js(URL::asset('zarinpal-theme/amcharts/serial.js')) !!}

    <script type="text/javascript">
        @if(!empty($errors->all()))
            $(document).ready(function () {
            $("#addFunds{{Input::old('purse')}}").trigger("click");
        });
                @endif
        var chart;
        AmCharts.ready(function () {
            // SERIAL CHART
            chart = new AmCharts.AmSerialChart();

            chart.marginLeft = 10;
            chart.categoryField = "date";
            chart.dataDateFormat = "MM-dd";

            // AXES
            // category
            var categoryAxis = chart.categoryAxis;
            //categoryAxis.parseDates = true; // as our data is date-based, we set parseDates to true
            //categoryAxis.minPeriod = "dd"; // our data is yearly, so we set minPeriod to dd
            categoryAxis.dashLength = 8;
            // categoryAxis.minorGridEnabled = true;
            //categoryAxis.minorGridAlpha = 0.1;

            // value
            var valueAxis = new AmCharts.ValueAxis();
            valueAxis.axisAlpha = 0;
            valueAxis.inside = true;
            valueAxis.dashLength = 3;
            chart.addValueAxis(valueAxis);


            chart.addGraph(addLine("outgoing", "#e74c3c", "{{ trans('common.outgoing') }}"));
            chart.addGraph(addLine("incoming", "#40d47e", "{{ trans('common.incoming') }}"));

            chart.creditsPosition = "bottom-right";
            chart.dataProvider = [];
            chart.write("transactionChart");
            write();

        });

        //write ajax data
        function write(purse) {
            if (purse == undefined || purse == '') {
                purse = 1;
            }
            chart.removeLegend();
            $.get("/panel/dashboard/transactionStatistics/" + purse + ".json", function (data) {
                chart.dataProvider = data.chart;
                chart.validateData();
                $('#lastTenTransaction tbody').html('');
                data.lastTen.forEach(function (item) {
                    var icon;
                    if (item.amount > 0 && item.confirmed == 2) {
                        icon = '<i class="icon icon-arrow-1-1 text-orange"></i>';
                    } else if (item.amount > 0) {
                        icon = '<i class="positive icon-arrow-15 text-green"></i>';
                    } else {
                        icon = '<i class="icon icon-arrow-16 text-red"></i>';
                    }
                    $('#lastTenTransaction tbody').append('<tr>' +
                            '<td data-th="{{trans('transaction.docNo')}}" class="text-center text-mobile-right"><a href="' + item.id.url + '" class="text-black">' + item.id.number + '</a></td>' +
                            '<td data-th="{{trans('common.amount')}}" class="text-center text-mobile-right">' + icon + new Intl.NumberFormat().format(item.amount) + '</td>' +
                            '<td data-th="{{trans('transaction.date')}}" class="text-center text-mobile-right" title="&lrm;' + item.created_at + '">' + item.date + '</td>' +
                            '</tr>'
                    )
                    ;
                });

            }, "json");
        }
        //write ajax data
        $('#UpdateBalance').click(function () {
            $.get("/panel/dashboard/UpdateBalance.json", function (data) {
                data.forEach(function (item) {
                    $('#BalanceForPurse-' + item.purse).html(item.balance);
                });
            }, "json");
        });


        $('#purses_stats').change(function () {
            write($(this).val());
        });

        $('#refreshTransactionsList').click(function () {
            write($('#purses_stats').val());
        });

        function addLine(field, lineColor, label) {
            // GRAPH
            graph = new AmCharts.AmGraph();
            graph.type = "line"; // this line makes the graph smoothed line.
            graph.negativeLineColor = "#3498db"; // this line makes the graph to change color when it drops below 0
            graph.bulletBorderColor = "#FFFFFF";
            graph.bullet = "round";
            graph.bulletSize = 8;
            graph.bulletBorderAlpha = 1;
            graph.bulletBorderThickness = 2;
            graph.lineThickness = 2;

            //incoming
            graph.lineColor = lineColor;
            graph.lineColorField = lineColor;
            graph.fillAlphas = .2;
            graph.valueField = field;
            graph.balloonText = "[[category]]<br><b><span style='font-size:14px;'>"
                    + label +
                    ":[[value]]</span></b>";
            return graph;
        }
    </script>

@endsection
