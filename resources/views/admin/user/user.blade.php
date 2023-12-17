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

    <x-admin.home.header title="User" />

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
                            Users
                        </div>
                        <div class="card-body">
                            <div class="pb-3">
                                <button type="button" class="text-white btn btn-default btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#addUserModal">
                                    <i class="fa-solid fa-plus"></i> Thêm user
                                </button>
                            </div>
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th scope="row">Tên</th>
                                        <th scope="row">Email</th>
                                        <th scope="row">Loại Social</th>
                                        <th scope="row">Social ID</th>
                                        <th scope="row">Ngày tạo</th>
                                        <th scope="row">Ngày sửa</th>
                                        <th scope="row" data-sortable="false"></th>
                                        <th scope="row" data-sortable="false"></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th scope="row">Tên</th>
                                        <th scope="row">Email</th>
                                        <th scope="row">Loại tài khoản</th>
                                        <th scope="row">Social ID</th>
                                        <th scope="row">Ngày tạo</th>
                                        <th scope="row">Ngày sửa</th>
                                        <th scope="row" data-sortable="false"></th>
                                        <th scope="row" data-sortable="false"></th>
                                        {{-- <th data-sortable="false"></th> --}}
                                    </tr>
                                </tfoot>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->social }}</td>
                                            <td>{{ $item->social_id }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->updated_at)) }}</td>
                                            <td>
                                                @php
                                                    $name = Str::ucfirst($item->name);
                                                    $idTarget = str_replace(' ', '', $name);
                                                @endphp
                                                <button type="button" class="btn btn-default text-white btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#{{ $idTarget }}_{{ $item->id }}">
                                                    <i class="fas fa-info me-2"></i> Thông tin khác
                                                </button>

                                                <div class="modal fade" id="{{ $idTarget }}_{{ $item->id }}"
                                                    tabindex="-1" aria-labelledby="userDetailModal" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <p class="h3 mb-0" style="color: #35558a;">
                                                                    Chi tiết user
                                                                </p>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-start text-black p-4">
                                                                <div class="mb-3">
                                                                    <form class="updateUser" method="POST"
                                                                        action="{{ route('updateuser', ['id' => $item->id]) }}">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="row">
                                                                            <label class="col-sm-2 col-md-4 form-label"
                                                                                for="name">Tên</label>
                                                                            <div class="col-sm-10 col-md-8">
                                                                                <input value="{{ $item->name }}"
                                                                                    type="text" class="form-control"
                                                                                    id="user_name" name="user_name" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <label class="col-sm-2 col-md-4 form-label"
                                                                                for="verified">Xác thực</label>
                                                                            <div class="col-sm-10 col-md-8">
                                                                                <input
                                                                                    {{ $item->verified === 0 ? '' : 'checked' }}
                                                                                    type="checkbox" class="form-check"
                                                                                    disabled id="verified"
                                                                                    name="verified" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="row pt-2">
                                                                            <label
                                                                                class="col-sm-2 col-md-4 col-form-label"
                                                                                for="otp">OTP</label>
                                                                            <div class="col-sm-10 col-md-8">
                                                                                <input type="text" readonly disabled
                                                                                    value="{{ $item->otp }}"
                                                                                    class="form-control"
                                                                                    id="otp" name="otp" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="row pt-2">
                                                                            <label
                                                                                class="col-sm-2 col-md-4 col-form-label"
                                                                                for="last_sent">Lần gửi gần đây</label>
                                                                            <div class="col-sm-10 col-md-8">
                                                                                <input type="datetime" readonly
                                                                                    disabled
                                                                                    value="{{ $item->last_sent }}"
                                                                                    class="form-control"
                                                                                    id="last_sent" name="last_sent" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="row pt-2">
                                                                            <label
                                                                                class="col-sm-2 col-md-4 col-form-label"
                                                                                for="gender">Giới tính</label>
                                                                            <div class="col-sm-10 col-md-8">
                                                                                <select class="form-select"
                                                                                    name="gender" id="gender">
                                                                                    <option value="Male"
                                                                                        {{ $item->gender == 'Male' ? 'selected' : '' }}>
                                                                                        Nam </option>
                                                                                    <option value="Female"
                                                                                        {{ $item->gender == 'Female' ? 'selected' : '' }}>
                                                                                        Nữ</option>
                                                                                    <option value="Other"
                                                                                        {{ $item->gender == 'Other' ? 'selected' : '' }}>
                                                                                        Khác</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row pt-2">
                                                                            <label
                                                                                class="col-sm-2 col-md-4 col-form-label"
                                                                                for="biography">Tiểu sử</label>
                                                                            <div class="col-sm-10 col-md-8 pt-2">
                                                                                <textarea class="form-control text-dark" name="biography" id="biography" cols="60" rows="10">
                                                                                    {{ $item->biography === null ? 'No bio yet...' : $item->biography }}
                                                                                </textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row pt-2">
                                                                            <label class="col-sm-2 col-md-4 form-label"
                                                                                for="address">Địa chỉ</label>
                                                                            <div class="col-sm-10 col-md-8">
                                                                                <input type="text"
                                                                                    value="{{ $item->address }}"
                                                                                    class="form-control"
                                                                                    id="address" name="address" />
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
                                                <button type="button" class="text-white btn btn-default btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#assignRole{{ $idTarget }}_{{ $item->id }}">
                                                    <i class="fa-solid fa-paperclip"></i> Gán role
                                                </button>

                                                <div class="modal fade"
                                                    id="assignRole{{ $idTarget }}_{{ $item->id }}"
                                                    tabindex="-1" aria-labelledby="userDetailModal"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <p class="h3 mb-0" style="color: #35558a;">
                                                                    Gán role cho user
                                                                </p>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-start text-black p-4">
                                                                <div class="mb-3">
                                                                    <form class="assignRole" method="POST"
                                                                        action="{{ route('updateuser', ['id' => $item->id]) }}">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="row">
                                                                            <label class="col-sm-2 col-md-3 form-label"
                                                                                for="name">Tên</label>
                                                                            <div class="col-sm-10 col-md-9">
                                                                                <input value="{{ $item->name }}"
                                                                                    type="text"
                                                                                    class="form-control"
                                                                                    id="name" name="name"
                                                                                    disabled />
                                                                            </div>
                                                                        </div>
                                                                        <div class="row pt-2">
                                                                            <label class="col-sm-4 col-md-3 form-label"
                                                                                for="permissions">Chọn role</label>
                                                                            <div class="col-sm-8 col-md-9">
                                                                                <div class="row">
                                                                                    @foreach ($roles as $role)
                                                                                        <div
                                                                                            class="col-6 col-sm-4 col-md-3">
                                                                                            <div class="form-check">
                                                                                                <input type="checkbox"
                                                                                                    class="form-check-input"
                                                                                                    id="{{ $role->name }}"
                                                                                                    name="roles_array[]"
                                                                                                    value="{{ $role->name }}"
                                                                                                    {{ $item->roles->contains('name', $role->name) ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="{{ $role->name }}">{{ $role->name }}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row pt-2">
                                                                            <div class="col-md-10">
                                                                            </div>
                                                                            <div
                                                                                class="col-md-2 d-flex justify-content-end">
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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addRoleModal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <p class="h3 mb-0" style="color: #35558a;">
                                Thêm user
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start text-black p-4">
                            <div class="mb-3">
                                <form id="addUserForm" method="POST" action="{{ route('storeuser') }}">
                                    @csrf
                                    <div class="row">
                                        <label class="col-sm-2 col-md-3 form-label" for="name">Tên</label>
                                        <div class="col-sm-10 col-md-9">
                                            <input value="" type="text" class="form-control" id="name"
                                                name="name" />
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <label class="col-sm-2 col-md-3 form-label" for="name">Email</label>
                                        <div class="col-sm-10 col-md-9">
                                            <input value="" type="text" class="form-control" id="email"
                                                name="email" />
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <label class="col-sm-2 col-md-3 form-label" for="name">Password</label>
                                        <div class="col-sm-10 col-md-9">
                                            <input value="" type="password" class="form-control"
                                                id="password" name="password" />
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <label class="col-sm-4 col-md-3 form-label" for="permissions">Chọn
                                            role</label>
                                        <div class="col-sm-8 col-md-9">
                                            <div class="row">
                                                @foreach ($roles as $role)
                                                    <div class="col-6 col-sm-4 col-md-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="{{ $role->name }}" name="roles[]"
                                                                value="{{ $role->name }}">
                                                            <label class="form-check-label"
                                                                for="{{ $role->name }}">{{ $role->name }}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
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
                $('#addUserForm').validate({
                    rules: {
                        name: {
                            required: true,
                        },
                        email: {
                            required: true
                        },
                        password: {
                            required: true
                        },
                        'roles[]': {
                            required: true,
                        }
                    },
                    messages: {
                        name: {
                            required: 'Thiếu họ tên!',
                        },
                        email: {
                            required: 'Thiếu email'
                        },
                        password: {
                            required: 'Thiếu mật khẩu'
                        },
                        'roles[]': {
                            required: 'Thiếu role',
                        }
                    },
                    errorPlacement: function(error, element) {
                        error.appendTo(element.parent());
                    },
                    onfocusout: function(element) {
                        this.element(element);
                    }
                });

                $('input[name="roles[]"]').on('blur', function() {
                    $(this).valid();
                });

                // This is for validate multiple form with same class
                $('.updateUser').each(function() {
                    $(this).validate({
                        rules: {
                            user_name: {
                                required: true,
                            }
                        },
                        messages: {
                            user_name: {
                                required: 'Thiếu tên',
                            }
                        },
                        errorPlacement: function(error, element) {
                            error.appendTo(element.parent());
                        },
                        onfocusout: function(element) {
                            this.element(element);
                        }
                    });
                });

                $('.assignRole').each(function() {
                    $(this).validate({
                        rules: {
                            'roles_array[]': {
                                required: true,
                                minlength: 1
                            }
                        },
                        messages: {
                            'roles_array[]': {
                                required: 'Thiếu role',
                                minlength: 'Thiếu role'
                            }
                        },
                        errorPlacement: function(error, element) {
                            error.appendTo(element.parent());
                        }
                    });
                });
            });
        </script>
</body>

</html>
