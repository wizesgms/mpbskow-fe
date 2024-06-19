@extends('frontend.layouts.main')
@section('mobile')
<main id="main-route">
    <div class="main-content profile">
        <div class="container">
            <ul class="component-tabs nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-item nav-link active mr-0" id="nav-profile-tab" href="javascript:;">
                        <i class="fas fa-user-circle"></i>
                        <span> Profil</span>
                    </a>
                </li>
            </ul>
            <div class="component-tab-content tab-content">
                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                    aria-labelledby="nav-profile-tab">
                    <div class="profile-content">
                        <h3>Profil</h3>
                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <div class="profile-item">
                                    <div class="item-title">Nama Pengguna</div>
                                    <h5>{{ auth()->user()->username }}</h5>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <div class="profile-status">
                                    <div class="status-content">
                                        <div class="content-title">Status Anggota</div>
                                        <h5>NEW PLAYER</h5>
                                    </div>
                                    <div class="status-medal">
                                        <img src="{{ asset('assets/img/New Player.svg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <div class="profile-item">
                                    <div class="item-title">E-mail</div>
                                    <h5>{{ auth()->user()->email }}</h5>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="profile-item">
                                    <div class="item-title">Nomor Kontak</div>
                                    <h5>+{{ auth()->user()->no_hp }}</h5>
                                </div>
                            </div>

                            <div class="col-lg-4 mb-4">
                                <div class="profile-item">
                                    <div class="item-title">Refferal ID</div>
                                    <div>
                                        <span id="refferalCode">{{ $reff->reff_code }}</span>
                                        <a href="#" id="copyReff" class="btn-custom-sm ml-2">
                                            Salin
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <div class="profile-item">
                                    <div class="item-title">Rincian Bank</div>
                                    <div>
                                        <a class="btn-custom-sm" href="#" data-toggle="modal"
                                            data-target="#bankDetail">Perlihatkan</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <form action="{{ route('update.password') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 mb-4">
                                    <div class="profile-item">
                                        <div class="item-title">Kata Sandi Lama</div>
                                        <input type="password" name="password_lama" minlength="8" maxlength="25"
                                            class="form-control form-control-sm" placeholder="Kata Sandi Lama">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <div class="profile-item">
                                        <div class="item-title">Kata Sandi Baru</div>
                                        <input type="password" name="password_baru" minlength="8" maxlength="25"
                                            class="form-control form-control-sm" placeholder="Kata Sandi Baru">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <div class="profile-item">
                                        <div class="item-title">Konfirmasi Kata Sandi</div>
                                        <input type="password" name="konfirmasi_password_baru" minlength="8"
                                            maxlength="25" class="form-control form-control-sm"
                                            placeholder="Konfirmasi Kata Sandi">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-submit btn-custom-sm">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bank Details -->
    <div class="modal custom-popup fade" id="bankDetail" tabindex="-1" aria-labelledby="bankDetailLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
                <div class="modal-body">
                    <div class="popup-bank-detail">
                        <div class="bank-detail-header">
                            <h4>Rekening Saya</h6>
                        </div>
                        <div class="bank-detail-info">
                            <h6 class="info-header">Rekening Utama</h5>
                                <div class="bank-account">
                                    <div class="acc-details">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="acc-name">Nama Rek : <span>{{ $bank->nama_pemilik }}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="bank-name">Nama Bank: <span>{{ $bank->nama_bank }}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="bank-name">Nomor Rekening:
                                                    <span>{{ $bank->nomor_rekening }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
@endsection

@section('desktop')
<main id="main-route">
    <div class="main-content profile">
        <div class="container">
            <ul class="component-tabs nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-item nav-link active mr-0" id="nav-profile-tab" href="javascript:;">
                        <i class="fas fa-user-circle"></i>
                        <span> Profil</span>
                    </a>
                </li>
            </ul>
            <div class="component-tab-content tab-content">
                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                    aria-labelledby="nav-profile-tab">
                    <div class="profile-content">
                        <h3>Profil</h3>
                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <div class="profile-item">
                                    <div class="item-title">Nama Pengguna</div>
                                    <h5>{{ auth()->user()->username }}</h5>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <div class="profile-status">
                                    <div class="status-content">
                                        <div class="content-title">Status Anggota</div>
                                        <h5>NEW PLAYER</h5>
                                    </div>
                                    <div class="status-medal">
                                        <img src="{{ asset('assets/img/New Player.svg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <div class="profile-item">
                                    <div class="item-title">E-mail</div>
                                    <h5>{{ auth()->user()->email }}</h5>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="profile-item">
                                    <div class="item-title">Nomor Kontak</div>
                                    <h5>+{{ auth()->user()->no_hp }}</h5>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <div class="profile-item">
                                    <div class="item-title">Refferal ID</div>
                                    <div>
                                        <span id="refferalCode">{{ $reff->reff_code }}</span>
                                        <a href="#" id="copyReff" class="btn-custom-sm ml-2">
                                            Salin
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <div class="profile-item">
                                    <div class="item-title">Rincian Bank</div>
                                    <div>
                                        <a class="btn-custom-sm" href="#" data-toggle="modal"
                                            data-target="#bankDetail">Perlihatkan</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <form action="{{ route('update.password') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 mb-4">
                                    <div class="profile-item">
                                        <div class="item-title">Kata Sandi Lama</div>
                                        <input type="password" name="password_lama" minlength="8" maxlength="25"
                                            class="form-control form-control-sm" placeholder="Kata Sandi Lama">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <div class="profile-item">
                                        <div class="item-title">Kata Sandi Baru</div>
                                        <input type="password" name="password_baru" minlength="8" maxlength="25"
                                            class="form-control form-control-sm" placeholder="Kata Sandi Baru">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <div class="profile-item">
                                        <div class="item-title">Konfirmasi Kata Sandi</div>
                                        <input type="password" name="konfirmasi_password_baru" minlength="8"
                                            maxlength="25" class="form-control form-control-sm"
                                            placeholder="Konfirmasi Kata Sandi">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-submit btn-custom-sm">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bank Details -->
    <div class="modal custom-popup fade" id="bankDetail" tabindex="-1" aria-labelledby="bankDetailLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
                <div class="modal-body">
                    <div class="popup-bank-detail">
                        <div class="bank-detail-header">
                            <h4>Rekening Saya</h6>
                        </div>
                        <div class="bank-detail-info">
                            <h6 class="info-header">Rekening Utama</h5>
                                <div class="bank-account">
                                    <div class="acc-details">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="acc-name">Nama Rek :
                                                    <span>{{ $bank->nama_pemilik }}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="bank-name">Nama Bank: <span>{{ $bank->nama_bank }}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="bank-name">Nomor Rekening:
                                                    <span>{{ $bank->nomor_rekening }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
@endsection

@push('script')
<script>
    $('#copyReff').click(function (e) {
            e.preventDefault();
            const buttonText = $(this).text()
            const refText = $('#refferalCode').text();
            $(this).html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="loading"></span>`)
            let $temp = $("<input>");
            $("body").append($temp);
            const text = $temp.val("{{ url('/') }}/register?reff="+refText).select();
            document.execCommand("copy");
            $('#refferalCode').text("Copied..")
            setTimeout(() => {
                $('#refferalCode').text(refText)
                $temp.remove();
                $(this).text(buttonText)
            },1000)
        });
</script>
@endpush
