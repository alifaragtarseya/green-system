@php $setting = \App\Models\Setting::first(); @endphp
        <!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8" />
    <title>الأنشاء و التعمير | تسجيل الدخول</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="Tarseya | Digital Marketing" name="author" />
    <link rel="shortcut icon" href="{{ asset($setting->favicon) }}" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin')}}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin')}}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin')}}/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin')}}/assets/global/css/components-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{asset('admin')}}/assets/global/css/plugins-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin')}}/assets/pages/css/login-5-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets') }}/css/style.css" rel="stylesheet" type="text/css" />
    <style>
        .logo_login {
            margin-bottom: 50px;
            text-align: center;
        }
        .logo_login img {
            width: 200px;
        }
    </style>
</head>
<body style="overflow: hidden" class=" login">
<div class="user-login-5 page_login">
    <div class="row bs-reset">
        <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
            <div class="login-content">
                <h1><strong class="main_color">{{ env('APP_NAME') }}</strong> سجل الأن</h1>
                <form method="POST" action="{{ url('dashboard/login') }}" class="login-form" >
                    @include('dashboard.includes.flash_msg')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input class="form-control form-control-solid placeholder-no-fix form-group" placeholder="أدخل البريد الألكترونى" id="email" type="email" name="email" value="{{ old('email') }}" required/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input class="form-control form-control-solid placeholder-no-fix form-group" autocomplete="off" placeholder="أدخل كلمة المرور" id="password" type="password" name="password" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="rem-password">
                                <label class="rememberme mt-checkbox mt-checkbox-outline">
                                    <input type="checkbox" name="remember" value="1" /> تذكرنى
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn green btn-block" value="تسجيل الدخول">
                        </div>
                    </div>
                    <div style="clear: both"></div>
                </form>
            </div>
            <div class="login-footer">
                <div class="row bs-reset">
                    <div class="col-xs-5 bs-reset">
                        <ul class="login-social">
                            @if($setting->facebook != null)
                                <li>
                                    <a href="{{ $setting->facebook }}">
                                        <i class="icon-social-facebook"></i>
                                    </a>
                                </li>
                            @endif
                            @if($setting->twitter != null)
                                <li>
                                    <a href="{{ $setting->twitter }}">
                                        <i class="icon-social-twitter"></i>
                                    </a>
                                </li>
                            @endif
                            @if($setting->youtube != null)
                                <li>
                                    <a href="{{ $setting->facebook }}">
                                        <i class="icon-social-youtube"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-xs-12 bs-reset">
                        <div class="login-copyright text-center">
                            <p>
                                &copy;  <?php echo date('Y') ?>
                                جميع الحقوق محفوظة للانشاء و التعمير تصميم و تطوير بواسطه
                                <a href="https://tarseya.com" class="main_color">ترسية للتسويق الرقمي</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 bs-reset mt-login-5-bsfix hidden-sm hidden-xs">
            <div class="login-bg">
                <img style="width: 100%; height:100vh;" src="{{ asset('admin/assets/pages/img/login/1.jpg') }}">
            </div>
        </div>
    </div>
</div>
<script src="{{asset('admin')}}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{asset('admin')}}/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('admin')}}/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
</body>
</html>
