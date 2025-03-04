@extends('layouts.web')

@section('content')
    <div class="container">
        <section class="produk-detail">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->category->nama }}</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-5" style="height: 850px">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            @if ($product->gallery)
                                @foreach ($product->gallery as $item)
                                    <div class="swiper-slide banner-right">
                                        <img src="{{ Storage::url($item->images) }}" />
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    @if ($product->gallery->count() > 1)
                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($product->gallery as $item)
                                    <div class="swiper-slide banner-right">
                                        <img src="{{ Storage::url($item->images) }}" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6 ms-4">
                    <div style="font-size: 12px" class="text-uppercase">{{ $product->category->nama }}</div>
                    <div class="mt-2">
                        <h3 class="detail-title">{{ $product->nama }}</h3>
                        <h5 class="detail-price">Rp. {{ number_format($product->selling_price, 0, ',', '.') }},-</h5>
                    </div>
                    <p>select size: <span class="size">all size</span> · <span
                            class="text-danger"><b>{{ $product->qty }} left</b></span></p>
                    <div class="mt-5">
                        <a href="" class="btn-shop me-2">buy now</a> <a href="" class="btn-cart">cart</a>
                    </div>
                    <div class="d-flex flex-row mt-5 feature">
                        <i class='bx bx-package'></i>
                        <div class="p-2 me-2">Fast <br> Shipping</div>
                        <i class='bx bx-arrow-back'></i>
                        <div class="p-2 me-2">Free return in <br> 7 days</div>
                    </div>

                    <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Produk detail</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="container mt-3 text-tabs">
                                <span style="color: slategrey;font-size:16px">Description</span>
                                <p>{{ $product->description }}</p>
                                <span style="color: slategrey;font-size:16px">Materials</span>
                                <p>Satin velvet</p>
                                <span style="color: slategrey;font-size:16px">How to Care</span>
                                <p>- Perawatan dengan cuci kering atau dengan tangan dianjurkan untuk semua sutra asli. -
                                    Hindari deterjen, cukup pakai sabun lembut. - Setrika dengan suhu rendah.</p>
                                <span style="color: slategrey;font-size:16px">Note</span>
                                <p>{{ __('global.note') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('addons-style')
    <link href=" {{ asset('css/detailswiper.css') }} " rel="stylesheet" />
@endpush

@push('addons-script')
    {{-- <script src="js/color.js"></script> --}}
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
            zoom: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>

@endpush
