@props(['sidebar'])

<header class="w-full">
    <x-container class="w-full text-sm" x-data="{ open: false }">
        <div class="flex min-h-12 items-baseline justify-between py-2">
            <div class="flex h-full flex-row items-baseline">
                <div class="flex items-center">
                    <button x-on:click="open = !open" class="mr-4 h-full text-xl md:hidden">
                        <i class="fas fa-bars block"></i>
                    </button>

                </div>
                <div class="flex flex-row items-baseline">
                    <a href="#" class="text-3xl font-black">
                        DNW<span class="text-base text-primary">.Forum</span>
                    </a>
                    <a href="#" class="ml-5 hidden text-gray-500 hover:text-primary md:inline">
                        Hauptseite
                    </a>

                </div>
            </div>
            <div class="hidden items-baseline text-gray-500 hover:text-primary md:flex">
                Abmelden
            </div>
        </div>
        <div class="pt-2 md:hidden" x-cloak x-show="open" x-on:click.away="open = false">
            <ul class="mb-4 w-full list-none text-sm text-gray-500">
                <li class="w-full lg:py-2">
                    <a class="block py-3 hover:text-primary lg:py-0" href="#">
                        <i class="fas fa-house mr-2"></i>
                        Hauptseite
                    </a>
                </li>
                <li class="w-full lg:py-2">
                    <a class="block py-3 hover:text-primary lg:py-0" href="#">
                        <i class="fas fa-moon mr-4"></i>
                        Abmelden
                    </a>
                </li>
            </ul>
            @isset($sidebar)
                {{ $sidebar }}
            @endisset
        </div>
    </x-container>
</header>
