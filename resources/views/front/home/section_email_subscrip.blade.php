<div class="pt-5 " >
    <div class="">
        <div class="row">
            <div class="col-md-5" style="padding-right: 0px; padding-left: 0px;">
                <div style="background-image: url({{ asset($setting->contact_us_img?? 'images/default.png') }}); background-repeat: no-repeat; background-size: cover; background-position:center; width: 100%; height: 100%; "></div>
                {{-- <img src="{{ asset($setting->contact_us_img?? 'images/default.png') }}"  alt=""> --}}
            </div>
            <div class="col-md-7 " style="padding-right: 0px; padding-left: 0px;">
                <div class="p-10" style=" background: #F0FBF6;">
                    <h2 class="main-color " ><b >{{ __('lang.contact_us') }}</b></h2>

                <div class="desc pt-5">
                   <div class="text-dark h5">
                        {{ __('lang.contact_us_description') }}
                   </div>
                </div>

                <div class="form pt-3">
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
                                    <button type="submit" class="btn btn-block p-3 text-white" style="background: #008444;border-radius:12px"> {{ __('lang.submit_now') }} </button>
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
