@props([
    'px' => 'px-5',
    'link' => false,
])

<{{ $link ? 'a' : 'button' }}
    {{ $attributes->class([
        'bg-gray-200 hover:bg-gray-300 text-gray-600 text-sm  py-2 text-center align-middle rounded truncate min-h-[2.25rem] inline-block ' .
        $px,
    ]) }}>
    {{ $slot }}
    </{{ $link ? 'a' : 'button' }}>
