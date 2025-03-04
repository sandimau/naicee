<nav id="mainNav">
    <div class="container">
        <div class="navBar">
            <div class="logo">
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('images/naicee.svg') }}"
                        alt="..." /></a>
            </div>
            <div class="nav-links">
                <ul class="links">
                    <li class="list-item">
                        <a id="produk" href="#">Produk</a><i class='bx bx-chevron-down arrow animate'></i>
                        <div class="parent-submenu sub-menu fade-up">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <img src="{{ asset('images/cute.jpg') }}" alt="" srcset="">
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <span class="nav-category">test</span>
                                    <ul>
                                        <li><a href="#">teeee</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-item">
                        <a id="follow" href="#">Follow</a><i class='bx bx-chevron-down arrow animate-1'></i>
                        <ul class="follow parent-submenu small-menu fade-up">
                            <li><a target="_blank"
                                    href="https://www.instagram.com/percetakanbandungofficial/">Instagram</a></li>
                            <li><a target="_blank" href="https://www.facebook.com/percetakanbandungid/">Facebook</a>
                            </li>
                            <li><a target="_blank" href="https://www.tokopedia.com/percetakanbdgcom">Tokopedia</a>
                            </li>
                            <li><a target="_blank" href="https://shopee.co.id/percetakanbandungcom">Shopee</a></li>
                        </ul>
                    </li>
                    {{-- <li class="list-item"><a href="#">Profil</a></li>
                    <li class="list-item"><a href="#">Kontak</a></li> --}}
                    <li class="icon-right">
                        <a id="phone" class="nav-link" href="#" data-bs-toggle="dropdown"><i
                                class='bx bx-mobile-alt icon-nav'></i></a>
                        <div class="phone parent-submenu small-menu fade-up">
                            <div class="d-flex flex-column">
                                <div class="d-inline-flex p-2"><i class='bx bxs-phone-incoming icon-navitem'></i><span
                                        class="text-icon">022
                                        522 11 99</span></div>
                                <div class="d-inline-flex p-2"><i class='bx bxl-whatsapp icon-navitem'></i> <a
                                        class="text-icon" href="#"> whatsapp</a></div>
                                <div class="d-inline-flex p-2"><i class='bx bx-mobile-vibration icon-navitem'></i>
                                    <span class="text-icon"> 0853 2130 0300 <br> 0857 2130 0300</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a id="search" class="nav-link" href="#"><i class='bx bx-search icon-nav'></i></a>
                        <div class="parent-submenu search-menu fade-up">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="search">
                                        <input type="text" placeholder="search" id="input-search">
                                        <button class="btnSearch"
                                            onclick="document.getElementById('input-search').value = ''" href="#"><i
                                                class='bx bx-x'></i></button>
                                        <a class="btn-search" href=""><i class='bx bx-search-alt'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="nav-link wa-web"
                            href="https://web.whatsapp.com/send?phone=6285321300300&amp;text=Halo%20ka..%20Saya%20ingin%20bertanya-tanya%20mengenai%20produk%20PercetakanBandung.com"
                            target="_blank">
                            <i class='bx bxl-whatsapp icon-nav'></i>
                        </a>
                        <a class="nav-link wa-mobile"
                            href="https://api.whatsapp.com/send?phone=6285321300300&amp;text=Halo%20ka..%20Saya%20ingin%20bertanya-tanya%20mengenai%20produk%20PercetakanBandung.com"
                            target="_blank">
                            <i class='bx bxl-whatsapp icon-nav'></i>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link wa-web" href="{{ route('cart') }}">
                            <i class='bx bx-cart-alt icon-nav'><span class="badgee"></span></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        @auth
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @endauth
                    </li>

                </ul>
            </div>
            <div class="d-inline-flex icon-wa">
                <a class="nav-link"
                    href="https://api.whatsapp.com/send?phone=6285321300300&amp;text=Halo%20ka..%20Saya%20ingin%20bertanya-tanya%20mengenai%20produk%20PercetakanBandung.com">
                    <i class='bx bxl-whatsapp icon-navitem'></i>
                </a>
            </div>
            <div id="nav-icon3">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</nav>
