@php
    $titlePage = Request::is('dashboard/contact*') ? __('lang.messages') : __('lang.requests');
@endphp
@extends('dashboard.layouts.master')
@section('title')
    {{ $titlePage }}
@stop
@section('content')
    <div class="page-content-wrapper boxed-items">
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
                    {{-- Include Messages Flash --}}
                    @include('dashboard.includes.flash_msg')
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
                                                <table style="margin-top: 10px;" class="table table-bordered table-striped table-condensed flip-content">
                                                    <thead class="flip-content">
                                                    <tr>
                                                        <th><input type="checkbox" class="checkbox-style" id="roleSelect"></th>
                                                        @if(Request::is('dashboard/requests*'))
                                                            <th> {{ __('lang.service') }} </th>
                                                        @endif
                                                        <th> {{ __('lang.username') }}</th>
                                                        <th> {{ __('lang.phone') }} </th>
                                                        <th> {{ __('lang.email') }} </th>
                                                        <th style="width: 150px;"> {{ __('lang.control') }} </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($data as $get)
                                                        <tr class="{{ $get->view == 0 ? 'bgGray' : '' }}">
                                                            <td><input type="checkbox" class="checkbox-style roleCheck" value="{{ $get->id }}" name="data[]"></td>
                                                            @if($get->service)
                                                                <td>{{ $get->service->title }}</td>
                                                            @endif
                                                            <td>{{ $get->username }}</td>
                                                            <td style="direction: ltr">{{ $get->phone }}</td>
                                                            <td>{{ $get->email }}</td>
                                                            <td>
                                                                <a href="{{ $get->service ? route('dashboard.requests.view', $get->id) : route('dashboard.contact.view', $get->id) }}" title="{{ __('lang.details_message') }}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                                                <a href="javascript:;" title="{{ __('lang.delete') }}" class="btn btn-danger confirm"><i class="fa fa-trash"></i></a>
                                                                <form id="delete-form" style="display:none;" action="{{ $get->service ? route('dashboard.requests.delete', $get->id) : route('dashboard.contact.delete', $get->id) }}" method="post">@csrf</form>
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

@section('css')
    <link href="{{ asset('assets/flaticons/flaticon.css') }}" rel="stylesheet" type="text/css" />
@stop
