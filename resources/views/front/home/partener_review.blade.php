{{-- @if (count($reviews) >0) --}}
<section class="help-you bg-color ">
    <div class="">
        <div class="container">
            <div class="row reveal fade-top">

                <div class="col-sm-12 col-md-4">
                    <h6 class="main-color"><b>{{ __('lang.our_trusted_partners') }}</b></h6>
                    <h3>
                        <b>When you choose us everybody wins</b>
                    </h3>
                </div>

            </div>
        </div>
        <div class="owl-carousel owl-theme reveal fade-bottom">
            {{-- @foreach ($reviews as $item) --}}
            @for ($i = 0; $i < 5; $i++)

                <div class="item pt-3">
                    <br><br>
                    <div class="card border  " style="border-radius: 18px;  position: relative;">
                        <div class="card-body pt-3 text-center">
                            <br>

                            <p class="card-text">
                               <small>
                                “I am happy that I chose Insafe to get work with my money. I would definitely recommend Insafe for business.” {{ $i }}
                               </small>
                            </p>
                            <br>
                            <div class="user_info   " dir="{{ isRtl()?'rtl':'ltr' }}">
                                <img src="{{ asset('front/home/Rectangle 354.png') }}" class="rounded-circle" style="width: 50px;height: 50px; margin:auto" alt="">
                                <div class="info pt-3">
                                    <h5 class="mb-0">
                                        <b>
                                            Ahmed Ramadan
                                        </b>
                                    </h5>
                                    <p class="text-muted pt-0">
                                        <small>Marketer, Google Inc.</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @endfor
            {{-- @endforeach --}}
        </div>
    </div>
</section>
<br><br><br>
{{-- @endif --}}
