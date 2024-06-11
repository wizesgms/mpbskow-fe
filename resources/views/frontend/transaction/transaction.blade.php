@extends('frontend.layouts.main')
@section('mobile')
    <main id="main-route">
        <div class="main-content transaksi">
            <div class="container">
                <ul class="component-tabs nav nav-tabs" id="transactionTabs">
                    <li class="nav-item">
                        <a class="button-pills nav-link active" id="nav-deposit-tab" data-toggle="tab" href="#nav-deposit"
                            role="tab" aria-controls="nav-deposit" aria-expanded="false">
                            <i class="fas fa-wallet"></i>
                            <span>Tambah Dana</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="button-pills nav-link" id="nav-withdraw-tab" data-toggle="tab" href="#nav-withdraw"
                            role="tab" aria-controls="nav-withdraw" aria-expanded="false">
                            <i class="fas fa-coins"></i>
                            <span>Tarik Dana</span>
                        </a>
                    </li>

                </ul>
                <div class="component-tab-content tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="nav-deposit" role="tabpanel"
                        aria-labelledby="nav-deposit-tab">
                        <div class="transaksi-grid">
                            <div class="transaksi-payment">
                                @foreach ($bank as $ba)
                                <div class="payment-item">
                                    <div class="payment-status online">ONLINE</div>
                                    <div class="payment-body">
                                        <div class="payment-icon">
                                            <img src="{{ $ba->icon }}" alt="{{ $ba->nama_bank }}">
                                        </div>
                                        <div class="payment-content">
                                            <div class="title">{{ $ba->nama_bank }}</div>
                                            <div class="desc"></div>
                                            <div class="desc">Deposit Min {{ general()->min_depo }}</div>
                                            <div class="desc"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="transaksi-form">
                                <form id="formDeposit" enctype="multipart/form-data" method="post"
                                    action="{{ route('transaksi.deposit') }}">
                                    @csrf
                                    <div class="transaksi-formulir flip-card">
                                        <div class="flip-front">
                                            <div class="formulir-title"><i class="fas fa-wallet"></i> | Formulir Deposit
                                            </div>
                                            <div class="formulir-form">
                                                <div class="row mb-3">
                                                    <div class="col-lg-12 d-flex flex-row">
                                                        <label class="note_addbank">Selalu pastikan rekening pengirim atau
                                                            rekening tujuan sesuai dengan data yang terdaftar dan form
                                                            deposit ini otomatis menggunakan kode
                                                            unik {{ general()->kode_unik }}</label>
                                                    </div>
                                                </div>
                                                <div class="text-white"
                                                    style="background: #0f1b39; color: #fff; padding: 20px 10px;">
                                                    <p>Dompet Utama</p>
                                                    <h5 class="text-warning">IDR {{ number_format(auth()->user()->balance ,2) }}</h5>

                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-3 d-flex align-items-center">
                                                            <label>Nomor Rekening</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <span>{{ $bu->nama_bank }} - {{ $bu->nomor_rekening }} - A.n
                                                                ({{ $bu->nama_pemilik }})</span>
                                                            <input type="hidden" name="dari_bank"
                                                                value="{{ $bu->id }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-lg-3 d-flex align-items-center">
                                                            <label>Jumlah Deposit</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input name="nominal" required="" id="depositAmount"
                                                                class="form-control" type="number" placeholder="50000">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-0">

                                                    <div class="row">
                                                        <div class="col-lg-3 d-flex align-items-center">
                                                            <label>Pilih Bank</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <select id="bankSelect" name="metode">
                                                                <option value="" selected="" disabled="">---
                                                                    Pilih Bank ---</option>
                                                                @foreach ($bank as $bks)
                                                                <option value="{{ $bks->id }}">{{ $bks->nama_bank }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                @foreach ($bank as $banks)
                                                <div class="form-group bankOption" id="epayment-{{ $banks->id }}"
                                                    style="display: none;">
                                                    <div class="row">
                                                        <div class="col-lg-3"></div>
                                                        <div class="qris-payment col-lg-6">
                                                            <div class="card">

                                                                <div class="card-header text-center p-1">
                                                                    <img class="img-fluid" style="max-height: 150px"
                                                                        src="{{ $banks->icon }}">
                                                                </div>
                                                                <div class="card-body text-dark"
                                                                    style="font-weight: 600; font-size: 11px;">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            Nama Tujuan Akun:
                                                                        </div>
                                                                        <div class="col">
                                                                            {{ $banks->nama_pemilik }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            Nomor Akun Tujuan:
                                                                        </div>
                                                                        <div class="col-auto flex-shrink-1">
                                                                            <a href="javascript:;" name="copyAddress"
                                                                                id="b1adf38a-4bcf-495a-b734-8eede81404d7">
                                                                                <span> {{ $banks->nomor_rekening }}</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            Min. Deposit:
                                                                        </div>
                                                                        <div class="col-6">
                                                                            IDR {{ number_format(general()->min_depo ,2) }}
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach


                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-3 d-flex align-items-center">
                                                            <label>Pilih Bonus</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <select name="bonus" id="bankSelect">
                                                                <option value="tanpabonus" selected="">Tanpa Bonus
                                                                </option>
                                                                @foreach ($bonus as $bonuse)
                                                                <option value="{{ $bonuse->id }}">{{ $bonuse->judul }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-lg-3 d-flex align-items-center">
                                                        <label style="font-size: 14px;" id="notesLabel">Keterangan</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div id="chooseMode" class="">
                                                            <input id="notes" class="form-control" name="keterangan"
                                                                maxlength="100" type="text" placeholder="...">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="hidden" name="phoneCreditMode" />
                                                        <label style="font-size: 10px;" class="formulir-desc">Maksimal 100
                                                            Karakter</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-3 d-flex align-items-center">
                                                            <label>Bukti Pembayaran</label>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <input id="proof" name="gambar" type="file"
                                                                required="">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="formulir-desc">Hanya format *.jpg, *.jpeg, dan
                                                                *.png yang diperbolehkan, maksimal 1 MB</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <button type="submit"
                                                                class="btn-custom full_width">Kirim</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="transaksi-info">
                            <div class="info-header">Informasi</div>
                            <div class="info-content">
                                <p>PERHATIKAN DENGAN SEKSAMA NOMOR REKENING TUJUAN SEBELUM TRANSFER !</p>
                                <p>Kami tidak memberikan toleransi apabila terjadi kesalahan transfer uang (Deposit) ke
                                    rekening yang tidak tertera di website {{ general()->judul }}.</p>
                                <p>Minimal deposit : Rp.{{ number_format(general()->min_depo ,2) }}<br>Mohon Melakukan Deposit Menggunakan Kode
                                    Unik<br>Harap melakukan konfirmasi deposit 1x saja, dan tunggu permohonan anda diproses
                                    untuk dapat melakukan deposit selanjutnya.</p>Hubungi Whatsapp RESMI
                                {{ general()->judul }} : <a
                                    href="https://wa.me/{{ contact()->no_whatsapp }}"><strong>+{{ contact()->no_whatsapp }}</strong></a>
                                </p>
                            </div>
                        </div>
                        <div class="transaksi-table-bottom">
                            <div class="bottom-form">
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-8">
                                        <div class="form-title">Informasi</div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid table-dataTable">
                                <table class="table table-hover" id="depositHistoryTable">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Pembayaran Ke</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hdepo as $hsd)
                                        <tr>
                                            <td>{{ $hsd->created_at }}</td>
                                            <td>{{ $hsd->metode }}</td>
                                            <td>Rp. {{ number_format($hsd->total ,2) }}</td>
                                            <td>
                                                @if ($hsd->status == 'Pending')
                                                <a class="btn btn-small btn-warning btn-sm">Pending</a>
                                                @elseif ($hsd->status == 'Sukses')
                                                <a class="btn btn-small btn-success btn-sm">Sukses</a>
                                                @elseif ($hsd->status == 'Ditolak')
                                                <a class="btn btn-small btn-danger btn-sm">Ditolak</a>
                                                @else
                                                <a class="btn btn-small btn-danger btn-sm">Pending</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-withdraw" role="tabpanel" aria-labelledby="nav-withdraw-tab">
                        <div class="transaksi-grid">
                            <div class="transaksi-payment">
                                @foreach ($bank as $ba)
                                <div class="payment-item">
                                    <div class="payment-status online">ONLINE</div>
                                    <div class="payment-body">
                                        <div class="payment-icon">
                                            <img src="{{ $ba->icon }}" alt="{{ $ba->nama_bank }}">
                                        </div>
                                        <div class="payment-content">
                                            <div class="title">{{ $ba->nama_bank }}</div>
                                            <div class="desc"></div>
                                            <div class="desc">Deposit Min {{ general()->min_depo }}</div>
                                            <div class="desc"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="transaksi-form">
                                <form id="formWithdraw" action="{{ route('transaksi.withdraw') }}" method="POST">
                                    @csrf
                                    <div class="transaksi-formulir">
                                        <div class="formulir-title"><i class="fas fa-coins"></i> | Formulir Penarikan
                                        </div>
                                        <div class="formulir-form">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-3 d-flex align-items-center">
                                                        <label>Nomor Rekening</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <span>{{ $bu->nama_bank }} - {{ $bu->nomor_rekening }} - A.n
                                                            ({{ $bu->nama_pemilik }})</span>
                                                        <input type="hidden" name="bank"
                                                            value="{{ $bu->id }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label class="formulir-desc">Saldo yang dapat anda tarik : </label>
                                                        <div class="balance-wd">IDR: {{ number_format(auth()->user()->balance,2) }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-lg-3 d-flex align-items-center">
                                                        <label>Nominal Withdraw</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input name="jumlah" required="" id="depositAmount"
                                                            class="form-control" type="number" placeholder="...">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3 d-flex align-items-center">
                                                    <label style="font-size: 14px;" id="notesLabel">Keterangan</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div id="chooseMode" class="">
                                                        <input id="notes" class="form-control" name="keterangan"
                                                            maxlength="100" type="text" placeholder="...">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <input type="hidden" name="phoneCreditMode" />
                                                    <label style="font-size: 10px;" class="formulir-desc">Maksimal 100
                                                        Karakter</label>
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" name="submit" class="btn-custom"
                                                    id="submit-withdraw">Kirim</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="transaksi-info">
                            <div class="info-header">Informasi</div>
                            <div class="info-content">
                                <p>Minimal Withdraw : Rp. {{ number_format(general()->min_wd,2) }}</p>
                                <p>Penarikan DANA Anda akan segera kami proses dengan sangat senang sekali Kami
                                    {{ general()->judul }} Mengucapkan Terima Kasih. Kami tunggu Transaksi anda untuk
                                    selanjutnya.</p>
                            </div>
                        </div>
                        <div class="transaksi-table-bottom">
                            <div class="bottom-form">
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-8">
                                        <div class="form-title">Riwayat Withdraw</div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid table-dataTable">
                                <table class="table table-hover " id="withdrawHistoryTable">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Deskripsi</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hwd as $wdh)
                                        <tr>
                                            <td>{{ $wdh->created_at }}</td>
                                            <td>{{ $wdh->transaksi }}</td>
                                            <td>Rp. {{ number_format($wdh->total ,2) }}</td>
                                            <td>
                                                @if ($wdh->status == 'Pending')
                                                <a class="btn btn-small btn-warning btn-sm">Pending</a>
                                                @elseif ($wdh->status == 'Sukses')
                                                <a class="btn btn-small btn-success btn-sm">Sukses</a>
                                                @elseif ($wdh->status == 'Ditolak')
                                                <a class="btn btn-small btn-danger btn-sm">Ditolak</a>
                                                @else
                                                <a class="btn btn-small btn-danger btn-sm">Pending</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-claim" role="tabpanel" aria-labelledby="nav-claim-tab">
                        <div class="transaksi-bonus" style="display: block;">
                            <div class="claim-bonus">
                                <div id="promoPage"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-cashback" role="tabpanel" aria-labelledby="nav-cashback-tab">
                        <div class="transaksi-bonus" style="display: block;">
                            <div id="cashbackPage">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Ketika elemen <select> berubah
            $("#bankSelect").change(function() {
                // Mendapatkan nilai yang dipilih
                var selectedValue = $(this).val();

                // Semua section yang memiliki class "bankOption" disembunyikan
                $(".bankOption").hide();

                // Menampilkan elemen dengan ID yang sesuai berdasarkan pilihan
                if (selectedValue !== "") {
                    $("#epayment-" + selectedValue).show();
                }
            });
        });
    </script>
