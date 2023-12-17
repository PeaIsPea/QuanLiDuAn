<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('cdn')
</head>

<body>
    <x-header title="Tìm kiếm sản phẩm" />

    <!-- Filter -->
    <div id="filter" class="container pt-3">
        <div class="fw-bold text-white">
            <h3>Tìm kiếm sản phẩm</h3>
        </div>
        <form action="{{ route('searchPage') }}" method="GET">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-floating text-white">
                        <select class="form-select bg-navbar-dark border-0 text-white mb-3" name="genre"
                            id="genre">
                            <option value="">Tất cả</option>
                            <x-genre-option />
                        </select>
                        <label for="genre">Chọn thể loại</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3 text-white">
                                <input type="number" name="fromPrice"
                                    class="form-control bg-navbar-dark border-0 text-white" id="fromPrice"
                                    placeholder="Mức giá từ"
                                    value="{{ Request::get('fromPrice') ? Request::get('fromPrice') : '' }}" />
                                <label for="fromPrice">Mức giá từ</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating text-white">
                                <input type="number" name="toPrice"
                                    class="form-control bg-navbar-dark border-0 text-white" id="toPrice"
                                    placeholder="Mức giá đến"
                                    value="{{ Request::get('toPrice') ? Request::get('toPrice') : '' }}" />
                                <label for="toPrice">Mức giá đến</label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating text-white">
                        <select class="form-select mb-3 bg-navbar-dark border-0 text-white" name="sortBy"
                            id="sortBy">
                            <option value="">Mặc định</option>
                            {{-- <option value="bestSale" {{ Request::get('sortBy') === 'bestSale' ? 'selected' : '' }}>
                                Bán chạy nhất
                            </option> --}}
                            <option value="lowest" {{ Request::get('sortBy') === 'lowest' ? 'selected' : '' }}>
                                Giá thấp nhất
                            </option>
                            <option value="highest" {{ Request::get('sortBy') === 'highest' ? 'selected' : '' }}>
                                Giá cao nhất
                            </option>
                            <option value="AZ" {{ Request::get('sortBy') === 'AZ' ? 'selected' : '' }}>
                                Theo tên A => Z
                            </option>
                            <option value="ZA" {{ Request::get('sortBy') === 'ZA' ? 'selected' : '' }}>
                                Theo tên Z => A
                            </option>
                        </select>
                        <label for="sortBy">Sắp xếp theo</label>
                    </div>
                </div>
                <div class="col-md-2 d-flex justify-content-center">
                    <button class="col-md-12 btn btn-search">
                        <div class="h5">
                            <i class="fa-solid fa-filter"></i> Lọc sản phẩm
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- Filter -->


    <!-- Filter Clear -->
    <div class="container col-md-2 d-flex justify-content-center pt-1">
        <a href="/tim-kiem?q=">
            <button class="col-md-12 btn btn-danger">
                <i class="fa-solid fa-arrows-rotate"></i> Xóa bộ lọc
            </button>
        </a>
    </div>
    <!-- Filter Clear -->

    <div class="container" id="content">
        <div class="container" id="game-list">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($games as $item)
                    <x-game.search-result :gameList="$item" />
                @endforeach
            </div>
        </div>

        <div class="container text-center d-flex justify-content-center">
            <div class="text-center">
                {{ $games->links() }}
            </div>
        </div>
    </div>



    <x-footer />
</body>

</html>
