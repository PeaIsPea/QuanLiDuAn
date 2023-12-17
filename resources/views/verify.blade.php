<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xác Thực</title>
    @include('cdn')
</head>

<body class="bg-dark">

    @if (Session::has('account_verified'))
        <div class="container col-4">
            <div class="h2 text-center">
                <i class="fa-regular fa-fade fa-circle-check fa-2xl" style="color: #36bf5f;"></i>
            </div>
            <div class="h2 text-center text-white pt-3">
                Xác Thực Thành Công! <br>
                Bạn có thể trở về trang chủ và đăng nhập
            </div>
        </div>
        {{--
            Because of using session()->flash()
            Session will stay remain, even if closing the tab
        --}}
        {{ Session::forget('account_verified'); }}
    @endif

    @if (Session::has('otp_expired'))
        <div class="container col-4">
            <div class="h2 text-center">
                <i class="fa-regular fa-circle-xmark fa-fade fa-2xl" style="color: #d40c0c;"></i>
            </div>
            <div class="h2 text-center text-white pt-3">
                Xác Thực Thất Bại! <br>
                OTP bạn đã hết hạn, hãy kiểm tra lại email để xác thực lại
            </div>
        </div>
        {{ Session::forget('otp_expired'); }}
    @endif

</body>

</html>
