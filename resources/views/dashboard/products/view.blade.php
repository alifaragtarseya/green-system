@php $titlePage = __('lang.edit_product'); @endphp
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
                <form action="{{ route('dashboard.products.delete', $data->id) }}" method="post" class="del_pro">
                    @csrf
                    <button class="confirm-btn icon_item red_icon" title="{{ __('lang.delete_product') }}" type="submit"><i class="icon-trash"></i></button>
                </form>
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
                    <span class="active">{{ $data->title }}</span>
                </li>
            </ul>
            <div class="row">
                <div class="col-md-12">
                    {{-- Include Products Tabs --}}
                    @include('dashboard.products.include')
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
                                        <div style="padding: 0;" class="form-body form_add form_product">
                                            @include('dashboard.includes.flash_msg')
                                            <div class="row">
                                                <form method="post" action="{{ route('dashboard.products.update', $data->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-md-12">
                                                        <ul class="nav nav-tabs sub_tabs">
                                                            <li class="active">
                                                                <a href="#Information" data-toggle="tab"> {{ __('lang.details') }} </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-content sub_content">
                                                        <div class="tab-pane fade active in" id="Information">
                                                            <div class="col-md-12">
                                                                <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                                                                    <label for="category">{{ __('lang.category') }} <span class="required">*</span></label>
                                                                    <select required id="category_id" data-title="{{ __('lang.choose') }} {{ __('lang.category') }}" name="category_id[]" data-live-search="true" class="form-control bs-select" multiple>
                                                                        @foreach($categories as $get)
                                                                            <option {{ in_array($get->id, $categoriesId) ? 'selected' : '' }} value="{{ $get->id }}">{{ $get->title }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
                                                                    <label for="link">{{ __('lang.link') }} </label>
                                                                    <input type="text" id="link" name="link" value="{{ isset($data) ? $data->link: old('link') }}" class="form-control" placeholder="{{ __('lang.link') }}">
                                                                </div>
                                                            </div>
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
                                                                    <textarea id="description_{{ $locale }}" name="{{ $locale }}[description]" class="form-control " placeholder="{{ __('lang.description_'.$locale) }}">{{ isset($data) ? optional($data->translate($locale))->description: old('description') }}</textarea>
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
                                                                                <a href="{{ route('dashboard.products') }}" class="btn default">{{ __('lang.cancel') }}</a>
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


