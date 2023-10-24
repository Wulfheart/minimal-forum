@props(['sidebar', 'suppressStartDiscussionButton' => false, 'suppressFollowButton' => false])

<div {{ $attributes->class('mb-12 w-full md:mb-0 md:mr-12 md:w-52') }}>
    @if ($sidebar->showStartDiscussionButton && !$suppressStartDiscussionButton)
        <div class="mb-5 w-full">
            <x-button class="w-full bg-primary font-bold text-primary-contrast hover:bg-primary-dark">
                Diskussion starten
            </x-button>
        </div>
    @endif
    @if ($sidebar->showFollowButton && !$suppressFollowButton)
        <div class="mb-2.5 w-full">
            <x-button class="w-full">
                <i class="far fa-eye pr-2"></i>
                Beobachten
            </x-button>
        </div>
    @endif

    <ul class="w-full list-none text-sm text-gray-500 lg:mb-4">
        @foreach ($sidebar->items as $item)
            <li class="w-full lg:py-2">
                <a class="{{ $item->isActive ? 'font-bold text-primary' : '' }} block py-3 hover:text-primary lg:py-0"
                    href="{{ $item->link }}">
                    <i class="{{ $item->icon }} mr-2"></i>
                    {{ $item->title }}
                </a>
            </li>
        @endforeach
    </ul>
    <ul class="list-none text-sm text-gray-500">
        @foreach ($sidebar->hubs as $hub)
            <h3 class="font-bold lg:pt-2">
                <a class="{{ $hub->isActive ? 'text-[--text]' : 'hover:text-primary' }} block pb-3 pt-5 lg:py-0"
                    style="--text: {{ $hub->color->hexValue() }};" href="{{ $hub->link }}">
                    {{ $hub->title }}
                </a>
            </h3>
            @foreach ($hub->channels as $channel)
                <li class="lg:py-2">
                    <a @class([
                        'group block py-2 lg:py-0',
                        'hover:text-primary' => !$channel->isActive,
                        'font-bold text-[--some-color]' => $channel->isActive,
                    ]) href="{{ $channel->link }}"
                        style="--some-color: {{ $channel->color->hexValue() }};">
                        <i @class([
                            $channel->icon .
                            ' mr-2 group:hover:text-[--some-color] text-[--some-color]',
                        ])></i>
                        {{ $channel->title }}
                    </a>
                </li>
            @endforeach
        @endforeach
    </ul>
</div>
