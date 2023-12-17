<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ route('admindashboard') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-line"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                User Manage
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse show" id="collapseLayouts" aria-labelledby="headingOne"
                data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('adminuser') }}"><i class="fa-solid fa-user-group"></i>&nbsp;
                        Users</a>
                    <a class="nav-link" href="{{ route('adminpermission') }}"><i
                            class="fa-solid fa-user-shield"></i>&nbsp;
                        Permissions</a>
                    <a class="nav-link" href="{{ route('adminrole') }}"><i class="fa-solid fa-tag"></i>&nbsp;
                        Roles</a>
                </nav>
            </div>
            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-gamepad"></i></div>
                Games
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse show" id="collapsePages" aria-labelledby="headingTwo"
                data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link" href="{{ route('admingame') }}"><i class="fa-solid fa-gamepad"></i>&nbsp;
                        Games </a>
                    <a class="nav-link" href="{{ route('admingenre') }}"><i class="fa-solid fa-tags"></i>&nbsp;
                        Genres</a>
                    <a class="nav-link" href="{{ route('adminpublisher') }}"><i class="fa-solid fa-user-tie"></i>&nbsp;
                        Publishers</a>
                    <a class="nav-link" href="{{ route('adminkey') }}"><i class="fa-solid fa-key"></i>&nbsp;
                        Keys</a>
                    <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div> -->
                </nav>
            </div>
            <div class="sb-sidenav-menu-heading">Orders</div>
            <a class="nav-link" href="{{ route('adminorder') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-receipt"></i></div>
                Orders
            </a>
            <a class="nav-link" href="{{ route('adminorderdetail') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-info"></i></div>
                Orders Detail
            </a>
            <div class="sb-sidenav-menu-heading">Auth</div>
            <div class="btn-group dropend">
                <a type="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('admininfo') }}">Cài đặt tài khoản</a></li>
                    <li><a class="dropdown-item" href="{{ route('logoutadmin') }}">Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="text-muted">Copyright &copy; GameStore 2023</div>
    </div>
</nav>
