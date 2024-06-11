<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <div class="nav-item">
                    <a class="nav-link" href="{{ url('') }}">
                        <i class="fas fa-home" style="font-size: 130%"></i>
                    </a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="slot" style="cursor: pointer;">
                        Slot
                        <i class="fas fa-caret-down"></i>
                    </a>
                    <div class="nav-item__game">
                        <div class="container text-center justify-content-center">
                            @foreach (navbar('slot') as $slot)
                            @guest
                            <div class="game-item ">
                                <a href="javascript:;" onclick="gameAlert()">
                                    <img title="{{ $slot->provider }}" alt="{{ $slot->provider }}"
                                        src="{{ $slot->icon }}"
                                        width="110px;">

                                </a>
                            </div>
                            @endguest
                            @auth
                            <div class="game-item ">
                                <a href="{{ route('slots',$slot->slug) }}">
                                    <img title="{{ $slot->provider }}" alt="{{ $slot->provider }}"
                                        src="{{ $slot->icon }}"
                                        width="110px;">

                                </a>
                            </div>
                            @endauth
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="nav-item">
                    <a class="nav-link" href="#" style="cursor: pointer;">
                        <img src="https://images.linkcdn.cloud/global/nav-addons/hot_category.png" width="30"
                            height="12"
                            style="position: absolute; z-index:999; animation: 0.25s ease 0s infinite alternate none running beat; top:0px;">
                        Live Game
                        <i class="fas fa-caret-down"></i>
                    </a>
                    <div class="nav-item__game">
                        <div class="container text-center justify-content-center">
                            <div class="game-item ">
                                <a href="javascript:;" onclick="gameAlert()">
                                    <img title="WS168" alt="WS168"
                                        src="https://images.linkcdn.cloud/global/navbar/othergame/ws1.webp">
                                    <div class="game-name">WS168</div>

                                </a>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="nav-item">
                    <a class="nav-link" href="casino" style="cursor: pointer;">
                        Casino
                        <i class="fas fa-caret-down"></i>
                    </a>
                    <div class="nav-item__game">
                        <div class="container text-center justify-content-center">
                            @foreach (navbar('casino') as $casino)
                            @guest
                            <div class="game-item ">
                                <a href="javascript:;" onclick="gameAlert()">
                                    <img title="{{ $casino->provider }}" alt="{{ $casino->provider }}"
                                        src="{{ $casino->icon }}"
                                        width="120px;">

                                </a>
                            </div>
                            @endguest
                            @auth
                            <div class="game-item ">
                                <a href="{{ route('casinos',$casino->slug) }}">
                                    <img title="{{ $casino->provider }}" alt="{{ $casino->provider }}"
                                        src="{{ $casino->icon }}"
                                        width="120px;">

                                </a>
                            </div>
                            @endauth
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="nav-item">
                    <a class="nav-link" href="#" style="cursor: pointer;">
                        Sportsbook
                        <i class="fas fa-caret-down"></i>
                    </a>
                    <div class="nav-item__game">
                        <div class="container text-center justify-content-center">
                            <div class="game-item ">
                                <a href="javascript:;" onclick="gameAlert()">
                                    <img title="AFB88" alt="AFB88"
                                        src="https://images.linkcdn.cloud/global/navbar/sportbook/afb.webp">
                                    <div class="game-name">AFB88</div>

                                </a>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="nav-item">
                    <a class="nav-link" href="#" style="cursor: pointer;">
                        Lottery
                        <i class="fas fa-caret-down"></i>
                    </a>
                    <div class="nav-item__game">
                        <div class="container text-center justify-content-center">
                            <div class="game-item ">
                                <a onclick="gameAlert()" href="javascript:;">
                                    <img title="4D" alt="4D"
                                        src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/balak4d.webp?v=20240430"
                                        width="180px">

                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="nav-item">
                    <a class="nav-link" href="#" style="cursor: pointer;">
                        Poker
                        <i class="fas fa-caret-down"></i>
                    </a>
                    <div class="nav-item__game">
                        <div class="container text-center justify-content-center">
                            <div class="game-item ">
                                <a href="poker_FunGamingPoker">
                                    <img title="FUN GAMING" alt="FUN GAMING"
                                        src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/fungaming.webp?v=20240430"
                                        width="100px">

                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="nav-item">
                    <a class="nav-link" href="{{ route('promotion') }}">
                        Promosi
                    </a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="#"><img
                            src="https://images.linkcdn.cloud/global/nav-addons/event.webp" alt="Event"
                            width="70px"></a>
                </div>
            </div>
        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function gameMaintenance(gameCode, url) {
        window.location.href = url;
    }
</script>
