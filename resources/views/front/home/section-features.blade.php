<div class="pt-5 p-md-5 p-sm-2"  >
    <div style="background-image: url({{ asset('front/icon/feature.png') }});    background-repeat: no-repeat;
    background-size: contain;     background-position: {{ isRtl()?'right':'left' }};">

    <div class="container" >
                <div class="d-flex flex-column justify-content-center text-center align-items-center m-auto wow zoomInUp" style="width: {{ isMobile() ? '80%' : '48%' }}">
                     <p class="main-color text-center" style="">
                        {{-- <img src="{{ asset('front/icon/Captuhre.png') }}" width="50" class="" alt=""> --}}
                        <b class="h4 main-color">{{ __('lang.reasons_to_choose_us') }}</b>
                     </p>
                    <h2 class="sec-color">
                        <b>{{ __('lang.we_work_with_you_towards_excellence') }}</b></h2>

                        {{-- <b>{{ __('lang.we_work_with_you_desc') }}</b> --}}
                </div>

        <br>
        <div class="row">

           @foreach ($features as $item)
            <div class="col-lg-4 col-md-6  wow bounceInLeft">
                <div class="card pt-4 border-0 features-item">
                    <img src="{{ asset($item->image) }}" width="70" class="m-auto position-relative" alt="">
                    <span style="width: 50px;height: 50px;border-radius: 50%;background-color: #f7a11b4a;    position: absolute;right: {{ $right??'35%' }};top: 20%;"></span>
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{!! $item->description !!}</p>
                    </div>
                </div>
            </div>
           @endforeach

        </div>
    </div>
</div>
</div>
<br><br><br>
