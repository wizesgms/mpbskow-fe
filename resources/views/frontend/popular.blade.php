@extends('frontend.layouts.main')
@section('mobile')
<!-- Account Balance -->
<main id="main-route">
    <div class="main-content slot-game">
        <div class="container">
            <div class="slot-game__container">
                <div class="page-header">POPULAR</div>
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
                                href="{{ url('gameIframe?gameType=slot&providerCode=' . $item->game_provider . '&gameCode=' . $item->game_code) }}"
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
</main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function gameMaintenance(gameCode, url) {
            if (gameMaintenanceStatus[gameCode] === '1') {
                Swal.fire({
                    title: 'Maintenance',
                    text: 'Game ini sedang dalam perbaikan. Harap coba lagi nanti.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
            } else {
                window.location.href = url;
            }
        }
</script>
@endsection

@section('desktop')
<!-- Account Balance -->
<main id="main-route">
    <div class="main-content slot-game">
        <div class="container">
            <div class="slot-game__container">
                <div class="page-header">POPULAR</div>
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
                                href="{{ url('gameIframe?gameType=slot&providerCode=' . $item->game_provider . '&gameCode=' . $item->game_code) }}"
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
</main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function gameMaintenance(gameCode, url) {
            if (gameMaintenanceStatus[gameCode] === '1') {
                Swal.fire({
                    title: 'Maintenance',
                    text: 'Game ini sedang dalam perbaikan. Harap coba lagi nanti.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
            } else {
                window.location.href = url;
            }
        }
</script>
@endsection
