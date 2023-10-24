@props(['title'])

<div x-data="{ open: false }">
    <x-button x-on:click="open = !open">
        {{ $title }}
        <i class="fas fa-caret-down ml-2"></i>
    </x-button>

    <div class="absolute z-10 my-2 min-w-40 rounded bg-white py-2 shadow-default" x-cloak x-show="open"
        x-on:click.away="open = false">
        <ul class="static">
            {{ $slot }}
        </ul>
    </div>

</div>
