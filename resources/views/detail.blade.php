<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('cdn')
</head>

<body>
    <div>
        <x-header title="{{ $game->name }} | GameStore" />
    </div>

    {{-- {{ dd($requirements['minimum']) }} --}}

    <div class="container">
        <!-- col-md-10 border p-3 main-section bg-white -->
        <div class="col-md-10 bg-navbar-dark text-white border main-section p-3 bg-white">
            <div class="row m-0">
                <div class="col-md-4 left-side-product-box pb-3">
                    <div>
                        <img src="../images/games/{{ $game->image }}" class="border-0 p-3 rounded" />
                    </div>
                    <div class="text-center h5" name="total_like">{{ $game->like }}</div>
                    <div class="d-flex justify-content-center">
                        <form method="POST" action="{{ route('likeGame', ['id' => $game->id]) }}">
                            @csrf
                            @if (Cache::has('like_game_' . $game->id .  "_" . request()->ip()))
                                <button disabled class="btn btn-outline-primary">
                                    <i class="fa-solid fa-heart"></i> Liked
                                </button>
                            @else
                                <button class="btn btn-default">
                                    <i class="fa-solid fa-heart"></i> Like
                                </button>
                            @endif
                        </form>
                    </div>
                    @if (count($game->keys) <= 0)
                        <div class="text-center pt-2 text-danger">
                            <i class="fa-solid fa-box"></i> Hết hàng
                        </div>
                    @else
                        <div class="text-center pt-2 text-success">
                            <i class="fa-solid fa-box"></i> Còn hàng: {{ count($game->keys) }}
                        </div>
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="right-side-pro-detail border-0 p-3 m-0">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="m-0 p-0 text-white">{{ $game->name }}</p>
                            </div>
                            <div class="col-md-12">
                                <p class="m-0 p-0 price-pro">{{ number_format($game->price, 0, ',', '.') }}đ</p>
                                <hr class="p-0 m-0" />
                            </div>
                            <div class="col-md-12 pt-2">
                                <h5>Mô tả</h5>
                                <span>{{ $game->description }}</span>
                                <hr class="m-0 pt-2 mt-2" />
                            </div>
                            <div class="col-md-12 mt-3">
                                @if (count($game->keys) <= 0)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form action="" method="post">
                                                @csrf
                                                <input type="text" name="id" value="{{ $game->id }}" hidden>
                                                <button disabled class="btn btn-default col-12">
                                                    <i class="fa-solid fa-credit-card"></i> Mua ngay
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-md-6 pb-2">
                                            <form action="" method="post">
                                                @csrf
                                                <input type="text" name="id" value="{{ $game->id }}"
                                                    hidden>
                                                <button disabled class="btn btn-secondary col-12">
                                                    <i class="fa-solid fa-cart-shopping fa-md"></i> Thêm vào giỏ
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form action="{{ route('buyNow') }}" method="post">
                                                @csrf
                                                <input type="text" name="id" value="{{ $game->id }}"
                                                    hidden>
                                                <button class="btn btn-default col-12">
                                                    <i class="fa-solid fa-credit-card"></i> Mua ngay
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-md-6 pb-2">
                                            <form action="{{ route('addToCart') }}" method="post">
                                                @csrf
                                                <input type="text" name="id" value="{{ $game->id }}"
                                                    hidden>
                                                <button class="btn btn-secondary col-12">
                                                    <i class="fa-solid fa-cart-shopping fa-md"></i> Thêm vào giỏ
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Khung Sản Phẩm -->

    <!-- Bài Viết Của Sản Phẩm -->
    <div class="container">

    </div>
    <!-- Bài Viết Của Sản Phẩm -->

    <!-- Sản Phẩm Liên Quan -->
    {{-- Don't have any related game --}}

    <div class="container pt-5 pb-5">
        @if (count($related) > 0)
            <div class="container">
                <p class="h3 text-white">Sản phẩm liên quan</p>
                <div class="row">
                    @foreach ($related as $item)
                        <x-game.related :related="$item" />
                    @endforeach
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-12 text-white">
                        <p class="h3 text-white">Cấu hình</p>
                    </div>
                    <div class="col-md-9 col-sm-12 col-12 text-white">
                        <div class="minimum text-white">
                            <p class="fw-bold h5">Minimum</p>
                            @if (!is_null($minimum))
                                @for ($i = 0; $i < count($minimum); $i++)
                                    <div>{{ $minimum[$i] }}</div>
                                @endfor
                            @else
                                <div class="h6">Tạm thời chưa có cấu hình</div>
                            @endif
                        </div>

                        <div class="maximum text-white pt-5">
                            <p class="fw-bold h5">Recommended</p>
                            @if (!is_null($recommended))
                                @for ($i = 0; $i < count($recommended); $i++)
                                    <div>{{ $recommended[$i] }}</div>
                                @endfor
                            @else
                                <div class="h6">Tạm thời chưa có cấu hình</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-12 text-white">
                        <p class="h3 text-white">Cấu hình</p>
                    </div>
                    <div class="col-md-9 col-sm-12 col-12 text-white">
                        <div class="minimum text-white">
                            <p class="fw-bold h5">Minimum</p>
                            @if (!is_null($minimum))
                                @for ($i = 0; $i < count($minimum); $i++)
                                    <div>{{ $minimum[$i] }}</div>
                                @endfor
                            @else
                                <div class="h6">Tạm thời chưa có cấu hình</div>
                            @endif
                        </div>

                        <div class="maximum text-white pt-5">
                            <p class="fw-bold h5">Recommended</p>
                            @if (!is_null($recommended))
                                @for ($i = 0; $i < count($recommended); $i++)
                                    <div>{{ $recommended[$i] }}</div>
                                @endfor
                            @else
                                <div class="h6">Tạm thời chưa có cấu hình</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
    <!-- Sản Phẩm Liên Quan -->

    <script src="./js/script.js"></script>

    <x-footer />
</body>

</html>
