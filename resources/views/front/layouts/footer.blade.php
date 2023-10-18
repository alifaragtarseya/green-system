<div class="footer-area " style="background-image: url('{{ asset('front/icon/footer.png') }}')">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-footer-widget">
                    <div class="item-box">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28"
                                fill="none">
                                <path
                                    d="M14 1.75C11.4482 1.75301 9.00182 2.76804 7.19743 4.57242C5.39305 6.37681 4.37802 8.82322 4.37501 11.375C4.37195 13.4603 5.05312 15.4891 6.31401 17.15C6.31401 17.15 6.57651 17.4956 6.61939 17.5455L14 26.25L21.3841 17.5411C21.4226 17.4948 21.686 17.15 21.686 17.15L21.6869 17.1474C22.9471 15.4872 23.628 13.4594 23.625 11.375C23.622 8.82322 22.607 6.37681 20.8026 4.57242C18.9982 2.76804 16.5518 1.75301 14 1.75ZM14 14.875C13.3078 14.875 12.6311 14.6697 12.0555 14.2851C11.4799 13.9006 11.0313 13.3539 10.7664 12.7144C10.5015 12.0749 10.4322 11.3711 10.5673 10.6922C10.7023 10.0133 11.0357 9.38961 11.5251 8.90013C12.0146 8.41064 12.6383 8.0773 13.3172 7.94225C13.9961 7.8072 14.6999 7.87651 15.3394 8.14142C15.9789 8.40633 16.5256 8.85493 16.9102 9.4305C17.2947 10.0061 17.5 10.6828 17.5 11.375C17.4989 12.3029 17.1297 13.1925 16.4736 13.8486C15.8175 14.5047 14.9279 14.8738 14 14.875Z"
                                    fill="#008444" />
                            </svg>
                        </span>
                        <div>
                            <b class="h4 text-white">{{ __('lang.our_Location') }}</b>
                            <p class="pt-2">{{ isRtl() ? $setting->address : $setting->address_en }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-footer-widget">
                    <a href="https://wa.me/{{ $setting->whatsapp_phone }}" target="_blank" style="color: #008444">
                        <div class="item-box">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                    viewBox="0 0 28 28" fill="none">
                                    <path
                                        d="M14.0012 2.33301C20.4447 2.33301 25.6678 7.55617 25.6678 13.9997C25.6678 20.4432 20.4447 25.6663 14.0012 25.6663C11.9394 25.6697 9.91393 25.124 8.13283 24.0855L2.33917 25.6663L3.9165 19.8703C2.87711 18.0887 2.33106 16.0623 2.3345 13.9997C2.3345 7.55617 7.55767 2.33301 14.0012 2.33301ZM10.0252 8.51634L9.79183 8.52567C9.64078 8.53487 9.49314 8.57456 9.35783 8.64234C9.23127 8.71401 9.11575 8.8036 9.01483 8.90834C8.87483 9.04017 8.7955 9.15451 8.71033 9.26534C8.27881 9.82639 8.04647 10.5152 8.05 11.223C8.05233 11.7947 8.20167 12.3512 8.435 12.8715C8.91217 13.9238 9.69733 15.038 10.7333 16.0705C10.983 16.319 11.228 16.5687 11.4917 16.8008C12.779 17.9342 14.313 18.7516 15.9717 19.1878L16.6343 19.2893C16.8502 19.301 17.066 19.2847 17.283 19.2742C17.6228 19.2566 17.9545 19.1646 18.2548 19.0047C18.4076 18.926 18.5567 18.8403 18.7017 18.748C18.7017 18.748 18.7518 18.7153 18.8475 18.643C19.005 18.5263 19.1018 18.4435 19.2325 18.307C19.3293 18.2067 19.4133 18.0888 19.4775 17.9547C19.5685 17.7645 19.6595 17.4017 19.6968 17.0995C19.7248 16.8685 19.7167 16.7425 19.7132 16.6643C19.7085 16.5395 19.6047 16.41 19.4915 16.3552L18.8125 16.0507C18.8125 16.0507 17.7975 15.6085 17.1768 15.3262C17.1119 15.2978 17.0423 15.2816 16.9715 15.2783C16.8917 15.2701 16.811 15.2791 16.735 15.3047C16.6589 15.3302 16.5892 15.3718 16.5305 15.4265C16.5247 15.4242 16.4465 15.4907 15.603 16.5127C15.5546 16.5777 15.4879 16.6269 15.4114 16.6539C15.335 16.6809 15.2522 16.6845 15.1737 16.6643C15.0977 16.644 15.0232 16.6182 14.9508 16.5873C14.8062 16.5267 14.756 16.5033 14.6568 16.4613C13.9872 16.1691 13.3673 15.7743 12.8193 15.2912C12.6723 15.1628 12.5358 15.0228 12.3958 14.8875C11.9369 14.4479 11.5368 13.9507 11.2058 13.4082L11.137 13.2973C11.0876 13.2229 11.0476 13.1425 11.018 13.0582C10.9737 12.8867 11.0892 12.749 11.0892 12.749C11.0892 12.749 11.3727 12.4387 11.5045 12.2707C11.6328 12.1073 11.7413 11.9487 11.8113 11.8355C11.949 11.6138 11.9922 11.3863 11.9198 11.2102C11.5932 10.4122 11.2548 9.61767 10.9072 8.82901C10.8383 8.67267 10.6342 8.56067 10.4487 8.53851C10.3857 8.53151 10.3227 8.52451 10.2597 8.51984C10.103 8.51206 9.94599 8.51362 9.7895 8.52451L10.024 8.51517L10.0252 8.51634Z"
                                        fill="#008444" />
                                </svg>
                            </span>
                            <div>
                                <b class="h4 text-white">{{ __('lang.whatsapp') }}</b>
                                <p class="pt-2">{{ $setting->whatsapp_phone }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-footer-widget">
                    <a href="mailto:{{ $setting->email_1 }}" target="_blank">
                        <div class="item-box">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                    viewBox="0 0 28 28" fill="none">
                                    <path
                                        d="M23.3333 4.66699H4.66668C3.38334 4.66699 2.33334 5.71699 2.33334 7.00033V21.0003C2.33334 22.2837 3.38334 23.3337 4.66668 23.3337H23.3333C24.6167 23.3337 25.6667 22.2837 25.6667 21.0003V7.00033C25.6667 5.71699 24.6167 4.66699 23.3333 4.66699ZM22.8667 9.62533L15.2367 14.397C14.4783 14.8753 13.5217 14.8753 12.7633 14.397L5.13334 9.62533C5.01636 9.55965 4.91392 9.47093 4.83221 9.36452C4.75051 9.25811 4.69125 9.13623 4.65802 9.00626C4.62478 8.87628 4.61826 8.74092 4.63886 8.60835C4.65946 8.47578 4.70674 8.34877 4.77784 8.23501C4.84894 8.12125 4.94239 8.02309 5.05252 7.94649C5.16266 7.86988 5.28719 7.81642 5.41859 7.78934C5.54998 7.76226 5.68551 7.76212 5.81696 7.78893C5.94841 7.81574 6.07305 7.86895 6.18334 7.94533L14 12.8337L21.8167 7.94533C21.927 7.86895 22.0516 7.81574 22.1831 7.78893C22.3145 7.76212 22.45 7.76226 22.5814 7.78934C22.7128 7.81642 22.8374 7.86988 22.9475 7.94649C23.0576 8.02309 23.1511 8.12125 23.2222 8.23501C23.2933 8.34877 23.3406 8.47578 23.3612 8.60835C23.3818 8.74092 23.3752 8.87628 23.342 9.00626C23.3088 9.13623 23.2495 9.25811 23.1678 9.36452C23.0861 9.47093 22.9837 9.55965 22.8667 9.62533Z"
                                        fill="#008444" />
                                </svg>
                            </span>
                            <div>
                                <b class="h4 text-white">{{ __('lang.email') }}</b>
                                <p class="pt-2">{{ $setting->email_1 }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-3 col-12 {{ isMobile() ? 'text-center pt-4' : '' }}">
                        <div class="single-footer-widget">
                            <div class="logo">
                                {{-- asset($setting->logo_white) ?? --}}
                                <img src="{{ asset($setting->logo_white) }}" class="img_logo"
                                    alt="{{ $setting->site_name }}">
                            </div>
                            <p>
                                {{ isRtl() ? $setting->sm_description : $setting->sm_description_en }}
                            </p>

                            <ul class="top-social pt-3 footer-links">
                                @if ($setting->twitter)
                                    <li>
                                        <a href="{{ $setting->twitter }}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M18.3334 4.83351C17.707 5.10525 17.0446 5.28489 16.3667 5.36684C17.0819 4.93961 17.6178 4.26749 17.8751 3.47517C17.203 3.87523 16.4674 4.15709 15.7001 4.30851C15.1872 3.75232 14.5042 3.38209 13.7583 3.25588C13.0123 3.12968 12.2455 3.25464 11.5782 3.61117C10.9109 3.96769 10.3809 4.53562 10.0711 5.22587C9.76137 5.91613 9.68949 6.68967 9.86675 7.42517C8.50794 7.35645 7.17878 7.00264 5.96563 6.38673C4.75247 5.77082 3.68245 4.90659 2.82508 3.85017C2.52436 4.37531 2.36635 4.97003 2.36675 5.57517C2.36568 6.13716 2.5036 6.69069 2.76821 7.18648C3.03283 7.68227 3.41593 8.10493 3.88341 8.41684C3.34006 8.40206 2.80832 8.25626 2.33341 7.99184V8.03351C2.33749 8.82092 2.61341 9.58275 3.11451 10.1901C3.61561 10.7975 4.31113 11.2132 5.08341 11.3668C4.78613 11.4573 4.47748 11.505 4.16675 11.5085C3.95166 11.506 3.7371 11.4865 3.52508 11.4502C3.74501 12.1275 4.1706 12.7195 4.74264 13.1436C5.31469 13.5678 6.00473 13.8031 6.71675 13.8168C5.51442 14.7629 4.02998 15.2792 2.50008 15.2835C2.22153 15.2844 1.94319 15.2677 1.66675 15.2335C3.22877 16.2421 5.04909 16.7774 6.90841 16.7752C8.19149 16.7885 9.46436 16.546 10.6527 16.0619C11.841 15.5778 12.9209 14.8617 13.8294 13.9556C14.7379 13.0494 15.4567 11.9713 15.9439 10.7843C16.431 9.59719 16.6768 8.32495 16.6667 7.04184V6.60017C17.3207 6.11252 17.8846 5.5147 18.3334 4.83351Z"
                                                    fill="white" />
                                            </svg>
                                        </a>
                                    </li>
                                @endif
                                @if ($setting->facebook)
                                    <li>
                                        <a href="{{ $setting->facebook }}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M11.6667 11.2498H13.75L14.5834 7.9165H11.6667V6.24984C11.6667 5.3915 11.6667 4.58317 13.3334 4.58317H14.5834V1.78317C14.3117 1.74734 13.2859 1.6665 12.2025 1.6665C9.94004 1.6665 8.33337 3.04734 8.33337 5.58317V7.9165H5.83337V11.2498H8.33337V18.3332H11.6667V11.2498Z"
                                                    fill="white" />
                                            </svg>
                                        </a>
                                    </li>
                                @endif
                                @if ($setting->instagram)
                                    <li>
                                        <a href="{{ $setting->instagram }}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                                viewBox="0 0 21 21" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3 0.25C2.27065 0.25 1.57118 0.539731 1.05546 1.05546C0.539731 1.57118 0.25 2.27065 0.25 3C0.25 3.72935 0.539731 4.42882 1.05546 4.94454C1.57118 5.46027 2.27065 5.75 3 5.75C3.72935 5.75 4.42882 5.46027 4.94454 4.94454C5.46027 4.42882 5.75 3.72935 5.75 3C5.75 2.27065 5.46027 1.57118 4.94454 1.05546C4.42882 0.539731 3.72935 0.25 3 0.25ZM1.75 3C1.75 2.66848 1.8817 2.35054 2.11612 2.11612C2.35054 1.8817 2.66848 1.75 3 1.75C3.33152 1.75 3.64946 1.8817 3.88388 2.11612C4.1183 2.35054 4.25 2.66848 4.25 3C4.25 3.33152 4.1183 3.64946 3.88388 3.88388C3.64946 4.1183 3.33152 4.25 3 4.25C2.66848 4.25 2.35054 4.1183 2.11612 3.88388C1.8817 3.64946 1.75 3.33152 1.75 3ZM0.25 7C0.25 6.80109 0.329018 6.61032 0.46967 6.46967C0.610322 6.32902 0.801088 6.25 1 6.25H5C5.19891 6.25 5.38968 6.32902 5.53033 6.46967C5.67098 6.61032 5.75 6.80109 5.75 7V20C5.75 20.1989 5.67098 20.3897 5.53033 20.5303C5.38968 20.671 5.19891 20.75 5 20.75H1C0.801088 20.75 0.610322 20.671 0.46967 20.5303C0.329018 20.3897 0.25 20.1989 0.25 20V7ZM1.75 7.75V19.25H4.25V7.75H1.75ZM7.25 7C7.25 6.80109 7.32902 6.61032 7.46967 6.46967C7.61032 6.32902 7.80109 6.25 8 6.25H12C12.1989 6.25 12.3897 6.32902 12.5303 6.46967C12.671 6.61032 12.75 6.80109 12.75 7V7.434L13.185 7.247C13.935 6.92648 14.7307 6.7257 15.543 6.652C18.318 6.4 20.75 8.58 20.75 11.38V20C20.75 20.1989 20.671 20.3897 20.5303 20.5303C20.3897 20.671 20.1989 20.75 20 20.75H16C15.8011 20.75 15.6103 20.671 15.4697 20.5303C15.329 20.3897 15.25 20.1989 15.25 20V13C15.25 12.6685 15.1183 12.3505 14.8839 12.1161C14.6495 11.8817 14.3315 11.75 14 11.75C13.6685 11.75 13.3505 11.8817 13.1161 12.1161C12.8817 12.3505 12.75 12.6685 12.75 13V20C12.75 20.1989 12.671 20.3897 12.5303 20.5303C12.3897 20.671 12.1989 20.75 12 20.75H8C7.80109 20.75 7.61032 20.671 7.46967 20.5303C7.32902 20.3897 7.25 20.1989 7.25 20V7ZM8.75 7.75V19.25H11.25V13C11.25 12.2707 11.5397 11.5712 12.0555 11.0555C12.5712 10.5397 13.2707 10.25 14 10.25C14.7293 10.25 15.4288 10.5397 15.9445 11.0555C16.4603 11.5712 16.75 12.2707 16.75 13V19.25H19.25V11.38C19.25 9.476 17.589 7.972 15.68 8.146C15.0242 8.20567 14.3817 8.36763 13.776 8.626L12.296 9.261C12.1818 9.31003 12.0573 9.32994 11.9336 9.31893C11.8098 9.30793 11.6907 9.26635 11.587 9.19794C11.4833 9.12953 11.3982 9.03643 11.3394 8.927C11.2806 8.81757 11.2499 8.69524 11.25 8.571V7.75H8.75Z"
                                                    fill="white" />
                                            </svg>
                                        </a>
                                    </li>
                                @endif



                                {{-- @if (App::getLocale() != 'en')
                            <li>
                                <a href="{{route('front.lang')}}?lang=en">
                                    <i>En</i>
                                </a>
                            </li>
                            @else
                            <li>
                                <a href="{{ route('front.lang')}}?lang=ar" >
                                    <i>ع</i>
                                </a>
                            </li>
                            @endif --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-12 {{ isMobile() ? 'text-center pt-4' : '' }}">
                        <h4 class="text-white">{{ __('lang.quick_links') }}</h4>
                        <div class="single-footer-widget pl-4">
                            <ul class="quick-links quick_links pt-4" style="list-style-type: square">
                                <li>
                                    <a href="{{ route('front.about') }}"><b
                                            class=" text-white">{{ __('lang.about_us') }}</b></a>
                                </li>
                                <li>
                                    <a href="{{ route('front.contact') }}"><b
                                            class=" text-white">{{ __('lang.contact_us') }}</b></a>
                                </li>

                                <li>
                                    <a href="{{ route('front.services') }}"><b
                                            class=" text-white">{{ __('lang.services') }}</b></a>
                                </li>
                                {{-- <li>
                                    <a href="{{ route('front.contact') }}"><b
                                            class=" text-white">{{ __('lang.contact_us') }}</b></a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-12 {{ isMobile() ? 'text-center pt-4' : '' }}">
                        <div class="single-footer-widget pl-5">
                            <h4 class="text-white">{{ __('lang.help_center') }}</h4>
                            <ul class="quick-links pt-4">
                                <li class="text-muted">
                                    <a href="#"><b class=" text-white">{{ __('lang.privacy_policy') }}</b></a>
                                </li>
                                <li class="text-muted">
                                    <a href="#"><b class=" text-white">{{ __('lang.terms_conditions') }}</b></a>
                                </li>
                                <li class="text-muted">
                                    <a href="#"><b class=" text-white">{{ __('lang.join_us') }}</b></a>
                                </li>


                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-12 {{ isMobile() ? 'text-center pt-4' : '' }}">
                        <h4 class="text-white">{{ __('lang.newsletter') }}</h4>
                        <p class="text-white pt-3">{{ __('lang.newsletter_desc') }}</p>
                        <div class="single-footer-widget ">
                            <input type="email" name="email" class="form-control  p-3"
                                style="position: absolute;border-radius: 5px" placeholder="ex@email.com"
                                autocomplete="new-email" id="">
                                @if (isRtl())
                                <span
                                    style="position: relative;top: 14px;right: 87%;background: #008444;padding: 17px 23px 8px;border-radius: 5px 0px 0px 5px;">
                                @else
                                <span
                                    style="position: relative;top: 14px;left: 87%;background: #008444;padding: 17px 23px 8px;border-radius: 0px 5px 5px 0px;">
                                @endif
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <g clip-path="url(#clip0_397_1431)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M19.768 2.69258C20.724 2.34858 21.648 3.27258 21.304 4.22758L15.264 21.0046C14.889 22.0476 13.422 22.0676 13.018 21.0346L10.189 13.8066L2.96098 10.9786C1.92898 10.5746 1.94898 9.10758 2.99098 8.73158L19.768 2.69158V2.69258Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_397_1431">
                                            <rect width="24" height="24" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </span>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container text-center text-black ">
            <p class="text-white">
                <b>
                    {{ __('lang.copyrights') }} © {{ date('Y') }}
                    {{ __('lang.all_rights_are_save') }},
                    {{ __('lang.designed_and_developed_by') }}.
                    <a href="https://tarseya.com" style="color: #008444" target="_blank">
                        {{ __('lang.tarseya') }}
                    </a>
                </b>
            </p>
        </div>
    </div>
</div>
