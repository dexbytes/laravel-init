<div class="sidebar" data-color="blue" data-image="{{ asset('img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/" class="simple-text logo-mini">
                {{setting('app_sort_name', config('app.name_sort', 'Laravel') )}}
            </a>
            <a href="/" class="simple-text logo-normal">
                {{setting('app_name', config('app.name', 'Laravel') )}}
            </a>
        </div>
 
        <ul class="nav">
            <li class="nav-item @if(!empty($activePage) && $activePage == 'dashboard') active @endif">
                <a class="nav-link" href={{ route('home') }}>
                    <i class="fa fa-tachometer"></i>
                    <p>{{ __('application.Dashboard') }}</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#navusers" @if(!empty($activeButton) &&  $activeButton =='users') aria-expanded="true" @endif>
                    <i class="fa fa-users"></i>
                    <p>
                        {{ __('application.Users') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse  @if(!empty($activeButton) && $activeButton =='users') show @endif" id="navusers">
                    <ul class="nav">
 
                       
                            <li class="nav-item @if(!empty($activePage) && $activePage == 'users') active @endif">
                                <a class="nav-link" href="{{ route('users.index') }}">
                                    <span class="sidebar-mini">{{ __('UR') }}</span>
                                    <span class="sidebar-normal">{{ __('User') }}</span>
                                </a>
                            </li>
                       
                            <li class="nav-item @if(!empty($activePage) &&  $activePage == 'roles') active @endif">
                                <a class="nav-link" href="{{ route('roles.index') }}">
                                    <span class="sidebar-mini">{{ __('RS') }}</span>
                                    <span class="sidebar-normal">{{ __('Roles') }}</span>
                                </a>
                            </li>
                       
                    </ul>
                </div>
            </li>
 
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#navsettings" @if(!empty($activeButton) &&  $activeButton =='settings') aria-expanded="true" @endif>
                    <i class="fa fa-cog"></i>
                    <p>
                        {{ __('application.Settings') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse  @if(!empty($activeButton) && $activeButton =='settings') show @endif" id="navsettings">
                    <ul class="nav">                       
                            <li class="nav-item @if(!empty($activePage) && $activePage == 'general') active @endif">
                                <a class="nav-link" href="{{ route('settings.general') }}">
                                    <span class="sidebar-mini">{{ __('GN') }}</span>
                                    <span class="sidebar-normal">{{ __('application.General') }}</span>
                                </a>
                            </li>
                       
                            <li class="nav-item @if(!empty($activePage) &&  $activePage == 'apikey') active @endif">
                                <a class="nav-link" href="{{ route('settings.index') }}">
                                    <span class="sidebar-mini">{{ __('AK') }}</span>
                                    <span class="sidebar-normal">{{ __('application.Api Keys') }}</span>
                                </a>
                            </li>

                            <li class="nav-item @if(!empty($activePage) &&  $activePage == 'configuration') active @endif">
                                <a class="nav-link" href="{{ route('configuration.index') }}">
                                    <span class="sidebar-mini">{{ __('CG') }}</span>
                                    <span class="sidebar-normal">{{ __('application.Configuration') }}</span>
                                </a>
                            </li>
                          
                            <li class="nav-item @if(!empty($activePage) &&  $activePage == 'push') active @endif">
                                <a class="nav-link" href="#">
                                    <span class="sidebar-mini">{{ __('EM') }}</span>
                                    <span class="sidebar-normal">{{ __('application.Email') }}</span>
                                </a>
                            </li>

                            <li class="nav-item @if(!empty($activePage) &&  $activePage == 'push') active @endif">
                                <a class="nav-link" href="#">
                                    <span class="sidebar-mini">{{ __('NT') }}</span>
                                    <span class="sidebar-normal">{{ __('application.Notifications') }}</span>
                                </a>
                            </li>

                            <li class="nav-item @if(!empty($activePage) &&  $activePage == 'translation') active @endif">
                                <a class="nav-link" href="{{ route('translation.index') }}">
                                    <span class="sidebar-mini">{{ __('TN') }}</span>
                                    <span class="sidebar-normal">{{ __('application.Translations') }}</span>
                                </a>
                            </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>