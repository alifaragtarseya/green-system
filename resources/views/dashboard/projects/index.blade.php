@extends('dashboard.layouts.master')
@section('title')
    {{ __('lang.projects') }}
@stop
@section('content')
    <div class="page-content-wrapper boxed-items projects">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>{{ __('lang.projects') }}</h1>
                </div>
                <a class="add_products" title="{{ __('lang.add_project') }}" href="{{ route('dashboard.projects.create') }}"><i class="icon-plus"></i></a>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="{{ route('dashboard') }}">{{ __('lang.dashboard') }}</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">{{ __('lang.projects') }}</span>
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
                                        <span class="caption-subject font-blue-madison bold uppercase">{{ __('lang.projects') }}</span>
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
                                                        <th> {{ __('lang.project') }} <i class="fab fa-accusoft"></i></th>
                                                        <th> {{ __('lang.image') }} </th>
                                                        <th> {{ __('lang.status') }} </th>
                                                        <th style="width: 150px;"> {{ __('lang.control') }} </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($data as $get)
                                                        <tr>
                                                            <td><input type="checkbox" class="checkbox-style roleCheck" value="{{ $get->id }}" name="data[]"></td>
                                                            <td style="width: 500px;">{{ $get->title }}</td>
                                                            <td style="width: 300px;"><img style="width: 200px;" src="{{ count($get->images) ? asset($get->images->first()->image) : asset('images/default.png') }}" alt="{{ $get->title }}"></td>
                                                            <td>
                                                                <form class="inline" action="{{ route('dashboard.projects.status', $get->id) }}" method="post">
                                                                    @csrf
                                                                    @if($get->hide == 0)
                                                                        <button style="background-color: #27ae60 !important;" title="Hidden" class="btn btn-default btn-new btn_confirm"><i style="color: #fff !important;" class="fa fa-eye"></i></button>
                                                                    @else
                                                                        <button style="background-color: #c0392b !important;" title="{{ __('lang.project') }}" class="btn btn-danger btn-new btn-black btn_confirm"><i style="color: #fff !important;" class="fa fa-eye-slash"></i></button>
                                                                    @endif
                                                                </form>
                                                            </td>

                                                            <td>
                                                                <a href="{{ route('dashboard.projects.view', $get->id) }}" title="{{ __('lang.details_project') }}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                                                <a href="javascript:;" title="{{ __('lang.delete') }}" class="btn btn-danger confirm"><i class="fa fa-trash"></i></a>
                                                                <form id="delete-form" style="display:none;" action="{{ route('dashboard.projects.delete', $get->id) }}" method="post">@csrf</form>
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