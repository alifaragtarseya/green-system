@php $titlePage = __('lang.slider') @endphp
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
                @if (!count($data))

                <a class="add_slider" title="{{ __('lang.add_slider') }}" href="{{ route('dashboard.slider.create') }}"><i
                        class="icon-plus"></i></a>
                @endif
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

                        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                            <a href="{{ route('dashboard.slider.meta', 'slider') }}" class="dashboard_statistic">
                                <div class="dashboard-stat2 bordered w3-round-large">
                                    <div class="display" style="margin: 0px">
                                        <div class="number">
                                            <div class="w3-text-black w3-xlarge w3-margin-bottom">
                                                <span data-counter="counterup" data-value="1">1</span>
                                            </div>
                                            <div class="w3-  w3-text-gray">{{ __('lang.meta_tags') }}</div>
                                        </div>
                                        <div class="icon text-main" style="padding: 15px">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-search">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-12">
                                <form action="{{ route('dashboard.slider.deletes') }}" method="post" id="deletesData">
                                    @csrf
                                <div class="portlet light bordered">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption caption-md">
                                            <i class="icon-globe theme-font hide"></i>
                                            <span
                                                class="caption-subject font-blue-madison bold uppercase">{{ $titlePage }}</span>
                                        </div>
                                            {{-- <button type="submit"
                                                class="btn btn-danger pull-right btnDeleteAll">{{ __('lang.delete_selected') }}</button> --}}
                                    </div>
                                    <div class="portlet-body form">
                                        <div style="padding: 0;" class="form-body form_add form_product">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table style="margin-top: 10px;"
                                                            class="table table-bordered table-striped table-condensed flip-content">
                                                            <thead class="flip-content">
                                                                <tr>
                                                                    <th style="width: 50px;">#</th>
                                                                    <th> {{ __('lang.image') }} </th>
                                                                    <th> {{ __('lang.title') }} </th>
                                                                    <th> {{ __('lang.description') }} </th>
                                                                    <th> {{ __('lang.link') }} </th>
                                                                        {{-- <th> {{ __('lang.status') }} </th> --}}
                                                                        <th style="width: 150px;"> {{ __('lang.control') }}
                                                                        </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($data as $get)
                                                                    <tr>
                                                                        <td>
                                                                            {{ $loop->iteration }}
                                                                        </td>
                                                                        <td class="open_img">
                                                                            <a href="{{ asset($get->image) }}"
                                                                                title="{{ $get->title }}">
                                                                                <img style="width: 200px;height: 70px;border-radius: 4px;"
                                                                                    src="{{ asset($get->image) }}">
                                                                            </a>
                                                                        </td>
                                                                        <td class="">
                                                                            {{ $get->title }}
                                                                        </td>
                                                                        <td class="">
                                                                            {{str_limit( $get->description, 50) }}
                                                                        </td>
                                                                        <td>
                                                                            @if ($get->link !== null)
                                                                                <a class="view_link"
                                                                                    href="{{ $get->link }}"
                                                                                    target="_blank"><span>{{ __('lang.view') }}</span></a>
                                                                            @else
                                                                                ----
                                                                            @endif
                                                                        </td>
                                                                            {{-- <td>
                                                                                @if ($get->hide == 0)
                                                                                    <a type="button"
                                                                                        data-id="{{ route('dashboard.slider.status', $get->id) }}"
                                                                                        style="background-color: #27ae60 !important;"
                                                                                        title="{{ __('lang.hiding') }}"
                                                                                        class="btn btn-default btn-new BtnStatus"><i
                                                                                            style="color: #fff !important;"
                                                                                            class="fa fa-eye"></i></a>
                                                                                @else
                                                                                    <a type="button"
                                                                                        data-id="{{ route('dashboard.slider.status', $get->id) }}"
                                                                                        style="background-color: #c0392b !important;"
                                                                                        title="{{ __('lang.showing') }}"
                                                                                        class="btn btn-danger btn-new btn-black BtnStatus"><i
                                                                                            style="color: #fff !important;"
                                                                                            class="fa fa-eye-slash"></i></a>
                                                                                @endif
                                                                            </td> --}}
                                                                        <td>
                                                                                <a href="{{ route('dashboard.slider.edit', $get->id) }}"
                                                                                    title="{{ __('lang.edit') }}"
                                                                                    class="btn btn-info"><i
                                                                                        class="fa fa-edit"></i></a>
                                                                                <a type="button"
                                                                                    title="{{ __('lang.delete') }}"
                                                                                    data-id="{{ route('dashboard.slider.delete', $get->id) }}"
                                                                                    class="btn btn-danger confirmDeleteItem"><i
                                                                                        class="fa fa-trash"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                </div>
                                                @if (!count($data))
                                                    <div class="text-center">
                                                        <p>{{ __('lang.no_data') }}</p>
                                                    </div>
                                                @endif
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
        <form id="delete-form" style="display:none;" method="post">@csrf</form>

        <form id="statusForm" style="display:none;" method="post">@csrf</form>
@stop
@section('css')
    <link href="{{ asset('admin/assets') }}/css/magnific-popup.css" rel="stylesheet" type="text/css" />
@stop
@section('js')
    <script src="{{ asset('admin/assets') }}/js/jquery.magnific-popup.min.js"></script>


@stop
