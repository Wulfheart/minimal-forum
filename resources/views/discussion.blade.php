<x-layouts.app>
    <x-nav></x-nav>
    <div class="w-full bg-[--color-accent]"
        style="--color-accent: {{ $channel->channelColor->hexValue() }}; --color-contrast: {{ $channel->channelColor->getContrastColor()->hexValue() }}">
        <x-container class="px-4 pb-7 pt-10">
            <div class="w-full text-center">
                <div class="flex flex-row justify-center space-x-5 font-semibold text-sm">
                    <a href="#">
                        <div class="rounded bg-[--color-contrast] px-2 py-0.5 text-[--color-accent]">
                            {{ $channel->hubTitle }}
                        </div>
                    </a>
                    <a href="#">
                        <div class="px-2 py-0.5 text-[--color-contrast]">
                            <i class="{{ $channel->channelIcon }} mr-1"></i>
                            {{ $channel->channelTitle }}
                        </div>
                    </a>

                </div>
                <h1 class="text-xl text-[--color-contrast] md:text-2xl pt-4">
                    {{ $title }}
                </h1>
            </div>
        </x-container>
    </div>
</x-layouts.app>
