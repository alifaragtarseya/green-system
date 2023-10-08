@php $linkPage = __('lang.edit_image'); @endphp
@extends('dashboard.layouts.master')
@section('title')
    {{ $linkPage }}
@stop
@section('content')
    <div class="page-content-wrapper ar_text">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>{{ $linkPage }}</h1>
                </div>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="{{ route('dashboard') }}">{{ __('lang.dashboard') }}</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('dashboard.slider') }}">{{ __('lang.slider') }}</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">{{ $linkPage }}</span>
                </li>
            </ul>
            <div class="row">
                <div class="col-lg-12 col-xs-12 col-sm-12">
                    <div class="tab-pane" id="tab_2">
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-equalizer font-green-haze"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">{{ $linkPage }}</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                {{-- Include Messages Flash --}}
                                @include('dashboard.includes.flash_msg')
                                <form method="post" action="{{ route('dashboard.slider.update', $data->id) }}" enctype="multipart/form-data">
                                    @include('dashboard.slider.form')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
