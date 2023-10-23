<div class="pt-5"  >
    <div class="p-5" style="background-image: url({{ asset('front/icon/blogs.png') }});    background-repeat: no-repeat;
    background-size: contain;  ">

    <div class="container" >
        <div class="d m-auto wow zoomInUp" >
            <p class="main-color" style="display: flex;
            justify-content: start;
            align-items: center;
            gap: 3%;">
               {{-- <img src="{{ asset('front/icon/Captuhre.png') }}" width="50" class="" alt=""> --}}
               <b class="h4 main-color">{{ __('lang.our_latest_blogs') }}</b>
            </p>
           <h2 class="sec-color">
               {{-- <b>{{ __('lang.we_work_with_you_towards_excellence') }}</b></h2> --}}

               {{-- <b>{{ __('lang.we_work_with_you_desc') }}</b> --}}
       </div>

        <br>
        <div class="row">

           @foreach ($blogs as $item)
            <div class="col-md-6 col-lg-4 wow bounceInLeft">
                <div class="card p-4 features-item border-radius-20">

                    <img src="{{ asset($item->image) }}" class="card-img-top border-radius-20 position-relative" style="width: 100%;height: 300px;"  alt="">
                    <span style="    width: 65px;top: 244px;border-radius: {{ isRtl()?'20px 0':'0 20px' }};" class="position-absolute text-white p-3 bg-warning text-center">{{ Carbon\Carbon::parse($item->created_at)->format('d M') }}</span>
                    <div class="card-body pb-0">
                        <h5 class="card-title" style="height: 50px;overflow: hidden;">{{ $item->title }}</h5>
                        <div class="card-text" style="height: 90px;overflow: hidden;">{!! $item->description !!}</div>
                            <p class="main-color text-{{ isRtl()?'left':'right' }}">
                                <a href="{{ route('front.show.blogs',['id'=>$item->id]) }}" class="main-color">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                                        <path d="M10.9151 5.364L6.74295 1.19181L7.93476 -2.34468e-07L13.2988 5.364L7.93476 10.728L6.74294 9.53534L10.9151 5.36316L10.9151 5.364Z" fill="#008444"/>
                                        <path d="M4.17219 5.364L4.24741e-07 1.19181L1.19181 -2.34468e-07L6.55581 5.364L1.19181 10.728L6.0034e-08 9.53534L4.17219 5.36316L4.17219 5.364Z" fill="#008444"/>
                                      </svg>
                                      <b>{{ __('lang.read_more') }}</b>
                                    </a>
                                </p>
                    </div>
                </div>
            </div>
           @endforeach

        </div>
    </div>
</div>
</div>
<br><br><br>
