<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('cdn')

    <x-header title="Trang Chủ" />
</head>

<body class="d-flex flex-column vh-100">
    <!-- Carousel -->
    <div class="container-fluid pt-3">
        <main>
            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach ($carousel as $item)
                        <x-carousel :item="$item" />
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </main>
    </div>
    <!-- Carousel -->

    <!-- Thanh giá phù hợp -->
    <div class="container pt-5">
        <p class="display-6 text-white text-capitalize">Lọc theo giá</p>
        <hr class="border-bottom border-secondary">
        <div class="row text-center text-white fs-4 rec-price fw-bold">
            <div class="price col-md-2 col-sm-6 col-6">
                <a href="/tim-kiem?genre=&fromPrice=75000&toPrice=&sortBy=" class="text-decoration-none text-white">
                    <div class="card shadow p-3 mb-5 rounded">
                        <div class="card-body">
                            <p class="card-text">75.000đ</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="price col-md-2 col-sm-6 col-6">
                <a href="/tim-kiem?genre=&fromPrice=100000&toPrice=&sortBy=" class="text-decoration-none text-white">
                    <div class="card shadow p-3 mb-5 rounded">
                        <div class="card-body">
                            <p class="card-text">100.000đ</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="price col-md-2 col-sm-6 col-6">
                <a href="/tim-kiem?genre=&fromPrice=150000&toPrice=&sortBy=" class="text-decoration-none text-white">
                    <div class="card shadow p-3 mb-5 rounded">
                        <div class="card-body">
                            <p class="card-text">150.000đ</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="price col-md-2 col-sm-6 col-6">
                <a href="/tim-kiem?genre=&fromPrice=175000&toPrice=&sortBy=" class="text-decoration-none text-white">
                    <div class="card shadow p-3 mb-5 rounded">
                        <div class="card-body">
                            <p class="card-text">175.000đ</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="price col-md-2 col-sm-6 col-6">
                <a href="/tim-kiem?genre=&fromPrice=200000&toPrice=&sortBy=" class="text-decoration-none text-white">
                    <div class="card shadow p-3 mb-5 rounded">
                        <div class="card-body">
                            <p class="card-text">200.000đ</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="price col-md-2 col-sm-6 col-6">
                <a href="/tim-kiem?genre=&fromPrice=250000&toPrice=&sortBy=" class="text-decoration-none text-white">
                    <div class="card shadow p-3 mb-5 rounded">
                        <div class="card-body">
                            <p class="card-text">250.000đ</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Thanh giá phù hợp -->

    <!-- Lọc theo thể loại-->
    <div class="container pt-3">
        <p class="display-6 text-white text-capitalize">Lọc theo thể loại</p>
        <hr class="border-bottom border-secondary">
        <div class="row text-center text-white rec-price fw-bold">
            <div class="price col-md-2 col-sm-6 col-6">
                <a class="text-white text-decoration-none" href="/tim-kiem?genre=Action&fromPrice=&toPrice=&sortBy=">
                    <div class="card shadow p-3 mb-5 rounded">
                        <div class="card-body">
                            <p class="card-text">Action</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="price col-md-2 col-sm-6 col-6">
                <a class="text-white text-decoration-none"
                    href="/tim-kiem?genre=Tower+Defense&fromPrice=&toPrice=&sortBy=">
                    <div class="card shadow p-3 mb-5 rounded">
                        <div class="card-body">
                            <p class="card-text">Tower Defense</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="price col-md-2 col-sm-6 col-6">
                <a class="text-white text-decoration-none" href="/tim-kiem?genre=3D&fromPrice=&toPrice=&sortBy=">
                    <div class="card shadow p-3 mb-5 rounded">
                        <div class="card-body">
                            <p class="card-text">3D</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="price col-md-2 col-sm-6 col-6">
                <a class="text-white text-decoration-none" href="/tim-kiem?genre=RPG&fromPrice=&toPrice=&sortBy=">
                    <div class="card shadow p-3 mb-5 rounded">
                        <div class="card-body">
                            <p class="card-text">RPG</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="price col-md-2 col-sm-6 col-6">
                <a class="text-white text-decoration-none"
                    href="/tim-kiem?genre=Open+World&fromPrice=&toPrice=&sortBy=">
                    <div class="card shadow p-3 mb-5 rounded">
                        <div class="card-body">
                            <p class="card-text">Open World</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="price col-md-2 col-sm-6 col-6">
                <a class="text-white text-decoration-none" href="/tim-kiem?genre=Co-op&fromPrice=&toPrice=&sortBy=">
                    <div class="card shadow p-3 mb-5 rounded">
                        <div class="card-body">
                            <p class="card-text">Co-op</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row text-center text-white fs-6 rec-price fw-bold">
            <div class="price col-md-2 col-sm-6 col-6">
                <a class="text-white text-decoration-none" href="/tim-kiem?genre=2D&fromPrice=&toPrice=&sortBy=">
                    <div class="card shadow p-3 mb-5 rounded">
                        <div class="card-body">
                            <p class="card-text">2D</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="price col-md-2 col-sm-6 col-6">
                <a class="text-white text-decoration-none"
                    href="/tim-kiem?genre=Survival&fromPrice=&toPrice=&sortBy=">
                    <div class="card shadow p-3 mb-5 rounded">
                        <div class="card-body">
                            <p class="card-text">Survival</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="price col-md-2 col-sm-6 col-6">
                <a class="text-white text-decoration-none"
                    href="/tim-kiem?genre=Strategy&fromPrice=&toPrice=&sortBy=">
                    <div class="card shadow p-3 mb-5 rounded">
                        <div class="card-body">
                            <p class="card-text">Strategy</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="price col-md-2 col-sm-6 col-6">
                <a class="text-white text-decoration-none" href="/tim-kiem?genre=FPS&fromPrice=&toPrice=&sortBy=">
                    <div class="card shadow p-3 mb-5 rounded">
                        <div class="card-body">
                            <p class="card-text">FPS</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="price col-md-2 col-sm-6 col-6">
                <a class="text-white text-decoration-none" href="/tim-kiem?genre=PvP&fromPrice=&toPrice=&sortBy=">
                    <div class="card shadow p-3 mb-5 rounded">
                        <div class="card-body">
                            <p class="card-text">PvP</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="price col-md-2 col-sm-6 col-6">
                <a class="text-white text-decoration-none" href="/tim-kiem?genre=Fantasy&fromPrice=&toPrice=&sortBy=">
                    <div class="card shadow p-3 mb-5 rounded">
                        <div class="card-body">
                            <p class="card-text">Fantasy</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Lọc theo thể loại-->


    <!-- Sản phẩm nổi bật -->
    <div class="container pt-3">
        <div class="row">
            <div class="col-md-4 border-end border-secondary">
                <div class="title text-center text-capitalize">
                    <p class="display-6 text-white">Bán chạy nhất</p>
                </div>
                <hr class="border-bottom border-secondary">
                <div class="product">
                    @foreach ($bestSellers as $item)
                        <x-game.game-item :game="$item" />
                    @endforeach
                </div>
            </div>

            <div class="col-md-4 border-end border-secondary">
                <div class="title text-center text-capitalize">
                    <p class="display-6 text-white">Đề cử tuần này</p>
                </div>
                <hr class="border-bottom border-secondary">
                <div class="product">
                    @foreach ($recommendThisWeek as $item)
                        <x-game.game-item :game="$item" />
                    @endforeach
                </div>
            </div>

            <div class="col-md-4">
                <div class="title text-center text-capitalize">
                    <p class="display-6 text-white">Được yêu thích nhất</p>
                </div>
                <hr class="border-bottom border-secondary">
                <div class="product">
                    @foreach ($topFavorite as $item)
                        <x-game.game-item :game="$item" />
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    </div>
    <!-- Sản phẩm nổi bật -->

    <script>
        let swiper = new Swiper(".swiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 100,
                modifier: 3,
                slideShadows: true
            },
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            breakpoints: {
                640: {
                    slidesPerView: 2
                },
                768: {
                    slidesPerView: 1
                },
                1024: {
                    slidesPerView: 2
                },
                1560: {
                    slidesPerView: 5
                }
            }
        });
    </script>

    <script src="{{ asset('js/script.js') }}"></script>

    <x-footer />
</body>

</html>
