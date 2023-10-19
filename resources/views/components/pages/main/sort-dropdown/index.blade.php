@props(['title'])

<div x-data="{ open: false }">
    <x-button x-on:click="open = !open">
        {{ $title }}
        <i class="fas fa-caret-down ml-2"></i>
    </x-button>

    <div class="z-10 my-2 py-2 bg-white rounded min-w-40 absolute shadow-default" x-cloak x-show="open"
        x-on:click.away="open = false">
        <ul class="static">
            {{ $slot }}
        </ul>
    </div>

</div>
