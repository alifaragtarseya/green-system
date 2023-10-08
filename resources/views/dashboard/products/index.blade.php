@extends('dashboard.layouts.master')
@section('title')
    {{ __('lang.products') }}
@stop
@section('content')
    <div class="page-content-wrapper boxed-items products">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>{{ __('lang.products') }}</h1>
                </div>
                <a class="add_products" title="{{ __('lang.add_product') }}" href="{{ route('dashboard.products.create') }}"><i class="icon-plus"></i></a>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="{{ route('dashboard') }}">{{ __('lang.dashboard') }}</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">{{ __('lang.products') }}</span>
                </li>
            </ul>
            <div class="row">
                <div class="col-md-12">
                    {{-- Include Messages Flash --}}
                    @include('dashboard.includes.flash_msg')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption caption-md">
                                        <i class="icon-globe theme-font hide"></i>
                                        <span class="caption-subject font-blue-madison bold uppercase">{{ __('lang.products') }}</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div style="padding: 0;" class="form-body form_add form_product">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table style="margin-top: 10px;" class="table table-bordered table-striped table-condensed flip-content">
                                                    <thead class="flip-content">
                                                    <tr>
                                                        <th><input type="checkbox" class="checkbox-style" id="roleSelect"></th>
                                                        <th> {{ __('lang.product') }} <i class="fab fa-accusoft"></i></th>
                                                        <th> {{ __('lang.description') }} </th>
                                                        <th> {{ __('lang.image') }} </th>
                                                        <th style="width: 150px;"> {{ __('lang.control') }} </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($data as $get)
                                                        <tr>
                                                            <td><input type="checkbox" class="checkbox-style roleCheck" value="{{ $get->id }}" name="data[]"></td>
                                                            <td style="width: 500px;">{{ $get->title }}</td>
                                                            <td style="width: 500px;">{{ $get->description }}</td>
                                                            <td style="width: 300px;"><img style="width: 110px;" src="{{ count($get->images) ? asset($get->images->first()->image) : asset('images/default.png') }}" alt="{{ $get->title }}"></td>

                                                            <td>
                                                                <a href="{{ route('dashboard.products.view', $get->id) }}" title="{{ __('lang.details_product') }}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                                                <a href="javascript:;" title="{{ __('lang.delete') }}" class="btn btn-danger confirm"><i class="fa fa-trash"></i></a>
                                                                <form id="delete-form" style="display:none;" action="{{ route('dashboard.products.delete', $get->id) }}" method="post">@csrf</form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="text-center">
                                                {{ $data->render() }}
                                            </div>
                                            @if(count($data) == 0)
                                                <div class="text-center"><p>{{ __('lang.no_data') }}</p></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="text-center">
                    {{ $data->render() }}
                </div>
            </div>
        </div>
    </div>
@stop
