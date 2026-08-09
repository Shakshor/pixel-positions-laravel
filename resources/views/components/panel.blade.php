@php
    $classes =
        'group rounded-xl border border-transparent bg-white/5 p-4 transition-colors duration-300 hover:border-blue-800';
@endphp

{{-- using attributes function (shorthand) --}}
<div {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</div>


{{-- using merge --}}
{{-- <div
    {{ $attributes->merge(['class' => 'group rounded-xl border border-transparent bg-white/5 p-4 transition-colors duration-300 hover:border-blue-800']) }}>
    {{ $slot }}
</div> --}}
