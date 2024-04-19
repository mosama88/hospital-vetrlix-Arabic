@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'text-danger dark:text-red-400 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <span>{{ $message }}</span>
        @endforeach
    </div>
@endif
