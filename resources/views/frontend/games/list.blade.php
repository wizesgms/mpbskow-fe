@extends('frontend.layouts.main')
@section('mobile')
<main id="main-route">
    <div class="main-content slot-game">
        <div class="container">
            <div class="slot-game__container">
                <div class="slot-game-header">
                    <h3>{{ $provider->provider }}</h3>
                </div>
                <div class="component-pills-tab" id="game-filter">
                    <div class="filter-tab" onclick="filterGameSelection('all')">All Games</div>
                    <div class="filter-tab" onclick="filterGameSelection('slot')"> Slot
                    </div>
                    <div class="filter-tab" onclick="filterGameSelection('bonus-buy-slot-games')"> Bonus Buy Slot Games
                    </div>
                    <div class="filter-tab" onclick="filterGameSelection('video-slots')"> Video Slots
                    </div>
                    <div class="filter-tab" onclick="filterGameSelection('classic-slots')"> Classic Slots
                    </div>
                    <div class="slot-game__search-cont">
                        <div class="game-search">
                            <input class="form-control-sm" type="text" onkeyup="searchGames(this)"
                                placeholder="Cari ...">
                            <a href="#" class="search-btn">
                                <i class="fas fa-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="slot-game-list">
                    @foreach ($games as $item)
                        <div class="slot-game-item slot-tg xslot">
                            <div class="slot-game-img">
                                <img src="{{ $item->game_image }}" loading="lazy" alt="Mpoplay Gates Of Olympus">
                            </div>
                            <div class="slot-game-name">{{ $item->game_name }}</div>
                            <div class="progress baradjust">
                                <div class="progress-bar progress-bar-striped progress-bar-animated @if (generateRandomRTP() > 85) bg-success @else bg-info @endif"
                                    id="progress-rtp" role="progressbar" style="width:{{ generateRandomRTP() }}%;"
                                    aria-valuenow="{{ generateRandomRTP() }}" aria-valuemin="0" aria-valuemax="100">
                                    RTP {{ generateRandomRTP() }}%
                                </div>
                            </div>
                            <div class="slot-game-tag hot">
                                <div class="info"><i class="fab fa-hotjar"></i> Permainan Gacor</div>
                            </div>
                            <div class="slot-game-hover">
                                @guest
                                    <a onclick="gameAlert()" href="javascript:;" class="main sekarang main-sekarang-alert">
                                        Main Sekarang
                                    </a>
                                @endguest
                                @auth
                                    <a name="playGames" class="main sekarang main-sekarang-alert"
                                        href="{{ url('gameIframe?gameType=slot&providerCode='.$item->game_provider.'&gameCode='.$item->game_code) }}"
                                        target="_blank">
                                        Main Sekarang
                                    </a>
                                @endauth
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/desktop/themes/default/js/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript">
        function searchGames(_this) {
            let value = $(_this).val().toLowerCase();
            $(".slot-game-list .slot-game-item").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        }
    </script>
    </main>
@endsection

@section('desktop')
<main id="main-route">
    <div class="main-content slot-game">
        <div class="container">
            <div class="slot-game__container">
                <div class="slot-game-header">
                    <h3>{{ $provider->provider }}</h3>
                </div>
                <div class="component-pills-tab" id="game-filter">
                    <div class="filter-tab" onclick="filterGameSelection('all')">All Games</div>
                    <div class="filter-tab" onclick="filterGameSelection('slot')"> Slot
                    </div>
                    <div class="filter-tab" onclick="filterGameSelection('bonus-buy-slot-games')"> Bonus Buy Slot Games
                    </div>
                    <div class="filter-tab" onclick="filterGameSelection('video-slots')"> Video Slots
                    </div>
                    <div class="filter-tab" onclick="filterGameSelection('classic-slots')"> Classic Slots
                    </div>
                    <div class="slot-game__search-cont">
                        <div class="game-search">
                            <input class="form-control-sm" type="text" onkeyup="searchGames(this)"
                                placeholder="Cari ...">
                            <a href="#" class="search-btn">
                                <i class="fas fa-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="slot-game-list">
                    @foreach ($games as $item)
                        <div class="slot-game-item slot-tg xslot">
                            <div class="slot-game-img">
                                <img src="{{ $item->game_image }}" loading="lazy" alt="Mpoplay Gates Of Olympus">
                            </div>
                            <div class="slot-game-name">{{ $item->game_name }}</div>
                            <div class="progress baradjust">
                                <div class="progress-bar progress-bar-striped progress-bar-animated @if (generateRandomRTP() > 85) bg-success @else bg-info @endif"
                                    id="progress-rtp" role="progressbar" style="width:{{ generateRandomRTP() }}%;"
                                    aria-valuenow="{{ generateRandomRTP() }}" aria-valuemin="0" aria-valuemax="100">
                                    RTP {{ generateRandomRTP() }}%
                                </div>
                            </div>
                            <div class="slot-game-tag hot">
                                <div class="info"><i class="fab fa-hotjar"></i> Permainan Gacor</div>
                            </div>
                            <div class="slot-game-hover">
                                @guest
                                    <a onclick="gameAlert()" href="javascript:;" class="main sekarang main-sekarang-alert">
                                        Main Sekarang
                                    </a>
                                @endguest
                                @auth
                                    <a name="playGames" class="main sekarang main-sekarang-alert"
                                        href="{{ url('gameIframe?gameType=slot&providerCode='.$item->game_provider.'&gameCode='.$item->game_code) }}"
                                        target="_blank">
                                        Main Sekarang
                                    </a>
                                @endauth
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/desktop/themes/default/js/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript">
        function searchGames(_this) {
            let value = $(_this).val().toLowerCase();
            $(".slot-game-list .slot-game-item").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        }
    </script>
    </main>
@endsection
