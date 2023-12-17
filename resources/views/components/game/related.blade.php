<div class="col-md-3 pt-3 mb-3 game" id="game_table">
    <div class="card bg-transparent h-100 border-0">
        <a data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $related->name }}"
            href="{{ route('detailgame', ['id' => $related->id]) }}">
            <img class="card-img-top game-img center-img" src="../images/games/{{ $related->image }}" alt="..."
                loading="lazy" />
        </a>
        <div class="card-body">
            <div class="">
                <a class="text-decoration-none text-dark" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ $related->name }}" href="{{ route('detailgame', $related->id) }}">
                    <h5 class="text-white">{{ $related->name }}</h5>
                </a>
            </div>
            <div class="">
                <p class="text-white"> {{ number_format($related->price, 0, ',', '.') }}đ</p>
            </div>
        </div>
    </div>
</div>



<!-- Nothing worth having comes easy. - Theodore Roosevelt -->
