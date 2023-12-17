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

    <x-admin.home.header title="Game" />
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
                            Games
                        </div>
                        <div class="card-body">
                            <div class="pb-3">
                                <button type="button" class="text-white btn btn-default btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#addGameModal">
                                    <i class="fa-solid fa-plus"></i> Thêm game
                                </button>
                            </div>
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        {{-- <th>Ảnh</th> --}}
                                        {{-- <th>Mã game</th> --}}
                                        <th>Tên</th>
                                        <th>Giá</th>
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
                                        <th>Giá</th>
                                        <th>Ngày Tạo</th>
                                        <th>Ngày Sửa</th>
                                        <th data-sortable="false"></th>
                                        <th data-sortable="false"></th>
                                    </tr>
                                </tfoot>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($games as $item)
                                        <tr>
                                            {{-- <td><img src="../images/{{ $item->image }}"width="150" height="100" /></td> --}}
                                            {{-- <td>{{ $item->id }}</td> --}}
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->updated_at)) }}</td>
                                            <td>
                                                <form method="GET"
                                                    action="{{ route('editgame', ['id' => $item->id]) }}">
                                                    @csrf
                                                    <button class="btn btn-warning">Sửa</button>
                                                </form>
                                            </td>
                                            <td>
                                                <button type="button" class="text-white btn btn-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteGame{{ $item->id }}">
                                                    <i class="fa-solid fa-trash-can"></i> Xóa game
                                                </button>

                                                <div class="modal" id="deleteGame{{ $item->id }}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form method="post"
                                                                action="{{ route('deletegame', ['id' => $item->id]) }}">
                                                                @csrf
                                                                @method('delete')
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Xóa game
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Bạn có chắc muốn xóa game này?
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

            <div class="modal fade" id="addGameModal" tabindex="-1" aria-labelledby="addRoleModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <p class="h3 mb-0" style="color: #35558a;">
                                Thêm game
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body text-start text-black p-4">
                            <div class="mb-3">
                                <form id="addGame" action="{{ route('storegame') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3 align-items-center">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Ảnh</label>
                                        <div class="col-sm-10 ">
                                            <input class="form-control" type="file" id="img" name="img" />
                                            <small class="text-secondary">Accepted file extension: .jpeg, .jpg,
                                                .png</small><br>
                                            <small class="text-secondary">Maximum file size: 5MB</small>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Tên Game</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="game_name"
                                                name="game_name" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Mô tả</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Chọn thể
                                            loại</label>
                                        <div class="col-sm-10">
                                            <div class='controls'>
                                                @foreach ($genres as $gen)
                                                    <div>
                                                        <label class="form-check-label">
                                                            <input id="{{ $gen->id }}" type="checkbox"
                                                                class="form-check-input" name="genres[]"
                                                                value="{{ $gen->id }}">
                                                            {{ $gen->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Chọn nhà sản
                                            xuất</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" id="pub_id" name="pub_id"
                                                aria-label="Default select example">
                                                @foreach ($pubs as $nsx)
                                                    <option value="{{ $nsx->id }}">{{ $nsx->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Giá</label>
                                        <div class="col-sm-10">
                                            <input type="number" min="0" class="form-control" id="price"
                                                name="price" />

                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Thêm
                                                thông tin
                                                game</button>
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

            // Convention
            /*
            $(document).ready(function() {
                $('#tên-form').validate({
                    rules: {
                        id-của-input: {
                            tên-validate: giá trị
                        }
                    },
                    messages: {
                        id-của-input: {
                            required: 'Thông báo'
                        }
                    },
                    errorPlacement: function(error, element) {
                        error.appendTo(element.parent());
                    }
                });

                Cái này để nếu khi bấm ra ngoài input mà ko có gì thì báo lỗi
                $('#id-của-input').on('blur', function() {
                    $(this).valid(); // Trigger validation on blur event
                });

                Cái này đặc biệt cho checkbox
                $('input[name="genres[]"]').on('blur', function() {
                    $(this).valid();
                });
            });
            */
            $(document).ready(function() {
                $('#addGame').validate({
                    rules: {
                        img: {
                            required: true,
                            extension: 'jpg|png|jpeg|webp',
                            filesize: 5048
                        },
                        game_name: {
                            required: true,
                        },
                        description: {
                            required: true,
                        },
                        pub_id: {
                            required: true,
                        },
                        'genres[]': {
                            required: true,
                            min: 1
                        },
                        price: {
                            required: true,
                            min: 0
                        }
                    },
                    messages: {
                        img: {
                            required: 'Thiếu file hình ảnh!',
                            extension: 'Định dạng không hợp lệ!',
                            filesize: 'Hình ảnh không quá 5MB!'
                        },
                        game_name: {
                            required: 'Thiếu tên game!',
                        },
                        description: {
                            required: 'Thiếu mô tả game!',
                        },
                        pub_id: {
                            required: 'Thiếu nhà phát hành!',
                        },
                        'genres[]': {
                            required: 'Thiếu thể loại game!',
                        },
                        price: {
                            required: 'Thiếu giá tiền!',
                            min: 'Giá tiền âm!',
                        }
                    },
                    errorPlacement: function(error, element) {
                        error.appendTo(element.parent());
                    }
                });

                $('#game_name').on('blur', function() {
                    $(this).valid(); // Trigger validation on blur event
                });
                $('#description').on('blur', function() {
                    $(this).valid(); // Trigger validation on blur event
                });
                $('#pub_id').on('blur', function() {
                    $(this).valid(); // Trigger validation on blur event
                });
                $('#price').on('blur', function() {
                    $(this).valid(); // Trigger validation on blur event
                });
                $('input[name="genres[]"]').on('blur', function() {
                    $(this).valid();
                });
            });
        </script>
</body>

</html>
