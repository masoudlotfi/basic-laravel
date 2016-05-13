<div id="skin-select" class="active">
    <div class="skin-part">
        <div id="tree-wrap">
            <div class="profile">
                <a href="{{URL::route('panel.dashboard.getIndex')}}" style="text-align:center;">
                    <h3><img alt="" class="" src="{{ URL::asset('zarinpal-theme/img/zarinpal-flat.svg') }}">
                        {{trans('sidebar.zarinpal')}}</h3>
                </a>
            </div>

            <!-- Menu sidebar panel begin-->
            <div class="side-bar">
                <ul id="menu-showhide" class="topnav slicknav">
                    <li>
                        <a class="tooltip-tip" href="{{URL::route('panel.dashboard.getIndex')}}"
                           title="{{trans('sidebar.dashboard')}}">
                            <i class="icon icon-screen-3"></i>
                            <span>{{trans('sidebar.dashboard')}}</span>
                        </a>
                    </li>
                    @if(Auth::user()->level >= 2)
                        <li>
                            <a href="{{URL::route('panel.webservice.getIndex')}}">
                                <i class="icon icon-server-3"></i>
                                <span>{{trans('sidebar.webservices')}}</span>
                            </a>
                        </li>
                        <li>
                            <a class="tooltip-tip" href="{{URL::route('panel.easypay.getIndex')}}">
                                <i class=" icon-money"></i>
                                <span>{{trans('easypay.easyPay')}}
                                    <small class="side-menu-noft">{{trans('sidebar.new')}}</small></span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->level >= 1 )
                        @if((new \App\Http\Controllers\Panel\ZarinCardController())->hasCard(Auth::user()))
                            <li>
                                <a class="tooltip-tip" href="#" title="{{trans('sidebar.zarincard')}}">
                                    <i class="icon icon-credit-card"></i>
                                    <span>{{trans('sidebar.zarincard')}}</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{URL::route('panel.zarincard.getStatement')}}"
                                           title="{{trans('sidebar.turnover')}}">{{trans('sidebar.turnover')}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{URL::route('panel.zarincard.getToShetab')}}"
                                           title="{{trans('sidebar.withdrawRequest')}}">{{trans('sidebar.withdrawRequest')}}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li>
                                <a class="tooltip-tip" href="{{URL::route('panel.zarincard.getRequest')}}"
                                   title="{{trans('sidebar.requestZarincard')}}">
                                    <i class="icon icon-credit-card"></i>
                                    <span>{{trans('sidebar.requestZarincard')}}</span>
                                </a>
                            </li>
                        @endif
                    @endif
                    @if(Auth::user()->level >= 2)
                        <li>
                            <a class="tooltip-tip" href="#">
                                <i class=" icon-transfer-4"></i>
                                <span>{{trans('sidebar.accounting')}}</span>
                            </a>
                            <ul>
                                <li>
                                <span>
                                    <a href="{{URL::route('panel.report.getIndex')}}"
                                       title="{{trans('sidebar.reportUser')}}">{{trans('sidebar.reportUser')}}
                                        <small class="noft"> ( {{trans('sidebar.new')}} ) </small>
                                    </a>
                                </span>

                                </li>

                                <li>
                                    <a href="{{URL::route('panel.card.getIndex')}}"
                                       title="{{trans('sidebar.cardList')}}">{{trans('sidebar.cardList')}}</a>
                                </li>
                                @if(Auth::user()->level != 0)
                                    <li>
                                        <a href="{{URL::route('panel.transaction.getTransferMoney')}}"
                                           title="{{trans('sidebar.moneyTransfer')}}">{{trans('sidebar.moneyTransfer')}}</a>
                                    </li>
                                @endif
                                @if(Auth::user()->hasRole('silvergold'))
                                    <li>
                                        <a href="{{URL::route('panel.transaction.getTransfer')}}"
                                           title="{{trans('sidebar.requestPony')}}">{{trans('sidebar.requestPony')}}</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    <li>
                        <a class="tooltip-tip" href="{{URL::route('panel.ticket.getIndex')}}"
                           title="{{trans('sidebar.ticket')}}">
                            <i class="icon icon-headphone"></i>
                            <span>{{trans('sidebar.ticket')}}
                                @if(ticketUnread() != 0)
                                <small class="side-menu-noft bg-blue show-for-large-up">
                                {{ticketUnread()}}
                                </small>
                                @endif
                            </span>
                        </a>
                    </li>

                    <li>
                        <a class="tooltip-tip" href="{{URL::route('panel.user.getReferredUsers')}}"
                           title="{{trans('sidebar.referredUsers')}}">
                            <i class="icon icon-headphone"></i>
                            <span>{{trans('sidebar.referredUsers')}}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@section('js_slide_panel')
    <script>

        var mainBlock = {};

        mainBlock.zarincard = {};
        mainBlock.zarincard.getStatement = {block: 4, active: 1};
        mainBlock.zarincard.getToShetab = {block: 4, active: 2};

        mainBlock.easypay = {};
        mainBlock.easypay.getIndex = {block: 3, active: 1};

        mainBlock.report = {};
        mainBlock.report.getIndex = {block: 5, active: 1};

        mainBlock.card = {};
        mainBlock.card.getIndex = {block: 5, active: 2};

        mainBlock.transaction = {};
        mainBlock.transaction.getTransferMoney = {block: 5, active: 3};
        mainBlock.transaction.getTransfer = {block: 5, active: 4};
        mainBlock.transaction.getIndex = {block: 0, active: 0};
        @if(\Illuminate\Support\Facades\Auth::user()->level == 0)
                mainBlock.ticket = 1;
        @endif
        if (typeof(mainBlock.{{explode('.', Route::getCurrentRoute()->getAction()['as'])[1]}}) != 'undefined') {
            $(document).ready(function () {
                $('#menu-showhide li:nth-child(' + mainBlock.{{explode('.', Route::getCurrentRoute()->getAction()['as'])[1]}}.{{explode('.', Route::getCurrentRoute()->getAction()['as'])[2]}}.block + ') ul').css({"display": "block"});
                $('#menu-showhide li:nth-child(' + mainBlock.{{explode('.', Route::getCurrentRoute()->getAction()['as'])[1]}}.{{explode('.', Route::getCurrentRoute()->getAction()['as'])[2]}}.block + ') a').first().attr('id', 'menu-select');
                $('#menu-showhide li:first-child a').removeAttr('id', 'menu-select');

            });
        } else {
            mainBlock.dashboard = 1;
            mainBlock.webservice = 2;
            mainBlock.ticket = 6;
            $('#menu-showhide li a').removeAttr('id', 'menu-select');
            $('#menu-showhide li:nth-child(' + mainBlock.{{explode('.', Route::getCurrentRoute()->getAction()['as'])[1]}}  + ') a').first().attr('id', 'menu-select');
        }
        $('ul#menu-showhide>li>a').click(function () {
            $('#menu-showhide a').removeAttr('id', 'menu-select');
            $(this).attr('id', 'menu-select');
        });

    </script>
@endsection
