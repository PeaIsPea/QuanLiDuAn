<div class="swiper-slide swiper-slide--item">
    <img src="images/games/{{ $item->image }}" alt="">
    <div class="pt-1">
        <a class="text-decoration-none" href="{{ route('detailgame', ['id' => $item->id]) }}"
            data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $item->name }}">
            <h2>{{ $item->name }}</h2>
        </a>
        <p>{{ $item->description }}</p>
        <div class="pt-0">
            &nbsp;
        </div>
    </div>
</div>
