@php
    $titlePage = Request::is('dashboard/contact*') ? __('lang.details_message') : __('lang.details_request');
@endphp
@extends('dashboard.layouts.master')
@section('title')
   {{ $titlePage }}
@stop
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>{{ $titlePage }}</h1>
                </div>
                <form id="delete-form" action="{{ $data->service ? route('dashboard.requests.delete', $data->id) : route('dashboard.contact.delete', $data->id) }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="javascript:;" class="add_products confirm red_icon" title="{{ __('lang.delete_message') }}"><i class="icon-trash"></i></a>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="{{ route('dashboard') }}">{{ __('lang.dashboard') }}</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    @if(Request::is('dashboard/contact*'))
                        <a href="{{ route('dashboard.contact') }}">{{  __('lang.messages') }}</a>
                    @else
                        <a href="{{ route('dashboard.requests') }}">{{  __('lang.requests') }}</a>
                    @endif
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">{{ $titlePage }}</span>
                </li>
            </ul>
            <div class="row">
                <div class="col-lg-12 col-xs-12 col-sm-12">
                    <div class="tab-pane" id="tab_2">
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-equalizer font-green-haze"></i>
                                    <span class="caption-subject ar_text font-green-haze bold uppercase">{{ $titlePage }}</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                {{-- Include Messages Flash --}}
                                @include('dashboard.includes.flash_msg')
                                <div class="view_category">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="content_data lang_ar">
                                                @if($data->service)
                                                    <div class="text_view">
                                                        <p><strong>{{ __('lang.service') }}: </strong> {{ $data->service->title }}</p>
                                                    </div>
                                                @endif
                                                <div class="text_view">
                                                    <p><strong>{{ __('lang.username') }}: </strong> {{ $data->username }}</p>
                                                </div>
                                                <div class="text_view">
                                                    <p><strong>{{ __('lang.phone') }}: </strong> <span style="display: inline-block;direction: ltr">{{ $data->phone }}</span> </p>
                                                </div>
                                                <div class="text_view">
                                                    <p><strong>{{ __('lang.email') }}: </strong> {{ $data->email }}</p>
                                                </div>
                                                @if(!$data->service)
                                                <div class="text_view">
                                                    <p><strong>{{ __('lang.subject') }}: </strong> {{ $data->subject }}</p>
                                                </div>
                                                @endif
                                                <div class="text_view">
                                                    <p><strong>{{ __('lang.message') }}: </strong> </p>
                                                    {{ $data->message }}
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