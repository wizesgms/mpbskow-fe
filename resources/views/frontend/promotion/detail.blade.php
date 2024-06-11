@extends('frontend.layouts.main')
@section('mobile')
    <main id="main-route">
        <div class="main-content post">
            <div class="container">
                <div class="post__container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="main-post">
                                <a href="{{ route('promotion') }}" class="post-back btn-custom"><i
                                        class="fas fa-angle-left"></i> Kembali</a>
                                <div class="post-img">
                                    <img src="{{ $now->gambar }}"
                                        alt="">
                                </div>
                                <div class="post-title">{{ $now->judul }}</div>
                                <div class="post-date"><span>Posted on: </span>{{ $now->created_at }}</div>
                                <div class="post-content">{!! $now->text !!}</div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="other-post">
                                <div class="other-header">Promosi Terakhir</div>
                                @foreach ($promotion as $item)
                                    <a href="{{ route('promotiond', $item->slug) }}">
                                        <div class="other-item">
                                            <div class="img">
                                                <img src="{{ $item->gambar }}" alt="" loading="lazy">
                                            </div>
                                            <div class="content">
                                                <div class="title">{{ $item->judul }}</div>

                                                <div class="read-more">Selengkapnya</div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
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
        <div class="main-content post">
            <div class="container">
                <div class="post__container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="main-post">
                                <a href="{{ route('promotion') }}" class="post-back btn-custom"><i
                                        class="fas fa-angle-left"></i> Kembali</a>
                                <div class="post-img">
                                    <img src="{{ $now->gambar }}"
                                        alt="">
                                </div>
                                <div class="post-title">{{ $now->judul }}</div>
                                <div class="post-date"><span>Posted on: </span>{{ $now->created_at }}</div>
                                <div class="post-content">{!! $now->text !!}</div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="other-post">
                                <div class="other-header">Promosi Terakhir</div>
                                @foreach ($promotion as $item)
                                    <a href="{{ route('promotiond', $item->slug) }}">
                                        <div class="other-item">
                                            <div class="img">
                                                <img src="{{ $item->gambar }}" alt="" loading="lazy">
                                            </div>
                                            <div class="content">
                                                <div class="title">{{ $item->judul }}</div>

                                                <div class="read-more">Selengkapnya</div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
