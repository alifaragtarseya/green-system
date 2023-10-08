@php
    $admin = auth('admin')->user();
    $countMessages = \App\Models\Messages::where('service_id', null)->where('view', 0)->count();
    $countRequests = \App\Models\Messages::where('service_id', '!=', null)->where('view', 0)->count();
@endphp
@php $dir = app()->getLocale() == 'ar' ? 'rtl' : 'ltr'; @endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" direction="{{ $dir }}" dir="{{ $dir }}">
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Mentora Studio" name="author"/>
    <link rel="shortcut icon" href="{{ asset($setting->favicon) }}" />
    <meta name="_token" content="{{ csrf_token() }}">
    <link href="{{ asset('admin/assets') }}/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets') }}/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admin/assets') }}/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets') }}/global/plugins/bootstrap-select/css/bootstrap-select-rtl.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets') }}/global/css/components-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ asset('admin/assets') }}/global/css/plugins-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets') }}/pages/css/profile-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets') }}/layouts/layout4/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('admin/assets') }}/layouts/layout4/css/themes/default-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" /> --}}
    <link href="{{ asset('admin/assets') }}/layouts/layout4/css/themes/default-rtl2.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ asset('admin/assets') }}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets') }}/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    @yield('css')
    <link href="{{ asset('admin/assets') }}/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo ">
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="{{ url('dashboard/home') }}">
                <img src="{{ asset($setting->logo) }}" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler">
            </div>
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <div class="page-top">
            <div class="top-menu">
                    @if (App::getLocale() != 'en')
                        <a class="nav navbar-nav pull-left" href="{{route('dashboard.lang')}}?lang=en" style="padding: 25px;color:#fff;width:20px">
                            <i class="icon-globe"></i>
                        </a>
                    @else
                        <a class="nav navbar-nav pull-left" href="{{ route('dashboard.lang')}}?lang=ar" style="padding: 25px;color:#fff;width:20px">
                            <i class="icon-globe"></i>
                        </a>
                    @endif
                <ul class="nav navbar-nav pull-right">

                    <li class="separator hide"> </li>
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile"> {{ $admin->username }} </span>
                            <img class="img-circle" src="{{ $admin->image ? asset(auth('admin')->user()->image) : asset('images/user.png') }}">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{ url('dashboard/profile') }}">
                                    <i class="icon-user"></i>{{ __('lang.profile') }}
                                </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="{{ url('dashboard/logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    <i class="icon-key"></i>  {{ __('lang.logout') }}
                                </a>
                                <form id="logout-form" action="{{ url('dashboard/logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"> </div>
