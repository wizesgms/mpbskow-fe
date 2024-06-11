@mobile
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="{{ general()->deskripsi }}">
    <meta name="keywords" content="{{ general()->keyword }}">
    <meta property="og:description" content="{{ general()->deskripsi }}" />
    <meta property="og:image" content="{{ general()->logo }}">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url('/') }}">
    <meta name="robots" content="index, follow">
    <meta name="author" content="{{ url('/') }}">
    <meta name="theme-color" content="linear-gradient(to bottom, #ebf4f9 0%, #c3c0cc 100%)">
    <meta name="msapplication-TileColor" content="linear-gradient(to bottom, #ebf4f9 0%, #c3c0cc 100%)">
    <meta name="msapplication-navbutton-color" content="linear-gradient(to bottom, #ebf4f9 0%, #c3c0cc 100%)">
    <meta name="apple-mobile-web-app-status-bar-style" content="linear-gradient(to bottom, #ebf4f9 0%, #c3c0cc 100%)">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ general()->icon_web }}">
    <!-- Canonical -->
    <link rel="canonical" href="{{ url('/') }}" />
    <!-- End Canonical -->
    <meta name="description" itemprop="description" content="{{ general()->deskripsi }}" />
    <meta name="keywords" content="" />
    <title>{{ general()->title }}</title>
    <!-- Custom Tags -->
    <meta name="robots" content="index, follow" />
    <meta name="rating" content="general" />
    <meta name="geo.placename" content="Indonesia" />
    <meta name="geo.country" content="ID" />
    <meta name="language" content="ID" />
    <meta name="tgn.nation" content="Indonesia" />
    <meta name="rating" content="general" />
    <!-- End Custom Tags -->
    <link rel="preload" as="font"
        href="{{ asset('assets/mobile/themes/default/font/font-awesome/webfonts/fa-solid-900.woff2') }}"
        type="font/woff2" crossorigin="anonymous">
    <link rel="preload" as="font"
        href="{{ asset('assets/mobile/themes/default/font/font-awesome/webfonts/fa-brands-400.woff2') }}"
        type="font/woff2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/mobile/themes/default/css/global.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/mobile/themes/default/font/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" id="templateStyle" type="text/css"
        href="{{ asset('assets/mobile/' . general()->warna . '/custom/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/mobile/themes/default/sass/custom.css') }}">
    <script src="https://files.wizestatic.cloud/assets/jquery/sweet_alert2.min.js"></script>

</head>

