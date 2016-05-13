<div class="top-bar-nest">
    <nav class="top-bar" data-topbar role="navigation" data-options="is_hover: false">
        <section class="top-bar-section ">
            <ul class="right show-for-large-up">
                <li class="has-dropdown notification-top-nav" id="notification-centre">
                    <a class="" href="#"><span id="notification-count" class="label edumix-msg-noft">0</span>&nbsp;<i
                                class="icon icon-alarm-1"></i></a>
                    <ul class="dropdown dropdown-nest">
                        <li class="top-dropdown-nest top-notification-background">
                            <span class="label round bg-blue-dark">{{trans('common.notification')}}</span>
                        </li>
                        <li>
                            <div class="slim-scroll" id="online-notification"></div>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Right Nav Section -->
            <div class="row">
                <div class="small-2 large-2 columns">
                    @if(Auth::user()->level == 0)
                        <a href="{{URL::route('panel.user.getUpdateInformation')}}"
                           class="label radius small bg-yellow text-dark-gray">
                            <i class="user-rview icon-upload-4"></i>
                            {{trans('sidebar.uploadDocument')}}
                        </a>
                    @endif
                </div>
                <div class="small-8 large-8 columns">

                    @if(Route::current()->getAction()['namespace'] == 'App\Http\Controllers\Panel')

                        <ul class="left">
                            <li class="has-dropdown tab-bar-mobile">
                                <a href="#">
                                    <span class="admin-pic-text text-gray">{{Auth::user()->name}}</span>
                                    <img class="admin-pic img-circle"
                                         src="//rokh.chehrak.com/{{md5(Auth::user()->email)}}?default=https://cdn.zarinpal.com/emails/img/zarinpal-email-profile-default.png&s=128">
                                </a>
                                <ul class="dropdown dropdown-nest profile-dropdown">

                                    @if( Auth::user()->hasRole( collect( [
                                    'admin',
                                    'superadmin',
                                     ] ) ) )
                                        <li>
                                            <i class="icon icon-crown-1"></i>
                                            <a href="{{URL::route('admin.getIndexAdmin')}}"
                                               title=""><h4>{{trans('sidebar.panelAdmin')}}<span
                                                            class="text-green fontello-record"></span></h4>
                                            </a>
                                        </li>
                                    @elseif(Auth::user()->hasRole( collect( [
                                         'supervisor',
                                         'operator',
                                         ] ) ) )
                                        <li>
                                            <i class="icon icon-crown-1"></i>
                                            <a href="{{URL::route('admin.ticket.getIndex')}}"
                                               title=""><h4>{{trans('sidebar.panelAdmin')}}<span
                                                            class="text-green fontello-record"></span></h4>
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <i class="icon icon-profile-1"></i>
                                        <a href="{{URL::route('panel.user.getEdit')}}"
                                           title=""><h4>{{trans('sidebar.userEdit')}}<span
                                                        class="text-green fontello-record"></span></h4>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="icon icon-phone-3"></i>
                                        <a href="{{URL::route('panel.user.getSmsSetting')}}"
                                           title="">
                                            <h4>{{trans('sidebar.notificationSettings')}}
                                                <span class="text-aqua fontello-record"></span></h4>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="icon icon-sync-2"></i>
                                        <a href="{{URL::route('panel.user.getChangePassword')}}"
                                           title="">
                                            <h4>{{trans('sidebar.changePass')}}
                                                <span class="text-aqua fontello-record"></span></h4>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="icon icon-log-out-1"></i>
                                        <a href="{{URL::route('auth.getLogout')}}">
                                            <h4>{{trans('sidebar.logout')}}<span
                                                        class="text-red fontello-record"></span></h4>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endif

                    @if(Route::current()->getAction()['namespace'] == 'App\Http\Controllers\Admin')

                        <ul class="left">
                            <li class=" has-dropdown">
                                <a href="#">
                                    <span class="admin-pic-text text-gray">{{Auth::user()->name}}</span>
                                    <img class="admin-pic img-circle"
                                         src="//rokh.chehrak.com/{{md5(strtolower(Auth::user()->email))}}?default=https://cdn.zarinpal.com/emails/img/zarinpal-email-profile-default.png">

                                </a>

                                <ul class="dropdown dropdown-nest profile-dropdown">
                                    <li>
                                        <i class="icon icon-profile-1"></i>
                                        <a href="{{URL::route('panel.dashboard.getIndex')}}"
                                           title="">
                                            <h4>{{trans('sidebar.panelUser')}}
                                                <span class="text-red fontello-record"></span>
                                            </h4>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="icon icon-phone-1"></i>
                                        <a href="{{URL::route('admin.user.getSignature')}}"
                                           title="">
                                            <h4>{{trans('sidebar.editSignature')}}
                                                <span class="text-red fontello-record"></span>
                                            </h4>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="icon icon-log-out-1"></i>
                                        <a href="{{URL::route('auth.getLogout')}}">
                                            <h4>{{trans('sidebar.logout')}}
                                                <span
                                                        class="text-red fontello-record">

                                                </span>
                                            </h4>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        </section>
    </nav>
</div>
