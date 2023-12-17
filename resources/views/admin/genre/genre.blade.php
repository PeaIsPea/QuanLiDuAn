<div>
    <!-- Be present above all else. - Naval Ravikant -->
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

    <x-admin.home.header title="Genre" />

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
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Genres
                        </div>
                        <div class="card-body">

                            <div class="pb-3">
                                <button type="button" class="text-white btn btn-default btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#addGenreModal">
                                    <i class="fa-solid fa-plus"></i> Thêm genre
                                </button>
                            </div>

                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        {{-- <th>Ảnh</th> --}}
                                        {{-- <th>Mã game</th> --}}
                                        <th>Tên</th>
                                        <th>Ngày Tạo</th>
                                        <th>Ngày Sửa</th>
                                        <th data-sortable="false"></th>
                                        <th data-sortable="false"></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        {{-- <th>Ảnh</th> --}}
                                        {{-- <th>Mã game</th> --}}
                                        <th>Tên</th>
                                        <th>Ngày Tạo</th>
                                        <th>Ngày Sửa</th>
                                        <th data-sortable="false"></th>
                                        <th data-sortable="false"></th>
                                    </tr>
                                </tfoot>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($genres as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->updated_at)) }}</td>
                                            <td>
                                                <button type="button" class="text-white btn btn-warning"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#updateGenre_{{ $item->id }}">
                                                    Sửa
                                                </button>

                                                <div class="modal fade" id="updateGenre_{{ $item->id }}"
                                                    tabindex="-1" aria-labelledby="addRoleModal" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-bottom-0">
                                                                <p class="h3 mb-0" style="color: #35558a;">
                                                                    Sửa genre
                                                                </p>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-start text-black p-4">
                                                                <div class="mb-3">
                                                                    <form
                                                                        class="editGenre"
                                                                        action="{{ route('updategenre', ['id' => $item->id]) }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="row mb-3">
                                                                            <label class="col-sm-2 col-form-label"
                                                                                for="basic-default-name">ID</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text"
                                                                                    class="form-control" id="genre_id"
                                                                                    name="id"
                                                                                    value="{{ $item->id }}"
                                                                                    readonly />
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label class="col-sm-2 col-form-label"
                                                                                for="basic-default-name">Tên thể
                                                                                loại</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text"
                                                                                    class="form-control" id="name"
                                                                                    name="name"
                                                                                    value="{{ $item->name }}" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="row justify-content-end">
                                                                            <div class="col-sm-10">
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
                                                <button type="button" class="text-white btn btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteGame{{ $item->id }}">
                                                    <i class="fa-solid fa-trash-can"></i> Xóa
                                                </button>

                                                <div class="modal" id="deleteGame{{ $item->id }}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <form method="post"
                                                                action="{{ route('deletegenre', ['id' => $item->id]) }}">
                                                                @csrf
                                                                @method('delete')<div class="modal-header">
                                                                    <h5 class="modal-title">Xóa genre
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Bạn có chắc muốn xóa genre này?
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-danger">Xóa</button>
                                                                </div>
                                                            </form>
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

            <div class="modal fade" id="addGenreModal" tabindex="-1" aria-labelledby="addRoleModal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <p class="h3 mb-0" style="color: #35558a;">
                                Thêm genre
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start text-black p-4">
                            <div class="mb-3">
                                <form id="addGenre" action="{{ route('storegenre') }}" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Tên thể
                                            loại</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="genre_name"
                                                name="genre_name" />
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Thêm thể loại</button>
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
                $('#addGenre').validate({
                    rules: {
                        genre_name: {
                            required: true,
                        },
                    },
                    messages: {
                        genre_name: {
                            required: 'Thiếu tên thể loại!',
                        },
                    },
                    errorPlacement: function(error, element) {
                        error.appendTo(element.parent());
                    }
                });

                $('.editGenre').each(function() {
                    $(this).validate({
                        rules: {
                            name: {
                                required: true,
                            }
                        },
                        messages: {
                            name: {
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

                $('#genre_name').on('blur', function() {
                    $(this).valid(); // Trigger validation on blur event
                });
            });
        </script>
</body>

</html>
