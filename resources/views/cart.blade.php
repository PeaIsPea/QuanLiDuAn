<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('cdn')
</head>

<body class="d-flex flex-column min-vh-100">
    <x-header title="Giỏ Hàng" />

    <div class="container-fluid pt-3">
        <div class="container shadow">
            <section class="h-100">
                <div class="container py-5">
                    <div class="row d-flex justify-content-center my-4">
                        <div class="text-center">
                            @if (Session::has('cart_updated'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ Session::get('cart_updated') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        <div class="text-center">
                            @if (Session::has('order_success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    @foreach (Session::get('order_success') as $item)
                                        <strong>{{ $item }}<br></strong>
                                    @endforeach
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        {{-- Item List --}}
                        <div class="col-md-8">
                            <div class="card bg-navbar-dark border-secondary mb-4">
                                <div class="card-header bg-transparent border-secondary text-white py-3">
                                    <div class="row">
                                        {{-- If the session has cart in it get total quantity --}}
                                        @if (Session::has('cart') && !empty(session('cart')))
                                            {{-- Similar to normal PHP open tag --}}
                                            @php
                                                $quantity = 0;
                                            @endphp
                                            @foreach ((array) session('cart') as $id => $details)
                                                @php
                                                    $quantity += $details['quantity'];
                                                @endphp
                                            @endforeach
                                            <div class="col-md-7 col-6">
                                                <h5 class="mb-0">Giỏ hàng - {{ $quantity }} món</h5>
                                            </div>
                                            <div class="col-md-5 col-6 d-flex justify-content-end">
                                                <form action="{{ route('removeItem') }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button name="clear_all" type="submit" class="btn btn-danger">Xóa
                                                        hết</button>
                                                </form>
                                            </div>
                                        @else
                                            <h5 class="mb-0">Giỏ hàng - 0 món</h5>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if (Session::has('cart'))
                                        @foreach ((array) session('cart') as $id => $details)
                                            <x-order.item-list :cart-item="$details" />
                                        @endforeach
                                    @else
                                        <p class="text-white h3 mb-0">Giỏ hàng trống!</p>
                                    @endif
                                </div>

                            </div>
                        </div>
                        {{-- Item List --}}

                        {{-- Payment --}}
                        <div class="col-md-4 text-white">
                            <div class="card mb-4 bg-navbar-dark border-secondary">
                                <div class="card-header bg-transparent py-3 border-secondary">
                                    <h5 class="mb-0">Thanh toán</h5>
                                </div>
                                <div class="card-body">
                                    @csrf
                                    <ul class="list-group list-group-flush">
                                        @php
                                            $total = 0;
                                        @endphp
                                        @if (Session::has('cart'))
                                            @foreach ((array) session('cart') as $id => $details)
                                                <li
                                                    class="bg-navbar-dark text-white list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                                    {{ $details['name'] }}
                                                    <span>{{ number_format($details['price'], 0, ',', '.') }}đ</span>
                                                </li>
                                                @php
                                                    $total += $details['price'] * $details['quantity'];
                                                @endphp
                                            @endforeach
                                        @endif
                                        <li
                                            class="bg-navbar-dark text-white list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                            <div>
                                                <strong>Tổng cộng</strong>
                                            </div>
                                            <span>
                                                <strong>
                                                    <input type="hidden" id="totalTemp" value="">
                                                    <div id="totalPrice" name="total">
                                                        {{ number_format($total, 0, ',', '.') }}đ
                                                    </div>
                                                </strong>
                                            </span>
                                        </li>
                                    </ul>

                                    {{-- The session has the cart, and it's not empty --}}
                                    @if (Session::has('cart') && !empty(session('cart')))
                                        {{-- <form action="{{ route('checkoutMomo') }}" method="POST">
                                            @csrf
                                            <div class="d-flex justify-content-center pt-2">
                                                <input type="text" name="total" hidden value="{{ $total }}">
                                                <button type="submit" class="btn btn-momo">
                                                    <img src="images/common/momo-white-logo.png" width="20"
                                                        height="20" alt=""> &nbsp; Thanh toán bằng MoMo
                                                </button>
                                            </div>
                                        </form> --}}
                                        <form action="{{ route('checkoutVnpay') }}" method="POST">
                                            @csrf
                                            <div class="d-flex justify-content-center pt-2">
                                                <input type="text" name="total" hidden
                                                    value="{{ $total }}">
                                                <button name="redirect" type="submit" class="btn btn-vnpay">
                                                    <img src="images/common/vnpay-logo.png" width="20"
                                                        height="20" alt=""> &nbsp; Thanh toán bằng VNPAY
                                                </button>
                                            </div>
                                        </form>
                                    @else
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('index') }}" class="text-decoration-none text-white">
                                                <button type="button" class="btn btn-primary">
                                                    <i class="fa-solid fa-house"></i> Về trang chủ
                                                </button>
                                            </a>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        {{-- Payment --}}
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        function decrementQuantity(button) {
            const quantityInput = $(button).parent().next().find('input[type="number"]');
            if (quantityInput.length) {
                quantityInput[0].stepDown();
                updateQuantity(quantityInput[0], "decrease");
            }
        }

        function incrementQuantity(button) {
            const quantityInput = $(button).parent().prev().find('input[type="number"]');
            if (quantityInput.length) {
                quantityInput[0].stepUp();
                updateQuantity(quantityInput[0], "increase");
            }
        }

        // function extractValues(obj) {
        //     const stack = [obj];
        //     const result = [];

        //     while (stack.length) {
        //         const currentObj = stack.pop();

        //         let price = 0;
        //         for (let key in currentObj) {
        //             const value = currentObj[key];
        //             if (typeof value === 'object' && value !== null) {
        //                 // If the value is an object, push it onto the stack for further iteration
        //                 stack.push(value);
        //             } else {
        //                 // Push the desired value into the result array
        //                 if (key == "price") {
        //                     price = value;
        //                 }
        //                 if (key == "quantity") {
        //                     console.log(price);
        //                     result.push(value * price);
        //                 }
        //             }
        //         }
        //     }

        //     return result;
        // }

        // function numberFormat(number, decimals, decimalSeparator, thousandsSeparator) {
        //     decimals = decimals || 0;
        //     decimalSeparator = decimalSeparator || '.';
        //     thousandsSeparator = thousandsSeparator || ',';

        //     const fixedNumber = number.toFixed(decimals);
        //     const parts = fixedNumber.toString().split('.');
        //     parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousandsSeparator);

        //     return parts.join(decimalSeparator);
        // }

        function updateQuantity(quantityInput, action) {
            const quantityForm = $(quantityInput).closest('form');
            const formData = new FormData(quantityForm[0]);

            $.ajax({
                url: quantityForm.attr('action'),
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        location.reload();
                        toastr.success('', 'Cập nhật thành công');
                    } else {
                        location.reload();
                        toastr.error('', 'Đã hết key!');
                    }
                },
                error: function() {
                    toastr.error('', 'Something went wrong');
                }
            });
        }
    </script>
</body>

<footer class="mt-auto">
    <x-footer />
</footer>

</html>
