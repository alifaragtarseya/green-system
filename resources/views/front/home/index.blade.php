@extends('front.layouts.master')

@section('title')
    {{ __('lang.home') }}
@endsection
@section('css')
    <link href="{{ asset('assets/flaticons/flaticon.css') }}" rel="stylesheet" type="text/css" />
    <style>

        .carousel-caption {
            position: absolute;
            right: 15%;
            bottom: 30%;
            left: 15%;
            z-index: 10;
            padding-top: 20px;
            padding-bottom: 20px;
            color: #fff;
            text-align: center;
        }

        .slider_title {
            font-family: fantasy;
            font-style: normal;
            font-weight: 400;
            line-height: 88.235%;
            letter-spacing: 1.7px;
            color: #FFFFFF;
            text-align: initial
        }
        .owl-carousel .owl-dots.disabled{
            display: block !important
        }
        .owl-theme .owl-dots .owl-dot span {
            width: 20px;
            height: 20px;
            margin: 5px 7px;
            border: 1px solid var(--MainColor);
            background: #fff;
            display: block;
            -webkit-backface-visibility: visible;
            transition: opacity .2s ease;
            border-radius: 30px;
        }
        .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
            background: var(--MainColor);
        }
        .owl-theme .owl-nav.disabled+.owl-dots {
            margin-top: 50px;
        }
    </style>

@stop


