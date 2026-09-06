@props(['employer', 'width' => 90])

<img src="{{ str_starts_with($employer->logo, 'http') ? $employer->logo : Storage::disk('public')->url($employer->logo) }}"
    alt="{{ $employer->name }}" width="{{ $width }}" class="rounded-xl">
