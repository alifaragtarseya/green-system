@php
    $services = \App\Models\Services::where('hide', 0)->get();
@endphp
@php $dir = app()->getLocale() == 'ar' ? 'rtl' : 'ltr'; @endphp
<!doctype html>
<html lang="{{ app()->getLocale() }}" direction="{{ $dir }}" dir="{{ $dir }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! stripslashes(JsonLd::generate()) !!}
    <meta name="author" content="Tarseya Digital Marting">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset($setting->favicon) }}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    @include('front.layouts.css')
    @yield('css')


    <style>

    </style>
</head>

<body class="{{ $dir }}">
    {{-- @include('front.layouts.header') --}}
    @include('front.layouts.navbar')
    @yield('content')

    <div class="go-top">
        <i class="las la-long-arrow-alt-up"></i>
    </div>

    @include('front.layouts.script')
    @yield('js')

    @include('front.layouts.footer')
</body>

</html>
