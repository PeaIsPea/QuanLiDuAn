<div class="col-md-3 pt-3 mb-3 game" id="game_table">
    <div class="card bg-transparent h-100 border-0">
        <a href="{{ route('detailgame', ['id' => $gameList->id]) }}" data-bs-toggle="tooltip" data-bs-placement="top"
            title="{{ $gameList->name }}">
            <img class="card-img-top game-img center-img" src="images/games/{{ $gameList->image }}" alt="..."
                loading="lazy" />
        </a>
        <div class="card-body">
            <div class="">
                <a class="text-decoration-none text-dark" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ $gameList->name }}" href="{{ route('detailgame', $gameList->id) }}">
                    <h5 class="text-white">{{ $gameList->name }}</h5>
                </a>
            </div>
            <div class="">
                <p class="text-white"> {{ number_format($gameList->price, 0, ',', '.') }}đ</p>
            </div>
        </div>
    </div>
</div>
