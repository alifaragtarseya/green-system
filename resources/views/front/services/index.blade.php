@extends('front.layouts.master')
@section('css')

@stop
@section('title')
    {{ __('lang.services') }}
@stop
@section('content')
    <div class="meta_tag"
        style="background-image: url({{ asset($metaBanner->image) }}); background-size: cover; background-position: center; background-repeat: no-repeat; height: 250px ;padding-top: {{ isMobile() ? '100px' : '105px' }}">
        <div class="text-center  ">
            <h3 class="text-white d-flex justify-content-center align-items-center "
                style="width: {{ isMobile() ? '100%' : '50%' }};gap: 10px;float: left">
                <span style="height: 2px;width: 100px; background: #F7A11B"></span>
                {{ __('lang.services') }}
            </h3>

        </div>
    </div>


    <section style="background-image:url({{ asset('front/icon/blogs.png') }}); background-repeat: no-repeat; background-size: contain; background-position: left; width: 100%;height:100%;">
        <div class="container p-3">
            <div class="row mt-5 mb-5">
                <div class="col-md-3">
                    <div class="services-list p-3" style="border-radius: 20px;background: rgba(0, 132, 68, 0.10); ">

                        <div style="border-left: 2px solid #008444;">
                            <h4 class="mr-2 ml-2">{{ __('lang.services_list') }}</h4>
                        </div>

                        <ul class="w3-ul pt-5">
                            @foreach ($services as $item)
                                <li class="border-0 bg-{{ $data->id == $item->id ? 'success' : 'white' }} mb-3" style="border-radius: 8px;">
                                    <a href="{{ route('front.services') }}?service_id={{ $item->id }}" class="text-{{ $data->id == $item->id ? 'white' : 'dark' }} d-flex gap-2" style="gap: 10px">
                                        <img src="{{ asset($item->image) }}" style="width: 35px;height: 35px;" class="rounded-circle" alt="">
                                        <b>{{ $item->title }}</b>
                                    </a>
                                </li>

                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="imag" style="background-image:url({{ $data->image }}); border-radius: 20px;background-repeat: no-repeat; background-size: cover; background-position: center; width: 100%;height:350px;">
                    </div>

                    <div class="body pt-4">
                        <h3 >
                            <b>{{ $data->title }}</b>
                        </h3>
                        <div class="desc pt-2">
                            {!! $data->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- @include('front.home.section_email_subscrip') --}}


@stop
