@props(['tag', 'size' => 'base'])

@php
    $classes = 'rounded-xl bg-white/10 font-bold transition-colors duration-300 hover:bg-white/20';

    if ($size === 'base') {
        $classes .= ' text-sm px-5 py-1';
    }

    if ($size === 'small') {
        $classes .= ' text-2xs px-3 py-1';
    }
@endphp

<a
    href="/tags/{{ strtolower($tag->name) }}"
    class="{{ $classes }}"
>{{ $tag->name }}</a>
