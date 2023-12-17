@foreach ($genres as $item)
    <option
        id="{{ $item->id }}"
        value="{{ $item->name }}"
        {{ Request::get('genre') === $item->name ? 'selected' : '' }}
    >
        {{ $item->name }}
    </option>
@endforeach
