@php $titlePage = __('lang.meta_tags'); @endphp
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
                    @if($data->page == 'home')
                        <a href="{{ url('dashboard/slider') }}">{{ __('lang.slider') }}</a>
                    @elseif($data->page == 'about')
                        <a href="{{ url('dashboard/about/1/view') }}">{{ __('lang.about') }}</a>
                    @elseif($data->page == 'services')
                        <a href="{{ url('dashboard/services') }}">{{ __('lang.services') }}</a>
                    @elseif($data->page == 'blogs')
                        <a href="{{ url('dashboard/blogs') }}">{{ __('lang.blogs') }}</a>
                    @elseif($data->page == 'projects')
                        <a href="{{ url('dashboard/projects') }}">{{ __('lang.projects') }}</a>
                    @elseif($data->page == 'contact')
                        <span class="active">{{ __('lang.contact') }}</span>
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
                                    <span class="caption-subject font-green-haze bold uppercase">{{ $titlePage }}</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                {{-- Include Messages Flash --}}
                                @include('dashboard.includes.flash_msg')
                                @php $path; @endphp
                                @if($data->page == 'home')
                                    @php $path = 'slider' @endphp
                                @elseif($data->page == 'about')
                                    @php $path = 'about' @endphp
                                @elseif($data->page == 'services')
                                    @php $path = 'services' @endphp
                                @elseif($data->page == 'blogs')
                                    @php $path = 'blogs' @endphp
                                @elseif($data->page == 'projects')
                                    @php $path = 'projects' @endphp
                                @elseif($data->page == 'contact')
                                    @php $path = 'contact' @endphp
                                @endif
                                <form method="post" action="{{ url('dashboard/'.$path.'/meta') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body form_add">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul class="nav nav-tabs">
                                                    @if($path != 'slider')
                                                        <li class="{{ $path != 'slider' ? 'active' : '' }}">
                                                            <a href="#Banner" data-toggle="tab"> {{ __('lang.banner') }} </a>
                                                        </li>
                                                    @endif
                                                    <li {{ $path == 'slider' ? 'active' : '' }}>
                                                        <a href="#Meta" data-toggle="tab"> {{ __('lang.meta_tags') }} </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane fade {{ $path != 'slider' ? 'active in' : '' }}" id="Banner">
                                                        <div class="col-md-12">
                                                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                                                <label class="display-block" for="image">{{ __('lang.choose') }} {{ __('lang.image') }} <span class="required"> {{ __('lang.best_size') }} (({{ __('lang.width') }}: 1920) * ({{ __('lang.height') }}: 400))</span></label>
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail">
                                                                        <img src="{{ isset($data) ? asset($data->image) : asset('images/default.png') }}"/>
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
                                                    <div class="tab-pane fade {{ $path == 'slider' ? 'active in' : '' }}" id="Meta">
                                                        <div class="col-md-12">
                                                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                                                <label for="title"> عنوان الصفحة <span class="required">*</span></label>
                                                                <input type="text" id="title" name="title" value="{{ old('title', $data->title) }}" class="form-control" placeholder="أدخل عنوان الصفحة">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group {{ $errors->has('keywords') ? 'has-error' : '' }}">
                                                                <label for="keywords">الكلمات الدلالية <span class="required">*</span></label>
                                                                <input type="text" id="keywords" name="keywords" value="{{ old('keywords', $data->keywords) }}" class="form-control" placeholder="أدخل الكلمات الدلالية">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                                                <label for="description">وصف الصفحة  <span class="required">*</span></label>
                                                                <textarea id="description" name="description" class="form-control" placeholder="أدخل وصف الصفحة">{{ old('description', $data->description) }}</textarea>
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
                                                        <a href="{{ url('dashboard/'.$path) }}" class="btn default">{{ __('lang.cancel') }}</a>
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
