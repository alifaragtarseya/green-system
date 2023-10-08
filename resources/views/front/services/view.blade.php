@extends('front.layouts.master')
@section('content')
    <div class="page-title-area" style="background: url({{ asset($metaBanner->image) }})">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>{{ __('lang.services') }}</h2>
                        <ul>
                            <li>
                                <a href="{{ url('/') }}">{{ __('lang.home') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('services') }}">{{ __('lang.services') }}</a>
                            </li>
                            <li>{{ $data->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="services-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="services-details-image">
                        <img class="lazy" data-src="{{ pathFile($data->image) }}" src="{{ asset('images/default.png') }}" alt="{{ $data->title }}">
                    </div>
                    <div class="services-details-desc">
                        <h3>{{ $data->title }}</h3>
                        {!! $data->description !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area" id="secondary">
                        <section class="widget widget_services_list">
                            <h3 class="widget-title">{{ __('lang.services') }}</h3>
                            <ul>
                                @foreach($services as $get)
                                    <li class="{{ $get->id == $data->id ? 'active' : '' }}">
                                        <a href="{{ url('services/' . $get->id) }}">
                                            {{ $get->title }}
                                            <i class="las la-arrow-left"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@stop
