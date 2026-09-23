<form {{ $attributes->except('method')->merge(['class' => 'max-w-2xl mx-auto space-y-6']) }}
    method="{{ strtoupper($attributes->get('method', 'GET')) === 'GET' ? 'GET' : 'POST' }}">
    @if (strtoupper($attributes->get('method', 'GET')) !== 'GET')
        @csrf
        @if (strtoupper($attributes->get('method', 'POST')) !== 'POST')
            @method($attributes->get('method'))
        @endif
    @endif

    {{ $slot }}
</form>
