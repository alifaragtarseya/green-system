@extends('front.layouts.master')

@section('title')
        {{ __('lang.blogs') }}
@endsection
@section('css')

@endsection



@section('content')
<div class="meta_tag"
        style="background-image: url({{ asset($metaBanner->image) }}); background-size: cover; background-position: center; background-repeat: no-repeat; height: 250px ;padding-top: {{ isMobile() ? '100px' : '105px' }}">
        <div class="text-center  ">
            <h3 class="text-white d-flex justify-content-center align-items-center " style="width: {{ isMobile() ? '100%' : '50%' }};gap: 10px;float: left">
                <span style="height: 2px;width: 100px; background: #F7A11B"></span>
                {{ __('lang.blogs') }}
            </h3>

        </div>
        </div>
</div>
    <section class="container">



                <div class="row pt-5 mb-5">
                        @foreach ($blogs as $blog)
                        <div class="col-12 pt-5">
                            <div class="card mb-3 border-0" >
                                <div class="row no-gutters">
                                  <div class="col-md-6">
                                    <img class="position-relative" src="{{ asset($blog->image)}}" alt="{{ $blog->title }}">
                                    <span style="width: 65px;top: 0px;right:0px;border-radius: 20px 0px 0px 20px;" class="position-absolute text-white p-3 bg-warning text-center">{{ Carbon\Carbon::parse($blog->created_at)->format('d M')}}</span>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="card-body">
                                      <h3 class="card-title">{{ $blog->title  }}</h3>
                                      <p class="card-text pt-3">
                                        <div class="card-text" style="height: 120px;overflow: hidden;">{!! $blog->description !!}</div>
                                      </p>

                                      <div class="card-bottom pt-5 float-{{ isRtl()?'left':'right' }}">
                                        <div class="contact-btn">
                                        <a href="{{ route('front.show.blogs',['id'=>$blog->id]) }}"  style="border-radius: 0px 16px 0px 16px" class="btn ">{{ __('lang.read_more') }}</a>
                                      </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            {{-- <a href="{{ route('front.show.blogs',['id'=>$blog->id]) }}" class="nav-link">
                                <div class="image">
                                <img style="width: 100%;height: 200px; border-radius: 12px" src="{{ asset($blog->image)}}" alt="">
                            </div>
                            <div class="pt-2">
                                <div class="cat d-flex">
                                    <span class="dark-green">
                                       <b> {{ optional($blog->category)->title }}</b>
                                    </span>
                                </div>
                                <h2>
                                    <b>
                                        {{ $blog->title }}
                                    </b>
                                </h2>

                            </div>
                            </a> --}}
                        </div>
                        @endforeach
                </div>
                {{ $blogs->links() }}
    </section>
@stop
