@php $setting = \App\Models\Setting::first(); @endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <title>404 | {{ __('lang.page_not_found') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Mentora Studio" name="author" />
    <link rel="shortcut icon" href="{{ $setting->favicon }}" />
    <link href="{{ asset('admin/assets') }}/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets') }}/pages/css/error.css" rel="stylesheet" type="text/css" />
    <style>:root{--MainColor: {{ $setting->main_color }}; --MainBorderColor: {{ $setting->main_color }};}</style>
</head>
<body class=" page-404-full-page">
<div class="row">
    <div class="col-md-12 page-404">
        <div class="number"> 404 </div>
        <div class="details">
            <h3>{{ __('lang.sorry') }}! {{ __('lang.page_not_found') }}.</h3>
            <p> {{ __('lang.we_can_find') }}.
                <br/>
                <a href="{{ url('dashboard') }}"> {{ __('lang.go_to_home') }}</a>. </p>
        </div>
    </div>
</div>
</body>
</html>
