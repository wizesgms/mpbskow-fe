<div class="sidenav">
    <div class="sidenav__header">
        @auth
        <div class="sidenav__header-user">
            <span>Selamat Datang {{ auth()->user()->username }}</span>
        </div>
        @endauth
        <div class="sidenav__header-user-logo">
            <center>
                <img src="{{ general()->logo }}" alt="WebsiteLogo" width="180">
            </center>

        </div>
        @guest
            <div class="sidenav__header-button">
                <div class="sidenav-button-title">Silakan Login atau Mendaftar</div>
                <div class="sidenav-button">
                    <button class="btn-login sidenav-login" type="button" type="button" data-toggle="modal"
                        data-target="#loginModal">Masuk</button>
                    <button class="btn-register" onclick="window.location.href = '{{ route('register') }}'">Daftar</button>
                </div>
                <div class="sidenav-password">
                    <a class="" href="https://direct.lc.chat/{{ contact()->id_livechat }}/">Lupa Password?</a>
                </div>
            </div>
        @endguest
    </div>

    <div class="sidenav__list">
        <ul>
            <a href="{{ url('') }}">
                <li class="active">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </li>
            </a>
            @auth
                <a href="{{ route('transaksi') }}">
                    <li class="">
                        <i class="fas fa-credit-card"></i>
                        <span>Transaksi</span>
                    </li>
                </a>
                <a href="profile">
                    <li class="">
                        <i class="fas fa-user-circle"></i>
                        <span>Akun Saya</span>
                    </li>
                </a>
                <a href="refferal">
                    <li class="">
                        <i class="fas fa-users"></i>
                        <span>Refferal</span>
                    </li>
                </a>
            @endauth

            <a href="{{ route('promotion') }}">
                <li class="">
                    <i class="fas fa-percentage"></i>
                    <span>Promosi</span>
                </li>
            </a>

            @auth
                <a href="{{ route('member.logout') }}">
                    <li>
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Keluar</span>
                    </li>
                </a>
            @endauth


            @guest
                <a href="../uploads/apk/Dewa MPO_1_1.0.apk">
                    <li>
                        <i class="fas fa-download"></i>
                        <span>Download Aplikasi</span>
                    </li>
                </a>
                <a href="contact">
                    <li>
                        <i class="fas fa-phone-alt"></i>
                        <span>Kontak Kami</span>
                    </li>
                </a>
            @endguest
        </ul>
    </div>


    <div id="header-currency" class="header-flag">
        <span>Rupiah</span>
        <i class="fas fa-caret-down"></i>

        <div id="currency-dropdown" class="flag-dropdown">
            <a href="{{ url('/') }}">
                <div class="flag-item">
                    <span>Rupiah</span>
                </div>
            </a>
        </div>
    </div>
    <div id="header-lang" class="header-flag">
        <img src="https://images.linkcdn.cloud/global/default/icon/lang/indonesia.png" width="20" height="14"
            alt="id">
        <i class="fas fa-caret-down"></i>

        <div id="lang-dropdown" class="flag-dropdown">
            <a href="javascript:;" data-locale="id" name="locale-switch">
                <div class="flag-item">
                    <img src="https://images.linkcdn.cloud/global/default/icon/lang/indonesia.png" alt="id">
                    <span>Indonesia</span>
                </div>
            </a>
        </div>
    </div>
</div>