<div class="page-container">
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="nav-item start {{ Request::is('dashboard/home') || Request::is('dashboard') ? 'active open' : '' }}">
                    <a href="{{ route('dashboard') }}" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">{{ __('lang.dashboard') }}</span>
                    </a>
                </li>
                {{-- Start Slider Link --}}
                <li class="nav-item {{ Request::routeIs('dashboard.slider*') ? 'active open' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-info"></i>
                        <span class="title"> {{ __('lang.home') }}</span>
                        <span class="arrow {{ Request::routeIs('dashboard.slider*') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ Request::is('dashboard/slider') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.slider') }}" class="nav-link">
                                <span class="title">{{ __('lang.slider') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{  Request::routeIs('dashboard.slider.meta') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.slider.meta') }}" class="nav-link">
                                <span class="title">{{ __('lang.meta_tags') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Start About Link --}}
                <li class="nav-item {{ Request::routeIs('dashboard.about*') ? 'active open' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-info"></i>
                        <span class="title">{{ __('lang.about_company') }}</span>
                        <span class="arrow {{ Request::routeIs('dashboard.about*') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ Request::is('dashboard/about/1/view') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.about', 1) }}" class="nav-link">
                                <span class="title"> {{ __('lang.about') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('dashboard/about/2/view') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.about', 2) }}" class="nav-link">
                                <span class="title">{{ __('lang.why_choose_us') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{  Request::routeIs('dashboard.about.meta') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.about.meta') }}" class="nav-link">
                                <span class="title">{{ __('lang.meta_tags') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Start Services Link --}}
                <li class="nav-item {{ Request::routeIs('dashboard.services*') ? 'active open' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-social-dropbox"></i>
                        <span class="title"> {{ __('lang.services') }}</span>
                        <span class="arrow {{ Request::routeIs('dashboard.services*') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ Request::routeIs('dashboard.services') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.services') }}" class="nav-link">
                                <span class="title">{{ __('lang.show') }} {{ __('lang.services') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::routeIs('dashboard.services.meta') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.services.meta') }}" class="nav-link">
                                <span class="title">{{ __('lang.meta_tags') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Start categories and products Link --}}
                <li class="nav-item {{ Request::routeIs('dashboard.categories*')  || Request::routeIs('dashboard.products*') ? 'active open' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-grid"></i>
                        <span class="title"> {{ __('lang.categories_and_products') }}</span>
                        <span class="arrow {{ Request::routeIs('dashboard.categories*') || Request::routeIs('dashboard.products*') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ Request::routeIs('dashboard.categories') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.categories') }}" class="nav-link">
                                <span class="title">{{ __('lang.show') }} {{ __('lang.categories') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::routeIs('dashboard.products') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.products') }}" class="nav-link">
                                <span class="title">{{ __('lang.show') }} {{ __('lang.products') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Start Blogs Link --}}
                <li class="nav-item {{ Request::routeIs('dashboard.blogs*') ? 'active open' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-social-dropbox"></i>
                        <span class="title"> {{ __('lang.blogs') }}</span>
                        <span class="arrow {{ Request::routeIs('dashboard.blogs*') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ Request::routeIs('dashboard.blogs') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.blogs') }}" class="nav-link">
                                <span class="title">{{ __('lang.show') }} {{ __('lang.blogs') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::routeIs('dashboard.blogs.meta') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.blogs.meta') }}" class="nav-link">
                                <span class="title">{{ __('lang.meta_tags') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Start our work Link --}}
                <li class="nav-item {{ Request::routeIs('dashboard.our_works*') ? 'active open' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-social-dropbox"></i>
                        <span class="title"> {{ __('lang.our_works') }}</span>
                        <span class="arrow {{ Request::routeIs('dashboard.our_works*') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ Request::routeIs('dashboard.our_works') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.our_works') }}" class="nav-link">
                                <span class="title">{{ __('lang.show') }} {{ __('lang.our_works') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Start Feature Link --}}
                <li class="nav-item {{ Request::routeIs('dashboard.features*') ? 'active open' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-social-dropbox"></i>
                        <span class="title"> {{ __('lang.features') }}</span>
                        <span class="arrow {{ Request::routeIs('dashboard.features*') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ Request::routeIs('dashboard.features') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.features') }}" class="nav-link">
                                <span class="title">{{ __('lang.show') }} {{ __('lang.features') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Start Customer Link --}}
                <li class="nav-item {{ Request::routeIs('dashboard.our_customers*') ? 'active open' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-social-dropbox"></i>
                        <span class="title"> {{ __('lang.our_customers') }}</span>
                        <span class="arrow {{ Request::routeIs('dashboard.our_customers*') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ Request::routeIs('dashboard.our_customers') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.our_customers') }}" class="nav-link">
                                <span class="title">{{ __('lang.show') }} {{ __('lang.our_customers') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Start Customer Review Link --}}
                <li class="nav-item {{ Request::routeIs('dashboard.customer_reviews*') ? 'active open' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-social-dropbox"></i>
                        <span class="title"> {{ __('lang.customer_reviews') }}</span>
                        <span class="arrow {{ Request::routeIs('dashboard.customer_reviews*') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ Request::routeIs('dashboard.customer_reviews') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.customer_reviews') }}" class="nav-link">
                                <span class="title">{{ __('lang.show') }} {{ __('lang.customer_reviews') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ Request::routeIs('dashboard.contact*') ? 'active open' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-call-in"></i>
                        <span class="title"> {{ __('lang.call_us') }}</span>
                        <span class="arrow {{ Request::routeIs('dashboard.contact*') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ Request::is('dashboard/contact') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.contact') }}" class="nav-link relative">
                                <span class="title">{{ __('lang.messages') }}</span>
                                @if($countMessages)
                                    <span class="count_items">{{ $countMessages }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item {{  Request::routeIs('dashboard.contact.meta') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.contact.meta') }}" class="nav-link">
                                <span class="title">{{ __('lang.meta_tags') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Start Requests Link --}}
                <li class="nav-item {{ Request::is('dashboard/requests*') ? 'active open' : '' }}">
                    <a href="{{ route('dashboard.requests') }}" class="nav-link nav-toggle">
                        <i class="icon-question"></i>
                        <span class="title">{{ __('lang.requests') }}</span>
                        @if($countRequests)
                            <span class="count_items">{{ $countRequests }}</span>
                        @endif
                    </a>
                </li>
                {{-- Start Icons Link --}}
                <li class="nav-item {{ Request::is('dashboard/icons*') ? 'active open' : '' }}">
                    <a href="{{ route('icons') }}" class="nav-link nav-toggle">
                        <i class="icon-diamond"></i>
                        <span class="title">{{ __('lang.icons') }}</span>
                    </a>
                </li>
                {{-- Start Settings Link --}}
                {{-- <li class="nav-item {{ Request::is('dashboard/setting*') ? 'active open' : '' }}">
                    <a href="{{ url('dashboard/setting') }}" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title">{{ __('lang.setting') }}</span>
                    </a>
                </li> --}}

                <li class="nav-item {{ Request::Is('dashboard/setting*') ? 'active open' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title"> {{ __('lang.setting') }}</span>
                        <span class="arrow {{ Request::Is('dashboard/setting*') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ Request::is('dashboard/setting') ? 'active' : '' }}">
                            <a href="{{ url('dashboard/setting') }}" class="nav-link relative">
                                <span class="title">{{ __('lang.setting') }}</span>

                            </a>
                        </li>
                        <li class="nav-item {{  Request::routeIs('dashboard.setting.mission') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.setting.mission') }}" class="nav-link">
                                <span class="title">{{ __('lang.our_mission') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{  Request::routeIs('dashboard.setting.vision') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.setting.vision') }}" class="nav-link">
                                <span class="title">{{ __('lang.our_vision') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{  Request::routeIs('dashboard.setting.principle') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.setting.principle') }}" class="nav-link">
                                <span class="title">{{ __('lang.principle') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{  Request::routeIs('dashboard.setting.goal') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.setting.goal') }}" class="nav-link">
                                <span class="title">{{ __('lang.our_goals') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{  Request::routeIs('dashboard.setting.about-images') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.setting.about-images') }}" class="nav-link">
                                <span class="title">{{ __('lang.about_images') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    @yield('content')
</div>
<div class="page-footer">
    <div class="page-footer-inner">
        <span class="copyright">© {{ date('Y') }}</span>
        {{ $setting->copyright }}
        جميع الحقوق محفوظة
        تصميم و تطوير بواسطة
        <a target="_blank" class="main_color" href="https://tarseya.com">ترسية للتسويق الرقمي</a>
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
@yield('quick')
<script src="{{ asset('admin/assets') }}/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('.bs-select, .selectpicker').attr({'data-container': 'body', 'data-none-results-text': 'لا توجد نتائج مطابقة {0}', 'data-live-search-placeholder': 'بحث...'});
    });
</script>
<script src="{{ asset('admin/assets') }}/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ asset('admin/assets') }}/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{ asset('admin/assets') }}/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{ asset('admin/assets') }}/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="{{ asset('admin/assets') }}/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="{{ asset('admin/assets') }}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="{{ asset('admin/assets') }}/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="{{ asset('admin/assets') }}/global/plugins/jquery-bootpag/jquery.bootpag.min.js" type="text/javascript"></script>
<script src="{{ asset('admin/assets') }}/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="{{ asset('admin/assets') }}/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="{{ asset('admin/assets') }}/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="{{ asset('admin/assets') }}/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="{{ asset('admin/assets') }}/global/scripts/app.min.js" type="text/javascript"></script>
<script src="{{ asset('admin/assets') }}/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
<script src="{{ asset('admin/assets') }}/pages/scripts/ui-general.min.js" type="text/javascript"></script>
<script src="{{ asset('admin/assets') }}/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
<script src="{{ asset('admin/assets') }}/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
<script src="{{ asset('admin/assets') }}/js/tinymce/tinymce.min.js"></script>
<script src="{{ asset('admin/assets') }}/js/tinymce/tiny-init.js"></script>
@yield('js')
<script src="{{ asset('admin/assets') }}/js/work.js"></script>
</body>
</html>
