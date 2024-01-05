@extends('layouts.layouts')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="#">Women’s </a>
                        <span>Essential structured blazer</span>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="tag-lists">
                        <h5>Tags</h5>
                        @foreach ($tags = json_decode($product->tags) as $key => $tag)
                            <span>{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            @foreach ($feature_img = json_decode($product->feature_image) as $key => $value)
                                <a class="pt active" href="#product-{{ $key + 1 }}">
                                    <img src="{{ Voyager::Image($value) }}" alt="Product_image">
                                </a>
                            @endforeach

                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                @foreach ($feature_img = json_decode($product->feature_image) as $key => $value)
                                    <img data-hash="product-{{ $key + 1 }}" class="product__big__img"
                                        src="{{ Voyager::Image($value) }}" alt="Product_image">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="product__details__text">
                        <div class="product__details__price">&#163;{{ $product->price }} </div>
                        <div class="jumbotron">
                            <h4>Where to Buy</h4>
                            <div class="inner_jumb">
                                <table class="where_to_buy">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets/frontend/img/payment/payment-1.png') }}"
                                                    alt="df">
                                            </td>
                                            <td><a href="">Buy Now</a></td>
                                        </tr>
                                        <tr>
                                            <td> <img src="{{ asset('assets/frontend/img/payment/payment-2.png') }}"
                                                    alt="df"></td>
                                            <td><a href="">Buy Now</a></td>
                                        </tr>
                                        <tr>
                                            <td> <img src="{{ asset('assets/frontend/img/payment/payment-3.png') }}"
                                                    alt="df"></td>
                                            <td><a href="">Buy Now</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                    <h3>Description</h3>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h3>{{ $product->title }} </h3>
                                <p><i class="fa fa-clock-o" aria-hidden="true"></i>
                                    {{ date('jS F Y g:i A', strtotime($product->created_at)) }}
                                </p>
                                <h3>&#163;{{ $product->price }} </h3>
                                <p>{!! $product->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @isset($relatedProducts)
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="related__title">
                            <h5>RELATED PRODUCTS</h5>
                        </div>
                    </div>
                    @foreach ($relatedProducts as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg"
                                    data-setbg="{{ asset('assets/frontend/img/product/related/rp-1.jpg') }}">
                                    {{-- <div class="label new">New</div> --}}
                                    <ul class="product__hover">
                                        <li><a href="{{ asset('assets/frontend/img/product/related/rp-1.jpg') }}"
                                                class="image-popup"><span class="arrow_expand"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">{{ Str::limit($product->title, 50) }}</a></h6>
                                    <div class="product_footer">
                                        <div class="product__price">&#163; {{ $product->price }}</div>
                                        <div class="view_product">
                                            <a href="{{ route('showProduct', $product->slug) }}">View Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endisset
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Instagram Begin -->
    <div class="instagram">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-1.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-2.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-3.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-4.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-5.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-6.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Instagram End -->
@endsection
