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
                            <h4>Thông tin tài khoản</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <form method="POST" action="{{ route('updateuser', ['id' => Auth::user()->id]) }}">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <label class="col-sm-2 col-md-4 form-label" for="name">Tên</label>
                                        <div class="col-sm-10 col-md-8">
                                            <input value="{{ Auth::user()->name }}" type="text" class="form-control"
                                                id="verified" name="name" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-md-4 form-label" for="verified">Xác thực</label>
                                        <div class="col-sm-10 col-md-8">
                                            <input {{ Auth::user()->verified === 0 ? '' : 'checked' }} type="checkbox"
                                                class="form-check" id="verified" name="verified" />
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <label class="col-sm-2 col-md-4 col-form-label" for="otp">OTP</label>
                                        <div class="col-sm-10 col-md-8">
                                            <input type="text" readonly disabled value="{{ Auth::user()->otp }}"
                                                class="form-control" id="otp" name="otp" />
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <label class="col-sm-2 col-md-4 col-form-label" for="last_sent">Lần gửi gần
                                            đây</label>
                                        <div class="col-sm-10 col-md-8">
                                            <input type="datetime" readonly disabled value="{{ Auth::user()->last_sent }}"
                                                class="form-control" id="last_sent" name="last_sent" />
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <label class="col-sm-2 col-md-4 col-form-label" for="gender">Giới tính</label>
                                        <div class="col-sm-10 col-md-8">
                                            <select class="form-select" name="gender" id="gender">
                                                <option value="Male" {{ Auth::user()->gender == 'Male' ? 'selected' : '' }}>
                                                    Nam </option>
                                                <option value="Female"
                                                    {{ Auth::user()->gender == 'Female' ? 'selected' : '' }}>
                                                    Nữ</option>
                                                <option value="Other"
                                                    {{ Auth::user()->gender == 'Other' ? 'selected' : '' }}>
                                                    Khác</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <label class="col-sm-2 col-md-4 col-form-label" for="biography">Tiểu sử</label>
                                        <div class="col-sm-10 col-md-8 pt-2">
                                            <textarea class="form-control text-dark" name="biography" id="biography" cols="60" rows="10">
                                                {{ Auth::user()->biography === null ? 'No bio yet...' : Auth::user()->biography }}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <label class="col-sm-2 col-md-4 form-label" for="address">Địa chỉ</label>
                                        <div class="col-sm-10 col-md-8">
                                            <input type="text" value="{{ Auth::user()->address }}" class="form-control"
                                                id="address" name="address" />
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <div class="col-md-9">
                                        </div>
                                        <div class="col-md-3 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Cập
                                                nhật</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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
        </script>
</body>

</html>
