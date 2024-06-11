@extends('frontend.layouts.main')
@section('mobile')
    <!-- Account Balance -->
    <main id="main-route">
        <div class="main-content register post">
            <div class="container">
                <div class="row">
                    <div class ="col-lg-8">
                        <div class="register__container">
                            <div class="page-header"><i class="fas fa-user-alt mr-2"></i>| Formulir Pendaftaran</div>
                            <form id="register-form" method="POST" action="{{ route('register') }}" data-parsley-validate=""
                                novalidate="novalidate">
                                @csrf
                                <input type="hidden" name="ipAddress" value="{{ request()->ip() }}">
                                <div class="register-form">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="register__note">
                                                <div class="note__head">Catatan :</div>
                                                <div class="note__content">
                                                    *Nama pengguna harus terdiri dari 6 hingga 15 karakter dan mengunakan
                                                    alfabet.<br>
                                                    *Kata sandi harus terdiri dari 8 hingga 25 karakter.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                                <label for="username_register">Nama Pengguna*</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="text" value="" name="username"
                                                    id="username_register" minlength="6" maxlength="15"
                                                    placeholder="Nama Pengguna" data-parsley-trigger="keyup"
                                                    style="text-transform: lowercase" autocomplete="off" autofocus="">
                                                <span id="username_register-error" style="display: none;"><span
                                                        class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                                <label for="password">Kata Sandi*</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="password" name="password"
                                                    id="password_register" minlength="8" maxlength="25"
                                                    placeholder="Kata Sandi" data-parsley-trigger="keyup"
                                                    autocomplete="off">
                                                <span id="password_register-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                                <label for="rePassword">Konfirmasi Kata Sandi*</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="password" name="password_confirmation"
                                                    id="password_confirmation" minlength="8" maxlength="25"
                                                    placeholder="Konfirmasi Kata Sandi" data-parsley-equalto="#password"
                                                    data-parsley-trigger="keyup" autocomplete="off">
                                                <span id="password_confirmation-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="register__notemail">
                                                <div class="note__content">
                                                    *Harap mengisi email dan nomor ponsel yang aktif untuk memudahkan
                                                    perubahan password dan informasi promo.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                                <label for="email">Email*</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" value="" type="email" name="email"
                                                    id="email" minlength="6" maxlength="50"
                                                    placeholder="nama@domain.com" data-parsley-type="email"
                                                    data-parsley-trigger="keyup" autocomplete="off">
                                                <span id="email-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                                <label for="bank">Bank*</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="bank" id="bank">
                                                    <option value="">--- Pilih Bank ---</option>
                                                    <optgroup label="epayment">
                                                        <option value="qris" data-max="0" data-min="0">
                                                            QRIS
                                                        </option>
                                                        <option value="dana" data-max="0" data-min="0">
                                                            DANA
                                                        </option>
                                                        <option value="gopay" data-max="0" data-min="0">
                                                            GOPAY
                                                        </option>
                                                        <option value="linkaja" data-max="0" data-min="0">
                                                            LINKAJA
                                                        </option>
                                                        <option value="ovo" data-max="0" data-min="0">
                                                            OVO
                                                        </option>
                                                        <option value="qris" data-max="0" data-min="0">
                                                            QRIS
                                                        </option>
                                                        <option value="sakuku" data-max="0" data-min="0">
                                                            SAKUKU
                                                        </option>
                                                        <option value="shopeepay" data-max="0" data-min="0">
                                                            SHOPEEPAY
                                                        </option>
                                                    </optgroup>
                                                    <optgroup label="bank">
                                                        <option value="bca" data-max="10" data-min="10">
                                                            BCA
                                                        </option>
                                                        <option value="bni" data-max="10" data-min="10">
                                                            BNI
                                                        </option>
                                                        <option value="bri" data-max="15" data-min="15">
                                                            BRI
                                                        </option>
                                                        <option value="bsi" data-max="0" data-min="0">
                                                            BSI
                                                        </option>
                                                        <option value="danamon" data-max="12" data-min="10">
                                                            DANAMON
                                                        </option>
                                                        <option value="seabank" data-max="0" data-min="0">
                                                            SEABANK
                                                        </option>
                                                        <option value="mandiri" data-max="13" data-min="13">
                                                            MANDIRI
                                                        </option>
                                                        <option value="permata" data-max="0" data-min="0">
                                                            PERMATA
                                                        </option>
                                                        <option value="bnc" data-max="0" data-min="0">
                                                            BANK NEO COMMERCE
                                                        </option>
                                                        <option value="btn" data-max="0" data-min="0">
                                                            BTN
                                                        </option>
                                                        <option value="btpn" data-max="0" data-min="0">
                                                            BTPN
                                                        </option>
                                                        <option value="bukopin" data-max="0" data-min="0">
                                                            BANK BUKOPIN
                                                        </option>
                                                        <option value="cimb" data-max="13" data-min="12">
                                                            CIMB
                                                        </option>
                                                        <option value="jago" data-max="0" data-min="0">
                                                            BANK JAGO
                                                        </option>
                                                        <option value="mega" data-max="0" data-min="0">
                                                            MEGA
                                                        </option>
                                                        <option value="maybank" data-max="0" data-min="0">
                                                            MAYBANK
                                                        </option>
                                                        <option value="mestika" data-max="0" data-min="0">
                                                            MESTIKA
                                                        </option>
                                                        <option value="ocbc" data-max="12" data-min="12">
                                                            OCBC
                                                        </option>
                                                        <option value="panin" data-max="0" data-min="0">
                                                            PANIN BANK
                                                        </option>
                                                        <option value="sinarmas" data-max="0" data-min="0">
                                                            BANK SINARMAS
                                                        </option>
                                                        <option value="riaukepri" data-max="0" data-min="0">
                                                            BANK RIAU KEPRI
                                                        </option>
                                                        <option value="sumut" data-max="0" data-min="0">
                                                            BANK SUMUT
                                                        </option>
                                                    </optgroup>
                                                    <optgroup label="phonecredit">
                                                        <option value="telkomsel" data-max="0" data-min="0">
                                                            TELKOMSEL
                                                        </option>
                                                    </optgroup>
                                                </select>
                                                <span id="bank-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="phoneInput">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                                <label for="phone">Nomor Ponsel*</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">+62</span>
                                                    </div>
                                                    <input class="form-control" value="" type="text"
                                                        name="phone" id="phone" minlength="8" maxlength="20"
                                                        placeholder="Nomor Ponsel*" data-parsley-type="number"
                                                        data-parsley-trigger="keyup" autocomplete="off">
                                                </div>
                                                <span id="phone-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="accountName">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                                <label for="accName">Nama Rekening*</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" value="" type="text" name="accName"
                                                    id="accName" minlength="2" maxlength="100"
                                                    placeholder="Nama Sesuai Rekening" data-parsley-type="text"
                                                    data-parsley-trigger="keyup" autocomplete="off">
                                                <span id="accName-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="accountNumber">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                                <label for="accNumber">Nomor Rekening*</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" value="" type="text"
                                                    name="accNumber" id="accNumber" minlength="" maxlength="99"
                                                    placeholder="Nomor Sesuai Rekening" data-parsley-type="number"
                                                    data-parsley-trigger="keyup" autocomplete="off">
                                                <span id="accNumber-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                                <label for="referral">Referral</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="text" name="referral"
                                                    id="referral" minlength="4" maxlength="25"
                                                    placeholder="Kode Referral (Boleh di kosongkan)" value=""
                                                    autocomplete="off">
                                                <span id="referral-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                                <label for="captcha">Captcha*</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="cap-img">
                                                    <div class="cap-content">
                                                        <img id="captcha" src="{{ captcha_src() }}">
                                                        <button id="refreshCaptcha" class="btn btn-sm btn-info">
                                                            <i class="fas fa-sync-alt"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="cap-content">
                                                    <input class="form-control input-code" type="text" name="captcha"
                                                        id="captcha" placeholder="Captcha" data-parsley-type="number"
                                                        data-parsley-trigger="keyup">
                                                </div>
                                                <span id="captcha-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="term" class="register-terms">
                                                    <input type="checkbox" name="term" id="term">
                                                    <span class="text-justify">Saya telah berusia lebih dari 21 tahun,
                                                        telah membaca, dan menerima <u><a href="/help">syarat dan
                                                                ketentuan</a></u> yang dipasang di situs ini, jika Saya
                                                        melanggar salah satu syarat dan ketentuan, maka situs berhak untuk
                                                        menghentikan atau menangguhkan akun Saya.</span>
                                                </label>
                                                <span id="term-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button id="registerButton" class="daftar btn-custom button-submit"
                                                type="submit">
                                                Buat Akun
                                                <div id="progressButton" class="progress-line"></div>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="post__container ">
                            <div class="other-post">
                                <div class="other-header">Promosi Terakhir</div>
                                @foreach ($promotion as $promot)
                                    <a href="{{ $promot->slug }}">
                                        <div class="other-item">
                                            <div class="img">
                                                <img src="{{ $promot->gambar }}" alt="" loading="lazy">
                                            </div>
                                            <div class="content">
                                                <div class="title">{{ $promot->judul }}</div>
                                                <div class="read-more">Selengkapnya</div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
    </main>
