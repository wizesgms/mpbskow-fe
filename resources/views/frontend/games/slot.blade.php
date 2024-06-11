@extends('frontend.layouts.main')
@section('mobile')
    <main id="main-route">
        <div class="main-content game">
            <div class="container">
                <div class="game__list">
                    <div class="page-header">{{ $pageTitle }}</div>
                    <div class="game-list-container">
                        @foreach ($provider as $item)
                            <div class="game-holder">
                                <div class="game-img">
                                    <img title="{{ $item->provider }}" alt="{{ $item->provider }}" src="{{ $item->banner }}">
                                </div>
                                <div class="game-bottom">
                                    <div class="game-name">{{ $item->provider }}</div>
                                    <div class="game-links main-sekarang-alert">
                                        <a class="btn-custom" href="{{ route('slots', $item->slug) }}">
                                            Main Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('desktop')
    <main id="main-route">
        <div class="main-content game">
            <div class="container">
                <div class="game__list">
                    <div class="page-header">{{ $pageTitle }}</div>
                    <div class="game-list-container">
                        @foreach ($provider as $item)
                            <div class="game-holder">
                                <div class="game-img">
                                    <img title="{{ $item->provider }}" alt="{{ $item->provider }}"
                                        src="{{ $item->banner }}">
                                </div>
                                <div class="game-bottom">
                                    <div class="game-name">{{ $item->provider }}</div>
                                    <div class="game-links main-sekarang-alert">
                                        <a class="btn-custom" href="{{ route('slots', $item->slug) }}">
                                            Main Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
