<section class="partener"style=" ">
    {{-- <div class="container" > --}}
        <div class="d-flex flex-column justify-content-center text-center align-items-center m-auto wow zoomInUp" style="width: {{ isMobile() ? '80%' : '48%' }}">
            <p class="main-color text-center">
               {{-- <img src="{{ asset('front/icon/Captuhre.png') }}" width="50" class="" alt=""> --}}
               <b class="h4 main-color">{{ __('lang.our_parteners') }}</b>
            </p>
           <h2 class="sec-color">
               <b>{{ __('lang.who_share_our_success') }}</b></h2>

       </div>
        <div class="row pt-5 pb-5">
            <div class="owl-carousel owl-theme" id="partners">
                @foreach ($partners as $item)
                    <div class="image p-5" style="background: #EDEFF2">
                        <img src="{{ asset($item->image) }}" alt="">
                    </div>
                @endforeach

            </div>
        </div>
    {{-- </div> --}}
</section>
<br><br><br>
