<div class="navbar-area active">
    <div class="main-responsive-nav">
        <div class="container">
            <div class="main-responsive-menu">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset($setting->logo) }}" alt="Swar">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main-navbar">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset($setting->logo) }}" alt="Swar">
                    </a>
                </div>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="{{ url('/') }}"
                                class="nav-link {{ Request::is('/') || Request::is('home') ? 'active' : '' }}">{{ __('lang.home') }}</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('front.services') }}"
                                class="nav-link {{ Request::is('services*') ? 'active' : '' }}">{{ __('lang.services') }}</a></li>
                        <li class="nav-item"><a href="{{ route('front.about') }}"
                                class="nav-link {{ Request::is('about*') ? 'active' : '' }}"> {{ __('lang.about_us') }} </a></li>
                        {{-- <li class="nav-item"><a href="#"
                                class="nav-link {{ Request::is('products*') ? 'active' : '' }}">{{ __('lang.testiomnals') }}</a></li> --}}
                        <li class="nav-item"><a href="{{ route('front.blogs') }}"
                                class="nav-link {{ Request::is('blogs*') ? 'active' : '' }}">{{ __('lang.blogs') }}</a></li>
                        <li class="nav-item"><a href="{{ route('front.contact') }}"
                                class="nav-link {{ Request::is('contact') ? 'active' : '' }}">{{ __('lang.contact_us') }}</a></li>
                    </ul>

                </div>
                <div class="">
                    <ul class="top-left text-right">
                        <div class="dropdown">
                            <button class="btn bg-transparent text-white dropdown-toggle" type="button" data-toggle="dropdown"
                                aria-expanded="false">
                                <span class="text-white">       {{ App::getLocale() == 'en' ?'English' : 'العربية' }} </span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('front.lang') }}?lang=en">
                                    <i>English</i>
                                </a>
                                <a class="dropdown-item" href="{{ route('front.lang') }}?lang=ar">
                                    <i>العربية</i>
                                </a>
                            </div>
                        </div>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

</div>
