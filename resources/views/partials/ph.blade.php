{{-- image or checkered placeholder. vars: $src, $class --}}
@if($src)<img src="{{ $src }}" alt="" class="{{ $class ?? '' }} object-cover">@else<div class="{{ $class ?? '' }} ph"></div>@endif
