@extends('front.layouts.master')
@section('title')
    {{ __('lang.products')  }} | {{ $data->title }}
@endsection
@section('css')

@endsection
@section('content')

    <section class="services-details-area pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 reveal fade-{{ isRtl()?'right' :'left'}}">
                    <div class="services-details-desc">
                        <h3>{{ $data->title }}</h3>
                        @foreach ($data->getCategoryName($data->id)  as $cat_name)
                        <span class="p-1 pr-2 pl-2 m-1 " style="border-radius: 50px; background: #1b6c7a2f;color: #185F6C">
                        {{ $cat_name->title }}
                        </span>
                    @endforeach
                    </div>
                </div>
                <div class="col-12 col-md-6"></div>
                <div class="col-lg-12 col-md-12 pt-5 pb-5">
                    <div class="projects_details_slider owl-carousel owl-theme">
                        <div class="projects-item">
                            <a href="{{ pathFile($data->image) }}">
                                <div style="background-image:url({{ pathFile($data->image) }}); " class="product_image"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
                <div class="col-8 text-center">
                    <div class="pt-2">
                        {!! $data->description !!}
                    </div>
                </div>
                <div class="col-2"></div>

            </div>
            <div class=" row pt-3">
                @foreach($data->images as $get)
                <div class="col-12 col-md-6 pt-3">
                            <div class="">
                                <a href="{{ pathFile($get->image) }}">
                                    <img src="{{ pathFile($get->image) }}" style="width: 100% ; height: 400px;" alt="">
                                    {{-- <div style="background-image:url({{ pathFile($get->image) }}); " class="product_image"></div> --}}
                                </a>
                            </div>
                        </div>
                        @endforeach
            </div>
        </div>
    </section>
    <br><br><br>
@stop
