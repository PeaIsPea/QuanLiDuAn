<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('cdn')
</head>

<body>
    <x-header title="Quên Mật Khẩu" />

    <div class="container col-4 pt-3">
        <div class="card text-center">
            <div class="card-header h5 text-white bg-navbar-dark">Quên Mật Khẩu</div>
            <div class="card-body px-5">
                <p class="card-text py-2">
                    Nhập email của bạn <br>
                    Chúng tôi sẽ gửi cho bạn 1 email để thay đổi mật khẩu
                </p>

                <form action="{{ route('reset-send') }}" method="post">
                    @csrf
                    <div class="form-outline">
                        <input name="email" type="email" class="form-control my-3" />
                    </div>
                    <button class="btn btn-dark w-100">Gửi</button>
                </form>
                <div class="d-flex justify-content-between mt-4">
                    <a class="" href="{{ route('login') }}">Đăng nhập</a>
                    <a class="" href="{{ route('signup') }}">Đăng ký</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
