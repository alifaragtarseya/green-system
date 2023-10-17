@extends('front.layouts.master')
@section('title')
    {{ __('lang.about_us') }}
@stop

@section('content')

<div class="meta_tag"
        style="background-image: url({{ asset($metaBanner->image) }}); background-size: cover; background-position: center; background-repeat: no-repeat; height: 250px ;padding-top: {{ isMobile() ? '100px' : '105px' }}">
        <div class="text-center  ">
            <h3 class="text-white d-flex justify-content-center align-items-center " style="width: {{ isMobile() ? '100%' : '50%' }};gap: 10px;float: left">
                <span style="height: 2px;width: 100px; background: #F7A11B"></span>
                {{ __('lang.about_us') }}
            </h3>

        </div>
        </div>
</div>
<div class="container">


    <div class="row pt-5 pb-5 ">
        <div class="col-md-6 p-5 wow bounceIn{{ isRtl() ? 'Left' : 'Right' }}">
            <div style="background-image: url({{ asset('front/icon/about.png') }}); background-repeat: no-repeat; background-size: contain; background-position: {{ isRtl()?'left':'right' }}; width: 100%;height:400px;">
                <h2 class="sec-color " >
                    <b style="border-bottom: 7px solid #D2AE6D">{{ isRtl() ? $about->title : $about->title_en }}</b>
                    <img src="{{ asset('front/icon/Captuhre.png') }}" class="float-{{ isRtl() ? 'left':'right' }}" alt="">
                </h2>

                <div class="desc pt-5">
                    <div class="text-dark">
                        {!! isRtl() ? $about->description : $about->description_en !!}
                    </div>
                </div>
                <div class="desc pt-5">
                    <div class="text-dark">
                        {!! isRtl() ? $about2->description : $about2->description_en !!}
                    </div>
                </div>

                {{-- <div class="contact-btn float-{{ isRtl()?'right':'left' }} text-{{ isRtl()?'right':'left' }} pt-5" >
                    <a href="{{ route('front.about') }}" class="btn ">{{ __('lang.about_us') }}</a>
                </div> --}}
            </div>
         </div>
        <div class="col-sm-12 col-md-6 wow bounceIn{{ isRtl() ? 'Right' : 'Left' }}">
           <div class="row">
                <div class="col-sm-6">
                    <img src="{{ asset(optional($mySetting->where('key', 'about_image_1'))->first()->value ??'images/default.png') }}" style="height: 100%;border-radius: {{ isRtl()?'0 20px 20px 0px' :'20px 0px 0px 20px'}};" alt="">
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ asset(optional($mySetting->where('key', 'about_image_2'))->first()->value ??'images/default.png') }}" style="    height: 220px;width: 100%;border-radius: {{ isRtl()?'20px 0px 0px 20px':'0 20px 20px 0px' }};" alt="">
                        </div>
                        <div class="col-12 pt-2">
                            <img src="{{ asset(optional($mySetting->where('key', 'about_image_3'))->first()->value ??'images/default.png') }}" style="    height: 220px;
                            width: 100%;
                            border-radius: {{ isRtl()?'20px 0px 0px 20px':'0 20px 20px 0px' }};" alt="">
                        </div>
                    </div>
                </div>
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
    <div class="pt-2 about-video">
        <div id="youtube_link"></div>
    </div>

</div>
<br><br>

@include('front.home.section-mission' )
@include('front.home.section-features',['features' => $features,'items' =>4,'right' => '140px'] )
@include('front.about.our_partener' , ['partners' => $partners])



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
        const iframeMarkup = '<iframe width="100%" height="550" style="border-radius: 20px;" src="//www.youtube.com/embed/' + videoId + '" frameborder="0" allowfullscreen></iframe>';
        $('#youtube_link').html(iframeMarkup);
        // alert(videoId);




        //play video
        $('#play-video').click(function() {
            $('#youtube_link').html(iframeMarkup);
        });



        $('#partners').owlCarousel({
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
                    items:6
                }
            }
        })
    </script>




@endsection
