<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('cdn')
    <link rel="stylesheet" href="{{ asset('css/admin.style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css"
        integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <!-- Header/Navbar -->
    <x-admin.home.header title="Dashboard" />
    <!-- Header/Navbar -->

    <!-- Sidebar and Contents -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <x-admin.home.sidebar />
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <!-- General -->
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="wrimagecard wrimagecard-topimage">
                                <div class="wrimagecard-topimage_header">
                                    <i class="fas fa-users cardIcon"></i>
                                </div>

                                @component('components.admin.home.admin-card', [
                                    'data' => $totalUser,
                                    'title' => 'Users',
                                    'optionalData' => 'adminuser',
                                ])
                                @endcomponent
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="wrimagecard wrimagecard-topimage">
                                <div class="wrimagecard-topimage_header">
                                    <i class="fas fa-gamepad cardIcon"></i>
                                </div>

                                @component('components.admin.home.admin-card', [
                                    'data' => $totalGame,
                                    'title' => 'Games',
                                    'optionalData' => 'admingame',
                                ])
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <!-- General -->

                    <!-- Chart -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Sales during last month
                                </div>
                                <x-admin.home.content.chart :chart="$saleChartLastMonth" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Sales during this month
                                </div>
                                <x-admin.home.content.chart :chart="$saleChartCurrentMonth" />
                            </div>
                        </div>
                    </div>
                    <!-- Chart -->

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Data table -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Newly Created Users
                                </div>
                                <div class="card-body">
                                    <table id="userTable">
                                        <thead>
                                            <tr>
                                                <th scope="row">ID</th>
                                                <th scope="row">Name</th>
                                                <th scope="row">Email</th>
                                                <th scope="row">Social</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th scope="row">ID</th>
                                                <th scope="row">Name</th>
                                                <th scope="row">Email</th>
                                                <th scope="row">Social</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($newlyCreatedUsers as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->social }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Data table -->
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Newly Created Orders
                                </div>
                                <div class="card-body">
                                    <table id="orderTable">
                                        <thead>
                                            <tr>
                                                <th scope="row">ID</th>
                                                <th scope="row">Order ID</th>
                                                <th scope="row">Total</th>
                                                <th scope="row">Status</th>
                                                <th scope="row">Pay Type</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th scope="row">ID</th>
                                                <th scope="row">Order ID</th>
                                                <th scope="row">Total</th>
                                                <th scope="row">Status</th>
                                                <th scope="row">Pay Type</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($newlyCreatedOrders as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->order_id_ref }}</td>
                                                    <td>{{ $item->total }}</td>
                                                    <td>{{ $item->order_status }}</td>
                                                    <td>{{ $item->pay_type }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- Sidebar and Contents -->

    <div class="container">

    </div>

    <script src="{{ $saleChartLastMonth->cdn() }}"></script>
    <script src="{{ $saleChartCurrentMonth->cdn() }}"></script>
    {{ $saleChartLastMonth->script() }}
    {{ $saleChartCurrentMonth->script() }}
    <script>
        window.addEventListener('DOMContentLoaded', event => {

            // Toggle the side navigation
            const sidebarToggle = document.body.querySelector('#sidebarToggle');
            if (sidebarToggle) {
                // Uncomment Below to persist sidebar toggle between refreshes
                // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
                //     document.body.classList.toggle('sb-sidenav-toggled');
                // }
                sidebarToggle.addEventListener('click', event => {
                    event.preventDefault();
                    document.body.classList.toggle('sb-sidenav-toggled');
                    localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains(
                        'sb-sidenav-toggled'));
                });
            }

        });

        window.addEventListener('DOMContentLoaded', event => {
            // Simple-DataTables
            // https://github.com/fiduswriter/Simple-DataTables/wiki

            const datatablesSimple = document.getElementById('userTable');
            if (datatablesSimple) {
                new simpleDatatables.DataTable(datatablesSimple);
            }
        });

        window.addEventListener('DOMContentLoaded', event => {
            // Simple-DataTables
            // https://github.com/fiduswriter/Simple-DataTables/wiki

            const datatablesSimple = document.getElementById('orderTable');
            if (datatablesSimple) {
                new simpleDatatables.DataTable(datatablesSimple);
            }
        });
    </script>
</body>

</html>