@endsection

@section('desktop')
    <!-- Account Balance -->
    <main id="main-route">
        <div class="main-content register post">
            <div class="container">
                <div class="row">
                    <div class ="col-lg-8">
                        <div class="register__container">
                            <div class="page-header"><i class="fas fa-user-alt mr-2"></i>| Formulir Pendaftaran</div>
                            <form id="register-form" method="POST" action="{{ route('register') }}"
                                data-parsley-validate="" novalidate="novalidate">
                                @csrf
                                <input type="hidden" name="ipAddress" value="{{ request()->ip() }}">
                                <div class="register-form">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="register__note">
                                                <div class="note__head">Catatan :</div>
                                                <div class="note__content">
                                                    *Nama pengguna harus terdiri dari 6 hingga 15 karakter dan mengunakan
                                                    alfabet.<br>
                                                    *Kata sandi harus terdiri dari 8 hingga 25 karakter.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                                <label for="username_register">Nama Pengguna*</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="text" value=""
                                                    name="username" id="username_register" minlength="6" maxlength="15"
                                                    placeholder="Nama Pengguna" data-parsley-trigger="keyup"
                                                    style="text-transform: lowercase" autocomplete="off" autofocus="">
                                                <span id="username_register-error" style="display: none;"><span
                                                        class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                                <label for="password">Kata Sandi*</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="password" name="password"
                                                    id="password_register" minlength="8" maxlength="25"
                                                    placeholder="Kata Sandi" data-parsley-trigger="keyup"
                                                    autocomplete="off">
                                                <span id="password_register-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                                <label for="rePassword">Konfirmasi Kata Sandi*</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="password" name="password_confirmation"
                                                    id="password_confirmation" minlength="8" maxlength="25"
                                                    placeholder="Konfirmasi Kata Sandi" data-parsley-equalto="#password"
                                                    data-parsley-trigger="keyup" autocomplete="off">
                                                <span id="password_confirmation-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="register__notemail">
                                                <div class="note__content">
                                                    *Harap mengisi email dan nomor ponsel yang aktif untuk memudahkan
                                                    perubahan password dan informasi promo.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                                <label for="email">Email*</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" value="" type="email" name="email"
                                                    id="email" minlength="6" maxlength="50"
                                                    placeholder="nama@domain.com" data-parsley-type="email"
                                                    data-parsley-trigger="keyup" autocomplete="off">
                                                <span id="email-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                                <label for="bank">Bank*</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="bank" id="bank">
                                                    <option value="">--- Pilih Bank ---</option>
                                                    <optgroup label="epayment">
                                                        <option value="qris" data-max="0" data-min="0">
                                                            QRIS
                                                        </option>
                                                        <option value="dana" data-max="0" data-min="0">
                                                            DANA
                                                        </option>
                                                        <option value="gopay" data-max="0" data-min="0">
                                                            GOPAY
                                                        </option>
                                                        <option value="linkaja" data-max="0" data-min="0">
                                                            LINKAJA
                                                        </option>
                                                        <option value="ovo" data-max="0" data-min="0">
                                                            OVO
                                                        </option>
                                                        <option value="qris" data-max="0" data-min="0">
                                                            QRIS
                                                        </option>
                                                        <option value="sakuku" data-max="0" data-min="0">
                                                            SAKUKU
                                                        </option>
                                                        <option value="shopeepay" data-max="0" data-min="0">
                                                            SHOPEEPAY
                                                        </option>
                                                    </optgroup>
                                                    <optgroup label="bank">
                                                        <option value="bca" data-max="10" data-min="10">
                                                            BCA
                                                        </option>
                                                        <option value="bni" data-max="10" data-min="10">
                                                            BNI
                                                        </option>
                                                        <option value="bri" data-max="15" data-min="15">
                                                            BRI
                                                        </option>
                                                        <option value="bsi" data-max="0" data-min="0">
                                                            BSI
                                                        </option>
                                                        <option value="danamon" data-max="12" data-min="10">
                                                            DANAMON
                                                        </option>
                                                        <option value="seabank" data-max="0" data-min="0">
                                                            SEABANK
                                                        </option>
                                                        <option value="mandiri" data-max="13" data-min="13">
                                                            MANDIRI
                                                        </option>
                                                        <option value="permata" data-max="0" data-min="0">
                                                            PERMATA
                                                        </option>
                                                        <option value="bnc" data-max="0" data-min="0">
                                                            BANK NEO COMMERCE
                                                        </option>
                                                        <option value="btn" data-max="0" data-min="0">
                                                            BTN
                                                        </option>
                                                        <option value="btpn" data-max="0" data-min="0">
                                                            BTPN
                                                        </option>
                                                        <option value="bukopin" data-max="0" data-min="0">
                                                            BANK BUKOPIN
                                                        </option>
                                                        <option value="cimb" data-max="13" data-min="12">
                                                            CIMB
                                                        </option>
                                                        <option value="jago" data-max="0" data-min="0">
                                                            BANK JAGO
                                                        </option>
                                                        <option value="mega" data-max="0" data-min="0">
                                                            MEGA
                                                        </option>
                                                        <option value="maybank" data-max="0" data-min="0">
                                                            MAYBANK
                                                        </option>
                                                        <option value="mestika" data-max="0" data-min="0">
                                                            MESTIKA
                                                        </option>
                                                        <option value="ocbc" data-max="12" data-min="12">
                                                            OCBC
                                                        </option>
                                                        <option value="panin" data-max="0" data-min="0">
                                                            PANIN BANK
                                                        </option>
                                                        <option value="sinarmas" data-max="0" data-min="0">
                                                            BANK SINARMAS
                                                        </option>
                                                        <option value="riaukepri" data-max="0" data-min="0">
                                                            BANK RIAU KEPRI
                                                        </option>
                                                        <option value="sumut" data-max="0" data-min="0">
                                                            BANK SUMUT
                                                        </option>
                                                    </optgroup>
                                                    <optgroup label="phonecredit">
                                                        <option value="telkomsel" data-max="0" data-min="0">
                                                            TELKOMSEL
                                                        </option>
                                                    </optgroup>
                                                </select>
                                                <span id="bank-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="phoneInput">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                                <label for="phone">Nomor Ponsel*</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">+62</span>
                                                    </div>
                                                    <input class="form-control" value="" type="text"
                                                        name="phone" id="phone" minlength="8" maxlength="20"
                                                        placeholder="Nomor Ponsel*" data-parsley-type="number"
                                                        data-parsley-trigger="keyup" autocomplete="off">
                                                </div>
                                                <span id="phone-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="accountName">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                                <label for="accName">Nama Rekening*</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" value="" type="text" name="accName"
                                                    id="accName" minlength="2" maxlength="100"
                                                    placeholder="Nama Sesuai Rekening" data-parsley-type="text"
                                                    data-parsley-trigger="keyup" autocomplete="off">
                                                <span id="accName-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="accountNumber">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                                <label for="accNumber">Nomor Rekening*</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" value="" type="text"
                                                    name="accNumber" id="accNumber" minlength="" maxlength="99"
                                                    placeholder="Nomor Sesuai Rekening" data-parsley-type="number"
                                                    data-parsley-trigger="keyup" autocomplete="off">
                                                <span id="accNumber-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                                <label for="referral">Referral</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="text" name="referral"
                                                    id="referral" minlength="4" maxlength="25"
                                                    placeholder="Kode Referral (Boleh di kosongkan)" value=""
                                                    autocomplete="off">
                                                <span id="referral-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                                <label for="captcha">Captcha*</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="cap-img">
                                                    <div class="cap-content">
                                                        <img id="captcha" src="{{ captcha_src() }}">
                                                        <button id="refreshCaptcha" class="btn btn-sm btn-info">
                                                            <i class="fas fa-sync-alt"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="cap-content">
                                                    <input class="form-control input-code" type="text" name="captcha"
                                                        id="captcha" placeholder="Captcha" data-parsley-type="number"
                                                        data-parsley-trigger="keyup">
                                                </div>
                                                <span id="captcha-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="term" class="register-terms">
                                                    <input type="checkbox" name="term" id="term">
                                                    <span class="text-justify">Saya telah berusia lebih dari 21 tahun,
                                                        telah membaca, dan menerima <u><a href="/help">syarat dan
                                                                ketentuan</a></u> yang dipasang di situs ini, jika Saya
                                                        melanggar salah satu syarat dan ketentuan, maka situs berhak untuk
                                                        menghentikan atau menangguhkan akun Saya.</span>
                                                </label>
                                                <span id="term-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button id="registerButton" class="daftar btn-custom button-submit"
                                                type="submit">
                                                Buat Akun
                                                <div id="progressButton" class="progress-line"></div>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="post__container ">
                            <div class="other-post">
                                <div class="other-header">Promosi Terakhir</div>
                                @foreach ($promotion as $promot)
                                    <a href="{{ $promot->slug }}">
                                        <div class="other-item">
                                            <div class="img">
                                                <img src="{{ $promot->gambar }}" alt="" loading="lazy">
                                            </div>
                                            <div class="content">
                                                <div class="title">{{ $promot->judul }}</div>
                                                <div class="read-more">Selengkapnya</div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
    </main>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#refreshCaptcha').click(function(e) {
                e.preventDefault();
                $('#captcha').attr('src', window.location.origin + '/captcha/default?' + Math.random())
            });
        });

        function loadingBar() {
            let i = 0;
            if (i == 0) {
                i = 1;
                let elem = document.getElementById("progressButton");
                let width = 1;
                let id = setInterval(frame, 10);

                function frame() {
                    if (width >= 100) {
                        clearInterval(id);
                        i = 0;
                    } else {
                        width++;
                        elem.style.width = width + "%";
                    }
                }
            }
        }

        var timer;
        $('#username_register').on('focusout', function() {
            $("#username_register-error").html(
                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`);
            let username = $('#username_register').val()
            if (username.length > 6) {
                clearTimeout(timer);
                timer = setTimeout(userCheck, 2000);
            } else {
                $("#username_register-error").hide()
            }
        });

        function userCheck() {
            let username = $('#username_register').val()
            if (username.length < 6) {
                $("#username_register-error").hide();
                return false;
            }
            let url = "{{ route('user.check') }}"
            $("#username_register-error").show();
            $.ajax({
                type: 'post',
                url: url,
                data: {
                    _token: "{{ csrf_token() }}",
                    username: username
                },
                success: function(data) {
                    if (data.success === false) {
                        $("#username_register").removeClass('is-invalid').addClass('is-valid')
                        $("#username_register-error").text(data.error);
                    } else {
                        $("#username_register").removeClass('is-valid').addClass('is-invalid')
                        $("#username_register-error").text(data.error);
                    }
                },
            });
        };

        $("#phone").on('input propertychange paste', function() {
            var reg = /^0+/gi;
            if (this.value.match(reg)) {
                this.value = this.value.replace(reg, '');
            }
        });

        function allowedKey(event, regex) {
            let reg = new RegExp(regex);
            let k = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!reg.test(k)) {
                event.preventDefault();
                return false;
            }
        }

        $('#username_register').bind('keypress', function(event) {
            return allowedKey(event, "^[a-zA-Z0-9]+$")
        });
        $('#phone').bind('keypress', function(event) {
            return allowedKey(event, "^[0-9]+$")
        });
        $('#accName').bind('keypress', function(event) {
            return allowedKey(event, "^[a-zA-Z ]+$")
        });
        $('#accNumber').bind('keypress', function(event) {
            return allowedKey(event, "^[0-9]+$")
        });

        jQuery.validator.addMethod("validatePhone", function(value, element) {
            let currency = "IDR"
            if ($('select[id=bank] :selected').parent().attr('label') != "bank") {
                if (currency == "IDR" && $("input[name=phone]").val()[0] != 8) {
                    return false;
                } else {
                    return true
                }
            } else {
                return true;
            }
        }, "Nomor ponsel tidak valid, mohon periksa kembali nomor ponsel anda.");

        $("#register-form").validate({
            onkeyup: false,
            rules: {
                username: {
                    required: true,
                    minlength: 6
                },
                password: {
                    required: true,
                    minlength: 8
                },
                password_confirmation: {
                    required: true,
                    minlength: 8,
                    equalTo: '#password_register'
                },
                email: {
                    required: true,
                    email: true
                },
                bank: {
                    required: true
                },
                phone: {
                    required: true,
                    validatePhone: true
                },
                accName: {
                    required: true
                },
                accNumber: {
                    required: true
                },
                captcha: {
                    required: true
                },
                term: {
                    required: true
                }
            },
            messages: {
                username: {
                    required: "Nama Pengguna Tidak Boleh Kosong",
                    minlength: "Panjang nama pengguna valid adalah 6 hingga 15"
                },
                password: {
                    required: "Kata Sandi tidak boleh kosong",
                    minlength: "Harap masukkan minimal 8 karakter."
                },
                password_confirmation: {
                    required: "Kata Sandi tidak boleh kosong",
                    minlength: "Harap masukkan minimal 8 karakter.",
                    equalTo: "Kata Sandi Konfirmasi Harus Sama."
                },
                email: {
                    required: "Alamat Email tidak boleh kosong.",
                    email: "Alamat Email tidak sesuai. contoh: john@doe.com"
                },
                bank: {
                    required: "Silahkan pilih bank anda.",
                },
                phone: {
                    required: "Nomor Telepon tidak boleh kosong.",
                },
                accName: {
                    required: "Nama Rekening tidak boleh kosong"
                },
                accNumber: {
                    required: "Nomor Rekening tidak boleh kosong"
                },
                captcha: {
                    required: "Captcha tidak boleh kosong"
                },
                term: {
                    required: "Silahkan centang syarat dan ketentuan."
                }
            },
            errorPlacement: function(error, element) {
                let error_id = element.attr("id")
                error.insertAfter($(`span[id=${error_id}-error]`))
            },
            highlight: function(element, errorClass) {
                $(element).closest(".form-control").addClass("is-invalid");
            },
            unhighlight: function(element, errorClass) {
                $(element).closest(".form-control").removeClass("is-invalid").addClass("is-valid");
            }
        });

        $("input[id=accNumber]").attr("maxlength", 99)
        $("select[id=bank]").on("change", function(e) {
            e.preventDefault()
            const cat = $('select[id=bank] :selected').parent().attr('label');
            if (cat == "bank") {
                $("#accountName").show()
                $("#accountNumber").show()
                $("#phoneInput").show()
                $("input[name=phone]").val("");
                $("input[name=accNumber]").unbind("keyup");
                const max = $("select[id=bank]").find(':selected').data('max')
                const min = $("select[id=bank]").find(':selected').data('min')
                if (max == 0) {
                    $("input[name=accNumber]").removeAttr("minlength").removeAttr("maxlength")
                    return false
                }
                $("input[name=accNumber]").attr("minlength", min).attr("maxlength", max)
            } else if (cat == "epayment") {
                $("#phoneInput").hide()
                $("input[name=accNumber]").attr("minlength", 8).attr("maxlength", 13)
                $("#accountNumber").show()
                $($("input[name=accNumber]")).on('keyup', function() {
                    $("input[name=phone]").val(this.value)
                });
                $("#accountName").show()
                $("span[id=accName-error]").html("<small>" + "Pastikan nama sesuai dengan bank yang anda pilih." +
                    "</small>")
                $("span[id=phone-error]").html("<small>" + "Pastikan nomor sesuai dengan bank yang anda pilih." +
                    "</small>")
            } else {
                $("#accountName").hide()
                $("#accountNumber").hide()
                $("#phoneInput").show()
                $($("#phone")).on('keyup', function() {
                    $("#accNumber").val("0" + this.value)
                });
                $("#accName").val($('#username_register').val())
            }
        })
    </script>
@endpush
