

<div style="background-image: url({{ asset('front/icon/Rectangle.png') }});background-repeat: no-repeat;background-size: cover; padding: 30px;background-position: center;">

    <div class="container" >
        <div class="row">
            <div class="col-md-12 wow rollIn">
                <div class="d-flex flex-column justify-content-center text-center align-items-center m-auto wow zoomInUp" style="width: {{ isMobile() ? '80%' : '48%' }}">
                    <p class="main-color text-center">
                       {{-- <img src="{{ asset('front/icon/Captuhre.png') }}" width="50" class="" alt=""> --}}
                       <b class="h4 main-color">{{ __('lang.our_services') }}</b>
                    </p>
                   <h2 class="sec-color">
                       <b>{{ __('lang.service_desc') }}</b></h2>

                       {{-- <b>{{ __('lang.we_work_with_you_desc') }}</b> --}}
               </div>
            </div>
            <div class="owl-carousel owl-theme services-carousel">
                @foreach ($services as $item)
                <div class="item pt-3 wow zoomInDown" style="height: 100%" >
                    <div class="card border-0 p-2" style="height: 100%; border-radius: 20px;">
                        <img src="{{ asset($item->image) }}" class="card-img-top" style="border-radius: 10px" alt="">
                        <span style="position: absolute;padding: 5px;background: white;border-radius: 50px;top: {{ isMobile()?'28':'36' }}%;left: 40px;">
                        <i style="font-size: 45px;padding: 0px 8px;background: #008444;color: white;border-radius: 50%;" class="icon_view {{ $item->icon }}"></i></span>
                        <div class="card-body  ">
                            <br>
                            <b class="h4">{{ $item->title }}</b>
                            <div class="pt-2">
                                <div style="height: 90px;overflow: hidden;">

                                        {!! $item->description !!}

                                </div>

                                <p>
                                    <b class="main-color">
                                        <a href="{{ route('front.services') }}" style="color: #F7A11B">{{ __('lang.read_more') }}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 11" fill="none">
                                                <path d="M10.9151 5.364L6.74295 1.19181L7.93477 -2.34468e-07L13.2988 5.364L7.93477 10.728L6.74295 9.53534L10.9151 5.36316L10.9151 5.364Z" fill="#F7A11B"/>
                                                <path d="M4.17219 5.364L4.23944e-06 1.19181L1.19182 -2.34468e-07L6.55582 5.364L1.19182 10.728L3.87473e-06 9.53534L4.17219 5.36316L4.17219 5.364Z" fill="#F7A11B"/>
                                              </svg>
                                            </a>
                                    </b>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
             @endforeach

            </div>


            <div class="col-md-12 pt-5 text-center">
                <div class="contact-btn">
                    <a href="{{ route('front.services')}}" style="border-radius: 0px 16px 0px 16px" class="btn ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.5 10.9999L16.086 10.9999L11.586 6.49994L13 5.08594L19.914 11.9999L13 18.9139L11.586 17.4999L16.086 12.9999L4.5 12.9999L4.5 10.9999Z" fill="white"/>
                          </svg>
                        {{ __('lang.view_all_services') }} </a>
                </div>
            </div>
        </div>

    </div>
</div>
<br><br><br>