<body>

    <header class="header">
        <div class="header__mid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 d-flex align-items-center">
                        <div class="header-logo">
                            <a href="{{ url('') }}">
                                <img alt="WebsiteLogo" src="{{ general()->logo }}" width="250" height="54">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <br>
                        <div class="header-form">
                            @guest
                            <a href="{{ route('register') }}" class="button-login">Daftar</a>
                            <button data-target="slide-out" class="btn-daftar sidenav-toggle btn-sm"><i
                                    class="fas fa-bars"></i></button>
                            @endguest

                            @auth
                            <div class="mobile-button--transaksi" href="#" data-toggle="modal"
                                data-target="#accountBalance">
                                <a class="wallet-amount" id="wallet-amount"><i class="fas fa-coins m-auto"></i> IDR
                                    <span name="mainBalance">{{ number_format(auth()->user()->balance, 2) }}</span></a>
                            </div>
                            <button data-target="slide-out" class="btn-daftar sidenav-toggle btn-sm"><i
                                    class="fas fa-bars"></i></button>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="header-mobile">
        <div class="header-mobile__top">
            <div class="mobile-logo">
                <a href="{{ url('') }}">
                    <img src="{{ general()->logo }}" alt="WebsiteLogo" width="125" height="27">
                </a>
            </div>
            <div class="mobile-button">
                @auth
                <a href="#" name="refreshWallet" onclick='tarikSaldo()'><span><i class="fa fa-sync"></i></span></a>
                <div class="mobile-button--transaksi" href="#" data-toggle="modal" data-target="#accountBalance">
                    <i class="fas fa-coins m-auto"></i> IDR
                    <a class="wallet-amount" id="wallet-amount"><span name="mainBalance">{{
                            number_format(auth()->user()->balance, 2) }}</span></a>
                </div>
                <div data-target="slide-out" class="mobile-button--menu sidenav-toggle">
                    <i class="fas fa-bars"></i>
                </div>
                @endauth
                @guest
                <a class="mobile-button--register" href="{{ route('register') }}">Daftar</a>
                <div data-target="slide-out" class="mobile-button--menu sidenav-toggle">
                    <i class="fas fa-bars"></i>
                </div>
                @endguest


            </div>

        </div>
        <div class="header-mobile__marquee">
            <i class="fas fa-bullhorn"></i>
            <marquee class="marquee">{{ general()->title }}</marquee>
            <a href="" style="line-height: 0;"><img class="pr-2"
                    src="https://images.linkcdn.cloud/global/nav-addons/event.webp" alt="Event" width="85px"></a>
        </div>
    </div>


    <div id="overlay"></div>

    @include('frontend.layouts.sidenav')

    @yield('mobile')

    <div class="footer-mobile">
        <a class="footer-item active" href="{{ url('') }}">
            <div class="footer-icon"><i class="fas fa-home"></i></div>
            <div class="footer-title">Home</div>
        </a>
        @guest
        <a class="footer-item" href="/">
            <div class="footer-icon"><i class="fab fa-android"></i></div>
            <div class="footer-title">Apps</div>
        </a>
        @endguest
        @auth
        <a class="footer-item" href="{{ route('transaksi') }}">
            <div class="footer-icon"><i class="fas fa-credit-card"></i></div>
            <div class="footer-title">Deposit</div>
        </a>
        @endauth

        @guest
        <a class="footer-item footer-login" href="#" data-toggle="modal" data-target="#loginModal">
            <div class="footer-icon"><i class="fas fa-user-alt"></i></div>
            <div class="footer-title">Masuk</div>
        </a>
        @endguest
        @auth
        <a class="footer-item footer-login" href="slot">
            <div class="footer-icon"><i class="fas fa-user-alt"></i></div>
            <div class="footer-title">Permainan</div>
        </a>
        @endauth
        <a class="footer-item " href="{{ route('promotion') }}">
            <div class="footer-icon"><i class="fas fa-tags"></i> <i class="fas fa-percent"></i></div>
            <div class="footer-title">Promosi</div>
        </a>
        <a class="footer-item" target="_blank" rel="noreferrer"
            href="https://direct.lc.chat/{{ contact()->id_livechat }}/">
            <div class="footer-icon"><i class="fas fa-comments"></i></div>
            <div class="footer-title">Live Chat</div>
        </a>
    </div>
    <!-- Modal -->
    <div class="modal fade custom-popup" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulir Login</h5>
                </div>

                <div class="modal-body">
                    <div class="modal-body-form">
                        <form name="login-form" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-item">
                                <div class="item-title">Nama Pengguna*</div>
                                <input value="" minlength="1" maxlength="25" name="username" type="text"
                                    placeholder="Nama Pengguna*" autocomplete="off" required>
                            </div>
                            <div class="form-item">
                                <div class="item-title">Kata Sandi*</div>
                                <input value="" minlength="5" maxlength="50" name="password" type="password"
                                    placeholder="Kata Sandi*" autocomplete="off" required>
                            </div>
                            <div class="form-button">
                                <button name="submit" type="submit" class="button-login">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Account Balance -->
    @auth
    <div class="modal custom-popup fade" id="accountBalance" tabindex="-1" aria-labelledby="accountBalanceLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
                <div class="modal-body">
                    <div class="popup-account-balance">
                        <div class="balance-header">
                            <h6>DOMPET</h6>
                            <div class="acc-balance"><span name="mainBalance"></span></div>
                        </div>
                        <div class="balance-category d-flex align-items-center">
                            <div class="category-name m-0">DOMPET UTAMA</div>
                            <div class="acc-balance ml-auto"><span id="balance-common-total">{{
                                    number_format(auth()->user()->balance, 2) }}</span>
                            </div>
                        </div>


                    </div>
                    <div class="balance-button">
                        <a href="{{ route('transaksi') }}" id="depositModal" type="button" class="btn-custom">Tambah
                            Dana</a>
                        <a href="{{ route('transaksi') }}" id="withdrawModal" type="button" class="btn-custom">Tarik
                            Dana</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth
    </div>
    </div>
    <div align="center" id="foot_banner1" style="
    z-index: 9999;
    width: 65px;
    margin: 0 auto;
    overflow: hidden;
    display: scroll;
    position: fixed;
    bottom: 65px;
    left: 0px;
  ">
        <a id="guwak" onclick="document.getElementById('foot_banner1').style.display = 'none';"
            style="cursor: pointer; float: right"><button style="
        z-index: 999920;
        position: absolute;
        float: left;
        top: 0px;
        right: 0px;
        width: 25px;
        height: 25px;
        cursor: pointer;
	font-size: 15px;
        font-weight: bold;
        color: #FFFFFF;
        background-repeat: no-repeat;
        background-size: cover;
        background-color: #FF6202;" id="guwak" alt="close" title="Tutup">
                <center>X</center>
            </button></a>
        @foreach (floating() as $floats)
        <p>
            <a href="{{ $floats->url }}" target="blank">
                <img src="{{ $floats->image }}" alt="" width="65" height="65" style="float:left"></a>
        </p>
        @endforeach
    </div>



    <script src="{{ asset('assets/mobile/themes/default/js/vendor.js') }}"></script>
    <script src="{{ asset('assets/mobile/themes/default/js/global.js') }}"></script>

    <script src="{{ asset('assets/mobile/themes/default/js/index.js') }}"></script>
    @stack('script-lib')
    <script src="{{ asset('assets/mobile/themes/default/vendor/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @auth
    <script>
        function fetchbalanace() {
            fetch('{{ route('api.balance') }}')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('ballapi').textContent = data.balance;
                })
                .catch(error => {
                    console.error('Error fetching Balance:', error);
                    document.getElementById('ballapi').textContent = 'Error fetching Balance';
                });
        }
        window.onload = fetchbalanace;
    </script>
    <script>
        function reloadBalance() {
                    $.ajax({
                        url: '{{ route('api.balance') }}', // Ganti dengan URL yang sesuai dengan skrip pembaruan saldo Anda
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            // Memperbarui tampilan saldo dengan data yang diterima dari server
                            var newBalance = response.saldo;
                            $('#wallet-amount span[name="mainBalance"]').text(newBalance);
                            alert("Balance reloaded!");
                        },
                        error: function(xhr, status, error) {
                            // Penanganan kesalahan jika ada
                            console.error(error);
                        }
                    });
                }
    </script>
    @endauth
    @if (session('success'))
    <script>
        Swal.fire({
                    title: "Success!",
                    text: "{{ session('success') }}",
                    icon: "success"
                });
    </script>
    @endif @if (session('error'))
    <script>
        Swal.fire({
                        title: "Error!",
                        text: "{{ session('error') }}",
                        icon: "error"
                    });
    </script>
    @endif
    <script>
        function tarikSaldo() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Saldo telah di refresh.',
                        showCancelButton: true,
                        confirmButtonText: 'OK',
                        cancelButtonText: 'Tutup',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload(true);
                        }
                    });
                }
    </script>
    <script>
        $(document).ready(function() {
                    $(this).scrollTop(0);

                    $('#homePopup').modal('hide');


                });

                function handler(e) {
                    e.stopPropagation();
                    e.preventDefault();
                }
    </script>
    <script>
        window.showError = (title, message) => {
                    return Swal.fire({
                        icon: 'info',
                        title: title,
                        html: message,
                        timerProgressBar: true,
                        timer: 5000,
                    });
                }

                $(".game-search>.form-control-sm").on("focus", function() {
                    if ($(this).val().length == 0) {
                        $(".game-search").width('100%');
                        $(".form-control-sm").width('100%');
                    }
                })

                $(".game-search>.form-control-sm").on("focusout", function() {
                    if ($(this).val().length == 0) {
                        $(".game-search").width('');
                        $(".form-control-sm").width('');
                    }
                })


                function gameAlert() {
                    return Swal.fire({
                        icon: 'info',
                        title: "Perhatian.",
                        html: "Silakan login untuk bermain!",
                        timerProgressBar: true,
                        timer: 5000,
                    });
                }

                function gamemaintenance() {
                    return Swal.fire({
                        icon: 'info',
                        title: "Opps.",
                        html: "Provider Ini Sedang Dalam Proses Maintenance!",
                        timerProgressBar: true,
                        timer: 5000,
                    });
                }

                function deposit() {
                    return Swal.fire({
                        icon: 'error',
                        title: "Opps.",
                        html: "Saldo kamu tidak cukup harap lakukan deposit",
                        timerProgressBar: true,
                        timer: 5000,
                    });
                }
    </script>
    @stack('script')
