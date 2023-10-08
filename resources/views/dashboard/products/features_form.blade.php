@php $titlePage = __('lang.add_feature'); @endphp
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
                    <a href="{{ route('dashboard.products') }}">{{ __('lang.products') }}</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('dashboard.products.view', $data->id) }}">{{ $data->title }}</a>
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
                                    <span class="caption-subject font-green-haze bold uppercase">{{ $titlePage }}</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                {{-- Include Messages Flash --}}
                                @include('dashboard.includes.flash_msg')
                                <form method="post" action="{{ route('dashboard.products.features.store', $data->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body form_add">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#General" data-toggle="tab"> {{ __('lang.general') }} </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane fade active in" id="General">
                                                        <input type="hidden" name="product_id" value="{{ $data->id }}">
                                                        {{-- <div class="col-md-12">
                                                            <div class="form-group {{ $errors->has('icon') ? 'has-error' : '' }}">
                                                                <label for="icon">{{ __('lang.icon') }} <span class="required">*</span></label>
                                                                <select id="icon" name="icon" data-show-subtext="true"  data-title="{{ __('lang.choose') }} {{ __('lang.icon') }}" data-live-search="true" class="form-control iconsDropdown bs-select">
                                                                    @foreach(iconsList() as $get)
                                                                        @php $code = substr(strstr($get, ':', true), 1); @endphp
                                                                        <option data-icon="iconCategory {{ $code }}" {{ $code == old('icon', $data->icon ?? '') ? 'selected' : '' }} value="{{ $code }}">{{ $code }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div> --}}
                                                        <div class="form-group {{ $errors->has('icon') ? 'has-error' : '' }}">
                                                            <label class="display-block" for="icon">{{ __('lang.choose') }} {{ __('lang.icon') }} <span class="required"> {{ __('lang.best_size') }} (({{ __('lang.width') }}: 200) * ({{ __('lang.height') }}: 200))</span></label>
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail">
                                                                    <img src="{{ isset($data) ? asset($data->icon) : asset('images/default.png') }}"/>
                                                                </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                                                <div>
                                                                    <span class="btn default btn-file">
                                                                        <span class="fileinput-new"> {{ __('lang.choose') }} {{ __('lang.icon') }}</span>
                                                                        <span class="fileinput-exists">{{ __('lang.change') }} {{ __('lang.icon') }} </span>
                                                                        <input type="file" name="icon" id="image">
                                                                    </span>
                                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ __('lang.delete') }} {{ __('lang.icon') }} </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @foreach(config('translatable.locales') as $locale)
                                                        <div class="col-md-6">
                                                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                                                <label for="title_{{ $locale }}">  {{ __('lang.title_'.$locale) }} <span class="required">*</span></label>
                                                                <input type="text" id="title_{{ $locale }}" name="{{ $locale }}[title]" value="{{ isset($feature) ? optional($feature->translate($locale))->title: old('title') }}" class="form-control" placeholder="{{ __('lang.title_'.$locale) }}">
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @foreach(config('translatable.locales') as $locale)
                                                        <div class="col-md-6">
                                                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                                                <label for="description_{{ $locale }}"> {{ __('lang.description_'.$locale) }} <span class="required">*</span></label>
                                                                <textarea id="description_{{ $locale }}" name="{{ $locale }}[description]" class="form-control " placeholder="{{ __('lang.description_'.$locale) }}">{{ isset($feature) ? optional($feature->translate($locale))->description: old('description') }}</textarea>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class=" col-md-9">
                                                        <button type="submit" id="submit" class="btn green">{{ __('lang.submit') }}</button>
                                                        <a href="{{ route('dashboard.products.view', $data->id) }}" class="btn default">{{ __('lang.cancel') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @section('css')
                                        <link href="{{ asset('assets/flaticons/flaticon.css') }}" rel="stylesheet" type="text/css" />
                                    @stop

                                    @section('js')
                                    @stop

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
