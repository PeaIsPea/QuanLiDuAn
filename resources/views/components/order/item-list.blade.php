<!-- Single item -->
<div class="row">
    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
        <!-- Image -->
        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
            <a href="{{ route('detailgame', ['id' => $cartItem['id']]) }}">
                <img src="images/games/{{ $cartItem['image'] }}" class="rounded shadow-sm w-100" alt="{{ $cartItem['image'] }}">
            </a>
            <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)">
                </div>
            </a>
        </div>
        <!-- Image -->
    </div>

    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0 text-white">
        <div class="row">
            <p class="h5"><strong>{{ $cartItem['name'] }}</strong></p>

            <!-- Price -->
            <p class=""> {{ number_format($cartItem['price'], 0, ',', '.') }}đ</p>
            <!-- Price -->
        </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
        <!-- Quantity -->
        <div class="row" style="max-width: 300px">
            <div class="col-2 me-4">
                <button class="btn btn-danger px-3" onclick="decrementQuantity(this)">
                    <i class="fas fa-minus" aria-hidden="true"></i>
                </button>
            </div>

            <div class="form-outline col-6">
                <div class="text-center">
                    <form action="{{ route('updateCart') }}" method="post">
                        @csrf
                        @method('put')
                        <input id="quantity" min="1" name="quantity" value="{{ $cartItem['quantity'] }}"
                            type="number" class="form-control">
                        <input id="price" name="price" value="{{ $cartItem['price'] }}"
                            type="hidden" class="form-control">
                        <input name="id" type="hidden" value="{{ $cartItem['id'] }}">
                    </form>
                </div>

                <div class="pt-3 d-flex justify-content-center">
                    <form action="{{ route('removeItem') }}" method="post">
                        @csrf
                        @method('delete')
                        <input name="id" type="text" value="{{ $cartItem['id'] }}" hidden>
                        <button name="delete" type="submit" class="btn btn-danger btn-sm me-1 mb-2"
                            data-mdb-toggle="tooltip" title="Remove item">
                            <i class="fas fa-trash"></i> Xóa
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-2">
                <button class="btn btn-primary px-3" onclick="incrementQuantity(this)">
                    <i class="fas fa-plus" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        <!-- Quantity -->
    </div>
</div>
<!-- Single item -->

<hr class="my-2" />
