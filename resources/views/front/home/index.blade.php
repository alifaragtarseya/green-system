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
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 357 322" fill="none">
                                                <path d="M281.026 0.125H335.608L216.362 136.415L356.645 321.875H246.805L160.774 209.395L62.335 321.875H7.71996L135.265 176.098L0.690964 0.125H113.32L191.084 102.937L281.026 0.125ZM261.869 289.205H292.114L96.886 31.079H64.4305L261.869 289.205Z" fill="white"/>
                                              </svg>
                                        </a>
                                    </li>
                                @endif
                                @if ($setting->facebook)
                                    <li>
                                        <a href="{{ $setting->facebook }}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.488 3.788C11.4724 2.8034 12.8077 2.25016 14.2 2.25H16.9C17.0989 2.25 17.2897 2.32902 17.4303 2.46967C17.571 2.61032 17.65 2.80109 17.65 3V6.6C17.65 6.79891 17.571 6.98968 17.4303 7.13033C17.2897 7.27098 17.0989 7.35 16.9 7.35H14.2C14.1803 7.35 14.1608 7.35388 14.1426 7.36142C14.1244 7.36896 14.1079 7.38 14.0939 7.39393C14.08 7.40786 14.069 7.4244 14.0614 7.4426C14.0539 7.4608 14.05 7.4803 14.05 7.5V9.45H16.9C17.014 9.44994 17.1266 9.47587 17.229 9.52583C17.3315 9.57579 17.4213 9.64846 17.4915 9.73832C17.5617 9.82817 17.6104 9.93285 17.6341 10.0444C17.6578 10.1559 17.6557 10.2714 17.628 10.382L16.728 13.982C16.6874 14.1443 16.5937 14.2884 16.4618 14.3913C16.3299 14.4942 16.1673 14.5501 16 14.55H14.05V21C14.05 21.1989 13.971 21.3897 13.8303 21.5303C13.6897 21.671 13.4989 21.75 13.3 21.75H9.7C9.50109 21.75 9.31032 21.671 9.16967 21.5303C9.02902 21.3897 8.95 21.1989 8.95 21V14.55H7C6.80109 14.55 6.61032 14.471 6.46967 14.3303C6.32902 14.1897 6.25 13.9989 6.25 13.8V10.2C6.25 10.1015 6.2694 10.004 6.30709 9.91299C6.34478 9.82199 6.40003 9.73931 6.46967 9.66967C6.53931 9.60003 6.62199 9.54478 6.71299 9.50709C6.80398 9.4694 6.90151 9.45 7 9.45H8.95V7.5C8.95016 6.10768 9.5034 4.77244 10.488 3.788ZM14.2 3.75C13.2054 3.75 12.2516 4.14509 11.5483 4.84835C10.8451 5.55161 10.45 6.50544 10.45 7.5V10.2C10.45 10.3989 10.371 10.5897 10.2303 10.7303C10.0897 10.871 9.89891 10.95 9.7 10.95H7.75V13.05H9.7C9.89891 13.05 10.0897 13.129 10.2303 13.2697C10.371 13.4103 10.45 13.6011 10.45 13.8V20.25H12.55V13.8C12.55 13.6011 12.629 13.4103 12.7697 13.2697C12.9103 13.129 13.1011 13.05 13.3 13.05H15.414L15.939 10.95H13.3C13.1011 10.95 12.9103 10.871 12.7697 10.7303C12.629 10.5897 12.55 10.3989 12.55 10.2V7.5C12.55 7.06239 12.7238 6.64271 13.0333 6.33327C13.3427 6.02384 13.7624 5.85 14.2 5.85H16.15V3.75H14.2Z" fill="white"/>
                                              </svg>
                                        </a>
                                    </li>
                                @endif
                                @if ($setting->instagram)
                                    <li>
                                        <a href="{{ $setting->instagram }}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 134 134" fill="white">
                                                <path d="M66.5369 0C48.4665 0 46.2006 0.0766603 39.1037 0.400337C32.0216 0.723419 27.1849 1.84836 22.9525 3.4929C18.5771 5.19329 14.8665 7.46853 11.1676 11.1674C7.46853 14.8663 5.19329 18.5773 3.49309 22.9527C1.84817 27.1849 0.723617 32.0216 0.400139 39.1037C0.0764622 46.2006 0 48.4665 0 66.5369C0 84.607 0.0764622 86.8729 0.400139 93.9698C0.723617 101.052 1.84817 105.889 3.49309 110.121C5.19349 114.496 7.46873 118.207 11.1676 121.906C14.8667 125.605 18.5771 127.88 22.9525 129.581C27.1849 131.225 32.0216 132.35 39.1037 132.673C46.2006 132.997 48.4665 133.074 66.5369 133.074C84.607 133.074 86.8729 132.997 93.9698 132.673C101.052 132.35 105.889 131.225 110.121 129.581C114.496 127.88 118.207 125.605 121.906 121.906C125.605 118.207 127.88 114.496 129.581 110.121C131.225 105.889 132.35 101.052 132.673 93.9698C132.997 86.8729 133.074 84.607 133.074 66.5369C133.074 48.4665 132.997 46.2006 132.673 39.1037C132.35 32.0216 131.225 27.1849 129.581 22.9527C127.88 18.5773 125.605 14.8663 121.906 11.1674C118.207 7.46853 114.496 5.19329 110.121 3.4929C105.889 1.84836 101.052 0.723419 93.9698 0.400337C86.8729 0.0766603 84.607 0 66.5369 0ZM66.5369 11.9885C84.3027 11.9885 86.4072 12.0565 93.4233 12.3766C99.9107 12.6723 103.434 13.7563 105.778 14.6675C108.884 15.8746 111.101 17.3163 113.429 19.6446C115.757 21.973 117.199 24.1896 118.406 27.2952C119.317 29.6398 120.401 33.163 120.697 39.6502C121.017 46.6663 121.085 48.7708 121.085 66.5368C121.085 84.3027 121.017 86.4072 120.697 93.4233C120.401 99.9107 119.317 103.434 118.406 105.778C117.199 108.884 115.757 111.101 113.429 113.429C111.101 115.757 108.884 117.199 105.778 118.406C103.434 119.317 99.9105 120.401 93.4233 120.697C86.4084 121.017 84.3041 121.085 66.5368 121.085C48.7694 121.085 46.6655 121.017 39.6502 120.697C33.1628 120.401 29.6398 119.317 27.2954 118.406C24.1894 117.199 21.973 115.757 19.6448 113.429C17.3165 111.101 15.8746 108.884 14.6675 105.778C13.7563 103.434 12.6725 99.9105 12.3766 93.4233C12.0565 86.4072 11.9885 84.3027 11.9885 66.5368C11.9885 48.7708 12.0565 46.6663 12.3766 39.6502C12.6725 33.1628 13.7563 29.6398 14.6675 27.2954C15.8746 24.1894 17.3165 21.973 19.6446 19.6448C21.973 17.3163 24.1896 15.8746 27.2952 14.6675C29.6398 13.7563 33.163 12.6723 39.6502 12.3766C46.6663 12.0565 48.7708 11.9885 66.5368 11.9885" fill="#fff"/>
                                                <path d="M66.537 88.7157C54.2876 88.7157 44.3578 78.7859 44.3578 66.5369C44.3578 54.2875 54.2876 44.3577 66.537 44.3577C78.786 44.3577 88.7157 54.2875 88.7157 66.5369C88.7157 78.7859 78.786 88.7157 66.537 88.7157ZM66.537 32.3692C47.6664 32.3692 32.3693 47.6664 32.3693 66.5369C32.3693 85.407 47.6664 100.704 66.537 100.704C85.4071 100.704 100.704 85.407 100.704 66.5369C100.704 47.6664 85.4071 32.3692 66.537 32.3692ZM110.039 31.0193C110.039 35.4291 106.464 39.0036 102.054 39.0036C97.6448 39.0036 94.0699 35.4291 94.0699 31.0193C94.0699 26.6096 97.6448 23.0347 102.054 23.0347C106.464 23.0347 110.039 26.6096 110.039 31.0193Z" fill="#fff"/>
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
