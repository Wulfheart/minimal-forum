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

<div class="h-24"></div>
<x-container>
    <div class="w-full flex">
        <!-- Sidebar -->
        <div class="w-52 mr-12">
            <div class="w-full mb-5">
                <button
                    class="bg-primary hover:bg-primary-dark text-white text-sm font-bold py-2 px-5 text-center align-middle rounded truncate w-full">
                    Diskussion starten
                </button>
            </div>
            <div class="w-full mb-2.5">
                <button
                    class="bg-gray-200 hover:bg-gray-300 text-gray-600 text-sm  py-2 px-5 text-center align-middle rounded truncate w-full">
                    <i class="fa-regular fa-eye mr-2"></i>
                    Beobachten
                </button>
            </div>
            <ul class="list-none text-sm text-gray-500 mb-4">
                <li class="py-2">
                    <a class="hover:text-primary" href="#">
                        <i class="fa-regular fa-comments mr-2"></i>
                        Alle Diskussionen
                    </a>
                </li>
                <li class="py-2">
                    <a class="font-bold text-primary" href="#">
                        <i class="fa-solid fa-tornado mr-2"></i>
                        Ausgewählt
                    </a>
                </li>
                <li class="py-2">
                    <a class="hover:text-primary" href="#">
                        <i class="fa-regular fa-eye mr-2"></i>
                        Beobachtete Diskussionen
                    </a>
                </li>
            </ul>
            <ul class="list-none text-sm text-gray-500">
                <h3 class="pt-2 font-bold"><a class="hover:text-primary" href="#">DNW</a></h3>
                <li class="py-2">
                    <a class="hover:text-primary" href="#">
                        <i class="fa-solid fa-vial mr-2" style="color: #B59E8C"></i>
                        Alle Diskussionen
                    </a>
                </li>
                <li class="py-2">
                    <a class="hover:text-primary" href="#">
                        <i class="fa-solid fa-wrench mr-2" style="color: #7c3aed"></i>
                        Support
                    </a>
                </li>
                <h3 class="pt-2 font-bold"><a class="text-primary" href="#">Diplomacy Generell</a></h3>
                <li class="py-2">
                    <a class="hover:text-primary" href="#">
                        <i class="fa-solid fa-flask mr-2" style="color: #06b6d4"></i>
                        Taktik
                    </a>
                </li>
                <li class="py-2">
                    <a class="hover:text-primary" href="#">
                        <i class="fa-solid fa-puzzle-piece mr-2" style="color: #ea580c"></i>
                        Varianten
                    </a>
                </li>
                <h3 class="pt-2 font-bold">Ludomaniac</h3>
                <li class="py-2">
                    <a class="hover:text-primary font-bold" style="color: #e11d48" href="#">
                        <i class="fa-solid fa-wrench mr-2" style="color: #e11d48"></i>
                        Active
                    </a>
                </li>
            </ul>
        </div>
        <!-- Main -->
        <div class="flex-grow">
            <div class="w-full flex flex-row justify-between mb-4">
                <button
                    class="bg-gray-200 hover:bg-gray-300 text-gray-600 text-sm  py-2 px-5 text-center align-middle rounded truncate">
                    Diskussion starten
                    <i class="fas fa-caret-down ml-2"></i>
                </button>
                <button
                    class="bg-gray-200 hover:bg-gray-300 text-gray-600 text-sm  py-2 px-3 text-center align-middle rounded truncate">
                    <i class="fas fa-check"></i>
                </button>
            </div>

            <ul class="w-full list-none">
                <li class="flex flex-row items-center hover:bg-gray-100 py-3 px-3 rounded -mx-3">
                    <a href="#" class="mr-4">
                        <div>
                            <img src="https://i.pravatar.cc/150?u=fake@pravatar.com" alt=""
                                 class="h-9 w-9 rounded-full">
                        </div>
                    </a>
                    <a href="#" class="flex flex-row flex-grow items-baseline justify-between">
                        <div>
                            <h2 class="mb-[3px] truncate text-gray-500">
                                Diplomacy Meisterschaft 2023
                            </h2>
                            <div class="text-xs text-gray-400 flex flex-row items-center">
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
                            <div class="text-[10px] leading-3 mr-5">
                                 <span>
                                     <span class="rounded-l bg-red-500 text-white font-bold py-0.5 px-1 ">
                                         <i class="fas fa-check"></i>
                                         DNW
                                     </span>
                                     <span class="rounded-r bg-gray-200 py-0.5 px-1 text-gray-500 font-bold">
                                         Support
                                     </span>
                                 </span>
                            </div>
                            <div class="text-sm text-muted">
                                <i class="fa-regular fa-comment mr-1"></i>
                                56
                            </div>
                        </div>
                    </a>
                </li>
                <li class="flex flex-row items-center hover:bg-gray-100 py-3 px-3 rounded -mx-3">
                    <a href="#" class="mr-4">
                        <div>
                            <img src="https://i.pravatar.cc/150?u=test@dnw.com" alt=""
                                 class="h-9 w-9 rounded-full">
                        </div>
                    </a>
                    <a href="#" class="flex flex-row flex-grow items-baseline justify-between">
                        <div>
                            <h2 class="mb-[3px] truncate text-heading font-bold">
                                Diplomacy Meisterschaft 2023 - ungelesen
                            </h2>
                            <div class="text-xs text-muted-more flex flex-row items-center">
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
                            <div class="text-[10px] leading-3 mr-5">
                                 <span>
                                     <span class="rounded-l bg-red-500 text-white font-bold py-0.5 px-1 ">
                                         <i class="fas fa-check"></i>
                                         DNW
                                     </span>
                                     <span class="rounded-r bg-gray-200 py-0.5 px-1 text-gray-500 font-bold">
                                         Support
                                     </span>
                                 </span>
                            </div>
                            <div class="text-sm text-heading font-bold">
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
