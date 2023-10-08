@php $titlePage = __('lang.edit_project'); @endphp
@extends('dashboard.layouts.master')
@section('title')
    {{ $data->title }}
@stop
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>{{ $titlePage }}</h1>
                </div>
                <form action="{{ route('dashboard.projects.delete', $data->id) }}" method="post" class="del_pro">
                    @csrf
                    <button class="confirm-btn icon_item red_icon" title="{{ __('lang.delete_project') }}" type="submit"><i class="icon-trash"></i></button>
                </form>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="{{ route('dashboard') }}">{{ __('lang.dashboard') }}</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('dashboard.projects') }}">{{ __('lang.projects') }}</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">{{ $data->title }}</span>
                </li>
            </ul>
            <div class="row">
                <div class="col-md-12">
                    {{-- Include Products Tabs --}}
                    @include('dashboard.projects.include')
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption caption-md">
                                            <i class="icon-globe theme-font hide"></i>
                                            <span class="caption-subject font-blue-madison bold uppercase">{{ $titlePage }}</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <div style="padding: 0;" class="form-body form_add form_project">
                                            @include('dashboard.includes.flash_msg')
                                            <div class="row">
                                                <form method="post" action="{{ route('dashboard.projects.update', $data->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-md-12">
                                                        <ul class="nav nav-tabs sub_tabs">
                                                            <li class="active">
                                                                <a href="#Information" data-toggle="tab"> {{ __('lang.details') }} </a>
                                                            </li>
                                                            <li>
                                                                <a href="#Meta" data-toggle="tab"> {{ __('lang.meta') }} </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-content sub_content">
                                                        <div class="tab-pane fade active in" id="Information">
                                                            @foreach(config('translatable.locales') as $locale)
                                                            <div class="col-md-12">
                                                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                                                    <label for="title_{{ $locale }}">  {{ __('lang.title_'.$locale) }} <span class="required">*</span></label>
                                                                    <input type="text" id="title_{{ $locale }}" name="{{ $locale }}[title]" value="{{ isset($data) ? optional($data->translate($locale))->title: old('title') }}" class="form-control" placeholder="{{ __('lang.title_'.$locale) }}">
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                            @foreach(config('translatable.locales') as $locale)
                                                            <div class="col-md-12">
                                                                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                                                    <label for="description_{{ $locale }}"> {{ __('lang.description_'.$locale) }} <span class="required">*</span></label>
                                                                    <textarea id="description_{{ $locale }}" name="{{ $locale }}[description]" class="form-control tinymce_ar" placeholder="{{ __('lang.description_'.$locale) }}">{{ isset($data) ? optional($data->translate($locale))->description: old('description') }}</textarea>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="tab-pane fade" id="Meta">
                                                            @foreach(config('translatable.locales') as $locale)
                                                            <div class="col-md-12">
                                                                <div class="form-group {{ $errors->has('meta_keywords') ? 'has-error' : '' }}">
                                                                    <label for="meta_keywords_{{ $locale }}">{{ __('lang.meta_keywords_'.$locale) }}</label>
                                                                    <textarea id="meta_keywords_{{ $locale }}" name="{{ $locale }}[meta_keywords]" class="form-control" placeholder="{{ __('lang.meta_keywords_'.$locale) }}">{{ isset($data) ? optional($data->translate($locale))->meta_keywords: old('meta_keywords') }}</textarea>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                            @foreach(config('translatable.locales') as $locale)
                                                            <div class="col-md-12">
                                                                <div class="form-group {{ $errors->has('meta_description') ? 'has-error' : '' }}">
                                                                    <label for="meta_description_{{ $locale }}"> {{ __('lang.meta_description_'.$locale) }} </label>
                                                                    <textarea id="meta_description_{{ $locale }}" name="{{ $locale }}[meta_description]" class="form-control" placeholder="{{ __('lang.meta_description_'.$locale) }}">{{ isset($data) ? optional($data->translate($locale))->meta_description: old('meta_description') }}</textarea>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-actions">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                                                            <div class="col-md-9">
                                                                                <button type="submit" id="submit" class="btn green">{{ __('lang.submit') }}</button>
                                                                                <a href="{{ route('dashboard.projects') }}" class="btn default">{{ __('lang.cancel') }}</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </form>
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
@endsection


