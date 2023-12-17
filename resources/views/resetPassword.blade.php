<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('cdn')
</head>

<body>
    <x-header title="Đổi Mật Khẩu" />

    <div class="container col-4 pt-3">
        <div class="card text-center">
            <div class="card-header h5 text-white bg-navbar-dark">Đổi Mật Khẩu</div>
            <div class="card-body px-5">

                <form action="{{ route('resetPassword') }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-outline">
                        <input name="email" type="hidden" value="{{ $email }}" class="form-control my-3" />
                    </div>
                    <div class="form-outline">
                        <input name="otp" type="hidden" value="{{ $otp }}" class="form-control my-3" />
                    </div>
                    <div class="form-outline">
                        <input name="new_password" type="password" class="form-control my-3"
                            placeholder="Nhập mật khẩu mới" />
                        @error('new_password')
                            <div class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-outline">
                        <input name="new_password_confirmation" type="password" class="form-control my-3"
                            placeholder="Nhập lại mật khẩu" />
                        @error('new_password_confirmation')
                            <div class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-dark w-100">Đổi Mật Khẩu</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
