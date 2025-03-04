@extends('layouts.web')

@section('content')
    <div class="container">
        <section class="cart">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-9">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">produk</th>
                                <th scope="col">harga</th>
                                <th scope="col">qty</th>
                                <th scope="col">total</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#"><i class='bx bx-x-circle btn-item'></i></a></td>
                                <td>
                                    <div class="cover">
                                        <img src="{{ asset('images/cute.jpg') }}" alt="" srcset="">
                                    </div>
                                </td>
                                <td>alla velee sect</td>
                                <td>25.000</td>
                                <td style="width: 80px">
                                    <input class="form-control" type="text">
                                </td>
                                <td>150.000</td>
                            </tr>
                            <tr>
                                <td style="width: 80px"><a href="#"><i class='bx bx-x-circle btn-item'></i></a></td>
                                <td>
                                    <div class="cover">
                                        <img src="{{ asset('images/cute.jpg') }}" alt="" srcset="">
                                    </div>
                                </td>
                                <td>alla velee sect</td>
                                <td>25.000</td>
                                <td style="width: 80px">
                                    <input class="form-control" type="text">
                                </td>
                                <td>150.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-3">
                    <div class="pesanan">
                        <h6>Detail Pesanan</h6>
                        <div class="text-detail">
                            <div>Subtotal</div>
                            <div class="tright">15.2000</div>
                        </div>
                        <div class="text-detail">
                            <div>Ongkos Kirim</div>
                            <div class="tright">dihitung pada tahap selanjutnya</div>
                        </div>
                        <div class="text-detail">
                            <div>subtotal</div>
                            <div class="tright">Rp. 58.584</div>
                        </div>
                        <div class="text-detail mt-4">
                            <div>Total (+unique)</div>
                            @php
                                $unique = rand(100,1000);
                            @endphp
                            <div class="tright"><b>Rp. 45.{{$unique}}</b></div>
                        </div>
                        <button class="btn-beli text-uppercase">Payment</button>
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
    <script src="{{asset('js/cart.js')}}"></script>
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