</body>

</html>
@endmobile

@desktop
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="{{ general()->deskripsi }}">
    <meta name="keywords" content="{{ general()->keyword }}">
    <meta property="og:description" content="{{ general()->deskripsi }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url('') }}">
    <meta property="og:image" content="{{ general()->logo }}">
    <meta name="robots" content="index, follow">
    <meta name="author" content="{{ url('') }}">
    <meta name="theme-color" content="linear-gradient(to bottom, #ebf4f9 0%, #c3c0cc 100%)">
    <meta name="msapplication-TileColor" content="linear-gradient(to bottom, #ebf4f9 0%, #c3c0cc 100%)">
    <meta name="msapplication-navbutton-color" content="linear-gradient(to bottom, #ebf4f9 0%, #c3c0cc 100%)">
    <meta name="apple-mobile-web-app-status-bar-style" content="linear-gradient(to bottom, #ebf4f9 0%, #c3c0cc 100%)">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ general()->icon_web }}">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">
    <meta name="googlebot-news" content="noindex">
    <!-- Canonical -->
    <link rel="canonical" href="{{ url('') }}" />
    <!-- End Canonical -->
    <meta name="description" itemprop="description" content="{{ general()->deskripsi }}" />
    <meta name="keywords" content="{{ general()->keyword }}" />
    <title>{{ general()->title }}</title>
    <!-- Custom Tags -->
    <meta name="robots" content="index, follow" />
    <meta name="copyright" content="Zulhayker">
    <meta name="rating" content="general" />
    <meta name="geo.placename" content="Indonesia" />
    <meta name="geo.country" content="ID" />
    <meta name="language" content="ID" />
    <meta name="tgn.nation" content="Indonesia" />
    <meta name="rating" content="general" />
    <meta name="author" content="Zulhayker" />
    <!-- End Custom Tags -->
    <link rel="preload" as="font"
        href="{{ asset('assets/desktop/themes/default/font/font-awesome/webfonts/fa-solid-900.woff2') }}"
        type="font/woff2" crossorigin="anonymous">
    <link rel="preload" as="font"
        href="{{ asset('assets/desktop/themes/default/font/font-awesome/webfonts/fa-brands-400.woff2') }}"
        type="font/woff2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/desktop/themes/default/css/global.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}assets/desktop/themes/default/font/font-awesome/css/all.min.css">
    <link rel="stylesheet" id="templateStyle" type="text/css"
        href="{{ asset('assets/desktop/' . general()->warna . '/custom/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/desktop/themes/default/sass/custom.css">
    <script src="https://files.wizestatic.cloud/assets/jquery/sweet_alert2.min.js"></script>
    <style>
        /* CSS untuk tombol scroll ke atas */
        #scrollToTopBtn {
            display: none;
            /* Tombol akan disembunyikan secara default */
            position: fixed;
            /* Tetap di posisi layar */
            bottom: 20px;
            /* Jarak dari bawah layar */
            right: 20px;
            /* Jarak dari kanan layar */
            z-index: 99;
            /* Layer di atas konten lain */
            font-size: 18px;
            padding: 10px;
            border: none;
            outline: none;
            background-color: #333;
            color: #fff;
            cursor: pointer;
            border-radius: 50%;
        }
    </style>
