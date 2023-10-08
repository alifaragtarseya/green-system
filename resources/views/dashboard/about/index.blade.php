@php $titlePage = __('lang.about_company'); @endphp
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
                                <form method="post" action="{{ route('dashboard.about', $data->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body form_add">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#General" data-toggle="tab"> {{ __('lang.general') }} </a>
                                                    </li>
                                                    <li>
                                                        <a href="#Information" data-toggle="tab"> {{ __('lang.details') }} </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane fade active in" id="General">
                                                        <div class="col-md-8">
                                                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                                                <label class="display-block" for="image">{{ __('lang.choose') }} {{ __('lang.image') }} <span class="required"> {{ __('lang.best_size') }} (({{ __('lang.width') }}: 700) * ({{ __('lang.height') }}: 700))</span></label>
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail">
                                                                        <img src="{{ asset($data->image) }}"/>
                                                                    </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> {{ __('lang.choose') }} {{ __('lang.image') }}</span>
                                                                            <span class="fileinput-exists">{{ __('lang.change') }} {{ __('lang.image') }} </span>
                                                                            <input type="file" name="image" id="image">
                                                                        </span>
                                                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ __('lang.delete') }} {{ __('lang.image') }} </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="Information">
                                                        <div class="col-md-12">
                                                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                                                <label for="title"> {{ __('lang.title2') }}<span class="required">*</span></label>
                                                                <input type="text" id="title" name="title" value="{{ old('title', $data->title ?? '') }}" class="form-control" placeholder="{{ __('lang.enter') }} {{ __('lang.title2') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group {{ $errors->has('title_en') ? 'has-error' : '' }}">
                                                                <label for="title_en"> {{ __('lang.title2_en') }}<span class="required">*</span></label>
                                                                <input type="text" id="title_en" name="title_en" value="{{ old('title_en', $data->title_en ?? '') }}" class="form-control" placeholder="{{ __('lang.enter') }} {{ __('lang.title2') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                                                <label for="description"> {{ __('lang.description') }} <span class="required">*</span></label>
                                                                <textarea id="description" name="description" class="form-control tinymce_ar" placeholder="أدخل الوصف">{{ old('description', $data->description) }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group {{ $errors->has('description_en') ? 'has-error' : '' }}">
                                                                <label for="description_en"> {{ __('lang.description_en') }} <span class="required">*</span></label>
                                                                <textarea id="description_en" name="description_en" class="form-control tinymce_ar" placeholder="{{ __('lang.enter') }} {{ __('lang.description') }}">{{ old('description_en', $data->description_en) }}</textarea>
                                                            </div>
                                                        </div>
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
    </div>
@stop
