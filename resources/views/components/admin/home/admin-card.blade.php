<div class="">
    <div class="wrimagecard-topimage_title">
        <h2 class="h4 text-center">
            {{ $title }}
        </h2>
        <div class="pb-2">
            <p>Total: {{ $data }}</p>
        </div>
    </div>
    <div class="card-action-bar">
        @isset($optionalData)
            <a class="float-lg-none link" href="{{ route($optionalData) }}">View Detail</a>
        @endisset ()
    </div>

</div>