@section('content')
    <div class=" ">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                {{-- @foreach ($sliders as $item)
                <span class="{{ $loop->first ? 'active' : '' }}"><li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->index }}" ></li></span>
                @endforeach --}}
            </ol>
            <div class="carousel-inner slider-box" >
                @foreach ($sliders as $item)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ pathFile($item->image) }}" style="    width: inherit;" class="slider_image">
                    <div class="carousel-caption d-none d-md-block text-{{ isRtl()?'right':'left' }}">
                        <h1 class="slider_title" style="font-size: {{ isMobile()?'80':'100' }}px;" >{{ $item->title }}</h1>
                        <p class="text-white pt-5 wow bounceIn{{ isRtl() ? 'Right' : 'Left' }}" style="width: 50%;text-align: initial">{{ $item->description }}</p>

                       <div class="d-flex   wow slideInUp" style="display: flex;gap: 45px; ">
                        @if ($item->link)
                        <div class="contact-btn float-{{ isRtl()?'right':'left' }} text-{{ isRtl()?'right':'left' }} pt-3" >
                            <a href="{{ route('front.about') }}" class="btn ">{{ __('lang.about_us') }}</a>
                        </div>
                        @endif
                        @if ($setting->who_we_are_video)
                        {{-- <div class="play-icon"> --}}
                            <div class="pt-3 wow slideInUp">

                                <a class="video-play-icon d-flex align-items-center " style="gap: 20px;cursor: pointer;" id="play-video" data-toggle="modal" data-target="#exampleModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                                        <circle cx="24" cy="24" r="20" fill="#008444"/>
                                        <circle cx="24" cy="24" r="23.5" stroke="white"/>
                                        <path d="M34.5 21.4019C36.5 22.5566 36.5 25.4434 34.5 26.5981L21 34.3923C19 35.547 16.5 34.1036 16.5 31.7942L16.5 16.2058C16.5 13.8964 19 12.453 21 13.6077L34.5 21.4019Z" fill="white"/>
                                    </svg>
                                    <span>{{ __('lang.watch_our_journey') }}</span>
                                </a>
                            </div>
                        {{-- </div> --}}
                        @endif
                       </div>
                        <div class="links wow bounceInLeft pt-4">
                            <p class="text-{{ isRtl()?'right':'left' }} text-white">{{ __('lang.follow_us') }}</p>
                            <ul class="top-social">
                                @if ($setting->twitter)
                                    <li>
                                        <a href="{{ $setting->twitter }}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M18.3334 4.83351C17.707 5.10525 17.0446 5.28489 16.3667 5.36684C17.0819 4.93961 17.6178 4.26749 17.8751 3.47517C17.203 3.87523 16.4674 4.15709 15.7001 4.30851C15.1872 3.75232 14.5042 3.38209 13.7583 3.25588C13.0123 3.12968 12.2455 3.25464 11.5782 3.61117C10.9109 3.96769 10.3809 4.53562 10.0711 5.22587C9.76137 5.91613 9.68949 6.68967 9.86675 7.42517C8.50794 7.35645 7.17878 7.00264 5.96563 6.38673C4.75247 5.77082 3.68245 4.90659 2.82508 3.85017C2.52436 4.37531 2.36635 4.97003 2.36675 5.57517C2.36568 6.13716 2.5036 6.69069 2.76821 7.18648C3.03283 7.68227 3.41593 8.10493 3.88341 8.41684C3.34006 8.40206 2.80832 8.25626 2.33341 7.99184V8.03351C2.33749 8.82092 2.61341 9.58275 3.11451 10.1901C3.61561 10.7975 4.31113 11.2132 5.08341 11.3668C4.78613 11.4573 4.47748 11.505 4.16675 11.5085C3.95166 11.506 3.7371 11.4865 3.52508 11.4502C3.74501 12.1275 4.1706 12.7195 4.74264 13.1436C5.31469 13.5678 6.00473 13.8031 6.71675 13.8168C5.51442 14.7629 4.02998 15.2792 2.50008 15.2835C2.22153 15.2844 1.94319 15.2677 1.66675 15.2335C3.22877 16.2421 5.04909 16.7774 6.90841 16.7752C8.19149 16.7885 9.46436 16.546 10.6527 16.0619C11.841 15.5778 12.9209 14.8617 13.8294 13.9556C14.7379 13.0494 15.4567 11.9713 15.9439 10.7843C16.431 9.59719 16.6768 8.32495 16.6667 7.04184V6.60017C17.3207 6.11252 17.8846 5.5147 18.3334 4.83351Z"
                                                    fill="white" />
                                            </svg>
                                        </a>
                                    </li>
                                @endif
                                @if ($setting->facebook)
                                    <li>
                                        <a href="{{ $setting->facebook }}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M11.6667 11.2498H13.75L14.5834 7.9165H11.6667V6.24984C11.6667 5.3915 11.6667 4.58317 13.3334 4.58317H14.5834V1.78317C14.3117 1.74734 13.2859 1.6665 12.2025 1.6665C9.94004 1.6665 8.33337 3.04734 8.33337 5.58317V7.9165H5.83337V11.2498H8.33337V18.3332H11.6667V11.2498Z"
                                                    fill="white" />
                                            </svg>
                                        </a>
                                    </li>
                                @endif
                                @if ($setting->instagram)
                                    <li>
                                        <a href="{{ $setting->instagram }}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <g clip-path="url(#clip0_53_3586)">
                                                    <path
                                                        d="M9.99996 6.6665C9.1159 6.6665 8.26806 7.01769 7.64294 7.64281C7.01782 8.26794 6.66663 9.11578 6.66663 9.99984C6.66663 10.8839 7.01782 11.7317 7.64294 12.3569C8.26806 12.982 9.1159 13.3332 9.99996 13.3332C10.884 13.3332 11.7319 12.982 12.357 12.3569C12.9821 11.7317 13.3333 10.8839 13.3333 9.99984C13.3333 9.11578 12.9821 8.26794 12.357 7.64281C11.7319 7.01769 10.884 6.6665 9.99996 6.6665Z"
                                                        fill="white" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M6 0C4.4087 0 2.88258 0.632141 1.75736 1.75736C0.632141 2.88258 0 4.4087 0 6L0 14C0 15.5913 0.632141 17.1174 1.75736 18.2426C2.88258 19.3679 4.4087 20 6 20H14C15.5913 20 17.1174 19.3679 18.2426 18.2426C19.3679 17.1174 20 15.5913 20 14V6C20 4.4087 19.3679 2.88258 18.2426 1.75736C17.1174 0.632141 15.5913 0 14 0L6 0ZM5.33333 10C5.33333 8.76232 5.825 7.57534 6.70017 6.70017C7.57534 5.825 8.76232 5.33333 10 5.33333C11.2377 5.33333 12.4247 5.825 13.2998 6.70017C14.175 7.57534 14.6667 8.76232 14.6667 10C14.6667 11.2377 14.175 12.4247 13.2998 13.2998C12.4247 14.175 11.2377 14.6667 10 14.6667C8.76232 14.6667 7.57534 14.175 6.70017 13.2998C5.825 12.4247 5.33333 11.2377 5.33333 10ZM14.6667 5.33333H16V4H14.6667V5.33333Z"
                                                        fill="white" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_53_3586">
                                                        <rect width="20" height="20" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </li>
                                @endif

                                @if ($setting->tiktok)
                                    <li>
                                        <a href="{{ $setting->tiktok }}/?" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                                fill="none">
                                                <path
                                                    d="M16.1008 4.635C15.9742 4.56954 15.851 4.49778 15.7316 4.42C15.3847 4.1906 15.0666 3.92033 14.7841 3.615C14.0766 2.80583 13.8125 1.985 13.7158 1.41083H13.7191C13.6383 0.933333 13.6716 0.625 13.6775 0.625H10.4566V13.0775C10.4566 13.2442 10.4566 13.41 10.45 13.5733C10.45 13.5933 10.4475 13.6117 10.4466 13.6342C10.4466 13.6425 10.4466 13.6525 10.4441 13.6617V13.6692C10.4103 14.1159 10.2672 14.5474 10.0275 14.9258C9.7877 15.3042 9.45861 15.6178 9.06915 15.8392C8.66284 16.0703 8.20327 16.1915 7.73581 16.1908C6.23581 16.1908 5.01915 14.9675 5.01915 13.4567C5.01915 11.945 6.23581 10.7217 7.73581 10.7217C8.01998 10.7217 8.30248 10.7667 8.57248 10.855L8.57665 7.575C7.75666 7.46921 6.92364 7.53455 6.13018 7.76691C5.33672 7.99927 4.60004 8.3936 3.96665 8.925C3.41153 9.40712 2.9448 9.98241 2.58748 10.625C2.45165 10.8592 1.93831 11.8017 1.87665 13.33C1.83748 14.1967 2.09831 15.0967 2.22248 15.4675V15.4758C2.29998 15.6942 2.60331 16.4408 3.09665 17.07C3.49448 17.575 3.96452 18.0187 4.49165 18.3867V18.3783L4.49915 18.3867C6.05748 19.445 7.78665 19.3758 7.78665 19.3758C8.08581 19.3633 9.08831 19.3758 10.2266 18.8367C11.4891 18.2383 12.2075 17.3475 12.2075 17.3475C12.6667 16.8151 13.032 16.2084 13.2875 15.5533C13.5791 14.7867 13.6758 13.8683 13.6758 13.5017V6.89417C13.715 6.9175 14.2358 7.26167 14.2358 7.26167C14.2358 7.26167 14.9858 7.7425 16.155 8.055C16.9933 8.2775 18.1241 8.325 18.1241 8.325V5.1275C17.7283 5.17083 16.9241 5.04583 16.1 4.63583L16.1008 4.635Z"
                                                    fill="white" />
                                            </svg>
                                        </a>
                                    </li>
                                @endif

                                {{-- @if (App::getLocale() != 'en')
                                <li>
                                    <a href="{{route('front.lang')}}?lang=en">
                                        <i>En</i>
                                    </a>
                                </li>
                                @else
                                <li>
                                    <a href="{{ route('front.lang')}}?lang=ar" >
                                        <i>ع</i>
                                    </a>
                                </li>
                                @endif --}}
                            </ul>
                        </div>

                    </div>
                </div>
                @endforeach


            </div>

        </div>
    </div>
    @include('front.home.our_partener' ,['partners' =>$partners])

    <br><br>
    @include('front.home.about' ,['about'=>$about])
    <br><br>
    @include('front.home.section-mission')

    @include('front.home.section-features',['features'=>$features])

    @include('front.home.section_services', ['services' => $services])


    @include('front.home.blogs', ['blogs' => $blogs])

    @include('front.home.section_email_subscrip' , ['metaBanner' => $metaBanner])

    <div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop='static' aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content" style="background: transparent;">
                <div class="modal-header p-0"style="background: transparent;">
                <button type="button" class="btn text-white text-end" style="background: transparent;"data-dismiss="modal" id="modelClose" aria-label="Close">X</button>
                </div>
                <div class="modal-body p-0">
                    <div id="youtube_link"></div>
                </div>

            </div>
        </div>
    </div>
@stop

@section('js')
<script>
        function getId(url) {
            const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
            const match = url.match(regExp);

            return (match && match[2].length === 11)
            ? match[2]
            : null;
        }

        var videolink = '{{ $setting->who_we_are_video }}';
        const videoId = getId(videolink);
        const iframeMarkup = '<iframe width="100%" height="450" src="//www.youtube.com/embed/' + videoId + '" frameborder="0" allowfullscreen></iframe>';
        $('#youtube_link').html(iframeMarkup);
        // alert(videoId);


         // make vedio close auto
         $('#modelClose').click(function() {
            $('#exampleModal').modal('hide');
            $('#youtube_link').html('');
        });

        //play video
        $('#play-video').click(function() {
            $('#youtube_link').html(iframeMarkup);
            $('#exampleModal').modal('show');
        });


        $('.services-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            dots:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        })
    </script>


@endsection
