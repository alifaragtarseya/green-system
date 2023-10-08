@extends('dashboard.layouts.master')
@section('title')
    {{ __('lang.dashboard') }}
@stop
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1> لوحة التحكم
                        <small>إحصائيات ومخططات</small>
                    </h1>
                </div>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <span class="active"> لوحة التحكم</span>
                </li>
            </ul>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('dashboard.services') }}">
                        <div class="dashboard-stat2 bordered">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-green-sharp">
                                        <span data-counter="counterup" data-value="{{ $servicesCount }}">{{  $servicesCount }}</span>
                                    </h3>
                                    <small>عدد الخدمات</small>
                                </div>
                                <div class="icon">
                                    <i class="icon-social-dropbox"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('dashboard.projects') }}">
                        <div class="dashboard-stat2 bordered">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-green-sharp">
                                        <span data-counter="counterup" data-value="{{ $projectsCount  }}">{{ $projectsCount }}</span>
                                    </h3>
                                    <small>عدد المشاريع</small>
                                </div>
                                <div class="icon">
                                    <i class="icon-grid"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div> --}}
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
{{--                    <a href="{{ route('blogs') }}">--}}
                        <div class="dashboard-stat2 bordered">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-green-sharp">
                                        <span data-counter="counterup" data-value="{{  $messages  }}">{{   $messages }}</span>
                                    </h3>
                                    <small>عدد الرسايل</small>
                                </div>
                                <div class="icon">
                                    <i class="icon-envelope-open"></i>
                                </div>
                            </div>
                        </div>
{{--                    </a>--}}
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
{{--                    <a href="{{ route('features') }}">--}}
                        <div class="dashboard-stat2 bordered">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-blue-sharp">
                                        <span data-counter="counterup" data-value="{{ $requests }}">{{ $requests }}</span>
                                    </h3>
                                    <small>عددالطلبات</small>
                                </div>
                                <div class="icon">
                                    <i class="icon-question"></i>
                                </div>
                            </div>
                        </div>
{{--                    </a>--}}
                </div>
            </div>
            <div class="row main_sec">
                <div class="col-md-6 col-sm-12">
                    <div class="portlet light sec_home_ch">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-equalizer font-green-haze"></i>
                                <span class="caption-subject font-green-haze bold uppercase">أحدث 5 عناصر من الخدمات </span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <table class="table table-bordered table-striped table-condensed flip-content">
                                <thead class="flip-content">
                                <tr>
                                    <th> أسم الخدمة </th>
                                    <th> الأيقون </th>
                                    <th> التحكم </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $get)
                                    <tr>
                                        <td style="width: 300px;">{{ $get->title }}</td>
                                        <td><i class="icon_view {{ $get->icon }}"></i></td>
                                        <td style="width: 110px;">
                                            <a href="{{ route('dashboard.services.view', $get->id) }}" title="{{ __('lang.details_service') }}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('dashboard.services.edit', $get->id) }}" title="{{ __('lang.edit_service') }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @if(!count($services))
                                <div class="text-center">
                                    <p>لا توجد بيانات لعرضها</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-6 col-sm-12">
                    <div class="portlet light sec_home_ch">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-equalizer font-green-haze"></i>
                                <span class="caption-subject font-green-haze bold uppercase">أحدث 5 عناصر من المشاريع </span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <table class="table table-bordered table-striped table-condensed flip-content">
                                <thead class="flip-content">
                                <tr>
                                    <th> أسم المشروع </th>
                                    <th> الصورة </th>
                                    <th> التحكم </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projects as $get)
                                    <tr>
                                        <td style="width: 300px;">{{ $get->title }}</td>
                                        <td style="width: 300px;"><img style="width: 130px;" src="{{ count($get->images) ? asset($get->images->first()->image) : asset('images/default.png') }}" alt="{{ $get->title }}"></td>

                                        <td style="width: 110px;">
                                            <a href="{{ route('dashboard.projects.view', $get->id) }}" title="{{ __('lang.details_project') }}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @if(!count($projects))
                                <div class="text-center">
                                    <p>لا توجد بيانات لعرضها</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@stop

@section('css')
    <link href="{{ asset('assets/flaticons/flaticon.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('js')
    <script src="{{ asset('admin/assets') }}/pages/scripts/dashboard.min.js" type="text/javascript"></script>
    <script src="{{ asset('admin/assets') }}/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
    <script src="{{ asset('admin/assets') }}/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
@stop
