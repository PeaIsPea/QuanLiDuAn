<title>{{ html_entity_decode($title) }}</title>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-navbar-dark">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="{{ route('index') }}">GAMESTORE</a>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-light"></i>
        </button>


        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left links -->
            <ul class="navbar-nav me-auto d-flex flex-row mt-3 mt-lg-0">
                <li class="nav-item text-center mx-2 mx-lg-1">
                    <a href="{{ route('index') }}" class="nav-link" aria-current="page" href="#!">
                        <div>
                            <i class="fas fa-home fa-lg mb-1"></i>
                        </div>
                        Trang Chủ
                    </a>
                    {{-- </li>
                <li class="nav-item text-center mx-2 mx-lg-1">
                    <a class="nav-link" href="#!">
                        <div>
                            <i class="far fa-envelope fa-lg mb-1"></i>
                            <span class="badge rounded-pill badge-notification bg-danger">11</span>
                        </div>
                        Link
                    </a>
                </li>
                <li class="nav-item text-center mx-2 mx-lg-1">
                    <a class="nav-link disabled" aria-disabled="true" href="#!">
                        <div>
                            <i class="far fa-envelope fa-lg mb-1"></i>
                            <span class="badge rounded-pill badge-notification bg-warning">11</span>
                        </div>
                        Disabled
                    </a>
                </li>
                <li class="nav-item dropdown text-center mx-2 mx-lg-1">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div>
                            <i class="far fa-envelope fa-lg mb-1"></i>
                            <span class="badge rounded-pill badge-notification bg-primary">11</span>
                        </div>
                        Dropdown
                    </a>
                    <!-- Dropdown menu -->
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
            <!-- Left links -->

            <!-- Right links -->
            <ul class="navbar-nav ms-auto d-flex flex-row mt-3 mt-lg-0">
                <li class="nav-item text-center mx-2 mx-lg-1">
                    @if (Auth::user())
                        @php
                            $permissions = \App\Models\Permission::PERMISSIONS;
                            $user = \App\Models\User::find(Auth::user()->id);
                        @endphp
                        @if ($user->hasAnyPermission($permissions))
                            <a class="nav-link" aria-current="page" href="/admin">
                                <div>
                                    <i class="fa-solid fa-user-tie"></i>
                                </div>
                                Admin Homepage
                            </a>
                        @endif
                    @endif
                </li>
                <li class="nav-item dropdown text-center mx-2 mx-lg-1">
                    @if (Auth::user())
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div>
                                <i class="fa-solid fa-user"></i>
                            </div>
                            {{ auth()->user()->name }}
                        </a>
                    @else
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div>
                                <i class="fa-solid fa-user"></i>
                            </div>
                            Tài Khoản
                        </a>
                    @endif
                    <!-- Dropdown menu -->
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        @if (Auth::user())
                            <li>
                                <a class="dropdown-item" href="{{ route('inforUser') }}">
                                    Cài đặt tài khoản
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logoutUser') }}">
                                    Đăng xuất
                                </a>
                            </li>
                        @else
                            <li>
                                <a class="dropdown-item" href="{{ route('login') }}">
                                    Đăng nhập
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('signup') }}">
                                    Đăng ký
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item text-center mx-2 mx-lg-1">
                    <a class="nav-link" aria-current="page" href="{{ route('cart') }}">
                        <div>
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="badge rounded-pill badge-notification bg-primary">
                                <!-- If the session has cart in it get total quantity -->
                                @if (Session::has('cart'))
                                    @php
                                        $quantity = 0;
                                    @endphp
                                    @foreach ((array) session('cart') as $id => $details)
                                        @php
                                            $quantity += $details['quantity'];
                                        @endphp
                                    @endforeach
                                    {{ $quantity }}
                                @else
                                    0
                                @endif
                            </span>
                        </div>
                        Giỏ Hàng
                    </a>
                </li>
            </ul>
            <!-- Right links -->

            <!-- Search form -->
            <form action="{{ route('searchPage') }}" method="GET"
                class="d-flex input-group w-auto ms-lg-3 my-3 my-lg-0">
                <input type="search" name="q" class="form-control" placeholder="Tìm kiếm sản phẩm"
                    aria-label="Search" />
                <button class="btn btn-default" data-bs-ripple-color="dark">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
{{-- 
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">GAMESTORE</a>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-light"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left links -->
            <ul class="navbar-nav me-auto d-flex flex-row">
                <li class="nav-item text-center mx-2 mx-lg-1">
                    <a href="{{ route('index') }}" class="nav-link" aria-current="page" href="#!">
                        <div>
                            <i class="fas fa-home fa-lg mb-1"></i>
                        </div>
                        Trang Chủ
                    </a>
                </li>

                <li class="nav-item dropdown text-center mx-2 mx-lg-1">
                    @if (Auth::user())
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div>
                                <i class="fa-solid fa-user"></i>
                            </div>
                            {{ auth()->user()->name }}
                        </a>
                    @else
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div>
                                <i class="fa-solid fa-user"></i>
                            </div>
                            Tài Khoản
                        </a>
                    @endif
                    <!-- Dropdown menu -->

                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        @if (Auth::user())
                            <li>
                                <a class="dropdown-item" href="{{ route('inforUser') }}">
                                    Cài đặt tài khoản
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logoutUser') }}">
                                    Đăng xuất
                                </a>
                            </li>
                        @else
                            <li>
                                <a class="dropdown-item" href="{{ route('login') }}">
                                    Đăng nhập
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('signup') }}">
                                    Đăng ký
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item text-center mx-2 mx-lg-1">
                    <a class="nav-link" aria-current="page" href="{{ route('cart') }}">
                        <div>
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="badge rounded-pill badge-notification bg-info">
                                <!-- If the session has cart in it get total quantity -->
                                @if (Session::has('cart'))
                                    @php
                                        $quantity = 0;
                                    @endphp
                                    @foreach ((array) session('cart') as $id => $details)
                                        @php
                                            $quantity += $details['quantity'];
                                        @endphp
                                    @endforeach
                                    {{ $quantity }}
                                @else
                                    0
                                @endif
                            </span>
                        </div>
                        Giỏ Hàng
                    </a>
                </li>
            </ul>

            <!-- Search form -->
            <form action="{{ route('searchPage') }}" method="GET" class="d-flex">
                <input type="search" name="q" class="form-control search" placeholder="Tìm kiếm sản phẩm"
                    aria-label="Search" />
                <button class="btn btn-primary" data-bs-ripple-color="dark">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
 --}}
