<section class="about">
    <div class="container" >
        <div class="row pt-5 pb-5 ">
            <div class="col-sm-12 col-md-5 wow bounceIn{{ isRtl() ? 'Right' : 'Left' }}">
                <img src="{{ asset($about->image) }}" alt="">
            </div>
            <div class="col-md-7 p-5 wow bounceIn{{ isRtl() ? 'Left' : 'Right' }}">
                <h2 class="sec-color " >
                    <b style="border-bottom: 7px solid #D2AE6D">{{ isRtl() ? $about->title : $about->title_en }}</b>
                    <img src="{{ asset('front/icon/Captuhre.png') }}" class="float-right" alt="">
                </h2>

                <div class="desc pt-5">
                   <div class="text-dark">
                        {!! isRtl() ? $about->description : $about->description_en !!}
                   </div>
                </div>

                <div class="contact-btn float-{{ isRtl()?'right':'left' }} text-{{ isRtl()?'right':'left' }} pt-5" >
                    <a href="{{ route('front.about') }}" class="btn ">{{ __('lang.about_us') }}</a>
                </div>
            </div>


            {{-- <div class="col-sm-12 col-md-5 ">
                <img src="{{ asset($about2->image) }}" alt="">
            </div>
            <div class="col-md-7 p-5">

                <div class="desc pt-5">
                   <div class="text-dark">
                        {!! $about2->description !!}
                   </div>
                </div>
            </div> --}}

        </div>
    </div>
</section>
