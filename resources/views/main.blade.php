<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="">

    <x-container class="pt-10 @container">
        <div class="flex w-full flex-col @container @2xl:flex-row">
            <!-- Sidebar -->
            <div class="mb-12 w-full @2xl:mb-0 @2xl:mr-12 @2xl:w-52">
                @if ($sidebar->showStartDiscussionButton)
                    <div class="mb-5 w-full">
                        <x-button class="w-full bg-primary font-bold text-primary-contrast hover:bg-primary-dark">
                            Diskussion starten
                        </x-button>
                    </div>
                @endif
                @if ($sidebar->showFollowButton)
                    <div class="mb-2.5 w-full">
                        <x-button class="w-full">
                            <i class="far fa-eye pr-2"></i>
                            Beobachten
                        </x-button>
                    </div>
                @endif

                <ul class="mb-4 w-full list-none text-sm text-gray-500">
                    @foreach ($sidebar->items as $item)
                        <li class="w-full py-2">
                            <a class="{{ $item->isActive ? 'font-bold text-primary' : '' }} block hover:text-primary"
                                href="{{ $item->link }}">
                                <i class="{{ $item->icon }} mr-2"></i>
                                {{ $item->title }}
                            </a>
                        </li>
                    @endforeach



                </ul>
                <ul class="list-none text-sm text-gray-500">
                    @foreach ($sidebar->hubs as $hub)
                        <h3 class="pt-2 font-bold"><a class="{{ $hub->isActive ? '' : 'hover:text-primary' }}"
                                href="{{ $hub->link }}">{{ $hub->title }}</a></h3>
                        @foreach ($hub->channels as $channel)
                            <li class="py-2">
                                <a class="hover:text-primary" href="{{ $channel->link }}">
                                    <i class="{{ $channel->icon }} mr-2"></i>
                                    {{ $channel->title }}
                                </a>
                            </li>
                        @endforeach
                    @endforeach
                </ul>
            </div>
            <!-- Main -->
            <div class="flex-grow">
                <div class="mb-4 flex w-full flex-row justify-between">
                    <x-pages.main.sort-dropdown title="Neueste">
                        <x-pages.main.sort-dropdown.item text="Neueste" />
                        <x-pages.main.sort-dropdown.item active text="Beliebteste" />
                        <x-pages.main.sort-dropdown.item text="Meiste Kommentare" />
                    </x-pages.main.sort-dropdown>
                    <x-button.icon-only><i class="fas fa-check"></i></x-button.icon-only>
                </div>

                <ul class="w-full list-none">
                    <livewire:discussion-list-item></livewire:discussion-list-item>
                    <livewire:discussion-list-item></livewire:discussion-list-item>
                    <li class="-mx-3 flex flex-row items-center rounded px-3 py-3 hover:bg-gray-100">
                        <a href="#" class="mr-4">
                            <div>
                                <img src="https://i.pravatar.cc/150?u=fake@pravatar.com" alt=""
                                    class="h-9 w-9 rounded-full">
                            </div>
                        </a>
                        <a href="#" class="flex flex-grow flex-row items-baseline justify-between">
                            <div>
                                <h2 class="mb-[3px] truncate text-gray-500">
                                    Diplomacy Meisterschaft 2023
                                </h2>
                                <div class="flex flex-row items-center text-xs text-gray-400">
                                    {{-- <div class="text-[10px] leading-3 mr-1"> --}}
                                    {{--     <span> --}}
                                    {{--         <span class="rounded-l bg-red-500 text-white font-bold py-0.5 px-1 "> --}}
                                    {{--             <i class="fas fa-check"></i> --}}
                                    {{--             DNW --}}
                                    {{--         </span> --}}
                                    {{--         <span class="rounded-r bg-gray-200 py-0.5 px-1 text-gray-400 font-bold"> --}}
                                    {{--             Support --}}
                                    {{--         </span> --}}
                                    {{--     </span> --}}
                                    {{-- </div> --}}
                                    <div>
                                        <i class="fas fa-reply"></i>
                                        <span class="font-bold">Foo</span> vor 3 Stunden
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-row items-center">
                                <div class="mr-5 text-[10px] leading-3">
                                    <span>
                                        <span class="rounded-l bg-red-500 px-1 py-0.5 font-bold text-white">
                                            <i class="fas fa-check"></i>
                                            DNW
                                        </span>
                                        <span class="rounded-r bg-gray-200 px-1 py-0.5 font-bold text-gray-500">
                                            Support
                                        </span>
                                    </span>
                                </div>
                                <div class="text-muted text-sm">
                                    <i class="fa-regular fa-comment mr-1"></i>
                                    56
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="-mx-3 flex flex-row items-center rounded px-3 py-3 hover:bg-gray-100">
                        <a href="#" class="mr-4">
                            <div>
                                <img src="https://i.pravatar.cc/150?u=test@dnw.com" alt=""
                                    class="h-9 w-9 rounded-full">
                            </div>
                        </a>
                        <a href="#" class="flex flex-grow flex-row items-baseline justify-between">
                            <div>
                                <h2 class="text-heading mb-[3px] truncate font-bold">
                                    Diplomacy Meisterschaft 2023 - ungelesen
                                </h2>
                                <div class="text-muted-more flex flex-row items-center text-xs">
                                    {{-- <div class="text-[10px] leading-3 mr-1"> --}}
                                    {{--     <span> --}}
                                    {{--         <span class="rounded-l bg-red-500 text-white font-bold py-0.5 px-1 "> --}}
                                    {{--             <i class="fas fa-check"></i> --}}
                                    {{--             DNW --}}
                                    {{--         </span> --}}
                                    {{--         <span class="rounded-r bg-gray-200 py-0.5 px-1 text-gray-400 font-bold"> --}}
                                    {{--             Support --}}
                                    {{--         </span> --}}
                                    {{--     </span> --}}
                                    {{-- </div> --}}
                                    <div>
                                        <i class="fas fa-reply"></i>
                                        <span class="font-bold">Foo</span> vor 3 Stunden
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-row items-center">
                                <div class="mr-5 text-[10px] leading-3">
                                    <span>
                                        <span class="rounded-l bg-red-500 px-1 py-0.5 font-bold text-white">
                                            DNW
                                        </span>
                                        <span class="rounded-r bg-gray-200 px-1 py-0.5 font-bold text-gray-500">
                                            Support
                                        </span>
                                    </span>
                                </div>
                                <div class="text-heading text-sm font-bold">
                                    <i class="fa-solid fa-comment mr-1"></i>
                                    56
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </x-container>
</body>

</html>
