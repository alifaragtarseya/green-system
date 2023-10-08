@extends('front.layouts.master')

@section('title')
        {{ __('lang.products') }}
@endsection
@section('css')

@endsection



@section('content')
    <br><br><br>
    <section class="container">
        <div class="row pt-3 pb-5">
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <input type="text" class="form-control custom_form_control " style="position: absolute;width: 95%" name="search" placeholder="{{ __('lang.search') }}">
                    <span style="position: relative;{{ isRtl()?'right':'left' }}:95% ; top:7px" > <i class="las la-search"></i></span>
                </div>
                <br><br>
                <div class="category_list">
                    <div class="header">
                        <h4>
                            <b>{{ __('lang.category') }}</b>
                        </h4>
                        <div class="list pt-3">
                            <a href="{{ route('front.products') }}" href="nav-link">{{ __('lang.categories') }}</a>
                            <span class="las la-arrow-{{ isRtl()?'left':'right' }} float-{{ isRtl()?'left':'right' }}"></i></span>
                        </div>
                        @foreach ($categories as $item)
                            <div class="list pt-2">
                                <a href="{{ route('front.products',['category_id' => $item->id]) }}" href="nav-link">{{ $item->title }}</a>
                                <span class="las la-arrow-{{ isRtl()?'left':'right' }} float-{{ isRtl()?'left':'right' }}"></i></span>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="header">
                    <h3>
                        <b>
                            {{ __('lang.categories') }}
                        </b>
                    </h3>
                </div>

                <div class="row pt-5">
                        @foreach ($products as $product)
                        <div class="col-12 col-md-6 pt-5">
                            <a href="{{ route('front.show.products',['id'=>$product->id]) }}" class="nav-link">
                                <div class="image">
                                <img style="width: 100%;height: 300px; border-radius: 12px" src="{{ asset($product->image)}}" alt="">
                            </div>
                            <div class="pt-2">
                                <div class="cat d-flex">
                                    @foreach ($product->getCategoryName($product->id)  as $cat_name)
                                        <span class="p-1 pr-2 pl-2 m-1 " style="border-radius: 50px; background: #1b6c7a2f;color: #185F6C">
                                        {{ $cat_name->title }}
                                        </span>
                                    @endforeach

                                </div>
                                <p>
                                    <b>
                                        {{ $product->title }}
                                    </b>
                                </p>
                            </div>
                            </a>
                        </div>
                        @endforeach
                </div>
                {{ $products->links() }}
            </div>
        </div>
    </section>
@stop
