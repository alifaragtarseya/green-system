@extends('front.layouts.master')
@section('title')
{{ __('lang.contact_us') }}
@endsection
@section('css')
<style>

    .image-banner{
        height: 500px;
        border-radius: 20px;
        background-position: center !important;
        background-repeat: no-repeat !important;
        background-size: cover !important;
        position: relative;
        top: 90px;
    }
</style>
@endsection
@section('content')
    <div class="d-table p-md-5" style="background-image: url({{ asset('front/icon/contact.png') }});background-repeat: no-repeat;background-size: cover;background-position:center;width: 100%;height: 100%;">
        <div class="p-5">
            <div class="form pt-3 p-5 text-center" style="width: {{ isMobile() ? '100%' : '50%' }};margin: auto;background: linear-gradient(133deg, rgba(0, 132, 68, 0.70) 0%, rgba(5, 190, 179, 0.34) 100%);">
                <b class="h4 text-white">{{ __('lang.contact_us') }}</b>
                <form action="">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 pt-3">
                            <input type="text" name="name" id="" class="form-control" placeholder="{{ __('lang.your_name') }}">
                        </div>
                        <div class="col-md-6 pt-3">
                            <input type="email" name="email" id="" class="form-control" placeholder="{{ __('lang.email') }}">
                        </div>
                        <div class="col-md-6 pt-3">
                            <input type="text" name="phone" id="" class="form-control" placeholder="{{ __('lang.your_phone') }}">
                        </div>
                        <div class="col-md-6 pt-3">
                            <input type="text" name="supject" id="" class="form-control" placeholder="{{ __('lang.your_supject') }}">
                        </div>
                        <div class="col-md-12 pt-3">
                            <textarea name="message" placeholder="{{ __('lang.your_message') }}" class="form-control" id="" cols="20" rows="5"></textarea>
                        </div>

                        <div class="col-md-12 pt-5">
                            <div class="contact-btn">
                                <button type="submit" class="btn btn-block p-3 text-white" style="background: #00183F;border-radius:4px"> {{ __('lang.submit_now') }} </button>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>


@stop
