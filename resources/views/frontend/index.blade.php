@extends('frontend.layouts.main')
@section('mobile')
    <!-- Account Balance -->
    <main id="main-route">
        <div class="main-content home">
            <section class="home__slider">
                <div class="swiper-container main-slider">
                    <div class="swiper-wrapper">
                        @foreach ($banner as $banners)
                            <div class="swiper-slide">
                                <a href="#">
                                    <img src="{{ $banners->gambar }}" class="img-fluid w-100">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </section>
            <section class="home__jackpot">
                <div class="container">
                    <div class="jackpot-gif">
                        <div class="jackpot-amount">IDR <span id="amount"></span></div>
                    </div>
                </div>
            </section>
            <section class="mobile__category">
                <div class="container">
                    <div class="category-container">
                        <a href="popular">
                            <div class="category-item">
                                <div class="icon">
                                    <img src="{{ asset('assets/mobile/themes/default/img/mobile-home-icon/mobile-popular.svg') }}"
                                        width="30" height="30" alt="popular">
                                </div>
                                <div class="name">Popular</div>
                            </div>
                        </a>
                        <a href="slot">
                            <div class="category-item">
                                <div class="icon">
                                    <img src="{{ asset('assets/mobile/themes/default/img/mobile-home-icon/mobile-slot.svg') }}"
                                        width="30" height="30" alt="slot">
                                </div>
                                <div class="name">
                                    Slot
                                </div>
                            </div>
                        </a>
                        <a href="livegame">
                            <div class="category-item">
                                <img src="https://images.linkcdn.cloud/global/nav-addons/hot_category.png" width="30"
                                    height="12"
                                    style="position: absolute; z-index:9; animation: 0.25s ease 0s infinite alternate none running beat;">
                                <div class="icon">
                                    <img src="{{ asset('assets/mobile/themes/default/img/mobile-home-icon/mobile-livegames.svg') }}"
                                        width="30" height="30" alt="livegames">
                                </div>
                                <div class="name">
                                    Live Game
                                </div>
                            </div>
                        </a>
                        <a href="casino">
                            <div class="category-item">
                                <div class="icon">
                                    <img src="{{ asset('assets/mobile/themes/default/img/mobile-home-icon/mobile-casino.svg') }}"
                                        width="30" height="30" alt="casino">
                                </div>
                                <div class="name">
                                    Casino
                                </div>
                            </div>
                        </a>
                        <a href="sport">
                            <div class="category-item">
                                <div class="icon">
                                    <img src="{{ asset('assets/mobile/themes/default/img/mobile-home-icon/mobile-sport.svg') }}"
                                        width="30" height="30" alt="sport">
                                </div>
                                <div class="name">
                                    Sportsbook
                                </div>
                            </div>
                        </a>
                        <a href="lottery">
                            <div class="category-item">
                                <div class="icon">
                                    <img src="{{ asset('assets/mobile/themes/default/img/mobile-home-icon/mobile-lottery.svg') }}"
                                        width="30" height="30" alt="lottery">
                                </div>
                                <div class="name">
                                    Lottery
                                </div>
                            </div>
                        </a>
                        <a name="gamesPicker" data-menu="poker" href="poker">
                            <div class="category-item">
                                <div class="icon">
                                    <img src="{{ asset('assets/mobile/themes/default/img/mobile-home-icon/mobile-poker.svg') }}"
                                        width="30" height="30" alt="poker">
                                </div>
                                <div class="name">
                                    Poker
                                </div>
                            </div>
                        </a>
                        <a href="arcade">
                            <div class="category-item">
                                <div class="icon">
                                    <img src="{{ asset('assets/mobile/themes/default/img/mobile-home-icon/mobile-arcade.svg') }}"
                                        width="30" height="30" alt="arcade">
                                </div>
                                <div class="name">
                                    Arcade
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            <section class="mobile__popular">
                <div class="container">
                    <div class="popular-title">
                        <i class="fab fa-hotjar"></i>
                        <span>Game Terpopuler</span>
                    </div>
                </div>
            </section>
            <section class="mobile__games">
                <div class="container">
                    <div class="games-list">
                        @foreach ($games as $game)
                            @auth
                                <div class="games-holder">
                                    <div class="games-img">
                                        <a class="main sekarang main-sekarang-alert" target="_blank" href="{{ url('gameIframe?gameType=slot&providerCode='.$game->game_provider.'&gameCode='.$game->game_code) }}">
                                            <img src="{{ $game->game_image }}" width="110" height="80" alt="S-RH02"
                                                loading="lazy">
                                        </a>
                                    </div>
                                    <div class="games-name">{{ $game->game_name }}</div>
                                </div>
                            @endauth
                            @guest
                                <div class="games-holder">
                                    <div class="games-img">
                                        <a class="main sekarang main-sekarang-alert" onclick="gameAlert()" href="javascript:;">
                                            <img src="{{ $game->game_image }}" width="110" height="80" alt="S-RH02"
                                                loading="lazy">
                                        </a>
                                    </div>
                                    <div class="games-name">{{ $game->game_name }}</div>
                                </div>
                            @endguest
                        @endforeach
                    </div>
                    <div class="games-button my-1 text-center">
                        <a href="popular" class="btn-custom-sm">Show More <i
                                class="fas fa-arrow-alt-circle-right ml-1"></i></a>
                    </div>
                </div>
            </section>
            <section class="mobile__download-bannner">
                <div class="container">
                    <div class="mobile-download-container">
                        <div class="download-icon">
                            <img src="{{ general()->logo }}" width="40" height="40" alt="android">
                        </div>
                        <div class="download-title">
                            <h5>{{ general()->title }}</h5>
                            <h6>DOWNLOAD SEKARANG</h6>
                        </div>
                        <div class="download-button">
                            <a class="btn-custom-sm" href="">Download</a>
                        </div>
                    </div>
                </div>
            </section>
            @include('frontend.layouts.footer')
        </div>
    </main>
