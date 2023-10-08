@extends('dashboard.layouts.master')
@section('title')
   {{ $data->title }}
@stop
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>{{ $data->title }}</h1>
                </div>
                <form id="delete-form" action="{{ route('dashboard.services.delete', $data->id) }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="javascript:;" class="add_products confirm red_icon" title="{{ __('lang.delete_service') }}"><i class="icon-trash"></i></a>
                <a class="add_products blue_icon" title="{{ __('lang.edit_service') }}" href="{{ route('dashboard.services.edit', $data->id) }}"><i class="icon-note"></i></a>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="{{ route('dashboard') }}">{{ __('lang.dashboard') }}</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('dashboard.services') }}">{{ __('lang.services') }}</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">{{ $data->title }}</span>
                </li>
            </ul>
            <div class="row">
                <div class="col-lg-12 col-xs-12 col-sm-12">
                    <div class="tab-pane" id="tab_2">
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-equalizer font-green-haze"></i>
                                    <span class="caption-subject ar_text font-green-haze bold uppercase">{{ $data->title }}</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                {{-- Include Messages Flash --}}
                                @include('dashboard.includes.flash_msg')
                                <div class="view_category">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <p><strong>{{ __('lang.image') }}</strong></p>
                                                <div class="view_image">
                                                    <img src="{{ asset($data->image) }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="content_data lang_ar">
                                                    <div class="text_view">
                                                        <p><strong>{{ __('lang.service') }}: </strong> {{ $data->title }}</p>
                                                    </div>
                                                    <div class="text_view">
                                                        <p><strong>{{ __('lang.description') }}: </strong> </p>
                                                        {!! nl2br($data->description) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop