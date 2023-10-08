@php $titlePage = __('lang.principle'); @endphp
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
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="{{ route('dashboard') }}">{{ __('lang.dashboard') }}</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">{{ $titlePage }}</span>
                </li>
            </ul>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-equalizer font-green-haze"></i>
                                <span class="caption-subject font-green-haze bold uppercase">{{ $titlePage }}</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            {{-- Include Messages Flash --}}
                            @include('dashboard.includes.flash_msg')
                            <form method="post" action="{{ route('dashboard.setting.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body form_add">
                                    <div class="row">
                                        @foreach (config('translatable.locales') as $locale)
                                        <div class="col-md-12 pt-2">
                                            <label for="principle_description-{{ $locale }}"> {{ __('lang.description_' . $locale) }}</label>
                                            <textarea name="principle_description_{{ $locale }}" class="form-control" id="" cols="1" rows="10">
                                                {{ old('principle_description_' . $locale,optional($my_settings->where('key', 'principle_description_' . $locale))->first()->value ?? '',) }}
                                            </textarea>

                                        </div>
                                    @endforeach

                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <button type="submit" id="submit" class="btn green">{{ __('lang.submit') }}</button>
                                                    <a href="{{ route('dashboard') }}" class="btn default">{{ __('lang.cancel') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link href="{{ asset('admin/assets') }}/global/plugins/jquery-minicolors/jquery.minicolors.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets') }}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
@stop

@section('js')
    <script src="{{ asset('admin/assets') }}/global/plugins/jquery-minicolors/jquery.minicolors.min.js" type="text/javascript"></script>
    <script src="{{ asset('admin/assets') }}/pages/scripts/components-color-pickers.min.js" type="text/javascript"></script>
    <script src="{{ asset('admin/assets') }}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
@stop
