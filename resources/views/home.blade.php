@extends('layouts.web')

@section('content')
    @include('partials.header')
    <main>
        <div class="container">
            <section id="produk-section">
                <div class="row">
                    <div class="featured-text">
                        New Arrival
                    </div>
                    <div class="owl-carousel owl-theme featured-carousel">
                        @foreach ($newArrival as $item)
                            <div class="item">
                                <div class="img-group">
                                    <a href="{{ route('detail', $item->slug) }}">
                                        <img src="{{ $item->gallery->count() ? Storage::url($item->gallery->first()->images) :'' }}">
                                    </a>
                                    <a product="1" href="javascript:void(0)" class="btn-produk"><i
                                            class='bx bx-cart-alt'></i></a>
                                    <div class="text-center">
                                        <div class="title"><b>{{$item->nama}}</b></div>
                                        <div class="price">Rp. {{number_format($item->selling_price, 0, ',', '.')}}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="mb-5">
                <div class="d-flex flex-row">
                    <div class="featured-text">Most Popular</div>
                    <div class="pt-3 ms-auto"><a class="text-view" href="{{route('mostpopular')}}">view all</a></div>
                </div>
                <div class="grid-wrap">
                    @foreach ($products as $item)
                    <div class="grid-item">
                        <div class="grid-item-wrapper">
                            <a href="{{ route('detail', $item->slug) }}">
                                <img src="{{ $item->gallery->count() ? Storage::url($item->gallery->first()->images) :'' }}">
                                <a href="#" class="btn-popular"><i class='bx bx-cart-alt'></i></a>
                            </a>
                            <div class="text-center mt-2">
                                <div class="title"><b>{{$item->nama}}</b></div>
                                        <div class="price">Rp. {{number_format($item->selling_price, 0, ',', '.')}}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            <section class="col-12">
                <img class="img-grow" src="images/grow.jpeg" alt="">
            </section>
        </div>
    </main>
@endsection

@push('addons-script')
    <script src="{{ asset('vendor/owl-carousel/owl.carousel.min.js') }}"></script>
    {{-- <script src="{{asset('js/cart.js')}}"></script> --}}
    <script>
        $('.featured-carousel').owlCarousel({
            loop: true,
            margin: 20,
            responsiveClass: true,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 5,
                    nav: true,
                    loop: false
                }
            }
        })
        let swiper = new Swiper(".mySwiper", {
            centeredSlides: true,
            autoplay: {
                delay: 9000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                renderBullet: function(index, className) {
                    return '<span class="' + className + '"></span>';
                },
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endpush

@push('addons-style')
    <link rel="stylesheet" href="{{ asset('vendor/owl-carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/owl-carousel/assets/owl.theme.default.min.css') }}">
@endpush
