<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('cdn')
    <style>
        /* Custom styles for the DataTable */
        .data-table {
            background-color: #2a2a2a;
            color: #fff;
            border-collapse: collapse;
        }

        .data-table th,
        .data-table td {
            border: 1px solid #444;
            padding: 8px;
        }

        .data-table th.sortable:not(.th--asc):not(.th--desc):hover {
            background-color: #ddd;
            cursor: pointer;
        }

        .data-table th.sortable.th--asc,
        .data-table th.sortable.th--desc {
            background-color: #bbb;
        }

        .datatable-sorter::before {
            border-top: 4px solid #e9e5e5;
            bottom: 0px;
        }

        .datatable-sorter::after {
            border-bottom: 4px solid #e9e5e5;
            border-top: 4px solid transparent;
            top: 0px;
        }

        .datatable-pagination .datatable-active a,
        .datatable-pagination .datatable-active a:focus,
        .datatable-pagination .datatable-active a:hover {
            background-color: #d9d9d9;
            cursor: default;
            color: #000;
        }

        .datatable-pagination a {
            border: 1px solid transparent;
            float: left;
            margin-left: 2px;
            padding: 6px 12px;
            position: relative;
            text-decoration: none;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <x-header title="Cài Đặt Tài Khoản" />

    <div class="container p-0">
        <h1 class="h3 mb-3">&nbsp;</h1>

        <div class="row">
            {{-- Tab Menu --}}
            <div class="col-md-5 col-xl-4">
                <div class="card border-secondary info">
                    <div class="card-header border-secondary bg-navbar-dark text-white">
                        <h5 class="card-title mb-0">Cài đặt tài khoản</h5>
                    </div>

                    <div class="list-group list-group-flush" role="tablist">
                        <a class="list-group-item-dark list-group-item list-group-item-action active"
                            data-bs-toggle="list" href="#account" role="tab">
                            Thông tin tài khoản
                        </a>
                        <a class="list-group-item-dark list-group-item list-group-item-action" data-bs-toggle="list"
                            href="#password" role="tab">
                            Đổi mật khẩu
                        </a>
                        <a class="list-group-item-dark list-group-item list-group-item-action" data-bs-toggle="list"
                            href="#order" role="tab">
                            Lịch sử mua hàng
                        </a>
                    </div>
                </div>
            </div>
            {{-- Tab Menu --}}

            {{-- Content --}}
            <div class="col-md-7 col-xl-8">
                <div class="tab-content">

                    <x-user.basic-info />

                    <x-user.change-password />

                    <x-user.order-history :orders="$orders" />

                </div>
            </div>
            {{-- Content --}}
        </div>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', event => {
            // Simple-DataTables
            // https://github.com/fiduswriter/Simple-DataTables/wiki

            const datatablesSimple = document.getElementById('datatablesSimple');
            if (datatablesSimple) {
                new simpleDatatables.DataTable(datatablesSimple);
            }
        });
    </script>
</body>

<footer class="mt-auto">
    <x-footer />
</footer>

</html>
