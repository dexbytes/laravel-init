<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">
    <div class="container">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">{{setting('app_name', config('app.name', 'Laravel') )}}</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbar">
            <ul class="navbar-nav">
               @if(config('dex.enableRegister'))
                <li class="nav-item @if(!empty($activePage) && $activePage == 'register') active @endif">
                    <a href="{{ route('register') }}" class="nav-link">
                        <i class="nc-icon nc-badge"></i> {{ __('auth.register') }}
                    </a>
                </li>
               
                <li class="nav-item @if(!empty($activePage) && $activePage == 'login') active @endif">
                    <a href="{{ route('login') }}" class="nav-link">
                        <i class="nc-icon nc-mobile"></i> {{ __('auth.login') }}
                    </a>
                </li>
                @endif
                @php $locale = session()->get('locale'); 
                    if(empty($locale)) $locale = config('app.locale');
                    $activeLang =  \App\Dexlib\Locale::getActiveLang();
                @endphp
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{$activeLang[$locale]}}
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @foreach($activeLang as $key => $value)
                            <a class="dropdown-item" href="/lang/{{$key}}">{{  $value }}</a>
                        @endforeach 
                    </div>
                </li> 

                                
            </ul>
        </div>
    </div>
</nav>