</head>

<body>

    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 d-flex align-items-center">
                        <div class="header-time" id="headerTime"></div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="header-marquee">
                            <i class="fas fa-bullhorn"></i>
                            <marquee class="marquee">
                                {{ general()->title }}
                            </marquee>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="header-icons">
                            <a href="help">
                                <i class="fas fa-info" title="Bantuan"></i>
                            </a>
                            <div class="header-icons">
                                <div id="header-lang" class="header-flag">
                                    <img src="https://images.linkcdn.cloud/global/default/icon/lang/indonesia.png"
                                        alt="id">
                                    <i class="fas fa-caret-down"></i>

                                    <div id="lang-dropdown" class="flag-dropdown">
                                        <a href="javascript:;" data-locale="id" name="locale-switch">
                                            <div class="flag-item">
                                                <img src="https://images.linkcdn.cloud/global/default/icon/lang/indonesia.png"
                                                    alt="id">
                                                <span>Indonesia</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__mid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 d-flex align-items-center">
                        <div class="header-logo">
                            <a href="{{ url('/') }}">
                                <img alt="WebsiteLogo" src="{{ general()->logo }}" width="250" height="54">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        @guest
                        <div class="header-form">
                            <form name="login-form" action="{{ route('login') }}" method="POST">
                                @csrf
                                <input value="" name="username" type="text" placeholder="Nama Pengguna*"
                                    autocomplete="off" required>
                                <input value="" name="password" type="password" placeholder="Kata Sandi*"
                                    autocomplete="off" required>
                                <button name="submit" type="submit" class="button-login">Masuk</button>
                            </form>
                            <a id="register" href="{{ route('register') }}" class="btn-daftar">Daftar</a>
                        </div>
                        @endguest
                        @auth
                        <div class="header-user">
                            <span class="mr-1">Hi, </span>
                            <div class="user-account">
                                <img src="{{ asset('assets/img/New Player.svg') }}" alt="">
                                <span onclick="location.href = 'profile'" class="username">{{ auth()->user()->name
                                    }}</span>
                                <div class="account-status">
                                    <div class="status-title">Status : <a href="profil">New Player</a>
                                    </div>
                                    <div class="status-list">
                                        <img src="{{ asset('assets/img/New Player.svg') }}" alt="" data-toggle="tooltip"
                                            data-placement="top" title="New Player">
                                        <img src="{{ asset('assets/img/Silver.svg') }}" alt="" data-toggle="tooltip"
                                            data-placement="top" title="Silver">
                                        <img src="{{ asset('assets/img/Gold.svg') }}" alt="" data-toggle="tooltip"
                                            data-placement="top" title="Gold">
                                        <img src="{{ asset('assets/img/Platinum.svg') }}" alt="" data-toggle="tooltip"
                                            data-placement="top" title="Platinum">
                                    </div>
                                </div>
                            </div>
                            <div class="user-account">
                                <img src="{{ asset('assets/img/Silver.svg') }}" alt="">
                                <span onclick="location.href = 'profile'" class="username">{{ auth()->user()->name
                                    }}</span>
                                <div class="account-status">
                                    <div class="status-title">Status : <a href="profil">Silver</a>
                                    </div>
                                    <div class="status-list">
                                        <img src="{{ asset('assets/img/New Player.svg') }}" alt="" data-toggle="tooltip"
                                            data-placement="top" title="New Player">
                                        <img src="{{ asset('assets/img/Silver.svg') }}" alt="" data-toggle="tooltip"
                                            data-placement="top" title="Silver">
                                        <img src="{{ asset('assets/img/Silver.svg') }}" alt="" data-toggle="tooltip"
                                            data-placement="top" title="Gold">
                                        <img src="{{ asset('assets/img/Platinum.svg') }}" alt="" data-toggle="tooltip"
                                            data-placement="top" title="Platinum">
                                    </div>
                                </div>
                            </div>

                            <div class="user-wallet ml-1">
                                <span>| TOTAL SALDO :</span>
                                <a href="#" name="refreshWallet" onclick='tarikSaldo()'><span><i
                                            class="fa fa-sync"></i></span></a>
                                <a class="wallet-amount" id="wallet-amount" href="#" data-toggle="modal"
                                    data-target="#accountBalance">
                                    IDR
                                    <span id="mainBalance" name="mainBalance">{{ number_format(auth()->user()->balance,
                                        2) }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="header-form mb-2">
                            <a class="btn-profil " href="profile">Profil</a>
                            <a class="btn-transaksi " href="{{ route('transaksi') }}">Transaksi</a>
                            <a class="btn-transaksi " href="refferal">Refferal</a>
                            <a class="btn-signout" href="{{ route('member.logout') }}">Keluar</a>
                        </div>
                        @endauth
                    </div>
                </div>

            </div>
        </div>
        </div>
        </div>
    </header>
    <div class="header-nav">
        <div id="pageLoadingBar" class="progress-bar progress-bar-success" role="progressbar"
            style="height:4px;width:1%;position:absolute;z-index:999;"></div>
        @include('frontend.layouts.nav')
    </div>
    <div class="header-mobile">
        <div class="header-mobile__top">
            <div class="mobile-logo">
                <a href="{{ url('/') }}">
                    <img src="{{ general()->logo }}" alt="WebsiteLogo" width="125" height="27">
                </a>
            </div>
            <div class="mobile-button">
                @guest
                <a class="mobile-button--register" href="{{ route('register') }}">Daftar</a>
                <div data-target="slide-out" class="mobile-button--menu sidenav-toggle">
                    <i class="fas fa-bars"></i>
                </div>
                @endguest
                @auth
                <div class="badge">
                    <a href="#" class="text-white" name="refreshWallet" onclick='tarikSaldo()'><span><i
                                class="fa fa-sync"></i></span></a>
                </div>
                <div class="mobile-button--transaksi" href="#" data-toggle="modal" data-target="#accountBalance">
                    <i class="fas fa-coins m-auto"></i> IDR
                    <a class="wallet-amount" id="wallet-amount"><span name="mainBalance">{{
                            number_format(auth()->user()->balance, 2) }}</span></a>
                </div>
                <div data-target="slide-out" class="mobile-button--menu sidenav-toggle">
                    <i class="fas fa-bars m-auto"></i>
                </div>
                @endauth

            </div>
        </div>
        <div class="header-mobile__marquee">
            <i class="fas fa-bullhorn"></i>
            <marquee class="marquee">{{ general()->title }}</marquee>
            <a href="" style="line-height: 0;"><img class="pr-2"
                    src="https://images.linkcdn.cloud/global/nav-addons/event.webp" alt="Event" width="85px"></a>
        </div>
        <div id="mobilePageLoadingBar" class="progress-bar progress-bar-success" role="progressbar"
            style="height:4px;width:1%;position:absolute;z-index:999;display:none;"></div>
    </div>
    <div id="overlay"></div>
    @include('frontend.layouts.sidenav')
    @yield('desktop')
    @include('frontend.layouts.provider')


    <div class="footer-mobile">
        <a class="footer-item active" href="{{ url('/') }}">
            <div class="footer-icon"><i class="fas fa-home"></i></div>
            <div class="footer-title">Home</div>
        </a>
        @guest
        <a class="footer-item" href="">
            <div class="footer-icon"><i class="fab fa-android"></i></div>
            <div class="footer-title">Apps</div>
        </a>
        @endguest

        @auth
        <a class="footer-item" href="{{ route('transaksi') }}">
            <div class="footer-icon"><i class="fas fa-credit-card"></i></div>
            <div class="footer-title">Deposit</div>
        </a>
        @endauth

        @guest
        <a class="footer-item footer-login" href="#" data-toggle="modal" data-target="#loginModal">
            <div class="footer-icon"><i class="fas fa-user-alt"></i></div>
            <div class="footer-title">Masuk</div>
        </a>
        @endguest

        @auth
        <a class="footer-item footer-login" href="slot">
            <div class="footer-icon"><i class="fas fa-user-alt"></i></div>
            <div class="footer-title">Permainan</div>
        </a>
        @endauth

        <a class="footer-item " href="{{ route('promotion') }}">
            <div class="footer-icon"><i class="fas fa-tags"></i> <i class="fas fa-percent"></i></div>
            <div class="footer-title">Promosi</div>
        </a>
        <a class="footer-item" target="_blank" rel="noreferrer"
            href="https://direct.lc.chat/{{ contact()->id_livechat }}//">
            <div class="footer-icon"><i class="fas fa-comments"></i></div>
            <div class="footer-title">Live Chat</div>
        </a>
    </div>
    <!-- Modal -->
    <div class="modal fade custom-popup" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulir Login</h5>
                </div>

                <div class="modal-body">
                    <div class="modal-body-form">
                        <form name="login-form" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-item">
                                <div class="item-title">Nama Pengguna*</div>
                                <input value="" minlength="1" maxlength="25" type="text" name="username"
                                    placeholder="Nama Pengguna*" autocomplete="off" required>
                            </div>
                            <div class="form-item">
                                <div class="item-title">Kata Sandi*</div>
                                <input value="" minlength="5" maxlength="50" name="password" type="password"
                                    placeholder="Kata Sandi*" autocomplete="off" required>
                            </div>
                            <div class="form-button">
                                <button name="submit" type="submit" class="button-login">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div align="center" id="foot_banner1" style="
    z-index: 9999;
    width: 165px;
    margin: 0 auto;
    overflow: hidden;
    display: scroll;
    position: fixed;
    top: 270px;
    left: 2px;
  ">
        <a id="guwak" onclick="document.getElementById('foot_banner1').style.display = 'none';"
            style="cursor: pointer; float: right"><button style="
        z-index: 999920;
        position: absolute;
        float: left;
        top: 0px;
        right: 0px;
        width: 25px;
        height: 25px;
        cursor: pointer;
	font-size: 15px;
        font-weight: bold;
        color: #FFFFFF;
        background-repeat: no-repeat;
        background-size: cover;
        background-color: #FF6202;" id="guwak" alt="close" title="Tutup">
                <center>X</center>
            </button></a>
        @foreach (floating() as $floats)
        <p>
            <a href="{{ $floats->url }}" target="blank">
                <img src="{{ $floats->image }}" alt="" width="140" height="140" style="float:left"></a>
        </p>
        @endforeach
    </div>



    <script src="{{ asset('assets/desktop/themes/default/js/vendor.js') }}"></script>
    <script src="{{ asset('assets/desktop/themes/default/js/global.js?v=2.0.1445') }}"></script>
    @stack('sctipt-lib')
    <script src="{{ asset('assets/desktop/themes/default/js/index.js?v=2.0.1445') }}"></script>
    <script src="{{ asset('assets/desktop/themes/default/vendor/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @auth
    <script>
        function fetchbalanace() {
            fetch('{{ route('api.balance') }}')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('ballapi').textContent = data.balance;
                })
                .catch(error => {
                    console.error('Error fetching Balance:', error);
                    document.getElementById('ballapi').textContent = 'Error fetching Balance';
                });
        }
        window.onload = fetchbalanace;
    </script>
    <script>
        function reloadBalance() {
                    $.ajax({
                        url: '{{ route('api.balance') }}', // Ganti dengan URL yang sesuai dengan skrip pembaruan saldo Anda
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            // Memperbarui tampilan saldo dengan data yang diterima dari server
                            var newBalance = response.saldo;
                            $('#wallet-amount span[name="mainBalance"]').text(newBalance);
                            alert("Balance reloaded!");
                        },
                        error: function(xhr, status, error) {
                            // Penanganan kesalahan jika ada
                            console.error(error);
                        }
                    });
                }
    </script>
    @endauth
    @if (session('success'))
    <script>
        Swal.fire({
                    title: "Success!",
                    text: "{{ session('success') }}",
                    icon: "success"
                });
    </script>
    @endif @if (session('error'))
    <script>
        Swal.fire({
                        title: "Error!",
                        text: "{{ session('error') }}",
                        icon: "error"
                    });
    </script>
    @endif
    <script>
        function tarikSaldo() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Saldo telah di refresh.',
                        showCancelButton: true,
                        confirmButtonText: 'OK',
                        cancelButtonText: 'Tutup',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload(true);
                        }
                    });
                }
    </script>

    <script>
        function gameAlert() {
                    return Swal.fire({
                        icon: 'info',
                        title: "Perhatian.",
                        html: "Silakan login untuk bermain!",
                        timerProgressBar: true,
                        timer: 5000,
                    });
                }

                function gamemaintenance() {
                    return Swal.fire({
                        icon: 'info',
                        title: "Opps.",
                        html: "Provider Ini Sedang Dalam Proses Maintenance!",
                        timerProgressBar: true,
                        timer: 5000,
                    });
                }

                function deposit() {
                    return Swal.fire({
                        icon: 'error',
                        title: "Opps.",
                        html: "Saldo kamu tidak cukup harap lakukan deposit",
                        timerProgressBar: true,
                        timer: 5000,
                    });
                }
    </script>

    @stack('script')

    <!-- Start of LiveChat code -->
    <script>
        window.__lc = window.__lc || {};
                window.__lc.license = {{ contact()->id_livechat }};
                (function(n, t, c) {
                    function i(n) {
                        return e._h ? e._h.apply(null, n) : e._q.push(n)
                    }
                    var e = {
                        _q: [],
                        _h: null,
                        _v: "2.0",
                        on: function() {
                            i(["on", c.call(arguments)])
                        },
                        once: function() {
                            i(["once", c.call(arguments)])
                        },
                        off: function() {
                            i(["off", c.call(arguments)])
                        },
                        get: function() {
                            if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load.");
                            return i(["get", c.call(arguments)])
                        },
                        call: function() {
                            i(["call", c.call(arguments)])
                        },
                        init: function() {
                            var n = t.createElement("script");
                            n.async = !0, n.type = "text/javascript", n.src = "https://cdn.livechatinc.com/tracking.js",
                                t.head.appendChild(n)
                        }
                    };
                    !n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e
                }(window, document, [].slice))
    </script>
    <noscript><a href="https://www.livechatinc.com/chat-with/{{ contact()->id_livechat }}/" rel="nofollow">Chat
            with
            us</a>,
        powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow"
            target="_blank">LiveChat</a></noscript>
    <!-- End of LiveChat code -->

</body>

</html>
@enddesktop
