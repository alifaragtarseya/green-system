@extends('front.layouts.master')
@section('title')
{{ __('lang.blogs')  }} | {{ $data->title }}
@endsection
@section('css')
<style>

</style>
@endsection

@section('content')
<div class="meta_tag"
        style="background-image: url({{ asset($metaBanner->image) }}); background-size: cover; background-position: center; background-repeat: no-repeat; height: 250px ;padding-top: {{ isMobile() ? '100px' : '105px' }}">
        <div class="text-center  ">
            <h3 class="text-white d-flex justify-content-center align-items-center " style="width: {{ isMobile() ? '100%' : '50%' }};gap: 10px;float: left">
                <span style="height: 2px;width: 100px; background: #F7A11B"></span>
                {{ __('lang.blogs') }}
            </h3>

        </div>
        </div>
</div>
    <section class="services-details-area ptb-100">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12">
                   <div class="text-center mb-5">
                    <b class="w3-text-orange">{{ Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</b>
                    <h3>{{ $data->title }}</h3>
                   </div>
                    <div class="projects-item reveal fade-{{ isRtl()?'right' :'left'}}">
                        <a href="{{ pathFile($data->image) }}">
                            <div style="background-image: url({{ asset($data->image) }}); background-size: cover; background-position: center; background-repeat: no-repeat; height: 400px;border-radius: 12px ;padding-top: {{ isMobile() ? '100px' : '105px' }}"></div>
                            {{-- <img class="lazy" data-src="{{ pathFile($data->image) }}" src="{{ asset('images/default.png') }}" alt="image"> --}}
                        </a>
                    </div>
                    <div class="services-details-desc pt-5 reveal fade-top">


                        {!! $data->description !!}

                    </div>


                </div>

            </div>

            {{-- <div class="row pt-5 reveal reveal fade-top">
                <div class="col-12 pt-5 pb-4">
                    <b>{{ __('lang.continue_reading') }}</b>
                </div>
                @foreach($all_blogs as $get)
                <div class="col-12 col-md-4 ">
                        <a href="{{ route('front.show.blogs' , ['id' => $get->id]) }}">
                        <div class="d-flex " style="align-items: center">
                            <img src="{{ pathFile($get->image) }}" style="width: 200px; height: 100px; border-radius: 18px" alt="{{ $get->title }}">
                            <div class="title m-1 text-black">
                                    <b>{{ $get->title }}</b>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div> --}}

            <br><br><br>
            <div class="container" >
                <div class="d m-auto wow zoomInUp" >
                    <p class="main-color" style="display: flex;
                    justify-content: start;
                    align-items: center;
                    gap: 3%;">
                       <img src="{{ asset('front/icon/Captuhre.png') }}" width="50" class="" alt="">
                       <b class="h4 main-color">{{ __('lang.our_latest_blogs') }}</b>
                    </p>
                   <h2 class="sec-color">
                       {{-- <b>{{ __('lang.we_work_with_you_towards_excellence') }}</b></h2> --}}

                       {{-- <b>{{ __('lang.we_work_with_you_desc') }}</b> --}}
               </div>

                <br>
                <div class="row">

                   @foreach ($all_blogs as $item)
                    <div class="col-lg-4 col-md-6 wow bounceInLeft">
                        <div class="card p-4 features-item border-radius-20">

                            <img src="{{ asset($item->image) }}" class="card-img-top border-radius-20 position-relative" style="width: 100%;height: 300px;"  alt="">
                            <span style="    width: 65px;top: 245px;border-radius: {{ isRtl()?'20px 0':'0 20px' }};" class="position-absolute text-white p-3 bg-warning text-center">{{ Carbon\Carbon::parse($item->created_at)->format('d M') }}</span>
                            <div class="card-body pb-0">
                                <h5 class="card-title" style="height: 50px;overflow: hidden;">{{ $item->title }}</h5>
                                <div class="card-text" style="height: 90px;overflow: hidden;">{!! $item->description !!}</div>
                                    <p class="main-color text-{{ isRtl()?'left':'right' }}">
                                        <a href="{{ route('front.show.blogs',['id'=>$item->id]) }}" class="main-color">
                                            <b>{{ __('lang.read_more') }}</b>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                                                <path d="M10.9151 5.364L6.74295 1.19181L7.93476 -2.34468e-07L13.2988 5.364L7.93476 10.728L6.74294 9.53534L10.9151 5.36316L10.9151 5.364Z" fill="#008444"/>
                                                <path d="M4.17219 5.364L4.24741e-07 1.19181L1.19181 -2.34468e-07L6.55581 5.364L1.19181 10.728L6.0034e-08 9.53534L4.17219 5.36316L4.17219 5.364Z" fill="#008444"/>
                                              </svg>
                                            </a>
                                        </p>
                            </div>
                        </div>
                    </div>
                   @endforeach

                </div>
            </div>
        </div>
    </section>
@stop
@section('js')
<script src="{{ asset('front/assets/js/sharer.min.js') }}"></script>

@endsection
