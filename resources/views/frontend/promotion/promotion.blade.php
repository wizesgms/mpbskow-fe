@extends('frontend.layouts.main')
@section('mobile')
    <main id="main-route">
        <div class="main-content promo">
            <div class="container">
                <div class="promo__container">
                    <div class="page-header">Promosi Terbaru</div>
                    <div class="promo__filter" id="promo-filter">
                        <div class="filter-promo active" onclick="filterPromoSelection('all')">All Promo</div>
                    </div>
                    <div class="promo__list">
                        <div class="row">
                            @foreach ($promotion as $promo)
                            <div class="col-lg-6 col-md-6 promo-item-holder show promo-">
                                <div class="promo-item">
                                    <div class="promo-img">
                                        <img src="{{ $promo->gambar }}"
                                            alt="" loading="lazy">
                                    </div>
                                    <div class="promo-info">
                                        <div class="info-title">{{ $promo->judul }} </div>
                                        <a href="{{ route('promotiond',$promo->slug) }}"
                                            class="info-read btn-custom-sm">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('desktop')
    <main id="main-route">
        <div class="main-content promo">
            <div class="container">
                <div class="promo__container">
                    <div class="page-header">Promosi Terbaru</div>
                    <div class="promo__filter" id="promo-filter">
                        <div class="filter-promo active" onclick="filterPromoSelection('all')">All Promo</div>
                    </div>
                    <div class="promo__list">
                        <div class="row">
                            @foreach ($promotion as $promo)
                            <div class="col-lg-6 col-md-6 promo-item-holder show promo-">
                                <div class="promo-item">
                                    <div class="promo-img">
                                        <img src="{{ $promo->gambar }}"
                                            alt="" loading="lazy">
                                    </div>
                                    <div class="promo-info">
                                        <div class="info-title">{{ $promo->judul }} </div>
                                        <a href="{{ route('promotiond',$promo->slug) }}"
                                            class="info-read btn-custom-sm">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
