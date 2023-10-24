<div class="container">


    <div class="wow zoomInUp">

        <div class="row m-0">
            <div class="col-3 col-md-3 mt-4">
                <div class="nav flex-column our-vision nav-pills" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-principle-tab" data-toggle="pill" style="{{ isMobile()?'padding: 18px 30px;':'' }}"
                        data-target="#v-pills-principle" type="button" role="tab" aria-controls="v-pills-principle"
                        aria-selected="true">{{ __('lang.principle') }}</button>
                    <button class="nav-link" id="v-pills-our_vision-tab" data-toggle="pill"
                        data-target="#v-pills-our_vision" type="button" role="tab"
                        aria-controls="v-pills-our_vision" aria-selected="false">{{ __('lang.our_vision') }}</button>
                    <button class="nav-link" id="v-pills-our_mission-tab" data-toggle="pill"
                        data-target="#v-pills-our_mission" type="button" role="tab"
                        aria-controls="v-pills-our_mission" aria-selected="false">{{ __('lang.our_mission') }}</button>
                </div>
            </div>
            <div class="col-lg-9 col-9 ">
                <div class="tab-content pt-5" id="v-pills-tabContent">
                    <div class="tab-pane fade our-vision-content show active" id="v-pills-principle" role="tabpanel"
                        aria-labelledby="v-pills-principle-tab">
                        <div>
                            {{-- <img src="{{ asset('front/icon/Captuhre.png') }}" alt=""> --}}
                            <p class="p-5 pb-0 m-0">
                                {{ optional($mySetting->where('key', 'principle_description_' . App::getLocale())->first())->value ?? '' }}
                            </p>

                          <p class="text-{{ isRtl() ? 'left' : 'right' }}">
                               {{-- <imgclass=""src="asset('front/icon/Captuhre.png')" alt=""> --}}
                            </p>
                        </div>
                    </div>
                    <div class="tab-pane fade our-vision-content" id="v-pills-our_vision" role="tabpanel"
                        aria-labelledby="v-pills-our_vision-tab">
                        <div>
                            {{-- <img src="{{ asset('front/icon/Captuhre.png') }}" alt=""> --}}
                            <p class="p-5 pb-0 m-0">
                                {{ optional($mySetting->where('key', 'vision_description_' . App::getLocale())->first())->value ?? '' }}
                            </p>

                             <p class="text-{{ isRtl() ? 'left' : 'right' }}">
                               {{-- <img class="" src="{{ asset('front/icon/Captuhre.png') }}" alt="">--}}
                            </p>
                        </div>
                    </div>
                    <div class="tab-pane fade our-vision-content" id="v-pills-our_mission" role="tabpanel"
                        aria-labelledby="v-pills-our_mission-tab">
                        <div>
                            {{-- <img src="{{ asset('front/icon/Captuhre.png') }}" alt=""> --}}
                            <p class="p-5 pb-0 m-0">
                                {{ optional($mySetting->where('key', 'mission_description_' . App::getLocale())->first())->value ?? '' }}
                            </p>

                            <p class="text-{{ isRtl() ? 'left' : 'right' }}">
                                {{-- <img class="" src="{{ asset('front/icon/Captuhre.png') }}" alt=""> --}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<br><br><br>



{{-- <div class="container">
    <div class="row">
        <div class="col-md-7 p-5">
            <h2 class="sec-color " ><b style="border-bottom: 7px solid #D2AE6D">{{__('lang.our_goals') }}</b></h2>

            <div class="desc pt-5">
               <div class="text-dark">
                    {!! optional($mySetting->where('key', 'goal_description_'.App::getLocale())->first())->value !!}
               </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-5 pt-5 ">
            <img src="{{ asset(optional($mySetting->where('key', 'goal_image')->first())->value ?? 'images/default.png') }}" alt="">
        </div>
    </div>

</div>
<br><br><br> --}}
