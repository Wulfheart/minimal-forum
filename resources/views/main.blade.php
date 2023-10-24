<x-layouts.app>
    <x-container class="pt-10">
        <div class="flex w-full flex-col md:flex-row">
            <!-- Sidebar -->
            <x-sidebar :sidebar="$sidebar"></x-sidebar>
            <!-- Main -->
            <div class="flex-grow">
                <div class="mb-4 flex w-full flex-row justify-between">
                    <x-pages.main.sort-dropdown title="Neueste">
                        <x-pages.main.sort-dropdown.item text="Neueste"/>
                        <x-pages.main.sort-dropdown.item active text="Beliebteste"/>
                        <x-pages.main.sort-dropdown.item text="Meiste Kommentare"/>
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
</x-layouts.app>
