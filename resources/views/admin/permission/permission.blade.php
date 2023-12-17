<div>
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
</div>
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

    <x-admin.home.header title="Permission" />

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <x-admin.home.sidebar />
        </div>
        <!--Vi tri content margin-left: 20px !important -->

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="text-center">
                        @if ($errors->any())
                            <div class="text-danger h3 text-lg-start fw-bold">
                                Something went wrong...
                            </div>
                            <ul class="list-group list-unstyled">
                                @foreach ($errors->all() as $item)
                                    <li class="alert alert-danger">{{ $item }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="text-center">
                        @if (Session::has('delete_success'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{ Session::get('delete_success') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Permissions
                        </div>
                        <div class="card-body">

                            <div class="pb-3">
                                <button type="button" class="text-white btn btn-default btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#addPermissionModal">
                                    <i class="fa-solid fa-plus"></i> Thêm permission
                                </button>
                            </div>

                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th scope="row">Tên</th>
                                        <th scope="row">Ngày tạo</th>
                                        <th scope="row">Ngày sửa</th>
                                        <th scope="row" data-sortable="false"></th>
                                        <th scope="row" data-sortable="false"></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th scope="row">Tên</th>
                                        <th scope="row">Ngày tạo</th>
                                        <th scope="row">Ngày sửa</th>
                                        <th scope="row" data-sortable="false"></th>
                                        <th scope="row" data-sortable="false"></th>
                                    </tr>
                                </tfoot>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($permissions as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->updated_at)) }}</td>
                                            <td>
                                                @php
                                                    $name = Str::ucfirst($item->name);
                                                    $idTarget = str_replace(' ', '', $name);
                                                @endphp
                                                <button type="button" class="text-white btn btn-default btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#{{ $idTarget }}_{{ $item->id }}">
                                                    <i class="fas fa-info me-2"></i> Sửa
                                                </button>

                                                <div class="modal fade" id="{{ $idTarget }}_{{ $item->id }}"
                                                    tabindex="-1" aria-labelledby="userDetailModal" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <p class="h3 mb-0" style="color: #35558a;">
                                                                    Chi tiết permission
                                                                </p>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-start text-black p-4">
                                                                <div class="mb-3">
                                                                    <form class="editPermission" method="POST"
                                                                        action="{{ route('updatepermission', ['id' => $item->id]) }}">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="row">
                                                                            <label class="col-sm-2 col-md-2 form-label"
                                                                                for="name">Tên</label>
                                                                            <div class="col-sm-10 col-md-10">
                                                                                <input value="{{ $item->name }}"
                                                                                    type="text" class="form-control"
                                                                                    id="name" name="name" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="row pt-2">
                                                                            <div
                                                                                class="col-md-9 d-flex justify-content-end">
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Cập
                                                                                    nhật</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                @if ($item->is_active === 1)
                                                    <button type="button" class="text-white btn btn-danger btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#delete{{ $idTarget }}_{{ $item->id }}">
                                                        <i class="fa-solid fa-toggle-off"></i> Vô hiệu hóa
                                                    </button>

                                                    <div class="modal"
                                                        id="delete{{ $idTarget }}_{{ $item->id }}"
                                                        tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form method="POST"
                                                                    action="{{ route('deletepermission', ['id' => $item->id]) }}">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Vô hiệu hóa permission
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Bạn có chắc muốn vô hiệu permission này?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-danger">Vô
                                                                            hiệu
                                                                            hóa </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <button type="button" class="text-white btn btn-success btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#activate{{ $idTarget }}_{{ $item->id }}">
                                                        <i class="fa-solid fa-toggle-on"></i> Kích hoạt
                                                    </button>

                                                    <div class="modal"
                                                        id="activate{{ $idTarget }}_{{ $item->id }}"
                                                        tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form method="POST"
                                                                    action="{{ route('activatepermission', ['id' => $item->id]) }}">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Kích hoạt permission
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Bạn có chắc muốn kích hoạt permission này?
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-info">Kích hoạt</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

            <div class="modal fade" id="addPermissionModal" tabindex="-1" aria-labelledby="addRoleModal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <p class="h3 mb-0" style="color: #35558a;">
                                Thêm permission
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start text-black p-4">
                            <div class="mb-3">
                                <form id="addPermission" method="POST" action="{{ route('storepermission') }}">
                                    @csrf
                                    <div class="row">
                                        <label class="col-sm-2 col-md-2 form-label" for="name">Tên</label>
                                        <div class="col-sm-10 col-md-10">
                                            <input value="" type="text" class="form-control"
                                                id="permission_name" name="permission_name" />
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <div class="col-md-10">
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">
                                                Thêm
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

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

                const datatablesSimple = document.getElementById('datatablesSimple');
                if (datatablesSimple) {
                    new simpleDatatables.DataTable(datatablesSimple);
                }
            });

            $(document).ready(function() {
                $('#addPermission').validate({
                    rules: {
                        permission_name: {
                            required: true,
                        },
                    },
                    messages: {
                        permission_name: {
                            required: 'Thiếu tên permission!',
                        },
                    },
                    errorPlacement: function(error, element) {
                        error.appendTo(element.parent());
                    }
                });

                $('.editPermission').each(function() {
                    $(this).validate({
                        rules: {
                            name: {
                                required: true,
                            },
                        },
                        messages: {
                            name: {
                                required: 'Thiếu tên permission!',
                            },
                        },
                        errorPlacement: function(error, element) {
                            error.appendTo(element.parent());
                        },
                        onfocusout: function(element) {
                            this.element(element);
                        }
                    });
                });

                $('#permission_name').on('blur', function() {
                    $(this).valid(); // Trigger validation on blur event
                });
            });
        </script>
</body>

</html>