@endsection


@section('desktop')
    <!-- Account Balance -->
    <main id="main-route">
        <div class="main-content home">
            <section class="home__slider">
                <div class="swiper-container main-slider">
                    <div class="swiper-wrapper">
                        @foreach ($banner as $banners)
                            <div class="swiper-slide">
                                <a href="#">
                                    <img src="{{ $banners->gambar }}" class="img-fluid w-100">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </section>
            <section class="home__jackpot">
                <div class="container">
                    <div class="jackpot-gif">
                        <div class="jackpot-amount">IDR <span id="amount"></span></div>
                    </div>
                </div>
            </section>
            <section class="home__menu">
                <div class="container">
                    <div class="menu-container">
                        <div class="download-border item-download">
                            <a href="../uploads/apk/Dewa MPO_1_1.0.apk">
                                <div class="menu-download">
                                    <img id="template-download" src="{{ asset('assets/img/gameapp.png') }}"
                                        width="226" height="226" alt="game app">
                                    <h4>DOWNLOAD SEKARANG</h4>
                            </a>
                        </div>
                    </div>
                    <div class="menu-right item-right">
                        <div class="menu-games">
                            <a href="sport">
                                <div class="games-item">
                                    <img id="template-image" src="{{ asset('assets/img/sports_1.png') }}" width="193"
                                        height="150" alt="sportsbook">
                                    <div class="games-border">
                                        <div class="games-name">SPORTSBOOK</div>
                                    </div>
                                </div>
                            </a>

                            <a href="slot">
                                <div class="games-item">
                                    <img id="template-image" src="{{ asset('assets/img/slots_1.png') }}" width="193"
                                        height="150" alt="slot">
                                    <div class="games-border">
                                        <div class="games-name">SLOT</div>
                                    </div>
                                </div>
                            </a>

                            <a href="casino">
                                <div class="games-item">
                                    <img id="template-image" src="{{ asset('assets/img/casino_1.png') }}" width="193"
                                        height="150" alt="casino">
                                    <div class="games-border">
                                        <div class="games-name">CASINO</div>
                                    </div>
                                </div>
                            </a>
                            <a href="lottery">
                                <div class="games-item">
                                    <img id="template-image" src="{{ asset('assets/img/lottery_1.png') }}"
                                        width="193" height="150" alt="lottery">
                                    <div class="games-border">
                                        <div class="games-name">LOTTERY</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="menu-slider">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="slider-cstmr swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="slider-cstmr__holder cstmr-service">
                                                    <div class="slider-cstmr-title">Layanan Customer</div>
                                                    <div class="cstmr-item">
                                                        <img src="https://images.linkcdn.cloud/global/default/contact/whatsapp.png"
                                                            alt="whatsapp" width="31" height="31">
                                                        <a href="https://wa.me/{{ contact()->no_whatsapp }}"
                                                            target="_blank" rel="noreferrer">
                                                            <div class="cstmr-content">
                                                                +{{ contact()->no_whatsapp }}
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="cstmr-item">


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="slider-cstmr__holder service-game">
                                                    <div class="slider-cstmr-title">Layanan Product</div>
                                                    <div class="service-item">
                                                        <div class="service-icon">
                                                            <img
                                                                src="https://images.linkcdn.cloud/global/default/contact/vider.png">
                                                        </div>
                                                        <div class="service-item-desc">Permainan Terlengkap dalam seluruh
                                                            platform</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="slider-cstmr__holder service-game">
                                                    <div class="slider-cstmr-title">Lisensi Game</div>
                                                    <div class="service-item">
                                                        <div class="service-icon">
                                                            <img
                                                                src="https://images.linkcdn.cloud/global/default/contact/vider2.png">
                                                        </div>
                                                        <div class="service-item-desc">lisensi Resmi &amp; Aman oleh PAGCOR
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Add Paginaton -->
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="slider-provider">
                                        <div class="slider-provider-title">Game Favorit</div>
                                        <div class="slide-game-favorit swiper-container">
                                            <div class="swiper-wrapper">
                                                @foreach ($games as $gs)
                                                    <a class="swiper-slide" href="">
                                                        <img src="{{ $gs->game_image }}" width="193" height="150">
                                                    </a>
                                                @endforeach
                                            </div>
                                            <!-- Add Paginaton -->
                                            <div class="swiper-pagination"></div>
                                            <!-- Add Arrows -->
                                            <div class="swiper-button-prev"
                                                style="background-image: url(https://images.linkcdn.cloud/global/default/icon/arrow-left.png);">
                                            </div>
                                            <div class="swiper-button-next"
                                                style="background-image: url(https://images.linkcdn.cloud/global/default/icon/arrow-right.png);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="slider-provider">
                                        <div class="slider-provider-title">Provider Favorit</div>
                                        <div class="slide-prov-favorit swiper-container">
                                            <div class="swiper-wrapper">
                                                <a class="swiper-slide" href="javascript:;" onclick="gameAlert()">
                                                    <img
                                                        src="https://images.linkcdn.cloud/global/default/provider-favorit/pra.jpg">
                                                </a>
                                                <a class="swiper-slide" href="javascript:;" onclick="gameAlert()">
                                                    <img
                                                        src="https://images.linkcdn.cloud/global/default/provider-favorit/hbn.jpg">
                                                </a>
                                                <a class="swiper-slide" href="javascript:;" onclick="gameAlert()">
                                                    <img
                                                        src="https://images.linkcdn.cloud/global/default/provider-favorit/afb.jpg">
                                                </a>
                                            </div>

                                            <!-- Add Paginaton -->
                                            <div class="swiper-pagination"></div>
                                            <!-- Add Arrows -->
                                            <div class="swiper-button-prev"
                                                style="background-image: url(https://images.linkcdn.cloud/global/default/icon/arrow-left.png);">
                                            </div>
                                            <div class="swiper-button-next"
                                                style="background-image: url(https://images.linkcdn.cloud/global/default/icon/arrow-right.png);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <section class="home__lotto">
            <div class="container">
                <div
                    class="swiper-container lotto-swiper swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                    <div class="swiper-wrapper" id="swiper-wrapper-8d1d2dd6c4ae42aa" aria-live="off"
                        style="transition-duration: 0ms; transform: translate3d(-910px, 0px, 0px);">

                        <!-- Bagian lotto pertama -->
                        <div class="swiper-slide lotto-slide" role="group" aria-label="6 / 30"
                            style="width: 250px; margin-right: 10px;" data-swiper-slide-index="0">
                            <div class="lotto-border">
                                <a href="lottery">
                                    <div class="lotto-item">
                                        <h4 class="lotto-country">Kampot 4D</h4>
                                        <h6 class="lotto-date">{{ getDay() . ', ' . date('Y-m-d') }}</h6>
                                        <div class="lotto-number">{{ generateLottoNumber() }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Bagian lotto kedua -->
                        <div class="swiper-slide lotto-slide" role="group" aria-label="7 / 30"
                            style="width: 250px; margin-right: 10px;" data-swiper-slide-index="1">
                            <div class="lotto-border">
                                <a href="lottery">
                                    <div class="lotto-item">
                                        <h4 class="lotto-country">Beijing</h4>
                                        <h6 class="lotto-date">{{ getDay() . ', ' . date('Y-m-d') }}</h6>
                                        <div class="lotto-number">{{ generateLottoNumber() }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30"
                            style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                            <div class="lotto-border">
                                <a href="lottery">
                                    <div class="lotto-item">
                                        <h4 class="lotto-country">Tokyo</h4>
                                        <h6 class="lotto-date">{{ getDay() . ', ' . date('Y-m-d') }}</h6>
                                        <div class="lotto-number">{{ generateLottoNumber() }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30"
                            style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                            <div class="lotto-border">
                                <a href="lottery">
                                    <div class="lotto-item">
                                        <h4 class="lotto-country">Manila</h4>
                                        <h6 class="lotto-date">{{ getDay() . ', ' . date('Y-m-d') }}</h6>
                                        <div class="lotto-number">{{ generateLottoNumber() }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30"
                            style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                            <div class="lotto-border">
                                <a href="lottery">
                                    <div class="lotto-item">
                                        <h4 class="lotto-country">Magnum4D</h4>
                                        <h6 class="lotto-date">{{ getDay() . ', ' . date('Y-m-d') }}</h6>
                                        <div class="lotto-number">{{ generateLottoNumber() }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30"
                            style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                            <div class="lotto-border">
                                <a href="lottery">
                                    <div class="lotto-item">
                                        <h4 class="lotto-country">SydneyPools</h4>
                                        <h6 class="lotto-date">{{ getDay() . ', ' . date('Y-m-d') }}</h6>
                                        <div class="lotto-number">{{ generateLottoNumber() }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30"
                            style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                            <div class="lotto-border">
                                <a href="lottery">
                                    <div class="lotto-item">
                                        <h4 class="lotto-country">BullsEye</h4>
                                        <h6 class="lotto-date">{{ getDay() . ', ' . date('Y-m-d') }}</h6>
                                        <div class="lotto-number">{{ generateLottoNumber() }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30"
                            style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                            <div class="lotto-border">
                                <a href="lottery">
                                    <div class="lotto-item">
                                        <h4 class="lotto-country">Hongkong47</h4>
                                        <h6 class="lotto-date">{{ getDay() . ', ' . date('Y-m-d') }}</h6>
                                        <div class="lotto-number">{{ generateLottoNumber() }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30"
                            style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                            <div class="lotto-border">
                                <a href="lottery">
                                    <div class="lotto-item">
                                        <h4 class="lotto-country">4DRome</h4>
                                        <h6 class="lotto-date">{{ getDay() . ', ' . date('Y-m-d') }}</h6>
                                        <div class="lotto-number">{{ generateLottoNumber() }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30"
                            style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                            <div class="lotto-border">
                                <a href="lottery">
                                    <div class="lotto-item">
                                        <h4 class="lotto-country">Amsterdam</h4>
                                        <h6 class="lotto-date">{{ getDay() . ', ' . date('Y-m-d') }}</h6>
                                        <div class="lotto-number">{{ generateLottoNumber() }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30"
                            style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                            <div class="lotto-border">
                                <a href="lottery">
                                    <div class="lotto-item">
                                        <h4 class="lotto-country">Barcelona</h4>
                                        <h6 class="lotto-date">{{ getDay() . ', ' . date('Y-m-d') }}</h6>
                                        <div class="lotto-number">{{ generateLottoNumber() }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30"
                            style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                            <div class="lotto-border">
                                <a href="lottery">
                                    <div class="lotto-item">
                                        <h4 class="lotto-country">Seoul</h4>
                                        <h6 class="lotto-date">{{ getDay() . ', ' . date('Y-m-d') }}</h6>
                                        <div class="lotto-number">{{ generateLottoNumber() }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30"
                            style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                            <div class="lotto-border">
                                <a href="lottery">
                                    <div class="lotto-item">
                                        <h4 class="lotto-country">Timor</h4>
                                        <h6 class="lotto-date">{{ getDay() . ', ' . date('Y-m-d') }}</h6>
                                        <div class="lotto-number">{{ generateLottoNumber() }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30"
                            style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                            <div class="lotto-border">
                                <a href="lottery">
                                    <div class="lotto-item">
                                        <h4 class="lotto-country">SiberiaPools</h4>
                                        <h6 class="lotto-date">{{ getDay() . ', ' . date('Y-m-d') }}</h6>
                                        <div class="lotto-number">{{ generateLottoNumber() }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30"
                            style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                            <div class="lotto-border">
                                <a href="lottery">
                                    <div class="lotto-item">
                                        <h4 class="lotto-country">Bangkok</h4>
                                        <h6 class="lotto-date">{{ getDay() . ', ' . date('Y-m-d') }}</h6>
                                        <div class="lotto-number">{{ generateLottoNumber() }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </div>
        </section>
        <section class="home__payment">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="payment-border">
                            <div class="payment-content">
                                <div class="payment-header">
                                    <img src="https://images.linkcdn.cloud/global/default/icon/servicemeter.svg"
                                        width="50" height="50">
                                    <div class="payment-title">Layanan Member</div>
                                </div>
                                <div class="payment-service">
                                    <div class="service-average">
                                        <div class="service-title">Tambah Dana</div>
                                        <div class="service-subtitle">Waktu</div>
                                        <div class="progress">
                                            <div id="depositTimeBar" class="progress-bar" role="progressbar"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                style="background: #e4d00a; width: 20%"></div>
                                        </div>
                                    </div>
                                    <div class="service-time">
                                        <div class="time-number" id="depositTime">2</div>
                                        <div class="time-title">Menit</div>
                                    </div>
                                </div>
                                <div class="payment-service">
                                    <div class="service-average">
                                        <div class="service-title">WITHDRAW</div>
                                        <div class="service-subtitle">Waktu</div>
                                        <div class="progress">
                                            <div id="withdrawTimeBar" class="progress-bar" role="progressbar"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                style="background: #e4d00a; width: 20%"></div>
                                        </div>
                                    </div>
                                    <div class="service-time">
                                        <div class="time-number" id="withdrawTime">2</div>
                                        <div class="time-title">Menit</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="payment-border">
                            <div class="payment-content">
                                <div class="payment-header">
                                    <img src="https://images.linkcdn.cloud/global/default/icon/payment.svg" width="50"
                                        height="50">
                                    <div class="payment-title">Sistem Pembayaran</div>
                                </div>

                                <div class="swiper-container pembarayan-swiper">
                                    <div class="swiper-wrapper">
                                        @foreach ($bank as $ba)
                                            <div class="swiper-slide">
                                                <div class="bank-content">
                                                    <div class="bank-logo">
                                                        <img src="{{ $ba->icon }}"
                                                            alt="{{ $ba->nama_bank }}">
                                                    </div>
                                                    <div class="bank-status online">ONLINE</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('frontend.layouts.footer')
    </main>
@endsection
