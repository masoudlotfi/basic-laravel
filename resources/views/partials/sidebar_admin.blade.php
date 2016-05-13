<div id="skin-select" class="active">
    <div class="skin-part">
        <div id="tree-wrap">
            <div class="profile">
                <a href="{{URL::route('panel.dashboard.getIndex')}}">
                    <h3><img alt="" class="" src="{{ URL::asset('zarinpal-theme/img/zarinpal-flat.svg') }}">
                        {{trans('sidebar.zarinpal')}}</h3>
                </a>
            </div>

            <!-- Menu sidebar admin begin-->
            <div class="side-bar">
                <ul id="menu-showhide" class="topnav slicknav">
                    @if(Auth::user()->hasRole(collect([
                    'admin',
                    'superadmin',
                    ])))
                        <li>
                            <a id="menu-select" class="tooltip-tip" href="{{URL::route('admin.getIndexAdmin')}}"
                               title="{{trans('sidebar.dashboard')}}">
                                <i class="icon icon-screen-3"></i>
                                <span>{{trans('sidebar.dashboard')}}</span>
                            </a>
                        </li>
                        <li>
                            <a class="tooltip-tip" href="{{URL::route('admin.accounting.index')}}"
                               title="{{trans('sidebar.pendingExits')}}">
                                <i class="icon icon-pulse-graph-3"></i>
                                <span>{{trans('sidebar.pendingExits')}}</span>
                            </a>
                        </li>
                    @endif

                    @if(Auth::user()->hasRole(collect([
                                   'superadmin','accounting','operator'
                                   ])
                               ))
                        <li>
                            <a class="tooltip-tip" href="{{URL::route('admin.zarincard.create')}}"
                               title="{{trans('sidebar.zarincard')}}">
                                <i class="icon icon-credit-card"></i>
                                <span>{{trans('sidebar.zarincard')}}</span>
                            </a>
                        </li>
                        <li>
                            <a class="tooltip-tip" href="{{URL::route('admin.transaction.audit')}}"
                               title="{{trans('transaction.audit')}}">
                                <i class="icon icon-binocular"></i>
                                <span>{{trans('transaction.audit')}}</span>
                            </a>
                        </li>
                    @endif

                    <li>
                        <a class="tooltip-tip" href="{{URL::route('admin.transaction.index')}}"
                           title="{{trans('sidebar.transactionIndex')}}">
                            <i class=" icon-transfer-4"></i>
                            <span>{{trans('sidebar.transactionIndex')}}</span>
                        </a>

                    </li>
                    <li>
                        <a class="tooltip-tip" href="{{URL::route('admin.webservice.getIndex')}}"
                           title="{{trans('sidebar.webservices')}}">
                            <i class="icon icon-server-3"></i>
                               <span> {{trans('sidebar.webservices')}}
                               </span>
                        </a>
                    </li>
                    <li>
                        <a class="tooltip-tip" href="#" title="{{trans('sidebar.report')}}">
                            <i class="icon icon-chart-up"></i>
                            <span>{{trans('sidebar.report')}}</span>
                        </a>
                        <ul>
                            @if(Auth::user()->hasRole(collect([
                            'admin',
                            'superadmin'
                            ])))
                                <li>
                                    <a href="{{URL::route('admin.report.getAccounting')}}"
                                       title="{{trans('title.admin.report.getAccounting')}}">{{trans('title.admin.report.getAccounting')}}
                                    </a>
                                </li>
                            @endif
                            @if(Auth::user()->hasRole(collect([
                                'admin',
                                'superadmin',
                                'supervisor'
                            ])))
                                <li>
                                    <a href="{{URL::route('admin.report.marketing.getIndex')}}"
                                       title="{{trans('title.admin.report.getMarketing')}}">{{trans('title.admin.report.getMarketing')}}
                                    </a>
                                </li>
                            @endif
                            @if(Auth::user()->hasRole(collect([
                            'admin',
                            'superadmin',
                            'operator',
                            'supervisor'
                            ])))
                                <li>
                                    <a href="{{URL::route('admin.report.support.getIndex')}}"
                                       title="{{trans('title.admin.report.support.getIndex')}}">{{trans('title.admin.report.support.getIndex')}}
                                    </a>
                                </li>
                            @endif
                            @if(Auth::user()->hasRole(collect([
                            'admin',
                            'superadmin',
                            'supervisor'
                            ])))
                                <li>
                                    <a href="{{URL::route('admin.report.support.getMonitor')}}"
                                       title="{{trans('title.admin.report.support.getMonitor')}}">{{trans('title.admin.report.support.getMonitor')}}
                                    </a>
                                </li>
                            @endif
                            @if(Auth::user()->hasRole(collect([
                            'admin',
                            'superadmin'
                            ])))
                                <li>
                                    <a href="{{URL::route('admin.report.getGenerate')}}"
                                       title="{{trans('title.admin.report.getGenerate')}}">{{trans('title.admin.report.getGenerate')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{URL::route('admin.report.bankReport')}}"
                                       title="{{trans('title.admin.report.bankReport')}}">{{trans('title.admin.report.bankReport')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{URL::route('admin.report.getLeaderBoard')}}"
                                       title="{{trans('title.admin.report.leaderBoard')}}">{{trans('title.admin.report.getLeaderBoard')}}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>

                    @if(!Auth::user()->hasRole('gov'))
                        <li>
                            <a class="tooltip-tip" href="{{URL::route('admin.user.getIndex')}}"
                               title="{{trans('sidebar.listUsers')}}">
                                <i class="icon icon-connection-2"></i>
                                <span>{{trans('sidebar.listUsers')}}</span>
                            </a>
                        </li>

                        <li>
                            <a class="tooltip-tip" href="{{URL::route('admin.ticket.getIndex')}}"
                               title="{{trans('sidebar.ticketList')}}">
                                <i class="icon icon-headphone"></i>
                           <span>{{trans('sidebar.ticketList')}}
                               {{--@if(ticketPending() != 0)--}}
                               {{--<small class="side-menu-noft bg-blue">--}}
                               {{--{{ticketPending()}}--}}
                               {{--</small>--}}
                               {{--@endif--}}
                           </span>
                            </a>
                        </li>

                        <li>
                            <a class="tooltip-tip" href="{{URL::route('admin.card.getIndex')}}"
                               title="{{trans('sidebar.cardList')}}">
                                <i class="icon icon-dollar-bag"></i>
                           <span>
                               <span>{{trans('sidebar.cardAdminList')}}</span>
                               {{--@if(numberCards() != 0)--}}
                               {{--<small class="side-menu-noft bg-blue">--}}
                               {{--{{numberCards()}}--}}
                               {{--</small>--}}
                               {{--@endif--}}
                           </span>
                            </a>
                        </li>
                    @endif

                    <li>
                        <a class="tooltip-tip" href="{{URL::route('admin.transactionSession.getIndex')}}"
                           title="{{trans('breadcrumbs.transactionSession')}}">
                            <i class="icon-bank-1"></i>
                            <span>{{trans('breadcrumbs.transactionSession')}}</span>
                        </a>
                    </li>
                    @if(Auth::user()->hasRole(collect([
                        'admin',
                        'superadmin'
                        ])))
                        <li>
                            <a class="tooltip-tip" href="{{URL::route('admin.api.client.getIndex')}}"
                               title="API">
                                <i class="icon icon-server-3"></i>
                                <span> API</span>
                            </a>
                        </li>
                        <li>
                            <a class="tooltip-tip" href="{{URL::route('admin.report.getPostSpork')}}"
                               title="Postspork">
                                <i class="icon icon-server-3"></i>
                                <span> Postspork</span>
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </div>
</div>
{{--@section('js_slide_admin')--}}
{{--<script>--}}
{{--@if(!Auth::user()->hasRole('gov'))--}}
{{--var mainBlock = {};--}}
{{--mainBlock.getIndexAdmin = 1;--}}
{{--        {{dd(Route::getCurrentRoute()->getAction()['as'])}}--}}

{{--@if (Route::getCurrentRoute()->getAction()['as'] == 'admin.transaction.audit')--}}
{{--mainBlock.transaction = 8;--}}
{{--@else--}}
{{--mainBlock.transaction = 2;--}}
{{--@endif--}}
{{--mainBlock.user = 3;--}}
{{--mainBlock.ticket = 4;--}}
{{--mainBlock.card = 5;--}}
{{--mainBlock.webservice = 6;--}}
{{--mainBlock.zarincard = 7;--}}
{{--mainBlock.transactionSession = 9;--}}
{{--@else--}}
{{--var mainBlock = {};--}}

{{--mainBlock.transaction = 1;--}}
{{--mainBlock.transactionSession = 2;--}}
{{--@endif--}}
{{--@if(Auth::user()->hasRole(collect([--}}
{{--'supervisor',--}}
{{--'operator',--}}
{{--])))--}}
{{--var mainBlock = {};--}}
{{--mainBlock.transaction = 1;--}}
{{--mainBlock.user = 2;--}}
{{--mainBlock.ticket = 3;--}}
{{--mainBlock.card = 4;--}}
{{--mainBlock.webservice = 5;--}}
{{--mainBlock.transactionSession = 6;--}}

{{--@endif--}}

{{--$('#menu-showhide li a').removeAttr('id', 'menu-select');--}}
{{--$('#menu-showhide li:nth-child(' + mainBlock.{{explode('.', Route::getCurrentRoute()->getAction()['as'])[1]}}   + ') a').first().attr('id', 'menu-select');--}}
{{--</script>--}}
{{--@endsection--}}
