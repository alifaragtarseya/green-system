@php $titlePage = __('lang.product_features'); @endphp
@extends('dashboard.layouts.master')
@section('title')
    {{ $data->title }} | {{ $titlePage }}
@stop

@section('css')
    <link href="{{ asset('assets/flaticons/flaticon.css') }}" rel="stylesheet" type="text/css" />
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
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="portlet light bordered">
                                                        <div class="portlet-title tabbable-line">

                                                            <a href="{{ route('dashboard.products.features.create', $data->id) }}" class="btn btn-primary" style="float: left">{{ __('lang.add_feature') }}</a>
                                                        </div>
                                                        <div class="portlet-body form">
                                                            <div style="padding: 0;" class="form-body form_add form_product">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <table style="margin-top: 10px;" class="table table-bordered table-striped table-condensed flip-content">
                                                                            <thead class="flip-content">
                                                                            <tr>
                                                                                <th> {{ __('lang.feature') }} <i class="fab fa-accusoft"></i></th>
                                                                                <th> {{ __('lang.description') }} <i class="fab fa-accusoft"></i></th>
                                                                                <th> {{ __('lang.icon') }} </th>
                                                                                <th style="width: 150px;"> {{ __('lang.control') }} </th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            @foreach($data->features as $get)
                                                                                <tr>
                                                                                    <td style="width: 500px;">{{ $get->title }}</td>
                                                                                    <td style="width: 500px;">{{ $get->description }}</td>
                                                                                    <td style="width: 300px;"><img style="width: 110px;" src="{{ $get->icon ? asset($get->icon) : asset('images/default.png') }}" alt="{{ $get->title }}"></td>
                                                                                    <td>
                                                                                        <a href="javascript:;" title="{{ __('lang.delete') }}" class="btn btn-danger confirm"><i class="fa fa-trash"></i></a>
                                                                                        <form id="delete-form" style="display:none;" action="{{ route('dashboard.products.feature.delete', ['id'=>$data->id, 'featureId'=> $get->id]) }}" method="post">@csrf</form>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    @if(count($data->features) == 0)
                                                                        <div class="text-center"><p>{{ __('lang.no_data') }}</p></div>
                                                                    @endif
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
            </div>
        </div>
    </div>
@stop

@section('css')
    <link href="{{ asset('admin/assets') }}/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets') }}/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets') }}/css/magnific-popup.css" rel="stylesheet" type="text/css" />
@stop
@section('js')
    <script src="{{ asset('admin/assets') }}/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
    <script src="{{ asset('admin/assets') }}/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js" type="text/javascript"></script>
    <script src="{{ asset('admin/assets') }}/global/plugins/jquery-file-upload/js/vendor/load-image.min.js" type="text/javascript"></script>
    <script src="{{ asset('admin/assets') }}/global/plugins/jquery-file-upload/js/jquery.fileupload.js" type="text/javascript"></script>
    <script src="{{ asset('admin/assets') }}/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js" type="text/javascript"></script>
    <script src="{{ asset('admin/assets') }}/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js" type="text/javascript"></script>
    <script src="{{ asset('admin/assets') }}/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js" type="text/javascript"></script>
    <script src="{{ asset('admin/assets') }}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="{{ asset('admin/assets') }}/pages/scripts/form-fileupload.min.js" type="text/javascript"></script>

    <script src="{{ asset('admin/assets') }}/js/jquery.magnific-popup.min.js"></script>

@stop
