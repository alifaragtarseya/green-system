@php $titlePage = __('lang.setting'); @endphp
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
                            <form method="post" action="{{ route('update-setting') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body form_add">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group {{ $errors->has('site_name') ? 'has-error' : '' }}">
                                                <label for="site_name">{{ __('lang.site_name') }} <span class="required">*</span> </label>
                                                <input type="text" name="site_name" id="site_name" value="{{ old('site_name', $data->site_name) }}" class="form-control" placeholder="{{ __('lang.enter') }} {{ __('lang.site_name') }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {{ $errors->has('sm_description') ? 'has-error' : '' }}">
                                                <label for="sm_description">{{ __('lang.small_desc') }} <span class="required">*</span> </label>
                                                <textarea name="sm_description" id="sm_description" class="form-control" placeholder="{{ __('lang.enter') }} {{ __('lang.small_desc') }}">{{ old('sm_description', $data->sm_description) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {{ $errors->has('sm_description_en') ? 'has-error' : '' }}">
                                                <label for="sm_description_en">{{ __('lang.small_desc_en') }} <span class="required">*</span> </label>
                                                <textarea name="sm_description_en" id="sm_description_en" class="form-control" placeholder="{{ __('lang.enter') }} {{ __('lang.small_desc_en') }}">{{ old('sm_description_en', $data->sm_description_en) }}</textarea>
                                            </div>
                                        </div>
                                          {{-- <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                                <label for="phone">{{ __('lang.phone') }}  <span class="required">*</span> </label>
                                                <input type="text" name="phone" id="phone" value="{{ old('phone', $data->phone) }}" class="form-control dir_ltr" placeholder="{{ __('lang.enter') }} {{ __('lang.phone') }} " />
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('phone_1') ? 'has-error' : '' }}">
                                                <label for="phone_1">{{ __('lang.phone') }} 1 <span class="required">*</span> </label>
                                                <input type="text" name="phone_1" id="phone_1" value="{{ old('phone_1', $data->phone_1) }}" class="form-control dir_ltr" placeholder="{{ __('lang.enter') }} {{ __('lang.phone') }} 1" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('phone_2') ? 'has-error' : '' }}">
                                                <label for="phone_2">{{ __('lang.phone') }} 2 </label>
                                                <input type="text" name="phone_2" id="phone_2" value="{{ old('phone_2', $data->phone_2) }}" class="form-control dir_ltr" placeholder="{{ __('lang.enter') }} {{ __('lang.phone') }} 2" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('whatsapp_phone') ? 'has-error' : '' }}">
                                                <label for="whatsapp_phone">{{ __('lang.whatsapp_phone') }} <span class="required"> {{ __('lang.whatsapp_with_contry_code') }} </span></label>
                                                <input type="text" name="whatsapp_phone" id="whatsapp_phone" value="{{ old('whatsapp_phone', $data->whatsapp_phone) }}" class="form-control dir_ltr" placeholder="{{ __('lang.enter') }} {{ __('lang.whatsapp_phone') }} " />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('email_1') ? 'has-error' : '' }}">
                                                <label for="email_1">{{ __('lang.email') }} 1<span class="required">*</span></label>
                                                <input type="email" name="email_1" id="email_1" value="{{ old('email_1', $data->email_1) }}" class="form-control dir_ltr" placeholder="{{ __('lang.enter') }} {{ __('lang.email') }} 1" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('email_2') ? 'has-error' : '' }}">
                                                <label for="email_2">{{ __('lang.email') }} 2</label>
                                                <input type="email" name="email_2" id="email_2" value="{{ old('email_2', $data->email_2) }}" class="form-control dir_ltr" placeholder="{{ __('lang.enter') }} {{ __('lang.email') }} 2" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                                <label for="address">{{ __('lang.address') }} </label>
                                                <input type="text" name="address" id="address" value="{{ old('address', $data->address) }}" class="form-control" placeholder="{{ __('lang.enter') }} {{ __('lang.address') }} " />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('address_en') ? 'has-error' : '' }}">
                                                <label for="address_en">{{ __('lang.address_en') }} </label>
                                                <input type="text" name="address_en" id="address_en" value="{{ old('address_en', $data->address_en) }}" class="form-control" placeholder="{{ __('lang.enter') }} {{ __('lang.address_en') }} " />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                                                <label for="location">رابط العنوان علي الخريطة </label>
                                                <input type="text" name="location" id="location" value="{{ old('location', $data->location) }}" class="form-control dir_ltr_links" placeholder="{{ __('lang.enter') }} العنوان علي الخريطة " />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
                                                <label for="facebook">{{ __('lang.facebook') }}</label>
                                                <input type="url" name="facebook" id="facebook" value="{{ old('facebook', $data->facebook) }}" class="form-control dir_ltr_links" placeholder="{{ __('lang.enter') }}  {{ __('lang.link') }} {{ __('lang.facebook') }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('twitter') ? 'has-error' : '' }}">
                                                <label for="twitter">{{ __('lang.twitter') }}</label>
                                                <input type="url" name="twitter" id="twitter" value="{{ old('twitter', $data->twitter) }}" class="form-control dir_ltr_links" placeholder="{{ __('lang.enter') }} {{ __('lang.twitter') }} {{ __('lang.link') }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('instagram') ? 'has-error' : '' }}">
                                                <label for="instagram">{{ __('lang.instagram') }}</label>
                                                <input type="url" name="instagram" id="instagram" value="{{ old('instagram', $data->instagram) }}" class="form-control dir_ltr_links" placeholder="{{ __('lang.enter') }} {{ __('lang.instagram') }} {{ __('lang.link') }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('snapchat') ? 'has-error' : '' }}">
                                                <label for="snapchat">{{ __('lang.snapchat') }}</label>
                                                <input type="url" name="snapchat" id="snapchat" value="{{ old('snapchat', $data->snapchat) }}" class="form-control dir_ltr_links" placeholder="{{ __('lang.enter') }} {{ __('lang.snapchat') }} {{ __('lang.link') }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('tiktok') ? 'has-error' : '' }}">
                                                <label for="tiktok">{{ __('lang.tiktok') }}</label>
                                                <input type="url" name="tiktok" id="tiktok" value="{{ old('tiktok', $data->tiktok) }}" class="form-control dir_ltr_links" placeholder="{{ __('lang.enter') }} {{ __('lang.tiktok') }} {{ __('lang.link') }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('who_we_are_video') ? 'has-error' : '' }}">
                                                <label for="who_we_are_video">{{ __('lang.who_we_are_video') }}</label>
                                                <input type="url" name="who_we_are_video" id="who_we_are_video" value="{{ old('who_we_are_video', $data->who_we_are_video) }}" class="form-control dir_ltr_links" placeholder="{{ __('lang.enter') }} {{ __('lang.who_we_are_video') }} {{ __('lang.link') }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                                                <label class="display-block" for="logo">{{ __('lang.choose') }} {{ __('lang.logo') }} <span class="required"> {{ __('lang.best_size') }} (110 * 47)</span></label>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        <img src="{{ asset($data->logo) }}"/>
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                                    <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> {{ __('lang.choose') }} {{ __('lang.logo') }}</span>
                                                                <span class="fileinput-exists">{{ __('lang.change') }} {{ __('lang.logo') }} </span>
                                                                <input type="file" name="logo" id="logo">
                                                            </span>
                                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ __('lang.delete') }} {{ __('lang.image') }} </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('contact_us_img') ? 'has-error' : '' }}">
                                                <label class="display-block" for="contact_us_img">{{ __('lang.choose') }} {{ __('lang.contact_us_img') }} <span class="required"> {{ __('lang.best_size') }} (110 * 47)</span></label>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail black_icon">
                                                        <img src="{{ asset($data->contact_us_img) }}"/>
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                                    <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> {{ __('lang.choose') }} {{ __('lang.favicon') }}</span>
                                                                <span class="fileinput-exists">{{ __('lang.change') }} {{ __('lang.favicon') }} </span>
                                                                <input type="file" name="contact_us_img" id="contact_us_img">
                                                            </span>
                                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ __('lang.delete') }} {{ __('lang.image') }} </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('logo_white') ? 'has-error' : '' }}">
                                                <label class="display-block" for="logo_white">{{ __('lang.choose') }} {{ __('lang.logo_white') }} <span class="required"> {{ __('lang.best_size') }} (110 * 47)</span></label>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail black_icon">
                                                        <img src="{{ asset($data->logo_white) }}"/>
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                                    <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> {{ __('lang.choose') }} {{ __('lang.logo') }}</span>
                                                                <span class="fileinput-exists">{{ __('lang.change') }} {{ __('lang.logo') }} </span>
                                                                <input type="file" name="logo_white" id="logo_white">
                                                            </span>
                                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ __('lang.delete') }} {{ __('lang.image') }} </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('favicon') ? 'has-error' : '' }}">
                                                <label class="display-block" for="favicon">{{ __('lang.choose') }} {{ __('lang.favicon') }} <span class="required"> {{ __('lang.best_size') }} (50 * 50)</span></label>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        <img src="{{ asset($data->favicon) }}"/>
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                                    <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> {{ __('lang.choose') }} {{ __('lang.favicon') }}</span>
                                                                <span class="fileinput-exists">{{ __('lang.change') }} {{ __('lang.favicon') }} </span>
                                                                <input type="file" name="favicon" id="favicon">
                                                            </span>
                                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ __('lang.delete') }} {{ __('lang.image') }} </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('favicon_white') ? 'has-error' : '' }}">
                                                <label class="display-block" for="favicon_white">{{ __('lang.choose') }} {{ __('lang.favicon') }} <span class="required"> {{ __('lang.best_size') }} (50 * 50)</span></label>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail black_icon">
                                                        <img src="{{ asset($data->favicon_white) }}"/>
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                                    <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> {{ __('lang.choose') }} {{ __('lang.favicon') }}</span>
                                                                <span class="fileinput-exists">{{ __('lang.change') }} {{ __('lang.favicon') }} </span>
                                                                <input type="file" name="favicon_white" id="favicon_white">
                                                            </span>
                                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ __('lang.delete') }} {{ __('lang.image') }} </a>
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
