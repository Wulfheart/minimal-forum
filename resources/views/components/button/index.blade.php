@props([
    'px' => 'px-5',
])

<button
    {{ $attributes->class([
        'bg-gray-200 hover:bg-gray-300 text-gray-600 text-sm  py-2 text-center align-middle rounded truncate ' . $px,
    ]) }}>
    {{ $slot }}
</button>
