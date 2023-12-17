{{-- <div class="col-3 py-3 mb-3 game" id="game_table">  
    <div class="card h-100 border-0">
        <a href="{{ route('detailgame',['id'=>$game->id]) }}"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="{{ $game->name }}"
        >
            <img class="card-img-top game-img center-img" src="images/{{ $game->image }}" alt="..." loading="lazy" />
        </a>
        <div class="card-body">
            <div class="text-center">
                <a class="text-decoration-none text-dark" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ $game->name }}" href="{{ route('detailgame',$game->id) }}" >
                    <p class="">{{ $game->name }}</p>
                </a>
            </div>
        </div>
        <div class="text-center d-flex justify-content-center align-items-end">
            <h5 class="text-danger ">{{ $game->price }} đ</h5>
        </div>
        <div class="card-footer border-top-0 bg-transparent">
            <div class="align-text-bottom">
                <div>
                    <form action="{{ route('buyNow') }}" method="post">
                        @csrf
                        <input type="text" name="id" value="{{ $game->id }}" hidden>
                        <button class="btn btn-outline-primary col-12">
                            <i class="fa-solid fa-cart-shopping fa-lg"></i> Mua ngay
                        </button>
                    </form>
                </div>
                <div class="pt-2">
                    <form action="{{ route('addToCart') }}" method="post">
                        @csrf
                        <input type="text" name="id" value="{{ $game->id }}" hidden>
                        <button class="btn btn-primary col-12">
                            <i class="fa-solid fa-cart-shopping fa-lg"></i> Thêm vào giỏ
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="row mb-4">
    <div class="col-md-5">
        <div class="img">
            <a href="{{ route('detailgame', ['id' => $game->id]) }}"
                data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $game->name }}">
                <img class="card-img-top game-img center-img" src="images/games/{{ $game->image }}" alt="..."
                    loading="lazy" />
            </a>
        </div>
    </div>
    <div class="col-md-7">
        <div class="h5 name fw-bolder text-white">
            {{ $game->name }}
        </div>
        <div class="price text-white">
            {{ number_format($game->price, 0, ',', '.') }}đ
        </div>
    </div>
</div>
