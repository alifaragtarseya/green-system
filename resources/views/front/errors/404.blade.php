<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset($setting->favicon) }}">
    <title>404</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/404.css') }}" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="notfound"         style="background-image: url({{ asset('front/icon/notfound.jpg') }}); background-size: cover; background-position: center; background-repeat: no-repeat; height: 931px ;">
    <div class="notfound">
        <div class="notfound-404">

        </div>
        <h2 style="color: #fff">نحن آسفون ، لكن الصفحة التي طلبتها لم يتم العثور عليها</h2>
        <a  style="color: #fff;background: #023308; padding: 10px; boreder-radius: 10px;" href="{{ url('/') }}">أذهب إلي الصفحة الرئيسية</a>
    </div>
</div>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-23581568-13');
</script>
</body>
</html>
