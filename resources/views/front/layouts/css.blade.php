<link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/animate.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/meanmenu.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/line-awesome.min.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/flaticon.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/nice-select.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/owl.carousel.min.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/owl.theme.default.min.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/magnific-popup.min.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/responsive.css">
@if ($dir == 'rtl')
    <link rel="stylesheet" href="{{ asset('assets') }}/css/rtl.css">
@endif

<link rel="stylesheet" href="{{ asset('front/ArbFonts.com/ArbFONTS-59GE-SS-Two.otf') }}">
<link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">

@if (app()->getLocale() == 'ar')
    <style>
        * {
            font-family: 'GE SS Two Bold';
        }

        body,
        html,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        a,
        span,
        div,
        * {
            font-family: 'GE SS Two Bold' !important;
        }
    </style>
@else
    <style>
        * {
            font-family: 'Source Sans 3', sans-serif;
        }

        body,
        html,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        a,
        span,
        div,
        * {
            font-family: 'Source Sans 3', sans-serif !important;
        }
    </style>
@endif