@endsection

@section('desktop')
    <main id="main-route">
        <div class="main-content transaksi">
            <div class="container">
                <ul class="component-tabs nav nav-tabs" id="transactionTabs">
                    <li class="nav-item">
                        <a class="button-pills nav-link active" id="nav-deposit-tab" data-toggle="tab" href="#nav-deposit"
                            role="tab" aria-controls="nav-deposit" aria-expanded="false">
                            <i class="fas fa-wallet"></i>
                            <span>Tambah Dana</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="button-pills nav-link" id="nav-withdraw-tab" data-toggle="tab" href="#nav-withdraw"
                            role="tab" aria-controls="nav-withdraw" aria-expanded="false">
                            <i class="fas fa-coins"></i>
                            <span>Tarik Dana</span>
                        </a>
                    </li>

                </ul>
                <div class="component-tab-content tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="nav-deposit" role="tabpanel"
                        aria-labelledby="nav-deposit-tab">
                        <div class="transaksi-grid">
                            <div class="transaksi-payment">
                                @foreach ($bank as $ba)
                                <div class="payment-item">
                                    <div class="payment-status online">ONLINE</div>
                                    <div class="payment-body">
                                        <div class="payment-icon">
                                            <img src="{{ $ba->icon }}" alt="{{ $ba->nama_bank }}">
                                        </div>
                                        <div class="payment-content">
                                            <div class="title">{{ $ba->nama_bank }}</div>
                                            <div class="desc"></div>
                                            <div class="desc">Deposit Min {{ general()->min_depo }}</div>
                                            <div class="desc"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="transaksi-form">
                                <form id="formDeposit" enctype="multipart/form-data" method="post"
                                    action="{{ route('transaksi.deposit') }}">
                                    @csrf
                                    <div class="transaksi-formulir flip-card">
                                        <div class="flip-front">
                                            <div class="formulir-title"><i class="fas fa-wallet"></i> | Formulir Deposit
                                            </div>
                                            <div class="formulir-form">
                                                <div class="row mb-3">
                                                    <div class="col-lg-12 d-flex flex-row">
                                                        <label class="note_addbank">Selalu pastikan rekening pengirim atau
                                                            rekening tujuan sesuai dengan data yang terdaftar dan form
                                                            deposit ini otomatis menggunakan kode
                                                            unik {{ general()->kode_unik }}</label>
                                                    </div>
                                                </div>
                                                <div class="text-white"
                                                    style="background: #0f1b39; color: #fff; padding: 20px 10px;">
                                                    <p>Dompet Utama</p>
                                                    <h5 class="text-warning">IDR {{ number_format(auth()->user()->balance ,2) }}</h5>

                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-3 d-flex align-items-center">
                                                            <label>Nomor Rekening</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <span>{{ $bu->nama_bank }} - {{ $bu->nomor_rekening }} - A.n
                                                                ({{ $bu->nama_pemilik }})</span>
                                                            <input type="hidden" name="dari_bank"
                                                                value="{{ $bu->id }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-lg-3 d-flex align-items-center">
                                                            <label>Jumlah Deposit</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input name="nominal" required="" id="depositAmount"
                                                                class="form-control" type="number" placeholder="50000">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-0">

                                                    <div class="row">
                                                        <div class="col-lg-3 d-flex align-items-center">
                                                            <label>Pilih Bank</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <select id="bankSelect" name="metode">
                                                                <option value="" selected="" disabled="">---
                                                                    Pilih Bank ---</option>
                                                                @foreach ($bank as $bks)
                                                                <option value="{{ $bks->id }}">{{ $bks->nama_bank }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                @foreach ($bank as $banks)
                                                <div class="form-group bankOption" id="epayment-{{ $banks->id }}"
                                                    style="display: none;">
                                                    <div class="row">
                                                        <div class="col-lg-3"></div>
                                                        <div class="qris-payment col-lg-6">
                                                            <div class="card">

                                                                <div class="card-header text-center p-1">
                                                                    <img class="img-fluid" style="max-height: 150px"
                                                                        src="{{ $banks->icon }}">
                                                                </div>
                                                                <div class="card-body text-dark"
                                                                    style="font-weight: 600; font-size: 11px;">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            Nama Tujuan Akun:
                                                                        </div>
                                                                        <div class="col">
                                                                            {{ $banks->nama_pemilik }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            Nomor Akun Tujuan:
                                                                        </div>
                                                                        <div class="col-auto flex-shrink-1">
                                                                            <a href="javascript:;" name="copyAddress"
                                                                                id="b1adf38a-4bcf-495a-b734-8eede81404d7">
                                                                                <span> {{ $banks->nomor_rekening }}</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            Min. Deposit:
                                                                        </div>
                                                                        <div class="col-6">
                                                                            IDR {{ number_format(general()->min_depo ,2) }}
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach


                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-3 d-flex align-items-center">
                                                            <label>Pilih Bonus</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <select name="bonus" id="bankSelect">
                                                                <option value="tanpabonus" selected="">Tanpa Bonus
                                                                </option>
                                                                @foreach ($bonus as $bonuse)
                                                                <option value="{{ $bonuse->id }}">{{ $bonuse->judul }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-lg-3 d-flex align-items-center">
                                                        <label style="font-size: 14px;" id="notesLabel">Keterangan</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div id="chooseMode" class="">
                                                            <input id="notes" class="form-control" name="keterangan"
                                                                maxlength="100" type="text" placeholder="...">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="hidden" name="phoneCreditMode" />
                                                        <label style="font-size: 10px;" class="formulir-desc">Maksimal 100
                                                            Karakter</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-3 d-flex align-items-center">
                                                            <label>Bukti Pembayaran</label>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <input id="proof" name="gambar" type="file"
                                                                required="">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="formulir-desc">Hanya format *.jpg, *.jpeg, dan
                                                                *.png yang diperbolehkan, maksimal 1 MB</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <button type="submit"
                                                                class="btn-custom full_width">Kirim</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="transaksi-info">
                            <div class="info-header">Informasi</div>
                            <div class="info-content">
                                <p>PERHATIKAN DENGAN SEKSAMA NOMOR REKENING TUJUAN SEBELUM TRANSFER !</p>
                                <p>Kami tidak memberikan toleransi apabila terjadi kesalahan transfer uang (Deposit) ke
                                    rekening yang tidak tertera di website {{ general()->judul }}.</p>
                                <p>Minimal deposit : Rp.{{ number_format(general()->min_depo ,2) }}<br>Mohon Melakukan Deposit Menggunakan Kode
                                    Unik<br>Harap melakukan konfirmasi deposit 1x saja, dan tunggu permohonan anda diproses
                                    untuk dapat melakukan deposit selanjutnya.</p>Hubungi Whatsapp RESMI
                                {{ general()->judul }} : <a
                                    href="https://wa.me/{{ contact()->no_whatsapp }}"><strong>+{{ contact()->no_whatsapp }}</strong></a>
                                </p>
                            </div>
                        </div>
                        <div class="transaksi-table-bottom">
                            <div class="bottom-form">
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-8">
                                        <div class="form-title">Informasi</div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid table-dataTable">
                                <table class="table table-hover" id="depositHistoryTable">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Pembayaran Ke</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hdepo as $hsd)
                                        <tr>
                                            <td>{{ $hsd->created_at }}</td>
                                            <td>{{ $hsd->metode }}</td>
                                            <td>Rp. {{ number_format($hsd->total ,2) }}</td>
                                            <td>
                                                @if ($hsd->status == 'Pending')
                                                <a class="btn btn-small btn-warning btn-sm">Pending</a>
                                                @elseif ($hsd->status == 'Sukses')
                                                <a class="btn btn-small btn-success btn-sm">Sukses</a>
                                                @elseif ($hsd->status == 'Ditolak')
                                                <a class="btn btn-small btn-danger btn-sm">Ditolak</a>
                                                @else
                                                <a class="btn btn-small btn-danger btn-sm">Pending</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-withdraw" role="tabpanel" aria-labelledby="nav-withdraw-tab">
                        <div class="transaksi-grid">
                            <div class="transaksi-payment">
                                @foreach ($bank as $ba)
                                <div class="payment-item">
                                    <div class="payment-status online">ONLINE</div>
                                    <div class="payment-body">
                                        <div class="payment-icon">
                                            <img src="{{ $ba->icon }}" alt="{{ $ba->nama_bank }}">
                                        </div>
                                        <div class="payment-content">
                                            <div class="title">{{ $ba->nama_bank }}</div>
                                            <div class="desc"></div>
                                            <div class="desc">Deposit Min {{ general()->min_depo }}</div>
                                            <div class="desc"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="transaksi-form">
                                <form id="formWithdraw" action="{{ route('transaksi.withdraw') }}" method="POST">
                                    @csrf
                                    <div class="transaksi-formulir">
                                        <div class="formulir-title"><i class="fas fa-coins"></i> | Formulir Penarikan
                                        </div>
                                        <div class="formulir-form">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-3 d-flex align-items-center">
                                                        <label>Nomor Rekening</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <span>{{ $bu->nama_bank }} - {{ $bu->nomor_rekening }} - A.n
                                                            ({{ $bu->nama_pemilik }})</span>
                                                        <input type="hidden" name="bank"
                                                            value="{{ $bu->id }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label class="formulir-desc">Saldo yang dapat anda tarik : </label>
                                                        <div class="balance-wd">IDR: {{ number_format(auth()->user()->balance,2) }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-lg-3 d-flex align-items-center">
                                                        <label>Nominal Withdraw</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input name="jumlah" required="" id="depositAmount"
                                                            class="form-control" type="number" placeholder="...">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3 d-flex align-items-center">
                                                    <label style="font-size: 14px;" id="notesLabel">Keterangan</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div id="chooseMode" class="">
                                                        <input id="notes" class="form-control" name="keterangan"
                                                            maxlength="100" type="text" placeholder="...">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <input type="hidden" name="phoneCreditMode" />
                                                    <label style="font-size: 10px;" class="formulir-desc">Maksimal 100
                                                        Karakter</label>
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" name="submit" class="btn-custom"
                                                    id="submit-withdraw">Kirim</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="transaksi-info">
                            <div class="info-header">Informasi</div>
                            <div class="info-content">
                                <p>Minimal Withdraw : Rp. {{ number_format(general()->min_wd,2) }}</p>
                                <p>Penarikan DANA Anda akan segera kami proses dengan sangat senang sekali Kami
                                    {{ general()->judul }} Mengucapkan Terima Kasih. Kami tunggu Transaksi anda untuk
                                    selanjutnya.</p>
                            </div>
                        </div>
                        <div class="transaksi-table-bottom">
                            <div class="bottom-form">
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-8">
                                        <div class="form-title">Riwayat Withdraw</div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid table-dataTable">
                                <table class="table table-hover " id="withdrawHistoryTable">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Deskripsi</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hwd as $wdh)
                                        <tr>
                                            <td>{{ $wdh->created_at }}</td>
                                            <td>{{ $wdh->transaksi }}</td>
                                            <td>Rp. {{ number_format($wdh->total ,2) }}</td>
                                            <td>
                                                @if ($wdh->status == 'Pending')
                                                <a class="btn btn-small btn-warning btn-sm">Pending</a>
                                                @elseif ($wdh->status == 'Sukses')
                                                <a class="btn btn-small btn-success btn-sm">Sukses</a>
                                                @elseif ($wdh->status == 'Ditolak')
                                                <a class="btn btn-small btn-danger btn-sm">Ditolak</a>
                                                @else
                                                <a class="btn btn-small btn-danger btn-sm">Pending</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-claim" role="tabpanel" aria-labelledby="nav-claim-tab">
                        <div class="transaksi-bonus" style="display: block;">
                            <div class="claim-bonus">
                                <div id="promoPage"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-cashback" role="tabpanel" aria-labelledby="nav-cashback-tab">
                        <div class="transaksi-bonus" style="display: block;">
                            <div id="cashbackPage">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Ketika elemen <select> berubah
            $("#bankSelect").change(function() {
                // Mendapatkan nilai yang dipilih
                var selectedValue = $(this).val();

                // Semua section yang memiliki class "bankOption" disembunyikan
                $(".bankOption").hide();

                // Menampilkan elemen dengan ID yang sesuai berdasarkan pilihan
                if (selectedValue !== "") {
                    $("#epayment-" + selectedValue).show();
                }
            });
        });
    </script>
@endsection
