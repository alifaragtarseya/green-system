<html lang="ar">
<head>
    <meta charset="utf-8">
    <title>{{ $setting->site_name }}</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        .prev {
            border: 1px dashed #ccc;
            padding: 10px;
            margin-top: 15px;
        }
    </style>
</head>
<body dir="rtl">
<div style="font-family: 'Cairo', sans-serif;">
    <table style="width: 100%;">
        <tr>
            <td></td>
            <td bgcolor="#FFFFFF ">
                <div style="max-width: 800px;margin: 0 auto;display: block; border-radius: 0;padding: 0; border: 1px solid #c68e4b;">
                    <table style="width: 100%;background: #ecf1f3 ;">
                        <tr>
                            <td>
                                <div>
                                    <table width="100%">
                                        <tr>
                                            <td rowspan="2" style="text-align:center;padding:10px;">
                                                    <a href="{{ url('/') }}">
                                                        <img style="display: block; margin: auto; padding-top: 10px; margin-bottom: 30px;" src="{{ asset($setting->logo)}}"/>
                                                    </a>
                                                <span style="color:#c68e4b;float:right;font-style: italic; font-size: 14px; font-weight:normal;">"{{ $setting->site_name }}"</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                    </table>

                    <table style="padding: 10px;font-size:14px; width:100%;">
                        <tr>
                            <td style="padding:10px;font-size:14px; width:100%;">
                                @if(isset($service))<p class="prev"><strong>{{ __('lang.service') }}</strong> : {{ $service }}</p>@endif
                                <p class="prev"><strong>{{ __('lang.username') }}</strong> : {{ $username }}</p>
                                <p class="prev"><strong>{{ __('lang.phone') }}</strong> : <span style="display: inline-block; direction: ltr">{{ $phone }}</span> </p>
                                @if(isset($subject))<p class="prev"><strong>{{ __('lang.subject') }}</strong> : {{ $subject }}</p>@endif
                                <p class="prev"><strong>{{ __('lang.email') }}</strong> : {{ $email }}</p>
                                <p class="prev"><strong>{{ __('lang.message') }}</strong> :<br> {!! nl2br($details) !!} </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="center"
                                     style="font-size:12px; margin-top:20px; padding:5px; width:100%; background:#eee;">

                 {{ __('lang.copyrights') }} © {{ date('Y') }}
                 {{ __('lang.sowar') }}. {{ __('lang.all_rights_are_save') }},
                 {{ __('lang.designed_and_developed_by') }}.
                                    <a style="color:#c68e4b; text-decoration: none;" href="https://tarseya.com" target="_blank">
                                          {{ __('lang.tarseya') }}
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
