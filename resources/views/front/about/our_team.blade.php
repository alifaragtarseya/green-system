<div class="footer-area  ">

    <div class="container">
        <div class="row pt-5pb-5">
            <div class="col-3"></div>
             <div class="col-6 text-center">
                 <b class="main-color reveal fade-bottom ">
                     {{ __('lang.our_team') }} ?
                 </b>
                 <div class="desc reveal fade-top">
                     <p>
                         <h4>Meet people who make you successful</h4>
                     </p>
                     <p>
                         <small>
                             Duis gravida augue velit eu dignissim felis posuere quis. Integ ante urna gravida nec est in molestie mattis risus tempus tincidunt maximus.
                         </small>
                     </p>
                 </div>
                 </div>
             <div class="col-3"></div>

             @for ($i = 1; $i < 5; $i++)
             <div class="col-12 col-md-6 col-lg-4 text-center reveal fade-bottom">
                <div class="card border-0 bg-transparent"  >
                    <img src="{{ asset('front/about/team'.$i.'.png') }}" class="card-img-top team_imag" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Ollie Taylor</h5>
                    <p class="card-text">co-Founder</p>
                    <a href="#" target="_blank" class="  team_icon">
                        <i class="lab la-linkedin-in font-green"></i>
                    </a>
                    <a href="#" target="_blank" class="  team_icon">
                        <i class="lab la-twitter font-green"></i>
                    </a>
                    <a href="#" target="_blank" class="  team_icon">
                        <i class="lab la-facebook-f font-green"></i>
                    </a>
                    </div>
                </div>
            </div>
             @endfor

         </div>
    </div>
    <br><br>
<br>
</div>
